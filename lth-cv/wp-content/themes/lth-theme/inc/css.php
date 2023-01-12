<?php

/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">
	.product-content-box .price .amount,
	.star-rating,
	.product-tab-box .tab-menu .active a,
	.post-button .btn,
	.module_products .post-price,
	.module_products .post-price .amount,
	.module_products .post-button .add_to_cart_button:hover,
	.current-menu-item>a,
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

	.paginations .page-numbers:hover,
	.paginations .page-numbers.current,
	.post-button .btn:hover,
	.module_products .post-image .on-sale,
	.module_products .post-button .add_to_cart_button,
	.back-to-top:hover,
	.wpcf7-submit:hover,
	.submit:hover,
	.btn:hover,
	.button:hover,
	button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.megamenu-mobile .current-menu-item a .icon,
	.module_products .post-button .add_to_cart_button:hover,
	.post-button .btn,
	.paginations .page-numbers:hover,
	.paginations .page-numbers.current,
	.wpcf7-submit,
	.submit,
	.btn,
	.button,
	button,
	.back-to-top {
		border-color: <?php echo $color; ?>;
	}
</style>