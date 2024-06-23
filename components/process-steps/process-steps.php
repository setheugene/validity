<?php
/**
* Process Steps
* -----------------------------------------------------------------------------
*
* Process Steps component
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

$top_spacing = $component_data['global_spacing_options']['top_spacing'] ?? '';
$bottom_spacing = $component_data['global_spacing_options']['bottom_spacing'] ?? '';
$heading = $component_data['heading'];

$steps = [];
if( !empty( $component_data['steps'] ) ) :
  foreach( $component_data['steps'] as $key => $step ) :
    $steps[$key]['title'] = $step['title'] ?? '';
    $steps[$key]['description'] = $step['description'] ?? '';
  endforeach;
endif;

$defaults = [
];

$component_data = ll_parse_args( $component_data, $defaults );
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="process-steps <?php echo $top_spacing; ?> <?php echo $bottom_spacing; ?> bg-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="process-steps">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col lg:w-5/6 xl:w-2/3">
        <div class="w-full lg:w-[62.5%] mb-5">
          <?php if( $heading && $heading['text']) : ?>
            <<?php echo $heading['tag']; ?> class='js-fade hdg-2 text-brand-off-black'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
          <?php endif; ?>
        </div>
        <?php if( !empty($steps) ) : ?>
          <?php foreach( $steps as $key => $step ) : ?>
            <div class="relative pt-10 process-steps__step-row row first:mt-0">
              <div class="process-steps__circle-wrapper">
                <div class="w-10 h-10 rounded-full bg-brand-light-green-4 animated-circle"></div>
                <div class="absolute top-0 w-4 h-4 rounded-full -left-2 bg-brand-light-green-2 animated-circle"></div>
              </div>
              <div class="w-full pb-10 col">
                <svg width="100%" height="2" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path class="draw-in-line" d="M1 1H971" stroke="#80A399" stroke-linecap="round"/>
                </svg>
              </div>
              <div class="col w-full lg:w-[30%] mb-4 lg:mb-0 relative z-10">
                <h4 class="text-brand-off-black hdg-4">
                  <?php echo $step['title']; ?>
                </h4>
              </div>
              <div class="col w-full lg:w-[70%]">
                <p class="text-brand-gray paragraph-default">
                  <?php echo $step['description']; ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
