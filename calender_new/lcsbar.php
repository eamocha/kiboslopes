<?php
/*
= LuxCal stand-alone sidebar =

© Copyright 2009-2012 LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.

used settings:
 database credentials
 timeZone
 language
 sideBarDays
 sideBarHBox
 showLinkInSB
 eventColor
*/

//save and set cwd
$cwd = getcwd();
chdir(dirname(__FILE__));

require_once 'common/toolbox.php'; //get toolbox

if (!isset($dbPfix)) { $dbPfix = dbConnect(); } //connect to database

if (!isset($set)) { $set = getSettings(); } //get settings from database

date_default_timezone_set($set['timeZone']); //set time zone

require_once './lang/ui-'.strtolower($set['language']).'.php'; //set language

require_once 'common/retrieve.php';//get retrieve function

//process external params
if (empty($sbClass)) { $sbClass = 'sideBar'; }
if (empty($sbHeader)) { $sbHeader = $xx['ssb_upco_events']; }
If (empty($sbFilter)) { $sbFilter = ''; }
if (!empty($sbCatsIn)) {
	$sbFilter .= "AND e.category_id IN (".$sbCatsIn.")";
} elseif (!empty($sbCatsEx)) {
	$sbFilter .= "AND e.category_id NOT IN (".$sbCatsEx.")";
}
if (!empty($sbUsersIn)) {
	$sbFilter .= "AND e.user_id IN (".$sbUsersIn.")";
} elseif (!empty($sbUsersEx)) {
	$sbFilter .= "AND e.user_id NOT IN (".$sbUsersEx.")";
}
if (substr($sbFilter,0,4) == 'AND ') { $sbFilter = substr($sbFilter, 4); }

//display sidebar
echo "<div class='".$sbClass."'>\n";
echo "<div class='ssb_header'> ".$sbHeader."</div>\n";
echo "<div class='upc_scrollList'>\n";

$sTime = time();
$sDate = date("Y-m-d", $sTime);
$eTime = $sTime + (($set['sideBarDays']-1) * 86400); //Unix time of end date
$eDate = date("Y-m-d", $eTime);

retrieve($sDate,$eDate,'',$sbFilter);

//display upcoming events
if ($evtList) {
	foreach($evtList as $date => &$events) {
		echo "<div class='ssb_date'>".makeD($date,5)."</div>\n";
		foreach ($events as $evt) {
			$time = ($evt['sti'] == '00:00' and $evt['eti'] == '23:59') ? $xx['ssb_all_day'] : ITtoDT($evt['sti']).($evt['eti'] ? ' - '.ITtoDT($evt['eti']) : '');
			if ($set['sideBarHBox']) {
				$popText = "<div class=\"ssb_popUp\"><b>".$time.' '.$evt['tit']."</b>";
				if ($evt['ven']) { $popText .= "<br>".$evt['ven']; }
				if ($evt['des']) { $popText .= "<br>".$evt['des']; }
				$popText = htmlspecialchars(addslashes($popText.'</div>'));
				$popClass = ($evt['mde'] or $evt['r_t']) ? 'ssb_normal ssb_repeat' : 'ssb_normal';
				$popAttr = " onmouseover=\"popon('".$popText."', '".$popClass."', 50)\" onmouseout=\"popoff()\"";
			} else {
				$popAttr = '';
			}
			if ($set['eventColor']) {
				$eColor = ($evt['cco'] ? 'color:'.$evt['cco'].';' : '').($evt['cbg'] ? 'background-color:'.$evt['cbg'].';' : '');
			} else {
				$eColor = ($evt['uco'] ? 'background-color:'.$evt['uco'].';' : '');
			}
			$eStyle = $eColor ? ' style="'.$eColor.'"' : '';
			echo '<div class="ssb_event ssb_arrow"'.$popAttr.">\n";
			echo '<div class="ssb_evtDate">'.$time."</div>\n";
			echo '<div class="ssb_evtTitle"'.$eStyle.'>'.$evt['tit']."</div>\n";
			echo "</div>\n";
			if ($set['showLinkInSB']) { //display URL links
				if (preg_match_all($rxULink,$evt['des'], $urls, PREG_SET_ORDER)) {
					echo "<div class='ssb_evtUrl'".$eStyle.">";
					foreach ($urls as $url) { echo $url[0]."<br>"; }
					echo "</div>\n";
				}
			}
		}
	}
} else {
	echo $xx['ssb_none']."\n";
}
echo "</div>\n</div>\n";

unset($sbId,$sbHeader,$sbFilter,$sbCatsIn,$sbCatsEx,$sbUsersIn,$sbUsersEx); //unset ext params
chdir($cwd); //restore cwd
?>