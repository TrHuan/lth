<?php
/**
 * @block-slug  :   lth-blogs
 * @block-output:   lth__blogs_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-blogs/editor_callback', 'lth__blogs_output', 10, 2);

if (!function_exists('lth__blogs_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__blogs_output($output, $attributes) {
        ob_start();
?>

    <?php if (isset($attributes['title'])) : ?>
        <p style="font-size: 12px; padding-top: 10px; padding-left: 35px; margin: 0; display: none;"><strong><?php echo esc_html($attributes['title']); ?></strong></p>
    <?php endif; ?>

    <article class="lth-blogs <?php echo $attributes['class']; ?>" style="max-width: 300px; width: 100%; margin: 0 auto;">
        <div class="module module_blogs">
            <?php if ($attributes['title'] || $attributes['description']) : ?>
                <div class="module_header title-box" style="display: none">
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

            <div class="module_content">
                <?php
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
                        // 'posts_per_page' => $attributes['item']-1,
                        'posts_per_page' => 1,
                        'orderby' => $attributes['orderby'],
                        'order' => $attributes['order'],
                    ];
                    $wp_query = new WP_Query($args);
                    if ($wp_query->have_posts()) { ?>
                        <!-- <div class="swiper swiper-slider swiper-blogs"> -->
                            <div>
                                <?php $j; while ($wp_query->have_posts()) {
                                    $j++;
                                    $wp_query-> the_post(); ?>
                                    <?php //load file tương ứng với post format
                                    if ($j == 1) {
                                        get_template_part('template-parts/post/content', '');
                                    }
                                    ?>
                                <?php } ?>
                            </div>
                        <!-- </div> -->
                        
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
        </div>
    </article>
<?php
        return ob_get_clean();
    }
endif;

?>