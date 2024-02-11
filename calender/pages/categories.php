<?php
/*
= LuxCal categories management page =

� Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.

The LuxCal Web Calendar is free software: you can redistribute it and/or modify it under 
the terms of the GNU General Public License as published by the Free Software Foundation, 
either version 3 of the License, or (at your option) any later version.

The LuxCal Web Calendar is distributed in the hope that it will be useful, but WITHOUT 
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A 
PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with the LuxCal 
Web Calendar. If not, see <http://www.gnu.org/licenses/>.
*/

//sanity check
if (!defined('LCC') or
		(isset($_REQUEST['cid']) and !preg_match('%^\d{1,4}$%', $_REQUEST['cid'])) or
		(isset($_GET['editCat']) and !preg_match('%^(add|edit)$%', $_GET['editCat'])) or
		(isset($_GET['delExe']) and !preg_match('%^\w$%', $_GET['delExe']))
	) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); }
		

//initialize
$adminLang = (file_exists('lang/ai-'.strtolower($_SESSION['cL']).'.php')) ? $_SESSION['cL'] : "English";
require 'lang/ai-'.strtolower($adminLang).'.php';

$cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;
$editCat = isset($_REQUEST['editCat']) ? $_REQUEST['editCat'] : "";
$cname = isset($_POST['cname']) ? trim($_POST['cname']) : "";
$sqnce = isset($_POST['sqnce']) ? $_POST['sqnce'] : 0;
$repeat = isset($_POST['repeat']) ? $_POST['repeat'] : 0;
$public = isset($_POST['public']) ? 1 : 0;
$check1 = isset($_POST['check1']) ? 1 : 0;
$label1 = isset($_POST['label1']) ? $_POST['label1'] : "";
$mark1 = isset($_POST['mark1']) ? $_POST['mark1'] : "ok";
$check2 = isset($_POST['check2']) ? 1 : 0;
$label2 = isset($_POST['label2']) ? $_POST['label2'] : "";
$mark2 = isset($_POST['mark2']) ? $_POST['mark2'] : "&#x2713;";
$color = isset($_POST['color']) ? $_POST['color'] : "";
$bgrnd = isset($_POST['bgrnd']) ? $_POST['bgrnd'] : "";

function showCategories($edit) {
	global $ax, $sqnce;
	
	echo "<div class=\"fieldBox\">\n";
	echo '<div class="legend">&nbsp;'."Driver list".'&nbsp;</div>'."\n";
	$rSet = dbQuery("SELECT * FROM [db]categories WHERE status >= 0 ORDER BY sequence");
	if ($rSet !== false) {
		echo '<table class="cList">'."\n";
		$ax['cat_check_mark']='Mark | Vehicle';
		echo '<tr><th>&nbsp;'.$ax['cat_nr'].'&nbsp;</th><th>Driver Name</th><th>&nbsp;'.$ax['cat_repeat'].'&nbsp;</th><th>&nbsp;'.$ax['cat_public'].'&nbsp;</th><th>&nbsp;'.$ax['cat_check_mark'].' &nbsp;</th><th>&nbsp;'.'Mark|Phone'." &nbsp;</th>";
		echo (!$edit ? "<th>Edit</th><th>Del</th>": '')."</tr>\n";
		if (mysqli_num_rows($rSet) > 0) {
			while ($row=mysqli_fetch_assoc($rSet)) {
				switch ($row['rpeat']) {
					case 0: $repeat = ''; break;
					case 1: $repeat = $ax['cat_every_day']; break;
					case 2: $repeat = $ax['cat_every_week']; break;
					case 3: $repeat = $ax['cat_every_month']; break;
					case 4: $repeat = $ax['cat_every_year'];
				}
				$catColor = ($row['color'] ? 'color:'.$row['color'].';' : '').($row['background'] ? 'background-color:'.$row['background'].';' : '');
				echo '<tr><td>'.$row['sequence']."</td><td".($catColor ? " style=\"".$catColor."\">" : ">").stripslashes($row['name'])."</td><td>".$repeat.'</td>';
				echo '<td>'.($row['public'] < 1 ? $ax['no'] : $ax['yes']).'</td>';
				echo '<td>'.($row['check1'] ? $row['mark1'].': "'.$row['label1'].'"' : $ax['no']).'</td>';
				echo '<td>'.($row['check2'] ? $row['mark2'].': "'.$row['label2'].'"' : $ax['no']).'</td>';
				if (!$edit) {
					echo "<td>[<a href=\"index.php?editCat=edit&amp;cid=".$row['category_id']."\">".$ax['cat_edit']."</a>]</td>";
					echo "<td>".(($row['category_id'] != 1) ? "[<a href=\"index.php?delExe=y&amp;cid=".$row['category_id']."\">".$ax['cat_delete']."</a>]" : "")."</td>\n";
				}
				echo "</tr>\n";
				$sqnce = $row['sequence'];
			}
		}
		echo "</table>\n";
	}
	echo "</div>\n";
	if (!$edit) { echo '<button class="noPrint" type="button" onclick="window.location=\'index.php?editCat=add\'">'."Add Driver"."</button>\n"; }
	echo "<br><br>\n";
}

