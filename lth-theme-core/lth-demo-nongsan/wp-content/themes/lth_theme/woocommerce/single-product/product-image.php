<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;
?>

<?php
	global $product;
	$regular_price = $product->get_regular_price();
	$sale_price = $product->get_sale_price();
?>

<?php if ($sale_price) { 
	$sale = ($regular_price - $sale_price) * 100 / $regular_price;
?>
	<span class="on-sale"><?php echo round($sale) . '%'; ?></span>
<?php } ?>

<div class="slick-slider slick-product-images-for">
	<?php echo lth_custom_imgs_single_product('full', 530, 314); ?>
</div>

<div class="slick-slider slick-product-images-nav">
	<?php echo lth_custom_imgs_single_product('full', 146, 83); ?>
</div>