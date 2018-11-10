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
	
	
//define('WP_HOME','http://localhost/griselbeautyspa');
//define('WP_SITEURL','http://localhost/griselbeautyspa');


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'i3846524_wp1');

/** MySQL database username */
//define('DB_USER', 'i3846524_wp1');
define('DB_USER', 'root');

/** MySQL database password */
//define('DB_PASSWORD', 'Y.^7Gf*jSHFk[I5BRe[92..2');
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'VQYhYCGABlQuQWcjWpjvfjszR7wKweULYO9qUZrsmOsEUk8WGSsjKLruAqMBRnoY');
define('SECURE_AUTH_KEY',  'thrwn9ZQTEDM91jFfcdCtMHOAyNHICMEy8Gcu2bFrZ7VNnvswBi7eILwHr4CEeYe');
define('LOGGED_IN_KEY',    'PMjEH8asPQUfOn6DfVaoXDNmjmsP7vLMPfillhdf32TU9dxNG9wcbdxwRYLUkjlX');
define('NONCE_KEY',        'ccBw1QMmlzlF7e9k1ae3ebfRcy5oHvImiLAunuUSju8l5tpVE76z4idMvoIbQHXX');
define('AUTH_SALT',        'w3UKvWbycfEZTc2yzrrkeYnToKEoTeBdChj6X4y3dIj77SHH97xHDEiJ7dyP0UsG');
define('SECURE_AUTH_SALT', 'Ue0JkoUQ6VrFAnvMHSb6UhpRS6czygDQw4u9lioKGcTbzUWFwSXQ0Iyer6z53nSM');
define('LOGGED_IN_SALT',   'Xsvk6VcsVahPfQKVc7Ho94lMbksXfBhU0th06shgwEg7qmQpOnguywE4ff0nXtJk');
define('NONCE_SALT',       'EyBFn7L0E0ONgOQrKsHcsTT0MjvfhaMGie6pDWeJY51FvquulYDbulkund7seJo6');

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
