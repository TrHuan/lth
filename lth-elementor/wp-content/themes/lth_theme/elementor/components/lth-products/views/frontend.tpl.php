<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<article class="lth-products <?php echo $settings['class']; echo ' style-' . $settings['style_items']; ?>">
    <div class="module module_products">
        <?php if ($settings['heading_text'] || $settings['description_text']) : ?>
            <div class="module_header title-box">
                <?php if ($settings['heading_text']) : ?>
                    <h2 class="title">
                        <?php if ($settings['url_text']) : ?> 
                            <a href="<?php echo esc_url($settings['url_text']['url']); ?>" title="">
                        <?php endif; ?>
                            <?php echo wpautop(esc_html($settings['heading_text'])); ?>
                        <?php if ($settings['url_text']) : ?> 
                            </a>
                        <?php endif; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($settings['description_text']) : ?>
                    <div class="infor">
                        <?php echo wpautop(esc_html($settings['description_text'])); ?>
                    </div>
                <?php endif; ?> 
            </div>
        <?php endif; ?>
                
        <?php if ( $settings['show_cat'] == 'yes' ) : ?>
            <div class="cat-list">
                <ul>
                    <?php foreach( $settings['list'] as $item ) { ?>
                        <?php $cat = get_term_by( 'id', $item['list_item'], 'product_cat' ); ?>
                        <li>
                            <a href="<?php echo get_term_link($cat->term_id, 'product_cat'); ?>" data_id="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>    
        <?php endif; ?>  

        <div class="module_content">
            <div class="swiper swiper-slider swiper-products"
            data-item="<?php echo $settings['item']; ?>" 
            data-item_lg="<?php echo $settings['item_lg']; ?>" 
            data-item_md="<?php echo $settings['item_md']; ?>" 
            data-item_sm="<?php echo $settings['item_sm']; ?>" 
            data-item_mb="<?php echo $settings['item_mb']; ?>" 
            data-row="<?php echo $settings['item_row']; ?>" 
            data-dots="<?php echo $settings['item_dots']; ?>" 
            data-arrows="<?php echo $settings['item_arrows']; ?>" 
            data-vertical="<?php echo $settings['item_vertical']; ?>"
            data-autoplay="<?php echo $settings['item_autoplay']; ?>">
                <?php
                    if ( $settings['choice_posts'] == 'no' ) {
                        if ( $settings['list'] ) {
                            $i = 0;
                            foreach( $settings['list'] as $item ) {
                                $i++;
                                if ($i == '1') {
                                    $cat = $item['list_item'];
                                }
                            }

                            $args = [
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'posts_per_page' => $settings['post_number'],
                                'orderby' => $settings['orderby'],
                                'order' => $settings['order'],
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field'    => 'id',
                                        'terms'    => $cat,
                                    ),
                                ),
                            ];
                        } else {
                            $args = [
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'cat' => $cat,
                                'posts_per_page' => $settings['post_number'],
                                'orderby' => $settings['orderby'],
                                'order' => $settings['order'],
                            ];
                        }
                    } else {
                        $posts = [];
                        foreach( $settings['list_post'] as $item ) { 
                            $item_id = $item['list_post_item'];
                            $posts[$item_id] = $item_id;
                        }

                        foreach ($posts as $kg) {
                            $kq .= $kg . ',';
                        }
                        $post_in = explode(',', $kq);

                        $args = [
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'post__in' => $post_in,
                            'orderby' => 'post__in',
                        ];
                    }

                    $wp_query = new WP_Query($args);
                    if ($wp_query->have_posts()) { ?>
                        <?php while ($wp_query->have_posts()) {
                            $wp_query-> the_post(); ?>
                            <?php //load file tương ứng với post format
                                get_template_part('woocommerce/product-box/product-box', '');
                            ?>
                        <?php } ?>
                    <?php } else {
                        get_template_part('template-parts/content', 'none');
                    }
                    // reset post data
                    wp_reset_postdata();
                ?>                        
            </div>
                    
            <?php if ($settings['button_text']) : ?>
                <div class="module_button">
                    <a href="<?php echo esc_url($settings['button_url']); ?>" class="btn">
                        <?php echo esc_html($settings['button_text']); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</article>