<?php
// wp_head
function lth_header() {
    echo '<link rel="icon" href="' . get_field('favicon', 'option') . '" type="image/gif">';  

    if (is_tax()) {
        echo '<link rel="canonical" href="' . get_term_link($term, $taxonomy) . '" />';
    } elseif (is_category()) {
        echo '<link rel="canonical" href="' . get_category_link(get_the_category()[0]->term_id) . '" />';
    } else {
        if (get_post_type() == 'product' && !is_single()) {
            $shop_page_url = get_permalink(woocommerce_get_page_id('shop'));
       
            echo '<link rel="canonical" href="' . $shop_page_url . '" />';
        } else {
            echo '<link rel="canonical" href="' . get_permalink() . '" />';
        }
    }

    $other = get_field('other', 'option');
    echo $other['code_header'];

    require_once(LIBS_DIR . '/css.php');
}
add_action('wp_head', 'lth_header', 1000);
// end wp_head

// wp_footer
function lth_footer() { ?>
    <!-- button show popup lấy theo id của popup -->
    <?php if (have_rows('popups', 'option')) :
        while (have_rows('popups', 'option')) : the_row();
            if (get_sub_field('id')) { ?>
                <div class="popups popup-<?php echo get_sub_field('id'); ?>">
                    <div class="popups-box">
                        <div class="popup-box">
                            <div class="content-box">
                                <?php $popup_option = get_field('popup', 'option');
                                if ($popup_option) {
                                    $args = [
                                        'post_type' => 'html-blocks',
                                        'p' => $popup_option,
                                    ];
                                    $lth = new WP_Query($args);
                                    if ($lth->have_posts()) { ?>
                                <?php while ($lth->have_posts()) {
                                            $lth->the_post();
                                            //load file tương ứng với post format
                                            the_content();
                                        }
                                    }
                                    // reset post data
                                    wp_reset_postdata();
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        endwhile;
    endif; ?>

    <div class="footer-fixed">
        <?php
        $chats = get_field('chats', 'option');
        $phone = $chats['phone'];
        $zalo = $chats['zalo'];
        $facebook = $chats['facebook'];
        $email = $chats['email'];
        ?>

        <ul>
            <?php if ($facebook) { ?>
                <li class="chat-box chat-facebook-box">
                    <a href="<?php echo $facebook; ?>" target="_blank" title="">
                        <span class="icon-facebook">
                            <i class="fab fa-facebook-square icon"></i>
                        </span>
                    </a>
                </li>
            <?php } ?>

            <?php if ($phone) { ?>
                <li class="chat-box chat-phone-box">
                    <a href="tel:<?php echo $phone; ?>" target="_blank" title="">
                        <span class="icon-phone">
                            <i class="fab fa-facebook-messenger icon"></i>
                        </span>
                    </a>
                </li>
            <?php } ?>

            <?php if ($zalo) { ?>
                <li class="chat-box chat-zalo-box">
                    <a href="<?php echo $zalo; ?>" target="_blank" title="">
                        <span class="icon-zalo">
                            <i class="icofont-phone icon"></i>
                        </span>
                    </a>
                </li>
            <?php } ?>

            <?php if ($email) { ?>
                <li class="chat-box chat-email-box">
                    <a href="mailto:<?php echo $email; ?>" target="_blank" title="">
                        <span class="icon-email">
                            <i class="fas fa-envelope icon"></i>
                        </span>
                    </a>
                </li>
            <?php } ?>

            <li>
                <div class="back-to-top">
                    <i class="far fa-chevron-up icon" aria-hidden="true"></i>
                </div>
            </li>
        </ul>
    </div>

    <?php if (class_exists('WooCommerce')) { ?>
        <div class="notification-product">
            <span class="remove-product"><?php echo __('Xóa sản phẩm thành công.'); ?></span>
            <span class="add-product"><?php echo __('Thêm vào giỏ hàng thành công.'); ?></span>
        </div>
    <?php } ?>

    <?php $other = get_field('other', 'option');
    echo $other['code_footer']; ?>
<?php }
add_action('wp_footer', 'lth_footer', 9999);
// end wp_footer