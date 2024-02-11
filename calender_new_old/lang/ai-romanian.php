<?php
/*
= LuxCal event calendar admin interface language file = ROMANIAN / ROMÂNĂ

Traducerea în limba română realizată de Laurenţiu Florin BUBUIANU (laurfb@gmail.com - laurfb.tk).
This file has been translated in română by Laurenţiu Florin BUBUIANU (laurfb@gmail.com - laurfb.tk).

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.
© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu
*/

//LuxCal ui language file version
define("LAI","2.7.2");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Nici unul",
"back" => "Înapoi",
"close" => "Close",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//settings.php - fieldset headers + general
"set_general_settings" => "Setări Calendar",
"set_opanel_settings" => "Optiuni",
"set_user_settings" => "Setări Cont Utilizator",
"set_minical_settings" => "Mini Calendar / Upcoming Events Sidebar (only relevant if used)",
"set_view_settings" => "Setări Vizualizare",
"set_dt_settings" => "Setări Dată/Oră",
"set_save_settings" => "Salvare Setări",
"set_missing_invalid" => "setări lipsă sau incorecte (marcate)",
"set_settings_saved" => "Setările au fost salvate",
"set_save_error" => "Eroare Bază de Date - Setările nu au putut fi salvate",
"hover_for_details" => "Detalii setări calendar",
"enabled" => "activat",
"disabled" => "dezactivat",
"no" => "nu",
"yes" => "da",
"or" => "sau",
"minutes" => "minute",
"pixels" => "pixeli",
"no_way" => "Nu aveţi drepturi pentru a executa această operaţiune",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Titlu Calendar",
"calendarTitle_text" => "Text afişat în Titlul Calendarului, utilizat şi în email-ul de notificare.",
"calendarUrl_label" => "URL calendar",
"calendarUrl_text" => "Adresa web a Calendarului.",
"calendarEmail_label" => "Adresa email a Calendarului",
"calendarEmail_text" => "Adresa de email folosită în email-urile de notificare.<br>Format: \'email\' sau \'nume&#8249;email&#8250;\'. unde \'nume\' poate fi numele calendarului.",
"timeZone_label" => "Fus Orar",
"timeZone_text" => "Fusul orar al calendarului, folosit pentru afişarea orei curente.",
"see" => "vezi",
"chgEmailList_label" => "Adresa(ele) de email de notificat la apariţia unor modificări",
"chgEmailList_text" => "Adresele de email care vor primi periodic notificări privind modificările din calendar.<br>Adresele trebuiesc separate prin caracterul \';\' (necesită programare prin cron).",
"chgNofDays_label" => "Numărul de zile de urmărit pentru modificări",
"chgNofDays_text" => "Numărul de zile anterioare utilizate pentru sumarul modificărilor.<br>Dacă numărul introdus este \'0\' nu va fi trimis niciun sumar (necesită programare prin cron).",
"notifSender_label" => "Sender of notification emails",
"notifSender_text" => "When the calendar sends reminder emails, the sender field of the email can contain either the calendar email address, or the email address of the user who created the event.<br>In case of the user email address, the receiver can reply to the email.",
"cronSummary_label" => "Sumar Cron Job Admin",
"cronSummary_text" => "Trimitere sumar cron job pe email la administratorul calendarului.<br>Opţiunea este utilă doar dacă pe server:<br>- a fost activată o acţiune în cron job.",
"details4All_label" => "Afişare detalii evenimente pentru toţi utilizatorii",
"details4All_text" => "Activ: detalile evenimentului sînt vizibile pentru toţi utilizatorii.<br>Dezactivat: detaliile evenimentului vor fi vizibile doar pentru proprietar şi pentru utilizatorii care au dreptul \'toate evenimentele\' setat. Utilizatorii cu drepturi restrînse nu vor putea vedea aceste detaliile.",
"rssFeed_label" => "RSS feed links",
"rssFeed_text" => "If enabled: For users with at least \'view\' rights an RSS feed link will be visible in the footer of the calendar and an RSS feed link will be added to the HTML head of the calendar pages.",
"eventExp_label" => "Event expiry days",
"eventExp_text" => "Number of days after the event due date when the event expires and will be automatically deleted.<br>If 0 or if no cron job is running, no events will be automatically deleted.<br>(requires a cron job)",
"cookieExp_label" => "'Remember me' cookie expiry days",
"cookieExp_text" => "Number of days before the cookie set by the \'Remember me\' option (during Log In) will expire.",
"calendar" => "calendar",
"user" => "user",

