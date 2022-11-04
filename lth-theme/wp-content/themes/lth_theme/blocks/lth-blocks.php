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

if ( class_exists( 'WooCommerce' ) ) {
    function lth_allowed_block_types( $allowed_blocks ) {     
        return array(
            'core/columns',
            'core/freeform', // Classic
            // 'core/paragraph',
            // 'woocommerce/attribute-filter',
            // 'woocommerce/price-filter',

            'lazyblock/lth-section',
            'lazyblock/lth-banner',
            // 'lazyblock/lth-blocks',
            'lazyblock/lth-blogs',
            'lazyblock/lth-brand',
            'lazyblock/lth-button',
            'lazyblock/lth-categories',
            'lazyblock/lth-classic',
            'lazyblock/lth-contact',
            'lazyblock/lth-features',
            'lazyblock/lth-gallery',
            'lazyblock/lth-html-blocks',
            'lazyblock/lth-languages',
            'lazyblock/lth-line',
            'lazyblock/lth-list',
            'lazyblock/lth-logo',
            'lazyblock/lth-menu',
            'lazyblock/lth-search',
            'lazyblock/lth-skins',
            'lazyblock/lth-slider',
            // 'lazyblock/lth-tab',
            'lazyblock/lth-team',
            'lazyblock/lth-testimonials',
            'lazyblock/lth-title',
            'lazyblock/lth-toggle',
            'lazyblock/lth-video',
            
            'lazyblock/lth-shopcart',
            'lazyblock/lth-categories-product',
            'lazyblock/lth-products',

            ////////////////////////////////////

        );  
    } add_action('allowed_block_types', 'lth_allowed_block_types', 11);
} else {
    function lth_allowed_block_types( $allowed_blocks ) {     
        return array(
            'core/columns',
            'core/freeform',

            'lazyblock/lth-section',
            'lazyblock/lth-banner',
            'lazyblock/lth-blogs',
            'lazyblock/lth-brand',
            'lazyblock/lth-button',
            'lazyblock/lth-categories',
            'lazyblock/lth-classic',
            'lazyblock/lth-contact',
            'lazyblock/lth-features',
            'lazyblock/lth-gallery',
            'lazyblock/lth-html-blocks',
            'lazyblock/lth-languages',
            'lazyblock/lth-line',
            'lazyblock/lth-list',
            'lazyblock/lth-logo',
            'lazyblock/lth-menu',
            'lazyblock/lth-search',
            'lazyblock/lth-skins',
            'lazyblock/lth-slider',
            'lazyblock/lth-team',
            'lazyblock/lth-testimonials',
            'lazyblock/lth-title',
            'lazyblock/lth-toggle',
            'lazyblock/lth-video',

            ////////////////////////////////////

        );  
    } add_action('allowed_block_types', 'lth_allowed_block_types', 11);
}