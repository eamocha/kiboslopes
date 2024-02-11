<?php
/*
= LuxCal event calendar language file =

Dit bestand is vertaald door de Purple Crocodile - opmerkingen en verbeteringen graag sturen naar rb@luxsoft.eu.

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","2.7.2");

/* -- Titles on the Header of the Calendar -- */

$months = array("januari","februari","maart","april","mei","juni","juli","augustus","september","oktober","november","december");
$months_m = array("jan","feb","mrt","apr","mei","jun","jul","aug","sep","okt","nov","dec");
$wkDays = array("zondag","maandag","dinsdag","woensdag","donderdag","vrijdag","zaterdag","zondag");
$wkDays_l = array("zon","maa","din","woe","don","vrij","zat","zon");
$wkDays_m = array("Zo","Ma","Di","Wo","Do","Vr","Za","Zo");
$wkDays_s = array("Z","M","D","W","D","V","Z","Z");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Verzenden",
"none" => "Geen.",
"back" => "Terug",
"by" => "door",
"of" => "in",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//index.php
"title_upcoming" => "Binnenkort",
"title_event" => "Activiteit",
"title_add_event" => "Activiteit Toevoegen",
"title_check_event" => "Activiteit Aanvinken",
"title_log_in" => "Inloggen",
"title_search" => "Zoeken op Tekst",
"title_user_guide" => "LuxCal handleiding",
"title_settings" => "Kalenderinstellingen",
"title_edit_cats" => "Categorieën wijzigen",
"title_edit_users" => "Gebruikers wijzigen",
"title_manage_db" => "Manage database",
"title_changes" => "Toegevoegde / Gewijzigde / Verwijderde Activiteiten",
"title_csv_import" => "CSV bestand importeren",
"title_ics_import" => "iCal bestand importeren",
"title_ics_export" => "iCal bestand exporteren",
"idx_log_in" => "Log in om de kalender te zien",
"idx_public_name" => "Alle bezoekers",

//header.php
"hdr_options" => "Instellingen",
"hdr_options_submit" => "Maak je keuze en druk op 'Instellingen'",
"hdr_options_panel" => "Opties paneel",
"hdr_select_date" => "Ga naar dag",
"hdr_view" => "Weergave",
"hdr_select_view" => "Kies weergave",
"hdr_filter" => "Filter",
"hdr_select_filter" => "Kies filter",
"hdr_lang" => "Taal",
"hdr_select_lang" => "Kies taal",
"hdr_all_cats" => "Alle categorieën",
"hdr_all_users" => "Alle gebruikers",
"hdr_year" => "Jaar",
"hdr_month_full" => "Hele maand",
"hdr_month_work" => "Werkmaand",
"hdr_week_full" => "Hele week",
"hdr_week_work" => "Werkweek",
"hdr_day" => "Dag",
"hdr_upcoming" => "Binnenkort",
"hdr_changes" => "Wijzigingen",
"hdr_print" => "Print",
"hdr_print_page" => "Print deze pagina",
"hdr_select_admin_functions" => "Kies admin functie",
"hdr_admin" => "Beheer",
"hdr_add_event" => "Activiteit toevoegen",
"hdr_search" => "Tekst Zoeken",
"hdr_todo_list" => "Taken Lijst",
"hdr_upco_list" => "Binnenkort",
"hdr_settings" => "Instellingen",
"hdr_categories" => "Categorieën",
"hdr_users" => "Gebruikers",
"hdr_database" => "Database",
"hdr_import_csv" => "CSV import",
"hdr_import_ics" => "iCal import",
"hdr_export_ics" => "iCal export",
"hdr_calendar" => "Naar kalender",
"hdr_guide" => "Help",
"hdr_log_in" => "Log in",
"hdr_log_out" => "Log uit",
"hdr_today" => "vandaag", //dtpicker.js
"hdr_clear" => "wissen", //dtpicker.js

//header_s.php
"hdr_close_window" => "Venster sluiten",

