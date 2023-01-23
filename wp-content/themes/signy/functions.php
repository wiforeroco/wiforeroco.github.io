<?php
/*
 * Signy Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Define - Folder Paths
 */
define( 'SIGNY_THEMEROOT_PATH', get_template_directory() );
define( 'SIGNY_THEMEROOT_URI', get_template_directory_uri() );
define( 'SIGNY_CSS', SIGNY_THEMEROOT_URI . '/assets/css' );
define( 'SIGNY_IMAGES', SIGNY_THEMEROOT_URI . '/assets/images' );
define( 'SIGNY_SCRIPTS', SIGNY_THEMEROOT_URI . '/assets/js' );
define( 'SIGNY_FRAMEWORK', get_template_directory() . '/inc' );
define( 'SIGNY_LAYOUT', get_template_directory() . '/layouts' );
define( 'SIGNY_CS_IMAGES', SIGNY_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'SIGNY_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'SIGNY_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$signy_theme_child = wp_get_theme();
	$signy_get_parent = $signy_theme_child->Template;
	$signy_theme = wp_get_theme($signy_get_parent);
} else { // Parent Theme Active
	$signy_theme = wp_get_theme();
}
define('SIGNY_NAME', $signy_theme->get( 'Name' ));
define('SIGNY_VERSION', $signy_theme->get( 'Version' ));
define('SIGNY_BRAND_URL', $signy_theme->get( 'AuthorURI' ));
define('SIGNY_BRAND_NAME', $signy_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( SIGNY_FRAMEWORK . '/init.php' );