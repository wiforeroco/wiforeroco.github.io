<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
$single_blog_widget = cs_get_option('single_blog_widget');
$general_blog_widget = cs_get_option('general_blog_widget');
$right_side_widget = cs_get_option('right_side_widget');

// Metabox
global $post;
$signy_id    = get_the_ID();
$signy_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $signy_id;
if (is_woocommerce_shop()) {
  $signy_meta  = get_post_meta( wc_get_page_id( 'shop' ), 'page_type_metabox', true );
} else {
  $signy_meta  = get_post_meta( $signy_id, 'page_type_metabox', true );
}
if($signy_meta){
  $page_sidebar_widget = $signy_meta['page_sidebar_widget'];
} else {
  $page_sidebar_widget = '';
}
if ($right_side_widget) { ?>
<!-- right sidebar start /-->
<div class="sgny-effect-right_sidebar sgny-right-sidebar" id="menu-8">
	<div class="scrollbar-inner sgny-right-sidebar-scroll">
		<div class="sgny-right-sidebar-inner">
			<?php if (is_single() && $single_blog_widget) {
					if (is_active_sidebar($single_blog_widget)) {
						dynamic_sidebar($single_blog_widget);
					}
				} elseif (is_page() && $page_sidebar_widget) {
					if (is_active_sidebar($page_sidebar_widget)) {
						dynamic_sidebar($page_sidebar_widget);
					}
				} elseif ($general_blog_widget) {
					if (is_active_sidebar($general_blog_widget)) {
						dynamic_sidebar($general_blog_widget);
					} } else {
					if (is_active_sidebar('sidebar-1')) {
						dynamic_sidebar( 'sidebar-1' );
					}
				}
			?>
		</div>
	</div>
</div>
<?php } ?>
