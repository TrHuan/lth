

<div class="post-content">	
	<?php if (has_post_thumbnail()) { ?>
        <div class="content-image">
            <div class="image">
                <img src="<?php echo lth_custom_img('full', 770, 420);?>" width="770" height="420" alt="<?php the_title(); ?>">
            </div>
        </div>
    <?php } ?>

    <p class="content-days">
        <?php the_time('d/m/Y'); ?>
    </p>

	<h1 class="title">
		<?php the_title(); ?>
	</h1>

	<div class="content-excerpt">
        <?php wpautop(the_excerpt()); ?>
    </div>

    <div class="entry-content content">
    	<?php the_content(); ?>
    </div>
</div>

<div class="socials">
    <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>">
        <i class="fa fa-facebook" aria-hidden="true"></i>
    </a>
    <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
        <i class="fa fa-google-plus" aria-hidden="true"></i>
    </a>
    <a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>">
        <i class="fa fa-twitter" aria-hidden="true"></i>
    </a>
    <a rel="nofollow" class="in" data-ok="false" href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>" target="_blank">
        <i class="fa fa-linkedin" aria-hidden="true"></i>
    </a>
    <a rel="nofollow" class="pi" data-ok="false" href="https://pinterest.com/pin/create/bookmarklet/?url=<?php the_permalink(); ?>" target="_blank">
        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
    </a>
</div>