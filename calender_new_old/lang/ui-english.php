<?php
/*
= LuxCal event calendar user interface language file =

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.

© Copyright 2009-2012 LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","2.7.2");

/* -- Titles on the Header of the Calendar and Date Picker -- */

$months = array("January","February","March","April","May","June","July","August","September","October","November","December");
$months_m = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
$wkDays = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
$wkDays_l = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sun");
$wkDays_m = array("Su","Mo","Tu","We","Th","Fr","Sa","Su");
$wkDays_s = array("S","M","T","W","T","F","S","S");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Submit",
"none" => "None.",
"back" => "Back",
"by" => "by",
"of" => "of",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//index.php
"title_upcoming" => "Upcoming Events",
"title_event" => "Event",
"title_add_event" => "Add Event",
"title_check_event" => "Check Event",
"title_log_in" => "Log In",
"title_search" => "Text Search",
"title_user_guide" => "LuxCal User Guide",
"title_settings" => "Manage Calendar Settings",
"title_edit_cats" => "Edit Categories",
"title_edit_users" => "Edit Users",
"title_manage_db" => "Manage Database",
"title_changes" => "Added / Edited / Deleted Events",
"title_csv_import" => "CSV File Import",
"title_ics_import" => "iCal File Import",
"title_ics_export" => "iCal File Export",
"idx_log_in" => "Please log in to view this calendar",
"idx_public_name" => "Public View",

//header.php
"hdr_options" => "Options",
"hdr_options_submit" => "Make your choice and press 'Options'",
"hdr_options_panel" => "Options Panel",
"hdr_select_date" => "Go to Date",
"hdr_view" => "View",
"hdr_select_view" => "Select View",
"hdr_filter" => "Filter",
"hdr_select_filter" => "Select Filter",
"hdr_lang" => "Language",
"hdr_select_lang" => "Select Language",
"hdr_all_cats" => "All Categories",
"hdr_all_users" => "All Users",
"hdr_year" => "Year",
"hdr_month_full" => "Full Month",
"hdr_month_work" => "Work Month",
"hdr_week_full" => "Full Week",
"hdr_week_work" => "Work Week",
"hdr_day" => "Day",
"hdr_upcoming" => "Upcoming",
"hdr_changes" => "Changes",
"hdr_print" => "Print",
"hdr_print_page" => "Print this Page",
"hdr_select_admin_functions" => "Select Admin Function",
"hdr_admin" => "Administration",
"hdr_add_event" => "Add Event",
"hdr_search" => "Text Search",
"hdr_todo_list" => "Todo List",
"hdr_upco_list" => "Upcoming Events",
"hdr_settings" => "Settings",
"hdr_categories" => "Categories",
"hdr_users" => "Users",
"hdr_database" => "Database",
"hdr_import_csv" => "CSV Import",
"hdr_import_ics" => "iCal Import",
"hdr_export_ics" => "iCal Export",
"hdr_calendar" => "Go to calendar",
"hdr_guide" => "Help",
"hdr_log_in" => "Log In",
"hdr_log_out" => "Log Out",
"hdr_today" => "today", //dtpicker.js
"hdr_clear" => "clear", //dtpicker.js

//header_s.php
"hdr_close_window" => "Close Window",

//event.php
"evt_no_title" => "No title",
"evt_no_start_date" => "No start date",
"evt_bad_date" => "Bad date",
"evt_bad_rdate" => "Bad repeat end date",
"evt_no_start_time" => "No start time",
"evt_bad_time" => "Bad time",
"evt_end_before_start_time" => "End time before start time",
"evt_end_before_start_date" => "End date before start date",
"evt_until_before_start_date" => "Repeat end before start date",
"evt_title" => "Title",
"evt_venue" => "Venue",
"evt_category" => "Category",
"evt_description" => "Description",
"evt_date_time" => "Date / time",
"evt_mailer" => "mailer",
"evt_private_event" => "Private Event",
"evt_start_date" => "Start",
"evt_end_date" => "End",
"evt_select_date" => "Select date",
"evt_select_time" => "Select time",
"evt_all_day" => "All Day",
"evt_change" => "Change",
"evt_set_repeat" => "Set Repetition",
"evt_set" => "OK",
"evt_repeat_not_supported" => "Specified repetition not supported",
"evt_no_repeat" => "No repeat",
"evt_repeat" => "Repeat",
"evt_repeat_on" => "Repeat every",
"evt_until" => "until",
"evt_blank_no_end" => "blank: no end",
"evt_each_month" => "each month",
"evt_interval1_1" => "every",
"evt_interval1_2" => "every other",
"evt_interval1_3" => "every third",
"evt_interval1_4" => "every fourth",
"evt_interval1_5" => "every fifth",
"evt_interval1_6" => "every sixth",
"evt_interval2_1" => "first",
"evt_interval2_2" => "second",
"evt_interval2_3" => "third",
"evt_interval2_4" => "fourth",
"evt_interval2_5" => "last",
"evt_period1_1" => "day",
"evt_period1_2" => "week",
"evt_period1_3" => "month",
"evt_period1_4" => "year",
"evt_notify" => "Send mail",
"evt_now_and_or" => "now and/or",
"evt_event_added" => "New event",
"evt_event_edited" => "Changed event",
"evt_event_deleted" => "Deleted event",
"evt_days_before_event" => "day(s) before event to:",
"evt_notify_eml_list" => "email addresses separated by a semicolon - max. 255 chars.",
"evt_eml_list_too_long" => "Email address list too many chars.",
"evt_eml_list_missing" => "Notification email address(es) missing",
"evt_not_in_past" => "Notification date in past",
"evt_not_days_invalid" => "Notification days invalid",
"evt_status" => "Status",
"evt_url_format" => "link to website: url or url [name]. E.g. www.google.com [search]",
"evt_confirm_added" => "event added",
"evt_confirm_saved" => "event saved",
"evt_confirm_deleted" => "event deleted",
"evt_add_close" => "Add and close",
"evt_add" => "Add",
"evt_edit" => "Edit",
"evt_save_close" => "Save and close",
"evt_save" => "Save",
"evt_clone" => "Save as New",
"evt_delete" => "Delete",
"evt_close" => "Close",
"evt_open_calendar" => "Open calendar",
"evt_added" => "Added",
"evt_edited" => "Edited",
"evt_is_repeating" => "is a repeating event.",
"evt_is_multiday" => "is a multi-day event.",
"evt_edit_series_or_occurrence" => "Do you want to edit the series or this occurrence?",
"evt_edit_series" => "Edit the series",
"evt_edit_occurrence" => "Edit this occurrence",

