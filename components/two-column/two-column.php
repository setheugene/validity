<?php
/**
* Two Column
* -----------------------------------------------------------------------------
*
* Two Column component
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
$columns = $component_data['columns'] ?? [];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="two-column <?php echo $top_spacing; ?> <?php echo $bottom_spacing; ?> bg-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="two-column">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col lg:w-5/6">
        <?php if( $heading && $heading['text']) : ?>
          <<?php echo $heading['tag']; ?> class='mb-5 js-fade hdg-3 text-brand-off-black'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
        <?php endif; ?>
        <div class="w-full mb-10">
          <svg width="100%" height="2" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="draw-in-line" d="M1 1H971" stroke="#80A399" stroke-linecap="round"/>
          </svg>
        </div>
        <?php if( !empty( $columns ) ) : ?>
          <div class="grid grid-cols-1 gap-8 md:grid-cols-2 js-fade">
            <?php foreach( $columns as $column ) : ?>
              <div class="flex flex-col">
                <div class="mb-3 font-semibold paragraph-default text-brand-off-black">
                  <?php echo $column['title'] ?? ''; ?>
                </div>
                <div class="text-brand-gray paragraph-default">
                  <?php echo $column['description'] ?? ''; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
