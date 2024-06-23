<?php
/**
* Testimonial Slider
* -----------------------------------------------------------------------------
*
* Testimonial Slider component
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

$heading = $component_data['heading'] ?? '';
$testimonials = [];
if( !empty( $component_data['testimonials'] ) ) :
  foreach( $component_data['testimonials'] as $key => $testimonialId ) :
    $testimonials[$key]['excerpt'] = get_field('testimonial_excerpt', $testimonialId) ?? '';
    $testimonials[$key]['full'] = get_field('testimonial_full', $testimonialId) ?? '';
    $testimonials[$key]['name'] = get_field('testimonial_author_name', $testimonialId) != '' ? get_field( 'testimonial_author_name', $testimonialId ) : get_the_title($testimonialId);
    $testimonials[$key]['title'] = get_field('testimonial_author_title', $testimonialId) ?? '';
    $testimonials[$key]['image_id'] = get_post_thumbnail_id( $testimonialId );
  endforeach;
endif;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="testimonial-slider bg-white relative animated-circles <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="testimonial-slider">
  <!-- SLIDER ROW -->
  <?php if( !empty( $testimonials ) ) : ?>
    <div class="container py-16 lg:py-24">
      <div class="testimonial-slider__slider">
        <?php foreach( $testimonials as $key => $testimonial ) : ?>
          <div class="testimonial-slider__slide">
            <div class="row">
              <div class="w-full mb-16 col lg:mb-0 lg:w-1/2">
                <div class="justify-center row">
                  <div class="w-full lg:w-2/3 col">
                    <?php if ( $testimonial['image_id'] != '' ) : ?>
                      <div class="relative overflow-hidden rounded-full aspect-square">
                        <div class="fit-image">
                          <?php echo wp_get_attachment_image( $testimonial['image_id'], 'large', "", array( "class" => "" ) ); ?>
                        </div>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="w-full col lg:w-1/2">
                <div class="row">
                  <div class="w-full col lg:w-5/6">
                    <div class="h-25 lg:h-20">
                      <!-- EMPTY FOR HEADING -->
                    </div>
                    <div class="mb-5 wysiwyg paragraph-default text-brand-gray">
                      <?php echo $testimonial['excerpt']; ?>
                      <?php if( !empty($testimonial['full']) ) : ?>
                        <button class="block mb-5 -mt-3 underline duration-200 js-init-popup text-brand-deep-green hover:text-brand-light-green-2" data-modal="#testimonial-popup-<?php echo $key; ?>" data-component="modal">
                          Continue Reading
                        </button>
                        <div id="testimonial-popup-<?php echo $key; ?>" class="relative mfp-hide bg-brand-white validity__popup">
                          <div class="mb-5 wysiwyg paragraph-default text-brand-gray">
                            <?php echo $testimonial['full']; ?>
                          </div>
                          <p class="font-semibold paragraph-default text-brand-gray">
                            <?php echo $testimonial['name']; ?>
                          </p>
                          <p class="paragraph-default text-brand-gray">
                            <?php echo $testimonial['title']; ?>
                          </p>
                        </div>
                      <?php endif; ?>
                    </div>
                    <p class="font-semibold paragraph-default text-brand-gray">
                      <?php echo $testimonial['name']; ?>
                    </p>
                    <p class="paragraph-default text-brand-gray">
                      <?php echo $testimonial['title']; ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="row">
        <div class="w-full col lg:w-11/12">
          <div class="flex justify-end gap-4 testimonial-slider__arrows-container">
            <button class="flex items-center justify-center w-8 h-8 duration-200 rounded-full testimonial-slider__prev-arrow bg-brand-deep-green hover:bg-brand-light-green-2">
              <svg class='w-4 h-4 text-white transform rotate-180 icon icon-chevron-right'><use xlink:href='#icon-chevron-right'></use></svg>
            </button>
            <button class="flex items-center justify-center w-8 h-8 duration-200 rounded-full testimonial-slider__next-arrow bg-brand-deep-green hover:bg-brand-light-green-2">
              <svg class='w-4 h-4 text-white icon icon-chevron-right'><use xlink:href='#icon-chevron-right'></use></svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <!-- ANIMATED CIRLCES AND COMPONENT HEADING ROW -->
  <div class="container absolute w-full h-full py-16 -translate-x-1/2 -translate-y-1/2 pointer-events-none lg:py-24 top-1/2 left-1/2">
    <div class="row">
      <div class="w-full mb-16 col lg:mb-0 lg:w-1/2">
        <div class="justify-center row">
          <div class="w-full lg:w-2/3 col">
            <div class="relative aspect-square">
              <div class="float testimonial-slider__circle-wrapper small">
                <div class="testimonial-slider__circle animated-circle"></div>
              </div>
              <div class="testimonial-slider__circle-wrapper medium float-reverse">
                <div class="testimonial-slider__circle animated-circle"></div>
              </div>
              <div class="testimonial-slider__circle-wrapper large float">
                <div class="testimonial-slider__circle animated-circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full col lg:w-1/2">
        <div class="row">
          <div class="w-full col lg:w-5/6">
            <?php if( $heading && $heading['text']) : ?>
              <<?php echo $heading['tag']; ?> class='js-fade hdg-2 text-brand-off-black'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
