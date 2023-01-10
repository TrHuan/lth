<?php

/**
 * Setup
 * 
 * @author LTH
 * @since 2020
 */

function lth_theme_setup()
{
    // cho phép hiển thị title trên trình duyệt
    add_theme_support('title-tag');

    // trình soạn thảo, widget: đưa về phiên bản cũ
    remove_theme_support('widgets-block-editor');

    // đăng ký menu
    register_nav_menus(array(
        'main_menu'   => __('Main Menu'),
    ));

    // cho phép sử dụng thumbnails
    add_theme_support('post-thumbnails');

    // remove admin bar font end
    // add_filter('show_admin_bar', '__return_false');

    /**
     * Remove Item Admin Bar
     **/
    function remove_wp_logo($wp_admin_bar)
    {
        $wp_admin_bar->remove_node('comments');
    }
    add_action('admin_bar_menu', 'remove_wp_logo', 999);

    // add image for menu
    add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
    function my_wp_nav_menu_objects($items, $args)
    {
        foreach ($items as $item) {
            $icon = get_field('icon_class', $item);
            if ($icon) {
                $item->title .= ' <i class="' . $icon . ' icon"></i>';
            }

            $img = get_field('image', $item);
            if ($img) {
                $item->title .= '<img src="' . $img . '" alt="Icon">';
            }
        }
        return $items;
    }

    $other = get_field('other', 'option');
    if ($other['developer'] == 'no') {
        /**
         * Remove Item Menu Admin
         */
        add_action('admin_init', 'setting_remove_menu_pages');
        function setting_remove_menu_pages()
        {
            remove_menu_page('tools.php');
            remove_menu_page('plugins.php');
            remove_menu_page('wpcf7');
            remove_menu_page('wpseo_dashboard');
            remove_menu_page('edit.php?post_type=acf-field-group');
            remove_submenu_page('options-general.php', 'tinymce-advanced');
            remove_submenu_page('options-general.php', 'dpp_page_settings');
            remove_submenu_page('options-general.php', 'ewww-image-optimizer-options');
        }

        // remove update plugins
        remove_action('load-update-core.php', 'wp_update_plugins');
        add_filter('pre_site_transient_update_plugins', '__return_null');
        define('DISALLOW_FILE_EDIT', true);
        define('DISALLOW_FILE_MODS', true);

        // remove update themes
        remove_action('load-update-core.php', 'wp_update_themes');
        add_filter('pre_site_transient_update_themes', create_function('$a', "return null;"));

        // remove update core wordpress
        add_action('after_setup_theme', 'remove_core_updates');
        function remove_core_updates()
        {
            if (!current_user_can('update_core')) {
                return;
            }

            //fadd_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
            add_filter('pre_option_update_core', '__return_null');
            add_filter('pre_site_transient_update_core', '__return_null');
        }

        // xoá chỉnh sửa code theme, plugin trong admin
        define('DISALLOW_FILE_EDIT', true);
    }
}
add_action('after_setup_theme', 'lth_theme_setup');

/**
 * Remove Item Menu Admin
 */
add_action('admin_init', 'remove_menu_pages');
function remove_menu_pages()
{
    remove_menu_page('acf-options');
    remove_menu_page('edit.php?post_type=lazyblocks');
}