//event.php
"evt_no_title" => "Geen titel",
"evt_no_start_date" => "Geen begindatum",
"evt_bad_date" => "Datum fout",
"evt_bad_rdate" => "Einddatum voor herhaling fout",
"evt_no_start_time" => "Geen begintijd",
"evt_bad_time" => "Tijd fout",
"evt_end_before_start_time" => "Eindtijd voor begintijd",
"evt_end_before_start_date" => "Einddatum voor begindatum",
"evt_until_before_start_date" => "Herhalingseinde voor begindatum",
"evt_title" => "Titel",
"evt_venue" => "Locatie",
"evt_category" => "Categorie",
"evt_description" => "Omschrijving",
"evt_date_time" => "Datum / tijd",
"evt_mailer" => "mailer",
"evt_private_event" => "Privé",
"evt_start_date" => "Begin",
"evt_end_date" => "Eind",
"evt_select_date" => "Kies datum",
"evt_select_time" => "Kies tijd",
"evt_all_day" => "Hele dag",
"evt_change" => "Wijzigen",
"evt_set_repeat" => "Herhalen",
"evt_set" => "OK",
"evt_repeat_not_supported" => "Gespecificeerde herhaling niet ondersteund",
"evt_no_repeat" => "Niet herhalen",
"evt_repeat" => "Herhaal",
"evt_repeat_on" => "Herhaal elke",
"evt_until" => "tot",
"evt_blank_no_end" => "leeg: geen einddatum",
"evt_each_month" => "elke maand",
"evt_interval1_1" => "elk(e)",
"evt_interval1_2" => "elk(e) tweede",
"evt_interval1_3" => "elk(e) derde",
"evt_interval1_4" => "elk(e) vierde",
"evt_interval1_5" => "elk(e) vijfde",
"evt_interval1_6" => "elk(e) zesde",
"evt_interval2_1" => "eerste",
"evt_interval2_2" => "tweede",
"evt_interval2_3" => "derde",
"evt_interval2_4" => "vierde",
"evt_interval2_5" => "laatste",
"evt_period1_1" => "dag",
"evt_period1_2" => "week",
"evt_period1_3" => "maand",
"evt_period1_4" => "jaar",
"evt_notify" => "Stuur mail",
"evt_now_and_or" => "nu en/of",
"evt_event_added" => "Nieuwe activiteit",
"evt_event_edited" => "Gewijzigde activiteit",
"evt_event_deleted" => "Verwijderde activiteit",
"evt_days_before_event" => "dag(en) vóór activiteit aan:",
"evt_notify_eml_list" => "mailadres(sen) scheiden door puntkomma - max. 255 tekens",
"evt_eml_list_too_long" => "Mailadres(sen) te lang",
"evt_eml_list_missing" => "Geen mailadres(sen) vermeld",
"evt_not_in_past" => "Herinneringsdatum valt in het verleden",
"evt_not_days_invalid" => "Herinneringsdatum ongeldig",
"evt_status" => "Status",
"evt_url_format" => "link naar website: url of url [naam]. Bijv. www.google.nl [zoeken]",
"evt_confirm_added" => "activiteit toegevoegd",
"evt_confirm_saved" => "activiteit opgeslagen",
"evt_confirm_deleted" => "activiteit verwijderd",
"evt_add_close" => "Toevoegen en sluiten",
"evt_add" => "Toevoegen",
"evt_edit" => "Wijzigen",
"evt_save_close" => "Opslaan en sluiten",
"evt_save" => "Opslaan",
"evt_clone" => "Als nieuw opslaan",
"evt_delete" => "Verwijderen",
"evt_close" => "Sluiten",
"evt_open_calendar" => "Kalender openen",
"evt_added" => "Ingevoerd",
"evt_edited" => "Gewijzigd",
"evt_is_repeating" => "is een herhalende activiteit.",
"evt_is_multiday" => "is een meerdere dagen durende activiteit.",
"evt_edit_series_or_occurrence" => "Wil je deze activiteit of de hele serie wijzigen?",
"evt_edit_series" => "Wijzig de serie activiteiten",
"evt_edit_occurrence" => "Wijzig deze activiteit",

