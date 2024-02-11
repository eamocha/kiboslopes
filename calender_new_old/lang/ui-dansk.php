<?php
/*
= LuxCal event calendar lamguage file =

Oversat til dansk af Lars J. Helbo. Kommentarer, forbedringsforslag osv. til lars(at)salldata.dk

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","2.7.2");

/* -- Titles on the Header of the Calendar -- */

$months = array("Januar","Februar","Marts","April","Maj","Juni","Juli","August","September","Oktober","November","December");
$months_m = array("Jan","Feb","Mar","Apri","Maj","Jun","Jul","Aug","Sep","Okt","Nov","Dec");
$wkDays = array("Søndag","Mandag","Tirsdag","Onsdag","Torsdag","Fredag","Lørdag","Søndag");
$wkDays_l = array("Søn","Man","Tir","Ons","Tor","Fre","Lør","Søn");
$wkDays_m = array("Sø","Ma","Ti","On","To","Fr","Lø","Sø");
$wkDays_s = array("S","M","T","O","T","F","L","S");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Submit",
"none" => "Ingen.",
"back" => "Back",
"by" => "by",
"of" => "i",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//index.php
"title_upcoming" => "Kommende begivenheder",
"title_event" => "Begivenhed",
"title_add_event" => "Tilføj Begivenhed",
"title_check_event" => "Check Event",
"title_log_in" => "Log In",
"title_search" => "Text Search",
"title_user_guide" => "LuxCal brugervejledning",
"title_settings" => "Kalenderindstillinger",
"title_edit_cats" => "Editer kategorier",
"title_edit_users" => "Editer brugere",
"title_manage_db" => "Manage databasen",
"title_changes" => "Tilføje / ændre / slette begivenheder",
"title_csv_import" => "CSV fil-import",
"title_ics_import" => "iCal fil-import",
"title_ics_export" => "iCal fil-eksport",
"idx_log_in" => "Log ind for at se denne kalender",
"idx_public_name" => "Offentlig visning",

//header.php
"hdr_options" => "Options",
"hdr_options_submit" => "Make your choice and press 'Options'",
"hdr_options_panel" => "Options panel",
"hdr_select_date" => "Gå til dato ",
"hdr_view" => "Type",
"hdr_select_view" => "Vælg Type",
"hdr_filter" => "Filter",
"hdr_select_filter" => "Vælg filter",
"hdr_lang" => "Sprog",
"hdr_select_lang" => "Vælg sprog",
"hdr_all_cats" => "Alle kategorier",
"hdr_all_users" => "Alle brugere",
"hdr_year" => "År",
"hdr_month_full" => "Måned (7d)",
"hdr_month_work" => "Work month",
"hdr_week_full" => "Uge (7d)",
"hdr_week_work" => "Work week",
"hdr_day" => "Dag",
"hdr_upcoming" => "Kommende",
"hdr_changes" => "Ændringer",
"hdr_print" => "Udskriv",
"hdr_print_page" => "Udskriv denne side",
"hdr_select_admin_functions" => "Vælg admin funktion",
"hdr_admin" => "Administration",
"hdr_add_event" => "Tilføj begivenhed",
"hdr_search" => "Text Search",
"hdr_todo_list" => "Todo List",
"hdr_upco_list" => "Kommende begivenheder",
"hdr_settings" => "Indstillinger",
"hdr_categories" => "Kategorier",
"hdr_users" => "Brugere",
"hdr_database" => "Database",
"hdr_import_csv" => "CSV import",
"hdr_import_ics" => "iCal import",
"hdr_export_ics" => "iCal export",
"hdr_calendar" => "Go to calendar",
"hdr_guide" => "Hjælp",
"hdr_log_in" => "Log ind",
"hdr_log_out" => "Log ud",
"hdr_today" => "i dag", //dtpicker.js
"hdr_clear" => "slette", //dtpicker.js

//header_s.php
"hdr_close_window" => "Luk vinduet",

