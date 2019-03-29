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
define( 'DB_NAME', 'havnehotell' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
 define('AUTH_KEY',         'NQ#;^vT4d-+V2>C<XX}L-<xZIb-pzQoV|}3@3`+ 3IkiA+%|:9Wz>Z6G7n}vR^WT');
 define('SECURE_AUTH_KEY',  '#[w:Xa:kOn-:9$Z*RzlVa!PX+VUK_e1%5m3/M%4X((?%$ji3$TBa;NhB1-8VF_(y');
 define('LOGGED_IN_KEY',    'cjtKAt aV(=$q(rD-H0{]={V++z&$D5`**-^x$vfh>OVv*t(KO;NVC2fafU2HIK$');
 define('NONCE_KEY',        'v9+}!7E3Ul<!=Eu-,A:|?^yo0;aojs{+3dMR)tNP-oN!dH:f3hA|tn<KCm|ig[BX');
 define('AUTH_SALT',        '+z:<8  >b[?trX-)l8M*NrO9-,1-Q[;GAwTUr6]h`.Aa(N5GH+uD<,S|1P0]Z]Gi');
 define('SECURE_AUTH_SALT', 't0~icG;5TQfo]Xoj]@92I-.%-Pap&jh<ORhyKj=G^Ni$T#}M:FkI5W=0[Im!a`#|');
 define('LOGGED_IN_SALT',   'd-kp1u6;wQJn7>9ZCm;KJ-R91PZ+({C95AxQc403G$Tl{dP#e2ndnf{zVj@|KD01');
 define('NONCE_SALT',       'Ag+oG_B[!H];~~vqnhN~S?MwP t5n%%>|%g$JiXustl6MzyHi(MF/BVxm?n&aoJ!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'hh_';

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
define( 'WP_DEBUG', false );

/*
	fjern tilgang til filredigering
*/
define( 'DISALLOW_FILE_EDIT', TRUE );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
