<?php

/**
 * @block-slug  :   lth-contact-form
 * @block-output:   lth_contact_form_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-contact-form/frontend_callback', 'lth_contact_form_output_fe', 10, 2);

if (!function_exists('lth_contact_form_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_contact_form_output_fe($output, $attributes) {
        ob_start();
        
    $contact = get_field('contact', 'option');

    if ($attributes['form']) {
        $contact_form = $attributes['form'];
    } else {
        $contact_form = $contact['contact_form'];
    }
?>
    <article class="lth-contact-forms">
        <div class="module_content">
            <?php echo do_shortcode($contact_form); ?>
        </div>
    </article>

<?php
        return ob_get_clean();
    }
endif;
?>