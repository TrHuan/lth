<?php
/**
 * @block-slug  :   lth-gallery
 * @block-output:   lth__gallery_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-gallery/editor_callback', 'lth__gallery_output', 10, 2);

if (!function_exists('lth__gallery_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__gallery_output($output, $attributes) {
        ob_start();
?>

<?php
        return ob_get_clean();
    }
endif;

?>