<?php
/*
 * All Theme Options for Signy theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

function signy_sgny_settings( $settings ) {

  $settings           = array(
    'menu_title'      => SIGNY_NAME . esc_html__(' Options', 'signy'),
    'menu_slug'       => sanitize_title(SIGNY_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => SIGNY_NAME .' <small>V-'. SIGNY_VERSION .' by <a href="'. SIGNY_BRAND_URL .'" target="_blank">'. SIGNY_BRAND_NAME .'</a></small>',
  );
  return $settings;
}
add_filter( 'cs_framework_settings', 'signy_sgny_settings' );

// Theme Framework Options
function signy_sgny_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Brand', 'signy'),
    'icon'     => 'fa fa-bookmark',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo_title',
        'title'    => esc_html__('Logo', 'signy'),
        'icon'     => 'fa fa-star',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-sgny-heading',
            'content' => esc_html__('Site Logo', 'signy')
          ),
          array(
            'id'    => 'brand_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Default Logo', 'signy'),
            'info'  => esc_html__('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'signy'),
            'add_title' => esc_html__('Add Logo', 'signy'),
          ),
          array(
            'id'    => 'brand_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Retina Logo', 'signy'),
            'info'  => esc_html__('Upload your retina logo here. Recommended size is 2x from default logo.', 'signy'),
            'add_title' => esc_html__('Add Retina Logo', 'signy'),
          ),
          array(
            'id'          => 'retina_width',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Width', 'signy'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'retina_height',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Height', 'signy'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'signy'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'brand_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'signy'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),

          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-sgny-heading',
            'content' => esc_html__('WordPress Admin Logo', 'signy')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'signy'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'signy'),
            'add_title' => esc_html__('Add Login Logo', 'signy'),
          ),
        ) // end: fields
      ), // end: section

      // Fav
      array(
        'name'     => 'brand_fav',
        'title'    => esc_html__('Fav Icon', 'signy'),
        'icon'     => 'fa fa-anchor',
        'fields'   => array(

            // -----------------------------
            // Begin: Fav
            // -----------------------------
            array(
              'id'    => 'brand_fav_icon',
              'type'  => 'image',
              'title' => esc_html__('Fav Icon', 'signy'),
              'info'  => esc_html__('Upload your site fav icon, size should be 16x16.', 'signy'),
              'add_title' => esc_html__('Add Fav Icon', 'signy'),
            ),
            array(
              'id'    => 'iphone_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone icon', 'signy'),
              'info'  => esc_html__('Icon for Apple iPhone (57px x 57px). This icon is used for Bookmark on Home screen.', 'signy'),
              'add_title' => esc_html__('Add iPhone Icon', 'signy'),
            ),
            array(
              'id'    => 'iphone_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone retina icon', 'signy'),
              'info'  => esc_html__('Icon for Apple iPhone retina (114px x114px). This icon is used for Bookmark on Home screen.', 'signy'),
              'add_title' => esc_html__('Add iPhone Retina Icon', 'signy'),
            ),
            array(
              'id'    => 'ipad_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad icon', 'signy'),
              'info'  => esc_html__('Icon for Apple iPad (72px x 72px). This icon is used for Bookmark on Home screen.', 'signy'),
              'add_title' => esc_html__('Add iPad Icon', 'signy'),
            ),
            array(
              'id'    => 'ipad_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad retina icon', 'signy'),
              'info'  => esc_html__('Icon for Apple iPad retina (144px x 144px). This icon is used for Bookmark on Home screen.', 'signy'),
              'add_title' => esc_html__('Add iPad Retina Icon', 'signy'),
            ),

        ) // end: fields
      ), // end: section

    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'signy'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General', 'signy'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(
      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'id'    => 'theme_responsive',
        'type'  => 'switcher',
        'title' => esc_html__('Responsive', 'signy'),
        'info' => esc_html__('Turn off if you don\'t want your site to be responsive.', 'signy'),
        'default' => true,
      ),

      array(
        'id'    => 'theme_page_comments',
        'type'  => 'switcher',
        'title' => esc_html__('Page Comments', 'signy'),
        'info' => esc_html__('Turn On if you want to show comments in your pages.', 'signy'),
        'default' => true,
      ),
      // Content Section
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
        'type'    => 'notice',
        'class'   => 'info cs-sgny-heading',
        'content' => esc_html__('Footer Widget', 'signy')
      ),
      array(
        'id'    => 'footer_widget_block',
        'type'  => 'switcher',
        'title' => esc_html__('Enable Footer Widget', 'signy'),
        'info' => esc_html__('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget </strong> Widget Area, add your widgets there.', 'signy'),
        'default' => true,
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-sgny-heading',
        'content' => esc_html__('Menu Bar', 'signy')
      ),
      array(
        'id'    => 'menu_effect',
        'type'  => 'radio',
        'title' => esc_html__('Menu Effect (hover or Click)', 'signy'),
        'info' => esc_html__('Choose your menu bar effect(Hover or Click). Default : Hover', 'signy'),
        'options'      => array(
          'hover'    => 'Hover',
          'click'    => 'Click',
        ),
        'default'      => 'hover',
        'radio'      => true,
      ),
      array(
        'id'    => 'menu_bar_serach',
        'type'  => 'switcher',
        'title' => esc_html__('Enable Menu Bar Search', 'signy'),
        'info' => esc_html__('If you turn this ON, You can enable Search Field in Menu Bar.', 'signy'),
        'default' => true,
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-sgny-heading',
        'content' => esc_html__('Right Side Widget', 'signy')
      ),
      array(
        'id'    => 'right_side_widget',
        'type'  => 'switcher',
        'title' => esc_html__('Enable Right Side Widget', 'signy'),
        'info' => esc_html__('If you turn this ON, You can enable Widget On Right Side .', 'signy'),
        'default' => true,
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-sgny-heading',
        'content' => esc_html__('Background Options', 'signy'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'             => 'theme_layout_bg_type',
        'type'           => 'select',
        'title'          => esc_html__('Background Type', 'signy'),
        'options'        => array(
          'bg-image' => esc_html__('Image', 'signy'),
          'bg-pattern' => esc_html__('Pattern', 'signy'),
        ),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'    => 'theme_layout_bg_pattern',
        'type'  => 'image_select',
        'title' => esc_html__('Background Pattern', 'signy'),
        'info' => esc_html__('Select background pattern', 'signy'),
        'options'      => array(
          'pattern-1'    => SIGNY_CS_IMAGES . '/pattern-1.png',
          'pattern-2'    => SIGNY_CS_IMAGES . '/pattern-2.png',
          'pattern-3'    => SIGNY_CS_IMAGES . '/pattern-3.png',
          'pattern-4'    => SIGNY_CS_IMAGES . '/pattern-4.png',
          'custom-pattern'  => SIGNY_CS_IMAGES . '/pattern-5.png',
        ),
        'default'      => 'pattern-1',
        'radio'      => true,
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-pattern' ),
      ),
      array(
        'id'      => 'custom_bg_pattern',
        'type'    => 'upload',
        'title'   => esc_html__('Custom Pattern', 'signy'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type|theme_layout_bg_pattern_custom-pattern', '==|==|==', 'true|bg-pattern|true' ),
        'info' => esc_html__('Select your custom background pattern. <br />Note, background pattern image will be repeat in all x and y axis. So, please consider all repeatable area will perfectly fit your custom patterns.', 'signy'),
      ),
      array(
        'id'      => 'theme_layout_bg',
        'type'    => 'background',
        'title'   => esc_html__('Background', 'signy'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-image' ),
      ),
      array(
        'id'      => 'theme_bg_parallax',
        'type'    => 'switcher',
        'title'   => esc_html__('Parallax', 'signy'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'      => 'theme_bg_parallax_speed',
        'type'    => 'text',
        'title'   => esc_html__('Parallax Speed', 'signy'),
        'attributes' => array(
          'placeholder'     => '0.4',
        ),
        'dependency' => array( 'theme_layout_width_container|theme_bg_parallax', '==|!=', 'true' ),
      ),
      array(
        'id'      => 'theme_bg_overlay_color',
        'type'    => 'color_picker',
        'title'   => esc_html__('Overlay Color', 'signy'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
      // Left-side Section
      $options[]   = array(
        'name'     => 'left_side_section',
        'title'    => esc_html__('Left-side Section', 'signy'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start Left-side Section
          array(
            'id'    => 'left_side_image',
            'type'  => 'image',
            'title' => esc_html__('Left-side Image', 'signy'),
            'info'  => esc_html__('Upload Left-side Section Image.', 'signy'),
            ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('WPML', 'signy'),
          ),
          array(
            'id'    => 'need_wpml',
            'type'  => 'switcher',
            'title' => __('Enable Language Option', 'signy'),
            'default' => true,
          ),
          array(
            'id'    => 'left_side_wpml_lang',
            'type'  => 'textarea',
            'title' => esc_html__('Left-side Language Shortcode', 'signy'),
            'info'  => esc_html__('Enter Left-side Language Shortcode.', 'signy'),
            'dependency' => array('need_wpml', '==', true),
            'shortcode' => 'true'
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Left-side Bottom Section', 'signy'),
          ),
          array(
            'id'    => 'left_side_title',
            'type'  => 'text',
            'title' => esc_html__('Left-side Section Title', 'signy'),
            'info'  => esc_html__('Enter Left-side Section Title.', 'signy'),
          ),
          array(
            'id'    => 'left_side_content',
            'type'  => 'textarea',
            'title' => esc_html__('Left-side Section Content', 'signy'),
            'info'  => esc_html__('Enter Left-side Section content.', 'signy'),
            'shortcode' => 'true'
          ),
          array(
            'id'    => 'left_side_social_icon',
            'type'  => 'textarea',
            'title' => esc_html__('Left-side Section Social icon', 'signy'),
            'info'  => esc_html__('Include Left-side Section social icon.', 'signy'),
            'shortcode' => 'true'
          )
        )
); // Left-side section

      // ------------------------------
      // Footer Section
      // ------------------------------
      $options[]   = array(
        'name'     => 'footer_section',
        'title'    => __('Footer', 'signy'),
        'icon'     => 'fa fa-ellipsis-h',
        'fields' => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => __('Copyright Layout', 'signy'),
          ),
          array(
            'id'    => 'need_copyright',
            'type'  => 'switcher',
            'title' => __('Enable Copyright Section', 'signy'),
            'default' => true,
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => __('Copyright Text', 'signy'),
            'dependency' => array('need_copyright', '==', true),
            'after'       => 'Helpful shortcodes: [sgny_current_year] [sgny_home_url] or any shortcode.',
          ),
        ),
      );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'signy'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'signy'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'signy'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => esc_html__('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer.
          <br /><br />Highly customizable colors are in <strong>Appearance > Customize</strong>', 'signy'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'signy'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'signy'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'signy'),
            'info'            => esc_html__('Enter css selectors like : <strong>body, .custom-class</strong>', 'signy'),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'signy'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'signy'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'signy'),
        'accordion_title'     => esc_html__('New Typography', 'signy'),
        'default'             => array(
          array(
            'title'           => esc_html__('Body Typography', 'signy'),
            'selector'        => 'body, .sgny-single-crosshtml-content p, #comments.sgny-comments-area.comments-area .comment-content p, input, select, textarea, .wpcf7 p, .sgny-l-sidebar-text p, .sgny-post-by, .woocommerce ul.product_list_widget li .amount, .woocommerce ul.cart_list li a, .woocommerce ul.product_list_widget li a, .sgny-side-widget .search-field, .woocommerce-cart .cart-collaterals .cart_totals table td, .woocommerce form .form-row .input-text, .woocommerce-page form .form-row .input-text, .woocommerce-account .woocommerce .woocommerce-Address address, div#vertical_language_list',
            'font'            => array(
              'family'        => 'PT Serif',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Menu Typography', 'signy'),
            'selector'        => '.sgny-main-menu ul#sgny-menu li a',
            'font'            => array(
              'family'        => 'Montserrat',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Sub Menu Typography', 'signy'),
            'selector'        => '.sgny-main-menu ul#sgny-menu .sub-menu li a',
            'font'            => array(
              'family'        => 'Montserrat',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Headings Typography', 'signy'),
            'selector'        => 'h1, h2, h3, h4, h5, h6,.sgny-single-crosshtml-content h1, #comments.sgny-comments-area.comments-area .comment-content h1, .sgny-l-sidebar-text h1, .sgny-contact-heading h2, .woocommerce-account .woocommerce .sgny-woo-acount-for-colum > h2, .sgny-single-crosshtml-content h2, #comments.sgny-comments-area.comments-area .comment-content h2, .cart_totals h2, .sgny-author-desc-warp h4, .sgny-author-desc-warp h4 a, .sgny-footer-social-info > h6, .sgny-rel-post-title, .sgny-about-name a',
            'font'            => array(
              'family'        => 'PT Serif',
              'variant'       => 'bold',
            ),
          ),
          array(
            'title'           => esc_html__('Miscellaneous Typography', 'signy'),
            'selector'        => '.sgny-widget.sgny-logo-widget h6, .sgny-post-meta, .wp-pagenavi a, .wp-pagenavi span, .sgny-copyright, .sgny-readmore-btn, .sgny-l-sidebar-social > span, .sgny-side-widget.widget_mc4wp_form_widget input[type="submit"], #sgny-mobil_menu, .sgny-comment-form.comment-respond #commentform #submit, .woocommerce #review_form #respond #submit, .woocommerce-account .woocommerce button, .woocommerce-account .woocommerce input[type="submit"], .sgny-right-sidebar-inner .search-form input.search-submit[type="submit"], .sgny-footer-widget-warp .search-form input.search-submit[type="submit"], .sgny-contact-form button, .sgny-404-search-form button, .wpcf7 .sgny-file-upload .sgny-file-btn, .wpcf7 input[type="submit"], .wpcf7 button[type="submit"], .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-checkout .woocommerce form.checkout_coupon input.button[type="submit"], .woocommerce-checkout .woocommerce form.login input.button[type="submit"], .woocommerce-checkout .woocommerce form.register input.button[type="submit"], .woocommerce-cart table.shop_table tbody td.actions .coupon input.button[type="submit"], .woocommerce-cart form table.shop_table tbody td.actions .coupon + input.button[type="submit"], .woocommerce-cart .cart_totals table.shop_table .woocommerce-shipping-calculator button.button[type="submit"], .woocommerce-cart a.checkout-button.button, .sgny-single-crosshtml-content h5, .sgny-single-crosshtml-content h6, #comments.sgny-comments-area.comments-area .comment-content h5, #comments.sgny-comments-area.comments-area .comment-content h6, .sgny-single-crosshtml-content strong, .sgny-single-crosshtml-content strong, .sgny-single-crosshtml-content dt, #comments.sgny-comments-area.comments-area .comment-content strong, #comments.sgny-comments-area.comments-area .comment-content dt, .sgny-single-crosshtml-content .post-password-form input[type="submit"], #comments.sgny-comments-area.comments-area .comment-content .post-password-form input[type="submit"], .sgny-posts-pagination-warp .nav-links .page-numbers, .sgny-side-widget.widget_mc4wp_form_widget input[type="email"], .sgny-about-bio, .sgny-about-bio a, .sgny-rel-post-date, .sgny-comments-area.comments-area .sgny-comments-meta .says, .sgny-comments-area.comments-area .sgny-comments-meta .comments-date, .sgny-quote-post blockquote cite, .sgny-quote-post blockquote a, .sgny-404-text p, .single-product.woocommerce .entry-summary .sku_wrapper, .single-product.woocommerce .entry-summary .sku_wrapper a, .single-product.woocommerce .entry-summary .posted_in, .single-product.woocommerce .entry-summary .posted_in a, .single-product.woocommerce .entry-summary .tagged_as, .single-product.woocommerce .entry-summary .tagged_as a, .single-product.woocommerce-page .entry-summary .sku_wrapper, .single-product.woocommerce-page .entry-summary .sku_wrapper a, .single-product.woocommerce-page .entry-summary .posted_in, .single-product.woocommerce-page .entry-summary .posted_in a, .single-product.woocommerce-page .entry-summary .tagged_as, .single-product.woocommerce-page .entry-summary .tagged_as a, .woocommerce #reviews #comments ol.commentlist li .comment-text p.meta > time, .woocommerce-checkout .woocommerce form.checkout_coupon input.button[type="submit"], .woocommerce-account .woocommerce .sgny-woortrig-btn-info, .sgny-pin-btn, .sgny-post-inner-heading h3, .sgny-post-inner-heading h3 a, .sgny-single-crosshtml-content h4, .sgny-single-crosshtml-content h3, .sgny-single-crosshtml-content th, #comments.sgny-comments-area.comments-area .comment-content h3, #comments.sgny-comments-area.comments-area .comment-content th, .sgny-post-by span.sgny-post-author-name a',
            'font'            => array(
              'family'        => 'Montserrat',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Example Usage', 'signy'),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'PT Serif',
              'variant'       => 'regular',
            ),
          ),
        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'signy'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'signy'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => 'Thin 100',
          '100i'  => 'Thin 100 Italic',
          '200'   => 'Extra Light 200',
          '200i'  => 'Extra Light 200 Italic',
          '300'   => 'Light 300',
          '300i'  => 'Light 300 Italic',
          '400'   => 'Regular 400',
          '400i'  => 'Regular 400 Italic',
          '500'   => 'Medium 500',
          '500i'  => 'Medium 500 Italic',
          '600'   => 'Semi Bold 600',
          '600i'  => 'Semi Bold 600 Italic',
          '700'   => 'Bold 700',
          '700i'  => 'Bold 700 Italic',
          '800'   => 'Extra Bold 800',
          '800i'  => 'Extra Bold 800 Italic',
          '900'   => 'Black 900',
          '900i'  => 'Black 900 Italic',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => 'Upload Custom Fonts',
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => 'Font-Family Name',
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'svg',
            'type'           => 'upload',
            'title'          => 'Upload .svg <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.svg</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Pages', 'signy'),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog', 'signy'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'signy'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-sgny-heading',
            'content' => esc_html__('Layout', 'signy')
          ),
          array(
            'id'             => 'blog_listing_style',
            'type'           => 'select',
            'title'          => esc_html__('Blog Listing Style', 'signy'),
            'options'        => array(
              'style-one' => esc_html__('Default', 'signy'),
              'style-two' => esc_html__('List View', 'signy'),
              'style-three' => esc_html__('Masonary View', 'signy'),
            ),
            'default_option' => 'Select Blog Style',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author. If this settings will not apply your blog page, please set that page as a post page in Settings > Readings.', 'signy'),
          ),
          array(
            'id'             => 'general_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'signy'),
            'options'        => signy_sgny_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'signy'),
            'info'          => esc_html__('Default option : Main Widget Area', 'signy'),
          ),

          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-sgny-heading',
            'content' => esc_html__('Global Options', 'signy')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'signy'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'signy'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'signy'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'signy'),
            'default' => '55',
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'signy'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'signy'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'signy'),
              'date'    => esc_html__('Date', 'signy'),
              'author'     => esc_html__('Author', 'signy'),
              'social'      => esc_html__('Social Icons', 'signy'),
            ),
            // 'default' => '30',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'signy'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-sgny-heading',
            'content' => esc_html__('Enable / Disable', 'signy')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'signy'),
            'info' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'signy'),
            'default' => true,
          ),
          array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Author Info', 'signy'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this OFF.', 'signy'),
            'default' => true,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'signy'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'signy'),
            'default' => true,
          ),
          array(
            'id'    => 'single_comment_form',
            'type'  => 'switcher',
            'title' => esc_html__('Comment Area/Form', 'signy'),
            'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this OFF.', 'signy'),
            'default' => true,
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-sgny-heading',
            'content' => esc_html__('Sidebar', 'signy')
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'signy'),
            'options'        => signy_sgny_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'signy'),
            'info'          => esc_html__('Default option : Main Widget Area', 'signy'),
          ),
          // End fields

        )
      ),

    ),
  );

if (class_exists( 'WooCommerce' )){
  // ------------------------------
  // WooCommerce Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'woocommerce_section',
    'title'    => esc_html__('WooCommerce', 'signy'),
    'icon'     => 'fa fa-shopping-cart',
    'fields' => array(

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-sgny-heading',
        'content' => esc_html__('Listing', 'signy')
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => esc_html__('Product Limit', 'signy'),
        'info'   => esc_html__('Enter the number value for per page products limit.', 'signy'),
      ),
      // End fields
    ),
  );
}

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__('Extra Pages', 'signy'),
    'icon'     => 'fa fa-clone',
    'sections' => array(

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'signy'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page

          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => __('404 Page Content', 'signy'),
            'info'  => __('Enter 404 page content.', 'signy'),
            'shortcode' => true,
          ),

          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'signy'),
            'info'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'signy'),
          ),
          array(
            'id'    => 'error_btn_link',
            'type'  => 'text',
            'title' => esc_html__('Button Link', 'signy'),
            'info'  => esc_html__('Enter BACK TO HOME button Link. If you want to change it.', 'signy'),
          ),

          // End 404 Page

          array(
            'type'    => 'notice',
            'class'   => 'info cs-sgny-heading',
            'content' => esc_html__('Left-side Section', 'signy'),
          ),
          array(
            'id'    => '404_left_side_title',
            'type'  => 'text',
            'title' => esc_html__('404 Page Left-side Section Title', 'signy'),
            'info'  => esc_html__('Enter 404 Page Left-side Section Title.', 'signy'),
          ),
          array(
            'id'    => '404_left_side_content',
            'type'  => 'textarea',
            'title' => esc_html__('Left-side Section Content', 'signy'),
            'info'  => esc_html__('Enter Left-side Section content.', 'signy'),
            'shortcode' => 'true'
          ),
          array(
              'id'    => '404_left_side_image',
              'type'  => 'image',
              'title' => esc_html__('404 Page Left-side Image', 'signy'),
              'info'  => esc_html__('Upload Left-side Section Image.', 'signy'),
          ),

        ), // end: fields

      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__('Maintenance Mode', 'signy'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-sgny-heading',
            'content' => esc_html__('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'signy')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__('Maintenance Mode', 'signy'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__('Maintenance Mode Page', 'signy'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'signy'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__('Page Background', 'signy'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'signy'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Misc', 'signy'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'signy'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'signy'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'signy'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'signy'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'signy'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'signy'),
            'accordion_title' => esc_html__('New Sidebar', 'signy'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'signy'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(

          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-sgny-heading',
            'content' => esc_html__('Custom CSS', 'signy')
          ),
          array(
            'id'             => 'theme_custom_css',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your CSS code here...', 'signy'),
            ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-sgny-heading',
            'content' => esc_html__('Custom JS', 'signy')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'signy'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'signy'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-sgny-heading',
            'content' => esc_html__('Common Texts', 'signy')
          ),
          array(
            'id'          => 'continue_reading_text',
            'type'        => 'text',
            'title'       => esc_html__('Continue Reading Text', 'signy'),
          ),
          array(
            'id'          => 'post_by_text',
            'type'        => 'text',
            'title'       => esc_html__('Post by Author Text (by)', 'signy'),
          ),

          array(
            'id'          => 'follow_me_text',
            'type'        => 'text',
            'title'       => esc_html__('Left-side Follow me Text', 'signy'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'signy'),
          ),

          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'signy'),
          ),
          array(
            'id'          => 'share_post_text',
            'type'        => 'text',
            'title'       => esc_html__('Share This Post Text', 'signy'),
          ),
          array(
            'id'          => 'you_also_like_text',
            'type'        => 'text',
            'title'       => esc_html__('Related Post (You May Also Like) Text', 'signy'),
          ),

        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => 'You can save your current options. Download a Backup and Import.',
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );
  return $options;
}
add_filter( 'cs_framework_options', 'signy_sgny_options' );
