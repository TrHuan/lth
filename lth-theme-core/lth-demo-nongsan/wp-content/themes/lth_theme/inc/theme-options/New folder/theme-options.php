<?php

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => __('Theme Options'), // Title hiển thị khi truy cập vào Options page
        'menu_title'    => __('Theme Options'), // Tên menu hiển thị ở khu vực admin
        'menu_slug'     => 'lth-theme-options', // Url hiển thị trên đường dẫn của options page
        'capability'    => 'edit_posts',
        'redirect'  => false
    ));
}