<?php
/**
* Service Hero
* -----------------------------------------------------------------------------
*
* Service Hero component
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

$subtitle = $component_data['subtitle']['heading'] ?? '';
$content = $component_data['content'] ?? '';
$animation = $component_data['animation'] ?? '';
$link = $component_data['link'] ?? '';
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="service-hero bg-brand-light-green-4 pt-8 pb-11 flex items-center lg:py-10 text-brand-deep-green <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="service-hero">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col lg:w-5/6">
        <div class="row">
          <div class="col w-full lg:w-[60%] js-fade order-2 lg:order-1">
            <?php if( $subtitle && $subtitle['text']) : ?>
              <<?php echo $subtitle['tag']; ?> class='mb-4 hdg-6 subtitle-line'><?php echo $subtitle['text']; ?></<?php echo $subtitle['tag']; ?>>
            <?php endif; ?>
            <div class="wysiwyg">
              <?php echo $content; ?>
            </div>
          </div>
          <div class="col w-full lg:w-[40%] order-1 lg:order-2 mb-8 lg:mb-0">
            <lottie-player src="<?php echo get_template_directory_uri(); ?>/assets/img/lottie/<?php echo $animation; ?>.json" background="transparent" speed="2" autoplay></lottie-player>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
