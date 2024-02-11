<?php
/*
= LuxCal event calendar admin interface language file =

Russian translation: iluhis.com. Please send comments to rb@luxsoft.eu.

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","2.7.2");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Нет.",
"back" => "Назад",
"close" => "Закрыть",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//settings.php - настройки заголовка поля + Основные
"set_general_settings" => "Основные настройки",
"set_opanel_settings" => "Панель опций",
"set_user_settings" => "Учетные записи",
"set_minical_settings" => "Mini Calendar / Upcoming Events Sidebar (only relevant if used)",
"set_view_settings" => "Отображение",
"set_dt_settings" => "Дата/время",
"set_save_settings" => "Сохранить настройки",
"set_missing_invalid" => "Недостаточны или некорректные настройки (background highlighted)",
"set_settings_saved" => "Настройки календаря сохранены",
"set_save_error" => "Ошибка БД - Не удалось сохранить настройки",
"hover_for_details" => "Наведите на описания для более подробной информации",
"enabled" => "вкл.",
"disabled" => "выкл.",
"no" => "нет",
"yes" => "да",
"or" => "или",
"minutes" => "минуты",
"pixels" => "пикселей",
"no_way" => "Вы не авторизованы для совершения этих действий",

//settings.php - основные настройки. Перед каждыми одинарными кавычками в переводе элементов ......_text должна идти обратная косая (т.е. (e.g. \')
"calendarTitle_label" => "Заголовок календаря",
"calendarTitle_text" => "Отображается в верхней строке календаря и используется в email отчетах.",
"calendarUrl_label" => "URL календаря.",
"calendarUrl_text" => "WEB-адрес календаря. Используется при ссылке из миникалендаря и в ссылке на календарь из email отчетов",
"calendarEmail_label" => "Email адрес календаря",
"calendarEmail_text" => "Email адрес отправителя при отправке отчетов.<br>Формат: \'email\' или \'имя&#8249;email&#8250;\'. \'имя\' в качестве имени календаря.",
"timeZone_label" => "Часовой пояс",
"timeZone_text" => "Часовой пояс календаря. Используется для подсчета текущего времени.",
"see" => "посмотреть",
"chgEmailList_label" => "Email адрес для отправки изменений",
"chgEmailList_text" => "Email адрес, на который будет периодически сбрасываться отчет с изменениями в календаре.<br>Адреса разделяются точкой с запятой (;).<br>(необходима задача cron)",
"chgNofDays_label" => "Просматривать изменения до X дней назад",
"chgNofDays_text" => "Количество дней назад, для проверки изменений в календаре.<br>Если количество дней равно 0, то отчеты отправляться не будут. <br>(необходима задача cron)",
"notifSender_label" => "Sender of notification emails",
"notifSender_text" => "When the calendar sends reminder emails, the sender field of the email can contain either the calendar email address, or the email address of the user who created the event.<br>In case of the user email address, the receiver can reply to the email.",
"cronSummary_label" => "Отправлять администратору результат работы cron",
"cronSummary_text" => "Отправлять отчет работы cron администратору календаря.<br>Включение функции полезно при следующем:<br>- cron активирован.",
"details4All_label" => "Показывать подробную информацию о событии всем пользователям",
"details4All_text" => "If enabled: event details will be visible to the owner of the event and to all other users.<br>If disabled: event details will only be visible to the owner of the event and to users with \'post all\' rights. Other users with less rights will not see the event details.",
"rssFeed_label" => "RSS feed links",
"rssFeed_text" => "If enabled: For users with at least \'view\' rights an RSS feed link will be visible in the footer of the calendar and an RSS feed link will be added to the HTML head of the calendar pages.",
"eventExp_label" => "Event expiry days",
"eventExp_text" => "Number of days after the event due date when the event expires and will be automatically deleted.<br>If 0 or if no cron job is running, no events will be automatically deleted.<br>(requires a cron job)",
"cookieExp_label" => "'Remember me' cookie expiry days",
"cookieExp_text" => "Number of days before the cookie set by the \'Remember me\' option (during Log In) will expire.",
"calendar" => "calendar",
"user" => "user",

//settings.php - настройка панели опций. Перед каждыми одинарными кавычками в переводе элементов ......_text должна идти обратная косая (т.е. \')
"userMenu_label" => "Фильтр по пользователям",
"userMenu_text" => "Отобразить меню фильтра по пользователям в панели опций.<br>Этот фильтр может использоваться для отображения событий, размещенных определенными пользователями.",
"catMenu_label" => "Фильтр по категориям",
"catMenu_text" => "Отобразить меню фильтра по категориям в панели опций.<br>Этот фильтр может использоваться для отображения событий, принадлежащих к определенным категориям.",
"langMenu_label" => "Меню выбора языка",
"langMenu_text" => "Отобразить меню выбора языка в панели опций.<br>Это меню может использоваться для выборя языка интерфейса пользователя.<br>(включение полезно, если установлено несколько языков)",
"defaultView_label" => "Вид при открытии по умолчанию",
"defaultView_text" => "Возможные отображения по умолчанию:<br>- Год<br>- Месяц<br>- Неделя<br>- День<br>- Ближайшие<br>- Измененные<br>Рекомендуется: Месяц или Ближайшие.",
"language_label" => "Язык по умолчанию",
"language_text" => "В папке lang/ должны присутствовать файлы ui-{язык}.php, ai-{язык}.php, ug-{язык}.php и ug-layout.png. {язык} = выбранный пользователем язык. Название файла должно быть в нижнем регистре!",

//settings.php - настройка учетных записей пользователей. Перед каждыми одинарными кавычками в переводе элементов ......_text должна идти обратная косая (т.е. \')
"selfReg_label" => "Самостоятельная регистрация",
"selfReg_text" => "Разрешить пользователям самостоятельно регистрироваться и получать доступ к календарю самостоятельно.",
"selfRegPrivs_label" => "Права при самостоятельной регистрации",
"selfRegPrivs_text" => "Права для пользователей, зарегистрированных самостоятельно:<br>- просмотр: только просмотр <br>- размещение своих: размещение своих событий и редактировать свои события<br>- размещать все: размещать свои и редактировать чужие события",
"selfRegNot_label" => "Уведомление про новые регистрации",
"selfRegNot_text" => "Send a notification email to the calendar email address when a self-registation takes place.",
"view" => "просмотр",
"post_own" => 'размещать свои',
"post_all" => 'размещать все',
"maxNoLogin_label" => "Максимальное кол-во дней без входа",
"maxNoLogin_text" => "Если пользователь не произвел вход в свою учетную запись в течение определенного количества дней, то его/её учетная запись будет автоматчески удалена.<br>Если указано значение 0, то учетные записи удаляться не будут.<br>(требует задания cron)",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"miniCalView_label" => "Mini calendar view",
"miniCalView_text" => "Possible views for the mini calendar are:<br>- Full Month<br>- Work Month *)<br>- Full Week<br>- Work Week *)<br>*) For work week days see on this page: Views - Work week days",
"miniCalPost_label" => "Разрешать создавать события из мини-календаря",
"miniCalPost_text" => "Относится толко к работе мини календаря!<br>Если активно, то пользователи могут:<br>- размещать новые события в мини календаре простым щелчком по верхней части ячейки дня. <br>- редактирование/удаление событий щелчком по квадрату события",
"miniCalHBox_label" => "Mini cal event details hover box",
"miniCalHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in the mini calendar",
"sideBarHBox_label" => "Sidebar event details hover box",
"sideBarHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event in the sidebar",
"showLinkInSB_label" => "Show links in sidebar",
"showLinkInSB_text" => "Display URLs from the event description as a hyperlink in the upcoming events sidebar",
"sideBarDays_label" => "Days to look ahead in sidebar",
"sideBarDays_text" => "Number of days to look ahead for events in the upcoming events sidebar.",

//settings.php - настройки просмотра. Перед каждыми одинарными кавычками в переводе элементов ......_text должна идти обратная косая (т.е. \')
"yearStart_label" => "Начальный месяц при просмотре года",
"yearStart_text" => "Если указан начальный месяц (1 - 12), то в режиме просмотра года, календарь будет всегда начинаться именно с этого месяца. Номер года будет указываться тот, где начинается указанный месяц, будто с него начинается год (полезно, например, в школах, где началом учебного года является сентябрь).<br>Значение 0 имеет особое значение: начальный месяц основывается на текущей дате и текущая дата будет в первом ряду месяцев.",
"colsToShow_label" => "Колонок при просмотре года",
"colsToShow_text" => "Количество месяцев для отображения в каждом ряду при просмотре целого года.<br>Рекомендуется: 3 или 4.",
"rowsToShow_label" => "Рядов при просмотре года",
"rowsToShow_text" => "Количество рядов с 4-мя полными месяцами в режиме просмотра года.<br>Рекомендуется: 4, что дает вам 16 месяцев для просмотра.",
"weeksToShow_label" => "Недель при просмотре месяца",
"weeksToShow_text" => "Количество недель в режиме просмотра месяцев.<br>Рекомендуется: 10, что дает вам 2.5месяца для просмотра.<br>Значение 0 имеет особое значение: отображение точно одного месяца.",
"workWeekDays_label" => "Рабочие дни в неделе",
"workWeekDays_text" => "Дни, которые будут отображаться в каждой неделе в режиме Рабочий Месяц и Рабочая Неделя.<br>Введите номера дней, которые должны быть видимы. Номера следующие:<br>1 = Понедельник<br>2 = Вторник<br>....<br>7 = Воскресенье<br>т.о. 12345 : Понедельник - Пятница",
"lookaheadDays_label" => "Просматривать вперед Х дней",
"lookaheadDays_text" => "Количество дней, при просмотре ближайших событий, Todo List и RSS каналов.",
"dwStartHour_label" => "Начальный час при просмотре дня/недели",
"dwStartHour_text" => "Время, в которое обычно начинаются события.<br>Настроив, например, на 6 утра, вы исключите лишнее использование площади экрана на тихое время с полуночи до 6 утра в режиме просмотра недели/дня.",
"dwEndHour_label" => "End hour in Day/Week view",
"dwEndHour_text" => "Hour at which a normal day of events ends.<br>E.g., setting this value to 18 will avoid wasting space in Week/Day view for the quiet time between 18:00 and midnight.",
"dwTimeSlot_label" => "Временной промежуток при просмотре дня/недели",
"dwTimeSlot_text" => "Временной слот в минутах при просмотре в режиме дня/недели<br>Это значение, совместно с начальным часом (см. выше), определяет количество рядов при просмотре в режиме дня/недели.",
"dwTsHeight_label" => "Высота слота времени",
"dwTsHeight_text" => "Высота временного слота в пикселях при просмотре в режиме дня/недели.",
"eventHBox_label" => "Event details hover box",
"eventHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in Year view or an event title in Month, Week or Day view.",
"showAdEd_label" => "Show date event added/edited",
"showAdEd_text" => "Show the date the event was added/edited and the user who added/edited the event in:<br>- всплывающем окне, при наведении на различные события<br>- предстоящих событиях<br>- просмотре изменений<br>- RSS каналах<br>- email уведомлениях.",
"showCatName_label" => "Показывать название категории",
"showCatName_text" => "Если активировано, то в различных видах, независимо от отображения описания события, будет указываться группа, к которой событие принадлежит.",
"showLinkInMV_label" => "Показывать ссылки при просмотре месяца",
"showLinkInMV_text" => "Если активировано, то URL внутри описания к событию будут показываться как ссылки в режиме просмотра месяца.",
"eventColor_label" => "Окрашивать события по",
"eventColor_text" => "В различных режимах просмотра календаря, события могут отображаться различными цветами - или по цвету создавшего событие пользователя, или по цвету категории, к которой событие принадлежит.",
"owner_color" => "цвету владельца",
"cat_color" => "цвету категории",

//settings.php - date/time settings. Перед каждыми одинарными кавычками в переводе элементов ......_text должна идти обратная косая (т.е. \')
"dateFormat_label" => "Формат даты события (дд мм гггг)",
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
"weekStart_label" => "Первый день недели",
"weekStart_text" => "Первый день недели.",
"weekNumber_label" => "Показывать номера недель",
"weekNumber_text" => "Отображение номеров недель в режиме просмотра года, месяца и недели может быть включено или выключено.",
"time_format_us" => "12 часов AM/PM",
"time_format_eu" => "24 часа",
"sunday" => "Воскресенье",
"monday" => "Понедельник",
"time_zones" => "Зоны времени",
"dd_mm_yyyy" => "дд-мм-гггг",
"mm_dd_yyyy" => "мм-дд-гггг",
"yyyy_mm_dd" => "гггг-мм-дд",

//login.php
"log_log_in" => "Войти",
"log_remember_me" => "Запомнить меня",
"log_register" => "Зарегистрироваться",
"log_change_my_data" => "Изменить мои данные",
"log_change" => "Изменить",
"log_un_or_em" => "Имя пользователя или Email",
"log_un" => "Имя пользователя",
"log_em" => "Email",
"log_pw" => "Пароль",
"log_new_un" => "Новое имя пользователя",
"log_new_em" => "Новый Email",
"log_new_pw" => "Новый пароль",
"log_pw_msg" => "Ваш пароль для входа",
"log_pw_subject_pre" => "Ваш",
"log_pw_subject_post" => "Пароль",
"log_npw_msg" => "Ваш новый пароль для входа",
"log_npw_subject_pre" => "Ваш новый",
"log_npw_subject_post" => "Пароль",
"log_npw_sent" => "Ваш новый пароль отправлен",
"log_registered" => "Регистрация успешна - ваш пароль отправлен по email",
"log_not_registered" => "Регистрация не удалась",
"log_un_exists" => "Такой пользователь уже существует",
"log_em_exists" => "Такой Email адрес уже существует",
"log_un_invalid" => "Неверное имя (мин. длина 2: A-Z, a-z, 0-9, and _-.) ",
"log_em_invalid" => "Неверный адрес почты",
"log_un_em_invalid" => "Неверное имя/email",
"log_un_em_pw_invalid" => "Неверные имя/email или пароль",
"log_no_un_em" => "Пожалуйста, введите ваши имя пользователя/email",
"log_no_un" => "Пожалуйста, введите имя пользователя",
"log_no_em" => "Пожалуйста, введите ваш email",
"log_no_pw" => "Пожалуйста, введите your пароль",
"log_no_rights" => "Отказано: у вас нет прав просмотра, свяжитесь с администратором",
"log_send_new_pw" => "Отправить новый пароль",
"log_if_changing" => "Только при изменении",
"log_no_new_data" => "Нет данных для изменений",
"log_invalid_new_un" => "Неверное имя пользователя (min length 2: A-Z, a-z, 0-9, and _-.) ",
"log_new_un_exists" => "Новое имя пользователя уже существует",
"log_invalid_new_em" => "Неправильный новый адрес email ",
"log_new_em_exists" => "Новый адрес email уже существует",
"log_ui_language" => "Язык интерфейса",
"log_reload_retry" => "Time-out. Please close this window, reload the calendar and try again",

//categories.php
"cat_list" => "Список категорий",
"cat_edit" => "Редактировать",
"cat_delete" => "Удалить",
"cat_add_new" => "Добавить новую категорию",
"cat_add" => "Добавить категорию",
"cat_edit_cat" => "Редактировать категорию",
"cat_name" => "Имя категории",
"cat_sequence" => "Последовательность",
"cat_in_menu" => "в меню",
"cat_text_color" => "Цвет текста",
"cat_background" => "Фон",
"cat_select_color" => "Выбрать цвет",
"cat_save" => "Обновить категорию",
"cat_added" => "Категория добавлена",
"cat_updated" => "Категория обновлена",
"cat_deleted" => "Категория удалена",
"cat_invalid_color" => "Неправильный формат цвета (#XXXXXX where X = HEX-value)",
"cat_not_added" => "Категория не добавлена",
"cat_not_updated" => "Категория не обновлена",
"cat_not_deleted" => "Категория не удалена",
"cat_nr" => "#",
"cat_repeat" => "Повтор",
"cat_every_day" => "каждый day",
"cat_every_week" => "every неделю",
"cat_every_month" => "каждый месяц",
"cat_every_year" => "каждый год",
"cat_public" => "Публичная",

//users.php
"usr_list_of_users" => "Список пользователей",
"usr_name" => "Имя",
"usr_email" => "Email",
"usr_password" => "Пароль",
"usr_rights" => "Права",
"usr_language" => "Язык",
"usr_ui_language" => "Язык интерфейса",
"usr_edit_user" => "Редактировать профиль пользователя",
"usr_add" => "Добавить пользователя",
"usr_edit" => "Редактировать",
"usr_delete" => "Удалить",
"usr_view" => "Просмотр",
"usr_post_own" => "Размещать свои",
"usr_post_all" => "Размещать все",
"usr_admin" => "Администратор",
"usr_login_0" => "Первый вход",
"usr_login_1" => "Последний вход",
"usr_login_cnt" => "Входов",
"usr_add_profile" => "Добавить профиль",
"usr_upd_profile" => "Обновить профиль",
"usr_not_found" => "Пользователь не найден",
"usr_if_changing_pw" => "Только при изменении пароля",
"usr_admin_functions" => "Функции администратора",
"usr_no_rights" => "Нет прав доступа",
"usr_view_calendar" => "Просмотр календаря",
"usr_post_events_own" => "Размещение + редактирование своих событий",
"usr_post_events_all" => "Размещение + редактирование всех событий",
"usr_pw_not_updated" => "Пароль не обновлен",
"usr_added" => "Пользователь добавлен",
"usr_updated" => "Профиль пользователя обновлен",
"usr_deleted" => "Пользователь удален",
"usr_not_added" => "Пользователь не добавлен",
"usr_not_updated" => "Пользователь не обновлен",
"usr_not_deleted" => "Пользователь не удален",
"usr_cred_required" => "Необходимы имя пользователя, email и пароль",
"usr_uname_exists" => "Имя пользователя уже существует",
"usr_email_exists" => "Адрес email уже существует",
"usr_un_invalid" => "Неправильное имя пользователя (min length 2: A-Z, a-z, 0-9, and _-.) ",
"usr_em_invalid" => "Неправильный адрес email",
"usr_cant_delete_yourself" => "Вы не можете удалить сами себя",
"usr_background" => "Цвет фона",
"usr_select_color" => "Выбрать цвет",
"usr_invalid_color" => "Неправильный формат цвета (#XXXXXX where X = HEX-value)",

//database.php
"mdb_dbm_functions" => "Функции базы данных",
"mdb_noshow_tables" => "Не могу получить таблицу(-цы)",
"mdb_compact" => "Сжать базу данных",
"mdb_compact_table" => "Сжать таблицы",
"mdb_compact_error" => "Ошибка",
"mdb_compact_done" => "Выполнено",
"mdb_purge_done" => "Удаленные события  events окончательно удалены",
"mdb_repair" => "Проверить и исправить базу данных",
"mdb_check_table" => "Проверить таблицу",
"mdb_ok" => "OK",
"mdb_nok" => "Не OK",
"mdb_nok_repair" => "Что-то не так, запущено восстановление",
"mdb_backup" => "Резервирование базы данных",
"mdb_backup_table" => "Резервирование таблицы",
"mdb_backup_done" => "Выполнено",
"mdb_file_saved" => "Резервный файл сохранен на сервере.",
"mdb_file_name" => "Имя файла:",
"mdb_start" => "Старт",
"mdb_no_function_checked" => "Функция(-ции) не выделены",
"mdb_write_error" => "Ошибка записи резервного файла.<br>Проверьте разрешения у папки /'files/' ",

//import/export.php
"iex_file" => "Выделенный файл",
"iex_file_name" => "Имя файла iCal",
"iex_file_description" => "Описание файла iCal",
"iex_filters" => "Фильтры событий",
"iex_upload_ics" => "Загрузить файл iCal",
"iex_create_ics" => "Создать файл iCal",
"iex_upload_csv" => "Загрузить файл  CSV",
"iex_upload_file" => "Загрузить файл",
"iex_create_file" => "Создать файл",
"iex_download_file" => "Скачать файл",
"iex_fields_sep_by" => "Поля разделены символом",
"iex_birthday_cat_id" => "Birthday category ID",
"iex_default_cat_id" => " ID категории по умолчанию",
"iex_if_no_cat" => "если категории не найдены",
"iex_import_events_from_date" => "Импорт событий, начинающихся с:",
"iex_see_insert" => "см. инструкцию справа",
"iex_no_file_name" => "Отсутствует имя файла",
"iex_inval_field_sep" => "разделитель полей неправильный или отсутствует",
"iex_no_begin_tag" => "неправильный файл iCal (нет начального тега)",
"iex_date_format" => "Формат даты событий",
"iex_time_format" => "Формат времени событий",
"iex_number_of_errors" => "Ошибок в списке",
"iex_bgnd_highlighted" => "фон подсвечен",
"iex_verify_event_list" => "Проверьте список событий, исправьте ошибке и клацайте",
"iex_add_events" => "Добавить события в базу данных",
"iex_select_birthday_delete" => "Select Birthday and Delete check boxes as required",
"iex_select_delete_ignore" => "Select Delete check box to ignore event",
"iex_title" => "Заголовок",
"iex_venue" => "Место",
"iex_owner" => "Владелец",
"iex_category" => "Категория",
"iex_date" => "Дата",
"iex_end_date" => "Конечная дата",
"iex_start_time" => "Время начала",
"iex_end_time" => "Время окончания",
"iex_description" => "Описание",
"iex_birthday" => "День Рождения",
"iex_delete" => "Удалить",
"iex_events_added" => "событий добавлено",
"iex_events_dropped" => "событий пропущено (уже существуют)",
"iex_db_error" => "Ошибка базы данных",
"iex_ics_file_error_on_line" => "Ошибка файла iCal в строке ",
"iex_occurring_between" => "Происходит в промежутке",
"iex_changed_between" => "Добавлен/изменен в промежутке",
"iex_select_date" => "Выбрать дату",
"iex_select_start_date" => "Выбрать дату начала",
"iex_select_end_date" => "Выбрать дату окончания",
"iex_all_cats" => "все категории",
"iex_all_users" => "все пользователи",
"iex_no_events_found" => "Ниодного события не добавлено",
"iex_file_created" => "Файл создан",
"iex_write error" => "Ошибка записи файла экспорта<br>Проверьте права папки 'files/' ",

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
"not_all_day" => "All day",
"not_mailer" => "mailer",
"not_subject" => "Subject",
"not_event_due_in" => "The following event is due in",
"not_due_in" => "Due in",
"not_days" => "day(s)",
"not_date_time" => "Date / time",
"not_title" => "Title",
"not_sender" => "Sender",
"not_venue" => "Venue",
"not_description" => "Description",
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
"<h4>Инструкции по управлению БД</h4>
<p>На этой странице могут быть выбраны следующие функции:</p>
<h5>Проверить и исправить БД</h5>
<p>Эта функция будет сканироваь таблицы календаря и проверять их на наличие ошибок
Если ошибка будет найдена, то она будет исправлена, если это будет возможно.</p>
<p>Если при просмотре календаря не возникает никаких проблем, то достаточно запускать эту функцию один раз в год
</p>
<h5>Сжать БД</h5>
<p>Когда пользователь удаляет событие, событие помечается как 'удаленное', но не будет убрано из БД.
Функция полностью удаляет события, удаленные более 30 дней назад и освобождает место на диске, 
занимаемое этими событиями.</p>
<h5>Резервирование БД</h5>
<p>Эта функция создаст резервный файл полной БД календаря (структура таблиц и их содержание )
 в формате '.sql' . Резервный файл будет сохранен в папке
<strong>files/</strong> с именем файла file name: 
<kbd>cal-backup-ггггммдд-ччммсс.sql</kbd> (где 'ггггммдд' = год, месяц, и 
день, а ччммсс = час, минуты и секунды.</p>
<p>Этот резервный файл может быть использован для восстановления структуры таблиц БД 
и их содержимого при импортировании, например, в инструмент <strong>phpMyAdmin</strong>, 
 который доступен на серверах большинства хостингов.</p>",

"xpl_import_csv" =>
"<h4>Инструкции по импорту CSV</h4>
<p>Эта форма используется для импорта в LuxCal текстовых файлов <strong>Comma Separated Values (CSV)</strong> 
с данными.</p>
<p>Последовательность колонок в файле CSV должна быть следующей: заголовок, место, id категории (см. ниже), 
дата, конечная дата, время начала, время окончания и описание. Первый ряд файла 
CSV, используемый для заголовков коонок, игнорируется.</p>
<h5>Файлы примеров CSV</h5>
<p>Файлы примеров CSV (расширение файла .cvs) могут быть найдены в папке 'files/'  
 где находится LuxCal.</p>
<h5>Формат даты и времени</h5>
<p>Выбранные форматы даты и времени событий должны соответствовать форматам в закачиваемом файле CSV.</p>
<h5>Таблицы категорий</h5>
<p>Календарь использует ID-номера для определения категорий. ID категорий в файле CSV 
должны соответствовать категорям в календаре или должны быть пустыми.</p>
<p>Если при следующем шаге вы хотите обозначить события как 'день рождения', то <strong>Birthday 
category ID</strong> должно соответствовать ID категории из списка ниже.</p>
<br>
<p>В вашем календаре сейчас назначены следующие категории:</p>",

"xpl_import_ical" =>
"<h4>Инструкции по импорту iCalendar</h4>
<p>Эта форма используется для импорта в LuxCal текстовых файлов <strong>iCalendar</strong> 
с данными. </p>
<p>Содержимое файла должно соответствовать [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>стандарту RFC5545</a></u>] Инженерного совета Интернет (Internet Engineering Task Force).</p>
<p>Будут испортированы только события; другие компоненты iCal, такие как: To-Do (задачи), Jounal (журнал), Free / 
Busy (свободен / занят), Time zone (временная зона) и Alarm (будильник), будут игнорированы.</p>
<h5>Файлы примеров iCal</h5>
<p>Файлы примеров iCalendar (расширение файла .ics) могут быть найдены в папке 'files/'  
 где находится LuxCal.</p>
<h5>Таблица категорий</h5>
<p>Календарь использует ID-номера для определения категорий. ID категорий в файле CSV 
должны соответствовать категорям в календаре или должны быть пустыми.</p>
<br>
<p>В вашем календаре сейчас назначены следующие категории:</p>",

"xpl_export_ical" =>
"<h4>Инструкции по экспорту iCalendar</h4>
<p>Эта форма используется для извлечения и экспортирования событий из LuxCal в формат <strong>iCalendar</strong>.</p>
<p><b>Имя файла iCal</b> (без расширения) не является обязательным. Созданный файл будет сохранен в в папке 'files/' 
на сервере с указанным именем, или с именем \"luxcal\". Расширение файла будет <b>.ics</b>.
Существующие файлы в папке \"files/\" на сервере будет перезаписаны новым файлом.</p>
<p><b>Описание файла iCal</b> (т.е. 'Встречи 2012') не является обязательным. Если это поле не пустое, 
то введенный текст будет добавлен в заголовок экспортируемого файла iCal.</p>
<p><b>Фильтры событий</b>. События могут быть отфильтованы по:</p>
<ul>
<li>владельцу события</li>
<li>категории события</li>
<li>начальной дате события</li>
<li>дате создания/изменения события</li>
</ul>
<p>Каждый из фильтров не является обязательным. Пустое поле означает: без ограничений</p>
<br>
<p>Содержимое файла с извлеченными событиями будет соответствовать [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>стандарту RFC5545</a></u>] Инженерного совета Интернет (Internet Engineering Task Force).</p>
<p>Когда экспортируемый файл iCal будет <b>скачиваться</b>, к имени скачиваемого файла будут добавлены дата и время.</p>
<h5>Файлы примеров iCal</h5>
<p>Файлы примеров iCalendar (расширение файла .ics) могут быть найдены в папке 'files/'  
 где находится LuxCal.</p>"
);
?>
