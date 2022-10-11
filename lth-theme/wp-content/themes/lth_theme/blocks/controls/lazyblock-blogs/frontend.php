<?php

/**
 * @block-slug  :   lth-blogs
 * @block-output:   lth_blogs_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-blogs/frontend_callback', 'lth_blogs_output_fe', 10, 2);

if (!function_exists('lth_blogs_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_blogs_output_fe($output, $attributes) {
        ob_start();
?>
<article class="lth-blogs <?php echo $attributes['class']; ?>">
    <div class="module module_blogs">
        <?php if ($attributes['title'] || $attributes['description']) : ?>
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
                
                <?php if ( $attributes['show_items'] ) : ?>
                    <div class="cat-list">
                        <ul>
                            <?php foreach( $attributes['items'] as $inner ) { ?>
                                <li>
                                    <a href="<?php echo get_category_link($inner['item']); ?>" data_id="<?php echo $inner['item']; ?>"><?php echo get_cat_name($inner['item']); ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>    
                <?php endif; ?>   
            </div>
        <?php endif; ?>

        <div class="module_content content_text_<?php echo $attributes['text_align']; ?>">
            <?php           
                if ($attributes['choose_posts']) {
                    $kq = array();
                    foreach( $attributes['posts'] as $inner ) {
                        $post = $inner['post'];
                        $kq[] = $post;
                    }     

                    $args = [
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'post__in' => $kq,
                        'orderby' => "post__in",
                    ];
                } else {
                    $i = 0;
                    foreach( $attributes['items'] as $inner ) {
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
                    <div class="swiper swiper-slider swiper-blogs"
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
                        <?php while ($wp_query->have_posts()) {
                            $wp_query-> the_post(); ?>
                            <?php //load file tương ứng với post format
                                get_template_part('template-parts/post/content', '');
                            ?>
                        <?php } ?>
                    </div>
                    
                    <?php if ($attributes['button_text']) : ?>
                        <div class="module_button">
                            <a href="<?php echo esc_url($attributes['button_url']); ?>" class="btn">
                                <?php echo esc_html($attributes['button_text']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php } else {
                    get_template_part('template-parts/content', 'none');
                }
                // reset post data
                wp_reset_postdata();
            ?>   
        </div>

        <?php if ($attributes['button_url']) : ?>
            <div class="module_button">
                <a href="<?php echo esc_url($attributes['button_url']); ?>">
                    <?php echo $attributes['button_text']; ?>
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