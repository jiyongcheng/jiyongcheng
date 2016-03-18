<?php

/*
* Load Post Format Admin Script
*/
function ht_admin_post_format_switcher($hook) {
	if ($hook == 'post.php' || $hook == 'post-new.php') {
		wp_enqueue_script('pf-post-meta', get_template_directory_uri() . '/framework/js/post-format-switcher.js', array( 'jquery' ));
	}
}
add_action('admin_enqueue_scripts','ht_admin_post_format_switcher',10,1);


/**
* Standard Post Format Display
*/
function ht_post_format_standard() {

	if( has_post_thumbnail() ) { ?>
	<figure class="entry-thumb">   
	
	<?php the_post_thumbnail( 'post' ); ?>
	  
    <?php if ( !is_single() ) { ?>
	<figcaption class="entry-thumb-caption">
    <div class="caption-content">
	<a class="readmore" href="<?php the_permalink(); ?>" rel="nofollow"><?php _e('Read Post','framework') ?></a>
    </div>
	</figcaption>
    <?php } ?>
	
	</figure>
	<?php }

}

/**
* Audio Post Format Display
*/
function ht_post_format_audio() {

	// Get post meta values
	$ht_pf_audio_oembed = get_post_meta( get_the_ID(), '_ht_pf_audio_oembed', true ); 
	$ht_pf_audio_file = get_post_meta( get_the_ID(), '_ht_pf_audio_file', true );
	if ( $ht_pf_audio_oembed != null || $ht_pf_audio_file != null ) {
	?>
	<figure class="entry-audio">  
	<div class="entry-content clearfix">
        <audio style="width:100%;" controls=""><source src="<?php echo my_format_chat_content( $ht_pf_audio_oembed ); ?>" type="audio/mpeg"></audio>
            </div>
	</figure>
	<?php }

}

/**
* Gallery Post Format Display
*/
function ht_post_format_gallery() {

	// Get post meta values
	$pf_gallery_images = rwmb_meta( '_ht_pf_gallery_image', 'type=image&size=post' );
	$pf_gallery_images_full = rwmb_meta( '_ht_pf_gallery_image', 'type=image&size=full' );	
	if ($pf_gallery_images) { ?>
	<div class="entry-gallery">  
	<ul class="clearfix"> 
	<?php foreach( $pf_gallery_images as $index => $pf_gallery_image ) {
		$pf_gallery_image_full = $pf_gallery_images_full[$index]; ?>
	<li>
	<figure class="entry-thumb">
	<img src="<?php echo $pf_gallery_image['url'] ?>" width="<?php echo $pf_gallery_image['width'] ?>" height="<?php echo $pf_gallery_image['height'] ?>" alt="<?php echo $pf_gallery_image['alt'] ?>" />
	<figcaption class="entry-thumb-caption">
	<div class="caption-content">
	<a class="caption-link" href="<?php echo $pf_gallery_image_full['url']; ?>" rel="nofollow" title="<?php echo $pf_gallery_image['caption']; ?>"><i class="icon-search"></i></a>
	<?php if ( $pf_gallery_image['caption'] ) { ?><h3 class="caption-title"><?php echo $pf_gallery_image['caption']; ?></h3><?php } ?>
	</div>
	</figcaption>
	</figure>
	</li>
	<?php } ?>
	</ul> 
	</div>
	<?php }

}

/**
* Image Post Format Display
*/
function ht_post_format_image() {

	// Get post meta values
	$ht_pf_image_oembed = get_post_meta( get_the_ID(), '_ht_pf_image_oembed', true ); 
	if ( $ht_pf_image_oembed ) {
	?>
	<figure class="entry-image">  
	<img class="alignnone size-full wp-image-37" alt="logo" src="<?php echo my_format_chat_content( $ht_pf_image_oembed ); ?>" width="100%" height="100%" />
	
	</figure>
	<?php } elseif( has_post_thumbnail() ) { ?>
	<figure class="entry-thumb">   
	<?php the_post_thumbnail( 'post' ); ?>
	<?php if ( !is_single() ) { ?>
	<figcaption class="entry-thumb-caption">
    <div class="caption-content">
	<a class="readmore" href="<?php the_permalink(); ?>" rel="nofollow"><?php _e('Read Post','framework') ?></a>
    </div>
	</figcaption>
	<?php } ?>
	</figure>
	<?php }

}

