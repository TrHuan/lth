<?php

// $products = get_field('products', 'option');
// $products_per_page = $products['products_per_page'];
// $number_products_on_row = $products['number_products_on_row'];

// Page shop nhận file archive-product.php
add_theme_support('woocommerce');

// Hiển thị số lượng sản phẩm trên 1 page: return 2 (2 sản phẩm)
add_filter('loop_shop_per_page', 'cols');
if (!function_exists('cols')) {
    function cols($num)
    {
        $products = get_field('products', 'option');
        $products_per_page = $products['products_per_page'];
        return $products_per_page;
    }
}

// Hiển thị số lượng sản phẩm trên 1 hàng: return 3 (3 sản phẩm)
// add_filter('loop_shop_columns', 'loop_columns');
// if (!function_exists('loop_columns')) {
//     function loop_columns($num)
//     {
//         return $number_products_on_row;
//     }
// }

/* Sắp xếp sản phẩm mới nhất trước, hết hàng sau cùng */
add_action('pre_get_posts', function ($q) {
    if (
        !is_admin()                // Target only front end
        && is_woocommerce()          // Target only WooCommerce
        && $q->is_main_query()       // Only target the main query
    ) {
        $q->set('meta_key', '_stock_status');
        $q->set('orderby', array('meta_value' => 'ASC', 'date' => 'DESC'));
    }
}, PHP_INT_MAX);



/*Woocommerce minicart*/
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment_icon');
function woocommerce_header_add_to_cart_fragment_icon($fragments_icon)
{
    global $woocommerce;
    ob_start();
    // global $woocommerce;
    require_once(WOO_DIR . '/cart/header-cart-ajax.php');
    $fragments_icon['.cart-header .cart-btn'] = ob_get_clean();
    return $fragments_icon;
}
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;
    ob_start();
    // global $woocommerce;
    require_once(WOO_DIR . '/cart/mini-cart-ajax.php');
    $fragments['.cart-content .cart-list'] = ob_get_clean();
    return $fragments;
}

// xóa bỏ css mặc định của woocommerce
add_filter('woocommerce_enqueue_styles', '__return_false');

// xoá sản phẩm liên quan
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// xóa tab thông tin bổ sung, đánh giá ở chi tiết sản phẩm
add_filter('woocommerce_product_tabs', 'remove_product_tabs', 98);
function remove_product_tabs($tabs)
{
    unset($tabs['additional_information']);
    unset($tabs['reviews']);
    unset($tabs['description']);
    return $tabs;
}

/**
 * Adds product images to WooCommerce order emails
 */
function sww_add_photos_to_wc_emails($args)
{
    $args['show_image'] = true;
    $args['show_sku'] = true;
    return $args;
}
add_filter('woocommerce_email_order_items_args', 'sww_add_photos_to_wc_emails');

