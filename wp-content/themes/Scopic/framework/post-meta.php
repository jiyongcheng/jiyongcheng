<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = '_ht_';

global $meta_boxes;

$meta_boxes = array();

// Post Options
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'post_meta',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '文章设置', 'framework'),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
			// SELECT BOX
			array(
			'name' => __( '侧边栏位置', 'framework' ),
			'id' => "{$prefix}post_sidebar",
			'type' => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options' => array(
				'sidebar-left' => __( '侧边栏居左', 'framework' ),
				'sidebar-right' => __( '侧边栏居右', 'framework' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple' => false,
			'std'	=> __( '关闭侧边栏', 'framework' ),
			),
			// CHECKBOX
			array(
			'name' => __( '显示"查看文章" 在时间轴?', 'framework' ),
			'desc' => __( '勾选将显示"查看文章"连接按钮在时间轴.', 'framework' ),
			'id' => "{$prefix}post_view_single",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);

// Page Options
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'page_meta',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '页面设置', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
			// SELECT BOX
			array(
			'name' => __( '侧边栏位置', 'framework' ),
			'id' => "{$prefix}page_sidebar",
			'type' => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options' => array(
				'sidebar-left' => __( '侧边栏居左', 'framework' ),
				'sidebar-right' => __( '侧边栏居右', 'framework' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple' => false,
			'std'	=> __( '关闭侧边栏', 'framework' ),
			),
	)
);

