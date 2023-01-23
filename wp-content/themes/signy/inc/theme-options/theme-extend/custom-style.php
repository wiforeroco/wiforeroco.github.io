<?php
/*
 * Codestar Framework - Custom Style
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/* All Dynamic CSS Styles */
if ( ! function_exists( 'signy_dynamic_styles' ) ) {
  function signy_dynamic_styles() {

    // Typography
    $signy_sgny_get_typography  = signy_sgny_get_typography();

    // Logo
    $brand_logo_top     = cs_get_option( 'brand_logo_top' );
    $brand_logo_bottom  = cs_get_option( 'brand_logo_bottom' );

    // Layout
    $bg_type = cs_get_option('theme_layout_bg_type');
    $bg_pattern = cs_get_option('theme_layout_bg_pattern');
    $bg_image = cs_get_option('theme_layout_bg');
    $bg_overlay_color = cs_get_option('theme_bg_overlay_color');

    // Footer
    $footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
    $footer_heading_color  = cs_get_customize_option( 'footer_heading_color' );
    $footer_text_color  = cs_get_customize_option( 'footer_text_color' );
    $footer_link_color  = cs_get_customize_option( 'footer_link_color' );
    $footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );

  ob_start();

global $post;
$signy_id    = ( isset( $post ) ) ? $post->ID : 0;
$signy_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $signy_id;
if (is_woocommerce_shop()) {
  $signy_meta  = get_post_meta( wc_get_page_id( 'shop' ), 'page_type_metabox', true );
} else {
  $signy_meta  = get_post_meta( $signy_id, 'page_type_metabox', true );
}

/* Layout - Theme Options - Background */
if ($bg_type === 'bg-image') {

  $layout_boxed = ( ! empty( $bg_image['image'] ) ) ? 'background-image: url('. $bg_image['image'] .');' : '';
  $layout_boxed .= ( ! empty( $bg_image['repeat'] ) ) ? 'background-repeat: '. $bg_image['repeat'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['position'] ) ) ? 'background-position: '. $bg_image['position'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['attachment'] ) ) ? 'background-attachment: '. $bg_image['attachment'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['size'] ) ) ? 'background-size: '. $bg_image['size'] .';' : '';
  $layout_boxed .= ( ! empty( $bg_image['color'] ) ) ? 'background-color: '. $bg_image['color'] .';' : '';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}
if ($bg_type === 'bg-pattern') {
$custom_bg_pattern = cs_get_option('custom_bg_pattern');
$layout_boxed = ( $bg_pattern === 'custom-pattern' ) ? 'background-image: url('. $custom_bg_pattern .');' : 'background-image: url('. SIGNY_IMAGES . '/patterns/'. $bg_pattern .'.png);';

echo <<<CSS
  .no-class {}
  .layout-boxed {
    {$layout_boxed}
  }
CSS;
}

/* Logo Section - Customizer - Background */
$logo_sec_bg_color  = cs_get_customize_option( 'logo_sec_bg_color' );
if ($logo_sec_bg_color) {
echo <<<CSS
  .no-class {}
  .sgny-center-header-area {
    background-color: {$logo_sec_bg_color};
  }
CSS;
}

$logo_sec_border_color  = cs_get_customize_option( 'logo_sec_border_color' );
if ($logo_sec_border_color) {
echo <<<CSS
  .no-class {}
  .sgny-center-header-area {
    border-color: {$logo_sec_border_color};
  }
CSS;
}
$sidebar_trigger_color  = cs_get_customize_option( 'sidebar_trigger_color' );
if ($sidebar_trigger_color) {
echo <<<CSS
  .no-class {}
  .sgny-sidebar-open-btn .sgny-side-trigger-single {
    background-color: {$sidebar_trigger_color};
  }
CSS;
}
$sidebar_trigger_open_color  = cs_get_customize_option( 'sidebar_trigger_open_color' );
if ($sidebar_trigger_open_color) {
echo <<<CSS
  .no-class {}
  .sgny-right-sidebar-open .sgny-sidebar-open-btn .sgny-side-trigger-single, .sgny-right-sidebar-open .sgny-sidebar-open-btn .sgny-side-trigger-single:nth-child(1), .sgny-right-sidebar-open .sgny-sidebar-open-btn .sgny-side-trigger-single:nth-child(3) {
    background-color: {$sidebar_trigger_open_color};
  }
CSS;
}
$sidebar_trigger_border_color  = cs_get_customize_option( 'sidebar_trigger_border_color' );
if ($sidebar_trigger_border_color) {
echo <<<CSS
  .no-class {}
  .sgny-sidebar-open-btn {
    border-color: {$sidebar_trigger_border_color};
  }
CSS;
}