// Làm việc với các fields trong trang checkout của woocommerce
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields', 99);
function custom_override_checkout_fields($fields)
{
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    // unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);
    // unset($fields['billing']['billing_email']);

    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_state']);
    unset($fields['shipping']['shipping_postcode']);
    // unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_company']);
    // unset($fields['shipping']['shipping_email']);

    $fields['billing']['billing_last_name'] = array(
        'label' => __('Họ và tên', 'lth'),
        'placeholder' => _x('Họ và tên', 'placeholder', 'lth'),
        'required' => true,
        'class' => array('form-row-wide'),
        'clear' => true
    );

    $fields['billing']['billing_address_1']['placeholder'] = 'Địa chỉ (Số xx, Ngõ xx, ... Hà Nội)';
    // $fields['billing']['billing_address_2']['placeholder'] = 'Địa chỉ 2 (Số xx, Ngõ xx, ... Hà Nội)';

    $fields['shipping']['shipping_last_name'] = array(
        'label' => __('Họ và tên', 'lth'),
        'placeholder' => _x('Họ và tên của người nhận', 'placeholder', 'lth'),
        'required' => true,
        'class' => array('form-row-wide'),
        'clear' => true
    );

    $fields['shipping']['shipping_address_1']['placeholder'] = 'Địa chỉ (Số xx, Ngõ xx, ... Hà Nội)';
    // $fields['shipping']['shipping_address_2']['placeholder'] = 'Địa chỉ 2 (Số xx, Ngõ xx, ... Hà Nội)';

    $fields['shipping']['shipping_address_1']['placeholder'] = 'Địa chỉ (Số xx, Ngõ xx, ... Hà Nội)';
    // $fields['shipping']['shipping_address_2']['placeholder'] = 'Địa chỉ 2 (Số xx, Ngõ xx, ... Hà Nội)';

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

    $fields['billing']['billing_email'] = array(
        'label' => __('Email', 'lth'),
        'placeholder' => _x('Email', 'placeholder', 'lth'),
        'required' => false,
        'class' => array('form-row-wide'),
        'clear' => true
    );

    $fields['billing']['billing_email']['placeholder'] = 'Email';

    $fields['shipping']['shipping_email'] = array(
        'label' => __('Email', 'lth'),
        'placeholder' => _x('Email của người nhận', 'placeholder', 'lth'),
        'required' => false,
        'class' => array('form-row-wide'),
        'clear' => true
    );

    $fields['shipping']['shipping_email']['placeholder'] = 'Email của người nhận';

    return $fields;
}

/*
 * Tùy chỉnh hiển thị thông tin chuyển khoản trong woocommerce
 */
add_filter('woocommerce_bacs_accounts', '__return_false');

add_action('woocommerce_email_before_order_table', 'lth_email_instructions', 10, 3);
function lth_email_instructions($order, $sent_to_admin, $plain_text = false)
{
    if (!$sent_to_admin && 'bacs' === $order->get_payment_method() && $order->has_status('on-hold')) {
        lth_bank_details($order->get_id());
    }
}
add_action('woocommerce_thankyou_bacs', 'lth_thankyou_page');
function lth_thankyou_page($order_id)
{
    lth_bank_details($order_id);
}
function lth_bank_details($order_id = '')
{
    $bacs_accounts = get_option('woocommerce_bacs_accounts');
    if (!empty($bacs_accounts)) {
        ob_start();
        echo '<div>';
?>
        <h4><strong><?php echo __('Thông tin chuyển khoản'); ?></strong></h4>

        <ul>
            <?php
            foreach ($bacs_accounts as $bacs_account) {
                $bacs_account = (object) $bacs_account;

                $stk = $bacs_account->account_number;
                $account_name = $bacs_account->account_name;
                $bank_name = $bacs_account->bank_name;
                $bank_branch = $bacs_account->sort_code;
                $icon = $bacs_account->iban;
            ?>
                <!-- <td style="width: 200px;border: 1px solid #ebebeb;padding: 6px 10px;"><?php if ($icon) : ?><img src="<?php echo $icon; ?>" alt=""/><?php endif; ?></td> -->
                <li style="border: 1px solid #ebebeb;padding: 10px 15px;">
                    <p><strong><?php echo __('Chủ tài khoản:'); ?></strong> <?php echo $account_name; ?></p>
                    <p><strong><?php echo __('STK:'); ?></strong> <?php echo $stk; ?></p>
                    <p><strong><?php echo __('Ngân hàng:'); ?></strong> <?php echo $bank_name; ?></p>
                    <p><strong><?php echo __('Chi nhánh:'); ?></strong> <?php echo $bank_branch; ?></p>
                </li>
            <?php } ?>
        </ul>
    <?php echo '</div>';
        echo ob_get_clean();;
    }
}

/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
add_action('wp_enqueue_scripts', 'conditionally_load_woc_js_css');
function conditionally_load_woc_js_css()
{
    //remove generator meta tag
    remove_action('wp_head', array($GLOBALS['woocommerce'], 'generator'));

    wp_dequeue_style('woocommerce_frontend_styles');
    wp_dequeue_style('woocommerce_fancybox_styles');
    wp_dequeue_style('woocommerce_chosen_styles');
    wp_dequeue_style('woocommerce_prettyPhoto_css');
    wp_dequeue_script('woocommerce');
    wp_dequeue_script('prettyPhoto');
    wp_dequeue_script('prettyPhoto-init');
    wp_dequeue_script('jquery-placeholder');
    wp_dequeue_script('fancybox');
    wp_dequeue_script('jqueryui');
    wp_dequeue_script('wcqi-js');
    wp_dequeue_script('jquery-cookie');
    wp_dequeue_script('jquery-blockUI');
    wp_dequeue_style('wc-block-style');
}

