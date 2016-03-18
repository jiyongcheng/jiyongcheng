<?php if ( !is_single() ) { ?>  
<footer class="entry-footer">
<ul>
<?php $ht_post_view_single = get_post_meta( get_the_ID(), '_ht_post_view_single', true );
if ( $ht_post_view_single == true ) {  ?>
<li><i class="icon-link"></i><a href="<?php the_permalink(); ?>"><?php _e( 'View Post', 'framework' ) ?></a></li>
<?php } ?>
<?php if ( comments_open() ){ ?> 
<li><i class="icon-comment"></i><?php echo comments_popup_link( __( 'Add Comment', 'framework' ), __( '1 Comment', 'framework' ), __( '% Comments', 'framework' ) ); ?> 
</li>
<?php } ?>
</ul>
</footer>
<?php } ?>