<?php
/**
* Video Card
* -----------------------------------------------------------------------------
*
* Video Card component
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
  'video_url' => '',
  'image_id' => '',
  'title' => '',
];

$component_data = ll_parse_args( $component_data, $defaults );
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<article class="video-card relative overflow-hidden <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="video-card">
  <a href="<?php echo $component_data['video_url']; ?>" class="js-init-video">
    <div class="relative overflow-hidden post__image-wrapper aspect-16/9">
      <?php
        ll_include_component(
          'fit-image',
          array(
            'image_id' => $component_data['image_id'],
            'position' => 'object-center'
          )
        );
      ?>
      <div class="absolute inset-0 z-10 flex flex-col items-center justify-center w-full h-full video-card__hover">
        <svg class='relative z-10 w-8 h-8 icon icon-play-video'><use xlink:href='#icon-play-video'></use></svg>
        <span class="relative z-10 mt-2 font-semibold text-center text-white hover-text paragraph-default">Watch Video</span>
        <div class="sr-only">about <?php echo $component_data['title']; ?></div>
      </div>
    </div>
    <div class="py-2">
      <h2 class="paragraph-default text-brand-off-black">
        <?php echo $component_data['title']; ?>
      </h2>
    </div>
  </a>
</article>
