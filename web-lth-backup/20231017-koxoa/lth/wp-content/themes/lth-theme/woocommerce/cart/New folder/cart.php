<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<div class="page-checkout">
	<div class="container">

		<div class="module module__header">
			<a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>" title=""><?php echo __('&lt; Tiếp tục mua hàng'); ?></a>

			<label><?php echo __('Giỏ hàng của bạn'); ?></label>
		</div>

		<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">

			<?php do_action('woocommerce_before_cart_table'); ?>

			<ul class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
				<?php do_action('woocommerce_before_cart_contents'); ?>

				<?php
				foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
					$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
					$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

					if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
						$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
				?>
						<li class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?> groups-box">
							<div class="product-thumbnail">
								<?php
								$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

								if (!$product_permalink) {
									echo $thumbnail; // PHPCS: XSS ok.
								} else {
									printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
								}
								?>
							</div>

							<div>
								<div class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
									<?php
									if (!$product_permalink) {
										echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
									} else {
										echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
									}

									do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

									// Meta data.
									echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

									// Backorder notification.
									if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
										echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
									}
									?>

									<div class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
										<label><?php echo __('Giá: '); ?></label>
										<?php
										echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
										?>
									</div>
								</div>

								<div class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
									<label class="d-block"><?php echo __('Số lượng: '); ?></label>
									<?php
									if ($_product->is_sold_individually()) {
										$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
									} else {
										$product_quantity = woocommerce_quantity_input(
											array(
												'input_name'   => "cart[{$cart_item_key}][qty]",
												'input_value'  => $cart_item['quantity'],
												'max_value'    => $_product->get_max_purchase_quantity(),
												'min_value'    => '0',
												'product_name' => $_product->get_name(),
											),
											$_product,
											false
										);
									}

									echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
									?>
								</div>

								<div class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
									<label><?php echo __('Tổng: '); ?></label>
									<?php
									echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
									?>
								</div>

								<div class="product-remove">
									<?php
									echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="icofont-minus"></i> <span>Xóa</span></a>',
											esc_url(wc_get_cart_remove_url($cart_item_key)),
											esc_html__('Remove this item', 'woocommerce'),
											esc_attr($product_id),
											esc_attr($_product->get_sku())
										),
										$cart_item_key
									);
									?>
								</div>
							</div>
						</li>
				<?php
					}
				}
				?>

				<li class="cart-subtotal groups-box">
					<?php do_action('woocommerce_cart_contents'); ?>
					<?php if (wc_coupons_enabled()) { ?>
						<div class="coupon">
							<label for="coupon_code"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_attr_e('Apply coupon', 'woocommerce'); ?></button>
							<?php do_action('woocommerce_cart_coupon'); ?>
						</div>
					<?php } ?>

					<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

					<?php do_action('woocommerce_cart_actions'); ?>

					<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>

					<?php do_action('woocommerce_after_cart_contents'); ?>
				</li>

				<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
					<li class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?> groups-box">
						<label><?php wc_cart_totals_coupon_label($coupon); ?></label>
						<strong data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>">
							<?php wc_cart_totals_coupon_html($coupon); ?>
						</strong>
					</li>
				<?php endforeach; ?>

				<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
					<?php do_action('woocommerce_cart_totals_before_shipping'); ?>

					<?php wc_cart_totals_shipping_html(); ?>

					<?php do_action('woocommerce_cart_totals_after_shipping'); ?>
				<?php elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')) : ?>
					<li class="shipping groups-box">
						<label><?php esc_html_e('Shipping', 'woocommerce'); ?></label>
						<strong data-title="<?php esc_attr_e('Shipping', 'woocommerce'); ?>"><?php woocommerce_shipping_calculator(); ?></strong>
					</li>
				<?php endif; ?>

				<li class="cart-total groups-box">
					<label><?php esc_html_e('Tổng tiền', 'woocommerce'); ?></label>
					<strong>
						<?php wc_cart_totals_order_total_html(); ?>
					</strong>
				</li>

				<?php do_action('woocommerce_before_checkout_form', $checkout); ?>
				<li class="cart-subtotal">
					<!-- <td colspan="2"> -->
					<?php do_action('woocommerce_checkout_before_customer_details'); ?>

					<div id="customer_details">
						<?php do_action('woocommerce_checkout_billing'); ?>

						<?php do_action('woocommerce_checkout_shipping'); ?>
					</div>

					<?php do_action('woocommerce_checkout_after_customer_details'); ?>

					<?php do_action('woocommerce_checkout_after_order_review'); ?>

					<div>
						<div id="order_review" class="woocommerce-checkout-review-order">
							<?php do_action('woocommerce_checkout_order_review'); ?>
						</div>

						<?php do_action('woocommerce_checkout_before_order_review'); ?>

						<div class="form-row place-order">
							<?php do_action('woocommerce_review_order_before_submit'); ?>

							<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="<?php echo __('Đặt hàng') ?>" data-value="<?php echo __('Đặt hàng') ?>"><?php echo __('Đặt hàng') ?></button>

							<?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
						</div>
					</div>

					<?php do_action('woocommerce_checkout_after_order_review'); ?>
					<!-- </td> -->
				</li>
				<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
			</ul>
			<?php do_action('woocommerce_after_cart_table'); ?>

		</form>

	</div>
</div>

<?php do_action('woocommerce_after_cart'); ?>