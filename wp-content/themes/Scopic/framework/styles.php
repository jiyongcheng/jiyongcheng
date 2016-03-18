<?php
/**
 * Enqueues styles for front-end.
 */
function ht_theme_styles() {
	global $wp_styles;
	
	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
	

	/*
	 * Loads our Google Font.
	 */
	 
		$subsets = 'latin,latin-ext';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400,400italic,600,600italic',
			'subset' => $subsets,
		);
	wp_enqueue_style( 'theme-font', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );

	
	/*
	* Add font awesome CSS
	*/
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array('theme-style') );
	wp_enqueue_style( 'font-awesome-ie7', get_template_directory_uri() . '/css/font-awesome-ie7.min.css', array('font-awesome')  );
    $wp_styles->add_data( 'font-awesome-ie7', 'conditional', 'lte IE 7' );
	
	/*
	* Add Lightbox CSS
	*/
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array('theme-style') );

	
	/*
	* Load theme custom colors
	*/
	
	
	//Theme variables from theme customizer
	$ht_styling_themecolor = get_theme_mod( 'ht_styling_themecolor', '#EC4B36' );
	
	// Convert theme colors from hex to rgb
	$ht_styling_themecolor_rgb = hex2rgb( $ht_styling_themecolor );
	
	// Add custom styles
	$custom_css = "
	a, a:visited, a:hover, 
	.comment-action i {color: {$ht_styling_themecolor};}
	input[type='submit'], 
	input[type='button'], 
	.paging-navigation li a:hover, 
	.hentry .entry-header:after, 
	.hentry .entry-footer:before, 
	.hentry .hentry-box > .entry-quote, 
	.hentry .entry-link, 
	.hentry .entry-status,
	#site-header #logo,
	.hentry .entry-date,
	.paging-navigation:after,
	#timeline > li .hentry:before {
		background: {$ht_styling_themecolor};
	}
	.entry-content a:hover, 
	.entry-content blockquote, 
	p.pullquote-left, 
	p.pullquote-right,
	#social-icons li a:hover,
	#nav-primary > ul > li:hover > a {
		border-color: {$ht_styling_themecolor};
	}
	#social-icons li a:hover,
	#nav-primary > ul > li:hover > a,
	#nav-primary ul ul li a:hover {
		color: {$ht_styling_themecolor};
	}
	.hentry .entry-thumb-caption, .gallery .gallery-item-caption {
	background: {$ht_styling_themecolor};
	background: rgba({$ht_styling_themecolor_rgb[0]},{$ht_styling_themecolor_rgb[1]},{$ht_styling_themecolor_rgb[2]},0.8);
	}
	";
		
	wp_add_inline_style('theme-style',$custom_css);
		
	
}
add_action( 'wp_enqueue_scripts', 'ht_theme_styles' );

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}



function ht_admin_theme_styles($hook) {
	
	$subsets = 'latin,latin-ext';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400,400italic,600,600italic',
			'subset' => $subsets,
		);
	if ($hook == 'post.php' || $hook == 'post-new.php') {
		wp_enqueue_style( 'theme-font', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}
}
add_action('admin_print_styles', 'ht_admin_theme_styles');