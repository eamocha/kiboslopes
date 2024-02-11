<?php
/*
= month view of events =

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

function checkTripStartEndDate($tripstartdate,$tripenddate,$calendardate)
{

	$strImg="";

	if(date('Y-m-d',strtotime($tripstartdate))==(date('Y-m-d',strtotime($calendardate))))
	{
		$strImg="<img src='images/icon-start-play-16.png' width='12' height='12' title='Start of trip' alt='Start of trip' />";	
	}
	else if(date('Y-m-d',strtotime($tripenddate))==(date('Y-m-d',strtotime($calendardate))))
	{
		$strImg="<img src='images/stop-red-icon-16by16.png' width='12' height='12' title='End of trip' alt='End of trip' />";	
	}

	return $strImg;

}



function showGrid($date) {
	global $evtList, $privs, $set, $xx, $rxULink;
	if (!array_key_exists($date, $evtList)) { return; }
	foreach ($evtList[$date] as $evt) {
		$mayEdit = ($privs > 2 or ($privs == 2 and $evt['uid'] == $_SESSION['uid'])) ? true : false;
		switch ($evt['mde']) { //multi-day event?
			/*case 0: $time = ITtoDT($evt['sti']); break; //no
			case 1: $time = (($evt['sti'] != '00:00' and $evt['sti'] != '') ? ITtoDT($evt['sti']) : '&bull;').'&middot;&middot;&middot;'; break; //first
			case 2: $time = '&middot;&middot;&middot;'; break; //in between
			case 3: $time = '&middot;&middot;&middot;'.(($evt['eti'] < '23:59' and $evt['eti'] != '') ? ITtoDT($evt['eti']) : '&bull;'); //last
	*/	}
		$check = '';
		if ($evt['ch1']) { $check .= strpos($evt['chk'], $date.'a') ? $evt['mk1'].' ' : '&#9744; '; }
		if ($evt['ch2']) { $check .= strpos($evt['chk'], $date.'b') ? $evt['mk2'] : '&#9744;'; }
		if ($check) {
			$attrib = $mayEdit ? "class=\"chkBoxes floatL point\" onclick=\"checkE(".$evt['eid'].",'".$date."');\" title=\"".$xx['vws_check_marks']."\"" : 'class="chkBoxes floatL"';
			//$check = "<span ".$attrib.">".trim($check)."</span>";
			$check="<span>&nbsp;&nbsp;</span>";
			$check="";

		}
		if ($set['eventHBox']) {

			$popText = '<b>'.$time.((!$evt['mde'] and $evt['eti']) ? ' - '.ITtoDT($evt['eti']).' ' : ' ').$evt['tit'].'</b> ('.$evt['vsts'].' pple)';
			if ($set['details4All'] or $mayEdit) {
				if ($evt['ven']) { $popText .= '<br>'.$evt['ven']; }
				if ($evt['des']) { $popText .= '<br>'.$evt['des']; }
				if ($evt['rem'] >= 0 and $mayEdit) { $popText .= '<br>'.$xx['vws_notify'].': '.$evt['rem'].' '.$xx['vws_days']; }
			}
			$xx['evt_category']='Driver';

			//if ($set['showCatName']) { $popText .= '<hr/>';/*.$xx['evt_category'].': '.$evt['cnm'].' '.$evt['la2'].'<br/><b>'.$evt['la1'].'</b>';*/ }

			$popText .= '<hr/>';

			//get the drivers details from the new table
			$strEventDrivers="SELECT ed.eventid AS eventid,category_id AS driver_id, `name` AS driver_name, label1 AS driver_car, label2 AS driver_phone_no FROM categories d INNER JOIN events_drivers ed ON d.category_id=ed.driverid WHERE ed.eventid=".$evt['eid'];
			$rDrivers = dbQuery($strEventDrivers);

			$no_count_allocated_drivers = mysqli_num_rows($rDrivers);

			if ($no_count_allocated_drivers>0){

				$driverText="";

				while($rowDrivers = mysqli_fetch_object($rDrivers))
				{

					if($driverText!="")
					{
						$driverText.="<br/>";
					}

					$driverText.=$rowDrivers->driver_name.' : '.$rowDrivers->driver_phone_no;
				}

				//$popText.="<span class='drivers'>".$driverText."</span>";
				$popText.=$driverText;

			}
			else
			{
				$popText .= $xx['evt_category'].': '.$evt['cnm'].' '.$evt['la2'];
			}

			mysqli_free_result($rDrivers);

			$popText = htmlspecialchars(addslashes($popText));

			$popClass = ($evt['pri'] ? 'private' : 'normal').(($evt['mde'] or $evt['r_t']) ? ' repeat' : '');
			$popAttr =" title='".$popText."'"; //onmouseover=\"popon('".$popText."', '".$popClass."')\" onmouseout=\"popoff()\"";
		} else {
			$popAttr = '';
		}
		if ($set['eventColor']) {
			$eColor = ($evt['cco'] ? 'color:'.$evt['cco'].';' : '').($evt['cbg'] ? 'background-color:'.$evt['cbg'].';' : '');
		} else {
			$eColor = $evt['uco'] ? 'background-color:'.$evt['uco'].';' : '';
		}
		$eStyle = $eColor ? ' style="'.$eColor.'"' : '';

		//$eStyle.="height:20px; z-index: 0;";

		$strStartImg = checkTripStartEndDate($evt['arrday'],$evt['depday'],$date);

		echo "<div class=\"event\" >".$check.(($set['details4All'] or $mayEdit) ? "<span eventid='".$evt['eid']."' trip_span_id='".$evt['tripid']."' eventdate='".$date."' style=\"height:20px; z-index: 0\" class=\"evtTitle  point\"".$eStyle." ondblclick=\"editE(".$evt['eid'].",'".$date."');\"" : "<span class=\"evtTitle arrow\"".$eStyle).$popAttr.">".$strStartImg."".$time." ".$evt['tit']."</span></div>\n";

		//echo "<div class=\"event\"><span class=\"evtTitle arrow\"".$eStyle.$popAttr.">".$time." ".$evt['tit']."</span></div>\n";
		//get the drivers for the event and day
		$strSQLDriver="SELECT ed.events_drivers_id,ed.drivername,ed.driverbgcolor,ed.driverid,c.label1 AS vehicle, c.label2 AS phonenumber FROM [db]categories AS c INNER JOIN [db]events_drivers AS ed ON c.category_id=ed.driverid WHERE eventid=".$evt['eid']." AND taskdate='".$date."' ORDER BY drivername";
		$rSet = dbQuery($strSQLDriver);

		$noOfDrivers = mysqli_num_rows($rSet);

		//put 6 divs
		echo '<div class="topcolorbox" div_trip_id="'.$evt['tripid'].'" id="divevent_'.$evt['eid'].'" >';
			echo "<ul>";

			switch($noOfDrivers)
			{

				case 0:

					echo "<li style=\"background-color:#FFFFFF;\"  title=\"No drivers assigned\">&nbsp; ////////////////////////////////// </li>";
					break;


				default:

					//$intPercentage = round(99/$noOfDrivers,1,PHP_ROUND_HALF_DOWN);

					$intPercentage =floor(99/$noOfDrivers);

					while($rowDriver = mysqli_fetch_object($rSet))
					{

						$strDriverLabel=$rowDriver->drivername;

						if($rowDriver->vehicle!="")
						{
							$strDriverLabel.=", ".$rowDriver->vehicle;
						}

						if($rowDriver->phonenumber!=""){
							$strDriverLabel.=", ".$rowDriver->phonenumber;
						}
						echo "<li class=\"drivercolorbox\" title=\"".$strDriverLabel."\" driver_li_id=\"".$rowDriver->driverid."\"  event_id=\"".$evt['eid']."\"  id=\"".$rowDriver->events_drivers_id."\" event_driver_id=\"".$rowDriver->events_drivers_id."\" drivercolour=\"".$rowDriver->driverbgcolor."\" style=\"width:".$intPercentage."%; background-color:".$rowDriver->driverbgcolor.";\">&nbsp;</li>";

					}

					break;

			}

		echo "</ul>";
		echo "</div>";

		mysqli_free_result($rSet);




		if ($set['showLinkInMV']) {
			if (preg_match_all($rxULink, $evt['des'], $urls, PREG_SET_ORDER)) {
				echo "<div class=\"url\"".$eStyle.">";
				foreach ($urls as $url) {
					echo $url[0]."<br>";
				}
				echo "</div>\n";
			}
		} else {
			echo "\n";
		}
	}
}

