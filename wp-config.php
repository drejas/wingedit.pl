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
define('DB_NAME', 'infinitycons_50');

/** MySQL database username */
define('DB_USER', 'infinitycons_50');

/** MySQL database password */
define('DB_PASSWORD', 'VWGolfmk3');

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
define('AUTH_KEY',         '^9v ~ ]3Dszhr_.Sm;3vN{1]!as05=H=7n;se007zyjP~%.WvW+{R4=aVRgG uLr');
define('SECURE_AUTH_KEY',  'Ihq3T_@*w{yav>am11V~~{QD=jC[1e7r/VNSmMud]eI6tt8JsAjU4S0W9tgPU77|');
define('LOGGED_IN_KEY',    'b@mG t?RFoL+Rl!`4<%l8!U.BL;R5yEVl;W.D#G=+lmH3ech-8^]l1/4X<sDr3Af');
define('NONCE_KEY',        'Q@80aY{t:J0Gm*j8C_[)1gy##(-er:X2)zq{eva&&L.3t(V7gNuNI%!HEu gi/UB');
define('AUTH_SALT',        'P5 +~Fg(xgi8c+&u_/SrXxOzgv*rlfa/aO+<}]g&XsELk{LR^BBxp@ni&E%-9m{e');
define('SECURE_AUTH_SALT', ':vN~4^_gen+LmAv@a1Z7xCl5S<BYwBGf)*9C*ExE7WfTwu0!UWz/r+@h!=rftz?^');
define('LOGGED_IN_SALT',   'Rpm#rwB,hW,biA:417+T!U-K>HCWI9t,@,P9]cG{PRK^pb=+i(F:9L}e5?2S1&{H');
define('NONCE_SALT',       '~#?l5#D5!504r/pae}P#Kv7&A_DKH@77L^Hmnx]/%QLihE9%V*%g6~HPF=O0u%zD');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'inf_';

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
