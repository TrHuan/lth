<?php

/**
 * @block-slug  :   lth-icons
 * @block-output:   lth_icons_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-icons/frontend_callback', 'lth_icons_output_fe', 10, 2);

if (!function_exists('lth_icons_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_icons_output_fe($output, $attributes)
    {
        ob_start();
?>
        <article class="lth-icons <?php echo $attributes['class']; ?>">
            <div class="module module_icons">
                <div class="module_content">
                    <div class="swiper swiper-row-<?php echo $attributes['item_row']; ?> swiper-slider swiper-icons" data-item="<?php echo $attributes['item']; ?>" data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>" data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>" data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>" data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>" data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                        <?php foreach ($attributes['items'] as $inner) : ?>
                            <div class="item">
                                <div class="post-box icon-<?php echo $inner['icon_align']; ?>" style="text-align: <?php echo $inner['text_align']; ?>">
                                    <?php if (!empty($inner['item_image']['url'])) { ?>
                                        <div class="post-image">
                                            <div class="image">
                                                <img src="<?php echo esc_url($inner['item_image']['url']); ?>" alt="Icon" width="<?php echo $attributes['width_image']; ?>" height="<?php echo $attributes['height_image']; ?>">
                                            </div>
                                        </div>
                                    <?php } elseif (!empty($inner['item_class_icon'])) { ?>
                                        <div class="post-image">
                                            <div class="image">
                                                <i class="<?php echo $inner['item_class_icon']; ?> icon" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if (!empty($inner['item_title']) || !empty($inner['item_text'])) { ?>
                                        <div class="post-content">
                                            <?php if (!empty($inner['item_title'])) { ?>
                                                <h3 class="post-name">
                                                    <?php echo wpautop($inner['item_title']); ?>
                                                </h3>
                                            <?php } ?>

                                            <?php if (!empty($inner['item_text'])) { ?>
                                                <div class="post-excerpt">
                                                    <?php echo wpautop($inner['item_text']); ?>
                                                </div>
                                            <?php } ?>
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