<?php
/**
 * @block-slug  :   lth-megamenu
 * @block-output:   lth__megamenu_output
 * @block-attributes: get from attributes.php
 */

// filter for Editor output.
add_filter('lazyblock/lth-megamenu/editor_callback', 'lth__megamenu_output', 10, 2);

if (!function_exists('lth__megamenu_output')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth__megamenu_output($output, $attributes) {
        ob_start();
?>
    
    <?php if (isset($attributes['title'])) : ?>
        <p style="font-size: 12px; padding-top: 10px; padding-left: 35px; margin: 0;"><strong><?php echo esc_html($attributes['title']); ?></strong></p>
    <?php endif; ?>

<?php
        return ob_get_clean();
    }
endif;

?>