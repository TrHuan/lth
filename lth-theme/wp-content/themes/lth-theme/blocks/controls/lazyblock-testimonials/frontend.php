<?php

/**
 * @block-slug  :   lth-testimonials
 * @block-output:   lth_testimonials_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-testimonials/frontend_callback', 'lth_testimonials_output_fe', 10, 2);

if (!function_exists('lth_testimonials_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_testimonials_output_fe($output, $attributes)
    {
        ob_start();
?>
        <article class="lth-testimonials">
            <div class="module module_testimonials">
                <?php if ($attributes['title'] || $attributes['description']) : ?>
                    <div class="module_header title-box title-align-<?php echo $attributes['title_align']; ?>">
                        <?php if ($attributes['title']) : ?>
                            <h2 class="title">
                                <?php if ($attributes['title_url']) : ?>
                                    <a href="<?php echo esc_url($attributes['title_url']); ?>" title="">
                                    <?php else : ?>
                                        <span>
                                        <?php endif; ?>
                                        <?php echo wpautop(esc_html($attributes['title'])); ?>
                                        <?php if ($attributes['title_url']) : ?>
                                    </a>
                                <?php else : ?>
                                    </span>
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
                    <div class="swiper swiper-slider swiper-testimonials" data-item="<?php echo $attributes['item']; ?>" data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>" data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>" data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>" data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>" data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                        <?php foreach ($attributes['items'] as $inner) : ?>
                            <div class="item">
                                <div class="post-box">
                                    <?php if ($inner['item_image']['url']) { ?>
                                        <div class="post-image">
                                            <div class="image">
                                                <img src="<?php echo esc_url($inner['item_image']['url']); ?>" alt="Team" width="auto" height="auto">
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($inner['item_name'] || $inner['item_job'] || $inner['item_description']) { ?>
                                        <div class="post-content" style="text-align: <?php echo $inner['text_align']; ?>">
                                            <?php if ($inner['item_name']) { ?>
                                                <h3 class="post-name">
                                                    <?php echo wpautop($inner['item_name']); ?>
                                                </h3>
                                            <?php } ?>

                                            <?php if ($inner['item_job']) { ?>
                                                <div class="post-job">
                                                    <?php echo wpautop($inner['item_job']); ?>
                                                </div>
                                            <?php } ?>

                                            <?php if ($inner['item_description']) { ?>
                                                <div class="post-excerpt">
                                                    <?php echo wpautop($inner['item_description']); ?>
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