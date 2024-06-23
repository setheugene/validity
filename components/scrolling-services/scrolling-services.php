<?php
/**
* Scrolling Services
* -----------------------------------------------------------------------------
*
* Scrolling Services component
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
$heading = $component_data['heading'];
$services = [];
if( !empty( $component_data['services'] ) ) :
  foreach( $component_data['services'] as $key => $service ) :
    $services[$key]['title'] = $service['title'] ?? '';
    $services[$key]['description'] = $service['description'] ?? '';
    $services[$key]['link'] = $service['link'] ?? [];
  endforeach;
endif;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="scrolling-services relative overflow-hidden <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="scrolling-services">
  <div id="scrolling-services__pinned-lottie" class="top-0 left-0 w-full lg:absolute">
    <div class="w-full mb-10 lg:w-1/2 lg:mb-0">
      <lottie-player class="w-full" src="<?php echo get_template_directory_uri(); ?>/assets/img/lottie/falling-filter.json" background="transparent" speed="1" loop autoplay></lottie-player>
    </div>
  </div>
  <div id="scrolling-services__content" class="container pb-20">
    <div class="justify-end row">
      <div class="lg:w-5/12 col">
        <?php if( $heading && $heading['text']) : ?>
          <<?php echo $heading['tag']; ?> class='mb-8 js-fade hdg-1'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
        <?php endif; ?>
        <?php if( !empty($services) ) : ?>
          <?php foreach( $services as $service ) : ?>
            <div class="mb-10 last:mb-0 js-fade">
              <h4 class="mb-1 text-brand-off-black hdg-4">
                <?php echo $service['title']; ?>
              </h4>
              <p class="mb-4 paragraph-small text-brand-gray">
                <?php echo $service['description']; ?>
              </p>
              <?php if ( $service['link'] ) : ?>
                <a class="mt-0 primary-btn green small" href="<?php echo $service['link']['url']; ?>" <?php echo $service['link']['target'] ? 'target="' . $service['link']['target'] . '"' : '' ?>>
                  <span class="circle">
                    <svg class="right-arrow-btn-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path class="right" d="M13.0728 8.56973C13.3031 8.33937 13.3031 7.96813 13.0728 7.75053L7.91436 2.59213C7.65839 2.33615 7.24874 2.33615 6.99276 2.59213C6.73679 2.84811 6.73679 3.25775 6.99276 3.51373L11.2296 7.75053C11.4599 7.98088 11.4599 8.35213 11.2296 8.56973L6.99276 12.8065C6.73679 13.0625 6.73679 13.4721 6.99276 13.7281C7.24874 13.9841 7.65839 13.9841 7.91436 13.7281L13.0728 8.56973Z" fill="white"></path><path class="line" d="M12 8.10022L2 8.10022" stroke="white" stroke-linecap="round"></path></g></svg>
                  </span>
                  <span class="btn-title">
                    <?php echo $service['link']['title']; ?>
                  </span>
                  <?php if($service['link']['target'] === '_blank') : ?>
                    <span class="sr-only"> (opens in new tab)</span>
                  <?php endif; ?>
                </a>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

</section>
