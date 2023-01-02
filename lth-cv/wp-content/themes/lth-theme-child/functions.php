<?php
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{
	$parenthandle = 'parent-style'; // This is 'parent-style' for the parent theme.
	$theme        = wp_get_theme();

	wp_enqueue_style(
		$parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),  // If the parent theme code has a dependency, copy it to here.
		$theme->parent()->get('Version')
	);

	wp_enqueue_style(
		'child-style',
		get_stylesheet_uri(),
		array($parenthandle),
		$theme->get('Version') // This only works if you have Version defined in the style header.
	);
}

// Enqueueing Styles và Scripts
add_action('wp_enqueue_scripts', 'my_plugin_add_stylesheet');
function my_plugin_add_stylesheet()
{
	wp_enqueue_style('my-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0', 'all');
}

//////////////////////////////////////////////////

// theme options
require_once get_theme_file_path('acf/acf.php');
require_once get_theme_file_path('inc/theme-options.php');

// khởi tạo widgets content
require_once get_theme_file_path('blocks/lth-blocks.php');
