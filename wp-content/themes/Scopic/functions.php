<?php
/**
* Scopic Functions and definitions
* by Hero Themes (http://herothemes.com)
*/


/**
* Set the content width based on the theme's design and stylesheet.
*/
if ( ! isset( $content_width ) ) $content_width = 600;

if ( ! function_exists( 'ht_theme_setup' ) ):
/**
* Sets up theme defaults and registers support for various WordPress features.
*/
function ht_theme_setup() {
	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'framework', get_template_directory() . '/languages' );
	

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
			'primary-nav' => __( 'Primary Navigation', 'framework' )
	));
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	 */
	add_editor_style( 'css/editor-style.css' );
	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * This theme supports some post formats.
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	
	// Enable support for Post Thumbnails

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 60, 60, true );
	add_image_size( 'post', 800, '', true );
	add_image_size( 'gallery', 320, 200, true );
	
	
	// Add custom background support
	//$defaults = array('default-color' => '#f2f2f2'	);
	//add_theme_support( 'custom-background', $defaults );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
	
}
endif; // ht_theme_setup
add_action( 'after_setup_theme', 'ht_theme_setup' );


/**
* Cleanup Functions
*/
 
require("framework/cleanup.php");

/**
* WordPress Gallery Function
*/
 
require("framework/wordpress-gallery.php");

/**
* Enqueues scripts and styles for front-end.
*/
 
require("framework/scripts.php");
require("framework/styles.php");

/**
 * Register widgetized & Add Widgets
 */

require("framework/register-sidebars.php");

// Custom Widgets
require("framework/widgets/widget-functions.php");


// Theme Customizer
require("framework/theme-customizer.php");


// Meta box path and URL
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/framework/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/framework/meta-box' ) );
// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';
// Include the meta box definition
include 'framework/post-meta.php';


/**
* Add Template Navigation Functions
*/
require("framework/template-tags.php");


/**
* Comment Functions
*/
require("framework/comment-functions.php");


/**
 * Custom excerpt length
 */
function custom_excerpt_length( $length ) {
	return 26;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
* Post Format Functions
*/
require("framework/post-formats.php");


/**
* Editor Styles Functionality
*/
require("framework/editor-styles.php");


// add clearfix to post class
	function category_id_class($classes) {
	    global $post;
		$classes[] = 'clearfix';
	    return $classes;
	}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');