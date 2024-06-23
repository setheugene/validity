<?php
/**
* Logo Grid
* -----------------------------------------------------------------------------
*
* Logo Grid component
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

$heading = $component_data['heading_heading'] ?? '';
$logos = $component_data['logos'] ?? [];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="logo-grid bg-brand-light-green-4 py-16 lg:py-20 overflow-hidden <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="logo-grid">
  <div class="container">
    <div class="justify-center row">
      <div class="w-full col lg:w-1/2">
        <?php if( $heading && $heading['text']) : ?>
          <<?php echo $heading['tag']; ?> class='mb-8 text-center text-brand-off-black lg:mb-10 hdg-2 js-fade'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="w-full js-fade">
    <?php if( !empty($logos) ) : ?>
      <div id="logo-grid__slick" class="w-screen">
        <?php foreach( $logos as $logo ) : ?>
          <?php echo wp_get_attachment_image( $logo['logo'], 'large', "", array( "class" => "mr-20 w-24" ) ); ?>
        <?php endforeach; ?>
        <?php foreach( $logos as $logo ) : ?>
          <?php echo wp_get_attachment_image( $logo['logo'], 'large', "", array( "class" => "mr-20 w-24" ) ); ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

</section>
