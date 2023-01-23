<?php
/*
 * Logo Widget
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

class sgny_logo_widget extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'sgny-logo-widget',
      VTHEME_NAME_P . esc_html__( ': Logo Widget', 'signy-core' ),
      array(
        'classname'   => 'sgny-logo-widget',
        'description' => VTHEME_NAME_P . esc_html__( ' widget that display Logo & Logo Caption.', 'signy-core' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'image'    => '',
      'content' => '',
      'link'    =>''
    ));

    // Title
    $image_value = esc_attr( $instance['image'] );
    $image_field = array(
      'id'    => $this->get_field_name('image'),
      'name'  => $this->get_field_name('image'),
      'type'  => 'text',
      'title' => esc_html__( 'Image url :', 'signy-core' ),
      'wrap_class' => 'sgny-cs-widget-fields',
    );
    echo cs_add_element( $image_field, $image_value );

    // Content
    $content_value = esc_attr( $instance['content'] );
    $content_field = array(
      'id'    => $this->get_field_name('content'),
      'name'  => $this->get_field_name('content'),
      'type'  => 'text',
      'title' => esc_html__( 'Image Caption :', 'signy-core' ),
    );
    echo cs_add_element( $content_field, $content_value );

    // Link
    $link_value = esc_attr( $instance['link'] );
    $link_field = array(
      'id'    => $this->get_field_name('link'),
      'name'  => $this->get_field_name('link'),
      'type'  => 'text',
      'title' => esc_html__( 'Image Link :', 'signy-core' ),
    );
    echo cs_add_element( $link_field, $link_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['image']      = strip_tags( stripslashes( $new_instance['image'] ) );
    $instance['content']    = strip_tags( stripslashes( $new_instance['content'] ) );
    $instance['link']    = strip_tags( stripslashes( $new_instance['link'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $image      = apply_filters( 'widget_title', $instance['image'] );
    $content    = $instance['content'];
    $link    = $instance['link'];

    // Display the markup before the widget
    echo $before_widget;

    if ( $image ) { ?>
    <div class="sgny-footer-logo">
      <a href="<?php echo $link; ?>"><img src="<?php echo ($instance['image']); ?>" alt="<?php echo $content; ?>"/></a>
      </div>
   <?php  }
    echo '<h6>'.$content.'</h6>'; ?>
   <?php // Display the markup after the widget
    echo $after_widget;
  }
}

// Register the widget using an annonymous function
function sgny_logo_widget_function() {
  register_widget( "sgny_logo_widget" );
}
add_action( 'widgets_init', 'sgny_logo_widget_function' );
