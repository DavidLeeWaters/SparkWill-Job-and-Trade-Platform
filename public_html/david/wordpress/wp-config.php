<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'chocomilkdb');

/** MySQL database username */
define('DB_USER', 'davidwaters2');

/** MySQL database password */
define('DB_PASSWORD', 'Newlife4me!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'xc!`G2}jB2fNtdwD|Ie>_m<{.s+kp;C.X_Qb#yfccC~]Zza0Hz.-iHz5b|7E,,4f');
define('SECURE_AUTH_KEY',  'xKvf)629!bmyJ%4&;jVl%51q3h[x*7VGmMT88:,xkx,wK=&.W$w pj3 H]aYJ1n*');
define('LOGGED_IN_KEY',    '=JU{fp6zE%$.o-If@9jvtP[~V<[*+go<7vA!C7NML_wW#|^CoN5e=X8[N#K6E<=b');
define('NONCE_KEY',        '02;yQEmd^ZO;)H3p 8cE92i^#6EbFeN@Ec4aY9q$ TF72XZ@5BObfT(mhsY7$w;}');
define('AUTH_SALT',        'd@RABA|g*b0N0de1-r4O|Vo#zMgBN?2|Fg*RutB}0xamfV:=iBlP$|ve?2{:(z@T');
define('SECURE_AUTH_SALT', '<-%d&YmTM (kfZ]@z*2<QmM,E?#z_/th-{.{EsyVs9QaTlxf<rKIV1hQ/6HiWK3i');
define('LOGGED_IN_SALT',   '(tQmO3^i4]ut`CsP5]34{$s(X/oY1,Gu]>}Ai|R?8h(^7M.8k}o6Pn~B5amUI_oa');
define('NONCE_SALT',       '_k]7Kq!kRzMll$=UMFy>I?#WW#B(u5=pZ5_8j`OWb{x@sk,aPG%R8QE=61-_Nu5^');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
