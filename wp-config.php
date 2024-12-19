<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u0618804_utv' );

/** Database username */
define( 'DB_USER', 'u0618_utv' );

/** Database password */
define( 'DB_PASSWORD', '$W3i54o0x' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define( 'AUTH_KEY',         'f$jEEMX3>_52T?ByWtPqcQ6m58fN8ECe&Q]a&wG(WH#-Ou&TuL[c{ ]r:|h6usD7' );
define( 'SECURE_AUTH_KEY',  'bmg]MCtRN#m@%BLc9ZD)E934#4yl]<eN4Kx?|- )Y?V4.VrgjDSfqJ[XGC50b?d^' );
define( 'LOGGED_IN_KEY',    '<f4ZOl9ls7~L3VQwT2BBt(7GEmlFxaWJ/ (}/rmX$@@@iJiP51qMHVis|_9u!{[+' );
define( 'NONCE_KEY',        '6*=u9X9roi~U;,v&)_?uF_WV1Hg+4`6QkyUs*]>}%!=s>CbIf!jQ|~_HuqwkX.8I' );
define( 'AUTH_SALT',        'WWpSa+Y(dI3GS-ng.JRViY@M6-[vre/^6IM)3tbSFIi(pFCs$mEUNlDC6>XDN6dV' );
define( 'SECURE_AUTH_SALT', '@=tZ<u0Z_7a41`P($`qVudt$Pq@50^nJ_!;6az$x><YOV<QJoONoc<Fcs6dC,ay+' );
define( 'LOGGED_IN_SALT',   '?zDzM.a(F}.fU2;p$E|wpJ;%bdxr_R)dXA,X~m3:?s =VFd]a6S#Hxc^sS3m9rFY' );
define( 'NONCE_SALT',       'J1A(=;F)*k 3|k[9w%ymt#c*N4oAP-rr`(aij,.}wxFLohYnHgvWaw}7Pb`N&~u.' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
