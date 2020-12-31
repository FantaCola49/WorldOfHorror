<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'creepy_site' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'mysql' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'mysql' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'N8u>7=v3x%)<SM~GeLN#m~}_f3j5{|lAObLhz&KE<S=]IY$mu9ZZG#s6=Z#bjDPf' );
define( 'SECURE_AUTH_KEY',  '+:>P:87*6,emW_H]mYBwX2>Fy~y=3.jP+0M.WJ/KxuZ`,ym!T4H5<|~4Y$X$liMZ' );
define( 'LOGGED_IN_KEY',    '(5Qf/;@nXU{B!,RtWy &9Dne7$4=(a)Fd`khHo3a_DJ]/cd;.dPF]hQksv^e>-e9' );
define( 'NONCE_KEY',        'Xs+X)&@<GcEP6CB1V)0fdOl1;&{s{w=7W~9f^^ttueUhaC{a&:]jMTqwlMy@Ay<u' );
define( 'AUTH_SALT',        '%,(QMvlzE%3iv5fUc7tGz,V9-JLo{l o%NrmN*iQ.NOwf=Rm|QxpiF<pi*X7.,|(' );
define( 'SECURE_AUTH_SALT', '=usFk?saoVTGC@R`2PUxJqQ7Uz*3!}sWrD^&a(24v^BD.Di Go)8yr}xtc4(<#)(' );
define( 'LOGGED_IN_SALT',   '+<^`5_sA@NCZ6XT![<meto2 wt>ZFu5:2&O753+zX^dH`q|!EHwkXHJJ;?yOS3NB' );
define( 'NONCE_SALT',       '2lL@;7X3^:L}KlAb$5/_CT5jA$uO}^Sl85MV!PC`EvL{?;9[UFyS.eqhd-T0!{R+' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
