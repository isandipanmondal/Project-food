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
define('DB_NAME', 'food');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ';}{3ni1d}jWL{+abbaQse-gNndd&QOgz#6dNv7cvi>Lq#/C;a <KT&Tb8hJB|I0R');
define('SECURE_AUTH_KEY',  'cWR*Hc@Lf+u,P-8juEFV Iw|Uv_(?8RX>GnJ|lB|}Ox<zD[:EeqMQecBpw7~EE^0');
define('LOGGED_IN_KEY',    '[CWNiQa^bmw](MEmPFs}U+%mZUbzJ>K#EIo]9_z].S.e;<xH;UGX3$H5x[_o+|Gd');
define('NONCE_KEY',        '$o!l~)mdcY1o]c5]L(_hx}++sDGnL=P6Eym:Q^,8:R0{k0UJ{[&TCl=-|) D!Ath');
define('AUTH_SALT',        '04|XG/pIgdF^]1&E2)KauGp%-,K| ~dPJ?{bO`o{%ahM7mr u[mY-RE,1_yXJnxp');
define('SECURE_AUTH_SALT', 'DZ<T#]hVxiHv>;a-sd29.qk~]snN_^9OayUEI7~|Zrl(D]oG^)R6/:B[n0E4Ga<Q');
define('LOGGED_IN_SALT',   'ai)Y4)&ZD2Yu[X,@g!rn+d^v?!Q_hnY-A+hnk*tB;hthypT+?o~lR6kZA~skBW8(');
define('NONCE_SALT',       '^G$XZ?81{s]fx+[&D0W$4ydf|$3i4&4K@dVE>U%FN1 8XO6Yk!YB{fO>pVVcIO@V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
