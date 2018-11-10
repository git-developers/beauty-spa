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
define('DB_NAME', 'i3846524_wp2');

/** MySQL database username */
define('DB_USER', 'i3846524_wp2');

/** MySQL database password */
define('DB_PASSWORD', 'N~UQj@1&b5BR[j42GS#72@^9');

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
define('AUTH_KEY',         'uRY5KG3e0o0wrYMoMkc00XJ9p0CMCwxDFYh4tkesBbkJf3fWRPr6XJrgQsDR5ocG');
define('SECURE_AUTH_KEY',  'mUJ79FuSZdLIGFF2lM70SDBOBwEjsGVRNH5xpcD4wwV5yPSyqo0ZOGk2zfytkarC');
define('LOGGED_IN_KEY',    'Ixfw3Wtgw4N2UNvKPeijhiFiMMTe9vcilZnyjmsXXitBUWIAB4nv3JxYQK2LgNwu');
define('NONCE_KEY',        'ckolvQnMKTt7GDPlgAOY8W0H3bPzscOTL4KWdDGUJqD5NUrEqAcKgLhnyiY3V6Xa');
define('AUTH_SALT',        'pSITa0kTMDVyyL4E2uFZKkbdpzCPhLX5f1o70U7RKXzTUxrVkoOtTsDeXXFVyChD');
define('SECURE_AUTH_SALT', 'VYngXChClvmuzvxjSm4asa73sXV1XKdEAc8Jr3NdP4vgXQqG3rIjlgSLBaTUGrV4');
define('LOGGED_IN_SALT',   '7PHm4Et2RTDYrJ5sUcAPDbe6AdPNPPlUJ79IwJiJrKatYMgOl7Z3ZvIqumwiBhUh');
define('NONCE_SALT',       'BaYVmOsP5VkAR8Opb9NFJ7Rmk9im34C7fXHLrBoTDF1GVeUGp1Xzm6kXN7GPzKvP');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
