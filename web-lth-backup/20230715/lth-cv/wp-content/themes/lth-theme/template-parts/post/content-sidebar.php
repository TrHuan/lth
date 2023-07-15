
<div class="item">
    <div class="content">
        <div class="content-header">
            <?php if (has_post_thumbnail()) { ?>
                <div class="content-image">      
                    <a href="<?php the_permalink(); ?>" title="" class="image">
                        <img src="<?php echo lth_custom_img('full', 100, 70);?>" width="100" height="70" alt="<?php the_title(); ?>">
                    </a>
                </div>
            <?php } ?>

            <div class="content-box">
                <h3 class="content-name">
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
            </div>
        </div>
    </div>
</div>