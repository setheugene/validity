<?php
/**
* Video Grid
* -----------------------------------------------------------------------------
*
* Video Grid component
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
  'args' => [],
];

$component_data = ll_parse_args( $component_data, $defaults );

$videos_posts = get_posts( $component_data['args'] );

$videos = [];
if( !empty( $videos_posts ) ) :
  foreach( $videos_posts as $key => $video ) :
    $videos[$key]['video_url'] = get_field('video_url', $video->ID) ?? '';
    $videos[$key]['title'] = get_field('video_title', $video->ID) != '' ? get_field('video_title', $video->ID) : get_the_title($video->ID);
    $videos[$key]['image_id'] = get_post_thumbnail_id( $video->ID );
  endforeach;
endif;

?>

<div id="video-archive__video-grid" class="grid grid-cols-2 gap-8 pt-10 md:grid-cols-4">
  <?php foreach( $videos as $video ) : ?>
    <?php
      ll_include_component(
        'video-card',
        array(
          'title' => $video['title'],
          'image_id' => $video['image_id'],
          'video_url' => $video['video_url'],
        )
      );
    ?>
  <?php endforeach; ?>
</div>
