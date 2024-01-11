<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     7.0.1
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');

$product = get_field('product_single_option', 'option');
$sidebar = $product['sidebar'];
$banner = $product['banner']; ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main-site main-page main-single-product">
    <div class="main-container">
        <div class="main-content sidebar-<?php echo $sidebar; ?>">

            <section id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
                <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

                <div class="container">
                    <div class="row">
                        <?php if ($sidebar == 'left') { ?>
                            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                                <div class="sidebars">
                                    <!-- Sidebar -->
                                    <?php if (is_active_sidebar('sidebar_single_product')) { ?>

                                        <aside class="lth-sidebars">
                                            <?php dynamic_sidebar('sidebar_single_product'); ?>
                                        </aside>

                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($sidebar == 'no') { ?>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php } else { ?>
                            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                        <?php } ?>

                            <?php while (have_posts()) : ?>
                                <?php the_post(); ?>

                                <?php wc_get_template_part('content', 'single-product'); ?>

                            <?php endwhile; ?>

                        </div>

                        <?php if ($sidebar == 'right') { ?>
                            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                                <div class="sidebars">
                                    <!-- Sidebar -->
                                    <?php if (is_active_sidebar('sidebar_single_product')) { ?>

                                        <aside class="lth-sidebars">
                                            <?php dynamic_sidebar('sidebar_single_product'); ?>
                                        </aside>

                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>

            <?php 
                $item = 4;
                $item_lg = 3;
                $item_md = 2;
                $item_sm = 2;
                $item_mb = 1;
            ?>

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
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
            } else {
                $cat = false;
                $primary_cat_id = get_post_meta( $id, 'rank_math_primary_product_cat', true );
                if ( $primary_cat_id ) {
                    $term_id = $primary_cat_id;
                }
                if ( ! is_wp_error( $cat ) ) {
                    echo '<a href="'. $cat_link .'" title="">';
                        echo $cat->name;
                    echo '</a>';
                }

                if (!$term_id) {
                    $term_id = $product->category_ids;
                }
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
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
                            </div>
                        </div>
                    </div>
                </section>
            <?php }
            wp_reset_postdata();
            ?>

            <?php if ($banner) {
                $args = array(
                    'post_type' => 'html-blocks',
                    'p' => $banner,
                );
                $loop = new WP_Query($args);
                while ($loop->have_posts()) :
                    $loop->the_post();
                    global $post;
                    the_content();
                endwhile;
                // reset post data
                wp_reset_postdata();
            } ?>

        </div>
    </div>
</main>

<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
