<?php

/**
 * @block-slug  :   lth-products
 * @block-output:   lth_products_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-products/frontend_callback', 'lth_products_output_fe', 10, 2);

if (!function_exists('lth_products_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_products_output_fe($output, $attributes)
    {
        ob_start();
?>
        <article class="lth-products">
            <div class="module module_products">
                <?php if ($attributes['title'] || $attributes['description'] || $attributes['show_items']) : ?>
                    <div class="module_header title-box">
                        <?php if (isset($attributes['title'])) : ?>
                            <h2 class="title">
                                <?php if ($attributes['title_url']) : ?>
                                    <a href="<?php echo esc_url($attributes['title_url']); ?>" title="">
                                    <?php else : ?>
                                        <span>
                                        <?php endif; ?>
                                        <?php echo esc_html($attributes['title']); ?>
                                        <?php if ($attributes['title_url']) : ?>
                                    </a>
                                <?php else : ?>
                                    </span>
                                <?php endif; ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($attributes['description']) : ?>
                            <div class="infor">
                                <?php echo esc_html($attributes['description']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($attributes['show_items']) : ?>
                            <div class="cat-list tab-list">
                                <ul>
                                    <?php $j = 0;
                                    foreach ($attributes['select'] as $inner) :
                                        $j++;

                                        if ($inner == 'new_products') { ?>
                                            <li class="<?php if ($j == 1) {
                                                            echo 'active';
                                                        } ?>">
                                                <a href="#new_products">
                                                    <?php echo __('New Products'); ?>
                                                </a>
                                            </li>
                                        <?php }
                                        if ($inner == 'featured_products') { ?>
                                            <li class="<?php if ($j == 1) {
                                                            echo 'active';
                                                        } ?>">
                                                <a href="#featured_products">
                                                    <?php echo __('New Products'); ?>
                                                </a>
                                            </li>
                                        <?php }
                                        if ($inner == 'sale_products') { ?>
                                            <li class="<?php if ($j == 1) {
                                                            echo 'active';
                                                        } ?>">
                                                <a href="#sale_products">
                                                    <?php echo __('Sale Products'); ?>
                                                </a>
                                            </li>
                                        <?php }
                                        if ($inner == 'random_products') { ?>
                                            <li class="<?php if ($j == 1) {
                                                            echo 'active';
                                                        } ?>">
                                                <a href="#random_products">
                                                    <?php echo __('Random Products'); ?>
                                                </a>
                                            </li>
                                        <?php }
                                        if ($inner == 'viewed_products') { ?>
                                            <li class="<?php if ($j == 1) {
                                                            echo 'active';
                                                        } ?>">
                                                <a href="#viewed_products">
                                                    <?php echo __('Viewed Products'); ?>
                                                </a>
                                            </li>
                                    <?php }
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class=" module_content content_text_<?php echo $attributes['text_align']; ?> tab-content">
                    <?php $i = 0;
                    foreach ($attributes['select'] as $inner) :
                        $i++;

                        if ($inner == 'new_products') { ?>
                            <div id="new_products" class="tab-content-item <?php if ($i == 1) {
                                                                                echo 'active';
                                                                            } ?>">
                                <?php $args = [
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    // 'post__in' => $kq,
                                    'order' => 'desc',
                                    'orderby' => 'date',
                                    'posts_per_page' => $attributes['post_number'],
                                ];

                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) { ?>
                                    <div class="swiper swiper-slider swiper-products" data-item="<?php echo $attributes['item']; ?>" data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>" data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>" data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>" data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>" data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                                        <?php while ($wp_query->have_posts()) {
                                            $wp_query->the_post(); ?>
                                            <?php //load file tương ứng với post format
                                            get_template_part('woocommerce/product-box/product-box', ''); ?>
                                        <?php } ?>
                                    </div>
                                <?php
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                                // reset post data
                                wp_reset_postdata(); ?>
                            </div>
                        <?php } ?>

                        <?php if ($inner == 'sale_products') { ?>
                            <div id="sale_products" class="tab-content-item <?php if ($i == 1) {
                                                                                echo 'active';
                                                                            } ?>">
                                <?php $args = [
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'posts_per_page' => $attributes['post_number'],
                                    'meta_query'     => array(
                                        'relation' => 'OR',
                                        array(
                                            'key'           => '_sale_price',
                                            'value'         => 0,
                                            'compare'       => '>',
                                            'type'          => 'numeric'
                                        )
                                    )
                                ];

                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) { ?>
                                    <div class="swiper swiper-slider swiper-products" data-item="<?php echo $attributes['item']; ?>" data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>" data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>" data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>" data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>" data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                                        <?php while ($wp_query->have_posts()) {
                                            $wp_query->the_post(); ?>
                                            <?php //load file tương ứng với post format
                                            get_template_part('woocommerce/product-box/product-box', ''); ?>
                                        <?php } ?>
                                    </div>
                                <?php
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                                // reset post data
                                wp_reset_postdata(); ?>
                            </div>
                        <?php } ?>

                        <?php if ($inner == 'featured_products') { ?>
                            <div id="featured_products" class="tab-content-item <?php if ($i == 1) {
                                                                                    echo 'active';
                                                                                } ?>">
                                <?php $kq = array();
                                foreach ($attributes['products'] as $inner) {
                                    $post = $inner['product'];
                                    $kq[] = $post;
                                }

                                $args = [
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'post__in' => $kq,
                                    'orderby' => "post__in",
                                    'posts_per_page' => $attributes['post_number'],
                                ];

                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) { ?>
                                    <div class="swiper swiper-slider swiper-products" data-item="<?php echo $attributes['item']; ?>" data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>" data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>" data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>" data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>" data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                                        <?php while ($wp_query->have_posts()) {
                                            $wp_query->the_post(); ?>
                                            <?php //load file tương ứng với post format
                                            get_template_part('woocommerce/product-box/product-box', ''); ?>
                                        <?php } ?>
                                    </div>
                                <?php
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                                // reset post data
                                wp_reset_postdata(); ?>
                            </div>
                        <?php } ?>

                        <?php if ($inner == 'random_products') { ?>
                            <div id="random_products" class="tab-content-item <?php if ($i == 1) {
                                                                                    echo 'active';
                                                                                } ?>">
                                <?php $args = [
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'orderby' => 'rand',
                                    'posts_per_page' => $attributes['post_number'],
                                ];

                                $wp_query = new WP_Query($args);
                                if ($wp_query->have_posts()) { ?>
                                    <div class="swiper swiper-slider swiper-products" data-item="<?php echo $attributes['item']; ?>" data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>" data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>" data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>" data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>" data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                                        <?php while ($wp_query->have_posts()) {
                                            $wp_query->the_post(); ?>
                                            <?php //load file tương ứng với post format
                                            get_template_part('woocommerce/product-box/product-box', ''); ?>
                                        <?php } ?>
                                    </div>
                                <?php
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                                // reset post data
                                wp_reset_postdata(); ?>
                            </div>
                        <?php } ?>

                        <?php if ($inner == 'viewed_products') { ?>
                            <div id="viewed_products" class="tab-content-item <?php if ($i == 1) {
                                                                                    echo 'active';
                                                                                } ?>">
                                <?php if (isset($_SESSION["viewed"]) && $_SESSION["viewed"]) {
                                    $data = $_SESSION["viewed"];
                                    $args = [
                                        'post_type' => 'product',
                                        'post_status' => 'publish',
                                        'post__in' => $data,
                                        'orderby' => 'rand',
                                        'posts_per_page' => $attributes['post_number'],
                                    ];

                                    $getposts = new WP_query($args);
                                    global $wp_query;
                                    $wp_query->in_the_loop = true; ?>
                                    <div class="swiper swiper-slider swiper-products" data-item="<?php echo $attributes['item']; ?>" data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>" data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>" data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>" data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>" data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                                        <?php while ($getposts->have_posts()) : $getposts->the_post();
                                            global $product; ?>
                                            <?php //load file tương ứng với post format
                                            get_template_part('woocommerce/product-box/product-box', ''); ?>
                                        <?php endwhile;
                                        // reset post data
                                        wp_reset_postdata(); ?>
                                    </div>
                                <?php } else {
                                    get_template_part('template-parts/content', 'none');
                                } ?>
                            </div>
                    <?php }
                    endforeach; ?>
                </div>

                <?php if ($attributes['button_url']) : ?>
                    <div class="module_button">
                        <a href="<?php echo esc_url($attributes['button_url']); ?>">
                            <?php echo $attributes['button_text']; ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </article>
<?php
        return ob_get_clean();
    }
endif;
?>