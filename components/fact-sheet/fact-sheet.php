<?php
/**
* Fact Sheet
* -----------------------------------------------------------------------------
*
* Fact Sheet component
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

$top_spacing = $component_data['global_spacing_options']['top_spacing'] ?? '';
$bottom_spacing = $component_data['global_spacing_options']['bottom_spacing'] ?? '';
$content = $component_data['content'] ?? '';
$button_text = $component_data['button_text'] ?? 'Download';
$downloadable = $component_data['downloadable_file'] ?? '';
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="fact-sheet bg-white activate <?php echo $top_spacing; ?> <?php echo $bottom_spacing; ?>  <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="fact-sheet">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col md:w-5/6 lg:w-2/3">
        <div class="items-center justify-between row">
          <div class="w-full mb-6 col lg:w-1/4 md:w-1/5 md:mb-0">
            <a href="<?php echo $downloadable; ?>" target="_blank" class="w-[168px] h-[168px] text-center p-3 flex flex-col fact-sheet__button items-center justify-center overflow-hidden rounded-full bg-brand-light-green-2 text-brand-off-black">
              <svg class='flex-shrink-0 w-[26px] h-[26px] mb-3 icon icon-document'><use xlink:href='#icon-document'></use></svg>
              <span class="flex-shrink-0 paragraph-default">
                <?php echo $button_text; ?>
              </span>
            </a>
          </div>
          <div class="w-full col lg:w-[62.5%] md:w-3/5">
            <div class="wysiwyg">
              <?php echo $content; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
