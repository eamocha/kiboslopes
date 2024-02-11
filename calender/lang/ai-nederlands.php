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
"none" => "Geen",
"back" => "Terug",
"close" => "Sluiten",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//settings.php - fieldset headers + general
"set_general_settings" => "Kalender algemeen",
"set_opanel_settings" => "Instellingen",
"set_user_settings" => "Gebruikers",
"set_minical_settings" => "Mini Calendar / Upcoming Events Sidebar (only relevant if used)",
"set_view_settings" => "Weergave",
"set_dt_settings" => "Datum/Tijd",
"set_save_settings" => "Instellingen opslaan",
"set_missing_invalid" => "ontbrekende of ongeldige instellingen (achtergrond gekleurd)",
"set_settings_saved" => "Kalender instellingen opgeslagen",
"set_save_error" => "Database fout. Opslaan kalender instellingen mislukt",
"hover_for_details" => "Ga met de muis over de beschrijving voor details",
"enabled" => "aan",
"disabled" => "uit",
"no" => "nee",
"yes" => "ja",
"or" => "of",
"minutes" => "minuten",
"pixels" => "pixels",
"no_way" => "U bent niet bevoegd tot deze actie.",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Kalendertitel",
"calendarTitle_text" => "Weergegeven in de titelbalk van de kalender en gebruikt in mail herinneringen",
"calendarUrl_label" => "Kalender-URL",
"calendarUrl_text" => "Webadres van de kalender.",
"calendarEmail_label" => "Kalender mailadres",
"calendarEmail_text" => "Het mailadres van de afzender / de ontvanger gebruikt in mailherinneringen<br>Formaat: \'mail\' of \'naam&#8249;mail&#8250;\'. \'naam\' kan bijv. de kalendertitel zijn",
"timeZone_label" => "Tijdzone",
"timeZone_text" => "De door de kalender gebruikte tijdzone voor het berekenen van de huidige tijd",
"see" => "zie",
"chgEmailList_label" => "Mailadressen voor wijzigingen",
"chgEmailList_text" => "Mailadressen die periodiek een mail krijgen met wijzigingen in de kalender<br>Mail adressen gescheiden door puntkomma\'s.<br>(deze functie werkt via een cron job)",
"chgNofDays_label" => "Aantal dagen teruggaan voor wijzigingen",
"chgNofDays_text" => "Aantal dagen dat wordt teruggegaan voor het overzicht met kalenderwijzigingen<br>Als het aantal dagen 0 is, wordt er geen overzicht met kalenderwijzigingen verstuurd.<br>(deze functie werkt via een cron job)",
"notifSender_label" => "Afzender van herinneringsmails",
"notifSender_text" => "Wanneer de kalender herinneringsmails verstuurt, kan het veld afzender of het kalender mailadres of het mailadres van de gebruiker die de activiteit heeft ingevoerd bevatten.<br>In geval van het mailadres van de gebruiker kan de ontvanger antwoorden op de e-mail.",
"cronSummary_label" => "Admin cronjob samenvatting",
"cronSummary_text" => "Mail een cronjob samenvatting naar de kalenderbeheerder.<br>Inschakelen is alleen zinvol als een cronjob is geactiveerd voor de kalender.",
"details4All_label" => "Toon details aan alle gebruikers",
"details4All_text" => "Indien aan: activiteiten details zullen zichtbaar zijn voor de eigenaar van de activiteit en alle andere gebruikers.<br>Indien uit: activiteiten details zullen zichtbaar zijn voor de eigenaar van de activiteit en alle gebruikers met rechten \'wijzigen alle activiteiten\'. Andere gebruikers met minder echten kunnen geen activiteiten details zien.",
"rssFeed_label" => "RSS feed links",
"rssFeed_text" => "Indien geactiveerd: Voor gebruikers met minstens rechten \'bekijken\' zal een RSS feed link woorden weergegeven in de voet van de kalender; ook zal een RSS feed link worden toegevoegd aan de HTML head van de kalender paginas.",
"eventExp_label" => "Aantal dagen voor activiteiten worden verwijderd",
"eventExp_text" => "Aantal dagen na de activiteit datum waarna deze automatisch wordt verwijderd.<br>Indien 0 of als er geen cron job is gedefinieerd, worden geen activiteiten verwijderd.<br>(deze functie werkt via een cron job)",
"cookieExp_label" => "Aantal dagen voor 'onthoud mij' cookie afloopt",
"cookieExp_text" => "Aantal dagen voor het cookie gezet door de \'Onthoud mij\' optie (tijdens Inloggen) afloopt.",
"calendar" => "kalender",
"user" => "gebruiker",

