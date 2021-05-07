<?php

/**
 * Women Owned Wineries Sonoma functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('women_owned_wineries_sonoma_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function women_owned_wineries_sonoma_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Women Owned Wineries Sonoma, use a find and replace
		 * to change 'women-owned-wineries-sonoma' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('women-owned-wineries-sonoma', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'women-owned-wineries-sonoma'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'women_owned_wineries_sonoma_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'women_owned_wineries_sonoma_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function women_owned_wineries_sonoma_content_width()
{
	$GLOBALS['content_width'] = apply_filters('women_owned_wineries_sonoma_content_width', 640);
}
add_action('after_setup_theme', 'women_owned_wineries_sonoma_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function women_owned_wineries_sonoma_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'women-owned-wineries-sonoma'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'women-owned-wineries-sonoma'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'women_owned_wineries_sonoma_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function women_owned_wineries_sonoma_scripts()
{
	wp_enqueue_style('women-owned-wineries-sonoma-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('women-owned-wineries-sonoma-style', 'rtl', 'replace');

	wp_enqueue_script('site', get_template_directory_uri() . '/js/site.js', array('jquery'), true);

	wp_enqueue_script('splide', get_template_directory_uri() . '/js/splide.min.js', array(), true);

	if (is_home()) {
		wp_enqueue_script('splide');
	}
}
add_action('wp_enqueue_scripts', 'women_owned_wineries_sonoma_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom post types.
 */
require_once('inc/custom-post-types.php');

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// disable fartenberg
// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

// More attractive ellipsis

function pretty_ellipsis($more)
{
	return '...';
}
add_filter('excerpt_more', 'pretty_ellipsis');

// Change the_excerpt_length

function custom_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

// Hide Posts  in dashboard sidebar

function post_remove () { 
   remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');   //adding action for triggering function call

// Sanitize phone numbers
function sanitize_phone( $phone, $international = false ) {
	$format = "/(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/";
	
	$alt_format = '/^(\+\s*)?((0{0,2}1{1,3}[^\d]+)?\(?\s*([2-9][0-9]{2})\s*[^\d]?\s*([2-9][0-9]{2})\s*[^\d]?\s*([\d]{4})){1}(\s*([[:alpha:]#][^\d]*\d.*))?$/';

	// Trim & Clean extension
    $phone = trim( $phone );
    $phone = preg_replace( '/\s+(#|x|ext(ension)?)\.?:?\s*(\d+)/', ' ext \3', $phone );

    if ( preg_match( $alt_format, $phone, $matches ) ) {
        return '(' . $matches[4] . ') ' . $matches[5] . '-' . $matches[6] . ( !empty( $matches[8] ) ? ' ' . $matches[8] : '' );
    } elseif( preg_match( $format, $phone, $matches ) ) {

    	// format
    	$phone = preg_replace( $format, "($2) $3-$4", $phone );

    	// Remove likely has a preceding dash
    	$phone = ltrim( $phone, '-' );

    	// Remove empty area codes
    	if ( false !== strpos( trim( $phone ), '()', 0 ) ) { 
    		$phone = ltrim( trim( $phone ), '()' );
    	}

    	// Trim and remove double spaces created
    	return preg_replace('/\\s+/', ' ', trim( $phone ));
    }

    return false;
}

// Alphabetical search results

function abc_search( $query ) {
	if( $query->is_search && !is_admin() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	}
}
add_filter( 'pre_get_posts','abc_search' );

// All search results

function change_wp_search_size($query) {
    if ( $query->is_search ) // Make sure it is a search page
        $query->query_vars['posts_per_page'] = -1; // Change 10 to the number of posts you would like to show

    return $query; // Return our modified query variables
}
add_filter('pre_get_posts', 'change_wp_search_size'); // Hook our custom function onto the request filter

// Tell SearchWP to index both value and label from ACF Select field.
add_filter( 'searchwp\source\post\attributes\meta', function( $meta_value, $args ) {
	$acf_field_name = 'state'; // ACF Select field name.

	if ( $acf_field_name !== substr( $args['meta_key'], strlen( $args['meta_key'] ) - strlen( $acf_field_name ) ) ) {
		return $meta_value;
	}

	if ( ! is_array( $meta_value ) ) {
		$meta_value = [ $meta_value ];
	}

	$acf_field_object = get_field_object( $acf_field_name, $args['post_id'] );

	// Append the Select label to the Select value.
	if ( isset( $acf_field_object['choices'] ) ) {
		foreach ( $meta_value as $key => $val ) {
			if ( isset( $acf_field_object['choices'][ $val ] ) ) {
				$meta_value[ $key ] .= ' ' . (string) $acf_field_object['choices'][ $val ];
			}
		}
	}

	return $meta_value;
}, 20, 2 );


//options pages
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Global Settings',
		'menu_title'	=> 'Global Settings',
		'menu_slug' 	=> 'global-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'post_id'		=> 'theme',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Winery Archive Settings',
		'menu_title'	=> 'Wineries',
		'parent_slug'	=> 'global-settings',
		'post_id'		=> 'wineries-theme',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Interview Archive Settings',
		'menu_title'	=> 'Interviews',
		'parent_slug'	=> 'global-settings',
		'post_id'		=> 'interviews-theme',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Team Member Settings',
		'menu_title'	=> 'Team Members',
		'parent_slug'	=> 'global-settings',
		'post_id'		=> 'team-members-theme',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Wine Club Settings',
		'menu_title'	=> 'Wine Clubs',
		'parent_slug'	=> 'global-settings',
		'post_id'		=> 'wine-club-theme',
	));
}