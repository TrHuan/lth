<?php

add_action( 'init', 'create_html_blocks_item' );

function create_html_blocks_item() {
	$labels = array(
		'name' => _x('Html Blocks', 'post type general name'),
		'singular_name' => _x('Html Blocks', 'post type singular name'),
		'add_new' => _x('Add New', 'Html Blocks'),
		'add_new_item' => __('Add New Html Blocks'),
		'edit_item' => __('Edit Html Blocks'),
		'new_item' => __('New Html Blocks'),
		'all_items' => __('All Html Blocks'),
		'view_item' => __('View Html Blocks'),
		'search_items' => __('Search Html Blocks'),
		'not_found' =>  __('No Html Blocks found'),
		'not_found_in_trash' => __('No Html Blocks found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => 'Html Blocks'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => true,
		'menu_position' => 4,	
		'supports'            => array(
			'title',
			'excerpt',
			'editor',
			'thumbnail',
		),
		'show_in_rest' => true,
		'rewrite' => array('slug' => 'html_blocks'),
		'with_front' => FALSE,
		'menu_icon' => 'dashicons-welcome-widgets-menus',

	);

	register_post_type('html-blocks',$args);
}