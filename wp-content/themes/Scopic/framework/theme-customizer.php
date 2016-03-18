<?php

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function ht_customizer( $wp_customize ) {
	
	/**
 	* Adds textarea support to the theme customizer
 	*/
	class ht_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>

<label><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
  <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
</label>
<?php
    }
}
	
	/**
 	* Header Section
 	*/
	$wp_customize->add_section('ht_header', array(
		'title' => __( '顶部设置', 'framework' ),
		'description' => '',
		'priority' => 30,
	) );
	
	$wp_customize->add_setting( 'blogname', array(
		'default'    => get_option( 'blogname' ),
		'type'       => 'option',
		'capability' => 'manage_options',
	) );

	$wp_customize->add_control( 'blogname', array(
		'label'      => __( '网站标题', 'framework' ),
		'section'    => 'ht_header',
	) );

	$wp_customize->add_setting( 'blogdescription', array(
		'default'    => get_option( 'blogdescription' ),
		'type'       => 'option',
		'capability' => 'manage_options',
	) );

	$wp_customize->add_control( 'blogdescription', array(
		'label'      => __( '副标题', 'framework' ),
		'section'    => 'ht_header',
	) );
	
	
	// Add logo to Site Title & Tagline Section
	$wp_customize->add_setting( 'ht_site_logo', array('default' => get_template_directory_uri() . '/images/logo.png') );
 
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ht_site_logo', array(
		'label' => '设置标志',
		'section' => 'ht_header',
		'settings' => 'ht_site_logo')
	) );
	
	// Add avatar
	$wp_customize->add_setting( 'ht_site_avatar');
 
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ht_site_avatar', array(
		'label' => '站点头像 (100px x 100px)',
		'section' => 'ht_header',
		'settings' => 'ht_site_avatar')
	) );
	
	// RSS Option
	$wp_customize->add_setting('ht_header_rss');

	$wp_customize->add_control('ht_header_rss',	array(
		'type' => 'checkbox',
		'label' => '隐藏订阅地址',
		'section' => 'ht_header',
	) );
	
	// Email Option
	$wp_customize->add_setting('ht_header_email');

	$wp_customize->add_control('ht_header_email',	array(
		'type' => 'text',
		'label' => '邮箱连接',
		'section' => 'ht_header',
	));
	
	// Twitter Option
	//$wp_customize->add_setting('ht_header_twitter');

	//$wp_customize->add_control('ht_header_twitter',	array(
	//	'type' => 'text',
//		'label' => '新浪微博',
//		'section' => 'ht_header',
//	));
	
	// Facebook Option
//	$wp_customize->add_setting('ht_header_facebook');

	//$wp_customize->add_control('ht_header_facebook', array(
	//	'type' => 'text',
//		'label' => '腾讯微博',
//'section' => 'ht_header',
	//));
	
	// Google+ Option
	$wp_customize->add_setting('ht_header_google');

	$wp_customize->add_control('ht_header_google',	array(
		'type' => 'text',
		'label' => '谷歌 +',
		'section' => 'ht_header',
	));
	
	// Pinterest Option
	$wp_customize->add_setting('ht_header_pinterest');

	$wp_customize->add_control('ht_header_pinterest',	array(
		'type' => 'text',
		'label' => '微博',
		'section' => 'ht_header',
	));
	
	// LinkedIn Option
	//$wp_customize->add_setting('ht_header_linkedin');

	//$wp_customize->add_control('ht_header_linkedin',	array(
	//	'type' => 'text',
	//	'label' => 'LinkedIn Link',
	//	'section' => 'ht_header',
	//));
	
	// Flickr Option
//	$wp_customize->add_setting('ht_header_flickr');

	//$wp_customize->add_control('ht_header_flickr',	array(
	//	'type' => 'text',
	///	'label' => 'Flickr Link',
//		'section' => 'ht_header',
///	));
	
	/**
 	* Footer Section
 	*/
    $wp_customize->add_section('ht_footer', array(
		'title' => '页脚',
		'description' => '',
		'priority' => 35,
	) );
	
	// footer widget layout option
	$wp_customize->add_setting('ht_style_footerwidgets', array('default' => '3col') );
 
	$wp_customize->add_control('ht_style_footerwidgets', array(
			'type' => 'select',
			'label' => '页脚小工具布局',
			'section' => 'ht_footer',
			'choices' => array(
				'off' => '关',
				'2col' => '两栏',
				'3col' => '三栏',
				'4col' => '四栏',
			),
	) );
	
	// site coypright
	$wp_customize->add_setting( 'ht_copyright', array(
		'default'        => '&copy; Support-Guxin Themes.',
	) );
	 
	$wp_customize->add_control( new ht_Customize_Textarea_Control( $wp_customize, 'ht_copyright', array(
		'label'   => '版权内容',
		'section' => 'ht_footer',
		'settings'   => 'ht_copyright',
	) ) );
	
	
	/**
 	* Styling Section
 	*/
    $wp_customize->add_section( 'ht_styling', array(
		'title' => '造型',
		'description' => '改变主题的外观',
		'priority' => 40,
	) );	

	// theme color option
	$wp_customize->add_setting( 'ht_styling_themecolor', array('default' => '#dd5136') );
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ht_styling_themecolor', array(
        'label'   => '主题颜色',
        'section' => 'ht_styling',
        'settings'   => 'ht_styling_themecolor',)
	) );

	
	
	
	/* Custom Background */
	
	
        $wp_customize->add_section( 'background_image', array(
            'title'          => __( '背景', 'framework' ),
            'theme_supports' => 'custom-background',
            'priority'       => 80,
        ) );
		
		// BG Color
		$wp_customize->add_setting( 'background_color', array('default' => get_theme_support( 'custom-background', 'default-color' ),'theme_supports' => 'custom-background',) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
		'label' => __( '背景颜色', 'framework' ),
		'section' => 'background_image',
		) ) );
		
		
		// BG Image
        $wp_customize->add_setting( 'background_image', array(
            'default'        => get_theme_support( 'custom-background', 'default-image' ),
            'theme_supports' => 'custom-background',
        ) );

        $wp_customize->add_setting( new WP_Customize_Background_Image_Setting( $wp_customize, 'background_image_thumb', array(
            'theme_supports' => 'custom-background',
        ) ) );

        $wp_customize->add_control( new WP_Customize_Background_Image_Control( $wp_customize ) );

	
}
add_action( 'customize_register', 'ht_customizer' );



