<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

echo '<h1 style="display: none;">'.get_option('blogname') .'-'. get_option('blogdescription').'</h1>';

echo '<h2 style="display: none;">'.get_the_title( get_option('woocommerce_shop_page_id') ).'</h2>';

$q = $wp_query->query_vars;

if (is_search()) {
	if($q['s']!='') {
		// Add Custom Shop Content if set
		if(is_shop() && flatsome_option('html_shop_page_content') && ! $wp_query->is_search() && $wp_query->query_vars['paged'] < 1 ){
			echo do_shortcode('<div class="shop-page-content">'.flatsome_option('html_shop_page_content').'</div>');
		} else {
			wc_get_template_part( 'layouts/category', flatsome_option( 'category_sidebar' ) );
		}
	} else {
		echo '<div class="row" style="padding: 20px 15px;">';
			echo 'Tìm kiếm chưa được nhập!';
		echo '</div>';
	}
} else {
	if(is_shop() && flatsome_option('html_shop_page_content') && ! $wp_query->is_search() && $wp_query->query_vars['paged'] < 1 ){
		echo do_shortcode('<div class="shop-page-content">'.flatsome_option('html_shop_page_content').'</div>');
	} else {
		wc_get_template_part( 'layouts/category', flatsome_option( 'category_sidebar' ) );
	}
}

get_footer( 'shop' );
