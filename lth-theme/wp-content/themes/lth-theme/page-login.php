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
                                $home_url = get_home_url();
                                $args = array(
                                    'redirect' => $home_url,
                                );
                    
                                wp_login_form( $args );
                                ?>
                            </div>
                        </div>

                        <!-- <div class="module module_forgotpwd"> 
                            <div class="module_header title-box">
                                <h2 class="title">
                                    <?php //echo __('Quên mật khẩu'); ?>
                                </h2>
                            </div>     

                            <div class="module_content">
                                <form id="lth-forgotpwd" action="<?php //echo get_home_url() . '/quen-mat-khau'; ?>">
                                    <?php //wp_nonce_field( 'form_forgot_password' ); ?>
                                    <div id="lth-message"></div>
                                    <p style="display:none" id="lth-success">
                                        Đã gửi thông tin khôi phục password vào email của bạn. Hãy kiểm tra email!
                                    </p>
                                    <p>
                                        <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                                    </p>
                                    <p>
                                        <button class="form-submit" type="submit">
                                            Lấy lại mật khẩu
                                        </button>
                                    </p>
                                </form>

                                <script>
                                    (function($){  
                                        $(document).ready(function(){
                                            var ajaxUrl = '<?php //echo admin_url('admin-ajax.php'); ?>';
                                            $('#lth-forgotpwd').submit(function(e) {
                                                e.preventDefault();
                                                var data = {};
                                                var ArrayForm = $(this).serializeArray();
                                                $.each(ArrayForm, function() {
                                                    data[this.name] = this.value;
                                                });
                                    
                                                $.ajax({
                                                    type: "POST",
                                                    url: ajaxUrl,
                                                    data: {
                                                        'action': 'ForgotPassword',
                                                        'userData': data
                                                    },
                                                    dataType: "html",
                                                    beforeSend: function() {},
                                                    success: function (response) {
                                                        $('#lth-message').html(response);
                                                        if (response == 'success') {
                                                            $("#lth-forgotpwd")[0].reset();
                                                            $('#lth-message').hide();
                                                            $('#lth-success').show();
                                                        }
                                                    }
                                                });
                                            });
                                        });
                                    })(jQuery);
                                </script>
                            </div>
                        </div> -->
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
                                        // $last_name = $wpdb->escape(trim($_POST['last_name']));
                                        $email = $wpdb->escape(trim($_POST['email']));
                                        $username = $wpdb->escape(trim($_POST['username']));
                                        
                                        // if( $email == "" || $pwd1 == "" || $pwd2 == "" || $username == "" || $first_name == "" || $last_name == "") {
                                        if( $pwd1 == "" || $pwd2 == "" || $username == "" || $first_name == "") {
                                            $err = 'Vui lòng không bỏ trống các thông tin!';
                                        // } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                        //     $err = 'Địa chỉ email không hợp lệ!';
                                        // } else if(email_exists($email) ) {
                                        //     $err = 'Email đã tồn tại!';
                                        } else {                                    
                                            $user_id = wp_insert_user( array (
                                                'first_name' => apply_filters('pre_user_first_name', $first_name),
                                                // 'last_name' => apply_filters('pre_user_last_name', $last_name),
                                                'user_pass' => apply_filters('pre_user_user_pass', $pwd1),
                                                'user_login' => apply_filters('pre_user_user_login', $username),
                                                // 'user_email' => apply_filters('pre_user_user_email', $email),
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
                                
                                <!--display error/success message-->
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
                                    <!-- <p><label><?php //echo __('Họ của bạn'); ?><small>*</small></label>
                                    <input type="text" value="" name="last_name" id="last_name" class="form-control" /></p> -->
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
