<?php
/*
= LuxCal event calendar language file =

Ins Deutsche übersetzt von Ulrich Krause. Kommentare, Verbesserungsvorschläge usw. an: ukrause(at)ukweb.de
2011-05-15 - aktualisiert von Alfred Bruckner - letztes Update 27.3.2012

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu
This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","2.7.2");

/* -- Titles on the Header of the Calendar -- */

$months = array("Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember");
$months_m = array("Jan","Feb","Mär","Apr","Mai","Jun","Jul","Aug","Sep","Okt","Nov","Dez");
$wkDays = array("Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag","Sonntag");
$wkDays_l = array("Son","Mon","Die","Mit","Don","Fre","Sam","Son");
$wkDays_m = array("So","Mo","Di","Mi","Do","Fr","Sa","So");
$wkDays_s = array("S","M","D","M","D","F","S","S");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Senden",
"none" => "Keine.",
"back" => "Zurück",
"by" => "durch",
"of" => "im",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//index.php
"title_upcoming" => "Anstehende Termine",
"title_event" => "Termin",
"title_add_event" => "Termin hinzufügen",
"title_check_event" => "Termin prüfen",
"title_log_in" => "Einloggen",
"title_search" => "Text Suche",
"title_user_guide" => "LuxCal Bedienungsanleitung",
"title_settings" => "Kalendereinstellungen",
"title_edit_cats" => "Kategorien bearbeiten",
"title_edit_users" => "Benutzer bearbeiten",
"title_manage_db" => "Datenbank Wartung",
"title_changes" => "Hinzugefügte / Geänderte / Gelöschte Termine",
"title_csv_import" => "CSV Datei Import",
"title_ics_import" => "iCal Datei Import",
"title_ics_export" => "iCal Datei Export",
"idx_log_in" => "Bitte einloggen um den Kalender anzuschauen",
"idx_public_name" => "Öffentliche Ansicht",

//header.php
"hdr_options" => "Optionen",
"hdr_options_submit" => "Auswählen und auf 'Optionen' klicken",
"hdr_options_panel" => "Anzeige Optionen einstellen",
"hdr_select_date" => "Datum auswählen",
"hdr_view" => "Ansicht",
"hdr_select_view" => "Ansicht auswählen",
"hdr_filter" => "Filter",
"hdr_select_filter" => "Filter auswählen",
"hdr_lang" => "Sprache",
"hdr_select_lang" => "Sprache auswählen",
"hdr_all_cats" => "Alle Kategorien",
"hdr_all_users" => "Alle Benutzer",
"hdr_year" => "Jahr",
"hdr_month_full" => "Ganzes Monat",
"hdr_month_work" => "Arbeitsmonat",
"hdr_week_full" => "Ganze Woche",
"hdr_week_work" => "Arbeitswoche",
"hdr_day" => "Tag",
"hdr_upcoming" => "Anstehend",
"hdr_changes" => "Änderungen",
"hdr_print" => "Ausdrucken",
"hdr_print_page" => "Diese Seite ausdrucken",
"hdr_select_admin_functions" => "Administrator Funktion auswählen",
"hdr_admin" => "Administration",
"hdr_add_event" => "Termin hinzufügen",
"hdr_search" => "Suche",
"hdr_todo_list" => "Todo Liste",
"hdr_upco_list" => "Seitenleiste",
"hdr_settings" => "Einstellungen",
"hdr_categories" => "Kategorien",
"hdr_users" => "Benutzer",
"hdr_database" => "Datenbank",
"hdr_import_csv" => "CSV Import",
"hdr_import_ics" => "iCal Import",
"hdr_export_ics" => "iCal Export",
"hdr_calendar" => "Zum Kalender",
"hdr_guide" => "Hilfe",
"hdr_log_in" => "Einloggen",
"hdr_log_out" => "Ausloggen",
"hdr_today" => "Heute", //dtpicker.js
"hdr_clear" => "Löschen", //dtpicker.js

//header_s.php
"hdr_close_window" => "Fenster schließen",