//settings.php - options panel settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"userMenu_label" => "Filter gebruikersmenu",
"userMenu_text" => "Filter gebruikersmenu weergeven in het Instellingen paneel.<br>Dit filter kan worden gebruikt om activiteiten weer te geven welke zin ingevoerd door een bepaalde gebruiker.",
"catMenu_label" => "Filter Categoriemenu",
"catMenu_text" => "Filter Categoriemenu weergeven in het Instellingen paneel.<br>Dit filter kan worden gebruikt om activiteiten weer te geven welke tot een bepaalde activiteitencategorie behoren.",
"langMenu_label" => "Taalkeuzemenu",
"langMenu_text" => "Taalkeuzemenu weergeven in de navigatiebalk<br>Met dit menu kan de taal van de gebruikersinterface worden gekozen.<br>(inschakelen alleen zinvol als meerdere talen zijn geïnstalleerd)",
"defaultView_label" => "Standaardweergave bij opstarten",
"defaultView_text" => "Mogelijke standaardweergaven bij opstarten van de kalender zijn:<br>- Jaar<br>- Maand<br>- Werkmaand *)<br>- Week<br>- Werkweek *)<br>- Dag<br>- Binnenkort<br>- Wijzigingen<br>Aanbevolen: Maand of Binnenkort<br>*) Voor werkdagen zie op deze pagina: Weergave - Werkweek dagen",
"language_label" => "Standaard taal voor user interface",
"language_text" => "De bestanden ui-{taal}.php, ai-{taal}.php, ug-{taal}.php en ug-layout.png moeten in de lang/ map aanwezig zijn. {taal} = taal gekozen voor de gebruikersinterface. Bestandsnamen in kleine letter!",

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Zelfregistratie",
"selfReg_text" => "Gebruikers toestaan zich te registreren en toegang tot de kalender te krijgen",
"selfRegPrivs_label" => "Zelfregistratierechten",
"selfRegPrivs_text" => "Toegangsrechten tot de kalender voor gebruikers die zich hebben geregistreerd<br>- view: alleen zien<br>- post-self: activiteiten toevoegen en eigen activiteiten wijzigen<br>- post-all: activiteiten toevoegen en eigen activiteiten en die van anderen wijzigen",
"selfRegNot_label" => "Melding zelfregistratie",
"selfRegNot_text" => "Stuur een e-mail naar het kalender mailadres wanneer een zelfregistatie plaatsvindt.",
"view" => "bekijken",
"post_own" => 'eigen invoer',
"post_all" => 'alle invoeren',
"maxNoLogin_label" => "Max. aantal dagen niet ingelogd",
"maxNoLogin_text" => "Als een gebruiker gedurende dit aantal dagen niet is ingelogd, dan wordt zijn/haar account automatisch verwijderd.<br>Als het aantal dagen 0 is, zullen gebruikersaccounts nooit worden verwijderd<br>(deze functie werkt via een cron job)",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"miniCalView_label" => "Mini calendar view",
"miniCalView_text" => "Mogelijke weergaven voor de minikalender zijn:<br>- Maand<br>- Werkmaand *)<br>- Week<br>- Werkweek *)<br>*) Voor werkdagen zie op deze pagina: Weergave - Werkweek dagen",
"miniCalPost_label" => "Minikalender interactief",
"miniCalPost_text" => "Alleen van toepassing bij gebruik van de minikalender!<br>Indien ingeschakeld kunnen gebruikers:<br>- nieuwe activiteiten aan de kalender toevoegen door boven in een dag cel te klikken<br>- activiteiten wijzigen/verwijderen door op een activiteit (vierkantje) te klikken",
"miniCalHBox_label" => "Mini cal event details hover box",
"miniCalHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in the mini calendar",
"sideBarHBox_label" => "Sidebar event details hover box",
"sideBarHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event in the sidebar",
"showLinkInSB_label" => "Show links in sidebar",
"showLinkInSB_text" => "Display URLs from the event description as a hyperlink in the upcoming events sidebar",
"sideBarDays_label" => "Days to look ahead in sidebar",
"sideBarDays_text" => "Number of days to look ahead for events in the upcoming events sidebar.",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Beginmaand in Jaar-weergave",
"yearStart_text" => "Indien een beginmaand is opgegeven (1 - 12), zal de kalender in Jaar-weergave altijd met deze maand beginnen en het jaar van deze eerste maand zal pas veranderen vanaf de eerste dag van dezelfde maand in het volgende jaar.<br>De waarde 0 heeft een een speciale betekenis: de beginmaand is gebaseerd op de huidige datum en zal in de eerste rij maanden vallen.",
"colsToShow_label" => "Aantal kolommen in Jaar-weergave",
"colsToShow_text" => "Aantal maanden weer te geven in elke rij in Jaar-weergave<br>Aanbevolen: 3 of 4",
"rowsToShow_label" => "Aantal rijen in Jaar-weergave",
"rowsToShow_text" => "Aantal rijen van telkens vier maanden weer te geven in Jaar-weergave<br>Aanbevolen: 4, zodat door 16 maanden kan worden gescrolld",
"weeksToShow_label" => "Aantal weken in Maand-weergave",
"weeksToShow_text" => "Aantal weken weer te geven in Maand-weergave<br>Aanbevolen: 10, zodat door 2.5 maand kan worden gescrolld<br>De waarde 0 heeft speciale betekenis: geef precies 1 maand weer",
"workWeekDays_label" => "Werkweek dagen",
"workWeekDays_text" => "Dagen zichtbaar in de weken in Werkmaand weergave en Werkweek weergave.<br>Voer het nummer in van elke dag die zichtbaar moet zijn. Mogelijke dagnummers:<br>1 = maandag<br>2 = dinsdag<br>....<br>7 = zondag<br>voorbeeld 12345 : maandag - vrijdag",
"lookaheadDays_label" => "Aantal dagen vooruitkijken",
"lookaheadDays_text" => "Aantal dagen dat moet worden vooruitgekeken in het overzicht Binnenkort, in de Taken Lijst en in de RSS feeds",
"dwStartHour_label" => "Beginuur in Dag/Week-weergave",
"dwStartHour_text" => "Uur waarop een normale dag begint<br>Wanneer deze waarde op bijv. 6 wordt gesteld, wordt in de Dag/Week-weergave niet nodeloos ruimte gebruikt voor de tijd tussen middernacht en 6:00 uur waarop normaal niet veel wordt uitgevoerd",
"dwEndHour_label" => "Einduur in Dag/Week weergave",
"dwEndHour_text" => "Uur waarop een normale dag eindigt.<br>Wanneer deze waarde op bijv. 18 wordt gesteld, wordt in de Dag/Week-weergave niet nodeloos ruimte gebruikt voor de tijd tussen 18:00 uur en middernacht.",
"dwTimeSlot_label" => "Tijd slot in Dag/Week weergave",
"dwTimeSlot_text" => "Dag/Week weergave tijd slot in aantal minuten.<br>Deze waarde, samen met het uur waarop de normale dag begint en eindigd (zie hier boven) bepalen het aantal rijen in Dag/Week weergave.",
"dwTsHeight_label" => "Tijd slot hoogte",
"dwTsHeight_text" => "Day/Week weergave tijd slot weergave hoogte in aantal pixels.",
"eventHBox_label" => "Event details hover box",
"eventHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in Year view or an event title in Month, Week or Day view.",
"showAdEd_label" => "Geef datum activiteit ingevoerd/gewijzigd weer",
"showAdEd_text" => "Geef de datum waarop de activiteit is ingevoerd/gewijzigd en de gebruiker die de activiteit heeft ingevoerd/gewijzigd weer in:<br>- de weergave Binnenkort<br>- de weergave Wijzigingen<br>- de activiteiten op de Zoeken op Tekst pagina<br>- de RSS feeds<br>- de mail herinnering.",
"showCatName_label" => "Geef categorie naam weer",
"showCatName_text" => "Indien aan: in verschillende weergaven, zal behalve het weergeven van de activiteiten titel in de kleur van de categorie, ook de naam van de categorie  worden weergegeven.",
"showLinkInMV_label" => "Geef links in maand overzicht weer",
"showLinkInMV_text" => "Indien aan, URLs in de activiteiten omschrijving zullen in Maand-weergave als hyperlink worden weergegeven",
"eventColor_label" => "Activiteiten kleuren gebaseerd op",
"eventColor_text" => "Activiteiten in de verschillende kalenderweergaven kunnen worden weergegeven in de kleur welke is toegewezen aan de eigenaar van de activiteit of de kleur van de categorie welke aan de activiteit is toegekend.",
"owner_color" => "eigenaar kleur",
"cat_color" => "categorie kleur",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Datumformaat (dd mm jjjj)",
"dateFormat_text" => "Tekenreeks met het formaat van datums in de kalender weergaven en input velden.<br>Toegestaane tekens: y = jaar, m = maand en d = dag.<br>Niet-alphanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>y-m-d: 2012-10-31<br>m.d.y: 10.31.2012<br>d/m/y: 31/10/2012",
"dateFormat_expl" => "e.g. y.m.d: 2012.10.31",
"MdFormat_label" => "Datumformaat (dd maand)",
"MdFormat_text" => "Tekenreeks met het formaat van datums bestaande uit dag en maand.<br>Toegestaane tekens: M = maand in tekst, d = dag in cijfers.<br>Niet-alphanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>d M: 12 april<br>M, d: juli, 14",
"MdFormat_expl" => "e.g. M, d: juli, 14",
"MdyFormat_label" => "Datumformaat (dd maand jjjj)",
"MdyFormat_text" => "Tekenreeks met het formaat van datums bestaande uit dag, maand en jaar.<br>Toegestaane tekens: d = dag in cijfers, M = maand in tekst, y = jaar in cijfers.<br>Niet-alphanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>d M y: 12 april 2012<br>M d, y: juli 8, 2012",
"MdyFormat_expl" => "e.g. M d, y: juli 8, 2012",
"MyFormat_label" => "Datumformaat (maand jjjj)",
"MyFormat_text" => "Tekenreeks met het formaat van datums bestaande uit maand en jaar.<br>Toegestaane tekens: M = maand in tekst, y = jaar in cijfers.<br>Niet-alphanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>M y: april 2012<br>y - M: 2012 - juli",
"MyFormat_expl" => "e.g. M y: april 2012",
"DMdFormat_label" => "Datumformaat (dag dd maand)",
"DMdFormat_text" => "Tekenreeks met het formaat van datums bestaande uit weekdag, dag en maand.<br>Toegestaane tekens: WD = weekdag in tekst, M = maand in tekst, d = dag in cijfers.<br>Niet-alphanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>WD d M: vrijdag 12 april<br>WD, M d: Maandag, juli 14",
"DMdFormat_expl" => "e.g. WD - M d: zondag - april 6",
"DMdyFormat_label" => "Datumformaat (dag dd maand jjjj)",
"DMdyFormat_text" => "Tekenreeks met het formaat van datums bestaande uit weekdag, dag, maand en jaar.<br>Toegestaane tekens: WD = weekdag in tekst, M = maand in tekst, d = dag in cijfers, y = jaar in cijfers.<br>Niet-alphanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>WD d M y: vrijdag 13 april 2012<br>WD - M d, y: Maandag - juli 16, 2012",
"DMdyFormat_expl" => "e.g. WD, M d, y: maandag, juli 16, 2012",
"timeFormat_label" => "Tijdformaat (uu mm)",
"timeFormat_text" => "Tekenreeks met het formaat van tijden in de kalender weergaven en input velden.<br>Toegestaane tekens: h = uren, m = minuten, a = am/pm (optioneel), A = AM/PM (optioneel).<br>Niet-alphanumerieke tekens kunnen als scheidingsteken worden gebruikt en worden letterlijk overgenomen.<br>Voorbeelden:<br>h:m: 22:35<br>h.m a: 10.35 pm<br>h:mA: 10:35PM",
"timeFormat_expl" => "e.g. h:m: 22:35 en h:mA: 10:35PM",
"weekStart_label" => "Eerste dag van de week",
"weekStart_text" => "Eerste dag van de week",
"weekNumber_label" => "Geef weeknummers weer",
"weekNumber_text" => "De weergave van weeknummers in Jaar, Maand en Week view kan aan- of uitgezet worden",
"time_format_us" => "12 uur AM/PM",
"time_format_eu" => "24 uur",
"sunday" => "zondag",
"monday" => "maandag",
"time_zones" => "TIJD ZONES",
"dd_mm_yyyy" => "dd-mm-jjjj",
"mm_dd_yyyy" => "mm-dd-jjjj",
"yyyy_mm_dd" => "jjjj-mm-dd",

