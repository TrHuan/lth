<?php
/**
 * @block-slug  :   lth-contact-qrcode
 * @block-output:   lth__contact_qrcode_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-contact-qrcode/editor_callback', 'lth__contact_qrcode_output', 10, 2);

if (!function_exists('lth__contact_qrcode_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__contact_qrcode_output($output, $attributes) {
        ob_start();
?>
    
<?php if ( class_exists( 'WooCommerce' ) ) { ?>
    
<?php } ?>

<?php
        return ob_get_clean();
    }
endif;

?>