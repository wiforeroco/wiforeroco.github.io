<?php
/*
 * All Metabox related options for Signy theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function signy_sgny_metabox_options( $options ) {

  $options      = array();

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'signy'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(
          array(
            'id'      => 'related_image',
            'type'    => 'image',
            'title'   => esc_html__('Related Posts Featured Image', 'signy'),
            'info'    => esc_html__('Enter Related Posts Featured Image', 'signy'),
          ),

          //Link Post
          array(
            'type'    => 'notice',
            'title'   => 'Link Post',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-sgny-heading',
            'content' => esc_html__('Link Post', 'signy')
          ),
          array(
            'id'      => 'post_link',
            'type'    => 'text',
            'title'   => esc_html__('Post Link', 'signy'),
            'info'    => esc_html__('Enter Post Link', 'signy'),
          ),

          // Audio Post
          array(
            'type'       => 'notice',
            'title'      => 'Audio Post',
            'wrap_class' => 'hide-title',
            'class'      => 'info cs-sgny-heading',
            'content'    => esc_html__('Audio Post', 'signy')
          ),
          array(
            'id'        => 'audio_post',
            'type'      => 'textarea',
            'title'     => esc_html__('Audio iframe', 'signy'),
            'info'      => esc_html__('Enter your Audio iframe', 'signy'),
            'sanitize'  => true,
          ),

          // Video Post
          array(
            'type'       => 'notice',
            'title'      => 'Video Post',
            'wrap_class' => 'hide-title',
            'class'      => 'info cs-sgny-heading',
            'content'    => esc_html__('Video Post', 'signy')
          ),
          array(
            'id'        => 'video_post',
            'type'      => 'textarea',
            'title'     => esc_html__('Video iframe', 'signy'),
            'info'      => esc_html__('Enter your Video iframe', 'signy'),
            'sanitize'  => true,
          ),

          // Quote Post
          array(
            'type'       => 'notice',
            'title'      => 'Quote Post',
            'wrap_class' => 'hide-title',
            'class'      => 'info cs-sgny-heading',
            'content'    => esc_html__('Quote Post', 'signy')
          ),
          array(
            'id'      => 'quote_post_text',
            'type'    => 'text',
            'title'   => esc_html__('Quote Text', 'signy'),
            'info'    => esc_html__('Enter your Quote', 'signy'),
          ),
          array(
            'id'      => 'quote_post_author',
            'type'    => 'text',
            'title'   => esc_html__('Quote Author Name', 'signy'),
            'info'    => esc_html__('Enter your Quote Author Name', 'signy'),
          ),
          array(
            'id'      => 'quote_post_author_link',
            'type'    => 'text',
            'title'   => esc_html__('Quote Author Link', 'signy'),
            'info'    => esc_html__('Enter your Quote Author Link', 'signy'),
          ),

          // Standard, Image
          array(
            'title'      => 'Standard Image',
            'type'       => 'subheading',
            'content'    => esc_html__('There is no Extra Option for this Post Format!', 'signy'),
            'wrap_class' => 'sgny-minimal-heading hide-title',
          ),
          // Standard, Image

          // Gallery
          array(
            'type'       => 'notice',
            'title'      => 'Gallery Format',
            'wrap_class' => 'hide-title',
            'class'      => 'info cs-sgny-heading',
            'content'    => esc_html__('Gallery Format', 'signy')
          ),
          array(
            'id'      => 'gallery_type',
            'type'    => 'radio',
            'title'   => esc_html__('Gallery Type (Slider or Tiled)', 'signy'),
            'info'    => esc_html__('Choose your Gallery Type(Slider or Tiled). Default : Tiled', 'signy'),
            'options'    => array(
              'slider'   => 'Slider',
              'tiled'    => 'Tiled',
            ),
            'default'    => 'tiled',
            'radio'      => true,
          ),
          array(
            'id'          => 'gallery_post_format',
            'type'        => 'gallery',
            'title'       => esc_html__('Add Gallery', 'signy'),
            'add_title'   => esc_html__('Add Image(s)', 'signy'),
            'edit_title'  => esc_html__('Edit Image(s)', 'signy'),
            'clear_title' => esc_html__('Clear Image(s)', 'signy'),
          ),
          // Gallery

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'signy'),
    'post_type' => array('post', 'page', 'portfolio', 'product', 'team'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Title Section
      array(
        'name'  => 'page_leftside_section',
        'title' => esc_html__('Left Side Section', 'signy'),
        'icon'  => 'fa fa-minus',

          // Fields Start
          'fields' => array(
            // Start Left-side Section
            array(
              'id'    => 'meta_left_side_image',
              'type'  => 'image',
              'title' => esc_html__('Left-side Image', 'signy'),
              'info'  => esc_html__('Upload Left-side Section Image.', 'signy'),
            ),
            array(
              'id'    => 'meta_left_side_title',
              'type'  => 'text',
              'title' => esc_html__('Left-side Section Title', 'signy'),
              'info'  => esc_html__('Enter Left-side Section Title.', 'signy'),
            ),
            array(
              'id'        => 'meta_left_side_content',
              'type'      => 'textarea',
              'title'     => esc_html__('Left-side Section Content', 'signy'),
              'info'      => esc_html__('Enter Left-side Section content.', 'signy'),
              'shortcode' => 'true'
            ),
          ),
      ),

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'signy'),
        'icon'  => 'fa fa-file',

        'fields' => array(
          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'signy'),
            'options'   => array(
              ''   => esc_html__('Default Spacing', 'signy'),
              'padding-xs'     => esc_html__('Extra Small Padding', 'signy'),
              'padding-sm'     => esc_html__('Small Padding', 'signy'),
              'padding-md'     => esc_html__('Medium Padding', 'signy'),
              'padding-lg'     => esc_html__('Large Padding', 'signy'),
              'padding-xl'     => esc_html__('Extra Large Padding', 'signy'),
              'padding-cnt-no' => esc_html__('No Padding', 'signy'),
              'padding-custom' => esc_html__('Custom Padding', 'signy'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'signy'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'signy'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'signy'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'             => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'signy'),
            'options'        => signy_sgny_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'signy'),
          ), // End Fields
        ),

      ), // Content Section
    ),
  ); // Left-side section

  return $options;
}
add_filter( 'cs_metabox_options', 'signy_sgny_metabox_options' );
