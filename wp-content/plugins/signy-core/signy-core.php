<?php
/*
Plugin Name: Signy Core
Plugin URI: http://themeforest.net/user/VictorThemes
Description: Plugin to contain shortcodes and custom post types of the signy theme.
Author: VictorThemes
Author URI: http://themeforest.net/user/VictorThemes/portfolio
Version: 1.6
Text Domain: signy-core
*/

if( ! function_exists( 'signy_block_direct_access' ) ) {
	function signy_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'SIGNY_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'SIGNY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'SIGNY_PLUGIN_ASTS', SIGNY_PLUGIN_URL . 'assets' );
define( 'SIGNY_PLUGIN_IMGS', SIGNY_PLUGIN_ASTS . '/images' );
define( 'SIGNY_PLUGIN_INC', SIGNY_PLUGIN_PATH . 'inc' );

// DIRECTORY SEPARATOR
define ( 'DS' , DIRECTORY_SEPARATOR );

// Signy Shortcode Path
define( 'SIGNY_SHORTCODE_BASE_PATH', SIGNY_PLUGIN_PATH . 'visual-composer/' );
define( 'SIGNY_SHORTCODE_PATH', SIGNY_SHORTCODE_BASE_PATH . 'shortcodes/' );

/**
 * Check if Codestar Framework is Active or Not!
 */
function signy_framework_active() {
  return ( defined( 'CS_VERSION' ) ) ? true : false;
}

/* VTHEME_NAME_P */
define('VTHEME_NAME_P', 'Signy');

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('signy-core/signy-core.php')) {

  // Shortcodes
  require_once( SIGNY_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( SIGNY_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );

  /* One Click Install */
  require_once( SIGNY_PLUGIN_INC . '/import/init.php' );

  // Widgets
  require_once( SIGNY_PLUGIN_INC . '/widgets/nav-widget.php' );
  require_once( SIGNY_PLUGIN_INC . '/widgets/recent-posts.php' );
  require_once( SIGNY_PLUGIN_INC . '/widgets/text-widget.php' );
  require_once( SIGNY_PLUGIN_INC . '/widgets/widget-extra-fields.php' );
  require_once( SIGNY_PLUGIN_INC . '/widgets/logo-widget.php' );
  require_once( SIGNY_PLUGIN_INC . '/widgets/newsletter-widget.php' );
  require_once( SIGNY_PLUGIN_INC . '/widgets/popular-posts-widget.php' );
  require_once( SIGNY_PLUGIN_INC . '/widgets/instagram-widget.php' );

}

/**
 * Plugin language
 */
function signy_plugin_language_setup() {
  load_plugin_textdomain( 'signy-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'signy_plugin_language_setup' );

/* WPAUTOP for shortcode output */
if( ! function_exists( 'signy_set_wpautop' ) ) {
  function signy_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/* Shortcodes enable in the_excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* Remove p tag and add by our self in the_excerpt */
remove_filter('the_excerpt', 'wpautop');

/* Add Extra Social Fields in Admin User Profile */
function signy_add_twitter_facebook( $contactmethods ) {
  $contactmethods['facebook']   = 'Facebook';
  $contactmethods['twitter']    = 'Twitter';
  $contactmethods['vine']  = 'Vine';
  $contactmethods['pinterest']  = 'Pinterest';
  $contactmethods['instagram']   = 'Instagram';
  return $contactmethods;
}
add_filter('user_contactmethods','signy_add_twitter_facebook',10,1);

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
  function cs_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}

/* Inline Style */
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'add_inline_style' ) ) {
  function add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* Enqueue Inline Styles */
if ( ! function_exists( 'sgny_enqueue_inline_styles' ) ) {
  function sgny_enqueue_inline_styles() {

    global $all_inline_styles;

    if ( ! empty( $all_inline_styles ) ) {
      echo '<style id="signy-inline-style" type="text/css">'. signy_compress_css_lines( join( '', $all_inline_styles ) ) .'</style>';
    }

  }
  add_action( 'wp_footer', 'sgny_enqueue_inline_styles' );
}

/* Validate px entered in field */
if( ! function_exists( 'signy_check_px' ) ) {
  function signy_check_px( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}