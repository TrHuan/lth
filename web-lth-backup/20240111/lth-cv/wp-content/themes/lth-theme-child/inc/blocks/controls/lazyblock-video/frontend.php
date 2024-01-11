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

        $id = rand(0000, 9999);
?>
<article class="lth-video <?php echo $attributes['class']; ?>">
    <div class="module module_video">
        <div class="module_content">
            <div class="content">
                <img src="<?php echo esc_url( $attributes['background']['url'] ); ?>" alt="Image" width="auto" height="auto">
                <?php if ($attributes['video']) { ?>
                    <a data-fancybox href="#video<?php echo $id; ?>" class="icon-play fancybox">
                        <span class="icon"><i class="fas fa-play"></i></span>
                    </a>

                    <div id="video<?php echo $id; ?>" class="popup-video" style="display:none;">
                        <!-- <img src="<?php echo esc_url( $attributes['background']['url'] ); ?>" alt="Image" width="auto" height="auto"> -->
                        <div class="video">
                            <?php echo $attributes['video']; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</article>
<?php
        return ob_get_clean();
    }
endif;
?>