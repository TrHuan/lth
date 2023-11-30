<?php

/**
 * @block-slug  :   lth-widget
 * @block-output:   lth_widget_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-widget/frontend_callback', 'lth_widget_output_fe', 10, 2);

if (!function_exists('lth_widget_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_widget_output_fe($output, $attributes)
    {
        ob_start();

        global $woocommerce;
?>
     <?php if (is_active_sidebar('sidebar_page')) {
        dynamic_sidebar('sidebar_page');
    } ?>
<?php
        return ob_get_clean();
    }
endif;
?>