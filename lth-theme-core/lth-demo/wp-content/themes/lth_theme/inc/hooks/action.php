<?php
/**
 * action hook: hiển thị danh sách submenu page children
 * 
 * @author LTH
 * @since 2020
 */
function show_submenu_page_children() {
    global $post;

    if (empty($post)) return false;

    if (page_is_has_children() || $post->post_parent > 0) {
        echo '<nav class="nav sub-nav">';
            echo '<ul>';
                echo '<li class="parent-link">';
                    echo '<a href="'.get_the_permalink(gpage_top_parent()).'">'.get_the_title(gpage_top_parent()).'</a>';
                echo '</li>';
    // lấy danh sách page children
                $args = array (
                    'child_of' => gpage_top_parent(),
                    'title_li' => ''
                );
                wp_list_pages($args);
            echo '</ul>';
        echo '</nav>';
    }
}
add_action('submenu_page_children', 'show_submenu_page_children');
