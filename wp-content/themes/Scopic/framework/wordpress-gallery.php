<?php
/**
* Customized gallery_shortcode()
*
*/
function ht_gallery($attr) {
  $post = get_post();

  static $instance = 0;
  $instance++;

  if (!empty($attr['ids'])) {
    if (empty($attr['orderby'])) {
      $attr['orderby'] = 'post__in';
    }
    $attr['include'] = $attr['ids'];
  }

  $output = apply_filters('post_gallery', '', $attr);

  if ($output != '') {
    return $output;
  }

  if (isset($attr['orderby'])) {
    $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
    if (!$attr['orderby']) {
      unset($attr['orderby']);
    }
  }

  extract(shortcode_atts(array(
    'order' => 'ASC',
    'orderby' => 'menu_order ID',
    'id' => $post->ID,
    'itemtag' => '',
    'icontag' => '',
    'captiontag' => '',
    'columns' => 3,
    'size' => 'gallery',
    'include' => '',
    'exclude' => ''
  ), $attr));

  $id = intval($id);

  if ($order === 'RAND') {
    $orderby = 'none';
  }

  if (!empty($include)) {
    $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

    $attachments = array();
    foreach ($_attachments as $key => $val) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif (!empty($exclude)) {
    $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  } else {
    $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  }

  if (empty($attachments)) {
    return '';
  }

  if (is_feed()) {
    $output = "\n";
    foreach ($attachments as $att_id => $attachment) {
      $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    }
    return $output;
  }

  $output = '<ul class="gallery gallery-columns-'.$columns.' clearfix">';

  $i = 0;
  foreach ($attachments as $id => $attachment) {
    $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
	
	$attachment_image = wp_get_attachment_image( $id, $size );
	$attachment_page = get_attachment_link($id);
	$attachment_url = wp_get_attachment_url( $id );

    $output .= '<li><figure class="gallery-item">' . $attachment_image;
    if (trim($attachment->post_excerpt)) {
      $output .= '<figcaption class="wp-caption-text gallery-item-caption"><div class="caption-content"><a href="'. $attachment_url .'" rel="nofollow"><i class="icon-search"></i></a><h3 class="caption-title">' . wptexturize($attachment->post_excerpt) . '</h3></div></figcaption>';
    } else {
		$output .= '<figcaption class="wp-caption-text gallery-item-caption"><div class="caption-content"><a href="'. $attachment_url .'" rel="nofollow"><i class="icon-search"></i></a></div></figcaption>';
	}
    $output .= '</figure></li>';
  }

  $output .= '</ul>';

  return $output;
}
  remove_shortcode('gallery');
  add_shortcode('gallery', 'ht_gallery');

