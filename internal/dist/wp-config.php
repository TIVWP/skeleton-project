<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_URL_RELATIVE', '/wp-content' );
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . WP_CONTENT_URL_RELATIVE );
if ( isset( $_SERVER['HTTP_HOST'] ) ) {
	// WP-CLI does not have $_SERVER, so to avoid the notice.
	define( 'WP_CONTENT_URL', ( empty( $_SERVER['HTTPS'] ) ? 'http://' : 'https://' ) . $_SERVER['HTTP_HOST'] . WP_CONTENT_URL_RELATIVE );
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '{{DB_NAME}}' );

/** MySQL database username */
define( 'DB_USER', '{{DB_USER}}' );

/** MySQL database password */
define( 'DB_PASSWORD', '{{DB_PASSWORD}}' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' );
define( 'SECURE_AUTH_KEY', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' );
define( 'LOGGED_IN_KEY', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' );
define( 'NONCE_KEY', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' );
define( 'AUTH_SALT', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' );
define( 'SECURE_AUTH_SALT', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' );
define( 'LOGGED_IN_SALT', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' );
define( 'NONCE_SALT', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

#define( 'FORCE_SSL_LOGIN', 1 );
#define( 'FORCE_SSL_ADMIN', 1 );

#define( 'FS_METHOD', 'direct');
#define('FS_CHMOD_DIR', (0705 & ~ umask()));
#define('FS_CHMOD_FILE', (0604 & ~ umask()));

#define( 'WP_MEMORY_LIMIT', '256M' );

if ( file_exists( dirname( __FILE__ ) . '/tivwp-local-config.inc.php' ) ) {
	/* @noinspection PhpIncludeInspection */
	require_once dirname( __FILE__ ) . '/tivwp-local-config.inc.php';
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}

/** Sets up WordPress vars and included files. */
/* @noinspection PhpIncludeInspection */
require_once ABSPATH . 'wp-settings.php';
