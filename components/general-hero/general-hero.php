<?php
/**
* General Hero
* -----------------------------------------------------------------------------
*
* General Hero component
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
$image = $component_data['image'] ?? '';
$link = $component_data['link'] ?? '';
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="general-hero bg-brand-light-green-4 flex items-center overflow-hidden <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="general-hero">
  <div class="container relative z-10">
    <div class="general-hero__top-bg-circle"></div>
    <div class="relative z-20 justify-end row">
      <div class="w-full col xl:w-11/12 js-fade text-brand-deep-green">
        <div class="row">
          <div class="col w-full lg:w-[63.63%] order-2 lg:order-1">
            <?php if( $subtitle && $subtitle['text']) : ?>
              <<?php echo $subtitle['tag']; ?> class='mb-4 hdg-6 subtitle-line'><?php echo $subtitle['text']; ?></<?php echo $subtitle['tag']; ?>>
            <?php endif; ?>
            <?php if( $title && $title['text']) : ?>
              <<?php echo $title['tag']; ?> class='hdg-hero'><?php echo $title['text']; ?></<?php echo $title['tag']; ?>>
            <?php endif; ?>
          </div>
          <div class="col ml-auto w-[44.36%] lg:w-[27.36%] lg:pt-8 order-1 lg:order-2 mb-8 lg:mb-0">
            <div class="relative overflow-hidden rounded-full aspect-square">
              <?php
                ll_include_component(
                  'fit-image',
                  array(
                    'image_id' => $image['image_id'],
                    'thumbnail_size' => 'full',
                    'position' => $image['image_focus_point'],
                    'fit' =>  $image['image_fit'],
                    'loading' => $image['image_loading']
                  )
                );
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="general-hero__bottom-bg-circle"></div>
    <div class="relative z-30 justify-end mt-8 lg:-mt-10 row">
      <div class="col lg:w-5/12">
        <?php if ( $link ) : ?>
          <a id="general-hero__button" class="text-brand-off-black paragraph-large" href="<?php echo $link['url']; ?>" <?php echo $link['target'] ? 'target="' . $link['target'] . '"' : '' ?>>
            <?php echo $link['title']; ?>
            <?php if($link['target'] === '_blank') : ?>
              <span class="sr-only"> (opens in new tab)</span>
            <?php endif; ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
