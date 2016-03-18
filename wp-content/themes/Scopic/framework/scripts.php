<?php
/**
 * Enqueues scripts for front-end.
 */
 
function ht_enqueue_scripts() {
	
	/*
	* Load our main theme JavaScript file
	*/
	wp_enqueue_script('ht_theme_custom', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), false, true);
	
	/*
	* Adds JavaScript to pages with the comment form to support
	* sites with threaded comments (when in use).
	*/
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
	}	
	
	/*
	* Load Lightbox Plugin
	*/
	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'ht_theme_custom' ), false, true);
	
	
	
}
add_action('wp_enqueue_scripts', 'ht_enqueue_scripts');


/*
* add ie conditional html5 shim to header
*/
function ht_add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="'. get_template_directory_uri() .'/js/html5.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'ht_add_ie_html5_shim');	

/*
* add ie 6-8 conditional selectivizr to header
*/
function ht_add_ie_selectivizr () {
    echo '<!--[if (gte IE 6)&(lte IE 8)]>';
    echo '<script src="'. get_template_directory_uri() .'/js/selectivizr-min.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'ht_add_ie_selectivizr');	