//login.php
"log_log_in" => "Inloggen",
"log_remember_me" => "Onthoud mij",
"log_register" => "Registreren",
"log_change_my_data" => "Mijn gegevens wijzigen",
"log_change" => "Wijzig",
"log_un_or_em" => "Gebruikersnaam of mailadres",
"log_un" => "Gebruikersnaam",
"log_em" => "Mailadres",
"log_pw" => "Wachtwoord",
"log_new_un" => "Nieuwe gebruikersnaam",
"log_new_em" => "Nieuw mailadres",
"log_new_pw" => "Nieuw wachtwoord",
"log_pw_msg" => "Hier is uw wachtwoord om in te loggen",
"log_pw_subject_pre" => "Uw",
"log_pw_subject_post" => "Wachtwoord",
"log_npw_msg" => "Hier is uw nieuwe wachtwoord om in te loggen",
"log_npw_subject_pre" => "Uw nieuwe",
"log_npw_subject_post" => "Wachtwoord",
"log_npw_sent" => "Uw nieuwe wachtwoord is verstuurd",
"log_registered" => "Registratie gelukt - Uw wachtwoord is per mail verstuurd",
"log_not_registered" => "Registratie mislukt",
"log_un_exists" => "Gebruikersnaam bestaat al",
"log_em_exists" => "Mailadres bestaat al",
"log_un_invalid" => "Gebruikersnaam ongeldig (min lengte 2: A-Z, a-z, 0-9, en _-.) ",
"log_em_invalid" => "Mailadres ongeldig",
"log_un_em_invalid" => "Gebruikersnaam of wachtwoord onjuist",
"log_un_em_pw_invalid" => "Uw gebruikersnaam/mailadres of wachtwoord is onjuist",
"log_no_un_em" => "U hebt uw gebruikersnaam of mailadres niet ingevoerd",
"log_no_un" => "Voer uw gebruikersnaam in",
"log_no_em" => "Voer uw mailadres in",
"log_no_pw" => "U hebt uw wachtwoord niet ingevoerd",
"log_no_rights" => "Login afgewezen: u hebt geen toegangsrechten - Vraag de administrator",
"log_send_new_pw" => "Stuur mij een nieuw wachtwoord",
"log_if_changing" => "Alleen indien gewijzigd",
"log_no_new_data" => "Geen gegevens te wijzigen",
"log_invalid_new_un" => "Nieuwe gebruikersnaam ongeldig (min lengte 2: A-Z, a-z, 0-9, en _-.) ",
"log_new_un_exists" => "Uw nieuwe gebruikersnaam bestaat al",
"log_invalid_new_em" => "Uw nieuwe mailadres is onjuist",
"log_new_em_exists" => "Uw nieuwe mailadres bestaat al",
"log_ui_language" => "Taal gebruikersinterface",
"log_new_reg" => "Nieuwe gebruikersregistratie",
"log_date_time" => "Datum / tijd",
"log_reload_retry" => "Time-out. Sluit dit window, herlaad de kalender en probeer het opnieuw a.u.b.",

