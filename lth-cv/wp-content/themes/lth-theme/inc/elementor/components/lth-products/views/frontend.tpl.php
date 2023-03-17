<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<?php if ($settings['style_items'] == 1) { ?>
	<div class="new-arrival">
	    <div class="horizontal-content">
	        <div class="semi-title">
	            <h3><?php echo $settings['heading_text']; ?></h3>
	        </div>
	    </div>
	    <div class="tripple-pro-active owl-carousel">
	    	<?php
			    if ( $settings['list'] ) {
			        foreach (  $settings['list'] as $item ) { 
			        	if ($settings['products'] == 2) {
								$tax_query[] = array(
									'taxonomy' => 'product_visibility',
									'field'    => 'name',
									'terms'    => 'featured',
									'operator' => 'IN',
								);
			                   
								$args = [
									'post_type' => 'product',
									'post_status' => 'publish',
									'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field'    => 'name',
											'terms'    => $item['list_categories'],
										),
									),
									'posts_per_page' => 8,
									'orderby' => 'DESC',
									'order' => 'ID',
									'tax_query' => $tax_query,
								];
		                } elseif ($settings['products'] == 3) {                              
							$args = [
								'post_type' => 'product',
								'post_status' => 'publish',
								'tax_query' => array(
									array(
										'taxonomy' => 'product_cat',
										'field'    => 'name',
										'terms'    => $item['list_categories'],
									),
								),
								'posts_per_page' => 8,
								'order' => 'ID',
								'meta_key' => 'total_sales',
								'orderby' => 'meta_value_num',
							];
		                } else {
							$args = [
								'post_type' => 'product',
								'post_status' => 'publish',
								'tax_query' => array(
									array(
										'taxonomy' => 'product_cat',
										'field'    => 'name',
										'terms'    => $item['list_categories'],
									),
								),
								'posts_per_page' => 8,
								'orderby' => 'DESC',
								'order' => 'ID',
							];
		                }

		                $pr = new WP_Query($args);
		                if ($pr->have_posts()) {
		                	while ($pr->have_posts()) {
								$pr-> the_post();

								get_template_part('woocommerce/product-box/product-box', '');
							}
						} wp_reset_postdata(); 
					}
			    } else {
	                if ($settings['products'] == 2) {
	                    $tax_query[] = array(
	                    	'taxonomy' => 'product_visibility',
	                        'field'    => 'name',
	                        'terms'    => 'featured',
	                        'operator' => 'IN',
	                    );
	                   
	                    $args = [
		                    'post_type' => 'product',
		                    'post_status' => 'publish',
		                    'posts_per_page' => 8,
		                    'orderby' => 'DESC',
		                    'order' => 'ID',
		                    'tax_query' => $tax_query,
	                   ];
	                } elseif ($settings['products'] == 3) {                              
						$args = [
							'post_type' => 'product',
							'post_status' => 'publish',
							'posts_per_page' => 8,
							'order' => 'ID',
							'meta_key' => 'total_sales',
							'orderby' => 'meta_value_num',
						];
	                } else {
						$args = [
							'post_type' => 'product',
							'post_status' => 'publish',
							'posts_per_page' => 8,
							'orderby' => 'DESC',
							'order' => 'ID',
						];
	                }

	                $pr = new WP_Query($args);
	                if ($pr->have_posts()) {
	                	while ($pr->have_posts()) {
							$pr-> the_post();

							get_template_part('woocommerce/product-box/product-box', '');
						}
					} wp_reset_postdata(); 
	            }
			?>  
	    </div>
	</div>
