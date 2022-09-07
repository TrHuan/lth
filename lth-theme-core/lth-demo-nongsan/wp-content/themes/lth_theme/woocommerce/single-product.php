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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

$products = get_field('product_single_option','option');
$sidebar = $products['sidebar'];  ?>

<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

<main class="main-site main-page main-single-product">
    <div class="main-container">
        <div class="main-content">

            <section id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
                <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

                <div class="container">
                    <div class="row">
                        <?php if ($sidebar == 'left') { ?>
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
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
                            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <?php } ?>

                            <?php while ( have_posts() ) : ?>
                                <?php the_post(); ?>

                                <?php wc_get_template_part( 'content', 'single-product' ); ?>

                            <?php endwhile; // end of the loop. ?>
                            
                        </div>

                        <?php if ($sidebar == 'right') { ?>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
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

        </div>
    </div>
</main>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
