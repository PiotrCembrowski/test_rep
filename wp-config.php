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
define( 'DB_NAME', 'test' );

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
define( 'AUTH_KEY',         'mj< v=u+Y4QvSYSi#RX)DRD=7P@Le+?,lF!xngr&-l$^ARyFm%6Ox>d,CXud~UCv' );
define( 'SECURE_AUTH_KEY',  'ud2H_VX)SYTYwn_K=4c4]^N?l;xCm|&$7K_;#4(M!YC7(|?eh)N0VSu#j~GInPP=' );
define( 'LOGGED_IN_KEY',    'mlsI_Q[?xcx5?-Oi !N-N(%8UpR@O]qxB2z-v&ziRO{OE&(([!hgT=+wh.=!LsdF' );
define( 'NONCE_KEY',        'guM+TT-p@l[H$p7grHo0zP{p|LUZpKWF<w+F`C=7?{OR{sfgPC:.l=!pE!L]ULm$' );
define( 'AUTH_SALT',        'gsv[^:^>1*TG(;qweW}4Kxy^Qcl!rtf)vEdk6)VPp#Nw-`OCQS$!e+bY!U?@wv 2' );
define( 'SECURE_AUTH_SALT', ';*~DWE.p=vGH2wv^M:3cx[mPxvbqCwi@L@1@]cqtimi}:83NNj4#: vt~K@X0|!N' );
define( 'LOGGED_IN_SALT',   '-IMkT%zeL:k<(:Qf,Q&Ht1/5OL9tox-:!b0@9vb xVIYvtWvFnlZVD,W{r>%-_ZE' );
define( 'NONCE_SALT',       '&ijq6&U,W]|9ThdjCW0wbXT-D-HYSs8HZAn#ziP*C1C{kr7ak!`iTEi))[lNn/Tt' );

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
