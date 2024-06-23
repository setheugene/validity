<?php
/**
* Left Right
* -----------------------------------------------------------------------------
*
* Left Right component
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
  'content'           => '',
  'image_id'          => null,
  'image_focus_point' => null,
  'image_fit'         => null,
  'image_loading'     => null,
  'layout'            => 'content-image',
  'vertical_spacing'    => null,
];

$component_data = ll_parse_args( $component_data, $defaults );

$layout = $component_data['layout'] ?? '';
$top_spacing = $component_data['global_spacing_options']['top_spacing'] ?? '';
$bottom_spacing = $component_data['global_spacing_options']['bottom_spacing'] ?? '';
$content = $component_data['content'] ?? '';

$image_col_order = 'lg:order-1';
if ( $layout == 'content-image' ) {
  $image_col_order = 'lg:order-2';
}

$content_col_order = 'lg:order-1';
if ( $layout == 'image-content' ) {
  $content_col_order = 'lg:order-2';
}

$justify_content = $layout === 'content-image' ? 'lg:justify-end' : '';
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="left-right relative overflow-hidden animated-circles <?php echo $top_spacing; ?> <?php echo $bottom_spacing; ?> bg-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="left-right">
  <div class="container relative z-10">
    <div class="items-center row">
      <div class="col w-full order-2 lg:w-1/2 <?php echo $content_col_order; ?>">
        <div class="row <?php echo $justify_content; ?>">
          <div class="w-full col lg:w-5/6">
            <div class="wysiwyg js-fade">
              <?php echo $content; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col w-full order-1 mb-10 lg:mb-0 lg:w-1/2 <?php echo $image_col_order; ?> <?php echo $layout; ?>">
        <div class="justify-center row">
          <div class="w-full pt-6 pb-8 lg:w-2/3 col">
            <?php if ( $component_data['image_id'] != '' ) : ?>
              <div class="relative aspect-square">
                <?php
                  ll_include_component(
                    'fit-image',
                    [
                      'image_id'            => $component_data['image_id'],
                      'thumbnail_size'      => 'large',
                      'position'            => $component_data['image_focus_point'],
                      'fit'                 => $component_data['image_fit'],
                      'loading'             => $component_data['image_loading'],
                    ]
                  );
                ?>
                <div class="float left-right__circle-wrapper small">
                  <div class="left-right__circle animated-circle"></div>
                </div>
                <div class="left-right__circle-wrapper medium float-reverse">
                  <div class="left-right__circle animated-circle"></div>
                </div>
                <div class="left-right__circle-wrapper large float">
                  <div class="left-right__circle animated-circle"></div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
