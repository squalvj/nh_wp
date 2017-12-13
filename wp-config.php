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
define('DB_NAME', 'noblehouse');

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
define('WP_CACHE', false);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'z0(/!&_[#&RLjgF7Ni7_rW?Qb6]iFCF/-^+A?zv1(=RV8569{?Tgc[0N{&CZY~`[');
define('SECURE_AUTH_KEY',  'Dm Z.8>NhKCK:}*7rLX(&$}[+Mm024:>:0b_IyVnQ<^7=1{ @61R<M .v-*Qr^t)');
define('LOGGED_IN_KEY',    '!^*qhB#~>{A&1qLhWw!~@]d|yg .fqb=aBNq6<{N.8u,v~oBID9Ys^@=jF-aer3n');
define('NONCE_KEY',        '>%wweY,oD#.Pog3y2}s7U}O_i*?*8zSD%msx? >4/E /jLVj9ge2A4XEEh65y9qS');
define('AUTH_SALT',        ')T}8<?8Hs+`,~:*0vMjdOTMDXz z3N<~9;eL70t/]+9|K8)E`M|[]xoD#Ap(&Z%C');
define('SECURE_AUTH_SALT', '*rem4t$,9o~CZpSCU2),x].k8]q}n:6im+D{f:#)nJUl!XdvavRe`t.wiohI1r0{');
define('LOGGED_IN_SALT',   'A+.ESGV@*RS/vj^4[rA^3i)3.E<=Slgb|7.U?C1q+@GUg`q)lfU6 .a3%+wY7xy[');
define('NONCE_SALT',       '*[Y:,$i6;]HaKS&JK?{J*w/=e!I#|pYWnacO$cJ9opK$10sROTI?<08g<$(eG1ez');

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
