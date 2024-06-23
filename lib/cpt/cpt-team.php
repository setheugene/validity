<?php
/**
 * Register the custom post type
 */
if ( ! function_exists('register_team_custom_post_type') ) {

  // Register Custom Post Type
  function register_team_custom_post_type() {

    /*
     * Checks if you've setup a custom page to use as
     * the archive for this post type. To do that, use the
     * commented out block at the bottom to register the settings page.
     * This makes it behave like the default page_for_posts so that
     * content can change the slug to be more seo friendly.
     */
    if (class_exists('ACF')) {
      $id = get_field( 'page_for_team', 'option' );
    }
    $slug = 'team';

    if ( $id ) {
      $slug = ll_get_the_slug( $id );
    }

    $labels = array(
      'name'                => 'Team',
      'singular_name'       => 'Team',
      'menu_name'           => 'Team',
      'parent_item_colon'   => 'Parent Team',
      'all_items'           => 'All Team',
      'view_item'           => 'View Team',
      'add_new_item'        => 'Add New Team',
      'add_new'             => 'New Team',
      'edit_item'           => 'Edit Team',
      'update_item'         => 'Update Team',
      'search_items'        => 'Search Team',
      'not_found'           => 'No Team found',
      'not_found_in_trash'  => 'No Team found in Trash',
    );
    $args = array(
      'label'               => 'Team',
      'description'         => 'Team description',
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
      'menu_icon'           => 'dashicons-groups',
      'can_export'          => true,
      'has_archive'         => false,
      'exclude_from_search' => true,
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'rewrite'             => array( 'slug' => $slug )
    );
    register_post_type( 'll_team', $args );

  }

  // Hook into the 'init' action
  add_action( 'init', 'register_team_custom_post_type', 0 );

}

/**
 * Custom taxonomies
 */
if ( ! function_exists('register_team_taxonomies') ) {

  function register_team_taxonomies() {

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
      'name'                => _x( 'Team Category', 'taxonomy general name' ),
      'singular_name'       => _x( 'Team Category', 'taxonomy singular name' ),
      'search_items'        => __( 'Search Team Categories' ),
      'all_items'           => __( 'All Team Categories' ),
      'parent_item'         => __( 'Parent Team Category' ),
      'parent_item_colon'   => __( 'Parent Team Category:' ),
      'edit_item'           => __( 'Edit Team Category' ),
      'update_item'         => __( 'Update Team Category' ),
      'add_new_item'        => __( 'Add New Team Category' ),
      'new_item_name'       => __( 'New Team Category Name' ),
      'menu_name'           => __( 'Team Categories' )
    );

    $args = array(
      'hierarchical'        => true,
      'labels'              => $labels,
      'show_ui'             => true,
      'show_admin_column'   => true,
      'query_var'           => true,
      'rewrite'             => array( 'slug' => get_field( 'team_category_slug', 'option' ) ?:  'team-category' )
    );

    register_taxonomy( 'll_team_category', array( 'll_team' ), $args ); // Must include custom post type name
  }

  add_action( 'init', 'register_team_taxonomies', 0 );

}

/**
 * Create ACF setting page under CPT menu
 */

if ( function_exists( 'acf_add_options_sub_page' ) ){
  acf_add_options_sub_page(array(
    'page_title' => 'Team Settings',
    'menu_title' => 'Settings',
    'menu_slug'  => 'team-settings',
    'parent'     => 'edit.php?post_type=ll_team',
    'capability' => 'edit_posts'
  ));
}
