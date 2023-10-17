<?php
/*
Plugin Name: Quản Lý Dự Án
Description: Plugin quản lý các dự án trong admin. Plugin Quản Lý Dự Án cài đặt cùng plugin Advanced Custom Fields Pro.
Version: 1.0
Author: Tên của bạn
*/

// if ( !class_exists( 'ACF' ) ) {
    // require_once plugin_dir_path(__FILE__) . 'plugins/acf/acf.php';

    
// }

// Đăng ký post type quản lý dự án
function register_quan_ly_du_an() {
    $labels = array(
        'name'               => 'Quản Lý Chi Tiết Dự Án',
        'singular_name'      => 'Quản Lý Chi Tiết Dự Án',
        'menu_name'          => 'Quản Lý Dự Án',
        'add_new'            => 'Thêm Mới',
        'add_new_item'       => 'Thêm Mới',
        'edit_item'          => 'Sửa',
        'new_item'           => 'Mới',
        'view_item'          => 'Xem',
        'search_items'       => 'Tìm Kiếm',
        'not_found'          => 'Không tìm thấy bài viết',
        'not_found_in_trash' => 'Không có bài viết nào trong thùng rác',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'menu_icon'           => 'dashicons-portfolio', // Thay đổi biểu tượng menu theo mong muốn
        'supports'            => array( 'title' ),
        'rewrite'             => array( 'slug' => 'quan-ly-du-an' ), // URL slug cho post type
    );

    register_post_type( 'quan_ly_du_an', $args );
}
add_action( 'init', 'register_quan_ly_du_an' );

// Đăng ký bộ phận cho post type "Quản Lý Dự Án"
function register_quan_ly_du_an_bo_phan() {
    $labels = array(
        'name'              => 'Bộ Phận',
        'singular_name'     => 'Bộ Phận',
        'menu_name'         => 'Bộ Phận',
        'search_items'      => 'Tìm Kiếm Bộ Phận',
        'all_items'         => 'Tất Cả Bộ Phận',
        'edit_item'         => 'Sửa Bộ Phận',
        'update_item'       => 'Cập Nhật Bộ Phận',
        'add_new_item'      => 'Thêm Bộ Phận Mới',
        'new_item_name'     => 'Tên Bộ Phận Mới',
    );

    $args = array(
        'hierarchical'      => true, // Để có cấu trúc Bộ Phận như "Bộ Phận con" và "Bộ Phận cha"
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'quan-ly-du-an-bo-phan' ), // URL slug cho taxonomy
    );

    register_taxonomy( 'quan_ly_du_an_bo_phan', 'quan_ly_du_an', $args );
}
add_action( 'init', 'register_quan_ly_du_an_bo_phan' );

// Đăng ký Thông Tin Dự Án cho post type "Quản Lý Dự Án"
function register_thong_tin_du_an() {
    $labels = array(
        'name'              => 'Thông Tin Dự Án',
        'singular_name'     => 'Thông Tin Dự Án',
        'menu_name'         => 'Quản Lý Tổng Dự Án',
        'search_items'      => 'Tìm Kiếm Thông Tin Dự Án',
        'all_items'         => 'Tất Cả Thông Tin Dự Án',
        'edit_item'         => 'Sửa Thông Tin Dự Án',
        'update_item'       => 'Cập Nhật Thông Tin Dự Án',
        'add_new_item'      => 'Thêm Thông Tin Dự Án Mới',
        'new_item_name'     => 'Tên Thông Tin Dự Án Mới',
    );

    $args = array(
        'hierarchical'      => true, // Để có cấu trúc Thông Tin Dự Án như "Thông Tin Dự Án con" và "Thông Tin Dự Án cha"
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'thong-tin-du-an' ), // URL slug cho taxonomy
    );

    register_taxonomy( 'thong_tin_du_an', 'quan_ly_du_an', $args );
}
add_action( 'init', 'register_thong_tin_du_an' );

