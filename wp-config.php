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
define( 'DB_NAME', 'byo' );

/** Database username */
define( 'DB_USER', 'byo_admin' );

/** Database password */
define( 'DB_PASSWORD', 't!dyQasgiCSJ' );

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
define( 'AUTH_KEY',         '$-c7?NL}jRN&%mA1)e,RZ$YQY.}i;w!+/[_zWv lS^D{HGbQL[FF:LMu XL$FYNp' );
define( 'SECURE_AUTH_KEY',  '9!!J_/5:.I8D_zOsPc<b)CPG>6^/9VX%wr:<JY<1j<Opq]h7Yj%VC* R1RwhhcdN' );
define( 'LOGGED_IN_KEY',    'Pc~HOp4mNlS]+(roj~F9y/XjTf=3)sKj8tNk^Q3NSMI/9K`SoFW<Sdj(ZOB99v(C' );
define( 'NONCE_KEY',        'yBnAO&9{+J3uduIZJ:Qz13dmDCkhh`nKK|ce3=rjb[+LZ/g3:hdXc1$.NEv#M~U5' );
define( 'AUTH_SALT',        '88|D{gF*Wy+H=5=Kx=*%sV7e^ya8sJ3PJaiO  ;8UP}IKC%;h}Qrh,@cf+k<V-h(' );
define( 'SECURE_AUTH_SALT', 'Jl0BYjEd3qwT+>0g(Zq,EhTQ$s4egesWU%awip_Tr?B+}g:44SD=aoWgC=f`d6 x' );
define( 'LOGGED_IN_SALT',   '/{s&nNVF<O X5wO|$_^?~y.4T2C6.5O[m$>|[@a^<3%CSv<IAAXkzKxflBWd;2gT' );
define( 'NONCE_SALT',       'cxMp_qkKR^fh9zVjx~#{(kLl>&Z@fKuo9RB%$9D++6<@hd-gUiBS)ZhIsxlK#MKQ' );

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