//settings.php - options panel settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"userMenu_label" => "Meniu Filtrare Utilizatori",
"userMenu_text" => "Afişare meniu filtrare utilizatori în bara de navigare.<br>Acest filtru poate fi utilizat pentru afişarea doar a evenimentelor corespunzătoare utilizatorului selectat.",
"catMenu_label" => "Meniu Filtrare Categorie",
"catMenu_text" => "Afişare meniu filtrare categorie în bara de navigare.<br>Acest filtru poate fi utilizat pentru afişarea doar a categoriei selectate.",
"langMenu_label" => "Meniu selecţie limbă",
"langMenu_text" => "Afişare opţiune selecţie limbă în bara de navigare.<br>Această opţiune poate fi utilizată pentru selectarea limbii de afişare a calendarului.<br>(util doar dacă se utilizează mai multe limbi)",
"defaultView_label" => "Mod vizualizare iniţial",
"defaultView_text" => "Modurile de vizualizare implicite la pornire sînt:<br>- Anual<br>- Lunar<br>- Săptămînal<br>- Zilnic<br>- Care Urmează<br>- Modificări<br>Este recomandabil utilizarea modului \'Lunar\' sau \'Care Urmează\'.",
"language_label" => "Limba implicită",
"language_text" => "Fişierele specifice de limbă ui-{limbă}.php, ai-{limbă}.php, ug-{limbă}.php precum şi fişierul ug-layout.png trebuie să fie prezente în directorul \'lang/\'. {limba} reprezintă limba folosită pentru interfaţă, numele (limbii) trebuind să fie scris cu litere mici!",

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Auto-înregistrare",
"selfReg_text" => "Permisiune utilizatori de a se auto-înregistra pentru acces la calendar.",
"selfRegPrivs_label" => "Drepturi de auto-înregistrare pentru",
"selfRegPrivs_text" => "Drepturile de acces pentru utilizatorii auto-înregistraţi.<br>- vizualizare: doar vizualizare<br>- postări-proprii: vizualizare şi editări postări proprii.<br>- toate postările: postare şi editare pentru toate evenimentele",
"selfRegNot_label" => "Self registration notification",
"selfRegNot_text" => "Send a notification email to the calendar email address when a self-registation takes place.",
"view" => "vizualizare",
"post_own" => 'postare activităţi proprii',
"post_all" => 'postare/editare toate activităţile',
"maxNoLogin_label" => "Numărul maxim de zile acceptat fără logare",
"maxNoLogin_text" => "Dacă un utilizator nu se loghează în timpul numărului specificat de zile, contul corespunzator va fi automat şters.<br>Dacă valoare introdusă este \'0\', contul user-ului corespunzător nu va fi şters niciodată (necesită programare prin cron)",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"miniCalView_label" => "Mini calendar view",
"miniCalView_text" => "Possible views for the mini calendar are:<br>- Full Month<br>- Work Month *)<br>- Full Week<br>- Work Week *)<br>*) For work week days see on this page: Views - Work week days",
"miniCalPost_label" => "Postare evenimente tip mini-calendar",
"miniCalPost_text" => "Relevant doar dacă se utilizează mini-calendarul!<br>Dacă opţiunea este activată utilizatorii pot:<br>- posta evenimente noi în minicalendar facînd click pe numărul zilei din celulă<br>- editare/ştergere-modificare evenimente prin click direct pe eveniment",
"miniCalHBox_label" => "Mini cal event details hover box",
"miniCalHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in the mini calendar",
"sideBarHBox_label" => "Sidebar event details hover box",
"sideBarHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event in the sidebar",
"showLinkInSB_label" => "Show links in sidebar",
"showLinkInSB_text" => "Display URLs from the event description as a hyperlink in the upcoming events sidebar",
"sideBarDays_label" => "Days to look ahead in sidebar",
"sideBarDays_text" => "Number of days to look ahead for events in the upcoming events sidebar.",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Luna de start pentru modul de afişare 'Anual'",
"yearStart_text" => "Dacă se specifică o lună de start (1-12) pentru afişare în modul \'Anual\', calendarul va fi afişat mereu pornind de la această lună iar anul următor va fi afişat începînd cu prima zi a lunii specificate (nu din prima zi a lunii ianuarie).<br/>Valoarea \'0\' specifică faptul că afişarea lunilor se va baza pe data curentă.",
"colsToShow_label" => "Numărul de coloane în modul de vizualizare 'Anual'",
"colsToShow_text" => "Numărul de luni de afişat pe fiecare rînd în modul \'Anual\'.<br>Recomandabil 3 sau 4.",
"rowsToShow_label" => "Numărul de luni de afişat în modul 'Anual'",
"rowsToShow_text" => "Numărul de coloane (pentru patru luni) de afişat în modul de vizualizare \'Anual\'.<br>Recomandat 4 (pentru a avea 16 luni de vizualizat în pagină).",
"weeksToShow_label" => "Numărul de săptămîni de afişat în modul 'Lunar'",
"weeksToShow_text" => "Numărul de săptămîni de afişat în modul \'Lunar\'.<br>Recomandabil 10 pentru a avea 2.5 luni de vizualizat în pagină.<br/>Valoarea \'0\' determină afişarea unei singure luni (luna curentă).",
"workWeekDays_label" => "Work week days",
"workWeekDays_text" => "Days to be shown in each week in Work Month view and Work Week view.<br>Enter the number of each day that should be visible. Valid day numbers:<br>1 = Monday<br>2 = Tuesday<br>....<br>7 = Sunday<br>e.g. 12345 : Monday - Friday",
"lookaheadDays_label" => "Numărul de zile de afişat în modul 'Care Urmează'",
"lookaheadDays_text" => "Numărul de zile de afişat pentru modul evenimente \'Care Urmează\', \'Todo List\' şi in fluxul RSS.",
"dwStartHour_label" => "Ora de început pentru modul 'Zilnic/Săptămînal'",
"dwStartHour_text" => "Ora de început pentru o zi normală.<br>Spre exemplu, introducerea valorii \'6\' permite evitarea risipei de spaţiu la afişare pentru perioada inactivă miezul nopţii - ora 6.00",
"dwEndHour_label" => "End hour in Day/Week view",
"dwEndHour_text" => "Hour at which a normal day of events ends.<br>E.g., setting this value to 18 will avoid wasting space in Week/Day view for the quiet time between 18:00 and midnight.",
"dwTimeSlot_label" => "Dimensiune rînd în modul 'Zilnic/Săptămînal'",
"dwTimeSlot_text" => "Dimensiune rînd exprimată în minute<br>Această valoare, împreună cu \'Ora de Început\' (vezi mai sus), va determina numărul de linii (rînduri) maxim în modul \'Zilnic/Săptămînal\'.",
"dwTsHeight_label" => "Înălţime rînd",
"dwTsHeight_text" => "Înălţime rînd în modul \'Zilnic/Săptămînal\' (pixeli).",
"eventHBox_label" => "Event details hover box",
"eventHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in Year view or an event title in Month, Week or Day view.",
"showAdEd_label" => "Show date event added/edited",
"showAdEd_text" => "Show the date the event was added/edited and the user who added/edited the event in:<br>- modul de vizualizare \'Care Urmează\'<br>- modul de vizualizare \'Modificări\'<br>- the events on the \'Text Search\' page<br>- feed-urile RSS<br>- notificările prin email.",
"showCatName_label" => "Afişare denumire categorie",
"showCatName_text" => "Daca opţiunea este activă, în diferite moduri de vizualizare, pe lîngă afişarea evenimentului în culoarea categoriei selectate va fi afişat şi denumirea categoriei.",
"showLinkInMV_label" => "Afişare link-uri în modul 'Lunar'",
"showLinkInMV_text" => "Daca opţiunea este activă, URL-urile din descrierea evenimentului vor fi convertite şi afişate ca hyperlink-uri în modul de vizualizare \'Lunar\'",
"eventColor_label" => "Culorile folosite pentru afişare eveniment bazate pe",
"eventColor_text" => "Evenimentele din calendar pot fi afişate folosind palete definite pentru utilizator sau pentru categoria de eveniment.",
"owner_color" => "paletă utilizator",
"cat_color" => "paletă categorie",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Formatul datei (zz ll aaaa)",
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
"weekStart_label" => "Prima zi a săptămînii",
"weekStart_text" => "O săptămînă poate începe cu Duminică sau Luni.",
"weekNumber_label" => "Afişare număr săptămînă",
"weekNumber_text" => "Afişarea numărului săptămînii in modurile \'Anual\', \'Lunar\' sau \'Săptămînal\' poate fi activată/dezactivată",
"time_format_us" => "12-ore AM/PM",
"time_format_eu" => "24-ore",
"sunday" => "Duminică",
"monday" => "Luni",
"time_zones" => "FUS ORAR",
"dd_mm_yyyy" => "zz-ll-aaaa",
"mm_dd_yyyy" => "ll-zz-aaaa",
"yyyy_mm_dd" => "aaaa-ll-zz",

