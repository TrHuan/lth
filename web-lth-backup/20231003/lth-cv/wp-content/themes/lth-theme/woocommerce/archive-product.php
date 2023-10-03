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
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

get_header('shop');
$products = get_field('products', 'option');
$sidebar = $products['sidebar'];
$banner = $products['banner'];
$cat_id = get_queried_object_id(); // ID của chuyên mục ?>

<main class="main-site main-page main-products">
	<?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

	<?php $category_description = category_description($cat_id);
	// Kiểm tra và hiển thị mô tả ngắn
	if (!empty($category_description)) { ?>
		<section class="lth-cat-description">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="module module_cat_description">
							<?php echo $category_description; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>

	<section class="lth-products">
		<div class="container">
			<div class="row">

				<?php if ($sidebar == 'left') { ?>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
						<div class="sidebars">
							<!-- Sidebar -->
							<?php if (is_active_sidebar('sidebar_shop')) { ?>

								<aside class="lth-sidebars">
									<?php dynamic_sidebar('sidebar_shop'); ?>
								</aside>

							<?php } ?>
						</div>
					</div>
				<?php } ?>

				<?php if ($sidebar == 'no') { ?>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<?php } else { ?>
						<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
						<?php } ?>
						<?php $products = get_field('products', 'option');
						$number = $products['number_products_on_row']; ?>
						<div class="posts-list products-list module_products products_item_<?php echo $number; ?>">
							<?php
							if (woocommerce_product_loop()) {
								/**
								 * Hook: woocommerce_before_shop_loop.
								 *
								 * @hooked woocommerce_output_all_notices - 10
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action('woocommerce_before_shop_loop');

								woocommerce_product_loop_start();

								if (wc_get_loop_prop('total')) {
									while (have_posts()) {
										the_post();

										/**
										 * Hook: woocommerce_shop_loop.
										 */
										do_action('woocommerce_shop_loop');

										wc_get_template_part('content', 'product');
									}
								}

								woocommerce_product_loop_end();

								/**
								 * Hook: woocommerce_after_shop_loop.
								 *
								 * @hooked woocommerce_pagination - 10
								 */
								do_action('woocommerce_after_shop_loop');
							} else {
								/**
								 * Hook: woocommerce_no_products_found.
								 *
								 * @hooked wc_no_products_found - 10
								 */
								do_action('woocommerce_no_products_found');
							}
							?>
						</div>
						</div>

						<?php if ($sidebar == 'right') { ?>
							<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
								<div class="sidebars">
									<!-- Sidebar -->
									<?php if (is_active_sidebar('sidebar_shop')) { ?>

										<aside class="lth-sidebars">
											<?php dynamic_sidebar('sidebar_shop'); ?>
										</aside>

									<?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
			</div>
	</section>

	<?php if ($banner) {
		$args = array(
			'post_type' => 'html-blocks',
			'p' => $banner,
		);
		$loop = new WP_Query($args);
		while ($loop->have_posts()) :
			$loop->the_post();
			global $post;
			the_content();
		endwhile;
		// reset post data
		wp_reset_postdata();
	} ?>
</main>

<?php get_footer('shop');
