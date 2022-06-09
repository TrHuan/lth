<?php
/**
 * @block-slug  :   lth-button
 * @block-output:   lth__button_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-button/editor_callback', 'lth__button_output', 10, 2);

if (!function_exists('lth__button_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__button_output($output, $attributes) {
        ob_start();
?>

<?php
        return ob_get_clean();
    }
endif;

?>