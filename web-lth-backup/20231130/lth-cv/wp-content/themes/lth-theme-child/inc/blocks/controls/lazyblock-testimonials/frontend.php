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

        $star = rand(4, 5);

?>
        <article class="lth-testimonials">
            <div class="module module_testimonials">
                <div class="module_content">
                    <div class="swiper swiper-row-<?php echo $attributes['item_row']; ?> swiper-slider swiper-testimonials" data-item="<?php echo $attributes['item']; ?>" data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>" data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>" data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>" data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>" data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                        <?php foreach ($attributes['items'] as $inner) : ?>
                            <div class="item">
                                <div class="post-box">
                                    <?php if (!empty($inner['item_image']['url'])) { ?>
                                        <div class="post-image">
                                            <div class="image">
                                                <img src="<?php echo esc_url($inner['item_image']['url']); ?>" alt="Tes" width="<?php echo $attributes['width_image']; ?>" height="<?php echo $attributes['height_image']; ?>">
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if (!empty($inner['item_name']) || !empty($inner['item_job']) || !empty($inner['item_description'])) { ?>
                                        <div class="post-content" 
                                        <?php if (!empty($inner['text_align'])) { ?>style="text-align: <?php echo $inner['text_align']; ?>"><?php } ?>
                                            <?php if (!empty($inner['item_name'])) { ?>
                                                <h3 class="post-name">
                                                    <?php echo wpautop($inner['item_name']); ?>
                                                </h3>
                                            <?php } ?>

                                            <?php if (!empty($inner['item_job'])) { ?>
                                                <div class="post-job">
                                                    <?php echo wpautop($inner['item_job']); ?>
                                                </div>
                                            <?php } ?>

                                            <div class="post-star-rating">
                                                <div style="display: inline-block;">
                                                    <span style="width: <?php echo $star / 5 * 100; ?>%; overflow: hidden; white-space: nowrap; display: inline-block;">
                                                        <span class="fas fa-star icon"></span>
                                                        <span class="fas fa-star icon"></span>
                                                        <span class="fas fa-star icon"></span>
                                                        <span class="fas fa-star icon"></span>
                                                        <span class="fas fa-star icon"></span>
                                                    </span>
                                                </div>
                                            </div>

                                            <?php if (!empty($inner['item_description'])) { ?>
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