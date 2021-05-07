<?php
  /**
   * Register custom post types.

   * @link http://codex.wordpress.org/Function_Reference/register_post_type
   */

  // Flush rewrite rules for custom post types
  add_action( 'after_switch_theme', 'frr' );

  // Flush your rewrite rules
  function frr() {
    flush_rewrite_rules();
  }

/*
  Post Types
*/

// Register Wineries post type
add_action( 'init', 'wineries_init' );
function wineries_init() {
  // Set labels to $labels
  $labels = array(
    'name'               => _x( 'Winery', 'post type general name'),
    'singular_name'      => _x( 'Winery', 'post type singular name'),
    'menu_name'          => _x( 'Wineries', 'admin menu'),
    'name_admin_bar'     => _x( 'Winery', 'add new on admin bar'),
    'add_new'            => _x( 'Add New', 'winery'),
    'add_new_item'       => __( 'Add New Winery'),
    'new_item'           => __( 'New Winery'),
    'edit_item'          => __( 'Edit Winery'),
    'view_item'          => __( 'View Winery'),
    'all_items'          => __( 'All Wineries'),
    'search_items'       => __( 'Search Wineries'),
    'parent_item_colon'  => __( 'Parent Wineries'),
    'not_found'          => __( 'No event found.'),
    'not_found_in_trash' => __( 'No event found in Trash.')
  );
  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Winery posts.'),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => true,
    'show_in_admin_bar'  => true,
    'menu_position'      => 5,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'wineries' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'menu_icon'          => 'dashicons-businesswoman',
    'hierarchical'       => false,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
  );

  register_post_type( 'wineries', $args );
}

// Register Featured Bottles post type
add_action( 'init', 'featured_bottles_init' );
function featured_bottles_init() {
  // Set labels to $labels
  $labels = array(
    'name'               => _x( 'Featured Bottle', 'post type general name'),
    'singular_name'      => _x( 'Featured Bottle', 'post type singular name'),
    'menu_name'          => _x( 'Featured Bottle', 'admin menu'),
    'name_admin_bar'     => _x( 'Featured Bottle', 'add new on admin bar'),
    'add_new'            => _x( 'Add New', 'Featured Bottle'),
    'add_new_item'       => __( 'Add New Featured Bottle'),
    'new_item'           => __( 'New Featured Bottle'),
    'edit_item'          => __( 'Edit Featured Bottle'),
    'view_item'          => __( 'View Featured Bottle'),
    'all_items'          => __( 'All Featured Bottle'),
    'search_items'       => __( 'Search Featured Bottle'),
    'parent_item_colon'  => __( 'Parent Featured Bottle'),
    'not_found'          => __( 'No event found.'),
    'not_found_in_trash' => __( 'No event found in Trash.')
  );
  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Featured Bottle posts.'),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => true,
    'show_in_admin_bar'  => true,
    'menu_position'      => 5,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'featured-bottles' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'menu_icon'          => 'dashicons-awards',
    'hierarchical'       => false,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
    // 'taxonomies' => array( '' ),

  );

  register_post_type( 'featured-bottles', $args );
} 

// Register Interviews post type
add_action( 'init', 'interviews_init' );
function interviews_init() {
  // Set labels to $labels
  $labels = array(
    'name'               => _x( 'Interview', 'post type general name'),
    'singular_name'      => _x( 'Interview', 'post type singular name'),
    'menu_name'          => _x( 'Interviews', 'admin menu'),
    'name_admin_bar'     => _x( 'Interview', 'add new on admin bar'),
    'add_new'            => _x( 'Add New', 'interview'),
    'add_new_item'       => __( 'Add New Interview'),
    'new_item'           => __( 'New Interview'),
    'edit_item'          => __( 'Edit Interview'),
    'view_item'          => __( 'View Interview'),
    'all_items'          => __( 'All Interviews'),
    'search_items'       => __( 'Search Interviews'),
    'parent_item_colon'  => __( 'Parent Interviews'),
    'not_found'          => __( 'No event found.'),
    'not_found_in_trash' => __( 'No event found in Trash.')
  );
  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Interview posts.'),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => true,
    'show_in_admin_bar'  => true,
    'menu_position'      => 5,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'interviews' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'menu_icon'          => 'dashicons-admin-comments',
    'hierarchical'       => false,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
  );

  register_post_type( 'interviews', $args );
} 


