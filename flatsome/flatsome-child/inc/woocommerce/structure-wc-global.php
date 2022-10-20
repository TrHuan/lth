<?php

remove_action( 'woocommerce_add_to_cart_fragments','flatsome_header_add_to_cart_custom_icon_fragment_count_label');

if ( ! function_exists( 'gco_flatsome_header_add_to_cart_custom_icon_fragment_count_label' ) ) {
	/**
	 * Update cart label when custom cart icon is selected
	 *
	 * @param $fragments
	 *
	 * @return mixed
	 */
	function gco_flatsome_header_add_to_cart_custom_icon_fragment_count_label( $fragments ) {
		$custom_cart_icon = get_theme_mod( 'custom_cart_icon' );
		if ( ! $custom_cart_icon ) {
			return $fragments;
		}

		ob_start();
		?>
		<span class="image-icon header-cart-icon cart-global" data-icon-label="<?php echo WC()->cart->cart_contents_count; ?>">
			<img class="cart-img-icon" alt="<?php _e( 'Cart', 'woocommerce' ); ?>" src="<?php echo do_shortcode( $custom_cart_icon ); ?>" width="27" height="29"/>
		</span>
		<?php
		$fragments['.image-icon.header-cart-icon'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'gco_flatsome_header_add_to_cart_custom_icon_fragment_count_label' );