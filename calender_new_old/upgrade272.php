<?php
/*
!!!!!!! THIS SCRIPT IS LAUNCHED WHEN UPGRADING TO A NEWER LUXCAL VERSION !!!!!!!

� Copyright 2009-2012 LuxSoft - www.LuxSoft.eu
*/

//sanity check
if (!defined('LCV')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only

//init checks; if no db connection, connect using config.php
if ($dbPfix === false) { //no db connection
	//connect to database using config.php
	$link = mysqli_connect($hn, $un, $pw) or die ("Could not connect to database, check database credentials in config.php");
	if (!mysqli_select_db($db,$link)) die ("Could not select database $db");
	$dbHost = $hn;
	$dbUnam = $un;
	$dbPwrd = $pw;
	$dbName = $db;
	$dbPfix = $dbPrefix;
}

/*============================= start upgrading ==============================*/

/* ===== As of LuxCal 1.6 ===== */

//Update MySQL database structure and give administrator full rights
//Test for column 'post' - if found, rename it to 'privs' and drop column 'view'
$result = mysqli_query($conn,"SELECT post FROM ".$dbPfix."users");
if ($result) { //column 'post' present - rename 'post' to 'privs'
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."users CHANGE post privs TINYINT(1) UNSIGNED NOT NULL DEFAULT '0'");
	if ($altered) { 
		$result = mysqli_query($conn,"ALTER TABLE ".$dbPfix."users DROP view");
		$result = mysqli_query($conn,"UPDATE ".$dbPfix."users SET privs = 3 WHERE user_id = 2");
	}
}

/* ===== As of LuxCal 2.0 ===== */

//Update database structure for advanced repeat capability
//Add to dates table: a_date (date added), m_date (date modified) and status (<0: deleted)
$result = mysqli_query($conn,"SELECT r_type FROM ".$dbPfix."dates");
if (!$result) { //column 'r_type' not present, create 'repeat' fields
	//add columns for enhanced repeat + deleted field
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."dates 
		ADD r_type TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER e_time,
		ADD r_interval TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER r_type,
		CHANGE recur r_period TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
		ADD r_until DATE NOT NULL DEFAULT '9999-00-00' AFTER r_period,
		ADD a_date DATE NOT NULL DEFAULT '9999-00-00',
		ADD m_date DATE NOT NULL DEFAULT '9999-00-00',
		ADD status TINYINT(1) NOT NULL DEFAULT '0'
	");
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."events
		MODIFY not_mail VARCHAR(255) DEFAULT NULL
	");
	//copy previous repeat values
	$result = mysqli_query($conn,"UPDATE ".$dbPfix."dates SET r_type = 1, r_interval = 1, r_until = e_date, e_date = '9999-00-00' WHERE r_period > 0");
}
//Add column to user table: language (user interface language)
$result = mysqli_query($conn,"SELECT language FROM ".$dbPfix."users");
if (!$result) { //column 'language' not present; create it
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."users
		ADD language VARCHAR(32) DEFAULT NULL
	");
}

/* ===== As of LuxCal 2.1 ===== */

//Add to dates table: Primary key to optimize speed
$result = mysqli_query($conn,"SELECT event_id FROM ".$dbPfix."dates");
if ($result !== false) { //table 'dates' existing
	$flags = mysqli_field_flags($result, 0);
	if (strpos($flags, "primary_key") === false) {
		$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."dates
			ADD PRIMARY KEY (event_id)
		");
	}
}

/* ===== As of LuxCal 2.3 ===== */

//Add columns to users table: login_0 (first login), login_1 (last login) and login_cnt (number of logins)
$result = mysqli_query($conn,"SELECT login_0 FROM ".$dbPfix."users");
if (!$result) { //column 'login_0' not present; create login_0 and login_1
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."users
		ADD login_0 DATE NOT NULL DEFAULT '9999-00-00' AFTER privs,
		ADD login_1 DATE NOT NULL DEFAULT '9999-00-00' AFTER login_0,
		ADD login_cnt INT(8) NOT NULL DEFAULT '0' AFTER login_1
	");
}

