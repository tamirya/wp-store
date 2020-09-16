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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_custom_template' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'rS0j-[@L#4i}F]J.TFH1Xc;C4~(h@b&SrJa)O<_mb2!d@,k~>nO`_~.O^Ml$`tGN' );
define( 'SECURE_AUTH_KEY',  '<{fz0(kGUfBnh.$(<aAp+5p(#~>,l*$r2hPZl07X(H9g,q>:cf=JG#%}K<<dmsg@' );
define( 'LOGGED_IN_KEY',    '<_p]8jv)?ykUKa<J=n*>_3.Bx!OC/4U,SFt4OwM}U5|fB$;[n<~GZ]6qo|lf%g<.' );
define( 'NONCE_KEY',        'J&e0X0Zg9<}ih ~&[6w]V<H4wnjD!I.SgAP.Y!H$G^z<>7#HCScicNzRn@vU]lF+' );
define( 'AUTH_SALT',        'i#0Mrji%-dlb/)!~}ZES{&[BpDJEp&cm^Bw8I/B-G!?-ctbvK gfq?ip[^#,d@W#' );
define( 'SECURE_AUTH_SALT', 'evT@Fl5.f;/[gvSXd{lmg=:+~F97?H3eCC3IyD>cWIs?ClP:r1w}4uyOTgB-i7.L' );
define( 'LOGGED_IN_SALT',   'SX|CYg_ltS/M9{_mlwZ2we3rG/R_<%>On[nO|%zoD;+2t,Tu/.yL/Ij{^Vha81.W' );
define( 'NONCE_SALT',       ']Z_S_IIZQ[mj#A!#^#&oGn,ykNrqFE2RGMq*.?<%Eyjy^qamd^D;dN&AM=W.cw[a' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
