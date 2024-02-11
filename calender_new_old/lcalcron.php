<?php
/*
= LuxCal event calendar cronjobs =

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file should be executed via a cronjob once a day at 2am user time
============================================================================

It will subsequently start the following scripts:
1. notify.php: 
	Generate email notifications for events for which the user has asked a 
	notification a certain number of days before the due date of the event.

2. sendchg.php:
	If specified on the admin Settings page, send an email with a summary of 
	calendar changes to the email address list specified on the Settings page.
	If setting 'chgNofDays' = 0, NO email with calendar changes will be sent.

3. eventchk.php:
	If specified in the admin Settings, delete events when expired. Events will
	expire when the event's due date + eventExp days have passed.
	If setting 'eventExp' = 0, NO events will be deleted.

4. userchk.php:
	If specified in the admin Settings, delete 'inactive' user accounts.
	If setting 'maxNoLogin' = 0, NO user accounts will be deleted.

---------------------------- CRON JOB SETTINGS -----------------------------
General:
  A cron job is defined by 1) a Time setting and 2) a Command to be executed.
	
Time setting for LuxCal (Unix notation):
  Minute Hour Day Month Weekday
    0     2    *    *      *
Command:
  Ask your provider for the command to execute the script lcalcron.php in
  the root of your calendar installation.
  It should look something like:
  php /home/youraccount/public_html/yoursite.com/calendar/lcalcron.php
	
Notes:
1. If the calendar server and the calendar user are in different time zones,
zones, the time setting should correspond to 2am user time.
2. If you don't use cron jobs and want to start lcacron.php from an external
server, comment out line 57 of this file ("//" at the start of the line).
----------------------------------------------------------------------------

------------- THIS SCRIPT USES THE FOLLOWING CALENDAR SETTINGS -------------
The database credentials : to connect to the calendar database
adminCronSum: Send cron job summary to admin (1 = yes, 0 = no)
timeZone: To get the current time right
chgNofDays: Number of days to look back for changes
eventExp: Number of days after due date when an event can be deleted
maxNoLogin: Number of 'no login' days, before a user account is deleted
calendarTitle: The calendar title is part of the summary header
calendarUrl: The calendar URL is part of the report footer
calendarEmail: The calendar email is the sender of the summary report
----------------------------------------------------------------------------
*/

$cmlStyle = "background:#DDFFFF; color:#000099; font:12px arial, sans-serif;"; //cronmail body style definition

//via cron only, via browser not allowed
if(!empty($_SERVER['REQUEST_METHOD'])){ header("Location: index.php"); exit(); } 

//set working directory
chdir(dirname(__FILE__));

//load toolbox
require 'common/toolbox.php';

//connect to database
$dbPfix = dbConnect();

//get settings from database
$set = getSettings();

//load language files
require './lang/ui-'.strtolower($set['language']).'.php';
require './lang/ai-'.strtolower($set['language']).'.php';

//get retrieve function
require 'common/retrieve.php';

//set timezone
date_default_timezone_set($set['timeZone']);

if ($set['adminCronSum']) { //create summary header
	$msgText = "
<html>
<head>\n<title>".$set['calendarTitle']." ".$ax['cro_sum_header']."</title>
<style type='text/css'>
* {padding:0; margin:0;}
body, p {".$cmlStyle."}
h3 {font-size:14px; font-weight:bold; margin:20px 0px; }
h4 {font-size:12px; font-weight:bold; margin-top:20px;}
</style>
</head>
<body>
<h3>".$set['calendarTitle']."</h3>
<p>=== ".$ax['cro_sum_header']." ~ ".IDtoDD(date("Y-m-d")).' '.$ax['at_time'].' '.date("H:i")." ===</p>
";
} else {
	$msgText = '';//dummy
}

//1 - check for email notifications to be sent
include 'cronjobs/notify.php';
$msgText .= '<h4>'.$sumName."</h4>\n<p>".nl2br(trim($sumText))."</p>\n";

//2 - check for calendar changes
if ($set['chgNofDays'] > 0) {
	include 'cronjobs/sendchg.php';
	$msgText .= '<h4>'.$sumName."</h4>\n<p>".nl2br(trim($sumText))."</p>\n";
}

//3 - check for expired events which can be deleted
if ($set['eventExp'] > 0) {
	include 'cronjobs/eventchk.php';
	$msgText .= '<h4>'.$sumName."</h4>\n<p>".nl2br(trim($sumText))."</p>\n";
}

//4 - check for unused user accounts
if ($set['maxNoLogin'] > 0) {
	include 'cronjobs/userchk.php';
	$msgText .= '<h4>'.$sumName."</h4>\n<p>".nl2br(trim($sumText))."</p>\n";
}

if ($set['adminCronSum']) { //send summary to admin
	$subject = $set['calendarTitle']." ".$ax['cro_sum_header'];
	//add summary trailer
	$msgText .= "
<br>
<p>=== ".$ax['cro_sum_trailer']."  ===</p>
<p><a href=\"".$set['calendarUrl']."\">".$ax['not_open_calendar']."</a></p>
</body>
</html>
";
	//send summary email
	sendMail($subject, $msgText, $set['calendarEmail']);
}
?>