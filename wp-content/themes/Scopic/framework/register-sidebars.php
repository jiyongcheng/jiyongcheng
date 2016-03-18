<?php
/**
 * Register Sidebars 
 */
 
add_action( 'widgets_init', 'st_register_sidebars' );

function st_register_sidebars() {
	
	register_sidebar(array(
		'name' => __( '默认工具栏', 'framework' ),
		'id' => 'st_sidebar_primary',
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		)
	);	
	
	// Setup footer widget column option variable
	$footer_widget_layout = get_theme_mod( 'ht_style_footerwidgets' );
	if ($footer_widget_layout == '2col') {
		$footer_widget_col = 'ht-col-half';
		$footer_widget_col_descirption = '2 列';
	} elseif ($footer_widget_layout == '3col') {
		$footer_widget_col = 'ht-col-third';
		$footer_widget_col_descirption = '3 列';
	} elseif ($footer_widget_layout == '4col') {
		$footer_widget_col = 'ht-col-fourth';
		$footer_widget_col_descirption = '4 列';
	} else {
		$footer_widget_col = 'ht-col-third';
		$footer_widget_col_descirption = '3 列';
	}
	
	register_sidebar(array(
		'name' => __( '页脚工具栏', 'framework' ),
		'description'   => '目前设置页脚工具列数为'.$footer_widget_col_descirption.'. 你可以去主题设置面板改变他.',
		'id' => 'st_sidebar_footer',
		'before_widget' => '<div id="%1$s" class="ht-column '.$footer_widget_col.' widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title"><span>',
		'after_title' => '</span></h4>',
		)
	);

}

