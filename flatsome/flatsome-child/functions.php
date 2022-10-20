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


// Add structure
foreach (glob(__DIR__ . "/inc/structure/*.php") as $filename) {
    require_once $filename;
}


// Add structure
foreach (glob(__DIR__ . "/inc/woocommerce/*.php") as $filename) {
    require_once $filename;
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

remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10 );
add_action( 'woocommerce_after_shop_loop_item1','woocommerce_template_loop_add_to_cart',10 );


// Cài đặt những plugins cần thiết
require_once(get_theme_file_path() . '/inc/plugins/class-tgm-plugin-activation.php');
require_once(get_theme_file_path() . '/inc/plugins/plugins.php');


// Thay doi logo admin wordpress
function login_css() { ?>
    <style>
        .login h1 a {
            background-image: url("<?php echo LTH_CHILD_URI . '/assets/css/admin/' ?>images/logo.png");
            background-size: 100%;
            width: 120px;
            height: 46px;
        }
    </style>
<?php }
add_action('login_head', 'login_css');

// add css admin
function addmin_custom_css() {
    wp_enqueue_style('lth-main', LTH_CHILD_URI . '/assets/css/admin/admin.css', false, THEME_VERSION, 'all');
}
add_action('admin_head', 'addmin_custom_css');


/**
 * Add css
 * 
 * @author LTH
 * @since 2020
 */
function lth_theme_styles() {
    wp_enqueue_style('css-lth-bootstrap', LTH_CHILD_URI . '/assets/css/bootstrap.min.css', false, 'all');
    wp_enqueue_style('css-lth-fontawesome', LTH_CHILD_URI . '/assets/css/all.fontawesome.min.css', false, 'all');
    wp_enqueue_style('css-lth-customs', get_theme_file_uri() . '/assets/css/customs.css', false, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_styles');

/**
 * Add js
 * 
 * @author LTH
 * @since 2020
 */
function lth_theme_scripts() {  
    //   wp_enqueue_script('js-lth-jquery', LTH_CHILD_URI .'/assets/js/jquery.min.js', false, 'all');
//   wp_enqueue_script('js-lth-slick', LTH_CHILD_URI .'/assets/js/slick.min.js', false, 'all');
  wp_enqueue_script('js-lth-main', LTH_CHILD_URI .'/assets/js/main.js', false, 'all');
}
add_action('wp_enqueue_scripts', 'lth_theme_scripts', 99);

// Làm việc với các fields trong trang checkout của woocommerce
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields',99 );
function custom_override_checkout_fields( $fields ) { 
    $fields['billing']['billing_phone'] = array(
        'label' => __('Số điện thoại', 'lth'),
        'placeholder' => _x('Số điện thoại', 'placeholder', 'lth'),
        'required' => true,
        'class' => array('form-row-wide'),
        'minlength' => '10',
        'maxlength' => '11',
        'clear' => true
    );

    $fields['billing']['billing_phone']['placeholder'] = 'Số điện thoại';

    $fields['shipping']['shipping_phone'] = array(
        'label' => __('Số điện thoại', 'lth'),
        'placeholder' => _x('Số điện thoại của người nhận', 'placeholder', 'lth'),
        'required' => true,
        'class' => array('form-row-wide'),
        'minlength' => '10',
        'maxlength' => '11',
        'clear' => true
    );

    $fields['shipping']['billing_phone']['placeholder'] = 'Số điện thoại của người nhận';

    return $fields;
}

add_filter('posts_search', 'my_search_is_exact', 20, 2);
function my_search_is_exact($search, $wp_query){

    global $wpdb;

    if(empty($search)) {
        return $search; 
    } else {
    

        $q = $wp_query->query_vars;
        $n = !empty($q['exact']) ? '' : '%';    

        $search = $searchand = '';

        foreach((array)$q['search_terms'] as $term) :

            $term = esc_sql(like_escape($term));

            // $search.= "{$searchand}($wpdb->posts.post_title REGEXP '[[:<:]]{$term}[[:>:]]') OR ($wpdb->posts.post_content REGEXP '[[:<:]]{$term}[[:>:]]')";
            
            $search.= "{$searchand}($wpdb->posts.post_title REGEXP '[[:<:]]{$term}[[:>:]]')";

            $searchand = ' AND ';

        endforeach;

        if(!empty($search)) :
            $search = " AND ({$search}) ";
            if(!is_user_logged_in())
                $search .= " AND ($wpdb->posts.post_password = '') ";
        endif;

        return $search;
    }

}

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_text' );    
function woo_custom_cart_button_text() {
    return __( 'Thêm vào giỏ hàng', 'woocommerce' );
}