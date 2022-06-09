<?php
/**
 * Setup
 * 
 * @author LTH
 * @since 2020
 */

function lth_theme_setup() {
    // cho phép hiển thị title trên trình duyệt
    add_theme_support('title-tag');

    // trình soạn thảo, widget: đưa về phiên bản cũ
    remove_theme_support( 'widgets-block-editor' );
    add_filter('use_block_editor_for_post', '__return_false');

    // đăng ký menu
    register_nav_menus(array(
        'main_menu'   => __('Main Menu'),
    ));

    // cho phép sử dụng thumbnails
    add_theme_support('post-thumbnails');

    // remove admin bar font end
    add_filter('show_admin_bar', '__return_false');

    // add image for menu
    add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
    function my_wp_nav_menu_objects( $items, $args ) { 
        foreach( $items as $item ) {
            $icon = get_field('icon_class', $item);
            if( $icon ) {                
                $item->title .= ' <i class="'.$icon.' icon"></i>';                
            }

            $img = get_field('image', $item); 
            if( $img ) {                
                $item->title .= '<img src="'.$img.'" alt="Icon">';                
            }
        }      
        return $items;        
    }

}
add_action('after_setup_theme', 'lth_theme_setup');

function lth_sidebar_register() {
    // Add widget

    if ( class_exists( 'POLYLANG' ) ) {
        register_sidebar (
            array (
                'name' => __('Languages'),
                'id'        => 'languages',
                'before_widget' => '<div class="languages">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="title">',
                'after_title' => '</h2>',
            )
        );
    }

    register_sidebar (
        array (
            'name' => __('Tin Tức'),
            'id'        => 'sidebar_blog',
            'before_widget' => '<div class="sidebar-box">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="title">',
            'after_title' => '</h2>',
        )
    );

    register_sidebar (
        array (
            'name' => __('Chi Tiết Tin Tức'),
            'id'        => 'sidebar_single_blog',
            'before_widget' => '<div class="sidebar-box">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="title">',
            'after_title' => '</h2>',
        )
    );

    ///// Hiển thị widget
    // if (is_active_sidebar('sidebar_blog')) {
    //     dynamic_sidebar('sidebar_blog');
    // }   

    if ( class_exists( 'WooCommerce' ) ) {
        register_sidebar (
            array (
                'name' => __('Sản Phẩm'),
                'id'        => 'sidebar_product',
                'before_widget' => '<div class="sidebar-box sidebar-product">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="title">',
                'after_title' => '</h2>',
            )
        );

        register_sidebar (
            array (
                'name' => __('Chi Tiết Sản Phẩm'),
                'id'        => 'sidebar_single_product',
                'before_widget' => '<div class="sidebar-box sidebar-product">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="title">',
                'after_title' => '</h2>',
            )
        );
    }  

    /////////////////////////////////////////

}
add_action('widgets_init', 'lth_sidebar_register');

if ( class_exists( 'ACF' ) ) {
    // Thay favicon admin wordpress
    function favicon4admin() {
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_field('favicon', 'option').'" />';
    }
    add_action( 'admin_head', 'favicon4admin' );

    // Thay doi logo admin wordpress page login
    function custom_admin_logo() {
        echo '<style type="text/css">
        body.login div#login h1 a {
            background-image: url('.get_field('logo', 'option').') !important;
            background-position: 0 !important;
            background-size: 100% 100%;
            width: '.get_field('width_logo', 'option').'px;
            height: '.get_field('height_logo', 'option').'px;
        }
        </style>';
    }
    add_action( 'login_enqueue_scripts', 'custom_admin_logo' );

    // Thay logo admin wordpress
    function remove_logo_and_submenu() {
        global $wp_admin_bar;
        //the following codes is to remove sub menu
        $wp_admin_bar->remove_menu('about');
        $wp_admin_bar->remove_menu('wporg');
        $wp_admin_bar->remove_menu('documentation');
        $wp_admin_bar->remove_menu('support-forums');
        $wp_admin_bar->remove_menu('feedback');
        //and this is to change wordpress logo
        $wp_admin_bar->add_menu( array(
            'id' => 'wp-logo',
            'title' => '<img src="'.get_field('logo', 'option').'" style="height: 15px; position: relative; top: 0; background: #fff; padding: 5px;" />',
            'href' => __('#'),
            'meta' => array(
                'title' => __('LTH - Theme by LTH'),
                'tabindex' => 1,
            ),
        ));
        //and this is to add new sub menu.
        $wp_admin_bar->add_menu( array(
            'parent' => 'wp-logo',
            'id' => 'sub-menu-id-1',
            'title' => __('About us'),
            'href' => __('#'),
        ));
    }
    add_action( 'wp_before_admin_bar_render', 'remove_logo_and_submenu' );
}