//views
"vws_add_event" => "Activiteit toevoegen",
"vws_view_month" => "Per maand",
"vws_view_week" => "Per week",
"vws_view_day" => "Deze dag",
"vws_click_for_full" => "voor volledige kalender klik op maand",
"vws_view_full" => "Open volledige kalender",
"vws_prev_month" => "Vorige maand",
"vws_next_month" => "Volgende maand",
"vws_today" => "Vandaag",
"vws_back_to_today" => "Terug naar de maand van vandaag",
"vws_week" => "week",
"vws_wk" => "wk",
"vws_time" => "tijd",
"vws_events" => "Activiteiten",
"vws_all_day" => "Hele dag",
"vws_earlier" => "Vroeger",
"vws_later" => "Later",
"vws_venue" => "Locatie",
"vws_events_for_next" => "Activiteiten voor de komende",
"vws_days" => "dag(en)",
"vws_added" => "Toegevoegd",
"vws_edited" => "Gewijzigd",
"vws_notify" => "Stuur e-mail",
"vws_none_due_in" => "Geen activiteiten voor de komende",

//changes.php
"chg_from_date" => "Vanaf datum",
"chg_select_date" => "Kies begindatum",
"chg_notify" => "Stuur e-mail",
"chg_days" => "dag(en)",
"chg_added" => "Toegevoegd",
"chg_edited" => "Gewijzigd",
"chg_deleted" => "Verwijderd",
"chg_changed_on" => "Gewijzigd op",
"chg_changes" => "Wijzigingen",
"chg_no_changes" => "Geen wijzigingen.",

//search.php
"sch_define_search" => "Definieer zoekactie",
"sch_search_text" => "Zoektekst",
"sch_event_fields" => "Activiteitvelden",
"sch_all_fields" => "Alle velden",
"sch_title" => "Titel",
"sch_description" => "Omschrijving",
"sch_venue" => "Plaats",
"sch_event_cat" => "Activiteitcategorie",
"sch_all_cats" => "Alle categorieën",
"sch_occurring_between" => "Tussen data",
"sch_select_start_date" => "Kies begindatum",
"sch_select_end_date" => "Kies einddatum",
"sch_search" => "Zoek",
"sch_invalid_search_text" => "Zoektekst ontbreekt of is te kort",
"sch_bad_start_date" => "Ongeldige begindatum",
"sch_bad_end_date" => "Ongeldige einddatum",
"sch_no_results" => "Geen resultaten gevonden",
"sch_new_search" => "Nieuwe zoekopdracht",
"sch_calendar" => "Naar kalender",
"sch_instructions" =>
"<h4>Zoek Instructies</h4>
<p>De kalender database kan worden doorzocht op activiteiten waarin een 
bepaalde tekst voorkomt.</p>
<br><p><b>Zoektekst</b>: Alleen de geselecteerde velden (zie hieronder) van 
de activiteiten worden doorzocht. De zoekactie is hoofdletterongevoelig.</p>
<p>Er zijn twee jokers beschikbaar:</p>
<ul>
<li>Lage streepjes (_) in de zoektekst dienen als joker voor één karakter.
<br>Bijv.  '_ie_' geeft 'dier', 'Piet', 'lied'.</li>
<li>Ampersands (&amp;) in de zoektekst dienen als joker voor één of meer 
karakters.
<br>Bijv.  'd&amp;r' geeft 'December', 'dor', 'dader'.</li>
</li>
</ul>
<p>Wel moet de zoektekst minstens twee andere karakters bevatten.</p>
<br><p><b>Activiteitvelden</b>: Alleen de geselecteerde velden worden 
doorzocht.</p>
<br><p><b>Activiteitcategorie</b>: Alleen activiteiten in de geselecteerde 
categorie worden doorzocht.</p>
<br><p><b>Tussen data</b>: De begin- en einddatum zijn beide optioneel. Een 
blanco begindatum betekent: vanaf nu een jaar geleden en een blanco einddatum 
betekent: vanaf nu een jaar vooruit.</p>
<br><p>De zoekresultaten worden weergegeven in chronologische volgorde.</p>",

//stand-alone sidebar (lcsbar.php)
"ssb_upco_events" => "Upcoming Events",
"ssb_all_day" => "All day",
"ssb_none" => "No upcoming events."
);
?>
