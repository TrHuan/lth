<?php
/**
 * @block-slug  :   lth-slider
 * @block-output:   lth__slider_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-slider/editor_callback', 'lth__slider_output', 10, 2);

if (!function_exists('lth__slider_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__slider_output($output, $attributes) {
        ob_start();
?> 

<?php
        return ob_get_clean();
    }
endif;

?>