<?php
/**
* Report
* -----------------------------------------------------------------------------
*
* Report component
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

$top_spacing = $component_data['top_spacing'] ?? '';
$bottom_spacing = $component_data['bottom_spacing'] ?? '';
$content = $component_data['content'] ?? '';
$image = $component_data['image'] ?? '';
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="report <?php echo $top_spacing; ?> <?php echo $bottom_spacing; ?> bg-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="report">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col md:w-5/6">
        <?php if( $content != '' ) : ?>
          <div class="mb-4 wysiwyg js-fade">
            <?php echo $content; ?>
          </div>
        <?php endif; ?>
        <div class="relative p-3 report-image lg:p-11">
          <div class="absolute inset-0 w-full h-full">
            <svg width="100%" height="100%" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect class="report__border" x="0.466102" y="0.466102" width="99%" height="99%" rx="12.5847" fill="none" stroke="#80A399" stroke-width="0.932203"/>
            </svg>
          </div>
          <?php echo wp_get_attachment_image( $image, 'large', "", array( "class" => "w-full" ) ); ?>
        </div>
      </div>
    </div>
  </div>
</section>
