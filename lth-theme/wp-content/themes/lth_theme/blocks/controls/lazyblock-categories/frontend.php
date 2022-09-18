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
    function lth_categories_output_fe($output, $attributes) {
        ob_start();
?>
    <article class="lth-categories <?php echo $attributes['class']; ?>">
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
                    <?php foreach( $attributes['items'] as $inner ) { ?>
                        <div class="item">
                            <div class="content">
                                <div class="content-header">
                                    <?php $image = get_field('image', 'category_'.$inner['item']);
                                    if ($image) { ?>
                                        <div class="content-image">
                                            <a href="<?php echo get_category_link($inner['item']); ?>">
                                                <img src="<?php echo $image; ?>" alt="<?php echo get_cat_name($inner['item']); ?>">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="content-box" style="text-align: <?php echo $attributes['text_align']; ?>">
                                        <h3 class="content-name">
                                            <a href="<?php echo get_category_link($inner['item']); ?>">
                                                <?php echo get_cat_name($inner['item']); ?>              
                                            </a>
                                        </h3>
                                        <div class="content-excerpt">
                                            <?php echo wpautop(category_description($inner['item'])); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="content-footer" style="text-align: <?php echo $attributes['text_align']; ?>">
                                    <a href="<?php echo get_category_link($inner['item']); ?>" title="" class="btn"><?php echo __('Xem thêm'); ?></a>
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