function lth_sidebar_register()
{
    // Add widget

    if (class_exists('POLYLANG')) {
        register_sidebar(
            array(
                'name' => __('Languages'),
                'id'        => 'languages',
                'before_widget' => '<div class="languages">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="title">',
                'after_title' => '</h2>',
            )
        );
    }


    if (class_exists('WQM_Qr_Code_Generator')) {
        register_sidebar(
            array(
                'name' => __('QR code vCard'),
                'id'        => 'widget_qr_code_vcard',
                'before_widget' => '<div class="widget-box qr-code-vcard-box">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="title">',
                'after_title' => '</h2>',
            )
        );
    }

    ///// Hiển thị widget
    // if (is_active_sidebar('sidebar_blog')) {
    //     dynamic_sidebar('sidebar_blog');
    // }   

    $blogs = get_field('blogs', 'option');
    $blogs_sidebar = $blogs['sidebar'];
    if ($blogs_sidebar != 'no') {
        register_sidebar(
            array(
                'name' => __('Blogs'),
                'id'        => 'sidebar_blogs',
                'before_widget' => '<div class="sidebar-box">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            )
        );
    }

    $blog = get_field('blog_single', 'option');
    $blog_sidebar = $blog['sidebar'];
    if ($blog_sidebar != 'no') {
        register_sidebar(
            array(
                'name' => __('Blog Single'),
                'id'        => 'sidebar_single_blog',
                'before_widget' => '<div class="sidebar-box">',
                'after_widget' => '</div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            )
        );
    }

    if (class_exists('WooCommerce')) {
        $products = get_field('products', 'option');
        $products_sidebar = $products['sidebar'];
        if ($products_sidebar != 'no') {
            register_sidebar(
                array(
                    'name' => __('Products'),
                    'id'        => 'sidebar_shop',
                    'before_widget' => '<div class="sidebar-box sidebar-product">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3>',
                    'after_title' => '</h3>',
                )
            );
        }

        $product = get_field('product_single_option', 'option');
        $product_sidebar = $product['sidebar'];
        if ($product_sidebar != 'no') {
            register_sidebar(
                array(
                    'name' => __('Product Single'),
                    'id'        => 'sidebar_single_product',
                    'before_widget' => '<div class="sidebar-box sidebar-product">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3>',
                    'after_title' => '</h3>',
                )
            );
        }
    }

    /////////////////////////////////////////

}
add_action('widgets_init', 'lth_sidebar_register');

// Thay favicon admin wordpress
function faviconadmin()
{
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_field('favicon', 'option') . '" />';
}
add_action('admin_head', 'faviconadmin');

// Thay doi logo admin wordpress page login

function custom_admin_logo()
{
    if (get_field('logo', 'option')) {
        echo '<style type="text/css">
    body.login div#login h1 a {
        background-image: url(' . get_field('logo', 'option') . ') !important;
        background-position: 0 !important;
        background-size: 100% 100%;
        width: ' . get_field('width_logo', 'option') . 'px;
        height: ' . get_field('height_logo', 'option') . 'px;
    }
    </style>';
    }
}
add_action('login_enqueue_scripts', 'custom_admin_logo');

// Thay logo admin wordpress
function remove_logo_and_submenu()
{
    if (get_field('logo', 'option')) {
        global $wp_admin_bar;
        //the following codes is to remove sub menu
        $wp_admin_bar->remove_menu('about');
        $wp_admin_bar->remove_menu('wporg');
        $wp_admin_bar->remove_menu('documentation');
        $wp_admin_bar->remove_menu('support-forums');
        $wp_admin_bar->remove_menu('feedback');
        //and this is to change wordpress logo
        $wp_admin_bar->add_menu(array(
            'id' => 'wp-logo',
            'title' => '<img src="' . get_field('logo', 'option') . '" alt="Logo"
            width: ' . get_field('width_logo', 'option') . ' height: ' . get_field('height_logo', 'option') . '
            style="height: 15px; position: relative; top: 0; background: #fff; padding: 5px;" />',
            'href' => __('#'),
            'meta' => array(
                'title' => __('LTH - Theme by LTH'),
                'tabindex' => 1,
            ),
        ));
        //and this is to add new sub menu.
        $wp_admin_bar->add_menu(array(
            'parent' => 'wp-logo',
            'id' => 'sub-menu-id-1',
            'title' => __('About us'),
            'href' => __('#'),
        ));
    }
}
add_action('wp_before_admin_bar_render', 'remove_logo_and_submenu');

// Thay doi duong dan logo admin
function wpc_url_login()
{
    return "#";
}
add_filter('login_headerurl', 'wpc_url_login');

// Remove change footer
function remove_footer_admin()
{
    echo __('');
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Thay đổi item menu trong admin
function lth_admin_menu($__return_true)
{
    return array(
        'index.php', // Menu Bảng tin
        'themes.php', // Menu Giao diện
        'lth-theme-options', // Theme options
        'lth-pages-settings', // Pages settings
        'edit.php?post_type=html-blocks', // html-blocks
        'edit.php?post_type=page', // Menu Trang
        'edit.php', // Menu Bài viết
        'edit.php?post_type=product', // Menu Sản phẩm
        'woocommerce', // WooCommerce
        // 'woocommerce-analytics',
        // 'woocommerce-marketing',
        'users.php', // Menu Thành viên
        'wpcf7', // Wpcf7
        'cfdb7-list.php', // Wpcf7
        'wp-mail-smtp', // Wpcf7
        'edit.php?post_type=qrcode-card',
        'wpseo_dashboard',
        'mlang', // Polylang
        'plugins.php', // Menu Plugins
        'upload.php', // Menu Media
        'edit-comments.php', // Menu Phản hồi
        'tools.php', // Menu Công cụ
        'options-general.php', // Menu Cài đặt
        'separator1', // Đoạn Cách
    );
}
add_filter('custom_menu_order', 'lth_admin_menu');
add_filter('menu_order', 'lth_admin_menu');

// remove update plugin
function disable_update_plugin($value)
{
    unset($value->response['advanced-custom-fields-pro/acf.php']);
    unset($value->response['polylang-pro/polylang.php']);
    return $value;
}
add_filter('site_transient_update_plugins', 'disable_update_plugin');

function more_posts_per_search_page($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_search) {
            $query->set('posts_per_page', 12);
        }
    }
}
add_action('pre_get_posts', 'more_posts_per_search_page');

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

