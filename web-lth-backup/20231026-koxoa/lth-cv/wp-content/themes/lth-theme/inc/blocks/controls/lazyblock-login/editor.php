<?php
/**
 * @block-slug  :   lth-login
 * @block-output:   lth__login_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-login/editor_callback', 'lth__login_output', 10, 2);

if (!function_exists('lth__login_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__login_output($output, $attributes) {
        ob_start();
?>
    
<?php if ( class_exists( 'WooCommerce' ) ) { ?>
    
<?php } ?>

<?php
        return ob_get_clean();
    }
endif;

?>