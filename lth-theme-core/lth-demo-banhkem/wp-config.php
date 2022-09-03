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
define( 'DB_NAME', 'lth_demo_banhkem' );

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
define( 'AUTH_KEY',         'E)fAttXuX>N]m=0|G3oCQhBQGOrzW7%*KRgJim&F{oZ-Q}(AK]!im8UvR<x~g~s[' );
define( 'SECURE_AUTH_KEY',  'kF(>re.9:zSf}Rx>4Va1iomp@:<KLTw?S6D^6qFWn8HgRlU~ne;.z^,70:`Hr VC' );
define( 'LOGGED_IN_KEY',    'FHLa[Hbx7;5wWmn%+g2lEda/[B{B}:{$q)zVe#S5/G UHmsl$3sr]]*K%*e]~O7J' );
define( 'NONCE_KEY',        'G.-ExXG%r1Iz2-nHN}:IKcI*ySh4:S}/(~FDi7YT>)7oDayC-tw#}s}(9gEg~$ur' );
define( 'AUTH_SALT',        'Iuwj%*nKd}/1enPu8^2lQt;dn=#H8Ii9lZUzTK0Gd&r-/6NYD>h/abJj5M1d$,_@' );
define( 'SECURE_AUTH_SALT', 'cAJvJ}!|PdHpj=3oM[$$+KN`8[-1B2Pu v6at4[UC5h!46@%Vm1VqG0h3%vO!{V6' );
define( 'LOGGED_IN_SALT',   'qs/n|dO(y=z,Nv2]y=zm4B(|bp.tqT#NFE|92JMcm,tX]hy.$FQKc)N__SO&k,{d' );
define( 'NONCE_SALT',       'K*677}mfZgq7d!@/~gPQ@;k_dao:##8pOgPUV7Z@_^fP]xYU,TQhO5Ca~TS_K2>s' );

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