//event.php
"evt_no_title" => "Ingen titel",
"evt_no_start_date" => "Ingen startdato",
"evt_bad_date" => "Forkert dato",
"evt_bad_rdate" => "Bad repeat end date",
"evt_no_start_time" => "Ingen starttid",
"evt_bad_time" => "Forkert tid",
"evt_end_before_start_time" => "Sluttid før starttid",
"evt_end_before_start_date" => "Slutdato før startdato",
"evt_until_before_start_date" => "Repeat end før startdato",
"evt_title" => "Titel",
"evt_venue" => "Sted",
"evt_category" => "Kategori",
"evt_description" => "Beskrivelse",
"evt_date_time" => "Dato / tid",
"evt_mailer" => "mailer",
"evt_private_event" => "Privat begivenhed",
"evt_start_date" => "Start",
"evt_end_date" => "Slut",
"evt_select_date" => "Vælg dato",
"evt_select_time" => "Select time",
"evt_all_day" => "Hele dagen",
"evt_change" => "Ændre",
"evt_set_repeat" => "Sæt gentagelse",
"evt_set" => "OK",
"evt_repeat_not_supported" => "Angivet gentagelse ikke understøttet",
"evt_no_repeat" => "Ingen gentagelse",
"evt_repeat" => "Gentag",
"evt_repeat_on" => "Gentag hver",
"evt_until" => "indtil",
"evt_blank_no_end" => "blank: ingen ende",
"evt_each_month" => "hver måned",
"evt_interval1_1" => "hver",
"evt_interval1_2" => "hver anden",
"evt_interval1_3" => "hver tredje",
"evt_interval1_4" => "hver fjerde",
"evt_interval1_5" => "every fifth",
"evt_interval1_6" => "every sixth",
"evt_interval2_1" => "første",
"evt_interval2_2" => "anden",
"evt_interval2_3" => "tredje",
"evt_interval2_4" => "fjerde",
"evt_interval2_5" => "sidste",
"evt_period1_1" => "dag",
"evt_period1_2" => "uge",
"evt_period1_3" => "måned",
"evt_period1_4" => "år",
"evt_notify" => "Alarmer",
"evt_now_and_or" => "now and/or",
"evt_event_added" => "The following event has been added",
"evt_event_edited" => "The following event has been modified",
"evt_event_deleted" => "The following event has been deleted",
"evt_days_before_event" => "dag(e) før begivenheden",
"evt_notify_eml_list" => "emailadresser der skal alarmeres - adskilt af semikolon - max. 255 tegn.",
"evt_eml_list_too_long" => "Email-adresselisten er for lang.",
"evt_eml_list_missing" => "Der mangler en alarm-email",
"evt_not_in_past" => "Notification date in past",
"evt_not_days_invalid" => "Notification days invalid",
"evt_status" => "Status",
"evt_url_format" => "link til website: url eller url [navn]. f.eks. www.google.com [søge]",
"evt_confirm_added" => "begivenhed tilføjet",
"evt_confirm_saved" => "begivenhed reddet",
"evt_confirm_deleted" => "begivenhed slettet",
"evt_add_close" => "Add and close",
"evt_add" => "Tilføj",
"evt_edit" => "Edit",
"evt_save_close" => "Save and close",
"evt_save" => "Save",
"evt_clone" => "Save as New",
"evt_delete" => "Slet",
"evt_close" => "Close",
"evt_open_calendar" => "Open calendar",
"evt_owner" => "Ejer",
"evt_added" => "Added",
"evt_edited" => "Edited",
"evt_is_repeating" => "is a repeating event.",
"evt_is_multiday" => "is a multi-day event.",
"evt_edit_series_or_occurrence" => "Do you want to edit the series or this occurrence?",
"evt_edit_series" => "Edit the series",
"evt_edit_occurrence" => "Edit this occurrence",

//views
"vws_add_event" => "Tilføj begivenhed",
"vws_view_month" => "Vis måned",
"vws_view_week" => "Vis uge",
"vws_view_day" => "Vis dag",
"vws_click_for_full" => "for full calendar click month",
"vws_view_full" => "View full calendar",
"vws_prev_month" => "Previous month",
"vws_next_month" => "Next month",
"vws_today" => "Dag",
"vws_back_to_today" => "Tilbage til måneder i dag",
"vws_week" => "Uge",
"vws_wk" => "Uge",
"vws_time" => "Tid",
"vws_events" => "Begivenheder",
"vws_all_day" => "Hele dagen",
"vws_earlier" => "Earlier",
"vws_later" => "Later",
"vws_venue" => "Sted",
"vws_events_for_next" => "Kommende begivenheder for de næste",
"vws_days" => "dag(e)",
"vws_added" => "Added",
"vws_edited" => "Edited",
"vws_notify" => "Alarmer",
"vws_none_due_in" => "No events due in the next",

//changes.php
"chg_from_date" => "Fra dato",
"chg_select_date" => "Vælg start date",
"chg_notify" => "Alarmer",
"chg_days" => "Dag(e)",
"chg_added" => "Added",
"chg_edited" => "Edited",
"chg_deleted" => "Deleted",
"chg_changed_on" => "Changed on",
"chg_changes" => "Ændringer",
"chg_no_changes" => "Ingen ændringer.",

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
<br><p><b>Search text</b>: The selected fields (see below) of each event 
will be searched. The search is case insensitive.</p>
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
