<?php

/**
 * @block-slug  :   lth-button
 * @block-output:   lth_button_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-button/frontend_callback', 'lth_button_output_fe', 10, 2);

if (!function_exists('lth_button_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_button_output_fe($output, $attributes) {
        ob_start();
?>

    <?php if ($attributes['title']) : ?>
        <div class="module_button" style="text-align: <?php echo $attributes['button_align']; ?>;">
            <a href="<?php echo esc_url($attributes['url']); ?>" title="" class="btn <?php echo $attributes['class']; ?> <?php if ($attributes['popup_id']){ ?>btn-popup<?php } ?>" <?php if ($attributes['popup_id']){ ?>data_popup="popup-<?php echo $attributes['popup_id']; ?>"<?php } ?>>
                <?php echo wpautop(esc_html($attributes['title'])); ?>
            </a>
        </div>
    <?php endif; ?>

<?php
        return ob_get_clean();
    }
endif;
?>