//categories.php
"cat_list" => "Categorieën",
"cat_edit" => "Wijzigen",
"cat_delete" => "Verwijderen",
"cat_add_new" => "Nieuwe categorie toevoegen",
"cat_add" => "Toevoegen",
"cat_edit_cat" => "Categorie wijzigen",
"cat_name" => "Naam categorie",
"cat_sequence" => "Volgorde",
"cat_in_menu" => "in menu",
"cat_text_color" => "Tekstkleur",
"cat_background" => "Achtergrond",
"cat_select_color" => "Kies kleur",
"cat_save" => "Opslaan",
"cat_added" => "Categorie toegevoegd",
"cat_updated" => "Categorie gewijzigd",
"cat_deleted" => "Categorie verwijderd",
"cat_invalid_color" => "Kleurformaat ongeldig (#XXXXXX waar X = HEX-waarde)",
"cat_not_added" => "Categorie niet toegevoegd",
"cat_not_updated" => "Categorie niet gewijzigd",
"cat_not_deleted" => "Categorie niet verwijderd",
"cat_nr" => "#",
"cat_repeat" => "Herhalen",
"cat_every_day" => "elke dag",
"cat_every_week" => "elke week",
"cat_every_month" => "elke maand",
"cat_every_year" => "elk jaar",
"cat_public" => "Public",
"cat_check_mark" => "Vinkje",
"cat_label" => "betekenis",
"cat_mark" => "symbool",

