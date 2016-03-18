<?php // get post options
$ht_post_title = get_post_meta( get_the_ID(), '_ht_pf_chat_post_title', true ); 
$ht_post_excerpt = get_post_meta( get_the_ID(), '_ht_pf_chat_post_excerpt', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if ( !is_single() ) { ?> 
<span class="entry-date"><?php ht_entry_date(); ?></span>
<?php } ?>

<!-- .hentry-box -->
<div class="hentry-box">

<?php 
// Get post meta values
$ht_pf_chat = get_post_meta( get_the_ID(), '_ht_pf_chat_transcript', true ); 

if ( $ht_pf_chat != null ) { ?>
<div class="entry-chat">
<?php echo my_format_chat_content( $ht_pf_chat ); ?>
</div>
<?php } ?>

<?php if (is_single() ) { ?>  
<div class="entry-wrap">

<header class="entry-header">
	<h1 class="entry-title"><?php the_title(); ?></h1>
    <div class="entry-meta"><?php ht_entry_date(); ?></div>
</header>

	<div class="entry-content clearfix">
        <?php the_content(); ?>
        <?php numbered_in_page_links( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'framework' ), 'after' => '</div>' ) ); ?>
    </div>
    <?php if ( has_tag() ) { ?>
		<div class="tags">
			<?php the_tags('Tagged: ','',''); ?>
		</div>
	<?php } ?>

<!-- /.entry-wrap -->
</div>

<?php } elseif ( $ht_post_title == true || $ht_post_excerpt == true ) { ?>
<div class="entry-wrap">
<?php if ($ht_post_title == true) { ?>
<header class="entry-header">
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
</header>	
<?php }
if ($ht_post_excerpt == true) { ?>
<div class="entry-summary clearfix">
        <?php the_excerpt(); ?>
</div>	
<?php } ?>
</div>
<?php } // is_single ?>

<!-- /.hentry-box -->
</div>

<?php get_template_part( 'content', 'entry-meta-footer' ); ?>  

</article>