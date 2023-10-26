<article class="breadcrumb-image">
	<?php echo lth_custom_breadcrumb('full', 1920, 300); ?>

	<div class="breadcrumb-title">
		<div class="container">
			<div class="title-box">
				<?php
				if (!is_single()) { ?>
					<h1 class="title">
						<?php
						if (get_post_type() == 'page') {
							the_title();
						}

						if (get_post_type() == 'post') {
							if (is_category()) {
								single_cat_title();
							}
						}

						if (get_post_type() == 'product') {
							woocommerce_page_title();
						}
						?>
					</h1>
				<?php } else { ?>
					<h2 class="title">
						<?php
						the_title();
						?>
					</h2>
				<?php }
				?>
			</div>
		</div>
	</div>
</article>