<?php
/**
 * Register the custom post type
 */
if ( ! function_exists('register_videos_custom_post_type') ) {

  // Register Custom Post Type
  function register_videos_custom_post_type() {

    /*
     * Checks if you've setup a custom page to use as
     * the archive for this post type. To do that, use the
     * commented out block at the bottom to register the settings page.
     * This makes it behave like the default page_for_posts so that
     * content can change the slug to be more seo friendly.
     */
    if (class_exists('ACF')) {
      $id = get_field( 'page_for_videos', 'option' );
    }
    $slug = 'videos';

    if ( $id ) {
      $slug = ll_get_the_slug( $id );
    }

    $labels = array(
      'name'                => 'Videos',
      'singular_name'       => 'Videos',
      'menu_name'           => 'Videos',
      'parent_item_colon'   => 'Parent Videos',
      'all_items'           => 'All Videos',
      'view_item'           => 'View Videos',
      'add_new_item'        => 'Add New Videos',
      'add_new'             => 'New Videos',
      'edit_item'           => 'Edit Videos',
      'update_item'         => 'Update Videos',
      'search_items'        => 'Search Videos',
      'not_found'           => 'No Videos found',
      'not_found_in_trash'  => 'No Videos found in Trash',
    );
    $args = array(
      'label'               => 'Videos',
      'description'         => 'Videos description',
      'labels'              => $labels,
      'supports'            => array( 'title', 'page-attributes', 'thumbnail' ), // 'editor', 'thumbnail'
      // 'taxonomies'          => array( 'category', 'post_tag' ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => false,
      'show_in_admin_bar'   => true,
      'menu_position'       => 20,
      'menu_icon'           => 'dashicons-format-video',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => true, // false if using taxonomy pages
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'rewrite'             => array( 'slug' => $slug )
    );
    register_post_type( 'll_videos', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_videos_custom_post_type', 0 );

}

/**
 * Custom taxonomies
 */
if ( ! function_exists('register_videos_taxonomies') ) {

  function register_videos_taxonomies() {

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'                => _x( 'Video Category', 'taxonomy general name' ),
      'singular_name'       => _x( 'Video Category', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Video Categories' ),
      'all_items'           => __( 'All Video Categories' ),
      'parent_item'         => __( 'Parent Video Category' ),
      'parent_item_colon'   => __( 'Parent Video Category:' ),
      'edit_item'           => __( 'Edit Video Category' ),
      'update_item'         => __( 'Update Video Category' ),
      'add_new_item'        => __( 'Add New Video Category' ),
      'new_item_name'       => __( 'New Video Category Name' ),
      'menu_name'           => __( 'Video Categories' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => get_field( 'videos_category_slug', 'option' ) ?:  'video-category' )
    );

    register_taxonomy( 'll_video_category', array( 'll_videos' ), $args ); // Must include custom post type name

  }

  add_action( 'init', 'register_videos_taxonomies', 0 );

}

/**
 * Create ACF setting page under CPT menu
 */

// if ( function_exists( 'acf_add_options_sub_page' ) ){
//   acf_add_options_sub_page(array(
//     'page_title' => 'Videos Settings',
//     'menu_title' => 'Settings',
//     'menu_slug'  => 'videos-settings',
//     'parent'     => 'edit.php?post_type=ll_videos',
//     'capability' => 'edit_posts'
//   ));
// }



