<div class="post-single-content">
    <?php if (has_post_thumbnail()) { ?>
        <div class="content-image">
            <div class="image">
                <img src="<?php echo lth_custom_img('full', 770, 420); ?>" width="770" height="420" alt="<?php the_title(); ?>">
            </div>
        </div>
    <?php } ?>

    <h1 class="title">
        <?php the_title(); ?>
    </h1>

    <p class="content-days">
        <?php the_time('d/m/Y'); ?>
    </p>

    <div class="content-excerpt">
        <?php wpautop(the_excerpt()); ?>
    </div>

    <div class="entry-content content">
        <?php the_content(); ?>
    </div>
</div>

<div class="socials">
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

<?php if (!empty(get_next_post()) || !empty(get_previous_post())) : ?>
    <div class="post-next-prev">
        <div class="groups-box">
            <?php if (get_previous_post()) : $previous_id = get_previous_post()->ID; ?>
                <div class="item">
                    <div class="post-prev-content post-next-prev-content">
                        <!-- <span><?php //echo __('Bài viết trước'); 
                                    ?></span> -->
                        <a href="<?php echo get_the_permalink($previous_id); ?>"><?php echo get_the_title($previous_id); ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (get_next_post()) : $next_id = get_next_post()->ID; ?>
                <div class="item">
                    <div class="post-next-content post-next-prev-content">
                        <!-- <span><?php //echo __('Bài viết tiếp'); 
                                    ?></span> -->
                        <a href="<?php echo get_the_permalink($next_id); ?>"><?php echo get_the_title($next_id); ?></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>