<?php
/**
* Team Grid
* -----------------------------------------------------------------------------
*
* Team Grid component
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
$heading = $component_data['heading'] ?? [];
$per_row = $component_data['per_row'] ?? '';
$col_size = '';
if($per_row === '4') {
  $col_size = 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8';
}elseif($per_row === '6') {
  $col_size = 'grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 md:gap-8';
}
$teams = [];
if( !empty( $component_data['members'] ) ) :
  foreach( $component_data['members'] as $key => $teamId ) :
    $teams[$key]['name'] = get_field('team_name', $teamId) != '' ? get_field( 'team_name', $teamId ) : get_the_title($teamId);
    $teams[$key]['position'] = get_field('team_position', $teamId) ?? '';
    $teams[$key]['image_id'] = get_post_thumbnail_id( $teamId );
    $teams[$key]['team_id'] = $teamId;
  endforeach;
endif;

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="team-grid pb-16 lg:pb-20 <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="team-grid">
  <div class="container">
    <?php if( $heading && $heading['text']) : ?>
      <<?php echo $heading['tag']; ?> class='mb-5 js-fade hdg-3 text-brand-off-black'><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
    <?php endif; ?>
    <div class="w-full mb-10">
      <svg width="100%" height="2" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path class="draw-in-line" d="M1 1H1171" stroke="#80A399" stroke-linecap="round"/>
      </svg>
    </div>
    <?php if( !empty($teams) ) : ?>
      <div class="grid <?php echo $col_size; ?>">
        <?php foreach( $teams as $team ) : ?>
          <?php
            $hover_image = get_field('team_hover_image', $team['team_id']) ?? null;
            $main_image_classes = '';
            $linkedin_url = get_field('team_linkedin_link', $team['team_id']) ?? '';
            if ($hover_image) :
              $main_image_classes = "z-10 group-hover:opacity-0 duration-500 ease-in-out";
            endif;
          ?>
          <div class="relative flex items-center justify-center overflow-hidden rounded-full group team-grid__member aspect-square">
            <div class="fit-image">
              <?php echo wp_get_attachment_image( $team['image_id'], 'large', "", array( "class" => $main_image_classes ) ); ?>
            </div>
            <?php if( $hover_image ) : ?>
              <?php
                ll_include_component(
                  'fit-image',
                  array(
                    'image_id' => $hover_image['image_id'],
                    'thumbnail_size' => 'large',
                    'position' => $hover_image['image_focus_point'],
                    'fit' =>  $hover_image['image_fit'],
                    'loading' => $hover_image['image_loading']
                  ),
                  ['classes' => ['group-hover:opacity-100 opacity-0 duration-500 ease-in-out z-20']]
                );
              ?>
            <?php endif; ?>
            <div class="relative z-30 text-center text-white team-grid__member-hover w-[117px]">
              <div class="hdg-6">
                <?php echo $team['name']; ?>
              </div>
              <div class="my-[6px] w-full h-[1px] bg-white"></div>
              <div class="paragraph-xsmall">
                <?php echo $team['position']; ?>
              </div>
              <?php if( $linkedin_url != '' ) : ?>
                <svg class='w-5 h-5 mt-3 text-white icon icon-instagram'><use xlink:href='#icon-instagram'></use></svg>
                <a class="absolute inset-0 w-full h-full" href="<?php echo $linkedin_url; ?>" target="_blank"></a>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
