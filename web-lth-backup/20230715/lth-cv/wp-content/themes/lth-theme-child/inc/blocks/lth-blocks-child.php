<?php
/*
    Plugin Name: LTH Blocks
    Plugin URI: https://themeforest.net/
    Description: LTH Widgets
    Version: 1.0.0
    Author: LTH Design Team
    Author URI: https://wordpress.com/wordpress-plugins/
    Text Domain: lth-theme
*/

// Exit if accessed directly.
defined('ABSPATH') || exit;

define('LZB_PATH', get_theme_file_path() . '/inc/plugins/lazy-blocks/');
define('LZB_URL', get_template_directory_uri() . '/inc//plugins/lazy-blocks/');

// Include the LZB plugin.
require_once get_theme_file_path('inc/plugins/lazy-blocks/lazy-blocks.php');

add_filter('lzb/plugin_url', 'lzb_url');
function lzb_url($url)
{
    return LZB_URL;
}

///////////////////////////////////

define('GLOB_URL', get_theme_file_path() . '/inc/blocks/controls/lazyblock-*/*.php');

foreach (glob(GLOB_URL) as $file) {
    require_once($file);
}

require_once get_theme_file_path('inc/blocks/blocks-controls.php');