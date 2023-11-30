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
    
    if ($attributes['work_time']) {
        $work_time = $attributes['work_time'];
    } else {
        $work_time = $contact['work_time'];
    }   
?>
    <article class="lth-contacts">
        <div class="module module_address">
            <div class="module_header title-box">
                <h2 class="title"><?php echo __('Liên hệ'); ?></h2>
            </div>

            <?php if ($address || $hotline || $email || $work_time) { ?>
                <div class="module_content">
                    <ul>
                        <?php if ( !$attributes['address_hide'] ) { ?>
                            <li>
                                <span><?php echo __('Địa chỉ:'); ?></span> 
                                <p><?php echo $address; ?></p>
                            </li>
                        <?php } ?>
                        <?php if ( !$attributes['phone_hide'] ) { ?>
                            <li>
                                <span><?php echo __('Hotline:'); ?></span>
                                <a href="tel:<?php echo $hotline; ?>" title=""><?php echo $hotline; ?></a>
                            </li>
                        <?php } ?>
                        <?php if ( !$attributes['email_hide'] ) { ?>
                            <li>
                                <span><?php echo __('Email:'); ?></span>
                                <a href="mailto:<?php echo $email; ?>" title=""><?php echo $email; ?></a>
                            </li>
                        <?php } ?>
                        <?php if ( !$attributes['work_time_hide'] ) { ?>
                            <li>
                                <span><?php echo __('Giờ làm việc:'); ?></span>
                                <p><?php echo $work_time; ?></p>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </article>

<?php
        return ob_get_clean();
    }
endif;
?>