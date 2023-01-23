<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u659983870_IR2Ld' );

/** MySQL database username */
define( 'DB_USER', 'u659983870_94s8Y' );

/** MySQL database password */
define( 'DB_PASSWORD', 'oaFQUQrBtf' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

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
define( 'AUTH_KEY',          'U|OPR1N]aS|5rN8OU<5&qD<gB<Pve_}TC4rL=iDX%*c}^*L;F_Nox]a-{=6_.*m&' );
define( 'SECURE_AUTH_KEY',   '(VPt7G&c8LUX<p8Cvk7wns&a,f6W[r^;pKAIX-X8v71u8IgE,0CDi&N,~ xwN=.K' );
define( 'LOGGED_IN_KEY',     'B<g(:P`#QBxR74B;[;g78z}!efDG]dc_`Fy?oLp1-l^7-;y0wzvFvOX+jX*P4sY9' );
define( 'NONCE_KEY',         'Vb#Y+pU1U?&cxjLn#O+j6DYb`*a;;QVf^g#]Kz):[uOu=z5IlEU :4Btf%mQJpcR' );
define( 'AUTH_SALT',         '86[r64V!a-{dvPP`>z1@i|CLiVsGRLaT.?wxov!x7U15$Nm4cY<oj3Y# e(DJpM+' );
define( 'SECURE_AUTH_SALT',  'n}48~N$wgCdkM]^J8aTj6@)gt8>Zg@t/9^NBS)5%s_eLUllY#>>L{l6gr?9~z?(X' );
define( 'LOGGED_IN_SALT',    '6Iz8nHLa]V!v0t[DoECnN$b+g$ELaVq$1,f7,d`V[UqX5Y7/uOB#_E:A(2hf2&wr' );
define( 'NONCE_SALT',        'Ytd[69TLANR%n&stFDMdB}&598$sv)H7RL!`V(-Hdh=Tb7$[2F<4w``Tj$$5I%*A' );
define( 'WP_CACHE_KEY_SALT', 'S0xCm:{pQU)r^W+m@Lq@I)gvH;/[t+#c;(@508*U&`<3m:==Kn4]%:HAY&1u2fP/' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
