<?php
/**
* Benefits Grid
* -----------------------------------------------------------------------------
*
* Benefits Grid component
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

$top_spacing = $component_data['top_spacing'] ?? '';
$bottom_spacing = $component_data['bottom_spacing'] ?? '';
$heading = $component_data['heading'] ?? '';
$description = $component_data['description'] ?? '';
$benefits = $component_data['benefits'] ?? [];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="benefits-grid <?php echo $top_spacing; ?> <?php echo $bottom_spacing; ?> bg-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="benefits-grid">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col xl:w-5/6">
        <div class="row">
          <div class="w-full col lg:w-[70%] mb-8 lg:mb-10 js-fade">
            <?php if( $heading && $heading['text']) : ?>
              <<?php echo $heading['tag']; ?> class='mb-3 hdg-2'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
            <?php endif; ?>
            <div class="paragraph-small text-brand-off-black">
              <?php echo $description; ?>
            </div>
          </div>
          <?php if( !empty($benefits) ) : ?>
            <div class="grid w-full grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 col js-fade">
              <?php foreach( $benefits as $benefit ) : ?>
                <div class="flex flex-col">
                  <lottie-player class="w-16 h-16 mb-[18px]" src="<?php echo get_template_directory_uri(); ?>/assets/img/lottie/<?php echo $benefit['animated_icon'] ?? ''; ?>.json" background="transparent" speed="1" loop autoplay></lottie-player>
                  <h4 class="mb-2 font-semibold paragraph-default text-brand-off-black">
                    <?php echo $benefit['title'] ?? ''; ?>
                  </h4>
                  <p class="paragraph-default text-brand-gray wysiwyg">
                    <?php echo $benefit['description'] ?? ''; ?>
                  </p>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
