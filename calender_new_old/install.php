<?php
/*
= LuxCal event calendar installation script =

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

//Get LuxCal configuration version
if (!isset($_REQUEST['lcv'])) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via index only
$lcv = $_REQUEST['lcv'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>LuxCal Event Calendar - Installation</title>
<link rel="stylesheet" type="text/css" href="css/css.php"/>
</head>

<body>
<header>
<h4>Operations  Event Calendar</h4>
</header>

<div class="navBar">&nbsp;</div>
<div class="content">
<br><br><br>
<?php
//sanity check
if (version_compare(PHP_VERSION, '5.1.0') < 0) { //check PHP version
	exit('<br><br><b>Wrong PHP version</b><br><br>You need version 5.1.0 or higher<br>Your current version is: '.PHP_VERSION);
}
require 'common/toolbox.php';
if (!isset($_POST['install'])) {
?>
<aside class="aside">
<h4>Instructions</h4>
<p>Note that after successful installation:</p>
<ul>
<li>the MySQL Database Credentials are stored in encrypted form in the file 
called <kbd>lcaldbc.dat</kbd> in the calendar root directory</li>
<li>the Calendar Data, together with the default calendar settings, are stored 
in the database table <kbd>settings</kbd></li>
<li>the Administrator Data are used to create the user account for the calendar 
administrator</li>
</ul>
<p>All data can be changed later by the calendar administrator.</p>
<br>
<p>Enter in the <b>database server</b> field the name of the server hosting the 
database. This could for example be 'localhost'.</p>
<p>The <b>database name</b>, <b>username</b> and <b>password</b> are the values 
used when the database was created on the server. If the values are entered 
incorrectly, this installation script will not be able to create the database 
tables and the installation will fail.</p>
<p>The <b>database prefix</b> is optional. It is a text string which will be 
added to the beginning of each database table name. This may be useful if you 
want to share the database for more than one calendar installation or with other 
applications. Only lowercase alphanumeric characters are allowed, optionally 
followed by an underscore character. The default string will be "" (no prefix).
</p>
<br>
<p>The <b>calendar title</b> will later be displayed in the header of the 
various calendar views.</p>
<p>The <b>calendar url</b> will be used for notification purposes.</p>
<br>
<p>The <b>administrator name</b>, <b>email</b> and <b>password</b> must be 
remembered. They will be required later to log in to the calendar.</p>
</aside>
<?php
}
echo '<div class="centerBox">'."\n";
echo '<h3>Calendar Configuration and Installation</h3><br><br>'."\n";
if (isset($_POST['install'])) {
	do {
		$error_msg = array();
		//check for missing/invalid fields
		if (!$_POST['dbHost']) $error_msg[] = "server name";
		if (!$_POST['dbName']) $error_msg[] = "database name";
		if (!$_POST['dbUnam']) $error_msg[] = "database username";
		if ($_POST['dbPfix'] and !preg_match("/^[a-z0-9]+_?$/",$_POST['dbPfix'])) $error_msg[] = "database prefix invalid";
		if (!$_POST['title']) $error_msg[] = "calendar title";
		if (!$_POST['adminUname']) $error_msg[] = "administrator username";
		if (!$_POST['adminEmail']) $error_msg[] = "administrator email";
		if (!$_POST['adminPword']) $error_msg[] = "administrator password";
		if ($error_msg) {
			echo "<br><br><h5 class=\"hilight\">Error: Missing / Invalid Fields</h5><br><br>\n";
			echo "<p>The following fields are missing or not valid:</p>";
			echo "<ul>\n";
			for($i=0; $error_msg[$i]; $i++)  {
				echo '<li class="hilight">'.$error_msg[$i]."</li>\n";
			}
			echo "</ul>\n";
			echo "<br><p>Please go <button type=\"button\" onclick=\"history.back()\">back</button> and complete/update these fields.</p>\n";
			break;
		}
		//Connect to Database
		if (!$_POST['dbPwrd']) {
			$link = mysqli_connect ($_POST['dbHost'], $_POST['dbUnam']);
		} else {
			$link = mysqli_connect ($_POST['dbHost'], $_POST['dbUnam'], $_POST['dbPwrd']);
		}
		if (!$link) {
			echo "<br><h5 class=\"hilight\">Error: Unable to connect to MySQL</h5><br>\n";
			echo "<p>Unable to connect to the database server, please go <button type=\"button\" onclick=\"history.back()\">back</button> and check the database server, username and password</p>.\n";
			break;
		}
		$connect = mysqli_select_db($_POST['dbName'],$link);
		if (!$connect) {
			echo "<br><h5 class=\"hilight\">Error: Unable to select the database</h5><br>\n";
			echo "<p>Unable to select the database ".$_POST['dbName'].", please go <button type=\"button\" onclick=\"history.back()\">back</button> and check the database name</p>.\n";
			break;
		}
		//check for existing installation
		$rSet1 = mysqli_query($conn,"SELECT count(*) FROM ".$_POST['dbPfix']."events");
		$rSet2 = mysqli_query($conn,"SELECT count(*) FROM ".$_POST['dbPfix']."categories");
		$rSet3 = mysqli_query($conn,"SELECT count(*) FROM ".$_POST['dbPfix']."users");
		$rSet4 = mysqli_query($conn,"SELECT count(*) FROM ".$_POST['dbPfix']."settings");
		if ($rSet1 or $rSet2 or $rSet3 or $rSet4) {
			echo "<br><h5 class=\"hilight\">Error: Existing Calendar in database</h5><br>\n";
			echo "<p>There exists already a calendar in the database with this name, please go <button type=\"button\" onclick=\"history.back()\">back</button> and remove all tables of the existing calendar.</p>\n";
			break;
		}
		//check file permissions before creating db tables
		if (file_put_contents('./lctest.dat','LuxCal') === false) { // write test file
			echo "<br><h5 class=\"hilight\">Error: Unable to write file</h5><br>\n";
			echo "<p>Unable to write to the calendar's root directory, please go <button type=\"button\" onclick=\"history.back()\">back</button> and check file permissions on your server.</p>\n";
			break;
		}
		unlink('./lctest.dat'); // delete test file
		//create database tables
		$users = mysqli_query($conn,"CREATE TABLE ".$_POST['dbPfix']."users (
			user_id INT(6) unsigned NOT NULL AUTO_INCREMENT,
			user_name VARCHAR(32) NOT NULL DEFAULT '',
			password VARCHAR(32) NOT NULL DEFAULT '',
			temp_password VARCHAR(32) DEFAULT NULL,
			email VARCHAR(64) NOT NULL DEFAULT '',
			sedit TINYINT(1) unsigned NOT NULL DEFAULT '0',
			privs TINYINT(1) unsigned NOT NULL DEFAULT '0',
			login_0 DATE NOT NULL DEFAULT '9999-00-00',
			login_1 DATE NOT NULL DEFAULT '9999-00-00',
			login_cnt INT(8) NOT NULL DEFAULT '0',
			language VARCHAR(32) DEFAULT NULL,
			color VARCHAR(10) DEFAULT NULL,
			status TINYINT(1) NOT NULL DEFAULT '0',
			PRIMARY KEY (user_id)
			)");
		$categories = mysqli_query($conn,"CREATE TABLE ".$_POST['dbPfix']."categories (
			category_id INT(4) unsigned NOT NULL AUTO_INCREMENT,
			name VARCHAR(40) NOT NULL DEFAULT '',
			sequence INT(2) unsigned NOT NULL DEFAULT '1',
			rpeat TINYINT(1) unsigned NOT NULL DEFAULT '0',
			public TINYINT(1) unsigned NOT NULL DEFAULT '1',
			color VARCHAR(10) DEFAULT NULL,
			background VARCHAR(10) DEFAULT NULL,
			check1 TINYINT(1) unsigned NOT NULL DEFAULT '0',
			label1 VARCHAR(40) NOT NULL DEFAULT 'approved',
			mark1 VARCHAR(10) NOT NULL DEFAULT 'ok',
			check2 TINYINT(1) unsigned NOT NULL DEFAULT '0',
			label2 VARCHAR(40) NOT NULL DEFAULT 'complete',
			mark2 VARCHAR(10) NOT NULL DEFAULT '&#10003;',
			status TINYINT(1) NOT NULL DEFAULT '0',
			PRIMARY KEY (category_id)
			)");
		$events = mysqli_query($conn,"CREATE TABLE ".$_POST['dbPfix']."events (
			event_id INT(8) unsigned NOT NULL AUTO_INCREMENT,
			event_type TINYINT(1) unsigned NOT NULL DEFAULT '0',
			title VARCHAR(64) DEFAULT NULL,
			description TEXT DEFAULT NULL,
			category_id INT(4) unsigned NOT NULL DEFAULT '1',
			venue VARCHAR(64) DEFAULT NULL,
			user_id INT(6) unsigned DEFAULT NULL,
			editor VARCHAR(32) NOT NULL DEFAULT '',
			private TINYINT(1) unsigned NOT NULL DEFAULT '0',
			checked TEXT DEFAULT NULL,
			s_date DATE DEFAULT NULL,
			e_date DATE NOT NULL DEFAULT '9999-00-00',
			x_dates TEXT DEFAULT NULL,
			s_time TIME DEFAULT NULL,
			e_time TIME NOT NULL DEFAULT '99:00:00',
			r_type TINYINT(1) unsigned NOT NULL DEFAULT '0',
			r_interval TINYINT(1) unsigned NOT NULL DEFAULT '0',
			r_period TINYINT(1) unsigned NOT NULL DEFAULT '0',
			r_month TINYINT(1) unsigned NOT NULL DEFAULT '0',
			r_until DATE NOT NULL DEFAULT '9999-00-00',
			notify TINYINT(1) NOT NULL DEFAULT '-1',
			not_mail VARCHAR(255) DEFAULT NULL,
			a_date DATE NOT NULL DEFAULT '9999-00-00',
			m_date DATE NOT NULL DEFAULT '9999-00-00',
			status TINYINT(1) NOT NULL DEFAULT '0',
			PRIMARY KEY (event_id)
			)");
		$settings = mysqli_query($conn,"CREATE TABLE ".$_POST['dbPfix']."settings (
			name VARCHAR(15) NOT NULL DEFAULT '',
			value TEXT DEFAULT NULL,
			description TEXT DEFAULT NULL
			)");

		if (!$users or !$categories or !$events or !$settings) {
			echo "<br><h5 class=\"hilight\">Error: Problem creating tables</h5><br>\n";
			echo "<p>Can not create database tables, please check your database permissions and go <button type=\"button\" onclick=\"history.back()\">back</button> to try again.</p>\n";
			break;
		}
		//insert initial data
		$crypt_pw=md5($_POST['adminPword']);
		$category = mysqli_query($conn,"INSERT INTO ".$_POST['dbPfix']."categories (category_id, name, sequence) VALUES (1,'no cat',1)");
		$public_user = mysqli_query($conn,"INSERT INTO ".$_POST['dbPfix']."users (user_id, user_name, email, privs) VALUES (1,'Public Access',' ',1)");
		$admin_user = mysqli_query($conn,"INSERT INTO ".$_POST['dbPfix']."users (user_id, user_name, email, password, sedit, privs) VALUES (NULL,'".$_POST['adminUname']."','".$_POST['adminEmail']."','".$crypt_pw."',1,3)");
		if (!$category or !$public_user or !$admin_user) {
			echo "<br><h5 class=\"hilight\">Error: Problem writing to tables</h5><br>\n";
			echo "<p>Created tables, but can not write to tables. Please check your database permissions. You will need to clean out the tables in the database and try again.</p>\n";
			break;
		}

		//save database credentials
		$dbCrHdr = "LuxCal\n".$lcv."\n";
		$dbCreds = ciph(serialize(array($_POST['dbHost'], $_POST['dbName'], $_POST['dbUnam'], $_POST['dbPwrd'], $_POST['dbPfix'])));
		if (file_put_contents('./lcaldbc.dat',$dbCrHdr.$dbCreds) === false) {
			echo "<br><h5 class=\"hilight\">Error: Unable to write to disk</h5><br>\n";
			echo "<p>Unable to write the lcaldbc.dat file to the calendar root directory, please go <button type=\"button\" onclick=\"history.back()\">back</button> and check the permissions of the calendar's root directory (should be 755).</p>\n";
			break;
		}
//		chmod('./lcaldbc.dat',0600); //invisible to visitors
		
		//create empty mysql.log
		if (file_put_contents('./logs/mysql.log','') === false) {
			echo "<br><h5 class=\"hilight\">Error: Unable to write to disk</h5><br>\n";
			echo "<p>Unable to write an empty mysql.log file to the /logs directory, please go <button type=\"button\" onclick=\"history.back()\">back</button> and check the permissions of the calendar's /logs directory (should be 755).</p>\n";
			break;
		}

		//save calendar settings in database
		$settings = mysqli_query($conn,"INSERT INTO ".$_POST['dbPfix']."settings VALUES
			('calendarTitle','".mysqli_real_escape_string($conn,stripslashes($_POST['title']))."','Calendar title displayed in the top bar'),
			('calendarUrl','".mysqli_real_escape_string($conn,stripslashes($_POST['url']))."','Calendar location (URL)'),
			('calendarEmail','".mysqli_real_escape_string($conn,stripslashes($_POST['adminEmail']))."','Sender in and receiver of email notifications'),
			('timeZone','Europe/Amsterdam','Calendar time zone'),
			('chgEmailList','','Destin. email addresses for calendar changes'),
			('chgNofDays','1','Number of days to look back for calendar changes'),
			('notifSender','0','Sender of notification emails (0:calendar 1:user)'),
			('adminCronSum','1','Send cron job summary to admin (0:no, 1:yes)'),
			('details4All','1','Show event details to all users (0:no 1:yes)'),
			('rssFeed','1','Display RSS feed links in footer and HTML head (0:no 1:yes)'),
			('eventExp','0','Number of days after due when an event expires / can be deleted (0:never)'),
			('cookieExp','30','Number of days before a Remember Me cookie expires'),
			('userMenu','0','Display user filter menu'),
			('catMenu','1','Display category filter menu'),
			('langMenu','0','Display ui-language selection menu'),
			('defaultView','2','Calendar view at start-up (1:year, 2:month, 3:work month, 4:week, 5:work week 6:day, 7:upcoming, 8:changes)'),
			('language','English','Default user interface language'),
			('selfReg','0','Self-registration (0:no, 1:yes)'),
			('selfRegPrivs','1','Self-reg rights (1:view, 2:post self, 3:post all)'),
			('selfRegNot','0','User self-reg notification to admin (0:no, 1:yes)'),
			('maxNoLogin','0','Number of days not logged in, before deleting user account (0:never delete)'),
			('miniCalView','1','Mini calendar view (1:full month, 2:work month)'),
			('miniCalPost','0','Mini calendar event posting (0:no, 1:yes)'),
			('miniCalHBox','1','Mini calendar event hover box (0:no, 1:yes)'),
			('sideBarHBox','1','Sidebar event hover box (0:no, 1:yes)'),
			('showLinkInSB','1','Show URL-links in sidebar (0:no, 1:yes)'),
			('sideBarDays','14','Days to look ahead in sidebar'),
			('yearStart','0','Start month in year view (1-12 or 0, 0:current month)'),
			('colsToShow','3','Number of months to show per row in year view'),
			('rowsToShow','4','Number of rows to show in year view'),
			('weeksToShow','10','Number of weeks to show in month view'),
			('workWeekDays','12345','Days to show in work weeks (1:mo - 7:su)'),
			('lookaheadDays','14','Days to look ahead in upcoming view, todo list and RSS feeds'),
			('dwStartHour','6','Day/week view start hour'),
			('dwEndHour','18','Day/week view end hour'),
			('dwTimeSlot','30','Day/week time slot in minutes'),
			('dwTsHeight','20','Day/week time slot height in pixels'),
			('eventHBox','1','Event details hover box (0:no, 1:yes)'),
			('showAdEd','1','Show date/user added/edited (0:no, 1:yes)'),
			('showCatName','1','Show cat name in various views (0:no, 1:yes)'),
			('showLinkInMV','1','Show URL-links in month view (0:no, 1:yes)'),
			('eventColor','1','Event colors (0:user color, 1:cat color)'),
			('dateFormat','d.m.y','Date format: yyyy-mm-dd (y:yyyy, m:mm, d:dd)'),
			('MdFormat','d M','Date format: dd month (d:dd, M:month)'),
			('MdyFormat','d M y','Date format: dd month yyyy (d:dd, M:month, y:yyyy)'),
			('MyFormat','M y','Date format: month yyyy (M:month, y:yyyy)'),
			('DMdFormat','WD d M','Date format: weekday dd month (WD:weekday d:dd, M:month)'),
			('DMdyFormat','WD d M y','Date format: weekday dd month yyyy (WD:weekday d:dd, M:month, y:yyyy)'),
			('timeFormat','h:m','Time format (h:hh, m:mm, a:am|pm, A:AM|PM)'),
			('weekStart','1','Week starts on Sunday(0) or Monday(1)'),
			('weekNumber','1','Week numbers on(1) or off(0)')
		");
		if ($settings === false) {
			echo "<br><h5 class=\"hilight\">Error: Unable to save settings</h5><br>\n";
			echo "<p>Unable to save default calendar settings in the database table Settings. Check database credentials.</p>\n";
			break;
		}
			
		//installation successul
		echo "<h3>Installation Successful</h3>\n";
		echo "<ol>\n";
		echo "<li>The database has been created successfully and the default calendar <br>settings have been saved in the table <kbd>settings</kbd></li>\n";
		echo "<li>The calender version number and the (encrypted) database credentials have <br>been saved in the file <kbd>lcaldbc.dat</kbd> in the calendar root directory</li>\n";
		echo "</ol>\n";
		echo "<br>";
		echo "<p><strong>Please note that it is good practice to directly . . .</strong></p>\n";
		echo "<p>- back up the database credentials file <kbd>lcaldbc.dat</kbd> in the root directory of the calendar</p>\n";
		echo "<p>- delete the installation file <kbd>install.php</kbd> from the root directory of the calendar</p>\n";
		echo "<p>Log in to the calendar, go to the administration menu (top right) and:</p>\n";
		echo "<p>- on the Settings page set the timeZone to your local time zone</p>\n";
		echo "<p>- on the Settings page choose your preferred settings</p>\n";
		echo "<p>- on the Categories page define a number of useful event categories</p>\n";
		echo "<br>";
		echo "<br><p>Click <strong><button type=\"button\" onclick=\"window.location='".$_POST['url']."'\">here</button></strong> to start the calendar</p>\n";
	} while (false);
	if ($link) { mysql_close($link); }
} else {
	$calURL = $_SERVER['SERVER_NAME'].rtrim(dirname($_SERVER["PHP_SELF"]),'/').'/';
?>

<p>Please enter the following data to install the Event Calendar:</p>
<br>
<div class="floatL">
<form action= "<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
<input type="hidden" name="lcv" value="<?php echo $lcv; ?>"/>
<div class="fieldBox">
<h4 class="hilight floatC">= read instructions =</h4>
<table>
<tr><td colspan="2"><h4>MySQL Database Credentials</h4></td></tr>
<tr><td>Database Server:</td><td><input type="text" name='dbHost'/></td></tr>
<tr><td>Database Name:</td><td><input type="text" name='dbName'/></td></tr>
<tr><td>Database Username:</td><td><input type="text" name='dbUnam'/></td></tr>
<tr><td>Database Password:</td><td><input type="text" name='dbPwrd'/></td></tr>
<tr><td>Database Prefix: (optional)</td><td><input type="text" name='dbPfix'/></td></tr>
<tr><td colspan="2"><br><h4>Calendar Data</h4></td></tr>
<tr><td>Calendar Title:</td><td><input type="text" name="title" value="Kiboslopes operations Calendar"/></td></tr>
<tr><td>Calendar URL:</td><td><input type="text" name="url" size="30" value="http://<?php echo $calURL; ?>"/></td></tr>
<tr><td colspan="2"><br><h4>Administrator Data</h4></td></tr>
<tr><td>Administrator Name:</td><td><input type="text" name="adminUname"/></td></tr>
<tr><td>Administrator Email:</td><td><input type="text" name="adminEmail"/></td></tr>
<tr><td>Administrator Password:</td><td><input type="text" name="adminPword"/></td></tr>
</table>
</div>
<input type="submit" name="install" value="Install"/></form>
<br>
</div>
<?php
}
?>
</div>
</div>
<footer><span class="floatR"> powered by <span class="footLB">Bluerange </span><span class="footLR">Kenya</span></span></footer>
</body>
</html>
