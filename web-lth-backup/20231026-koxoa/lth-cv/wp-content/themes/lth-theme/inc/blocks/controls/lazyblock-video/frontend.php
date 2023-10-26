<?php

/**
 * @block-slug  :   lth-video
 * @block-output:   lth_video_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-video/frontend_callback', 'lth_video_output_fe', 10, 2);

if (!function_exists('lth_video_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_video_output_fe($output, $attributes) {
        ob_start();
?>
<article class="lth-video <?php echo $attributes['class']; ?>">
    <div class="module module_video">
        <div class="module_content">
            <div class="content">
                <div class="content-video">
                    <img src="<?php echo esc_url( $attributes['background']['url'] ); ?>" alt="Image" width="auto" height="auto">
                    <?php if ($attributes['video']) { ?>
                        <a data-fancybox href="<?php echo $attributes['video']; ?>" class="icon-play"></a>
                    <?php } ?>
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