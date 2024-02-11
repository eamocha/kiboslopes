<?php
/*
= text search script =

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
if (!defined('LCC')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only

//initialize
$schText = (isset($_POST["schText"])) ? stripslashes(strip_tags(trim($_POST["schText"]))) : ""; //file description
$eF = isset($_POST['eF']) ? $_POST['eF'] : array(0); //field filter
if (isset($_POST['eF1'])) $eF[] = 1;
if (isset($_POST['eF2'])) $eF[] = 2;
if (isset($_POST['eF3'])) $eF[] = 3;
$catName = (isset($_POST["catName"])) ? stripslashes($_POST["catName"]) : ""; //category filter
$fromDda = (isset($_POST["fromDda"])) ? DDtoID($_POST["fromDda"]) : ""; //from event due date
$tillDda = (isset($_POST["tillDda"])) ? DDtoID($_POST["tillDda"]) : ""; //untill event due date


/* sub-functions */

function catList($selCat) {
	global $xx;
	
	$where = ' WHERE status >= 0'.($_SESSION['uid'] == 1 ? " AND public > 0" : "");
	$rSet = dbQuery("SELECT name, color, background FROM [db]categories".$where." ORDER BY sequence");
	if ($rSet !== false) {
		echo '<option value="*">'."All drivers"."&nbsp;</option>\n";
		while ($row = mysqli_fetch_assoc($rSet)) {
			$row["name"] = stripslashes($row["name"]);
			$selected = ($selCat == $row["name"]) ? " selected=\"selected\"" : "";
			$catColor = ($row['color'] ? "color:".$row['color'].";" : "").($row['background'] ? "background-color:".$row['background'].";" : "");
			echo '<option value="'.$row["name"].'"'.($catColor ? " style=\"".$catColor."\"" : "").$selected.'>'.$row["name"]."</option>\n";
		}
	}
}

function showGrid(&$events,$date) {
	global $privs, $set, $xx, $schText;
	
		$match = '%('.str_replace(array('_','&'), array('.','[^<>]+?'), $schText).')(?![^<]*>)%i'; //convert to regex (?!: neg.look-ahead condition)
		foreach ($events as $evt) {
			$mayEdit = ($privs > 2 or ($privs == 2 and $evt['uid'] == $_SESSION['uid'])) ? true : false;
			echo "<table><tr><td class=\"lMarginUp\">";
			echo ($evt['sti'] == "" and $evt['eti'] == "") ? $xx['vws_all_day'] : ITtoDT($evt['sti']);
			echo ($evt['eti']) ? " - ".ITtoDT($evt['eti']).'</td>' : '</td>';
			if ($set['eventColor']) {
				$eColor = ($evt['cco'] ? 'color:'.$evt['cco'].';' : '').($evt['cbg'] ? 'background-color:'.$evt['cbg'].';' : '');
			} else {
				$eColor = $evt['uco'] ? 'background-color:'.$evt['uco'].';' : '';
			}
			$eStyle = $eColor ? ' style="'.$eColor.'"' : '';
			$check = '';
			if ($evt['ch1']) { $check .= strpos($evt['chk'], $date.'a') ? $evt['mk1'].' ' : '&#9744; '; }
			if ($evt['ch2']) { $check .= strpos($evt['chk'], $date.'b') ? $evt['mk2'].' ' : ' &#9744; '; }
			if ($check) {
				$attrib = $mayEdit ? " class=\"chkBoxes point\" onclick=\"checkE(".$evt['eid'].",'".$date."');\" title=\"".$xx['vws_check_marks']."\"" : 'class="chkBoxes"';
				$check = '<span'.$attrib.">".trim($check).'</span> ';
			}
			if ($set['details4All'] or $mayEdit) {
				echo '<td><h6>'.$check."<span class=\"point\"".$eStyle." onclick=\"editE(".$evt['eid'].",'".$date."');\">".preg_replace($match, '<mark>$1</mark>',$evt['tit'])."</span></h6>\n";
				if ($evt['ven']) { echo "Route".": ".preg_replace($match, '<mark>$1</mark>',$evt['ven'])."<br>\n"; }
				if ($evt['des']) { echo preg_replace($match, '<mark>$1</mark>',$evt['des'])."<br>\n"; }
			} else {
				echo '<td><h6>'.$check."<span".$eStyle.">".preg_replace($match, '<mark>$1</mark>',$evt['tit'])."</span></h6>\n";
			}
			if ($set['showCatName']) { echo "Driver".": ".$evt['cnm']."<br>\n"; }
			if ($set['showAdEd']) {
				echo $xx['vws_added'].': '.IDtoDD($evt['ada']).' ('.$evt['una'].")<br>\n";;
				if ($evt['mda'] and $evt['edr']) { echo $xx['vws_edited'].': '.IDtoDD($evt['mda']).' ('.$evt['edr'].")<br>\n";; }
			}
			echo "</td></tr></table>\n";
		}
}