/* ===== As of LuxCal 2.4 ===== */

//Add columns to categories table: rpeat (4 = repeat every year), rss_feed (> 0 = include in rss_feeds)
$result = mysqli_query($conn,"SELECT repeat FROM ".$dbPfix."categories");
if (!$result) { //column 'repeat' not present
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."categories
		ADD rpeat TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER sequence,
		ADD rss_feed TINYINT(1) UNSIGNED NOT NULL DEFAULT '1' AFTER rpeat
	");
}
//Add column event_type to events table and change length not_mail field from 256 to 255
$result = mysqli_query($conn,"SELECT event_type FROM ".$dbPfix."events");
if (!$result) { //column 'event_type' not present
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."events
		ADD event_type TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER event_id,
		MODIFY not_mail VARCHAR(255) DEFAULT NULL
	");
}
//Add column status to users table
$result = mysqli_query($conn,"SELECT status FROM ".$dbPfix."users");
if (!$result) { //column 'status' not present
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."users
		ADD status TINYINT(1) NOT NULL DEFAULT '0' AFTER language
	");
}
//In table dates modify column notify: SIGNED and DEFAULT = -1
$result = mysqli_query($conn,"DESCRIBE ".$dbPfix."dates");
if ($result !== false) { //table 'dates' existing
	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['Field'] == 'notify') {
			if ($row['Default'] == 0) {
				$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."dates
					MODIFY notify TINYINT(1) NOT NULL DEFAULT '-1'
				");
				//replace all values '0' by '-1'
				$result = mysqli_query($conn,"UPDATE ".$dbPfix."dates SET notify = -1 WHERE notify = 0");
			}
			break;
		}
	}
}

/* ===== As of LuxCal 2.5 ===== */
//merge the events and the dates table into a single events table
//add fiels from dates table to events table
$result = mysqli_query($conn,"SELECT status FROM ".$dbPfix."events");
if (!$result) { //column 'status' not present, so continue
	//add columns from dates table
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."events
		ADD editor VARCHAR(32) NOT NULL DEFAULT '' AFTER user_id,
		ADD	s_date DATE DEFAULT NULL AFTER private,
		ADD	e_date DATE NOT NULL DEFAULT '9999-00-00' AFTER s_date,
		ADD x_dates TEXT DEFAULT NULL AFTER e_date,
		ADD	s_time TIME DEFAULT NULL AFTER x_dates,
		ADD	e_time TIME NOT NULL DEFAULT '99:00:00' AFTER s_time,
		ADD	r_type TINYINT(1) unsigned NOT NULL DEFAULT '0' AFTER e_time,
		ADD	r_interval TINYINT(1) unsigned NOT NULL DEFAULT '0' AFTER r_type,
		ADD	r_period TINYINT(1) unsigned NOT NULL DEFAULT '0' AFTER r_interval,
		ADD	r_until DATE NOT NULL DEFAULT '9999-00-00' AFTER r_period,
		ADD	notify TINYINT(1) NOT NULL DEFAULT '-1' AFTER r_until,
		ADD	a_date DATE NOT NULL DEFAULT '9999-00-00' AFTER not_mail,
		ADD	m_date DATE NOT NULL DEFAULT '9999-00-00' AFTER a_date,
		ADD	status TINYINT(1) NOT NULL DEFAULT '0' AFTER m_date
	");
	if ($altered) { //columns added successfully
		//copy dates table columns to event table
		$result = mysqli_query($conn,"UPDATE ".$dbPfix."events e,".$dbPfix."dates d
		SET e.s_date = d.s_date,
			e.e_date = d.e_date,
			e.s_time = d.s_time,
			e.e_time = d.e_time,
			e.r_type = d.r_type,
			e.r_interval = d.r_interval,
			e.r_period = d.r_period,
			e.r_until = d.r_until,
			e.notify = d.notify,
			e.a_date = d.a_date,
			e.m_date = d.m_date,
			e.status = d.status
		WHERE e.event_id = d.event_id
		");
		if ($result !== false) { //if copy successful, drop the dates table
			$result = mysqli_query($conn,"DROP TABLE ".$dbPfix."dates");
		}
	}
}
//Test for column 'rss_feed' - if found, rename it to 'public'
$result = mysqli_query($conn,"SELECT rss_feed FROM ".$dbPfix."categories");
if ($result) { //column 'rss_feed' present - rename it to 'public'
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."categories CHANGE rss_feed public TINYINT(1) UNSIGNED NOT NULL DEFAULT '1'");
}
//Add column color to users table
$result = mysqli_query($conn,"SELECT color FROM ".$dbPfix."users");
if (!$result) { //column 'color' not present
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."users
		ADD color VARCHAR(10) DEFAULT NULL AFTER language
	");
}
//Add column status to categories table
$result = mysqli_query($conn,"SELECT status FROM ".$dbPfix."categories");
if (!$result) { //column 'status' not present
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."categories
		ADD status TINYINT(1) NOT NULL DEFAULT '0' AFTER background
	");
}

