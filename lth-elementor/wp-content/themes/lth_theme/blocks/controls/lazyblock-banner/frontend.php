<?php

/**
 * @block-slug  :   lth-banner
 * @block-output:   lth_banner_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-banner/frontend_callback', 'lth_banner_output_fe', 10, 2);

if (!function_exists('lth_banner_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_banner_output_fe($output, $attributes) {
        ob_start();
?>
    <artice class="lth-banners <?php echo $attributes['class']; ?>">
        <div class="module module_banners">
            <div class="module_content">
                <div class="content">
                    <div class="content-image">
                        <a href="<?php echo esc_url( $attributes['image_url'] ); ?>" title="" class="image">
                            <img src="<?php echo esc_url( $attributes['image']['url'] ); ?>" alt="Image" width="<?php echo $attributes['image_width']; ?>" height="<?php echo $attributes['image_height']; ?>">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </artice>

<?php
        return ob_get_clean();
    }
endif;
?>