<?php
/* UPDATER THEME VERSION */
require 'inc/theme-update-checker.php';
$update_checker = new ThemeUpdateChecker(
	'LTH_Theme',
	'https://raw.githubusercontent.com/LTH-Themes/lth_theme/main/info.json'
);
/* Per la ricerca manuale degli aggiornamenti, altrimenti avviene automaticamente ogni 12 ore */
//$update_checker->checkForUpdates();

// thông tin theme
$my_theme = wp_get_theme();
define('THEME_NAME', sanitize_title($my_theme->get('Name')));
define('THEME_VERSION', $my_theme->get('Version)'));

// đường dẫn trang chủ
define('HOME_URI', esc_url(home_url('/')));

// đường dẫn theme
define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());

// đường dẫn chứa các tài liệu css/js/images/fonts
define('ASSETS_URI', THEME_URI . '/assets');

// đường dẫn thư viện
define('LIBS_DIR', THEME_DIR . '/inc');

if (THEME_NAME === 'lth_theme') {
	// theme options
	require_once(THEME_DIR . '/plugins/acf/acf.php');

	// khởi tạo widgets content
	define('BLOCKS_URI', THEME_URI . '/blocks');
	define('BLOCKS_DIR', THEME_DIR . '/blocks');
	require_once(BLOCKS_DIR . '/lth-blocks.php');
}

require_once(LIBS_DIR . '/theme-options.php');

// khởi tạo theme
require_once(LIBS_DIR . '/setup.php');

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

if (class_exists('WooCommerce')) {
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

//////////////////////////////////////////////////
