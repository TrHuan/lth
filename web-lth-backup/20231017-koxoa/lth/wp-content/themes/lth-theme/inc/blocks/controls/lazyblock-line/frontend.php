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
        if ($attributes['margin_left']) {
            $margin_left = 'margin-left: '.$attributes['margin_left'].';';
        }
        if ($attributes['margin_right']) {
            $margin_right = 'margin-right: '.$attributes['margin_right'].';';
        }
        if ($attributes['line_width']) {
            $line_width = 'max-width: '.$attributes['line_width'].';';
        }
        if ($attributes['line_height']) {
            $line_height = 'height: '.$attributes['line_height'].';';
        }
        if ($attributes['line_width_image']) {
            $line_width_image = 'max-width: '.$attributes['line_width_image'].';';
            $width = preg_replace('/[^0-9]/', '',$line_width_image);
        }
        if ($attributes['line_height_image']) {
            $line_height_image = 'height: '.$attributes['line_height_image'].';';
            $height = preg_replace('/[^0-9]/', '', $line_height_image);
        }
?>
    <div class="lth-lines" style="<?php echo $line_width; echo $line_height; ?> width:100%;
    background-color:<?php echo $attributes['background_color']; ?>;
    <?php echo $margin_top; echo $margin_bottom; echo $margin_left; echo $margin_right; ?>">
        <?php if (!empty($attributes['image']['url'])) { ?>
            <img src="<?php echo esc_url( $attributes['image']['url'] ); ?>" alt="Image"
             width="<?php echo $width; ?>" height="<?php echo $height; ?>"
             style="<?php echo $line_width_image; ?> width: 100%; margin: 0 auto; display: block;">
        <?php } ?>
    </div>

<?php
        return ob_get_clean();
    }
endif;
?>