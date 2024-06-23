<?php
/**
* Featured Blogs
* -----------------------------------------------------------------------------
*
* Featured Blogs component
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

$args = array(
  'post_type'       => 'post',
  'post_status'     => 'publish',
  'orderby'         => 'date',
  'order'           => 'DESC',
  'posts_per_page'  => 3,
  'field'           => 'ids'
);


if ( !empty($component_data['posts']) ) {
  $args['post__in']         = $component_data['posts'];
  $args['orderby']          = 'post__in';
  $args['posts_per_page']   = -1;
}

$blog_post_ids = get_posts( $args );

$posts_data = [];

if( !empty( $blog_post_ids ) ) :
  foreach( $blog_post_ids as $key => $blog_post_id ) :
    $posts_data[$key]['title'] = get_the_title($blog_post_id) ?? '';
    $posts_data[$key]['image_id'] = get_post_thumbnail_id( $blog_post_id ) ?? '';
    $posts_data[$key]['permalink'] = get_the_permalink( $blog_post_id ) ?? '';
  endforeach;
endif;

$top_spacing = $component_data['global_spacing_options']['top_spacing'] ?? '';
$bottom_spacing = $component_data['global_spacing_options']['bottom_spacing'] ?? '';
$heading = $component_data['heading'];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="featured-blogs <?php echo $top_spacing; ?> <?php echo $bottom_spacing; ?> bg-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="featured-blogs">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col xl:w-5/6">
        <div class="lg:items-center row">
          <div class="w-full mb-1 col lg:w-1/2 lg:mb-0">
            <?php if( $heading && $heading['text']) : ?>
              <<?php echo $heading['tag']; ?> class='hdg-3 text-brand-off-black'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
            <?php endif; ?>
          </div>
          <div class="flex w-full lg:justify-end col lg:w-1/2">
            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?? ''; ?>" class="primary-btn green">
              <span class="circle">
                <svg class="right-arrow-btn-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path class="right" d="M13.0728 8.56973C13.3031 8.33937 13.3031 7.96813 13.0728 7.75053L7.91436 2.59213C7.65839 2.33615 7.24874 2.33615 6.99276 2.59213C6.73679 2.84811 6.73679 3.25775 6.99276 3.51373L11.2296 7.75053C11.4599 7.98088 11.4599 8.35213 11.2296 8.56973L6.99276 12.8065C6.73679 13.0625 6.73679 13.4721 6.99276 13.7281C7.24874 13.9841 7.65839 13.9841 7.91436 13.7281L13.0728 8.56973Z" fill="white"></path><path class="line" d="M12 8.10022L2 8.10022" stroke="white" stroke-linecap="round"></path></g></svg>
              </span>
              <span class="btn-title">All Posts</span>
            </a>
          </div>
          <div class="w-full mt-5 mb-10 col">
            <svg width="100%" height="2" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="draw-in-line" d="M1 1H971" stroke="#80A399" stroke-linecap="round"/>
            </svg>
          </div>
        </div>
        <div class="row">
          <div class="col w-full lg:w-[60%] mb-8 lg:mb-0">
            <?php if( !empty($posts_data[0]) ) : ?>
              <a class="relative block overflow-hidden related-blog__card large" href="<?php echo $posts_data[0]['permalink']; ?>">
                <div class="relative aspect-large-featured-blog">
                  <div class="fit-image">
                    <?php echo wp_get_attachment_image( $posts_data[0]['image_id'], 'large', "", array( "class" => "" ) ); ?>
                  </div>
                  <div class="absolute w-[70%] z-40 bottom-5 left-5 paragraph-large text-brand-off-black">
                    <div class="relative w-full p-5 bg-white rounded-md">
                      <?php echo $posts_data[0]['title']; ?>
                      <div class="z-40 related-blog__card-text-hover">
                        View Post
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            <?php endif; ?>
          </div>
          <div class="col w-full lg:w-[40%]">
            <div class="flex flex-col gap-8">
              <?php if( !empty($posts_data[1]) ) : ?>
                <a class="relative block overflow-hidden related-blog__card" href="<?php echo $posts_data[1]['permalink']; ?>">
                  <div class="relative aspect-5/3">
                    <div class="fit-image">
                      <?php echo wp_get_attachment_image( $posts_data[1]['image_id'], 'large', "", array( "class" => "" ) ); ?>
                    </div>
                    <div class="absolute w-[70%] z-40 bottom-5 left-5 paragraph-large text-brand-off-black">
                    <div class="relative w-full p-5 bg-white rounded-md">
                      <?php echo $posts_data[1]['title']; ?>
                      <div class="z-40 related-blog__card-text-hover">
                        View Post
                      </div>
                    </div>
                  </div>
                  </div>
                </a>
              <?php endif; ?>
              <?php if( !empty($posts_data[2]) ) : ?>
                <a class="relative block overflow-hidden related-blog__card" href="<?php echo $posts_data[2]['permalink']; ?>">
                  <div class="relative aspect-5/3">
                    <div class="fit-image">
                      <?php echo wp_get_attachment_image( $posts_data[2]['image_id'], 'large', "", array( "class" => "" ) ); ?>
                    </div>
                    <div class="absolute w-[70%] z-40 bottom-5 left-5 paragraph-large text-brand-off-black">
                    <div class="relative w-full p-5 bg-white rounded-md">
                      <?php echo $posts_data[2]['title']; ?>
                      <div class="z-40 related-blog__card-text-hover">
                        View Post
                      </div>
                    </div>
                  </div>
                  </div>
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
