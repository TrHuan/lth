<?php

/**
 * @block-slug  :   lth-categories-product
 * @block-output:   lth_categories_product_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-categories-product/frontend_callback', 'lth_categories_product_output_fe', 10, 2);

if (!function_exists('lth_categories_product_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_categories_product_output_fe($output, $attributes) {
        ob_start();
?>
    <article class="lth-categories">
        <div class="module module_categories">
            <?php if ($attributes['title'] || $attributes['description'] || $attributes['categories']) : ?>
                <div class="module_header title-box">
                    <?php if (isset($attributes['title'])) : ?>
                        <h2 class="title">
                            <?php if ($attributes['title_url']) : ?> 
                                <a href="<?php echo esc_url($attributes['title_url']); ?>" title="">
                            <?php endif; ?>
                                <?php echo wpautop(esc_html($attributes['title'])); ?>
                            <?php if ($attributes['title_url']) : ?> 
                                </a>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($attributes['description']) : ?>
                        <div class="infor">
                            <?php echo wpautop(esc_html($attributes['description'])); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="module_content">
                <div class="swiper swiper-slider swiper-categories"
                data-item="<?php echo $attributes['item']; ?>" 
                data-item_lg="<?php echo $attributes['item_lg']; ?>" 
                data-item_md="<?php echo $attributes['item_md']; ?>" 
                data-item_sm="<?php echo $attributes['item_sm']; ?>" 
                data-item_mb="<?php echo $attributes['item_mb']; ?>" 
                data-row="<?php echo $attributes['item_row']; ?>" 
                data-dots="<?php echo $attributes['item_dots']; ?>" 
                data-arrows="<?php echo $attributes['item_arrows']; ?>" 
                data-vertical="<?php echo $attributes['item_vertical']; ?>"
                data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                    <?php foreach( $attributes['items'] as $inner ) {
                        $term = get_term_by( 'id', $inner['item'], 'product_cat' ); ?>
                        <div class="item">
                            <div class="content">
                                <div class="content-header">
                                    <?php $thumbnail_id = get_woocommerce_term_meta( $inner['item'], 'thumbnail_id', true );
                                    $image = wp_get_attachment_url( $thumbnail_id );
                                    if ($image) { ?>
                                        <div class="content-image">
                                            <a href="<?php echo get_term_link($term->slug, 'product_cat'); ?>">
                                                <img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="content-box">
                                        <h3 class="content-name">
                                            <a href="<?php echo get_term_link($term->slug, 'product_cat'); ?>">
                                                <?php echo $term->name; ?>              
                                            </a>
                                        </h3>
                                        <div class="content-excerpt">
                                            <?php echo wpautop($term->description); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="content-footer">
                                    <a href="<?php echo get_term_link($term->slug, 'product_cat'); ?>" title="" class="btn"><?php echo __('Xem th??m'); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </article>
<?php
        return ob_get_clean();
    }
endif;
?>