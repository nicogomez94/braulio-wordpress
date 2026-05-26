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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'GAX#!6k.v9_fx2/:e)^ xk4AXRfGf_X:fC:bdRqMAe1:eF|fSg,RMosxD0&Qw .@' );
define( 'SECURE_AUTH_KEY',   '}$j+$b?.^kz):/Yo*p,2wzH}o]waQ%7;pl.]-/W-(}x_k3oIZm@7S|f>3kRmf!3j' );
define( 'LOGGED_IN_KEY',     '|i01I^5FW`z zj -Fdzcrex>qOC`.0ySOChN~i `>Ny lK1m+2mPN75?)I|jFIPM' );
define( 'NONCE_KEY',         'gTISG5yve45y{JiG/:Sq>i8Yn(KGBmgO3sSZusmFU}b5nab+5k43}[?(;v&?7H-8' );
define( 'AUTH_SALT',         '|Bc9=WfVzF=yU`-z8c|}n!%8Y<JV@.#WY9fX2v?J6FFZL36Ac#@Y[+0q~Xc1& 69' );
define( 'SECURE_AUTH_SALT',  'k]{Ppg_nYy:gM-$~9i28vP<cKg[61$ lvWc`GAvn(eQ{qF:}=Ocq|4ZYNx]4|kRt' );
define( 'LOGGED_IN_SALT',    '|}zo%^n55BGkFnKg+p,u3FXa()k@isiY{h6!@}gK{m_`H> dd/?^qMlOg7ryh|y~' );
define( 'NONCE_SALT',        ')7lcsqRzGtoQHAru^cZg7YqsE**CP]146#(Za-L*8eIX>WC)tt6VrMKE2.w}7ec7' );
define( 'WP_CACHE_KEY_SALT', '_oh{=2_/&jh!u?#E;Y$?x.EjlXXz:SH0QQmV1E*.t2]J=FC^a{b;S<9AwK8R;miz' );


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
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