//login.php
"log_log_in" => "Autentificare",
"log_remember_me" => "Memorare utilizator",
"log_register" => "Înregistrare",
"log_change_my_data" => "Modificare date acces",
"log_change" => "Modifică",
"log_un_or_em" => "Nume Utilizator sau email",
"log_un" => "Nume Utilizator",
"log_em" => "Email",
"log_pw" => "Parola",
"log_new_un" => "Nume Utilizator Nou",
"log_new_em" => "Adresă Nouă de email",
"log_new_pw" => "Parola Nouă",
"log_pw_msg" => "Aveţi aici parola pentru autentificare",
"log_pw_subject_pre" => "dvs.",
"log_pw_subject_post" => "Parola",
"log_npw_msg" => "Aveţi aici noua parola pentru autentificare",
"log_npw_subject_pre" => "Noua dumneavoastră",
"log_npw_subject_post" => "Parola",
"log_npw_sent" => "Noua dumneavoastră parolă a fost trimisă",
"log_registered" => "Înregistrare Corectă - Parola v-a fost trimisă prin email",
"log_not_registered" => "Înregistrarea a eşuat",
"log_un_exists" => "Acest nume de utilizator există deja",
"log_em_exists" => "Această adresă de email există deja",
"log_un_invalid" => "Nume utilizator invalid (nr. minim de caractere - 2. Folosiţi doar caracterele: A-Z, a-z, 0-9, and _-.)  ",
"log_em_invalid" => "Adresă de email incorectă",
"log_un_em_invalid" => "Numele de utilizator / email incorecte",
"log_un_em_pw_invalid" => "Numele de utilizator / email sau parolă incorecte",
"log_no_un_em" => "Introduceţi numele sau adresa de email",
"log_no_un" => "Introduceţi numele",
"log_no_em" => "Introduceţi adresa de email",
"log_no_pw" => "Introduceţi parola",
"log_no_rights" => "Autentificare eşuată: nu aveţi drepturi de vizualizare - Contactaţi administratorul",
"log_send_new_pw" => "trimite parolă nouă",
"log_if_changing" => "Doar dacă se modifică",
"log_no_new_data" => "Nicio modificare",
"log_invalid_new_un" => "Nume utilizator invalid (nr. minim de caractere - 2. Folosiţi doar caracterele: A-Z, a-z, 0-9, and _-.) ",
"log_new_un_exists" => "Numele de Utilizator introdus există deja",
"log_invalid_new_em" => "Adresa de email este incorectă",
"log_new_em_exists" => "Adresa introdusă există deja",
"log_ui_language" => "Limba pentru Interfaţa Utilizator",
"log_new_reg" => "New user registration",
"log_date_time" => "Date / time",
"log_reload_retry" => "Time-out. Please close this window, reload the calendar and try again",