//sanity check
if (!defined('LCC')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only

//initialize
$cD = $_SESSION['cD'];
if ($set['weeksToShow'] == 0) { //show just one month
	$tfDay = mktime(12,0,0,substr($cD,5,2),1, substr($cD,0,4)); //Unix time of 1st day of the month
	$prevDate = date("Y-m-d", $tfDay - 2 * 604800); //mid prev. month
	$nextDate = date("Y-m-d", $tfDay + 6 * 604800); //mid next month

	/* determine total number of days to show, start date, end date */
	$sOffset = ($set['weekStart']) ? date("N", $tfDay) - 1 : date("w", $tfDay); //offset first day
	$eOffset = date("t", $tfDay) + $sOffset; //offset last day
	$totDays = ($eOffset == 28) ? 28 : (($eOffset > 35) ? 42 : 35);  //4, 5 or 6 weeks

	$st = $tfDay - $sOffset * 86400; //start time
	$et = $st + ($totDays - 1) * 86400; //end time
	$sDate = date("Y-m-d", $st);
	$eDate = date("Y-m-d", $et);
	$header = '<span class="viewHdr">'.makeD($cD,3).'</span>';
} else {
	$tcDate = mktime(12,0,0,substr($cD,5,2),substr($cD,8,2),substr($cD,0,4)); //Unix time of cD
	$jumpWeeks = $set['weeksToShow'] - intval($set['weeksToShow']*0.5) + 1;
	$prevDate = date("Y-m-d", $tcDate - $jumpWeeks * 604800);
	$nextDate = date("Y-m-d", $tcDate + $jumpWeeks * 604800);

	/* determine total number of days to show, start date, end date */
	$totDays = $set['weeksToShow'] * 7;  //number of weeks to show
	$sOffset = ($set['weekStart']) ? date("N", $tcDate) - 1 : date("w", $tcDate); //offset first day
	$st = $tcDate - ($sOffset + 7) * 86400; //start time
	$et = $st + ($totDays - 1) * 86400; //end time
	$sDate = date("Y-m-d", $st);
	$eDate = date("Y-m-d", $et);
	$header = '<span'.($mobile ? '' : ' class="viewHdr"').'>'.makeD($sDate,3).' - '.makeD($eDate,3).'</span>';
}

retrieve($sDate,$eDate,'uc');


function catListMenu() {
	$where = ' WHERE status >= 0'.($_SESSION['uid'] == 1 ? " AND public > 0" : "");
	$rSet = dbQuery("SELECT category_id, name, color, background FROM [db]categories".$where." ORDER BY sequence");
	if ($rSet !== false) {
		while ($row=mysqli_fetch_assoc($rSet)) {

			//$driverName = "   ".stripslashes($row['name']);

			//$catColor = ($row['color'] ? "color:".$row['color'].";" : "").($row['background'] ? "background-color:".$row['background'].";" : "");

			echo "<li class=\"draglist\" driverid=\"".$row['category_id']."\"  drivercolour=\"".$row['background']."\"  style=\"background-color:".$row['background']."\" drivername=\"".stripslashes($row['name'])."\" >".stripslashes($row['name'])."</li>\n";
		}
	}
}


?>
<div class="panel">
    <ul id="driverslist" >
      <?php

      catListMenu();

      ?>
    </ul>
</div>
<a href="javascript:void(0);" class="slider-arrow show">&raquo;</a>


<div class="contextMenu" id="myMenu1" style="visibility:hidden;">
      <ul>
        <li id="assignwholetrip"><img src="images/create.png" width='12' height='12' /> Assign to whole trip</li>
        <li id="assignfromthisdate"><img src="images/create.png" width='12' height='12' /> Assign from this date onwards</li>
        <li id="deletedriver"><img src="images/delete.png" width='12' height='12' /> Remove driver</li>
        <li id="deletedriverwholetrip"><img src="images/delete.png" width='12' height='12' /> Remove driver (whole trip)</li>
        <li id="deletedriverfromthisdate"><img src="images/delete.png" width='12' height='12' /> Remove driver (from this date onwards)</li>
      </ul>
</div>

<?php

$tableCellWidth=210;

/* display header*/
echo '<h4 class="floatC"><a class="noPrint" href="index.php?cD=',$prevDate,'"><img src="images/arrowl.png" alt="back"/></a>',$header,'<a class="noPrint" href="index.php?cD=',$nextDate,'"><img src="images/arrowr.png" alt="forward"/></a></h4>'."\n";
/* display days*/
$days = ($mode == 'fm') ? '1234567' : $set['workWeekDays']; //days to show
$cWidth = round(98 / strlen($days),1).'%';

/* display day headers */
echo '<div'.($mobile ? '' : ' class="scrollBoxHead"').">\n";
echo '<table class="grid" style="width:'.($tableCellWidth*7).'px;">'."\n";
if ($set['weekNumber']) { echo '<col class="wkCol"/>'; } //add week # column
echo '<col span="'.strlen($days).'" class="dCol" style="width:'.$cWidth.'"/>'."\n";
echo "<tr>";
if ($set['weekNumber']) { echo '<th>'.$xx['vws_wk'].'</th>'; } //week # hdr
/*for ($i = 0; $i < 7; $i++) {
	$cTime = $st + $i * 86400; //current time
	if (strpos($days,date("N",$cTime)) !== false) { echo '<th style=\"width:"'.$tableCellWidth.'"px;\">'.$wkDays[$set['weekStart'] + $i].'</th>'; } //week days
}*/
echo "</tr>\n";
echo "</table>\n";
echo "</div>\n";

$set['weekNumber']=0;



$totalTableWidth=$tableCellWidth*$totDays; 
/* display calendar */
echo '<div'.($mobile ? '' : ' class="scrollBoxMo"').">\n";
echo '<table class="grid"  style="width:'.$totalTableWidth.'px;">'."\n";
//if ($set['weekNumber']) { echo '<col class="wkCol"/>'; } //add week # column
//echo '<col span="'.strlen($days).'" class="dCol" style="width:'.$cWidth.'"/>'."\n";

/* build grid */


for ($i = 0; $i < $totDays; $i++) {
	$cTime = $st + $i * 86400; //current time
	$cDate = date("Y-m-d", $cTime); //current date
	$curM = ltrim(substr($cDate, 5, 2),"0");
	$curD = ltrim(substr($cDate, 8, 2),"0");
	if ($i%$totDays == 0) { //new week
		echo '<tr class="monthWeek">';
		if ($set['weekNumber']) { //display week nr
			echo "<td class=\"wnr hyper\" onclick=\"goWeek('".$cDate."');\" title=\"".$xx['vws_view_week']."\">".date("W", $cTime + 86400)."</td>\n";
		}
	}
	$dayNr = date("N", $cTime);
	if (strpos($days,$dayNr) !== false) {
		if ($set['weeksToShow'] == 0) {
			$dow = ($i < $sOffset or $i >= $eOffset) ? 'out' : ($dayNr > 5 ? 'we0' : 'wd0');
			$day = ($i == 0 or $curD == "1") ? makeD($cDate,1) : $curD;
		} else {
			$dow = ($dayNr > 5 ? 'we' : 'wd').strval($curM%2); //alternate color per month
			$day = $curD.$curM == "11" ? makeD($cDate,2) : (($i == 0 or $curD == "1") ? makeD($cDate,1) : $curD);
			if ($i == 0 or $curD == "1" or $curD.$curM == "11") {  $day = '<span class="firstDom">&nbsp;'.$day.'&nbsp;</span>'; }
		}
		if ($cDate == date("Y-m-d")) {
			$dow .= ' today';
		} elseif (isset($_SESSION['nD']) and $cDate == $_SESSION['nD']) {
			$dow .= ' slday';
		}
		$dayHead = ($privs > 1) ? "class=\"dom hyper\" onclick=\"newE('".$cDate."');\" title=\"".$xx['vws_add_event']."\"" : "class=\"dom\"";
		echo "<td style=\"width:".$tableCellWidth."px;\" class=\"".$dow."\"><div ".$dayHead.">".date('l',strtotime($cDate))." - ".$day."</div>\n";
		showGrid($cDate);
		echo "</td>\n";
	}
	if ($i%$totDays== $totDays-1) { echo "</tr>\n"; } //if last day of week, wrap to left
}
echo "</table>\n";
echo "</div>\n";



//put the event here
?>