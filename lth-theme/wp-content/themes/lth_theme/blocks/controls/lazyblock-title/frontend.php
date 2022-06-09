<?php

/**
 * @block-slug  :   lth-title
 * @block-output:   lth_title_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-title/frontend_callback', 'lth_title_output_fe', 10, 2);

if (!function_exists('lth_title_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_title_output_fe($output, $attributes) {
        ob_start();

    $title_color = 'color: '.$attributes['title_color'];
    $description_color = 'color: '.$attributes['description_color'];
?>

    <?php if ($attributes['title'] || $attributes['description']) : ?>
        <div class="module_header title-box" style="text-align: <?php echo $attributes['title_text_align']; ?>">
            <?php if (isset($attributes['title'])) : ?>
                <?php if ($attributes['title_tag'] == 'h1') { ?>
                    <h1 class="title" <?php if (!$attributes['title_url'] && $attributes['title_color']) : ?>style="<?php echo $title_color; ?>"<?php endif; ?>>
                <?php } elseif ($attributes['title_tag'] == 'h2') { ?>
                    <h2 class="title" <?php if (!$attributes['title_url'] && $attributes['title_color']) : ?>style="<?php echo $title_color; ?>"<?php endif; ?>>
                <?php } elseif ($attributes['title_tag'] == 'h3') { ?>
                    <h3 class="title" <?php if (!$attributes['title_url'] && $attributes['title_color']) : ?>style="<?php echo $title_color; ?>"<?php endif; ?>>
                <?php } elseif ($attributes['title_tag'] == 'h4') { ?>
                    <h4 class="title" <?php if (!$attributes['title_url'] && $attributes['title_color']) : ?>style="<?php echo $title_color; ?>"<?php endif; ?>>
                <?php } elseif ($attributes['title_tag'] == 'h5') { ?>
                    <h5 class="title" <?php if (!$attributes['title_url'] && $attributes['title_color']) : ?>style="<?php echo $title_color; ?>"<?php endif; ?>>
                <?php } elseif ($attributes['title_tag'] == 'h6') { ?>
                    <h6 class="title" <?php if (!$attributes['title_url'] && $attributes['title_color']) : ?>style="<?php echo $title_color; ?>"<?php endif; ?>>
                <?php } ?>
                    <?php if ($attributes['title_url']) : ?> 
                        <a href="<?php echo esc_url($attributes['title_url']); ?>" title="" <?php if ($attributes['title_color']) : ?>style="<?php echo $title_color; ?>"<?php endif; ?>>
                    <?php endif; ?>
                        <?php echo wpautop(esc_html($attributes['title'])); ?>
                    <?php if ($attributes['title_url']) : ?> 
                        </a>
                    <?php endif; ?>
                <?php if ($attributes['title_tag'] == 'h1') { ?>
                    </h1>
                <?php } elseif ($attributes['title_tag'] == 'h2') { ?>
                    </h2>
                <?php } elseif ($attributes['title_tag'] == 'h3') { ?>
                    </h3>
                <?php } elseif ($attributes['title_tag'] == 'h4') { ?>
                    </h4>
                <?php } elseif ($attributes['title_tag'] == 'h5') { ?>
                    </h5>
                <?php } elseif ($attributes['title_tag'] == 'h6') { ?>
                    </h6>
                <?php } ?>
            <?php endif; ?>

            <?php if ($attributes['description']) : ?>
                <div class="infor" <?php if ($attributes['description_color']) : ?>style="<?php echo $description_color; ?>"<?php endif; ?>>
                    <?php echo wpautop(esc_html($attributes['description'])); ?>
                </div>
            <?php endif; ?>  
        </div>
    <?php endif; ?>

<?php
        return ob_get_clean();
    }
endif;
?>