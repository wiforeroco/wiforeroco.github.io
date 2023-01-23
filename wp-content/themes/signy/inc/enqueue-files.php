<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Enqueue Files for FrontEnd
 */
if ( ! function_exists( 'signy_sgny_scripts_styles' ) ) {
  function signy_sgny_scripts_styles() {

    // Styles
    wp_enqueue_style( 'font-awesome', SIGNY_THEMEROOT_URI . '/inc/theme-options/cs-framework/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'bootstrap', SIGNY_CSS .'/bootstrap.min.css', array(), '3.3.6', 'all' );
    wp_enqueue_style( 'signy-simple-line-icons', SIGNY_CSS .'/simple-line-icons.css', array(), '2.3.2', 'all' );
    wp_enqueue_style( 'bootstrap-datepicker', SIGNY_CSS .'/bootstrap-datepicker.min.css', array(), '1.6.4', 'all' );
    wp_enqueue_style( 'signy-own-carousel', SIGNY_CSS .'/owl.carousel.css', array(), '2.4', 'all' );
    wp_enqueue_style( 'right-sidebar', SIGNY_CSS .'/right-sidebar.css', array(), SIGNY_VERSION, 'all' );
    wp_enqueue_style( 'slimmenu', SIGNY_CSS .'/slimmenu.min.css', array(), SIGNY_VERSION, 'all' );
    wp_enqueue_style( 'signy', SIGNY_CSS .'/styles.css', array(), SIGNY_VERSION, 'all' );

    // Scripts
    wp_enqueue_script( 'signy-plugins', SIGNY_SCRIPTS . '/plugins.js', array( 'jquery' ), SIGNY_VERSION, true );
    wp_enqueue_script( 'signy-scripts', SIGNY_SCRIPTS . '/scripts.js', array( 'jquery' ), SIGNY_VERSION, true );

    // Comments
    wp_enqueue_script( 'jquery-validate', SIGNY_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'jquery-validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    $signy_viewport = cs_get_option('theme_responsive');
    if($signy_viewport == 'on') {
      wp_enqueue_style( 'signy-responsive', SIGNY_CSS .'/responsive.css', array(), SIGNY_VERSION, 'all' );
    }

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'signy_sgny_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'signy_sgny_admin_scripts_styles' ) ) {
  function signy_sgny_admin_scripts_styles() {

    wp_enqueue_style( 'signy-admin-main', SIGNY_CSS . '/admin-styles.css', true );
    wp_enqueue_style( 'signy-simple-line-icons', SIGNY_CSS . '/simple-line-icons.css', true );
    wp_enqueue_script( 'signy-admin-scripts', SIGNY_SCRIPTS . '/admin-scripts.js', true );

  }
  add_action( 'admin_enqueue_scripts', 'signy_sgny_admin_scripts_styles' );
}

/* Enqueue All Styles */
if ( ! function_exists( 'signy_sgny_wp_enqueue_styles' ) ) {
  function signy_sgny_wp_enqueue_styles() {
    signy_sgny_google_fonts();
    add_action( 'wp_head', 'signy_sgny_custom_css', 99 );
  }
  add_action( 'wp_enqueue_scripts', 'signy_sgny_wp_enqueue_styles' );
}

/* Dequeue WooCommerce Select JS */
add_action( 'wp_enqueue_scripts', 'signy_dequeue_woo_select', 100 );
function signy_dequeue_woo_select() {
  if ( class_exists( 'woocommerce' ) ) {
    wp_dequeue_style( 'selectWoo' );
    wp_deregister_style( 'selectWoo' );

    wp_dequeue_script( 'selectWoo');
    wp_deregister_script('selectWoo');
  }
}