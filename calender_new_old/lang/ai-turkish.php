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
"none" => "None.",
"back" => "Geri",
"close" => "Close",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//settings.php - fieldset headers
"set_general_settings" => "Genel Ayarlar",
"set_opanel_settings" => "Options Panel",
"set_user_settings" => "Kullanıcı Hesapları",
"set_minical_settings" => "Mini Calendar / Upcoming Events Sidebar (only relevant if used)",
"set_view_settings" => "Görünüm",
"set_dt_settings" => "Tarih/Zaman",
"set_save_settings" => "Ayarları Kaydet",
"set_missing_invalid" => "missing or invalid settings (background highlighted)",
"set_settings_saved" => "Ayarlar kaydedildi",
"set_save_error" => "Database error - Saving calendar settings failed",
"hover_for_details" => "Ayrıntılı bilgil açıklamaları",
"enabled" => "Açık",
"disabled" => "Kapalı",
"no" => "hayır",
"yes" => "evet",
"or" => "veya",
"minutes" => "minutes",
"pixels" => "pixels",
"no_way" => "You are not authorized to perform this action",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Ajanda Başlığı",
"calendarTitle_text" => "Ajandanın üst tarafında ki kısımda eposta hatırlatmalarını göster.",
"calendarUrl_label" => "Ajanda URL",
"calendarUrl_text" => "Ajandanın websitesi.",
"calendarEmail_label" => "Ajanda Maili",
"calendarEmail_text" => "The sender\'s email address used in notification emails.<br>Format: \'email\' or \'name&#8249;email&#8250;\'. \'name\' could be the calendar name.",
"timeZone_label" => "Zaman Dilimi",
"timeZone_text" => "The calendar\'s time zone, used to calculate the current time.",
"see" => "Bak",
"chgEmailList_label" => "Değişiklikler için kullanılacak Eposta",
"chgEmailList_text" => "Herhangi bir değişiklikte size haber verilmesi için gerekli eposta.<br>Eposta adreslerini virgün ile ayırabilirsiniz.<br>(Cron ayarlamak gereklidir.)",
"chgNofDays_label" => "Kaç gün önce haber verilsin.",
"chgNofDays_text" => "Number of days to look back for the summary of calendar changes.<br>If the number of days is set to 0 no summary of changes will be sent.<br>(requires a cron job)",
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
"langMenu_label" => "Dil Seçimi",
"langMenu_text" => "Display language selection menu in the options panel.<br>This menu can be used to select the user interface language.<br>(enabling only useful if several languages are installed)",
"defaultView_label" => "Başlangıçtaki Görünüm Şekli",
"defaultView_text" => "Possible default views on calendar start-up are:<br>- YIL<br>- AY<br>- HAFTA<br>- GÜN<br>- Gelecek Randevular<br>- Değişiklikler<br>Önerilen: Ay veya Gelecek Randevu görünümü",
"language_label" => "Öntanımlı Kullanıcı Dilleri",
"language_text" => "The files ui-{language}.php, ai-{language}.php, ug-{language}.php and ug-layout.png must be present in the lang/ directory. {language} = selected user interface language. File names must be lower case!",

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Herkes üye olabilir.",
"selfReg_text" => "Ajandaya herkes üye olabilir, düzenleme yapabilir.",
"selfRegPrivs_label" => "Genel Kullanıcı Kaydı Hakları",
"selfRegPrivs_text" => "Calendar access rights for self registered users.<br>- view: view only<br>- post-self: post events and edit own events<br>- post-all: post events and edit own and other\'s events",
"selfRegNot_label" => "Self registration notification",
"selfRegNot_text" => "Send a notification email to the calendar email address when a self-registation takes place.",
"view" => "Görünüm",
"post_own" => 'Kendi Mesajları',
"post_all" => 'Tüm Mesajlar',
"maxNoLogin_label" => "Mks. Giriş yapılmayan gün sayısı",
"maxNoLogin_text" => "Eğer kullanıcı burada belirtilen kadar gün sisteme giriş yapmadığı takdirde yazılan gün geçtiğinde kullanıcı silinecektir.",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"miniCalView_label" => "Mini calendar view",
"miniCalView_text" => "Possible views for the mini calendar are:<br>- Full Month<br>- Work Month *)<br>- Full Week<br>- Work Week *)<br>*) For work week days see on this page: Views - Work week days",
"miniCalPost_label" => "Ajanda üzerinden olay ekleme",
"miniCalPost_text" => "Sadece ilgili mini takvim kullanılır.<br>Eğer kullanıcı etkin ise:<br>- Kullanıcı olay ekliyeceği günü oluşturan karenin üst tarafına tıklayakarak ekleme ve çıkarma yapabilir.",
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
"colsToShow_label" => "Yıl görünümünde ki kolon sayısı",
"colsToShow_text" => "Yıl görünümünde kaç tane kolon olacak.<br>Önerilen: 3 ve 4.",
"rowsToShow_label" => "Yıl Görünümündeki Satır Sayısı",
"rowsToShow_text" => "Yıl Görünümünde kaç satır olacak<br>Önerilen: 4, 4 yapılırsa 16 ayı görüntülenebilir.",
"weeksToShow_label" => "Aylık görünümde kaç hafta gösterilsin",
"weeksToShow_text" => "Aylık görünümde kaç haftanın görüneceğini belirtin.<br>Önerilen: 10, Böylelikle 2,5 aylık bir görünümü elde edebilirsiniz. <br>Eğer 0 girilirse sadece 1 ay gösterilir.",
"workWeekDays_label" => "Work week days",
"workWeekDays_text" => "Days to be shown in each week in Work Month view and Work Week view.<br>Enter the number of each day that should be visible. Valid day numbers:<br>1 = Monday<br>2 = Tuesday<br>....<br>7 = Sunday<br>e.g. 12345 : Monday - Friday",
"lookaheadDays_label" => "Gelecek kaç Günlük Gösterilsin",
"lookaheadDays_text" => "Gelecek randevularının kaç günlük gösterileceğini giriniz.",
"dwStartHour_label" => "Mesai Başlangıçı",
"dwStartHour_text" => "Burayı yazağınız saatten gece yarısına kadar saat dilimlerini gösterir.<br>Örnek 7 yazılırsa sabah 7 ile gece 12 arası saatleri aktif olur..",
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
"showCatName_label" => "Kategorileri Göster",
"showCatName_text" => "If switched on, in various views, apart from displaying the event description in the event category color, the category name will also be displayed.",
"showLinkInMV_label" => "Aylık görünümde linkleri göster",
"showLinkInMV_text" => "If switched on, URLs in the event description will be displayed as hyperlink in month view",
"eventColor_label" => "Event colors based on",
"eventColor_text" => "Events in the various calendar views can be displayed in the color assigned to the user who created the event or the color of the event category.",
"owner_color" => "owner color",
"cat_color" => "category color",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Tarih Formatı (dd mm yyyy)",
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
"weekStart_label" => "Haftanın İlk Günü",
"weekStart_text" => "Bazı ülkelerde hafta Pazar günü başlar.",
"weekNumber_label" => "Haftanın numaralarını göster",
"weekNumber_text" => "The display of week numbers in Year, Month and Week view can be enabled/disabled",
"time_format_us" => "12-saat AM/PM",
"time_format_eu" => "24-saat",
"sunday" => "Pazar",
"monday" => "Pazartesi",
"time_zones" => "ZAMAN DİLİMİ",
"dd_mm_yyyy" => "dd-mm-yyyy",
"mm_dd_yyyy" => "mm-dd-yyyy",
"yyyy_mm_dd" => "yyyy-mm-dd",

