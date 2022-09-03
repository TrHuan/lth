<?php
/**
 * @block-slug  :   lth-products
 * @block-output:   lth__products_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-products/editor_callback', 'lth__products_output', 10, 2);

if (!function_exists('lth__products_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__products_output($output, $attributes) {
        ob_start();
?>
    <?php if (isset($attributes['title'])) : ?>
        <p style="font-size: 12px; padding-top: 10px; padding-left: 35px; margin: 0; display: none;"><strong><?php echo esc_html($attributes['title']); ?></strong></p>
    <?php endif; ?>

    <article class="lth-products <?php echo $attributes['class']; ?>" style="max-width: 300px; width: 100%; margin: 0 auto;">
        <div class="module module_products">
            <?php if ($attributes['title'] || $attributes['description']) : ?>
                <div class="module_header title-box" style="display: none">
                    <?php if (isset($attributes['title'])) : ?>
                        <h3 class="title">
                            <?php if ($attributes['title_url']) : ?> 
                                <a href="<?php echo esc_url($attributes['title_url']); ?>" title="">
                            <?php else : ?>
                                <span>
                            <?php endif; ?>
                                <?php echo esc_html($attributes['title']); ?>
                            <?php if ($attributes['title_url']) : ?> 
                                </a>
                            <?php else : ?>
                                </span>
                            <?php endif; ?>
                        </h3>
                    <?php endif; ?>

                    <?php if ($attributes['description']) : ?>
                        <div class="infor">
                            <?php echo esc_html($attributes['description']); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $attributes['show_items'] ) : ?>
                        <div class="cat-list">
                            <ul>
                                <?php foreach( $attributes['items'] as $inner ) {
                                    $term = get_term_by( 'id', $inner['item'], 'product_cat' ); ?>
                                    <li>
                                        <a href="<?php echo get_term_link($term->slug, 'product_cat'); ?>" data_id="<?php echo $inner['item']; ?>">
                                            <?php echo $term->name; ?>              
                                        </a>
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

                    if ($cat) {
                        $args = [
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field'    => 'id',
                                    'terms'    => $cat,
                                ),
                            ),
                            'posts_per_page' => 1,
                            'orderby' => $attributes['orderby'],
                            'order' => $attributes['order'],
                        ];
                    } else {
                        $args = [
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'posts_per_page' => 1,
                            'orderby' => $attributes['orderby'],
                            'order' => $attributes['order'],
                        ];
                    }
                    $wp_query = new WP_Query($args);
                    if ($wp_query->have_posts()) { ?>
                        <?php while ($wp_query->have_posts()) {
                            $wp_query-> the_post(); ?>                            
                            <?php //load file tương ứng với post format
                            get_template_part('woocommerce/product-box/product-box', ''); ?>
                        <?php } ?>
                    <?php } else {
                        get_template_part('template-parts/content', 'none');
                    }
                    // reset post data
                    wp_reset_postdata();
                ?>

                <?php if ($attributes['url_text']) : ?>
                    <div class="module_button">
                        <a href="<?php echo esc_url($attributes['url']); ?>">
                            <?php echo $attributes['url_text']; ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </article>
<?php
        return ob_get_clean();
    }
endif;

?>