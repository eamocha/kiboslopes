<?php
/*
= LuxCal mini calendar - one month =

� Copyright 2009-2012 LuxSoft - www.LuxSoft.eu
config params /settings:
 database credentials
 calendarTitle
 timeZone
 language
 weekStart (0: Sunday, 1: Monday)
 miniCalPost (event posting 0: disabled, 1: enabled)

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

function showGrid($date) {
	global $set, $evtList, $privs, $xx;
	if (!array_key_exists($date, $evtList)) { return; }
	foreach ($evtList[$date] as &$evt) {
		$sti = $evt['sti'] ? ITtoDT($evt['sti']).' ' : '';
		$check = '';
		if ($evt['ch1']) { $check .= strpos($evt['chk'], $date.'a') ? $evt['mk1'] : '&#9744; '; }
		if ($evt['ch2']) { $check .= strpos($evt['chk'], $date.'b') ? ' '.$evt['mk2'] : '&#9744;'; }
		if ($check) { $check = '<span class="chkBoxes">'.trim($check).'</span>'; }
		if ($set['miniCalHBox']) {
			$popText = "<div class=\"fontS\"><b>".$check.$sti.($evt['eti'] ? "- ".ITtoDT($evt['eti']).' ' : '').$evt['tit']."</b>";
			if ($evt['ven']) { $popText .= "<br>".$evt['ven']; }
			if ($evt['des']) { $popText .= "<br>".$evt['des']; }
			if ($evt['rem'] >= 0 and $privs > 2) { $popText .= "<br>".$xx['vws_notify'].": ".$evt['rem']." ".$xx['vws_days']; }
			$popText = htmlspecialchars(addslashes($popText.'</div>'));
			$popClass = ($evt['mde'] or $evt['r_t']) ? 'normal repeat' : 'normal';
			$popAttr = " onmouseover=\"popon('".$popText."', '".$popClass."', 30)\" onmouseout=\"popoff()\"";
			$cursor = ' point';
		} else {
			$popAttr = '';
			$cursor = ' arrow';
		}
		echo "<div class=\"miniSquare".$cursor."\"".($evt['cbg'] ? " style=\"background-color:".$evt['cbg'].";\"" : "");
		if ($privs > 2) {
			echo " onclick=\"x=editE(".$evt['eid'].",'".$date."');\"";
		}
		echo $popAttr.">&nbsp;</div>\n";
	}
}

//sanity check
if (isset($_GET['oM']) and !preg_match('%^(-\d{1,2}|\d{0,2})$%', $_GET['oM'])) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //invalid argument

error_reporting(E_ALL ^ E_NOTICE); //errors, no notices
//error_reporting(E_ALL); //errors and notices - test line

//initialize
require 'common/toolbox.php';

//connect to database
$dbPfix = dbConnect();

//get settings from database
$set = getSettings();

//set time zone
date_default_timezone_set($set['timeZone']);

//proxies: don't cache
header("Cache-control: private");

//set language
require '.lang/ui-'.strtolower($set['language']).'.php';

//set session params and privs
$_SESSION['uid'] = 1; //public access
$_SESSION['cC'] = array(0); //all categories
$privs = ($set['miniCalPost']) ? 3 : 1;

//get common functions
require 'common/retrieve.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $set['calendarTitle']; ?></title>
<meta name="description" content="LuxCal mini web calendar - a LuxSoft product">
<meta name="author" content="Roel Buining">
<meta name="robots" content="nofollow">
<link rel="canonical" href="<?php echo $set['calendarUrl']; ?>">
<link rel="stylesheet" href="css/css_mini.php" type="text/css">
<script src="common/toolbox.js"></script>
<script>window.onload = function() {parent.setHeight(document.body.scrollHeight);}</script>
</head>

<body>
<?php
$offM = isset($_GET['oM']) ? $_GET['oM'] : 0; //offset Month
$timeD1 = mktime(12,0,0,date('n')+$offM,1,date('Y')); //time 1st day
$dateD1 = date("Y-m-d", $timeD1); //date 1st day
$curM = date("n",$timeD1);
$curY = date("Y",$timeD1);
$sOffset = ($set['weekStart']) ? date("N", $timeD1) - 1 : date("w", $timeD1); //offset first day
$eOffset = date("t", $timeD1) + $sOffset; //offset last day
$daysToShow = ($eOffset == 28) ? 28 : (($eOffset > 35) ? 42 : 35);  //4, 5 or 6 weeks
$sDate = date("Y-m-d", $timeD1 - ($sOffset * 86400)); //start date in 1st week
$eDate = date("Y-m-d", $timeD1 + ($daysToShow - $sOffset - 1) * 86400); //end date in last week

retrieve($sDate,$eDate); //retrieve events

/* display header */
echo '<div class="floatC fontS">'.$xx['vws_click_for_full']."</div>\n";
echo '<h6 class="floatC"><a href="'.htmlentities($_SERVER['PHP_SELF']).'?oM=',$offM-1,'" title="'.$xx['vws_prev_month'].'">'.'&lt;&lt;'.'</a>&nbsp;&nbsp;&nbsp;<a href="index.php?cP=2&amp;cD=',$dateD1,'" title="'.$xx['vws_view_full'].'" target="_blank">',makeD($dateD1,3),'</a>&nbsp;&nbsp;&nbsp;<a href="'.htmlentities($_SERVER['PHP_SELF']).'?oM=',$offM+1,'" title="'.$xx['vws_next_month'].'">'.'&gt;&gt;'."</a></h6>\n";