// Ajax add to cart single product
function lth_product_page_ajax_add_to_cart_js()
{
    ?>
    <script type="text/javascript" charset="UTF-8">
        jQuery(function($) {

            $('form.cart').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                form.block({
                    message: null,
                    overlayCSS: {
                        background: '#fff',
                        opacity: 0.6
                    }
                });

                var formData = new FormData(form[0]);
                formData.append('add-to-cart', form.find('[name=add-to-cart]').val());

                // Ajax action.
                $.ajax({
                    url: wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'lth_add_to_cart'),
                    data: formData,
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    complete: function(response) {
                        response = response.responseJSON;

                        if (!response) {
                            return;
                        }

                        if (response.error && response.product_url) {
                            window.location = response.product_url;
                            return;
                        }

                        // Redirect to cart option
                        if (wc_add_to_cart_params.cart_redirect_after_add === 'yes') {
                            window.location = wc_add_to_cart_params.cart_url;
                            return;
                        }

                        var $thisbutton = form.find('.single_add_to_cart_button'); //
                        // var $thisbutton = null; // uncomment this if you don't want the 'View cart' button

                        // Trigger event so themes can refresh other areas.
                        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);

                        // Remove existing notices
                        $('.woocommerce-error, .woocommerce-message, .woocommerce-info').remove();

                        // Add new notices
                        form.closest('.product').before(response.fragments.notices_html)

                        form.unblock();
                    }
                });
            });
        });
    </script>

<?php
}
add_action('wp_footer', 'lth_product_page_ajax_add_to_cart_js');

function lth_ajax_add_to_cart_handler()
{
    WC_Form_Handler::add_to_cart_action();
    WC_AJAX::get_refreshed_fragments();
}
add_action('wc_ajax_lth_add_to_cart', 'lth_ajax_add_to_cart_handler');
add_action('wc_ajax_nopriv_lth_add_to_cart', 'lth_ajax_add_to_cart_handler');

// Remove WC Core add to cart handler to prevent double-add
remove_action('wp_loaded', array('WC_Form_Handler', 'add_to_cart_action'), 20);
// End ajax add to cart single product

// breadcrumb 
function woocommerce_remove_breadcrumb()
{
    remove_action(
        'woocommerce_before_main_content',
        'woocommerce_breadcrumb',
        20
    );
}
add_action(
    'woocommerce_before_main_content',
    'woocommerce_remove_breadcrumb'
);
function woocommerce_custom_breadcrumb()
{
    woocommerce_breadcrumb();
}
add_action('woo_custom_breadcrumb', 'woocommerce_custom_breadcrumb');
// end breadcrumb 

// ajax load more
add_action('wp_ajax_productloadmore', 'get_productloadmore');
add_action('wp_ajax_nopriv_productloadmore', 'get_productloadmore');
function get_productloadmore()
{
    $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0; // lấy dữ liệu phái client gởi
    $getposts = new WP_query();
    $getposts->query('post_type=product&post_status=publish&orderby=modified&order=DESC&showposts=3&offset=' . $offset);
    global $wp_query;
    $wp_query->in_the_loop = true;
    while ($getposts->have_posts()) : $getposts->the_post();

        get_template_part('woocommerce/product-box/product-box', '');

    endwhile;
    wp_reset_postdata();
    die();
}
// end ajax load more

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
/////////////////
add_action('woocommerce_single_product_summary_title', 'woocommerce_template_single_title');
add_action('woocommerce_single_product_summary_rating', 'woocommerce_template_single_rating');
add_action('woocommerce_single_product_summary_price', 'woocommerce_template_single_price');
add_action('woocommerce_single_product_summary_excerpt', 'woocommerce_template_single_excerpt');
add_action('woocommerce_single_product_summary_add_to_cart', 'woocommerce_template_single_add_to_cart');
add_action('woocommerce_single_product_summary_meta', 'woocommerce_template_single_meta');
add_action('woocommerce_single_product_summary_sharing', 'woocommerce_template_single_sharing');

