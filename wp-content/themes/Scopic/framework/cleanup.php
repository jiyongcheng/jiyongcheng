<?php
/**
* Clean up wp_head()
*
* Remove inline CSS used by Recent Comments widget
*/
function ht_head_cleanup() {
global $wp_widget_factory;
  remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('init', 'ht_head_cleanup');


/**
* Wrap embedded media as suggested by Readability
*
* @link https://gist.github.com/965956
* @link http://www.readability.com/publishers/guidelines#publisher
*/
function ht_embed_wrap($cache, $url, $attr = '', $post_ID = '') {
  return '<div class="entry-content-asset">' . $cache . '</div>';
}
add_filter('embed_oembed_html', 'ht_embed_wrap', 10, 4);


/**
* Add class="thumbnail" to attachment items
*/
function ht_attachment_link_class($html) {
  $postid = get_the_ID();
  $html = str_replace('<a', '<a class="thumbnail"', $html);
  return $html;
}
add_filter('wp_get_attachment_link', 'ht_attachment_link_class', 10, 1);


/**
* Add class if post has thumbnail
*/
function ht_thumb_class($classes) {
	global $post;
	if( has_post_thumbnail($post->ID) ) { $classes[] = 'has_thumb'; }

		return $classes;
}
add_filter('post_class', 'ht_thumb_class');

/**
* Fix for empty search queries redirecting to home page
*
* @link http://wordpress.org/support/topic/blank-search-sends-you-to-the-homepage#post-1772565
* @link http://core.trac.wordpress.org/ticket/11330
*/
function ht_request_filter($query_vars) {
  if (isset($_GET['s']) && empty($_GET['s'])) {
    $query_vars['s'] = ' ';
  }

  return $query_vars;
}
add_filter('request', 'ht_request_filter');


/**
 * Add category ID to menus
 */
function ht_category_nav_class( $classes, $item ){
    if( 'category' == $item->object ){
        $classes[] = 'menu-category-' . $item->object_id;
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'ht_category_nav_class', 10, 2 );

/**
 * Adds a "has-children" class to menu items that have children.
 */
function ht_add_menu_parent_class( $items ) {
 
$parents = array();
foreach ( $items as $item ) {
if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
$parents[] = $item->menu_item_parent;
}
}
 
foreach ( $items as $item ) {
if ( in_array( $item->ID, $parents ) ) {
$item->classes[] = 'has-children';
}
}
 
return $items;
}
add_filter( 'wp_nav_menu_objects', 'ht_add_menu_parent_class' );