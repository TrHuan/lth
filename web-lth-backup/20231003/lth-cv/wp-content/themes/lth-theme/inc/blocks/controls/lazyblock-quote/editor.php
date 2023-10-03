<?php
/**
 * @block-slug  :   lth-quote
 * @block-output:   lth__quote_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-quote/editor_callback', 'lth__quote_output', 10, 2);

if (!function_exists('lth__quote_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__quote_output($output, $attributes) {
        ob_start();
?>
    
<?php
        return ob_get_clean();
    }
endif;

?>