// Remove change footer
function remove_footer_admin () {
    echo __('');
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Thay đổi item menu trong admin
function lth_admin_menu( $__return_true ) {
    return array(
        'index.php', // Menu Bảng tin
        'themes.php', // Menu Giao diện
        'lth-theme-options', // Theme options
        'lth-pages-settings', // Pages settings
        'edit.php?post_type=html-blocks', // html-blocks
        'edit.php?post_type=page', // Menu Trang
        'edit.php', // Menu Bài viết
        'edit.php?post_type=product', // Menu Sản phẩm
        // 'wc', // WooCommerce
        'edit.php?post_type=slidershow', // slidershow
        'edit.php?post_type=feature', // feature
        'edit.php?post_type=brand', // brand
        'edit.php?post_type=testimonial', // Testimonials
        'edit.php?post_type=service', // services
        'edit.php?post_type=project', // projects
        'users.php', // Menu Thành viên
        'wpcf7', // Wpcf7
        'cfdb7-list.php', // Wpcf7
        'wp-mail-smtp', // Wpcf7
        'mlang', // Polylang
        'plugins.php', // Menu Plugins
        'upload.php', // Menu Media
        'edit-comments.php', // Menu Bình luận 
        'tools.php', // Menu Công cụ
        'options-general.php', // Menu Cài đặt
        'separator1', // Đoạn Cách
   );
}
add_filter( 'custom_menu_order', 'lth_admin_menu' );
add_filter( 'menu_order', 'lth_admin_menu' );

// remove update plugin
function disable_update_plugin( $value ) {
   unset( $value->response['advanced-custom-fields-pro/acf.php'] );
   unset( $value->response['testimonials/testimonials.php'] );
   unset( $value->response['polylang-pro/polylang.php'] );
   return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_update_plugin' );

function more_posts_per_search_page( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ( $query->is_search ) {
            $query->set('posts_per_page',12);
        }
    }
}
add_action( 'pre_get_posts','more_posts_per_search_page' );

// add_action('pre_get_posts', 'reorder_my_cpt');    
// function reorder_my_cpt( $q ) {
//   if ( !is_admin() || !$q->is_main_query() ) {
//     return;
//   }
//   $s = get_current_screen();

//   if ( $s->base === 'edit' && $s->post_type === 'project' ) {
//     $q->set('orderby', 'ID');
//     $q->set('order', 'DESC');
//   }

//   if ( $s->base === 'edit' && $s->post_type === 'service' ) {
//     $q->set('orderby', 'ID');
//     $q->set('order', 'DESC');
//   }
  
//   if ( $s->base === 'edit' && $s->post_type === 'testimonial' ) {
//     $q->set('orderby', 'ID');
//     $q->set('order', 'DESC');
//   }
// }

/**
* Remove Item Menu Admin
*/
add_action( 'admin_init', 'remove_menu_pages' );
function remove_menu_pages() {
    // remove_menu_page( 'edit.php?post_type=acf-field-group' );
    remove_menu_page( 'acf-options' );
    remove_menu_page( 'edit.php?post_type=lazyblocks' );
}