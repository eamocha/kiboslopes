<?php
/*
= LuxCal event calendar on-line user guide =

This user guide has been produced by LuxSoft - please send your comments/improvements to 
rb@luxsoft.eu.

Â© Copyright 2009-2012 LuxSoft - www.LuxSoft.eu

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

//LuxCal ug language file version
define("LUG","2.7.2");

?>
<div  class="floatR">
<img src="../../calende/lang/lang/ug-layout.png" alt="LuxCal page layout"/><br>
a: title bar&nbsp;&nbsp;b: navigation bar&nbsp;&nbsp;c: calendar&nbsp;&nbsp;d: day
</div>
<br>
<div  style="margin:0 20px">
<h4>Оглавление</h4>
<ol>
<li><p><a href="#ov">Обзор</a></p></li>
<li><p><a href="#li">Войти</a></p></li>
<li><p><a href="#co">Calendar Options</a></p></li>
<li><p><a href="#cv">Calendar Views</a></p></li>
<li><p><a href="#ts">Текстовый поиск</a></p></li>
<?php if ($privs > 1) { //if post rights ?>
<li><p><a href="#ae">Добавить / Редактировать / Удалить Событие</a></p></li>
<?php } ?>
<li><p><a href="#lo">Выйти</a></p></li>
<?php if ($admin) { //if administrator ?>
<li><p><a href="#ca">Calendar Administration</a></p></li>
<?php } ?>
<li><p><a href="#al">About LuxCal</a></p></li>
</ol>
</div>
<div class="help">
<br>
<ol>
<li id="ov"><h4>Обзор</h4>
<p>The LuxCal calendar runs on a web server and can be viewed via your web browser.</p>
<p>The title bar shows the calendar title, the date and the name of the current user.
The navigation bar contains menus and links, to navigate, to log in/out, to add an event, etc. Which menus and links are displayed depends on your access rights.
Below the navigation bar the various calendar views are displayed</p>
<br></li>
<li id="li"><h4>Logging In</h4>
<p>If the calendar administrator has given View rights to public access users, the calendar can be viewed without logging in.</p>
<p>Clicking Log In at the right of the navigation bar takes you to the log in screen. Enter your username or email address (one of the two) and the password received from your administrator and click Log In. If you select "Remember me" before clicking Log In, next times you launch the calendar you will be automatically logged in. If you forgot your password, click Log In and thereafter click on the link to have a new password emailed to you.</p>
<p>You can change your personal log-in data by selecting 'Change my data' on the log in page.</p>
<p>If you are not registered yet and the calendar administrator has enabled self-registration, you can click on 'Register' on the log in page; otherwise the calendar administrator can create an account for you.</p>
<br></li>
<li id="co"><h4>Calendar Options</h4>
<p>Clicking the Options button on the navigation bar will open the calendar's Options Panel. On this panel you can select:</p>
<ul style="margin:0 20px">
<li><p>The calendar view (year, month, week, day, upcoming or changes).</p></li>
<li><p>An event filter based on event owners. Events of one single owner or multiple owners can be selected.</p></li>
<li><p>An event filter based on event categories. Events in one single category or multiple categories can be selected.</p></li>
<li><p>The user interface language.</p></li>
</ul>
<p>After having made your choices, the Options button in the navigation bar should be clicked again to activate your choices.</p> 
<p>Note: The display of the event filter menus and the language menu may have been disabled by the calendar administrator.</p>
<br></li>
<li id="cv"><h4>Calendar Views</h4>
<p>In all views, further details of the event will pop up when hovering the event title. For private events the background color of the pop up box will be light green and for repeating or multi-day events the border of the pop up box will be red. In Upcoming view, URLs in the description field of events will automatically become hyperlinks.</p>
<p>Events in a category for which the admin has activated one or two check boxes will have one or two check boxes displayed in front of the event title, which can be used to flag events for example as "approved" or "completed". When having sufficient rights, these check boxes can be clicked to check/uncheck them.</p>
<?php if ($privs > 1) { //if post rights ?>
<p>When having sufficient access rights:</p>
<ul style="margin:0 20px">
<li><p>In all views clicking an event will open the Edit Event window for the event, which can be used to view, edit or delete the event.</p></li>
<li><p>In year and month views a new event can be added for a certain date by clicking the top of a day cell (line where the day of the month is displayed).</p></li>
<li><p>In week and day views, an Add Event window can be opened by dragging the cursor over a certain time span; the date and time fields will be preloaded with the selected time span.</p></li>
</ul>
<p>To move an event to a new date or time, open the Event window by clicking the event, select Edit Event and change the date and or time. Events cannot be dragged to new dates or times.</p>
<?php } ?>
<br></li>
<li id="ts"><h4>Текстовый поиск</h4>
<p>When clicking the button with the triangle on the right side in the navigation bar, the Text Search page will open. On this page the text search can be defined. The Text Search page contains detailed instructions.</p>
<br></li>
<?php if ($privs > 1) { //if post rights ?>
<li id="ae"><h4>Добавить / Редактировать / Удалить Событие</h4>
<p>Adding, editing and deleting events is done via the Event window, which can be opened in several ways as explainend hereafter.</p>
<br><h5>a. Add Event</h5>
<p>To add events an Event window can be opened in the following ways:</p>
<ul style="margin:0 20px">
<li><p>by clicking the Add Event button in the navigation bar</p></li>
<li><p>by clicking the top of a day cell in year or month views, which is most used</p></li>
<li><p>by dragging a certain part of the day in week or day views</p></li>
</ul>
<p>Each way will open the Add Event window with a form to enter the event data. Certain fields of the form will be pre-filled, depending on which of the above ways is used to add an event.</p>
<h6>Venue, Category, Description and Private Event fields</h6>
<p>The venue, category and description fields are optional. Selecting a category will color-code the event in all views according to the category colors. The venue and description will pop up when hovering events in the various calendar views. URLs added in the event description will be automatically converted to hyperlinks which can be selected in various views and in notification emails.</p>
<p>A private event will only be visible to you, and not to others.</p>
<h6>Dates, Times and Repeat fields</h6>
<p>The End Date is optional and can be used for multi-day events. Dates and times can be entered manually or via the date and time picker buttons. When clicking the Change button via a separate dialogue box events can be defined as repeating. In this case the event will be repeated as specified from start date to 'until date'. If no 'until date' is specified, the event will repeat for ever, which is particularly useful for birthdays.</p>
<h6>Send mail fields</h6>
<p>Via the Send mail feature, you can ask to send an email reminder to one or more email addresses directly, if the 'now' checkbox is selected, and/or a number of days before the due date of the event. In addition, an email reminder will automatically be sent on the date of the event. If the specified number of days is "blank", no email reminders will be send; and if "0", a reminder will be sent on the event day only. For repeating events an email reminder will be sent the selected number of days before each occurrence of the event and on the date of each occurrence of the event.</p>
<p>The email list can contain email addresses and/or the name (without file extension) of a predefined email list file, all separated by a semicolon. The predefined email list must be a text file with extension ".txt" in the "emlists/" directory with an email address on each line. The file name may not contain the "@" character.</p>
<p>Upon completion, press Add Event.</p>
<br>
<h5>b. Edit / Delete Event</h5>
<p>In each of the calendar views an event can be clicked to open a window with all event details. If you have sufficient rights, you can click the 'Edit Event' button to edit, duplicate or delete the event. This will open the Edit Event window, with an editable form with all event details.</p>
<p>Depending on your access rights, you can view events, view/edit/delete your own events or view/edit/delete all events, including the events of other users.</p>
<p>For a description of the fields, see the description for Add Event above.</p>
<p>In the Edit Event window, the buttons at the bottom offer to save an edited event, to save an edited event as a new event (for instance to duplicate the event on an other date) and to delete the event.</p>
<p>Please note that selecting Delete will instantly delete the event from the calendar, <strong>without asking for confirmation</strong>.</p>
<p>Deleting a recurring event will delete all instances of the event, not just one specific date.</p>
<br></li>
<?php } ?>
<li id="lo"><h4>Выйти</h4>
<p>To log out, click Log Out on the navigation bar.</p>
<br></li>
<?php if ($admin) { //administrator only ?>
<li id="ca"><h4>Calendar Administration</h4>
<p>- the following features require administrator rights -</p>
<p>When a user logs in with administrator rights, a drop down menu, called Administration, will appear on the right side in the navigation bar. Via this menu the following administrator pages can be selected:</p>
<br>
<h5>a. Settings</h5>
<p>This page displays the current calendar settings which subsequently can be changed. All settings are explained on the Settings page by hovering the title of each setting.</p>
<br>
<h5>b. Categories</h5>
<p>Adding event categories with different colors - though not required - will greatly enhance the views of the calendar. Examples of possible Categories are 'holidays', 'appointment', 'birthday', 'important', etc.</p>
<p>The Categories page shows a list of all categories, with the possibility to add, edit and delete categories. The initial installation has only one category, named 'no cat'.</p>
<p>When adding / editing events all categories will be shown in a drop down menu. The order in which categories are displayed in the drop down menu is determined by the Sequence field.</p>
<p>When adding / editing categories a 'repeat' value can be set; events in this category will automatically repeat as specified. The checkbox 'Public' can be used to hide events belonging to this category from being viewed by public access users (not logged in users) and exclude them from the RSS feeds.</p>
<p>One or two check marks can be activated, resulting in the calendar in the display of one or two check marks in front of the event title for all events in this category. The user can use these check marks to flag events for example as "approved" or "completed". The fields Text Color and Background define the colors used to display events in the calendar belonging to this category.</p>
<p>The fields Text Color and Background define the colors used to display events in the calendar belonging to this category.</p>
<p>When deleting a category, the deleted category remains available for the events belonging to this category.</p>
<br>
<h5>c. Users</h5>
<p>This page is used to view, add and edit user accounts. Two main areas can be edited: the user's name/email/password and the user's access rights and interface language. Depending on the type of user, possible access rights are: View, Post own, Post all and Admin. It is important to use a valid email address, to allow the user to receive email reminders.</p>
<p>Via the Settings page, the administrator can enable "user self-registration" and set the access rights for self registered users. When self-registration is enabled, users can register themselves via the browser interface.</p> 
<p>Unless the calendar administrator has given View access to public access users, users must log in, using their username or email and password.</p>
<p>For each user the default user-interface language on log-in can be specified. If no language is specified, the default calendar language specified on the Settings page will be used.</p>
<br>
<h5>d. Database</h5>
<p>This page allows the calendar administrator to execute the following functions:</p>
<ul>
<li>Check and Repair the database, to find and solve inconsistencies in the database tables.</li>
<li>Compact database, to free unused space and to avoid overhead. This function will permanently remove events which have been deleted more than 30 days ago.</li>
<li>Backup database, to create a backup file which can be used to recreate the database tables structure and content.</li>
</ul>
<p>The first function, Check and Repair database, only needs to be run when the calendar views don't work properly. The second function, Compact database, could be run once a year to clean up the database, and the third function, Backup database, should be run more frequently, depending on the number of calendar updates.</p>
<br>
<h5>e. CSV File Import</h5>
<p>This function can be used to import into the LuxCal Calendar event data that has been exported from other calendars (e.g. MS Outlook). Further instructions are given on the CSV Import page.</p>
<br>
<h5>f. iCal File Import</h5>
<p>This function can be used to import events from iCal files (file extension .ics) into the LuxCal Calendar. Further instructions are given on the iCal Import page. Only events which are compatible with the LuxCal calendar will be imported. Other components, like: To-Do, Journal, Free / Busy, Time zone and Alarm, will be ignored.</p>
<br>
<h5>g. iCal File Export</h5>
<p>This function can be used to export LuxCal events into iCal files (file extension .ics). Further instructions are given on the iCal Export page.</p>
<br></li>
<?php } ?>
<li id="al"><h4>About LuxCal</h4>
<p>Produced by: <b>Roel B.</b>&nbsp;&nbsp;&nbsp;&nbsp;Website and forum: <b><a href="http://www.luxsoft.eu/" target="_blank">www.luxsoft.eu/</a></b></p>
<p>LuxCal is freeware and may be redistributed and/or modified under the terms of the <b><a href="http://www.luxsoft.eu/index.php?pge=gnugpl" target="_blank">GNU General Public License</a></b>.</p>
<br>
</li>
</ol>
</div>