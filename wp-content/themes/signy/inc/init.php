<?php
/*
 * All Signy Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* Theme All Basic Setup */
require_once( SIGNY_FRAMEWORK . '/theme-support.php' );
require_once( SIGNY_FRAMEWORK . '/backend-functions.php' );
require_once( SIGNY_FRAMEWORK . '/frontend-functions.php' );
require_once( SIGNY_FRAMEWORK . '/enqueue-files.php' );
require_once( SIGNY_CS_FRAMEWORK . '/custom-style.php' );
require_once( SIGNY_CS_FRAMEWORK . '/config.php' );

/* WooCommerce Integration */
if (class_exists( 'WooCommerce' )){
	require_once( SIGNY_FRAMEWORK . '/plugins/woocommerce/woo-config.php' );
}

/* Bootstrap Menu Walker */
require_once( SIGNY_FRAMEWORK . '/core/sgny-mmenu/wp_bootstrap_navwalker.php' );

/* Install Plugins */
require_once( SIGNY_FRAMEWORK . '/plugins/notify/activation.php' );

/* Aqua Resizer */
require_once( SIGNY_FRAMEWORK . '/plugins/aq_resizer.php' );

/* Sidebars */
require_once( SIGNY_FRAMEWORK . '/core/sidebars.php' );