//categories.php
"cat_list" => "Lista Categoriilor",
"cat_edit" => "Editare",
"cat_delete" => "Ştergere",
"cat_add_new" => "Adăugare Categorie Nouă",
"cat_add" => "Adăugare Categorie",
"cat_edit_cat" => "Editare Categorie",
"cat_name" => "Denumire Categorie",
"cat_sequence" => "Secvenţă",
"cat_in_menu" => "în meniu",
"cat_text_color" => "Culoare Text",
"cat_background" => "Fundal",
"cat_select_color" => "Selecţie Culoare",
"cat_save" => "Actualizare Categorie",
"cat_added" => "Categorie Adăugată",
"cat_updated" => "Categorie Actualizată",
"cat_deleted" => "Categorie Ştearsă",
"cat_invalid_color" => "Format culoare (#XXXXXX - unde X = valoare HEX)",
"cat_not_added" => "Categorie nu a fost Adăugată",
"cat_not_updated" => "Categoria nu a fost Actualizată",
"cat_not_deleted" => "Categoria nu a fost Ştearsă",
"cat_nr" => "#",
"cat_repeat" => "Repetare",
"cat_every_day" => "în fiecare zi",
"cat_every_week" => "în fiecare săptămînă",
"cat_every_month" => "în fiecare lună",
"cat_every_year" => "în fiecare an",
"cat_public" => "Public",
"cat_check_mark" => "Check mark",
"cat_label" => "label",
"cat_mark" => "mark",

