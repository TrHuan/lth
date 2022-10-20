<?php global $product; ?>
<li>
	<div class="product-box">
		<div class="image-box">
			<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
				<?php echo $product->get_image( 'woocommerce_gallery_thumbnail' ); ?>
			</a>
		</div>
		<div class="content-box">
			<h3>
				<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
					<span class="product-title"><?php echo $product->get_title(); ?></span>
				</a>
			</h3>
			<p><?php if ( ! empty( $show_rating ) ) echo $product->get_rating_html(); ?>
			<?php echo $product->get_price_html(); ?></p>
		</div>
	</div>
</li>