/* Left Side Section - Main Menu */
$menu_link_color  = cs_get_customize_option( 'menu_link_color' );
if ($menu_link_color) {
echo <<<CSS
  .no-class {}
  .sgny-main-menu ul#sgny-menu li a, .sgny-main-menu ul#sgny-menu li.menu-item-has-children:before, .sgny-serch-form button, .sgny-serch-form input {
    color: {$menu_link_color};
  }
  .sgny-menu-nav-shap:before, .sgny-menu-nav-shap:after{
    background-color: {$menu_link_color};
  }
CSS;
}

$menu_bg_color  = cs_get_customize_option( 'menu_bg_color' );
if ($menu_bg_color) {
echo <<<CSS
  .no-class {}
  .sgny-nav-warp, .sgny-menu-hover {
    background-color: {$menu_bg_color};
  }
CSS;
}
$menu_border_color  = cs_get_customize_option( 'menu_border_color' );
if ($menu_border_color) {
echo <<<CSS
  .no-class {}
  .sgny-main-menu ul#sgny-menu li a {
    border-color: {$menu_border_color};
  }
CSS;
}
$menu_link_hover_color  = cs_get_customize_option( 'menu_link_hover_color' );
if ($menu_link_hover_color) {
echo <<<CSS
  .no-class {}
  .sgny-main-menu ul#sgny-menu li a:hover, .sgny-serch-form button:hover {
    color: {$menu_link_hover_color};
  }
CSS;
}

/* Left Side Section - Sub-Menu */
$submenu_bg_color  = cs_get_customize_option( 'submenu_bg_color' );
if ($submenu_bg_color) {
echo <<<CSS
  .no-class {}
  .sgny-main-menu ul#sgny-menu li.menu-item-has-children ul.sub-menu {
    background-color: {$submenu_bg_color};
  }
CSS;
}

$submenu_border_color  = cs_get_customize_option( 'submenu_border_color' );
if ($submenu_border_color) {
echo <<<CSS
  .no-class {}
  .sgny-main-menu ul#sgny-menu .sub-menu li a {
    border-color: {$submenu_border_color};
  }
  .sgny-serch-form{
    border-color: {$submenu_link_hover_color};
  }
CSS;
}
$submenu_link_color  = cs_get_customize_option( 'submenu_link_color' );
if ($submenu_link_color) {
echo <<<CSS
  .no-class {}
  .sgny-main-menu ul#sgny-menu .sub-menu li a {
    color: {$submenu_link_color};
  }
CSS;
}
$submenu_link_hover_color  = cs_get_customize_option( 'submenu_link_hover_color' );
if ($submenu_link_hover_color) {
echo <<<CSS
  .no-class {}
  .sgny-main-menu ul#sgny-menu .sub-menu li a:hover, .sgny-serch-form button:hover {
    color: {$submenu_link_hover_color};
  }
CSS;
}

/* Left Side Section - Title Bar Color */
$titlebar_title_color  = cs_get_customize_option( 'titlebar_title_color' );
if ($titlebar_title_color) {
echo <<<CSS
  .no-class {}
  .sgny-l-sidebar-text h1 {
    color: {$titlebar_title_color};
  }
CSS;
}

$sub_title_text_color  = cs_get_customize_option( 'sub_title_text_color' );
if ($sub_title_text_color) {
echo <<<CSS
  .no-class {}
  .sgny-l-sidebar-text p {
    color: {$sub_title_text_color};
  }
CSS;
}
$title_border_color  = cs_get_customize_option( 'title_border_color' );
if ($title_border_color) {
echo <<<CSS
  .no-class {}
  .sgny-l-sidebar-social {
    border-color: {$title_border_color};
  }
CSS;
}

