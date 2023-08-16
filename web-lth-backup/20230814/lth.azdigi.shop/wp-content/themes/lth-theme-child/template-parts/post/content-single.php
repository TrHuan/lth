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
            } ?>
        </li>

        <li class="post-poster">
            <i class="far fa-user icon"></i>
            <span><?php the_author(	); ?></span>
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

<?php $id = get_queried_object_id();

if (class_exists('WPSEO_Primary_Term')) {
    $wpseo_primary_term = new WPSEO_Primary_Term('category', $id);
    $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
    $term = get_term($wpseo_primary_term);
    $term_id = $term->term_id;
}

if (!$term_id) {
    $term_id = $post->category_ids;
}

if (!empty(get_next_post()) || !empty(get_previous_post())) : ?>
    <div class="post-next-prev">
        <div class="groups-box">
            <?php if (get_previous_post()) : $previous_id = get_previous_post()->ID; ?>
                <div class="item">
                    <div class="previous-post">
                        <?php previous_post_link( '%link', '%title',  __( 'Previous in category', 'textdomain' ), true ); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (get_next_post()) : $next_id = get_next_post()->ID; ?>
                <div class="item">
                    <div class="next-post">
                        <?php next_post_link( '%link', '%title',  __( 'Next post in category', 'textdomain' ), true ); ?> 
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php comments_template(); ?>