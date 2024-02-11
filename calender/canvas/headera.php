<?php
/*
= Header for the LuxCal calendar pages = (navbar without event-related buttons)

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $set['calendarTitle']; ?></title>
<meta name="description" content="LuxCal web calendar - a LuxSoft product">
<meta name="keywords" content="LuxSoft, LuxCal, LuxCal web calendar">
<meta name="author" content="Roel Buining">
<meta name="robots" content="nofollow">
<!--[if IE]>
<meta http-equiv="imagetoolbar" content="no">
<![endif]-->
<link rel="shortcut icon" href=" lcal.ico">
<?php
echo '<link rel="canonical" href="'.$set['calendarUrl'].'">'."\n";
?>
<link rel="stylesheet" href=" css/css.php" type="text/css">
<script>
<?php //used by dtpicker.js
echo 'var mode = "',$mode,'";
var tFormat = "',$set['timeFormat'],'";
var dFormat = "',$set['dateFormat'],'";
var wStart = ',$set['weekStart'],';
var dpToday = "',$xx['hdr_today'],'";
var dpClear = "',$xx['hdr_clear'],'";
var dpMonths = new Array("',implode('","',$months),'");
var dpWkdays = new Array("',implode('","',$wkDays_m),'");
var dwTimeSlot = ',$set['dwTimeSlot'],';'."\n"; //used by dw_functions.php
?>
</script>
<script src=" common/dtpicker.js"></script>
<script src=" common/cpicker.js"></script>
<script src=" common/toolbox.js"></script>
</head>

<body>
<?php
echo "<header>\n";
echo '<span class="floatL">'.$set['calendarTitle'].'</span><span class="floatR">'.$uname.'</span><span class="noPrint">'.makeD(date("Y-m-d"),5)."</span>\n";
echo "</header>\n";
echo "<div class=\"navBar noPrint\">\n";
echo "<div class=\"floatR\">\n";
echo '<button type="button" title="'.$xx['hdr_print_page'].'" onclick="printNice();">'.$xx['hdr_print']."</button>\n";
if ($admin) { //admin functions
	echo '<select title="'.$xx['hdr_select_admin_functions'].'" name="views" onchange="jumpMenu(this)">'."\n";
	echo '<option value="#">'.$xx['hdr_admin']."&nbsp;</option>\n";
	echo '<option value="index.php?cP=90"'.($cP == "90" ? ' selected="selected">' : '>').$xx['hdr_settings']."</option>\n";
	echo '<option value="index.php?cP=91"'.($cP == "91" ? ' selected="selected">' : '>')."Drivers"."</option>\n";
	echo '<option value="index.php?cP=92"'.($cP == "92" ? ' selected="selected">' : '>').$xx['hdr_users']."</option>\n";
	echo '<option value="index.php?cP=93"'.($cP == "93" ? ' selected="selected">' : '>').$xx['hdr_database']."</option>\n";
	echo '<option value="index.php?cP=94"'.($cP == "94" ? ' selected="selected">' : '>').$xx['hdr_import_ics']."</option>\n";
	echo '<option value="index.php?cP=95"'.($cP == "95" ? ' selected="selected">' : '>').$xx['hdr_export_ics']."</option>\n";
	echo '<option value="index.php?cP=96"'.($cP == "96" ? ' selected="selected">' : '>').$xx['hdr_import_csv']."</option>\n";
	echo '<option value="index.php?cP=0">'.$xx['hdr_calendar']."</option>\n";
	echo "</select> \n";
}
echo '<button type="button" title="'.$xx['hdr_guide']."\" onclick=\"help();\">&nbsp;?&nbsp;</button>\n";
if ($_SESSION['uid'] == 1) { //public user
	echo '<button type="button" onclick="login()">'.$xx['hdr_log_in']."</button>\n";
} else { //known user
	echo '<button type="button" onclick="logout()">'.$xx['hdr_log_out']."</button>\n";
}
echo "</div>\n";
echo '<button type="button" title="'.$xx['hdr_options_panel']."\" onclick=\"show('optPanel','optMenu')\">".$xx['hdr_options']."</button>&nbsp;";

//make options panel
echo "<div id='optPanel'>\n";
echo '<h4 class="floatC">'.$xx['hdr_options_submit']."</h4>\n";
echo "<form name=\"optMenu\" method=\"post\" action=\"index.php\">\n";
echo "<table class=\"options\">\n";
echo "<tr>\n";
echo '<th title="'.$xx['hdr_select_view'].'">'.$xx['hdr_view']."</th>\n";
if ($_SESSION['uid'] > 1 and $set['userMenu']) { echo '<th title="'.$xx['hdr_select_filter'].'">'.$xx['hdr_filter']."</th>\n"; }
if ($set['catMenu']) { echo '<th title="'.$xx['hdr_select_filter'].'">'.$xx['hdr_filter']."</th>\n"; }
if ($set['langMenu']) { echo '<th title="'.$xx['hdr_select_lang'].'">'.$xx['hdr_lang']."</th>\n"; }
echo "</tr>\n";
echo "<tr>\n";
echo "<td><div class=\"optList\">\n";
echo '<input type="checkbox" id="cP1" name="cP" value="1" onclick="check1(\'cP\',this);"'.($cP == "1" ? ' checked="checked"' : '').'/><label for="cP1"> '.$xx['hdr_year']."</label><br>\n";
echo '<input type="checkbox" id="cP2" name="cP" value="2" onclick="check1(\'cP\',this);"'.($cP == "2" ? ' checked="checked"' : '').'/><label for="cP2"> '.$xx['hdr_month_full']."</label><br>\n";
echo '<input type="checkbox" id="cP3" name="cP" value="3" onclick="check1(\'cP\',this);"'.($cP == "3" ? ' checked="checked"' : '').'/><label for="cP3"> '.$xx['hdr_month_work']."</label><br>\n";
echo '<input type="checkbox" id="cP4" name="cP" value="4" onclick="check1(\'cP\',this);"'.($cP == "4" ? ' checked="checked"' : '').'/><label for="cP4"> '.$xx['hdr_week_full']."</label><br>\n";
echo '<input type="checkbox" id="cP5" name="cP" value="5" onclick="check1(\'cP\',this);"'.($cP == "5" ? ' checked="checked"' : '').'/><label for="cP5"> '.$xx['hdr_week_work']."</label><br>\n";
echo '<input type="checkbox" id="cP6" name="cP" value="6" onclick="check1(\'cP\',this);"'.($cP == "6" ? ' checked="checked"' : '').'/><label for="cP6"> '.$xx['hdr_day']."</label><br>\n";
echo '<input type="checkbox" id="cP7" name="cP" value="7" onclick="check1(\'cP\',this);"'.($cP == "7" ? ' checked="checked"' : '').'/><label for="cP7"> '.$xx['hdr_upcoming']."</label><br>\n";
echo '<input type="checkbox" id="cP8" name="cP" value="8" onclick="check1(\'cP\',this);"'.($cP == "8" ? ' checked="checked"' : '').'/><label for="cP8"> '.$xx['hdr_changes']."</label>\n";
echo "</div></td>\n";
if ($_SESSION['uid'] > 1 and $set['userMenu']) {
	echo "<td><div class=\"optList\">\n";
	$rSet = dbQuery("SELECT user_id, user_name, color FROM [db]users WHERE status >= 0 ORDER BY user_name");
	if ($rSet !== false) {
		echo '<input type="checkbox" id="cU0" name="cU[]" value="0" onclick="checkA(\'cU\',this);"'.(in_array(0, $_SESSION['cU']) ? ' checked="checked"' : '').'/><label for="cU0"> '.$xx['hdr_all_users']."</label><br>\n";
		while ($row=mysqli_fetch_assoc($rSet)) {
			$xU = $row['user_id'];
			$checked = in_array($xU, $_SESSION['cU']) ? " checked=\"checked\"" : "";
			$userColor = ($row['color']) ? " style=\"background-color:".$row['color'].";\"" : '';
			echo '<input type="checkbox" id="cU'.$xU.'" name="cU[]" value="'.$xU.'" onclick="checkN(\'cU\',this);"'.$checked.'/><label for="cU'.$xU.'"'.$userColor.'> '.stripslashes($row['user_name'])."</label><br>\n";
		}
	}
	echo "</div></td>\n";
}
if ($set['catMenu']) {
	echo "<td><div class=\"optList\">\n";
	$where = ' WHERE status >= 0'.($_SESSION['uid'] == 1 ? " AND public > 0" : "");
	$rSet = dbQuery("SELECT category_id, name, color, background FROM [db]categories".$where." ORDER BY sequence");
	if ($rSet !== false) {
		echo '<input type="checkbox" id="cC0" name="cC[]" value="0" onclick="checkA(\'cC\',this);"'.(in_array(0, $_SESSION['cC']) ? ' checked="checked"' : '').'/><label for="cC0"> '."All drivers"."</label><br>\n";
		while ($row=mysqli_fetch_assoc($rSet)) {
			$xC = $row['category_id'];
			$checked = in_array($xC, $_SESSION['cC']) ? ' checked="checked"' : '';
			$catColor = ($row['color'] ? "color:".$row['color'].";" : "").($row['background'] ? "background-color:".$row['background'].";" : "");
			echo '<input type="checkbox" id="cC'.$xC.'" name="cC[]" value="'.$xC.'" onclick="checkN(\'cC\',this);"'.$checked.'/><label for="cC'.$xC.'"'.($catColor ? " style=\"".$catColor."\"" : "").'> '.stripslashes($row['name'])."</label><br>\n";
		}
	}
	echo "</div></td>\n";
}
if ($set['langMenu']) {
	echo "<td><div class=\"optList\">\n";
	$files = scandir("lang/");
	foreach ($files as $file) {
		if (substr($file, 0, 3) == "ui-") {
			$lang = strtolower(substr($file,3,-4));
			$checked = (strtolower($_SESSION['cL']) == $lang) ? " checked=\"checked\"" : '';
			echo '<input type="checkbox" id="'.$lang.'" name="cL" value="'.$lang.'" onclick="check1(\'cL\',this);"'.$checked.'/><label for="'.$lang.'"> '.ucfirst($lang)."</label><br>\n";
		}
	}
	echo "</div></td>\n";
}
echo "</tr>\n";
echo "</table>\n";
echo "</form>\n";
echo "</div>\n";
echo "</div>\n";
echo "<div class=\"content\">\n";

if ($pageTitle) echo '<br><h3 class="pageTitle">'.$pageTitle.'</h3>'."\n";
?>
