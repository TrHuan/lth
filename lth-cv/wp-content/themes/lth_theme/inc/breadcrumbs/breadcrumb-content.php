

<?php if (!is_home()) : ?>
	<?php						
		// breadcrumb
	    echo '<nav class="breadcrumb">';
	    if (!is_home()) {
	        echo '<a href="';
	        echo get_option('home');
	        echo '">';
	        echo __('Trang chủ');
	        echo "</a>";
	        echo "<span> / </span>";

	        if (get_post_type() == 'page') {
	        	if (is_search()) {
	        		echo '<span>';
	        			echo __('Kết quả tìm kiếm: "') . get_search_query() . '"';
	        		echo '</span>';
	        	} else {
	        		echo '<span>';
	            		the_title();
	            	echo '</span>';
	            }
	        }

	        if (get_post_type() == 'post') {
	            if (is_category()) {                  
	                // $archive_page = get_pages(
	                //     array(
	                //         'meta_key' => '_wp_page_template',
	                //         'meta_value' => 'templates/blogs.php'
	                //     )
	                // );
	                // $archive_id = $archive_page[0]->ID;
	                // $archive_name = $archive_page[0]->post_title;
	                // echo '<a href="'. get_permalink( $archive_id ) .'">'. $archive_name .'</a>';
	                
	                // echo "<span> / </span>";

	                echo '<span>';
	                	single_cat_title();
	                echo '</span>';
	            }

	            if (is_single()) {
	            	if ( class_exists( 'WPSEO_Primary_Term' ) ) {
		            	$wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
						$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
						$term = get_term( $wpseo_primary_term );
						$link = get_term_link( $term->term_id, 'category' );

						if ($wpseo_primary_term) {
							echo '<a href="'. $link .'" title="">';
						    	echo $term->name;
						    echo '</a>';
		                	echo "<span> / </span>";
		                }
		            }

	                echo '<span>';
	                	the_title();
	                echo '</span>';
	            }
	        }

	        if (get_post_type() == 'product') {
		        if (!is_single()) {
		        	if (is_tax()) {
		        		echo '<a href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'" title="">';
			        	echo get_the_title( get_option('woocommerce_shop_page_id') );
			        	echo '</a>';

		        		echo "<span> / </span>";
		        	}

		        	echo '<span>';
		            	woocommerce_page_title();
		            echo '</span>';
		        } else {
		        	echo '<a href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'" title="">';
		        	echo get_the_title( get_option('woocommerce_shop_page_id') );
		        	echo '</a>';

		        	echo "<span> / </span>";

		        	echo '<span>';
		            	the_title();
		            echo '</span>';
		        }            
		    }
	    } elseif (is_tag()) {
	    	echo '<span>';
	    		single_tag_title();
	    	echo '</span>';
	    } elseif (is_day()) {
	    	echo '<span>';
	    		echo"Archive for "; the_time('F jS, Y');
	    	echo '</span>';
	    } elseif (is_month()) {
	    	echo '<span>';
	    		echo"Archive for "; the_time('F, Y');
	    	echo '</span>';
	    } elseif (is_year()) {
	    	echo '<span>';
	    		echo"Archive for "; the_time('Y');
	    	echo '</span>';
	    } elseif (is_author()) {
	    	echo '<span>';
	    		echo"Author Archive";
	    	echo '</span>';
	    } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
	    	echo '<span>';
	    		echo "Archives";
	    	echo '</span>';
	    } elseif (is_search()) {
	    	echo '<span>';
	    		echo"Search Results";
	    	echo '</span>';
	    }
	    echo '</nav>';
		// end breadcrumb
	?>
<?php endif; ?>