<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
// define('DB_NAME', 'Friendshop');
define('DB_NAME', 'friend');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '74rsWSJBn,:$8Uf_$Kt+L*!#vgd<c`uyU9:]7Y+!xL{OyK23{VpF=drJU7h/^:=7');
define('SECURE_AUTH_KEY',  '}:1-.Q&y-|dz:B#Y/7}aA7agT^I&^~{O)|{G9NGxYXmQ&v^=@7u8u!Y!8w<)jaS.');
define('LOGGED_IN_KEY',    ')N3LrvZyDwOU5H ~EsVoijm.50]*AtD:Orps s*L|VxH9 [Jv(Dg @+IG9q-G31k');
define('NONCE_KEY',        'dMQ+^WQ[z?OmmaKL,3k;*Y%2^2]N,Lu#YPht5>Ch P]SgH9<N)FSB}%`7^ZP7|]|');
define('AUTH_SALT',        '!k_r%H/>kpaIUr?Svm#g+ejlQ6OLI_M_y0E$)Xz%adQ@q7c$+0w. JYO^+|T~s24');
define('SECURE_AUTH_SALT', 'r9RAM|.[^3(y-!rnCCR&Dx,|:)vXNV}+RbWpG7<8?/w62H$1PbA^m&6r[G-#?C-7');
define('LOGGED_IN_SALT',   ';^2{uK-REbeE7[uj~?R-V.%%PKQ}QA7Htb`Yfab6C!,nq$p4Y%`X!eGryftMy705');
define('NONCE_SALT',       'DkMxdr-$pjtzzeb6B/sX|D0KWW75[OLZ,-Be{2ag ~+HB4mmpuA6O<LVOBvEb#T>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
