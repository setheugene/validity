<?php
/**
* Red Flags
* -----------------------------------------------------------------------------
*
* Red Flags component
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
$fact_one = $component_data['fact_one'] ?? '';
$fact_two = $component_data['fact_two'] ?? '';
$fact_three = $component_data['fact_three'] ?? '';
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="red-flags py-16 lg:py-20 bg-brand-light-green-4 animated-circles <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="red-flags">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col xl:w-5/6">
        <?php if( $heading && $heading['text']) : ?>
          <<?php echo $heading['tag']; ?> class='mb-10 js-fade hdg-2 text-brand-off-black'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
        <?php endif; ?>
        <div class="row gap-y-5 lg:gap-y-12 xl:gap-y-14">
          <!-- ROW ONE -->
          <!-- FACT ONE  -->
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col z-20 relative">
            <?php if( $fact_one != '' ) : ?>
              <div class="relative z-30 md:flex items-center hidden justify-center rounded-full red-flag__circle animated-circle h-10 w-10 md:h-11 md:w-11 bg-brand-orange after:absolute after:inset-0 after:h-full after:w-full after:content[''] after:pointer-cursor" data-toggle-class-on-target="is-visible" data-toggle-target-self="#red-flag__one" data-toggle-event="mouseover" data-toggle-outside aria-describedby="red-flag__one">
                <svg class='w-6 h-6 text-white icon icon-plus'><use xlink:href='#icon-plus'></use></svg>
                <span class="red-flag__tooltip" id="red-flag__one" role="tooltip" aria-hidden="true">
                  <?php echo $fact_one; ?>
                </span>
              </div>
              <div class="relative z-30 md:hidden flex items-center justify-center rounded-full red-flag__circle animated-circle h-10 w-10 md:h-11 md:w-11 bg-brand-orange after:absolute after:inset-0 after:h-full after:w-full after:content[''] after:pointer-cursor">
                <svg class='w-6 h-6 text-white icon icon-plus'><use xlink:href='#icon-plus'></use></svg>
                <span class="red-flag__tooltip" id="red-flag__one" role="tooltip" aria-hidden="true">
                  <?php echo $fact_one; ?>
                </span>
              </div>
            <?php else: ?>
              <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
            <?php endif; ?>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden md:block">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden md:block">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden md:block">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden md:block">
            <div class="rounded-full red-flag__circle h-11 animated-circle w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden lg:block">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <?php if( $fact_one != '' ) : ?>
            <div class="w-full col md:hidden">
              <div class="red-flag__tooltip-mobile">
                <?php echo $fact_one; ?>
              </div>
            </div>
          <?php endif; ?>

          <!-- SECOND ROW -->
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden lg:block">
            <div class="w-10 h-10 rounded-full red-flag__circle animated-circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden md:block">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden md:block">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <!-- FACT TWO -->
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col z-0">
            <?php if( $fact_two != '' ) : ?>
              <div class="relative z-30 hidden md:flex items-center justify-center rounded-full red-flag__circle animated-circle h-10 w-10 md:h-11 md:w-11 bg-brand-orange after:absolute after:inset-0 after:h-full after:w-full after:content[''] after:pointer-cursor" data-toggle-class-on-target="is-visible" data-toggle-target-self="#red-flag__two" data-toggle-event="mouseover" data-toggle-outside aria-describedby="red-flag__one">
                <svg class='w-6 h-6 text-white icon icon-plus'><use xlink:href='#icon-plus'></use></svg>
                <span class="red-flag__tooltip top" id="red-flag__two" role="tooltip" aria-hidden="true">
                  <?php echo $fact_two; ?>
                </span>
              </div>
              <div class="relative z-30 md:hidden flex items-center justify-center rounded-full red-flag__circle animated-circle h-10 w-10 md:h-11 md:w-11 bg-brand-orange after:absolute after:inset-0 after:h-full after:w-full after:content[''] after:pointer-cursor">
                <svg class='w-6 h-6 text-white icon icon-plus'><use xlink:href='#icon-plus'></use></svg>
                <span class="red-flag__tooltip" id="red-flag__two" role="tooltip" aria-hidden="true">
                  <?php echo $fact_two; ?>
                </span>
              </div>
            <?php else: ?>
              <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
            <?php endif; ?>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col">
            <div class="w-10 h-10 rounded-full red-flag__circle animated-circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden md:block">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden md:block">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <?php if( $fact_two != '' ) : ?>
            <div class="w-full col md:hidden">
              <div class="red-flag__tooltip-mobile">
                <?php echo $fact_two; ?>
              </div>
            </div>
          <?php endif; ?>
          <!-- THIRD ROW -->
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden lg:block">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden md:block">
            <div class="w-10 h-10 rounded-full red-flag__circle animated-circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <!-- FACT THREE -->
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col z-10">
            <?php if( $fact_three != '' ) : ?>
              <div class="relative z-30 hidden md:flex items-center justify-center rounded-full red-flag__circle animated-circle h-10 w-10 md:h-11 md:w-11 bg-brand-orange after:absolute after:inset-0 after:h-full after:w-full after:content[''] after:pointer-cursor" data-toggle-class-on-target="is-visible" data-toggle-target-self="#red-flag__three" data-toggle-event="mouseover" data-toggle-outside aria-describedby="red-flag__three">
                <svg class='w-6 h-6 text-white icon icon-plus'><use xlink:href='#icon-plus'></use></svg>
                <span class="red-flag__tooltip top" id="red-flag__three" role="tooltip" aria-hidden="true">
                  <?php echo $fact_three; ?>
                </span>
              </div>
              <div class="relative z-30 md:hidden flex items-center justify-center rounded-full red-flag__circle animated-circle h-10 w-10 md:h-11 md:w-11 bg-brand-orange after:absolute after:inset-0 after:h-full after:w-full after:content[''] after:pointer-cursor" data-toggle-class-on-target="is-visible">
                <svg class='w-6 h-6 text-white icon icon-plus'><use xlink:href='#icon-plus'></use></svg>
                <span class="red-flag__tooltip" id="red-flag__three" role="tooltip" aria-hidden="true">
                  <?php echo $fact_three; ?>
                </span>
              </div>
            <?php else: ?>
              <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
            <?php endif; ?>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden md:block">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden md:block">
            <div class="w-10 h-10 rounded-full red-flag__circle animated-circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <div class="w-1/5 md:w-[11%] lg:w-[10%] col hidden md:block">
            <div class="w-10 h-10 rounded-full red-flag__circle md:h-11 md:w-11 bg-brand-light-green-2"></div>
          </div>
          <?php if( $fact_three != '' ) : ?>
            <div class="w-full col md:hidden">
              <div class="red-flag__tooltip-mobile">
                <?php echo $fact_three; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
