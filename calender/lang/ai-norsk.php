<?php
/*
= LuxCal event calendar admin interface language file =

Oversatt til norsk av Ove Almåsbakk. Kommentarer, forbedringsforslag osv kan sendes til ovealmasbakk@yahoo.no

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","2.7.2");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Ingen",
"back" => "Tilbake",
"close" => "Close",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//settings.php - fieldset headers + general
"set_general_settings" => "Kalenderinnstillinger",
"set_opanel_settings" => "Options Panel",
"set_user_settings" => "Brukerinnstillinger",
"set_minical_settings" => "Mini Calendar / Upcoming Events Sidebar (only relevant if used)",
"set_view_settings" => "Visningsinnstilinger",
"set_dt_settings" => "Dato/tid innstilinger",
"set_save_settings" => "Lagre innstillinger",
"set_missing_invalid" => "missing or invalid settings (background highlighted)",
"set_settings_saved" => "Kalenderinnstilingerer lagret",
"set_save_error" => "Database error - Saving calendar settings failed",
"hover_for_details" => "Hold hold over; beskrivelser av detaljer",
"enabled" => "aktiveret",
"disabled" => "deaktiveret",
"no" => "nei",
"yes" => "ja",
"or" => "eller",
"minutes" => "minutter",
"pixels" => "pixels",
"no_way" => "Du har ikke rett til og utføre denne funksjonen",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Kalendertittel",
"calendarTitle_text" => "Vises i kalenderens topbj&aelig;lke og brukes ved beskjeder.",
"calendarUrl_label" => "Kalender URL",
"calendarUrl_text" => "Kalenderens webside-adresse.",
"calendarEmail_label" => "Kalender email-adresse",
"calendarEmail_text" => "Avsenderens email adresse brukes i beskjed-emails.<br>Format: \'email\' eller \'navn&#8249;email&#8250;\'. \'navn\' kan v&aelig;re kalenderens navn.",
"timeZone_label" => "Tidszone",
"timeZone_text" => "Kalenderens tidszone, brukes til å beregne tidspunktet.",
"see" => "se",
"chgEmailList_label" => "Emailm&aring;l for &aelig;ndringer",
"chgEmailList_text" => "M&aring;l-emailadresser, som periodisk modtager en email med kalenderforrandringer.<br>Email-adresser adskilt af semikolonner.<br>(requires a cron-job)",
"chgNofDays_label" => "Dager og se tilbake etter forrandringer",
"chgNofDays_text" => "Antall dager, som skal ses tilbake etter kalender-forrandringer.<br>If the number of days is set to 0 no summary of changes will be sent.<br>(requires a cron-job)",
"notifSender_label" => "Sender of notification emails",
"notifSender_text" => "When the calendar sends reminder emails, the sender field of the email can contain either the calendar email address, or the email address of the user who created the event.<br>In case of the user email address, the receiver can reply to the email.",
"cronSummary_label" => "Admin cron job summary",
"cronSummary_text" => "Send a cron job summary to the calendar administrator.<br>Enabling is only useful if a cron job has been activated for the calendar.",
"details4All_label" => "Show event details to all users",
"details4All_text" => "If enabled: event details will be visible to the owner of the event and to all other users.<br>If disabled: event details will only be visible to the owner of the event and to users with \'post all\' rights. Other users with less rights will not see the event details.",
"rssFeed_label" => "RSS feed links",
"rssFeed_text" => "If enabled: For users with at least \'view\' rights an RSS feed link will be visible in the footer of the calendar and an RSS feed link will be added to the HTML head of the calendar pages.",
"eventExp_label" => "Event expiry days",
"eventExp_text" => "Number of days after the event due date when the event expires and will be automatically deleted.<br>If 0 or if no cron job is running, no events will be automatically deleted.<br>(requires a cron job)",
"cookieExp_label" => "'Remember me' cookie expiry days",
"cookieExp_text" => "Number of days before the cookie set by the \'Remember me\' option (during Log In) will expire.",
"calendar" => "calendar",
"user" => "user",

//settings.php - options panel settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"userMenu_label" => "User filter menu",
"userMenu_text" => "Display the user filter menu in the options panel.<br>This filter can be used to only display events created by one specific user.",
"catMenu_label" => "Category filter menu",
"catMenu_text" => "Display the event category filter menu in the options panel.<br>This filter can be used to only display events belonging to a specific event category.",
"langMenu_label" => "Språk meny",
"langMenu_text" => "Vis språkvalgsmeny i navigasjonsbaren.<br>This menu can be used to select the user interface language.<br>(aktivering gir kun mening, hvis flere språk er installert)",
"defaultView_label" => "Standardvisning ved start",
"defaultView_text" => "Mulige standardvisninger ved starten av kalenderen er:<br>- &Aring;r<br>- M&aring;ned<br>- Uke<br>- Dag<br>- Kommende<br>- &AElig;ndringer<br>Anbefalt valg: M&aring;ned eller Kommende.",
"language_label" => "Standard språk",
"language_text" => "Filerne ui-{språk}.php, ai-{språk}.php, ug-{språk}.php og ug-layout.png skal finnes i lang/ folderen. {språg} = det valgte språk til brukerinterfacen. Filnavne skal skrives med sm&aring; bokstaver!",

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Selvregistrering",
"selfReg_text" => "Tillat brukere og registrere seg selv for å få adgang til kalenderen.",
"selfRegPrivs_label" => "Selvregistreringsrettigheter",
"selfRegPrivs_text" => "Kalenderadgangsrettigheter for selvregistrerede brukere.<br>- vis: kun visning<br>- send-selv: sende begivenheter og editere egne begivenheter<br>- send-alle: sende begivenheter og editere egne og andres begivenheter",
"selfRegNot_label" => "Self registration notification",
"selfRegNot_text" => "Send a notification email to the calendar email address when a self-registation takes place.",
"view" => "view",
"post_own" => 'post egen',
"post_all" => 'post alle',
"maxNoLogin_label" => "Max. antall dager man ikke har logget inn",
"maxNoLogin_text" => "Hvis en bruker ikke har logget inn iløpet av de dagene, så vil kontoen bli slettet.<br>Hvis verdien er 0, så vil brukerne aldri bli slettet<br>(requires a cron-job)",//

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"miniCalView_label" => "Mini calendar view",
"miniCalView_text" => "Possible views for the mini calendar are:<br>- Full Month<br>- Work Month *)<br>- Full Week<br>- Work Week *)<br>*) For work week days see on this page: Views - Work week days",
"miniCalPost_label" => "Mini kalender event posting",
"miniCalPost_text" => "Bare relevant hvis mini kalenderen er i bruk!<br>hvis slått på, så kan brukere:<br>- poste nye events i kalenderen med bare og klikke på den øverste bar\'en<br>- edit/delete begivenheter med og klikke på begivenheten sitt kryss",
"miniCalHBox_label" => "Mini cal event details hover box",
"miniCalHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in the mini calendar",
"sideBarHBox_label" => "Sidebar event details hover box",
"sideBarHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event in the sidebar",
"showLinkInSB_label" => "Show links in sidebar",
"showLinkInSB_text" => "Display URLs from the event description as a hyperlink in the upcoming events sidebar",
"sideBarDays_label" => "Days to look ahead in sidebar",
"sideBarDays_text" => "Number of days to look ahead for events in the upcoming events sidebar.",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Start month in Year view",
"yearStart_text" => "If a start month has been specified (1 - 12), in Year view the calendar will always start with this month and the year of this first month will only change as of the first day of the same month in the next year.<br>The value 0 has a special meaning: the start month is based on the current date and will fall in the first row of months.",
"colsToShow_label" => "Spalter som vises i &aring;rs-visning",
"colsToShow_text" => "Antall m&aring;neder som skal vises i hver linje i &aring;rs-visning.<br>Anbefaler valg: 3 eller 4.",
"rowsToShow_label" => "R&aelig;kker der vises i &aring;rs-visning",
"rowsToShow_text" => "Antall r&aelig;kker av fire m&aring;nedersom vises i &aring;rs-visningen.<br>Anbefalet valg: 4, som gir 16 m&aring;neder, og scrolle igjennom.",
"weeksToShow_label" => "Uker som vises i m&aring;neds-visning",
"weeksToShow_text" => "Antall uker som vises i m&aring;nedsvisning.<br>Anbefalet valg: 10, hvilket gir 2,5 m&aring;ned og scrolle igjennm.<br>V&aelig;rdien 0 har en s&aelig;rlig betydning: vis pr&aelig;cist 1 m&aring;ned.",
"workWeekDays_label" => "Work week days",
"workWeekDays_text" => "Days to be shown in each week in Work Month view and Work Week view.<br>Enter the number of each day that should be visible. Valid day numbers:<br>1 = Monday<br>2 = Tuesday<br>....<br>7 = Sunday<br>e.g. 12345 : Monday - Friday",
"lookaheadDays_label" => "Dager som skal ses fremmad",
"lookaheadDays_text" => "Antall dager det skal ses fremmad i visningen Kommende Begivenheter, in the Todo List og i RSS feeds.",
"dwStartHour_label" => "Starttime i dag-/ukevisning",
"dwStartHour_text" => "Time hvor en normal dags begivenheter starter.<br>Hvis denne v&aelig;rdi f.eks. s&aelig;ttes til 6, undg&aring;r man at spilde plads i uge-/dagvisning til de stille timer mellem midnat og 6.00.",
"dwEndHour_label" => "End hour in Day/Week view",
"dwEndHour_text" => "Hour at which a normal day of events ends.<br>E.g., setting this value to 18 will avoid wasting space in Week/Day view for the quiet time between 18:00 and midnight.",
"dwTimeSlot_label" => "Time slot in Day/Week view",
"dwTimeSlot_text" => "Day/Week view time slot in number of minutes.<br>This value, together with the Start hour and End hour (see above) will determine the number of rows in Day/Week view.",
"dwTsHeight_label" => "Tids slot høyde",
"dwTsHeight_text" => "Dag/Uke se tids slot display i nummer av pixler.",
"eventHBox_label" => "Event details hover box",
"eventHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in Year view or an event title in Month, Week or Day view.",
"showAdEd_label" => "Show date event added/edited",
"showAdEd_text" => "Show the date the event was added/edited and the user who added/edited the event in:<br>- the Upcoming view<br>- the Changes view<br>- the events on the Text Search page<br>- rss feeds<br>- email notifications.",
"showCatName_label" => "Vis kategori navn",
"showCatName_text" => "If switched on, in various views, apart from displaying the event description in the event category color, the category name will also be displayed.",//
"showLinkInMV_label" => "Show links in month view",
"showLinkInMV_text" => "If switched on, URLs in the event description will be displayed as hyperlink in month view",
"eventColor_label" => "Event colors based on",
"eventColor_text" => "Events in the various calendar views can be displayed in the color assigned to the user who created the event or the color of the event category.",
"owner_color" => "owner color",
"cat_color" => "category color",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Datoformat (dd mm yyyy)",
"dateFormat_text" => "Text string defining the format of event dates in the calendar views and input fields.<br>Possible characters: y = year, m = month and d = day.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>y-m-d: 2012-10-31<br>m.d.y: 10.31.2012<br>d/m/y: 31/10/2012",
"dateFormat_expl" => "e.g. y.m.d: 2012.10.31",
"MdFormat_label" => "Date format (dd month)",
"MdFormat_text" => "Text string defining the format of dates consisting of month and day.<br>Possible characters: M = month in text, d = day in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>d M: 12 April<br>M, d: July, 14",
"MdFormat_expl" => "e.g. M, d: July, 14",
"MdyFormat_label" => "Date format (dd month yyyy)",
"MdyFormat_text" => "Text string defining the format of dates consisting of day, month and year.<br>Possible characters: d = day in digits, M = month in text, y = year in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>d M y: 12 April 2012<br>M d, y: July 8, 2012",
"MdyFormat_expl" => "e.g. M d, y: July 8, 2012",
"MyFormat_label" => "Date format (month yyyy)",
"MyFormat_text" => "Text string defining the format of dates consisting of month and year.<br>Possible characters: M = month in text, y = year in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>M y: April 2012<br>y - M: 2012 - July",
"MyFormat_expl" => "e.g. M y: April 2012",
"DMdFormat_label" => "Date format (weekday dd month)",
"DMdFormat_text" => "Text string defining the format of dates consisting of weekday, day and month.<br>Possible characters: WD = weekday in text, M = month in text, d = day in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>WD d M: Friday 12 April<br>WD, M d: Monday, July 14",
"DMdFormat_expl" => "e.g. WD - M d: Sunday - April 6",
"DMdyFormat_label" => "Date format (weekday dd month yyyy)",
"DMdyFormat_text" => "Text string defining the format of dates consisting of weekday, day, month and year.<br>Possible characters: WD = weekday in text, M = month in text, d = day in digits, y = year in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>WD d M y: Friday 13 April 2012<br>WD - M d, y: Monday - July 16, 2012",
"DMdyFormat_expl" => "e.g. WD, M d, y: Monday, July 16, 2012",
"timeFormat_label" => "Time format (hh mm)",
"timeFormat_text" => "Text string defining the format of event times in the calendar views and input fields.<br>Possible characters: h = hours, m = minutes, a = am/pm (optional), A = AM/PM (optional).<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>h:m: 22:35<br>h.m a: 10.35 pm<br>h:mA: 10:35PM",
"timeFormat_expl" => "e.g. h:m: 22:35 and h:mA: 10:35PM",
"weekStart_label" => "Ukens f&oslash;rste dag",
"weekStart_text" => "Ukens f&oslash;rste dag.",
"weekNumber_label" => "Vis uke nummer",
"weekNumber_text" => "The display of week numbers in Year, Month and Week view can be enabled/disabled",
"time_format_us" => "12-timer AM/PM",
"time_format_eu" => "24-timer",
"sunday" => "S&oslash;ndag",
"monday" => "Mandag",
"time_zones" => "TIME ZONES",
"dd_mm_yyyy" => "dd-mm-yyyy",
"mm_dd_yyyy" => "mm-dd-yyyy",
"yyyy_mm_dd" => "yyyy-mm-dd",

//login.php
"log_log_in" => "Logg inn",
"log_remember_me" => "Remember me",
"log_register" => "Registrer",
"log_change_my_data" => "&AElig;ndre mine data",
"log_change" => "&AElig;ndre",
"log_un_or_em" => "Brukernavn eller email",
"log_un" => "Brukernavn",
"log_em" => "Email",
"log_pw" => "Password",
"log_new_un" => "Nytt brukernavn",
"log_new_em" => "Ny email",
"log_new_pw" => "Nytt Password",
"log_pw_msg" => "Her er ditt password til ogt logge inn med",
"log_pw_subject_pre" => "Ditt",
"log_pw_subject_post" => "Password",
"log_npw_msg" => "Her er ditt nye password til og logge inn med",
"log_npw_subject_pre" => "Ditt nye",
"log_npw_subject_post" => "Password",
"log_npw_sent" => "Ditt nye password har blitt sendt.",
"log_registered" => "Registrering virket - ditt password er sendt til deg pr. email",
"log_not_registered" => "Registrering mislykkes",
"log_un_exists" => "Brukernavn finnes allerede",
"log_em_exists" => "Email-adresse finnes allerede",
"log_un_invalid" => "Ugyldig brukernavn (min l&aelig;ngde 2: A-Z, a-z, 0-9, og _-.) ",
"log_em_invalid" => "Ugyldig email-adresse",
"log_un_em_invalid" => "Brukernavn/email er ikke gyldig",
"log_un_em_pw_invalid" => "Ditt brukernavn/email eller password er feil",
"log_no_un_em" => "Du tastet ikke inn brukernavn/email",
"log_no_un" => "Inntast ditt brukernavn",
"log_no_em" => "Inntast din email-adresse",
"log_no_pw" => "Du inntastet ikke ditt password",
"log_no_rights" => "Login feil. Du har ikke rettigheter - kontakt admin",//
"log_send_new_pw" => "Send nytt password",
"log_if_changing" => "Kun hvis det &aelig;ndres",
"log_no_new_data" => "Ingen data &aelig;ndret",
"log_invalid_new_un" => "Ugyldig brukernavn (min l&aelig;ngde 2: A-Z, a-z, 0-9, og _-.) ",
"log_new_un_exists" => "Nytt brukernavn finnes allerede",
"log_invalid_new_em" => "Ny email-adresse ugyldig",
"log_new_em_exists" => "Ny email-adresse finnes allerede",
"log_ui_language" => "Bruker språk",
"log_new_reg" => "New user registration",
"log_date_time" => "Date / time",
"log_reload_retry" => "Time-out. Please close this window, reload the calendar and try again",

//categories.php
"cat_list" => "Liste med kategorier",
"cat_edit" => "Editer",
"cat_delete" => "Slett",
"cat_add_new" => "Legge til ny kategori",
"cat_add" => "Legge til",
"cat_edit_cat" => "Editer kategori",
"cat_name" => "Kategorinavn",
"cat_sequence" => "Sekvens",
"cat_in_menu" => "in menu",//
"cat_text_color" => "Tekstfarge",
"cat_background" => "Bakgrunn",
"cat_select_color" => "Legge til farge",
"cat_save" => "Oppdater",
"cat_added" => "Kategori lagt til",
"cat_updated" => "Kategori oppdateret",
"cat_deleted" => "Kategori slettet",
"cat_invalid_color" => "Feil farge format (#XXXXXX where X = HEX-value)",
"cat_not_added" => "Kategori ikke lagt til",
"cat_not_updated" => "Kategori ikke oppdateret",
"cat_not_deleted" => "Kategori ikke slettet",
"cat_nr" => "#",
"cat_repeat" => "Repeter",
"cat_every_day" => "hver dag",
"cat_every_week" => "hver uke",
"cat_every_month" => "hver måned",
"cat_every_year" => "hvert år",
"cat_public" => "Publik",
"cat_check_mark" => "Check mark",
"cat_label" => "label",
"cat_mark" => "mark",

//users.php
"usr_list_of_users" => "Liste med brukere",
"usr_name" => "Brukernavn",
"usr_email" => "Email",
"usr_password" => "Password",
"usr_rights" => "Rettigheter",
"usr_language" => "Språk",
"usr_ui_language" => "Bruker interface språk",
"usr_edit_user" => "Editere bruker profil",
"usr_add" => "Legge til bruker",
"usr_edit" => "Editer",
"usr_delete" => "Slett",
"usr_view" => "Vise",
"usr_post_own" => "Send egne",
"usr_post_all" => "Send alle",
"usr_admin" => "Admin",
"usr_login_0" => "Første login",
"usr_login_1" => "Siste login",
"usr_login_cnt" => "Logins",
"usr_add_profile" => "Legge til profil",
"usr_upd_profile" => "Oppdater profiler",
"usr_not_found" => "Bruker ikke funnet",
"usr_if_changing_pw" => "Kun hvis password skal forrandres",
"usr_admin_functions" => "Admin funksjoner",
"usr_no_rights" => "Ingen adgang rettigheter",
"usr_view_calendar" => "Se kalender",
"usr_post_events_own" => "Send + editer egne begivenheter",
"usr_post_events_all" => "Send + editer alle begivenheter",
"usr_pw_not_updated" => "Password ikke oppdateret",
"usr_added" => "Bruker lagt til",
"usr_updated" => "Brukerprofil oppdateret",
"usr_deleted" => "Bruker slettet",
"usr_not_added" => "Bruker ikke lagt til",
"usr_not_updated" => "Bruker ikke oppdateret",
"usr_not_deleted" => "Bruker ikke slettet",
"usr_cred_required" => "Brukernavn, email og password trengs",
"usr_uname_exists" => "Brukernavn finnes allerede",
"usr_email_exists" => "Emailadresse finnes allerede",
"usr_un_invalid" => "Feil brukernavn (min length 2: A-Z, a-z, 0-9, and _-.) ", //
"usr_em_invalid" => "Feil email addresse", //
"usr_cant_delete_yourself" => "Du kan ikke slette deg selv", //
"usr_background" => "Background color",
"usr_select_color" => "Select Color",
"usr_invalid_color" => "Color format invalid (#XXXXXX where X = HEX-value)",

//database.php
"mdb_dbm_functions" => "Database Functions",
"mdb_noshow_tables" => "Cannot get table(s)",
"mdb_compact" => "Compact database",
"mdb_compact_table" => "Compact table",
"mdb_compact_error" => "Error",
"mdb_compact_done" => "Done",
"mdb_purge_done" => "Deleted events definitively removed",
"mdb_repair" => "Check and repair database",
"mdb_check_table" => "Check table",
"mdb_ok" => "OK",
"mdb_nok" => "Not OK",
"mdb_nok_repair" => "Not OK, repair started",
"mdb_backup" => "Backup database",
"mdb_backup_table" => "Backup table",
"mdb_backup_done" => "Done",
"mdb_file_saved" => "Backup file saved on server.",
"mdb_file_name" => "File name:",
"mdb_start" => "Start",
"mdb_no_function_checked" => "No function(s) selected",
"mdb_write_error" => "Writing backup file failed<br>Check permissions of 'files/' directory",

//import/export.php
"iex_file" => "Valgt fil",
"iex_file_name" => "iCal file name",
"iex_file_description" => "iCal fil-beskrivelse",
"iex_filters" => "Event Filters",
"iex_upload_ics" => "Upload iCal-fil",
"iex_create_ics" => "Upret iCal-fil",
"iex_upload_csv" => "Upload CSV-fil",
"iex_upload_file" => "Upload fil",
"iex_create_file" => "Upret fil",
"iex_download_file" => "Download fil",
"iex_fields_sep_by" => "Felter adskilt av",
"iex_birthday_cat_id" => "F&oslash;dselsdagskategori ID",
"iex_default_cat_id" => "Standardkategori ID",
"iex_if_no_cat" => "hvis ingen kategori finnes",
"iex_import_events_from_date" => "Importer begivenheter som skjer etter",
"iex_see_insert" => "se veiledning i h&oslash;jre side",
"iex_no_file_name" => "Filnavn mangler",
"iex_inval_field_sep" => "ugyldig eller manglende felt-avskiller",
"iex_no_begin_tag" => "ugyldig iCal-fil (BEGIN-tag mangler)",
"iex_date_format" => "Begivenhets-dato-format",
"iex_time_format" => "Begivenhets-tids-format",
"iex_number_of_errors" => "Antall feil i listen",
"iex_bgnd_highlighted" => "bakgrund fremhevet",
"iex_verify_event_list" => "Verifiser begivenhetsliste, korriger feil og klikk",
"iex_add_events" => "Legg til begivenheter til database",
"iex_select_birthday_delete" => "V&aelig;lg f&oslash;dselsdag og slett markeringsfelter som &oslash;nsket",
"iex_select_delete_ignore" => "V&aelig;lg slett markeringsfelter for og ignorere begivenheter",
"iex_title" => "Titel",
"iex_venue" => "Lokalitet",
"iex_owner" => "Eier",
"iex_category" => "Kategori",
"iex_date" => "Dato",
"iex_end_date" => "Slutdato",
"iex_start_time" => "Starttid",
"iex_end_time" => "Sluttid",
"iex_description" => "Beskrivelse",
"iex_birthday" => "F&oslash;dselsdag",
"iex_delete" => "Slett",
"iex_events_added" => "begivenheter tilf&oslash;jet",
"iex_events_dropped" => "begivenheter utelatt (finnes allerede)",
"iex_db_error" => "Databasefeil",
"iex_ics_file_error_on_line" => "iCal-filfejl p&aring; linje",
"iex_occurring_between" => "Skjer mellom",
"iex_changed_between" => "Lagt til/forrandret mellom",
"iex_select_date" => "Velg dato",
"iex_select_start_date" => "Select start date",
"iex_select_end_date" => "Select end date",
"iex_all_cats" => "alle kategorier",
"iex_all_users" => "all brukere",
"iex_no_events_found" => "Ingen begivenheter funnet",
"iex_file_created" => "Fil oprettetet",
"iex_write error" => "Writing export file failed<br>Check permissions of 'files/' directory",

//lcalcron.php
"cro_sum_header" => "CRON JOB SUMMARY",
"cro_sum_trailer" => "END OF SUMMARY",

//eventchk.php
"evc_sum_title" => "EVENTS EXPIRED",
"evc_nr_deleted" => "Number of events deleted",

//notify.php
"not_sum_title" => "EMAIL PÅMINNELSER",
"not_not_sent_to" => "Påminnelser sendt til",
"not_no_not_dates_due" => "Ingen varsling dato pga",
"not_all_day" => "Hele dagen",
"not_mailer" => "mailer",
"not_subject" => "Emne",
"not_event_due_in" => "Følgende begivenhet skjer om",
"not_due_in" => "Skjer om",
"not_days" => "dag(er)",
"not_date_time" => "Dato /tid",
"not_title" => "Titel",
"not_sender" => "Avsender",
"not_venue" => "Sted",
"not_description" => "Beskrivelse",
"not_category" => "Kategori",//
"not_status" => "Status",
"not_open_calendar" => "Åpne kalender",//

//sendchg.php
"sch_sum_title" => "KALENDER FORRANDRINGER",
"sch_nr_changes_last" => "Nummer for forrandringer siden",
"sch_report_sent_to" => "Rapport sendt til",
"sch_no_report_sent" => "Ingen rapport emailed",
"sch_days" => "dag(er)",

//userchk.php
"usc_sum_title" => "BRUKER KONTO SJEKK",
"usc_nr_accounts_deleted" => "Nummer på kontoer som har blitt slettet",
"usc_no_accounts_deleted" => "Ingen kontoer er blitt sletttet",

//explanations
"xpl_manage_db" =>
"<h4>Manage Database Instructions</h4>
<p>On this page the following functions can be selected:</p>
<h5>Check and repair database</h5>
<p>This function will scan the calendar tables and check for errors. If an error
is found, the error will be repaired, if possible.</p>
<p>If the calendar views don't show any problems, running this function once a 
year should be sufficient.</p>
<h5>Compact database</h5>
<p>When a user deletes an event, the event will be marked as 'deleted', but will 
not be removed from the database. The Compact Database function will permanently 
remove events deleted more than 30 days ago from the database and free the space 
occupied by these events.</p>
<h5>Backup database</h5>
<p>This function wil create a backup of the full calendar database (tables 
structure and contents) in .sql format. The backup will be saved in the 
<strong>files/</strong> directory with file name: 
<kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (where 'yyyymmdd' = year, month, and 
day, and hhmmss = hour, minutes and seconds.</p>
<p>This backup file can be used to re-create the database tables structure and 
contents, for instance by importing the file in the <strong>phpMyAdmin</strong> 
tool which is available on the server of most web hosts.</p>",

"xpl_import_csv" =>
"<h4>CSV import-vejledning</h4>
<p>Denne formular bruges til at importere en <strong>kommasepareret (CSV)</strong> tekst-
fil med begivenheder til LuxCal kalenderen.</p>
<p>R&aelig;kkef&oslash;lgen af kolonner i CSV-filen skal v&aelig;re: titel, sted, kategori-id (se 
herunder), dato, slutdato, starttid, sluttid og beskrivelse. F&oslash;rste r&aelig;kke i 
CSV-filen, der bruges til kolonnebeskrivelser, ignoreres.</p>
<h5>Eksempel CSV-filer</h5>
<p>Eksempel CSV-filer findes i folderen 'files/' i din LuxCal-download.</p>
<h5>Dato- og tidsformat</h5>
<p>Det valgte begivenheds dato-format og begivenheds tidsformat til venstre skal passe til 
formatet for datoer og tider i den oploadede CSV-fil.</p>
<h5>Tabel med kategorier</h5>
<p>Kalenderen bruger ID-numre til at angive kategorier. Kategori-IDerne i CSV- 
filen skal svare til kategorierne brugt i kalenderen eller v&aelig;re tomme.</p>
<p>Hvis du i n&aelig;ste skridt vil markere en begivenhed som 'f&oslash;dselsdag', skal <strong>f&oslash;dselsdags-
kategorien</strong> s&aelig;ttes til den tilsvarende ID i kategorilisten herunder.</p>
<br>
<p>I din kalender er de f&oslash;lgende kategorier defineret i &oslash;jeblikket:</p>",

"xpl_import_ical" =>
"<h4>iCalendar import-vejledning</h4>
<p>Denne formular bruges til at importere en <strong>iCalendar</strong>-fil med begivenheder 
til LuxCal-kalender.</p>
<p>Filindholdet skal svare til standarden [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545</a></u>] fra Internet Engineering Task Force.</p>
<p>Kun begivenheder importeres; andre iCal-komponenter, som: To-Do, Journal, Fri / 
optaget, Tidszone og Alarm, ignoreres.</p>
<p>Eksempel iCalendar-filer kan findes i folderen 'files/' i din LuxCal 
download.</p>
<h5>Tabel med kategorier</h5>
<p>Kalenderen bruger ID-numre til at angive kategorier. Kategori-IDer i 
iCalendar-filen skal svare til kategorierne brugt i din kalender eller v&aelig;re 
tomme.</p>
<br>
<p>I din kalender er de f&oslash;lgende kategorier defineret i &oslash;jeblikket:</p>",

"xpl_export_ical" =>
"<h4>iCalendar eksport-vejledning</h4>
<p>Denne formular bruges til at udl&aelig;se og eksportere <strong>iCalendar</strong> begivenheder 
fra LuxCal kalenderen.</p>
<p>The <b>iCal file name</b> (without extension) is optional. Created files will 
be stored in the \"files/\" directory on the server with the specified file name, 
or otherwise with the name \"luxcal\". The file extension will be <b>.ics</b>.
Existing files in the \"files/\" directory on the server with the same name will 
be overwritten by the new file.</p>
<p>iCal filbeskrivelsen (f.eks. 'M&oslash;der 2012') er optional. Hvis det indtastes, 
tilf&oslash;jes det til headeren i den eksporterede iCal-fil.</p>
<p>Event filters: De eksporterede begivenheder kan filtreres med:</p>
<ul>
<li>event owner</li>
<li>begivenhedskategori</li>
<li>begivenhedsstartdato</li>
<li>begivenheds tilf&oslash;jet/sidste &aelig;ndringsdato</li>
</ul>
<p>Hvert filter er optionalt. En blank dato betuder: ingen gr&aelig;nser</p>
<br>
<p>Indholdet af filen med udl&aelig;ste begivenheder vil svare til standarden 
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545</a></u>] 
fra Internet Engineering Task Force.</p>
<p>When <b>downloading</b> the exported iCal file, the date and time will be 
added to the name of the downloaded file.</p>
<p>Eksempel iCalendar-filer kan findes i folderen 'files/' i din LuxCal 
download.</p>"
);
?>
