<?php
/**
 * The template for displaying search forms.
 *
 */
?>
<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    <label for="s" class="screen-reader-text"><?php _ex( '搜索', 'assistive text', 'framework' ); ?></label>
    <input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( '搜索 &hellip;', 'placeholder', 'framework' ); ?>" />
    <input type="submit" class="submit" id="searchsubmit" value="<?php echo esc_attr_x( '搜索', 'submit button', 'framework' ); ?>" />
</form>