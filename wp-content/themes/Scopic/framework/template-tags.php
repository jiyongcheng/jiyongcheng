<?php

/**
 * Display navigation to next/previous pages when applicable
 */
 
if ( ! function_exists( 'ht_content_nav' ) ):
function ht_content_nav( $nav_id ) {
	global $wp_query;

	$nav_class = 'site-navigation paging-navigation';
	if ( is_single() )
		$nav_class = 'site-navigation post-navigation';

	?>
    <?php if ($wp_query->max_num_pages > 1) { ?>
	<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?> clearfix">
<ul class="clearfix">

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_poht_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '<i class="icon-angle-left"></i>', 'Previous post link', 'framework' ) . '</span> %title' ); ?>
		<?php next_poht_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '<i class="icon-angle-right"></i>', 'Next post link', 'framework' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

        <?php if ( get_previous_posts_link() ) : ?>
		<li class="nav-previous"><?php previous_posts_link( __( '<i class="icon-chevron-left"></i>', 'framework' ) ); ?></li>
		<?php endif; ?>
        
        <?php if ( get_next_posts_link() ) : ?>
		<li class="nav-next"><?php next_posts_link( __( '<i class="icon-chevron-right"></i>', 'framework' ) ); ?></li>
		<?php endif; ?>

	<?php endif; ?>
</ul>
	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php }
}
endif;

if ( ! function_exists( 'ht_entry_date_legacy' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 */
function ht_entry_date_legacy() {
	$post_date = the_date( 'Y年n月j日','','', false );
	$month_ago = date( "Y年n月j日", mktime(0,0,0,date("m")-1, date("d"), date("Y")) );
	if ( $post_date > $month_ago ) {
		$post_date = sprintf( __( '%1$s ago', 'framework' ), human_time_diff( get_the_time('U'), current_time('timestamp') ) );
	} else {
		$post_date = get_the_date();
	}
	if ( is_single() ) {
	printf( __( 'Posted: <time datetime="%1$s">%2$s</time>', 'framework' ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( $post_date )
	);	
		echo _e( ' in ', 'framework' );
		echo the_category(' &bull; ');
	} else {
	printf( __( '<time datetime="%1$s">%2$s</time>', 'framework' ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( $post_date )
	);	
}
}
endif;



/*
* extension of the human time diff function
* 0-10 seconds. Just now
* 10-30 seconds. A few moments ago.
* 30+ seconds. Seconds ago.
* 1-60 minutes. X Minutes Ago
* 1-24. X hour(s) ago
* 1-30 days X days ago
* else human time diff
*/
function ht_human_time_diff($from, $to){
	$to=($to==null ? time() : $to);
	$diff = $to-$from;
	if( $diff >= 0 && $diff < 10 ){
		return __('刚刚', 'framework');
	} elseif ($diff >= 10 && $diff < 30) {
		return __('小时前', 'framework');
	} else {
		return human_time_diff($from, $to) . ' ' . __('前', 'framework');
	}

}

if ( ! function_exists( 'ht_entry_meta_date' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 */
function ht_entry_date() {
	$post_date =  ht_human_time_diff( get_the_time('U'), current_time('timestamp') ) ;
	printf( __( '<span class="entry-meta-date"><time datetime="%1$s">%2$s</time></span>', 'framework' ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( $post_date )
	);
}
endif;


/**
 * The formatted output of a list of pages.
 */
add_action( 'numbered_in_page_links', 'numbered_in_page_links', 10, 1 );

/**
 * Modification of wp_link_pages() with an extra element to highlight the current page.
 *
 * @param  array $args
 * @return void
 */
function numbered_in_page_links( $args = array () )
{
    $defaults = array(
        'before'      => '<p>' . __('Pages:', 'framework')
    ,   'after'       => '</p>'
    ,   'link_before' => ''
    ,   'link_after'  => ''
    ,   'pagelink'    => '%'
    ,   'echo'        => 1
        // element for the current page
    ,   'highlight'   => 'span'
    );

    $r = wp_parse_args( $args, $defaults );
    $r = apply_filters( 'wp_link_pages_args', $r );
    extract( $r, EXTR_SKIP );

    global $page, $numpages, $multipage, $more, $pagenow;

    if ( ! $multipage )
    {
        return;
    }

    $output = $before;

    for ( $i = 1; $i < ( $numpages + 1 ); $i++ )
    {
        $j       = str_replace( '%', $i, $pagelink );
        $output .= ' ';

        if ( $i != $page || ( ! $more && 1 == $page ) )
        {
            $output .= _wp_link_page( $i ) . "{$link_before}{$j}{$link_after}</a>";
        }
        else
        {   // highlight the current page
            // not sure if we need $link_before and $link_after
            $output .= "<$highlight>{$link_before}{$j}{$link_after}</$highlight>";
        }
    }

    print $output . $after;
}