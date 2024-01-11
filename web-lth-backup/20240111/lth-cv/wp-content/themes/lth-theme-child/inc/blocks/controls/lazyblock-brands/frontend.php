<?php

/**
 * @block-slug  :   lth-brands
 * @block-output:   lth_brands_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-brands/frontend_callback', 'lth_brands_output_fe', 10, 2);

if (!function_exists('lth_brands_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_brands_output_fe($output, $attributes)
    {
        ob_start();
?>
        <article class="lth-brands <?php echo $attributes['class']; ?>">
            <div class="module module_brands">
                <div class="module_content">
                    <div class="swiper swiper-row-<?php echo $attributes['item_row']; ?> swiper-slider swiper-brands" data-item="<?php echo $attributes['item']; ?>" data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>" data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>" data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>" data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>" data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                        <?php foreach ($attributes['items'] as $inner) : ?>
                            <div class="swiper-slide item">
                                <div class="content">
                                    <?php if ($inner['item_image']) : ?>
                                        <div class="content-image">
                                            <?php if ($inner['item_name']) { ?>
                                                <a href="#" title="" class="image btn-popup" data_popup="popup-icon-<?php echo str_replace( ' ', '-', vn_str_filter($inner['item_name']) ); ?>">
                                                    <img src="<?php echo esc_url($inner['item_image']['url']); ?>" alt="<?php echo $inner['item_name']; ?>" width="<?php echo $inner['width_image']; ?>" height="<?php echo $inner['height_image']; ?>" style="max-width: <?php echo $inner['width_image']; ?>px;">
                                                </a>
                                            <?php } else { ?>
                                                <?php if ($inner['item_url']) : ?>
                                                    <a href="<?php echo esc_url($inner['item_url']); ?>" title="" target="_blank" class="image">
                                                <?php endif; ?>
                                                    <img src="<?php echo esc_url($inner['item_image']['url']); ?>" alt="Brand" width="<?php echo $inner['width_image']; ?>" height="<?php echo $inner['height_image']; ?>" style="max-width: <?php echo $inner['width_image']; ?>px;">
                                                <?php if ($inner['item_url']) : ?>
                                                    </a>
                                                <?php endif; ?>
                                            <?php } ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($inner['item_name']) { ?>
                                        <div class="lth-popups popup-icon-<?php echo str_replace( ' ', '-', vn_str_filter($inner['item_name']) ); ?>">
                                            <div class="popups-box">
                                                <div class="popup-box">
                                                    <div class="content-box">
                                                        <?php if ($inner['item_image']) : ?>
                                                            <div class="content-image">
                                                                <?php if ($inner['item_url']) : ?>
                                                                    <a href="<?php echo esc_url($inner['item_url']); ?>" title="" target="_blank" class="image">
                                                                <?php endif; ?>
                                                                    <img src="<?php echo esc_url($inner['item_image']['url']); ?>" alt="<?php echo $inner['item_name']; ?>" width="<?php echo $inner['width_image']; ?>" height="<?php echo $inner['height_image']; ?>">
                                                                <?php if ($inner['item_url']) : ?>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if (!empty($inner['item_name']) || !empty($inner['item_description'])) { ?>
                                                            <div class="post-content" style="text-align: <?php echo $inner['text_align']; ?>" >
                                                                <?php if (!empty($inner['item_name'])) { ?>
                                                                    <h3 class="post-name">
                                                                        <?php if ($inner['item_url']) : ?>
                                                                            <a href="<?php echo esc_url($inner['item_url']); ?>" title="" target="_blank">
                                                                        <?php endif; ?>
                                                                            <?php echo wpautop($inner['item_name']); ?>
                                                                        <?php if ($inner['item_url']) : ?>
                                                                            </a>
                                                                        <?php endif; ?>
                                                                    </h3>
                                                                <?php } ?>

                                                                <?php if (!empty($inner['item_description'])) { ?>
                                                                    <div class="post-excerpt">
                                                                        <?php echo wpautop($inner['item_description']); ?>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
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