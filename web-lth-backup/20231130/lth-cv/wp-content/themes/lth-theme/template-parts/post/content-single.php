<div class="post-single-content">
    <?php if (has_post_thumbnail()) { ?>
        <div class="content-image">
            <div class="image">
                <?php $src = get_the_post_thumbnail_url($post->ID, 'full');
                // $src = lth_custom_img('full', 1200, 600); ?>
                <img src="<?php echo  $src; ?>" width="1200" height="600" alt="<?php the_title(); ?>">
            </div>
        </div>
    <?php } ?>

    <h1 class="title">
        <?php the_title(); ?>
    </h1>

    <ul class="post-meta">
        <li class="post-days">
            <i class="fal fa-calendar-alt icon"></i>
            <span><?php the_time('d'); ?> <?php echo __('Thg '); the_time('m,'); ?> <?php the_time('Y'); ?></span>
        </li>

        <li class="post-cat">
            <?php echo __('Chuyên mục: ') ?>
            <?php if ( class_exists( 'WPSEO_Primary_Term' ) ) {
                $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
                $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
                $term = get_term( $wpseo_primary_term );
                $link = get_term_link( $term->term_id, 'category' );

                if ($wpseo_primary_term) {
                    echo '<a href="'. $link .'" title="">';
                        echo $term->name;
                    echo '</a>';
                }
            } else {
                $cat = false;
                $primary_cat_id = get_post_meta( get_the_ID(), 'rank_math_primary_category', true );
                if ( $primary_cat_id ) {
                    $cat = get_term( $primary_cat_id, 'category' );
                    $cat_link = get_term_link( $cat, 'category' );
                } else {
                    $categories = get_the_category(get_the_ID());

                    if ($categories) {
                        // Loop qua từng chuyên mục và hiển thị tên của chúng.
                        foreach ($categories as $category) {
                            $category_name = $category->name; // Lấy tên chuyên mục
                            $category_url = get_category_link($category->cat_ID); // Lấy URL chuyên mục

                            echo '<a href="' . esc_url($category_url) . '" title="">' . esc_html($category_name) . '</a>';
                        }
                    }
                }
                if ( ! is_wp_error( $cat ) ) {
                    echo '<a href="'. $cat_link .'" title="">';
                        echo $cat->name;
                    echo '</a>';
                }
            } ?>
        </li>

        <li class="post-poster">
            <i class="far fa-user icon"></i>
            <?php $author_id  = get_post_field( 'post_author', get_the_ID() ); ?>
            <a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>"><?php the_author(); ?></a>
        </li>

        <li class="post-eye">
            <i class="fal fa-eye icon" aria-hidden="true"> </i>
            <?php echo getPostViews(get_the_ID()); ?>
        </li>
    </ul>

    <div class="content-excerpt">
        <?php wpautop(the_excerpt()); ?>
    </div>

    <div class="entry-content content">
        <?php the_content(); ?>
    </div>
</div>

<div class="shares-box">
    <label><strong><?php echo __('Chia sẻ: '); ?></strong></label>
    
    <ul class="groups-box">
        <li class="item">
            <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>">
                <i class="fab fa-facebook" aria-hidden="true"></i>
            </a>
        </li>
        <li class="item">
            <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
                <i class="fab fa-google-plus" aria-hidden="true"></i>
            </a>
        </li>
        <li class="item">
            <a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>">
                <i class="fab fa-twitter" aria-hidden="true"></i>
            </a>
        </li>
        <li class="item">
            <a rel="nofollow" class="in" data-ok="false" href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>" target="_blank">
                <i class="fab fa-linkedin" aria-hidden="true"></i>
            </a>
        </li>
        <li class="item">
            <a rel="nofollow" class="pi" data-ok="false" href="https://pinterest.com/pin/create/bookmarklet/?url=<?php the_permalink(); ?>" target="_blank">
                <i class="fab fa-pinterest-p" aria-hidden="true"></i>
            </a>
        </li>
    </ul>
</div>  

<?php 
$blog = get_field('blog_single','option');
$post_next_prev = $blog['post_next_prev'];

if ($post_next_prev == '02') {
    if ( class_exists( 'WPSEO_Primary_Term' ) ) {
        $primary_category = wpseo_get_primary_term(get_the_ID(), 'category'); 
    } else {
        $primary_category = get_post_meta(get_the_ID(), 'rank_math_primary_category', true);
    }
    if ($primary_category) {
        $args = array(
            'category' => $primary_category,
            'orderby' => 'date',
            'order' => 'ASC',
            'post_type' => 'post',
            'posts_per_page' => -1,
        );

        $posts_in_category = get_posts($args);    
        
        if (count($posts_in_category) > 1) {
            $current_post_position = array_search(get_the_ID(), wp_list_pluck($posts_in_category, 'ID')); ?>
            <div class="post-next-prev">
                <div class="groups-box">
                    <div class="item">
                        <?php // Kiểm tra xem bài viết hiện tại có phải là bài đầu tiên trong danh sách.
                        if ($current_post_position === false || $current_post_position === 0) {
                            // Bài viết hiện tại là bài đầu tiên hoặc không tìm thấy.
                            // Ẩn nút "Previous".
                        } else {
                            // Bài viết hiện tại không phải là bài đầu tiên.
                            // Hiển thị nút "Previous".
                            $previous_post = $posts_in_category[$current_post_position - 1]; ?>
                            <div class="previous-post">
                                <a href="<?php echo get_permalink($previous_post->ID); ?>">
                                    <?php echo $previous_post->post_title; ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="item">
                        <?php // Kiểm tra xem bài viết hiện tại có phải là bài cuối cùng trong danh sách.
                        if ($current_post_position === false || $current_post_position === count($posts_in_category) - 1) {
                            // Bài viết hiện tại là bài cuối cùng hoặc không tìm thấy.
                            // Ẩn nút "Next".
                        } else {
                            // Bài viết hiện tại không phải là bài cuối cùng.
                            // Hiển thị nút "Next".
                            $next_post = $posts_in_category[$current_post_position + 1]; ?>
                            <div class="next-post">
                                <a href="<?php echo get_permalink($next_post->ID); ?>">
                                    <?php echo $next_post->post_title; ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>    
        <?php }
    }
} elseif ($post_next_prev == '01') {
    if (!empty(get_next_post()) || !empty(get_previous_post())) { ?>
        <div class="post-next-prev">
            <div class="groups-box">
                <?php //if (get_previous_post()) : $previous_id = get_previous_post()->ID; ?>
                    <div class="item">
                        <div class="previous-post">
                            <?php previous_post_link( '%link', '%title',  __( 'Previous in category', 'textdomain' ), true ); ?>
                        </div>
                    </div>
                <?php //endif; ?>

                <?php //if (get_next_post()) : $next_id = get_next_post()->ID; ?>
                    <div class="item">
                        <div class="next-post">
                            <?php next_post_link( '%link', '%title',  __( 'Next post in category', 'textdomain' ), true ); ?> 
                        </div>
                    </div>
                <?php //endif; ?>
            </div>
        </div>
    <?php }
} ?>