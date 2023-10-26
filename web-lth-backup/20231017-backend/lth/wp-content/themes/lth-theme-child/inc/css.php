<?php

/**
 * Css
 * @author LTH
 * @since 2020
 */
?>

<?php $color = get_field('color', 'option'); ?>

<style type="text/css">
	.btn {
		color: <?php echo $color; ?>;
	}

	.btn:hover {
		background-color: <?php echo $color; ?>;
		color: #fff;
	}

	.btn {
		border-color: <?php echo $color; ?>;
	}
</style>