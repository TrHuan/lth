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

        if ($attributes['list_vertical'] == 'yes') {
            $list_vertical = 'list-vertical';
        }
?>
        <article class="lth-lists <?php echo $attributes['class']; ?>">
            <div class="module_lists">
                <div class="module_content <?php if ($attributes['list_tag'] == 'table_title' || $attributes['list_tag'] == 'table_content') {echo 'tables-box';} ?>">
                    <?php if ($attributes['list_tag'] != 'ol') { ?>
                        <ul class="lists-text  <?php echo $list_vertical; ?> <?php if ($attributes['list_tag'] != 'ul') {echo $attributes['list_tag'] . ' table-box';}?> items-<?php echo $attributes['list_columns']; ?>"
                        <?php if ($attributes['list_tag'] != 'ul' && $attributes['list_columns'] == '1') { ?>style="list-style: none; padding-left: 0;"<?php } ?>                        
                        <?php if ($attributes['list_tag'] != 'ul' && $attributes['list_columns'] != '1') { ?>style="list-style: none; padding-left: 0; display: flex;"<?php } ?>                   
                        <?php if ($attributes['list_tag'] == 'ul' && $attributes['list_columns'] != '1') { ?>style="display: flex;"<?php } ?>>
                    <?php } else { ?>
                        <ol class="lists-text <?php echo $list_vertical; ?>" <?php if ($attributes['list_columns'] != '1') { ?>style="display: flex;"<?php } ?>>
                    <?php } ?>
                        <?php foreach ($attributes['items'] as $inner) { ?>
                            <li <?php if ($attributes['list_columns'] != '1') {echo 'style="width: calc(100% / ' . $attributes['list_columns'] . ')"';}?>>
                               <?php if ($inner['item_url']) : ?>
                                    <a href="<?php echo esc_url($inner['item_url']); ?>" title="">
                                    <?php endif; ?>
                                    <?php echo $inner['item_text']; ?>
                                    <?php if ($inner['item_url']) : ?>
                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php } ?>
                    <?php if ($attributes['list_tag'] == 'ul') { ?>
                        </ul>
                    <?php } else { ?>
                        </ol>
                    <?php } ?>
                </div>
            </div>
        </article>
<?php
        return ob_get_clean();
    }
endif;
?>