<?php
/*
 * The header for our theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
$signy_viewport      = cs_get_option('theme_responsive');
$left_side_wpml_lang = cs_get_option('left_side_wpml_lang');

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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
  // Metabox Options
  global $post;
  $signy_id    = ( isset( $post ) ) ? $post->ID : false;
  $signy_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $signy_id;
  $signy_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() ) ? $signy_id : false;
  if (is_woocommerce_shop()) {
    $signy_meta  = get_post_meta( wc_get_page_id( 'shop' ), 'page_type_metabox', true );
  } else {
    $signy_meta  = get_post_meta( $signy_id, 'page_type_metabox', true );
  }
  if($signy_meta){
    $meta_left_side_image = $signy_meta['meta_left_side_image'];
  } else {
    $meta_left_side_image = '';
  }
  $left_side_image = cs_get_option('left_side_image');
  $error_left_side_image = cs_get_option('404_left_side_image');
?>
<div id="sgny-page-warp" class="sgny-page-warp">
  <div class="sgny-pusher">
    <div class="scrollbar-inner sgny-content">
      <header class="sgny-header-area">
      <?php
        if(is_category()){
          $categories = get_queried_object();
          $term_data = get_term_meta( $categories->term_id, 'signy_category_tax_options', true );
          if($term_data['post_category_left_image']) {
          ?>
            <aside class="sgny-left-sidebar" style="background:url(<?php echo wp_get_attachment_url($term_data['post_category_left_image']);?>">
          <?php
          } elseif($left_side_image) { ?>
              <aside class="sgny-left-sidebar" style="background:url(<?php echo wp_get_attachment_url($left_side_image)?>">
            <?php } else { ?>
              <aside class="sgny-left-sidebar">
            <?php }
        } elseif( is_404() ) {
          if($error_left_side_image) { ?>
            <aside class="sgny-left-sidebar" style="background:url(<?php echo wp_get_attachment_url($error_left_side_image)?>">
          <?php } elseif($left_side_image) { ?>
            <aside class="sgny-left-sidebar" style="background:url(<?php echo wp_get_attachment_url($left_side_image)?>">
          <?php } else { ?>
            <aside class="sgny-left-sidebar">
          <?php }
        } else { ?>
          <?php if ($meta_left_side_image) { ?>
            <aside class="sgny-left-sidebar" style="background:url(<?php echo wp_get_attachment_url($meta_left_side_image)?>">
          <?php } elseif($left_side_image) { ?>
            <aside class="sgny-left-sidebar" style="background:url(<?php echo wp_get_attachment_url($left_side_image)?>">
          <?php } else { ?>
            <aside class="sgny-left-sidebar">
          <?php }
        } ?>
            <div class="sgny-left-sidebar-inner">

              <!-- WPML  -->
              <?php if ($left_side_wpml_lang ) { ?>
                <span class="sgny-wpml"><?php echo do_shortcode($left_side_wpml_lang); ?></span>
              <?php } ?>
               <!-- WPML  -->

              <div class="sgny-l-sidebar-header">
                <?php get_template_part( 'layouts/header/menu', 'bar' ); ?>
              </div>
                <?php get_template_part( 'layouts/header/leftside', 'section' ); ?>
            </div>
          </aside>
        <div class="sgny-center-container_area sgny-center-header-area">
          <div class="sgny-container">
            <div class="row">
              <div class="col-xs-8">
                <?php
                  get_template_part( 'layouts/header/logo' );
                ?>
              </div>
              <div class="text-right  col-xs-4">
                <?php
                  $right_side_widget = cs_get_option('right_side_widget');
                  if ($right_side_widget) {
                ?>
                  <div class="sgny-r-sidebar-btn-warp">
                    <div id="sgny-trigger-effects" class="column">
                      <button class="sgny-sidebar-open-btn" data-effect="sgny-effect-right_sidebar">
                        <span class="sgny-side-trigger-warp">
                          <span class="sgny-side-trigger-single"></span>
                          <span class="sgny-side-trigger-single"></span>
                          <span class="sgny-side-trigger-single"></span>
                          <span class="sgny-side-trigger-single"></span>
                        </span>
                      </button>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </header>
