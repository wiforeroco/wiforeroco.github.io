<?php
/* Signy Page Title */
function signy_pages_title_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "signy_page_title" => '',
    "signy_page_title_color" => '',
    "signy_page_title_size" => '',
    "signy_page_sub_title" => '',
    "signy_page_sub_title_color" => '',
    "signy_page_sub_title_size" => '',
    "custom_class" => ''
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $signy_page_title_color || $signy_page_title_size) {
    $inline_style .= '.sgny-contact-heading-'.$e_uniqid.'.sgny-contact-heading h2  {';
    $inline_style .= ( $signy_page_title_color ) ? 'color:'. $signy_page_title_color .';' : '';
    $inline_style .= ( $signy_page_title_size ) ? 'font-size:'. signy_check_px($signy_page_title_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $signy_page_sub_title_color || $signy_page_sub_title_size) {
    $inline_style .= '.sgny-contact-heading-'. $e_uniqid .'.sgny-contact-heading p  {';
    $inline_style .= ( $signy_page_sub_title_color ) ? 'color:'. $signy_page_sub_title_color .';' : '';
    $inline_style .= ( $signy_page_sub_title_size ) ? 'font-size:'. signy_check_px($signy_page_sub_title_size) .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' sgny-contact-heading-'. $e_uniqid;

  // Atts
  $signy_page_title = ($signy_page_title) ? '<h2>'.$signy_page_title.'</h2>' : '';
  $signy_page_sub_title = ($signy_page_sub_title) ? '<p>'.$signy_page_sub_title.'</p>' : '';

  $result ='<div class="text-center'. $styled_class .' sgny-contact-heading '.$custom_class .'">'.$signy_page_title.$signy_page_sub_title.'</div>';
  return $result;

}
add_shortcode("signy_pages_title", "signy_pages_title_function");

/* Spacer */
function signy_empty_space_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "height" => '',
  ), $atts));

  $height = ($height) ? 'style="height:'.$height.'"' : '';

  $result ='<div class="signy_empty_space"'.$height.'><span class="signy_empty_space_inner"></span></div>';
  return $result;
}
add_shortcode("signy_empty_space", "signy_empty_space_function");

/* Social Icons */
function sgny_socials_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "social_select" => '',
    "custom_class" => '',
    // Colors
    "icon_color" => '',
    "icon_hover_color" => '',
    "bg_color" => '',
    "bg_hover_color" => '',
    "border_color" => '',
    "icon_size" => '',
  ), $atts));

  // Atts
  if($social_select === 'style-one') {
    $social_style = 'sgny-social-one ';
  } elseif($social_select === 'style-two') {
    $social_style = 'sgny-social-two sgny-about-socail ';
  } elseif($social_select === 'style-three') {
    $social_style = 'sgny-social-three ';
  } else {
    $social_style = 'sgny-social-four sgny-widget-social ';
  }

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $icon_color || $icon_size ) {
    $inline_style .= '.sgny-socials-'. $e_uniqid .'.sgny-social-two li a, .sgny-l-sidebar-social .sgny-socials-'. $e_uniqid .'.sgny-social-one li a, .sgny-socials-'. $e_uniqid .'.sgny-social-three a i, .sgny-socials-'. $e_uniqid .'.sgny-social-four li a {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. signy_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $icon_hover_color ) {
      $inline_style .= '.sgny-l-sidebar-social .sgny-socials-'. $e_uniqid .'.sgny-social-one li a:hover, .sgny-socials-'. $e_uniqid .'.sgny-social-two li a:hover, .sgny-socials-'. $e_uniqid .'.sgny-social-three li a i:hover, .sgny-socials-'. $e_uniqid .'.sgny-social-four li a:hover {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
  }
  if($social_select !== 'style-one' || 'style-three') {
    if ( $bg_color ) {
      $inline_style .= '.sgny-socials-'. $e_uniqid .'.sgny-social-four li a, .sgny-socials-'. $e_uniqid .'.sgny-social-two a {';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= '}';
    }
  }
  if($social_select === 'style-two' || 'style-four') {
    if ( $bg_hover_color ) {
      $inline_style .= '.sgny-socials-'. $e_uniqid .'.sgny-social-two li a:hover, .sgny-socials-'. $e_uniqid .'.sgny-social-four li a:hover {';
      $inline_style .= ( $bg_hover_color ) ? 'background-color:'. $bg_hover_color .';' : '';
      $inline_style .= '}';
    }
  }
  if($social_select === 'style-two' || 'style-four') {
    if ( $border_color ) {
      $inline_style .= '.sgny-socials-'. $e_uniqid .'.sgny-social-two a, .sgny-socials-'. $e_uniqid .'.sgny-social-four li a:hover {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' sgny-socials-'. $e_uniqid;

  $result = '<ul class="list-inline '. $social_style . $custom_class . $styled_class .'">'. do_shortcode($content) .'</ul>';
  return $result;

}
add_shortcode("signy_socials", "sgny_socials_function");

/* Social Icon */
function sgny_social_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_link" => '',
      "social_icon" => '',
      "target_tab" => ''
   ), $atts));

   $social_link = $social_link  ? 'href="'. $social_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';

   $result = '<li><a '. $social_link . $target_tab .' class="'. str_replace('fa ', 'icon-', $social_icon) .'"><i class="'. $social_icon .'"></i></a></li>';
   return $result;

}
add_shortcode("sgny_social", "sgny_social_function");

