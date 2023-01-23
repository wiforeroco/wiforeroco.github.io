<?php
/*
 * All Custom Shortcode for [theme_name] theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

if( ! function_exists( 'signy_sgny_shortcodes' ) ) {
  function signy_sgny_shortcodes( $options ) {

    $options       = array();

    /* Content Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Content Shortcodes', 'signy-core'),
      'shortcodes' => array(

       /* Blog Shortcodes */
        array(
          'name'          => 'signy_blog',
          'title'         => esc_html__('Blog Listing Style', 'signy-core'),
          'fields'        => array(

            array(
              'id'        => 'blog_style',
              'type'      => 'select',
              'options'        => array(
                'style-one' => esc_html__('Default', 'signy-core'),
                'style-two' => esc_html__('List View', 'signy-core'),
                'style-three' => esc_html__('Masonary View', 'signy-core'),
              ),
              'title'     => esc_html__('Blog List Style', 'signy-core'),
            ),
            array(
              'id'        => 'blog_limit',
              'type'      => 'text',
              'title'     => esc_html__('Blog Limit', 'signy-core'),
              'info' => esc_html__( "Enter Blog Limit to show.", 'signy-core'),
            ),
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Listing', 'signy-core')
            ),
            array(
              'id'        => 'blog_order',
              'type'      => 'select',
              'options'   => array(
                'asc'   => esc_html__('ASC', 'signy-core'),
                'desc'   => esc_html__('DESC', 'signy-core'),
              ),
              'title'     => esc_html__('Blog Order', 'signy-core'),
            ),
            array(
              'id'        => 'blog_orderby',
              'type'      => 'select',
              'options'   => array(
                'none'   => esc_html__('None', 'signy-core'),
                'id'   => esc_html__('ID', 'signy-core'),
                'author'   => esc_html__('Author', 'signy-core'),
                'title'   => esc_html__('Title', 'signy-core'),
                'date'   => esc_html__('Date', 'signy-core'),
                'modified'   => esc_html__('Modified', 'signy-core'),
                'random'   => esc_html__('Random', 'signy-core'),
              ),
              'title'     => esc_html__('Blog Order By', 'signy-core'),
            ),
            array(
              'id'        => 'blog_show_category',
              'type'      => 'text',
              'title'     => esc_html__('Show only certain categories?', 'signy-core'),
            ),
            array(
              'id'        => 'blog_show_posts',
              'type'      => 'text',
              'title'     => esc_html__('Show only certain posts?', 'signy-core'),
            ),
            array(
              'id'        => 'excerpt_length',
              'type'      => 'text',
              'title'     => esc_html__('Excerpt Length', 'signy-core'),
            ),
            array(
              'id'        => 'blog_pagination',
              'type'      => 'switcher',
              'title'     => esc_html__('Pagination', 'signy-core'),
              'info'      => 'Enable Pagination'
            ),
            array(
              'id'        => 'blog_date',
              'type'      => 'switcher',
              'title'     => esc_html__('Date', 'signy-core'),
              'info'      => 'Hide Date'
            ),
            array(
              'id'        => 'blog_category',
              'type'      => 'switcher',
              'title'     => esc_html__('Category', 'signy-core'),
              'info'      => 'Hide Category'
            ),
            array(
              'id'        => 'blog_author',
              'type'      => 'switcher',
              'title'     => esc_html__('Author', 'signy-core'),
              'info'      => 'Hide Author'
            ),
            array(
              'id'        => 'blog_social',
              'type'      => 'switcher',
              'title'     => esc_html__('Social Icons', 'signy-core'),
              'info'      => 'Hide Social Icons'
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'signy-core'),
            ),
          ),
        ),

        // Signy Page Title
        array(
          'name'          => 'signy_pages_title',
          'title'         => esc_html__('Page Title', 'signy-core'),
          'fields'        => array(

            array(
              'id'        => 'signy_page_title',
              'type'      => 'text',
              'title'     => esc_html__('Page Title', 'signy-core'),
            ),
            array(
              'id'        => 'signy_page_title_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Page Title Color', 'signy-core'),
            ),
            array(
              'id'        => 'signy_page_title_size',
              'type'      => 'text',
              'title'     => esc_html__('Page Title Size', 'signy-core'),
            ),
            array(
              'id'        => 'signy_page_sub_title',
              'type'      => 'text',
              'title'     => esc_html__('Page Sub Title', 'signy-core'),
            ),
            array(
              'id'        => 'signy_page_sub_title_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Page Sub-Title Color', 'signy-core'),
            ),
            array(
              'id'        => 'signy_page_sub_title_size',
              'type'      => 'text',
              'title'     => esc_html__('Page Sub-Title Size', 'signy-core'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'signy-core'),
            ),
          ),
        ),

        // Spacer
        array(
          'name'          => 'signy_empty_space',
          'title'         => esc_html__('Spacer', 'signy-core'),
          'fields'        => array(

            array(
              'id'        => 'height',
              'type'      => 'text',
              'title'     => esc_html__('Height', 'signy-core'),
              'attributes' => array(
                'placeholder'     => '20px',
              ),
            ),

          ),
        ),
        // Spacer

        // About
        array(
        "name"        => 'signy_about',
        'title'       => esc_html__('About', 'signy-core'),
        "description" => esc_html__( "About Content Shortcodes", 'signy-core'),
        "fields"      => array(

          array(
            'type'      => 'text',
            'id'        => 'about_title',
            'title'     => esc_html__('About Title', 'signy-core'),
            'info' => esc_html__( "Enter your About title.", 'signy-core'),
          ),
          array(
            'id'        => 'about_title_color',
            'type'      => 'color_picker',
            'title'     => esc_html__('About title Color', 'signy-core'),
          ),
          array(
            'id'        => 'about_title_hover_color',
            'type'      => 'color_picker',
            'title'     => esc_html__('About title Hover Color', 'signy-core'),
          ),
          array(
            'id'        => 'about_title_size',
            'type'      => 'text',
            'title'     => esc_html__('About title Size', 'signy-core'),
          ),
          array(
            'type'      => 'text',
            'id'        => 'about_title_link',
            'title'     => esc_html__('About Title Link', 'signy-core'),
            'info' => esc_html__( "Enter your About title Link.", 'signy-core'),
          ),
          array(
            'id'        => 'about_target_tab',
            'type'      => 'switcher',
            'title'     => esc_html__('Open New Tab?', 'signy-core'),
            'on_text'     => esc_html__('Yes', 'signy-core'),
            'off_text'     => esc_html__('No', 'signy-core'),
          ),
          array(
            'type'      => 'upload',
            'id'        => 'about_image',
            'title'     => esc_html__('About Image', 'signy-core'),
            'info' => esc_html__( "Upload your About image.", 'signy-core'),
          ),
          array(
            'type'      => 'text',
            'id'        => 'profession_name',
            'title'     => esc_html__('Profession ', 'signy-core'),
            'info' => esc_html__( "Enter your Profession.", 'signy-core'),
          ),
          array(
            'id'        => 'profession_name_color',
            'type'      => 'color_picker',
            'title'     => esc_html__('Profession Text Color', 'signy-core'),
          ),
          array(
            'id'        => 'profession_name_size',
            'type'      => 'text',
            'title'     => esc_html__('Profession Text Size', 'signy-core'),
          ),
          array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'signy-core'),
          ),
          array(
            'type'      => 'textarea',
            'id'        => 'content',
            'title'     => esc_html__('About Content', 'signy-core'),
            'info'      => esc_html__( "Enter your About content.", 'signy-core'),
            'shortcode'       => true,
          ),
        ),
      ),
        // About End

        // About Signature
        array(
          'name'          => 'signy_about_signature',
          'title'         => esc_html__('About Page Signature', 'signy-core'),
          'fields'        => array(
          
            array(
              'type'      => 'upload',
              'id'        => 'signature_image',
              'title'     => esc_html__('About Signature', 'signy-core'),
              'info'      => esc_html__( "Upload Your Signature.", 'signy-core'),
            ),
            array(
              'type'      => 'text',
              'id'        => 'signature_name',
              'title'     => esc_html__('Signature Name', 'signy-core'),
              'info'      => esc_html__( "Enter your Signature Name.", 'signy-core'),
            ),
            array(
              'id'        => 'signature_name_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Signature Name Color', 'signy-core'),
            ),
            array(
              'id'        => 'signature_name_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Signature Name Hover Color', 'signy-core'),
            ),
            array(
              'id'        => 'signature_name_size',
              'type'      => 'text',
              'title'     => esc_html__('Signature Name Size', 'signy-core'),
            ),
            array(
              'type'      => 'text',
              'id'        => 'signature_link',
              'title'     => esc_html__('Signature Link', 'signy-core'),
              'info'      => esc_html__( "Enter your Signature Link.", 'signy-core'),
            ),
            array(
              'id'        => 'about_target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'signy-core'),
              'on_text'     => esc_html__('Yes', 'signy-core'),
              'off_text'     => esc_html__('No', 'signy-core'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'signy-core'),
            ),
          ),
        ),

        // About Social Icons
        array(
          'name'          => 'signy_about_socials',
          'title'         => esc_html__('About Social Icons', 'signy-core'),
          'view'          => 'clone',
          'clone_id'      => 'signy_about_social',
          'clone_title'   => esc_html__('Add New', 'signy-core'),
          'fields'        => array(
          
          array(
            'id'         => 'about_social_icon_color',
            'type'       => 'color_picker',
            'title'      => esc_html__('Icon Color', 'signy-core'),
            
          ),
          array(
            'id'         => 'about_social_icon_hover_color',
            'type'       => 'color_picker',
            'title'      => esc_html__('Icon Hover Color', 'signy-core'),
            
          ),
          array(
            'id'         => 'about_social_bg_color',
            'type'       => 'color_picker',
            'title'      => esc_html__('Backrgound Color', 'signy-core'),
            
          ),
          array(
            'id'         => 'about_social_bg_hover_color',
            'type'       => 'color_picker',
            'title'      => esc_html__('Backrgound Hover Color', 'signy-core'),
            
          ),
          array(
            'id'         => 'about_social_border_color',
            'type'       => 'color_picker',
            'title'      => esc_html__('Border Color', 'signy-core'),
          ),

          // Icon Size
          array(
            'id'         => 'abt_icon_size',
            'type'       => 'text',
            'title'      => esc_html__('Icon Size', 'signy-core'),
          ),
          array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'signy-core'),
            ),
          ),
          
          'clone_fields'  => array(

            array(
              'id'           => 'abt_social_link',
              'type'         => 'text',
              'attributes'   => array(
                'placeholder'=> 'http://',
              ),
              'title'     => esc_html__('Link', 'signy-core')
            ),
            array(
              'id'        => 'abt_social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'signy-core')
            ),
            array(
              'id'        => 'abt_icon_target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'signy-core'),
              'on_text'   => esc_html__('Yes', 'signy-core'),
              'off_text'  => esc_html__('No', 'signy-core'),
            ),
          ),
        ),

        // Social Icons
        array(
          'name'          => 'signy_socials',
          'title'         => esc_html__('Social Icons', 'signy-core'),
          'view'          => 'clone',
          'clone_id'      => 'sgny_social',
          'clone_title'   => esc_html__('Add New', 'signy-core'),
          'fields'        => array(

            array(
              'id'        => 'social_select',
              'type'      => 'select',
              'options'   => array(
                'style-one'   => esc_html__('Style One (Left-side Section)', 'signy-core'),
                'style-two'   => esc_html__('Style Two(About Section)', 'signy-core'),
                'style-three' => esc_html__('Style Three(Footer)', 'signy-core'),
                'style-four'  => esc_html__('Style Four(Right side Widget)', 'signy-core'),
              ),
              'title'     => esc_html__('Social Icons Style', 'signy-core'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'signy-core'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Colors', 'signy-core')
            ),
            array(
              'id'         => 'icon_color',
              'type'       => 'color_picker',
              'title'      => esc_html__('Icon Color', 'signy-core'),
              'wrap_class' => 'column_third',
            ),
            array(
              'id'         => 'icon_hover_color',
              'type'       => 'color_picker',
              'title'      => esc_html__('Icon Hover Color', 'signy-core'),
              'wrap_class' => 'column_third',
              'dependency' => array('social_select', 'any', 'style-one,style-two,style-three,style-four'),
            ),
            array(
              'id'         => 'bg_color',
              'type'       => 'color_picker',
              'title'      => esc_html__('Backrgound Color', 'signy-core'),
              'wrap_class' => 'column_third',
              'dependency' => array('social_select', 'any', 'style-two,style-four'),
            ),
            array(
              'id'         => 'bg_hover_color',
              'type'       => 'color_picker',
              'title'      => esc_html__('Backrgound Hover Color', 'signy-core'),
              'wrap_class' => 'column_third',
              'dependency' => array('social_select', 'any', 'style-two,style-four'),
            ),
            array(
              'id'         => 'border_color',
              'type'       => 'color_picker',
              'title'      => esc_html__('Border Color', 'signy-core'),
              'wrap_class' => 'column_third',
              'dependency' => array('social_select', 'any', 'style-two,style-four'),
            ),

            // Icon Size
            array(
              'id'         => 'icon_size',
              'type'       => 'text',
              'title'      => esc_html__('Icon Size', 'signy-core'),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'           => 'social_link',
              'type'         => 'text',
              'attributes'   => array(
                'placeholder'=> 'http://',
              ),
              'title'     => esc_html__('Link', 'signy-core')
            ),
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'signy-core')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'signy-core'),
              'on_text'   => esc_html__('Yes', 'signy-core'),
              'off_text'  => esc_html__('No', 'signy-core'),
            ),

          ),

        ),
        // Social Icons

        // Dropcaps
        array(
          'name'          => 'signy_dropcaps_letter',
          'title'         => esc_html__('Dropcaps', 'signy-core'),
          'fields'        => array(

            array(
              'id'        => 'letter',
              'type'      => 'text',
              'title'     => esc_html__('Dropcaps Letter', 'signy-core'),
            ),
            array(
              'id'        => 'letter_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Dropcaps Letter Color', 'signy-core'),
            ),
            array(
              'id'        => 'letter_size',
              'type'      => 'text',
              'title'     => esc_html__('Dropcaps Letter Size', 'signy-core'),
            ),
            array(
              'id'        => 'letter_border_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Dropcaps Letter Border Color', 'signy-core'),
            ),
            array(
              'id'        => 'letter_bg_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Dropcaps Letter Background Color', 'signy-core'),
            ),
            array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'signy-core'),
          ),
          ),
        ),

        // Quote
        array(
          'name'          => 'signy_quote',
          'title'         => esc_html__('Quote', 'signy-core'),
          'fields'        => array(

            array(
              'id'        => 'sgny_quote_content',
              'type'      => 'textarea',
              'title'     => esc_html__('Quote content', 'signy-core'),
            ),
            array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'signy-core'),
          ),
          ),
        ),

        // Double Image
        array(
          'name'          => 'signy_double_images',
          'title'         => esc_html__('Double Image', 'signy-core'),
          'fields'        => array(

            array(
              'id'        => 'sgny_double_image_one',
              'type'      => 'upload',
              'title'     => esc_html__('Upload First Image', 'signy-core'),
            ),
            array(
              'id'        => 'sgny_double_image_one_caption',
              'type'      => 'text',
              'title'     => esc_html__('First Image Caption', 'signy-core'),
            ),
            array(
              'id'        => 'sgny_double_image_two',
              'type'      => 'upload',
              'title'     => esc_html__('Upload Second Image', 'signy-core'),
            ),
            array(
              'id'        => 'sgny_double_image_two_caption',
              'type'      => 'text',
              'title'     => esc_html__('Second Image Caption', 'signy-core'),
            ),
            array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'signy-core'),
          ),
          ),
        ),

        // Contact page
        array(
          'name'          => 'signy_contact_sections',
          'title'         => esc_html__('Contact Icon Section', 'signy-core'),
          'view'          => 'clone',
          'clone_id'      => 'sgny_contact_section',
          'clone_title'   => esc_html__('Add New', 'signy-core'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'signy-core'),
            ),
            array(
              'id'        => 'contact_icons_column',
              'type'      => 'select',
              'options'   => array(
                'sgny-contact-col-one' => esc_html__('Column One', 'signy-core'),
                'sgny-contact-col-two' => esc_html__('Column Two', 'signy-core'),
                'sgny-contact-col-three' => esc_html__('Column Three', 'signy-core'),
                'sgny-contact-col-four' => esc_html__('Column Four', 'signy-core'),
              ),
              'title'     => esc_html__('Contact Icons Column', 'signy-core'),
            ),
            array(
              'id'        => 'contact_icons_align',
              'type'      => 'select',
              'options'   => array(
                'text-center'  => esc_html__('Center', 'signy-core'),
                'text-right'   => esc_html__('Right', 'signy-core'),
                'text-left'    => esc_html__('Left', 'signy-core'),
              ),
              'title'     => esc_html__('Contact Icons Section Alignment', 'signy-core'),
            ),
          ),

          'clone_fields'  => array(

            array(
              'id'        => 'contact_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Contact Icon', 'signy-core')
            ),
            array(
              'id'        => 'contact_icon_caption',
              'type'      => 'text',
              'title'     => esc_html__('Contact Icon Caption', 'signy-core')
            ),
            array(
              'id'        => 'contact_icon_caption_link',
              'type'      => 'text',
              'title'     => esc_html__('Contact Icon Caption Link', 'signy-core')
            ),
            array(
              'id'        => 'contact_target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'signy-core'),
              'on_text'     => esc_html__('Yes', 'signy-core'),
              'off_text'     => esc_html__('No', 'signy-core'),
            ),

          ),

        ),

        // Signy Heading
        array(
          'name'          => 'signy_headings',
          'title'         => esc_html__('Heading', 'signy-core'),
          'view'          => 'clone',
          'fields'        => array(

            array(
              'id'        => 'signy_heading',
              'type'      => 'text',
              'title'     => esc_html__('Heading Text', 'signy-core'),
            ),
            array(
              'id'        => 'signy_heading_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Heading Text Color', 'signy-core'),
            ),
            array(
              'id'        => 'signy_heading_size',
              'type'      => 'text',
              'title'     => esc_html__('Heading Text Size', 'signy-core'),
            ),
            array(
              'id'        => 'signy_heading_caption',
              'type'      => 'text',
              'title'     => esc_html__('Heading Caption', 'signy-core'),
            ),
            array(
              'id'        => 'signy_heading_caption_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Heading Caption Color', 'signy-core'),
            ),
            array(
              'id'        => 'signy_heading_caption_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Heading Caption Hover Color', 'signy-core'),
            ),
            array(
              'id'        => 'signy_heading_caption_size',
              'type'      => 'text',
              'title'     => esc_html__('Heading Caption Size', 'signy-core'),
            ),
            array(
              'id'        => 'signy_heading_caption_link',
              'type'      => 'text',
              'title'     => esc_html__('Heading Caption Link', 'signy-core'),
            ),
            array(
            'id'        => 'heading_target_tab',
            'type'      => 'switcher',
            'title'     => esc_html__('Open New Tab?', 'signy-core'),
            'on_text'     => esc_html__('Yes', 'signy-core'),
            'off_text'     => esc_html__('No', 'signy-core'),
          ),
          array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'signy-core'),
          ),
          ),
        ),

        // Shop by The Post
        array(
          'name'          => 'signy_shop_post',
          'title'         => esc_html__('Shop Post', 'signy-core'),
          'view'          => 'clone',
          'fields'        => array(

            array(
              'id'        => 'signy_shop_post_heading',
              'type'      => 'text',
              'title'     => esc_html__('Heading Text', 'signy-core'),
            ),
            array(
              'id'        => 'signy_shop_post_limit',
              'type'      => 'text',
              'title'     => esc_html__('Shop Post Limit', 'signy-core'),
            ),
            array(
              'id'        => 'signy_shop_post_order',
              'type'      => 'text',
              'title'     => esc_html__('Shop Post Order', 'signy-core'),
            ),
            array(
              'id'        => 'signy_shop_post_orderby',
              'type'      => 'text',
              'title'     => esc_html__('Shop Post Orderby', 'signy-core'),
            ),
            array(
              'id'        => 'signy_shop_post_category',
              'type'      => 'text',
              'title'     => esc_html__('Shop Post Category', 'signy-core'),
              'info'      => 'Include Catogories separated by coma',
            ),
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('OR(Include Category or Id)', 'signy-core')
            ),
            array(
              'id'        => 'signy_shop_post_id',
              'type'      => 'text',
              'title'     => esc_html__('Shop Post ID', 'signy-core'),
              'info'      => "Include id's separated by coma",
            ),
            array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'signy-core'),
          ),
          ),
        ),

        // Popular Post
        array(
          'name'          => 'signy_popular_post',
          'title'         => esc_html__('Popular Post', 'signy-core'),
          'fields'        => array(

            array(
              'id'        => 'signy_popular_post_heading',
              'type'      => 'text',
              'title'     => esc_html__('Popular Post Heading', 'signy-core'),
            ),
            array(
              'id'        => 'popular_post_cat',
              'type'      => 'select',
              'options'   => 'categories',
              'title'     => esc_html__('Blog List Style', 'signy-core'),
            ),
            array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'signy-core'),
          ),

          ),
        ),

        // WPML 
        array(
          'name'          => 'signy_wpml',
          'title'         => esc_html__('Signy WPML', 'signy-core'),
          'fields'        => array(

            array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'signy-core'),
            ),
            array(
              'id'        => 'wpml_lang_style',
              'type'      => 'select',
              'options'      => array(
                'dropdown'   => esc_html__('Dropdown', 'signy-core'),
                'horizontal' => esc_html__('Horizontal', 'signy-core'),
                'vertical'   => esc_html__('Vertical', 'signy-core'),
              ),
              'title'     => esc_html__('WPML Style', 'signy-core'),
            ),
            array(
              'id'        => 'wpml_lang_type',
              'type'      => 'select',
              'options'           => array(
                'native_name'     => esc_html__('Native Name', 'signy-core'),
                'translated_name' => esc_html__('Translated Name', 'signy-core'),
                'language_code'   => esc_html__('Language Code', 'signy-core'),
              ),
              'title'     => esc_html__('Language Type', 'signy-core'),
            ),
            array(
              'id'        => 'wpml_flag',
              'type'      => 'switcher',
              'title'     => esc_html__('Remove Flag', 'signy-core'),
              'info'      => 'Remove Flag from Language'
            ),
          ),
        ),
      ),
    );

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'signy_sgny_shortcodes' );
}
