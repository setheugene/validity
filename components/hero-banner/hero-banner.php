<?php
/**
* Hero Banner
* -----------------------------------------------------------------------------
*
* Hero Banner component
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
$component_id = ( isset( $component_args['id'] ) ? $component_args['id'] : false );
?>

<?php
$defaults = [
  'heading' => array(
    'tag'  => 'h2',
    'text' => null
  ),
  'image_id' => null,
  'image_focus_point' => null,
];

$component_data      = ll_parse_args( $component_data, $defaults );

$heading = $component_data['heading'] ?? '';
$content = $component_data['content'] ?? '';
$looping_video_url = $component_data['loop_video_url'] ?? '';
$image_id = $component_data['image_id'] ?? '';
$image_focus_point = $component_data['image_focus_point'] ?? '';
$image_loading = $component_data['image_loading'] ?? '';
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="hero-banner relative flex justify-center items-center pt-10 pb-12 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="hero-banner">
  <div class="hero-banner__background">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bottom-curve-light-green-4.svg" alt="light green curve background graphic">
  </div>
  <div class="container relative z-10">
    <div class="justify-center row">
      <div class="w-full mb-10 text-center col lg:w-5/6 text-brand-deep-green js-fade">
        <?php if( $heading && $heading['text']) : ?>
          <<?php echo $heading['tag']; ?> class='mb-4 hdg-6'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
        <?php endif; ?>
        <div class="wysiwyg">
          <?php echo $content; ?>
        </div>
      </div>
    </div>
    <div class="justify-center row">
      <div class="w-full col lg:w-5/6">
        <div class="relative aspect-5/3">
          <?php if($looping_video_url) : ?>
            <?php
              ll_include_component(
                'loop-video',
                array(
                  'video' => $looping_video_url,
                  'display' => 'desktop',
                  'image_id' => $image_id,
                  'thumbnail_size' => 'full',
                  'position' => $image_focus_point,
                  'loading' => $image_loading,
                )
              );
          ?>
          <?php else : ?>
            <?php
              ll_include_component(
                'fit-image',
                array(
                  'image_id' => $image_id,
                  'thumbnail_size' => 'full',
                  'position' => $image_focus_point,
                  'fit' =>  $component_data['image_fit'],
                  'loading' => $image_loading
                )
              );
            ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
