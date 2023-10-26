<?php

/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">
	.post-single-content .content a,
	.sidebar-box .wc-layered-nav-term a:hover ~ .count,
	.sidebar-box .wc-layered-nav-term.chosen .count,
	.sidebar-box .wc-layered-nav-term.chosen a,
	.product-content-box .price .amount,
	.product-tab-box .tab-menu .active a,
	.post-button .btn,
	.module_products .post-price,
	.module_products .post-price .amount,
	.module_products .post-button .add_to_cart_button:hover,
	.current-menu-item>a,
	.title-box .cat-list li a.active,
	/* .title-box .cat-list li a:hover, */
	.title-tab .title.active,
	.title-tab .title:hover,
	.back-to-top,
	.wpcf7-submit,
	.submit,
	.btn,
	.button,
	button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.lth-blogs-cats .module_cats_list li a:hover,
	.slick-slider .slick-arrow:hover,
	.slick-slider .slick-dots .slick-active button,
	.sidebar-box .price_slider_wrapper .ui-slider-handle,
	.sidebar-box .price_slider_wrapper .ui-slider-range,
	.paginations .page-numbers:hover,
	.paginations .page-numbers.current,
	.post-button .btn:hover,
	.module_products .post-image .on-sale,
	.module_products .post-button .add_to_cart_button,
	.footer-fixed a:hover,
	.back-to-top:hover,
	.wpcf7-submit:hover,
	.submit:hover,
	.btn:hover,
	.button:hover,
	button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.lth-blogs-cats .module_cats_list li a:hover,
	.slick-slider .slick-arrow:hover,
	.slick-slider .slick-dots .slick-active button,
	.megamenu-mobile .current-menu-item a .icon,
	.module_products .post-button .add_to_cart_button:hover,
	.post-button .btn,
	.paginations .page-numbers:hover,
	.paginations .page-numbers.current,
	.footer-fixed a:hover,
	.wpcf7-submit,
	.submit,
	.btn,
	.button,
	button,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}
</style>