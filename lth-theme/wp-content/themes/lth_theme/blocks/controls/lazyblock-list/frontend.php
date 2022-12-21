<?php

/**
 * @block-slug  :   lth-list
 * @block-output:   lth_list_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-list/frontend_callback', 'lth_list_output_fe', 10, 2);

if (!function_exists('lth_list_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_list_output_fe($output, $attributes)
    {
        ob_start();
?>
        <article class="lth-lists <?php echo $attributes['class']; ?>">
            <?php if ($attributes['title'] || $attributes['description']) : ?>
                <div class="module_header title-box title-align-<?php echo $attributes['title_align']; ?>">
                    <?php if ($attributes['title']) : ?>
                        <h2 class="title">
                            <?php if ($attributes['title_url']) : ?>
                                <a href="<?php echo esc_url($attributes['title_url']); ?>" title="">
                                <?php endif; ?>
                                <?php echo wpautop(esc_html($attributes['title'])); ?>
                                <?php if ($attributes['title_url']) : ?>
                                </a>
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
                <ul class="lists-text">
                    <?php foreach ($attributes['items'] as $inner) { ?>
                        <li>
                            <?php if ($inner['item_url']) : ?>
                                <a href="<?php echo esc_url($inner['item_url']); ?>" title="">
                                <?php endif; ?>
                                <?php echo $inner['item_text']; ?>
                                <?php if ($inner['item_url']) : ?>
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </article>
<?php
        return ob_get_clean();
    }
endif;
?>