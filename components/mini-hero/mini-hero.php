<?php
/**
* Mini Hero
* -----------------------------------------------------------------------------
*
* Mini Hero component
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
$title = $component_data['title']['heading'] ?? '';
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="mini-hero pt-11 relative <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="mini-hero">
  <div class="mini-hero__background">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bottom-curve-light-green-4.svg" alt="light green curve background graphic">
  </div>
  <div class="container pb-16">
    <div class="justify-center row js-fade-group">
      <div class="w-full text-center col lg:w-10/12 xl:w-8/12 text-brand-deep-green">
        <?php if( $subtitle && $subtitle['text']) : ?>
          <<?php echo $subtitle['tag']; ?> class='mb-3 hdg-6'><?php echo $subtitle['text']; ?></<?php echo $subtitle['tag']; ?>>
        <?php endif; ?>
        <?php if( $title && $title['text']) : ?>
          <<?php echo $title['tag']; ?> class='hdg-1'><?php echo $title['text']; ?></<?php echo $title['tag']; ?>>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
