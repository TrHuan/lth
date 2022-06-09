<?php
/**
 * @block-slug  :   lth-video
 * @block-output:   lth__video_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-video/editor_callback', 'lth__video_output', 10, 2);

if (!function_exists('lth__video_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__video_output($output, $attributes) {
        ob_start();
?>

<?php
        return ob_get_clean();
    }
endif;

?>