/* About */
function sgny_about_function($atts, $content = true) {
   extract(shortcode_atts(array(
      'about_title'  => '',
      'about_title_color' => '',
      'about_title_hover_color' => '',
      'about_title_size' => '',
      'about_title_link' => '',
      'about_target_tab'  => '',
      'about_image'  => '',
      'profession_name'  => '',
      'profession_name_color'  => '',
      'profession_name_size'  => '',
      "about_social_icon_color" => '',
      "about_social_icon_hover_color" => '',
      "about_social_bg_color" => '',
      "about_social_bg_hover_color" => '',
      "about_social_border_color" => '',
      "abt_icon_size" => '',
      'custom_class'  => ''
   ), $atts));

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Colors & Size
    if ( $about_title_color || $about_title_size ) {
      $inline_style .= '.sgny-about-txt-'. $e_uniqid .'.sgny-about-name a {';
      $inline_style .= ( $about_title_color ) ? 'color:'. $about_title_color .';' : '';
      $inline_style .= ( $about_title_size ) ? 'font-size:'. signy_check_px($about_title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $about_title_hover_color ) {
      $inline_style .= '.sgny-about-txt-'. $e_uniqid .'.sgny-about-name a:hover {';
      $inline_style .= ( $about_title_hover_color ) ? 'color:'. $about_title_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $profession_name_color || $profession_name_size ) {
      $inline_style .= '.sgny-about-txt-'. $e_uniqid .'.sgny-about-bio {';
      $inline_style .= ( $profession_name_color ) ? 'color:'. $profession_name_color .';' : '';
      $inline_style .= ( $profession_name_size ) ? 'font-size:'. signy_check_px($profession_name_size) .';' : '';
      $inline_style .= '}';
    }

    // Colors & Size
    if ( $about_social_icon_color || $abt_icon_size ) {
      $inline_style .= '.sgny-about-socail.sgny-about-txt-'. $e_uniqid .'.sgny-social-two li a {';
      $inline_style .= ( $about_social_icon_color ) ? 'color:'. $about_social_icon_color .';' : '';
      $inline_style .= ( $abt_icon_size ) ? 'font-size:'. signy_check_px($abt_icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $about_social_icon_hover_color ) {
      $inline_style .= '.sgny-about-socail.sgny-about-txt-'. $e_uniqid .'.sgny-social-two li a:hover {';
      $inline_style .= ( $about_social_icon_hover_color ) ? 'color:'. $about_social_icon_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $about_social_bg_color ) {
      $inline_style .= '.sgny-about-socail.sgny-about-txt-'. $e_uniqid .'.sgny-social-two a {';
      $inline_style .= ( $about_social_bg_color ) ? 'background-color:'. $about_social_bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $about_social_bg_hover_color ) {
      $inline_style .= '.sgny-about-socail.sgny-about-txt-'. $e_uniqid .'.sgny-social-two li a:hover {';
      $inline_style .= ( $about_social_bg_hover_color ) ? 'background-color:'. $about_social_bg_hover_color .';' : '';
      $inline_style .= '}';
    }

    if ( $about_social_border_color ) {
      $inline_style .= '.sgny-about-socail.sgny-about-txt-'. $e_uniqid .'.sgny-social-two a, .sgny-socials-'. $e_uniqid .'.sgny-social-four li a:hover {';
      $inline_style .= ( $about_social_border_color ) ? 'border-color:'. $about_social_border_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' sgny-about-txt-'. $e_uniqid;

    //Image
    $about_image = esc_url( $about_image );
    $about_image = $about_image ? '<div class="sgny-about-thumb"><img src="'.$about_image.'" alt="'.$about_title.'"></div>' : '';

    // Title
    $about_target_tab = ( $about_target_tab === '1' ) ? ' target="_blank"' : '';
    $about_title = $about_title ? '<h4 class="sgny-about-name'.$styled_class.'"><a href="'.$about_title_link.'"'.$about_target_tab.'>'.$about_title.'</a></h4>': '';

    //Proffession
    $profession_name = $profession_name ? '<h6 class="sgny-about-bio '.$styled_class.'">'.$profession_name.'</h6>' : '';

    $output = '';

      $output .= '<div class="sgny-about-content-warp '.$custom_class.'">
                    <div class="text-center sgny-about-header">
                      '.$about_image.'
                      <div class="sgny-about-info">
                        '.$about_title.$profession_name.'
                      </div>
                    </div>
                    <div class="sgny-about-text-content">'. do_shortcode($content) .'</div>
                  </div>';
    return $output;

}
add_shortcode("signy_about", "sgny_about_function");

/* About signature */
function signy_about_signature_function($atts, $content = true) {
   extract(shortcode_atts(array(
      'signature_image'  => '',
      'signature_name'  => '',
      'signature_name_color'  => '',
      'signature_name_hover_color'  => '',
      'signature_name_size' => '',
      'signature_link' => '',
      'about_target_tab' => '',
      'custom_class'  => ''
   ), $atts));

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Signature Name
    if ( $signature_name_color || $signature_name_size ) {
      $inline_style .= '.sgny-about-signature-'. $e_uniqid .'.sgny-about-signature h5 {';
      $inline_style .= ( $signature_name_color ) ? 'color:'. $signature_name_color .';' : '';
      $inline_style .= ( $signature_name_size ) ? 'font-size:'. signy_check_px($signature_name_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $signature_name_hover_color ) {
      $inline_style .= '.sgny-about-signature-'. $e_uniqid .'.sgny-about-signature h5:hover {';
      $inline_style .= ( $signature_name_hover_color ) ? 'color:'. $signature_name_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' sgny-about-signature-'. $e_uniqid;

    //Signature
    $signature_image = esc_url( $signature_image );
    $signature_image = $signature_image ? '<img src="'.$signature_image.'" alt="'.$signature_name.'">' : '';
    $signature_name = $signature_name ? '<h5>'.$signature_name.'</h5>' : '';
    $about_target_tab = ( $about_target_tab === '1' ) ? ' target="_blank"' : '';
    $signature_link =$signature_name ? '<a href="'.$signature_link.'"'.$about_target_tab.'>'.$signature_image.$signature_name.'</a>' : '';

    $output = '';

          $output .= '<div class="sgny-abt-footer  '.$styled_class.' sgny-about-signature ' .$custom_class.'">
                        '.$signature_link.'
                      </div>';
    return $output;
}
add_shortcode("signy_about_signature", "signy_about_signature_function");

/* About Social Icons */
function signy_about_socials_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "about_social_icon_color" => '',
      "about_social_icon_hover_color" => '',
      "about_social_bg_color" => '',
      "about_social_bg_hover_color" => '',
      "about_social_border_color" => '',
      "abt_icon_size" => '',
      'custom_class'  => ''
   ), $atts));

    // Shortcode Style CSS
    $e_uniqid       = uniqid();
    $inline_style   = '';

    // Colors & Size
    if ( $about_social_icon_color || $abt_icon_size ) {
      $inline_style .= '.sgny-about-socail.sgny-about-social-'. $e_uniqid .'.sgny-social-two li a {';
      $inline_style .= ( $about_social_icon_color ) ? 'color:'. $about_social_icon_color .';' : '';
      $inline_style .= ( $abt_icon_size ) ? 'font-size:'. signy_check_px($abt_icon_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $about_social_icon_hover_color ) {
      $inline_style .= '.sgny-about-socail.sgny-about-social-'. $e_uniqid .'.sgny-social-two li a:hover {';
      $inline_style .= ( $about_social_icon_hover_color ) ? 'color:'. $about_social_icon_hover_color .';' : '';
      $inline_style .= '}';
    }
    if ( $about_social_bg_color ) {
      $inline_style .= '.sgny-about-socail.sgny-about-social-'. $e_uniqid .'.sgny-social-two a {';
      $inline_style .= ( $about_social_bg_color ) ? 'background-color:'. $about_social_bg_color .';' : '';
      $inline_style .= '}';
    }
    if ( $about_social_bg_hover_color ) {
      $inline_style .= '.sgny-about-socail.sgny-about-social-'. $e_uniqid .'.sgny-social-two li a:hover {';
      $inline_style .= ( $about_social_bg_hover_color ) ? 'background-color:'. $about_social_bg_hover_color .';' : '';
      $inline_style .= '}';
    }

    if ( $about_social_border_color ) {
      $inline_style .= '.sgny-about-socail.sgny-about-social-'. $e_uniqid .'.sgny-social-two a {';
      $inline_style .= ( $about_social_border_color ) ? 'border-color:'. $about_social_border_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' sgny-about-social-'. $e_uniqid;

    $output = '';

    $output .= '<div class=" sgny-abt-footer sgny-about-socail '.$styled_class.' sgny-social-two '.$custom_class.'">
                  <ul class="list-inline">
                  '. do_shortcode($content) .'
                  </ul>
                </div>';
    return $output;
}
add_shortcode("signy_about_socials", "signy_about_socials_function");

/* About Social Icon */
function signy_about_social_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "abt_social_link" => '',
      "abt_social_icon" => '',
      "abt_icon_target_tab" => ''
   ), $atts));

   $abt_social_link = $abt_social_link ? 'href="'. $abt_social_link . '"' : '';
   $abt_icon_target_tab = ( $abt_icon_target_tab === '1' ) ? ' target="_blank"' : '';

   $result = '<li><a '. $abt_social_link . $abt_icon_target_tab .' class="'. str_replace('fa ', 'icon-', $abt_social_icon) .'"><i class="'. $abt_social_icon .'"></i></a></li>';
   return $result;

}
add_shortcode("signy_about_social", "signy_about_social_function");

