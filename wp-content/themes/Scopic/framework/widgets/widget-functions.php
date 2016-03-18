<?php

// Allow Shortcodes in widgets
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');

// Add Custom Posts Widget
require("widget-posts.php");

// Add Custom Flickr Widget
require("widget-flickr.php");

 
/**
 * Modify Exsisting Widgets
 */ 
 function st_custom_tag_cloud_widget($args) {
	$args['largest'] = 13; //largest tag
	$args['smallest'] = 8; //smallest tag
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'st_custom_tag_cloud_widget' );

add_filter('wp_list_categories', 'add_span_cat_count');
function add_span_cat_count($links) {
$links = str_replace('</a> (', '</a> <span>', $links);
$links = str_replace(')', '</span>', $links);
return $links;
}
