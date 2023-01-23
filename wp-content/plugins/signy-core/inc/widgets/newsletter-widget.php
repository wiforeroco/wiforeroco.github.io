<?php
/*
 * Logo Widget
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

class sgny_newsletter_widget extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'sgny_newsletter_widget',
      VTHEME_NAME_P . esc_html__( ': Newsletter Widget', 'signy-core' ),
      array(
        'classname'   => 'sgny_newsletter_widget',
        'description' => VTHEME_NAME_P . esc_html__( ' widget that display Newsletter Form.', 'signy-core' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'    => '',
      'content' => '',
      'shortcode' => ''
    ));

    // Title
    $title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => esc_html__( 'Newsletter Title :', 'signy-core' ),
      'wrap_class' => 'sgny-cs-widget-fields',
    );
    echo cs_add_element( $title_field, $title_value );

    // Content
    $content_value = esc_attr( $instance['content'] );
    $content_field = array(
      'id'    => $this->get_field_name('content'),
      'name'  => $this->get_field_name('content'),
      'type'  => 'textarea',
      'title' => esc_html__( 'Newsletter Description:', 'signy-core' ),
    );
    echo cs_add_element( $content_field, $content_value );

    // Newsletter Shortcode
    $shortcode_value = esc_attr( $instance['shortcode'] );
    $shortcode_field = array(
      'id'    => $this->get_field_name('shortcode'),
      'name'  => $this->get_field_name('shortcode'),
      'type'  => 'textarea',
      'shortcode' => 'true',
      'title' => esc_html__( 'Newletter shortcode :', 'signy-core' ),
    );
    echo cs_add_element( $shortcode_field, $shortcode_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']        = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['content']      = strip_tags( stripslashes( $new_instance['content'] ) );
    $instance['shortcode']    = strip_tags( stripslashes( $new_instance['shortcode'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    $title        = apply_filters( 'widget_title', $instance['title'] );
    $content      = $instance['content'];
    $shortcode    = $instance['shortcode'];

    // Display the markup before the widget
    echo $before_widget;

    if ( $title ) { ?>
      <!-- single widget start /-->
      <aside class="sgny-side-widget  widget_mc4wp_form_widget">
        <h4 class="sgny-widget-title"><?php echo ($instance['title']); ?></h4>
        <form id="mc4wp-form-3" class="mc4wp-form mc4wp-form-894" method="post" data-id="894">
          <div class="mc4wp-form-fields">
            <p>
              <label>
                <?php echo $content; ?>
              </label>
              </p>
              <?php echo do_shortcode($shortcode); ?>
          </div>
          <div class="mc4wp-response"></div>
        </form>
      </aside>
   <?php  }

  // Display the markup after the widget
    echo $after_widget;
  }
}
// Register the widget using an annonymous function
function sgny_newsletter_widget_function() {
  register_widget( "sgny_newsletter_widget" );
}
add_action( 'widgets_init', 'sgny_newsletter_widget_function' );
