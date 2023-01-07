<?php

function lth_allowed_block_types($allowed_blocks)
{
    if (class_exists('WooCommerce')) {
        $shopcart = 'lazyblock/lth-shopcart';
        $categories_product = 'lazyblock/lth-categories-product';
        $products = 'lazyblock/lth-products';
        $products_category = 'lazyblock/lth-products-category';
    }

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
        'lazyblock/lth-blogs-category',
        'lazyblock/lth-brand',
        'lazyblock/lth-button',
        'lazyblock/lth-categories',
        'lazyblock/lth-classic',
        'lazyblock/lth-contact',
        'lazyblock/lth-countdown',
        'lazyblock/lth-gallery',
        'lazyblock/lth-html-blocks',
        'lazyblock/lth-icons',
        'lazyblock/lth-languages',
        'lazyblock/lth-line',
        'lazyblock/lth-list',
        'lazyblock/lth-login',
        'lazyblock/lth-logo',
        'lazyblock/lth-megamenu',
        'lazyblock/lth-megamenu-mobile',
        'lazyblock/lth-menu',
        'lazyblock/lth-quote',
        'lazyblock/lth-search',
        'lazyblock/lth-skins',
        'lazyblock/lth-slider',
        // 'lazyblock/lth-tab',
        'lazyblock/lth-team',
        'lazyblock/lth-testimonials',
        'lazyblock/lth-title',
        'lazyblock/lth-toggle',
        'lazyblock/lth-video',

        $shopcart,
        $categories_product,
        $products,
        $products_category,

        ////////////////////////////////////

    );
}
add_action('allowed_block_types', 'lth_allowed_block_types', 11);