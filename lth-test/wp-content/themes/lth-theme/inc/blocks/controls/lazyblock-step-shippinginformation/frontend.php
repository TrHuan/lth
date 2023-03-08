<?php

/**
 * @block-slug  :   lth-step-shippinginformation
 * @block-output:   lth_step_shippinginformation_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-step-shippinginformation/frontend_callback', 'lth_step_shippinginformation_output_fe', 10, 2);

if (!function_exists('lth_step_shippinginformation_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_step_shippinginformation_output_fe($output, $attributes) {
        ob_start();
        
    $contact = get_field('contact', 'option');

    if ($attributes['form']) {
        $contact_form = $attributes['form'];
    } else {
        $contact_form = $contact['contact_form'];
    }
?>
    <article class="lth-step-shippinginformation">
        <div class="module module_shippinginformation">
            <?php if ($attributes['title'] || $attributes['description']) : ?>
                <div class="module_header title-box title-align-<?php echo $attributes['title_align']; ?>">
                    <?php if ($attributes['title']) : ?>
                        <h2 class="title">
                            <?php if ($attributes['title_url']) : ?>
                                <a href="<?php echo esc_url($attributes['title_url']); ?>" title="">
                                <?php else : ?>
                                    <span>
                                    <?php endif; ?>
                                    <?php echo wpautop(esc_html($attributes['title'])); ?>
                                    <?php if ($attributes['title_url']) : ?>
                                </a>
                            <?php else : ?>
                                </span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($attributes['description']) : ?>
                        <div class="infor">
                            <?php echo wpautop(esc_html($attributes['description'])); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="module_content">
                <?php echo do_shortcode($contact_form); ?>
            </div>
        </div>
    </article>

<?php
        return ob_get_clean();
    }
endif;
?>