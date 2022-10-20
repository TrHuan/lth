<?php
/**
 * Handles the woocommerce product box structure
 *
 * @author  UX Themes
 * @package Flatsome/WooCommerce
 */


remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title');

if ( ! function_exists( 'gco_woocommerce_template_loop_product_title' ) ) {
	/**
	 * Fix WooCommerce Loop Title
	 */
	function gco_woocommerce_template_loop_product_title() {
		echo '<h3 class="name product-title ' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">';
		woocommerce_template_loop_product_link_open();
		echo get_the_title();  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		woocommerce_template_loop_product_link_close();
		echo '</h3>';
	}
}
add_action( 'woocommerce_shop_loop_item_title', 'gco_woocommerce_template_loop_product_title', 0 );