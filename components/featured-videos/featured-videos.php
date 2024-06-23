<?php
/**
* Featured Videos
* -----------------------------------------------------------------------------
*
* Featured Videos component
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

$top_spacing = $component_data['global_spacing_options']['top_spacing'] ?? '';
$bottom_spacing = $component_data['global_spacing_options']['bottom_spacing'] ?? '';
$heading = $component_data['heading'];
$description = $component_data['description'] ?? '';
$link = $component_data['link'] ?? [];
$selected_videos = $component_data['videos'] ?? [];

$videos = [];
if( !empty( $selected_videos ) ) :
  foreach( $selected_videos as $key => $video_id ) :
    $videos[$key]['video_url'] = get_field('video_url', $video_id) ?? '';
    $videos[$key]['title'] = get_field('video_title', $video_id) != '' ? get_field('video_title', $video_id) : get_the_title($video_id);
    $videos[$key]['image_id'] = get_post_thumbnail_id( $video_id );
  endforeach;
endif;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="featured-videos <?php echo $top_spacing; ?> <?php echo $bottom_spacing; ?> bg-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="featured-videos">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col xl:w-5/6 js-fade">
        <div class="row">
          <div class="col w-full lg:w-[80%]">
            <?php if( $heading && $heading['text']) : ?>
              <<?php echo $heading['tag']; ?> class='hdg-3 text-brand-off-black'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
            <?php endif; ?>
            <?php if( $description != '' ) : ?>
              <div class="mt-3 wysiwyg paragraph-small text-brand-gray">
                <?php echo $description; ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="col w-full lg:w-[20%] flex lg:justify-end lg:items-end">
            <?php if ( !empty( $link ) ) : ?>
              <a class="primary-btn green" href="<?php echo $link['url']; ?>" <?php echo $link['target'] ? 'target="' . $link['target'] . '"' : '' ?>>
                <span class="circle"><svg class="right-arrow-btn-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path class="right" d="M13.0728 8.56973C13.3031 8.33937 13.3031 7.96813 13.0728 7.75053L7.91436 2.59213C7.65839 2.33615 7.24874 2.33615 6.99276 2.59213C6.73679 2.84811 6.73679 3.25775 6.99276 3.51373L11.2296 7.75053C11.4599 7.98088 11.4599 8.35213 11.2296 8.56973L6.99276 12.8065C6.73679 13.0625 6.73679 13.4721 6.99276 13.7281C7.24874 13.9841 7.65839 13.9841 7.91436 13.7281L13.0728 8.56973Z" fill="white"></path><path class="line" d="M12 8.10022L2 8.10022" stroke="white" stroke-linecap="round"></path></g></svg></span>
                <span class="btn-title">
                  <?php echo $link['title']; ?>
                </span>
                <?php if($link['target'] === '_blank') : ?>
                  <span class="sr-only"> (opens in new tab)</span>
                <?php endif; ?>
              </a>
            <?php endif; ?>
          </div>
          <div class="w-full mt-5 col">
            <svg width="100%" height="2" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="draw-in-line" d="M1 1H971" stroke="#80A399" stroke-linecap="round"/>
            </svg>
          </div>
        </div>
        <div id="featured-videos__video-grid" class="grid grid-cols-1 gap-[38px] pt-10 md:grid-cols-3">
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
    </div>
  </div>
</section>
