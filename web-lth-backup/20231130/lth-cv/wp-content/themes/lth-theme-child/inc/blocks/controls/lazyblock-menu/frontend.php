<?php

/**
 * @block-slug  :   lth-menu
 * @block-output:   lth_menu_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-menu/frontend_callback', 'lth_menu_output_fe', 10, 2);

if (!function_exists('lth_menu_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_menu_output_fe($output, $attributes)
    {
        ob_start();

        if ($attributes['title_color']) :
            $title_color = 'color: '.$attributes['title_color'].';';
        endif;
        $description_color = 'color: '.$attributes['description_color'];
    
        if ($attributes['title_transform'] != 'normal') :
            $title_transform = 'text-transform: '.$attributes['title_transform'].';';
        endif;
        $title_font_weight = 'font-weight: '.$attributes['title_font_weight'].';';

        $nav_menu    = get_term_by('slug', $attributes['menu_name'], 'nav_menu');
?>
        <article class="lth-menu <?php echo $attributes['class'];
        if ($attributes['menu_toggle'] != 'toggle_none') {
            echo 'menu_toggle';
        } ?>">
            <?php if (!empty($attributes['title']) || !empty($attributes['description'])) : ?>
                <div class="module_header title-box title-align-<?php echo $attributes['title_align'];
                if ($attributes['menu_toggle'] == 'toggle_show') {
                    echo ' active';
                } ?>" style="margin-bottom: <?php echo $attributes['margin_bottom']; ?>px;">
                    <?php if (!empty($attributes['title'])) : ?>
                        <<?php echo $attributes['title_tag']; ?> class="title" style="font-size: <?php echo $attributes['title_size']; ?>px; <?php echo $title_color; echo $title_transform; echo $title_font_weight; ?>">
                            <?php if (!empty($attributes['title_url'])) : ?> 
                                <a href="<?php echo esc_url($attributes['title_url']); ?>" title="" <?php if ($attributes['title_color']) : ?>style="<?php echo $title_color; ?>"<?php endif; ?>>
                            <?php endif; ?>
                                <?php echo wpautop(esc_html($attributes['title'])); ?>
                            <?php if (!empty($attributes['title_url'])) : ?> 
                                </a>
                            <?php endif; ?>
                                
                            <?php if ($attributes['menu_toggle'] != 'toggle_none') { ?>
                                <i class="fal fa-angle-down icon"></i>
                            <?php } ?>
                        </<?php echo $attributes['title_tag']; ?>>
                    <?php endif; ?>

                    <?php if (!empty($attributes['description'])) : ?>
                        <div class="infor">
                            <?php echo wpautop(esc_html($attributes['description'])); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="module_content <?php if ($attributes['menu_toggle'] == 'toggle_show') {
                echo 'slow';
            } ?>" <?php 
            if ($attributes['menu_toggle'] == 'toggle_hidden') {
                echo 'style="display: none;"';
            }
            if ($attributes['menu_vertical'] == 'yes') {
                $menus_vertical = 'menus-vertical';
            } ?>>
                <div class="menus <?php echo $menus_vertical; ?>">
                    <?php if (!is_wp_error($nav_menu) && is_object($nav_menu) && !empty($nav_menu)) : ?>
                        <?php
                        wp_nav_menu(
                            array(
                                'menu'            => $nav_menu->slug,
                                'theme_location'  => $nav_menu->slug,
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'menu',
                            )
                        );
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </article>
<?php
        return ob_get_clean();
    }
endif;
?>