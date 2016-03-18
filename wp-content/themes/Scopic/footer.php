
</div>
<!-- /#site-container -->

<!-- #site-footer -->
<footer id="site-footer" class="clearfix">

<?php if ( ( is_active_sidebar( 'st_sidebar_footer' ) ) && ( get_theme_mod( 'st_style_footerwidgets' ) != 'off' )) { ?>
<!-- #footer-widgets -->
<div id="footer-widgets" class="clearfix">
<div class="container">
        <div class="ht-grid ht-grid-stacked">
        	<?php dynamic_sidebar( 'st_sidebar_footer' ); ?>
        </div>
</div>
</div>
<!-- /footer-top -->
<?php } ?>


<div id="footer-bottom" class="clearfix">
<div class="container">
  <?php if (get_theme_mod( 'ht_copyright' )) { ?>
  <small id="copyright" role="contentinfo"><?php echo get_theme_mod( 'ht_copyright' ); ?></small>
  <?php } ?>


  <?php if ( has_nav_menu( 'footer-nav' ) ) { /* if menu location 'footer-nav' exists then use custom menu */ ?>
  <nav id="footer-nav" role="navigation">
    <?php wp_nav_menu( array('theme_location' => 'footer-nav', 'depth' => 1, 'container' => false, 'menu_class' => 'nav-footer clearfix' )); ?>
  </nav>
  <?php } ?>
  
 </div>
 </div> 
  
</footer> 
<!-- /#site-footer -->

<?php wp_footer(); ?>


</body>
</html>