//event.php
"evt_no_title" => "Kein Titel",
"evt_no_start_date" => "Kein Start Datum",
"evt_bad_date" => "Falsches Datum",
"evt_bad_rdate" => "Falsches Wiederholungsende Datum",
"evt_no_start_time" => "Keine Startzeit",
"evt_bad_time" => "Falsche Zeit",
"evt_end_before_start_time" => "Endzeit vor Anfangszeit",
"evt_end_before_start_date" => "Enddatum vor Anfangsdatum",
"evt_until_before_start_date" => "Wiederholungsende vor Anfangsdatum",
"evt_title" => "Titel",
"evt_venue" => "Ort",
"evt_category" => "Kategorie",
"evt_description" => "Beschreibung",
"evt_date_time" => "Datum / Zeit",
"evt_mailer" => "Mailer",
"evt_private_event" => "Privater Termin",
"evt_start_date" => "Anfang",
"evt_end_date" => "Ende",
"evt_select_date" => "Wähle Datum",
"evt_select_time" => "Wähle Zeit",
"evt_all_day" => "Ganztags",
"evt_change" => "Ändern",
"evt_set_repeat" => "Wiederholung",
"evt_set" => "OK",
"evt_repeat_not_supported" => "Wiederholungsdatei nicht unterstützt",
"evt_no_repeat" => "Keine Wiederholung",
"evt_repeat" => "Wiederhole",
"evt_repeat_on" => "Wiederhole jeden",
"evt_until" => "bis",
"evt_blank_no_end" => "leer: kein Ende",
"evt_each_month" => "jeden Monat",
"evt_interval1_1" => "jede(n/s)",
"evt_interval1_2" => "jede(n/s) 2.",
"evt_interval1_3" => "jede(n/s) 3.",
"evt_interval1_4" => "jede(n/s) 4.",
"evt_interval1_5" => "jede(n/s) 5.",
"evt_interval1_6" => "jede(n/s) 6.",
"evt_interval2_1" => "1.",
"evt_interval2_2" => "2.",
"evt_interval2_3" => "3.",
"evt_interval2_4" => "4.",
"evt_interval2_5" => "letzten",
"evt_period1_1" => "Tag",
"evt_period1_2" => "Woche",
"evt_period1_3" => "Monat",
"evt_period1_4" => "Jahr",
"evt_notify" => "Erinnerung",
"evt_now_and_or" => "sofort und/oder",
"evt_event_added" => "Neuer Termin",
"evt_event_edited" => "Geänderter Termin",
"evt_event_deleted" => "Gelöschter Termin",
"evt_days_before_event" => "Tag(e) vor dem Termin",
"evt_notify_eml_list" => "Emailadressen zum Benachrichtigen - getrennt mit Semikolon - max. 255 Zeichen",
"evt_eml_list_too_long" => "Emailadressenliste hat mehr als 255 Zeichen",
"evt_eml_list_missing" => "Benachrichtigungsemailadresse(n) fehlt",
"evt_not_in_past" => "Benachrichtigung in der Vergangenheit",
"evt_not_days_invalid" => "Ungültige Anzahl an Tagen",
"evt_status" => "Status",
"evt_url_format" => "Link zur Webseite: url oder url [name]. z.B. www.google.de [suchen]",
"evt_confirm_added" => "Termin hinzugefügt",
"evt_confirm_saved" => "Termin gespeichert",
"evt_confirm_deleted" => "Termin gelöscht",
"evt_add_close" => "Hinzufügen und schließen",
"evt_add" => "Hinzufügen",
"evt_edit" => "Bearbeiten",
"evt_save_close" => "Speichern und schließen",
"evt_save" => "Speichern",
"evt_clone" => "Kopie Speichern",
"evt_delete" => "Löschen",
"evt_close" => "Schließen",
"evt_open_calendar" => "Kalender öffnen",
"evt_added" => "Hinzugefügt",
"evt_edited" => "Angepasst",
"evt_is_repeating" => "ist ein sich wiederholender Termin.",
"evt_is_multiday" => "ist ein mehrtägiger Termin.",
"evt_edit_series_or_occurrence" => "Ganze Serie oder einzelnen Termin bearbeiten?",
"evt_edit_series" => "Ganze Serie",
"evt_edit_occurrence" => "Einzelner Termin",

