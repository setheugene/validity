<?php
/**
* Video Archive
* -----------------------------------------------------------------------------
*
* Video Archive component
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
  'category' => ['all'],
  'page'      => 1,
  'max_pages' => 1,
  'ppp'       => 16,
];

$component_data = ll_parse_args( $component_data, $defaults );

$args = [
  'post_type' => 'll_videos',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'paged' => 1,
  'orderby' => 'menu_order',
  'order' => 'ASC',
];

if( $component_data['category'][0] && $component_data['category'][0] != 'all') {
  $args['tax_query'] = [
    [
      'taxonomy' => 'll_video_category',
      'field'    => 'id',
      'terms'    => $component_data['category'],
    ]
  ];
}
$video_query = new WP_Query($args);
$videos_posts = $video_query->posts;
$total_videos = $video_query->found_posts;

$videos = [];
if( !empty( $videos_posts ) ) :
  foreach( $videos_posts as $key => $video ) :
    $videos[$key]['video_url'] = get_field('video_url', $video->ID) ?? '';
    $videos[$key]['title'] = get_field('video_title', $video->ID) != '' ? get_field('video_title', $video->ID) : get_the_title($video->ID);
    $videos[$key]['image_id'] = get_post_thumbnail_id( $video->ID );
  endforeach;
endif;

$component_data['max_pages'] = ceil($total_videos / $component_data['ppp']);

// manual paged/offset
$videos = array_slice($videos, ( ( $component_data['page'] - 1 ) * $component_data['ppp'] ));

// manual posts per page
$videos = array_slice($videos, 0, $component_data['ppp']);
?>
<?php
  ll_include_component(
    'video-archive-filter',
    [
      'category' => $component_data['category'],
    ],
  );
?>
<section class="video-archive <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="video-archive">
  <div id="video__ajax-container" class="container pb-12 bg-white">
    <div id="video-archive__video-grid" class="grid grid-cols-2 gap-8 pt-10 duration-200 md:grid-cols-4">
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
  </div>
  <div id="video-archive__pagination">
    <?php
      ll_include_component(
        'pagination-links',
        array(
          'page'      => 1,
          'max_pages' => $component_data['max_pages'],
          'ppp'       => 16,
        )
      );
    ?>
  </div>
</section>
<?php wp_reset_query(); ?>
