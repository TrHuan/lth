<?php

/**
 * @block-slug  :   lth-categories
 * @block-output:   lth_categories_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-categories/frontend_callback', 'lth_categories_output_fe', 10, 2);

if (!function_exists('lth_categories_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_categories_output_fe($output, $attributes)
    {
        ob_start();
?>
        <article class="lth-categories <?php echo $attributes['class']; ?>">
            <div class="module module_categories">
                <div class="module_content module_style_<?php echo $attributes['style']; ?>">
                    <div class="swiper swiper-row-<?php echo $attributes['item_row']; ?> swiper-slider swiper-categories" data-item="<?php echo $attributes['item']; ?>"
                     data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>"
                      data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>"
                       data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>"
                        data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>"
                         data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                        <?php foreach ($attributes['items'] as $inner) { ?>
                            <div class="item">
                                <div class="post-box">
                                    <?php $image = get_field('image', 'category_' . $inner['item']);
                                    if ($image) { ?>
                                        <div class="post-image">
                                            <a href="<?php echo get_category_link($inner['item']); ?>" class="image">
                                                <img src="<?php echo $image; ?>" alt="<?php echo get_cat_name($inner['item']); ?>" width="<?php echo $attributes['width_image']; ?>" height="<?php echo $attributes['height_image']; ?>">
                                            </a>
                                        </div>
                                    <?php } ?>

                                    <div class="post-content" style="text-align: <?php echo $inner['text_align']; ?>">
                                        <h3 class="post-name">
                                            <a href="<?php echo get_category_link($inner['item']); ?>">
                                                <?php echo get_cat_name($inner['item']); ?>
                                            </a>
                                        </h3>

                                        <?php if (category_description($inner['item'])) { ?>
                                            <div class="post-excerpt">
                                                <?php echo wpautop(category_description($inner['item'])); ?>
                                            </div>
                                        <?php } ?>

                                        <?php if ($attributes['button_readmore'] == "yes") { ?>
                                            <div class="post-button">
                                                <a href="<?php echo get_category_link($inner['item']); ?>" title="" class="btn">
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