<?php

/**
 * @block-slug  :   lth-line
 * @block-output:   lth_line_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-line/frontend_callback', 'lth_line_output_fe', 10, 2);

if (!function_exists('lth_line_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_line_output_fe($output, $attributes) {
        ob_start();

        if ($attributes['margin_top']) {
            $margin_top = 'margin-top: '.$attributes['margin_top'].'px;';
        } else {
            $margin_top = 'margin-top: 0 !important;';
        }
        if ($attributes['margin_bottom']) {
            $margin_bottom = 'margin-bottom: '.$attributes['margin_bottom'].'px;';
        } else {
            $margin_bottom = 'margin-bottom: 0 !important;';
        }
?>
    <div class="lth-lines" style="max-width:<?php echo $attributes['line_width']; ?>; height:<?php echo $attributes['line_height']; ?>; width:100%;
    background-color:<?php echo $attributes['background_color']; ?>; <?php echo $margin_top; ?> <?php echo $margin_bottom; ?>">
        <?php if (!empty($attributes['image']['url'])) { ?>
            <img src="<?php echo esc_url( $attributes['image']['url'] ); ?>" alt="Image" width="auto" height="auto">
        <?php } ?>
    </div>

<?php
        return ob_get_clean();
    }
endif;
?>