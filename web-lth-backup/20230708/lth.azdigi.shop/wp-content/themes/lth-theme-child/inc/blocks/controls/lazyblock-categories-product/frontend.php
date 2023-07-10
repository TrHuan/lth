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
    function lth_categories_product_output_fe($output, $attributes)
    {
        ob_start();
?>
        <article class="lth-categories">
            <div class="module module_categories">
                <?php if (!empty($attributes['title']) || !empty($attributes['description'])) : ?>
                    <div class="module_header title-box title-align-<?php echo $attributes['title_align']; ?>">
                        <?php if (!empty(($attributes['title']))) : ?>
                            <h2 class="title">
                                <?php if (!empty($attributes['title_url'])) : ?>
                                    <a href="<?php echo esc_url($attributes['title_url']); ?>" title="">
                                <?php endif; ?>
                                    <?php echo wpautop(esc_html($attributes['title'])); ?>
                                <?php if (!empty($attributes['title_url'])) : ?>
                                    </a>
                                <?php endif; ?>
                            </h2>
                        <?php endif; ?>

                        <?php if (!empty($attributes['description'])) : ?>
                            <div class="infor">
                                <?php echo wpautop(esc_html($attributes['description'])); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="module_content module_style_<?php echo $attributes['style']; ?>">
                    <div class="swiper swiper-slider swiper-categories" data-item="<?php echo $attributes['item']; ?>"
                     data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>"
                      data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>"
                       data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>"
                        data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>"
                         data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                        <?php foreach ($attributes['items'] as $inner) {
                            $term = get_term_by('id', $inner['item'], 'product_cat'); ?>
                            <div class="item">
                                <div class="post-box">
                                    <?php $thumbnail_id = get_woocommerce_term_meta($inner['item'], 'thumbnail_id', true);
                                    $image = wp_get_attachment_url($thumbnail_id);
                                    if ($image) { ?>
                                        <div class="post-image">
                                            <a href="<?php echo get_term_link($term->slug, 'product_cat'); ?>" class="image">
                                                <img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>" width="<?php echo $attributes['width_image']; ?>" height="<?php echo $attributes['height_image']; ?>">
                                            </a>
                                        </div>
                                    <?php } ?>

                                    <div class="post-content" style="text-align: <?php echo $inner['text_align']; ?>">
                                        <h3 class="post-name">
                                            <a href="<?php if ($term->slug) { echo get_term_link($term->slug, 'product_cat'); } ?>">
                                                <?php echo $term->name; ?>
                                            </a>
                                        </h3>

                                        <?php if ($term->description) { ?>
                                            <div class="post-excerpt">
                                                <?php echo wpautop($term->description); ?>
                                            </div>
                                        <?php } ?>

                                        <?php if ($attributes['button_readmore'] == "yes") { ?>
                                            <div class="post-button">
                                                <a href="<?php if ($term->slug) { echo get_term_link($term->slug, 'product_cat'); } ?>" title="" class="btn">
                                                    <?php echo __('Xem thêm'); ?>
                                                </a>
                                            </div>
                                        <?php } ?>
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