//views
"vws_add_event" => "Termin hinzufügen",
"vws_view_month" => "Zeige Monat",
"vws_view_week" => "Zeige Woche",
"vws_view_day" => "Zeige Tag",
"vws_click_for_full" => "Für ganzen Kalender Monat auswählen",
"vws_view_full" => "Ganzen Kalender zeigen",
"vws_prev_month" => "Voriges Monat",
"vws_next_month" => "Nächstes Monat",
"vws_today" => "Heute",
"vws_back_to_today" => "Zurück zum aktuellen Monat",
"vws_week" => "Woche",
"vws_wk" => "KW",
"vws_time" => "Zeit",
"vws_events" => "Termine",
"vws_all_day" => "Ganztags",
"vws_earlier" => "Früher",
"vws_later" => "Später",
"vws_venue" => "Ort",
"vws_events_for_next" => "Anstehende Termine für die nächste",
"vws_days" => "Tag(e)",
"vws_added" => "Hinzugefügt",
"vws_edited" => "Angepasst",
"vws_notify" => "Melden",
"vws_none_due_in" => "Keine anstehende Termine für die nächste",

//changes.php
"chg_from_date" => "Ab",
"chg_select_date" => "Wähle Startdatum",
"chg_notify" => "Sende Email",
"chg_days" => "Tag(e)",
"chg_added" => "Hinzugefügt",
"chg_edited" => "Angepasst",
"chg_deleted" => "Gelöscht",
"chg_changed_on" => "Verändert am",
"chg_changes" => "Veränderungen",
"chg_no_changes" => "Keine Veränderungen.",

//search.php
"sch_define_search" => "Suchkriterien",
"sch_search_text" => "Text",
"sch_event_fields" => "Termin Felder",
"sch_all_fields" => "Alle Felder",
"sch_title" => "Titel",
"sch_description" => "Beschreibung",
"sch_venue" => "Ort",
"sch_event_cat" => "Kategorie",
"sch_all_cats" => "Alle Kategorien",
"sch_occurring_between" => "Fällig zwischen",
"sch_select_start_date" => "Start Datum",
"sch_select_end_date" => "Ende Datum",
"sch_search" => "Suchen",
"sch_invalid_search_text" => "Text fehlt oder ist zu kurz",
"sch_bad_start_date" => "Falsches Start Datum",
"sch_bad_end_date" => "Falsches Ende Datum",
"sch_no_results" => "Nichts gefunden",
"sch_new_search" => "Neue Suche",
"sch_calendar" => "Zum Kalender",
"sch_instructions" =>
"<h4>Anleitung zur Text Suche</h4>
<p>Die Kalender Datenbannk kann nach Terminen die den angegebenen Text enthalten durchsucht werden.</p>
<br><p><b>Text</b>: Die ausgewählten Felder (siehe unterhalb) der Termine werden durchsucht.
 Die Suche unterscheidet Groß-und Kleinschreibung.</p>
<p>Zwei Arten von Platzhalter Zeichen können angegeben werden:</p>
<ul>
<li>Ein Unterstrich (_) im Text steht für ein beliebiges Zeichen.<br>Z.B.: '_i_r' findet  'Bier', 'Tier', 'hier'.</li>
<li>Ein UND Zeichen (&amp;) im Text steht für eine beliebige Anzahl an Zeichen.
<br>Z.B.: 'de&amp;r' findet 'Dezember', 'Denker', 'deiner'.</li>
</ul>
<p>In jedem Fall muss der Text mindestens zwei normale Zeichen enthalten.</p>
<br><p><b>Termin Felder</b>: Nur die gewählten Felder werden durchsucht.</p>
<br><p><b>Kategorie</b>: Nur Termine der betreffenden Kategorie werden durchsucht.</p>
<br><p><b>Fällig zwischen</b>: Start und Ende Datum sind optional.
Ein leeres Start Datum bedeutet: von heute ein Jahr in die Vergangenheit
und ein leeres Ende Datum bedeutet: von heute ein Jahr in die Zukunft.</p>
<br><p>Das Ergebnis der Suche wird in chronologischer Reihenfolge angezeigt.</p>",

//stand-alone sidebar (lcsbar.php)
"ssb_upco_events" => "Upcoming Events",
"ssb_all_day" => "All day",
"ssb_none" => "No upcoming events."
);
?>
