<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

global $product;

// $product = get_field('product_single_option','option');
// $sidebar = $product['sidebar'];

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>

<article class="product-content-box">
    <div class="product-images">
        <?php
        /**
         * Hook: woocommerce_before_single_product_summary.
         *
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked woocommerce_show_product_images - 20
         */
        do_action('woocommerce_before_single_product_summary');
        ?>
    </div>

    <div class="summary entry-summary">
        <?php
        do_action('woocommerce_single_product_summary_title');

        do_action('woocommerce_single_product_summary_rating');

        if (!$product->get_regular_price()) { ?>
            <div class="price">
                <span class="woocommerce-Price-amount amount">
                    <?php echo __('Liên hệ'); ?>
                </span>
            </div>
        <?php } else {
            do_action('woocommerce_single_product_summary_price');
        }

        do_action('woocommerce_single_product_summary_excerpt');

        do_action('woocommerce_single_product_summary_meta');

        echo '<div class="cart-btns">';
            do_action('woocommerce_single_product_summary_add_to_cart');

            echo apply_filters( 'woocommerce_loop_add_to_cart_link',
            sprintf( '<div><a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
                class="%s button ajax_add_to_cart single_add_to_cart_button btn-buynow" data-url="'. wc_get_cart_url() .'">Mua ngay</a></div>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( $product->id ),
            esc_attr( $product->get_sku() ),
            $product->is_purchasable() ? 'add_to_cart_button' : '',
            esc_attr( $product->product_type ),
            esc_html( $product->add_to_cart_text() ) ), $product );
        echo '</div>';

        do_action('woocommerce_single_product_summary_sharing');
        ?>
    </div>
</article>

<article class="lth-product-tabs">
    <div class="product-tab-box">
        <ul class="nav nav-tabs tab-menu">
            <li class="active">
                <a href="#" class="title" data_tab="desc">
                    <?php echo __('Chi tiết sản phẩm') ?>
                </a>
            </li>
            <li>
                <a href="#" class="title" data_tab="info">
                    <?php echo __('Thông tin bổ sung') ?>
                </a>
            </li>
            <li class="">
                <a href="#" class="title" data_tab="review">
                    <?php echo __('Bình luận') ?>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="desc">
                <div class="product-details-content">
                    <div class="desc-content-box">
                        <?php the_content(); ?>
                    </div>

                </div>
            </div>
            <div class="tab-pane" id="info">
                <div class="product-info-content">
                    <?php do_action('woocommerce_product_additional_information', $product); ?>
                </div>
            </div>
            <div class="tab-pane" id="review">
                <?php comments_template(); ?>
            </div>

        </div>
    </div>
</article>