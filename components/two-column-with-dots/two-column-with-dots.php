<?php
/**
* Two Column with Dots
* -----------------------------------------------------------------------------
*
* Two Column with Dots component
*/

/**
 * Any additional classes to apply to the main component container.
 *
 * @var array
 * @see args['classes']
 */
$classes = ( isset( $component_args['classes'] ) ? $component_args['classes'] : array() );

/**
 * ID to apply to the main component container.
 *
 * @var array
 * @see args['id']
 */
$component_id   = ( isset( $component_args['id'] ) ? $component_args['id'] : false );
?>

<?php
$defaults = [
];

$component_data = ll_parse_args( $component_data, $defaults );

$top_spacing = $component_data['global_spacing_options']['top_spacing'] ?? '';
$bottom_spacing = $component_data['global_spacing_options']['bottom_spacing'] ?? '';
$heading = $component_data['heading'];
$left_content = $component_data['left'] ?? '';
$right_content = $component_data['right'] ?? '';

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="two-column-with-dots animated-circles overflow-hidden <?php echo $top_spacing; ?> <?php echo $bottom_spacing; ?> bg-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="two-column-with-dots">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col xl:w-5/6">
        <div class="items-end row">
          <div class="col w-full lg:w-[60%] js-fade">
            <?php if( $heading && $heading['text']) : ?>
              <<?php echo $heading['tag']; ?> class='mb-5 hdg-1'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
            <?php endif; ?>
          </div>
          <div class="col w-full lg:w-[40%] bg-white relative lg:pt-0 pt-[210px] min-h-[200px]">
            <div class="tcwd__circle-position large">
              <div class="tcwd__circle animated-circle"></div>
            </div>
            <div class="float-reverse tcwd__circle-position medium">
              <div class="tcwd__circle animated-circle"></div>
            </div>
            <div class="float tcwd__circle-position small">
              <div class="tcwd__circle animated-circle"></div>
            </div>
          </div>
          <div class="w-full col">
            <svg width="100%" height="2" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="draw-in-line" d="M1 1H971" stroke="#80A399" stroke-linecap="round"/>
            </svg>
          </div>
        </div>
        <div class="relative z-10 pt-10 bg-white row tcwd__lower-row">
          <div class="col w-full lg:w-[60%] mb-5 lg:mb-0 js-fade">
            <div class="wysiwyg">
              <?php echo $left_content; ?>
            </div>
          </div>
          <div class="col w-full lg:w-[40%] js-fade">
            <div class="wysiwyg">
              <?php echo $right_content; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
