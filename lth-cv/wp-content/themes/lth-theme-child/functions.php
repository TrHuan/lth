<?php
add_action('wp_enqueue_scripts', 'theme_child_enqueue_styles');
function theme_child_enqueue_styles() {
	$parenthandle = 'parent-style'; // Đây là 'style' cho chủ đề gốc.
	$theme        = wp_get_theme();

	wp_enqueue_style(
		$parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),  // Nếu mã chủ đề gốc có phần phụ thuộc, hãy sao chép mã đó vào đây.
		$theme->parent()->get('Version')
	);

	wp_enqueue_style(
		'child-style',
		get_stylesheet_uri(),
		array($parenthandle),
		$theme->get('Version') // Điều này chỉ hoạt động nếu bạn có Phiên bản được xác định trong tiêu đề kiểu.
	);
}

//////////////////////////////////////////////////

$my_theme = wp_get_theme();
define('THEME_CHILD_NAME', sanitize_title($my_theme->get('Name')));

// Enqueueing Styles và Scripts
function theme_child_add_stylesheet() {
	// file css
	wp_enqueue_style(THEME_CHILD_NAME . '-css-customs', get_stylesheet_directory_uri() . '/assets/css/customs.css', false, '1.0.0', 'all');

	////////////////////////////////////////////////////////////////////////////////////////////////////

	// file js
	wp_enqueue_script(THEME_CHILD_NAME . '-js-customs', get_stylesheet_directory_uri() . '/assets/js/customs.js', false, '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'theme_child_add_stylesheet', 99);

if (THEME_CHILD_NAME == 'lth_theme_child') {
	// theme options
	require_once get_theme_file_path('plugins/acf/acf.php');
	require_once get_theme_file_path('inc/theme-options.php');

	// khởi tạo widgets content
	require_once get_theme_file_path('inc/blocks/lth-blocks-child.php');
}
