<?php
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

$post = !empty($component_data['post']) ? $component_data['post'] : get_the_ID();
?>
<article <?php post_class(implode( " ", $classes ), $post ); ?> <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ); ?>>
  <?php
    $cats = get_the_terms( $post, 'category' );
    $corner_tag = false;
    $content_tag = true;
  ?>
  <a class="relative overflow-hidden post__card" href="<?php echo get_permalink($post) ?>" title="Read more about <?php echo get_the_title($post); ?>">
    <div class="relative overflow-hidden post__image-wrapper aspect-3/2">
      <?php
        ll_include_component(
          'fit-image',
          array(
            'image_id' => get_post_thumbnail_id($post),
            'position' => 'object-center'
          ),
          array(
            'classes' => ['post__image']
          )
        );
      ?>

      <?php if ( !empty($cats[0]) && $corner_tag ) : ?>
        <span class="post__category-corner-tag"><?php echo $cats[0]->name; ?></span>
      <?php endif; ?>
      <div class="post__card-hover">
        <span class="relative z-10 hover-text">View Post</span>
        <div class="sr-only">about <?php echo get_the_title( $post ); ?></div>
      </div>
    </div>

    <div class="pt-4 pb-5">
      <p class="flex justify-between mb-3">
        <?php if ( !empty($cats[0]) && $content_tag ) : ?>
          <span class="mr-4 hdg-6 text-brand-deep-green"><?php echo $cats[0]->name; ?></span>
        <?php endif; ?>

        <span class="hdg-6 text-brand-deep-green">
          <?php echo get_the_date( '', $post ); ?>
        </span>
      </p>

      <h2 class="paragraph-default"><?php echo get_the_title( $post ); ?></h2>
    </div>

    <div class="post__read-more-wrapper">

    </div>
  </a>
</article>
