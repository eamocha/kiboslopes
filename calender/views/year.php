<?php
/*
= year view of events =

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

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
	global $evtList,$privs,$set,$xx;
	if (!array_key_exists($date,$evtList)) { return; }
	foreach ($evtList[$date] as $evt) {
		$mayEdit = ($privs > 2 or ($privs == 2 and $evt['uid'] == $_SESSION['uid'])) ? true : false;
		if ($evt['sti']) { $evt['sti'] = ITtoDT($evt['sti']); }
		$check = '';
		if ($evt['ch1']) { $check .= strpos($evt['chk'],$date.'a') ? $evt['mk1'].' ' : '&#9744; '; }
		if ($evt['ch2']) { $check .= strpos($evt['chk'],$date.'b') ? $evt['mk2'].' ' : '&#9744;'; }
		if ($check) { $check = '<span class="chkBoxes">'.trim($check).'</span>'; }
		if ($set['eventHBox']) {
			$popText = '<b>'.$check.' '.$evt['sti'].($evt['eti'] ? ' - '.ITtoDT($evt['eti']).' ' : ' ').$evt['tit'].'</b> ('.$evt['vsts'].' pple)';
			if ($set['details4All'] or $mayEdit) {
				if ($evt['ven']) { $popText .= "<br>".$evt['ven']; }
				if ($evt['des']) { $popText .= "<br>".$evt['des']; }
				if ($evt['rem'] >= 0 and $mayEdit) { $popText .= "<br>".$xx['vws_notify'].": ".$evt['rem']." ".$xx['vws_days']; }
			}
			$xx['evt_category']='Driver';
			
				if ($set['showCatName']) { $popText .= '<hr/>'.$xx['evt_category'].': '.$evt['cnm'].' '.$evt['la2'].'<br/><b>'.$evt['la1'].'<b>'; }
			$popText = htmlspecialchars(addslashes($popText));
			$popClass = ($evt['pri'] ? 'private' : 'normal').(($evt['mde'] or $evt['r_t']) ? ' repeat' : '');
			$popAttr = " onmouseover=\"popon('".$popText."','".$popClass."')\" onmouseout=\"popoff()\"";
		} else {
			$popAttr = '';
		}
		if ($set['eventColor']) {
			$eColor = ($evt['cbg'] ? 'background-color:'.$evt['cbg'].';' : '');
		} else {
			$eColor = $evt['uco'] ? 'background-color:'.$evt['uco'].';' : '';
		}
		$eStyle = $eColor ? ' style="'.$eColor.'"' : '';
		echo (($set['details4All'] or $mayEdit) ? "\n<div class=\"square point\"".$eStyle." onclick=\"editE(".$evt['eid'].",'".$date."');\"" : "<div class=\"square arrow\"".$eStyle).$popAttr.">&nbsp;</div>\n";
	}
}

//sanity check
if (!defined('LCC')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only

//initialize
$cD = $_SESSION['cD'];
if ($set['yearStart']) { //start with month $set['yearStart']
	$m = $set['yearStart'];
	$y = (intval(substr($cD,5,2)) >= $m) ? intval(substr($cD,0,4)) : intval(substr($cD,0,4)) - 1;
	$prevDate = date("Y-m-d",mktime(12,0,0,$m,1,$y-1));
	$nextDate = date("Y-m-d",mktime(12,0,0,$m,1,$y+1));

	/* set the start date and end date of the period to show */
	$fromM = $m; //start month
	$tillM = $fromM + 12; //month following end month
} else { //use current date to determine start month
	$m = substr($cD,5,2);
	$y = substr($cD,0,4);
	$jumpRows = $set['rowsToShow'] - intval($set['rowsToShow']*0.5);
	$prevDate = date("Y-m-d",mktime(12,0,0,$m-$set['colsToShow']*$jumpRows,1,$y));
	$nextDate = date("Y-m-d",mktime(12,0,0,$m+$set['colsToShow']*$jumpRows,1,$y));

	/* set the start date and end date of the period to show */
	$fromM = $m - ($m-1)%$set['colsToShow']; //start month
	$tillM = $fromM + $set['colsToShow'] * $set['rowsToShow']; //month following end month
}
$sDate = date("Y-m-d",mktime(12,0,0,$fromM,1,$y)); //start date
$eDate = date("Y-m-d",mktime(12,0,0,$tillM,0,$y)); //end date

