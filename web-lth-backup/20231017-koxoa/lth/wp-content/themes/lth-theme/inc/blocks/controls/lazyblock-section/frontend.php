<?php

/**
 * @block-slug  :   lth-section
 * @block-output:   lth_section_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-section/frontend_callback', 'lth_section_output_fe', 10, 2);

if (!function_exists('lth_section_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_section_output_fe($output, $attributes)
    {
        ob_start();

        $bg_size = $attributes['background_image_size'];
        if ($bg_size == 'full') {
            $size = '100% 100%';
        } else {
            $size = $bg_size;
        }

        $bg_position = $attributes['background_image_position'];
        if ($bg_position == 'left_top') {
            $position = 'left top';
        } elseif ($bg_position == 'left_bottom') {
            $position = 'left bottom';
        } elseif ($bg_position == 'right_top') {
            $position = 'right top';
        } elseif ($bg_position == 'right_bottom') {
            $position = 'right bottom';
        } elseif ($bg_position == 'center') {
            $position = 'center center';
        } elseif ($bg_position == 'center_top') {
            $position = 'center top';
        } elseif ($bg_position == 'center_bottom') {
            $position = 'center bottom';
        } elseif ($bg_position == 'left_center') {
            $position = 'left center';
        } elseif ($bg_position == 'right_center') {
            $position = 'right center';
        }

        if ($attributes['background_image']) {
            $background = 'background-image: url(' . $attributes['background_image']['url'] . ');';
            $background_repeat = 'background-repeat: no-repeat;';
            $background_size = 'background-size: ' . $size .';';
            $background_position = 'background-position: ' . $position . ';';
        } 
        if ($attributes['background_color']) {
            $background_color = 'background-color: ' . $attributes['background_color'] . ';';
        }
        if ($attributes['margin_top']) {
            $margin_top = 'margin-top: ' . $attributes['margin_top'] . 'px;';
        } else {
            $margin_top = 'margin-top: 0 !important;';
        }
        if ($attributes['margin_bottom']) {
            $margin_bottom = 'margin-bottom: ' . $attributes['margin_bottom'] . 'px;';
        } else {
            $margin_bottom = 'margin-bottom: 0 !important;';
        }
        if ($attributes['padding_top']) {
            $padding_top = 'padding-top: ' . $attributes['padding_top'] . 'px;';
        } else {
            $padding_top = 'padding-top: 0 !important;';
        }
        if ($attributes['padding_bottom']) {
            $padding_bottom = 'padding-bottom: ' . $attributes['padding_bottom'] . 'px;';
        } else {
            $padding_bottom = 'padding-bottom: 0 !important;';
        }
        if ($attributes['text_color']) {
            $text = 'color: ' . $attributes['text_color'] . ';';
        }
?>
        <?php if ($attributes['animate'] != 'none') { ?>
            <<?php echo $attributes['section_tag']; ?> class="lth-section <?php echo $attributes['class']; ?> wow <?php echo $attributes['animate']; ?>" 
            data-wow-duration="<?php echo $attributes['animate_duration']; ?>" data-wow-delay="<?php echo $attributes['animate_delay']; ?>" 
            style="<?php echo $margin_top; ?> <?php echo $margin_bottom; ?> <?php echo $padding_top; ?> <?php echo $padding_bottom; ?> 
            <?php echo $background_color; if (isset($background_image)) {echo $background_image; echo $background_repeat; echo $background_size; echo $background_position;} ?>
            <?php if (isset($text)) {echo $text;} ?>">
        <?php } else { ?>
            <<?php echo $attributes['section_tag']; ?> class="lth-section <?php echo $attributes['class']; ?>" 
            style="<?php echo $margin_top; ?> <?php echo $margin_bottom; ?> <?php echo $padding_top; ?> <?php echo $padding_bottom; ?> 
            <?php echo $background_color; if (isset($background_image)) {echo $background_image; echo $background_repeat; echo $background_size; echo $background_position;} ?>
            <?php if (isset($text)) {echo $text;} ?>">
        <?php } ?>
            <?php if ($attributes['full_width']) : ?>
                <div class="container-fluid">
            <?php else : ?>
                <div class="container">
            <?php endif; ?>
                    <?php echo $attributes['section']; ?>
                </div>
            </<?php echo $attributes['section_tag']; ?>>
        <?php
        return ob_get_clean();
    }
endif;
        ?>