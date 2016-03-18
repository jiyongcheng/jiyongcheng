<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if ( !is_single() ) { ?> 
<span class="entry-date"><?php ht_entry_date(); ?></span>
<?php } ?>

<!-- .hentry-box -->
<div class="hentry-box">

<div class="entry-wrap">

<?php if ( is_single() ) { ?> 
<header class="entry-header">
<h1 class="entry-title"><?php the_title(); ?></h1>
    <div class="entry-meta"><?php ht_entry_date(); ?></div>
</header>
<?php } ?>

<div class="entry-content">
	<?php the_content(); ?>
</div>

</div>

<!-- /.hentry-box -->
</div>

<?php get_template_part( 'content', 'entry-meta-footer' ); ?>  

</article>