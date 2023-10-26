<?php
/**
 * @block-slug  :   lth-countdown
 * @block-output:   lth__countdown_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-countdown/editor_callback', 'lth__countdown_output', 10, 2);

if (!function_exists('lth__countdown_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__countdown_output($output, $attributes) {
        ob_start();
?>
    
<?php
        return ob_get_clean();
    }
endif;

?>