/* main functions */

function searchForm() {
	global $xx, $set, $schText, $eF, $catName, $fromDda, $tillDda;
	
	echo '<form action="index.php" method="post">'."\n";
	echo '<table class="fieldBox">'."\n";
	echo '<tr><td class="legend" colspan="2">&nbsp;'.$xx['sch_define_search'].'&nbsp;</td></tr>'."\n";
	echo "<tr>\n".'<td class="label">'.$xx['sch_search_text'].":</td>\n";
	echo '<td><input type="text" name="schText" id="schText" value="'.$schText."\" maxlength='50' size='30'/></td>\n</tr>\n";
	echo '<tr><td colspan="2"><hr></td>'."</tr>\n";
	echo "<tr>\n".'<td class="label">'.$xx['sch_event_fields'].":</td>\n";
	echo '<td><input type="checkbox" id="eF0" name="eF[]" value="0" onclick="checkA(\'eF\',this);"'.(in_array(0, $eF) ? ' checked="checked"' : '').'/> ';
	echo '<label for="eF0">'.$xx['sch_all_fields']."</label></td>\n</tr>\n";
	echo "<tr>\n".'<td></td><td><input type="checkbox" id="eF1" name="eF[]" value="1" onclick="checkN(\'eF\',this);"'.(in_array(1, $eF) ? ' checked="checked"' : '').'/> ';
	echo '<label for="eF1">'."Trips"."</label></td>\n</tr>\n";
	echo "<tr>\n".'<td></td><td><input type="checkbox" id="eF2" name="eF[]" value="2" onclick="checkN(\'eF\',this);"'.(in_array(2, $eF) ? ' checked="checked"' : '').'/> ';
	echo '<label for="eF2">'.$xx['sch_description']."</label></td>\n</tr>\n";
	echo "<tr>\n".'<td></td><td><input type="checkbox" id="eF3" name="eF[]" value="3" onclick="checkN(\'eF\',this);"'.(in_array(3, $eF) ? ' checked="checked"' : '').'/> ';
	echo '<label for="eF3">'."Routes"."</label></td>\n</tr>\n";
	echo '<tr><td class="label">'."Driver Details".':</td><td><select name="catName" >'."\n";
	catList($catName);
	echo "</select></td></tr>\n";
	echo "<tr>\n".'<td class="label">'.$xx['sch_occurring_between'].':</td><td>';
	echo '<input type="text" name="fromDda" id="fromDda" value="'.IDtoDD($fromDda)."\" size='8'/>\n";
	echo '<button title="'.$xx['sch_select_start_date']."\" onclick=\"dPicker(1,'nill','fromDda');return false;\">&larr;</button> &#8211; ";
	echo '<input type="text" name="tillDda" id="tillDda" value="'.IDtoDD($tillDda)."\" size='8'/>\n";
	echo '<button title="'.$xx['sch_select_end_date']."\" onclick=\"dPicker(1,'nill','tillDda');return false;\">&larr;</button></td>\n</tr>\n";
	echo "</table>\n";
	echo '<input type="submit" name="search" value="'.$xx['sch_search'].'"/>'."\n";
	echo '<input type="button" onclick="window.location=\'index.php?cP='.$set['defaultView'].'\'" value="'.$xx['sch_calendar'].'"/>'."\n";
	echo "</form>\n";
	echo '<div style="clear:right"></div>'."\n";
	echo '<script>$I("schText").focus();</script>';
}

function validateForm() {
	global $xx, $schText, $fromDda, $tillDda;
	
	$schText = trim(str_replace('%', '', $schText),'&');
	if (strlen(str_replace('_', '', $schText)) < 2) { return $xx['sch_invalid_search_text']; }
	if ($fromDda === false) { return $xx['sch_bad_start_date']; }
	if ($tillDda === false) { return $xx['sch_bad_end_date']; }
	return '';
}
	
