<?php
/**
 * @block-slug  :   lth-languages
 * @block-output:   lth__languages_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-languages/editor_callback', 'lth__languages_output', 10, 2);

if (!function_exists('lth__languages_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__languages_output($output, $attributes) {
        ob_start();
?>

<?php
        return ob_get_clean();
    }
endif;

?>