//users.php
"usr_list_of_users" => "Lista Utilizatorilor",
"usr_name" => "Nume Utilizator",
"usr_email" => "Email",
"usr_password" => "Parola",
"usr_rights" => "Drepturi de Acces",
"usr_language" => "Limbă",
"usr_ui_language" => "Limba Interfaţă Utilizator",
"usr_edit_user" => "Editare Profil Utilizator",
"usr_add" => "Adăugare Utilizator",
"usr_edit" => "Editare",
"usr_delete" => "Ştergere",
"usr_view" => "Vizualizare",
"usr_post_own" => "Postări Proprii",
"usr_post_all" => "Toate Postările",
"usr_admin" => "Admin",
"usr_login_0" => "Prima conectare",
"usr_login_1" => "Ultima conectare",
"usr_login_cnt" => "Conectări",
"usr_add_profile" => "Adăugare utilizator",
"usr_upd_profile" => "Actualizare Profil",
"usr_not_found" => "Utilizatorul nu există",
"usr_if_changing_pw" => "Doar dacă se schimbă parola",
"usr_admin_functions" => "Funcţii Administrare",
"usr_no_rights" => "Fără drepturi de acces",
"usr_view_calendar" => "Vizualizare calendar",
"usr_post_events_own" => "Postare + editare evenimente proprii",
"usr_post_events_all" => "Postare + editare toate evenimentele",
"usr_pw_not_updated" => "Parola nu a fost actualizată",
"usr_added" => "Utilizator adăugat",
"usr_updated" => "Profile Utilizatori",
"usr_deleted" => "Utilizator şters",
"usr_not_added" => "Utilizatorul nu a fost adăugat",
"usr_not_updated" => "profilul utilizatorului nu a fost actualizat",
"usr_not_deleted" => "Utilizatorul nu a fost şters",
"usr_cred_required" => "Numele utilizatorului, email-ul şi parola sînt necesare",
"usr_uname_exists" => "Acest nume de utilizator există deja",
"usr_email_exists" => "Această adresă de email există deja",
"usr_un_invalid" => "Nume utilizator invalid (minim \'2\' caractere. Folosiţi doar caracterele: A-Z, a-z, 0-9, and _-.) ",
"usr_em_invalid" => "Adresă de email invalidă",
"usr_cant_delete_yourself" => "Nu vă puteţi şterge propriul cont",
"usr_background" => "Culoare fundal",
"usr_select_color" => "Selectare culoare",
"usr_invalid_color" => "Format culoare invalid (#XXXXXX - X = valoare HEXA)",

