<?php
/**
 * kiểm tra page hiện tại có các page con không?
 * 
 * @author LTH
 * @since 2020
 */
function page_is_has_children() {
    global $post;

    if (empty($post)) return false;

    // lấy danh sách các page con
    $pages = get_pages('child_of=' . $post->ID);

    return count($pages);
}

/**
 * lấy ID của top parent
 * 
 * @author LTH
 * @since 2020
 */
function gpage_top_parent() {
    global $post;

    if (empty($post)) return false;

    if ($post->post_parent) {
        // lấy ID của page cha
        $ancestors = get_post_ancestors($post->ID);

        return $ancestors[0];
    }

    return $post->ID;
}
