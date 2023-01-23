<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
// Theme option
$content_padding = cs_get_option('content_spacings');

// Metabox
global $post;
$signy_id    = get_the_ID();
$signy_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $signy_id;
if (is_woocommerce_shop()) {
  $signy_meta  = get_post_meta( wc_get_page_id( 'shop' ), 'page_type_metabox', true );
} else {
  $signy_meta  = get_post_meta( $signy_id, 'page_type_metabox', true );
}
if ($signy_meta) {
	$meta_padding = $signy_meta['content_spacings'];
} else {
	$meta_padding = '';
}

if ($meta_padding != '') {
	$signy_content_padding = $signy_meta['content_spacings'];
} elseif($content_padding) {
	$signy_content_padding = $content_padding;
} else {
	$signy_content_padding = '';
}
// Padding - Metabox
if ($signy_content_padding && $signy_content_padding !== 'padding-none') {
	if($signy_meta){
		$signy_content_top_spacings = $signy_meta['content_top_spacings'];
		$signy_content_bottom_spacings = $signy_meta['content_bottom_spacings'];
	} elseif($content_padding) {
		$signy_content_top_spacings = cs_get_option('content_top_spacings');
		$signy_content_bottom_spacings = cs_get_option('content_bottom_spacings');
	} else {
		$signy_content_top_spacings = '';
		$signy_content_bottom_spacings = '';
	}
	if ($signy_content_padding === 'padding-custom') {
		$signy_content_top_spacings = $signy_content_top_spacings ? 'padding-top:'. signy_check_px($signy_content_top_spacings) .';' : '';
		$signy_content_bottom_spacings = $signy_content_bottom_spacings ? 'padding-bottom:'. signy_check_px($signy_content_bottom_spacings) .';' : '';
		$signy_custom_padding = $signy_content_top_spacings . $signy_content_bottom_spacings;
		$signy_custom_padding = $signy_custom_padding ? 'style='.esc_attr($signy_custom_padding).'' : '';
	} else {
		$signy_custom_padding = '';
	}
} else {
	$signy_custom_padding = '';
}
?>
<div class="sgny-center-container_area sgny-woocommerce-page">
	<div class="sgny-container sgny-main-content">
		<div class="sgny-page-content-area <?php echo esc_attr ($signy_content_padding); ?>" <?php echo esc_attr($signy_custom_padding);?>>
			<?php
				if ( have_posts() ) :
					woocommerce_content();
				endif;
			?>
		</div>
	</div>
</div>
<?php
get_footer();
