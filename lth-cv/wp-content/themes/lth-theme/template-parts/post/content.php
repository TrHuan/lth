<div class="item">
    <div class="post-box">
        <?php if (has_post_thumbnail()) { ?>
            <div class="post-image">
                <a href="<?php the_permalink(); ?>" title="" class="image">
                    <picture>
						<source media="(min-width:1200px)" srcset="<?php echo lth_custom_img('full', 370, 370); ?>">
						<source media="(min-width:768px)" srcset="<?php echo lth_custom_img('full', 330, 330); ?>">
						<source media="(min-width:576px)" srcset="<?php echo lth_custom_img('full', 240, 240); ?>">
						<img src="<?php echo lth_custom_img('full', 420, 420); ?>" width="420" height="420" alt="<?php the_title(); ?>">
					</picture>
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

            <div class="post-button">
                <a href="<?php the_permalink(); ?>" class="btn" title="">
                    <?php echo __('Xem thêm'); ?>
                </a>
            </div>
        </div>
    </div>
</div>