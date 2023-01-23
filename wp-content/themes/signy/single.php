<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header();
//Theme Option
$you_also_like_text = cs_get_option('you_also_like_text');
$signy_single_comment = cs_get_option('single_comment_form');
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
?>

<div class="sgny-center-container_area <?php echo esc_attr ($signy_content_padding); ?>" <?php echo esc_attr($signy_custom_padding);?>>
	<div class="sgny-container  sgny-main-content">
		<div class="sgny-single-post-area">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						get_template_part( 'layouts/post/content', 'single' );
					endwhile;
				else :
					get_template_part( 'layouts/post/content', 'none' );
				endif;
			?>
		</div>
	</div>
	<?php
	global $post;
	$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 6, 'post__not_in' => array($post->ID) ) );
	if( $related ) {
	?>
	<div class="sgny-related-post-area">
		<div class="text-center sgny-container">
			<h5 class="sgny-relat-post-heading">
				<?php if ($you_also_like_text) {
					echo esc_attr($you_also_like_text);
				} else {
					echo esc_html__('You May also Like', 'signy');
				}
				?>
			</h5>
			<div class="owl-carousel sgny-related-post-carousel">
     		<?php
					foreach( $related as $post ) {
					setup_postdata($post);
				?>
				<div class="sgny-single-related-post">
				<?php
					// Metabox
					$signy_meta  = get_post_meta( $post->ID, 'post_type_metabox', true );
					if($signy_meta) {
						$custom_related_image = $signy_meta['related_image'];
					} else {
						$custom_related_image = '';
					}
					if($custom_related_image) {
						$signy_large_image = wp_get_attachment_image_src( $signy_meta['related_image'], 'fullsize', true );
					} else {
						$signy_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', true, '' );
			    }
					$signy_large_image = $signy_large_image[0];
			    if(class_exists('Aq_Resize')) {
        		$related_img = aq_resize( $signy_large_image, '265', '100', true );
	        } else {
        		$related_img = $signy_large_image;
	        }
			    if ($related_img) {
		    	?>
  				<img src="<?php echo esc_url($related_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
  				<?php } ?>
					<div class="gny-rel-post-info">
						<h6 class="sgny-rel-post-date"><?php echo get_the_date(); ?></h6>
						<h4 class="sgny-rel-post-title"><a href="<?php esc_url(the_permalink()) ?>"><?php esc_attr(the_title()); ?></a></h4>
					</div>
				</div>
				<?php }
				wp_reset_postdata(); ?>
	    </div>
		</div>
	</div>
	<?php }
	if($signy_single_comment) {
		comments_template();
	} ?>
</div>
<?php
get_footer();
