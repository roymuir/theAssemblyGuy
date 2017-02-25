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
define('DB_NAME', 'tag');

/** MySQL database username */
define('DB_USER', 'theassemblyguy');

/** MySQL database password */
define('DB_PASSWORD', 'T_s@7A5eyesWe');

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
define('AUTH_KEY',         ';%q8q-j2<0[g|KH>%&+auVNTFe9Zc<9R21,:se0iJaR<Q[.7Pki^HP@cx$h<YNSq');
define('SECURE_AUTH_KEY',  ',e[7ZN!y^&%Xq0Acw]}GDlO9&!nRri>h+a7kv$_tZKd]]0bwh?XgwsSV<0c|Z^!&');
define('LOGGED_IN_KEY',    'rt]8hfapaBp$;@R6QZqdk R+T_q?M.(i#-`5n$Umi$(<4Nr-:+ihOwp`wIJUI*eV');
define('NONCE_KEY',        'XE<6j^kUOrPb>t`45lco*qf/b-9FBb)w Or,>~Y|E_1%12V|,|Q}NdI:`3=n|p *');
define('AUTH_SALT',        'K??v3cB`Sp0CA%kzP?Kp+Gzp+=?G)g+k+Ag+}#X $#y).Gb!y;]UYhHj7T2$oIE~');
define('SECURE_AUTH_SALT', 'Kwg4Ol&$5Xcg}gf#<$]tv4I*?jaGuyNJ9?^atE~VnYU,i|F4cdcLx4?yEp_8AaHl');
define('LOGGED_IN_SALT',   '+p_un5XVH W}C w!?*B,3?E6tJ##wL|8`H!fdM/+4k{#wZyN|-GFEvGRmH?<P(DF');
define('NONCE_SALT',       '85w%JG,oH>Y!1#(^s)]d`^DhZQ7`r7`=47eFxqvm0$v`UMomA({`t}LfKc)5/>_N');

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
