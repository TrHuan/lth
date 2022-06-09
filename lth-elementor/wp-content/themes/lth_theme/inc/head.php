<?php
/**
 * Add admin css
 * 
 * @author LTH
 * @since 2020
 */

// add css, js to admin
function addmin_custom_css_js() {

    wp_enqueue_style(THEME_NAME . '-admin', ASSETS_URI . '/css/admin/admin.css', false, THEME_VERSION, 'all');
    
}
add_action('admin_head', 'addmin_custom_css_js');

/**
 * Add css
 * 
 * @author LTH
 * @since 2020
 */

function lth_theme_styles() {

	// file css
    wp_enqueue_style(THEME_NAME . '-bootstrap', ASSETS_URI . '/css/bootstrap.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-icofont', ASSETS_URI . '/css/icofont.min.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-typo', ASSETS_URI . '/css/typo.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-slick', ASSETS_URI . '/css/slick.min.css', false, THEME_VERSION, 'all');

    wp_enqueue_style(THEME_NAME . '-main', ASSETS_URI . '/css/main.css', false, THEME_VERSION, 'all');
    wp_enqueue_style(THEME_NAME . '-reponsives', ASSETS_URI . '/css/reponsives.css', false, THEME_VERSION, 'all');

    wp_enqueue_style(THEME_NAME . '-customs', ASSETS_URI . '/css/customs.css', false, THEME_VERSION, 'all');

    if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style(THEME_NAME . '-product', ASSETS_URI . '/css/product.css', false, THEME_VERSION, 'all');
		wp_enqueue_style(THEME_NAME . '-repon-product', ASSETS_URI . '/css/repon-product.css', false, THEME_VERSION, 'all');
	}

}
add_action('wp_enqueue_scripts', 'lth_theme_styles');

/**
 * Add js
 * 
 * @author LTH
 * @since 2020
 */
function lth_theme_scripts() {
	if ( !class_exists( 'WooCommerce' ) ) {
		// file js (được add vào header - sử dụng khi không dùng woocommerce)	
		wp_enqueue_script(THEME_NAME.'-jquery', ASSETS_URI .'/js/jquery.min.js', false, THEME_VERSION, false, 'all');
	}
	
	// file js (được add vào footer)	
	wp_enqueue_script(THEME_NAME.'-slick', ASSETS_URI .'/js/slick.min.js', false, THEME_VERSION, 'all');
	wp_enqueue_script(THEME_NAME.'-countdown', ASSETS_URI .'/js/countdown.min.js', false, THEME_VERSION, 'all');

	wp_enqueue_script(THEME_NAME.'-main', ASSETS_URI .'/js/main.js', false, THEME_VERSION, 'all');

	// if ( class_exists( 'WooCommerce' ) ) {
	// 	wp_enqueue_script(THEME_NAME.'-product', ASSETS_URI .'/js/product.js', false, THEME_VERSION, false, 'all');
	// }
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);