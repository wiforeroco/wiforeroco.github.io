<?php
/*
 * All customizer related options for Signy theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'signy_sgny_customizer' ) ) {
  function signy_sgny_customizer( $options ) {

	$options        = array(); // remove old options

	// logo bar Color
	$options[]      = array(
	  'name'        => 'logo_section_color',
	  'title'       => esc_html__('Logo bar Colors', 'signy'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'      => 'logo_sec_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'signy'),
				),
			),
			array(
				'name'      => 'logo_sec_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Border Color', 'signy'),
				),
			),
			array(
				'name'          => 'sidebar_trigger_color',
				'control'       => array(
					'type'      => 'color',
					'label'     => esc_html__('Right Sidebar Trigger Color', 'signy'),
				),
			),
			array(
				'name'          => 'sidebar_trigger_open_color',
				'control'       => array(
					'type'      => 'color',
					'label'     => esc_html__('Right Sidebar Trigger Open Color', 'signy'),
				),
			),
			array(
				'name'      => 'sidebar_trigger_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Right Sidebar Trigger Border Color', 'signy'),
				),
			),
	    // Fields End
	  )
	);
	// Topbar Color

	// Content Color
	$options[]      = array(
	  'name'        => 'left_side_section',
	  'title'       => esc_html__('Left Side Section Colors', 'signy'),
	  'description' => esc_html__('This is all about Left Side Section colors.', 'signy'),
	  'sections'    => array(

				
					// Left Side Section Color
					array(
				  'name'        => 'menu_color_section',
				  'title'       => esc_html__('Menu Colors', 'signy'),
				  'settings'    => array(

				    // Fields Start
						array(
							'name'          => 'header_menu_heading',
							'control'       => array(
								'type'        => 'cs_field',
								'options'     => array(
									'type'      => 'notice',
									'class'     => 'info',
									'content'   => esc_html__('Main Menu Colors', 'signy'),
								),
							),
						),
						array(
							'name'      => 'menu_bg_color',
							'control'   => array(
								'type'  => 'color',
								'label' => esc_html__('Background Color', 'signy'),
							),
						),
						array(
							'name'      => 'menu_border_color',
							'control'   => array(
								'type'  => 'color',
								'label' => esc_html__('Border Color', 'signy'),
							),
						),
						array(
							'name'      => 'menu_link_color',
							'control'   => array(
								'type'  => 'color',
								'label' => esc_html__('Link Color', 'signy'),
							),
						),
						array(
							'name'      => 'menu_link_hover_color',
							'control'   => array(
								'type'  => 'color',
								'label' => esc_html__('Link Hover Color', 'signy'),
							),
						),

						// Sub Menu Color
						array(
							'name'          => 'header_submenu_heading',
							'control'       => array(
								'type'        => 'cs_field',
								'options'     => array(
									'type'      => 'notice',
									'class'     => 'info',
									'content'   => esc_html__('Sub-Menu Colors', 'signy'),
								),
							),
						),
						array(
							'name'      => 'submenu_bg_color',
							'control'   => array(
								'type'  => 'color',
								'label' => esc_html__('Background Color', 'signy'),
							),
						),
						array(
							'name'      => 'submenu_border_color',
							'control'   => array(
								'type'  => 'color',
								'label' => esc_html__('Border Color', 'signy'),
							),
						),
						array(
							'name'      => 'submenu_link_color',
							'control'   => array(
								'type'  => 'color',
								'label' => esc_html__('Link Color', 'signy'),
							),
						),
						array(
							'name'      => 'submenu_link_hover_color',
							'control'   => array(
								'type'  => 'color',
								'label' => esc_html__('Link Hover Color', 'signy'),
							),
						),
				    // Fields End

				  ),
				),
				// Left Side Section Color

		// Title Bar Color
	   array(
	  'name'        => 'titlebar_section',
	  'title'       => esc_html__('Title Bar Colors', 'signy'),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'titlebar_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Title Bar Colors', 'signy'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_title_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Title Color', 'signy'),
				),
			),

    	array(
				'name'      => 'sub_title_text_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Sub Title Color', 'signy'),
				),
			),
			array(
				'name'      => 'title_border_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Title Section Border Color', 'signy'),
				),
			),
	    // Fields End
	  ),
	  ),
	 )
	);
	// Title Bar Color

	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__('Content Colors', 'signy'),
	  'description' => esc_html__('This is all about content area text and heading colors.', 'signy'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__('Content Text', 'signy'),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'      => 'body_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body & Content Color', 'signy'),
						),
					),
					array(
						'name'      => 'body_links_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Color', 'signy'),
						),
					),
					array(
						'name'      => 'body_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Hover Color', 'signy'),
						),
					),
					array(
						'name'          => 'sidebar_text_heading',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Sidebar Color', 'signy'),
							),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Content Color', 'signy'),
						),
					),
					array(
						'name'      => 'sidebar_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Link Color', 'signy'),
						),
					),
					array(
						'name'      => 'sidebar_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Link Hover Color', 'signy'),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__('Headings', 'signy'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Content Heading Color', 'signy'),
						),
					),
					array(
						'name'          => 'sidebar_text_heading_color',
						'control'       => array(
							'type'        => 'cs_field',
							'options'     => array(
								'type'      => 'notice',
								'class'     => 'info',
								'content'   => esc_html__('Sidebar Color', 'signy'),
							),
						),
					),
	      	array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Heading Color', 'signy'),
						),
					),
			    // Fields End
      	)
      ),
      // Button Colors
      array(
	      'name'          => 'content_button_section',
	      'title'         => esc_html__('Button Colors', 'signy'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_button_bg_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Background Color', 'signy'),
						),
					),
					array(
						'name'      => 'content_button_bg_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Background Hover Color', 'signy'),
						),
					),
					array(
						'name'          => 'content_button_text_color',
						'control'       => array(
							'type'      => 'color',
							'label'   => esc_html__('Button Text Color', 'signy'),
						),
					),
	      	array(
						'name'      => 'content_button_text_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Button Text Hover Color', 'signy'),
						),
					),
			    // Fields End
      	)
      ),
	  )
	);
	// Content Color

	// Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => esc_html__('Footer Colors', 'signy'),
	  'description' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Signy > Theme Options > Footer ', 'signy'),
	  'sections'    => array(

			// Footer Widgets Block
	  	array(
	      'name'          => 'footer_widget_section',
	      'title'         => esc_html__('Widget Block', 'signy'),
	      'settings'      => array(

			    // Fields Start
					array(
			      'name'          => 'footer_widget_color_notice',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Content Colors', 'signy'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'footer_widget_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Heading Color', 'signy'),
						),
					),
					array(
						'name'      => 'footer_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Text Color', 'signy'),
						),
					),
					array(
						'name'      => 'footer_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Link Color', 'signy'),
						),
					),
					array(
						'name'      => 'footer_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Link Hover Color', 'signy'),
						),
					),
					array(
						'name'      => 'footer_bg_color',
						'default'   => '#222327',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Background Color', 'signy'),
						),
					),
			    // Fields End
			  )
			),
			// Footer Widgets Block

			// Footer Copyright Block
	  	array(
	      'name'          => 'footer_copyright_section',
	      'title'         => esc_html__('Copyright Block', 'signy'),
	      'settings'      => array(

			    // Fields Start
			    array(
			      'name'          => 'footer_copyright_active',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Make sure you\'ve enabled copyright block in : Signy > Theme Options > Footer > Copyright Bar : Enable Copyright Block', 'signy'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'copyright_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Text Color', 'signy'),
						),
					),
					array(
						'name'      => 'copyright_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'signy'),
						),
					),
					array(
						'name'      => 'copyright_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'signy'),
						),
					),
			  )
			),
			// Footer Copyright Block

	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'signy_sgny_customizer' );
}
