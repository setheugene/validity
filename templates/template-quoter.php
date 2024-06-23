<?php
/*
Template Name: Quoter
*/
$logo = get_field( 'global_logo', 'option' );
?>


<header class="fixed z-50 flex items-center w-full h-20 template-quoter__header bg-brand-deep-green">
  <div class="container relative flex items-center justify-between">
    <button class="flex items-center text-white llgq-quoter-back is-inactive">
      <svg class='w-5 h-5 mr-3 text-white duration-300 ease-in-out transform rotate-180 icon icon-arrow-right'><use xlink:href='#icon-arrow-right'></use></svg>
      <span class="text-white paragraph-default">Back</span>
    </button>
    <div class="w-1 h-1 opacity-0"></div>
    <?php if ( $logo ) : ?>
      <a class="flex-shrink-0 inline-block template-quoter__header-logo" href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('name'); ?>">
      </a>
    <?php endif; ?>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center text-white paragraph-default llgq-quoter-exit">
      <span class="mr-2">Exit</span>
    </a>
  </div>
</header>

<section class="flex h-full pt-16 overflow-auto lg:items-center lg:pt-0 llgq-quoter-body">
  <div class="container">
    <?php echo gravity_form( get_field('quoter_form_id'), false, false, false, null, true ); ?>
  </div>
  <div class="fixed w-full bottom-16">
    <img class="w-full" src="<?php echo get_template_directory_uri(); ?>/assets/img/top-curve-light-green.svg" alt="light green curve background graphic">
  </div>
  <div class="fixed bottom-0 flex items-center justify-center w-full h-16 quoter__progress-bar-wrapper bg-brand-light-green-2">
    <div class="container">
      <div class="justify-center row">
        <div class="w-full col xl:w-5/6">
          <div class="validity-progress-bar">
            <div class="validity-progress" style="width: 0%;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

