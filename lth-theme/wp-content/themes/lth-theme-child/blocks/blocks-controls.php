<?php

if (class_exists('WooCommerce')) {
    function lth_allowed_block_types($allowed_blocks)
    {
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

            'lazyblock/lth-shopcart',
            'lazyblock/lth-categories-product',
            'lazyblock/lth-products',
            'lazyblock/lth-products-category',

            ////////////////////////////////////

        );
    }
    add_action('allowed_block_types', 'lth_allowed_block_types', 11);
} else {
    function lth_allowed_block_types($allowed_blocks)
    {
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
            'lazyblock/lth-countdown',
            'lazyblock/lth-gallery',
            'lazyblock/lth-html-blocks',
            'lazyblock/lth-icons',
            'lazyblock/lth-languages',
            'lazyblock/lth-line',
            'lazyblock/lth-list',
            'lazyblock/lth-logo',
            'lazyblock/lth-menu',
            'lazyblock/lth-quote',
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
    }
    add_action('allowed_block_types', 'lth_allowed_block_types', 11);
}