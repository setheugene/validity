<?php
/**
* Pagination Links
* -----------------------------------------------------------------------------
*
* Pagination Links component
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
  'page'      => 1,
  'max_pages' => 1,
  'ppp'       => 16,
];

$component_data = ll_parse_args( $component_data, $defaults );
?>

<?php
  $the_page = $component_data['page']; // the current page, please make sure this is an integer
  $mid_size = 3; // mid_size similar to paginate_links() mid_size
  $max_pages = $component_data['max_pages']; // max number of pages
?>

<?php if ( $max_pages > 1 ) : ?>
  <nav class="flex items-center justify-center mt-16 text-xl pagination">
    <?php	if ($the_page > 1) : ?>
      <button class="mx-3.5 prev page-numbers flex items-center justify-center w-8 h-8 duration-200 rounded-full bg-brand-deep-green hover:bg-brand-light-green-2" data-value="<?php echo $the_page - 1;?>">
        <svg class='w-4 h-4 text-white transform rotate-180 icon icon-chevron-right'><use xlink:href='#icon-chevron-right'></use></svg>
      </button>
    <?php else : ?>
      <span class="mx-3.5 prev opacity-50 page-numbers flex items-center justify-center w-8 h-8 duration-200 rounded-full bg-brand-deep-green">
        <svg class='w-4 h-4 text-white transform rotate-180 icon icon-chevron-right'><use xlink:href='#icon-chevron-right'></use></svg>
      </span>
    <?php endif; ?>

    <?php for ($i=1; $i <= $mid_size; $i++) :?>
      <?php if ( $i < $the_page ) : ?>
        <button class="mx-3.5 page-numbers hover:underline" data-value="<?php echo $i;?>">
          <?php echo $i;?>
        </button>
      <?php endif; ?>
    <?php endfor; ?>

    <?php if ( $the_page > $mid_size ) : ?>
      <?php if ( ($the_page - $mid_size) > ($mid_size + 1 )) : ?>
        <span class="mx-3.5 page-numbers dots">…</span>
      <?php endif; ?>

      <?php for ($i=$mid_size; $i >= 1; $i--) :?>
        <?php if($the_page > $mid_size && ($the_page - $i > $mid_size)) : ?>
          <button class="mx-3.5 page-numbers hover:underline" data-value="<?php echo $the_page - $i;?>">
            <?php echo $the_page - $i;?>
          </button>
        <?php	endif; ?>
      <?php endfor; ?>
    <?php endif; ?>

    <?php if ($max_pages > 1 ) : ?>
        <span class="mx-3.5 page-numbers current underline font-semibold" aria-current="page">
          <?php echo $the_page;?>
        </span>
    <?php endif; ?>

    <?php if ( $the_page < $max_pages ) : ?>
      <?php for ($i=1; $i <= $mid_size; $i++) :?>
        <?php if( ($the_page + $mid_size ) <= $max_pages && ($the_page + $i <= ($max_pages - $mid_size) )) : ?>
          <button class="mx-3.5 page-numbers hover:underline" data-value="<?php echo $the_page + $i;?>">
            <?php echo $the_page + $i;?>
          </button>
        <?php	endif; ?>
      <?php endfor; ?>

      <?php if ( ($the_page + $mid_size) < ($max_pages - $mid_size )) : ?>
        <span class="mx-3.5 page-numbers dots">…</span>
      <?php endif; ?>
    <?php endif; ?>

    <?php for ($i=($mid_size-1); $i >= 0; $i--) :?>
      <?php if ( ($max_pages - $i) > $the_page ) : ?>
        <button class="mx-3.5 page-numbers hover:underline" data-value="<?php echo $max_pages - $i;?>">
          <?php echo $max_pages - $i;?>
        </button>
      <?php endif; ?>
    <?php endfor; ?>

    <?php if ($the_page < $max_pages) : ?>
      <button class="mx-3.5 prev page-numbers flex items-center justify-center w-8 h-8 duration-200 rounded-full bg-brand-deep-green hover:bg-brand-light-green-2" data-value="<?php echo $the_page + 1;?>">
        <svg class='w-3 h-3 text-white transform rotate-180 icon icon-chevron-left'><use xlink:href='#icon-chevron-left'></use></svg>
      </button>
    <?php else : ?>
      <span class="mx-3.5 prev page-numbers flex items-center opacity-50 justify-center w-8 h-8 duration-200 rounded-full bg-brand-deep-green">
        <svg class='w-3 h-3 text-white transform rotate-180 icon icon-chevron-left'><use xlink:href='#icon-chevron-left'></use></svg>
      </span>
    <?php	endif; ?>
  </nav>
<?php endif; ?>

