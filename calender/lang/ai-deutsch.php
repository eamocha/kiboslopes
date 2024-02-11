<?php
/*
= LuxCal event calendar admin interface language file =

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.
2011-05-31 - übersetzt von Alfred Bruckner - letztes Update 27.3.2012

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu
This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","2.7.2");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Keine",
"back" => "Zurück",
"close" => "Close",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//settings.php - fieldset headers + general
"set_general_settings" => "Allgemein",
"set_opanel_settings" => "Optionen Dialog",
"set_user_settings" => "Benutzer",
"set_minical_settings" => "Mini Calendar / Upcoming Events Sidebar (only relevant if used)",
"set_view_settings" => "Anzeige",
"set_dt_settings" => "Datum/Zeit",
"set_save_settings" => "Speichern",
"set_missing_invalid" => "fehlende oder ungültige Einstellungen (Hintergrund hervorgehoben)",
"set_settings_saved" => "Einstellungen gespeichert",
"set_save_error" => "Datenbank Fehler - Abspeichern der Einstellungen fehlgeschlagen",
"hover_for_details" => "Für Hilfe Mauszeiger über die Beschreibung bewegen",
"enabled" => "Aktiviert",
"disabled" => "Deaktiviert",
"no" => "Nein",
"yes" => "Ja",
"or" => "Oder",
"minutes" => "Minuten",
"pixels" => "Pixel",
"no_way" => "Sie haben keine Rechte für diese Aktion",

//settings.php - calendar settings
"calendarTitle_label" => "Titel",
"calendarTitle_text" => "Wird in der Kopfzeile angezeigt und in Email Benachrichtigungen verwendet.",
"calendarUrl_label" => "URL",
"calendarUrl_text" => "Die Web Seite des Kalenders.",
"calendarEmail_label" => "Email Adresse des Kalenders",
"calendarEmail_text" => "Email Absender Adresse für das Senden von Benachrichtigungs-Emails.<br>Format: \'Email\' or \'Name&#8249;Email&#8250;\'. \'Name\' könnte der Kalender Name sein.",
"timeZone_label" => "Zeitzone",
"timeZone_text" => "Die Zeitzone die zur Berechnung der aktuellen Zeit verwendet wird.",
"see" => "siehe",
"chgEmailList_label" => "Email Adresse für Benachrichtigung über Änderungen",
"chgEmailList_text" => "An diese Adresse(n) wird periodisch eine Benachrichtigung über Änderungen geschickt. Email Adressen mit Semikolon trennen.<br>(benötigt einen cron job)",
"chgNofDays_label" => "Anzahl der Tage die zurück geschaut wird",
"chgNofDays_text" => "Anzahl der Tage die für Änderungen zurück geschaut wird.<br>Bei 0 wird keine Email versandt.<br>(benötigt einen cron job)",
"notifSender_label" => "Sender of notification emails",
"notifSender_text" => "When the calendar sends reminder emails, the sender field of the email can contain either the calendar email address, or the email address of the user who created the event.<br>In case of the user email address, the receiver can reply to the email.",
"cronSummary_label" => "Admin cron job Zusammenfassung",
"cronSummary_text" => "Sende eine cron job Zusammenfassung zum Kalender Administrator.<br>Aktivieren ist nur sinnvoll wenn ein cron job aktiviert wurde für der Kalender",
"details4All_label" => "Termin Details allen Benutzern anzeigen",
"details4All_text" => "Aktiviert: Termin Details sind für alle Benutzer sichtbar.<br>Deaktiviert: Termin Details sind nur für den Ersteller eines Termins oder für Benutzer mit \'setze alle\' Berechtigung sichtbar. Andere Benutzer mit weniger Rechten werden die Details nicht angezeigt.",
"rssFeed_label" => "RSS feed links",
"rssFeed_text" => "If enabled: For users with at least \'view\' rights an RSS feed link will be visible in the footer of the calendar and an RSS feed link will be added to the HTML head of the calendar pages.",
"eventExp_label" => "Event expiry days",
"eventExp_text" => "Number of days after the event due date when the event expires and will be automatically deleted.<br>If 0 or if no cron job is running, no events will be automatically deleted.<br>(requires a cron job)",
"cookieExp_label" => "'Remember me' cookie expiry days",
"cookieExp_text" => "Number of days before the cookie set by the \'Remember me\' option (during Log In) will expire.",
"calendar" => "calendar",
"user" => "user",

//settings.php - options panel settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"userMenu_label" => "Benutzer Filter",
"userMenu_text" => "Zeige den Benutzer Filter im Dialog an.<br>Dieser Filter kann benutzt werden um nur Termine eines bestimmten Benutzers anzuzeigen.",
"catMenu_label" => "Kategorie Filter",
"catMenu_text" => "Zeige den Kategorie Filter im Dialog an.<br>Dieser Filter kann benutzt werden um nur Termine einer bestimmten Kategorie anzuzeigen.",
"langMenu_label" => "Sprachauswahl",
"langMenu_text" => "Zeige die Sprachauswahl in der Navigationsleiste an.<br>Über dieses Menü kann die Sprache der Oberfläche eingestellt werden.<br>(Eine Aktivierung ist nur sinnvoll wenn Sprachen installiert sind)",
"defaultView_label" => "Ansicht beim Start",
"defaultView_text" => "Mögliche Ansichten nach dem Start sind:<br>- Jahr<br>- Ganzes Monat<br>- Arbeitsmonat *)<br>- Ganze Woche<br>- Arbeitswoche *)<br>- Tag<br>- Anstehend<br>- Änderungen<br>Empfehlung: Monat oder Anstehend.<br>*) Für Arbeitstage siehe auf diese Zeite: Anzeige - Arbeitstage",
"language_label" => "Benutzer Sprache",
"language_text" => "Die Dateien ui-{sprache}.php, ai-{sprache}.php, ug-{sprache}.php und ug-layout.png müssen im dem lang/ Verzeichnis vorhanden sein. {sprache} = ausgewählte Sprache. Dateinamen müssen in Kleinbuchstaben sein!",

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Eigene Anmeldung",
"selfReg_text" => "Erlaubt Benutzern sich selbst anzumelden um Zugriff auf den Kalender zu haben.",
"selfRegPrivs_label" => "Berechtigung",
"selfRegPrivs_text" => "Berechtigung für selbst angemeldete Benutzer.<br>- anschauen: nur anschauen<br>- eigene: Termine erstellen und eigene bearbeiten<br>- alle: Termine erstellen, eigene und fremde bearbeiten",
"selfRegNot_label" => "Benachrichtigung bei Anmeldung",
"selfRegNot_text" => "Sende eine Email an die Kalender Adresse wenn eine Eigene Anmeldung stattgefunden hat.",
"view" => "Anschauen",
"post_own" => "Eigene",
"post_all" => "Alle",
"maxNoLogin_label" => "Max. Anzahl an Tagen ohne sich einzuloggen",
"maxNoLogin_text" => "Wenn sich ein Benutzer länger als diese Zeit nicht einloggt, wird der Benutzer automatisch wieder gelöscht.<br>Wenn der Wert au 0 gesetzt wird, werden keine Benutzer automatisch gelöscht.<br>(benötigt einen cron job)",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"miniCalView_label" => "Mini calendar view",
"miniCalView_text" => "Mögliche Ansichten der Minikalender sind:<br>- Ganzes Monat<br>- Arbeitsmonat *)<br>- Ganze Woche<br>- Arbeitswoche *)<br>*) Für Arbeitstage siehe auf diese Zeite: Anzeige - Arbeitstage",
"miniCalPost_label" => "Mini Kalender Termin erstellen",
"miniCalPost_text" => "Ist nur von Bedeutung wenn der Mini Kalender verwendet wird!<br>Autorisierte Benutzer können:<br>- neue Termine durch Anklicken der Kopfzeile einer Kalenderzelle einen neuen Termin erstellen<br>- bearbeiten/löschen eines Termins durch klicken auf das Quadrat",
"miniCalHBox_label" => "Mini cal event details hover box",
"miniCalHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in the mini calendar",
"sideBarHBox_label" => "Sidebar event details hover box",
"sideBarHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event in the sidebar",
"showLinkInSB_label" => "Show links in sidebar",
"showLinkInSB_text" => "Display URLs from the event description as a hyperlink in the upcoming events sidebar",
"sideBarDays_label" => "Days to look ahead in sidebar",
"sideBarDays_text" => "Number of days to look ahead for events in the upcoming events sidebar.",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Start Monat in der Jahresansicht",
"yearStart_text" => "Wenn ein start Monat konfiguriert wurde (1 - 12), beginnt die Anzeige in der Jahresansicht mit diesem Monat auch beim Wechsel zu vorigen oder darauffolgenden Jahren.<br>Der Wert 0 hat eine spezielle Bedeutung: das start Monat wird vom aktuellen Datum abgeleitet und wird in der ersten Reihe der Monate angezeigt.",
"colsToShow_label" => "Spalten für Jahresansicht",
"colsToShow_text" => "Anzahl der angezeigten Monate in einer Reihe der Jahresansicht.<br>Empfehlung: 3 oder 4.",
"rowsToShow_label" => "Reihen für Jahresansicht",
"rowsToShow_text" => "Anzahl der angezeigten Reihen der Jahresansicht.<br>Empfehlung: 4, wodurch 12 oder 16 Monate angezeigt werden.",
"weeksToShow_label" => "Anzahl der angezeigten Wochen in der Monatsansicht",
"weeksToShow_text" => "Anzahl der in der Monatsansicht angezeigten Wochen.<br>Empfehlung: 10, wodurch 2.5 Monate angezeigt werden.<br>0 hat eine spezielle Bedeutung: Anzeige exakt eines Monats",
"workWeekDays_label" => "Arbeitstage",
"workWeekDays_text" => "Tage die in der Ansicht Arbeitswoche und Arbeitsmonat angezeigt werden.<br>Jeden anzuzeigenden Tag mit seiner Nummer angeben. Gültige Nummern sind:<br>1 = Montag<br>2 = Dienstag<br>....<br>7 = Sonntag<br>z.b. 12345 : Montag - Freitag",
"lookaheadDays_label" => "Vorschau auf anstehende Termine",
"lookaheadDays_text" => "Anzahl der Tage die zur Ermittlung der Termine im Anstehende Termine, der Todo Liste und RSS feeds verwendet wird.",
"dwStartHour_label" => "Erste Stunde in Tag/Wochen-Ansicht.",
"dwStartHour_text" => "Uhrzeit zu der ein normaler Termin beginnt.<br>Eine Einstellung auf z.B. 6 vermeidet in der Woche/Tag-Ansicht die Anzeige der ungenützten Zeit zwischen Mitternacht und 6:00.",
"dwEndHour_label" => "End hour in Day/Week view",
"dwEndHour_text" => "Hour at which a normal day of events ends.<br>E.g., setting this value to 18 will avoid wasting space in Week/Day view for the quiet time between 18:00 and midnight.",
"dwTimeSlot_label" => "Zeitraster in der Tag/Wochen-Ansicht",
"dwTimeSlot_text" => "Zeitraster der Tag/Wochen-Ansicht in Minuten.<br>Dieser Wert bestimmt zusammen mit der &quotErste Stunde&quot und der &quotLetste Stunde&quot Einstellung die Anzahl der Zeilen in der Tag/Wochen-Ansicht",
"dwTsHeight_label" => "Zeitraster Höhe",
"dwTsHeight_text" => "Höhe einer Zeile des Zeitrasters der Tag/Wochen-Ansicht in Pixel.",
"eventHBox_label" => "Event details hover box",
"eventHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in Year view or an event title in Month, Week or Day view.",
"showAdEd_label" => "Show date event added/edited",
"showAdEd_text" => "Show the date the event was added/edited and the user who added/edited the event in:<br>- der Ansicht &quotAnstehend&quot<br>- der Ansicht &quotÄnderungen&quot<br>- the events on the Text Search page<br>- RSS Feeds<br>- Email Benachrichtigungen.",
"showCatName_label" => "Kategorie Name",
"showCatName_text" => "In den verschiedenen Ansichten kann zusätzlich zu der Kategorie Farbe auch der Name angezeigt werden.",
"showLinkInMV_label" => "Links in der Monatsansicht",
"showLinkInMV_text" => "In der Monatsansicht können eingetragene URLs in der Terminbeschreibung als Hyperlink angezeigt werden.",
"eventColor_label" => "Termin Farbe basiert auf",
"eventColor_text" => "In den unterschiedlichen Ansichten werden Termine in der ausgwählten Hintergrundfarbe für den Ersteller oder der Kategorie angezeigt.",
"owner_color" => "Ersteller",
"cat_color" => "Kategorie",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Datum Format (tt mm jjjj)",
"dateFormat_text" => "Text string defining the format of event dates in the calendar views and input fields.<br>Possible characters: y = year, m = month and d = day.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>y-m-d: 2012-10-31<br>m.d.y: 10.31.2012<br>d/m/y: 31/10/2012",
"dateFormat_expl" => "e.g. y.m.d: 2012.10.31",
"MdFormat_label" => "Datum Format (dd month)",
"MdFormat_text" => "Text string defining the format of dates consisting of month and day.<br>Possible characters: M = month in text, d = day in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>d M: 12 April<br>M, d: July, 14",
"MdFormat_expl" => "e.g. M, d: July, 14",
"MdyFormat_label" => "Datum Format (dd month yyyy)",
"MdyFormat_text" => "Text string defining the format of dates consisting of day, month and year.<br>Possible characters: d = day in digits, M = month in text, y = year in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>d M y: 12 April 2012<br>M d, y: July 8, 2012",
"MdyFormat_expl" => "e.g. M d, y: July 8, 2012",
"MyFormat_label" => "Datum Format (month yyyy)",
"MyFormat_text" => "Text string defining the format of dates consisting of month and year.<br>Possible characters: M = month in text, y = year in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>M y: April 2012<br>y - M: 2012 - July",
"MyFormat_expl" => "e.g. M y: April 2012",
"DMdFormat_label" => "Datum Format (weekday dd month)",
"DMdFormat_text" => "Text string defining the format of dates consisting of weekday, day and month.<br>Possible characters: WD = weekday in text, M = month in text, d = day in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>WD d M: Friday 12 April<br>WD, M d: Monday, July 14",
"DMdFormat_expl" => "e.g. WD - M d: Sunday - April 6",
"DMdyFormat_label" => "Datum Format (weekday dd month yyyy)",
"DMdyFormat_text" => "Text string defining the format of dates consisting of weekday, day, month and year.<br>Possible characters: WD = weekday in text, M = month in text, d = day in digits, y = year in digits.<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>WD d M y: Friday 13 April 2012<br>WD - M d, y: Monday - July 16, 2012",
"DMdyFormat_expl" => "e.g. WD, M d, y: Monday, July 16, 2012",
"timeFormat_label" => "Time format (hh mm)",
"timeFormat_text" => "Text string defining the format of event times in the calendar views and input fields.<br>Possible characters: h = hours, m = minutes, a = am/pm (optional), A = AM/PM (optional).<br>Non-alphanumeric character can be used as separator and will be copied literally.<br>Examples:<br>h:m: 22:35<br>h.m a: 10.35 pm<br>h:mA: 10:35PM",
"timeFormat_expl" => "e.g. h:m: 22:35 and h:mA: 10:35PM",
"weekStart_label" => "Erster Tag der Woche",
"weekStart_text" => "Erster Tag der Woche.",
"weekNumber_label" => "Wochennummern",
"weekNumber_text" => "Anzeige der Wochennummern in Jahr, Monat und Tag-Ansicht.",
"time_format_us" => "12-Stunden AM/PM",
"time_format_eu" => "24-Stunden",
"sunday" => "Sonntag",
"monday" => "Montag",
"time_zones" => "TIME ZONES",
"dd_mm_yyyy" => "tt-mm-jjjj",
"mm_dd_yyyy" => "mm-tt-jjjj",
"yyyy_mm_dd" => "jjjj-mm-tt",

//login.php
"log_log_in" => "Einloggen",
"log_remember_me" => "Automatisch Einloggen",
"log_register" => "Registrieren",
"log_change_my_data" => "Meine Daten ändern",
"log_change" => "Ändern",
"log_un_or_em" => "Benutzername oder Email",
"log_un" => "Benutzername",
"log_em" => "Email",
"log_pw" => "Passwort",
"log_new_un" => "Neuer Benutzername",
"log_new_em" => "Neue Email",
"log_new_pw" => "Neues Passwort",
"log_pw_msg" => "Hier ist Ihr Passwort zum Einloggen",
"log_pw_subject_pre" => "Ihr",
"log_pw_subject_post" => "Passwort",
"log_npw_msg" => "Hier ist Ihr neues Passwort zum Einloggen",
"log_npw_subject_pre" => "Ihr neues",
"log_npw_subject_post" => "Passwort",
"log_npw_sent" => "Ihr neues Passwort wurde gesendet",
"log_registered" => "Registrierung erfolgreich - Ihr Passwort wurde per Email gesendet",
"log_not_registered" => "Registrierung war nicht erfolgreich",
"log_un_exists" => "Benutzername existiert schon",
"log_em_exists" => "Email Adresse existiert schon",
"log_un_invalid" => "Ungültiger Benutzername (min. Länge 2: A-Z, a-z, 0-9, und _-.)",
"log_em_invalid" => "Ungültige Email Adresse",
"log_un_em_invalid" => "Dieser Benutzername/Email ist ungültig",
"log_un_em_pw_invalid" => "Ihr Benutzername/Email oder Passwort ist falsch",
"log_no_un_em" => "Bitte Benutzernamen oder Email eingeben",
"log_no_un" => "Bitte Benutzername eingeben",
"log_no_em" => "Bitte Email eingeben",
"log_no_pw" => "Bitte Passwort eingeben",
"log_no_rights" => "Einloggen nicht möglich: keine Berechtigung – Administrator kontaktieren",
"log_send_new_pw" => "Sende neues Passwort",
"log_if_changing" => "Nur wenn Sie es ändern möchten",
"log_no_new_data" => "Keine Datei zu ändern",
"log_invalid_new_un" => "Ungültiger neuer Benutzername (min. Länge 2: A-Z, a-z, 0-9, und _-.)",
"log_new_un_exists" => "Neuer Benutzername existiert schon",
"log_invalid_new_em" => "Neue Email Adresse ist ungültig",
"log_new_em_exists" => "Neue Email Adresse existiert schon",
"log_ui_language" => "Sprache der Benutzeroberfläche",
"log_new_reg" => "New user registration",
"log_date_time" => "Date / time",
"log_reload_retry" => "Time-out. Please close this window, reload the calendar and try again",

//categories.php
"cat_list" => "Kategorieliste",
"cat_edit" => "Bearbeiten",
"cat_delete" => "Löschen",
"cat_add_new" => "Neue Kategorie anlegen",
"cat_add" => "Hinzufügen",
"cat_edit_cat" => "Kategorie bearbeiten",
"cat_name" => "Kategoriebezeichnung",
"cat_sequence" => "Reihenfolge",
"cat_in_menu" => "In der Liste",
"cat_text_color" => "Text Farbe",
"cat_background" => "Hintergrund Farbe",
"cat_select_color" => "Wähle Farbe",
"cat_save" => "Aktualisieren",
"cat_added" => "Kategorie hinzugefügt",
"cat_updated" => "Kategorie aktualisiert",
"cat_deleted" => "Kategorie gelöscht",
"cat_invalid_color" => "Ungültiges Farbformat (#XXXXXX wo X = HEX-Wert)",
"cat_not_added" => "Kategorie nicht hinzugefügt",
"cat_not_updated" => "Kategorie nicht aktualisiert",
"cat_not_deleted" => "Kategorie nicht gelöscht",
"cat_nr" => "#",
"cat_repeat" => "Wiederholung",
"cat_every_day" => "Täglich",
"cat_every_week" => "Wöchentlich",
"cat_every_month" => "Monatlich",
"cat_every_year" => "Jährlich",
"cat_public" => "Öffentlich",
"cat_check_mark" => "Häkchen",
"cat_label" => "label",
"cat_mark" => "mark",

//users.php
"usr_list_of_users" => "Benutzerliste",
"usr_name" => "Benutzername",
"usr_email" => "Email",
"usr_password" => "Passwort",
"usr_rights" => "Rechte",
"usr_language" => "Sprache",
"usr_ui_language" => "Sprache der Benutzeroberfläche",
"usr_edit_user" => "Benutzer Profil bearbeiten",
"usr_add" => "Benutzer hinzufügen",
"usr_edit" => "Bearbeiten",
"usr_delete" => "Löschen",
"usr_view" => "Anzeigen",
"usr_post_own" => "Setze Eigene",
"usr_post_all" => "Setze Alle",
"usr_admin" => "Admin",
"usr_login_0" => "Erstes Einloggen",
"usr_login_1" => "Letztes",
"usr_login_cnt" => "Anzahl",
"usr_add_profile" => "Profil anlegen",
"usr_upd_profile" => "Profil aktualisieren",
"usr_not_found" => "Benutzer nicht gefunden",
"usr_if_changing_pw" => "Nur für Passwortänderung",
"usr_admin_functions" => "Administrator Funktionen",
"usr_no_rights" => "Keine Rechte",
"usr_view_calendar" => "Kalender anzeigen",
"usr_post_events_own" => "Erstelle, bearbeite eigene Termine",
"usr_post_events_all" => "Erstelle, bearbeite alle Termine",
"usr_pw_not_updated" => "Passwort nicht erneuert",
"usr_added" => "Benutzer angelegt",
"usr_updated" => "Benutzerprofil aktualisiert",
"usr_deleted" => "Benutzer gelöscht",
"usr_not_added" => "Benutzer nicht hinzugefügt",
"usr_not_updated" => "Benutzer nicht aktualisiert",
"usr_not_deleted" => "Benutzer nicht gelöscht",
"usr_cred_required" => "Benutzername, Email und Passwort werden benötigt",
"usr_uname_exists" => "Benutzername existiert schon",
"usr_email_exists" => "Email Adresse existiert schon",
"usr_un_invalid" => "Ungültiger Benutzername (min. Länge 2: A-Z, a-z, 0-9, und _-.)",
"usr_em_invalid" => "Email Adresse ist ungültig",
"usr_cant_delete_yourself" => "Sie können sich nicht selbst löschen",
"usr_background" => "Hintergrund Farbe",
"usr_select_color" => "Farbe wählen",
"usr_invalid_color" => "Ungültiges Farbformat (#XXXXXX wo X = HEX-wert)",

//database.php
"mdb_dbm_functions" => "Aufgaben",
"mdb_noshow_tables" => "Tabellen können nicht gelesen werden",
"mdb_compact" => "Komprimieren",
"mdb_compact_table" => "Tabelle Komprimieren",
"mdb_compact_error" => "Fehler",
"mdb_compact_done" => "abgeschlossen",
"mdb_purge_done" => "Gelöschte Termine endgültig gelöscht",
"mdb_repair" => "Prüfen und reparieren",
"mdb_check_table" => "Prüfe Tabelle",
"mdb_ok" => "OK",
"mdb_nok" => "Nicht OK",
"mdb_nok_repair" => "Nicht OK, reparieren",
"mdb_backup" => "Backup",
"mdb_backup_table" => "Backup der Tabelle",
"mdb_backup_done" => "abgeschlossen",
"mdb_file_saved" => "Backup Datei gespeichert.",
"mdb_file_name" => "Datei Name:",
"mdb_start" => "Start",
"mdb_no_function_checked" => "Keine Operation(en) ausgewählt",
"mdb_write_error" => "Writing backup file failed<br>Check permissions of 'files/' directory",

//import/export.php
"iex_file" => "Ausgewählte Datei",
"iex_file_name" => "iCal Dateiname",
"iex_file_description" => "iCal Datei Beschreibung",
"iex_filters" => "Termin Filter",
"iex_upload_ics" => "iCal Datei hochladen",
"iex_create_ics" => "iCal Datei generieren",
"iex_upload_csv" => "CSV Datei hochladen",
"iex_upload_file" => "Datei hochladen",
"iex_create_file" => "Datei generieren",
"iex_download_file" => "Datei herunterladen",
"iex_fields_sep_by" => "Felder getrennt durch",
"iex_birthday_cat_id" => "Geburtstags Kategorie ID",
"iex_default_cat_id" => "Kategorie ID",
"iex_if_no_cat" => "wenn keine Kategorie gefunden wird",
"iex_import_events_from_date" => "Termine importieren ab:",
"iex_see_insert" => "Siehe Beschreibung rechts",
"iex_no_file_name" => "Dateiname fehlt",
"iex_inval_field_sep" => "Ungültiges oder kein Feld Trennzeichen",
"iex_no_begin_tag" => "Ungültige iCal Datei (BEGIN-tag fehlt)",
"iex_date_format" => "Datum Format",
"iex_time_format" => "Zeit Format",
"iex_number_of_errors" => "Anzahl der Fehler in der Liste",
"iex_bgnd_highlighted" => "Hintergrund hervorgehoben",
"iex_verify_event_list" => "Überprüfe Termin Liste, korrigiere Fehler und wähle",
"iex_add_events" => "Termine zur Datenbank hinzufügen",
"iex_select_birthday_delete" => "Wähle Geburtstag aus und lösche Checkbox wie gewünscht",
"iex_select_delete_ignore" => "Wähle Löschen Checkbox um den Termin zu ignorieren",
"iex_title" => "Titel",
"iex_venue" => "Ort",
"iex_owner" => "Ersteller",
"iex_category" => "Kategorie",
"iex_date" => "Datum",
"iex_end_date" => "Ende",
"iex_start_time" => "Anfang",
"iex_end_time" => "Endzeit",
"iex_description" => "Beschreibung",
"iex_birthday" => "Geburtstag",
"iex_delete" => "Löschen",
"iex_events_added" => "Termine hinzugefügt",
"iex_events_dropped" => "Termine übersprungen (bereits vorhanden)",
"iex_db_error" => "Datenbank Fehler",
"iex_ics_file_error_on_line" => "iCal Datei Fehler in Zeile",
"iex_occurring_between" => "von - bis",
"iex_changed_between" => "Erstellt/Geändert von - bis",
"iex_select_date" => "Datum auswählen",
"iex_select_start_date" => "Start Datum auswählen",
"iex_select_end_date" => "Ende Datum auswählen",
"iex_all_cats" => "Alle Kategorien",
"iex_all_users" => "Alle Benutzer",
"iex_no_events_found" => "Keine Termine gefunden",
"iex_file_created" => "Datei generiert",
"iex_write error" => "Schreiben der Export Datei fehlgeschlagen<br>Zugriffsrechte des 'files/' Verzeichnisses überprüfen",

//lcalcron.php
"cro_sum_header" => "CRON JOB ZUSAMMENFASSUNG",
"cro_sum_trailer" => "ENDE DER ZUSAMMENFASSUNG",

//eventchk.php
"evc_sum_title" => "EVENTS EXPIRED",
"evc_nr_deleted" => "Number of events deleted",

//notify.php
"not_sum_title" => "EMAIL ERINNERUNGEN",
"not_not_sent_to" => "Erinnerungen gesendet an",
"not_no_not_dates_due" => "Keine Erinnerungen gesendet",
"not_all_day" => "Ganztags",
"not_mailer" => "Mailer",
"not_subject" => "Betreff",
"not_event_due_in" => "Termin fällig in",
"not_due_in" => "Fällig in",
"not_days" => "Tag(en)",
"not_date_time" => "Datum / Zeit",
"not_title" => "Titel",
"not_sender" => "Absender",
"not_venue" => "Ort",
"not_description" => "Beschreibung",
"not_category" => "Kategorie",
"not_status" => "Status",
"not_open_calendar" => "Kalender öffnen",

//sendchg.php
"sch_sum_title" => "KALENDER ÄNDERUNGEN",
"sch_nr_changes_last" => "Anzahl der Änderungen in den",
"sch_report_sent_to" => "Report gesendet an",
"sch_no_report_sent" => "Kein Report gesendet",
"sch_days" => "Tag(en)",

//userchk.php
"usc_sum_title" => "BENUTZER PRÜFUNG",
"usc_nr_accounts_deleted" => "Anzahl der gelöschten Konten",
"usc_no_accounts_deleted" => "Keine Konten gelöscht",

//explanations
"xpl_manage_db" =>
"<h4>Datenbank Wartung</h4>
<p>Auf dieser Seite können folgende Aufgaben ausgewählt werden:</p>
<h5>Prüfen und reparieren</h5>
<p>Die Datenbank Tabellen werden auf Fehler geprüft. Fehler werden wenn möglich repariert.</p>
<p>Wenn keine Ungereimtheiten bei der Anzeige auftreten, sollte eine jährliche Prüfung
ausreichen.</p>
<h5>Komprimieren</h5>
<p>Wenn ein Termin gelöscht wird, wird dieser nur als 'gelöscht' markiert, wird aber
nicht aus der Datenbank gelöscht. Diese Funktion löscht Termine endgültig aus der Datenbank
die vor länger als 30 Tagen gelöscht wurden und gibt den belegten Speicher wieder frei.</p>
<h5>Backup</h5>
<p>Diese Funktion generiert ein Backup der kompletten Datenbank (Struktur und Inhalt) im .sql Format.</p>
Das Backup wird in dem Verzeichnis <strong>files/</strong> mit dem Namen:
<kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (wobei 'yyyymmdd' = Jahr, Monat, und
Tag, und hhmmss = Stunde, Minuten und Sekunden gespeichert.</p>
<p>Die Backup Datei kann zur Wiederherstellung der Datenbank (Struktur und Inhalt) verwendet werden,
z.B. durch Einlesen der Datei mit dem <strong>phpMyAdmin</strong>
Programm, welches auf den meisten Webservern verfügbar ist.</p>",

"xpl_import_csv" =>
"<h4>CSV Import Anleitung</h4>
<p>Diese Seite dient zum Hochladen und Einlesen von Terminen in den Kalender mit Hilfe einer
<strong>'Comma Separated Values (CSV)'</strong> Text Datei.</p>
<p>Die Reihenfolge der Spalten in der CSV Datei muss wie folgt sein: Titel, Ort, Kategorie ID (siehe unterhalb),
Anfang, Ende Datum, Anfang, Ende Zeit und Beschreibung. Die erste Zeile der CSV Datei dient als Beschreibung für
die Spalten und wird ignoriert.</p>
<h5>Beispiel CSV Datei</h5>
<p>Beispiel CSV Dateien befinden sich in dem Verzeichnis 'files/' der LuxCal Installation.</p>
<h5>Datum und Zeit Format</h5>
<p>Das links ausgewählte Format für das Datum und die Zeit muss den Einträgen in der zu verarbeiteten
CSV Datei entsprechen.</p>
<h5>Kategorien Tabelle</h5>
<p>Der Kalender verwendet ID Nummern um diese zu definieren. Die Kategorie IDs in der CSV
Datei sollten mit denen des Kalenders übereinstimmen oder leer sein.</p>
<p>Wenn im nächsten Schritt ein Termin als 'Geburtstag' gekennzeichnet werden soll, muss die <strong>Geburtstag
Kategorie ID</strong> entsprechend der nachfolgenden Liste gesetzt werden.</p>
<br>
<p>Für diesen Kalender sind folgende Kategorien definiert:</p>",

"xpl_import_ical" =>
"<h4>iCalendar Import Anleitung</h4>
<p>Diese Seite dient zum Hochladen und Einlesen von einer <strong>iCalendar</strong> Datei mit Terminen
in den LuxCal Kalender.</p>
<p>Der Datei Inhalt muss dem [<u><a href='http://tools.ietf.org/html/rfc5545'
target='_blank'>RFC5545 Standard</a></u>] der 'Internet Engineering Task Force' entsprechen.</p>
<p>Nur Termine werden importiert; andere iCal Elemente wie: To-Do, Journal, Frei /
Belegt, Zeitzone und Alarm werden ignoriert.</p>
<p>Beispiel iCalendar Dateien sind im dem Verzeichnis 'files/' der LuxCal Installation zu finden.</p>
<h5>Kategorien Tabelle</h5>
<p>Der Kalender verwendet ID Nummern um diese zu definieren. Die Kategorie IDs in der CSV
Datei sollten mit denen des Kalenders übereinstimmen oder leer sein.</p>
<br>
<p>Für diesen Kalender sind folgende Kategorien definiert:</p>",

"xpl_export_ical" =>
"<h4>iCalendar Export Anleitung</h4>
<p>Diese Seite dient zum Erzeugen und Herunterladen von einer <strong>iCalendar</strong> Datei mit Terminen
aus dem LuxCal Kalender.</p>
<p>Der <b>iCal Dateiname</b> (ohne Erweiterung) ist optional. Generierte Dateien werden am Server mit dem angegebenen Dateinamen, oder mit dem Namen \"luxcal\" im Verzeichnis  \"files/\" gespeichert.
Die Dateierweiterung ist <b>.ics</b>.
Am Server im Verzeichnis \"files/\" gespeicherte Dateien mit dem selben Namen werden durch die neue Datei überschrieben.</p>
<p>Die <b>iCal Datei Beschreibung</b> (z.B. 'Besprechungen 2012') ist optional. Wenn sie angegeben ist,
wird sie in die exportierte iCal Datei eingetragen.</p>
<p><b>Termin Filter</b><br>
Die zu exportierenden Termine können gefiltert werden nach:</p>
<ul>
<li>dem Ersteller</li>
<li>der Kategorie</li>
<li>dem Anfang Datum</li>
<li>hinzugefügt/zuletzt geändert Datum</li>
</ul>
<p>Jeder Filter ist optional.<br>
Ein leeres Datum bedeutet: keine Filterung</p>
<br>
<p>Der Inhalt der Datei entspricht dem [<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 Standard</a></u>]
der 'Internet Engineering Task Force'.</p>
<p>Beim <b>Herunterladen</b> der exportierten iCal Datei wird das Datum und die Uhrzeit zum Namen hinzugefügt.</p>
<p>Beispiel iCalendar Dateien sind im Verzeichnis 'files/' der LuxCal Installation zu finden.</p>"
);
?>
