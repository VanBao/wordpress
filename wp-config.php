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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '$i11@)c{eS8 (OTHk=H} `Xb~>L,*l@c;N9NXmJ7oheA2e)fh>WD``<@~p8+eQfC' );
define( 'SECURE_AUTH_KEY',  '5wxnSSs[!z:^4ZW`=-lp+OY,}SS0VSRGc9jDzy=vkA4q/x:Tw4((91 k>{Oka2_P' );
define( 'LOGGED_IN_KEY',    'y.U8E(bojo>lmzY]%8-)KFx)4U71{&H#|-<*TP^gmT5Iu@ghFmp%RZAIC<B8<N8`' );
define( 'NONCE_KEY',        'IJX<8nJR/vfNaB,j)uaZKGZuRb@Gs@z2`RcnW8j]*}TvxN/p6TU_$f!*.r/PxZpa' );
define( 'AUTH_SALT',        'ePz[uZ0$,X%:/m?$a^d$-?ll2:&m&yR}#: f^tTq2)YHqd:zwNt!805FpH#r1#I ' );
define( 'SECURE_AUTH_SALT', 'HcrUl%crr3^Aq{!:rbB74`?g&a+R_/4g6[IgAR^eUn<VAm&IJ)fv[s7<H2HPdR?U' );
define( 'LOGGED_IN_SALT',   'SJc0)d^V%1XTYjB+}B-YoVp.|^:~Z$WUe,#/yomV>dDXsR2Hd.{ouAe4O?o~oTv^' );
define( 'NONCE_SALT',       'ck U$qiWF16MHy}_xO^);mPNswxVDkqe*Kz1.DA_hhi1NTeVF8n9].g&>~$k0%|*' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