/* Content colors */
$body_color  = cs_get_customize_option( 'body_color' );
if ($body_color) {
echo <<<CSS
  .no-class {}
   .sgny-post-meta, .sgny-post-by, .sgny-entry-content p, .wp-pagenavi span, .woocommerce .sgny-main-content ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce-checkout .woocommerce form.register label, .sgny-page-content-area p, .woocommerce .woocommerce-ordering select,.woocommerce-cart form table.shop_table thead th, .woocommerce-cart .sgny-main-content table.shop_table tbody td, .woocommerce-cart .cart_totals table.shop_table th, .woocommerce-cart .cart_totals table.shop_table td, .woocommerce-message, .woocommerce-cart .cart_totals table.shop_table .cart-subtotal td, .woocommerce-cart .cart_totals table.shop_table th, .woocommerce-cart .cart_totals table.shop_table .cart-subtotal td, .woocommerce-cart .cart_totals table.shop_table .order-total td, .woocommerce-checkout .woocommerce-billing-fields .form-row label, .woocommerce-checkout .woocommerce-billing-fields input[type="text"], .select2-container--default .select2-selection--single .select2-selection__rendered, .woocommerce-checkout .woocommerce-billing-fields input[type="text"], .sgny-main-content span.woocommerce-Price-amount.amount, .woocommerce-checkout .woocommerce-info, .woocommerce-checkout .woocommerce-billing-fields input[type="tel"], .woocommerce-checkout .woocommerce-billing-fields input[type="email"], .woocommerce-checkout table.shop_table thead, .woocommerce-checkout table.shop_table tbody td, .woocommerce-checkout table.shop_table tfoot th, .woocommerce-checkout table.shop_table tfoot td, .woocommerce-checkout table.shop_table tfoot .order-total th, .woocommerce .woocommerce-checkout-payment label, .woocommerce-page .woocommerce-checkout-payment label, strong.product-quantity, .woocommerce-order p, .woocommerce-order ul li, .woocommerce-order ul li strong, .woocommerce-order-received .woocommerce-order-details table.woocommerce-table tbody tr td, .woocommerce-order-received .woocommerce-order-details table.woocommerce-table tfoot tr, .woocommerce-error, .woocommerce-info, .woocommerce-message, .woocommerce-checkout table.shop_table tbody th, .woocommerce-checkout table.shop_table tbody td, .woocommerce-order-received address, .woocommerce address, .woocommerce-account .sgny-main-content .woocommerce label, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea, table.woocommerce-MyAccount-downloads.shop_table.shop_table_responsive, .woocommerce-MyAccount-content strong, table.woocommerce-orders-table.woocommerce-MyAccount-orders {
    color: {$body_color};
  }
CSS;
}

$body_links_color  = cs_get_customize_option( 'body_links_color' );
if ($body_links_color) {
echo <<<CSS
  .no-class {}
  .sgny-post-meta a, .sgny-post-by a, .wp-pagenavi a, .woocommerce-page .sgny-main-content ul.products li.product .sgny-product-price-add-cart .add_to_cart_button, .woocommerce-page .sgny-main-content a, .woocommerce-checkout .woocommerce-info a, table.woocommerce-table tbody tr td a, .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a  {
    color: {$body_links_color};
  }
CSS;
}
$body_link_hover_color  = cs_get_customize_option( 'body_link_hover_color' );
if ($body_link_hover_color) {
echo <<<CSS
  .no-class {}
  .wp-pagenavi a:hover, .sgny-post-meta a:hover, .sgny-post-meta a:focus, .sgny-post-by a:hover, .sgny-post-by a:focus, .woocommerce-page .sgny-main-content ul.products li.product .sgny-product-price-add-cart .add_to_cart_button:hover, .woocommerce-page .sgny-main-content a:hover, .woocommerce-checkout .woocommerce-info a:hover, .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a:hover, .woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul .is-active a {
    color: {$body_link_hover_color};
  }
CSS;
}
/* Content colors - Sidebar */
$sidebar_content_color  = cs_get_customize_option( 'sidebar_content_color' );
if ($sidebar_content_color) {
echo <<<CSS
  .no-class {}
  .sgny-right-sidebar-inner .sgny-side-widget, .sgny-side-widget .textwidget p, .sgny-side-widget.widget_mc4wp_form_widget label, .sgny-right-sidebar-inner .widget_calendar table#wp-calendar td, .sgny-right-sidebar-inner strong, .sgny-right-sidebar-inner p.wp-caption-text, .sgny-side-widget select, .sgny-right-sidebar-inner .widget_calendar caption {
    color: {$sidebar_content_color};
  }