//views
"vws_add_event" => "Add Event",
"vws_view_month" => "View Month",
"vws_view_week" => "View Week",
"vws_view_day" => "View Day",
"vws_click_for_full" => "for full calendar click month",
"vws_view_full" => "View full calendar",
"vws_prev_month" => "Previous month",
"vws_next_month" => "Next month",
"vws_today" => "Today",
"vws_back_to_today" => "Back to the month of today",
"vws_week" => "Week",
"vws_wk" => "wk",
"vws_time" => "Time",
"vws_events" => "Events",
"vws_all_day" => "All Day",
"vws_earlier" => "Earlier",
"vws_later" => "Later",
"vws_venue" => "Venue",
"vws_events_for_next" => "Upcoming events for the next",
"vws_days" => "day(s)",
"vws_added" => "Added",
"vws_edited" => "Edited",
"vws_notify" => "Notify",
"vws_check_marks" => "Check mark(s)",
"vws_none_due_in" => "No events due in the next",

//changes.php
"chg_from_date" => "From date",
"chg_select_date" => "Select start date",
"chg_notify" => "Notify",
"chg_days" => "Day(s)",
"chg_added" => "Added",
"chg_edited" => "Edited",
"chg_deleted" => "Deleted",
"chg_changed_on" => "Changed on",
"chg_changes" => "Changes",
"chg_no_changes" => "No changes.",

//search.php
"sch_define_search" => "Define search",
"sch_search_text" => "Search text",
"sch_event_fields" => "Event fields",
"sch_all_fields" => "All fields",
"sch_title" => "Title",
"sch_description" => "Description",
"sch_venue" => "Venue",
"sch_event_cat" => "Event category",
"sch_all_cats" => "All Categories",
"sch_occurring_between" => "Occurring between",
"sch_select_start_date" => "Select start date",
"sch_select_end_date" => "Select end date",
"sch_search" => "Search",
"sch_invalid_search_text" => "Search text missing or too short",
"sch_bad_start_date" => "Bad start date",
"sch_bad_end_date" => "Bad end date",
"sch_no_results" => "No results found",
"sch_new_search" => "New Search",
"sch_calendar" => "Go to calendar",
"sch_instructions" =>
"<h4>Text Search Instructions</h4>
<p>The calendar database can be searched for events matching specific text.</p>
<br><p><b>Search text</b>: The selected fields (see below) of each event will 
be searched. The search is not case sensitive.</p>
<p>Two wildcard characters can be used:</p>
<ul>
<li>Underscore characters (_) in the search text will match any single 
character.<br>E.g.: '_e_r' matches 'beer', 'dear', 'heir'.</li>
<li>Ampersand characters (&amp;) in the search text will match any number of 
characters.<br>E.g.: 'de&amp;r' matches 'December', 'dear', 'developer'.</li>
</ul>
<p>However, the search text must contain at least two other characters.</p>
<br><p><b>Event fields</b>: The selected fields will be searched only.</p>
<br><p><b>Event category</b>: Events in the selected category will be searched 
only.</p>
<br><p><b>Occurring between</b>: The start and end date are both optional. A 
blank start date means: one year from now in the past and a blank end date 
means: one year from now in the future.</p>
<br><p>The search results will be displayed in chronological order.</p>",

//stand-alone sidebar (lcsbar.php)
"ssb_upco_events" => "Upcoming Events",
"ssb_all_day" => "All day",
"ssb_none" => "No upcoming events."
);
?>