//database.php
"mdb_dbm_functions" => "Funcţii pentru Baza de Date",
"mdb_noshow_tables" => "Tabele (din bază) nu pot fi accesate",
"mdb_compact" => "Compactare Bază de Date",
"mdb_compact_table" => "Compactare Tabele",
"mdb_compact_error" => "Eroare",
"mdb_compact_done" => "Gata",
"mdb_purge_done" => "Evenimentele marcate pentru ştergere au fost eliminate definitiv",
"mdb_repair" => "Verificare şi Reparare",
"mdb_check_table" => "Verificare bază",
"mdb_ok" => "OK",
"mdb_nok" => "Eroare",
"mdb_nok_repair" => "Eroare, se încearcă repararea",
"mdb_backup" => "Back-up Bază de Date",
"mdb_backup_table" => "Back-up tabel",
"mdb_backup_done" => "Gata",
"mdb_file_saved" => "Fişier de Back-up salvat.",
"mdb_nume_fişier" => "Nume fişier:",
"mdb_start" => "Start",
"mdb_no_function_checked" => "Nicio funcţie selectată",
"mdb_write_error" => "Eroare salvare fişier de back-up. <br>Verificaţi drepturile de scriere pentru fişiere în folderul de back-up",

//import/export.php
"iex_file" => "Selecţie Fişier",
"iex_file_name" => "iCal file name",
"iex_file_description" => "Descriere fişier iCal",
"iex_filters" => "Filtru Evenimente",
"iex_upload_ics" => "Import Fişier iCal",
"iex_create_ics" => "Creare Fişier iCal",
"iex_upload_csv" => "Incărcare Fişier CSV",
"iex_upload_file" => "Import Fişier",
"iex_create_file" => "Creare Fişier",
"iex_download_file" => "Descărcare Fişier",
"iex_fields_sep_by" => "Cîmpuri separate prin",
"iex_birthday_cat_id" => "ID categorie",
"iex_default_cat_id" => "ID categorie implicită",
"iex_if_no_cat" => "dacă nu este gasită nicio categorie",
"iex_import_events_from_date" => "Import evenimente definite pînă la",
"iex_see_insert" => "vezi instrucţiunile în partea dreaptă",
"iex_no_file_name" => "Numele fişierului lipseşte",
"iex_inval_field_sep" => "separator invalid sau lipsă",
"iex_no_begin_tag" => "fişier invalid iCal (lipseşte tag-ul BEGIN)",
"iex_date_format" => "Format dată eveniment",
"iex_time_format" => "Format timp eveniment",
"iex_number_of_errors" => "Numărul erorilor din listă",
"iex_bgnd_highlighted" => "evidenţiere fundal",
"iex_verify_event_list" => "Verificaţi Lista Evenimentelor şi faceţi corecţiile necesare, apoi click",
"iex_add_events" => "Adaugare Evenimente la Baza de Date",
"iex_select_birthday_delete" => "Selectaţi opţiunile Ziua de Naştere şi Ştergere după nevoie",
"iex_select_delete_ignore" => "Selectaţi opţiunea Delete pentru a ignora Evenimentul",
"iex_title" => "Titlu",
"iex_venue" => "Locaţie",
"iex_owner" => "Proprietar",
"iex_category" => "Categorie",
"iex_date" => "Data",
"iex_end_date" => "Data de sfîrşit",
"iex_start_time" => "Ora de începere",
"iex_end_time" => "Ora de terminare",
"iex_description" => "Descriere",
"iex_birthday" => "data de naştere",
"iex_delete" => "Ştergere",
"iex_events_added" => "evenimente adăugate",
"iex_events_dropped" => "eveniment ignorat (există deja)",
"iex_db_error" => "Eroare în Baza de Date",
"iex_ics_file_error_on_line" => "eroare in fişierul iCal la linia",
"iex_occurring_between" => "apare între",
"iex_changed_between" => "Adăugat/modificat între",
"iex_select_date" => "Selecţie dată",
"iex_select_start_date" => "Select start date",
"iex_select_end_date" => "Select end date",
"iex_all_cats" => "toate categoriile",
"iex_all_users" => "toate utilizatorilor",
"iex_no_events_found" => "Niciun eveniment găsit",
"iex_file_created" => "Fişier creat",
"iex_write error" => "Eroare salvare fişier export. <br>Verificaţi drepturile de scriere pentru fişiere în folderul selectat",

