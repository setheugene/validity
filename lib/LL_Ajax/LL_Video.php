<?php
  class LL_CPTVideo {
  public static function ll_filter_videos( $request ) {
    $params = $request->get_params();

    $params['category'] = $params['category'] ?? 'all';
    $params['page']       = $params['page'] ?? 1;

    $args = [
      'post_type' => 'll_videos',
      'post_status' => 'publish',
      'posts_per_page' => 16,
      'paged' => max( 1, $params['page'] ),
      'orderby' => 'menu_order',
      'order' => 'ASC',
    ];

    if( $params['category'] && $params['category'][0] !== 'all') {
      $args['tax_query'] = [
        [
          'taxonomy' => 'll_video_category',
          'field'    => 'id',
          'terms'    => $params['category'],
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

    $video_cards = [];
    foreach( $videos as $video ) :
      $video_cards[] = ll_include_component(
        'video-card',
        array(
          'title' => $video['title'],
          'image_id' => $video['image_id'],
          'video_url' => $video['video_url'],
        ),
        [],
        true
      );
    endforeach;

    $maxPages = ceil($total_videos / 16);

    $pagination =     ll_include_component(
      'pagination-links',
      array(
        'page'      => $params['page'],
        'max_pages' => $maxPages,
        'ppp'       => 16,
      ),
      [],
      true
    );

    $response = [
      'category' => $params['category'] ?? 'all',
      'videoCards' => $video_cards,
      'page' => $params['page'] ?? 1,
      'pagination' => $pagination ?? '',
    ];
    wp_reset_query();
    return new WP_REST_Response( $response, 200 );
  }
}
