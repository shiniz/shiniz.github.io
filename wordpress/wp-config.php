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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '_Uk#r~}gP2AU{Pf`I%vQeP&XGq=ZrSN=sH>gu8L~NgNcZiG-(f>k. }`&/LOJOqX');
define('SECURE_AUTH_KEY',  'y~9&Ik!/msDbUb=xuQDh>~pBJV-a(hk@3SCBD|#[hg.v4<4PJ]a,y~`]%V$m]D{K');
define('LOGGED_IN_KEY',    'QgGDOEtDNnXA$N]lPgjvlA-[Bv:w5|8?ZNN76:JT+E~yG2v!Eu[#n27K{=&c[tT.');
define('NONCE_KEY',        '[=9a*SPfhN{lf[TqZ$PzM8hWz-#c&L)A-9=#MN-&=;#hTM1z~{]1jr4W1:0x3y:z');
define('AUTH_SALT',        'C>@ut*ekBDp/PHIwQlFZsaPENEW.:E9Et*xnsc9I.nAkSZpUo@gs@IVf&xEC=vv}');
define('SECURE_AUTH_SALT', 'R6tA_z&e}v ~*&AmBb4s2-P#;t2_H8&9e|ws>3f4ks`1_yOiP0y>Ta-c|nfpF.*(');
define('LOGGED_IN_SALT',   'rzaLKQ}wbE:6R+N>E2WSTT3E6b!e(HTH}uWcRp$8[c9x^,WV-]{hV~aC9o}!~moi');
define('NONCE_SALT',       '/@|Ex7}-^-b+*8h)>.5xL`Sq-ckuMo-p_A!Ey#^<:Eoo;W%4bj;8RgDWiO+eXZ.l');

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
@ini_set( ‘upload_max_size’ , ‘100M’ );