/* display month */
$days = ($set['miniCalView'] == 1) ? '1234567' : $set['workWeekDays']; //set days to show
$cWidth = round(98 / strlen($days),1).'%';
echo '<table class="grid">';
echo '<col span="'.strlen($days).'" class="dCol" style="width:'.$cWidth.'"/>'."\n";
echo "<tr>\n";
for ($i = 0; $i < 7; $i++) {
	$cTime = mktime(12,0,0,$curM,$i-$sOffset+1,$curY ); //current time
	if (strpos($days,date("N",$cTime)) !== false) { echo '<th>'.$wkDays_s[$set['weekStart'] + $i].'</th>'; } //week days
}
echo "</tr>\n";
for($i = 0; $i < $daysToShow; $i++) {
	$cTime = mktime(12,0,0,$curM,$i-$sOffset+1,$curY ); //current time
	$cDate = date("Y-m-d", $cTime);
	if ($i%7 == 0) { //new week
		echo "<tr class=\"miniWeek\">\n";
	}
	$dayNr = date("N", $cTime);
	if (strpos($days,$dayNr) !== false) {
		$dow = ($i < $sOffset or $i >= $eOffset) ? 'out' : (($dayNr > 5) ? 'we0' : 'wd0');
		if ($cDate == date("Y-m-d")) { $dow .= ' today'; }
		$day = ltrim(substr($cDate, 8, 2),"0");
		$dayHead = ($privs > 2) ? "class=\"dom hyper\" onclick=\"newE('".$cDate."');\" title=\"".$xx['vws_add_event']."\"" : "class=\"dom\"";
		echo "<td class=\"".$dow."\">\n<div ".$dayHead.">".$day."</div>\n";
		showGrid($cDate);
		echo "</td>\n";
	}
	if ($i%7 == 6) { echo "</tr>\n"; } //if last day of week, wrap to left
}
echo "<tr>\n<th colspan=\"7\" class=\"endBar\">\n";
echo '<span class="floatL"><a class="endBarTxt" href="'.$set['calendarUrl'].'rssfeed.php" title="RSS feeds" target="_blank" >RSS</a></span>'."\n";
echo '<span class="floatR endBarTxt"><a href="http://www.bluerange-ke.com target="_blank"><span class="footLB">Kibo</span><span class="footLR">Slopes</span></a><span title="V'.LCC.'"></span></span>'."\n";
if ($offM != 0) { echo '<a class="floatC endBarTxt" href="'.htmlentities($_SERVER['PHP_SELF']).'?oM=0" title="'.$xx['vws_back_to_today'].'">'.$xx['vws_today']."</a>\n"; }
?>
</th>
</tr>
</table>
</body>
</html>
