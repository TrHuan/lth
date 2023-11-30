<?php

/**
 * @block-slug  :   lth-toggle
 * @block-output:   lth_toggle_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-toggle/frontend_callback', 'lth_toggle_output_fe', 10, 2);

if (!function_exists('lth_toggle_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_toggle_output_fe($output, $attributes)
    {
        ob_start();
?>

        <article class="lth-toggle">
            <div class="module module_toggle">
                <div class="module_content">
                    <ul>
                        <?php foreach ($attributes['items'] as $inner) : ?>
                            <li>
                                <a href="#">
                                    <span><?php echo $inner['item_title']; ?></span>
                                    <i class="fal fa-plus icon icon-plus"></i>
                                    <i class="fal fa-minus icon icon-minus"></i>
                                </a>

                                <div class="content">
                                    <?php echo $inner['item_content']; ?>
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