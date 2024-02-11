<?php
/*
= check calendar for email reminders to be send =

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

-------------------------------------------------------------------
 This script depends on and is executed via the file lcalcron.php.
 See lcalcron.php header for details.
-------------------------------------------------------------------

This file is part of the LuxCal Web Calendar.

 --------- THIS SCRIPT USES THE FOLLOWING CALENDAR SETTINGS --------
calendarEmail: Email source ("from") for notification messages
calendarTitle: The calendar title is part of the reminder email
calendarUrl: A calendar hyperlink is added to the reminder email
eventColor: Specifies event colors (0:user color, 1:cat color)
 -------------------------------------------------------------------
*/

$emlStyle = "background:#FFFFDD; color:#000099; font:12px arial, sans-serif;"; //email body style definition

//
//Send email notification
//
function notify(&$evt,$date,$daysDue) {
global $emlStyle, $count, $set, $mailSent, $xx, $ax, $todayD00;

	//compose email message
	$dateTime = IDtoDD($date).' '.$xx['at_time'].' '.(($evt['sti'] or $evt['eti']) ? ITtoDT($evt['sti']) : $ax['not_all_day']);
	if ($evt['eti']) { $dateTime .= " - ".ITtoDT($evt['eti']); }
	$status = '';
	if ($evt['ch1']) { $status .= $evt['la1'].': '.(strpos($evt['chk'], $date.'a') ? $evt['mk1'] : '- -').'&nbsp;&nbsp;'; }
	if ($evt['ch2']) { $status .= $evt['la2'].': '.(strpos($evt['chk'], $date.'b') ? $evt['mk2'] : '- -'); }
	$subject = $set['calendarTitle']." - ".$ax['not_due_in']." ".$daysDue." ".$ax['not_days'].": ".$evt['tit'];
	if ($set['eventColor']) {
		$eColor = ($evt['cco'] ? 'color:'.$evt['cco'].';' : '').($evt['cbg'] ? 'background-color:'.$evt['cbg'].';' : '');
	} else {
		$eColor = $evt['uco'] ? 'background-color:'.$evt['uco'].';' : '';
	}
	$eStyle = $eColor ? ' style="'.$eColor.'"' : '';
	if ($set['showAdEd']) {
		$adEdData = '<tr><td>'.$xx['vws_added'].':</td><td>'.IDtoDD($evt['ada']).' ('.$evt['una'].')'."</td></tr>\n";
		if ($evt['mda'] and $evt['edr']) { $adEdData .= '<tr><td>'.$xx['vws_edited'].':</td><td>'.IDtoDD($evt['mda']).' ('.$evt['edr'].')'."</td></tr>\n"; }
	} else {
		$adEdData = '';
	}
	$msgText = "
<html>
<head>\n<title>".$set['calendarTitle']." ".$ax['not_mailer']."</title>
<style type='text/css'>
body, p, table {".$emlStyle."}
td {vertical-align:top;}
</style>
</head>
<body>
<p>".$set['calendarTitle']." ".$ax['not_mailer']." ".IDtoDD($todayD00)."</p>
<p>".$ax['not_event_due_in']." ".$daysDue." ".$ax['not_days'].":</p>
<table>
	<tr><td>".$ax['not_title'].":</td><td><b><span".$eStyle.">".$evt['tit']."</span></b></td></tr>
	".(($evt['ch1'] or $evt['ch2']) ? '<tr><td>'.$ax['not_status'].':</td><td>'.$status.'</td></tr>' : '')."
	<tr><td>".$ax['not_category'].":</td><td>".$evt['cnm']."</td></tr>
	<tr><td>".$ax['not_date_time'].":</td><td>".$dateTime."</td></tr>
	<tr><td>".$ax['not_venue'].":</td><td>".(($evt['ven']) ? $evt['ven'] : "- -")."</td></tr>
	<tr><td>".$ax['not_description'].":</td><td>".(($evt['des']) ? $evt['des'] : "- -")."</td></tr>
".$adEdData."
</table>
<p><a href=\"".$set['calendarUrl']."\">".$ax['not_open_calendar']."</a></p>
</body>
</html>
";
	//send notifications
	$sender = $set['notifSender'] ? $evt['uid'] : 0;
	$sentTo = sendMail($subject, $msgText, $evt['rml'], $sender);
	$sentTo = str_replace("\n", ' - '.$ax['not_subject'].': '.$subject."\n", $sentTo);
	return $sentTo;
}


//main program

//sanity check
if (!defined('LCC')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only

//initialize
$todayT = mktime(12,0,0); //12:00
$todayD00 = date("Y-m-d", $todayT); //today
$todayD30 = date("Y-m-d", $todayT + 2592000); //today + 30 days
$count = 0;
$sentTo = '';

//set filter
$filter = 'notify >= 0';

//set session params
$_SESSION['uid'] = 0; //all users

//retrieve and process events
retrieve($todayD00,$todayD30,'',$filter);

if ($evtList) {
	foreach($evtList as $date => &$events) {
		$daysDue = round((mktime(12,0,0,substr($date,5,2),substr($date,8,2),substr($date,0,4)) - $todayT) / 86400);
		foreach ($events as $evt) {
			if (($daysDue == $evt['rem'] or $date == $todayD00) and $evt['rml']) { //due and mail adresses to notify
				$sentTo = notify($evt,$date,$daysDue); //send reminder email
			}
		}
	}
}

$sumName = "-- ".$ax['not_sum_title']." --";
$sumText = $sentTo ? $ax['not_not_sent_to'].":\n".$sentTo : $ax['not_no_not_dates_due'].".\n";
?>