CSS;
}
$sidebar_link_color  = cs_get_customize_option( 'sidebar_link_color' );
if ($sidebar_link_color) {
echo <<<CSS
  .no-class {}
  .sgny-right-sidebar-inner .sgny-side-widget a {
    color: {$sidebar_link_color};
  }
CSS;
}
$sidebar_link_hover_color  = cs_get_customize_option( 'sidebar_link_hover_color' );
if ($sidebar_link_hover_color) {
echo <<<CSS
  .no-class {}
  .sgny-right-sidebar-inner .sgny-side-widget a:hover {
    color: {$sidebar_link_hover_color};
  }
CSS;
}
/* Content Heading colors */
$content_heading_color  = cs_get_customize_option( 'content_heading_color' );
if ($content_heading_color) {
echo <<<CSS
  .no-class {}
  .sgny-main-content h1, .sgny-main-content h2,  .sgny-main-content h3, .sgny-main-content h4, .sgny-main-content h5, .sgny-main-content h6, .sgny-post-title, .sgny-post-title a, .woocommerce-cart .cart_totals > h2, .woocommerce-checkout #order_review_heading, legend {
    color: {$content_heading_color};
  }
CSS;
}
$sidebar_heading_color  = cs_get_customize_option( 'sidebar_heading_color' );
if ($sidebar_heading_color) {
echo <<<CSS
  .no-class {}
  .sgny-right-sidebar h4.widget-title {
    color: {$sidebar_heading_color};
  }
CSS;
}

/* Content Button colors */
$content_button_bg_color  = cs_get_customize_option( 'content_button_bg_color' );
if ($content_button_bg_color) {
echo <<<CSS
  .no-class {}
  .sgny-readmore-btn, .sgny-pin-btn, .sgny-comment-form.comment-respond #commentform #submit, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt
, .woocommerce-Address-title.title .edit, .woocommerce-account .woocommerce input[type="submit"], .woocommerce-account .woocommerce input[type="submit"], .woocommerce-product-search input[type="submit"] {
    background-color: {$content_button_bg_color};
  }
CSS;
}
$content_button_bg_hover_color  = cs_get_customize_option( 'content_button_bg_hover_color' );
if ($content_button_bg_hover_color) {
echo <<<CSS
  .no-class {}
  .sgny-readmore-btn:hover, .sgny-readmore-btn:focus , .sgny-pin-btn:hover, .sgny-comment-form.comment-respond #commentform #submit:hover, .woocommerce span.onsale:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover
, .woocommerce-Address-title.title .edit:hover, .woocommerce-account .woocommerce input[type="submit"]:hover, .woocommerce-account .woocommerce input[type="submit"]:hover, .woocommerce-product-search input[type="submit"]:hover {
    background-color: {$content_button_bg_hover_color};
  }
CSS;
}
$content_button_text_color  = cs_get_customize_option( 'content_button_text_color' );
if ($content_button_text_color) {
echo <<<CSS
  .no-class {}
  .sgny-readmore-btn, .sgny-pin-btn, .sgny-comment-form.comment-respond #commentform #submit, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce .widget_shopping_cart_content a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt
, .woocommerce-Address-title.title .edit, .woocommerce-account .woocommerce input[type="submit"], .woocommerce-account .woocommerce input[type="submit"], .woocommerce-product-search input[type="submit"] {
    color: {$content_button_text_color};
  }
CSS;
}
$content_button_text_hover_color  = cs_get_customize_option( 'content_button_text_hover_color' );
if ($content_button_text_hover_color) {
echo <<<CSS
  .no-class {}
  .sgny-readmore-btn:hover, .sgny-readmore-btn:focus , .sgny-pin-btn:hover, .sgny-comment-form.comment-respond #commentform #submit:hover, .woocommerce span.onsale:hover, .woocommerce #respond input#submit:hover, .woocommerce .widget_shopping_cart_content a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover
, .woocommerce-Address-title.title .edit:hover, .woocommerce-account .woocommerce input[type="submit"]:hover, .woocommerce-account .woocommerce input[type="submit"]:hover, .woocommerce-product-search input[type="submit"]:hover {
    color: {$content_button_text_hover_color};
  }
CSS;
}

/* Footer Section - Footer Widget */
$footer_widget_heading_color  = cs_get_customize_option( 'footer_widget_heading_color' );
if ($footer_widget_heading_color) {
echo <<<CSS
  .no-class {}
  .footer-widget-area h4.widget-title {
    color: {$footer_widget_heading_color};
  }
CSS;
}

