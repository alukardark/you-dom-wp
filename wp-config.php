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
define('DB_NAME', 'u462506');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', '192.168.1.132');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Ja}[K^lG=po6;:|?r 9-G3Fqgxb0P8 WyXS:bN*h*M]i9eKS1{j0p.N8[KoL!~_-');
define('SECURE_AUTH_KEY',  'iC9=ucS>&%84=uR`pWj/D2MI?YL:y-}a{tzFUe7#@2fu%GWTJJ%s8@I~h!#JImtb');
define('LOGGED_IN_KEY',    ';OdEm_0w+ PM{SPFH5LKHv4s;*-[%=#d(lbCP|PL0iYD66*^o2X6 b8HA>mhkt%z');
define('NONCE_KEY',        '}E5HU?+8j+DB;A^rkhL,b:w>r,;eKG1m5m{r/R1^36$O]`aVLyo;CyB75fS{_y@[');
define('AUTH_SALT',        'Jc4ku%_wN^mtIty1xVo4RuTZ$ v_4#A4,4?-2+_ oD7.OHhB2?D(-x@ER2b;0l~|');
define('SECURE_AUTH_SALT', '/(jTWSPye)O2*+FXalQHo3yz|5U[Qot!Cfrdq)s=hA;%pb<z-lXz16NPH~E[taKa');
define('LOGGED_IN_SALT',   '{>h{<96/jewV7a#g(B{/*Ao#(sq&G7,>;jvnGqEg<sBCeEZ~Ja3%aX#YHd>2B#Vl');
define('NONCE_SALT',       '?0s&c<REt/4?E{]D6O!A>k{&J&5pJCyKyp awg/qs[<<k&&0yA76(+EmftO>$6YD');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

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
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
define('WPCF7_AUTOP', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
