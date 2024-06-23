<?php
$hide_sidebar = get_field( 'blog_hide_sidebar', get_option('page_for_posts') );
$blog_headings = get_field( 'blog_headings', get_option('page_for_posts') );
$featured_post = get_field( 'blog_featured_post', get_option('page_for_posts') );

?>
<div class="blog-page">
  <?php
    ll_include_component(
      'mini-hero',
      [
        'subtitle' => ['heading' => $blog_headings['small_heading']],
        'title'    => ['heading' => $blog_headings['large_heading']],
      ],
    );
  ?>
  <div class="container">
    <div class="row">
      <div class="w-full col xl:w-11/12">
        <div class="blog__columns">
          <?php if ( ! $hide_sidebar ) : ?>
            <div class="blog__sidebar">
              <?php get_template_part('templates/partials/blog-sidebar'); ?>
            </div>
          <?php endif; ?>

          <div class="blog__posts <?php echo $hide_sidebar ? 'lg:col-span-3' : 'lg:col-span-2'; ?>">
            <?php if (!have_posts()) : ?>
              <div class="alert alert-warning">
                <?php _e('Sorry, no results were found.', 'roots'); ?>
              </div>
              <?php get_search_form(); ?>
            <?php endif; ?>

            <?php if ( $featured_post && (!is_category() && !is_tag()) ) : ?>
              <div class="mb-10 blog__featured-post">
                <?php
                  ll_include_component(
                    'content',
                    array(
                      'post' => $featured_post
                    ),
                    array(
                      'classes' => ['featured-post']
                    )
                  );
                ?>
              </div>
            <?php endif; ?>

            <div class="grid gap-y-12 lg:grid-cols-2 gap-x-gutter-full blog__posts-grid">
              <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('templates/contents/content'); ?>
              <?php endwhile; ?>
            </div>

            <?php if ($wp_query->max_num_pages > 1) : ?>
              <nav class="blog__pagination">
                <?php
                  echo paginate_links( array(
                    'format'  => 'page/%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total'   => $wp_query->max_num_pages,
                    'mid_size'        => 5,
                    'prev_text'       => __('<div class="flex items-center justify-center w-8 h-8 duration-200 rounded-full bg-brand-deep-green hover:bg-brand-light-green-3"><svg class="text-white icon icon-chevron-left"><use xlink:href="#icon-chevron-left"></use></svg></div>'),
                    'next_text'       => __('<div class="flex items-center justify-center w-8 h-8 duration-200 rounded-full bg-brand-deep-green hover:bg-brand-light-green-3"><svg class="text-white icon icon-chevron-right"><use xlink:href="#icon-chevron-right"></use></svg></div>')
                  ) );
                ?>
              </nav>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