function editCategory($editCat,$cid) {
	global $ax, $cname, $public, $check1, $label1, $mark1, $check2, $label2, $mark2, $sqnce, $repeat, $color, $bgrnd;
	
	echo '<form action="index.php" method="post" name="cate">'."\n";
	echo '<input type="hidden" name="cid" id="cid" value="'.$cid.'"/>'."\n";
	echo '<input type="hidden" name="editCat" id="editCat" value="'.$editCat.'"/>'."\n";
	echo "<div class=\"fieldBox\">\n";
	if ($editCat != "add") {
		$rSet = dbQuery("SELECT * FROM [db]categories WHERE category_id = $cid LIMIT 1");
		if ($rSet !== false) {
			$row = mysqli_fetch_assoc($rSet);
			$cname = stripslashes($row['name']);
			$sqnce = $row['sequence'];
			$repeat = $row['rpeat'];
			$public = $row['public'];
			$color = $row['color'];
			$bgrnd = $row['background'];
			$check1 = $row['check1'];
			$label1 = stripslashes($row['label1']);
			$mark1 = $row['mark1'];
			$check2 = $row['check2'];
			$label2 = stripslashes($row['label2']);
			$mark2 = $row['mark2'];
		}
		echo '<div class="legend">&nbsp;Edit Driver&nbsp;</div>'."\n";
	} else {
		echo '<div class="legend">&nbsp;'."Add Driver".'&nbsp;</div>'."\n";
		$public = 1; //is default
		$sqnce += 1;
	}
	$catColor = ($color ? "color: ".$color.";" : "").($bgrnd ? "background-color: ".$bgrnd.";" : "");
	$style = $catColor ? ' style="'.$catColor.'"' : '';
	echo '<table class="cList">'."\n";
	echo '<tr><td>Driver Name:</td><td><input type="text" id="cname" name="cname" value="'.$cname.'" size="20" maxlength="40"'.$style.'/></td></tr>'."\n";
	echo '<tr><td>'.$ax['cat_repeat'].':</td>';
	echo '<td><select name="repeat">'."\n";
	echo '<option value="0"'.($repeat == "0" ? ' selected="selected"' : '').'>-'."</option>\n";
	echo '<option value="1"'.($repeat == "1" ? ' selected="selected"' : '').'>'.$ax['cat_every_day']."</option>\n";
	echo '<option value="2"'.($repeat == "2" ? ' selected="selected"' : '').'>'.$ax['cat_every_week']."</option>\n";
	echo '<option value="3"'.($repeat == "3" ? ' selected="selected"' : '').'>'.$ax['cat_every_month']."</option>\n";
	echo '<option value="4"'.($repeat == "4" ? ' selected="selected"' : '').'>'.$ax['cat_every_year']."</option>\n";
	echo "</select></td></tr>\n";
	echo '<tr><td>'.$ax['cat_public'].':</td><td><input type="checkbox" name="public" value="1"'.($public ? ' checked="checked"/> ' : ' > ')."</td></tr>\n";
	echo '<tr><td>'.$ax['cat_check_mark'].' 1:</td><td><input type="checkbox" name="check1" value="1"'.($check1 ? ' checked="checked"' : '').'/> ';
	$ax['cat_label']='Vehicle';
	echo '&nbsp;&nbsp;'.$ax['cat_label'].': <input type="text" id="label1" name="label1" value="'.$label1.'" size="8" maxlength="20"/>';
	echo '&nbsp;&nbsp;'.$ax['cat_mark'].': <input type="text" id="mark1" name="mark1" value="'.$mark1.'" size="5" maxlength="10"/></td>'."</tr>\n";
	echo '<tr><td>'.$ax['cat_check_mark'].' 2:</td><td><input type="checkbox" name="check2" value="1"'.($check2 ? ' checked="checked"' : '').'/> ';
	$ax['cat_label']='Phone';
	echo '&nbsp;&nbsp;'.$ax['cat_label'].': <input type="text" id="label2" name="label2" value="'.$label2.'" size="8" maxlength="20"/>';
	echo '&nbsp;&nbsp;'.$ax['cat_mark'].': <input type="text" id="mark2" name="mark2" value="'.$mark2.'" size="5" maxlength="10"/></td>'."</tr>\n";
	echo '<tr><td>'.$ax['cat_text_color'].':</td><td><input type="text" id="color" name="color" value="'.$color.'" size="8" maxlength="10"/><button class="noPrint" title="'.$ax['cat_select_color']."\" onclick=\"cPicker('color','cname','t');return false;\">&larr;</button></td></tr>\n";
	echo '<tr><td>'.$ax['cat_background'].':</td><td><input type="text" id="bgrnd" name="bgrnd" value="'.$bgrnd.'" size="8" maxlength="10"/><button class="noPrint" title="'.$ax['cat_select_color']."\" onclick=\"cPicker('bgrnd','cname','b');return false;\">&larr;</button></td></tr>\n";
	echo '<tr><td>'.$ax['cat_sequence'].':</td><td><input type="text" name="sqnce" value="'.$sqnce.'" size="1" maxlength="2"/> ('.$ax['cat_in_menu'].')</td></tr>'."\n";
	echo "</table>\n";
	echo "</div>\n";
	if ($editCat == "add") {
		echo '<input type="submit" name="addExe" value="'.$ax['cat_add'].'"/>';
	} else {
		echo '<input type="submit" name="updExe" value="'.$ax['cat_save'].'"/>';
	}
	echo '&nbsp;&nbsp;&nbsp;<input type="submit" name="back" value="'.$ax['back']."\"/>\n";
	echo "</form><br><br><br>\n";
}

