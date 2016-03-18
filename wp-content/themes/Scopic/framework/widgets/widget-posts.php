<?php

class HT_Posts_Widget extends WP_Widget {

/*--------------------------------------------------*/
/* Constructor
/*--------------------------------------------------*/

/**
* Specifies the classname and description, instantiates the widget,
* loads localization files, and includes necessary stylesheets and JavaScript.
*/
public function __construct() {

// TODO: update classname and description
parent::__construct(
'ht-posts-widget',
__( 'Custom Posts Widget', 'framework' ),
array(
'classname'	=>	'ht_posts_widget',
'description'	=>	__( 'A widget for displaying posts.', 'framework' )
)
);

} // end constructor

/*--------------------------------------------------*/
/* Widget API Functions
/*--------------------------------------------------*/

/**
* Outputs the content of the widget.
*
* @param array args The array of form elements
* @param array instance The current instance of the widget
*/
public function widget( $args, $instance ) {

extract( $args, EXTR_SKIP );

$title = $instance['title'];

  $valid_sort_orders = array('date', 'title', 'comment_count', 'random');
  if ( in_array($instance['sort_by'], $valid_sort_orders) ) {
    $sort_by = $instance['sort_by'];
    $sort_order = (bool) $instance['asc_sort_order'] ? 'ASC' : 'DESC';
  } else {
    // by default, display latest first
    $sort_by = 'date';
    $sort_order = 'DESC';
  }

// query array  
$args = array(
	'orderby' => $sort_by,
	'order' => $sort_order,
	'posts_per_page' => $instance["num"],
	'ignore_sticky_posts' => 1
);  	

echo $before_widget;

if ( $title )
echo $before_title . $title . $after_title;

$wp_query = new WP_Query($args);
if($wp_query->have_posts()) :
?>

<ul class="clearfix">

<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>

  <li class="clearfix <?php if ($instance["thumb"]) {  ?>has-thumb<?php }  ?>"> 

<?php if ( (function_exists('has_post_thumbnail'))&& $instance["thumb"]) {  ?>
<?php if ( (has_post_thumbnail())  ) {  ?>
	<div class="widget-entry-thumb">
		<a href="<?php the_permalink(); ?>" rel="nofollow">
		<?php the_post_thumbnail(); ?>
		</a>
	</div>
<?php } else { ?>
	<div class="widget-entry-thumb no-thumb <?php echo get_post_format() ?>">
		<a href="<?php the_permalink(); ?>" rel="nofollow"><i class="icon-file-text-alt"></i></a>
	</div>
<?php } // Has thumb ?>
<?php } //Show thumbnail ?>

<a class="widget-entry-title" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>

<?php if ( $instance['date'] || $instance['comment_num'] ) { ?>
    <ul class="widget-entry-meta">
    <?php if ( $instance['date'] ) : ?>
    <li class="entry-date"><i class="icon-time"></i><time datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo ht_entry_date(); ?></time></li>
    <?php endif; ?>
    <?php if ( $instance['comment_num'] ) : ?>
    <?php $number = get_comments_number(get_the_ID()); 
	if ($number != 0) {	?>
    <li class="entry-time"><i class="icon-comments"></i><?php comments_number(); ?></li>
    <?php } ?>
    <?php endif; ?>
    </ul>
    <?php } ?>
  </li>
 <?php endwhile; ?>
</ul>

<?php endif; wp_reset_query();


echo $after_widget;

} // end widget

/**
* Processes the widget's options to be saved.
*
* @param array new_instance The previous instance of values before the update.
* @param array old_instance The new instance of values to be generated via the update.
*/
public function update( $new_instance, $old_instance ) {

$instance = $old_instance;

// TODO: Here is where you update your widget's old values with the new, incoming values
$instance['title'] = strip_tags( $new_instance['title'] );
$instance['num'] = $new_instance['num'];
$instance['sort_by'] = $new_instance['sort_by'];
$instance['asc_sort_order'] = $new_instance['asc_sort_order'] ? 1 : 0;
$instance['comment_num'] = $new_instance['comment_num'] ? 1 : 0;
$instance['date'] = $new_instance['date'] ? 1 : 0;
$instance['thumb'] = $new_instance['thumb'] ? 1 : 0;

return $instance;

} // end widget

/**
* Generates the administration form for the widget.
*
* @param array instance The array of keys and values for the widget.
*/
public function form( $instance ) {

     // TODO: Define default values for your variables
$defaults = array(
	'title' => '最新文章',
	'num' => '5',
	'sort_by' => '',
	'asc_sort_order' => '',
	'comment_num' => '',
	'date' => '',
	'thumb' => true,
);
$instance = wp_parse_args((array) $instance, $defaults);

// Store the values of the widget in their own variable

$title = strip_tags($instance['title']);
$num = $instance['num'];
$sort_by = $instance['sort_by'];
$asc_sort_order = $instance['asc_sort_order'];
$comment_num = $instance['comment_num'];
$date = $instance['date'];
$thumb = $instance['thumb'];
?>
<label for="<?php echo $this->get_field_id("title"); ?>">
  <?php _e( 'Title', 'framework' ); ?>
  :
  <input class="widefat" id="<?php echo $this->get_field_id("title"); ?>" name="<?php echo $this->get_field_name("title"); ?>" type="text" value="<?php echo esc_attr($instance["title"]); ?>" />
</label>
</p>
<p>
  <label for="<?php echo $this->get_field_id("num"); ?>">
    <?php _e( 'Number of posts to show', 'framework' ); ?>
    :
    <input style="text-align: center;" id="<?php echo $this->get_field_id("num"); ?>" name="<?php echo $this->get_field_name("num"); ?>" type="text" value="<?php echo absint($instance["num"]); ?>" size='3' />
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id("sort_by"); ?>">
    <?php _e( 'Sort by', 'framework' ); ?>
    :
    <select id="<?php echo $this->get_field_id("sort_by"); ?>" name="<?php echo $this->get_field_name("sort_by"); ?>">
      <option value="date"<?php selected( $instance["sort_by"], "date" ); ?>><?php _e( 'Date', 'framework' ); ?></option>
      <option value="title"<?php selected( $instance["sort_by"], "title" ); ?>><?php _e( 'Title', 'framework' ); ?></option>
      <option value="comment_count"<?php selected( $instance["sort_by"], "comment_count" ); ?>><?php _e( 'Number of comments', 'framework' ); ?></option>
      <option value="random"<?php selected( $instance["sort_by"], "random" ); ?>><?php _e( 'Random', 'framework' ); ?></option>
    </select>
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id("asc_sort_order"); ?>">
    <input type="checkbox" class="checkbox"
id="<?php echo $this->get_field_id("asc_sort_order"); ?>"
name="<?php echo $this->get_field_name("asc_sort_order"); ?>"
<?php checked( (bool) $instance["asc_sort_order"], true ); ?> />
    <?php _e( 'Reverse sort order (ascending)', 'framework' ); ?>
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id("comment_num"); ?>">
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("comment_num"); ?>" name="<?php echo $this->get_field_name("comment_num"); ?>"<?php checked( (bool) $instance["comment_num"], true ); ?> />
    <?php _e( 'Show number of comments', 'framework' ); ?>
  </label>
</p>
<p>
  <label for="<?php echo $this->get_field_id("date"); ?>">
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("date"); ?>" name="<?php echo $this->get_field_name("date"); ?>"<?php checked( (bool) $instance["date"], true ); ?> />
    <?php _e( 'Show post date', 'framework' ); ?>
  </label>
</p>
<?php if ( function_exists('the_post_thumbnail') && current_theme_supports("post-thumbnails") ) : ?>
<p>
  <label for="<?php echo $this->get_field_id('thumb'); ?>">
    <input type="checkbox" <?php echo $thumb; ?> class="checkbox" id="<?php echo $this->get_field_id('thumb'); ?>" name="<?php echo $this->get_field_name('thumb'); ?>"<?php checked( (bool) $instance["thumb"], true ); ?> />
    <?php _e( 'Show post thumbnail', 'framework' ); ?>
  </label>
</p>
<?php endif; ?>
<?php } // end form





} // end class

// TODO: Remember to change 'Widget_Name' to match the class name definition
add_action( 'widgets_init', create_function( '', 'register_widget("HT_Posts_Widget");' ) );
