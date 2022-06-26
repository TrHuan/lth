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
define( 'DB_NAME', 'lth_flatsome' );

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
define( 'AUTH_KEY',         'elHr*ul8E~7Bcd;d^*]uDBP^/lkmmUcsz*@, jo>6#&>CM)+]?Q~4XRQ<&{3==(2' );
define( 'SECURE_AUTH_KEY',  '/WvM1gUC,_:<qYTiJw76ej(relI)C*38^XHeZ?j|IAcd?#}*${q.#Rs+eyjpKjGp' );
define( 'LOGGED_IN_KEY',    'qW`}qTDh, (N=Z:9%*dlAeteb#6ncLLZyQrL J6fOwD=KXD,&W}sV3zay{zwH~/R' );
define( 'NONCE_KEY',        'y,d(2z3<>wcH.h$4zZy6|O8n[/-O]rK$srBlL8!2H@8KA*Bo?Y1_dMclTa$ phu{' );
define( 'AUTH_SALT',        ',N<t #%K)8t@l_iN;F`@~1xc A8)l9PN&mdy9,2*9^O>`cPGt0r{XYnC5^I2m~Gq' );
define( 'SECURE_AUTH_SALT', '[#LC-HmK/i;k?2AD+jrxa8|pWP`XXRXnB./|Lh2SONSy)$6]8i?tR1;@Fu-a~-{L' );
define( 'LOGGED_IN_SALT',   'Q>naz-3I=M2o*Vim>u3UmaxHCVWOT#,U5:xem;[SWt*g?TC-U-+YEG5.!S]mF_#e' );
define( 'NONCE_SALT',       'slSlu<*n)zBfMRi=i$^6+KP#y2lj[(`i-X~ySHYv)S5iA2@5S|+F2crWi^RP2=Tf' );

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
