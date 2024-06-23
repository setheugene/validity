<?php
  $logo = get_field( 'global_logo', 'option' );
  $primary_menu   = new LL_Menu( 'primary_navigation' );
  $global_nav_quoter_link = get_field('global_nav_quoter_link', 'option');
?>
<header class="flex items-center h-20 navbar bg-brand-deep-green" role="banner">
  <div class="container">
    <div class="flex items-center justify-between flex-nowrap">
      <?php if ( $logo ) : ?>
        <a class="flex-shrink-0 inline-block" href="<?php echo esc_url(home_url('/')); ?>">
          <img class="logo logo--header" src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('name'); ?>">
        </a>
      <?php endif; ?>
      <button type="button" class="lg:hidden navbar-toggle" data-toggle-class="is-open" data-toggle-target="#primary-nav">
        <span class="navbar-toggle-icon"></span>
        <span class="sr-only">Main Menu</span>
      </button>

      <nav class="hidden lg:block primary-nav" id="primary-nav" role="navigation">
        <ul class="flex flex-col items-start lg:items-center lg:flex-row">
          <?php if ( $primary_menu->items ) : ?>
            <?php foreach( $primary_menu->items as $menu_item ) : ?>
              <li class="primary-menu-item">
                <<?php echo $menu_item->has_children ? 'button' : 'a'; ?> class="inline-block"
                  <?php if( $menu_item->has_children ) : ?>
                    data-toggle-class="is-open"
                    data-toggle-outside
                    data-toggle-target="#menu-<?php echo $menu_item->ID; ?>, #nav-overlay-<?php echo $menu_item->ID; ?>" aria-expanded="false"
                    data-toggle-group="menu-accordions"
                    id="item-<?php echo $menu_item->ID; ?>"
                    <?php else : ?>
                    href="<?php echo $menu_item->url ?>"
                    target="<?php echo $menu_item->target; ?>"
                  <?php endif; ?>
                >
                  <?php echo $menu_item->title; ?>
                  <div class="flex items-center justify-center w-[28px] h-[28px] rounded-full bg-brand-deep-green lg:hidden">
                    <svg class='w-5 h-5 text-white icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
                  </div>
                </<?php echo $menu_item->has_children ? 'button' : 'a'; ?>>

                <?php if ( $menu_item->has_children ) : ?>
                  <div class="hidden child-menu-panel" id="menu-<?php echo $menu_item->ID; ?>" aria-hidden="true" aria-labelledby="item-<?php echo $menu_item->ID; ?>">
                  <button id="nav-overlay-<?php echo $menu_item->ID; ?>" class="cursor-default nav-overlay" data-toggle-trigger-off="#menu-<?php echo $menu_item->ID; ?>"></button>
                    <div class="container relative z-10">
                      <div class="block py-5 lg:hidden">
                        <button class="text-brand-off-black paragraph-small" data-toggle-trigger-off="#menu-<?php echo $menu_item->ID; ?>">
                          <svg class='w-5 h-5 mr-3 transform rotate-180 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
                          Back
                        </button>
                      </div>
                      <ul class="grid grid-cols-1 gap-4 lg:gap-0 md:grid-cols-2 lg:grid-cols-3">
                        <?php foreach ( $menu_item->children as $child_item ) : ?>
                          <li class="relative pb-4 duration-300 border-b lg:p-5 primary-menu__list-item border-brand-deep-green lg:border-b-0">
                            <div class="flex items-center justify-between lg:justify-start">
                              <div class="hdg-4 text-brand-off-black">
                                <?php echo $child_item->title; ?>
                              </div>
                              <div class="flex items-center justify-center w-[28px] h-[28px] rounded-full bg-brand-deep-green lg:hidden">
                                <svg class='w-5 h-5 text-white icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
                              </div>
                            </div>
                            <?php if( $child_item->fields['primary_nav_menu_item_add_description'] ) : ?>
                              <p class="w-10/12 mt-1 text-brand-gray paragraph-small lg:w-full">
                                <?php echo $child_item->fields['primary_nav_menu_item_description'] ?? ''; ?>
                              </p>
                            <?php endif; ?>
                            <div class="hidden mt-4 cursor-pointer primary-btn small green lg:flex">
                              <span class="circle"><svg class="right-arrow-btn-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path class="right" d="M13.0728 8.56973C13.3031 8.33937 13.3031 7.96813 13.0728 7.75053L7.91436 2.59213C7.65839 2.33615 7.24874 2.33615 6.99276 2.59213C6.73679 2.84811 6.73679 3.25775 6.99276 3.51373L11.2296 7.75053C11.4599 7.98088 11.4599 8.35213 11.2296 8.56973L6.99276 12.8065C6.73679 13.0625 6.73679 13.4721 6.99276 13.7281C7.24874 13.9841 7.65839 13.9841 7.91436 13.7281L13.0728 8.56973Z" fill="white"></path><path class="line" d="M12 8.10022L2 8.10022" stroke="white" stroke-linecap="round"></path></g></svg></span>
                              <span class="btn-title">Learn More<span class="sr-only"> about <?php echo $child_item->title; ?></span></span>
                            </div>
                            <a href="<?php echo $child_item->url; ?>" target="<?php echo $child_item->target; ?>" class="absolute inset-0 z-20 w-full h-full"></a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
            <?php if( get_field('contact_phone_number', 'option') != "" ) : ?>
              <li class="hidden primary-menu-item lg:block">
                <a href="tel:<?php echo strip_phone(get_field('contact_phone_number', 'option')); ?>">
                  <?php echo get_field('contact_phone_number', 'option'); ?>
                </a>
              </li>
            <?php endif; ?>
          <?php endif; ?>
          <?php if( !empty( $global_nav_quoter_link ) ) : ?>
            <li class="h-20 overflow-hidden items-center w-[135px] hidden lg:flex">
              <a class="nav_quoter_button" href="<?php echo $global_nav_quoter_link['url']; ?>" <?php echo $global_nav_quoter_link['target'] ? 'target="' . $global_nav_quoter_link['target'] . '"' : '' ?>>
                <span class="relative z-10 quoter-btn__text">
                  <?php echo $global_nav_quoter_link['title']; ?>
                </span>
                <?php if($global_nav_quoter_link['target'] === '_blank') : ?>
                  <span class="sr-only"> (opens in new tab)</span>
                <?php endif; ?>
              </a>
            </li>
          <?php endif; ?>
        </ul>
        <?php if( get_field('contact_phone_number', 'option') != "" ) : ?>
          <div class="absolute bottom-0 z-20 block w-full lg:hidden">
            <a class="py-[18px] block bg-brand-light-green-2 w-full text-brand-deep-green text-center paragraph-large" href="tel:<?php echo strip_phone(get_field('contact_phone_number', 'option')); ?>">
              Give Us A Call
            </a>
          </div>
        <?php endif; ?>
      </nav>
    </div>
  </div>
</header>
