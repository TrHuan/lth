<?php

/**
 * @block-slug  :   lth-brand
 * @block-output:   lth_brand_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-brand/frontend_callback', 'lth_brand_output_fe', 10, 2);

if (!function_exists('lth_brand_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_brand_output_fe($output, $attributes)
    {
        ob_start();
?>
        <article class="lth-brands <?php echo $attributes['class']; ?>">
            <div class="module module_brands">
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

                <div class="module_content">
                    <div class="swiper swiper-slider swiper-brands" data-item="<?php echo $attributes['item']; ?>" data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>" data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>" data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>" data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>" data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                        <?php foreach ($attributes['items'] as $inner) : ?>
                            <div class="swiper-slide item">
                                <div class="content">
                                    <?php if ($inner['item_image']) : ?>
                                        <div class="content-image">
                                            <?php if ($inner['url']) : ?>
                                                <a href="<?php echo esc_url($inner['url']); ?>" title="" class="image">
                                            <?php endif; ?>
                                                <img src="<?php echo esc_url($inner['item_image']['url']); ?>" alt="Brand" width="auto" height="auto">
                                            <?php if ($inner['url']) : ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </article>
<?php
        return ob_get_clean();
    }
endif;
?>