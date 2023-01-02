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
                <?php if ($attributes['title'] || $attributes['description']) : ?>
                    <div class="module_header title-box title-align-<?php echo $attributes['title_align']; ?>">
                        <?php if ($attributes['title']) : ?>
                            <h2 class="title">
                                <?php if ($attributes['title_url']) : ?>
                                    <a href="<?php echo esc_url($attributes['title_url']); ?>" title="">
                                    <?php else : ?>
                                        <span>
                                        <?php endif; ?>
                                        <?php echo esc_html($attributes['title']); ?>
                                        <?php if ($attributes['title_url']) : ?>
                                    </a>
                                <?php else : ?>
                                    </span>
                                <?php endif; ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($attributes['description']) : ?>
                            <div class="infor">
                                <p><?php echo esc_html($attributes['description']); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

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