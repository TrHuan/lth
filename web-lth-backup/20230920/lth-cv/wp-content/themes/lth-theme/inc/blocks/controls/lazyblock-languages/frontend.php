<?php

/**
 * @block-slug  :   lth-languages
 * @block-output:   lth_languages_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-languages/frontend_callback', 'lth_languages_output_fe', 10, 2);

if (!function_exists('lth_languages_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_languages_output_fe($output, $attributes) {
        ob_start();
?>
<?php
    if (is_active_sidebar('languages')) {
        dynamic_sidebar('languages');
    }   
?>
<?php
        return ob_get_clean();
    }
endif;
?>