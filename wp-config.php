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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'EgStkORNidhJ4yju7fdKTfiwn2BNPPP8++WoH7pX500gByaj1+3aT0P04nZKNlJPtUgIXQd3bO75wLrnH49tsA==');
define('SECURE_AUTH_KEY',  'OaQjTdfF9VZyJNyh5W2ONN5f+7rP9vLb2g7d4GWQk91FW9FLrw4VAE4Zr7k/M/j8qQ6klKxGvIz3dnlJ+4LwmA==');
define('LOGGED_IN_KEY',    '7TabmRe5OJKThRTC0o22XJHTEXhpIn6PlEI2l1AoutdW/cN1AY28UHRLf2HCnP5O7cwS4T7iNgMJxGai+7Rjfw==');
define('NONCE_KEY',        '3rJWLzidcw6xoB3kFQ+exP6fHdnlL7sxhxexcwxmZNFkgX2+zJIkWHbs++v64pP/BOwyv8DgEBFrnJCrDDCXqw==');
define('AUTH_SALT',        'nbf8aH7t3Ak3fUaQ1nR3mI7e/3x/CBvZaA/K/CE9SfOpRj/EzRDuVetta0B1Oyzw+JFYiNZaZQsYRnwozNmJSg==');
define('SECURE_AUTH_SALT', 'aZWu7Qz3TZLtM63BtBnXyjuV9AWSGKeCWXPjAl1/34J3JQZTtk6LsWh25WoabmH/lNmrzhvOhDsOYLc/H5pKqg==');
define('LOGGED_IN_SALT',   'YF7Z6iGyaze6ErofK15R7nB1HTPRjzxxvjUGjQNs6yeURufAnl/NJG5JuYmf318bW00Yn/D2XU9nSpUcCTmU+Q==');
define('NONCE_SALT',       'GxyiWcxOuDFbQYgTlXGwyE3i1OwCgjR/5lq1WbFAdJ2uTIrJKPtCXVI+AIpYBYAihTOV5nUeIiIJrMxjriCocw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
