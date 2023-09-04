<?php
/**
 * @block-slug  :   lth-html-blocks
 * @block-output:   lth_html_blocks_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-html-blocks/frontend_callback', 'lth_html_blocks_output_fe', 10, 2);

if (!function_exists('lth_html_blocks_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_html_blocks_output_fe($output, $attributes) {
        ob_start();
?>
    <?php 
        $ID = $attributes['html_block'];
        $args = array(
            'post_type' => 'html-blocks',
            'p' => $ID, 
        );
        $loop = new WP_Query($args);
        while ( $loop->have_posts() ) :
            $loop->the_post();
            global $post;
            the_content();
        endwhile;
    ?>
<?php
        return ob_get_clean();
    }
endif;
?>