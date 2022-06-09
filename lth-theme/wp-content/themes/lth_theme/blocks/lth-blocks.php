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

define( 'LZB_PATH', get_stylesheet_directory() . '/blocks/plugins/lazy-blocks/' );
define( 'LZB_URL', get_stylesheet_directory_uri() . '/blocks/plugins/lazy-blocks/' );

// Include the LZB plugin.
require_once LZB_PATH . 'lazy-blocks.php';

add_filter( 'lzb/plugin_url', 'lzb_url' );
function lzb_url( $url ) {
    return LZB_URL;
}

///////////////////////////////////

foreach(glob(BLOCKS_DIR . '/controls/lazyblock-*/*.php') as $file) {
    require_once($file);
}

function lth_allowed_block_types( $allowed_blocks ) {     
    return array(
        'core/columns',
        'core/freeform', // Classic
        'woocommerce/attribute-filter',
        'woocommerce/price-filter',

        'lazyblock/lth-section',
        'lazyblock/lth-blocks',
        'lazyblock/lth-banner',
        'lazyblock/lth-blogs',
        'lazyblock/lth-brand',
        'lazyblock/lth-shopcart',
        'lazyblock/lth-categories',
        'lazyblock/lth-categories-product',
        'lazyblock/lth-classic',
        'lazyblock/lth-contact',
        'lazyblock/lth-features',
        'lazyblock/lth-gallery',
        'lazyblock/lth-html-blocks',
        'lazyblock/lth-list',
        'lazyblock/lth-languages',
        'lazyblock/lth-logo',
        'lazyblock/lth-menu',
        'lazyblock/lth-products',
        'lazyblock/lth-search',
        'lazyblock/lth-slider',
        // 'lazyblock/lth-tab',
        'lazyblock/lth-team',
        'lazyblock/lth-testimonials',
        'lazyblock/lth-title',
        'lazyblock/lth-button',
        'lazyblock/lth-toggle',
        'lazyblock/lth-video',

        ////////////////////////////////////

    );  
} add_action('allowed_block_types', 'lth_allowed_block_types', 11);
