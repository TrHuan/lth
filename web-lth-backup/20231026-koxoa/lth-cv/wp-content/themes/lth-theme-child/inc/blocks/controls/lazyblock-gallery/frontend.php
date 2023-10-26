<?php
/**
 * @block-slug  :   lth-gallery
 * @block-output:   lth_gallery_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-gallery/frontend_callback', 'lth_gallery_output_fe', 10, 2);

if (!function_exists('lth_gallery_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_gallery_output_fe($output, $attributes) {
        ob_start();
?>    
    <article class="lth-galleries">
        <div class="module module_galleries">
            <div class="module_content">
                <ul class="list-galleries">
                    <?php $i = 0;
                    foreach( $attributes['items'] as $inner ): ?>
                        <li>
                            <div class="item">
                                <a href="<?php echo esc_url( $inner['item_url'] ); ?>" title="" target="_blank">
                                    <img src="<?php echo esc_url( $inner['item_image']['url'] ); ?>" alt="<?php echo $inner['item_title']; ?>"
                                    width="<?php echo $attributes['width_image']; ?>" height="<?php echo $attributes['height_image']; ?>">

                                    <div class="text"><?php echo $inner['item_title']; ?></div>
                                </a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </article>
<?php
        return ob_get_clean();
    }
endif;
?>