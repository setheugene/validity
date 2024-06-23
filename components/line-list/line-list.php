<?php
/**
* Line List
* -----------------------------------------------------------------------------
*
* Line List component
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
$list_items = $component_data['items'] ?? [];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="line-list <?php echo $top_spacing; ?> <?php echo $bottom_spacing; ?> bg-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="line-list">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col md:w-5/6">
        <?php if( $heading && $heading['text']) : ?>
          <<?php echo $heading['tag']; ?> class='mb-5 js-fade hdg-2'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
        <?php endif; ?>
        <?php if( !empty($list_items) ) : ?>
          <?php foreach( $list_items as $list_item ) : ?>
            <div class="relative py-8 lg:py-10 row js-fade">
              <div class="absolute inset-0 w-full col">
                <svg width="100%" height="2" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path class="draw-in-line" d="M1 1H971" stroke="#80A399" stroke-linecap="round"/>
                </svg>
              </div>
              <div class="col w-full lg:w-[37.5%] mb-3">
                <h4 class="hdg-4 text-brand-off-black">
                  <?php echo $list_item['title'] ?? ''; ?>
                </h4>
              </div>
              <div class="col w-full lg:w-[62.5%]">
                <p class="paragraph-default text-brand-gray">
                  <?php echo $list_item['description'] ?? ''; ?>
                </p>
                <?php if ( $list_item['link'] ) : ?>
                  <a class="primary-btn green" href="<?php echo $list_item['link']['url']; ?>" <?php echo $list_item['link']['target'] ? 'target="' . $list_item['link']['target'] . '"' : '' ?>>
                    <span class="circle"><svg class="right-arrow-btn-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path class="right" d="M13.0728 8.56973C13.3031 8.33937 13.3031 7.96813 13.0728 7.75053L7.91436 2.59213C7.65839 2.33615 7.24874 2.33615 6.99276 2.59213C6.73679 2.84811 6.73679 3.25775 6.99276 3.51373L11.2296 7.75053C11.4599 7.98088 11.4599 8.35213 11.2296 8.56973L6.99276 12.8065C6.73679 13.0625 6.73679 13.4721 6.99276 13.7281C7.24874 13.9841 7.65839 13.9841 7.91436 13.7281L13.0728 8.56973Z" fill="white"></path><path class="line" d="M12 8.10022L2 8.10022" stroke="white" stroke-linecap="round"></path></g></svg></span>
                    <span class="btn-title">
                      <?php echo $list_item['link']['title']; ?>
                      <?php if( $list_item['link']['title'] == 'Learn More' ) : ?>
                        <span class="sr-only">
                          about <?php echo $list_item['title'] ?? ''; ?>
                        </span>
                      <?php endif; ?>
                    </span>
                    <?php if($list_item['link']['target'] === '_blank') : ?>
                      <span class="sr-only"> (opens in new tab)</span>
                    <?php endif; ?>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