//users.php
"usr_list_of_users" => "Lijst van gebruikers",
"usr_name" => "Gebruikersnaam",
"usr_email" => "Mailadres",
"usr_password" => "Wachtwoord",
"usr_rights" => "Rechten",
"usr_language" => "Taal",
"usr_ui_language" => "Taal gebruikersinterface",
"usr_edit_user" => "Gebruikersprofiel wijzigen",
"usr_add" => "Gebruiker toevoegen",
"usr_edit" => "Wijzigen",
"usr_delete" => "Verwijderen",
"usr_view" => "Bekijken",
"usr_post_own" => "Eigen invoer",
"usr_post_all" => "Alle invoeren",
"usr_admin" => "Admin",
"usr_login_0" => "Eerste login",
"usr_login_1" => "Laatste login",
"usr_login_cnt" => "Logins",
"usr_add_profile" => "Profiel toevoegen",
"usr_upd_profile" => "Profiel wijzigen",
"usr_not_found" => "Gebruiker niet gevonden",
"usr_if_changing_pw" => "Alleen als het wachtwoord verandert",
"usr_admin_functions" => "Admin-functies",
"usr_no_rights" => "Geen rechten",
"usr_view_calendar" => "Kalender bekijken",
"usr_post_events_own" => "Invoeren + wijzigen eigen activiteiten",
"usr_post_events_all" => "Invoeren + wijzigen alle activiteiten",
"usr_pw_not_updated" => "Wachtwoord niet gewijzigd",
"usr_added" => "Gebruiker toegevoegd",
"usr_updated" => "Gebruikersprofiel gewijzigd",
"usr_deleted" => "Gebruiker verwijderd",
"usr_not_added" => "Gebruiker niet toegevoegd",
"usr_not_updated" => "Gebruiker niet gewijzigd",
"usr_not_deleted" => "Gebruiker niet verwijderd",
"usr_cred_required" => "Gebruikersnaam, mailadres en wachtwoord zijn verplicht",
"usr_uname_exists" => "Gebruikersnaam bestaat al",
"usr_email_exists" => "Mailadres bestaat al",
"usr_un_invalid" => "Gebruikersnaam ongeldig (min lengte 2: A-Z, a-z, 0-9, en _-.) ",
"usr_em_invalid" => "Mailadres ongeldig",
"usr_cant_delete_yourself" => "Je kunt jezelf niet verwijderen",
"usr_background" => "Achtergrondkleur",
"usr_select_color" => "Kies kleur",
"usr_invalid_color" => "Ongeldig kleurformaat (#XXXXXX waar X = HEX-waarde)",

