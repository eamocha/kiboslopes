<?php
/*
= Send email notification of calendar changes (added / edited / deleted events) =

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

-------------------------------------------------------------------
 This script depends on and is executed via the file lcalcron.php.
 See lcalcron.php header for details.
-------------------------------------------------------------------

This file is part of the LuxCal Web Calendar.

--------- THIS SCRIPT USES THE FOLLOWING CALENDAR SETTINGS ----------
chgEmailList: list with email destinations separated by semicolons
chgNofDays: number of days to look back for calendar changes
calendarTitle: The calendar title is used in the notification email
calendarUrl: The calendar URL is used in the notification email
eventColor: Specifies event colors (0:user color, 1:cat color)
---------------------------------------------------------------------
*/

$emlStyle = "background:#FFFFDD; color:#000099; font:12px arial, sans-serif;"; //email body style definition

require '../../calende/cronjobs/common/retrieve2.php';

function makeGrid(&$events) {
	global $emlStyle, $set, $xx, $wkDays, $months;

	$changeList = '';
	foreach ($events as $evt) {
		switch ($evt['r_t']) { //make repeat text
			case 0: $repeat = ''; break;
			case 1: $repeat = ' '.$xx['evt_repeat'].' '.$xx['evt_interval1_'.$evt['r_i']].' '.$xx['evt_period1_'.$evt['r_p']]; break;
			case 2: $repeat = ' '.$xx['evt_repeat_on'].' '.$xx['evt_interval2_'.$evt['r_i']].' '.$wkDays[$evt['r_p']].' '.$xx['of'].' '.($evt['r_m'] ? $months[$evt['r_m']-1] : $xx['evt_each_month']);
		}
		if ($evt['r_t'] > 0 and $evt['r_u']) {
			$repeat .= ' '.$xx['evt_until'].' '.IDtoDD($evt['r_u']);
		}
		if ($set['eventColor']) {
			$eColor = ($evt['cco'] ? 'color:'.$evt['cco'].';' : '').($evt['cbg'] ? 'background-color:'.$evt['cbg'].';' : '');
		} else {
			$eColor = $evt['uco'] ? 'background-color:'.$evt['uco'].';' : '';
		}
		$eStyle = $eColor ? ' style="'.$eColor.'"' : '';
		$changeList .= "<table><tr><td width=\"100px\">";
		$changeList .= ($evt['sts'] < 0) ? $xx['chg_deleted'] : ($evt['mda'] > $evt['ada'] ? $xx['chg_edited'] : $xx['chg_added']);
		$changeList .= "&nbsp;&nbsp;&nbsp;&nbsp;</td><td>";
		$changeList .= "<span".$eStyle.'><b>'.$evt['tit']."</b></span><br>\n";
		$changeList .= IDtoDD($evt['sda']);
		if ($evt['sti']) $changeList .= ' '.$xx['at_time'].' '.ITtoDT($evt['sti']);
		if ($evt['eda'] or $evt['eti']) $changeList .= ' -';
		if ($evt['eda']) $changeList .= ' '.IDtoDD($evt['eda']);
		if ($evt['eda'] and $evt['eti']) $changeList .= ' '.$ax['at_time'];
		if ($evt['eti']) $changeList .= ' '.ITtoDT($evt['eti']);
		$changeList .= (($evt['sti'] == '' and $evt['eti'] == '') ? ' '.$xx['vws_all_day'] : '').$repeat."<br>";
		if ($evt['ven']) { $changeList .= $xx['vws_venue'].': '.$evt['ven']."<br>\n"; }
		if ($evt['des']) { $changeList .= $evt['des']."<br>\n"; }
		if ($evt['rem'] >= 0) { $changeList .= '# '.$xx['chg_notify'].': '.$evt['rem'].' '.$xx['chg_days']." #<br>\n"; }
		$changeList .= $xx['vws_added'].': '.IDtoDD($evt['ada']).' ('.$evt['una'].")<br>\n";
		if ($evt['mda'] and $evt['edr']) { $changeList .= $xx['vws_edited'].': '.IDtoDD($evt['mda']).' ('.$evt['edr'].")<br>\n"; }
		$changeList .= "</td></tr></table><br>\n";
	}
	return $changeList;
}

function sendChanges($msgText) { //send email(s) with calendar changes
	global $set, $period, $xx;

	$sentTo = '';
	if ($set['chgEmailList']) { //email address(es) to notify
		$subject = $set['calendarTitle']." - ".$xx['chg_changes'].": ".$period;
		$sentTo = sendMail($subject, $msgText, $set['chgEmailList']);
	}
	return $sentTo;
}


//main program

//sanity check
if (!defined('LCC')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only

//initialize
$sentTo = '';
$evtList = array();
$fromD = date("Y-m-d", mktime(12,0,0) - $set['chgNofDays'] * 86400); //start date
$emlText =
"<html>
<head>\n<title>".$set['calendarTitle']." mailer</title>
<style type='text/css'>
body, p, table {".$emlStyle."}
h5 {font-size:13px;}
td {vertical-align:top;}
</style>
</head>
<body>
";

grabChanges($fromD,1); //query db for changes

$changes = 0;
foreach($evtList as $chDate => &$events) {
	$emlText .= '<h5>'.$xx['chg_changed_on'].' '.makeD($chDate,5)."</h5>\n";
	$emlText .= makeGrid($events);
	$changes += count($events);
}
if ($changes) {
	$period = ($fromD != date('Y-m-d')) ? makeD($fromD,2)." - ".makeD(date('Y-m-d'),2) : makeD(date('Y-m-d'),2);
	$emlText .=
	"<p><a href=\"".$set['calendarUrl']."\">".$xx['evt_open_calendar']."</a></p>
	</body>
	</html>
	";
	$sentTo = sendChanges($emlText);
}

$sumName = "-- ".$ax['sch_sum_title']." --";
$sumText = $ax['sch_nr_changes_last']." ".$set['chgNofDays']." ".$ax['sch_days'].": ".$changes."\n";
$sumText .= $sentTo ? $ax['sch_report_sent_to'].":\n".$sentTo : $ax['sch_no_report_sent'].".\n";
?>
