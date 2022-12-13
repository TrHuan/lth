<?php

/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if (!defined('ABSPATH')) {
	exit;
}

?>
<form class="products-ordering" method="get">
	<label><?php echo __('Sắp xếp theo'); ?></label>
	<ul>
		<li>
			<input type="submit" name="orderby" value="date">
			<span><?php echo __('Sản phẩm mới'); ?></span>
		</li>
		<li>
			<input type="submit" name="orderby" value="price">
			<span><?php echo __('Giá thấp đến cao'); ?></span>
		</li>
		<li>
			<input type="submit" name="orderby" value="price-desc">
			<span><?php echo __('Giá cao đến thấp'); ?></span>
		</li>
	</ul>
</form>
</div>