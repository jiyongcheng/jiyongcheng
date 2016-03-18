<?php
/**
* The template used for displaying page content in page.php
*
*/
?>    
                
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- .hentry-box -->
<div class="hentry-box">
<!-- .entry-wrap -->
<div class="entry-wrap">

	<header id="page-header">
    	<h1 class="page-title"><?php the_title(); ?></h1>
    </header>
    
      <div class="entry-content clearfix">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'framework' ), 'after' => '</div>' ) ); ?>
      </div>
      
<!-- /.entry-wrap -->
</div>  
      
<!-- /.hentry-box -->
</div>
</article>