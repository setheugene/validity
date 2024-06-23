<?php
  $logo  = get_field( 'global_footer_logo', 'option' );
  $accreditation_logo  = get_field( 'global_footer_accreditation', 'option' );

  $menus = array(
    new LL_Menu( 'footer_menu_one' ),
    new LL_Menu( 'footer_menu_two' )
  );
?>
<footer class="footer bg-brand-deep-green" role="contentinfo">
  <div class="container py-12">
    <div class="row">
      <div class="flex flex-col items-center justify-center w-full mb-10 lg:items-start col md:w-1/2 lg:justify-start">
        <?php if ( $logo ) : ?>
          <div class="mb-8">
            <a class="inline-block" href="<?php echo esc_url(home_url('/')); ?>">
              <img class="logo logo--footer" src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('name'); ?>">
            </a>
          </div>
        <?php endif; ?>
        <?php if ( $accreditation_logo ) : ?>
          <div>
            <img src="<?php echo $accreditation_logo['url']; ?>" alt="accreditation logo">
          </div>
        <?php endif; ?>
      </div>
      <div class="w-full mb-6 md:w-1/6 col lg:mb-0">
        <?php if( get_field('contact_phone_number', 'option') ) : ?>
          <div class="mb-5 last:mb-0">
            <h4 class="mb-3 font-semibold text-white paragraph-large">
              Phone
            </h4>
            <a class="text-white paragraph-small hover:underline hover:text-brand-light-green-2" href="tel:<?php echo strip_phone(get_field('contact_phone_number', 'option')); ?>">
              <?php echo get_field('contact_phone_number', 'option'); ?>
            </a>
          </div>
        <?php endif; ?>

        <?php if( get_field('contact_fax_number', 'option') ) : ?>
          <div class="mb-5 last:mb-0">
            <h4 class="mb-3 font-semibold text-white paragraph-large">
              Fax
            </h4>
            <a class="text-white paragraph-small hover:underline hover:text-brand-light-green-2" href="tel:<?php echo strip_phone(get_field('contact_fax_number', 'option')); ?>">
              <?php echo get_field('contact_fax_number', 'option'); ?>
            </a>
          </div>
        <?php endif; ?>

        <?php if( get_field('contact_fax_number', 'option') ) : ?>
          <div class="mb-5 last:mb-0">
            <h4 class="mb-3 font-semibold text-white paragraph-large">
              Hours
            </h4>
            <div class="text-white wysiwyg paragraph-small">
              <?php echo get_field('global_displayed_hours', 'option'); ?>
            </div>
          </div>
        <?php endif; ?>

      </div>
      <?php foreach ( $menus as $menu ) : ?>
        <div class="w-full mb-6 md:w-1/6 col lg:mb-0">
          <?php if ( isset($menu->hasItems) ) : ?>
            <nav class="">
              <h4 class="mb-4 font-semibold text-white paragraph-large">
                <?php echo $menu->name; ?>
              </h4>
              <ul>
                <?php foreach( $menu->items as $menu_item ): ?>
                  <li class="mb-3 last:mb-0">
                    <a class="text-white paragraph-small hover:underline hover:text-brand-light-green-2" href="<?php echo $menu_item->url ?>" target="<?php echo $menu_item->target; ?>"><?php echo $menu_item->title; ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </nav>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="py-6 bg-white lg:py-2 text-brand-off-black footer-bottom">
    <div class="container">
      <div class="flex flex-col flex-wrap items-center justify-between text-sm text-center lg:flex-row md:flex-nowrap md:justify-between">
        <div class="mb-4 footer-social lg:mb-0">
          <?php echo ll_get_social_list(); ?>
        </div>
        <div class="flex flex-col lg:flex-row">
          <div class="text-center paragraph-small lg:text-left">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.
          </div>
          <div class="hidden mx-3 lg:block">|</div>
          <div class="text-center paragraph-small lg:text-left">
            <a class="hover:text-brand-light-green-2" href="https://liftedlogic.com/" target="_blank">Web Design</a> & <a class="hover:text-brand-light-green-2" href="https://liftedlogic.com/" target="_blank">SEO</a> by <a class="hover:text-brand-light-green-2" href="https://liftedlogic.com/" target="_blank">Lifted Logic</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
