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
define('DB_NAME', 'alicewordpress');

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
define('AUTH_KEY',         'F9emI]sb7QZm[*May*d8@Lbp!S=lp?&ZXVHhGJvoR]MS%tdQ5p/mdtx!kE s|ABV');
define('SECURE_AUTH_KEY',  'F.TQk9gS.rA{r?lRzQa/Rs8dL@oeKEa+Dzt= jHBb1/?M2#@~DqDB)@!o/w(#f0y');
define('LOGGED_IN_KEY',    'At/b(v,LyegheH!>aRqgtr$)5#7yI=OqD<#!oOmc6+WUi{LOnOq@#1O*fhSJy4Hl');
define('NONCE_KEY',        '0yY@`5DcRN,0>s_z{0]suPMp(klD&1.g8hJ]jQ.OTk}1>n2OND@*EY8Anu(?ulA:');
define('AUTH_SALT',        'U%:x@n=OcyxB6[Q)@_Fn}?ab5:YpvjEb:|HgfMav9A/*=$yWK-I2NzatsZn@^pT=');
define('SECURE_AUTH_SALT', '6o$`Bs:V N[DJ KEMC*:ySgv8)2](|!3o(9tYfG:UV|_NN0$DYxeTC~O-_8L9$h3');
define('LOGGED_IN_SALT',   '|MW<i4}M.EJZM7ajU0V8*6v;k$9}^dryhpe@B;9|uXHZME~ABF*5Zcawh(_DnMvf');
define('NONCE_SALT',       '[}<<#[$}a3<[^RA_jB#{-XoK+!8, ]+<hNd w3O;6T}TFrD8n.{64b]u.KwtA8tj');

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