<?php } if ($settings['style_items'] == 2) { ?>
	<div class="single-deals mb-40">
	    <div class="mini-title">
	        <h4><?php echo $settings['heading_text']; ?></h4>
	    </div>    
		
	    <div class="single-deal-active owl-carousel">
	        <?php
	        	if ($settings['products'] == 2) {
	                $tax_query[] = array(
	                	'taxonomy' => 'product_visibility',
	                    'field'    => 'name',
	                    'terms'    => 'featured',
	                    'operator' => 'IN',
	                );
	               
	                $args = [
	                    'post_type' => 'product',
	                    'post_status' => 'publish',
	                    'posts_per_page' => 8,
	                    'orderby' => 'DESC',
	                    'order' => 'ID',
	                    'tax_query' => $tax_query,
	                    'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'name',
								'terms'    => $settings['categories'],
							),
						),
	               ];
	            } elseif ($settings['products'] == 3) {                              
					$args = [
						'post_type' => 'product',
						'post_status' => 'publish',
						'posts_per_page' => 8,
						'order' => 'ID',
						'meta_key' => 'total_sales',
						'orderby' => 'meta_value_num',
	                    'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'name',
								'terms'    => $settings['categories'],
							),
						),
					];
	            } else {
					$args = [
						'post_type' => 'product',
						'post_status' => 'publish',
						'posts_per_page' => 8,
						'orderby' => 'DESC',
						'order' => 'ID',
	                    'tax_query' => array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'name',
								'terms'    => $settings['categories'],
							),
						),
					];
	            }

	            $pr = new WP_Query($args);
	            if ($pr->have_posts()) {
	            	while ($pr->have_posts()) {
						$pr-> the_post(); ?>
						<div>
							<div class="countdown" data-countdown="<?php echo $settings['countdown']; ?>"></div>
							<?php get_template_part('woocommerce/product-box/product-box', ''); ?>
						</div>
					<?php }
				} wp_reset_postdata(); 
	        ?>
	    </div>
	</div>
<?php } if ($settings['style_items'] == 3) { ?>
	<div class="trending-products mb-40">
        <div class="mini-title">
            <h4><?php echo $settings['heading_text']; ?></h4>
        </div>
        <div class="single-deal-active owl-carousel">            
            <?php
	        	if ($settings['products'] == 2) {
	                $tax_query[] = array(
	                	'taxonomy' => 'product_visibility',
	                    'field'    => 'name',
	                    'terms'    => 'featured',
	                    'operator' => 'IN',
	                );
	               
	               	if ($settings['categories']) {
		                $args = [
		                    'post_type' => 'product',
		                    'post_status' => 'publish',
		                    'posts_per_page' => 8,
		                    'orderby' => 'DESC',
		                    'order' => 'ID',
		                    'tax_query' => $tax_query,
		                    'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field'    => 'name',
									'terms'    => $settings['categories'],
								),
							),
		               ];
		           } else {
		           		$args = [
		                    'post_type' => 'product',
		                    'post_status' => 'publish',
		                    'posts_per_page' => 8,
		                    'orderby' => 'DESC',
		                    'order' => 'ID',
		                    'tax_query' => $tax_query,
		               ];
		           }
	            } elseif ($settings['products'] == 3) {
					if ($settings['categories']) {
		                $args = [
							'post_type' => 'product',
							'post_status' => 'publish',
							'posts_per_page' => 8,
							'order' => 'ID',
							'meta_key' => 'total_sales',
							'orderby' => 'meta_value_num',
		                    'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field'    => 'name',
									'terms'    => $settings['categories'],
								),
							),
						];
		            } else {
		           		$args = [
							'post_type' => 'product',
							'post_status' => 'publish',
							'posts_per_page' => 8,
							'order' => 'ID',
							'meta_key' => 'total_sales',
							'orderby' => 'meta_value_num',
						];
		            }
	            } else {
					if ($settings['categories']) {
		                $args = [
							'post_type' => 'product',
							'post_status' => 'publish',
							'posts_per_page' => 8,
							'orderby' => 'DESC',
							'order' => 'ID',
		                    'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field'    => 'name',
									'terms'    => $settings['categories'],
								),
							),
						];
		            } else {
		           		$args = [
							'post_type' => 'product',
							'post_status' => 'publish',
							'posts_per_page' => 8,
							'orderby' => 'DESC',
							'order' => 'ID',
						];
		            }
	            }

	            $pr = new WP_Query($args);
	            if ($pr->have_posts()) { $i;
	            	while ($pr->have_posts()) {
						$pr-> the_post(); $i++;
						if ($i == 1 || $i % 5 == 0) { ?>
						<div class="tripple-pro">
						<?php } ?>
							<?php get_template_part('woocommerce/product-box/product-box', '3'); ?>
						<?php if ($i == 4 || $i % 4 == 0) { ?>
						</div>
						<?php } ?>
					<?php }
				} wp_reset_postdata(); 
	        ?>
        </div>
    </div>
<?php } ?>