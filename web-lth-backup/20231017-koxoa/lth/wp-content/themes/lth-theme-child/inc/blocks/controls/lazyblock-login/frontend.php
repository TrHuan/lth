<?php

/**
 * @block-slug  :   lth-login
 * @block-output:   lth_login_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-login/frontend_callback', 'lth_login_output_fe', 10, 2);

if (!function_exists('lth_login_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_login_output_fe($output, $attributes)
    {
        ob_start();

        global $woocommerce;
        
        $login_page = get_pages(
            array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page-login.php'
            )
        );
        $login_id = $login_page[0]->ID;
        $login_url = get_permalink( $login_id );
        
        $register_page = get_pages(
            array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page-register.php'
            )
        );
        $register_id = $register_page[0]->ID;
        $register_url = get_permalink( $register_id );
?>
        <div class="lth-login">
            <?php if(is_user_logged_in()) { $user_id = get_current_user_id();$current_user = wp_get_current_user();$profile_url = get_author_posts_url($user_id);$edit_profile_url = get_edit_profile_url($user_id); ?>
                <div class="login-box user-box">
                    <ul>
                        <?php if (!class_exists('WooCommerce')) { ?>
                            <li>
                                <i class="fas fa-user icon"></i>
                                <label><?php echo __('Xin chào'); ?> </label>
                                <!-- <a href="<?php //echo $profile_url ?>"><?php //echo $current_user->display_name . '.'; ?></a> -->
                                <strong><?php echo $current_user->display_name . '.'; ?></strong>
                            </li>
                            <li>
                                <a href="<?php echo esc_url(wp_logout_url($current_url)); ?>">                                
                                    <i class="far fa-sign-out icon"></i>
                                    <span><?php echo __('Đăng xuất'); ?></span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <label><?php echo __('Xin chào'); ?></label>
                                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                                    <i class="fas fa-user icon"></i>
                                    <strong><?php echo $current_user->display_name . '.'; ?></strong>    
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo esc_url(wp_logout_url(get_permalink( get_option('woocommerce_myaccount_page_id') ))); ?>">
                                    <i class="far fa-sign-out icon"></i>
                                    <span><?php echo __('Đăng xuất'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } else { ?>
                <div class="login-box">
                    <ul>
                        <?php if (!class_exists('WooCommerce')) { ?>
                            <li>
                                <a href="<?php echo $login_url; ?>">
                                    <i class="fas fa-sign-in icon"></i>
                                    <span><?php echo __('Đăng nhập / Đăng ký'); ?></span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                                    <i class="fas fa-sign-in icon"></i>
                                    <span><?php echo __('Đăng nhập / Đăng ký'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
<?php
        return ob_get_clean();
    }
endif;
?>