// thêm cột ảnh đại diện cho bàu viết trong admin
add_filter('manage_post_posts_columns', 'lth_featured_image_column');
function lth_featured_image_column($column_array)
{
    $column_array = array_slice($column_array, 0, 1, true)
        + array('featured_image' => 'Ảnh đại diện')
        + array_slice($column_array, 1, NULL, true);
    return $column_array;
}
add_action('manage_posts_custom_column', 'lth_render_the_column', 10, 2);
function lth_render_the_column($column_name, $post_id)
{
    if ($column_name == 'featured_image') {
        if (has_post_thumbnail()) {
            if (has_post_thumbnail($post_id)) {
                $thumb_id = get_post_thumbnail_id($post_id);
                echo '<img data-id="' . $thumb_id . '" src="' . wp_get_attachment_url($thumb_id) . '" style="max-width: 120px;" />';
            } else {
                echo '<img data-id="-1" src="' . get_stylesheet_directory_uri() . '/placeholder.png" style="max-width: 120px;" />';
            }
        }
    }
}

// bài viết đã xem
function viewedPost()
{
    session_start();
    if (!isset($_SESSION["viewedpost"])) {
        $_SESSION["viewedpost"] = array();
    }
    if (is_singular('post')) {
        $_SESSION["viewedpost"][get_the_ID()] = get_the_ID();
    }
}
add_action('wp', 'viewedPost');

/* Tự động chuyển đến một trang khác sau khi login */
function my_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	global $user;
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			return admin_url();
		} else {
			return home_url();
		}
	} else {
		return $redirect_to;
	}
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );

// lấy lại mật khẩu đăng nhập
// add_action('wp_ajax_nopriv_ForgotPassword', 'lth_handle_forgot_password'); 
// function lth_handle_forgot_password() {
// 	$userData = [];
 
// 	if ( isset($_POST['userData']) && is_array($_POST['userData']) ) {
// 		$userData = $_POST['userData'];
// 	}
 
// 	if ( isset($userData['_wpnonce']) && wp_verify_nonce( $userData['_wpnonce'], 'form_forgot_password' ) ) {
// 		$arr_form = [];
// 		$arr_error = [];
 
// 		if ( isset( $userData['email'] ) && $userData['email'] ) {
// 			$arr_form['email'] = sanitize_text_field( $userData['email'] );
 
// 			if ( ! email_exists( $arr_form['email'] ) ) {
// 				$arr_error['email'] = 'Địa chỉ email chưa tồn tại trong hệ thống. Vui lòng kiểm tra lại';
// 			}
// 		} else {
// 			$arr_error['email'] = 'Bạn chưa nhập địa chỉ email';
// 		}
 
// 		if ( count( $arr_error ) ) {
// 			echo '<ul>';
// 			foreach ( $arr_error as $key => $error ) {
// 				echo '<li>'.$error.'</li>';
// 			}
// 			echo '</ul>';
// 		} else {
// 			$user = get_user_by( 'email', $arr_form['email'] );
// 			$user_id = $user->ID;
// 			$user_obj = new WP_User( $user_id );
// 			$reset_key = get_password_reset_key( $user_obj );
// 			$user_login = $user->user_login;
// 			$site_name = get_bloginfo( 'name' );
 
// 			$rp_link = network_site_url("wp-login.php?action=rp&key=$reset_key&login=" . rawurlencode($user_login), 'login');
 
// 			$to = $arr_form['email'];
// 			$subject = '['.$site_name.'] Yêu cầu thay đổi mật khẩu';
// 			$headers = array( 'Content-Type: text/html; charset=UTF-8' );
 
// 			$body = 'Yêu cầu thay đổi mật khẩu. <br/>';
// 			$body .= 'Nếu bạn đã yêu cầu đặt lại mật khẩu cho <strong>' . $user_login . '</strong>, hãy sử dụng đường dẫn bên dưới để đặt mật khẩu mới.<br/>Nếu không phải bạn thực hiện, vui lòng bỏ qua email này. <br/>';
// 			$body .= $rp_link;
 
// 			wp_mail( $to, $subject, $body, $headers );
 
// 			echo 'success';
// 		}
// 	}
// 	die();
// }