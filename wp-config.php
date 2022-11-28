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
define( 'DB_NAME', 'wpcreasonidos' );

/** MySQL database username */
define( 'DB_USER', 'forge' );

/** MySQL database password */
define( 'DB_PASSWORD', '7YnLAWmuEsU4fBTjj78u' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

// TODO: custom subir archivos
//define('ALLOW_UNFILTERED_UPLOADS', true);

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
define( 'AUTH_KEY',         'vDO35ZVy0^7433AfZU+{pDg<&OVquVg+yW!J@k#dho_i)BgCLZ1 i_{_[rVS-~*T' );
define( 'SECURE_AUTH_KEY',  '{@.1eylWV6qjUP..B0J=|k=U/PjTB`+WAo(g?_TC$;x$:aev<,4pHgHd7v|s@!.r' );
define( 'LOGGED_IN_KEY',    'i=!K h>HM$jU|hQj{@-0#Rw#e2! v?+_0RE3C_7$^9(ARNEpMj%qSZjz)}#!!L%7' );
define( 'NONCE_KEY',        'f_#`b{*t)9omrLfUy}P{pK1+$e2d>.;DXA=EDyi?X)i,P7FvSd1YHyGrt=wC_[06' );
define( 'AUTH_SALT',        '9rGc7dm6iXz/wJ4nUvdOiq(Sp:i;WP;h0#bVo/%wd>pcLZzs(CF igwODCVhKZQf' );
define( 'SECURE_AUTH_SALT', '.fQ70~.*]$i17Ho&/ot)zGd NprVEvCSF(B`+Bw$1Pl>VTU:!-dS<a]AQ]:A%9n ' );
define( 'LOGGED_IN_SALT',   '#kT&1DR~C^Z@$<y@gCA`43b`2ofzSu_PAHoj{?~VzRe4b.}k{R!mM^STe?/B(L7_' );
define( 'NONCE_SALT',       'ay-J8L}F*XMf:?y`FTCWVFvmn:mZfEf*KkV|0>{&xX)]52bHJoiP!fky7mSzt~IU' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'crc_';

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
