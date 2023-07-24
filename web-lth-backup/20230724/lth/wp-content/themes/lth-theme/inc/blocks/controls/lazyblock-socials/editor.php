<?php
/**
 * @block-slug  :   lth-socials
 * @block-output:   lth__socials_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-socials/editor_callback', 'lth__socials_output', 10, 2);

if (!function_exists('lth__socials_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__socials_output($output, $attributes) {
        ob_start();
?>
    
    

<?php
        return ob_get_clean();
    }
endif;

?>