<?php
$pageID = get_the_ID();
$page = get_post($pageID);
$title =  $page->post_title;

$breadcrumb_all = get_field('breadcrumb', 'option');

if (get_post_type() == 'page') {
	$breadcrumb_page = get_field('breadcrumb');

	if ($breadcrumb_page) {
		$img_url = $breadcrumb_page;
	} else {
		$img_url = $breadcrumb_all;
	}
}

if (get_post_type() == 'post') {
	// $archive_page = get_pages(
	// 	array(
	// 		'meta_key' => '_wp_page_template',
	// 		'meta_value' => 'templates/blogs.php'
	// 	)
	// );
	// $archive_id = $archive_page[0]->ID;
	// $breadcrumb_page = get_field('breadcrumb', $archive_id);

	if (is_category()) {
		$term = get_queried_object();
		$breadcrumb_cat_blog = get_field('breadcrumb', $term);
	}

	if (is_single()) {
		$breadcrumb_single = get_field('breadcrumb');
		if ( class_exists( 'WPSEO_Primary_Term' ) ) {
			$wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
			$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
			$term = get_term( $wpseo_primary_term );
			$breadcrumb_cat_blog = get_field('breadcrumb', $term);
		} else {
			$term = get_queried_object();
			$breadcrumb_cat_blog = get_field('breadcrumb', $term);
		}
	}

	if (is_category() && $breadcrumb_cat_blog) {
		$img_url = $breadcrumb_cat_blog;
	} elseif (is_single() && $breadcrumb_single) {
		$img_url = $breadcrumb_single;
		// } elseif ($breadcrumb_page) {
		// 	$img_url = $breadcrumb_page;
	} elseif (is_single() && !$breadcrumb_single && $breadcrumb_cat_blog) {
		$img_url = $breadcrumb_cat_blog;
	} else {
		$img_url = $breadcrumb_all;
	}
}

if (get_post_type() == 'product') {
	$breadcrumb_products = get_field('breadcrumb', woocommerce_get_page_id('shop'));

	if (is_tax()) {
		$term = get_queried_object();
		$breadcrumb_cat_products = get_field('breadcrumb', $term);
	}

	if (is_single()) {
		$breadcrumb_single = get_field('breadcrumb');
	}

	if (!is_single() && $breadcrumb_products || is_tax() && $breadcrumb_cat_products) {
		if ($breadcrumb_cat_products) {
			$img_url = $breadcrumb_cat_products;
		} else {
			$img_url = $breadcrumb_products;
		}
	} elseif (is_single() && $breadcrumb_single) {
		$img_url = $breadcrumb_single;
	} elseif (is_single() && $breadcrumb_products) {
		$img_url = $breadcrumb_products;
	} else {
		$img_url = $breadcrumb_all;
	}
}
?>

<article class="breadcrumb-image">
	<?php if ($img_url) { ?>
		<img src="<?php echo $img_url; ?>" alt="Breadcrumb" style="width: 100%;">
	<?php } ?>

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