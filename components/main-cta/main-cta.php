<?php
/**
* Main CTA
* -----------------------------------------------------------------------------
*
* Main CTA component
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
  'content'           => null,
  'image_id'          => null,
  'image_focus_point' => null,
  'layout'            => 'content-image'
];

$component_data = ll_parse_args( $component_data, $defaults );

$background_color = $component_data['background_color'] ?? '';
$image = $component_data['image'] ?? '';
$component_options = $component_data['options'] ?? '';
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="main-cta relative overflow-hidden <?php echo $background_color; ?> <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="main-cta">
  <div class="image-wrapper <?php echo $component_data['layout']; ?>">
    <?php if( $component_options === 'image' ) : ?>
      <?php
        ll_include_component(
          'fit-image',
          [
            'image_id'            => $image['image_id'],
            'thumbnail_size'      => 'full',
            'position' => isset( $image['image_focus_point'] ) ? $image['image_focus_point'] : null,
            'fit' =>  isset( $image['image_fit'] ) ? $image['image_fit'] : null,
            'loading' => isset( $image['image_loading'] ) ? $image['image_loading'] : null
          ]
        );
      ?>
    <?php else : ?>
      <lottie-player class="<?php echo $component_data['layout']; ?>" src="<?php echo get_template_directory_uri(); ?>/assets/img/lottie/bouncing-circles.json" speed="1" autoplay loop></lottie-player>
    <?php endif; ?>
  </div>
  <div class="alignment-container">
    <div class="container">
      <div class="justify-center row">
        <div class="w-full col xl:w-10/12">
          <div class="items-center row <?php echo $component_data['layout'] == 'image-content' ? 'justify-end' : ''; ?>">
            <div class="order-2 w-full col lg:w-2/5">
              <div class="py-12 wysiwyg lg:py-24 js-fade">
                <?php echo $component_data['content']; ?>
              </div>
            </div>
            <div class="col w-full lg:w-1/2 order-1 <?php echo $component_data['layout'] == 'image-content' ? 'lg:order-1' : 'lg:order-2'; ?>"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