//database.php
"mdb_dbm_functions" => "Database Functies",
"mdb_noshow_tables" => "Geen toegang tot tabel(len)",
"mdb_compact" => "Comprimeer database",
"mdb_compact_table" => "Comprimeer tabel",
"mdb_compact_error" => "Fout",
"mdb_compact_done" => "OK, klaar",
"mdb_purge_done" => "Verwijderde activiteiten definitief weggegooid",
"mdb_repair" => "Controleer en repareer database",
"mdb_check_table" => "Controleer tabel",
"mdb_ok" => "OK",
"mdb_nok" => "Niet OK",
"mdb_nok_repair" => "Niet OK, repareren",
"mdb_backup" => "Back-up database",
"mdb_backup_table" => "Back-up tabel",
"mdb_backup_done" => "OK, klaar",
"mdb_file_saved" => "Back-up bestand opgeslagen op de server.",
"mdb_file_name" => "Bestandsnaam:",
"mdb_start" => "Start",
"mdb_no_function_checked" => "Geen functie(s) geselecteerd",
"mdb_write_error" => "Opslaan back-up bestand mislukt<br>Controleer permissies van 'files/' map",

//import/export.php
"iex_file" => "Gekozen bestand",
"iex_file_name" => "iCal bestandsnaam",
"iex_file_description" => "Beschrijving iCal bestand",
"iex_filters" => "Activiteitfilters",
"iex_upload_ics" => "Upload iCal bestand",
"iex_create_ics" => "Genereer iCal bestand",
"iex_upload_csv" => "Upload CSV bestand",
"iex_upload_file" => "Upload bestand",
"iex_create_file" => "Maak bestand",
"iex_download_file" => "Download bestand",
"iex_fields_sep_by" => "Velden gescheiden door",
"iex_birthday_cat_id" => "ID verjaardag categorie",
"iex_default_cat_id" => "ID standaard categorie",
"iex_if_no_cat" => "indien geen categorie gevonden",
"iex_import_events_from_date" => "Importeer activiteiten die plaatsvinden vanaf",
"iex_see_insert" => "zie aanwijzingen aan de rechterzijde",
"iex_no_file_name" => "Bestandsnaam ontbreekt",
"iex_inval_field_sep" => "ongeldig of geen veldscheidingsteken",
"iex_no_begin_tag" => "ongeldig iCal bestand",
"iex_date_format" => "Activiteit datum formaat",
"iex_time_format" => "Activiteit tijd formaat",
"iex_number_of_errors" => "Aantal fouten in de lijst",
"iex_bgnd_highlighted" => "achtergrond gemarkeerd",
"iex_verify_event_list" => "Lijst van activiteiten verifiëren, fouten verbeteren en klik op",
"iex_add_events" => "Activiteiten aan database toevoegen",
"iex_select_birthday_delete" => "Vink eventueel Verjaardag en/of Wissen aan",
"iex_select_delete_ignore" => "Vink Wissen aan om activiteit over te slaan",
"iex_title" => "Titel",
"iex_venue" => "Plaats",
"iex_owner" => "Eigenaar",
"iex_category" => "Categorie",
"iex_date" => "Datum",
"iex_end_date" => "Einddatum",
"iex_start_time" => "Begintijd",
"iex_end_time" => "Eindtijd",
"iex_description" => "Omschrijving",
"iex_birthday" => "Verjaardag",
"iex_delete" => "Wissen",
"iex_events_added" => "activiteiten toegevoegd",
"iex_events_dropped" => "activiteiten overgeslagen (al aanwezig)",
"iex_db_error" => "Database fout",
"iex_ics_file_error_on_line" => "iCal bestandsfout op regel",
"iex_occurring_between" => "Plaatsvindend tussen",
"iex_changed_between" => "Toegevoegd/gewijzigd tussen",
"iex_select_date" => "Kies datum",
"iex_select_start_date" => "Kies begindatum",
"iex_select_end_date" => "Kies einddatum",
"iex_all_cats" => "alle categorieën",
"iex_all_users" => "alle gebruikers",
"iex_no_events_found" => "Geen activiteiten gevonden",
"iex_file_created" => "Bestand aangemaakt",
"iex_write error" => "Opslaan export bestand mislukt<br>Controleer permissies van 'files/' map",

