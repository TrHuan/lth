<?php
// đường dẫn trang chủ
define('HOME_URI', esc_url(home_url('/')));

// đường dẫn theme
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());

// thông tin theme
$my_theme = wp_get_theme();
define('THEME_NAME', sanitize_title($my_theme->get('Name')));
define('THEME_VERSION', $my_theme->get('Version)'));

// đường dẫn chứa các tài liệu css/js/images/fonts
define('ASSETS_URI', THEME_URI . '/assets');

// đường dẫn thư viện
define('LIBS_DIR', THEME_DIR . '/inc');

// khởi tạo theme
require_once(LIBS_DIR . '/setup.php');

// theme options
require_once(THEME_DIR . '/acf/acf.php');
require_once(LIBS_DIR . '/theme-options.php');

// khởi tạo widgets content
define('ELEMENTOR_URI', THEME_URI . '/elementor');
define('ELEMENTOR_DIR', THEME_DIR . '/elementor');
require_once(ELEMENTOR_DIR . '/class-modules-elementor.php');

// thiết lập files css + js
require_once(LIBS_DIR . '/head.php');

// khởi tạo các action hook
require_once(LIBS_DIR . '/hooks/action.php');

// khởi tạo các functions hỗ trợ
require_once(LIBS_DIR . '/help.php');

// BFI_Thumb
require_once(LIBS_DIR . '/BFI_Thumb/BFI_Thumb.php');
require_once(LIBS_DIR . '/BFI_Thumb/setting.php');

// Cài đặt những plugins cần thiết
require_once(LIBS_DIR . '/plugins/class-tgm-plugin-activation.php');
require_once(LIBS_DIR . '/plugins/plugins.php');

if ( class_exists( 'WooCommerce' ) ) {
	// woocommerce
	define('WOO_DIR', THEME_DIR . '/woocommerce');
	
    require_once(LIBS_DIR . '/woocommerce.php');
}

// Custom post types
require_once(LIBS_DIR . '/post-types.php');

// remove widgets
require_once(LIBS_DIR . '/widgets/remove-widgets.php');

// khởi tạo widgets content
require_once(LIBS_DIR . '/widgets/show-widgets.php');