// Register Wine Club post type
add_action( 'init', 'wine_club_init' );
function wine_club_init() {
  // Set labels to $labels
  $labels = array(
    'name'               => _x( 'Wine Club', 'post type general name'),
    'singular_name'      => _x( 'Wine Club', 'post type singular name'),
    'menu_name'          => _x( 'Wine Clubs', 'admin menu'),
    'name_admin_bar'     => _x( 'Wine Club', 'add new on admin bar'),
    'add_new'            => _x( 'Add New', 'wine club'),
    'add_new_item'       => __( 'Add New Wine Club'),
    'new_item'           => __( 'New Wine Club'),
    'edit_item'          => __( 'Edit Wine Club'),
    'view_item'          => __( 'View Wine Club'),
    'all_items'          => __( 'All Wine Clubs'),
    'search_items'       => __( 'Search Wine Clubs'),
    'parent_item_colon'  => __( 'Parent Wine Clubs'),
    'not_found'          => __( 'No event found.'),
    'not_found_in_trash' => __( 'No event found in Trash.')
  );
  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Wine Club posts.'),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => true,
    'show_in_admin_bar'  => true,
    'menu_position'      => 5,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'wine-club' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'menu_icon'          => 'dashicons-archive',
    'hierarchical'       => false,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
  );

  register_post_type( 'wine-club', $args );
} 

// Register Press post type
add_action( 'init', 'press_init' );
function press_init() {
  // Set labels to $labels
  $labels = array(
    'name'               => _x( 'Press', 'post type general name'),
    'singular_name'      => _x( 'Press', 'post type singular name'),
    'menu_name'          => _x( 'Press', 'admin menu'),
    'name_admin_bar'     => _x( 'Press', 'add new on admin bar'),
    'add_new'            => _x( 'Add New', 'press'),
    'add_new_item'       => __( 'Add New Press'),
    'new_item'           => __( 'New Press'),
    'edit_item'          => __( 'Edit Press'),
    'view_item'          => __( 'View Press'),
    'all_items'          => __( 'All Press'),
    'search_items'       => __( 'Search Press'),
    'parent_item_colon'  => __( 'Parent Press'),
    'not_found'          => __( 'No event found.'),
    'not_found_in_trash' => __( 'No event found in Trash.')
  );
  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Press posts.'),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => true,
    'show_in_admin_bar'  => true,
    'menu_position'      => 5,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'press' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'menu_icon'          => 'dashicons-admin-site',
    'hierarchical'       => false,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
  );

  register_post_type( 'press', $args );
} 


// CUSTOM TAXONOMIES


// Create Taxonomy for Featured Bottles
add_action( 'init', 'create_regions_taxonomy', 0 );
 
// Create a custom taxonomy named region
function create_regions_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Regions', 'taxonomy general name' ),
    'singular_name' => _x( 'Region', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Regions' ),
    'all_items' => __( 'All Regions' ),
    'parent_item' => __( 'Parent Region' ),
    'parent_item_colon' => __( 'Parent Region:' ),
    'edit_item' => __( 'Edit Region' ), 
    'update_item' => __( 'Update Region' ),
    'add_new_item' => __( 'Add New Region' ),
    'new_item_name' => __( 'New egions Name' ),
    'menu_name' => __( 'Regions' ),
  ); 	
 
  register_taxonomy('regions',array('featured-bottles', 'interviews'), array(
    'has_archive' => true,
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'region' ),
  ));
}

// Create Taxonomy for Featured Bottles
add_action( 'init', 'create_varietals_taxonomy', 0 );
 
// Create a custom taxonomy named region
function create_varietals_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Varietals', 'taxonomy general name' ),
    'singular_name' => _x( 'Varietal', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Varietals' ),
    'all_items' => __( 'All Varietals' ),
    'parent_item' => __( 'Parent Varietal' ),
    'parent_item_colon' => __( 'Parent Varietal:' ),
    'edit_item' => __( 'Edit Varietal' ), 
    'update_item' => __( 'Update Varietal' ),
    'add_new_item' => __( 'Add New Varietal' ),
    'new_item_name' => __( 'New Varietals Name' ),
    'menu_name' => __( 'Varietals' ),
  ); 	
 
  register_taxonomy('varietals',array('featured-bottles', 'wineries'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'varietal' ),
  ));
}

?>
