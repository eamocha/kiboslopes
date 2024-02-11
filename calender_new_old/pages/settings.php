<?php
/*
= Change Calendar Settings page =

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

//initialize
$adminLang = (file_exists('lang/ai-'.strtolower($_SESSION['cL']).'.php')) ? $_SESSION['cL'] : "English";
require 'lang/ai-'.strtolower($adminLang).'.php';

$msg = "";

if (!$admin) {
	echo "<p class=\"error\">".$ax['no_way']."</p>\n"; exit;
}

if (isset($_POST["save"])) { //get posted settings
	$calendarTitle = stripslashes(trim($_POST["calendarTitle"]));
	$calendarUrl = stripslashes(trim($_POST["calendarUrl"]));
	$calendarEmail = stripslashes(trim($_POST["calendarEmail"]));
	$timeZone = stripslashes(trim($_POST["timeZone"]));
	$chgEmailList = stripslashes(trim($_POST["chgEmailList"]));
	$chgNofDays = intval($_POST["chgNofDays"]);
	$notifSender = intval($_POST["notifSender"]);
	$adminCronSum = intval($_POST["adminCronSum"]);
	$details4All = intval($_POST["details4All"]);
	$rssFeed = intval($_POST["rssFeed"]);
	$eventExp = intval($_POST["eventExp"]);
	$cookieExp = intval($_POST["cookieExp"]);
	$userMenu = intval($_POST["userMenu"]);
	$catMenu = intval($_POST["catMenu"]);
	$langMenu = intval($_POST["langMenu"]);
	$defaultView = intval($_POST["defaultView"]);
	$language = trim($_POST["language"]);
	$selfReg = intval($_POST["selfReg"]);
	$selfRegPrivs = intval($_POST["selfRegPrivs"]);
	$selfRegNot = intval($_POST["selfRegNot"]);
	$maxNoLogin = intval($_POST["maxNoLogin"]);
	$miniCalView = intval($_POST["miniCalView"]);
	$miniCalPost = intval($_POST["miniCalPost"]);
	$miniCalHBox = intval($_POST["miniCalHBox"]);
	$sideBarHBox = intval($_POST["sideBarHBox"]);
	$showLinkInSB = intval($_POST["showLinkInSB"]);
	$sideBarDays = intval($_POST["sideBarDays"]);
	$yearStart = intval($_POST["yearStart"]);
	$colsToShow = intval($_POST["colsToShow"]);
	$rowsToShow = intval($_POST["rowsToShow"]);
	$weeksToShow = intval($_POST["weeksToShow"]);
	$workWeekDays = trim($_POST["workWeekDays"]);
	$lookaheadDays = intval($_POST["lookaheadDays"]);
	$dwStartHour = intval($_POST["dwStartHour"]);
	$dwEndHour = intval($_POST["dwEndHour"]);
	$dwTimeSlot = intval($_POST["dwTimeSlot"]);
	$dwTsHeight = intval($_POST["dwTsHeight"]);
	$eventHBox = intval($_POST["eventHBox"]);
	$showAdEd = intval($_POST["showAdEd"]);
	$showCatName = intval($_POST["showCatName"]);
	$showLinkInMV = intval($_POST["showLinkInMV"]);
	$eventColor = intval($_POST["eventColor"]);
	$dateFormat = stripslashes(trim($_POST["dateFormat"]));
	$MdFormat = stripslashes(trim($_POST["MdFormat"]));
	$MdyFormat = stripslashes(trim($_POST["MdyFormat"]));
	$MyFormat = stripslashes(trim($_POST["MyFormat"]));
	$DMdFormat = stripslashes(trim($_POST["DMdFormat"]));
	$DMdyFormat = stripslashes(trim($_POST["DMdyFormat"]));
	$timeFormat = stripslashes(trim($_POST["timeFormat"]));
	$weekStart = intval($_POST["weekStart"]);
	$weekNumber = intval($_POST["weekNumber"]);
} else { //get current settings
	$calendarTitle = isset($set['calendarTitle']) ? $set['calendarTitle'] : 'Kibo Calendar';
	$calendarUrl = isset($set['calendarUrl']) ? $set['calendarUrl'] : 'http://'.$_SERVER['SERVER_NAME'].rtrim(dirname($_SERVER["PHP_SELF"]),'/').'/';
	$calendarEmail = isset($set['calendarEmail']) ? $set['calendarEmail'] : 'sales@kiboslopes.com';
	$timeZone = isset($set['timeZone']) ? $set['timeZone'] : 'Africa/Nairobi';
	$chgEmailList = isset($set['chgEmailList']) ? $set['chgEmailList'] : '';
	$chgNofDays = isset($set['chgNofDays']) ? $set['chgNofDays'] : 1;
	$notifSender = isset($set['notifSender']) ? $set['notifSender'] : 0;
	$adminCronSum = isset($set['adminCronSum']) ? $set['adminCronSum'] : 1;
	$details4All = isset($set['details4All']) ? $set['details4All'] : 1;
	$rssFeed = isset($set['rssFeed']) ? $set['rssFeed'] : 1;
	$eventExp = isset($set['eventExp']) ? $set['eventExp'] : 0;
	$cookieExp = isset($set['cookieExp']) ? $set['cookieExp'] : 30;
	$userMenu = isset($set['userMenu']) ? $set['userMenu'] : 1;
	$catMenu = isset($set['catMenu']) ? $set['catMenu'] : 1;
	$langMenu = isset($set['langMenu']) ? $set['langMenu'] : 0;
	$defaultView = isset($set['defaultView']) ? $set['defaultView'] : 2;
	$language = isset($set['language']) ? $set['language'] : 'English';
	$selfReg = isset($set['selfReg']) ? $set['selfReg'] : 0;
	$selfRegPrivs = isset($set['selfRegPrivs']) ? $set['selfRegPrivs'] : 1;
	$selfRegNot = isset($set['selfRegNot']) ? $set['selfRegNot'] : 0;
	$maxNoLogin = isset($set['maxNoLogin']) ? $set['maxNoLogin'] : 0;
	$miniCalView = isset($set['miniCalView']) ? $set['miniCalView'] : 1;
	$miniCalPost = isset($set['miniCalPost']) ? $set['miniCalPost'] : 0;
	$miniCalHBox = isset($set['miniCalHBox']) ? $set['miniCalHBox'] : 1;
	$sideBarHBox = isset($set['sideBarHBox']) ? $set['sideBarHBox'] : 1;
	$showLinkInSB = isset($set['showLinkInSB']) ? $set['showLinkInSB'] : 1;
	$sideBarDays = isset($set['sideBarDays']) ? $set['sideBarDays'] : 14;
	$yearStart = isset($set['yearStart']) ? $set['yearStart'] : 0;
	$colsToShow = isset($set['colsToShow']) ? $set['colsToShow'] : 3;
	$rowsToShow = isset($set['rowsToShow']) ? $set['rowsToShow'] : 4;
	$weeksToShow = isset($set['weeksToShow']) ? $set['weeksToShow'] : 10;
	$workWeekDays = isset($set['workWeekDays']) ? $set['workWeekDays'] : '12345';
	$lookaheadDays = isset($set['lookaheadDays']) ? $set['lookaheadDays'] : 14;
	$dwStartHour = isset($set['dwStartHour']) ? $set['dwStartHour'] : 6;
	$dwEndHour = isset($set['dwEndHour']) ? $set['dwEndHour'] : 18;
	$dwTimeSlot = isset($set['dwTimeSlot']) ? $set['dwTimeSlot'] : 30;
	$dwTsHeight = isset($set['dwTsHeight']) ? $set['dwTsHeight'] : 20;
	$eventHBox = isset($set['eventHBox']) ? $set['eventHBox'] : 1;
	$showAdEd = isset($set['showAdEd']) ? $set['showAdEd'] : 1;
	$showCatName = isset($set['showCatName']) ? $set['showCatName'] : 1;
	$showLinkInMV = isset($set['showLinkInMV']) ? $set['showLinkInMV'] : 1;
	$eventColor = isset($set['eventColor']) ? $set['eventColor'] : 1;
	$dateFormat = isset($set['dateFormat']) ? $set['dateFormat'] : 'd.m.y';
	$MdFormat = isset($set['MdFormat']) ? $set['MdFormat'] : 'd M';
	$MdyFormat = isset($set['MdyFormat']) ? $set['MdyFormat'] : 'd M y';
	$MyFormat = isset($set['MyFormat']) ? $set['MyFormat'] : 'M y';
	$DMdFormat = isset($set['DMdFormat']) ? $set['DMdFormat'] : 'WD d M';
	$DMdyFormat = isset($set['DMdyFormat']) ? $set['DMdyFormat'] : 'WD d M y';
	$timeFormat = isset($set['timeFormat']) ? $set['timeFormat'] : 'h:m';
	$weekStart = isset($set['weekStart']) ? $set['weekStart'] : 1;
	$weekNumber = isset($set['weekNumber']) ? $set['weekNumber'] : 1;
}

$errors = array_fill(0, 23, ''); $i = 0; //init

if (isset($_POST["save"])) { //validate settings
	if (!$calendarTitle) { $errors[$i] = ' class="inputError"'; } $i++;
	if (!$calendarUrl) { $errors[$i] = ' class="inputError"'; } $i++;
	$calendarUrl = preg_replace("%/(index\..{3,4})?$%i", "", trim($calendarUrl))."/";
	if (substr($calendarUrl,0,4) != 'http') { $calendarUrl = 'http://'.$calendarUrl; }
	if (!$calendarEmail or !preg_match($rxEmailX, $calendarEmail)) { $errors[$i] = ' class="inputError"'; } $i++;
	if (!$timeZone) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($chgNofDays < 0 or $chgNofDays > 30) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($eventExp < 0 or $eventExp > 1000) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($cookieExp < 1 or $cookieExp > 365) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($maxNoLogin < 0 or $maxNoLogin > 365) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($sideBarDays < 1 or $sideBarDays > 365) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($yearStart < 0 or $yearStart > 12) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($colsToShow < 1 or $colsToShow > 6) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($rowsToShow < 1 or $rowsToShow > 10) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($weeksToShow != 0 and ($weeksToShow < 2 or $weeksToShow > 20)) { $errors[$i] = ' class="inputError"'; } $i++;
	if (!preg_match("/^[1-7]{1,7}$/", $workWeekDays)) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($lookaheadDays < 1 or $lookaheadDays > 365) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($dwStartHour < 0 or $dwStartHour > 18 or $dwStartHour > ($dwEndHour - 4)) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($dwEndHour > 24 or $dwEndHour < 6 or $dwStartHour > ($dwEndHour - 4)) { $errors[$i] = ' class="inputError"'; } $i++;
	if ($dwTsHeight < 10 or $dwTsHeight > 60) { $errors[$i] = ' class="inputError"'; } $i++;
//the following regexs use lookahead assertion
	if (!preg_match ('%^([ymd])([^\da-zA-Z])(?!\1)([ymd])\2(?!(\1|\3))[ymd]$%',$dateFormat)) { $errors[$i] = ' class="inputError"'; } $i++;
	if (!preg_match ('%^([Md])[^\da-zA-Z]+(?!\1)[Md]$%',$MdFormat)) { $errors[$i] = ' class="inputError"'; } $i++;
	if (!preg_match ('%^([Myd])[^\da-zA-Z]+(?!\1)([Myd])[^\da-zA-Z]+(?!(\1|\2))[Myd]$%',$MdyFormat)) { $errors[$i] = ' class="inputError"'; } $i++;
	if (!preg_match ('%^([My])[^\da-zA-Z]+(?!\1)[My]$%',$MyFormat)) { $errors[$i] = ' class="inputError"'; } $i++;
	if (!preg_match ('%^(WD|[Md])[^\da-zA-Z]+(?!\1)(WD|[Md])[^\da-zA-Z]+(?!(\1|\2))(WD|[Md])$%',$DMdFormat)) { $errors[$i] = ' class="inputError"'; } $i++;
	if (!preg_match ('%^(WD|[Mdy])[^\da-zA-Z]+(?!\1)(WD|[Mdy])[^\da-zA-Z]+(?!(\1|\2))(WD|[Mdy])[^\da-zA-Z]+(?!(\1|\2\3))(WD|[Mdy])$%',$DMdyFormat)) { $errors[$i] = ' class="inputError"'; } $i++;
	if (!preg_match ('%^([hm])[^\da-zA-Z](?!\1)[hm](\s?[aA])?$%',$timeFormat)) { $errors[$i] = ' class="inputError"'; } $i++;
	
	if (!in_array(' class="inputError"',$errors)) { //no errors, save settings in database
		$result = dbQuery("DELETE FROM [db]settings");
		if ($result) {
			$result = dbQuery("INSERT INTO [db]settings VALUES
				('calendarTitle','".mysqli_real_escape_string($conn,$calendarTitle)."','Calendar title displayed in the top bar'),
				('calendarUrl','".mysqli_real_escape_string($conn,$calendarUrl)."','Calendar location (URL)'),
				('calendarEmail','".mysqli_real_escape_string($conn,$calendarEmail)."','Sender in and receiver of email notifications'),
				('timeZone','".mysqli_real_escape_string($conn,$timeZone)."','Calendar time zone'),
				('chgEmailList','".mysqli_real_escape_string($conn,$chgEmailList)."','Destin. email addresses for calendar changes'),
				('chgNofDays','".$chgNofDays."','Number of days to look back for calendar changes'),
				('notifSender','".$notifSender."','Sender of notification emails (0:calendar 1:user)'),
				('adminCronSum','".$adminCronSum."','Send cron job summary to admin (0:no, 1:yes)'),
				('details4All','".$details4All."','Show event details to all users (0:no 1:yes)'),
				('rssFeed','".$rssFeed."','Display RSS feed links in footer and HTML head (0:no 1:yes)'),
				('eventExp','".$eventExp."','Number of days after due when an event expires / can be deleted (0:never)'),
				('cookieExp','".$cookieExp."','Number of days before a Remember Me cookie expires'),
				('userMenu','".$userMenu."','Display user filter menu'),
				('catMenu','".$catMenu."','Display Driver filter menu'),
				('langMenu','".$langMenu."','Display ui-language selection menu'),
				('defaultView','".$defaultView."','Calendar view at start-up (1:year, 2:month, 3:work month, 4:week, 5:work week 6:day, 7:upcoming, 8:changes)'),
				('language','".$language."','Default user interface language'),
				('selfReg','".$selfReg."','Self-registration (0:no, 1:yes)'),
				('selfRegPrivs','".$selfRegPrivs."','Self-reg rights (1:view, 2:post self, 3:post all)'),
				('selfRegNot','".$selfRegNot."','User self-reg notification to admin (0:no, 1:yes)'),
				('maxNoLogin','".$maxNoLogin."','Number of days not logged in, before deleting user account (0:never delete)'),
				('miniCalView','".$miniCalView."','Mini calendar view (1:full month, 2:work month)'),
				('miniCalPost','".$miniCalPost."','Mini calendar event posting (0:no, 1:yes)'),
				('miniCalHBox','".$miniCalHBox."','Mini calendar event hover box (0:no, 1:yes)'),
				('sideBarHBox','".$sideBarHBox."','Sidebar event hover box (0:no, 1:yes)'),
				('showLinkInSB','".$showLinkInSB."','Show URL-links in sidebar (0:no, 1:yes)'),
				('sideBarDays','".$sideBarDays."','Days to look ahead in sidebar'),
				('yearStart','".$yearStart."','Start month in year view (1-12 or 0, 0:current month)'),
				('colsToShow','".$colsToShow."','Number of months to show per row in year view'),
				('rowsToShow','".$rowsToShow."','Number of rows to show in year view'),
				('weeksToShow','".$weeksToShow."','Number of weeks to show in month view'),
				('workWeekDays','".$workWeekDays."','Days to show in work weeks (1:mo - 7:su)'),
				('lookaheadDays','".$lookaheadDays."','Days to look ahead in upcoming view, todo list and RSS feeds'),
				('dwStartHour','".$dwStartHour."','Day/week view start hour'),
				('dwEndHour','".$dwEndHour."','Day/week view end hour'),
				('dwTimeSlot','".$dwTimeSlot."','Day/week time slot in minutes'),
				('dwTsHeight','".$dwTsHeight."','Day/week time slot height in pixels'),
				('eventHBox','".$eventHBox."','Event details hover box (0:no, 1:yes)'),
				('showAdEd','".$showAdEd."','Show event owner (0:no, 1:yes)'),
				('showCatName','".$showCatName."','Show cat name in various views (0:no, 1:yes)'),
				('showLinkInMV','".$showLinkInMV."','Show URL-links in month view (0:no, 1:yes)'),
				('eventColor','".$eventColor."','Event colors (0:user color, 1:cat color)'),
				('dateFormat','".$dateFormat."','Date format: yyyy-mm-dd (y:yyyy, m:mm, d:dd)'),
				('MdFormat','".$MdFormat."','Date format: dd month (d:dd, M:month)'),
				('MdyFormat','".$MdyFormat."','Date format: dd month yyyy (d:dd, M:month, y:yyyy)'),
				('MyFormat','".$MyFormat."','Date format: month yyyy (M:month, y:yyyy)'),
				('DMdFormat','".$DMdFormat."','Date format: weekday dd month (WD:weekday d:dd, M:month)'),
				('DMdyFormat','".$DMdyFormat."','Date format: weekday dd month yyyy (WD:weekday d:dd, M:month, y:yyyy)'),
				('timeFormat','".$timeFormat."','Time format (h:hh, m:mm, a:am|pm, A:AM|PM)'),
				('weekStart','".$weekStart."','Week starts on Sunday(0) or Monday(1)'),
				('weekNumber','".$weekNumber."','Week numbers on(1) or off(0)')
			");
		}
		if ($result) {
			$msg = $ax['set_settings_saved'];
			unset($_SESSION['settings']); //force retrieve of settings
		} else {
			$msg = $ax['set_save_error'];
		}
	} else { //errors found
		$msg .= $ax['set_missing_invalid'];
	}
}

echo "<br><p class=\"error noPrint\">".(($msg) ? $msg : $ax['hover_for_details'])."</p>\n";
?>
<!-- display form fields -->
<form action="index.php" method="post">
<div class="scrollBoxSe">
<div class="centerBox">
<table>
<tr><td><table class="fieldBoxFix">
<?php
$i = 0; //init errors index
echo '<tr><td class="legend" colspan="2">&nbsp;'.$ax['set_general_settings'].'&nbsp;</td></tr>'."\n";
echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['calendarTitle_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['calendarTitle_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="calendarTitle" size="45" value="'.$calendarTitle.'"/></td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['calendarUrl_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['calendarUrl_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="calendarUrl" size="45" value="'.$calendarUrl.'"/></td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['calendarEmail_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['calendarEmail_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="calendarEmail" size="45" value="'.$calendarEmail.'"/></td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['timeZone_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['timeZone_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="timeZone" size="24" value="'.$timeZone.'"/> '.$ax['see'].': <strong>[<a href="http://us3.php.net/manual/en/timezones.php" target="_blank">'.$ax['time_zones'].'</a>]</strong></td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['chgEmailList_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['chgEmailList_label'].":</td>\n";
echo '<td><input type="text" name="chgEmailList" size="45" value="'.$chgEmailList.'"/></td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['chgNofDays_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['chgNofDays_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="chgNofDays" size="1" value="'.$chgNofDays.'"/> (0 - 30)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['notifSender_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['notifSender_label'].":</td>\n";
echo '<td><input type="radio" name="notifSender" value="0"'.($notifSender == 0 ? ' checked="checked"' : '').'/> '.$ax['calendar']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="notifSender" value="1"'.($notifSender == 1 ? ' checked="checked"' : '').'/> '.$ax['user'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['cronSummary_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['cronSummary_label'].":</td>\n";
echo '<td><input type="radio" name="adminCronSum" value="0"'.($adminCronSum == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="adminCronSum" value="1"'.($adminCronSum == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['details4All_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['details4All_label'].":</td>\n";
echo '<td><input type="radio" name="details4All" value="0"'.($details4All == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="details4All" value="1"'.($details4All == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['rssFeed_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['rssFeed_label'].":</td>\n";
echo '<td><input type="radio" name="rssFeed" value="0"'.($rssFeed == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="rssFeed" value="1"'.($rssFeed == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['eventExp_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['eventExp_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="eventExp" size="1" value="'.$eventExp.'"/> (1 - 1000 '.$ax['or'].' 0)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['cookieExp_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['cookieExp_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="cookieExp" size="1" value="'.$cookieExp.'"/> (1 - 365)</td></tr>'."\n";
?>
</table></td></tr>
<tr><td><table class="fieldBoxFix">
<?php
echo '<tr><td class="legend" colspan="2">&nbsp;'.$ax['set_opanel_settings'].'&nbsp;</td></tr>'."\n";
echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['userMenu_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['userMenu_label'].":</td>\n";
echo '<td><input type="radio" name="userMenu" value="0"'.($userMenu == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="userMenu" value="1"'.($userMenu == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['catMenu_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['catMenu_label'].":</td>\n";
echo '<td><input type="radio" name="catMenu" value="0"'.($catMenu == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="catMenu" value="1"'.($catMenu == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['langMenu_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['langMenu_label'].":</td>\n";
echo '<td><input type="radio" name="langMenu" value="0"'.($langMenu == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="langMenu" value="1"'.($langMenu == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['defaultView_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['defaultView_label'].":</td>\n";
echo '<td><select name="defaultView">'."\n";
echo '<option value="1"'.($defaultView == "1" ? ' selected="selected"' : '').'>'.$xx['hdr_year']."</option>\n";
echo '<option value="2"'.($defaultView == "2" ? ' selected="selected"' : '').'>'.$xx['hdr_month_full']."</option>\n";
echo '<option value="3"'.($defaultView == "3" ? ' selected="selected"' : '').'>'.$xx['hdr_month_work']."</option>\n";
echo '<option value="4"'.($defaultView == "4" ? ' selected="selected"' : '').'>'.$xx['hdr_week_full']."</option>\n";
echo '<option value="5"'.($defaultView == "5" ? ' selected="selected"' : '').'>'.$xx['hdr_week_work']."</option>\n";
echo '<option value="6"'.($defaultView == "6" ? ' selected="selected"' : '').'>'.$xx['hdr_day']."</option>\n";
echo '<option value="7"'.($defaultView == "7" ? ' selected="selected"' : '').'>'.$xx['hdr_upcoming']."</option>\n";
echo '<option value="8"'.($defaultView == "8" ? ' selected="selected"' : '').'>'.$xx['hdr_changes']."</option>\n";
echo "</select></td></tr>\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['language_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['language_label'].":</td>\n";
echo '<td><select name="language">'."\n";
	$files = scandir("lang/");
	foreach ($files as $file) {
		if (substr($file, 0, 3) == "ui-") {
			$lang = strtolower(substr($file,3,-4));
			echo '<option value="'.$lang.'"'.(strtolower($language) == $lang ? ' selected="selected"' : '').'>'.ucfirst($lang)."</option>\n";
		}
	}
echo "</select></td></tr>\n";
?>
</table></td></tr>
<tr><td><table class="fieldBoxFix">
<?php
echo '<tr><td class="legend" colspan="2">&nbsp;'.$ax['set_user_settings'].'&nbsp;</td></tr>'."\n";
echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['selfReg_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['selfReg_label'].":</td>\n";
echo '<td><input type="radio" name="selfReg" value="0"'.($selfReg == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="selfReg" value="1"'.($selfReg == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['selfRegPrivs_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['selfRegPrivs_label'].":</td>\n";
echo '<td><input type="radio" name="selfRegPrivs" value="1"'.($selfRegPrivs == 1 ? ' checked="checked"' : '').'/> '.$ax['view']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="selfRegPrivs" value="2"'.($selfRegPrivs == 2 ? ' checked="checked"' : '').'/> '.$ax['post_own']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="selfRegPrivs" value="3"'.($selfRegPrivs == 3 ? ' checked="checked"' : '').'/> '.$ax['post_all']."</td></tr>\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['selfRegNot_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['selfRegNot_label'].":</td>\n";
echo '<td><input type="radio" name="selfRegNot" value="0"'.($selfRegNot == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="selfRegNot" value="1"'.($selfRegNot == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['maxNoLogin_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['maxNoLogin_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="maxNoLogin" size="1" value="'.$maxNoLogin.'"/> (0 - 365)</td></tr>'."\n";
?>
</table></td></tr>
<tr><td><table class="fieldBoxFix">
<?php
echo '<tr><td class="legend" colspan="2">&nbsp;'.$ax['set_minical_settings'].'&nbsp;</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['miniCalView_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['miniCalView_label'].":</td>\n";
echo '<td><select name="miniCalView">'."\n";
echo '<option value="1"'.($miniCalView == "1" ? ' selected="selected"' : '').'>'.$xx['hdr_month_full']."</option>\n";
echo '<option value="2"'.($miniCalView == "2" ? ' selected="selected"' : '').'>'.$xx['hdr_month_work']."</option>\n";
echo "</select></td></tr>\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['miniCalPost_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['miniCalPost_label'].":</td>\n";
echo '<td><input type="radio" name="miniCalPost" value="0"'.($miniCalPost == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="miniCalPost" value="1"'.($miniCalPost == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['miniCalHBox_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['miniCalHBox_label'].":</td>\n";
echo '<td><input type="radio" name="miniCalHBox" value="0"'.($miniCalHBox == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="miniCalHBox" value="1"'.($miniCalHBox == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['sideBarHBox_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['sideBarHBox_label'].":</td>\n";
echo '<td><input type="radio" name="sideBarHBox" value="0"'.($sideBarHBox == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="sideBarHBox" value="1"'.($sideBarHBox == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['showLinkInSB_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['showLinkInSB_label'].":</td>\n";
echo '<td><input type="radio" name="showLinkInSB" value="0"'.($showLinkInSB == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="showLinkInSB" value="1"'.($showLinkInSB == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['sideBarDays_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['sideBarDays_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="sideBarDays" size="1" value="'.$sideBarDays.'"/> (1 - 365)</td></tr>'."\n";
?>
</table></td></tr>
<tr><td><table class="fieldBoxFix">
<?php
echo '<tr><td class="legend" colspan="2">&nbsp;'.$ax['set_view_settings'].'&nbsp;</td></tr>'."\n";
echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['yearStart_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['yearStart_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="yearStart" size="1" value="'.$yearStart.'"/> (1 - 12 '.$ax['or'].' 0)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['colsToShow_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['colsToShow_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="colsToShow" size="1" value="'.$colsToShow.'"/> (1 - 6)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['rowsToShow_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['rowsToShow_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="rowsToShow" size="1" value="'.$rowsToShow.'"/> (1 - 10)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['weeksToShow_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['weeksToShow_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="weeksToShow" size="1" value="'.$weeksToShow.'"/> (2 - 20 '.$ax['or'].' 0)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['workWeekDays_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['workWeekDays_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="workWeekDays" size="5" value="'.$workWeekDays.'"/> (1: '.$wkDays_l[1].', 2: '.$wkDays_l[2].' .... 7: '.$wkDays_l[7].')</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['lookaheadDays_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['lookaheadDays_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="lookaheadDays" size="1" value="'.$lookaheadDays.'"/> (1 - 365)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['dwStartHour_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['dwStartHour_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="dwStartHour" size="1" value="'.$dwStartHour.'"/> (0 - 18)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['dwEndHour_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['dwEndHour_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="dwEndHour" size="1" value="'.$dwEndHour.'"/> (6 - 24)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['dwTimeSlot_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['dwTimeSlot_label'].":</td>\n";
echo '<td><select name="dwTimeSlot">'."\n";
echo '<option value="10"'.($dwTimeSlot == "10" ? ' selected="selected"' : '').'>10</option>'."\n";
echo '<option value="15"'.($dwTimeSlot == "15" ? ' selected="selected"' : '').'>15</option>'."\n";
echo '<option value="20"'.($dwTimeSlot == "20" ? ' selected="selected"' : '').'>20</option>'."\n";
echo '<option value="30"'.($dwTimeSlot == "30" ? ' selected="selected"' : '').'>30</option>'."\n";
echo '<option value="60"'.($dwTimeSlot == "60" ? ' selected="selected"' : '').'>60</option>'."\n";
echo '</select> '.$ax['minutes']."</td></tr>\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['dwTsHeight_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['dwTsHeight_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="dwTsHeight" size="1" value="'.$dwTsHeight.'"/> '.$ax['pixels'].' (10 - 60)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['eventHBox_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['eventHBox_label'].":</td>\n";
echo '<td><input type="radio" name="eventHBox" value="0"'.($eventHBox == 0 ? ' checked="checked"' : '').'/> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="eventHBox" value="1"'.($eventHBox == 1 ? ' checked="checked"' : '').'/> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['showAdEd_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['showAdEd_label'].":</td>\n";
echo '<td><input type="radio" name="showAdEd" value="0"'.($showAdEd == 0 ? ' checked="checked"' : '').'/> '.$ax['no']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="showAdEd" value="1"'.($showAdEd == 1 ? ' checked="checked"' : '').'/> '.$ax['yes'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['showCatName_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['showCatName_label'].":</td>\n";
echo '<td><input type="radio" name="showCatName" value="0"'.($showCatName == 0 ? ' checked="checked"' : '').'/> '.$ax['no']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="showCatName" value="1"'.($showCatName == 1 ? ' checked="checked"' : '').'/> '.$ax['yes'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['showLinkInMV_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['showLinkInMV_label'].":</td>\n";
echo '<td><input type="radio" name="showLinkInMV" value="0"'.($showLinkInMV == 0 ? ' checked="checked"' : '').'/> '.$ax['no']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="showLinkInMV" value="1"'.($showLinkInMV == 1 ? ' checked="checked"' : '').'/> '.$ax['yes'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['eventColor_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['eventColor_label'].":</td>\n";
echo '<td><input type="radio" name="eventColor" value="0"'.($eventColor == 0 ? ' checked="checked"' : '').'/> '.$ax['owner_color']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="eventColor" value="1"'.($eventColor == 1 ? ' checked="checked"' : '').'/> '.$ax['cat_color'].'</td></tr>'."\n";
?>
</table></td></tr>
<tr><td><table class="fieldBoxFix">
<?php
echo '<tr><td class="legend" colspan="2">&nbsp;'.$ax['set_dt_settings'].'&nbsp;</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['dateFormat_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['dateFormat_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="dateFormat" size="3" value="'.$dateFormat.'"/> ('.$ax['dateFormat_expl'].')</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['MdFormat_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['MdFormat_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="MdFormat" size="3" value="'.$MdFormat.'"/> ('.$ax['MdFormat_expl'].')</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['MdyFormat_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['MdyFormat_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="MdyFormat" size="3" value="'.$MdyFormat.'"/> ('.$ax['MdyFormat_expl'].')</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['MyFormat_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['MyFormat_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="MyFormat" size="3" value="'.$MyFormat.'"/> ('.$ax['MyFormat_expl'].')</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['DMdFormat_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['DMdFormat_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="DMdFormat" size="7" value="'.$DMdFormat.'"/> ('.$ax['DMdFormat_expl'].')</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['DMdyFormat_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['DMdyFormat_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="DMdyFormat" size="7" value="'.$DMdyFormat.'"/> ('.$ax['DMdyFormat_expl'].')</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['timeFormat_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['timeFormat_label'].":</td>\n";
echo '<td><input type="text"'.$errors[$i++].' name="timeFormat" size="3" value="'.$timeFormat.'"/> ('.$ax['timeFormat_expl'].')</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['weekStart_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['weekStart_label'].":</td>\n";
echo '<td><input type="radio" name="weekStart" value="0"'.($weekStart == 0 ? ' checked="checked"' : '').'/> '.$ax['sunday']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="weekStart" value="1"'.($weekStart == 1 ? ' checked="checked"' : '').'/> '.$ax['monday'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".htmlspecialchars($ax['weekNumber_text'])."', 'normal')\" onmouseout=\"popoff()\">".$ax['weekNumber_label'].":</td>\n";
echo '<td><input type="radio" name="weekNumber" value="0"'.($weekNumber == 0 ? ' checked="checked"' : '').'/> '.$ax['no']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="weekNumber" value="1"'.($weekNumber == 1 ? ' checked="checked"' : '').'/> '.$ax['yes'].'</td></tr>'."\n";
?>
</table></td></tr>
</table>
</div>
</div>
<input class="button saveSettings noPrint" type="submit" name="save" value="<?php echo $ax['set_save_settings']; ?>"/>
</form>
