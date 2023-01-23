<?php
/*
 * Add Extra Field for WordPress Widgets
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Add Fields for All WordPress Default Widgets
function signy_in_widget_form($t,$return,$instance){
  $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'sgny_custom_class' => '') );
  if ( !isset($instance['sgny_custom_class']) )
    $instance['sgny_custom_class'] = null;
  ?>
  <p class="sgny-widget-field cs-element">
    <label for="<?php echo esc_attr($t->get_field_id('sgny_custom_class')); ?>"><?php esc_html_e('Custom Class:', 'signy-core'); ?></label>
    <input class="widefat" type="text" name="<?php echo esc_attr($t->get_field_name('sgny_custom_class')); ?>" id="<?php echo esc_attr($t->get_field_id('sgny_custom_class')); ?>" value="<?php echo esc_attr($instance['sgny_custom_class']);?>" />
    <span class="cs-text-desc"><?php echo esc_html__('Add your custom classes.', 'signy-core'); ?></span>
    <div class="clear"></div>
  </p>
  <?php
  $retrun = null;
  return array($t,$return,$instance);
}
add_action('in_widget_form', 'signy_in_widget_form',5,3);

// Update Fields Data
function signy_in_widget_form_update($instance, $new_instance, $old_instance){
  $instance['sgny_custom_class'] = strip_tags($new_instance['sgny_custom_class']);
  return $instance;
}
add_filter('widget_update_callback', 'signy_in_widget_form_update',5,3);

// Display Fields Output
function signy_dynamic_sidebar_params($params){
  global $wp_registered_widgets;
  $widget_id = $params[0]['widget_id'];
  $widget_obj = $wp_registered_widgets[$widget_id];
  $widget_opt = get_option($widget_obj['callback'][0]->option_name);
  $widget_num = $widget_obj['params'][0]['number'];
  if(isset($widget_opt[$widget_num]['sgny_custom_class'])) {
    $sgny_custom_class = $widget_opt[$widget_num]['sgny_custom_class'];
  } else {
    $sgny_custom_class = '';
  }
  $params[0]['before_widget'] = preg_replace('/class="/', 'class="'.$sgny_custom_class.' ',  $params[0]['before_widget'], 1);
  return $params;
}
add_filter('dynamic_sidebar_params', 'signy_dynamic_sidebar_params');