//login.php
"log_log_in" => "Sisteme Giriş",
"log_remember_me" => "Remember me",
"log_register" => "Kayıt Ol",
"log_change_my_data" => "Bilgilerimi Değiştir",
"log_change" => "Değiştir",
"log_un_or_em" => "Kullanıcı Adı/Eposta",
"log_un" => "Kullanıcı Adı",
"log_em" => "Email",
"log_pw" => "Parola",
"log_new_un" => "Yeni K. Adı",
"log_new_em" => "Yeni Email",
"log_new_pw" => "Yeni Parola ",
"log_pw_msg" => "Here is your password to log in to",
"log_pw_subject_pre" => "Sizin",
"log_pw_subject_post" => "Parola",
"log_npw_msg" => "Here is your new password to log in to",
"log_npw_subject_pre" => "Sizin Yeni",
"log_npw_subject_post" => "Parola",
"log_npw_sent" => "Parolanız gönderildi",
"log_registered" => "Registration successful - Your password has been sent by email",
"log_not_registered" => "Registration not successful",
"log_un_exists" => "Kullanıcı zaten var",
"log_em_exists" => "eposta adresi zaten var.",
"log_un_invalid" => "Invalid username (min length 2: A-Z, a-z, 0-9, and _-.) ",
"log_em_invalid" => "Invalid email address",
"log_un_em_invalid" => "The username/email is not valid",
"log_un_em_pw_invalid" => "The username/email or password is not valid",
"log_no_un_em" => "Please enter your username/email",
"log_no_un" => "Please enter your username",
"log_no_em" => "Please enter your email address",
"log_no_pw" => "Please enter your password",
"log_no_rights" => "Login rejected: you have no view rights - Contact the administrator",
"log_send_new_pw" => "Parolamı Gönder",
"log_if_changing" => "Yalnızca Değiştirilirse",
"log_no_new_data" => "Hiçbir bilgi değiştirilmedi",
"log_invalid_new_un" => "Invalid new username (min length 2: A-Z, a-z, 0-9, and _-.) ",
"log_new_un_exists" => "New username already exists",
"log_invalid_new_em" => "New email address invalid",
"log_new_em_exists" => "New email address already exists",
"log_ui_language" => "Kullanıcı Dili",
"log_new_reg" => "New user registration",
"log_date_time" => "Date / time",
"log_reload_retry" => "Time-out. Please close this window, reload the calendar and try again",