/* ===== As of LuxCal 2.6 ===== */
//Add column r_month to events table
$result = mysqli_query($conn,"SELECT r_month FROM ".$dbPfix."events");
if (!$result) { //column 'r_month' not present
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."events
		ADD	r_month TINYINT(1) unsigned NOT NULL DEFAULT '0' AFTER r_period
	");
}
//Add table [db]settings to database
$result = mysqli_query($conn,"SHOW TABLES LIKE '".addcslashes($dbPfix,'_')."settings'");
if (mysqli_num_rows($result) == 0) { //table [db]settings not existing
	$result = mysqli_query($conn,"CREATE TABLE ".$dbPfix."settings (
		name varchar(15) NOT NULL DEFAULT '',
		value TEXT DEFAULT NULL,
		description TEXT DEFAULT NULL
		)");
}
//Add columns check1, check2, label1, label2 to categories table
$result = mysqli_query($conn,"SELECT check1 FROM ".$dbPfix."categories");
if (!$result) { //column 'check1' not present
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."categories
			ADD check1 TINYINT(1) unsigned NOT NULL DEFAULT '0' after background,
			ADD label1 VARCHAR(40) NOT NULL DEFAULT 'approved' after check1,
			ADD mark1 VARCHAR(10) NOT NULL DEFAULT 'ok' after label1,
			ADD check2 TINYINT(1) unsigned NOT NULL DEFAULT '0' after mark1,
			ADD label2 VARCHAR(40) NOT NULL DEFAULT 'complete' after check2,
			ADD mark2 VARCHAR(10) NOT NULL DEFAULT '&#10003;' after label2
	");
}
//Add column checked to events table
$result = mysqli_query($conn,"SELECT checked FROM ".$dbPfix."events");
if (!$result) { //column 'checked' not present
	$altered = mysqli_query($conn,"ALTER TABLE ".$dbPfix."events
		ADD checked TEXT DEFAULT NULL AFTER private
	");
}

//Get calendar settings from db
$dbSet = getSettings(); //settings array

//convert 2.7.1 date/time settings to new settings
$ds = isset($dbSet['dateSep']) ? $dbSet['dateSep'] : '.';
if (isset($dbSet['dateFormat'])) {
	switch ($dbSet['dateFormat']) {
	case '1': $dbSet['dateFormat'] = 'd'.$ds.'m'.$ds.'y'; break;
	case '2': $dbSet['dateFormat'] = 'm'.$ds.'d'.$ds.'y'; break;
	case '3': $dbSet['dateFormat'] = 'y'.$ds.'m'.$ds.'d';
	}
}
if (isset($dbSet['dateUSorEU'])) {
	$dbSet['MdFormat'] = $dbSet['dateUSorEU'] == '0' ? 'M d' : 'd M';
	$dbSet['MdyFormat'] = $dbSet['dateUSorEU'] == '0' ? 'M d, y' : 'd M y';
	$dbSet['MyFormat'] = $dbSet['dateUSorEU'] == '0' ? 'M y' : 'M y';
	$dbSet['DMdFormat'] = $dbSet['dateUSorEU'] == '0' ? 'WD, M d' : 'WD d M';
	$dbSet['DMdyFormat'] = $dbSet['dateUSorEU'] == '0' ? 'WD, M d, y' : 'WD d M y';
}
if (isset($dbSet['time24'])) {
	$dbSet['timeFormat'] = $dbSet['time24'] == '0' ? 'h:ma' : 'h.m';
}

//if $dbSet empty, take setting from config.php
if (!isset($dbSet['calendarTitle'])) { $dbSet['calendarTitle'] = $calendarTitle ? $calendarTitle : 'LuxCal Calendar'; }
if (!isset($dbSet['calendarUrl'])) { $dbSet['calendarUrl'] = 'http://'.$_SERVER['SERVER_NAME'].rtrim(dirname($_SERVER["PHP_SELF"]),'/').'/'; }
if (!isset($dbSet['calendarEmail'])) { $dbSet['calendarEmail'] = $calendarEmail ? $calendarEmail : 'calendar@email.com'; }
if (!isset($dbSet['timeZone'])) { $dbSet['timeZone'] = $timeZone ? $timeZone : 'Europe/Amsterdam'; }
if (!isset($dbSet['chgEmailList'])) { $dbSet['chgEmailList'] = $chgEmailList ? $chgEmailList : ''; }
if (!isset($dbSet['chgNofDays'])) { $dbSet['chgNofDays'] = $chgNofDays ? $chgNofDays : 1; }
if (!isset($dbSet['notifSender'])) { $dbSet['notifSender'] = $notifSender ? $notifSender : 0; }
if (!isset($dbSet['adminCronSum'])) { $dbSet['adminCronSum'] = $adminCronSum ? $adminCronSum : 1; }
if (!isset($dbSet['details4All'])) { $dbSet['details4All'] = $details4All ? $details4All : 1; }
if (!isset($dbSet['rssFeed'])) { $dbSet['rssFeed'] = $rssFeed ? $rssFeed : 1; }
if (!isset($dbSet['eventExp'])) { $dbSet['eventExp'] = $eventExp ? $eventExp : 0; }
if (!isset($dbSet['cookieExp'])) { $dbSet['cookieExp'] = $cookieExp ? $cookieExp : 30; }
if (!isset($dbSet['userMenu'])) { $dbSet['userMenu'] = $userMenu ? $userMenu : 1; }
if (!isset($dbSet['catMenu'])) { $dbSet['catMenu'] = $catMenu ? $catMenu : 1; }
if (!isset($dbSet['langMenu'])) { $dbSet['langMenu'] = $langMenu ? $langMenu : 0; }
if (!isset($dbSet['defaultView'])) { $dbSet['defaultView'] = $defaultView ? $defaultView : 2; }
if (!isset($dbSet['language'])) { $dbSet['language'] = $language ? $language : "English"; }
if (!isset($dbSet['selfReg'])) { $dbSet['selfReg'] = $selfReg ? $selfReg : 0; }
if (!isset($dbSet['selfRegPrivs'])) { $dbSet['selfRegPrivs'] = $selfRegPrivs ? $selfRegPrivs : 1; }
if (!isset($dbSet['selfRegNot'])) { $dbSet['selfRegNot'] = $selfRegNot ? $selfRegNot : 0; }
if (!isset($dbSet['maxNoLogin'])) { $dbSet['maxNoLogin'] = $maxNoLogin ? $maxNoLogin : 0; }
if (!isset($dbSet['miniCalView'])) { $dbSet['miniCalView'] = $miniCalView ? $miniCalView : 1; }
if (!isset($dbSet['miniCalPost'])) { $dbSet['miniCalPost'] = $miniCalPost ? $miniCalPost : 0; }
if (!isset($dbSet['miniCalHBox'])) { $dbSet['miniCalHBox'] = $miniCalHBox ? $miniCalHBOx : 1; }
if (!isset($dbSet['sideBarHBox'])) { $dbSet['sideBarHBox'] = $sideBarHBox ? $sideBarHBox : 1; }
if (!isset($dbSet['showLinkInSB'])) { $dbSet['showLinkInSB'] = $showLinkInSB ? $showLinkInSB : 1; }
if (!isset($dbSet['sideBarDays'])) { $dbSet['sideBarDays'] = $sideBarDays ? $sideBarDays : 14; }
if (!isset($dbSet['yearStart'])) { $dbSet['yearStart'] = $yearStart ? $yearStart : 0; }
if (!isset($dbSet['colsToShow'])) { $dbSet['colsToShow'] = $colsToShow ? $colsToShow : 3; }
if (!isset($dbSet['rowsToShow'])) { $dbSet['rowsToShow'] = $rowsToShow ? $rowsToShow : 4; }
if (!isset($dbSet['weeksToShow'])) { $dbSet['weeksToShow'] = $weeksToShow ? $weeksToShow : 10; }
if (!isset($dbSet['workWeekDays'])) { $dbSet['workWeekDays'] = $workWeekDays ? $workWeekDays : '12345'; }
if (!isset($dbSet['lookaheadDays'])) { $dbSet['lookaheadDays'] = $lookaheadDays ? $lookaheadDays : 14; }
if (!isset($dbSet['dwStartHour'])) { $dbSet['dwStartHour'] = $dwStartHour ? $dwStartHour : 6; }
if (!isset($dbSet['dwEndHour'])) { $dbSet['dwEndHour'] = $dwEndHour ? $dwEndHour : 18; }
if (!isset($dbSet['dwTimeSlot'])) { $dbSet['dwTimeSlot'] = $dwTimeSlot ? $dwTimeSlot : 30; }
if (!isset($dbSet['dwTsHeight'])) { $dbSet['dwTsHeight'] = $dwTsHeight ? $dwTsHeight : 20; }
if (!isset($dbSet['eventHBox'])) { $dbSet['eventHBox'] = $eventHBox ? $eventHBox : 1; }
if (!isset($dbSet['showAdEd'])) { $dbSet['showAdEd'] = $showAdEd ? $showAdEd : 1; }
if (!isset($dbSet['showCatName'])) { $dbSet['showCatName'] = $showCatName ? $showCatName : 1; }
if (!isset($dbSet['showLinkInMV'])) { $dbSet['showLinkInMV'] = $showLinkInMV ? $showLinkInMV : 1; }
if (!isset($dbSet['eventColor'])) { $dbSet['eventColor'] = $eventColor ? $eventColor : 1; }
if (!isset($dbSet['dateFormat'])) { $dbSet['dateFormat'] = $dateFormat ? $dateFormat : 'd.m.y'; }
if (!isset($dbSet['MdFormat'])) { $dbSet['MdFormat'] = $MdFormat ? $MdFormat : 'd M'; }
if (!isset($dbSet['MdyFormat'])) { $dbSet['MdyFormat'] = $MdyFormat ? $MdyFormat : 'd M y'; }
if (!isset($dbSet['MyFormat'])) { $dbSet['MyFormat'] = $MyFormat ? $MyFormat : 'M y'; }
if (!isset($dbSet['DMdFormat'])) { $dbSet['DMdFormat'] = $DMdFormat ? $DMdFormat : 'WD d M'; }
if (!isset($dbSet['DMdyFormat'])) { $dbSet['DMdyFormat'] = $DMdyFormat ? $DMdyFormat : 'WD d M y'; }
if (!isset($dbSet['timeFormat'])) { $dbSet['timeFormat'] = $timeFormat ? $timeFormat : 'h:m'; }
if (!isset($dbSet['weekStart'])) { $dbSet['weekStart'] = $weekStart ? $weekStart : 1; }
if (!isset($dbSet['weekNumber'])) { $dbSet['weekNumber'] = $weekNumber ? $weekNumber : 1; }

//Get / encrypt db credentials
if (file_exists('./lcaldbc.dat')) {
	list(,,$dbc) = file('./lcaldbc.dat', FILE_IGNORE_NEW_LINES); //encrypted db credentials
} else {
	$dbc = ciph(serialize(array($dbHost, $dbName, $dbUnam, $dbPwrd, $dbPfix))); //encrypt db credentials
}

//Delete possible settings from database
$result = mysqli_query($conn,"DELETE FROM ".$dbPfix."settings");
if ($result === false) {
	exit('Error: Unable to reset settings in database. Check database credentials.');
}

//Save calendar settings to database
$result = mysqli_query($conn,"INSERT INTO ".$dbPfix."settings VALUES
	('calendarTitle','".mysqli_real_escape_string($conn,$dbSet['calendarTitle'])."','Calendar title displayed in the top bar'),
	('calendarUrl','".mysqli_real_escape_string($conn,$dbSet['calendarUrl'])."','Calendar location (URL)'),
	('calendarEmail','".mysqli_real_escape_string($conn,$dbSet['calendarEmail'])."','Sender in and receiver of email notifications'),
	('timeZone','".mysqli_real_escape_string($conn,$dbSet['timeZone'])."','Calendar time zone'),
	('chgEmailList','".mysqli_real_escape_string($conn,$dbSet['chgEmailList'])."','Destin. email addresses for calendar changes'),
	('chgNofDays','".$dbSet['chgNofDays']."','Number of days to look back for calendar changes'),
	('notifSender','".$dbSet['notifSender']."','Sender of notification emails (0:calendar 1:user)'),
	('adminCronSum','".$dbSet['adminCronSum']."','Send cron job summary to admin (0:no, 1:yes)'),
	('details4All','".$dbSet['details4All']."','Show event details to all users (0:no 1:yes)'),
	('rssFeed','".$dbSet['rssFeed']."','Display RSS feed links in footer and HTML head (0:no 1:yes)'),
	('eventExp','".$dbSet['eventExp']."','Number of days after due when an event expires / can be deleted (0:never)'),
	('cookieExp','".$dbSet['cookieExp']."','Number of days before a Remember Me cookie expires'),
	('userMenu','".$dbSet['userMenu']."','Display user filter menu'),
	('catMenu','".$dbSet['catMenu']."','Display category filter menu'),
	('langMenu','".$dbSet['langMenu']."','Display ui-language selection menu'),
	('defaultView','".$dbSet['defaultView']."','Calendar view at start-up (1:year, 2:month, 3:work month, 4:week, 5:work week 6:day, 7:upcoming, 8:changes)'),
	('language','".$dbSet['language']."','Default user interface language'),
	('selfReg','".$dbSet['selfReg']."','Self-registration (0:no, 1:yes)'),
	('selfRegPrivs','".$dbSet['selfRegPrivs']."','Self-reg rights (1:view, 2:post self, 3:post all)'),
	('selfRegNot','".$dbSet['selfRegNot']."','User self-reg notification to admin (0:no, 1:yes)'),
	('maxNoLogin','".$dbSet['maxNoLogin']."','Number of days not logged in, before deleting user account (0:never delete)'),
	('miniCalView','".$dbSet['miniCalView']."','Mini calendar view (1:full month, 2:work month)'),
	('miniCalPost','".$dbSet['miniCalPost']."','Mini calendar event posting (0:no, 1:yes)'),
	('miniCalHBox','".$dbSet['miniCalHBox']."','Mini calendar event hover box (0:no, 1:yes)'),
	('sideBarHBox','".$dbSet['sideBarHBox']."','Sidebar event hover box (0:no, 1:yes)'),
	('showLinkInSB','".$dbSet['showLinkInSB']."','Show URL-links in sidebar (0:no, 1:yes)'),
	('sideBarDays','".$dbSet['sideBarDays']."','Days to look ahead in sidebar'),
	('yearStart','".$dbSet['yearStart']."','Start month in year view (1-12 or 0, 0:current month)'),
	('colsToShow','".$dbSet['colsToShow']."','Number of months to show per row in year view'),
	('rowsToShow','".$dbSet['rowsToShow']."','Number of rows to show in year view'),
	('weeksToShow','".$dbSet['weeksToShow']."','Number of weeks to show in month view'),
	('workWeekDays','".$dbSet['workWeekDays']."','Days to show in work weeks (1:mo - 7:su)'),
	('lookaheadDays','".$dbSet['lookaheadDays']."','Days to look ahead in upcoming view, todo list and RSS feeds'),
	('dwStartHour','".$dbSet['dwStartHour']."','Day/week view start hour'),
	('dwEndHour','".$dbSet['dwEndHour']."','Day/week view end hour'),
	('dwTimeSlot','".$dbSet['dwTimeSlot']."','Day/week time slot in minutes'),
	('dwTsHeight','".$dbSet['dwTsHeight']."','Day/week time slot height in pixels'),
	('eventHBox','".$dbSet['eventHBox']."','Event details hover box (0:no, 1:yes)'),
	('showAdEd','".$dbSet['showAdEd']."','Show date/user added/edited (0:no, 1:yes)'),
	('showCatName','".$dbSet['showCatName']."','Show cat name in various views (0:no, 1:yes)'),
	('showLinkInMV','".$dbSet['showLinkInMV']."','Show URL-links in month view (0:no, 1:yes)'),
	('eventColor','".$dbSet['eventColor']."','Event colors (0:user color, 1:cat color)'),
	('dateFormat','".$dbSet['dateFormat']."','Date format: yyyy-mm-dd (y:yyyy, m:mm, d:dd)'),
	('MdFormat','".$dbSet['MdFormat']."','Date format: dd month (d:dd, M:month)'),
	('MdyFormat','".$dbSet['MdyFormat']."','Date format: dd month yyyy (d:dd, M:month, y:yyyy)'),
	('MyFormat','".$dbSet['MyFormat']."','Date format: month yyyy (M:month, y:yyyy)'),
	('DMdFormat','".$dbSet['DMdFormat']."','Date format: weekday dd month (WD:weekday d:dd, M:month)'),
	('DMdyFormat','".$dbSet['DMdyFormat']."','Date format: weekday dd month yyyy (WD:weekday d:dd, M:month, y:yyyy)'),
	('timeFormat','".$dbSet['timeFormat']."','Time format (h:hh, m:mm, a:am|pm, A:AM|PM)'),
	('weekStart','".$dbSet['weekStart']."','Week starts on Sunday(0) or Monday(1)'),
	('weekNumber','".$dbSet['weekNumber']."','Week numbers on(1) or off(0)')
");
if ($result === false) { exit('Error: Unable to save settings in database. Check database credentials.'); }

//Save LuxCal version and db credentials to lcaldbc.dat
$dbcHdr = "LuxCal\n".LCV."\n";
if (file_put_contents('./lcaldbc.dat',$dbcHdr.$dbc) == false) {
	exit('Unable to write the file lcaldbc.dat to disk. Check the permissions of the calendar root directory (should be 755).');
}
//chmod('./lcaldbc.dat', 0600); //invisible to visitors

if (isset($_SESSION['settings'])) { unset($_SESSION['settings']); } //force retrieve of settings
if (file_exists('./config.php')) {
	rename('config.php', 'config-backup.php');
	echo '<script>alert ("The calendar has been upgraded.\nThe file \'config.php\' has been renamed to \'config-backup.php\' and is not used any more."); window.location.reload();</script>';
} else {
	echo '<script>alert ("The calendar has been upgraded."); window.location.reload();</script>';
}
exit;
?>
