<?php get_header(); ?>

<?php 
$ht_post_sidebar = null;
$ht_post_sidebar = get_post_meta( get_the_ID(), '_ht_post_sidebar', true );
if ($ht_post_sidebar == '') {
	$ht_post_sidebar = 'sidebar-off';
}
?>

<!-- #primary -->
<section id="primary" class="<?php echo $ht_post_sidebar ?> clearfix">

<!-- #content -->
<div id="content" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'content', get_post_format() ); ?>

<?php endwhile; // end of the loop. ?>

<?php // If comments are open or we have at least one comment, load up the comment template
		 if ( comments_open() || '0' != get_comments_number() )
					comments_template( '', true ) ?>

</div>
<!-- #content -->

<?php 
if ($ht_post_sidebar != 'sidebar-off') {
get_sidebar();
}?>

</section>
<!-- /#primary -->

<?php get_footer(); ?>