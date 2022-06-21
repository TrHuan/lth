<?php
/**
 * @block-slug  :   lth-banner
 * @block-output:   lth__banner_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-banner/editor_callback', 'lth__banner_output', 10, 2);

if (!function_exists('lth__banner_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__banner_output($output, $attributes) {
        ob_start();
?>
    <?php if (isset($attributes['title'])) : ?>
        <p style="font-size: 12px; padding-top: 10px; padding-left: 35px; margin: 0; display: none;"><strong><?php echo esc_html($attributes['title']); ?></strong></p>
    <?php endif; ?>

    <artice class="lth-banners <?php echo $attributes['class']; ?>" style="max-width: 300px; width: 100%; margin: 0 auto;">
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