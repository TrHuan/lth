<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

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
define( 'DB_NAME', 'lth_cv' );

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
define( 'AUTH_KEY',         'A+{MrkQY%UfK<v5$$244^HvP6@,@m;cB2HUxfQ3iFA9+8yVAzD$<?/<6<$ 0:*hG' );
define( 'SECURE_AUTH_KEY',  'uu+.)xxE2:FeK!9[sQiX<d&M/>9whKIqah!yMi]]:`6+o^/7{:CjBL8A$Rx5{_}%' );
define( 'LOGGED_IN_KEY',    '7.g9tluhW&V_h#qwow^VA:r)<ey]Ffy+N^!>;Waq<,xilrv;fxH<D`>(v]b[Ujl,' );
define( 'NONCE_KEY',        '1hnQNt%co(_{K2lx+hN?f:*;Z=G8s|)`~}Ab0JU/li~_[7N3#1))1Jn!0gbtkfDE' );
define( 'AUTH_SALT',        'DOv&[Lrc=qA^WGLb4{ sGJnY}K0iW3$^D#e`GDYUZi5Ej.a#[tbH9yv.6cjhCY(i' );
define( 'SECURE_AUTH_SALT', 'am=hTMtwy)|^Ir].j2nF;JGkbr#[XSX[IFx}!{t7*6.KTD^^h_<=l;Maza`iC>=i' );
define( 'LOGGED_IN_SALT',   'tDt,XT4`07E(->8OjfebknUE%!*PqcN3~6EGCourrQx1aQ3Q&N*|IlnQQX}A8VGO' );
define( 'NONCE_SALT',       'D_&#]Wgun*NzF}Rw!,lM>ta7+k{(%xWL{_Ekh4G^WRj]/d>_qt2Qh?+J4&KYLyDT' );

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
