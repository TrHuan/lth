<?php
/**
 * @block-slug  :   lth-widget
 * @block-output:   lth__widget_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-widget/editor_callback', 'lth__widget_output', 10, 2);

if (!function_exists('lth__widget_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__widget_output($output, $attributes) {
        ob_start();
?>

<?php
        return ob_get_clean();
    }
endif;

?>