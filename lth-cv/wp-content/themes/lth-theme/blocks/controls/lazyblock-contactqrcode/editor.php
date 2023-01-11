<?php
/**
 * @block-slug  :   lth-contactqrcode
 * @block-output:   lth__contactqrcode_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-contactqrcode/editor_callback', 'lth__contactqrcode_output', 10, 2);

if (!function_exists('lth__contactqrcode_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__contactqrcode_output($output, $attributes) {
        ob_start();
?>
    
<?php if ( class_exists( 'WooCommerce' ) ) { ?>
    
<?php } ?>

<?php
        return ob_get_clean();
    }
endif;

?>