/* Dropcaps */
function signy_dropcaps_letter_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "letter" => '',
    "letter_color" => '',
    "letter_size" => '',
    "letter_border_color" => '',
    "letter_bg_color" => '',
    "custom_class" => ''
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $letter_color || $letter_size) {
    $inline_style .= '.sgny-big-letter-'. $e_uniqid .'.sgny-big-letter, .sgny-entry-content p.sgny-big-letter-'. $e_uniqid .'.sgny-big-letter {';
    $inline_style .= ( $letter_color ) ? 'color:'. $letter_color .';' : '';
    $inline_style .= ( $letter_size ) ? 'font-size:'. signy_check_px($letter_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $letter_border_color || $letter_bg_color ) {
    $inline_style .= '.sgny-big-letter-'. $e_uniqid .'.sgny-big-letter, .sgny-entry-content p.sgny-big-letter-'. $e_uniqid .'.sgny-big-letter {';
    $inline_style .= ( $letter_border_color ) ? 'border-color:'. $letter_border_color .';' : '';
    $inline_style .= ( $letter_bg_color ) ? 'background-color:'. $letter_bg_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' sgny-big-letter-'. $e_uniqid;

  // Atts
  $letter = ($letter) ? '<p class="'. $styled_class .' sgny-big-letter '. $custom_class .'">'. $letter .'</p>' : '';
  return $letter;

}
add_shortcode("signy_dropcaps_letter", "signy_dropcaps_letter_function");

/* Quote */
function sgny_quote_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "sgny_quote_content" => '',
    "custom_class" => ''
  ), $atts));

  // Atts
  $sgny_quote_content = ($sgny_quote_content) ? '<div class="sgny-entry-content '.$custom_class.'"><blockquote><p>'.$sgny_quote_content.'</p></blockquote></div>' : '';

  $result = $sgny_quote_content;
  return $result;

}
add_shortcode("signy_quote", "sgny_quote_function");

