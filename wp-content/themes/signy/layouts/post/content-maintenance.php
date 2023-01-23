<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
$signy_viewport = cs_get_option('theme_responsive');
if($signy_viewport == 'on') { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } else { }

// if the `wp_site_icon` function does not exist (ie we're on < WP 4.3)
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
  if (cs_get_option('brand_fav_icon')) {
    echo '<link rel="shortcut icon" href="'. esc_url(wp_get_attachment_url(cs_get_option('brand_fav_icon'))) .'" />';
  } else { ?>
    <link rel="shortcut icon" href="<?php echo esc_url(SIGNY_IMAGES); ?>/favicon.png" />
  <?php }
  if (cs_get_option('iphone_icon')) {
    echo '<link rel="apple-touch-icon" sizes="57x57" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_icon'))) .'" >';
  }
  if (cs_get_option('iphone_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="114x114" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
    echo '<link name="msapplication-TileImage" href="'. esc_url(wp_get_attachment_url(cs_get_option('iphone_retina_icon'))) .'" >';
  }
  if (cs_get_option('ipad_icon')) {
    echo '<link rel="apple-touch-icon" sizes="72x72" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_icon'))) .'" >';
  }
  if (cs_get_option('ipad_retina_icon')) {
    echo '<link rel="apple-touch-icon" sizes="144x144" href="'. esc_url(wp_get_attachment_url(cs_get_option('ipad_retina_icon'))) .'" >';
  }
}
?>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
wp_head();

// Metabox
$signy_id    = ( isset( $post ) ) ? $post->ID : 0;
$signy_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $signy_id;
if (is_woocommerce_shop()) {
  $signy_meta  = get_post_meta( wc_get_page_id( 'shop' ), 'page_type_metabox', true );
} else {
  $signy_meta  = get_post_meta( $signy_id, 'page_type_metabox', true );
}

if ($signy_meta) {
  $signy_content_padding = $signy_meta['content_spacings'];
} else { $signy_content_padding = ''; }
// Padding - Metabox
if ($signy_content_padding && $signy_content_padding !== 'padding-none') {
  $signy_content_top_spacings = $signy_meta['content_top_spacings'];
  $signy_content_bottom_spacings = $signy_meta['content_bottom_spacings'];
  if ($signy_content_padding === 'padding-custom') {
    $signy_content_top_spacings = $signy_content_top_spacings ? 'padding-top:'. signy_check_px($signy_content_top_spacings) .';' : '';
    $signy_content_bottom_spacings = $signy_content_bottom_spacings ? 'padding-bottom:'. signy_check_px($signy_content_bottom_spacings) .';' : '';
    $signy_custom_padding = $signy_content_top_spacings . $signy_content_bottom_spacings;
  } else {
    $signy_custom_padding = '';
  }
} else {
  $signy_custom_padding = '';
}
?>
</head>

	<body <?php body_class(); ?>>
    <div class="sgny-maintenance-mode">
      <div class="container <?php echo esc_attr($signy_content_padding); ?> sgny-content-area" style="<?php echo esc_attr($signy_custom_padding); ?>">
     	<div class="row">
        <?php
          $signy_page = get_post( cs_get_option('maintenance_mode_page') );
          // WPBMap::addAllMappedShortcodes();
          echo ( is_object( $signy_page ) ) ? do_shortcode( $signy_page->post_content ) : '';
        ?>
      </div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>