//categories.php
"cat_list" => "Kategoriler",
"cat_edit" => "Düzenle",
"cat_delete" => "SİL",
"cat_add_new" => "Yeni Kategori Ekle",
"cat_add" => "Ekle",
"cat_edit_cat" => "Kategoriyi Düzenle",
"cat_name" => "Kategori Adı",
"cat_sequence" => "Sıralama",
"cat_in_menu" => "Menüdeki",
"cat_text_color" => "Yazı Rengi",
"cat_background" => "Arkaplan Rengi",
"cat_select_color" => "Renk Seçin",
"cat_save" => "Save",
"cat_added" => "Kategori Ekle",
"cat_updated" => "Kategori Güncellendi",
"cat_deleted" => "Kategori Silindi",
"cat_invalid_color" => "Hatalı Renk Kodu (#XXXXXX where X = HEX-value)",
"cat_not_added" => "Kategori Eklenemedi",
"cat_not_updated" => "Kategori güncellenemedi",
"cat_not_deleted" => "Kategori silinemedi",
"cat_nr" => "#",
"cat_repeat" => "Tekrar",
"cat_every_day" => "Hergün",
"cat_every_week" => "Her Hafta",
"cat_every_month" => "Her Ay",
"cat_every_year" => "Her Yıl",
"cat_public" => "Public",
"cat_check_mark" => "Check mark",
"cat_label" => "label",
"cat_mark" => "mark",

//users.php
"usr_list_of_users" => "Kullanıcılar",
"usr_name" => "Kullanıcı Adı",
"usr_email" => "Email",
"usr_password" => "Parola",
"usr_rights" => "Haklar",
"usr_language" => "Arayüz Dili",
"usr_ui_language" => "Kullanıcı Arayüz Dili",
"usr_edit_user" => "Profili Düzenle",
"usr_add" => "Kullanıcı Ekle",
"usr_edit" => "Düzenle",
"usr_delete" => "Sil",
"usr_view" => "Görünüm",
"usr_post_own" => "Kendi Mesajım",
"usr_post_all" => "Tüm Mesajlar",
"usr_admin" => "Yönetici",
"usr_login_0" => "İlk Giriş",
"usr_login_1" => "Son Giriş",
"usr_login_cnt" => "Üye Girişler",
"usr_add_profile" => "Profil Ekle",
"usr_upd_profile" => "Profili Güncelle",
"usr_not_found" => "Kullanıcı Bulunamadı",
"usr_if_changing_pw" => "Eğer Parola da değiştirilecekse",
"usr_admin_functions" => "Yönetici Fonksiyonları",
"usr_no_rights" => "Giriş Yasak",
"usr_view_calendar" => "Ajanda Görünümü",
"usr_post_events_own" => "Sadece Kendi için Olay Ekle Düzenle",
"usr_post_events_all" => "Olay Ekle + Düzenle",
"usr_pw_not_updated" => "Parola Güncellenmedi",
"usr_added" => "Kullanıcı Ekle",
"usr_updated" => "User profile updated",
"usr_deleted" => "Kullanıcı Silindi",
"usr_not_added" => "Kullanıcı Eklenemedi",
"usr_not_updated" => "Güncelleme Yapılamadı",
"usr_not_deleted" => "Silinemedi",
"usr_cred_required" => "Kullanıcı Adı, eposta ve parola gerekli alanlardır.",
"usr_uname_exists" => "Bu kullanıcı adı kullanımda",
"usr_email_exists" => "Email address already exists",
"usr_un_invalid" => "Invalid username (min length 2: A-Z, a-z, 0-9, and _-.) ",
"usr_em_invalid" => "Invalid email address",
"usr_cant_delete_yourself" => "Kendisinizi Silemezsiniz.",
"usr_background" => "Background color",
"usr_select_color" => "Select Color",
"usr_invalid_color" => "Color format invalid (#XXXXXX where X = HEX-value)",

