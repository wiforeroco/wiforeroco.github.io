
<!-- Left sidebar footer start\-->
<div class="sgny-l-sidebar-footer">
	<div class="sgny-l-sidebar-text">
		<?php
	    $error_left_side_title = cs_get_option('404_left_side_title');
			$error_left_side_content = cs_get_option('404_left_side_content');
			$left_side_title = cs_get_option('left_side_title');
			$left_side_content = cs_get_option('left_side_content');
			$follow_me_text = cs_get_option('follow_me_text');
			$left_side_social_icon = cs_get_option('left_side_social_icon');

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
			$meta_left_side_title = $signy_meta['meta_left_side_title'];
			$meta_left_side_content = $signy_meta['meta_left_side_content'];
		} else {
			$meta_left_side_image = '';
			$meta_left_side_title = '';
			$meta_left_side_content = '';
		}

		if(is_category()){
			$categories = get_queried_object();
			$term = get_category( $categories->term_id );
				if($term->name) { ?>
					<h1><?php echo esc_attr($term->name); ?></h1>
				<?php } elseif ($left_side_title) { ?>
			    <h1><?php echo esc_attr($left_side_title); ?></h1>
				<?php } else { ?>
			    <h1><?php echo get_bloginfo( 'name' ); ?></h1>
				<?php } ?>
		    <?php if ($term->description ) { ?>
					<p><?php echo esc_attr($term->description); ?> </p>
				<?php } elseif ($left_side_content) { ?>
					<p><?php echo esc_attr($left_side_content); ?></p>
		    <?php } else { ?>
			    <p><?php echo get_bloginfo( 'description' ); ?> </p>
		    <?php } ?>
		<?php
		} elseif( is_404() ) {
			if ($error_left_side_title ) { ?>
				<h1><?php echo esc_attr($error_left_side_title); ?></h1>
			<?php } elseif ($left_side_title) { ?>
		    <h1><?php echo esc_attr($left_side_title); ?></h1>
			<?php } else { ?>
		    <h1><?php esc_html_e('Error Page', 'signy'); ?></h1>
			<?php }
			if ($error_left_side_content ) { ?>
				<p><?php echo esc_attr($error_left_side_content); ?> </p>
			<?php } elseif ($left_side_content) { ?>
				<p><?php echo esc_attr($left_side_content); ?></p>
	    <?php } else { ?>
	    	<p><?php esc_html_e('I\'m guessing that you don\'t ended up here because, You\'re looking for the revolutionary blogging experience keep searching on right side.', 'signy'); ?> </p>
	    <?php } ?>

		<?php } else {
      if ($meta_left_side_title ) { ?>
				<h1><?php echo esc_attr($meta_left_side_title); ?></h1>
			<?php } elseif ($left_side_title) { ?>
		    <h1><?php echo esc_attr($left_side_title); ?></h1>
			<?php } elseif(is_page()) { ?>
		    <h1><?php echo the_title(); ?></h1>
			<?php } else { ?>
		    <h1><?php echo get_bloginfo( 'name' ); ?></h1>
			<?php } ?>
	    <?php if ($meta_left_side_content ) { ?>
				<p><?php echo esc_attr($meta_left_side_content); ?> </p>
			<?php } elseif ($left_side_content) { ?>
				<p><?php echo esc_attr($left_side_content); ?></p>
	    <?php } else { ?>
		    <p><?php echo get_bloginfo( 'description' ); ?> </p>
	    <?php } } ?>
			<div class="sgny-fix sgny-l-sidebar-social">
				<span>
					<?php if ($follow_me_text) { echo esc_attr($follow_me_text); } ?>
				</span>
			  <?php if($left_side_social_icon) { ?>
				  <?php echo do_shortcode($left_side_social_icon); ?>
			  <?php } ?>
			</div>
	</div>
</div><!--/ Left sidebar footer  end-->