/**
* Link Post Format Display
*/
function ht_post_format_link() {
	
	// Get post meta values
	$ht_pf_link_url = get_post_meta( get_the_ID(), '_ht_pf_link_url', true ); 
	$ht_pf_link_text = get_post_meta( get_the_ID(), '_ht_pf_link_text', true );
	$ht_pf_link_color = get_post_meta( get_the_ID(), '_ht_pf_link_color', true );
	$ht_pf_link_color = get_post_meta( get_the_ID(), '_ht_pf_link_color', true );
	
	if( has_post_thumbnail() && $ht_pf_link_url != null ) { ?>
	<figure class="entry-link-image"<?php if ($ht_pf_link_color) { echo ' style="background:'. $ht_pf_link_color .'"'; }; ?>>   
	
	<?php the_post_thumbnail( 'post' ); ?>
	  
	<figcaption class="entry-link-caption">
    <div class="caption-content">
    <h2 class="entry-title"><a href="<?php echo $ht_pf_link_url; ?>" rel="nofollow"><?php echo $ht_pf_link_text; ?></a></h2>
	<a class="entry-link-url" href="<?php echo $ht_pf_link_url; ?>" rel="nofollow"><?php echo $ht_pf_link_url; ?></a>
    </div>
	</figcaption>
	
	</figure>
	<?php } else { ?>
	<div class="entry-link"<?php if ($ht_pf_link_color) { echo ' style="background:'. $ht_pf_link_color .'"'; }; ?>>
	<a href="<?php echo $ht_pf_link_url; ?>" rel="nofollow"><?php echo $ht_pf_link_text; ?></a>
	</div>
	<?php }

}

/**
* Quote Post Format Display
*/
function ht_post_format_quote() {

	// Get post meta values
	$ht_pf_quote = get_post_meta( get_the_ID(), '_ht_pf_quote', true ); 
	$ht_pf_quote_cite = get_post_meta( get_the_ID(), '_ht_pf_quote_cite', true );
	$ht_pf_quote_color = get_post_meta( get_the_ID(), '_ht_pf_quote_color', true );
	
	if ( has_post_thumbnail() && $ht_pf_quote != null ) { ?>
    <figure class="entry-quote-image"<?php if ($ht_pf_quote_color) { echo ' style="background:'. $ht_pf_quote_color .'"'; }; ?>>   
	
	<?php the_post_thumbnail( 'post' ); ?>
	  
	<figcaption class="entry-quote-caption">
    
    <div class="caption-content">
    <blockquote class="entry-quote">
    <?php echo $ht_pf_quote; ?>
	<?php if ( $ht_pf_quote_cite != null ) { ?>
	<cite><?php echo $ht_pf_quote_cite ?></cite>	
	<?php } ?>
    </blockquote>
    </div>
	</figcaption>
	
	</figure>
	<?php } else { ?>
	<blockquote class="entry-quote"<?php if ($ht_pf_quote_color) { echo ' style="background:'. $ht_pf_quote_color .'"'; }; ?>>
	<?php echo $ht_pf_quote; ?>
	<?php if ( $ht_pf_quote_cite != null ) { ?>
	<cite><?php echo $ht_pf_quote_cite ?></cite>	
	<?php } ?>
	</blockquote>
	<?php }

}

/**
* Status Post Format Display
*/
function ht_post_format_status() {

	// Get post meta values
	$ht_pf_status_oembed = get_post_meta( get_the_ID(), '_ht_pf_status_oembed', true ); 
	$ht_pf_status = get_post_meta( get_the_ID(), '_ht_pf_status', true );
	$ht_pf_status_color = get_post_meta( get_the_ID(), '_ht_pf_status_color', true );
	
	if ( $ht_pf_status_oembed ) { ?>
	<div class="entry-status-twitter clearfix">  
	<?php echo wp_oembed_get($ht_pf_status_oembed, array('width'=>658));  ?>
	</div>
	<?php  } else { ?>
	<div class="entry-status clearfix"<?php if ($ht_pf_status_color) { echo ' style="background:'. $ht_pf_status_color .'"'; }; ?>>
	<?php echo get_avatar( get_the_author_meta('ID'), 60 ); ?>
	<?php echo $ht_pf_status; ?>
	</div>
	<?php }

}

/**
* Video Post Format Display
*/
function ht_post_format_video() {

	// Get post meta values
	$ht_pf_video_oembed = get_post_meta( get_the_ID(), '_ht_pf_video_oembed', true ); 
	$ht_pf_video_file = get_post_meta( get_the_ID(), '_ht_pf_video_file', true ); 
	$ht_pf_video_file_poster = get_post_meta( get_the_ID(), '_ht_pf_video_file_poster', true ); 
	
	if ( $ht_pf_video_oembed || $ht_pf_video_file ) {
	?>
	<figure class="entry-video">  
<?php echo my_format_chat_content( $ht_pf_video_oembed ); ?>
	</figure>
	<?php }

}