/* Double Image */
function sgny_double_images_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "sgny_double_image_one" => '',
    "sgny_double_image_two" => '',
    "sgny_double_image_one_caption" => '',
    "sgny_double_image_two_caption" => '',
    "custom_class" => ''
  ), $atts));

  // Atts
    $sgny_double_image_one = ($sgny_double_image_one) ? '<figure class="text-center sgny-inner-photo-single"><img src="'.$sgny_double_image_one.'" alt="'.$sgny_double_image_one_caption.'" /><figcaption class="sgny-inner-photo-caption">'.$sgny_double_image_one_caption.'</figcaption></figure>' : '';
    $sgny_double_image_two = ($sgny_double_image_two) ? '<figure class="text-center sgny-inner-photo-single"><img src="'.$sgny_double_image_two.'" alt="'.$sgny_double_image_two_caption.'" /><figcaption class="sgny-inner-photo-caption">'.$sgny_double_image_two_caption.'</figcaption></figure>' : '';

    $result = '<div class="sgny-fix sgny-post-inner-photos '.$custom_class.'">'.$sgny_double_image_one.$sgny_double_image_two.'</div>';
  return $result;

}
add_shortcode("signy_double_images", "sgny_double_images_function");

/* Contact Icons Section */
function sgny_contact_sections_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "contact_icons_column" => '',
      "contact_icons_align" => '',
   ), $atts));

    $result = '<div class="sgny-contact-info '.$contact_icons_align.' '.$custom_class.' '.$contact_icons_column.' ">'. do_shortcode($content) .'</div>';
   return $result;

}
add_shortcode("signy_contact_sections", "sgny_contact_sections_function");

/* Contact Icon Section */
function sgny_contact_section_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "contact_icon" => '',
      "contact_icon_caption" => '',
      "contact_target_tab" => '',
      "contact_icon_caption_link" => '',
   ), $atts));

    $contact_target_tab = $contact_target_tab ? ' target="_blank"' : '';
    $contact_icon = ( isset( $contact_icon ) ) ? '<span class="'.$contact_icon.' sgny-cont-info-icon"></span>' : '';
    $contact_icon_caption_link = $contact_icon_caption_link ? '<a href="'. $contact_icon_caption_link .'"class="contact_caption"' . $contact_target_tab .'>'.$contact_icon_caption.'</a>': '<span class="contact_caption">'.$contact_icon_caption.'</span>';
    $contact_icon_caption = ( isset( $contact_icon_caption ) ) ? '<h5>'.$contact_icon_caption_link.'</h5>' : '';

  $result = '<div class="sgny-single-contact-info">'.$contact_icon.$contact_icon_caption.'</div>';
  return $result;

}
add_shortcode("sgny_contact_section", "sgny_contact_section_function");

/* Signy Heading */
function signy_headings_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "signy_heading" => '',
    "signy_heading_color" => '',
    "signy_heading_size" => '',
    "signy_heading_caption" => '',
    "signy_heading_caption_color" => '',
    "signy_heading_caption_hover_color" =>'',
    "signy_heading_caption_size" => '',
    "signy_heading_caption_link" => '',
    "heading_target_tab" => '',
    "custom_class" => ''

  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $signy_heading_color || $signy_heading_size) {
    $inline_style .= '.sgny-post-inner-heading-'. $e_uniqid .'.sgny-post-inner-heading h3 {';
    $inline_style .= ( $signy_heading_color ) ? 'color:'. $signy_heading_color .';' : '';
    $inline_style .= ( $signy_heading_size ) ? 'font-size:'. signy_check_px($signy_heading_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $signy_heading_caption_color || $signy_heading_caption_size) {
    $inline_style .= '.sgny-post-inner-heading-'. $e_uniqid .'.sgny-post-inner-heading h6 a {';
    $inline_style .= ( $signy_heading_caption_color ) ? 'color:'. $signy_heading_caption_color .';' : '';
    $inline_style .= ( $signy_heading_caption_size ) ? 'font-size:'. signy_check_px($signy_heading_caption_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $signy_heading_caption_hover_color ) {
    $inline_style .= '.sgny-post-inner-heading-'. $e_uniqid .'.sgny-post-inner-heading h6 a:hover  {';
    $inline_style .= ( $signy_heading_caption_hover_color ) ? 'color:'. $signy_heading_caption_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' sgny-post-inner-heading-'. $e_uniqid;

  // Atts
  $heading_target_tab = ( $heading_target_tab === '1' ) ? ' target="_blank"' : '';
  $signy_heading = ($signy_heading) ? '<h3>'.$signy_heading.'</h3>' : '';
  $signy_heading_caption = ($signy_heading_caption) ? '<h6><a href="'.$signy_heading_caption_link.'"'.$heading_target_tab.'>'.$signy_heading_caption.'</a></h6>' : '';

  $result ='<div class="text-center text-uppercase'.$styled_class.' sgny-post-inner-heading '.$custom_class .'">'.$signy_heading.$signy_heading_caption.'</div>';
  return $result;

}
add_shortcode("signy_headings", "signy_headings_function");

/* Shop Post */
function signy_shop_post_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "signy_shop_post_heading" => '',
    "signy_shop_post_limit" => '',
    "signy_shop_post_order" => '',
    "signy_shop_post_orderby" => '',
    "signy_shop_post_category" => '',
    "signy_shop_post_id" => '',
    "custom_class" => ''
  ), $atts));

  ob_start();

    if ($signy_shop_post_id) {
      $signy_shop_post_id = explode(',',$signy_shop_post_id);
    } else {
      $signy_shop_post_id = '';
    }

    $args = array(
      // other query params here,
      'post_type' => 'product',
      'posts_per_page' => (int)$signy_shop_post_limit,
      'product_cat' => $signy_shop_post_category,
      'orderby' => $signy_shop_post_orderby,
      'order' => $signy_shop_post_order,
      'post__in' => $signy_shop_post_id
    );

    $sgny_product = new WP_Query( $args );?>
    <!-- Product Start -->
    <div class="single-product woocommerce sgny-post-shop <?php echo $custom_class ?>">
      <h2><?php echo esc_attr($signy_shop_post_heading); ?></h2>
      <div class="related products">
        <ul class="products">
          <?php
            if ($sgny_product->have_posts()) : while ($sgny_product->have_posts()) : $sgny_product->the_post();
               wc_get_template_part('content', 'product');
            endwhile;
            endif;
            wp_reset_postdata();
          ?>
        </ul>
      </div>
    </div>

