<?php

/**
 * @block-slug  :   lth-quote
 * @block-output:   lth_quote_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-quote/frontend_callback', 'lth_quote_output_fe', 10, 2);

if (!function_exists('lth_quote_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_quote_output_fe($output, $attributes)
    {
        ob_start();
?>

        <div class="lth-quote">
            <<?php echo $attributes['quote_tag']; ?>><?php echo $attributes['quote']; ?></<?php echo $attributes['quote_tag']; ?>>
        </div>

<?php
        return ob_get_clean();
    }
endif;
?>