<?php
/*
 * Logo Widget
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

class sgny_popular_posts_widget extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'sgny-popularr-posts-widget',
      VTHEME_NAME_P . esc_html__( ': Popular Posts Widget', 'signy-core' ),
      array(
        'classname'   => 'sgny-popularr-posts-widget',
        'description' => VTHEME_NAME_P . esc_html__( ' widget that displays Popular Posts.', 'signy-core' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'title'    => esc_html__( 'Popular Posts', 'signy-core' ),
      'category_list'    => '',
      'view' => ''

    ));

    // Title
    $title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => esc_html__( 'Title :', 'signy-core' ),
      'wrap_class' => 'sgny-cs-widget-fields',
    );
    echo cs_add_element( $title_field, $title_value );

    // Category
    $category_list_value = esc_attr( $instance['category_list'] );
    $category_list_field = array(
      'id'    => $this->get_field_name('category_list'),
      'name'  => $this->get_field_name('category_list'),
      'type'  => 'text',
      'title' => esc_html__( 'Categories:', 'signy-core' ),
      'wrap_class' => 'sgny-cs-widget-fields',
    );

echo cs_add_element( $category_list_field, $category_list_value );

    // Content
    $content_value = esc_attr( $instance['view'] );
    $content_field = array(
      'id'    => $this->get_field_name('view'),
      'name'  => $this->get_field_name('view'),
      'type'  => 'radio',
      'options'      => array(
          'with bg'    => 'With background Image',
          'without bg'    => 'Without background Image',
        ),
        'default'      => 'with bg',
        'radio'      => true,
      'title' => esc_html__( 'Select Category display view :', 'signy-core' ),
    );
    echo cs_add_element( $content_field, $content_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['title']        = strip_tags( stripslashes( $new_instance['title'] ) );
    $instance['category_list']      = strip_tags( stripslashes( $new_instance['category_list'] ) );
    $instance['view']    = strip_tags( stripslashes( $new_instance['view'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );
    $title          = apply_filters( 'widget_title', $instance['title'] );
    $category_list = apply_filters( 'widget_title', $instance['category_list'] );
    $view       = $instance['view'];

    // Display the markup before the widget
    echo $before_widget;

    if ( $title ) {
      echo $before_title . $title . $after_title;
    }

    if ( $category_list ) { ?>

        <a href="" class="sgny-single_widge_popu_post">
          <?php
              $term = get_category_by_slug($category_list);
              $term_data = get_term_meta( $term->term_id, 'signy_category_tax_options', true );
              $cat_image = $term_data['post_category_image'];
              $values = explode( ',', $category_list);
              $terms = $values;
              $count = count($terms);
                 if ($count > 0) {
                      foreach ( $values as $value ) {
                        if($view == 'with bg') {
                        if($cat_image) {
                            echo '<img src="'.wp_get_attachment_url($cat_image).'">';
                        } }?>
                        <div class="text-center sgny-popu_post-caption">
                          <span><?php echo esc_attr($value); ?></span>
                        </div>
                 <?php } }
          ?>
        </a>
     <?php
    }
    // Display the markup after the widget
    echo $after_widget;
  }
}

// Register the widget using an annonymous function
function sgny_popular_posts_widget_function() {
  register_widget( "sgny_popular_posts_widget" );
}
add_action( 'widgets_init', 'sgny_popular_posts_widget_function' );
