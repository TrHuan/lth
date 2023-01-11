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
        
    $contact = get_field('contact', 'option');

    if ($attributes['address']) {
        $address = $attributes['address'];
    } else {
        $address = $contact['address'];
    }

    if ($attributes['phone']) {
        $hotline = $attributes['phone'];
    } else {
        $hotline = $contact['hotline'];
    }
    
    if ($attributes['email']) {
        $email = $attributes['email'];
    } else {
        $email = $contact['email'];
    }    
?>
    <article class="lth-contacts">
        <?php //if ($attributes['map']) {
            //echo $attributes['map'];
        //} ?>

        <div class="module module_address">
            <div class="module_header title-box">
                <h2 class="title"><?php echo __('Liên hệ'); ?></h2>
            </div>

            <?php if ($address || $hotline || $email || class_exists( 'WQM_Qr_Code_Generator' )) { ?>
                <div class="module_content">
                    <ul>
                        <li>
                            <a href="#" title="">
                                <span><?php echo __('Địa chỉ:'); ?></span> <?php echo $address; ?>
                            </a>
                        </li>
                        <li>
                            <a href="tel:<?php echo $hotline; ?>" title="">
                            <span><?php echo __('Hotline:'); ?></span> <?php echo $hotline; ?>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:<?php echo $email; ?>" title="">
                            <span><?php echo __('Email:'); ?></span> <?php echo $email; ?>
                            </a>
                        </li>
                    </ul>
                </div>
            <?php } ?>

            <?php //if ($attributes['form']) { ?>
                <!-- <div class="module_form_contacts"> -->
                    <?php //echo do_shortcode($attributes['form']); ?>
                <!-- </div> -->
            <?php //} ?>
        </div>
    </article>

<?php
        return ob_get_clean();
    }
endif;
?>