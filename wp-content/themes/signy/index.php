<?php
/*
 * The main template file.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
// Theme option
$signy_blog_style = cs_get_option('blog_listing_style');
$content_padding = cs_get_option('content_spacings');

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

if ($signy_blog_style === 'style-three') { ?>

<div class="sgny-center-container_area">
	<div class="sgny-page-content-area <?php echo esc_attr ($signy_content_padding); ?>" <?php echo esc_attr($signy_custom_padding);?>>
		<div class="sgny-container  sgny-main-content">
			<div class="sgny-fix  sgny-masonary-content-warp">
				<div class="sgny-fix  sgny-masonary-post-warp">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'layouts/post/content' );
							endwhile;
						else :
							get_template_part( 'layouts/post/content', 'none' );
						endif;
					?>
				</div>
			</div>
		</div>
			<?php
				signy_paging_nav();
				wp_reset_postdata();  // avoid errors further down the page
			?>
	</div>
</div>

<?php } elseif ($signy_blog_style === 'style-two') { ?>

<div class="sgny-center-container_area">
	<div class="sgny-page-content-area <?php echo esc_attr ($signy_content_padding); ?>" <?php echo esc_attr($signy_custom_padding);?>>
		<div class="sgny-container  sgny-main-content">
		  <div class="sgny-fix  sgny-list-post-warp">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'layouts/post/content' );
						endwhile;
					else :
						get_template_part( 'layouts/post/content', 'none' );
					endif;
				?>
			</div>
		</div>
			<?php
				signy_paging_nav();
				wp_reset_postdata();
			?>
	</div>
</div>
<?php } else {  ?>

<div class="sgny-center-container_area">
	<div class="sgny-page-content-area <?php echo esc_attr ($signy_content_padding); ?>" <?php echo esc_attr($signy_custom_padding);?>>
		<div class="sgny-container  sgny-main-content">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						get_template_part( 'layouts/post/content' );
					endwhile;
				else :
					get_template_part( 'layouts/post/content', 'none' );
				endif;
			?>
		</div>
			<?php
				signy_paging_nav();
				wp_reset_postdata();
			?>
	</div>
</div>
	<?php }
get_footer();
