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
 * @version 3.6.0
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

        do_action('woocommerce_single_product_summary_add_to_cart');

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

<?php $products = get_field('product_single_option', 'option');
$sidebar = $products['sidebar'];
if ($sidebar == 'no') {
    $item = 4;
    $item_lg = 3;
    $item_md = 2;
    $item_sm = 2;
    $item_mb = 1;
} else {
    $item = 3;
    $item_lg = 3;
    $item_md = 2;
    $item_sm = 2;
    $item_mb = 1;
} ?>

<!-- ////////////////////////////////////////////////// -->

<?php
$cross_sells = $product->get_cross_sells();

if ($cross_sells) {
    $meta_query = WC()->query->get_meta_query();

    $args = array(
        'post_type' => 'product',
        'ignore_sticky_posts' => 1,
        'no_found_rows' => 1,
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
        'post__in' => $cross_sells,
        'post__not_in' => array($id),
        'meta_query' => $meta_query
    );

    $products = new WP_Query($args);
    if ($products->have_posts()) : ?>
        <section class="lth-section lth-products related-products">
            <div class="module module_products">
                <div class="module__header title-box">
                    <h2 class="title"><?php echo __('Sản phẩm liên quan'); ?></h2>
                </div>

                <div class="module_content">
                    <div class="swiper swiper-slider swiper-products" data-item="<?php echo $item; ?>" data-item_lg="<?php echo $item_lg; ?>" data-item_md="<?php echo $item_md; ?>" data-item_sm="<?php echo $item_sm; ?>" data-item_mb="<?php echo $item_mb; ?>" data-row="1" data-dots="false" data-arrows="false" data-vertical="false" data-autoplay="false">
                        <?php while ($products->have_posts()) {
                            $products->the_post(); ?>
                            <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php } ?>

<!-- ////////////////////////////////////////////////// -->

<?php
$upsells = $product->get_upsells();

if ($upsells) {
    $meta_query = WC()->query->get_meta_query();

    $args = array(
        'post_type' => 'product',
        'ignore_sticky_posts' => 1,
        'no_found_rows' => 1,
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
        'post__in' => $upsells,
        'post__not_in' => array($id),
        'meta_query' => $meta_query
    );

    $products = new WP_Query($args);
    if ($products->have_posts()) : ?>
        <section class="lth-section lth-products related-products">
            <div class="module module_products">
                <div class="module__header title-box">
                    <h2 class="title"><?php echo __('Sản phẩm khác'); ?></h2>
                </div>

                <div class="module_content">
                    <div class="swiper swiper-slider swiper-products" data-item="<?php echo $item; ?>" data-item_lg="<?php echo $item_lg; ?>" data-item_md="<?php echo $item_md; ?>" data-item_sm="<?php echo $item_sm; ?>" data-item_mb="<?php echo $item_mb; ?>" data-row="1" data-dots="false" data-arrows="false" data-vertical="false" data-autoplay="false">
                        <?php while ($products->have_posts()) {
                            $products->the_post(); ?>
                            <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php } ?>

<!-- ////////////////////////////////////////////////// -->

<?php
$id = get_queried_object_id();

if (class_exists('WPSEO_Primary_Term')) {
    $wpseo_primary_term = new WPSEO_Primary_Term('product_cat', $id);
    $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
    $term = get_term($wpseo_primary_term);
    $term_id = $term->term_id;
}

if (!$term_id) {
    $term_id = $product->category_ids;
}

$args = [
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 8,
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in' => array($id),
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'id',
            'terms' => $term_id,
        )
    ),

];
$tets = new WP_Query($args);
if ($tets->have_posts()) { ?>
    <section class="lth-section lth-products related-products">
        <div class="module module_products">
            <div class="module__header title-box">
                <h2 class="title"><?php echo __('Sản phẩm cùng danh mục'); ?></h2>
            </div>

            <div class="module_content">
                <div class="swiper swiper-slider swiper-products" data-item="<?php echo $item; ?>" data-item_lg="<?php echo $item_lg; ?>" data-item_md="<?php echo $item_md; ?>" data-item_sm="<?php echo $item_sm; ?>" data-item_mb="<?php echo $item_mb; ?>" data-row="1" data-dots="false" data-arrows="false" data-vertical="false" data-autoplay="false">
                    <?php while ($tets->have_posts()) {
                        $tets->the_post(); ?>

                        <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php }
wp_reset_postdata();
?>