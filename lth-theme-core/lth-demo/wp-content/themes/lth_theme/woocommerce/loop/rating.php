<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product; ?>

<?php if ($ave = $product->get_average_rating()) : ?>
    <div class="star-rating">
	    <div style="display: inline-block;">
	    	<span style="width: <?php echo $ave/5*100; ?>%; overflow: hidden; white-space: nowrap; display: inline-block;">
	    		<span class="icofont-star icon"></span>
	    		<span class="icofont-star icon"></span>
	    		<span class="icofont-star icon"></span>
	    		<span class="icofont-star icon"></span>
	    		<span class="icofont-star icon"></span>
	    	</span>
	    </div>
    </div>
<?php endif; ?>