function addCat() { //add category
	global $cid, $editCat, $ax, $color, $bgrnd, $cname, $check1, $check2, $label1, $label2, $mark1, $mark2, $sqnce, $repeat, $public;
	
	do {
		if (($color and !preg_match("/^#[0-9A-Fa-f]{6}$/", $color)) or ($bgrnd and !preg_match("/^#[0-9A-Fa-f]{6}$/", $bgrnd))) { $msg = $ax['cat_invalid_color']; break; }
		if (!$cname) { $msg = 'Driver name missing'; break; }
		if (($check1 and (!$label1 or !$mark1)) or ($check2 and (!$label2 or !$mark2))) { $msg = $ax['cat_mark_label_missing']; break; }
		//renumber sequence
		$rSet = dbQuery("SELECT category_id AS cid FROM [db]categories WHERE status >= 0 AND sequence >= $sqnce ORDER BY sequence");
		if ($rSet !== false) {
			$count = $sqnce;
			while ($row = mysqli_fetch_assoc($rSet)) {
				dbQuery("UPDATE [db]categories SET sequence = ".++$count." WHERE category_id = ".$row['cid']);
			}
		}
		//add new category
		$nameEsc = mysqli_real_escape_string($conn,$cname);
		$label1Esc = mysqli_real_escape_string($conn,$label1);
		$label2Esc = mysqli_real_escape_string($conn,$label2);
		$result = dbQuery("INSERT INTO [db]categories VALUES (NULL,'$nameEsc',$sqnce,$repeat,$public,'$color','$bgrnd',$check1,'$label1Esc','$mark1',$check2,'$label2Esc','$mark2',DEFAULT)");
		if (!$result) { $msg = "Database Error: ".$ax['cat_not_added']; break; }
		$msg = $ax['cat_added'];
		$editCat = '';
	} while (false);
	return $msg;
}

