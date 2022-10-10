<?php
/**
 * Footer
 * 
 * @author LTH
 * @since 2020
 */
?>

        <footer>
            <div class="container">
                <?php 
                    $ID = get_field('footer', 'option');

                    if ($ID) {
                        $args = array(
                            'post_type' => 'html-blocks',
                            'p' => $ID, 
                        );
                        $loop = new WP_Query($args);
                        while ( $loop->have_posts() ) :
                            $loop->the_post();
                            global $post;
                            the_content();
                        endwhile;
                    }
                ?>
            </div>
        </footer>

        <?php wp_footer(); ?>

        <!-- button show popup lấy theo id của popup -->
         <?php if( have_rows('popups', 'option') ): ?>
            <?php while( have_rows('popups', 'option') ) : the_row();
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
                                                    $lth-> the_post();
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
            endwhile; ?>   
        <?php endif; ?>

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
                           <!--  <span class="icon-facebook">
                                <i class="fab fa-facebook-square icon"></i>
                            </span> -->

                            <img src="<?php echo ASSETS_URI; ?>/images/icon-12.png" alt="Icon">                           
                        </a>
                    </li>
                <?php } ?>

                <?php if ($phone) { ?>
                    <li class="chat-box chat-phone-box">
                        <a href="tel:<?php echo $phone; ?>" target="_blank" title="">
                            <!-- <span class="icon-phone">
                                <i class="fas fa-phone-alt icon"></i>
                            </span> -->

                            <img src="<?php echo ASSETS_URI; ?>/images/icon-13.png" alt="Icon" width="80" height="80">
                        </a>
                    </li>
                <?php } ?>

                <?php if ($zalo) { ?>
                    <li class="chat-box chat-zalo-box">
                        <a href="<?php echo $zalo; ?>" target="_blank" title="">
                            <!-- <span class="icon-zalo">
                                <i class="icofont-phone icon"></i>
                            </span> -->
                            
                            <img src="<?php echo ASSETS_URI; ?>/images/icon-12.png" alt="Icon">
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

        <?php if ( class_exists( 'WooCommerce' ) ) { ?>
            <div class="notification-product">
                <span class="remove-product"><?php echo __('Xóa sản phẩm thành công.'); ?></span>
                <span class="add-product"><?php echo __('Thêm vào giỏ hàng thành công.'); ?></span>
            </div>
        <?php } ?>

        <?php $other = get_field('other', 'option');
        echo $other['code_footer']; ?>
        
    </body>
</html>