<?php
  // Return outbut buffer
  return ob_get_clean();

}
add_shortcode("signy_shop_post", "signy_shop_post_function");

/* Popular Post */
function signy_popular_post_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "signy_popular_post_heading" => '',
    "popular_post_cat" => '',
    'custom_class' =>''
  ), $atts));

  // Atts
  global $post;
  $signy_popular_post_heading = ( isset( $signy_popular_post_heading ) ) ? '<h4 class="sgny-widget-title">'.$signy_popular_post_heading.'</h4> ' : '';
  $term = get_category($popular_post_cat);
  $term_data = get_term_meta( $term->term_id, 'signy_category_tax_options', true );

  ob_start();
?>
    <aside class="sgny-widget_popular_post <?php echo $custom_class ?>">
      <?php echo $signy_popular_post_heading; ?>
      <div class="sgny-widget-popularpost">
        <a href="<?php echo get_category_link($popular_post_cat); ?>" class="sgny-single_widge_popu_post">
        <?php if($term_data['post_category_image']) {
          echo '<img src="'. wp_get_attachment_url($term_data['post_category_image']) .'" alt="'.get_cat_name($popular_post_cat).'">';
        } else {
           echo '<img src="'.esc_url(SIGNY_IMAGES).'/dummy-img.png" alt="'.get_cat_name($popular_post_cat).'" />';
        } ?>
          <div class="text-center sgny-popu_post-caption">
            <span><?php echo get_cat_name($popular_post_cat); ?></span>
          </div>
        </a>
      </div>
    </aside>

<?php
  // Return outbut buffer
  return ob_get_clean();

}
add_shortcode("signy_popular_post", "signy_popular_post_function");

/* WPML */
function signy_wpml_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "custom_class" => '',
    "wpml_lang_type" => '',
    "wpml_lang_style" => '',
    "wpml_flag" => ''
  ), $atts));

  $output   = '';

  if ( is_wpml_activated() ) {
    global $sitepress;
    $sitepress_settings = $sitepress->get_settings();
    $icl_get_languages  = icl_get_languages();

    if ( ! empty( $icl_get_languages ) ) {
      // Horizontal View
      if($wpml_lang_style === 'horizontal') {
          $languages = icl_get_languages('skip_missing=0&orderby=code');

            if(!empty($languages)){
                echo '<div id="horizontal_language_list"><ul>';
                  foreach($languages as $l){

                    if($wpml_lang_type === 'translated_name') {
                      $lang_type = $l['translated_name'];
                    } elseif($wpml_lang_type === 'language_code') {
                      $lang_type = $l['language_code'];
                    }
                    else {
                      $lang_type = $l['native_name'];
                    }

                      echo '<li>';
                        if($l['country_flag_url']){
                            if(!$l['active']) echo '<a href="'.$l['url'].'">';
                              if (!$wpml_flag)  {
                                echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                              }
                            if(!$l['active']) echo '</a>';
                        }
                      if(!$l['active']) echo '<a href="'.$l['url'].'">';
                        echo icl_disp_language($lang_type);
                      if(!$l['active']) echo '</a>';
                        echo '</li>';
                  }
                echo '</ul></div>';
            }
    } elseif($wpml_lang_style === 'vertical') {
        // Vertical View
        $languages = icl_get_languages('skip_missing=0&orderby=code');
          if(!empty($languages)){
                echo '<div id="vertical_language_list"><ul>';
                  foreach($languages as $l){

                    if($wpml_lang_type === 'translated_name') {
                      $lang_type = $l['translated_name'];
                    } elseif($wpml_lang_type === 'language_code') {
                      $lang_type = $l['language_code'];
                    }
                    else {
                      $lang_type = $l['native_name'];
                    }

                    echo '<li>';
                    if($l['country_flag_url']){
                        if(!$l['active']) echo '<a href="'.$l['url'].'">';
                          if (!$wpml_flag)  {
                            echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                          }
                        if(!$l['active']) echo '</a>';
                    }
                    if(!$l['active']) echo '<a href="'.$l['url'].'">';
                      echo icl_disp_language($lang_type);
                    if(!$l['active']) echo '</a>';
                      echo '</li>';
                  }
                echo '</ul></div>';
          }
    } else {
        // Dropdown View
      $languages = icl_get_languages('skip_missing=0&orderby=code');
        $output .= '<div class="sgny-tr-element '. $custom_class .'"><div class="sgny-top-dropdown sgny-wpml-dropdown">';

          // current language
          $output .= '<a href="#" class="sgny-top-active">';
          foreach ( $languages as $current_lang ) {

                  if($wpml_lang_type === 'translated_name') {
                    $lang_type = $current_lang['translated_name'];
                  } elseif($wpml_lang_type === 'language_code') {
                    $lang_type = $current_lang['language_code'];
                  }
                  else {
                    $lang_type = $current_lang['native_name'];
                  }

                  if ( $current_lang['active'] ) {
                    if (!$wpml_flag)  {
                      $output .= '<img src="'.$current_lang['country_flag_url'].'" height="12" alt="'.$current_lang['language_code'].'" width="18" />';
                    }
                      $output .= $lang_type;
                      $output .= '<i class="fa fa-angle-down"></i>';
                  }
          }
          $output .= '</a>';

          // list languages
          $output .= '<ul class="sgny-topdd-content">';
          foreach ( $languages as $language ) {
            if ( ! $language['active'] ) {

                  if($wpml_lang_type === 'translated_name') {
                    $lang_type = $language['translated_name'];
                  } elseif($wpml_lang_type === 'language_code') {
                    $lang_type = $language['language_code'];
                  }
                  else {
                    $lang_type = $language['native_name'];
                  }

                $output .= '<li>';
                $output .= '<a href="'. $language['url'] .'">';
              if (!$wpml_flag)  {
                $output .= '<img src="'.$language['country_flag_url'].'" height="12" alt="'.$language['language_code'].'" width="18" />';
              }
                $output .= $lang_type;
                $output .= '</a>';
                $output .= '</li>';
            }
            // print_r($language);
          }
          $output .= '</ul>';
          $output .= '</div>';
          $output .= '</div>';
    }
  }

  } else {
    $output .= '<p class="wpml-not-active">Please Activate WPML Plugin</p>';
  }

  return $output;

}
add_shortcode("signy_wpml", "signy_wpml_function");

