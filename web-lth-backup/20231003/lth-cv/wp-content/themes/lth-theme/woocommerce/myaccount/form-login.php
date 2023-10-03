<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

	<article class="lth-logins">
        <div class="container">
            <div class="row">
                <?php if(is_user_logged_in()) { $user_id = get_current_user_id();$current_user = wp_get_current_user();$profile_url = get_author_posts_url($user_id);$edit_profile_url = get_edit_profile_url($user_id); ?>        
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="login-box">
                            <?php echo __('Bạn đã đăng nhập với tài khoản'); ?> 
                            <!-- <a href="<?php //echo $profile_url ?>"><?php //echo $current_user->display_name . '.'; ?></a> -->
                            <strong><?php echo $current_user->display_name . '.'; ?></strong>
                            <a href="<?php echo esc_url(wp_logout_url($current_url)); ?>">
                            <?php echo __('Đăng xuất'); ?></a>
                        </div>
                    </div>
                <?php } else { ?>  
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="module module_logins"> 
                            <div class="module_header title-box">
                                <h2 class="title">
                                    <?php echo __('Đăng nhập'); ?>
                                </h2>
                            </div>     

                            <div class="module_content">
                                <?php 
                                $args = array(
                                    'redirect' => site_url( $_SERVER['REQUEST_URI'] ),
                                    'form_id' => 'dangnhap', //Để dành viết CSS
                                    'label_username' => __( 'Tên tài khoản' ),
                                    'label_password' => __( 'Mật khẩu' ),
                                    'label_remember' => __( 'Ghi nhớ' ),
                                    'label_log_in' => __( 'Đăng nhập' ),
                                );

                                $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
                                if ( $login === "failed" ) {
                                    echo '<p><strong>ERROR:</strong> Sai username hoặc mật khẩu.</p>';
                                } elseif ( $login === "empty" ) {
                                    echo '<p><strong>ERROR:</strong> Username và mật khẩu không thể bỏ trống.</p>';
                                } elseif ( $login === "false" ) {
                                    echo '<p><strong>ERROR:</strong> Bạn đã thoát ra.</p>';
                                }

                                wp_login_form();
                                ?>
                                
                                <p class="woocommerce-LostPassword lost_password">
                                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="module module_registers">  
                            <div class="module_header title-box">
                                <h2 class="title">
                                    <?php echo __('Đăng ký'); ?>
                                </h2>
                            </div>     

                            <div class="module_content">          
                                <?php
                                    $err = '';
                                    $success = '';
                                    
                                    global $wpdb, $PasswordHash, $current_user, $user_ID;
                                    
                                    if(isset($_POST['task']) && $_POST['task'] == 'register' ) {
                                        $pwd1 = $wpdb->escape(trim($_POST['pwd1']));
                                        $pwd2 = $wpdb->escape(trim($_POST['pwd2']));
                                        $first_name = $wpdb->escape(trim($_POST['first_name']));
                                        $last_name = $wpdb->escape(trim($_POST['last_name']));
                                        $username = $wpdb->escape(trim($_POST['username']));
                                        
                                        if( $pwd1 == "" || $pwd2 == "" || $username == "" || $first_name == "" || $last_name == "") {
                                            $err = 'Vui lòng không bỏ trống các thông tin!';
                                        } else {                                    
                                            $user_id = wp_insert_user( array (
                                                'first_name' => apply_filters('pre_user_first_name', $first_name),
                                                'last_name' => apply_filters('pre_user_last_name', $last_name),
                                                'user_pass' => apply_filters('pre_user_user_pass', $pwd1),
                                                'user_login' => apply_filters('pre_user_user_login', $username),
                                                'role' => 'subscriber' 
                                            ) );

                                            if( is_wp_error($user_id) ) {
                                                $err = 'Lỗi đăng ký tài khoản';
                                            } else {
                                                do_action('user_register', $user_id);
                                                $success = 'Bạn đã đăng ký thành công!';
                                            }   
                                        }   
                                    }
                                ?>
                                
                                <div id="message">
                                    <?php
                                    if(! empty($err) ) :
                                        echo '<p class="error">'.$err.'';
                                    endif;
                                    ?>
                                    
                                    <?php
                                    if(! empty($success) ) :
                                        echo '<p class="error">'.$success.'';
                                    endif;
                                    ?>
                                </div>

                                <form method="post">    
                                    <p><label><?php echo __('Họ của bạn'); ?></label></p>
                                    <p><input type="text" value="" name="last_name" id="last_name" class="form-control" /></p>
                                    <p><label><?php echo __('Tên của bạn'); ?></label></p>
                                    <p><input type="text" value="" name="first_name" id="first_name" class="form-control" /></p>
                                    <p><label><?php echo __('Tài khoản'); ?></label></p>
                                    <p><input type="text" value="" name="username" id="username" class="form-control" /></p>
                                    <p><label><?php echo __('Mật khẩu'); ?></label></p>
                                    <p><input type="password" value="" name="pwd1" id="pwd1" class="form-control" /></p>
                                    <p><label><?php echo __('Nhập lại mật khẩu'); ?></label></p>
                                    <p><input type="password" value="" name="pwd2" id="pwd2" class="form-control" /></p>
                                    <div class="message"><p><?php if($sucess != "") { echo $sucess; } ?> <?php if($err != "") { echo $err; } ?></p></div>
                                    <button type="submit" name="btnregister" id="nut-dk" class="button" ><?php echo __('Đăng ký'); ?></button>
                                    <input type="hidden" name="task" value="register" />
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </article>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
