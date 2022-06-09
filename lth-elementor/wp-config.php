<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lth_elementor' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1|N{.`-]0d6EWc[Idc7xHzox3lSa}{glW%TUXQ-p%H=3fs2+D!@r.ag+-:UDQJrr' );
define( 'SECURE_AUTH_KEY',  ';!6oz?YIJxU8xril$2%+g)XhxhG{F,=_1R=Mg&!E.dt3>z0!0+BzyB!g9EB24%m%' );
define( 'LOGGED_IN_KEY',    'F;~`A:^@0lL+J8]=h1UAX1P1n{!mKRn*@s1GL465ALhjCFAQT-[ib.3R,zYnhL?a' );
define( 'NONCE_KEY',        'm^`cWuNXuQC`dXWX^4[HB5,3)z{Eh=m[`)EJ*@;C?1cghEbDq0K:?K7wKYMYU~=u' );
define( 'AUTH_SALT',        'y))vl)iOa7HxV>H&zK4kY]zYR@s<z|<OJUc/v]UF_YDmSfJPgk-)A@[=(CB^;U+H' );
define( 'SECURE_AUTH_SALT', ';yYz4.zHOW#WIwQo-k2J_g|U+?uhd:(4AX>B{iV1xzbL<*{KtfTi(phn4D_2ZX},' );
define( 'LOGGED_IN_SALT',   'A7!|Ri[ps>-iXWdbfP=>$S ),Nxh4,iqk{M;tF(,yj?8g6*m6y?DBeA<Nvf?Wu}E' );
define( 'NONCE_SALT',       '?Gg 3SUh_hH{_X=~:Xz,X<XDQo5n4BsJ@,EMg#P!G>6wB_JbrK_-/vwkPxxBqpLK' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