//lcalcron.php
"cro_sum_header" => "CRONJOB SAMENVATTING",
"cro_sum_trailer" => "EINDE SAMENVATTING",

//eventchk.php
"evc_sum_title" => "ACTIVITEITEN VERLOPEN",
"evc_nr_deleted" => "Aantal activiteiten verwijderd",

//notify.php
"not_sum_title" => "E-MAIL HERINNERINGEN",
"not_not_sent_to" => "Herinnering gestuurd naar",
"not_no_not_dates_due" => "Geen herinneringsdatums actief",
"not_all_day" => "Hele dag",
"not_mailer" => "mailer",
"not_subject" => "Onderwerp",
"not_event_due_in" => "Deze activiteit staat op het programma over",
"not_due_in" => "Op het programma over",
"not_days" => "dag(en)",
"not_date_time" => "Datum / tijd",
"not_title" => "Titel",
"not_sender" => "Afzender",
"not_venue" => "Locatie",
"not_description" => "Omschrijving",
"not_category" => "Categorie",
"not_status" => "Status",
"not_open_calendar" => "Kalender openen",

//sendchg.php
"sch_sum_title" => "KALENDER WIJZIGINGEN",
"sch_nr_changes_last" => "Aantal wijzigingen laatste",
"sch_report_sent_to" => "Rapport gestuurd naar",
"sch_no_report_sent" => "Geen rapport gemaild",
"sch_days" => "dag(en)",

//userchk.php
"usc_sum_title" => "GEBRUIKERSACCOUNTS VERLOPEN",
"usc_nr_accounts_deleted" => "Aantal accounts verwijderd",
"usc_no_accounts_deleted" => "Geen accounts verwijderd",

