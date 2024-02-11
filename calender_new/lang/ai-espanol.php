<?php
/*
= LuxCal event calendar admin interface language file =

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.
Traducción corregida y actualizada por Pantricio - Murcia, España.

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu
This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","2.7.2");

/* -- Admin Interface texts -- */

$ax = array(

//general
"none" => "Ninguno",
"back" => "Volver",
"close" => "Close",
"at_time" => '@', //date and time separator (e.g. 11-09-2012 @ 10:45)

//settings.php - fieldset headers + general
"set_general_settings" => "Calendario",
"set_opanel_settings" => "Panel de opciones",
"set_user_settings" => "Usuarios",
"set_minical_settings" => "Mini Calendar / Upcoming Events Sidebar (only relevant if used)",
"set_view_settings" => "Apariencia",
"set_dt_settings" => "Hora y fecha",
"set_save_settings" => "Guardar configuración",
"set_missing_invalid" => "parámetros ausentes o incorrectos (fondo resaltado)",
"set_settings_saved" => "Configuración de calendario guardada",
"set_save_error" => "Error de base de datos - Fallo al guardar la configuración",
"hover_for_details" => "Pase el cursor sobre las descipciones para ver los detalles",
"enabled" => "habilitado",
"disabled" => "deshabilitado",
"no" => "no",
"yes" => "sí",
"or" => "o",
"minutes" => "minutos",
"pixels" => "pixeles",
"no_way" => "No está autorizado para realizar esta acción",

//settings.php - general settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Título del calendario",
"calendarTitle_text" => "Se muestra en la barra superior del calendario y en las notificaciones por correo electrónico.",
"calendarUrl_label" => "URL del calendario",
"calendarUrl_text" => "Dirección web del calendario.",
"calendarEmail_label" => "Dirección de correo electrónico del calendario",
"calendarEmail_text" => "Dirección de correo electrónico usada para enviar notificaciones.<br>Formato: \'email\' o \'nombre&#8249;email&#8250;\'.",
"timeZone_label" => "Zona horaria",
"timeZone_text" => "Zona horaria del calendario utilizada para calcular la hora actual del calendario.",
"see" => "ver",
"chgEmailList_label" => "Envíar correos con cambios a",
"chgEmailList_text" => "Las direcciones de correo especificadas reciben periódicamente notificaciones por correo electrónico con los cambios en el calendario.<br>Las direcciones de correo deben separarse por punto y coma.<br>(requiere usar \'cron\' en Unix, o \'at\' en Windows)",
"chgNofDays_label" => "Días previos para buscar cambios",
"chgNofDays_text" => "Número de días previos en los que buscar cambios en el calendario.<br>Si el número de días es cero no se enviarán resúmenes de los cambios.<br>(requiere usar \'cron\' en Unix, o \'at\' en Windows)",
"notifSender_label" => "Sender of notification emails",
"notifSender_text" => "When the calendar sends reminder emails, the sender field of the email can contain either the calendar email address, or the email address of the user who created the event.<br>In case of the user email address, the receiver can reply to the email.",
"cronSummary_label" => "Enviar resumen de tareas cron al administrador",
"cronSummary_text" => "Enviar un resumen de las tareas cron al administrador del calendario.<br>Habilitarlo solo es útil si:<br>- Se ha activado una tarea cron",
"details4All_label" => "Mostrar detalles del evento a todos los usuarios",
"details4All_text" => "Si se habilita: los detalles del evento serán visibles para el propietario de dicho evento y para el resto de usuarios.<br>Si se deshabilita: los detalles del evento serán visibles solo para el propietario del evento y para los usuarios que tengan el permiso \'Publicar y editar todos los eventos\'. Los usuarios que tengan menos permisos no verán los detalles del evento.",
"rssFeed_label" => "RSS feed links",
"rssFeed_text" => "If enabled: For users with at least \'view\' rights an RSS feed link will be visible in the footer of the calendar and an RSS feed link will be added to the HTML head of the calendar pages.",
"eventExp_label" => "Event expiry days",
"eventExp_text" => "Number of days after the event due date when the event expires and will be automatically deleted.<br>If 0 or if no cron job is running, no events will be automatically deleted.<br>(requires a cron job)",
"cookieExp_label" => "'Remember me' cookie expiry days",
"cookieExp_text" => "Number of days before the cookie set by the \'Remember me\' option (during Log In) will expire.",
"calendar" => "calendar",
"user" => "user",

//settings.php - options panel settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"userMenu_label" => "Menú de filtro de usuarios",
"userMenu_text" => "Mostrar el filtro de usuarios en el panel de opciones.<br>Este filtro puede usarse para mostrar solo los eventos creados por un usario concreto.",
"catMenu_label" => "Menú de filtro de categorías",
"catMenu_text" => "Mostrar el filtro de categorías en el panel de opciones.<br>Este filtro puede usarse para mostrar solo los eventos que pertenecen a una categoría concreta.",
"langMenu_label" => "Menú de selección de idioma",
"langMenu_text" => "Desplegar el menú de selección de idioma en el panel de opciones.<br>Este menú puede usarse para seleccionar el idioma del interfaz de usuario<br>(Activarlo solo tiene sentido si hay varios idiomas instalados)",
"defaultView_label" => "Vista por defecto al comenzar",
"defaultView_text" => "Las vistas por defecto posibles son:<br>- Año<br>- Mes<br>- Semana<br>- Día<br>- Próximos<br>- Cambios<br>Elección recomendada: Mes o Próximos.",
"language_label" => "Idioma por defecto de la interfaz",
"language_text" => "Los archvos ui-{idioma}.php, ai-{idioma}.php, ug-{idioma}.php y ug-layout.png deben estar presentes en el directorio lang/<br>{idioma} = idioma de interfaz elegido. ¡Los nombres de archivo deben ser en minúsculas!",

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Auto registro",
"selfReg_text" => "Permitir a los usuarios registrarse por sí mismos para acceder al calendario.",
"selfRegPrivs_label" => "Permisos de autoregistrados",
"selfRegPrivs_text" => "Permisos de acceso para los usuarios autoregistrados.<br>- Ver: Únicamente consulta, no puede publicar<br>- Publicar propios: Publicar y editar eventos propios<br>- Publicar todos: Publicar y editar eventos propios y de otros usuarios.",
"selfRegNot_label" => "Notificación de autoregistro",
"selfRegNot_text" => "Enviar una notificación por correo electrónico a la dirección de correo del calendario cuando se autoregistre un usuario.",
"view" => "ver",
"post_own" => "publicar propios",
"post_all" => "publicar todos",
"maxNoLogin_label" => "Número máximo de días sin acceder",
"maxNoLogin_text" => "Si un usuario no ha accedido al calendario durante el número de días indicado su cuenta será borrada.<br>Si el número es 0 las cuentas no se borrarán.<br>(requiere usar \'cron\' en Unix, o \'at\' en Windows)",

//settings.php - mini calendar / sidebar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"miniCalView_label" => "Mini calendar view",
"miniCalView_text" => "Possible views for the mini calendar are:<br>- Full Month<br>- Work Month *)<br>- Full Week<br>- Work Week *)<br>*) For work week days see on this page: Views - Work week days",
"miniCalPost_label" => "Publicar eventos en el mini calendario",
"miniCalPost_text" => "¡Solo tiene relevancia si se usa el mini calendario!<br>Si se habilita los usuarios pueden:<br>- Publicar nuevos eventos en el mini calendario haciendo clic en la barra superior de la casilla del día.<br>- Editar y borrar eventos haciendo clic sobre su recuadro",
"miniCalHBox_label" => "Mini cal event details hover box",
"miniCalHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in the mini calendar",
"sideBarHBox_label" => "Sidebar event details hover box",
"sideBarHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event in the sidebar",
"showLinkInSB_label" => "Show links in sidebar",
"showLinkInSB_text" => "Display URLs from the event description as a hyperlink in the upcoming events sidebar",
"sideBarDays_label" => "Days to look ahead in sidebar",
"sideBarDays_text" => "Number of days to look ahead for events in the upcoming events sidebar.",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Mes inicial en la vista anual",
"yearStart_text" => "Si se especifica un mes inicial (1 - 12) la vista anual del calendario empezará siempre por este mes, y el año cambiará cuando llegue el primer día de este mes del año siguiente.<br>El valor 0 tiene un significado especial: el mes inicial se basará en la fecha actual, y caerá en en la primera fila de meses.",
"colsToShow_label" => "Columnas en la vista anual",
"colsToShow_text" => "Número de meses que se mostrarán en cada fila de la vista anual.<br>Elección recomendada: 3 ó 4.",
"rowsToShow_label" => "Filas en la vista anual",
"rowsToShow_text" => "Número de filas que se desplegarán en la vista anual.<br>Elección recomendada: 4, que proporciona 16 meses a la vez.",
"weeksToShow_label" => "Semanas en la vista mensual",
"weeksToShow_text" => "Número total de semanas desplegadas en la vista mensual.<br>Opción recomendada: 10, que despliega 2,5 meses.<br>El valor 0 tiene un significado especial: despliega exactamente un mes.",
"workWeekDays_label" => "Días de la semana laboral",
"workWeekDays_text" => "Días que deben mostrarse en cada semana de la vista mes laboral y semana laboral.<br>Introduzca el número de los días que deben verse:<br>1 = lunes<br>2 = martes<br>....<br>7 = domingo<br>p.ej. 12345 : de lunes a viernes",
"lookaheadDays_label" => "Días eventos próximos (Tareas y RSS)",
"lookaheadDays_text" => "Número de días que se consultarán para mostrar eventos próximos en la lista de tareas y en las noticias RSS.",
"dwStartHour_label" => "Hora inicial en las vistas diaria y semanal",
"dwStartHour_text" => "Hora a la que comienzan los eventos de un día normal.<br>Establecer este valor en 6, evitará desperdiciar espacio en las horas de la noche en las vistas diaria o semanal entre la media noche y las 06:00.",
"dwEndHour_label" => "End hour in Day/Week view",
"dwEndHour_text" => "Hour at which a normal day of events ends.<br>E.g., setting this value to 18 will avoid wasting space in Week/Day view for the quiet time between 18:00 and midnight.",
"dwTimeSlot_label" => "Hueco temporal en las vistas diaria y semanal",
"dwTimeSlot_text" => "Número de minutos que ocupa cada hueco en las vistas diaria y semanal.<br>Este valor junto con la hora inicial (ver apartado previo) determinará el número de filas en las vistas diaria y semanal.",
"dwTsHeight_label" => "Altura del hueco temporal",
"dwTsHeight_text" => "Altura en pixeles del hueco temporal en la vistas diaria y semanal.",
"eventHBox_label" => "Event details hover box",
"eventHBox_text" => "If enabled an overlay with event details will pop up when the user hovers an event square in Year view or an event title in Month, Week or Day view.",
"showAdEd_label" => "Show date event added/edited",
"showAdEd_text" => "Show the date the event was added/edited and the user who added/edited the event in:<br>- La vista de próximos.<br>- La vista de cambios.<br>- the events on the Text Search page<br>- Noticias RSS.<br>- Notificaciones por correo electrónico.",
"showCatName_label" => "Mostrar nombre de la categoría",
"showCatName_text" => "Si se habilita en varias vistas, además de mostrar el color de la categoría en la descripción del evento, se mostrará también el nombre de la categoría.",
"showLinkInMV_label" => "Mostrar enlaces en la vista mensual",
"showLinkInMV_text" => "Si se habilita, las URLs de las descripciones de los eventos se mostrarán como hiperenlaces en la vista mensual",
"eventColor_label" => "Colores del evento basados en",
"eventColor_text" => "Los eventos pueden mostrarse en las diversas vistas con un color asignado al usuario que creó el evento, o el color asignado a la categoría del evento.",
"owner_color" => "color del propietario",
"cat_color" => "color de la categoría",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Formato de fecha (dd mm yyyy)",
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
"weekStart_label" => "Primer día de la semana",
"weekStart_text" => "el día con que empieza la semana.",
"weekNumber_label" => "Mostrar número de la semana",
"weekNumber_text" => "Permite elegir si se mostrará o no el número de la semana en las vistas anual, mensual, y semanal.",
"time_format_us" => "12 horas (AM/PM)",
"time_format_eu" => "24 horas",
"sunday" => "Domingo",
"monday" => "Lunes",
"time_zones" => "zonas horarias",
"dd_mm_yyyy" => "dd-mm-yyyy",
"mm_dd_yyyy" => "mm-dd-yyyy",
"yyyy_mm_dd" => "yyyy-mm-dd",

//login.php
"log_log_in" => "Iniciar sesión",
"log_remember_me" => "Recordarme",
"log_register" => "Registrarse",
"log_change_my_data" => "Cambiar mis datos",
"log_change" => "Cambiar",
"log_un_or_em" => "Nombre de usuario o correo electrónico",
"log_un" => "Nombre de usuario",
"log_em" => "Correo electrónico",
"log_pw" => "Contraseña",
"log_new_un" => "Nuevo nombre de usuario",
"log_new_em" => "Nuevo correo electrónico",
"log_new_pw" => "Nueva contraseña",
"log_pw_msg" => "Ésta es su contraseña para entrar a",
"log_pw_subject_pre" => "Su",
"log_pw_subject_post" => "Contraseña",
"log_npw_msg" => "Ésta es su nueva contraseña para entrar a",
"log_npw_subject_pre" => "Su nueva",
"log_npw_subject_post" => "Contraseña",
"log_npw_sent" => "Su nueva contraseña ha sido enviada a:",
"log_registered" => "Registro correcto. Su nueva contraseña ha sido enviada por correo electrónico",
"log_not_registered" => "Registro fallido",
"log_un_exists" => "El nombre de usuario ya existe",
"log_em_exists" => "La dirección de correo electrónico ya está registrada",
"log_un_invalid" => "Nombre de usuario inválido (longitud mínima 2: A-Z, a-z, 0-9, y _-.) ",
"log_em_invalid" => "Dirección de correo electrónico inválida",
"log_un_em_invalid" => "Nombre de usuario/correo electrónico inválidos",
"log_un_em_pw_invalid" => "El nombre de usuario/correo electrónico o la contraseña es incorrecta",
"log_no_un_em" => "No introdujo su nombre de usuario/correo electrónico",
"log_no_un" => "Introduzca su nombre de usuario",
"log_no_em" => "Introduzca su dirección de correo electrónico",
"log_no_pw" => "No ha introducido su contraseña",
"log_no_rights" => "Acceso denegado: no tiene permisos para ver el calendario. Contacte con el administrador",
"log_send_new_pw" => "Enviar una nueva contraseña",
"log_if_changing" => "Sólo si cambia",
"log_no_new_data" => "No hay cambios",
"log_invalid_new_un" => "Nuevo nombre de usuario inválido (longitud mínima 2: A-Z, a-z, 0-9, y _-.) ",
"log_new_un_exists" => "El nuevo nombre de usuario ya existe",
"log_invalid_new_em" => "La nueva dirección de correo electrónico es inválida",
"log_new_em_exists" => "La nueva dirección de correo electrónico ya existe",
"log_ui_language" => "Idioma del interfaz de usuario",
"log_new_reg" => "Registar nuevo usuario",
"log_date_time" => "Fecha / hora",
"log_reload_retry" => "Time-out. Please close this window, reload the calendar and try again",

//categories.php
"cat_list" => "Lista de Categorías",
"cat_edit" => "Editar",
"cat_delete" => "Borrar",
"cat_add_new" => "Añadir Nueva Categoría",
"cat_add" => "Agregar",
"cat_edit_cat" => "Editar Categoría",
"cat_name" => "Nombre de la categoría",
"cat_sequence" => "Posición",
"cat_in_menu" => "En menú",
"cat_text_color" => "Color del texto",
"cat_background" => "Fondo",
"cat_select_color" => "Seleccione el color",
"cat_save" => "Actualizar",
"cat_added" => "Categoría agregada",
"cat_updated" => "Categoría actualizada",
"cat_deleted" => "Categoría eliminada",
"cat_invalid_color" => "Formato de color inválido (#XXXXXX donde X = Valor hexadecimal)",
"cat_not_added" => "Categoría no agregada",
"cat_not_updated" => "La categoría no se actualizó",
"cat_not_deleted" => "La categoría no se eliminó",
"cat_nr" => "Nº",
"cat_repeat" => "Repetir",
"cat_every_day" => "cada día",
"cat_every_week" => "cada semana",
"cat_every_month" => "cada mes",
"cat_every_year" => "cada año",
"cat_public" => "Público",
"cat_check_mark" => "Marca",
"cat_label" => "etiqueta",
"cat_mark" => "marca (signo)",

//users.php
"usr_list_of_users" => "Lista de Usuarios",
"usr_name" => "Nombre de usuario",
"usr_email" => "Correo electrónico",
"usr_password" => "Contraseña",
"usr_rights" => "Permisos",
"usr_language" => "Idioma",
"usr_ui_language" => "Idioma del interfaz de usuario",
"usr_edit_user" => "Editar perfil de usuario",
"usr_add" => "Añadir usuario",
"usr_edit" => "Editar",
"usr_delete" => "Borrar",
"usr_view" => "Ver",
"usr_post_own" => "Editar eventos propios",
"usr_post_all" => "Editar TODOS los eventos",
"usr_admin" => "Admin",
"usr_login_0" => "Primer acceso",
"usr_login_1" => "Último acceso",
"usr_login_cnt" => "Accesos",
"usr_add_profile" => "Añadir perfil",
"usr_upd_profile" => "Actualizar perfil",
"usr_not_found" => "Usuario no encontrado",
"usr_if_changing_pw" => "Sólo si se cambia la contraseña",
"usr_admin_functions" => "Funciones de administración",
"usr_no_rights" => "Sin permisos de acceso",
"usr_view_calendar" => "Ver calendario",
"usr_post_events_own" => "Publicar y editar eventos propios",
"usr_post_events_all" => "Publicar y editar TODOS los eventos",
"usr_pw_not_updated" => "Contraseña no actualizada",
"usr_added" => "Usuario añadido",
"usr_updated" => "Perfil de usuario actualizado",
"usr_deleted" => "Usuario eliminado",
"usr_not_added" => "Usuario no añadido",
"usr_not_updated" => "Usuario no actualizado",
"usr_not_deleted" => "Usuario no suprimido",
"usr_cred_required" => "Nombre de usuario, correo electrónico y contraseña son obligatorios",
"usr_uname_exists" => "El nombre de usuario ya existe",
"usr_email_exists" => "La dirección de correo electrónico ya existe",
"usr_un_invalid" => "Nombre de usuario inválido (longitud mínima 2: A-Z, a-z, 0-9, y _-.) ",
"usr_em_invalid" => "Dirección de coreo electrónico inválida",
"usr_cant_delete_yourself" => "No puede borrarse usted a sí mismo",
"usr_background" => "Color del fondo",
"usr_select_color" => "Seleccione color",
"usr_invalid_color" => "Formato de color incorrecto (#XXXXXX donde X = Valor hexadecimal)",

//database.php
"mdb_dbm_functions" => "Funciones de la base de datos",
"mdb_noshow_tables" => "No puedo obtener la(s) tabla(s)",
"mdb_compact" => "Compactar la base de datos",
"mdb_compact_table" => "Compactar tabla",
"mdb_compact_error" => "Error",
"mdb_compact_done" => "Hecho",
"mdb_purge_done" => "Los eventos borrados han sido eliminados definitivamente",
"mdb_repair" => "Comprobar y arreglar base de datos",
"mdb_check_table" => "Comprobar tabla",
"mdb_ok" => "OK",
"mdb_nok" => "Mal",
"mdb_nok_repair" => "Mal, iniciando reparación",
"mdb_backup" => "Copia de seguridad de la base de datos",
"mdb_backup_table" => "Copia de seguridad de la tabla",
"mdb_backup_done" => "Hecho",
"mdb_file_saved" => "El fichero de la copia de seguridad ha sido guardado en el servidor.",
"mdb_file_name" => "Nombre del fichero:",
"mdb_start" => "Empezar",
"mdb_no_function_checked" => "No se ha seleccionado ninguna función",
"mdb_write_error" => "La escritura del fichero de copia de seguridad ha fallado.<br>Compruebe los permisos del directorio 'files/'",

//import/export.php
"iex_file" => "Archivo",
"iex_file_name" => "Nombre del fichero iCal",
"iex_file_description" => "Descripción del archivo iCal",
"iex_filters" => "Filtros de evento",
"iex_upload_ics" => "Archivo&nbsp;iCal",
"iex_create_ics" => "Crear archivo iCal",
"iex_upload_csv" => "Archivo CSV",
"iex_upload_file" => "Subir archivo",
"iex_create_file" => "Crear archivo",
"iex_download_file" => "Descargar archivo",
"iex_fields_sep_by" => "Separador de campos",
"iex_birthday_cat_id" => "Categoría de cumpleaños",
"iex_default_cat_id" => "Categoría por defecto",
"iex_if_no_cat" => "si no hay categoría",
"iex_import_events_from_date" => "Eventos a partir del",
"iex_see_insert" => "Vea las instrucciones a la derecha",
"iex_no_file_name" => "Falta el nombre del archivo",
"iex_inval_field_sep" => "separador de campos inválido o ausente",
"iex_no_begin_tag" => "archivo iCal inválido (falta etiqueta BEGIN)",
"iex_date_format" => "Formato de fecha",
"iex_time_format" => "Formato de hora",
"iex_number_of_errors" => "Número de errores en listados",
"iex_bgnd_highlighted" => "fondo coloreado",
"iex_verify_event_list" => "Verifique la lista de eventos, corríjala y haga clic",
"iex_add_events" => "Añadir eventos a la base de datos",
"iex_select_birthday_delete" => "Seleccione los cumpleaños y las casillas de borrar que desee",
"iex_select_delete_ignore" => "Seleccione la casilla borrar para ignorar el evento",
"iex_title" => "Título",
"iex_venue" => "Ubicación",
"iex_owner" => "Propietario",
"iex_category" => "Categoría",
"iex_date" => "Fecha",
"iex_end_date" => "Fecha final",
"iex_start_time" => "Comienzo",
"iex_end_time" => "Hora final",
"iex_description" => "Descripción",
"iex_birthday" => "Cumpleaños",
"iex_delete" => "Borrar",
"iex_events_added" => "eventos agregados",
"iex_events_dropped" => "eventos eliminados (preexistentes)",
"iex_db_error" => "Error en la base de datos",
"iex_ics_file_error_on_line" => "Error en el archivo iCal, línea",
"iex_occurring_between" => "Ocurre entre",
"iex_changed_between" => "Añadido/modificado entre",
"iex_select_date" => "Seleccionar fecha",
"iex_select_start_date" => "Seleccionar fecha inicial",
"iex_select_end_date" => "Seleccionar fecha final",
"iex_all_cats" => "todas las categorías",
"iex_all_users" => "todos los usuarios",
"iex_no_events_found" => "No hay eventos",
"iex_file_created" => "Archivo creado",
"iex_write error" => "La escritura del archivo exportado ha fallado.<br>Compruebe los permisos del directorio 'files/'",

//lcalcron.php
"cro_sum_header" => "RESUMEN DE TAREAS CRON",
"cro_sum_trailer" => "FIN DEL RESUMEN",

//eventchk.php
"evc_sum_title" => "EVENTS EXPIRED",
"evc_nr_deleted" => "Number of events deleted",

//notify.php
"not_sum_title" => "RECORDATORIOS POR CORREO ELECTRÓNICO",
"not_not_sent_to" => "Recordatorios enviados a",
"not_no_not_dates_due" => "No hay fecha de recordatorio pendientes",
"not_all_day" => "Todo el día ",
"not_mailer" => "mailer",
"not_subject" => "Tema",
"not_event_due_in" => "El evento siguiente ocurrirá en",
"not_due_in" => "Ocurrido en",
"not_days" => "día(s)",
"not_date_time" => "Fecha / hora",
"not_title" => "Título",
"not_sender" => "Remitente",
"not_venue" => "Ubicación del evento",
"not_description" => "Descripción",
"not_category" => "Categoría",
"not_status" => "Estado",
"not_open_calendar" => "Abre el calendario",

//sendchg.php
"sch_sum_title" => "CAMBIOS DEL CALENDARIO",
"sch_nr_changes_last" => "Número de cambios en los últimos",
"sch_report_sent_to" => "Informe enviado a",
"sch_no_report_sent" => "No se ha enviado informe por correo electrónico´",
"sch_days" => "día(s)",

//userchk.php
"usc_sum_title" => "COMPROBACIONES DE CUENTAS DE USUARIO",
"usc_nr_accounts_deleted" => "Número de cuentas borradas",
"usc_no_accounts_deleted" => "No se ha borrado ninguna cuenta",

//explanations
"xpl_manage_db" =>
"<h4>Instrucciones para gestionar la base de datos</h4>
<p>En esta página puede seleccionar las siguientes funciones:</p>
<h5>Verificar y corregir la base de datos</h5>
<p>Esta función revisará las tablas del calendario en la base de datos y comprobará los errores. 
Los errores serán reparados, si es posible.</p>
<p>Si las vistas del calendario no muestran problemas, con ejecutar esta función anualmente será suficiente.</p>
<h5>Compactar la base de datos</h5>
<p>Cuando un usuario elimina un evento, el evento se marca como eliminado, pero no
se borra de la base de datos. Al compactar la base de datos, la función eliminará
definitiva y permanentemente los eventos que hayan sido borrados hace más de 30 días, liberando espacio en 
el disco.</p>
<h5>Copia de seguridad de la base de datos</h5>
<p>Esta función creará una copia de seguridad completa de la base de datos del calendario 
(tablas, estructura y contenido) en formato .sql. La copia será guardada en el directorio 
<strong>files/</strong> con el nombre: 
<kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (donde 'yyyymmdd' = año, mes, día, 
y hhmmss = hora, minutos y segundos.</p>
<p>Esta copia de seguridad podrá ser utilizada para restaurar la base de datos en caso de desastre
del servidor, por ejemplo importando el archivo mediante <strong>phpMyAdmin</strong> (herramienta 
que está disponible en la mayoría de servidores de hospedaje.</p>",

"xpl_import_csv" =>
"<h4>Instrucciones de importación de CSV</h4>
<p>Este formulario se utiliza para importar al calendario archivos de texto con datos 
separados por comas <strong>Comma Separated Values (CSV)</strong> con datos de eventos.</p>
<p>El orden de las columnas en el archivo CSV debe ser: título, ubicación, category_id (ver más abajo), 
fecha inicial, fecha final, hora inicial, hora final y descripción. La primera fila
utilizada para desribir el contenido de las columnas será ignorada.</p>
<h5>Archivo CSV de ejemplo</h5>
<p>Los archivos CSV de ejemplo se encuentran en el directorio 'files/' del paquete que desacargó 
de LuxCal.</p>
<h5>Formato y de fecha y hora</h5>
<p>El formato de fecha y hora seleccionados a la izquierda deben coincidir con los correspondientes en 
el archivo CSV que se va a subir.</p>
<h5>Tabla de categorías</h5>
<p>La agenda del sistema usa múmeros únicos o llaves para identificar las categorías. 
Estos números o ID de las categorías deben coincidir en el archivo CSV con los de la agenda 
o estar en blanco.</p>
<p>Si en el campo siguiente desea asignar eventos como 'cumpleaños', el <strong>ID de la
categoría de cumpleaños</strong> debe corresponder con el de la lista de categorías que figura a 
continuación.</p>
<br>
<p>En el calendario están definidas las siguientes categorías:</p>",

"xpl_import_ical" =>
"<h4>Instrucciones</h4>
<p>Este formulario sirve para importar un archivo <strong>iCal</strong> con eventos a la agenda del sistema.</p>
<p>El archvo debe seguir las especificaciones [<u><a href='http://tools.ietf.org/html/rfc5545'
target='_blank'>RFC5545 standard</a></u>] de la Internet Engineering Task Force (IETF).</p>
<p>Sólo se importaránlos eventos, el resto de elementos del fichero iCal serán ignorados.</p>
<br>
<h5>Tabla de Categorías</h5>
<p>La agenda del sistema usa múmeros únicos o llaves para identificar las categorías. 
Estos números o ID de las categorías deben coincidir en el archivo CSV con los de la agenda 
o estar en blanco.</p>
<p>Si en el campo siguiente desea asignar eventos como 'cumpleaños', el <strong>ID de la
categoría de cumpleaños</strong> debe corresponder con el de la lista de categorías que figura a 
continuación.</p>
<br>
<p>En el calendario están definidas las siguientes categorías:</p>",

"xpl_export_ical" =>
"<h4>Instrucciones</h4>
<br>
<p>Este formulario sirve para exportar los eventos de la agenda en formato <strong>iCal</strong>
de acuerdo a la especificación [<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 standard</a></u>]
de la Internet Engineering Task Force (IETF).</p>
<p>El <b>nombre del fichero iCal</b> (sin extensión) es opcional. Los ficheros creados serán
almacenados en el directorio \"files/\" del servidor con el nombre especificado, 
o con el nombre \"luxcal\". La extensión del fichero será <b>.ics</b>. 
Los ficheros existentes en el directorio \"files/\" del servidor serán reemplazados si tienen el 
mismo nombre.</p>
<p>La descripción que se introduce en el formulario es opcional. Si se indica, se añadirá a la 
cabecera del archvo exportado.</p>
<p>Los eventos a exportar pueden ser filtrados por:</p>
<ul>
<li>propietario</li>
<li>categoría</li>
<li>comienzo del evento</li>
<li>fecha de alta/modificación del evento</li>
</ul>
<p>Cada filtro es opcional. La fecha en blanco significa \"Sin límite\"</p>
<p>Al <b>descargar</b> el fichero iCal exportado, se añadirá la fecha y la hora al nombre del fichero.</p>"
);
?>
