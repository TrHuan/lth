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
                    <?php echo __('Search results: ') . get_search_query(); ?>
                </h1>
            </div>

            <div class="module_content">
                <?php if (have_posts()) { ?>
                    <div class="row">
                        <?php while (have_posts()) {
                            the_post(); ?>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                <?php if ( get_post_type() == 'product' ) {

                                    get_template_part('woocommerce/product-box/product-box', '');

                                } if ( get_post_type() == 'post' ) {

                                    get_template_part('template-parts/post/content', '');

                                } ?>
                            </div>
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
