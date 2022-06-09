<?php
/**
 * @block-slug  :   lth-contact
 * @block-output:   lth__contact_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-contact/editor_callback', 'lth__contact_output', 10, 2);

if (!function_exists('lth__contact_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__contact_output($output, $attributes) {
        ob_start();
?>

<?php
        return ob_get_clean();
    }
endif;

?>