<?php

/**
 * @block-slug  :   lth-map
 * @block-output:   lth_map_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-map/frontend_callback', 'lth_map_output_fe', 10, 2);

if (!function_exists('lth_map_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_map_output_fe($output, $attributes) {
        ob_start();
        
    $contact = get_field('contact', 'option');

    if ($attributes['map']) {
        $map = $attributes['map'];
    } else {
        $map = $contact['map'];
    }
?>
    <article class="lth-maps">
        <div class="module_content">
            <?php echo $map; ?>
        </div>
    </article>

<?php
        return ob_get_clean();
    }
endif;
?>