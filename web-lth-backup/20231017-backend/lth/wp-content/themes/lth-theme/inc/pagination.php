
<div class="paginations">
    <?php
        the_posts_pagination (array(
            'prev_text' => '<span class="screen-read-text">' . __('Previous') . '</span>',
            'before_page_number' => '<span class="meta-nav screen-read-text">' . __('Page') . '</span>',
            'next_text' => '<span class="screen-read-text">' . __('Next') . '</span>',
        ));
    ?>
</div>