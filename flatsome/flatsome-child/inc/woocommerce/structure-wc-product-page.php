<?php

remove_action( 'woocommerce_before_add_to_cart_button','flatsome_sticky_add_to_cart_before');
function gco_flatsome_sticky_add_to_cart_before() {
	global $product;

	if ( ! is_product() || ! get_theme_mod( 'product_sticky_cart', 0 ) || ! apply_filters( 'flatsome_sticky_add_to_cart_enabled', true, $product ) ) {
		return;
	}

	echo '<div class="sticky-add-to-cart-wrapper">';
	echo '<div class="sticky-add-to-cart">';
	echo '<div class="sticky-add-to-cart__product">';
	$image_id = $product->get_image_id();
	$image    = wp_get_attachment_image_src( $image_id, 'woocommerce_gallery_thumbnail' );
	if ( $image ) {
		$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
		$image     = '<img src="' . $image[0] . '" alt="' . get_the_title() . '" class="sticky-add-to-cart-img" width="100" height="100" />';
		echo $image;
	}
	echo '<div class="product-title-small hide-for-small"><strong>' . get_the_title() . '</strong></div>';
	if ( ! $product->is_type( 'variable' ) ) {
		woocommerce_template_single_price();
	}
	echo '</div>';
}
add_action( 'woocommerce_before_add_to_cart_button', 'gco_flatsome_sticky_add_to_cart_before', -100 );

remove_action( 'woocommerce_after_add_to_cart_button','flatsome_sticky_add_to_cart_after');
function gco_flatsome_sticky_add_to_cart_after() {
	global $product;

	if ( ! is_product() || ! get_theme_mod( 'product_sticky_cart', 0 ) || ! apply_filters( 'flatsome_sticky_add_to_cart_enabled', true, $product ) ) {
		return;
	}

	echo '</div>';
	echo '</div>';
}
add_action( 'woocommerce_after_add_to_cart_button', 'gco_flatsome_sticky_add_to_cart_after', 100 );