//lcalcron.php
"cro_sum_header" => "SUMAR CRON JOB",
"cro_sum_trailer" => "SFÎRŞIT SUMAR",

//eventchk.php
"evc_sum_title" => "EVENTS EXPIRED",
"evc_nr_deleted" => "Number of events deleted",

//notify.php
"not_sum_title" => "MEMENTO EMAIL",
"not_not_sent_to" => "Memento trimis la",
"not_no_not_dates_due" => "Nicio notificare",
"not_all_day" => "Toate zilele",
"not_mailer" => "mailer",
"not_subject" => "Subjectul",
"not_event_due_in" => "Următorul eveniment este scadent la",
"not_due_in" => "Scadent la",
"not_days" => "zi(zile)",
"not_date_time" => "Dată / oră",
"not_title" => "Titlu",
"not_sender" => "Expeditor",
"not_venue" => "Locaţie",
"not_description" => "Descriere",
"not_category" => "Categorie",
"not_status" => "Status",
"not_open_calendar" => "Deschide calendar",

//sendchg.php
"sch_sum_title" => "MODIFICĂRI ÎN CALENDAR",
"sch_nr_changes_last" => "Numărul ultimelor modificări",
"sch_report_sent_to" => "Raport trimis la",
"sch_no_report_sent" => "Nu a fost trimis niciun raport",
"sch_days" => "zi(le)",

//userchk.php
"usc_sum_title" => "VERIFICARE CONT UTILIZATOR",
"usc_nr_accounts_deleted" => "Numărul de conturi şterse",
"usc_no_accounts_deleted" => "Niciun cont şters",