// acf thông tin dự án, chi tiết dự án
if( function_exists('acf_add_local_field_group') ):
    acf_add_local_field_group(array(
        'key' => 'group_64ffbfa76b90b',
        'title' => 'Chi Tiết Dự Án',
        'fields' => array(
            array(
                'key' => 'field_64ffc11f6c838',
                'label' => 'Thông Tin Dự Án',
                'name' => 'thong_tin_du_an',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_64ffc01e6c831',
                        'label' => 'Thành Viên Phụ Trách',
                        'name' => 'thanh_vien_phu_trach',
                        'type' => 'user',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '70',
                            'class' => '',
                            'id' => '',
                        ),
                        'role' => '',
                        'allow_null' => 1,
                        'multiple' => 0,
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_64ffc0be6c833',
                        'label' => 'Trạng Thái',
                        'name' => 'trang_thai',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '30',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'dang_trien_khai' => 'Đang Triển Khai',
                            'hoan_thanh' => 'Hoàn Thành',
                            'tam_dung' => 'Tạm Dừng',
                        ),
                        'default_value' => false,
                        'allow_null' => 1,
                        'multiple' => 0,
                        'ui' => 0,
                        'return_format' => 'label',
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'field_64ffc0d96c834',
                        'label' => 'Ngày Bắt Đầu',
                        'name' => 'ngay_bat_dau',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffc0e06c835',
                        'label' => 'Ngày Dự Kiến Hoàn Thành',
                        'name' => 'ngay_du_kien_hoan_thanh',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffc0eb6c836',
                        'label' => 'Thời Gian Triển Khai Dự Kiến',
                        'name' => 'thoi_gian_trien_khai_du_kien',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffc0f76c837',
                        'label' => 'Ngày Hoàn Thành Thực Tế',
                        'name' => 'ngay_hoan_thanh_thuc_te',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffc34b1111c',
                        'label' => 'Thời Gian Triển Khai Thực Tế',
                        'name' => 'thoi_gian_trien_khai_thuc_te',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
            ),
            array(
                'key' => 'field_64ffbfa7720a4',
                'label' => 'Chi Tiết Dự Án',
                'name' => 'chi_tiet_du_an',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 1,
                'max' => 0,
                'layout' => 'block',
                'button_label' => 'Thêm',
                'sub_fields' => array(
                    array(
                        'key' => 'field_64ffbfa78e626',
                        'label' => 'Công Việc',
                        'name' => 'cong_viec',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '70',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbfa78e660',
                        'label' => 'Trạng Thái',
                        'name' => 'trang_thai',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '30',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'dang_trien_khai' => 'Đang Triển Khai',
                            'hoan_thanh' => 'Hoàn Thành',
                            'tam_dung' => 'Tạm Dừng',
                        ),
                        'default_value' => false,
                        'allow_null' => 1,
                        'multiple' => 0,
                        'ui' => 0,
                        'return_format' => 'label',
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'field_64ffbfa78e699',
                        'label' => 'Ngày Bắt Đầu',
                        'name' => 'ngay_bat_dau',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbfa78e6d1',
                        'label' => 'Ngày Dự Kiến Hoàn Thành',
                        'name' => 'ngay_du_kien_hoan_thanh',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbfa78e709',
                        'label' => 'Thời Gian Triển Khai Dự Kiến',
                        'name' => 'thoi_gian_trien_khai_du_kien',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbfa78e741',
                        'label' => 'Ngày Hoàn Thành Thực Tế',
                        'name' => 'ngay_hoan_thanh_thuc_te',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbfa78e779',
                        'label' => 'Thời Gian Triển Khai Thực Tế',
                        'name' => 'thoi_gian_trien_khai_thuc_te',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbfa78e7b2',
                        'label' => 'Bàn Giao',
                        'name' => 'ban_giao',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => 2,
                        'new_lines' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'quan_ly_du_an',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'permalink',
            1 => 'the_content',
            2 => 'excerpt',
            3 => 'discussion',
            4 => 'comments',
            5 => 'revisions',
            6 => 'slug',
            7 => 'author',
            8 => 'format',
            9 => 'page_attributes',
            10 => 'featured_image',
            11 => 'categories',
            12 => 'tags',
            13 => 'send-trackbacks',
        ),
        'active' => true,
        'description' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_64ffbf9f6687d',
        'title' => 'Thông Tin Dự Án',
        'fields' => array(
            array(
                'key' => 'field_64ffbf9fe497a',
                'label' => '',
                'name' => 'thong_tin_du_an',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'row',
                'sub_fields' => array(
                    array(
                        'key' => 'field_64ffc8219a9e2',
                        'label' => 'Kỹ thuật phụ trách',
                        'name' => 'ky_thuat_phu_trach',
                        'type' => 'user',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'role' => '',
                        'allow_null' => 1,
                        'multiple' => 0,
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_64ffc8429a9e3',
                        'label' => 'Tư vấn phụ trách',
                        'name' => 'tu_van_phu_trach',
                        'type' => 'user',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'role' => '',
                        'allow_null' => 1,
                        'multiple' => 0,
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_64ffbf9fe6ca8',
                        'label' => 'Mã Dự Án',
                        'name' => 'ma_du_an',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '25',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbf9fe6ce2',
                        'label' => 'Thông Tin Khách Hàng',
                        'name' => 'thong_tin_khach_hang',
                        'type' => 'group',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '75',
                            'class' => '',
                            'id' => '',
                        ),
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_64ffbf9fe9861',
                                'label' => 'Họ Tên',
                                'name' => 'ho_ten',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_64ffbf9fe989b',
                                'label' => 'Số Điện Thoại',
                                'name' => 'so_dien_thoai',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_64ffbf9fe98d4',
                                'label' => 'Email',
                                'name' => 'email',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_64ffbf9fe6d1a',
                        'label' => 'Ngày Bắt Đầu',
                        'name' => 'ngay_bat_dau',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '25',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbf9fe6d53',
                        'label' => 'Ngày Dự Kiến Hoàn Thành',
                        'name' => 'ngay_du_kien_hoan_thanh',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '25',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbf9fe6d8b',
                        'label' => 'Thời Gian Triển Khai Dự Kiến',
                        'name' => 'thoi_gian_trien_khai_du_kien',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '25',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbf9fe6dc4',
                        'label' => 'Trạng Thái',
                        'name' => 'trang_thai',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '25',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'dang_trien_khai' => 'Đang Triển Khai',
                            'cho_phan_hoi' => 'Chờ Phản Hồi',
                            'chinh_sua' => 'Chỉnh Sửa',
                            'hoan_thanh' => 'Hoàn Thành',
                            'tam_dung' => 'Tạm Dừng',
                            'bao_hanh' => 'Bảo Hành',
                            'ket_thuc' => 'Kết Thúc',
                        ),
                        'default_value' => false,
                        'allow_null' => 1,
                        'multiple' => 0,
                        'ui' => 0,
                        'return_format' => 'label',
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'field_64ffbf9fe6dfc',
                        'label' => 'Ngày Hoàn Thành Thực Tế',
                        'name' => 'ngay_hoan_thanh_thuc_te',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '25',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbf9fe6e1e',
                        'label' => 'Thời Gian Triển Khai Thực Tế',
                        'name' => 'thoi_gian_trien_khai_thuc_te',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '25',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbf9fe6e56',
                        'label' => 'Ngày Kết Thúc Bảo Hành',
                        'name' => 'ngay_ket_thuc_bao_hanh',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '25',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbf9fe6e8f',
                        'label' => 'Thời Gian Bảo Hành',
                        'name' => 'thoi_gian_bao_hanh',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '25',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_64ffbf9fe6ec7',
                        'label' => 'Ghi Chú',
                        'name' => 'ghi_chu',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'thong_tin_du_an',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'permalink',
            1 => 'the_content',
            2 => 'excerpt',
            3 => 'discussion',
            4 => 'comments',
            5 => 'revisions',
            6 => 'slug',
            7 => 'author',
            8 => 'format',
            9 => 'page_attributes',
            10 => 'featured_image',
            11 => 'categories',
            12 => 'tags',
            13 => 'send-trackbacks',
        ),
        'active' => true,
        'description' => '',
    ));
endif;

// thêm cột vào admin list quản lý dự án
function custom_post_columns($columns) {
    // Thêm các cột mới vào bảng quản lý bài viết
    $columns['custom_column_1'] = 'Thành Viên';
    $columns['custom_column_2'] = 'Ngày Bắt Đầu';
    $columns['custom_column_3'] = 'Ngày Dự Kiến Hoàn Thành';
    $columns['custom_column_4'] = 'Trạng Thái';

    return $columns;
}
add_filter('manage_quan_ly_du_an_posts_columns', 'custom_post_columns');
// nội dung cột list quản lý dự án
function custom_post_column_data($column, $post_id) {
    // Hiển thị dữ liệu cho các cột mới
    if ($column == 'custom_column_1') {
        // Lấy dữ liệu từ trường ACF
        $thong_tin_du_an = get_field('thong_tin_du_an', $post_id);
        // Hiển thị giá trị trong cột mới
        $thanh_vien_phu_trach = $thong_tin_du_an['thanh_vien_phu_trach'];
        echo $thanh_vien_phu_trach['display_name'];
    }
    
    if ($column == 'custom_column_2') {
        $thong_tin_du_an = get_field('thong_tin_du_an', $post_id);
        echo $thong_tin_du_an['ngay_bat_dau'];
    }

    if ($column == 'custom_column_3') {
        $thong_tin_du_an = get_field('thong_tin_du_an', $post_id);
        echo $thong_tin_du_an['ngay_du_kien_hoan_thanh'];
    }

    if ($column == 'custom_column_4') {
        $thong_tin_du_an = get_field('thong_tin_du_an', $post_id);
        echo $thong_tin_du_an['trang_thai'];
    }
}
add_action('manage_quan_ly_du_an_posts_custom_column', 'custom_post_column_data', 10, 2);

// Thêm cột tùy chỉnh vào trang quản trị danh sách taxonomy
function custom_taxonomy_columns($columns) {
    // Thêm cột mô tả tùy chỉnh   
    $columns['custom_column_1'] = 'Mã Dự Án';   
    $columns['custom_column_2'] = 'Kỹ Thuật Phụ Trách';    
    $columns['custom_column_3'] = 'Tư Vấn Phụ Trách'; 
    $columns['custom_column_4'] = 'Ngày Dự Kiến Hoàn Thành';
    $columns['custom_column_5'] = 'Trạng Thái';
    $columns['custom_column_6'] = 'Ngày Kết Thúc Bảo Hành';

    // Thêm các cột tùy chỉnh khác theo cách tương tự
    // $columns['custom-column-slug'] = 'Tên cột tùy chỉnh';

    return $columns;
}
// Thay 'thong_tin_du_an' bằng id register_taxonomy của taxonomy mà bạn muốn thêm cột tùy chỉnh.
add_filter('manage_edit-thong_tin_du_an_columns', 'custom_taxonomy_columns');
// Hiển thị nội dung cho các cột tùy chỉnh
function custom_taxonomy_columns_content($content, $column_name, $term_id) {
	$term = get_term( $term_id, 'thong_tin_du_an' );
	
	if ('custom_column_1' === $column_name) {
        // Hiển thị nội dung cho cột mô tả tùy chỉnh
		$thong_tin_du_an = get_field('thong_tin_du_an', $term);
		echo $thong_tin_du_an['ma_du_an'];
	}

    if ('custom_column_2' === $column_name) {
        $thong_tin_du_an = get_field('thong_tin_du_an', $term);
		$user = $thong_tin_du_an['ky_thuat_phu_trach'];
		echo $user['display_name'];
    }
	
	if ('custom_column_3' === $column_name) {
        $thong_tin_du_an = get_field('thong_tin_du_an', $term);
		$user = $thong_tin_du_an['tu_van_phu_trach'];
		echo $user['display_name'];
    }
	
	if ('custom_column_4' === $column_name) {
		$thong_tin_du_an = get_field('thong_tin_du_an', $term);
		echo $thong_tin_du_an['ngay_du_kien_hoan_thanh'];
	}
	
	if ('custom_column_5' === $column_name) {
		$thong_tin_du_an = get_field('thong_tin_du_an', $term);
		echo $thong_tin_du_an['trang_thai'];
	}
	
	if ('custom_column_6' === $column_name) {
		$thong_tin_du_an = get_field('thong_tin_du_an', $term);
		echo $thong_tin_du_an['ngay_ket_thuc_bao_hanh'];
	}
}
add_filter('manage_thong_tin_du_an_custom_column', 'custom_taxonomy_columns_content', 10, 3);