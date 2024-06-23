<?php
/**
* Contact Form
* -----------------------------------------------------------------------------
*
* Contact Form component
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

$content = $component_data['content'] ?? '';
$include_contact_info = $component_data['contact_info'] ?? '';
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="contact-form relative <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="contact-form">
  <div class="container relative z-10">
    <div class="justify-center row">
      <div class="w-full col lg:w-5/6">
        <div class="items-center row">
          <div class="order-2 w-full col lg:w-1/2 pb-28 lg:order-1">
            <div class="hidden w-full mb-12 lg:block -ml-[84px]">
              <lottie-player class="w-full" src="<?php echo get_template_directory_uri(); ?>/assets/img/lottie/newtons-cradle.json" background="transparent" speed="1" loop autoplay></lottie-player>
            </div>
            <div class="wysiwyg text-brand-deep-green">
              <?php echo $content; ?>
            </div>
            <?php if( $include_contact_info ) : ?>
              <div class="mt-5">
                <?php if( get_field('contact_phone_number', 'option') ) : ?>
                  <div class="mb-5 last:mb-0">
                    <h4 class="mb-2 font-semibold text-brand-deep-green paragraph-default">
                      Phone:
                    </h4>
                    <a class="text-brand-deep-green paragraph-small hover:underline hover:text-brand-light-green-2" href="tel:<?php echo strip_phone(get_field('contact_phone_number', 'option')); ?>">
                      <?php echo get_field('contact_phone_number', 'option'); ?>
                    </a>
                  </div>
                <?php endif; ?>
                <?php if( get_field('contact_fax_number', 'option') ) : ?>
                  <div class="mb-5 last:mb-0">
                    <h4 class="mb-2 font-semibold text-brand-deep-green paragraph-default">
                      Fax:
                    </h4>
                    <a class="text-brand-deep-green paragraph-small hover:underline hover:text-brand-light-green-2" href="tel:<?php echo strip_phone(get_field('contact_fax_number', 'option')); ?>">
                      <?php echo get_field('contact_fax_number', 'option'); ?>
                    </a>
                  </div>
                <?php endif; ?>
                <?php if( get_field('contact_fax_number', 'option') ) : ?>
                  <div class="mb-5 last:mb-0">
                    <h4 class="mb-2 font-semibold text-brand-deep-green paragraph-default">
                      Hours of Operation:
                    </h4>
                    <div class="text-brand-deep-green wysiwyg paragraph-small">
                      <?php echo get_field('global_displayed_hours', 'option'); ?>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>


          </div>
          <div class="order-1 w-full py-12 lg:py-20 col lg:w-1/2 lg:order-2">
            <div class="ml-auto xl:w-4/5">
              <?php echo gravity_form( $component_data['form_id'], false, false, false, null, true ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
