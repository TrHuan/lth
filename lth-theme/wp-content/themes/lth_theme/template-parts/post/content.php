<div class="item">
    <div class="post-box">
        <div class="post-header">
            <?php if (has_post_thumbnail()) { ?>
                <div class="post-image">
                    <a href="<?php the_permalink(); ?>" title="" class="image">
                        <img src="<?php echo lth_custom_img('full', 333, 230); ?>" width="333" height="230" alt="<?php the_title(); ?>">
                    </a>
                </div>
            <?php } ?>

            <div class="post-content">
                <h3 class="post-name">
                    <a href="<?php the_permalink(); ?>" title="">
                        <?php the_title(); ?>
                    </a>
                </h3>

                <p class="content-days">
                    <?php the_time('d/m/Y'); ?>
                </p>

                <div class="post-excerpt">
                    <?php wpautop(the_excerpt()); ?>
                </div>
            </div>
        </div>
        <div class="post-footer post-button">
            <a href="<?php the_permalink(); ?>" class="btn" title="">
                <?php echo __('Xem thêm'); ?>
            </a>
        </div>
    </div>
</div>