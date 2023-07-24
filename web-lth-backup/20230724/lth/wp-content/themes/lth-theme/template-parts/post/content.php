<div class="item">
    <div class="post-box">
        <div class="post-header">
            <?php if (has_post_thumbnail()) { ?>
                <div class="post-image">
                    <a href="<?php the_permalink(); ?>" title="" class="image">
                        <picture>
                            <source media="(min-width:1200px)" srcset="<?php echo lth_custom_img('full', 420, 280); ?>">
                            <source media="(min-width:768px)" srcset="<?php echo lth_custom_img('full', 330, 220); ?>">
                            <source media="(min-width:576px)" srcset="<?php echo lth_custom_img('full', 240, 160); ?>">
                            <img src="<?php echo lth_custom_img('full', 420, 280); ?>" width="420" height="280" alt="<?php the_title(); ?>">
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

                <div class="post-excerpt">
                    <?php wpautop(the_excerpt()); ?>
                </div>
                
                <div class="post-button">
                    <a href="<?php the_permalink(); ?>" class="btn" title="">
                        <?php echo __('Chi tiết'); ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="post-footer">
            <div class="post-button">
                <a href="<?php the_permalink(); ?>" class="btn" title="">
                    <?php echo __('Chi tiết'); ?>
                </a>
            </div>
        </div>
    </div>
</div>