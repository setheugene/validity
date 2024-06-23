<?php
/**
* Custom Framework
* -----------------------------------------------------------------------------
*
* Any functionality related to how the theme operates
*/


/**
 * Include a component file.
 *
 * @param  string $component_name The name of the component file (minus the extension)
 * @param  array  $component_data All data being passed to the component
 * @param  array  $component_args Any arguments used to alter the display of the component
 * @return void
 */
function ll_include_component( $component_name, $component_data = array(), $component_args = array(), $buffer = false ) {

  if ( empty( $component_name ) )
    return false;

  /**
   * A full list of template files to check for when looking to include the component.
   * {$component_name}_files hook (Filter)
   *
   * @var array
   */
  $files = apply_filters(
    "{$component_name}_files",
    array(
      "components/{$component_name}/{$component_name}.php",
      "templates/partials/{$component_name}.php",
      "templates/contents/{$component_name}.php",
      "templates/components/{$component_name}.php"
    ),
    $component_data,
    $component_args
  );

  /**
   * {$component_name}_pre_load hook
   * Type: Action
   */
  do_action( "{$component_name}_pre_load", $component_data, $component_args );

  $template = locate_template( $files );

  if ( $template ) {

    if ( $buffer )
      ob_start();

    include( $template );

    if ( $buffer )
      return ob_get_clean();
  }
  else {
    wp_die( "Couldn't find the component {$component_name}. Make sure a template file exists." );
  }
}

/**
 * Runs get_template_part but returns the content rather than outputting it, so that
 * it can be saved as a variable.
 * @param  string $slug first part of the file path
 * @param  string $name last part of the file path
 * @return string  html output of the requested template part
 */
function return_get_template_part($slug, $name=null) {

  ob_start();
  get_template_part($slug, $name);
  $content = ob_get_contents();
  ob_end_clean();

  return $content;
}

// removes the component name from the parameter that will get passed to component
function ll_format_component_data( $component_name, $data ) {
  $new_data = [];

  foreach ( $data as $key => $item ) {

    $pos = strpos($key, $component_name . '_');
    if ($pos !== false) {
      $new_key = substr_replace($key, '', $pos, strlen($component_name . '_'));
      $new_data[$new_key] = $item;
    }
  }

  return $new_data;
}

// Tell WordPress to use form-search.php from the templates/ directory
function roots_get_search_form($form) {
  $form = '';
  locate_template('/templates/partials/form-search.php', true, false);
  return $form;
}
add_filter('get_search_form', 'roots_get_search_form');

/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');
