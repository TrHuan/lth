

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
	        echo '<span style="padding: 0 5px"> / </span>';

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
	                // echo "<span style="padding: 0 5px"> / </span>";

					$term_id = get_queried_object_id(); // Thay thế 123 bằng ID của chuyên mục bạn muốn tìm các chuyên mục cha
					$ancestors = get_ancestors($term_id, 'category'); // Thay 'category' bằng slug của taxonomy nếu bạn sử dụng taxonomy khác
					$ancestors = array_reverse($ancestors);
					// Lặp qua mảng các chuyên mục cha và hiển thị thông tin
					foreach ($ancestors as $ancestor_id) {
						$category = get_category($ancestor_id);
						$category_url = get_category_link($ancestor_id);
						echo '<a href="' . esc_url($category_url) . '">';
						echo $category->name ;
						echo '</a>';
						echo '<span style="padding: 0 5px"> / </span>';
					}

	                echo '<span>';
	                	single_cat_title();
	                echo '</span>';
	            }

	            if (is_single()) {
	            	// if ( class_exists( 'WPSEO_Primary_Term' ) ) {
		            // 	$wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
					// 	$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
					// 	$term = get_term( $wpseo_primary_term );
					// 	$link = get_term_link( $term->term_id, 'category' );

					// 	if ($wpseo_primary_term) {
					// 		echo '<a href="'. $link .'" title="">';
					// 	    	echo $term->name;
					// 	    echo '</a>';
		            //     	echo '<span style="padding: 0 5px"> / </span>';
		            //     }
		            // }

					$post_id = get_the_ID(); // ID của bài viết

					// Lấy danh sách các chuyên mục của bài viết
					$categories = get_the_category($post_id);

					// Tạo một mảng chứa ID của các chuyên mục
					$category_ids = array();
					foreach ($categories as $category) {
						$category_ids[] = $category->term_id;
					}

					// Lấy các chuyên mục theo thứ tự từ cha đến con
					$sorted_categories = get_categories(array(
						'orderby'    => 'parent',
						'order'      => 'ASC',
						'include'    => $category_ids
					));

					// Hiển thị các chuyên mục đã sắp xếp
					foreach ($sorted_categories as $category) {
						echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . $category->name . '</a>';
						echo '<span style="padding: 0 5px"> / </span>';
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

		        		echo '<span style="padding: 0 5px"> / </span>';
		        	}

		        	echo '<span>';
		            	woocommerce_page_title();
		            echo '</span>';
		        } else {
		        	echo '<a href="'.get_permalink( woocommerce_get_page_id( 'shop' ) ).'" title="">';
		        	echo get_the_title( get_option('woocommerce_shop_page_id') );
		        	echo '</a>';

		        	echo '<span style="padding: 0 5px"> / </span>';

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