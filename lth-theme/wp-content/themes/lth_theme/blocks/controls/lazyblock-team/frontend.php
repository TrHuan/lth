<?php
/**
 * @block-slug  :   lth-team
 * @block-output:   lth_team_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-team/frontend_callback', 'lth_team_output_fe', 10, 2);

if (!function_exists('lth_team_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_team_output_fe($output, $attributes) {
        ob_start();
?>  
<article class="lth-team">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="module module_team">
                    <?php if ($attributes['title'] || $attributes['description']) : ?>
                        <div class="module_header title-box">
                            <?php if (isset($attributes['title'])) : ?>
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
                            <?php foreach( $attributes['items'] as $inner ): ?>
                                <div class="item">
                                    <div class="content">
                                        <div class="content-image">
                                            <div class="image">
                                                <img src="<?php echo esc_url( $inner['item_image']['url'] ); ?>" alt="Team" width="<?php echo $attributes['image_width']; ?>" height="<?php echo $attributes['image_height']; ?>">
                                            </div>
                                        </div>

                                        <div class="content-box">
                                            <h3 class="content-name">
                                                <?php echo wpautop($inner['item_title']); ?>
                                            </h3>
                                            <div class="content-excerpt">
                                                <?php echo wpautop($inner['item_text']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<?php
        return ob_get_clean();
    }
endif;
?>