<?php

/**
 * @block-slug  :   lth-contact
 * @block-output:   lth_contact_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-contact/frontend_callback', 'lth_contact_output_fe', 10, 2);

if (!function_exists('lth_contact_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_contact_output_fe($output, $attributes) {
        ob_start();
?>
    <article class="lth-contacts">
        <?php echo $attributes['map']; ?>

        <div class="module module_address">
            <div class="module_header title-box">
                <h2 class="title"><?php echo __('Liên hệ'); ?></h2>
            </div>

            <div class="module_content">
                <ul>
                    <li>
                        <a href="#" title="">
                            <?php echo __('Địa chỉ'); ?> : <?php echo $attributes['address']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="tel:<?php echo $attributes['phone']; ?>" title="">
                            <?php echo __('Hotline'); ?> : <?php echo $attributes['phone']; ?>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:<?php echo $attributes['email']; ?>" title="">
                            <?php echo __('Email'); ?> : <?php echo $attributes['email']; ?>
                        </a>
                    </li>
                    <?php if ( class_exists( 'WQM_Qr_Code_Generator' ) ) { ?>
                        <li class="vcard-box">
                            <div class="add-contact">
                                <a href="#" title="">
                                    <i class="fas fa-user-plus"></i>
                                    <span><?php echo __('Thêm liên hệ'); ?></span>
                                </a>

                                <?php if (is_active_sidebar('widget_qr_code_vcard')) {
                                    dynamic_sidebar('widget_qr_code_vcard');
                                } ?>
                            </div>
                        </li>

                        <li class="qr-code-box">
                            <div class="add-contact">
                                <?php if (is_active_sidebar('widget_qr_code_vcard')) {
                                    dynamic_sidebar('widget_qr_code_vcard');
                                } ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="module_form_contacts">
                <?php echo do_shortcode($attributes['form']); ?>
            </div>
        </div>
    </article>

<?php
        return ob_get_clean();
    }
endif;
?>