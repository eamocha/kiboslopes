<?php
/*
= LuxCal event calendar admin interface language file =

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","2.7.2");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "None",
"back" => "Bag",
"close" => "Close",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//settings.php - fieldset headers + general
"set_general_settings" => "Kalenderindstillinger",
"set_opanel_settings" => "Options Panel",
"set_user_settings" => "Brugerindstillinger",
"set_minical_settings" => "Mini Calendar / Upcoming Events Sidebar (only relevant if used)",
"set_view_settings" => "Visningsindstilinger",
"set_dt_settings" => "Dato/tid indstilinger",
"set_save_settings" => "Gem indstilinger",
"set_missing_invalid" => "missing or invalid settings (background highlighted)",
"set_settings_saved" => "Kalenderindstilingerer gemt",
"set_save_error" => "Database error - Saving calendar settings failed",
"hover_for_details" => "Hold p&aring; beskrivelser for detaljer",
"enabled" => "aktiveret",
"disabled" => "deaktiveret",
"no" => "nei",
"yes" => "ja",
"or" => "or",
"minutes" => "minutes",
"pixels" => "pixels",
"no_way" => "Du har ikke ret til at udf&oslash;re denne funktion",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Kalendertitel",
"calendarTitle_text" => "Vises i kalenderens topbj&aelig;lke og bruges ved beskeder.",
"calendarUrl_label" => "Kalender URL",
"calendarUrl_text" => "Kalenderens webside-adresse",
"calendarEmail_label" => "Kalender email-adresse",
"calendarEmail_text" => "Afsenderens email adresse bruges i besked-emails.<br>Format: \'email\' eller \'navn&#8249;email&#8250;\'. \'navn\' kan v&aelig;re kalenderens navn.",
"timeZone_label" => "Tidszone",
"timeZone_text" => "Kalenderens tidszone, bruges til at beregne tidspunktet.",
"see" => "se",
"chgEmailList_label" => "Emailm&aring;l for &aelig;ndringer",
"chgEmailList_text" => "M&aring;l-emailadresser, som periodisk modtager en email med kalender&aelig;ndringer.<br>Email-adresser adskilt af semikolonner.<br>(requires a cron-job)",
"chgNofDays_label" => "Dage at se tilbage efter &aelig;ndringer",
"chgNofDays_text" => "Antal dage, der skal ses tilbage efter kalender-&aelig;ndringer.<br>If the number of days is set to 0 no summary of changes will be sent.<br>(requires a cron-job)",
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
"langMenu_label" => "Sprogvalgsmenu",
"langMenu_text" => "Vis sprogvalgsmenu i navigationsbj&aelig;lken.<br>This menu can be used to select the user interface language.<br>(aktivering giver kun mening, hvis flere sprog er installeret)",
"defaultView_label" => "Standardvisning ved start",
"defaultView_text" => "Mulige standardvisninger ved starten af kalenderen er:<br>- &Aring;r<br>- M&aring;ned<br>- Uge<br>- Dag<br>- Kommende<br>- &AElig;ndringer<br>Anbefalet valg: M&aring;ned eller Kommende.",
"language_label" => "Standard brugerinterface-sprog",
"language_text" => "Filerne ui-{sprog}.php, ai-{sprog}.php, ug-{sprog}.php og ug-layout.png skal findes i lang/ folderen. {sprog} = det valgte sprog til brugerinterfacen. Filnavne skal skrives med sm&aring; bogstaver!",

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Selvregistrering",
"selfReg_text" => "Tillad brugere at registrere sig selv for at f&aring; adgang til kalenderen.",
"selfRegPrivs_label" => "Selvregistreringsrettigheder",
"selfRegPrivs_text" => "Kalenderadgangsrettigheder for selvregistrerede brugere.<br>- vis: kun visning<br>- send-selv: sende begivenheder og editere egne begivenheder<br>- send-alle: sende begivenheder og editere egne og andres begivenheder",
"selfRegNot_label" => "Self registration notification",
"selfRegNot_text" => "Send a notification email to the calendar email address when a self-registation takes place.",
"view" => "view",
"post_own" => 'post own',
"post_all" => 'post all',
"maxNoLogin_label" => "Max. nr of days not logged in",
"maxNoLogin_text" => "If a user has not logged in during this number of days, his/her account will be automatically deleted.<br>If this value is set to 0, user accounts will never be deleted<br>(requires a cron-job)",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"miniCalView_label" => "Mini calendar view",
"miniCalView_text" => "Possible views for the mini calendar are:<br>- Full Month<br>- Work Month *)<br>- Full Week<br>- Work Week *)<br>*) For work week days see on this page: Views - Work week days",
"miniCalPost_label" => "Mini calendar event posting",
"miniCalPost_text" => "If enabled users can:<br>- post new events in the mini calendar by clicking the top bar of a day cell<br>- edit/delete events by clicking an event square",
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
"colsToShow_label" => "Spalter der vises i &aring;rs-visning",
"colsToShow_text" => "Antal m&aring;neder der skal vises i hver linje i &aring;rs-visning.<br>Anbefalet valg: 3 eller 4.",
"rowsToShow_label" => "R&aelig;kker der vises i &aring;rs-visning",
"rowsToShow_text" => "Antal r&aelig;kker af fire m&aring;neder der vises i &aring;rs-visningen.<br>Anbefalet valg: 4, hvilket giver 16 m&aring;neder, at scolle igennem.",
"weeksToShow_label" => "Uger der vises i m&aring;neds-visning",
"weeksToShow_text" => "Antal uger der vises i m&aring;nedsvisning.<br>Anbefalet valg: 10, hvilket giver 2,5 m&aring;ned at scrolle igennem.<br>V&aelig;rdien 0 har en s&aelig;rlig betydning: vis pr&aelig;cist 1 m&aring;ned.",
"workWeekDays_label" => "Work week days",
"workWeekDays_text" => "Days to be shown in each week in Work Month view and Work Week view.<br>Enter the number of each day that should be visible. Valid day numbers:<br>1 = Monday<br>2 = Tuesday<br>....<br>7 = Sunday<br>e.g. 12345 : Monday - Friday",
"lookaheadDays_label" => "Dage der skal ses fremad",
"lookaheadDays_text" => "Antal dage der skal ses fremad i visningen kommende begivenheder, the Todo List and the RSS feeds.",
"dwStartHour_label" => "Starttime i dag-/ugevisning",
"dwStartHour_text" => "Time hvor en normal dags begivenheder starter.<br>Hvis denne v&aelig;rdi f.eks. s&aelig;ttes til 6, undg&aring;r man at spilde plads i uge-/dagvisning til de stille timer mellem midnat og 6.00.",
"dwEndHour_label" => "End hour in Day/Week view",
"dwEndHour_text" => "Hour at which a normal day of events ends.<br>E.g., setting this value to 18 will avoid wasting space in Week/Day view for the quiet time between 18:00 and midnight.",
"dwTimeSlot_label" => "Time slot in Day/Week view",
"dwTimeSlot_text" => "Day/Week view time slot in number of minutes.<br>This value, together with the Start hour and End hour (see above) will determine the number of rows in Day/Week view.",
"dwTsHeight_label" => "Time slot height",
"dwTsHeight_text" => "Day/Week view time slot display height in number of pixels.",
"eventHBox_label" => "Event details hover box",
"eventHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in Year view or an event title in Month, Week or Day view.",
"showAdEd_label" => "Show date event added/edited",
"showAdEd_text" => "Show the date the event was added/edited and the user who added/edited the event in:<br>- the Upcoming view<br>- the Changes view<br>- the events on the Text Search page<br>- rss feeds<br>- email notifications.",
"showCatName_label" => "Show category name",
"showCatName_text" => "If switched on, in various views, apart from displaying the event description in the event category color, the category name will also be displayed.",
"showLinkInMV_label" => "Show links in month view",
"showLinkInMV_text" => "If switched on, URLs in the event description will be displayed as hyperlink in month view",
"eventColor_label" => "Event colors based on",
"eventColor_text" => "Events in the various calendar views can be displayed in the color assigned to the user who created the event or the color of the event category.",
"owner_color" => "owner color",
"cat_color" => "category color",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Begivenhedsdatoformat (dd mm yyyy)",
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
"weekStart_label" => "Ugens f&oslash;rste dag",
"weekStart_text" => "Ugens f&oslash;rste dag.",
"weekNumber_label" => "Display week numbers",
"weekNumber_text" => "Displaying week numbers in Year, Month and Week view can be enabled/disabled",
"time_format_us" => "12-timer AM/PM",
"time_format_eu" => "24-timer",
"sunday" => "S&oslash;ndag",
"monday" => "Mandag",
"time_zones" => "TIME ZONES",
"dd_mm_yyyy" => "dd-mm-yyyy",
"mm_dd_yyyy" => "mm-dd-yyyy",
"yyyy_mm_dd" => "yyyy-mm-dd",

//login.php
"log_log_in" => "Log ind",
"log_remember_me" => "Husk mig",
"log_register" => "Registrer",
"log_change_my_data" => "&AElig;ndre mine data",
"log_change" => "&AElig;ndre",
"log_un_or_em" => "Brugernavn eller email",
"log_un" => "Brugernavn",
"log_em" => "Email",
"log_pw" => "Password",
"log_new_un" => "Nyt brugernavn",
"log_new_em" => "Ny email",
"log_new_pw" => "Nyt Password",
"log_pw_msg" => "Her er dit password til at logge ind til",
"log_pw_subject_pre" => "Dit",
"log_pw_subject_post" => "Password",
"log_npw_msg" => "Her er dit nye password til at logge ind til",
"log_npw_subject_pre" => "Dit nye",
"log_npw_subject_post" => "Password",
"log_npw_sent" => "Dit nye password er blevet sendt.",
"log_registered" => "Registrering lykkedes - dit password er sendt til dig pr. email",
"log_not_registered" => "Registrering mislykkedes",
"log_un_exists" => "Brugernavn findes allerede",
"log_em_exists" => "Email-adresse findes allerede",
"log_un_invalid" => "Ugyldigt brugernavn (min l&aelig;ngde 2: A-Z, a-z, 0-9, og _-.) ",
"log_em_invalid" => "Ugyldig email-adresse",
"log_un_em_invalid" => "Brugernavn/email er ikke gyldig",
"log_un_em_pw_invalid" => "Dit brugernavn/email eller password er forkert",
"log_no_un_em" => "Du indtastede ikke brugernavn/email",
"log_no_un" => "Indtast dit brugernavn",
"log_no_em" => "Indtast din email-adresse",
"log_no_pw" => "Du indtastede ikke ditpassword",
"log_no_rights" => "Login rejected: you have no view rights - Contact the administrator",
"log_send_new_pw" => "Send nyt password",
"log_if_changing" => "Kun hvis det &aelig;ndres",
"log_no_new_data" => "Ingen data &aelig;ndret",
"log_invalid_new_un" => "Ugyldigt brugernavn (min l&aelig;ngde 2: A-Z, a-z, 0-9, og _-.) ",
"log_new_un_exists" => "Nyt brugernavn findes allerede",
"log_invalid_new_em" => "Ny email-adresse ugyldig",
"log_new_em_exists" => "Ny email-adresse findes allerede",
"log_ui_language" => "User interface language",
"log_new_reg" => "New user registration",
"log_date_time" => "Date / time",
"log_reload_retry" => "Time-out. Please close this window, reload the calendar and try again",

//categories.php
"cat_list" => "Liste med kategorier",
"cat_edit" => "Editer",
"cat_delete" => "Slet",
"cat_add_new" => "Tilf&oslash;j ny kategori",
"cat_add" => "Tilf&oslash;j",
"cat_edit_cat" => "Editer kategori",
"cat_name" => "Kategorinavn",
"cat_sequence" => "Sekvens",
"cat_in_menu" => "in menu",
"cat_text_color" => "Tekstfarve",
"cat_background" => "Baggrund",
"cat_select_color" => "V&aelig;lg farve",
"cat_save" => "Opdater",
"cat_added" => "Kategori tilf&oslash;jet",
"cat_updated" => "Kategori opdateret",
"cat_deleted" => "Kategori slettet",
"cat_invalid_color" => "Color format invalid (#XXXXXX where X = HEX-value)",
"cat_not_added" => "Kategori ikke tilf&oslash;jet",
"cat_not_updated" => "Kategori ikke opdateret",
"cat_not_deleted" => "Kategori ikke slettet",
"cat_nr" => "#",
"cat_repeat" => "Repeat",
"cat_every_day" => "every day",
"cat_every_week" => "every week",
"cat_every_month" => "every month",
"cat_every_year" => "every year",
"cat_public" => "Public",
"cat_check_mark" => "Check mark",
"cat_label" => "label",
"cat_mark" => "mark",

//users.php
"usr_list_of_users" => "Liste med brugere",
"usr_name" => "Brugernavn",
"usr_email" => "Email",
"usr_password" => "Password",
"usr_rights" => "Rettigheder",
"usr_language" => "Language",
"usr_ui_language" => "User interface language",
"usr_edit_user" => "Editer bruger profil",
"usr_add" => "Tilf&oslash;j bruger",
"usr_edit" => "Editer",
"usr_delete" => "Slet",
"usr_view" => "Vise",
"usr_post_own" => "Send egne",
"usr_post_all" => "Send alle",
"usr_admin" => "Admin",
"usr_login_0" => "Første login",
"usr_login_1" => "Sidste login",
"usr_login_cnt" => "Logins",
"usr_add_profile" => "Tilf&oslash;j profil",
"usr_upd_profile" => "Opdater profiler",
"usr_not_found" => "Bruger ikke fundet",
"usr_if_changing_pw" => "Kun hvis password skal &aelig;ndres",
"usr_admin_functions" => "Admin funktioner",
"usr_no_rights" => "Ingen adgang rettigheder",
"usr_view_calendar" => "Se kalender",
"usr_post_events_own" => "Send + editer egne begivenheder",
"usr_post_events_all" => "Send + editer alle begivenheder",
"usr_pw_not_updated" => "Password ikke opdateret",
"usr_added" => "Bruger tilf&oslash;jet",
"usr_updated" => "Brugerprofil opdateret",
"usr_deleted" => "Bruger slettet",
"usr_not_added" => "Bruger ikke tilf&oslash;jet",
"usr_not_updated" => "Bruger ikke opdateret",
"usr_not_deleted" => "Bruger ikke slettet",
"usr_cred_required" => "Brugernavn, email og password kr&aelig;ves",
"usr_uname_exists" => "Brugernavn findes allerede",
"usr_email_exists" => "Emailadresse findes allerede",
"usr_un_invalid" => "Invalid username (min length 2: A-Z, a-z, 0-9, and _-.) ",
"usr_em_invalid" => "Invalid email address",
"usr_cant_delete_yourself" => "You cannot delete yourself",
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
"iex_upload_ics" => "Opload iCal-fil",
"iex_create_ics" => "Opret iCal-fil",
"iex_upload_csv" => "Opload CSV-fil",
"iex_upload_file" => "Opload fil",
"iex_create_file" => "Opret fil",
"iex_download_file" => "Download fil",
"iex_fields_sep_by" => "Felter adskilt af",
"iex_birthday_cat_id" => "F&oslash;dselsdagskategori ID",
"iex_default_cat_id" => "Standardkategori ID",
"iex_if_no_cat" => "hvis ingen kategori findes",
"iex_import_events_from_date" => "Importer begivenheder der sker efter",
"iex_see_insert" => "se vejledning i h&oslash;jre side",
"iex_no_file_name" => "Filnavn mangler",
"iex_inval_field_sep" => "ugyldig eller manglende felt-adskiller",
"iex_no_begin_tag" => "ugyldig iCal-fil (BEGIN-tag mangler)",
"iex_date_format" => "Begivenheds-dato-format",
"iex_time_format" => "Begivenheds-tids-format",
"iex_number_of_errors" => "Antal fejl i listen",
"iex_bgnd_highlighted" => "baggrund fremh&aelig;vet",
"iex_verify_event_list" => "Verificer begivenhedsliste, korriger fejl og klik",
"iex_add_events" => "Tilf&oslash;j begivenheder til database",
"iex_select_birthday_delete" => "V&aelig;lg f&oslash;dselsdag og slet markeringsfelter som &oslash;nsket",
"iex_select_delete_ignore" => "V&aelig;lg slet markeringsfelter for at ignorere begivenheder",
"iex_title" => "Titel",
"iex_venue" => "Lokalitet",
"iex_owner" => "Owner",
"iex_category" => "Kategori",
"iex_date" => "Dato",
"iex_end_date" => "Slutdato",
"iex_start_time" => "Starttid",
"iex_end_time" => "Sluttid",
"iex_description" => "Beskrivelse",
"iex_birthday" => "F&oslash;dselsdag",
"iex_delete" => "Slet",
"iex_events_added" => "begivenheder tilf&oslash;jet",
"iex_events_dropped" => "begivenheder udeladt (findes allerede)",
"iex_db_error" => "Databasefejl",
"iex_ics_file_error_on_line" => "iCal-filfejl p&aring; linje",
"iex_occurring_between" => "Sker mellem",
"iex_changed_between" => "Tilf&oslash;jet/&aelig;ndret mellem",
"iex_select_date" => "V&aelig;lg dato",
"iex_select_start_date" => "Select start date",
"iex_select_end_date" => "Select end date",
"iex_all_cats" => "alle kategorier",
"iex_all_users" => "all users",
"iex_no_events_found" => "Ingen begivenheder fundet",
"iex_file_created" => "Fil oprettet",
"iex_write error" => "Writing export file failed<br>Check permissions of 'files/' directory",

//lcalcron.php
"cro_sum_header" => "CRON JOB SUMMARY",
"cro_sum_trailer" => "END OF SUMMARY",

//eventchk.php
"evc_sum_title" => "EVENTS EXPIRED",
"evc_nr_deleted" => "Number of events deleted",

//notify.php
"not_sum_title" => "EMAIL REMINDERS",
"not_not_sent_to" => "Reminders sent to",
"not_no_not_dates_due" => "No notification dates due",
"not_all_day" => "Hele dagen",
"not_mailer" => "mailer",
"not_subject" => "Emne",
"not_event_due_in" => "F&oslash;lgende begivenhed sker om",
"not_due_in" => "Sker om",
"not_days" => "dag(e)",
"not_date_time" => "Dato /tid",
"not_title" => "Titel",
"not_sender" => "Afsender",
"not_venue" => "Sted",
"not_description" => "Beskrivelse",
"not_category" => "Category",
"not_status" => "Status",
"not_open_calendar" => "Open calendar",

//sendchg.php
"sch_sum_title" => "CALENDAR CHANGES",
"sch_nr_changes_last" => "Number of changes last",
"sch_report_sent_to" => "Report sent to",
"sch_no_report_sent" => "No report emailed",
"sch_days" => "day(s)",

//userchk.php
"usc_sum_title" => "USER ACCOUNTS EXPIRED",
"usc_nr_accounts_deleted" => "Number of accounts deleted",
"usc_no_accounts_deleted" => "No accounts deleted",

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
