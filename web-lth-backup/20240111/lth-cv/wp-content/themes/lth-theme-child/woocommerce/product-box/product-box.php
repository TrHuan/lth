<?php global $product; ?>

<div class="item">
	<article class="post-box">
        <div class="post-header">
			<?php if (has_post_thumbnail()) { ?>
				<div class="post-image">
					<a href="<?php the_permalink(); ?>" title="" class="image">
						<picture>
							<source media="(min-width:1200px)" srcset="<?php echo lth_custom_img('full', 420, 420); ?>">
							<source media="(min-width:768px)" srcset="<?php echo lth_custom_img('full', 330, 330); ?>">
							<source media="(min-width:320px)" srcset="<?php echo lth_custom_img('full', 240, 240); ?>">
							<img src="<?php echo lth_custom_img('full', 420, 420); ?>" width="420" height="420" alt="<?php the_title(); ?>">
						</picture>
					</a>

					<?php
					$regular_price = $product->get_regular_price();
					$sale_price = $product->get_sale_price();
					?>

					<?php if ($sale_price) {
						$sale = ($regular_price - $sale_price) * 100 / $regular_price;
					?>
						<span class="on-sale"><?php echo round($sale) . '%'; ?></span>
					<?php } ?>
				</div>
			<?php } else { ?>
				<div class="post-image">
					<a href="<?php the_permalink(); ?>" title="" class="image">
						<picture>
							<source media="(min-width:1200px)" srcset="<?php echo lth_custom_logo('full', 420, 420); ?>">
							<source media="(min-width:768px)" srcset="<?php echo lth_custom_logo('full', 330, 330); ?>">
							<source media="(min-width:320px)" srcset="<?php echo lth_custom_logo('full', 240, 240); ?>">
							<img src="<?php echo lth_custom_logo('full', 420, 420); ?>" width="420" height="420" alt="<?php the_title(); ?>">
						</picture>
					</a>

					<?php
					$regular_price = $product->get_regular_price();
					$sale_price = $product->get_sale_price();
					?>

					<?php if ($sale_price) {
						$sale = ($regular_price - $sale_price) * 100 / $regular_price;
					?>
						<span class="on-sale"><?php echo round($sale) . '%'; ?></span>
					<?php } ?>
				</div>
			<?php } ?>

			<div class="post-content">
				<h3 class="post-name">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>

				<?php get_template_part('woocommerce/loop/rating', ''); ?>

				<div class="post-price">
					<?php if (!$product->get_regular_price()) { ?>
						<span class="woocommerce-Price-amount amount">
							<?php echo __('Liên hệ'); ?>
						</span>
					<?php } else {
						echo $product->get_price_html();
					} ?>
				</div>
				
				<div class="post-button">
					<a class="btn btn-read-more" href="<?php the_permalink(); ?>">
						<span><?php echo __('Xem chi tiết'); ?></span>
					</a>

					<?php if ($product->get_regular_price()) {
						if (!$product->is_type('variable')) {
							echo apply_filters(
								'woocommerce_loop_add_to_cart_link',
								sprintf(
									'<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
							class="%s btn ajax_add_to_cart"><i class="fal fa-shopping-cart icon"></i><span>Thêm vào giỏ</span></a>',
									esc_url($product->add_to_cart_url()),
									esc_attr($product->id),
									esc_attr($product->get_sku()),
									$product->is_purchasable() ? 'add_to_cart_button' : '',
									esc_attr($product->product_type),
									esc_html($product->add_to_cart_text())
								),
								$product
							);
						}
					} ?>
				</div>
			</div>
        </div>
        <div class="post-footer">
			<div class="post-button">
				<a class="btn btn-read-more" href="<?php the_permalink(); ?>">
					<span><?php echo __('Xem chi tiết'); ?></span>
				</a>

				<?php if ($product->get_regular_price()) {
					if (!$product->is_type('variable')) {
						echo apply_filters(
							'woocommerce_loop_add_to_cart_link',
							sprintf(
								'<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" 
						class="%s btn ajax_add_to_cart"><i class="fal fa-shopping-cart icon"></i><span>Thêm vào giỏ</span></a>',
								esc_url($product->add_to_cart_url()),
								esc_attr($product->id),
								esc_attr($product->get_sku()),
								$product->is_purchasable() ? 'add_to_cart_button' : '',
								esc_attr($product->product_type),
								esc_html($product->add_to_cart_text())
							),
							$product
						);
					}
				} ?>
			</div>
        </div>
	</article>
</div>