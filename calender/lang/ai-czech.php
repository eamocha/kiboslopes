<?php
/*
= LuxCal event calendar admin interface language file =

This file has been produced by LuxSoft. Please send your comments to rb@luxsoft.eu.

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","2.7.2");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Žádný",
"back" => "Zpět",
"close" => "Zavřít",
"at_time" => 'v', //date and time separator (e.g. 11-09-2012 @ 10:45)

//settings.php - fieldset headers + general
"set_general_settings" => "Základní nastavení",
"set_opanel_settings" => "Nastavení panelu",
"set_user_settings" => "Uživatelské účty",
"set_minical_settings" => "Mini kalendář / Seznam nadcházejících událostí <br>(jen jsou-li použity) ",
"set_view_settings" => "Pohledy",
"set_dt_settings" => "Datum/čas",
"set_save_settings" => "Uložit nastavení",
"set_missing_invalid" => "Chybné nebo neplatné nastavení",
"set_settings_saved" => "Nastavení kalendáře uloženo",
"set_save_error" => "Chyba databáze - Nastavení kalendáře nelze uložit",
"hover_for_details" => "Po najetí myší na názvy nastavení se vám zobrazí krátká nápověda",
"enabled" => "povoleno",
"disabled" => "zakázáno",
"no" => "ne",
"yes" => "ano",
"or" => "nebo",
"minutes" => "minut",
"pixels" => "pixelů",
"no_way" => "Nejste oprávněni provádět tuto akci",

//settings.php - calendar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Název kalendáře",
"calendarTitle_text" => "Zobrazí se v záhlaví kalendáře a je použit v emailových připomínkách.",
"calendarUrl_label" => "URL kalendáře",
"calendarUrl_text" => "Webová stránka kalendáře.",
"calendarEmail_label" => "E-mail adresa kalendáře",
"calendarEmail_text" => "Adresa odesílatele použitá v emailových připomínkách.<br>Formát: \'email\' nebo \'jméno&#8249;email&#8250;\'. \'jméno\' by měl být název kalendáře.",
"timeZone_label" => "Časové pásmo",
"timeZone_text" => "Časové pásmo kalendáře se používá k určení aktuálního času.",
"see" => "viz",
"chgEmailList_label" => "Příjemce e-mailu se souhrnem změn",
"chgEmailList_text" => "Adresy pro periodické zasílání souhrnů změn v kalendáři.<br>Emailové adresy oddělené středníky.<br>(vyžaduje aktivní úlohu cronu)",
"chgNofDays_label" => "Počet dní, které se zahrnou do přehledů",
"chgNofDays_text" => "Počet dní, za které se zpětně zjišťují změny v kalendáři.<br>Pokud je počet nastaven na 0 souhrn se nebude zasílat.<br>(vyžaduje úlohu cronu)",
"notifSender_label" => "Odesílatel e-mailových připomínek",
"notifSender_text" => "Když kalendář odesílá připomínky, pole OD: obsahuje buďadresu kalendáře, nebo adresu uživatele, který vytvořil událost<br>Pokud je to aresa uživatele, příjemce může odpovědět na e-mail",
"cronSummary_label" => "Souhrn z cronu pro admina",
"cronSummary_text" => "Poslat souhrn úlohou cronu administrátorovi kalendáře.<br>Povolení je užitečné jen pokud:<br>- je aktivní úloha cronu",
"details4All_label" => "Zobrazovat podrobnosti o události všem uživatelům",
"details4All_text" => "Povoleno: podrobnosti o události budou viditelné pro vlastníka a všechny ostatní uživatele.<br>Zakázáno: podrobnosti o události uvidí jen vlastník události a uživatelé s právy \'vkládat a měnit všechny\'. Ostatní uživatelé s nižšími právy je neuvidí.",
"rssFeed_label" => "Odkazy RSS kanálu",
"rssFeed_text" => "Je-li povoleno: pro uživatele, kteří mají alespoň práva pro \'prohlížení\' bude zobrazen odkaz na RSS kanál v zápatí kalendáře a do HTML hlavičky stránky kalendáře bude přidán odkaz.",
"eventExp_label" => "Událost vyprší po dnech",
"eventExp_text" => "Počet dní po platnosti události, kdy bude automaticky smazána.<br>Je-li nastaveno na 0 nebo neběží cron, žádné události nebudou mazány.<br>(Vyžaduje aktivní cron)",
"cookieExp_label" => "Doba platnosti cookie 'Zapamatuj si mě' dnů",
"cookieExp_text" => "Počet dní po kterých skončí platnost cookie nastavené volbou \'Zapamatuj si mě\' (během přihlášení).",
"calendar" => "kalendář",
"user" => "uživatel",

//settings.php - options panel settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"userMenu_label" => "Filtr podle uživatelů",
"userMenu_text" => "Zobrazí menu filtru uživatelů v panelu Volby.<br>Filtr je uplatněn pouze pro zobrazování události",
"catMenu_label" => "Filtr podle kategorií",
"catMenu_text" => "Zobrazí filtr kategorií událostí v panelu Volby.<br>Filtr je uplatněn pouze pro zobrazování události",
"langMenu_label" => "Menu pro výběr jazyka",
"langMenu_text" => "Zobrazí menu pro výběr jazyka v menu Volby.<br>(má význam jen pokud je nainstalováno více jazyků)",
"defaultView_label" => "Výchozí pohled po startu",
"defaultView_text" => "Možné počáteční pohledy na kalendář jsou:<br>- Rok<br>- Měsíc<br>- Týden<br>- Den<br>- Blízké události<br>- Změny<br>Doporučené nastavení: Měsíc nebo Blízké události.",
"language_label" => "Výchozí jazyk uživatelského rozhraní",
"language_text" => "soubory ui-{language}.php, ai-{language}.php, ug-{language}.php a ug-layout.png musí být ve složce lang/ . {language} = vybraný jazyk rozhraní. Názvy souborů musí být malými písmeny!",

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Samoobslužná registrace",
"selfReg_text" => "Umožní uživatelům se sami zaregistrovat a získat přístup ke kalendáři.",
"selfRegPrivs_label" => "Oprávnění při samoobslužné reg.",
"selfRegPrivs_text" => "Přístupová práva ke kalendáři pro samoobslužně registrované uživatele.<br>- Prohlížet: jen prohlížení<br>- Jen vlastní: Vkládat události a editovat jen svoje<br>- Všechny: Vkládat a editovat svoje i cizí události",
"selfRegNot_label" => "Oznámení samoobslužné registrace",
"selfRegNot_text" => "Odeslat oznámovací e-mail na adresu administrátora kalendáře, když proběhne samoobslužná registrace.",
"view" => "prohlížet",
"post_own" => 'jen vlastní',
"post_all" => 'všechny',
"maxNoLogin_label" => "Max. počet dní bez přihlášení",
"maxNoLogin_text" => "Pokud se uživatel nepřihlásí po tuto dobu, jeho účet bude automaticky smazán.<br>Je-li nastaveno na 0, uživatelské účty ne nikdy nesmažou.<br>(vyžaduje úlohu cronu)",

//settings.php - mini calendar / upcoming events list settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"miniCalView_label" => "Zobrazení mini kalendáře",
"miniCalView_text" => "Možné volby zobrazení kalendáře jsou:<br>- Měsíc<br>- Měsíc - jen pracovní dny *)<br>- Týden<br>- Pracovní týden *)<br>*) Pro nastavení pracovních dní viz volbu na této stránce - Pracovní dny",
"miniCalPost_label" => "Vkládat události přes mini kalendář",
"miniCalPost_text" => "Pouze v případě že používáte mini kalendář!<br>Je-li povoleno uživatelé mohou:<br>- přidat novou událost v mini kalendáři kliknutím na horní lištu buňky dne<br>- editovat / mazat události kliknutím na jejich čtvereček",
"miniCalHBox_label" => "Plovoucí okno s detaily události v minikalendáři",
"miniCalHBox_text" => "Pokud je povoleno, v minikalendáři se při najetí na událost zobrazí okno s detaily",
"sideBarHBox_label" => "Nadcházející události - plovoucí okno s detaily události",
"sideBarHBox_text" => "Pokud je povoleno, v seznamu nadcházejících událostí se při najetí na událost zobrazí okno s detaily",
"showLinkInSB_label" => "Zobrazovat odkazy v měsíčním pohledu",
"showLinkInSB_text" => "Zobrazí URL z popisu události jako hyperlink v seznamu nadcházejících událostí",
"sideBarDays_label" => "Počet dní v seznamu nadcházejících událostí",
"sideBarDays_text" => "Počet nadcházejících dní, které se zahrnují do přehledu chystaných událostí.",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Počáteční měsíc v ročním pohledu",
"yearStart_text" => "Pokud zadáte počáteční měsíc (1 - 12), roční pohled bude vždy začínat tímto měsícem i při listování mezi roky.<br>Hodnota 0 nemá zvláštní význam: výchozí měsíc potom závisí na aktuálním datu a zobrazí se v prvním řádku tabulky.",
"colsToShow_label" => "Počet sloupců v ročním pohledu",
"colsToShow_text" => "Počet měsíců, které se zobrazí v jednom řádku u Ročního pohledu.<br>Doporučená hodnota: 3 nebo 4.",
"rowsToShow_label" => "Počet řádků v ročním pohledu",
"rowsToShow_text" => "Počet řádků, každý obsahující 4 měsíce, které se budou zobrazovat v Ročním pohledu.<br>Doporučeno: 4, což zobrazí 16 měsíců na stránku.",
"weeksToShow_label" => "Počet týdnů v měsíčním pohledu",
"weeksToShow_text" => "Počet týdnů, které se zobrazí v Měsíčním pohledu.<br>doporučená hodnota: 10, což zobrazí 2,5 měsíce na stránku.<br>Hodnota 0 nemá zvláštní význam: zobrazí se právě 1 měsíc.",
"workWeekDays_label" => "Pracovní dny",
"workWeekDays_text" => "Dny, které se budou zobrazovat v přehledu pracovního týdne a měsíce.<br>Zadejte číselně všechny dny, které se mají zobrazit. Platná čísla dnů jsou:<br>1 = pondělí<br>2 = úterý<br>....<br>7 = neděle<br>příklad: 12345 : pondělí - pátek",
"lookaheadDays_label" => "Nadcházejících dní v přehledu",
"lookaheadDays_text" => "Počet dní, které budou zahrnuty do přehledu nadcházejících události, seznamu úkolů a RSS kanálu.",
"dwStartHour_label" => "Počáteční hodina v denním/týdenním pohledu",
"dwStartHour_text" => "Hodina, kdy obvykle začínají první události.<br>Nastavením hodnoty např na 6, zabráníte zbytečnému zobrazování prázdného místa v denním/týdenním pohledu mezi půlnocí a 6:00.",
"dwEndHour_label" => "Koncová hodina v denním/týdenním pohledu",
"dwEndHour_text" => "Hodina, kdy obvykle končí události.<br>Např. po nastavení hodnoty na 18 zabrání zbytečnému zobrazování prázdného místa v týdenním/denním pohledu pro nevyužité období od 18 hod do půlnoci.",
"dwTimeSlot_label" => "Rozlišení v Denním/Týdenním pohledu",
"dwTimeSlot_text" => "Časové měřítko v denním/týdenním pohledu v minutách.<br>Tato hodnota, společně s Počáteční hodinou (viz předchozí položka) určuje počet řádků v denním/týdenním pohledu.",
"dwTsHeight_label" => "Výška pole v kalendáři",
"dwTsHeight_text" => "Výška mřížky denního/týdenního pohledu v pixelech.",
"eventHBox_label" => "Plovoucí okno s detaily události",
"eventHBox_text" => "Pokud je povoleno, objeví se pri najetí na událost plovoucí okno s detaily. <br>Funguje nad čtverečkem události v ročním pohledu, nebo nad titulkem události v měsíčním, týdenním nebo denním pohledu.",
"showAdEd_label" => "Zobrazit datum vložení/změny události",
"showAdEd_text" => "Zobrazí datum, kdy byla událost vložena/změněna a uživatele, který to provedl:<br>- v bublině u pohledů do kalendáře<br>- v přehledu blízkých událostí<br>- v seznamu změn<br>- v RSS kanále<br>- v e-mailových připomínkách.",
"showCatName_label" => "Zobrazit název kategorie",
"showCatName_text" => "Pokud je povoleno, zobrazuje se v pohledech do kalendáře vedle barvy kategorie také její název.",
"showLinkInMV_label" => "Zobrazit odkazy v měsíčním pohledu",
"showLinkInMV_text" => "Pokud je zapnuto, URL z popisu události se zobrazí jako aktivní odkaz v měsíčním pohledu",
"eventColor_label" => "Barva událostií se řídí podle",
"eventColor_text" => "Události v pohledech do kalendáře mohou mít přiřazenu barvu podle vlastníka, nebo kategorie, do které jsou zařazeny",
"owner_color" => "Barvy vlastníka",
"cat_color" => "Barvy kategorie",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Formát data události (dd mm yyyy)",
"dateFormat_text" => "Textový řetězec, který určuje formát data událostí v pohledech kalendáře a vstuoních polích.<br>Povolené znaky: y = rok, m = měsíc a d = den.<br>Ne-alfanumerické znaky mohou být použity jako oddělovače a budou zobrazeny jak jsou.<br>Příklad: <br>y-m-d: 2012-10-31<br>m.d.y: 10.31.2012<br>d/m/y: 31/10/2012",
"dateFormat_expl" => "např. y.m.d: 2012.10.31",
"MdFormat_label" => "Formát data (dd měsíc)",
"MdFormat_text" => "Textový řetězec určující formát data obsahujícího den a měsíc.<br>Povolené znaky: M = název měsíce, d = den čísly.<br>Ne-alfanumerické znaky mohou být použity jako oddělovače a budou zobrazeny jak jsou.<br>Příklad: <br>d M: 12 duben<br>M, d: červenec, 14",
"MdFormat_expl" => "např. M, d: červenec, 14",
"MdyFormat_label" => "Formát data (dd měsíc yyyy)",
"MdyFormat_text" => "Textový řetězec určující formát data obsahujícího den, měsíc a rok.<br>Povolené znaky: d = den čísly, M = název měsíce, y = rok čísly.<br>Ne-alfanumerické znaky mohou být použity jako oddělovače a budou zobrazeny jak jsou.<br>Příklad:<br>d. M y: 12. duben 2012<br>M d, y: červenec 8, 2012",
"MdyFormat_expl" => "např. M d, y: červenec 8, 2012",
"MyFormat_label" => "Formát data (měsíc yyyy)",
"MyFormat_text" => "Textový řetězec určující formát data obsahujícíhoměsíc a rok.<br>Povolené znaky: M = název měsíce, y = rok čísly.<br>Ne-alfanumerické znaky mohou být použity jako oddělovače a budou zobrazeny jak jsou.<br>Příklad: <br>M y: duben 2012<br>y - M: 2012 - červenec",
"MyFormat_expl" => "např. M y: April 2012",
"DMdFormat_label" => "Formát data (den-v-týdnu dd měsíc)",
"DMdFormat_text" => "Textový řetězec určující formát data obsahujícího den v týdnu, den a měsíc.<br>Povolené znaky: WD = den v týdnu slovy, d = den, M = název měsíce.<br>Ne-alfanumerické znaky mohou být použity jako oddělovače a budou zobrazeny jak jsou.<br>Příklad: <br>WD d. M: pátek 12. duben<br>WD, M d: pondělí, červenec 14",
"DMdFormat_expl" => "např. WD - M d: neděle - duben 6",
"DMdyFormat_label" => "Formát data (den-v-týdnu dd měsíc yyyy)",
"DMdyFormat_text" => "Textový řetězec určující formát data obsahujícího den v týdnu, den, měsíc a rok.<br>Povolené znaky: WD = den v týdnu slovy, M = název měsíce, d = den, y = rok.<br>Ne-alfanumerické znaky mohou být použity jako oddělovače a budou zobrazeny jak jsou.<br>Příklad:<br>WD d M y: Friday 13 April 2012<br>WD - M d, y: Monday - July 16, 2012",
"DMdyFormat_expl" => "např. WD, M d, y: pondělí, červenec 16, 2012",
"timeFormat_label" => "Formát času (hh mm)",
"timeFormat_text" => "Textový řetězec určující formát času událostí v pohledech kalendáře a vstupních polích.<br>Povolené znaky: h = hodiny, m = minuty, a = am/pm (volitelné), A = AM/PM (volitelné).<br>Ne-alfanumerické znaky mohou být použity jako oddělovače a budou zobrazeny jak jsou.<br>Příklad:<br>h:m: 22:35<br>h.m a: 10.35 pm<br>h:mA: 10:35PM",
"timeFormat_expl" => "např. h:m: 22:35 a h:mA: 10:35PM",
"weekStart_label" => "První den týdne",
"weekStart_text" => "Týden může začít v neděli nebo v pondělí.",
"weekNumber_label" => "Zobrazovat čísla týdnů",
"weekNumber_text" => "Zapíná zobrazování čísla týdne v ročním, měsíčním a týdenním pohledu",
"time_format_us" => "12-hod AM/PM",
"time_format_eu" => "24-hod",
"sunday" => "neděle",
"monday" => "pondělí",
"time_zones" => "Časová pásma",
"dd_mm_yyyy" => "dd-mm-yyyy",
"mm_dd_yyyy" => "mm-dd-yyyy",
"yyyy_mm_dd" => "yyyy-mm-dd",

//login.php
"log_log_in" => "Přihlásit",
"log_remember_me" => "Pamatuj si mě",
"log_register" => "Registrovat",
"log_change_my_data" => "Změnit moje údaje",
"log_change" => "Změnit",
"log_un_or_em" => "Uživatelské jméno nebo e-mail",
"log_un" => "Jméno",
"log_em" => "E-mail",
"log_pw" => "Heslo",
"log_new_un" => "Nové Jméno",
"log_new_em" => "Nový e-mail",
"log_new_pw" => "Nové heslo",
"log_pw_msg" => "Zde je vaše heslo pro přihlášení do",
"log_pw_subject_pre" => "Vaše",
"log_pw_subject_post" => "heslo",
"log_npw_msg" => "Zde je vaše nové heslo pro přihlášení do",
"log_npw_subject_pre" => "Vaše nové",
"log_npw_subject_post" => "heslo",
"log_npw_sent" => "Vaše nové heslo bylo odesláno",
"log_registered" => "Registrace úspěšná - Vaše heslo bylo odesláno e-mailem",
"log_not_registered" => "Registrace nebyla úspěšná",
"log_un_exists" => "Uživatelské jméno již existuje",
"log_em_exists" => "E-mailová adresa již existuje",
"log_un_invalid" => "Chybné jméno (min. délka 2: A-Z, a-z, 0-9, a _-.) ",
"log_em_invalid" => "Chybná emailová adresa",
"log_un_em_invalid" => "Uživatelské jméno/e-mail není platný",
"log_un_em_pw_invalid" => "Uživatelské jméno/e-mail nebo heslo je chybné",
"log_no_un_em" => "Prosím zadejte vaše uživatelské jméno/e-mail",
"log_no_un" => "Zadejte uživatelské jméno",
"log_no_em" => "Zadejte vaši e-mailovou adresu",
"log_no_pw" => "Zadejte heslo",
"log_no_rights" => "Přihlášení odepřeno: nemáte právo k prohlížení - kontaktujte administrátora",
"log_send_new_pw" => "Zaslat nové heslo",
"log_if_changing" => "Pouze při změně",
"log_no_new_data" => "Údaje se nezměnily",
"log_invalid_new_un" => "Chybné nové uživatelské jméno (min. délka 2: A-Z, a-z, 0-9, a _-.) ",
"log_new_un_exists" => "Nové jméno již existuje",
"log_invalid_new_em" => "Nová e-mailová adresa je neplatná",
"log_new_em_exists" => "Nová e-mailová adresa již existuje",
"log_ui_language" => "Jazyk uživatelského rozhraní",
"log_new_reg" => "Registrace nového uživatele",
"log_date_time" => "Datum / čas",
"log_reload_retry" => "Čas vypršel. Prosím zavřete okno, znovu načtěte kalendář a zkuste to znovu.",

//categories.php
"cat_list" => "Seznam kategorií",
"cat_edit" => "Změnit",
"cat_delete" => "Smazat",
"cat_add_new" => "Přidat novou kategorii",
"cat_add" => "Přidat",
"cat_edit_cat" => "Změnit kategorii",
"cat_name" => "Název kategorie",
"cat_sequence" => "Pořadí",
"cat_in_menu" => "v menu",
"cat_text_color" => "Barva textu",
"cat_background" => "Barva pozadí",
"cat_select_color" => "Vyberte barvu",
"cat_save" => "Uložit",
"cat_added" => "Kategorie uložena",
"cat_updated" => "Kategorie upravena",
"cat_deleted" => "Kategorie smazána",
"cat_invalid_color" => "Chybný formát barvy (#XXXXXX - X = HEX-hodnota)",
"cat_not_added" => "Kategorie nebyla přidána",
"cat_not_updated" => "Kategorie nebyla změněna",
"cat_not_deleted" => "Kategorie nebyla smazána",
"cat_nr" => "č",
"cat_repeat" => "Opakování",
"cat_every_day" => "denně",
"cat_every_week" => "týdně",
"cat_every_month" => "měsíčně",
"cat_every_year" => "ročně",
"cat_public" => "Veřejné",
"cat_check_mark" => "Značka",
"cat_label" => "štítek",
"cat_mark" => "značka",

//users.php
"usr_list_of_users" => "Seznam uživatelů",
"usr_name" => "Jméno",
"usr_email" => "E-mail",
"usr_password" => "Heslo",
"usr_rights" => "Oprávnění",
"usr_language" => "Jazyk",
"usr_ui_language" => "Jazyk rozhraní",
"usr_edit_user" => "Změnit uživatelský profil",
"usr_add" => "Přidat uživatele",
"usr_edit" => "Změnit",
"usr_delete" => "Smazat",
"usr_view" => "Prohlížení",
"usr_post_own" => "Jen vlastní",
"usr_post_all" => "Všechny",
"usr_admin" => "Administrace",
"usr_login_0" => "První přihlášení",
"usr_login_1" => "Poslední přihlášení",
"usr_login_cnt" => "Přihlášení",
"usr_add_profile" => "Přidat profil",
"usr_upd_profile" => "Upravit profil",
"usr_not_found" => "Uživatel nenalezen",
"usr_if_changing_pw" => "Pouze při změně hesla",
"usr_admin_functions" => "Administrátorský přístup",
"usr_no_rights" => "Bez práva přístupu",
"usr_view_calendar" => "Prohlížet kalendář",
"usr_post_events_own" => "Vkládat a měnit vlastní",
"usr_post_events_all" => "Vkládat a měnit všechny",
"usr_pw_not_updated" => "Heslo nebylo změněno",
"usr_added" => "Uživatel byl přidán",
"usr_updated" => "Uživatelský profil byl aktualizován",
"usr_deleted" => "Uživatel smazán",
"usr_not_added" => "Uživatel nebyl přidán",
"usr_not_updated" => "Uživatel nebyl aktualizován",
"usr_not_deleted" => "Uživatel nebyl smazán",
"usr_cred_required" => "Musíte zadat uživatelské jméno, e-mail a heslo",
"usr_uname_exists" => "Uživatelské jméno již existuje",
"usr_email_exists" => "E-mailová adresa již existuje",
"usr_un_invalid" => "Chybné uživatelské jméno (min. délka 2: A-Z, a-z, 0-9, a _-.) ",
"usr_em_invalid" => "Chybná e-mailová adresa",
"usr_cant_delete_yourself" => "Nemůžete se sami smazat",
"usr_background" => "Barva pozadí",
"usr_select_color" => "Zvolte barvu",
"usr_invalid_color" => "Chybný formát barvy (#XXXXXX - X = HEX-hodnota)",

//database.php
"mdb_dbm_functions" => "Databázové funkce",
"mdb_noshow_tables" => "Nelze získat tabulku(y)",
"mdb_compact" => "Komprimace databáze",
"mdb_compact_table" => "komprimace tabulky",
"mdb_compact_error" => "Chyba",
"mdb_compact_done" => "Hotovo",
"mdb_purge_done" => "Smazané události byly odstraněny",
"mdb_repair" => "Kontrola a oprava databáze",
"mdb_check_table" => "Kontrola tabulky",
"mdb_ok" => "OK",
"mdb_nok" => "Neproběhlo OK",
"mdb_nok_repair" => "Není OK, započata oprava",
"mdb_backup" => "Zálohování databáze",
"mdb_backup_table" => "Zálohování tabulky",
"mdb_backup_done" => "Hotovo",
"mdb_file_saved" => "Záložní soubor uložen na server.",
"mdb_file_name" => "Název souboru:",
"mdb_start" => "Start",
"mdb_no_function_checked" => "Nebyla vybrána žádná funkce",
"mdb_write_error" => "Ukládání zálohy selhalo<br>zkontrolujte práva u adresáře 'files/'",

//import/export.php
"iex_file" => "Vybraný soubor",
"iex_file_name" => "Název iCal souboru",
"iex_file_description" => "Popis iCal souboru",
"iex_filters" => "Filtry událostí",
"iex_upload_ics" => "Nahrát iCal soubor",
"iex_create_ics" => "Vytvořit iCal soubor",
"iex_upload_csv" => "Nahrát CSV soubor",
"iex_upload_file" => "Nahrát soubor",
"iex_create_file" => "Vytvořit soubor",
"iex_download_file" => "Uložit soubor",
"iex_fields_sep_by" => "Pole oddělena",
"iex_birthday_cat_id" => "ID kategorie narozenin",
"iex_default_cat_id" => "ID výchozí kategorie",
"iex_if_no_cat" => "pokud není nalezena žádná kategorie",
"iex_import_events_from_date" => "Importovat události konané od",
"iex_see_insert" => "viz vysvětlivky vpravo",
"iex_no_file_name" => "Chybí název souboru",
"iex_inval_field_sep" => "Chybný nebo chybějící oddělovač polí",
"iex_no_begin_tag" => "chybný iCal soubor (chybí značka BEGIN)",
"iex_date_format" => "Formát data události",
"iex_time_format" => "Formát času události",
"iex_number_of_errors" => "Počet chyb v seznamu",
"iex_bgnd_highlighted" => "pozadí zvýrazněno",
"iex_verify_event_list" => "Prověřte seznam událostí, opravte chyby a klikněte na",
"iex_add_events" => "Přidat události do databáze",
"iex_select_birthday_delete" => "Zaškrtněte políčka Narozeniny a Smazat jak je potřeba",
"iex_select_delete_ignore" => "Zaškrtněte políčko Smazat pro přeskočení události",
"iex_title" => "Název",
"iex_venue" => "Místo",
"iex_owner" => "Vlastník",
"iex_category" => "Kategorie",
"iex_date" => "Datum",
"iex_end_date" => "Začátek",
"iex_start_time" => "Čas od",
"iex_end_time" => "Čas do",
"iex_description" => "Popis",
"iex_birthday" => "Narozeniny",
"iex_delete" => "Smazat",
"iex_events_added" => "události přidány",
"iex_events_dropped" => "události nebyly přidány (již uloženy)",
"iex_db_error" => "Chyba databáze",
"iex_ics_file_error_on_line" => "Chyba iCal souboru na řádku",
"iex_occurring_between" => "Datum konání mezi",
"iex_changed_between" => "Přidáno/změněno mezi",
"iex_select_date" => "Zvolte datum",
"iex_select_start_date" => "Zvolte počáteční datum",
"iex_select_end_date" => "Zvolte koncové datum",
"iex_all_cats" => "všechny kategorie",
"iex_all_users" => "všichni uživatelé",
"iex_no_events_found" => "Žádná událost nenalezena",
"iex_file_created" => "Soubor byl vytvořen",
"iex_write error" => "Ukládání souboru selhalo<br>Zkontrolujte práva u adresáře 'files/'",

//lcalcron.php
"cro_sum_header" => "SOUHRN ÚLOH CRONU",
"cro_sum_trailer" => "KONEC SOUHRNU",

//eventchk.php
"evc_sum_title" => "EVENTS EXPIRED",
"evc_nr_deleted" => "Number of events deleted",

//notify.php
"not_sum_title" => "EMAILOVÉ PŘIPOMÍNKY",
"not_not_sent_to" => "Připomínky odeslány na",
"not_no_not_dates_due" => "Žádná oznámení o chystaných událostech",
"not_all_day" => "Celý den",
"not_mailer" => "zasílání připomínek",
"not_subject" => "Předmět",
"not_event_due_in" => "Nadcházející události pro příštích",
"not_due_in" => "Událost nastane za",
"not_days" => "dní",
"not_date_time" => "Datum / čas",
"not_title" => "Název",
"not_sender" => "Odesílatel",
"not_venue" => "Místo",
"not_description" => "Popis",
"not_category" => "Kategorie",
"not_status" => "Status",
"not_open_calendar" => "Otevřít kalendář",

//sendchg.php
"sch_sum_title" => "ZMĚNY KALENDÁŘE",
"sch_nr_changes_last" => "Počet změn za posledních",
"sch_report_sent_to" => "Oznámení odesláno na",
"sch_no_report_sent" => "Nebylo odesláno oznámení",
"sch_days" => "dní",

//userchk.php
"usc_sum_title" => "KONTROLA UŽIVATELSKÝCH ÚČTŮ",
"usc_nr_accounts_deleted" => "Počet smazaných účtů",
"usc_no_accounts_deleted" => "Žádný účet nebyl smazán",

//explanations
"xpl_manage_db" =>
"<h4>Správa databáze, instrukce</h4>
<p>Na této stránce lze provádět následující činnosti:</p>
<h5>Kontrola a oprava databáze</h5>
<p>Tato funkce prověří tabulky kalendáře a vyhledá chyby. Pokud je nějaká chyba
nalezena, pokusí se ji opravit.</p>
<p>Nedochází-li k chybám při zobrazování kalendáře, postačí funkci spustit 
jednou za rok.</p>
<h5>Komprimace databáze</h5>
<p>Po smazání události je tato pouze označena jako smazaná, ale zůstává nadále v 
databázi. Komprese databáze trvale odstraní události smazané před více jak 30ti 
dny z databáze a uvolní místo, které zabírají.</p>
<h5>Záloha databáze</h5>
<p>Funkce vytvoří zálohu celé databáze kalendáře (tabulky, strukturu a obsah)
v .sql formátu. Záložní soubor se uloží do adresáře <strong>files/</strong> 
a je pojmenován v následujícím tvaru: 
<kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (kde 'yyyymmdd' = rok, měsíc a den, 
a hhmmss = hodina, minuta a sekunda.</p>
<p>Zálohu lze použít k obnově datových tabulek a struktury databáze např. pro 
import pomocí nástroje <strong>phpMyAdmin</strong>, který je dostupný na většině 
hostingů.</p>",

"xpl_import_csv" =>
"<h4>Instrukce pro CSV import</h4>
<p>Tento formulář se používá pro import textových souborů <strong>Comma Separated Values 
(CSV)</strong> s údaji o událostech do LuxCal kalendáře.</p>
<p>Pořadí sloupců ve vstupním CSV souboru musí být následující: název, místo, id kategorie
(viz dále), datum, koncové datum, počáteční čas, koncový čas, popis. První řádek
CSV souboru s názvy sloupců je při importu ignorován.</p>
<h5>Ukázkové CSV soubory</h5>
<p>Vzorové CSV soubory (s příponou .cvs) jsou uloženy v adresáři 'files/' v instalačním 
balíku.</p>
<h5>Formáty data a času</h5>
<p>Zvolený formát data a času událostí musí odpovídat formátu použitému ve vstupním 
CSV souboru.</p>
<h5>Tabulka kategorií</h5>
<p>Kalendář používá k identifikaci jednotlivých kategorií ID čísla. Tato čísla určující 
kategorie v CSV souboru a následující tabulce si musí odpovídat, nebo musí být v CSV 
vynechána.</p>
<p>Pokud chcete v následující kroku označit události jako 'narozeniny', pak musíte také
nastavit <strong>ID kategorie Narozeniny</strong> na odpovídající ID kategorie níže.</p>
<br>
<p>Ve vašem kalendáři jsou definovány tyto kategorie:</p>",

"xpl_import_ical" =>
"<h4>Instrukce pro import iCalendar</h4>
<p>Tento formulář slouží pro import souborů <strong>iCalendar</strong> s událostmi
do kalendáře LuxCal.</p>
<p>Formát souboru musí odpovídat [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>standardu RFC5545 </a></u>] Internet Engineering Task Force.</p>
<p>Budou importovány pouze události. Ostatní části iCal souboru, jako jsou úkoly,
žurnál, alarmy, informace o volném čase, budou při importu ignorovány.</p>
<h5>Ukázkové iCal soubory</h5>
<p>Vzorové soubory iCalendar (s příponou .ics) jsou uloženy v adresáři 'files/' 
v instalačním balíku LuxCal.</p>
<h5>Tabulka kategorií</h5>
<p>Kalendář používá k označení kategorií ID čísla. Tato čísla určující 
kategorie v iCal souboru musí odpovídat číslům použitým v kalendáři, nebo musí být v iCal
vynechána.</p>
<br>
<p>Ve vašem kalendáři jsou definovány tyto kategorie:</p>",

"xpl_export_ical" =>
"<h4>Instrukce pro export iCalendar</h4>
<p>Tento formulář slouží pro export událostí <strong>iCalendar</strong> z LuxCal kalendáře.</p>
<p>Jméno <b>iCal souboru</b> (bez přípony) je volitelné. Takto pojmenované soubory s jsou 
ukládány do adresáře \"files/\" na serveru. Pokud jméno nezadáte, bude pojmenován
 \"luxcal\". Přípona souboru bude <b>.ics</b>.
Existující soubory v adresáři \"files/\" na serveru se stejným jménem budou přepsány
novým obsahem.
<p> <b>Popis iCal souboru</b> (např. 'Schůzky 2011') je nepovinný. Pokud ho zadáte,
bude vložen do hlavičky exportovaného iCal souboru.</p>
<p><b>filtry událostí</b>: Ukládané události mohou být filtrovány podle:</p>
<ul>
<li>vlastníka události</li>
<li>kategorie události</li>
<li>data začátku</li>
<li>data vložení/poslední změny události</li>
</ul>
<p>Filtry jsou nepovinné, prázdné pole data znamená bez omezení.</p>
<br>
<p>Obsah vytvořeného souboru splňuje 
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>standard RFC5545</a></u>] 
Internet Engineering Task Force.</p>
<p>Při <b>stahování</b> exportovaného iCal souboru, bude k jeho názvu přidáno datum a čas.</p>
<h5>Ukázkové iCal soubory</h5>
<p>Vzorové soubory iCalendar (s příponou .ics) jsou uloženy v adresáři 'files/' 
v instalačním balíku LuxCal.</p>"
);
?>
