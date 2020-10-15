<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'yugo89_wp11');

/** MySQL database username */
define('DB_USER', 'yugo89_wp11');

/** MySQL database password */
define('DB_PASSWORD', 'J(7unvd61pcB^FbJ&n.53~[3');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'wDEsCZmxHGjI7SzMyfwpENtaoSRNpNDNCRR88VdLw9eErZrdd6PLiHhaVbHht7Lf');
define('SECURE_AUTH_KEY',  'xl9VjsnalUJqdzJ6j989BvzaJh3B6kxFZlyFYRIJA2sQCByWIisV9AjkrbQ4GxqT');
define('LOGGED_IN_KEY',    'txlwxnd0WLSEC9fykO4kroAaoLm1Etub0yC2wDeG0gWfEXd1mNO1unG74ZtpHwD3');
define('NONCE_KEY',        '7DUNB3qjID1z1ldffXaNDKfa1xy4bMGSdoZSmiWTcsKUXplqXAn4vNRYaHXzwh5e');
define('AUTH_SALT',        's2lIF7j4EI9IuAzx5Bbm2kMCiJc31k5WxiBwALAunKNDP2dDqdw3BCo6GB2eZ2v1');
define('SECURE_AUTH_SALT', 'N1YLHjx8Ne7dSHJODcIE5XMd5kE2XINMwgDYG0uHNbeAI1vD3N08kQ9D0oHfCcIV');
define('LOGGED_IN_SALT',   'HhhfFymspJyEauk3vLYk88WSLkT7Q3FIrzU9btV2vTaHfzEbCWTgdZPXsuPOtNn7');
define('NONCE_SALT',       'xYxtjUfHtEjxH0BsBKhSndVbWouTvZhPHYaNDbA8N9BvCrkYwGphZ00ymytbh15F');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0777);define('FS_CHMOD_FILE',0666);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);

/** New memory limit */
define('WP_MEMORY_LIMIT', '50M');


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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
