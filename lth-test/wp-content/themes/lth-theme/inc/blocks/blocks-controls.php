<?php

function lth_allowed_block_types($allowed_blocks)
{
    if (class_exists('WooCommerce')) {
        $shopcart = 'lazyblock/lth-shopcart';
        $categories_product = 'lazyblock/lth-categories-product';
        $products = 'lazyblock/lth-products';
        $products_category = 'lazyblock/lth-products-category';
    }

    if ( class_exists( 'WQM_Qr_Code_Generator' ) ) {
        $qrcode = 'lazyblock/lth-contact-qrcode';
    }

    return array(
        'core/columns',
        'core/freeform', // Classic
        // 'core/paragraph',
        // 'lazyblock/lth-blocks',

        'lazyblock/lth-section',
        'lazyblock/lth-banner',
        'lazyblock/lth-blogs',
        'lazyblock/lth-blogs-category',
        'lazyblock/lth-brand',
        'lazyblock/lth-button',
        'lazyblock/lth-categories',
        'lazyblock/lth-classic',
        'lazyblock/lth-contact',
        'lazyblock/lth-contact-form',
        'lazyblock/lth-countdown',
        'lazyblock/lth-gallery',
        'lazyblock/lth-html-blocks',
        'lazyblock/lth-icons',
        'lazyblock/lth-languages',
        'lazyblock/lth-line',
        'lazyblock/lth-list',
        'lazyblock/lth-login',
        'lazyblock/lth-logo',
        'lazyblock/lth-map',
        'lazyblock/lth-megamenu',
        'lazyblock/lth-megamenu-mobile',
        'lazyblock/lth-menu',
        'lazyblock/lth-quote',
        'lazyblock/lth-search',
        'lazyblock/lth-skins',
        'lazyblock/lth-slider',
        'lazyblock/lth-step-addon',
        'lazyblock/lth-step-paymentoption',
        'lazyblock/lth-step-selectpackage',
        'lazyblock/lth-step-shippinginformation',
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

        $qrcode,

        ////////////////////////////////////

    );
}
add_action('allowed_block_types', 'lth_allowed_block_types', 11);