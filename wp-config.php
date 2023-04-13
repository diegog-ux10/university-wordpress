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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
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
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'fEc4u2MZwPbuQARFLYYCvLPzu2EwOYcoHrucFE0JlQ1GpUHb99Qn8HFjLioi9zyI' );
define( 'SECURE_AUTH_KEY',  'jT9PSBt1aSIsAEZb4dx7PcnsAymsqhysVsgUsxNHvl2Sr2gHbR9oMKcnzQLBCA2i' );
define( 'LOGGED_IN_KEY',    'vx9GsStpxbn6VMTYvpmgrbHEPV5DLbs99etDYPxWjtixRB2EUUTN7AZwkn7pIyCu' );
define( 'NONCE_KEY',        'TabYr4y4drniTecwF4uEVqxY48siPhnaPVTrQKqU8JIDNL3jg4y3TCVOyuaXVQvr' );
define( 'AUTH_SALT',        'xqXOComolWxg2qo3qW3ZAD70Do6Av1DZPuXoTbRQWRhh534W81p6YxmVK5cQCVvr' );
define( 'SECURE_AUTH_SALT', 'BiwDmNYGcCbzVGQjuxlwi7TjxAEYxzeXBRRztLZtOZ0Wa2me6QlMPxqZnHTMV9Ud' );
define( 'LOGGED_IN_SALT',   '58bjUYIuHby26z65YZhtM3KKrqAk2zQEk4dVNDryHpgrgb0YkS4aDTLjWw1ct2Wx' );
define( 'NONCE_SALT',       'lCAkknkf2Og7yamZ151IqCAemxMMiOwAdWUKH2gvOYgnSbPuWm8juS6xBgTKOXLp' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
