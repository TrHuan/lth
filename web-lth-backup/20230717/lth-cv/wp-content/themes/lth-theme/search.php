<?php
/**
 * The template for displaying search results pages
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page page-searchs">
    <div class="container">
        <section class="module module_posts searchs-list">            
            <div class="module_title">
                <h1 class="title">
                    <?php echo __('Kết quả tìm kiếm: ') . get_search_query(); ?>
                </h1>
            </div>

            <div class="module_content <?php if (class_exists('WooCommerce')) { ?>module_products<?php } ?>">
                <?php if (have_posts()) { ?>
                    <div class="groups-box">
                        <?php while (have_posts()) {
                            the_post(); ?>
                            <?php if ( get_post_type() == 'product' ) {
                                get_template_part('woocommerce/product-box/product-box', '');
                            } if ( get_post_type() == 'post' ) {
                                get_template_part('template-parts/post/content', '');
                            } ?>
                        <?php } ?>                            
                    </div>

                    <?php require_once(LIBS_DIR . '/pagination.php');
                } else {
                    get_template_part('template-parts/content', 'none');
                } ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
