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
define( 'DB_NAME', 'lth_test' );

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
define( 'AUTH_KEY',         'c^F#2Ttc*OPhH`3qY{b/D8{HV[SX2w}yAZ3yHqs(UQI2->^21+U/7s(1:R@3A`i_' );
define( 'SECURE_AUTH_KEY',  'q&Y/?UYqD1zy^&7x0f0q3%nvZwvosC0bgp#Cs9%en|)&n`)$6.5-KtCYiG^Jy8nO' );
define( 'LOGGED_IN_KEY',    'QihX=[Hub~@t2sk$`_RSF0Y NT~MKt8$2];<R|NjtJHh]g)wYd552 ~@4@ev!p`W' );
define( 'NONCE_KEY',        '~{@b!zr.Ow?o1ak_5Q(f^#>7.19>n~M.vD=B)]7x@!RGr>s;4#[9.u=~t[/n)a>s' );
define( 'AUTH_SALT',        '37aM;xo&CXgabgRV=su>Y|(P?zO=K;rA&,3m.qzM0MxBA2`23BnVq|vog$UZ# w^' );
define( 'SECURE_AUTH_SALT', ';+!l(m1d/$=).n-Ms8@UCu<omXjfUs}NH~QcnB~gABalL<BTDpGD4?A%s)M+tN2@' );
define( 'LOGGED_IN_SALT',   '75.C[yPp~PM=eEw6~bCW=-2ZvOb?$*,RmU96#L1ZI$~z_30x15D8Dx$m<)BQ;9iy' );
define( 'NONCE_SALT',       'YX5!E9M`FZ*f>**d1]]`Badz=kK%-}v7q8fr$],w@LSZkw:@:YY|>#(|T{ujILJ+' );

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
