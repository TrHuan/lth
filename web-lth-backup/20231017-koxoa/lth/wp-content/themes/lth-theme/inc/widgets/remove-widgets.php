<?php
	/**
	 * Xóa widget mặc định trong trang quản trị
	 */
	// unregister all widgets
	function unregister_default_widgets() {
	    unregister_widget('WP_Widget_Pages');
	    unregister_widget('WP_Widget_Calendar');
	    // unregister_widget('WP_Widget_Archives');
	    unregister_widget('WP_Widget_Links');
	    unregister_widget('WP_Widget_Meta');
	    unregister_widget('WP_Widget_Search');
	    unregister_widget('WP_Widget_Text');
	    unregister_widget('WP_Widget_Categories');
	    unregister_widget('WP_Widget_Recent_Posts');
	    unregister_widget('WP_Widget_Recent_Comments');
	    unregister_widget('WP_Widget_RSS');
	    // unregister_widget('WP_Widget_Tag_Cloud');
	    // unregister_widget('WP_Nav_Menu_Widget');
	    unregister_widget('Twenty_Eleven_Ephemera_Widget');
		unregister_widget('WP_Widget_Media_Audio');
		unregister_widget('WP_Widget_Media_Video');
		unregister_widget('WP_Widget_Media_Gallery');

		unregister_widget( 'WC_Widget_Cart' );
		unregister_widget( 'WC_Widget_Price_Filters' );
		unregister_widget( 'WC_Widget_Layered_Nav_Filters' );
		unregister_widget( 'WC_Widget_Product_Search' );
		// unregister_widget( 'WC_Widget_Product_Tag_Cloud' );
		unregister_widget( 'WC_Widget_Products' );
		unregister_widget( 'WC_Widget_Recently_Viewed' );
		// unregister_widget( 'WC_Widget_Layered_Nav' );

		if ( 'yes' === get_option( 'woocommerce_enable_reviews', 'yes' ) ) {
			unregister_widget( 'WC_Widget_Top_Rated_Products' );
			unregister_widget( 'WC_Widget_Recent_Reviews' );
			unregister_widget( 'WC_Widget_Rating_Filter' );
			unregister_widget( 'WC_Widget_Rating_Filter' );
	    	unregister_widget('WC_Widget_Product_Categories');
		}
	}
	add_action('widgets_init', 'unregister_default_widgets', 11);
?>