/* Blog */
function sgny_blog_function($atts, $content = false) {
  extract(shortcode_atts(array(
    "blog_style" => '',
    "blog_limit" => '',
    "blog_order" => '',
    "blog_orderby" => '',
    "blog_show_category" => '',
    "blog_show_posts" => '',
    "excerpt_length" => '',
    "blog_pagination" => '',
    "blog_date" => '',
    "blog_category" => '',
    "blog_author" => '',
    "blog_social" => '',
    "custom_class" => ''
  ), $atts));

// Theme Options
$continue_reading_text = cs_get_option('continue_reading_text');
$post_by_text = cs_get_option('post_by_text');

// Turn output buffer on
ob_start();

  // Pagination
  global $paged;
  if( get_query_var( 'paged' ) )
    $my_page = get_query_var( 'paged' );
  else {
    if( get_query_var( 'page' ) )
      $my_page = get_query_var( 'page' );
    else
      $my_page = 1;
    set_query_var( 'paged', $my_page );
    $paged = $my_page;
  }

  // Query
  if ($blog_show_posts) {
    // Post ID
    $post_id = explode(",", $blog_show_posts);
    $args = array(
      'paged' => $my_page,
      'post_type' => 'post',
      'posts_per_page' => (int)$blog_limit,
      'category_name' => esc_attr($blog_show_category),
      'orderby' => $blog_orderby,
      'order' => $blog_order,
      'post__in'  => $post_id,
      'ignore_sticky_posts' => 1
    );
  } else {
    $args = array(
      'paged' => $my_page,
      'post_type' => 'post',
      'posts_per_page' => (int)$blog_limit,
      'category_name' => esc_attr($blog_show_category),
      'orderby' => $blog_orderby,
      'order' => $blog_order,
      'ignore_sticky_posts' => 1
    );
  }

  // Excerpt
  if ($excerpt_length) {
    $excerpt = $excerpt_length;
  } else {
    $excerpt = '50';
  }

  $sgny_post = new WP_Query( $args );

  if ($blog_style === 'style-three') {
    echo'<div class="sgny-fix  sgny-masonary-content-warp '. $custom_class .'"><div class="sgny-fix  sgny-masonary-post-warp">';
  } elseif ($blog_style === 'style-two') {
    echo '<div class="sgny-fix  sgny-list-post-warp '. $custom_class .'">';
  } else {
    echo '<div class="shortcode-blog-listing '. $custom_class .'">';
  }
  if ($sgny_post->have_posts()) : while ($sgny_post->have_posts()) : $sgny_post->the_post();
  // Metabox
  global $post;
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

if ($blog_style === 'style-two') { ?>
  <!-- single list post start\-->
  <article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post-list'); ?>>
    <div class="sgny-post-media sgny-list-post-media">
      <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
    </div>
    <div class="sgny-fix sgny-list-post-cont-warp">
      <div class="text-left sgny-post-header sgny-list-post-header">
        <div class="text-uppercase  sgny-post-meta  sgny-list-post-meta">
          <?php if (!$blog_date) { // date Hide ?>
            <span class="sgny-post-date">
              <?php echo get_the_date(); ?>
            </span>
          <?php }
          if (!$blog_category) {  // Category Hide ?>
            <span class="sgny-post-in">
              <?php the_category(); ?>
            </span>
          <?php } ?>
        </div>
          <h2 class="sgny-post-title sgny-list-post-title">
            <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a>
          </h2>
      </div>
      <div class="sgny-entry-content sgny-list-entry-content">
        <p><?php signy_excerpt($excerpt); ?></p>
      </div>
      <div class="sgny-post-footer">
        <div class="text-left sgny-readmore-btn-warp   sgny-readmore-list-btn-warp">
          <a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
            <?php if ($continue_reading_text) {
              echo esc_attr($continue_reading_text);
             } else {
              echo esc_html__('Continue Reading', 'signy-core');
              } ?>
          </a>
        </div>
      </div>
    </div>
  </article>

<?php } elseif ($blog_style === 'style-three') { ?>

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

<?php } else { ?>

    <article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post'); ?>>
      <div class="sgny-post-media">
        <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
      </div>

    <?php } } elseif(get_post_format() === 'video') { ?>

    <article id="sgny-post_5" class="sgny-single-post  format-video  post_format-post-format-video">
      <div class="sgny-post-media">
        <div class="sgny-video_contant">
          <?php echo $video_post;?>
        </div>
      </div>

    <?php } else {
      if(get_post_format() === 'aside') {
        $aside_class = 'format-aside-masonary';
      } else {
        $aside_class = '';
      } ?>
    <article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post '.$aside_class); ?>>

      <div class="sgny-post-media">
      <a class="text-uppercase sgny-pin-btn" href=""><span><?php esc_html_e('PIN', 'signy-core'); ?></span></a>
        <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
      </div>

    <?php } ?>
      <div class="text-center sgny-post-header sgny-masonary-post-header">
        <div class="text-uppercase  sgny-post-meta  sgny-masonary-post-meta">
          <?php if (!$blog_date) { // date Hide ?>
            <span class="sgny-post-date">
              <?php echo get_the_date(); ?>
            </span>
          <?php }
          if (!$blog_category) {  // Category Hide ?>
            <span class="sgny-post-in">
              <?php the_category(); ?>
            </span>
          <?php } ?>
        </div>
        <h2 class="sgny-post-title sgny-masonary-post-title">
          <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a>
        </h2>

      </div>
      <div class="sgny-entry-content sgny-masonary-entry-content">
        <p><?php signy_excerpt($excerpt); ?></p>
      </div>

      <div class="sgny-post-footer">
        <div class="text-center sgny-readmore-btn-warp   sgny-readmore-masonary-btn-warp">
          <a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
            <?php if ($continue_reading_text) {
                echo esc_attr($continue_reading_text);
              } else {
                echo esc_html__('Continue Reading', 'signy-core');
              }
            ?>
          </a>
        </div>
      </div>
    </article>
  </div>
