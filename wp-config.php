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
define( 'DB_NAME', 'university' );

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
define( 'AUTH_KEY',         'E_<?|Sk[)1sW03FG.mrNr!`i+-X&vUOBPQU=hs@AA)w`{Nn7Io0-a*e;q_}u0*~S' );
define( 'SECURE_AUTH_KEY',  'qib%25o6xX>0o5Y|c6QIs4v}]GS_d(N|UlEht-{33gnF/q J}zLwXaXp$z|S#A[v' );
define( 'LOGGED_IN_KEY',    ')!B]E776YQWArDA9hmS,qj cS}B,)f=17}PYFnD]._HG>]h67L{j!FD%O3 OC^rI' );
define( 'NONCE_KEY',        'dP9IG7xE@L!u$J*?OMA+y>!o/E5JN|[|q[A3n^|1z ;_awHw3;@U=Lvssp$P=%f9' );
define( 'AUTH_SALT',        '4m?xa<!^ZW^jlU9m+M&3uBV7&_1+?JA#@M7|*(VSvn)688GH1fm5n:g@Us[_G&?`' );
define( 'SECURE_AUTH_SALT', '&u6~{(wj=%Ju&s~,|id2slSgUbU+!i24 ^BmxR3la5|,]ndRx_}2~D[5v0jhD};H' );
define( 'LOGGED_IN_SALT',   'Q2N5YPse.Dmk#P)0:P~:9#<1xmOV|Xl%[EC`kU2<%zkR:OmqKL&X~pu~)DHL17kn' );
define( 'NONCE_SALT',       'Q(mZxB#5??[NA`[pc9<vksToDQ [_:4%ovY3$[y@yku/hwwIh@UZlbSe~%9S5TK_' );

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
