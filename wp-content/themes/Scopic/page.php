<?php get_header(); ?>

<?php 
$ht_page_sidebar = null;
$ht_page_sidebar = get_post_meta( get_the_ID(), '_ht_page_sidebar', true );
if ($ht_page_sidebar == '') {
	$ht_page_sidebar = 'sidebar-off';
}
?>

<!-- #primary -->
<div id="primary" class="<?php echo $ht_page_sidebar ?> clearfix">

<!-- #content -->
<div id="content" role="main">

    <?php while ( have_posts() ) : the_post(); ?>
        
    	<?php get_template_part( 'content', 'page' ); ?>

		<?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
        comments_template();
        ?>
    
    <?php endwhile; // end of the loop. ?>

</div>
<!-- #content -->
  
<?php 
if ($ht_page_sidebar != 'sidebar-off') {
get_sidebar();
}?>

</div>
<!-- #primary -->
<?php get_footer(); ?>