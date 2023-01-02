<?php

/**
 * @block-slug  :   lth-countdown
 * @block-output:   lth_countdown_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-countdown/frontend_callback', 'lth_countdown_output_fe', 10, 2);

if (!function_exists('lth_countdown_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_countdown_output_fe($output, $attributes) {
        ob_start();
        $rand = rand(0000,1000);
?>
    <div class="countdown-box countdown-box-<?php echo $rand; ?>" data-countdown="<?php echo $attributes['countdown']; ?>"></div>

    <script>
        jQuery(document).ready(function($) {                 
            $('.countdown-box-<?php echo $rand; ?>').each(function() {
                var $this = $(this), finalDate = $(this).data('countdown');
                $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime('<span>%D</span><span>%H</span><span>%M</span><span>%S</span>'));
                });
            });
        });   
    </script>
<?php
        return ob_get_clean();
    }
endif;
?>