//database.php
"mdb_dbm_functions" => "Veritabanı Ayarları",
"mdb_noshow_tables" => "Tablolar getirilemiyor.",
"mdb_compact" => "Compact database",
"mdb_compact_table" => "Tablolaları Kompakt Yap",
"mdb_compact_error" => "Hata",
"mdb_compact_done" => "Yapıldı",
"mdb_purge_done" => "Silinmiş olaylar kesin olarak kaldırıldı",
"mdb_repair" => "Veritabanını kontrol et ve tamir et",
"mdb_check_table" => "Check table",
"mdb_ok" => "OK",
"mdb_nok" => "Not OK",
"mdb_nok_repair" => "Not OK, repair started",
"mdb_backup" => "Veritabanını Yedekle",
"mdb_backup_table" => "Tabloları Yedekle",
"mdb_backup_done" => "Yapıldı",
"mdb_file_saved" => "Dosya Kaydedildi.",
"mdb_file_name" => "Dosya Adı:",
"mdb_start" => "Başla",
"mdb_no_function_checked" => "No function(s) selected",
"mdb_write_error" => "Writing backup file failed<br>Check permissions of 'files/' directory",

//import/export.php
"iex_file" => "Dosyayı Seç",
"iex_file_name" => "iCal file name",
"iex_file_description" => "iCal dosya açıkalaması",
"iex_filters" => "Event Filters",
"iex_upload_ics" => "iCal Dosyası Yükle",
"iex_create_ics" => "iCal Dosya Oluştur",
"iex_upload_csv" => "CSV Yükle ",
"iex_upload_file" => "Yükle ",
"iex_create_file" => "Dosya Oluştur",
"iex_download_file" => "Dosyayı Kaydet",
"iex_fields_sep_by" => "Verilerin ayırma işareti",
"iex_birthday_cat_id" => "Doğumgünü kategori ID",
"iex_default_cat_id" => "Öntanımlı Kategori ID",
"iex_if_no_cat" => "Eğer kategori yoksa",
"iex_import_events_from_date" => "Bu tarih itibari olan olaylar",
"iex_see_insert" => "sağdaki talimatlara bakabilirsiniz.",
"iex_no_file_name" => "Dosya Adı Hatası",
"iex_inval_field_sep" => "invalid or no field separator",
"iex_no_begin_tag" => "invalid iCal file (BEGIN-tag missing)",
"iex_date_format" => "Tarih Formatı",
"iex_time_format" => "Zaman Formatı",
"iex_number_of_errors" => "Number of errors in list",
"iex_bgnd_highlighted" => "background highlighted",
"iex_verify_event_list" => "Verify Event List, correct errors and click",
"iex_add_events" => "Add Events to Database",
"iex_select_birthday_delete" => "Select Birthday and Delete check boxes as required",
"iex_select_delete_ignore" => "Select Delete check box to ignore event",
"iex_title" => "Başlık",
"iex_venue" => "Yer",
"iex_owner" => "Owner",
"iex_category" => "Kategori",
"iex_date" => "Tarih",
"iex_end_date" => "Bitiş",
"iex_start_time" => "Başalama Saat",
"iex_end_time" => "Bitiş Saat",
"iex_description" => "Açıklama",
"iex_birthday" => "Doğrumgünü",
"iex_delete" => "SİL",
"iex_events_added" => "Olay Eklendi",
"iex_events_dropped" => "Olaylar bırakıldı(zaten vardı)",
"iex_db_error" => "Veritabanı hatası",
"iex_ics_file_error_on_line" => "iCal file error on line",
"iex_occurring_between" => "Tarihler Arasında olan",
"iex_changed_between" => "Tarihler arası eklenen/Değişen",
"iex_select_date" => "Tarih Seç",
"iex_select_start_date" => "Select start date",
"iex_select_end_date" => "Select end date",
"iex_all_cats" => "Tüm Kategoriler",
"iex_all_users" => "all users",
"iex_no_events_found" => "Olay/Etkinlik Bulunamadı",
"iex_file_created" => "Dosya Oluşturuldu",
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
"not_all_day" => "Bütün Gün",
"not_mailer" => "mailer",
"not_subject" => "Konu",
"not_event_due_in" => "Aşağıdaki Olay Nedeni",
"not_due_in" => "nedeni ile",
"not_days" => "gün(ler)",
"not_date_time" => "Tarih / zaman",
"not_title" => "Başlık",
"not_sender" => "Gönderici",
"not_venue" => "Yer",
"not_description" => "Açıklama",
"not_category" => "Kategori",
"not_status" => "Status",
"not_open_calendar" => "Açık Ajanda",

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
<p>This function will create a backup of the full calendar database (tables 
structure and contents) in .sql format. The backup will be saved in the 
<strong>files/</strong> directory with file name: 
<kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (where 'yyyymmdd' = year, month, and 
day, and hhmmss = hour, minutes and seconds.</p>
<p>This backup file can be used to re-create the database tables structure and 
contents, for instance by importing the file in the <strong>phpMyAdmin</strong> 
tool which is available on the server of most web hosts.</p>",

"xpl_import_csv" =>
"<h4>CSV Import Instructions</h4>
<p>This form is used to import a <strong>Comma Separated Values (CSV)</strong> text 
file with event data into the LuxCal Calendar.</p>
<p>The order of columns in the CSV file must be: title, venue, category id (see 
below), date, end date, start time, end time and description. The first row of the 
CSV file, used for column headers, is ignored.</p>
<h5>Sample CSV files</h5>
<p>Sample CSV files (file extension .cvs) can be found in the 'files/' directory 
of your LuxCal download.</p>
<h5>Date and time format</h5>
<p>The selected event date format and event time format on the left must match the 
format of the dates and times in the uploaded CSV file.</p>
<h5>Table of Categories</h5>
<p>The calendar uses ID numbers to specify categories. The category IDs in the CSV 
file should correspond to the categories used in your calendar or be blank.</p>
<p>If in the next step you want to earmark events as 'birthday', the <strong>Birthday 
category ID</strong> must be set to the corresponding ID in the category list below.</p>
<br>
<p>For your calendar, the following categories have currently been defined:</p>",

"xpl_import_ical" =>
"<h4>iCalendar Import Instructions</h4>
<p>This form is used to import an <strong>iCalendar</strong> file with events into 
the LuxCal Calendar.</p>
<p>The file contents must meet the [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545 standard</a></u>] of the Internet Engineering Task Force.</p>
<p>Only events will be imported; other iCal components, like: To-Do, Journal, Free / 
Busy, Time zone and Alarm, will be ignored.</p>
<h5>Sample iCal files</h5>
<p>Sample iCalendar files (file extension .ics) can be found in the 'files/' 
directory of your LuxCal download.</p>
<h5>Table of Categories</h5>
<p>The calendar uses ID numbers to specify categories. The category IDs in the 
iCalendar file should correspond to the categories used in your calendar or be 
blank.</p>
<br>
<p>For your calendar, the following categories have currently been defined:</p>",

"xpl_export_ical" =>
"<h4>iCalendar Export Instructions</h4>
<p>This form is used to extract and export <strong>iCalendar</strong> events from 
the LuxCal Calendar.</p>
<p>The <b>iCal file name</b> (without extension) is optional. Created files will 
be stored in the \"files/\" directory on the server with the specified file name, 
or otherwise with the name \"luxcal\". The file extension will be <b>.ics</b>.
Existing files in the \"files/\" directory on the server with the same name will 
be overwritten by the new file.
<p>The <b>iCal file description</b> (e.g. 'Meetings 2012') is optional. If 
entered, it will be added to the header of the exported iCal file.</p>
<p><b>Event filters</b>: The events to be extracted can be filtered by:</p>
<ul>
<li>event owner</li>
<li>event category</li>
<li>event start date</li>
<li>event added/last modified date</li>
</ul>
<p>Each filter is optional. A blank date means: no limit</p>
<br>
<p>The content of the file with extracted events will meet the 
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 standard</a></u>] 
of the Internet Engineering Task Force.</p>
<p>When <b>downloading</b> the exported iCal file, the date and time will be 
added to the name of the downloaded file.</p>
<h5>Sample iCal files</h5>
<p>Sample iCalendar files (file extension .ics) can be found in the 'files/' 
directory of your LuxCal download.</p>"
);
?>
