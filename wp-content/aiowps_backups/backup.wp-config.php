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
define( 'DB_NAME', 'wp_metro' );

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
define( 'AUTH_KEY',         'R];ng3s_Y]{Y<<lM?6^5Gg.?::afE#HL[mf)M$E>Z*68taQ*Yj&qy]YD&[VmB^Ir' );
define( 'SECURE_AUTH_KEY',  'm>a4^v`WGd8*,6=`19cDY,j0E)JC}-xNz@PXxZqDrhXjK10L!,p!7mmCA^G%fN?%' );
define( 'LOGGED_IN_KEY',    '^~^rk4nXCs t5>i%t{n3RwpMq}p!]V1rE@QYV%gVF{QemS&n-WJYekgvA8Gl;[QH' );
define( 'NONCE_KEY',        'PeJU!pG.Do7s&TW{xfsce8%Ve23Y`AkU/6, wT3yAS0#U>@X@i6,CY=K&2EpuY=6' );
define( 'AUTH_SALT',        'nK^/{f5cJRLR?!b/_X1@^P>t~firK33rt=o#wgryJ=T(<mhKX.V2F/fY6Y)hkuOK' );
define( 'SECURE_AUTH_SALT', '3t*,9$j7U#&E+;/li33zwQs~}x@Ii;cz-o]$F0:Ng$s3A4CCCTEV!nb:8/c Ax!b' );
define( 'LOGGED_IN_SALT',   '@8n/A[h6Iu?2cqlDRZf O$$]N`< )L{Lft_F{/HUxFle}mWyj5=kLAU=s][1BKdf' );
define( 'NONCE_SALT',       'MEY#m8u_OvgOOI9 zw/Bk)1pDbK~)wX{*1[WAZYnt>53iw(z:$|y<WHqLWsCFwq5' );

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

define('FS_METHOD','direct');

define( 'WP_CACHE', true ); // Added by Hummingbird
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
