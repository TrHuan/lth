<?php

/**
 * @block-slug  :   lth-contactqrcode
 * @block-output:   lth_contactqrcode_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-contactqrcode/frontend_callback', 'lth_contactqrcode_output_fe', 10, 2);

if (!function_exists('lth_contactqrcode_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_contactqrcode_output_fe($output, $attributes)
    {
        ob_start();
?>
    <article class="lth-qr-code">
        <ul>
            <?php if ($attributes['url_vcard']) { ?>
                <li class="vcard-box">
                    <div class="add-contact">
                        <a href="<?php echo esc_url( $attributes['url_vcard'] ); ?>" class="btn btn-vcard">
                            <i class="fas fa-user-plus"></i>
                            <span><?php echo __('Thêm liên hệ'); ?></span>
                        </a>
                    </div>
                </li>
            <?php } ?>

            <?php if ($attributes['url_qrcode']) { ?>
                <li class="qr-code-box">
                    <div class="add-contact">
                        <?php //echo do_shortcode($attributes['qrcode']); ?>
                        <image src="<?php echo esc_url( $attributes['url_qrcode'] ); ?>" width="320" height="320" alt="Qrcode">
                    </div>
                </li>
            <?php } ?>
        </ul>
    </article>
<?php
        return ob_get_clean();
    }
endif;
?>