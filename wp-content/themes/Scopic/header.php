<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width" />
<title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- #header -->
<header id="site-header" class="clearfix" role="banner">

<!-- #logo -->
<div id="logo">
    <!-- .container -->
<div class="container">
		<a title="<?php bloginfo( 'name' ); ?>" href="<?php echo home_url(); ?>">
		<?php if ( is_front_page() ) { ?>
		<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
        <?php if ( get_bloginfo( 'description' ) ) { ?><h2 class="site-description"><?php bloginfo( 'description' ); ?></h2><?php } ?>
		<?php } else {  ?>
		<strong class="site-title"><?php bloginfo( 'name' ); ?></strong>
        <?php if ( get_bloginfo( 'description' ) ) { ?><strong class="site-description"><?php bloginfo( 'description' ); ?></strong><?php } ?>
		<?php } ?>
		<img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_theme_mod( 'ht_site_logo' ); ?>" />
		</a>
	</div>
</div>
<!-- /#logo -->

<?php if ( has_nav_menu( 'primary-nav' ) ) { ?>
<!-- #primary-nav-mobile -->
<nav id="nav-primary-mobile" class="clearfix">
    <a class="menu-toggle" href="#"><i class="icon-reorder"></i><?php _e('Menu', 'framework'); ?></a>
    <?php wp_nav_menu( array('theme_location' => 'primary-nav', 'container' => false, 'menu_class' => 'clearfix', 'menu_id' => 'mobile-menu', )); ?>
</nav>
<!-- /#primary-nav-mobile -->
<?php } ?>  


<div id="header-bottom" role="navigation" class="clearfix">
<!-- .container -->
<div class="container">

<?php if ( has_nav_menu( 'primary-nav' ) ) { ?>
<!-- #primary-nav -->
<nav id="nav-primary">
<ul><li><a href="#"><i class="icon-reorder"></i><?php _e('Menu', 'framework'); ?></a>
    <?php wp_nav_menu( array('theme_location' => 'primary-nav', 'container' => false, 'menu_class' => 'nav clearfix' )); ?>
    </li></ul>
</nav>
<!-- #primary-nav -->
<?php } ?>        

<?php if (get_theme_mod( 'ht_header_rss' ) != true || get_theme_mod( 'ht_header_twitter' ) || get_theme_mod( 'ht_header_email' ) || get_theme_mod( 'ht_header_facebook' ) || get_theme_mod( 'ht_header_google' ) || get_theme_mod( 'ht_header_pinterest' ) || get_theme_mod( 'ht_header_linkedin' ) || get_theme_mod( 'ht_header_flickr' ) ) { ?>
<ul id="social-icons" class="clearfix">
<?php if (get_theme_mod( 'ht_header_rss' ) != true ) { ?><li class="rss"><a href="<?php bloginfo('rss2_url'); ?>"><i class="icon-rss"></i></a></li><?php } ?>
<?php if (get_theme_mod( 'ht_header_email' ) ) { ?><li class="email"><a href="<?php echo get_theme_mod( 'ht_header_email' ) ?>"><i class="icon-envelope"></i></a></li><?php } ?>
<?php if (get_theme_mod( 'ht_header_twitter' ) ) { ?><li class="twitter"><a href="<?php echo get_theme_mod( 'ht_header_twitter' ) ?>"><i class="icon-twitter"></i></a></li><?php } ?>
<?php if (get_theme_mod( 'ht_header_facebook' ) ) { ?><li class="facebook"><a href="<?php echo get_theme_mod( 'ht_header_facebook' ) ?>"><i class="icon-facebook"></i></a></li><?php } ?>
<?php if (get_theme_mod( 'ht_header_google' ) ) { ?><li class="google-plus"><a href="<?php echo get_theme_mod( 'ht_header_google' ) ?>"><i class="icon-google-plus"></i></a></li><?php } ?>
<?php if (get_theme_mod( 'ht_header_pinterest' ) ) { ?><li class="pinterest"><a href="<?php echo get_theme_mod( 'ht_header_pinterest' ) ?>"><i class="icon-pinterest"></i></a></li><?php } ?>
<?php if (get_theme_mod( 'ht_header_linkedin' ) ) { ?><li class="linkedin"><a href="<?php echo get_theme_mod( 'ht_header_linkedin' ) ?>"><i class="icon-linkedin"></i></a></li><?php } ?>
<?php if (get_theme_mod( 'ht_header_flickr' ) ) { ?><li class="flickr"><a href="<?php echo get_theme_mod( 'ht_header_flickr' ) ?>"><i class="icon-flickr"></i></a></li><?php } ?>
</ul>
<?php } ?>



<?php if ( is_front_page() && get_theme_mod( 'ht_site_avatar' ) ) { ?>
<img width="95" height="95" class="avatar" src="<?php echo get_theme_mod( 'ht_site_avatar' )?>" alt="">
<?php } elseif ( is_archive() ) { ?>
<h1 class="page-title">

<?php 

if ( is_search() ) {
 printf( __( 'Search Results for: %s', 'framework' ), get_search_query() );
} elseif ( is_category() ) { 
	single_cat_title();
} elseif ( is_tag() ) {
 _e('Tagged: ', 'framework'); echo single_tag_title( '', false );
} elseif ( is_day() ) {
	printf( __( 'Daily Archives: %s', 'framework' ), get_the_date() );
} elseif ( is_month() ) {
	printf( __( 'Monthly Archives: %s', 'framework' ), get_the_date( 'F Y' ) );
} elseif ( is_year() ) {
	printf( __( 'Yearly Archives: %s', 'framework' ), get_the_date( 'Y' ) );  ?>

<?php } ?>

</h1>
<?php } ?>

</div>
<!-- /.container -->   
</div>

</header>
<!-- /#header -->

<!-- #site-container -->
<div id="site-container" class="clearfix">