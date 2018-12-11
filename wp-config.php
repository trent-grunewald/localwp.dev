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
define('DB_NAME', 'localwp');

/** MySQL database username */
define('DB_USER', 'wpuser');

/** MySQL database password */
define('DB_PASSWORD', 'N6Z3mRyjGRW4SXn5');

/** MySQL hostname */
define('DB_HOST', 'localhost:8889');

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
define('AUTH_KEY',         'T;nrcMdjaYE,+tt)6I X+57O]8AMo3%Bp>w3!NMhQa}9o&&tXQQoBR]$v|q] ~e|');
define('SECURE_AUTH_KEY',  'QBaw6fy;EL4o05L `q=0?+?Lb0nX9qNmNQhb0{:E})O#~9C~ zL[AxB6-Dr5FQg{');
define('LOGGED_IN_KEY',    'Lqi{CZP86 x6ysi4T/[N`):7P!^rA|3dlg^hdikmbv.(/;6,!6s@[<xCCq:$M.Gy');
define('NONCE_KEY',        'AGiUA`&zd+jO=w _*(tYYwKw<.`(ZVg.WUdK/uKM0*^ Ac^Z8_g:2.k</ORp:^fW');
define('AUTH_SALT',        '}N+D?NuND4^3HEUb%y3y*Y/Em.ZIQsC&H-.*0,-NX@wACce1J84#pyJI5%%Bk9,I');
define('SECURE_AUTH_SALT', 'nY7MQG0EDtH%NW2)CyP4zWuB}Nmh4%,jwFH9849pGh<BGjXw0A> D<2*v;@#>yzL');
define('LOGGED_IN_SALT',   '[48Ts3~9IJ}6*E2p/^p`6{@Swd&.+*5Ab5n7HH!VTp1ec2_4[DYFDlFb|Y.Snj=g');
define('NONCE_SALT',       '54 (4CQyOQL[T&OeD<(TM`T:S2z(cJe%@c=opIjJv;e]C)+MaSsyi_mS(2]JlclX');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'localwp_';

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
