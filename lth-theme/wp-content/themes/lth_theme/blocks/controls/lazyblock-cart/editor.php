<?php
/**
 * @block-slug  :   lth-shopcart
 * @block-output:   lth__shopcart_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-shopcart/editor_callback', 'lth__shopcart_output', 10, 2);

if (!function_exists('lth__shopcart_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__shopcart_output($output, $attributes) {
        ob_start();
?>
    
<?php if ( class_exists( 'WooCommerce' ) ) { ?>
    <div class="lth-shopcart">
        <div class="cart-header clearfix">
            <?php global $woocommerce; ?>
            <?php require_once(get_template_directory() . '/woocommerce/cart/header-cart-ajax.php'); ?>
        </div>
    </div>
<?php } ?>

<?php
        return ob_get_clean();
    }
endif;

?>