retrieve($sDate,$eDate,'uc'); //retrieve events

/* display header */
$header = '<span'.($mobile ? '' : ' class="viewHdr"').'>'.makeD($sDate,3)." - ".makeD($eDate,3).'</span>';
echo '<h4 class="floatC noPrint"><a class="noPrint" href="index.php?cD=',$prevDate,'"><img src="images/arrowl.png" alt="back"/></a>',$header,'<a class="noPrint" href="index.php?cD=',$nextDate,'"><img src="images/arrowr.png" alt="forward"/></a></h4>'."\n";

/* display calendar */
echo '<div'.($mobile ? '' : ' class="scrollBoxYe"').">\n";
echo '<table class="mgrid">'."\n";
$cm = $fromM; //current month
for($p=0;$p<$set['rowsToShow'];$p++){ //number of rows to show
	echo '<tr>';
	for($q=0;$q<$set['colsToShow'];$q++){ //# of months per row
		echo '<td class="holder">';

		/* collect month info */
		$timeDay1 = mktime(12,0,0,$cm,1,$y); //Unix time of month
		$day1 = date("Y-m-d",$timeDay1);
		$thisM = substr($day1,5,2);
		$thisY = substr($day1,0,4);
		$sOffset = ($set['weekStart']) ? date("N",$timeDay1) - 1 : date("w",$timeDay1); //offset first day
		$eOffset = date("t",$timeDay1) + $sOffset; //offset last day
		$daysToShow = ($eOffset == 28) ? 28 : (($eOffset > 35) ? 42 : 35);  //4,5 or 6 weeks

		/* display month header */
		echo "<h5 class=\"floatC point\" onclick=\"goMonth('".$day1."');\" title=\"".$xx['vws_view_month']."\">".makeD($day1,3)."</h5>\n";
		echo '<table class="grid">'."\n"; 
		if ($set['weekNumber']) { echo '<col class="wkCol"/>'; } //add week # column
		echo '<col span="7" class="dCol7"/>'."\n";
		echo "<tr>\n";
		if ($set['weekNumber']) { echo '<th>'.$xx['vws_wk'].'</th>'; } //week # hdr
		for ($x = $set['weekStart']; $x < ($set['weekStart']+7); $x++) echo '<th>',$wkDays_s[$x],'</th>'; //week days
		echo "</tr>\n";

		/* display month */
		for ($i = 0; $i < $daysToShow; $i++) {
			$curTime = mktime(12,0,0,$thisM,$i-$sOffset +1,$thisY);
			$curDate = date("Y-m-d",$curTime);
			if ($i%7 == 0) { //new week
				echo '<tr class="yearWeek">';
				if ($set['weekNumber']) { //display week nr
					echo "<td class=\"wnr point\" onclick=\"goWeek('".$curDate."');\" title=\"".$xx['vws_view_week']."\">".date("W",$curTime + 86400)."</td>\n";
				}
			}
			if ($i >= $sOffset and $i < $eOffset) { //day in month
				$dow = date("N",$curTime) > 5 ? 'we0' : 'wd0';
				if ($curDate == date("Y-m-d")) {
					$dow .= ' today';
				} elseif (isset($_SESSION['nD']) and $curDate == $_SESSION['nD']) {
					$dow .= ' slday';
				}
				$day = ltrim(substr($curDate,8,2),"0");
				$dayHead = ($privs > 1) ? "class=\"dom point\" onclick=\"newE('".$curDate."');\" title=\"".$xx['vws_add_event']."\"" : "class=\"dom\"";
				echo "<td class=\"".$dow."\"><div ".$dayHead.">".$day."</div>\n";
				showGrid($curDate);
			} else {
				echo '<td class="blank">';
			}
			echo "</td>\n";
			if ($i%7 == 6) { echo "</tr>\n"; } //if last day of week,wrap to left
		}
		echo "</table>\n";
		echo "</td>\n";
		$cm++;
	}
	echo "</tr>\n";
}
echo "</table>\n";
echo "</div>\n";
?>
