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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_develop' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'f%>s1u[UpBo$8P-B%^Tokk)pH^t0TD!R-d,#hc/xf<HbVQP]_ vNGJ*>)ola-6FW' );
define( 'SECURE_AUTH_KEY',   '#xC1>f<q,g0mQDOzU0n:`Lp4.EtqN3qf[QEp$=`dAqD9jp,qu3H!~:p m%KD^*;(' );
define( 'LOGGED_IN_KEY',     '=p#@+,Isg.5#ij}`,,q|wp|=d`FtA&1#iNT&Tl}:RhcR^PepnX<]hv{D+Koc{kS7' );
define( 'NONCE_KEY',         'C[kcCR &#5]~P-fSF>d@X>V7Xemm&2oI!V|w3s>Y>a<HyI/,;0CAXua}y+zNN2Oi' );
define( 'AUTH_SALT',         '2.;2WW%8Js4y+.fC6(!QPQ2&OM18UTw&}7P%,B9.=w?uNB}iWL:evjOEbNMxf(B]' );
define( 'SECURE_AUTH_SALT',  '2e/=${5MEKzEjq-^CxhLC:p2o[&|HYd)~eS&OyE.(8%Kix;_/%G?[>v%64$Te19J' );
define( 'LOGGED_IN_SALT',    ')#O#W!U@ssZ@SZ~>hB>Pjc+OQoQvw?]?ac)x}bbF]zG:CrqH6/S<h<J>W>g}Q:uN' );
define( 'NONCE_SALT',        'OF;)+>kl<ZDi6DN=wb:rU:<up|kGu/^A>~d}Yb(DrSNKRV6d.w.*}Qt1rI+;*ok?' );
define( 'WP_CACHE_KEY_SALT', 'M^|d_|xu*OhA[iZeZ0Zxh2{^Ep #SjO;27HbX]f {G+YRZKTkT#*2A:#=_KXm8oG' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
}

define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'SCRIPT_DEBUG', true );
define( 'WP_ENVIRONMENT_TYPE', 'local' );
define( 'WP_DEVELOPMENT_MODE', 'theme' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
