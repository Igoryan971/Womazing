<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'cm78278_igor' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'cm78278_igor' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'Erarov95' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7K.$=9<+`a ){<S8?$@Re1(pUGJ2634IA1Y~FRX#2ZQ`E#[c#`39Yp.xL>JVM({W' );
define( 'SECURE_AUTH_KEY',  'FZ0neW~oTs>!94`-p^`jdj7v<og_#K)P;H(RU323C2Q4Y_D5<SAi9ht9BlNOi-38' );
define( 'LOGGED_IN_KEY',    '@Wg?}j$/U?}zzv.42bACx4VQgaktZP!m3r35 pwU/I=<(_{$mP:m>p-Sc-z!cu*D' );
define( 'NONCE_KEY',        'L?yB/olC-]_gc4#BtbR*Fw,73IsM4cM3(F;hN3j!*`v-2=(iMOBx3nG^X{%:{nun' );
define( 'AUTH_SALT',        '%?N(F6#@bF8.]<#3*ywfb}9OqAY/bqdd_r0V1pb?P:^hse:ERZ)HBHL0Q<^z)L25' );
define( 'SECURE_AUTH_SALT', '9vKjbVV=-bU+kT[&[r~08TU(Wm<t8Nci[$4U=(&?Ug|:9c=p3qF2]t0P?>k}l}@g' );
define( 'LOGGED_IN_SALT',   'c9llT6ao{(|g lA]K_1[YDD>>td~;sUmh#xHh=09loVkY(D[#el/2&|)m=-e&a@1' );
define( 'NONCE_SALT',       'J7!w2O]ZZECDgqU+toAz5#WBQ%Jb&psmI1>iMw1+DM` 4Y3ciR]glGIWZnJZ}I;D' );

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
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