function searchText() {
	global $xx, $set, $schText, $eF, $catName, $fromDda, $tillDda;
	
	//set event filter
	$schTextEsc = '%'.mysqli_real_escape_string($conn,$schText).'%';
	$schTextEsc = str_replace('&', '%', $schTextEsc);
	$filter = '';
	if ($catName != '*') { $filter .= " AND c.name = '".mysqli_real_escape_string($conn,$catName)."'"; }
	$filter .= " AND (";
	if (in_array(0, $eF)) { $filter .= "e.title LIKE '$schTextEsc' OR e.description LIKE '$schTextEsc' OR e.venue LIKE '$schTextEsc'"; //All fields
	} else {
		if (in_array(1, $eF)) { $filter .= "e.title LIKE '$schTextEsc'"; } //Title
		if (in_array(2, $eF)) { $filter .= ((substr($filter, -1) == '(') ? '' : ' OR ')."e.description LIKE '$schTextEsc'"; } //Description
		if (in_array(3, $eF)) { $filter .= ((substr($filter, -1) == '(') ? '' : ' OR ')."e.venue LIKE '$schTextEsc'"; } //Venue
	}
	$filter .= ")";
	//set event date range
	$sDate = ($fromDda) ? $fromDda : date('Y-m-d',time()-31536000); //-1 year
	$eDate = ($tillDda) ? $tillDda : date('Y-m-d',time()+31536000); //+1 year

	retrieve($sDate,$eDate,'',substr($filter,5)); //grab events

	//display header
	$fields = '';
	if (in_array(0, $eF)) { $fields = $xx['sch_title'].' + '.$xx['sch_description'].' + '.$xx['sch_venue'];
	} else {
		if (in_array(1, $eF)) { $fields .= $xx['sch_title']; }
		if (in_array(2, $eF)) { $fields .= ($fields ? ' + ' : '').$xx['sch_description']; }
		if (in_array(3, $eF)) { $fields .= ($fields ? ' + ' : '').$xx['sch_venue']; }
	}
	echo "<div class=\"headSh\">\n";
	echo '<form id="event" name="event" method="post" action="index.php">'."\n";
	echo '<input type="hidden" name="schText" value="'.$schText.'"/>'."\n";
	foreach ($eF as $key => $value) { echo '<input type="hidden" name="eF[]" value="'.$value.'"/>'."\n";	}
	echo '<input type="hidden" name="catName" value="'.$catName.'"/>'."\n";
	echo '<input type="hidden" name="fromDda" value="'.IDtoDD($fromDda).'"/>'."\n";
	echo '<input type="hidden" name="tillDda" value="'.IDtoDD($tillDda).'"/>'."\n";
	echo '<input class="floatR noPrint" type="submit" name="newSearch" value="'.$xx['sch_new_search'].'"/>';
	echo '<span class="floatR">&nbsp;&nbsp;</span>'."\n";
	echo '<input class="floatR noPrint" type="button" onclick="window.location=\'index.php?cP='.$set['defaultView'].'\'" value="'.$xx['sch_calendar'].'"/>'."\n";
	echo "</form>\n";
	echo $xx['sch_search_text'].': <b>'.$schText.'</b><br>';
	echo $xx['sch_event_fields'].': <b>'.$fields.'</b><br>';
	echo "Drivers".': <b>'.($catName != '*' ? $catName : "All drivers").'</b><br>';
	echo $xx['sch_occurring_between'].': <b>',makeD($sDate,2).' - '.makeD($eDate,2)."</b>\n";
	echo "</div>\n";
}

function showMatches() {
	global $xx, $evtList;

	//display matching events
	echo '<div class="eventBg">'."\n";
	if ($evtList) {
		foreach($evtList as $date => &$events) {
			echo '<br><h6><a href="index.php?cP=2&amp;cD=',$date,'" title="'.$xx['sch_calendar'].'">'.makeD($date,5)."</a></h6>\n";
			showGrid($events,$date);
		}
	} else {
		echo $xx['sch_no_results']."\n";
	}
	echo "</div>\n";
}

//control logic

$msg = ''; //init
if (isset($_POST["search"])) {
	$msg = validateForm();
}
echo '<p class="error">'.$msg."</p>\n";
if (isset($_POST["search"]) and !$msg) {
	searchText(); //search
	echo "<div class=\"scrollBoxSh\">\n";
	showMatches(); //show results
	echo "</div>\n";
} else {
	echo "<div class=\"scrollBoxAd\">\n";
	echo '<aside class="aside">'."\n".$xx['sch_instructions']."\n</aside>\n";
	echo "<div class=\"centerBox\">\n";
	searchForm(); //define search
	echo "</div>\n</div>\n";
}
?>
