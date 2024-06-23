<?php
$hide_sidebar = get_field( 'blog_hide_sidebar', get_option('page_for_posts') );
$add_breadcrumbs = get_field( 'blog_breadcrumbs', get_option('page_for_posts') );
$back_link = '<a class="block mb-10 blog__back-btn" href="'.get_permalink(get_option('page_for_posts')).'"><svg class="mr-3 duration-200 icon icon-arrow-left text-brand-deep-green"><use xlink:href="#icon-arrow-left"></use></svg><span class="paragraph-small text-brand-deep-green">Blog Roll</span></a>';

$args = array(
  'post_type'       => 'post',
  'post_status'     => 'publish',
  'orderby'         => 'menu_order',
  'order'           => 'ASC',
  'posts_per_page'  => 2,
  'post__not_in' => [ get_the_ID() ],
  'tax_query'       => [
    [
      'taxonomy'      => 'category',
      'field'         => 'term_id',
      'terms'         => get_queried_object_id(),
      'operator'       => '='
    ]
  ]
);

$related_posts = new WP_Query( $args );
?>

<div class="blog-page blog-page--single" data-component="blog">
  <div class="container">
    <div class="row">
      <div class="w-full col xl:w-11/12">
        <div class="single-blog__columns">
          <?php if ( ! $hide_sidebar ) : ?>
            <div class="blog__sidebar">
            <?php if ( !$add_breadcrumbs ) : ?>
              <div class="hidden lg:block"><?php echo $back_link; ?></div>
            <?php endif; ?>
              <?php get_template_part('templates/partials/blog-sidebar'); ?>
            </div>
          <?php endif; ?>

          <div class="blog__post <?php echo $hide_sidebar ? 'lg:col-span-3' : 'lg:col-span-1'; ?>">
            <?php if ( !$add_breadcrumbs ) : ?>
              <div class="<?php echo $hide_sidebar ? '' : 'lg:hidden'; ?>">
                <?php echo $back_link; ?>
              </div>
            <?php endif; ?>

            <article <?php post_class(); ?>>
              <?php if ( $add_breadcrumbs && function_exists('yoast_breadcrumb') ) : ?>
                <div class="flex justify-center text-center">
                  <?php yoast_breadcrumb(); ?>
                </div>
              <?php endif; ?>
              <div class="text-center text-brand-off-black">
                <?php
                  $small_heading = get_field( 'post_small_heading' );
                  $heading_tag = (empty($small_heading['tag']) || $small_heading['tag'] !== 'h1') ? 'h1' : 'h2';
                ?>

                <?php if ( ! empty($small_heading['text']) ) : ?>
                  <<?php echo $small_heading['tag']; ?> class="mb-5 hdg-6"><?php echo $small_heading['text']; ?></<?php echo $small_heading['tag']; ?>>
                <?php endif; ?>


                <<?php echo $heading_tag; ?> class="mb-3 hdg-2">
                <?php echo get_the_title(); ?>
                </<?php echo $heading_tag; ?>>
              </div>

              <div class="single-post__meta">
                <p><?php echo get_the_date(); ?></p>
              </div>

              <div class="post">
                <?php if ( get_post_thumbnail_id() ) : ?>
                  <div class="relative mb-12 aspect-3/2">
                    <?php
                      ll_include_component(
                        'fit-image',
                        array(
                          'image_id' => get_post_thumbnail_id(),
                          'position' => 'object-center'
                        ),
                        array(

                        )
                      );
                    ?>
                  </div>
                <?php endif; ?>

                <div class="wysiwyg">
                  <?php the_content(); ?>
                </div>
              </div>
            </article>

            <div class="grid mt-12 gap-y-8 lg:grid-cols-2 single-post__footer gap-x-gutter-full">
              <?php if ( $related_posts->have_posts() ) : ?>
                <div class="lg:col-span-2 blog__footer-block blog__block blog__block--related">
                  <h2 class="mb-6 hdg-3 text-brand-off-black">Related Posts</h2>

                  <div class="grid grid-cols-2 gap-y-12 gap-x-gutter-full">
                    <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                      <?php get_template_part('templates/contents/content'); ?>
                    <?php endwhile; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

