<?php
/*
= LuxCal event calendar admin interface language file =

Tradotto in Italiano da Angelo.G. - per commenti contattare elghisa@gmail.com

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","2.7.2");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Nessuno",
"back" => "Indietro",
"close" => "Close",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//settings.php - fieldset headers + general
"set_general_settings" => "Calendario",
"set_opanel_settings" => "Panello Opzioni",
"set_user_settings" => "Utenti",
"set_minical_settings" => "Mini Calendar / Upcoming Events Sidebar (only relevant if used)",
"set_view_settings" => "Visualizzazione",
"set_dt_settings" => "Data/Ora",
"set_save_settings" => "Salva Impostazioni",
"set_missing_invalid" => "impostazioni mancanti o non valide (sfondo evidenziato)",
"set_settings_saved" => "Impostazioni Calendario salvate",
"set_save_error" => "Errore database - Salvataggio impostazioni calendario fallito",
"hover_for_details" => "Passare con il mouse sopra le descrizioni per spiegazioni dettagliate",
"enabled" => "abilitato",
"disabled" => "disabilitato",
"no" => "no",
"yes" => "sì",
"or" => "o",
"minutes" => "minuti",
"pixels" => "pixel",
"no_way" => "Non siete autorizzato ad eseguire quest'azione.",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Titolo del Calendario",
"calendarTitle_text" => "Mostrato nella barra superiore del calendario e usato nelle notifiche via email.",
"calendarUrl_label" => "URL del Calendario",
"calendarUrl_text" => "L\'indirizzo del sito web del Calendario.",
"calendarEmail_label" => "Email del Calendario",
"calendarEmail_text" => "L\'indirizzo email del mittente usato nelle notifiche via email.<br>Formato: \'email\' o \'nome&#8249;email&#8250;\'. \'nome\' può essere il nome del calendario.",
"timeZone_label" => "Fuso orario",
"timeZone_text" => "Il fuso orario del calendario, usato per calcolare l\'ora corrente.",
"see" => "vedi",
"chgEmailList_label" => "Email di destinazione per le modifiche",
"chgEmailList_text" => "Indirizzi email di destinatione che periodicamente ricevono una email con le modifiche al calendario.<br>Gli indirizzi email devono essere separati da punti e virgola.<br>(avviato da un cron job)",
"chgNofDays_label" => "Giorni indietro da controllare per le modifiche",
"chgNofDays_text" => "Numero di giorni passati da controllare per le modifiche al calendario.<br>Se il numero di giorni è impostato a 0 non sarà inviato alcun sommario delle modifiche.<br>(avviato da un cron job)",
"notifSender_label" => "Sender of notification emails",
"notifSender_text" => "When the calendar sends reminder emails, the sender field of the email can contain either the calendar email address, or the email address of the user who created the event.<br>In case of the user email address, the receiver can reply to the email.",
"cronSummary_label" => "Riassunto delle operazioni pianificate all\'amministratore",
"cronSummary_text" => "Invia un riassunto delle operazioni pianificate all\'amministratore del calendario.<br>Abilitarlo è utile solo se sul vostro server:<br>- è stata attivata un\'operazione pianificata.",
"details4All_label" => "Mostra i dettagli dell\'evento a tutti gli utenti",
"details4All_text" => "Se abilitato: i dettagli dell\'evento saranno visibili al proprietario dell\'evento e a tutti gli altri utenti.<br>Se disabilitato: i dettagli dell\'evento saranno visibili solo al proprietario dell\'evento e agli utenti con diritti \'crea tutti gli eventi\'. Gli utenti con minori diritti non vedranno i dettagli dell\'evento.",
"rssFeed_label" => "RSS feed links",
"rssFeed_text" => "If enabled: For users with at least \'view\' rights an RSS feed link will be visible in the footer of the calendar and an RSS feed link will be added to the HTML head of the calendar pages.",
"eventExp_label" => "Event expiry days",
"eventExp_text" => "Number of days after the event due date when the event expires and will be automatically deleted.<br>If 0 or if no cron job is running, no events will be automatically deleted.<br>(requires a cron job)",
"cookieExp_label" => "'Remember me' cookie expiry days",
"cookieExp_text" => "Number of days before the cookie set by the \'Remember me\' option (during Log In) will expire.",
"calendar" => "calendar",
"user" => "user",

//settings.php - options panel settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"userMenu_label" => "Menu filtro utenti",
"userMenu_text" => "Mostra il menu filtro utenti nel pannello opzioni.<br>Questo filtro si può usare per visualizzare solamente gli eventi creati da uno specifico utente.",
"catMenu_label" => "Menu filtro categorie",
"catMenu_text" => "Mostra il menu filtro categorie nel pannello opzioni.<br>Questo filtro si può usare per visualizzare solamente gli eventi che appartengono ad una categoria specifica.",
"langMenu_label" => "Menu selezione lingua",
"langMenu_text" => "Mostra il menu di selezione della lingua nella barra di navigazione.<br>Questo menu si può usare per selezionare la lingua dell\'interfaccia utente.<br>(utile solo se ci sono molte lingue installate)",
"defaultView_label" => "Vista predefinita all'avvio",
"defaultView_text" => "Le viste possibili all\'avvio del calendario sono:<br>- Anno<br>- Mese<br>- Settimana<br>- Giorno<br>- Eventi futuri<br>- Modifiche<br>Scelta consigliata: Mese o Eventi futuri.",
"language_label" => "Lingua predefinita dell'interfaccia utente",
"language_text" => "I file ui-{lingua}.php, ai-{lingua}.php, ug-{lingua}.php e ug-layout.png devono essere presenti nella directory lang/. {lingua} = lingua dell\'interfaccia utente selezionata. I nomi dei file devono essere tutti minuscoli !",

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Auto registrazione",
"selfReg_text" => "Consente agli utenti di registrarsi e di avere accesso al calendario.",
"selfRegPrivs_label" => "Diritti per chi si registra da solo",
"selfRegPrivs_text" => "Diritti di accesso per gli utenti che si autoregistrano.<br>- vedi: vedi solamente<br>- crea i propri eventi: crea e modifica solo i propri eventi<br>- crea tutti gli eventi: crea e modifica gli eventi propri e quelli degli altri",
"selfRegNot_label" => "Self registration notification",
"selfRegNot_text" => "Send a notification email to the calendar email address when a self-registation takes place.",
"view" => "Vedi",
"post_own" => "Crea i propri eventi",
"post_all" => "Crea tutti gli eventi",
"maxNoLogin_label" => "Num. max. di giorni senza aver fatto il log in",
"maxNoLogin_text" => "Se un utente non ha effettuato il log in per un tenmpo pari a questo numero di giorni, il suo account sarà cancellato automaticamente.<br>Se il valore è impostato a 0, gli account utente non saranno mai cancellati.<br>(avviato da un cron job)",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"miniCalView_label" => "Mini calendar view",
"miniCalView_text" => "Possible views for the mini calendar are:<br>- Full Month<br>- Work Month *)<br>- Full Week<br>- Work Week *)<br>*) For work week days see on this page: Views - Work week days",
"miniCalPost_label" => "Creazione di eventi nella mini agenda",
"miniCalPost_text" => "Importante solo se si usa la mini agenda!<br>Se abilitato gli utenti possono:<br>- creare nuovi eventi nella mini agenda cliccando la barra superiore di una casella di un giorno<br>- modificare/cancellare eventi cliccando il quadratino che rappresenta l\'evento",
"miniCalHBox_label" => "Mini cal event details hover box",
"miniCalHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in the mini calendar",
"sideBarHBox_label" => "Sidebar event details hover box",
"sideBarHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event in the sidebar",
"showLinkInSB_label" => "Show links in sidebar",
"showLinkInSB_text" => "Display URLs from the event description as a hyperlink in the upcoming events sidebar",
"sideBarDays_label" => "Days to look ahead in sidebar",
"sideBarDays_text" => "Number of days to look ahead for events in the upcoming events sidebar.",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Mese d\'inizio nella vista Anno",
"yearStart_text" => "Se si specifica un mese d\'inizio (1 - 12), nella vista Anno il calendario comincierà sempre con questo mese e l\'anno di questo primo mese cambierà solo con il primo giorno dello stesso mese dell\'anno succesivo.<br>Il valore 0 ha un significato particolare: il mese d\'inizio si basa sulla data corrente e cadrà nella prima riga di mesi.",
"colsToShow_label" => "Colonne da mostrare nella vista Anno",
"colsToShow_text" => "Numero di mesi da mostrare in ciascuna riga nella vista Anno.<br>Scelta consigliata: 3 o 4.",
"rowsToShow_label" => "Righe da mostrare nella vista Anno",
"rowsToShow_text" => "Numero di righe da quattro mesi ciascuna da mostrare nella vista Anno.<br>Scelta consigliata: 4, che consente di vedere assieme 16 mesi.",
"weeksToShow_label" => "Settimane da mostrare nella vista Mese",
"weeksToShow_text" => "Numero di settimane da mostrare nella vista Mese.<br>Scelta consigliata: 10, che consente di avere sotto mano 2,5 mesi.<br>Il valore 0 ha un significato particolare: mostra esattamente 1 mese.",
"workWeekDays_label" => "Work week days",
"workWeekDays_text" => "Days to be shown in each week in Work Month view and Work Week view.<br>Enter the number of each day that should be visible. Valid day numbers:<br>1 = Monday<br>2 = Tuesday<br>....<br>7 = Sunday<br>e.g. 12345 : Monday - Friday",
"lookaheadDays_label" => "Giorni da guardare avanti",
"lookaheadDays_text" => "Numero di giorni futuri da considerare per gli eventi futuri, in the todo-list and in the RSS feeds.",
"dwStartHour_label" => "Ora d'inizio per le viste Giorno/Settimana",
"dwStartHour_text" => "L\'ora d\'inizio in cui considerare l\'inizio degli eventi giornalieri.<br>L\'impostazione di questo valore, per es., a 6, consente di non sprecare spazio nelle viste Giorno/Settimana per i periodi di riposo tra mezzanotte e le 6 del mattino.",
"dwEndHour_label" => "End hour in Day/Week view",
"dwEndHour_text" => "Hour at which a normal day of events ends.<br>E.g., setting this value to 18 will avoid wasting space in Week/Day view for the quiet time between 18:00 and midnight.",
"dwTimeSlot_label" => "Intervallo di tempo nelle viste Giorno/Settimana",
"dwTimeSlot_text" => "Visualizzazione degli intervalli di tempo in minuti nelle viste Giorno/Settimana.<br>Questo valore, assieme all\'Ora d\'inizio (vedi prima) determina il numero di righe nelle viste Giorno/Settimana.",
"dwTsHeight_label" => "Altezza intervallo di tempo",
"dwTsHeight_text" => "Altezza in pixel della visualizzazione degli intervalli di tempo nelle viste Giorno/Settimana.",
"eventHBox_label" => "Event details hover box",
"eventHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in Year view or an event title in Month, Week or Day view.",
"showAdEd_label" => "Show date event added/edited",
"showAdEd_text" => "Show the date the event was added/edited and the user who added/edited the event in:<br>- Nella vista Eventi futuri<br>- Nella vista Modifiche<br>- the events on the Text Search page<br>- nei feed rss<br>- nelle notifiche via email.",
"showCatName_label" => "Mostra il nome della categoria",
"showCatName_text" => "Se attivato, nella varie viste, oltre a mostrare la descrizione dell\'evento nel colore della categoria, verrà mostrato anche il nome della categoria.",
"showLinkInMV_label" => "Mostra collegamenti nella vista Mese",
"showLinkInMV_text" => "Se attivato, gli URL nella descrizione dell\'evento saranno mostrati come collegamenti ipertestuali nella vista Mese",
"eventColor_label" => "Colore dell'evento basato sul",
"eventColor_text" => "Gli eventi nelle varie viste possono essere mostrati con il colore assegnato all\'utente che ha creato l\'evento o con il colore della categoria dell\'evento.",
"owner_color" => "colore del proprietario",
"cat_color" => "colore della categoria",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Formato data (gg mm aaaa)",
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
"weekStart_label" => "Primo giorno della settimana",
"weekStart_text" => "Primo giorno della settimana.",
"weekNumber_label" => "Mostra il numero delle settimane",
"weekNumber_text" => "La visualizzazione dei numeri delle settimane nelle viste Anno, Mese e Settimana può essere attivata o no",
"time_format_us" => "12-ore AM/PM",
"time_format_eu" => "24-ore",
"sunday" => "Domenica",
"monday" => "Lunedì",
"time_zones" => "FUSI ORARI",
"dd_mm_yyyy" => "gg-mm-aaaa",
"mm_dd_yyyy" => "mm-gg-aaaa",
"yyyy_mm_dd" => "aaaa-mm-gg",

//login.php
"log_log_in" => "Log In",
"log_remember_me" => "Ricordami",
"log_register" => "Registrazione",
"log_change_my_data" => "Modifica i dati",
"log_change" => "Modifica",
"log_un_or_em" => "Nome Utente o Indirizzo e-mail",
"log_un" => "Nome utente",
"log_em" => "Email",
"log_pw" => "Password",
"log_new_un" => "Nuovo Nome Utente",
"log_new_em" => "Nuovo indirizzo email",
"log_new_pw" => "Nuova password",
"log_pw_msg" => "Questa e' la password per fare il login in",
"log_pw_subject_pre" => "La",
"log_pw_subject_post" => "Password",
"log_npw_msg" => "Questa e' la nuova password per fare il login in",
"log_npw_subject_pre" => "La nuova",
"log_npw_subject_post" => "Password",
"log_npw_sent" => "La nuova password è stata inviata.",
"log_registered" => "Registrazione avvenuta - La password è stata inviata per email",
"log_not_registered" => "Registrazione fallita",
"log_un_exists" => "Il nome utente esiste già",
"log_em_exists" => "L'indirizzo email esiste già",
"log_un_invalid" => "Nome utente non valido (lunghezza min 2: A-Z, a-z, 0-9, e _-.) ",
"log_em_invalid" => "Indirizzo email non valido",
"log_un_em_invalid" => "Il nome utente/email non è valido",
"log_un_em_pw_invalid" => "Il nome utente/email o password non è corretto",
"log_no_un_em" => "Non è stato inserito il nome utente/email",
"log_no_un" => "Inserire il nome utente",
"log_no_em" => "Inserire l'indirizzo email",
"log_no_pw" => "Non è stata inserita la password",
"log_no_rights" => "Login rifiutato: non si hanno diritti di visualizzazione - Contattare l'amministratore",
"log_send_new_pw" => "Invia una nuova password",
"log_if_changing" => "Solo se cambia",
"log_no_new_data" => "Nessun dato da modificare",
"log_invalid_new_un" => "Nuovo nome utente non valido (lunghezza min 2: A-Z, a-z, 0-9, e _-.) ",
"log_new_un_exists" => "Il nuovo nome utente esiste già",
"log_invalid_new_em" => "Il nuovo indirizzo email non è valido",
"log_new_em_exists" => "Il nuovo indirizzo email esiste già",
"log_ui_language" => "Lingua dell'interfaccia utente",
"log_new_reg" => "New user registration",
"log_date_time" => "Date / time",
"log_reload_retry" => "Time-out. Please close this window, reload the calendar and try again",

//categories.php
"cat_list" => "Elenco delle Categorie",
"cat_edit" => "Modifica",
"cat_delete" => "Elimina",
"cat_add_new" => "Aggiungi una nuova categoria",
"cat_add" => "Aggiungi",
"cat_edit_cat" => "Modifica categoria",
"cat_name" => "Nome categoria",
"cat_sequence" => "Sequenza",
"cat_in_menu" => "nel menu",
"cat_text_color" => "Colore del testo",
"cat_background" => "Colore di fondo",
"cat_select_color" => "Selezione colore",
"cat_save" => "Aggiorna",
"cat_added" => "Categoria aggiunta",
"cat_updated" => "Categoria aggiornata",
"cat_deleted" => "Categoria eliminata",
"cat_invalid_color" => "Formato colore non valido (#XXXXXX where X = HEX-value)",
"cat_not_added" => "Categoria non aggiunta",
"cat_not_updated" => "Categoria non aggiornata",
"cat_not_deleted" => "Categoria non eliminata",
"cat_nr" => "n.",
"cat_repeat" => "Ripeti",
"cat_every_day" => "ogni giorno",
"cat_every_week" => "ogni settimana",
"cat_every_month" => "ogni mese",
"cat_every_year" => "ogni anno",
"cat_public" => "Pubblico",
"cat_check_mark" => "Check mark",
"cat_label" => "label",
"cat_mark" => "mark",

//users.php
"usr_list_of_users" => "Elenco Utenti",
"usr_name" => "Nome Utente",
"usr_email" => "Indirizzo email",
"usr_password" => "Password",
"usr_rights" => "Diritti",
"usr_language" => "Lingua",
"usr_ui_language" => "Lingua dell'interfaccia utente",
"usr_edit_user" => "Modifica profilo utente",
"usr_add" => "Aggiungi un nuovo utente",
"usr_edit" => "Modifica",
"usr_delete" => "Elimina",
"usr_view" => "Vedi",
"usr_post_own" => "Crea solo i propri eventi",
"usr_post_all" => "Crea eventi di tutti",
"usr_admin" => "Amministratore",
"usr_login_0" => "Primo login",
"usr_login_1" => "Ultimo login",
"usr_login_cnt" => "N. di Login",
"usr_add_profile" => "Aggiungi profilo",
"usr_upd_profile" => "Aggiorna profilo",
"usr_not_found" => "Utente non trovato",
"usr_if_changing_pw" => "Solo se si cambia la password",
"usr_admin_functions" => "Funzioni d'amministrazione",
"usr_no_rights" => "Nessun diritto di accesso",
"usr_view_calendar" => "Vedi il calendario",
"usr_post_events_own" => "Crea + Modifica i propri eventi",
"usr_post_events_all" => "Crea + Modifica tutti gli eventi",
"usr_pw_not_updated" => "Password non aggiornata",
"usr_added" => "Utente aggiunto",
"usr_updated" => "Profilo utente aggiornato",
"usr_deleted" => "Utente eliminato",
"usr_not_added" => "Utente non aggiunto",
"usr_not_updated" => "Utente non modificato",
"usr_not_deleted" => "Utente non eliminato",
"usr_cred_required" => "Sono richiesti il nome utente, indirizzo email e password",
"usr_uname_exists" => "Nome utente esistente",
"usr_email_exists" => "Indirizzo email esistente",
"usr_un_invalid" => "Nome utente non valido (lunghezza min. 2: A-Z, a-z, 0-9, e _-.) ",
"usr_em_invalid" => "Indirizzo email non valido",
"usr_cant_delete_yourself" => "Impossibile eliminare sè stessi",
"usr_background" => "Colore di fondo",
"usr_select_color" => "Selezionare Colore",
"usr_invalid_color" => "Formato colore non valido (#XXXXXX where X = HEX-value)",

//database.php
"mdb_dbm_functions" => "Funzioni del Database",
"mdb_noshow_tables" => "Impossibile aprire le tabelle",
"mdb_compact" => "Compatta il database",
"mdb_compact_table" => "Compatta le tabelle",
"mdb_compact_error" => "Errore",
"mdb_compact_done" => "Fatto",
"mdb_purge_done" => "Eventi cancellati eliminati definitivamente",
"mdb_repair" => "Verifica e ripara il database",
"mdb_check_table" => "Controlla tabella",
"mdb_ok" => "OK",
"mdb_nok" => "Non OK",
"mdb_nok_repair" => "Non OK, inizio riparazione",
"mdb_backup" => "Backup del database",
"mdb_backup_table" => "Backup della tabella",
"mdb_backup_done" => "Fatto",
"mdb_file_saved" => "File di backup salvato.",
"mdb_file_name" => "Nome file:",
"mdb_start" => "Avvio",
"mdb_no_function_checked" => "Nessuna funzione selezionata",
"mdb_write_error" => "Scrittura del file di backup fallita<br>Controllare i permessi della cartella 'files/'",

//import/export.php
"iex_file" => "File selezionato",
"iex_file_name" => "iCal file name",
"iex_file_description" => "Descrizione file iCal",
"iex_filters" => "Filtro Eventi",
"iex_upload_ics" => "Upload del file iCal",
"iex_create_ics" => "Crea file iCal",
"iex_upload_csv" => "Upload file CSV",
"iex_upload_file" => "Upload File",
"iex_create_file" => "Crea File",
"iex_download_file" => "Download File",
"iex_fields_sep_by" => "Campi separati da",
"iex_birthday_cat_id" => "ID della categoria Compleanni",
"iex_default_cat_id" => "ID categoria predefinita",
"iex_if_no_cat" => "se non si trova alcuna categoria",
"iex_import_events_from_date" => "Importare gli eventi in agenda a partire dal",
"iex_see_insert" => "vedi istruzioni a destra",
"iex_no_file_name" => "Manca il nome del file",
"iex_inval_field_sep" => "separatore campi mancante o non valido",
"iex_no_begin_tag" => "file iCal non valido (manca BEGIN-tag)",
"iex_date_format" => "Formato data evento",
"iex_time_format" => "Formato ora evento",
"iex_number_of_errors" => "Numero di errori nell'elenco",
"iex_bgnd_highlighted" => "sfondo evidenziato",
"iex_verify_event_list" => "Verificare l'elenco eventi, correggere gli errori e cliccare",
"iex_add_events" => "Aggiungi Eventi al Database",
"iex_select_birthday_delete" => "Selezionare Compleanno e le caselle Elimina come si desidera",
"iex_select_delete_ignore" => "Selezionare le caselle Elimina per ignorare l'evento",
"iex_title" => "Titolo",
"iex_venue" => "Sede",
"iex_owner" => "Proprietario",
"iex_category" => "Categoria",
"iex_date" => "Data",
"iex_end_date" => "Data fine",
"iex_start_time" => "Ora inizio",
"iex_end_time" => "Ora fine",
"iex_description" => "Descrizione",
"iex_birthday" => "Compleanno",
"iex_delete" => "Elimina",
"iex_events_added" => "eventi aggiunti",
"iex_events_dropped" => "eventi ignorati (già presenti)",
"iex_db_error" => "Errore database",
"iex_ics_file_error_on_line" => "Errore file iCal alla riga",
"iex_occuring_between" => "In agenda tra le date",
"iex_changed_between" => "Aggiunti/modificati tra",
"iex_select_date" => "Selezione data",
"iex_select_start_date" => "Selezionare data inizio",
"iex_select_end_date" => "Selezionare data fine",
"iex_all_cats" => "tutte le categorie",
"iex_all_users" => "tutti gli utenti",
"iex_no_events_found" => "Nessun evento trovato",
"iex_file_created" => "File creato",
"iex_write error" => "Scrittura del file di export fallita<br>Controllare i permessi della cartella 'files/'",

//lcalcron.php
"cro_sum_header" => "RIASSUNTO OPERAZIONI PIANIFICATE",
"cro_sum_trailer" => "FINE RIASSUNTO",

//eventchk.php
"evc_sum_title" => "EVENTS EXPIRED",
"evc_nr_deleted" => "Number of events deleted",

//notify.php
"not_sum_title" => "PROMEMORIA VIA EMAIL",
"not_not_sent_to" => "Promemoria inviati a",
"not_no_not_dates_due" => "Nessuna data di notifica scaduta",
"not_all_day" => "Tutto il giorno",
"not_mailer" => "mailer",
"not_subject" => "Oggetto",
"not_event_due_in" => "L'evento seguente e' previsto tra ",
"not_due_in" => "e' previsto tra ",
"not_days" => "giorno(i)",
"not_date_time" => "Data / ora",
"not_title" => "Titolo",
"not_sender" => "Mittente",
"not_venue" => "Sede",
"not_description" => "Descrizione",
"not_category" => "Categoria",
"not_status" => "Status",
"not_open_calendar" => "Apri il calendario",

//sendchg.php
"sch_sum_title" => "MODIFICHE AL CALENDARIO",
"sch_nr_changes_last" => "Numero di modifiche dall'ultimo",
"sch_report_sent_to" => "Rapporto inviato a",
"sch_no_report_sent" => "Nessun rapporto inviato via email",
"sch_days" => "giorno(i)",

//userchk.php
"usc_sum_title" => "CONTROLLO ACCOUNT UTENTI",
"usc_nr_accounts_deleted" => "Numero di account eliminati",
"usc_no_accounts_deleted" => "Nessun account eliminato",

//explanations
"xpl_manage_db" =>
"<h4>Istruzioni per la Gestione del Database</h4>
<p>In questa pagina è possibile selezionare le seguenti funzioni:</p>
<h5>Compatta il database</h5>
<p>Quando un utente cancella un evento, l'evento è segnato come 'cancellato', ma 
non è rimosso dal database. La funzione Compatta il database elimina fisicamente 
questi eventi cancellati e libera lo spazio occupato dall'evento.</p>
<h5>Verifica e ripara il database</h5>
<p>Questa funzione esegue una scansione del database del calendario e controlla eventuali incoerenze.</p>
<p>Le incoerenze saranno poi riparate, se possibile.</p>
<p>Se non ci sono particolari problemi nelle viste del calendario, è sufficiente lanciare queste 
funzioni una volta all'anno.</p>
<h5>Backup del database</h5>
<p>Questa funzione crea un backup completo del database del calendario (tabelle 
struttura e contenuti) in formato .sql. Il backup sarà salvato nella cartella 
<strong>/files</strong> con il nome:</p> 
<p><kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (dove 'yyyymmdd' = anno, mese e 
giorno, e hhmmss = ora, minuti e secondi.</p>
<p>Questo file di backup si può usare per ri-creare le tabelle, la struttuta e i dati del 
database, per esempio importando il file tramite <strong>phpMyAdmin</strong>, 
strumento disponibile sulla maggior parte dei server web.</p>",

"xpl_import_csv" =>
"<h4>Istruzioni per l'Import dei file CSV</h4>
<p>Si usa questo modulo per importare nel Calendario Luxcal un file di testo 
<strong>Comma Separated Values (CSV)</strong> con i dati di eventi.</p>
<p>L'ordine delle colonne nel file CSV deve essere: titolo, sede, id categoria (vedi 
poi), data inizio, data fine, ora inizio, ora fine e descrizione. La prima riga del file CSV, 
usata per la descrizione delle colonne, &egrave; ignorata.</p>
<h5>File CSV di esempio</h5>
<p>File CSV d'esempio si possono trovare nella subdirectory '/files' della propria 
installazione di LuxCal.</p>
<h5>Formato data e ora</h5>
<p>Il formato data e ora dell'evento a sinistra deve corrispondere al 
formato della data e ora del file CSV di cui si sta facendo l'upload.</p>
<h5>Tabella delle Categorie</h5>
<p>Il calendario usa dei numeri ID per specificare le categorie. Gli ID delle categorie nel file CSV 
devono corrispondere alle categorie usate nel proprio calendario o essere vuoti.</p>
<p>Se in seguito si vogliono rimarcare degli eventi come 'compleanno', l'<strong>ID della categoria 
Compleanno</strong> deve essere impostato al corrispondente ID nell'elenco delle categorie seguente.</p>
<br>
<p>Nel calendario attuale, sono state definite le seguenti categorie:</p>",

"xpl_import_ical" =>
"<h4>Istruzioni per l'Import di file iCalendar</h4>
<p>Si usa questo modulo per importare nel Calendario Luxcal un file <strong>iCalendar</strong> 
con i dati degli eventi.</p>
<p>I contentuti del file devono soddisfare gli standard [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545 </a></u>] dell'Internet Engineering Task Force.</p>
<p>Saranno importati solo gli eventi; altri componenti iCal, come: To-Do, Journal, Free / 
Busy, Time zone e Alarm, saranni ignorati.</p>
<h5>Esempi di file iCal</h5>
<p>Esempi di file iCalendar (estensione .ics) si possono trovare nella subdirectory '/files' 
della propria installazione di LuxCal.</p>
<h5>Tabella delle Categorie</h5>
<p>Il calendario usa dei numeri ID per specificare le categorie. Gli ID delle categorie nel file 
iCalendar devono corrispondere alle categorie usate nel proprio calendario 
o essere vuoti.</p>
<br>
<p>Nel calendario attuale, sono state definite le seguenti categorie:</p>",

"xpl_export_ical" =>
"<h4>Istruzioni per l'esportazione di file iCalendar</h4>
<p>Si usa questo modulo per estrarre ed esportare un file di eventi <strong>iCalendar</strong> dal 
Calendario LuxCal.</p>
<p>Il <b>nome del file iCal</b> (senza estensione) &egrave; opzionale. I file creati sono 
memorizzati nella cartella \"files/\" del server con il nome specificato, 
oppure con il nome \"luxcal\". L'estensione del file sar&agrave; <b>.ics</b>.
File esistenti nella cartella \"files/\" del server con lo stesso nome 
saranno sovrascritti dal nuovo file.</p>
<p>La <b>descrizione del file iCal</b> (per es. 'Meetings 2012') &egrave; opzionale. Se viene inserita, 
essa viene aggiunta all'intestazione del file iCal esportato.</p>
<p><b>Filtri</b>: Gli eventi da estrarre possono essere filtrati per:</p>
<ul>
<li>propietario evento</li>
<li>categoria evento</li>
<li>data inizio evento</li>
<li>data aggiunta/ultima modifica evento</li>
</ul>
<p>I filtri sono opzionali. Un campo data vuoto significa: nessun limite</p>
<br>
<p>Il contenuto del file con gli eventi estratti sar&agrave; conforme allo standard
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545</a></u>] 
dell'Internet Engineering Task Force.</p>
<p>Facendo il <b>download</b> del file iCal esportato, saranno aggiunti data e ora
al nome del file scaricato.</p>
<h5>Esempi di file iCal</h5>
<p>Esempi di file iCalendar (estensinoe .ics) si possono trovare nella cartella '/files' 
della propria installazione di LuxCal.</p>"
);
?>
