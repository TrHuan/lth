<?php
/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">

	.current-menu-item > a,
	.title-tab .title.active,
	.title-tab .title:hover,
	.back-to-top,
	.wpcf7-submit, .submit, .btn, .button, button,
	a:hover {
		color: <?php echo $color; ?>;
	}

	.back-to-top:hover,
    .wpcf7-submit:hover, .submit:hover, .btn:hover, .button:hover, button:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.back-to-top {
		border-color: <?php echo $color; ?>;
	}

</style>