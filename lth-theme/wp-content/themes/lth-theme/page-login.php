<?php
/**
 * Template Name: Page Login
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main main-page main-logins">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <article class="lth-logins">
        <div class="container">
            <div class="row">
                <?php if(is_user_logged_in()) { $user_id = get_current_user_id();$current_user = wp_get_current_user();$profile_url = get_author_posts_url($user_id);$edit_profile_url = get_edit_profile_url($user_id); ?>        
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="login-box">
                            <?php echo __('Bạn đã đăng nhập với tài khoản'); ?> 
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
                                $home_url = get_home_url();
                                $args = array(
                                    'redirect' => $home_url,
                                );
                    
                                wp_login_form( $args );
                                ?>
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
                                        $email = $wpdb->escape(trim($_POST['email']));
                                        $username = $wpdb->escape(trim($_POST['username']));
                                        
                                        if( $pwd1 == "" || $pwd2 == "" || $username == "" || $first_name == "") {
                                            $err = 'Vui lòng không bỏ trống các thông tin!';
                                        } else {                                    
                                            $user_id = wp_insert_user( array (
                                                'first_name' => apply_filters('pre_user_first_name', $first_name),
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
                                    <p><label><?php echo __('Họ tên'); ?><small>*</small></label>
                                    <input type="text" value="" name="first_name" id="first_name" class="form-control" /></p>
                                    <p><label><?php echo __('Email'); ?></label>
                                    <input type="text" value="" name="email" id="email" class="form-control" /></p>
                                    <p><label><?php echo __('Tài khoản'); ?><small>*</small></label>
                                    <input type="text" value="" name="username" id="username" class="form-control" /></p>
                                    <p><label><?php echo __('Mật khẩu'); ?><small>*</small></label>
                                    <input type="password" value="" name="pwd1" id="pwd1" class="form-control" /></p>
                                    <p><label><?php echo __('Nhập lại mật khẩu'); ?><small>*</small></label>
                                    <input type="password" value="" name="pwd2" id="pwd2" class="form-control" /></p>
                                    <p><button type="submit" name="btnregister" id="nut-dk" class="button" ><?php echo __('Đăng ký'); ?></button>
                                    <input type="hidden" name="task" value="register" /></p>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </article>
</main>

<?php get_footer(); ?>
