<?php
/**
 * Single Post.
 */ ?>

<article id="sgny-post_1" <?php post_class('sgny-single-p-post'); ?>>
<?php
// Theme Options
$share_post_text = cs_get_option('share_post_text');
$signy_single_featured_image = cs_get_option('single_featured_image');
$signy_single_author_info = cs_get_option('single_author_info');
$signy_single_share_option = cs_get_option('single_share_option');
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
$post_link = $audio_post ='';
$video_post ='';
$gallery_post_format = '';
$gallery_type = '';
}

// Audio Post
if(get_post_format() === 'quote') { ?>
<?php if($quote_post_text) {  ?>
	<div class="sgny-post-media">
		<div class="sgny-li_qu_format-content-warp">
			<div class="text-center sgny-quote-post">
				<blockquote>
					<?php echo esc_attr($quote_post_text);
					if($quote_post_author) { ?>
					  <cite><a href="<?php echo esc_url($quote_post_author_link);?>"><?php echo esc_attr($quote_post_author);?></a></cite>
				</blockquote>
			        <?php } ?>
			</div>
		</div>
	</div>
<?php } } elseif(get_post_format() === 'video') { ?>

 <!-- Video Post -->
<div class="text-center sgny-post-header">
	<div class="text-uppercase  sgny-post-meta">
		<span class="sgny-post-date">
			<?php echo get_the_date(); ?>
		</span>
		<span class="sgny-post-in">
			<?php echo get_the_category_list( ', ', '', $post->ID ); ?>
		</span>
	</div>
	<h1 class="sgny-post-title"><?php esc_attr(the_title()); ?></h1>
</div>
<?php if($video_post) {  ?>
	<div class="sgny-post-media">
		<div class="sgny-video_contant">
			<?php echo $video_post; ?>
		</div>
	</div>
<?php } }
elseif(get_post_format() === 'link') {  ?>

<!-- Link Post -->
<?php if($post_link) {  ?>
<div class="sgny-post-media">
	<div class="sgny-li_qu_format-content-warp">
		<div class="text-center sgny-link-post">
			<a href="<?php echo esc_url($post_link);?>">
				<span class="icon-link sgny-link-icon"></span>
				<?php echo esc_url($post_link);?>
			</a>
		</div>
	</div>
</div>
<?php } } elseif(get_post_format() === 'gallery') {
  if($gallery_type ==='slider') {
 ?>
 <!-- Gallery Slider Type-->
<div class="text-center sgny-post-header">
	<div class="text-uppercase  sgny-post-meta">
		<span class="sgny-post-date">
			<?php echo get_the_date(); ?>
		</span>-
		<span class="sgny-post-in">
			<?php echo get_the_category_list( ', ', '', $post->ID ); ?>
		</span>
	</div>
	<h1 class="sgny-post-title"><?php esc_attr(the_title()); ?></h1>
</div>
<div class="sgny-post-media">
  <a class="text-uppercase sgny-pin-btn" href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php the_post_thumbnail_url(); ?>&description=<?php print(urlencode(get_the_excerpt())); ?>" target="_blank"><span><?php esc_html_e('PIN', 'signy'); ?></span></a><!--/end-->
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
<?php } else { ?>

<!-- Gallery Post -->

<div class="text-center sgny-post-header">
	<div class="text-uppercase  sgny-post-meta">
		<span class="sgny-post-date">
			<?php echo get_the_date(); ?>
		</span>-
		<span class="sgny-post-in">
			<?php echo get_the_category_list( ', ', '', $post->ID ); ?>
		</span>
	</div>
	<h1 class="sgny-post-title"><?php esc_attr(the_title()); ?></h1>
</div>
<?php if($gallery_post_format) {  ?>
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
<?php } } } elseif(get_post_format() === 'audio') {  ?>

<!-- Audio Post -->
<div class="text-center sgny-post-header">
	<div class="text-uppercase  sgny-post-meta">
		<span class="sgny-post-date">
			<?php echo get_the_date(); ?>
		</span>-
		<span class="sgny-post-in">
			<?php echo get_the_category_list( ', ', '', $post->ID ); ?>
		</span>
	</div>
	<h1 class="sgny-post-title"><?php esc_attr(the_title()); ?></h1>
</div>
<?php if($audio_post) {  ?>
	<div class="sgny-post-media">
	  <?php echo $audio_post; ?>
	</div>
<?php } } else { ?>
<div class="text-center sgny-post-header">
	<div class="text-uppercase  sgny-post-meta">
		<span class="sgny-post-date">
			<?php echo get_the_date(); ?>
		</span>-
		<span class="sgny-post-in">
			<?php echo get_the_category_list( ', ', '', $post->ID ); ?>
		</span>
	</div>
	<h1 class="sgny-post-title"><?php esc_attr(the_title()); ?></h1>
</div>
<?php if ($signy_single_featured_image) { ?>
<div class="sgny-post-media">
	<a class="text-uppercase sgny-pin-btn" href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php the_post_thumbnail_url(); ?>&description=<?php print(urlencode(get_the_excerpt())); ?>" target="_blank"><span><?php esc_html_e('PIN', 'signy'); ?></span></a><!--/end-->
	<a href=""><?php the_post_thumbnail(); ?></a>
</div>
<?php } }?>

	<div class="sgny-fix sgny-entry-content  sgny-single-p-entry-content">
		<?php
			the_content();
			signy_wp_link_pages();
		?>
	<!--post footer start\-->
	<div class="sgny-post-footer sgny-single-p-footer">
		<div class="sgny-meta-tags">
			<?php
				$tag_list = get_the_tags();
				if($tag_list) { ?>
					<div class="bp-tags">
						<?php echo the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
					</div>
			<?php } ?>
		</div>
		<?php if($signy_single_share_option) { ?>
			<div class="sgny-fix  sgny-single-p-foo-info">
				<div class="text-uppercase  sgny-post-share-text">
				<?php if ($share_post_text) {
					echo esc_attr($share_post_text);
				} else {
					echo esc_html__('Share This Post', 'signy');
				}
				?>
				</div>
				<!--post social  start\-->
				<div class="sgny-post-foo-social sgny-single-p-social">
					<?php echo signy_wp_share_option(); ?>
				</div>
		  </div>
	  <?php } ?>
	  </div>
	  </div>
</article>
		<?php
			if($signy_single_author_info) {
      	echo signy_author_info();
      }
    ?>
        <!--post pager links start\-->
		<div class="sgny-fix sgny-single-pager-links">
			<div class="text-left sgny-prev-post-link">
				<?php $prev_post = get_adjacent_post(false, '', true);
				if(!empty($prev_post)) {
				echo '<a href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">' . $prev_post->post_title . '</a>'; } ?>
			</div>
			<div class="text-right sgny-next-post-link">
				<?php $next_post = get_adjacent_post(false, '', false);
				if(!empty($next_post)) {
				echo '<a href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . $next_post->post_title . '</a>'; } ?>
			</div>
		</div>