add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
function change_existing_currency_symbol($currency_symbol, $currency)
{
    switch ($currency) {
        case 'VND':
            $currency_symbol = 'VNĐ';
            break;
    }
    return $currency_symbol;
}

// Remove product cat base
add_filter('term_link', 'lth_no_term_parents', 1000, 3);
function lth_no_term_parents($url, $term, $taxonomy)
{
    if ($taxonomy == 'product_cat') {
        $term_nicename = $term->slug;
        $url = trailingslashit(get_option('home')) . user_trailingslashit($term_nicename, 'category');
    }
    return $url;
}

// Add our custom product cat rewrite rules
function lth_no_product_cat_parents_rewrite_rules($flash = false)
{
    $terms = get_terms(array(
        'taxonomy' => 'product_cat',
        'post_type' => 'product',
        'hide_empty' => false,
    ));
    if ($terms && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $term_slug = $term->slug;
            add_rewrite_rule($term_slug . '/?$', 'index.php?product_cat=' . $term_slug, 'top');
            add_rewrite_rule($term_slug . '/page/([0-9]{1,})/?$', 'index.php?product_cat=' . $term_slug . '&paged=$matches[1]', 'top');
            add_rewrite_rule($term_slug . '/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?product_cat=' . $term_slug . '&feed=$matches[1]', 'top');
        }
    }
    if ($flash == true)
        flush_rewrite_rules(false);
}
add_action('init', 'lth_no_product_cat_parents_rewrite_rules');

/*Sửa lỗi khi tạo mới taxomony bị 404*/
add_action('create_term', 'lth_new_product_cat_edit_success', 10);
add_action('edit_terms', 'lth_new_product_cat_edit_success', 10);
add_action('delete_term', 'lth_new_product_cat_edit_success', 10);
function lth_new_product_cat_edit_success()
{
    lth_no_product_cat_parents_rewrite_rules(true);
}

// sản phẩm đã xem
function viewedProduct()
{
    session_start();
    if (!isset($_SESSION["viewed"])) {
        $_SESSION["viewed"] = array();
    }
    if (is_singular('product')) {
        $_SESSION["viewed"][get_the_ID()] = get_the_ID();
    }
}
add_action('wp', 'viewedProduct');

// Hợp nhất trang giỏ hàng và trang thanh toán
// add_action('woocommerce_before_checkout_form', 'add_cart_on_checkout', 5);
// function add_cart_on_checkout()
// {
//     if (is_wc_endpoint_url('order-received')) return;
//     echo do_shortcode('[woocommerce_cart]'); // WooCommerce cart page shortcode
// }

// // Chuyển hướng trang giỏ hàng đến trang thanh toán
// add_action('template_redirect', function () {
//     // Replace "cart"  and "checkout" with cart and checkout page slug if needed
//     if (is_page('cart')) {
//         wp_redirect('/checkout/');
//         die();
//     }
// });

// // Chuyển hướng trang thanh toán WooCommerce sang trang cửa hàng
// add_action('template_redirect', 'redirect_empty_checkout');
// function redirect_empty_checkout()
// {
//     if (is_checkout() && 0 == WC()->cart->get_cart_contents_count() && !is_wc_endpoint_url('order-pay') && !is_wc_endpoint_url('order-received')) {
//         wp_safe_redirect(get_permalink(wc_get_page_id('shop')));
//         exit;
//     }
// }

// // Hiển thị nút “Quay lại cửa hàng” trong trang thanh toán trống
// add_filter('woocommerce_checkout_redirect_empty_cart', '__return_false');
// add_filter('woocommerce_checkout_update_order_review_expired', '__return_false');