$footer_text_color  = cs_get_customize_option( 'footer_text_color' );
if ($footer_text_color) {
echo <<<CSS
  .no-class {}
  .sgny-footer-widget .footer-widget-area p, .footer-widget-area span, .sgny-footer-widget .footer-widget-area strong, .widget_shopping_cart_content ul li, .sgny-footer-widget select, .price_label {
    color: {$footer_text_color};
  }
CSS;
}
$footer_link_color  = cs_get_customize_option( 'footer_link_color' );
if ($footer_link_color) {
echo <<<CSS
  .no-class {}
  .sgny-footer-widget-warp .footer-widget-area ul li a, .sgny-footer-widget-warp .footer-widget-area ul li a span, .sgny-footer-widget-warp .footer-widget-area p a {
    color: {$footer_link_color};
  }
CSS;
}
$footer_link_hover_color  = cs_get_customize_option( 'footer_link_hover_color' );
if ($footer_link_hover_color) {
echo <<<CSS
  .no-class {}
  .sgny-footer-widget-warp .footer-widget-area ul li a:hover, .sgny-footer-widget-warp .footer-widget-area ul li a span:hover, .sgny-footer-widget-warp .footer-widget-area p a:hover {
    color: {$footer_link_hover_color};
  }
CSS;
}
$footer_bg_color  = cs_get_customize_option( 'footer_bg_color' );
if ($footer_bg_color) {
echo <<<CSS
  .no-class {}
  footer.sgny-center-container_area.sgny-footer-area {
    background-color: {$footer_bg_color};
  }
CSS;
}

/* Footer Section - Footer Copyright */
$copyright_text_color  = cs_get_customize_option( 'copyright_text_color' );
if ($copyright_text_color) {
echo <<<CSS
  .no-class {}
  .sgny-footer-area p.sgny-copyright {
    color: {$copyright_text_color};
  }
CSS;
}
$copyright_link_color  = cs_get_customize_option( 'copyright_link_color' );
if ($copyright_link_color) {
echo <<<CSS
  .no-class {}
  .sgny-footer-area p.sgny-copyright a {
    color: {$copyright_link_color};
  }
CSS;
}
$copyright_link_hover_color  = cs_get_customize_option( 'copyright_link_hover_color' );
if ($copyright_link_hover_color) {
echo <<<CSS
  .no-class {}
  .sgny-footer-area .sgny-copyright a:hover {
    color: {$copyright_link_hover_color};
  }
CSS;
}

  echo $signy_sgny_get_typography;

  $output = ob_get_clean();
  return $output;

  }

}

/**
 * Custom Font Family
 */
if ( ! function_exists( 'signy_custom_font_load' ) ) {
  function signy_custom_font_load() {

    $font_family       = cs_get_option( 'font_family' );

    ob_start();

    if( ! empty( $font_family ) ) {

      foreach ( $font_family as $font ) {
        echo '@font-face{';

        echo 'font-family: "'. $font['name'] .'";';

        if( empty( $font['css'] ) ) {
          echo 'font-style: normal;';
          echo 'font-weight: normal;';
        } else {
          echo $font['css'];
        }

        echo ( ! empty( $font['ttf']  ) ) ? 'src: url('. $font['ttf'] .');' : '';
        echo ( ! empty( $font['eot']  ) ) ? 'src: url('. $font['eot'] .');' : '';
        echo ( ! empty( $font['svg']  ) ) ? 'src: url('. $font['svg'] .');' : '';
        echo ( ! empty( $font['woff'] ) ) ? 'src: url('. $font['woff'] .');' : '';
        echo ( ! empty( $font['otf']  ) ) ? 'src: url('. $font['otf'] .');' : '';

        echo '}';
      }

    }

    // Typography
    $output = ob_get_clean();
    return $output;
  }
}

/* Custom Styles */
if( ! function_exists( 'signy_sgny_custom_css' ) ) {
  function signy_sgny_custom_css() {
    wp_enqueue_style('signy-default-style', get_template_directory_uri() . '/style.css');
    $output  = signy_custom_font_load();
    $output .= signy_dynamic_styles();
    $output .= cs_get_option( 'theme_custom_css' );
    $custom_css = signy_compress_css_lines( $output );

    wp_add_inline_style( 'signy-default-style', $custom_css );
  }
}

/* Custom JS */
if( ! function_exists( 'signy_sgny_custom_js' ) ) {
  function signy_sgny_custom_js() {
    if ( ! wp_script_is( 'jquery', 'done' ) ) {
      wp_enqueue_script( 'jquery' );
    }
    $output = cs_get_option( 'theme_custom_js' );
    wp_add_inline_script( 'jquery-migrate', $output );
  }
  add_action( 'wp_enqueue_scripts', 'signy_sgny_custom_js' );
}