</div>

<?php } else {
if(get_post_format() === 'aside') { ?>

<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post'); ?>>
  <div class="sgny-post-media">
    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
  </div>
  <div class="sgny-fix sgny-aside-post-warp">
    <div class="text-center  sgny-post-header">
      <div class="text-uppercase  sgny-post-meta">
        <?php if (!$blog_date) { // date Hide ?>
          <span class="sgny-post-date">
            <?php echo get_the_date(); ?>
          </span>
        <?php }
        if (!$blog_category) {  // Category Hide ?>
          <span class="sgny-post-in">
            <?php echo get_the_category_list( ', ', '', $post->ID ); ?>
          </span>
        <?php } ?>
      </div>
      <h2 class="sgny-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>

    </div>
    <div class="sgny-entry-content">
      <p><?php signy_excerpt($excerpt); ?></p>
    </div>
    <div class="sgny-post-footer">
      <div class="text-center sgny-readmore-btn-warp">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
          <?php if ($continue_reading_text) {
              echo esc_attr($continue_reading_text);
             } else {
              echo esc_html__('Continue Reading', 'signy-core');
            }
          ?>
        </a>
      </div>

      <?php if ((!$blog_author) || (!$blog_social)) {  ?>
        <div class="sgny-fix  sgny-post-foo-info">
          <?php if (!$blog_author) { // author Hide ?>
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
                echo esc_html__('by', 'signy-core');
              }
            ?>
            <span class="sgny-post-author-name">
              <a href="<?php the_author_link(); ?>"><?php the_author_meta( 'display_name' ); ?></a>
            </span>
          </div>
          <?php }
          if (!$blog_social) { // social icons Hide ?>
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
      <?php if (!$blog_date) { // date Hide ?>
        <span class="sgny-post-date">
          <?php echo get_the_date(); ?>
        </span>
      <?php }
      if (!$blog_category) {  // Category Hide ?>
        <span class="sgny-post-in">
          <?php echo get_the_category_list( ', ', '', $post->ID ); ?>
        </span>
      <?php }?>
    </div>
    <h2 class="sgny-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>

  </div>
  <div class="sgny-post-media">
    <a class="text-uppercase sgny-pin-btn" href=""><span><?php esc_html_e('PIN', 'signy-core'); ?></span></a>
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
    <p><?php signy_excerpt($excerpt); ?></p>
  </div>

<?php } else { ?>

<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post'); ?>>
  <div class="text-center  sgny-post-header">
    <div class="text-uppercase  sgny-post-meta">
      <?php if (!$blog_date) { // date Hide ?>
        <span class="sgny-post-date">
          <?php echo get_the_date(); ?>
        </span>
      <?php }
      if (!$blog_category) {  // Category Hide ?>
        <span class="sgny-post-in">
          <?php echo get_the_category_list( ', ', '', $post->ID ); ?>
        </span>
      <?php }?>
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
    <p><?php signy_excerpt($excerpt); ?></p>
  </div>

<?php } ?>
    <div class="sgny-post-footer">
      <div class="text-center sgny-readmore-btn-warp">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
          <?php if ($continue_reading_text) {
              echo esc_attr($continue_reading_text);
             } else {
              echo esc_html__('Continue Reading', 'signy-core');
            }
          ?>
        </a>
      </div>

      <?php if ((!$blog_author) || (!$blog_social)) {  ?>
        <div class="sgny-fix  sgny-post-foo-info">
          <?php if (!$blog_author) { // author Hide ?>
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
                echo esc_html__('by', 'signy-core');
              }
            ?>
            <span class="sgny-post-author-name">
              <a href="<?php the_author_link(); ?>"><?php the_author_meta( 'display_name' ); ?></a>
            </span>
          </div>
          <?php }
          if (!$blog_social) { // social icons Hide ?>
            <div class="sgny-post-foo-social">
              <?php echo signy_wp_share_option(); ?>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
</article>
 <?php } elseif(get_post_format() === 'video')  { ?>

<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post'); ?>>
  <div class="text-center  sgny-post-header">
    <div class="text-uppercase  sgny-post-meta">
      <?php if (!$blog_date) { // date Hide ?>
        <span class="sgny-post-date">
          <?php echo get_the_date(); ?>
        </span>
      <?php }
      if (!$blog_category) {  // Category Hide ?>
        <span class="sgny-post-in">
          <?php echo get_the_category_list( ', ', '', $post->ID ); ?>
        </span>
      <?php }?>
    </div>
    <h2 class="sgny-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>

  </div>
<?php if($video_post) {  ?>
  <div class="sgny-post-media">
    <div class="sgny-video_contant">
      <?php echo $video_post;?>
    </div>
  </div>
<?php } ?>
  <div class="sgny-entry-content">
    <p><?php signy_excerpt($excerpt); ?></p>
  </div>
    <div class="sgny-post-footer">
      <div class="text-center sgny-readmore-btn-warp">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
          <?php if ($continue_reading_text) {
              echo esc_attr($continue_reading_text);
             } else {
              echo esc_html__('Continue Reading', 'signy-core');
            }
          ?>
        </a>
      </div>

      <?php if ((!$blog_author) || (!$blog_social)) {  ?>
        <div class="sgny-fix  sgny-post-foo-info">
          <?php if (!$blog_author) { // author Hide ?>
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
                echo esc_html__('by', 'signy-core');
              }
            ?>
            <span class="sgny-post-author-name">
              <a href="<?php the_author_link(); ?>"><?php the_author_meta( 'display_name' ); ?></a>
            </span>
          </div>
          <?php }
          if (!$blog_social) { // social icons Hide ?>
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
      <?php if (!$blog_date) { // date Hide ?>
        <span class="sgny-post-date">
          <?php echo get_the_date(); ?>
        </span>
      <?php }
      if (!$blog_category) {  // Category Hide ?>
        <span class="sgny-post-in">
          <?php echo get_the_category_list( ', ', '', $post->ID ); ?>
        </span>
      <?php }?>
    </div>
    <h2 class="sgny-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>
  </div>
<?php if($audio_post) {  ?>
  <div class="sgny-post-media">
    <?php echo $audio_post;?>
  </div>
<?php } ?>
  <div class="sgny-entry-content">
    <p><?php signy_excerpt($excerpt); ?></p>
  </div>
  <div class="sgny-post-footer">
    <div class="text-center sgny-readmore-btn-warp">
      <a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
        <?php if ($continue_reading_text) {
            echo esc_attr($continue_reading_text);
           } else {
            echo esc_html__('Continue Reading', 'signy-core');
          }
        ?>
      </a>
    </div>

    <?php if ((!$blog_author) || (!$blog_social)) {  ?>
      <div class="sgny-fix  sgny-post-foo-info">
        <?php if (!$blog_author) { // author Hide ?>
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
              echo esc_html__('by', 'signy-core');
            }
          ?>
          <span class="sgny-post-author-name">
            <a href="<?php the_author_link(); ?>"><?php the_author_meta( 'display_name' ); ?></a>
          </span>
        </div>
        <?php }
        if (!$blog_social) { // social icons Hide ?>
          <div class="sgny-post-foo-social">
            <?php echo signy_wp_share_option(); ?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</article>
<?php } else { ?>

<article id="sgny-post-<?php the_ID(); ?>" <?php post_class('sgny-single-post'); ?>>
  <div class="text-center sgny-post-header">
    <div class="text-uppercase  sgny-post-meta">
      <?php if (!$blog_date) { // date Hide ?>
        <span class="sgny-post-date">
          <?php echo get_the_date(); ?>
        </span>
      <?php }
      if (!$blog_category) {  // Category Hide ?>
        <span class="sgny-post-in">
          <?php echo get_the_category_list( ', ', '', $post->ID ); ?>
        </span>
      <?php }?>
    </div>
    <h2 class="sgny-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_title()); ?></a></h2>
  </div>

  <div class="sgny-post-media">
  <a class="text-uppercase sgny-pin-btn" href=""><span><?php esc_html_e('PIN', 'signy-core'); ?></span></a>
    <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail(); ?></a>
  </div>

  <div class="sgny-entry-content">
    <p><?php signy_excerpt($excerpt); ?></p>
  </div>

  <div class="sgny-post-footer">
    <div class="text-center sgny-readmore-btn-warp">
      <a href="<?php echo esc_url( get_permalink() ); ?>" class="sgny-readmore-btn">
        <?php if ($continue_reading_text) {
            echo esc_attr($continue_reading_text);
           } else {
            echo esc_html__('Continue Reading', 'signy-core');
          }
        ?>
      </a>
    </div>

    <?php if ((!$blog_author) || (!$blog_social)) {  ?>
      <div class="sgny-fix  sgny-post-foo-info">
        <?php if (!$blog_author) { // author Hide ?>
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
              echo esc_html__('by', 'signy-core');
            }
          ?>
          <span class="sgny-post-author-name">
            <a href="<?php the_author_link(); ?>"><?php the_author_meta( 'display_name' ); ?></a>
          </span>
        </div>
        <?php }
        if (!$blog_social) { // social icons Hide ?>
          <div class="sgny-post-foo-social">
            <?php echo signy_wp_share_option(); ?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>

</article>
<?php } }
endwhile;
endif;
  if ($blog_style === 'style-three') {
    echo'</div></div>';
  } elseif ($blog_style === 'style-two') {
    echo '</div>';
  } else {
    echo '</div>';
  }
  if ($blog_pagination) { ?>
    <div class="blog-pagi">
   <?php wp_pagenavi(array( 'query' => $sgny_post ) ); ?>
    </div>
  <?php }
  wp_reset_postdata();

  // Return outbut buffer
  return ob_get_clean();
}
add_shortcode("signy_blog", "sgny_blog_function");

/* Current Year - Shortcode */
if( ! function_exists( 'sgny_current_year' ) ) {
  function sgny_current_year() {
    return date('Y');
  }
  add_shortcode( 'sgny_current_year', 'sgny_current_year' );
}

/* Get Home Page URL - Via Shortcode */
if( ! function_exists( 'sgny_home_url' ) ) {
  function sgny_home_url() {
    return esc_url( home_url( '/' ) );
  }
  add_shortcode( 'sgny_home_url', 'sgny_home_url' );
}
