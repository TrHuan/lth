<?php
// Add custom Theme Functions here

define('LTH_UX_SHORTCODES_PATH', get_template_directory() . '/inc/shortcodes');
define('LTH_UX_BUILDER_PATH', get_template_directory() . '/inc/builder');
define('LTH_UX_ELEMENTS_PATH', get_template_directory() . '/inc/builder/shortcodes');
define('LTH_UX_ELEMENTS_URI', get_template_directory_uri() . '/inc/builder/shortcodes');
define('LTH_CHILD_PATH', get_theme_file_path());
define('LTH_CHILD_URI', get_theme_file_uri());

$my_theme = wp_get_theme();
define('THEME_NAME', sanitize_title($my_theme->get('Name')));
define('THEME_VERSION', $my_theme->get('Version)'));

define('LTH_PLUGINS_PATH', get_theme_file_path() . '/inc/plugins');

function lth_ux_builder_template( $path ) {
  ob_start();
  include get_theme_file_path() . '/inc/elements/templates/' . $path;
  return ob_get_clean();
}

function lth_ux_builder_thumbnail( $name ) {
  return get_theme_file_uri() . '/inc/elements/thumbnails/' . $name . '.svg';
}

function lth_ux_builder_template_thumb( $name ) {
  return get_theme_file_uri() . '/inc/elements/templates/thumbs/' . $name . '.jpg';
}


// Add Shortcodes
foreach (glob(__DIR__ . "/inc/shortcodes/*.php") as $filename) {
    require_once $filename;
}

// Add UX Builder Elements
add_action( 'ux_builder_setup', function () {

  foreach (glob(__DIR__ . "/inc/elements/*.php") as $filename) {
      require_once $filename;
  }

} );

///////////////////////////////////////////

// Cài đặt những plugins cần thiết
require_once(LTH_PLUGINS_PATH . '/class-tgm-plugin-activation.php');
require_once(LTH_PLUGINS_PATH . '/plugins.php');

 // Thay doi logo admin wordpress
 function login_css() {
	// wp_enqueue_style(THEME_NAME . '-admin-login', LTH_CHILD_URI . '/assets/css/admin/login.css', false, THEME_VERSION, 'all');
  ?>
  <style>
    .login h1 a {
      background-image: url(<?php echo LTH_CHILD_URI . '/assets/css/admin/' ?>images/logo.png);
      background-size: 100%;
      width: 100px;
      height: 89px;
    }
  </style>
<?php }
add_action('login_head', 'login_css');

// add css admin
function addmin_custom_css() {
  wp_enqueue_style('lth-main', LTH_CHILD_URI . '/assets/css/admin/admin.css', false, THEME_VERSION, 'all');
}
add_action('admin_head', 'addmin_custom_css');

function lth_enqueue_customizer_stylesheet() {
  wp_enqueue_style( 'lth-customizer-admin', LTH_CHILD_URI . '/assets/css/admin/admin.css', false, THEME_VERSION, 'all' );
}
add_action( 'customize_controls_print_styles', 'lth_enqueue_customizer_stylesheet' );

/**
* Remove Item Menu Admin
*/
add_action( 'admin_init', 'remove_menu_pages' );
function remove_menu_pages() {
  remove_menu_page( 'flatsome-panel' );
}

//////////////////////////////////

/**
 * Add css
 * 
 * @author LTH
 * @since 2020
 */
function lth_theme_styles() {
  wp_enqueue_style('css-lth-bootstrap', LTH_CHILD_URI . '/assets/css/bootstrap.min.css', false, 'all');
  wp_enqueue_style('css-lth-fontawesome', LTH_CHILD_URI . '/assets/css/all.fontawesome.min.css', false, 'all');
  wp_enqueue_style('css-lth-main', LTH_CHILD_URI . '/assets/css/main.css', false, 'all');

  wp_enqueue_style('css-lth-custom', LTH_CHILD_URI . '/assets/css/custom.css', false, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_styles');

/**
* Add js
* 
* @author LTH
* @since 2020
*/
function lth_theme_scripts() {  
  wp_enqueue_script('js-lth-slick', LTH_CHILD_URI .'/assets/js/main.js', false, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);