/* Filter the content of chat posts. */
//add_filter( 'the_content', 'my_format_chat_content' );

/* Auto-add paragraphs to the chat text. */
add_filter( 'my_post_format_chat_text', 'wpautop' );

/**
 * This function filters the post content when viewing a post with the "chat" post format.  It formats the 
 * content with structured HTML markup to make it easy for theme developers to style chat posts.  The 
 * advantage of this solution is that it allows for more than two speakers (like most solutions).  You can 
 * have 100s of speakers in your chat post, each with their own, unique classes for styling.
 *
 * @author David Chandra
 * @link http://www.turtlepod.org
 * @author Justin Tadlock
 * @link http://justintadlock.com
 * @copyright Copyright (c) 2012
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link http://justintadlock.com/archives/2012/08/21/post-formats-chat
 *
 * @global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
 * @param string $content The content of the post.
 * @return string $chat_output The formatted content of the post.
 */
function my_format_chat_content( $content ) {
	global $_post_format_chat_ids;

	/* If this is not a 'chat' post, return the content. */
	if ( !has_post_format( 'chat' ) )
		return $content;

	/* Set the global variable of speaker IDs to a new, empty array for this chat. */
	$_post_format_chat_ids = array();

	/* Allow the separator (separator for speaker/text) to be filtered. */
	$separator = apply_filters( 'my_post_format_chat_separator', ':' );

	/* Open the chat transcript div and give it a unique ID based on the post ID. */
	$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript clearfix">';

	/* Split the content to get individual chat rows. */
	$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );

	/* Loop through each row and format the output. */
	foreach ( $chat_rows as $chat_row ) {

		/* If a speaker is found, create a new chat row with speaker and text. */
		if ( strpos( $chat_row, $separator ) ) {

			/* Split the chat row into author/text. */
			$chat_row_split = explode( $separator, trim( $chat_row ), 2 );

			/* Get the chat author and strip tags. */
			$chat_author = strip_tags( trim( $chat_row_split[0] ) );

			/* Get the chat text. */
			$chat_text = trim( $chat_row_split[1] );

			/* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
			$speaker_id = my_format_chat_row_id( $chat_author );

			/* Open the chat row. */
			$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . ' clearfix">';

			/* Add the chat row author. */
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><cite class="fn">' . apply_filters( 'my_post_format_chat_author', $chat_author, $speaker_id ) . '</cite>' . $separator . '</div>';

			/* Add the chat row text. */
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_text, $chat_author, $speaker_id ) ) . '</div>';

			/* Close the chat row. */
			$chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
		}

		/**
		 * If no author is found, assume this is a separate paragraph of text that belongs to the
		 * previous speaker and label it as such, but let's still create a new row.
		 */
		else {

			/* Make sure we have text. */
			if ( !empty( $chat_row ) ) {

				/* Open the chat row. */
				$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

				/* Don't add a chat row author.  The label for the previous row should suffice. */

				/* Add the chat row text. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_row, $chat_author, $speaker_id ) ) . '</div>';

				/* Close the chat row. */
				$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
			}
		}
	}

	/* Close the chat transcript div. */
	$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";

	/* Return the chat content and apply filters for developers. */
	return apply_filters( 'my_post_format_chat_content', $chat_output );
}

/**
 * This function returns an ID based on the provided chat author name.  It keeps these IDs in a global 
 * array and makes sure we have a unique set of IDs.  The purpose of this function is to provide an "ID"
 * that will be used in an HTML class for individual chat rows so they can be styled.  So, speaker "John" 
 * will always have the same class each time he speaks.  And, speaker "Mary" will have a different class 
 * from "John" but will have the same class each time she speaks.
 *
 * @author David Chandra
 * @link http://www.turtlepod.org
 * @author Justin Tadlock
 * @link http://justintadlock.com
 * @copyright Copyright (c) 2012
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link http://justintadlock.com/archives/2012/08/21/post-formats-chat
 *
 * @global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
 * @param string $chat_author Author of the current chat row.
 * @return int The ID for the chat row based on the author.
 */
function my_format_chat_row_id( $chat_author ) {
	global $_post_format_chat_ids;

	/* Let's sanitize the chat author to avoid craziness and differences like "John" and "john". */
	$chat_author = strtolower( strip_tags( $chat_author ) );

	/* Add the chat author to the array. */
	$_post_format_chat_ids[] = $chat_author;

	/* Make sure the array only holds unique values. */
	$_post_format_chat_ids = array_unique( $_post_format_chat_ids );

	/* Return the array key for the chat author and add "1" to avoid an ID of "0". */
	return absint( array_search( $chat_author, $_post_format_chat_ids ) ) + 1;
}