//explanations
"xpl_manage_db" =>
"<h4>Manage Database Instructies</h4>
<p>Op deze pagina kunnen de volgende functies worden geselecteerd:</p>
<h5>Controleer en repareer database</h5>
<p>Deze functie doorloopt de kalendertabellen en controleert deze op fouten. 
Een gevonden fout wordt indien mogelijk gerepareerd.</p>
<p>Indien de kalender weergaven geen problemen vertonen, is het voldoende deze 
functie eens per jaar uit te voeren.</p>
<h5>Comprimeer database</h5>
<p>Als een gebruiker een activiteit verwijdert, wordt deze als 'verwijderd' 
gemarkeerd, maar blijft in de database. De Comprimeer Database functie zal de 
activiteiten die meer dan 30 dagen geleden als 'verwijderd' zijn gemarkeerd 
definitief uit de database verwijderen, waardoor deze ruimte weer vrij komt.</p>
<h5>Back-up database</h5>
<p>Deze functie maakt een back-up van de volledige kalender database (tabellen, 
structuur en inhoud) in .sql formaat. De back-up zal worden opgeslagen in de 
<strong>files/</strong> map met de naam: 
<kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (waar 'yyyymmdd' = jaar, maand en dag, 
en hhmmss = uur, minuten en seconden.</p>
<p>Dit back-up bestand kan worden gebruikt om de database tabelstructuur en 
inhoud opnieuw op te genereren, bijvoorbeeld door het bestand te importeren in 
de <strong>phpMyAdmin</strong> applicatie welke op de server van de meeste web 
hosts beschikbaar is.</p>",

"xpl_import_csv" =>
"<h4>CSV Importeer Instructies</h4>
<p>Dit formulier wordt gebruikt om <strong>Comma Separated Values (CSV)</strong> 
bestanden met activiteiten in de LuxCal kalender te importeren.</p>
<p>De volgorde van de kolommen in het CSV bestand moet zijn: titel, plaats, 
categorie id (zie hieronder), datum, einddatum, begintijd, eindtijd en 
omschrijving. De eerste rij van het CSV bestand, welke kan worden gebruikt voor 
de omschrijving van de kolommen, wordt genegeerd.</p>
<h5>Voorbeeld CSV bestanden</h5>
<p>Voorbeeld CSV bestanden kunt u vinden in de 'files/' map van de LuxCal 
download.</p>
<h5>Datum- en tijdformaat</h5>
<p>Het geselecteerde datum- en tijdformaat aan de linker zijde moet 
overeenstemmen met het datum- en tijdformaat in het ge-uploade CSV bestand.</p>
<h5>Categorieënlijst</h5>
<p>De kalender kent ID nummers toe aan categorieën. De categorie ID's in het CSV 
bestand moeten overeenkomen met de categorieën welke in de kalender worden 
gebruikt of moeten 'leeg' zijn.</p>
<p>Als je in de volgende stap activiteiten wilt markeren als 'verjaardag', dan 
moet de <strong>ID verjaardag categorie</strong> worden gelijk gemaakt met de 
corresponderende ID in categorieënlijst hieronder.</p>
<br>
<p>Voor de kalender zijn op dit moment de volgende categorieën gedefinieerd:</p>",

"xpl_import_ical" =>
"<h4>iCalendar Importeer Instructies</h4>
<p>Dit formulier wordt gebruikt om <strong>iCalendar</strong> activiteiten in 
de kalender te importeren.</p>
<p>De inhoud van het bestand moet voldoen aan de [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545 standaard</a></u>] van de Internet Engineering Task Force.</p>
<p>Alleen activiteiten zullen worden geïmporteerd; andere iCal onderdelen, zoals: 
To-Do, Journal, Free / Busy, Time zone en Alarm, worden genegeerd.</p>
<h5>Voorbeeld iCal bestanden</h5>
<p>Voorbeeld iCalendar bestanden (bestandstype .ics) kunnen in de 'files/' map 
van de LuxCal download worden gevonden.</p>
<h5>Categorieënlijst</h5>
<p>De kalender kent ID nummers toe aan categorieën. De categorie ID's in het 
iCal bestand moeten overeenkomen met de categorieën welke in de kalender worden 
gebruikt of moeten 'leeg' zijn.</p>
<br>
<p>Voor de kalender zijn op dit moment de volgende categorieën gedefinieerd:</p>",

"xpl_export_ical" =>
"<h4>iCalendar Exporteer Instructies</h4>
<p>Dit formulier wordt gebruikt om <strong>iCalendar</strong> activiteiten uit 
de kalender te exporteren.</p>
<p>De <b>iCal bestandsnaam</b> (zonder type) is optioneel. Geëxporteerde 
bestanden zullen worden opgeslagen in de \"files/\" map op de server met de 
opgegeven bestandsnaam, of anders met de naam \"luxcal\". Het bestandstype is  
<b>.ics</b>.
Bestaande bestanden in de \"files/\" map op de server met dezelfde naam zullen 
worden overschreven met het nieuwe bestand.</p>
<p>De <b>Beschrijving iCal bestand</b> (e.g. 'Vergaderingen 2012') is optioneel. 
Indien ingevuld zal het worden toegevoegd aan de 'header' in het geëxporteerde 
iCal bestand.</p>
<p><b>Activiteitenfilters</b>: De te exporteren activiteiten kunnen worden 
gefilterd op:</p>
<ul>
<li>eigenaar van activiteit</li>
<li>categorie van activiteit</li>
<li>begindatum van categorie</li>
<li>datum activiteit toegevoegd/laatst gewijzigd</li>
</ul>
<p>Elk filter is optioneel. Een leeg datumveld betekent: geen begrenzing</p>
<br>
<p>De inhoud van het bestand met geëxporteerde activiteiten voldoet aan de 
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 standaard</a></u>] 
van de Internet Engineering Task Force.</p>
<p>Wanneer het geëxporteerde iCal bestand wordt <b>ge-download</b>, zullen de 
datum en tijd worden toegevoegd aan de naam van het ge-downloade bestand.</p>
<h5>Voorbeeld iCal bestanden</h5>
<p><p>Voorbeeld iCal bestanden (bestandstype .ics) kunt u vinden in de 'files/' 
map van de LuxCal download.</p>"
);
?>
