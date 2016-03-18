<?php
/**
 * The template for displaying 404 pages (Not Found).
**/
get_header(); ?>

<!-- #primary -->
<section id="primary" class="sidebar-off clearfix"> 

<article id="post-0" class="post error404 not-found">

<header class="entry-header">
<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'framework' ); ?></h1>
</header>

<div class="entry-content">
<?php get_search_form(); ?>
</div>

</article>

</section>

<?php get_footer(); ?>
