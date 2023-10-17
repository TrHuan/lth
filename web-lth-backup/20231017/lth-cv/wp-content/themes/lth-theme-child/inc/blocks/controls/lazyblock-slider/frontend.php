<?php
/**
 * @block-slug  :   lth-slider
 * @block-output:   lth_slider_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-slider/frontend_callback', 'lth_slider_output_fe', 10, 2);

if (!function_exists('lth_slider_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_slider_output_fe($output, $attributes) {
        ob_start();
?>    
    <article class="lth-slider <?php echo $attributes['class']; ?>">
        <div class="module module_slider">
            <div class="module_content">
                <div class="swiper swiper-row-<?php echo $attributes['item_row']; ?> swiper-item-<?php echo $attributes['item']; ?> swiper-slider swiper-slidershow"
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

                    <?php echo $attributes['slider']; ?>
                    
                </div> 
            </div>
        </div>
    </article>
<?php
        return ob_get_clean();
    }
endif;
?>