<?php
/**
 * Template part for displaying posts.
 */

// Theme Options
$signy_blog_style = cs_get_option('blog_listing_style');
$continue_reading_text = cs_get_option('continue_reading_text');
$post_by_text = cs_get_option('post_by_text');
// Metabox
$signy_meta  = get_post_meta( $post->ID, 'post_type_metabox', true );
if($signy_meta){
	$quote_post_text = $signy_meta['quote_post_text'];
	$quote_post_author = $signy_meta['quote_post_author'];
	$quote_post_author_link = $signy_meta['quote_post_author_link'];
	$post_link = $signy_meta['post_link'];
	$audio_post = $signy_meta['audio_post'];
	$video_post = $signy_meta['video_post'];
	$gallery_post_format = $signy_meta['gallery_post_format'];
	$gallery_type = $signy_meta['gallery_type'];
} else {
	$quote_post_text = '';
	$quote_post_author = '';
	$quote_post_author_link = '';
	$post_link = '';
	$audio_post = '';
	$video_post = '';
	$gallery_post_format = '';
	$gallery_type = '';
}
$signy_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
global $post;
if ($signy_blog_style === 'style-two') { ?>

	<!-- single list post start\-->
	<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post-list'); ?>>
		<div class="sgny-post-media sgny-list-post-media">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
		</div>
		<div class="sgny-fix sgny-list-post-cont-warp">
			<div class="text-left sgny-post-header sgny-list-post-header">
				<div class="text-uppercase  sgny-post-meta  sgny-list-post-meta">
				  <?php if ( !in_array( 'date', $signy_metas_hide ) ) { // date Hide ?>
						<span class="sgny-post-date">
							<?php echo get_the_date(); ?>
						</span>
					<?php }
				  if ( !in_array( 'category', $signy_metas_hide ) ) { // Category Hide ?>
						<span class="sgny-post-in">
							<?php the_category(); ?>
						</span>
					<?php } ?>
				</div>
				<h1 class="sgny-post-title sgny-list-post-title">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a>
				</h1>
			</div>
			<div class="sgny-entry-content sgny-list-entry-content">
				<?php
					$blog_excerpt = cs_get_option('theme_blog_excerpt');
					if ($blog_excerpt) {
						$blog_excerpt = $blog_excerpt;
					} else {
						$blog_excerpt = '55';
					}
					signy_excerpt($blog_excerpt);
					signy_wp_link_pages();
				?>
			</div>
			<div class="sgny-post-footer">
				<div class="text-left sgny-readmore-btn-warp   sgny-readmore-list-btn-warp">
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
						<?php if ($continue_reading_text) {
							echo esc_attr($continue_reading_text);
						 } else {
							echo esc_html__('Continue Reading', 'signy');
					    } ?>
					</a>
				</div>
			</div>
		</div>
	</article>

<?php } elseif ($signy_blog_style === 'style-three') { ?>

<div class="sgny-fix sgny-masonary-single-post-item">
	<div class="sgny-masonary-single-post">
<?php if(get_post_format() === 'gallery') {
      if($gallery_type ==='slider') {
?>
		<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post'); ?>>
			<div class="sgny-post-media">
				<div class="owl-carousel  sgny-post-slider">
					<?php
					$ids = explode( ',', $gallery_post_format );
					foreach ( $ids as $id ) {
					  $attachment = wp_get_attachment_image_src( $id, 'fullsize' );
					  $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
					  $g_img = $attachment[0];
				    $post_img = $g_img;
					  echo '<div class="sgny-slide-single-item"><img src="'. $post_img .'" alt="'. esc_attr($alt) .'" /></div>';
					}
					?>
				</div>
				<div id="sgny-owlDots"></div>
			</div>
			<div class="text-center sgny-post-header sgny-masonary-post-header">
				<div class="text-uppercase  sgny-post-meta  sgny-masonary-post-meta">
				  <?php if ( !in_array( 'date', $signy_metas_hide ) ) { // date Hide ?>
						<span class="sgny-post-date">
							<?php echo get_the_date(); ?>
						</span>
					<?php }
					if ( !in_array( 'category', $signy_metas_hide ) ) { // category Hide ?>
						<span class="sgny-post-in">
							<?php the_category(); ?>
						</span>
					<?php } ?>
				</div>

				<h1 class="sgny-post-title sgny-masonary-post-title">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a>
				</h1>
			</div>
			<div class="sgny-entry-content sgny-masonary-entry-content">
				<?php
					$blog_excerpt = cs_get_option('theme_blog_excerpt');
					if ($blog_excerpt) {
						$blog_excerpt = $blog_excerpt;
					} else {
						$blog_excerpt = '55';
					}
					signy_excerpt($blog_excerpt);
					signy_wp_link_pages();
				?>
			</div>
			<div class="sgny-post-footer">
				<div class="text-center sgny-readmore-btn-warp   sgny-readmore-masonary-btn-warp">
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
						<?php if ($continue_reading_text) {
							  echo esc_attr($continue_reading_text);
						  } else {
							  echo esc_html__('Continue Reading', 'signy');
						} ?>
					</a>
				</div>
			</div>
		</article>
<?php } else { ?>

		<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post'); ?>>
			<div class="sgny-post-media">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
			<div class="text-center sgny-post-header sgny-masonary-post-header">
				<div class="text-uppercase  sgny-post-meta  sgny-masonary-post-meta">
					<?php if ( !in_array( 'date', $signy_metas_hide ) ) { // date Hide ?>
						<span class="sgny-post-date">
							<?php echo get_the_date(); ?>
						</span>
					<?php }
					 if ( !in_array( 'category', $signy_metas_hide ) ) { // category Hide ?>
						<span class="sgny-post-in">
							<?php the_category(); ?>
						</span>
					<?PHP } ?>
				</div>
				<h1 class="sgny-post-title sgny-masonary-post-title">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a>
				</h1>
			</div>
			<div class="sgny-entry-content sgny-masonary-entry-content">
			<?php
				$blog_excerpt = cs_get_option('theme_blog_excerpt');
				if ($blog_excerpt) {
					$blog_excerpt = $blog_excerpt;
				} else {
					$blog_excerpt = '55';
				}
				signy_excerpt($blog_excerpt);
				signy_wp_link_pages();
			?>
			</div>
			<div class="sgny-post-footer">
				<div class="text-center sgny-readmore-btn-warp   sgny-readmore-masonary-btn-warp">
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
						<?php if ($continue_reading_text) {
							  echo esc_attr($continue_reading_text);
						  } else {
							  echo esc_html__('Continue Reading', 'signy');
						} ?>
					</a>
				</div>
			</div>
		</article>
		<?php } } elseif(get_post_format() === 'video') { ?>

		<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post'); ?>>
			<div class="sgny-post-media">
				<div class="sgny-video_contant">
					<?php echo $video_post; ?>
				</div>
			</div>
			<div class="text-center sgny-post-header sgny-masonary-post-header">
				<div class="text-uppercase  sgny-post-meta  sgny-masonary-post-meta">
					<?php if ( !in_array( 'date', $signy_metas_hide ) ) { // date Hide ?>
						<span class="sgny-post-date">
							<?php echo get_the_date(); ?>
						</span>
					<?php }
					if ( !in_array( 'category', $signy_metas_hide ) ) { // category Hide ?>
						<span class="sgny-post-in">
							<?php the_category(); ?>
						</span>
					<?php } ?>
				</div>
				<h1 class="sgny-post-title sgny-masonary-post-title">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a>
				</h1>
			</div>
			<div class="sgny-entry-content sgny-masonary-entry-content">
			<?php
				$blog_excerpt = cs_get_option('theme_blog_excerpt');
				if ($blog_excerpt) {
					$blog_excerpt = $blog_excerpt;
				} else {
					$blog_excerpt = '55';
				}
				signy_excerpt($blog_excerpt);
				signy_wp_link_pages();
			?>
			</div>
			<div class="sgny-post-footer">
				<div class="text-center sgny-readmore-btn-warp   sgny-readmore-masonary-btn-warp">
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
						<?php if ($continue_reading_text) {
							  echo esc_attr($continue_reading_text);
						  } else {
							  echo esc_html__('Continue Reading', 'signy');
						} ?>
					</a>
				</div>
			</div>
		</article>
		<?php } else {
			if(get_post_format() === 'aside') {
				$aside_class = 'format-aside-masonary';
			} else {
				$aside_class = '';
			}
		?>
		<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post '.$aside_class); ?>>
			<div class="sgny-post-media">
			<a class="text-uppercase sgny-pin-btn" href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php the_post_thumbnail_url(); ?>&description=<?php print(urlencode(get_the_excerpt())); ?>" target="_blank"><span><?php esc_html_e('PIN', 'signy'); ?></span></a>
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
			<div class="text-center sgny-post-header sgny-masonary-post-header">
				<div class="text-uppercase  sgny-post-meta  sgny-masonary-post-meta">
					<?php if ( !in_array( 'date', $signy_metas_hide ) ) { // date Hide ?>
						<span class="sgny-post-date">
							<?php echo get_the_date(); ?>
						</span>
					<?php }
					if ( !in_array( 'category', $signy_metas_hide ) ) { // category Hide ?>
						<span class="sgny-post-in">
							<?php the_category(); ?>
						</span>
					<?php } ?>
				</div>
				<h1 class="sgny-post-title sgny-masonary-post-title">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a>
				</h1>
			</div>
			<div class="sgny-entry-content sgny-masonary-entry-content">
			<?php
				$blog_excerpt = cs_get_option('theme_blog_excerpt');
				if ($blog_excerpt) {
					$blog_excerpt = $blog_excerpt;
				} else {
					$blog_excerpt = '55';
				}
				signy_excerpt($blog_excerpt);
				signy_wp_link_pages();
			?>
			</div>
			<div class="sgny-post-footer">
				<div class="text-center sgny-readmore-btn-warp   sgny-readmore-masonary-btn-warp">
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
						<?php if ($continue_reading_text) {
							  echo esc_attr($continue_reading_text);
						  } else {
							  echo esc_html__('Continue Reading', 'signy');
						} ?>
					</a>
				</div>
			</div>
		</article>
		<?php } ?>
	</div>
</div>

<?php } else {
if(get_post_format() === 'aside') {
if(has_post_thumbnail()) {
	$class = 'format-aside';
} else {
	$class = 'format-aside aside-no-media';
}?>
<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post '.$class); ?>>
	<div class="sgny-post-media">
		<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
	</div>
	<div class="sgny-fix sgny-aside-post-warp">
		<div class="text-center  sgny-post-header">
			<div class="text-uppercase  sgny-post-meta">
				<?php if ( !in_array( 'date', $signy_metas_hide ) ) { // date Hide ?>
					<span class="sgny-post-date">
						<?php echo get_the_date(); ?>
					</span>
				<?php }
				if ( !in_array( 'category', $signy_metas_hide ) ) { // category Hide ?>
					<span class="sgny-post-in">
						<?php echo get_the_category_list( ', ', '', $post->ID ); ?>
					</span>
				<?php } ?>
			</div>
			<h2 class="sgny-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>
		</div>
		<div class="sgny-entry-content">
			<?php
				$blog_excerpt = cs_get_option('theme_blog_excerpt');
				if ($blog_excerpt) {
					$blog_excerpt = $blog_excerpt;
				} else {
					$blog_excerpt = '55';
				}
				signy_excerpt($blog_excerpt);
				signy_wp_link_pages();
			?>
		</div>
		<div class="sgny-post-footer">
			<div class="text-center sgny-readmore-btn-warp">
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
					<?php if ($continue_reading_text) {
						  echo esc_attr($continue_reading_text);
					   } else {
						  echo esc_html__('Continue Reading', 'signy');
					} ?>
				</a>
			</div>
			<?php if ( ( !in_array( 'social', $signy_metas_hide )) || ( !in_array( 'author', $signy_metas_hide ))){  ?>
				<div class="sgny-fix  sgny-post-foo-info">
					<?php if ( !in_array( 'author', $signy_metas_hide ) ) { // author Hide ?>
						<div class="sgny-post-by">
							<span class="sgny-post-author-thumb">
								<?php
									if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE):
										echo get_avatar( get_the_author_meta( 'ID' ) );
								else: ?>
		          		<img src="<?php echo esc_url(SIGNY_IMAGES); ?>/home-page/post-image/post-author-thumb.png" alt="<?php the_author_meta( 'display_name' ); ?>" />
		            <?php endif; ?>
							</span>
							<?php if ($post_by_text) {
								  echo esc_attr($post_by_text);
								} else {
								  echo esc_html__('by', 'signy');
								}
							?>
							<span class="sgny-post-author-name">
								<?php the_author_link(); ?>
							</span>
						</div>
					<?php }
					if ( !in_array( 'social', $signy_metas_hide ) ) { // social icons Hide ?>
						<div class="sgny-post-foo-social">
							<?php echo signy_wp_share_option(); ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</article>
<?php } elseif(get_post_format() === 'gallery')  {
	 if($gallery_type ==='slider') {
?>

<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post'); ?>>
	<div class="text-center  sgny-post-header">
		<div class="text-uppercase  sgny-post-meta">
			<?php if ( !in_array( 'date', $signy_metas_hide ) ) { // date Hide ?>
				<span class="sgny-post-date">
					<?php echo get_the_date(); ?>
				</span>
			<?php }
			if ( !in_array( 'category', $signy_metas_hide ) ) { // category Hide ?>
				<span class="sgny-post-in">
					<?php echo get_the_category_list( ', ', '', $post->ID ); ?>
				</span>
			<?php }?>
		</div>
		<h2 class="sgny-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>
	</div>
	<div class="sgny-post-media">
		<a class="text-uppercase sgny-pin-btn" href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php the_post_thumbnail_url(); ?>&description=<?php print(urlencode(get_the_excerpt())); ?>" target="_blank"><span><?php esc_html_e('PIN', 'signy'); ?></span></a>
		<div class="owl-carousel  sgny-post-slider">
		<?php
		$ids = explode( ',', $gallery_post_format );
		foreach ( $ids as $id ) {
		  $attachment = wp_get_attachment_image_src( $id, 'fullsize' );
		  $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
		  $g_img = $attachment[0];
	      $post_img = $g_img;
		  echo '<div class="sgny-slide-single-item"><img src="'. $post_img .'" alt="'. esc_attr($alt) .'" /></div>';
		}
		?>
		</div>
		<div id="sgny-owlDots"></div>
	</div>
	<div class="sgny-entry-content">
	<?php
		$blog_excerpt = cs_get_option('theme_blog_excerpt');
		if ($blog_excerpt) {
			$blog_excerpt = $blog_excerpt;
		} else {
			$blog_excerpt = '55';
		}
		signy_excerpt($blog_excerpt);
		signy_wp_link_pages();
	?>
	</div>
		<div class="sgny-post-footer">
			<div class="text-center sgny-readmore-btn-warp">
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
					<?php if ($continue_reading_text) {
						  echo esc_attr($continue_reading_text);
					   } else {
						  echo esc_html__('Continue Reading', 'signy');
					} ?>
				</a>
			</div>
			<?php if (( !in_array( 'social', $signy_metas_hide )) || ( !in_array( 'author', $signy_metas_hide ))) {  ?>
			<div class="sgny-fix  sgny-post-foo-info">
				<?php if ( !in_array( 'author', $signy_metas_hide ) ) { // author Hide ?>
					<div class="sgny-post-by">
						<span class="sgny-post-author-thumb">
							<?php
								if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE):
									echo get_avatar( get_the_author_meta( 'ID' ) );
							else: ?>
	          		<img src="<?php echo esc_url(SIGNY_IMAGES); ?>/home-page/post-image/post-author-thumb.png" alt="<?php the_author_meta( 'display_name' ); ?>" />
	            <?php endif; ?>
						</span>
						<?php if ($post_by_text) {
							  echo esc_attr($post_by_text);
							} else {
							  echo esc_html__('by', 'signy');
							}
						?>
						<span class="sgny-post-author-name">
							<?php the_author_link(); ?>
						</span>
					</div>
				<?php }
				if ( !in_array( 'social', $signy_metas_hide ) ) { // social icons Hide ?>
					<div class="sgny-post-foo-social">
						<?php echo signy_wp_share_option(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
</article>
<?php } else { ?>

<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post'); ?>>
	<div class="text-center  sgny-post-header">
		<div class="text-uppercase  sgny-post-meta">
			<?php if ( !in_array( 'date', $signy_metas_hide ) ) { // date Hide ?>
				<span class="sgny-post-date">
					<?php echo get_the_date(); ?>
				</span>
			<?php }
			if ( !in_array( 'category', $signy_metas_hide ) ) { // category Hide ?>
				<span class="sgny-post-in">
					<?php echo get_the_category_list( ', ', '', $post->ID ); ?>
				</span>
			<?php } ?>
		</div>
		<h2 class="sgny-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>
	</div>
	<div class="sgny-post-media">
		<div class="sgny-gallery-warp">
		<?php
		$ids = explode( ',', $gallery_post_format );
		foreach ( $ids as $id ) {
		  $attachment = wp_get_attachment_image_src( $id, 'fullsize' );
		  $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
		  $g_img = $attachment[0];
	    $post_img = $g_img;
		  echo '<div class="sgny-gallery-single-item"><div class="sgny-gallery-item"><a href=""><img src="'. $post_img .'" alt="'. esc_attr($alt) .'" /></a></div></div>';
		}
		?>
		</div>
	</div>
	<div class="sgny-entry-content">
	<?php
		$blog_excerpt = cs_get_option('theme_blog_excerpt');
		if ($blog_excerpt) {
			$blog_excerpt = $blog_excerpt;
		} else {
			$blog_excerpt = '55';
		}
		signy_excerpt($blog_excerpt);
		signy_wp_link_pages();
	?>
	</div>
		<div class="sgny-post-footer">
			<div class="text-center sgny-readmore-btn-warp">
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
					<?php if ($continue_reading_text) {
						  echo esc_attr($continue_reading_text);
					   } else {
						  echo esc_html__('Continue Reading', 'signy');
					} ?>
				</a>
			</div>
			<?php if (( !in_array( 'social', $signy_metas_hide )) || ( !in_array( 'author', $signy_metas_hide ))) {  ?>
			<div class="sgny-fix  sgny-post-foo-info">
				<?php if ( !in_array( 'author', $signy_metas_hide ) ) { // author Hide ?>
					<div class="sgny-post-by">
						<span class="sgny-post-author-thumb">
							<?php
								if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE):
									echo get_avatar( get_the_author_meta( 'ID' ) );
							else: ?>
	          		<img src="<?php echo esc_url(SIGNY_IMAGES); ?>/home-page/post-image/post-author-thumb.png" alt="<?php the_author_meta( 'display_name' ); ?>" />
	            <?php endif; ?>
						</span>
						<?php if ($post_by_text) {
							  echo esc_attr($post_by_text);
							} else {
							  echo esc_html__('by', 'signy');
							}
						?>
						<span class="sgny-post-author-name">
							<?php the_author_link(); ?>
						</span>
					</div>
				<?php }
				if ( !in_array( 'social', $signy_metas_hide ) ) { // social icons Hide ?>
					<div class="sgny-post-foo-social">
						<?php echo signy_wp_share_option(); ?>
					</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
</article>
<?php } } elseif(get_post_format() === 'video')  { ?>

<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post'); ?>>
	<div class="text-center  sgny-post-header">
		<div class="text-uppercase  sgny-post-meta">
			<?php if ( !in_array( 'date', $signy_metas_hide ) ) { // date Hide ?>
				<span class="sgny-post-date">
					<?php echo get_the_date(); ?>
				</span>
			<?php }
			if ( !in_array( 'category', $signy_metas_hide ) ) { // category Hide ?>
				<span class="sgny-post-in">
					<?php echo get_the_category_list( ', ', '', $post->ID ); ?>
				</span>
			<?php } ?>
		</div>
		<h2 class="sgny-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>
	</div>
<?php if($video_post) {  ?>
	<div class="sgny-post-media">
		<div class="sgny-video_contant">
			<?php echo $video_post; ?>
		</div>
	</div>
<?php } ?>
	<div class="sgny-entry-content">
	<?php
		$blog_excerpt = cs_get_option('theme_blog_excerpt');
		if ($blog_excerpt) {
			$blog_excerpt = $blog_excerpt;
		} else {
			$blog_excerpt = '55';
		}
		signy_excerpt($blog_excerpt);
		signy_wp_link_pages();
	?>
	</div>
		<div class="sgny-post-footer">
			<div class="text-center sgny-readmore-btn-warp">
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
					<?php if ($continue_reading_text) {
						  echo esc_attr($continue_reading_text);
					   } else {
						  echo esc_html__('Continue Reading', 'signy');
					} ?>
				</a>
			</div>
			<?php if (( !in_array( 'social', $signy_metas_hide )) || ( !in_array( 'author', $signy_metas_hide ))) {  ?>
			<div class="sgny-fix  sgny-post-foo-info">
				<?php if ( !in_array( 'author', $signy_metas_hide ) ) { // author Hide ?>
					<div class="sgny-post-by">
						<span class="sgny-post-author-thumb">
							<?php
								if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE):
									echo get_avatar( get_the_author_meta( 'ID' ) );
							else: ?>
	          		<img src="<?php echo esc_url(SIGNY_IMAGES); ?>/home-page/post-image/post-author-thumb.png" alt="<?php the_author_meta( 'display_name' ); ?>" />
	            <?php endif; ?>
						</span>
						<?php if ($post_by_text) {
							  echo esc_attr($post_by_text);
							} else {
							  echo esc_html__('by', 'signy');
							}
						?>
						<span class="sgny-post-author-name">
							<?php the_author_link(); ?>
						</span>
					</div>
				<?php }
				if ( !in_array( 'social', $signy_metas_hide ) ) { // social icons Hide ?>
					<div class="sgny-post-foo-social">
						<?php echo signy_wp_share_option(); ?>
					</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
</article>
<?php } elseif(get_post_format() === 'audio')  { ?>

<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post'); ?>>
	<div class="text-center  sgny-post-header">
		<div class="text-uppercase  sgny-post-meta">
			<?php if ( !in_array( 'date', $signy_metas_hide ) ) { // date Hide ?>
				<span class="sgny-post-date">
					<?php echo get_the_date(); ?>
				</span>
			<?php }
			if ( !in_array( 'category', $signy_metas_hide ) ) { // category Hide ?>
				<span class="sgny-post-in">
					<?php echo get_the_category_list( ', ', '', $post->ID ); ?>
				</span>
			<?php } ?>
		</div>
		<h2 class="sgny-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>
	</div>
<?php if($audio_post) {  ?>
	<div class="sgny-post-media">
	  <?php echo $audio_post; ?>
	</div>
<?php } ?>
	<div class="sgny-entry-content">
	<?php
		$blog_excerpt = cs_get_option('theme_blog_excerpt');
		if ($blog_excerpt) {
			$blog_excerpt = $blog_excerpt;
		} else {
			$blog_excerpt = '55';
		}
		signy_excerpt($blog_excerpt);
		signy_wp_link_pages();
	?>
	</div>
	<div class="sgny-post-footer">
		<div class="text-center sgny-readmore-btn-warp">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
				<?php if ($continue_reading_text) {
					  echo esc_attr($continue_reading_text);
				   } else {
					  echo esc_html__('Continue Reading', 'signy');
				} ?>
			</a>
		</div>
		<?php if (( !in_array( 'social', $signy_metas_hide )) || ( !in_array( 'author', $signy_metas_hide ))) {  ?>
		<div class="sgny-fix  sgny-post-foo-info">
			<?php if ( !in_array( 'author', $signy_metas_hide ) ) { // author Hide ?>
				<div class="sgny-post-by">
					<span class="sgny-post-author-thumb">
						<?php
							if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE):
								echo get_avatar( get_the_author_meta( 'ID' ) );
						else: ?>
          		<img src="<?php echo esc_url(SIGNY_IMAGES); ?>/home-page/post-image/post-author-thumb.png" alt="<?php the_author_meta( 'display_name' ); ?>" />
            <?php endif; ?>
					</span>
					<?php if ($post_by_text) {
							  echo esc_attr($post_by_text);
							} else {
							  echo esc_html__('by', 'signy');
							}
						?>
					<span class="sgny-post-author-name">
						<?php the_author_link(); ?>
					</span>
				</div>
			<?php }
			if ( !in_array( 'social', $signy_metas_hide ) ) { // social icons Hide ?>
				<div class="sgny-post-foo-social">
					<?php echo signy_wp_share_option(); ?>
				</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</article>
<?php } else {
if (is_sticky()) {
 $class_name = 'sgny-single-post sticky';
} else {
 $class_name = 'sgny-single-post';
}?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class_name); ?>>
	<div class="text-center sgny-post-header">
		<div class="text-uppercase  sgny-post-meta">
			<?php if ( !in_array( 'date', $signy_metas_hide ) ) { // date Hide ?>
				<span class="sgny-post-date">
					<?php echo get_the_date(); ?>
				</span>
			<?php }
			if ( !in_array( 'category', $signy_metas_hide ) ) { // category Hide ?>
				<span class="sgny-post-in">
					<?php echo get_the_category_list( ', ', '', $post->ID ); ?>
				</span>
			<?php } ?>
		</div>
		<h2 class="sgny-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>
	</div>
	<div class="sgny-post-media">
	<a class="text-uppercase sgny-pin-btn" href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php the_post_thumbnail_url(); ?>&description=<?php echo urlencode(get_the_excerpt()); ?>" target="_blank"><span><?php esc_html_e('PIN', 'signy'); ?></span></a>
		<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
	</div>
	<div class="sgny-entry-content">
	<?php
		$blog_excerpt = cs_get_option('theme_blog_excerpt');
		if ($blog_excerpt) {
			$blog_excerpt = $blog_excerpt;
		} else {
			$blog_excerpt = '55';
		}
		signy_excerpt($blog_excerpt);
		signy_wp_link_pages();
	?>
	</div>
	<div class="sgny-post-footer">
		<div class="text-center sgny-readmore-btn-warp">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
				<?php if ($continue_reading_text) {
					  echo esc_attr($continue_reading_text);
				   } else {
					  echo esc_html__('Continue Reading', 'signy');
				} ?>
			</a>
		</div>
		<?php if (( !in_array( 'social', $signy_metas_hide )) || ( !in_array( 'author', $signy_metas_hide ))) {  ?>
		<div class="sgny-fix  sgny-post-foo-info">
			<?php if ( !in_array( 'author', $signy_metas_hide ) ) { // author Hide ?>
				<div class="sgny-post-by">
					<span class="sgny-post-author-thumb">
						<?php
							if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE):
								echo get_avatar( get_the_author_meta( 'ID' ) );
						else: ?>
          		<img src="<?php echo esc_url(SIGNY_IMAGES); ?>/home-page/post-image/post-author-thumb.png" alt="<?php the_author_meta( 'display_name' ); ?>" />
            <?php endif; ?>
					</span>
						<?php if ($post_by_text) {
							  echo esc_attr($post_by_text);
							} else {
							  echo esc_html__('by', 'signy');
							}
						?>
					<span class="sgny-post-author-name">
						<?php the_author_link(); ?>
					</span>
				</div>
			<?php }
			if ( !in_array( 'social', $signy_metas_hide ) ) { // social icons Hide ?>
				<div class="sgny-post-foo-social">
					<?php echo signy_wp_share_option(); ?>
				</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</article>
<?php } }?>
