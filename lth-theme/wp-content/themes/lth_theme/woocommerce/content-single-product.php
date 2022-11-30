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

defined( 'ABSPATH' ) || exit;

global $product;

// $product = get_field('product_single_option','option');
// $sidebar = $product['sidebar'];

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
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
        do_action( 'woocommerce_before_single_product_summary' );
        ?>
    </div>

    <div class="summary entry-summary">
        <?php
            do_action('woocommerce_single_product_summary_title');
            do_action('woocommerce_single_product_summary_rating');
            do_action('woocommerce_single_product_summary_price');
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
                    <?php do_action( 'woocommerce_product_additional_information', $product ); ?>
                </div>    
            </div>
            <div class="tab-pane" id="review">  
                <?php comments_template(); ?> 
            </div>

        </div>      
    </div>
</article>

<article class="related-product">
    <div class="sec-title-two">
        <h3><?php echo __('Sản phẩm liên quan') ?></h3>
        <span class="border"></span>
    </div>

    <div class="related-product-items slick-slider slick-products-related">
        <?php
        $san_pham_lien_quan = get_field('san_pham_lien_quan');
        if( $san_pham_lien_quan ): ?>
            <?php foreach( $san_pham_lien_quan as $post ):
                $permalink = get_permalink( $post );
                $title = get_the_title( $post );
                ?>

                <?php get_template_part('woocommerce/product-box/product-box', ''); ?>

            <?php endforeach; ?>
        <?php endif; ?> 
    </div>
</article>

<?php
    $id = get_queried_object_id();

    if ( class_exists( 'WPSEO_Primary_Term' ) ) {
        $wpseo_primary_term = new WPSEO_Primary_Term( 'product_cat', $id );
        $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
        $term = get_term( $wpseo_primary_term );
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
                'terms' => $term->term_id,
            )
        ),

    ];
    $tets = new WP_Query($args);
    if ($tets->have_posts()) { ?>
    <section class="lth-section lth-products">
        <div class="container">                   
            <div class="row"> 
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module__header">
                        <div class="module_title">
                            <h2 class="title"><?php echo __('Sản phẩm cùng danh mục'); ?></h2>
                        </div>
                    </div>

                    <div class="module module_products">
                        <div class="module_content">
                            <div class="slick-slider slick-products-3">
                                <?php while ($tets->have_posts()) {
                                    $tets-> the_post(); ?>
                                    
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
