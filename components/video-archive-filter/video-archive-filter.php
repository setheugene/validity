<?php
/**
* Video Archive Filter
* -----------------------------------------------------------------------------
*
* Video Archive Filter component
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
];

$component_data = ll_parse_args( $component_data, $defaults );

$video_categories = [];
$video_categories = get_terms( array(
  'taxonomy'   => 'll_video_category',
  'hide_empty' => true,
) );

?>

<section class="video-archive-filter pt-10 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="video-archive-filter">
  <div class="container">
    <button class="flex items-end justify-between w-full pb-3 mb-3 border-b border-black blog__sidebar-toggle lg:hidden hdg-4" data-toggle-target-next data-toggle-class="is-open" aria-expanded="false">Filter Videos <svg class="text-xl icon icon-chevron-down"><use xlink:href="#icon-chevron-down"></use></svg></button>
    <div id="video-archive__filters" class="hidden lg:block">
      <ul class="flex flex-col justify-start lg:items-center text-brand-off-black paragraph-small lg:flex-row">
        <li class="mb-2 mr-6 xl:mr-8 last:mr-0 video__filter lg:mb-0" role="presentation">
          <input class="sr-only" type="radio" name="ll_video_cat" id="all" value="all" <?php echo $component_data['category'] == 'all' ? 'checked' : 'one'; ?> <?php echo $component_data['category'][0] == 'all' ? 'checked' : 'two'; ?>>
          <label for="all" class="flex items-start justify-start">
            All Videos
          </label>
        </li>
        <?php foreach( $video_categories as $video_category ) : ?>
          <li class="mb-2 mr-6 xl:mr-8 last:mr-0 video__filter lg:mb-0" role="presentation">
            <input class="sr-only" type="radio" name="ll_video_cat" id="<?php echo $video_category->term_id; ?>" value="<?php echo $video_category->term_id; ?>" <?php echo $video_category->term_id == $component_data['category'] ? 'checked' : ''; ?>>
            <label for="<?php echo $video_category->term_id; ?>" class="flex items-start justify-start">
              <?php echo $video_category->name; ?>
            </label>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="w-full bg-brand-deep-green h-[1px] mt-3"></div>
    </div>
  </div>
</section>
