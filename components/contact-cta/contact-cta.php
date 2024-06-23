<?php
/**
* Contact CTA
* -----------------------------------------------------------------------------
*
* Contact CTA component
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
$top_right = $component_data['top_right'] ?? [];
$top_center = $component_data['top_center'] ?? [];
$bottom_left = $component_data['bottom_left'] ?? [];
$bottom_left_looping_video_url = $component_data['bottom_left_looping_video_url'] ?? '';
$bottom_center = $component_data['bottom_center'] ?? [];
$bottom_right = $component_data['bottom_right'] ?? [];
$bottom_right_looping_video_url = $component_data['bottom_right_looping_video_url'] ?? '';

$names = [];
$changing_names = $component_data['changing_names'] ?? [];
if( !empty($changing_names) ) :
  foreach( $changing_names as $name ) :
    $names[] .= $name['name'];
  endforeach;
endif;
?>

<?php if ( ll_empty( $component_data ) ) return; ?>

<section class="contact-cta bg-white pt-20 lg:pt-24 overflow-hidden animated-circles <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?> data-component="contact-cta">
  <div class="container">
    <div class="justify-end lg:mb-6 row">
      <div class="w-full col lg:w-11/12">
        <div class="items-center row">
          <div class="col w-full lg:w-[81.81%]">
            <div class="flex flex-col mb-3 lg:items-center hdg-hero js-fade lg:flex-row">
              <span class="inline-block mr-6 text-brand-off-black">Contact</span>
              <div class="contact-cta__name-slider">
                <?php foreach( $names as $name ) : ?>
                  <span class="block py-[5px] name text-brand-light-green-2">
                    <?php echo $name; ?>
                  </span>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="flex flex-col lg:items-center lg:flex-row">
              <div class="w-full lg:w-1/2">
                <div class="wyswyg js-fade">
                  <?php echo $content; ?>
                </div>
              </div>
              <div class="w-1/3 lg:w-[11.5%] lg:ml-[165px] mt-16 lg:mt-0 pr-gutter lg:pr-0">
                <?php if( !empty($top_center) ) : ?>
                  <div class="relative overflow-hidden rounded-full aspect-square animated-circle">
                    <?php
                      ll_include_component(
                        'fit-image',
                        array(
                          'image_id' => $top_center['image_id'],
                          'thumbnail_size' => 'full',
                          'position' => $top_center['image_focus_point'],
                          'fit' =>  $top_center['image_fit'],
                          'loading' => $top_center['image_loading']
                        )
                      );
                    ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col w-full lg:w-[18.19%] hidden xl:block">
            <div class="relative overflow-hidden rounded-full aspect-square animated-circle">
              <?php
                ll_include_component(
                  'fit-image',
                  array(
                    'image_id' => $top_right['image_id'],
                    'thumbnail_size' => 'full',
                    'position' => $top_right['image_focus_point'],
                    'fit' =>  $top_right['image_fit'],
                    'loading' => $top_right['image_loading']
                  )
                );
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="relative lg:pb-10 row">
      <div class="w-2/3 lg:w-1/3 col">
        <div class="relative overflow-hidden rounded-full aspect-square animated-circle mt-10 lg:mt-30 -mb-[25%] lg:-mb-[51%] contact-cta__bottom-left-image">
          <?php if($bottom_left_looping_video_url != '') : ?>
            <?php
              ll_include_component(
                'loop-video',
                array(
                  'video' => $bottom_left_looping_video_url,
                  'display' => 'desktop',
                  'image_id' => $bottom_left['image_id'],
                  'thumbnail_size' => 'full',
                  'position' => $bottom_left['image_focus_point'],
                  'loading' => $bottom_left['image_loading'],
                )
              );
            ?>
          <?php else : ?>
            <?php
              ll_include_component(
                'fit-image',
                array(
                  'image_id' => $bottom_left['image_id'],
                  'thumbnail_size' => 'full',
                  'position' => $bottom_left['image_focus_point'],
                  'fit' =>  $bottom_left['image_fit'],
                  'loading' => $bottom_left['image_loading']
                )
              );
            ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="hidden w-1/12 col lg:block"></div>
      <div class="w-1/2 lg:w-1/6 col">
        <div class="overflow-hidden rounded-full aspect-square animated-circle mt-[74px] contact-cta__bottom-center-image absolute lg:relative top-[-105%] h-full lg:w-[unset] lg:h-[unset] lg:top-[unset] right-gutter lg:right-[unset]">
          <?php
            ll_include_component(
              'fit-image',
              array(
                'image_id' => $bottom_center['image_id'],
                'thumbnail_size' => 'full',
                'position' => $bottom_center['image_focus_point'],
                'fit' =>  $bottom_center['image_fit'],
                'loading' => $bottom_center['image_loading']
              )
            );
          ?>
        </div>
      </div>
      <div class="hidden w-1/12 col lg:block"></div>
      <div class="hidden w-1/4 col lg:block">
        <div class="relative overflow-hidden rounded-full aspect-square animated-circle contact-cta__bottom-right-image">
          <?php if($bottom_right_looping_video_url != '') : ?>
            <?php
              ll_include_component(
                'loop-video',
                array(
                  'video' => $bottom_right_looping_video_url,
                  'display' => 'desktop',
                  'image_id' => $bottom_right['image_id'],
                  'thumbnail_size' => 'full',
                  'position' => $bottom_right['image_focus_point'],
                  'loading' => $bottom_right['image_loading'],
                )
              );
            ?>
          <?php else : ?>
            <?php
              ll_include_component(
                'fit-image',
                array(
                  'image_id' => $bottom_right['image_id'],
                  'thumbnail_size' => 'full',
                  'position' => $bottom_right['image_focus_point'],
                  'fit' =>  $bottom_right['image_fit'],
                  'loading' => $bottom_right['image_loading']
                )
              );
            ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
