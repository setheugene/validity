<?php
/**
* Content Accordion
* -----------------------------------------------------------------------------
*
* Content Accordion component
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
$component_id   = ( isset( $component_args['id'] ) && $component_args['id'] != '' ? $component_args['id'] : 'content-accordion' );
?>

<?php
$defaults = [
  'heading'       => null,
  'show'        => null,
  'items'       => [],
  'faqs'        => [],
  'faq_categories'  => [],
  'icon_type'     => 'chevron',
];

$component_data = ll_parse_args( $component_data, $defaults );

$args = array(
  'post_type'       => 'll_faq',
  'post_status'     => 'publish',
  'orderby'         => 'menu_order',
  'order'           => 'ASC',
  'posts_per_page'  => -1,
);

$items = [];
$faqs = [];

if ( $component_data['show'] == 'faqs' ) {
    if ( isset($component_data['faqs']) && !empty($component_data['faqs']) ) {
    $args['post__in'] = $component_data['faqs'];
    $args['orderby'] = 'post__in';
  }
  $faqs = get_posts( $args );
} elseif ( $component_data['show'] == 'faq_categories' ) {
  $args['tax_query'] = [
    [
      'taxonomy'    => 'll_faq_category',
      'field'       => 'term_id',
      'terms'       => $component_data['faq_categories'],
      'operator'    => 'IN'
    ]
  ];
  $faqs = get_posts( $args );
} else {
  $items = $component_data['items'];
}

if ( count($faqs) > 0 ) {
  foreach ( $faqs as $key => $faq ) {
    $items[$key]['title'] = get_the_title( $faq->ID );
    $items[$key]['content'] = get_the_content( '', '', $faq->ID );
  }
}
$heading = $component_data['heading'] ?? [];
$top_spacing = $component_data['global_spacing_options']['top_spacing'] ?? '';
$bottom_spacing = $component_data['global_spacing_options']['bottom_spacing'] ?? '';
$add_microdata = isset( $component_data['add_microdata'] ) ? $component_data['add_microdata'] : false;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="content-accordion <?php echo $top_spacing; ?> <?php echo $bottom_spacing; ?> bg-white <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="content-accordion" <?php echo $add_microdata ? 'itemscope itemtype="https://schema.org/FAQPage"' : ''; ?>>
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col lg:w-10/12 xl:w-8/12">
        <?php if( $heading && $heading['text']) : ?>
          <<?php echo $heading['tag']; ?> class='mb-5 js-fade hdg-3 text-brand-off-black'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
        <?php endif; ?>
        <div class="row">
          <div class="w-full col">
            <svg width="100%" height="2" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="draw-in-line" d="M1 1H971" stroke="#80A399" stroke-linecap="round"/>
            </svg>
          </div>
          <div class="w-full col content-accordion__items js-fade-group">
            <?php if ( !empty( $items ) ) : ?>
              <?php foreach ( $items as $key => $item ) : ?>
                <article class="content-accordion__item" <?php echo $add_microdata ? 'itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"' : ''; ?>>
                  <div class="content-accordion__item-content">
                    <button
                      type="button"
                      id="<?php echo $component_id . '-' . $key;?>-button"
                      class="mb-0 paragraph-default font-semibold sm:text-lg py-8 w-full flex flex-wrap justify-between items-center content-accordion__item-title is-icon-<?php echo $component_data['icon_type']; ?>"
                      data-toggle-class="is-open"
                      data-toggle-group="<?php echo 'accordion-' . $component_id; ?>"
                      data-toggle-target="#<?php echo $component_id . '-' . $key;?>-content"
                      aria-controls="<?php echo $component_id . '-' . $key;?>-content"
                      data-toggle-escape
                      data-toggle-arrows
                      aria-expanded="false">

                      <h3 class="mb-0 text-left item-title" <?php echo $add_microdata ? 'itemprop="name"' : ''; ?>><?php echo $item['title']; ?></h3>

                      <span class="block ml-4">
                        <?php if ( $component_data['icon_type'] == 'chevron' ) : ?>
                          <svg class="-mt-5 -mb-5 text-lg icon icon-chevron-down sm:text-2xl"><use xlink:href="#icon-chevron-down"></use></svg>
                        <?php elseif ( $component_data['icon_type'] == 'plus-minus' ) : ?>
                          <div class="flex items-center justify-center duration-200 rounded-full icon-wrapper bg-brand-deep-green h-7 w-7">
                            <svg class="text-white icon icon-plus"><use xlink:href="#icon-plus"></use></svg>
                            <svg class="text-white icon icon-minus"><use xlink:href="#icon-minus"></use></svg>
                          </div>
                        <?php elseif ( $component_data['icon_type'] == 'plus-cross' ) : ?>
                          <svg class="icon icon-plus"><use xlink:href="#icon-plus"></use></svg>
                        <?php endif; ?>
                      </span>
                    </button>

                    <div
                      id="<?php echo $component_id . '-' . $key; ?>-content"
                      class="hidden px-6 py-6 pt-0 content-accordion__item-answer"
                      aria-labelledby="<?php echo $component_id . '-' . $key;?>-button"
                      <?php echo $add_microdata ? 'itemprop="suggestedAnswer acceptedAnswer" itemscope itemtype="https://schema.org/Answer"' : ''; ?>>
                      <div class="pb-3 flex-fill sm:pr-16 wysiwyg text-brand-gray paragraph-default" <?php echo $add_microdata ? 'itemprop="text"' : ''; ?>>
                        <?php echo format_text($item['content']); ?>
                      </div>
                    </div>
                  </div>
                  <div class="w-full">
                    <svg width="100%" height="2" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path class="draw-in-line" d="M1 1H971" stroke="#80A399" stroke-linecap="round"/>
                    </svg>
                  </div>
                </article>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
