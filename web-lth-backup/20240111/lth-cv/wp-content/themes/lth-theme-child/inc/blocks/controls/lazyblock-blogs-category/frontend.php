<?php

/**
 * @block-slug  :   lth-blogs-category
 * @block-output:   lth_blogs_category_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-blogs-category/frontend_callback', 'lth_blogs_category_output_fe', 10, 2);

if (!function_exists('lth_blogs_category_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_blogs_category_output_fe($output, $attributes)
    {
        ob_start();
?>
        <article class="lth-blogs <?php echo $attributes['class']; ?>">
            <div class="module module_blogs">
                <?php if (!empty($attributes['show_items'])) : ?>
                    <div class="module_header title-box title-align-<?php echo $attributes['title_align']; ?>">
                        <?php if (!empty($attributes['show_items'])) : ?>
                            <div class="cat-list">
                                <ul>
                                    <?php $j = 0;
                                    foreach ($attributes['items'] as $inner) {
                                        $j++;
                                        // echo $inner['item'];
                                        $term = get_term_by('id', $inner['item'], 'category'); ?>
                                        <li>
                                            <a href="<?php echo get_term_link($term->slug, 'category'); ?>" data_id="<?php echo $inner['item']; ?>" 
                                            <?php if ($j == 1) { ?>class="active"<?php } ?>>
                                                <?php echo $term->name; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="module_content content_text_<?php echo $attributes['text_align']; ?> module_style_<?php echo $attributes['style']; ?>">
                    <?php
                    if (isset($attributes['featured_posts'])) {
                        $kq = array();
                        foreach ($attributes['posts'] as $inner) {
                            $post = $inner['post'];
                            $kq[] = $post;
                        }

                        $args = [
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'post__in' => $kq,
                            'orderby' => "post__in",
                            'posts_per_page' => $attributes['post_number'],
                        ];
                    } else {
                        $i = 0;
                        foreach ($attributes['items'] as $inner) {
                            $i++;
                            if ($i == '1') {
                                $cat = $inner['item'];
                            }
                        }

                        $args = [
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'cat' => $cat,
                            'posts_per_page' => $attributes['post_number'],
                            'orderby' => $attributes['orderby'],
                            'order' => $attributes['order'],
                        ];
                    }
                    $wp_query = new WP_Query($args);
                    if ($wp_query->have_posts()) { ?>
                        <div class="swiper swiper-row-<?php echo $attributes['item_row']; ?> swiper-slider swiper-blogs" data-item="<?php echo $attributes['item']; ?>" data-item_lg="<?php echo $attributes['item_lg']; ?>" data-item_md="<?php echo $attributes['item_md']; ?>" data-item_sm="<?php echo $attributes['item_sm']; ?>" data-item_mb="<?php echo $attributes['item_mb']; ?>" data-row="<?php echo $attributes['item_row']; ?>" data-dots="<?php echo $attributes['item_dots']; ?>" data-arrows="<?php echo $attributes['item_arrows']; ?>" data-vertical="<?php echo $attributes['item_vertical']; ?>" data-autoplay="<?php echo $attributes['item_autoplay']; ?>">
                            <?php while ($wp_query->have_posts()) {
                                $wp_query->the_post(); ?>
                                <?php //load file tương ứng với post format
                                get_template_part('template-parts/post/content', '');
                                ?>
                            <?php } ?>
                        </div>                        
                    <?php } else {
                        get_template_part('template-parts/content', 'none');
                    }
                    // reset post data
                    wp_reset_postdata();
                    ?>
                </div>

                <?php if ($attributes['button_text']) : ?>
                    <div class="module_button">
                        <a href="<?php echo esc_url($attributes['button_url']); ?>" class="btn">
                            <?php echo esc_html($attributes['button_text']); ?>
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