// Gallery Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_gallery',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '相册格式文章', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
		// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'             => __( '相册图片上传', 'framework' ),
			'id'               => "{$prefix}pf_gallery_image",
			'type'             => 'plupload_image',
			'max_file_uploads' => 0,
		),
		
			// CHECKBOX
			array(
			'name' => __( '显示标题在时间轴？', 'framework' ),
			'desc' => __( '勾选在显示文章标题在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_gallery_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),
			// CHECKBOX
			array(
			'name' => __( '现在摘要在时间轴?', 'framework' ),
			'desc' => __( '勾选在显示文章摘要在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_gallery_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);


// Image Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_image',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '图片格式文章', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
		// OEMBED
			array(
			'name' => __( '图片地址', 'framework' ),
			'id' => "{$prefix}pf_image_oembed",
			'desc' => __( '输入图像地址. (绝对路径，支持外链)', 'framework' ),
			'type' => 'text',
		),
		
			// CHECKBOX
			array(
			'name' => __( '显示标题在时间轴？', 'framework' ),
			'desc' => __( '勾选在显示文章标题在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_image_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),
			// CHECKBOX
			array(
			'name' => __( '现在摘要在时间轴?', 'framework' ),
			'desc' => __( '勾选在显示文章摘要在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_image_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);

// Video Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_video',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '视频格式文章', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
		// OEMBED
			array(
			'name' => __( '视频代码', 'framework' ),
			'id' => "{$prefix}pf_video_oembed",
			'desc' => __( '在这里粘帖你的视频代码 (支持优酷，土豆等....)', 'framework' ),
			'type' => 'wysiwyg',
				'raw' => false,
				'std' => __( '', 'framework' ),
					// 编辑器设置, see wp_editor() function: look4wp.com/wp_editor
					'options' => array(
					'textarea_rows' => 3,
					'teeny' => true,
					'media_buttons' => false,
					),
		),
		// FILE ADVANCED (WP 3.5+)
		//array(
		//	'name' => __( 'Video File Upload', 'framework' ),
		//	'id' => "{$prefix}pf_video_file",
		//	'type' => 'text',
		//	'max_file_uploads' => 1,
		//	'mime_type' => 'video', // Leave blank for all file types
		//),
		// IMAGE ADVANCED (WP 3.5+)
		//array(
		//'name' => __( 'Video Poster Upload', 'framework' ),
	//	'id' => "{$prefix}pf_video_file_poster",
	//	'desc' => __( 'The video poster is displayed on the video player until the user hits the play button. (Optional).', 'framework' ),
	//	'type' => 'image_advanced',
	//	'max_file_uploads' => 1,
	//	),
		
			// CHECKBOX
			array(
			'name' => __( '显示标题在时间轴？', 'framework' ),
			'desc' => __( '勾选在显示文章标题在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_video_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),
			// CHECKBOX
			array(
			'name' => __( '现在摘要在时间轴?', 'framework' ),
			'desc' => __( '勾选在显示文章摘要在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_video_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);

// Audio Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_audio',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '音频格式文章', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
		// OEMBED
			array(
			'name' => __( '音频地址', 'framework' ),
			'id' => "{$prefix}pf_audio_oembed",
			'desc' => __( '直接输入音频文件地址，支持外链（绝对路径）', 'framework' ),
			'type' => 'text',
		),
		// FILE ADVANCED (WP 3.5+)
	//	array(
	//		'name' => __( '音频文件上传', 'framework' ),
	//		'id' => "{$prefix}pf_audio_file",
	//		'type' => 'file_advanced',
	//		'max_file_uploads' => 1,
	//		'mime_type' => 'audio', // Leave blank for all file types
	//	),
		
			// CHECKBOX
			array(
			'name' => __( '显示标题在时间轴？', 'framework' ),
			'desc' => __( '勾选在显示文章标题在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_audio_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),
			// CHECKBOX
			array(
			'name' => __( '现在摘要在时间轴?', 'framework' ),
			'desc' => __( '勾选在显示文章摘要在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_audio_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);

// Quote Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_quote',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '引用格式文章', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
			// WYSIWYG/RICH TEXT EDITOR
			array(
				'name' => __( '引语', 'framework' ),
				'id' => "{$prefix}pf_quote",
				'type' => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw' => false,
				'std' => __( '', 'framework' ),
					// Editor settings, see wp_editor() function: look4wp.com/wp_editor
					'options' => array(
					'textarea_rows' => 4,
					'teeny' => true,
					'media_buttons' => false,
					),
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name' => __( '引语来自', 'framework' ),
				// Field ID, i.e. the meta key
				'id' => "{$prefix}pf_quote_cite",
				// Field description (optional)
				'desc' => __( '(可选)', 'framework' ),
				'type' => 'text',
			),
			// COLOR
			array(
			'name' => __( '引用颜色', 'framework' ),
			'desc' => __( '你可以自定义背景颜色(可选,默认将使用主题的颜色)', 'framework' ),
			'id' => "{$prefix}pf_quote_color",
			'type' => 'color',
			),
			
			// CHECKBOX
			array(
			'name' => __( '显示标题在时间轴？', 'framework' ),
			'desc' => __( '勾选在显示文章标题在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_quote_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),
			// CHECKBOX
			array(
			'name' => __( '现在摘要在时间轴?', 'framework' ),
			'desc' => __( '勾选在显示文章摘要在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_quote_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);


// Link Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_link',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '连接格式文章', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
				// TEXT
			array(
			// Field name - Will be used as label
			'name' => __( '连接标题', 'framework' ),
			// Field ID, i.e. the meta key
			'id' => "{$prefix}pf_link_text",
			'type' => 'text',
			),
			// URL
			array(
				'name' => __( '连接地址', 'framework' ),
				'id' => "{$prefix}pf_link_url",
				'type' => 'url',
			),
			// COLOR
			array(
			'name' => __( '连接背景颜色', 'framework' ),
			'desc' => __( '你可以自定义背景颜色(可选,默认将使用主题的颜色)', 'framework' ),
			'id' => "{$prefix}pf_link_color",
			'type' => 'color',
			),
			
			// CHECKBOX
			array(
			'name' => __( '显示标题在时间轴？', 'framework' ),
			'desc' => __( '勾选在显示文章标题在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_link_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),
			// CHECKBOX
			array(
			'name' => __( '现在摘要在时间轴?', 'framework' ),
			'desc' => __( '勾选在显示文章摘要在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_link_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);

// Status Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_status',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '状态格式文章', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
		// OEMBED
	//		array(
	//		'name' => __( '推特状态', 'framework' ),
	//		'id' => "{$prefix}pf_status_oembed",
	//		'desc' => __( '输入网址连接到你的微博', 'framework' ),
	//		'type' => 'oembed',
	//	),
		// WYSIWYG/RICH TEXT EDITOR
			array(
				'name' => __( '自定义状态', 'framework' ),
				'id' => "{$prefix}pf_status",
				'desc' => __( '输入自定义状态.', 'framework' ),
				'type' => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw' => false,
				'std' => __( '', 'framework' ),
					// Editor settings, see wp_editor() function: look4wp.com/wp_editor
					'options' => array(
					'textarea_rows' => 4,
					'teeny' => true,
					'media_buttons' => false,
					),
			),
			// COLOR
			array(
			'name' => __( '自定义状态颜色', 'framework' ),
			'desc' => __( '你可以自定义背景颜色(可选,默认将使用主题的颜色)', 'framework' ),
			'id' => "{$prefix}pf_status_color",
			'type' => 'color',
			),
			
			// CHECKBOX
			array(
			'name' => __( '显示标题在时间轴？', 'framework' ),
			'desc' => __( '勾选在显示文章标题在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_status_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),
			// CHECKBOX
			array(
			'name' => __( '现在摘要在时间轴?', 'framework' ),
			'desc' => __( '勾选在显示文章摘要在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_status_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);


// Chat Post Format
$meta_boxes[] = array(
	
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'pf_chat',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( '聊天格式文章', 'framework' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	'fields' => array(
		// WYSIWYG/RICH TEXT EDITOR
			array(
				'name' => __( '聊天记录', 'framework' ),
				'id' => "{$prefix}pf_chat_transcript",
				'type' => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw' => false,
				'std' => __( '', 'framework' ),
					// Editor settings, see wp_editor() function: look4wp.com/wp_editor
					'options' => array(
					'textarea_rows' => 4,
					'teeny' => true,
					'media_buttons' => false,
					),
			),
			
			// CHECKBOX
			array(
			'name' => __( '显示标题在时间轴？', 'framework' ),
			'desc' => __( '勾选在显示文章标题在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_chat_post_title",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),
			// CHECKBOX
			array(
			'name' => __( '现在摘要在时间轴?', 'framework' ),
			'desc' => __( '勾选在显示文章摘要在博客时间轴。', 'framework' ),
			'id' => "{$prefix}pf_chat_post_excerpt",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std' => 1,
			),

	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function ht_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'ht_register_meta_boxes' );