//explanations
"xpl_manage_db" =>
"<h4>Instrucţiuni de Lucru cu Baza de Date</h4>
<p>În această pagină pot fi selectate următoarele funcţii:</p>
<h5>Verificare şi Reparare</h5>
<p>Această funcţie permite scanarea bazei de date corespunzătoare calendarului pentru depistarea eventualelor erori şi corectarea acestora.</p>
<p>Dacă nu întîlniţi erori în funcţionarea calendarului, utilizarea acestei funcţii o singură dată pe an este suficientă.</p>
<h5>Compactare Bază de Date</h5>
<p>Cînd un utilizator şterge un eveniment, evenimentul este marcat ca 'şters', fără a fi eliminat efectiv din bază.
Utilizarea funcţiei 'Compactare Bază de Date' permite ştergerea permanentă a evenimentelor marcate, cu eliberarea spaţiul ocupat de acestea.</p>
<h5>Backup Bază de Date</h5>
<p>Această funcţie crează un back-up al întregii baze de date (structură tabele şi conţinut) în format .sql.
Fişierul de back-up este salvat în directorul <strong>files/</strong>, numele fişierului fiind de forma: 
<kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (unde 'yyyymmdd' reprezintă 'an, lună, zi', iar hhmmss = 'ore, minute, secunde'.</p>
<p>Acest fişier de back-up permite re-crearea bazei de date, în cazul unui accident (pierderea bazei de date) spre exemplu, folosind opţiunile de import ale  <strong>phpMyAdmin</strong> (acest pachet software, extrem de util, fiind preinstalat în majoritatea serverelor web actuale).</p>",

"xpl_import_csv" =>
"<h4>Instrucţiuni pentru Import CSV</h4>
<p>Acest formular permite importul de text formatat <strong>CVS (Comma Separated Values)</strong> pentru introducerea de evenimente în Calendar.</p>
<p>Ordinea coloanelor în fişierul CSV trebuie să fie: titlu, locaţie, ID categorie (vezi mai jos), data, data finală, ora de început şi de sfîrşit precum şi descrierea evenimentului. Prima linie din fişierul CSV, (capul de tabel), este ignorată.</p>
<h5>Model Fişier CSV</h5>
<p>Un model de fişier CVS (fişier cu extensia .cvs) poate fi găsit în folderul '<strong>files/</strong>' al distribuţiei LuxCal.</p>
<h5>Formatul pentru dată şi oră</h5>
<p>Formatul selectat pentru dată şi oră trebuie să corespundă formatului folosit în fişierul CVS importat.</p>
<h5>Tabelul Categoriilor</h5>
<p>Calendarul utilizează numere (ID-uri) pentru specificarea categoriilor. ID-urile categoriilor din fişierul CVS trebuie să corespundă cu cele definite în calendar sau pot fi nule.</p>
<p>Spre exemplu, dacă doriţi ca toate evenimentele să fie marcate ca 'important', ID-ul <strong>IMPORTANT</strong> trebuie să fie definit conform ID-ului din listă.</p>
<br>
<p>Pentru calendarul dumneavoastră, pînă acum, au fost definite următoarele categorii:</p>",

"xpl_import_ical" =>
"<h4>Instrucţiuni pentru Import iCalendar </h4>
<p>Acest formular permite importul fişierelor de tipul <strong>iCalendar</strong> pentru introducerea de evenimente in Calendarul LuxCal.</p>
<p>Fişierul trebuie să respecte specificaţiile prevăzute în  standardul [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545</a></u>] al Internet Engineering Task Force.</p>
<p>Vor fi importate doar evenimentele importante; toate celelalte componente iCal components, ca: 'De Făcut', 'Jurnal', 'Liber / 
Ocupat', 'Fus Orar' şi 'Alarme' vor fi ignorate.</p>
<h5>Model de fişier iCal</h5>
<p>Un exemplu de fişier iCalendar (fişier cu extensia .ics) poate fi găsit în folderul '<strong>files/</strong>' al distribuţiei LuxCal.</p>
<h5>Tabelul Categoriilor</h5>
<p>Calendarul utilizează numere (ID-uri) pentru specificarea categoriilor. ID-urile categoriilor din fişierul iCalendar trebuie să corespundă cu cele definite în calendar sau pot fi nule.</p>
<br>
<p>Pentru calendarul dumneavoastră, pînă acum, au fost definite următoarele categorii:</p>",

"xpl_export_ical" =>
"<h4>Exportul fişierelor iCalendar</h4>
<p>Acest formular permite exportul evenimentelor din calendar în formatul <strong>iCalendar</strong>.</p>
<p>Numele fişierului<b>iCal nume fişier</b> (fără extensie) este opţional. Fişierul creat va fi  
salvat în directorul \"files/\" în server cu numele specificat sau dacă nu, cu numele  
implicit \"luxcal\". Extensia fişierului va fi <b>.ics</b>.
Dacă în folderul \"files/\" există deja un fişier cu ecest nume acesta va fi suprascris.</p>
<p>Opţional se poate adăuga şi o descriere a fişierului (ex. 'Activităţi 2012') care va apare în head-erul fişierului iCal exportat.</p>
<p><b>Filtru</b>: Evenimentele exportate pot fi filtrate după:</p>
<ul>
<li>proprietar eveniment</li>
<li>categorie</li>
<li>data de început</li>
<li>data adăugării/modificării</li>
</ul>
<p>Fiecare filtru este opţional, lipsa filtrului însemnînd că vor fi exportate toate evenimentele</p>
<br>
<p>Fişierul exportat respectă specificaţiile prevăzute în  standardul [<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545</a></u>] al Internet Engineering Task Force</p>
<p>Cînd se descarcă fişierul iCal exportat, la numele acestuia va fi adăugat în mod automat data şi ora..</p>
<h5>Exemplu de fişier iCal</h5>
<p>Un exemplu de fişier iCalendar (fişier cu extensia .ics) poate fi găsit în folderul '<strong>files/</strong>' al distribuţiei LuxCal.</p>"
);
?>