function updateCat() { //update category
	global $cid, $editCat, $ax, $color, $bgrnd, $cname, $check1, $check2, $label1, $label2, $mark1, $mark2, $sqnce, $repeat, $public;
	
	do {
		if (!$cname) { $msg = $ax['cat_name_missing']; break; }
		if (($check1 and (!$label1 or !$mark1)) or ($check2 and (!$label2 or !$mark2))) { $msg = $ax['cat_mark_label_missing']; break; }
		if (($color and !preg_match("/^(#[0-9A-Fa-f]{6})?$/", $color)) or ($bgrnd and !preg_match("/^(#[0-9A-Fa-f]{6})?$/", $bgrnd))) { $msg = $ax['cat_invalid_color']; break; }
		//update
		$nameEsc = mysqli_real_escape_string($conn,$cname);
		$label1Esc = mysqli_real_escape_string($conn,$label1);
		$label2Esc = mysqli_real_escape_string($conn,$label2);
		$result = dbQuery("UPDATE [db]categories SET name='$nameEsc',sequence=$sqnce,rpeat=$repeat,public=$public,color='$color',background='$bgrnd',check1=$check1,label1='$label1Esc',mark1='$mark1',check2=$check2,label2='$label2Esc',mark2='$mark2' WHERE category_id = $cid");
		if (!$result) { $msg = "Database Error: ".$ax['cat_not_updated']; break; }
		$msg = $ax['cat_updated'];
		$editCat = '';
		//renumber sequence
		$rSet = dbQuery("SELECT category_id AS cid FROM [db]categories WHERE status >= 0 ORDER BY sequence");
		if ($rSet !== false) {
			$count = 0;
			while ($row = mysqli_fetch_assoc($rSet)) {
				if ($row['cid'] != $cid) {
					if ($count == $sqnce) { $count++; }
					dbQuery("UPDATE [db]categories SET sequence=".$count++." WHERE category_id = ".$row['cid']);
				}
			}
		}
	} while (false);
	return $msg;
}

function deleteCat() { //delete category
	global $cid, $ax;
	
	$result = dbQuery("UPDATE [db]categories SET sequence=0,status=-1 WHERE category_id = $cid");
	if (!$result) {
		$msg = "Database Error: ".$ax['cat_not_deleted']; 
	} else {
		$msg = $ax['cat_deleted'];
		//renumber sequence
		$rSet = dbQuery("SELECT category_id AS cid FROM [db]categories WHERE status >= 0 ORDER BY sequence");
		if ($rSet !== false) {
			$count = 0;
			while ($row = mysqli_fetch_assoc($rSet)) {
				dbQuery("UPDATE [db]categories SET sequence=".$count++." WHERE category_id = ".$row['cid']);
			}
		}
	}
	return $msg;
}

//Control logic
if ($admin) {
	$msg = '';
	if (isset($_POST['addExe'])) {
		$msg = addCat();
	} elseif (isset($_POST['updExe'])) {
		$msg = updateCat();
	} elseif (isset($_GET['delExe'])) {
		$msg = deleteCat();
	}
	echo '<p class="error">'.$msg."</p>\n";
	echo "<div class=\"scrollBoxAd\">\n";
	echo "<div class=\"centerBox\">\n";
	if (!$editCat or isset($_POST['back'])) {
		showCategories(false); //no edit
	} else {
		editCategory($editCat,$cid); //action = "add" or "edit"
		showCategories(true); //edit
	}
	echo "</div>\n</div>\n";
} else {
	echo "<p class=\"error\">".$ax['no_way']."</p>\n";
}
?>