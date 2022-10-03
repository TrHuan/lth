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
                        <a href="#" title=""> <?php echo __('Địa chỉ'); ?> : <?php echo $attributes['address']; ?></a>
                    </li>
                    <li>
                        <a href="#" title=""> <?php echo __('Hotline'); ?> : <?php echo $attributes['phone']; ?></a>
                    </li>
                    <li>
                        <a href="#" title=""> <?php echo __('Email'); ?> : <?php echo $attributes['email']; ?></a>
                    </li>
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