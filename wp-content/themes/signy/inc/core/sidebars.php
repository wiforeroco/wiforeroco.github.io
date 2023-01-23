<?php
/*
 * Signy Theme Widgets
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
if ( ! function_exists( 'signy_sgny_widget_init' ) ) {
	function signy_sgny_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {

			// Main Widget Area
			register_sidebar(
				array(
					'name' => esc_html__( 'Main Widget Area', 'signy' ),
					'id' => 'sidebar-1',
					'description' => esc_html__( 'Appears on posts and pages.', 'signy' ),
					'before_widget' => '<div id="%1$s" class="sgny-side-widget sgny-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				)
			);
			// Main Widget Area

			// Footer Widgets
	    	$footer_widget_block = cs_get_option('footer_widget_block');
			if (isset($footer_widget_block)) {
		        register_sidebar( array(
		          'id'            => 'footer',
		          'name'          => esc_html__( 'Footer Widget ', 'signy' ),
		          'description'   => esc_html__( 'Appears on footer section.', 'signy' ),
		          'before_widget' => '<div class="sgny-widget %2$s">',
		          'after_widget'  => '</div> <!-- end widget -->',
		          'before_title'  => '<h4 class="widget-title">',
		          'after_title'   => '</h4>'
		        ) );
	      	}
	    	// Footer Widgets

			/* Custom Sidebar */
			$custom_sidebars = cs_get_option('custom_sidebar');
			if ($custom_sidebars) {
				foreach($custom_sidebars as $custom_sidebar) :
				$heading = $custom_sidebar['sidebar_name'];
				$own_id = preg_replace('/[^a-z]/', "-", strtolower($heading));
				$desc = $custom_sidebar['sidebar_desc'];
				register_sidebar( array(
					'name' => esc_attr($heading),
					'id' => $own_id,
					'description' => esc_attr($desc),
					'before_widget' => '<div id="%1$s" class="sgny-widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h4 class="widget-title">',
					'after_title' => '</h4>',
				) );
				endforeach;
			}
			/* Custom Sidebar */

		}
	}
	add_action( 'widgets_init', 'signy_sgny_widget_init' );
}