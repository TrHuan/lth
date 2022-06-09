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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lth_theme' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         ',lRv@kdur+-ESE]sK--`iEMA;I|k3Tlw0M2j(V>8az+$$lpoFoj#:XnPJjNl49g1' );
define( 'SECURE_AUTH_KEY',  'R4r17?kg?*D3h.7X9?Ilg^,v~eEC^ZO&{!;)zMraA&$fZGZ{Ok>DS6cDV)aiG `[' );
define( 'LOGGED_IN_KEY',    '?BO1`N#XB+:J^aaEna:%+[=M}AFK`ZdO]ak@qFBa$n8A x#?<WmL.e)X|trmmzv-' );
define( 'NONCE_KEY',        'F9%_{Dr^Miw#Jy1LL{dr`c|kS?W1O0twPxah&3.7X+s31$;U[J{m+`rn=Px[t9Ex' );
define( 'AUTH_SALT',        'D?l)Poi1/gCKX/IFTA&f W_X)(3WJ+ K$$)sKR>5++BH{!R;ZWP<%Nop%bEtCTIX' );
define( 'SECURE_AUTH_SALT', '(mUn`%5#:qt2F!|a(7GrIUShv&_Wh[H~.3[u/@.2.2A~JMe&aa> ,H1MIZuR>@&z' );
define( 'LOGGED_IN_SALT',   '{$P:Vy!`?dd9[Zbz;WA3lI6XNOBd9{C?Fygz[vj:cT5m9%l4t[9%/PT+KBSgQV,}' );
define( 'NONCE_SALT',       '&TwHhEQn?a?F5eQ 1N-hV6%Qu,:D]%8^Pq=~z@@|?R]l>H<;yQP>DMpz8Xy$<F}*' );

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
