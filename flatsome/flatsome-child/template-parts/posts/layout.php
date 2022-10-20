
<?php
	do_action('flatsome_before_blog');
?>

<?php if (!is_single()) { ?>
	<header class="archive-page-header" style="display: none;">
		<div class="row">
			<div class="large-12 text-center col">
				<!-- <h1 class="page-title is-large uppercase" style="display: none;">
					<span>
						<?php 
							// if (get_post_type() == 'post') {
							// 	if (is_category()) {
							// 		single_cat_title();
							// 	}
							// }
						?>
					</span>
				</h1> -->

				<h2 class="page-title is-large uppercase">
					<span>
						<?php 
							if (get_post_type() == 'post') {
								if (is_category()) {
									single_cat_title();
								}
							}
						?>
					</span>
				</h2>
			</div>
		</div>
	</header>
<?php } else { ?>
	<!-- <header class="archive-page-header">
		<div class="row">
			<div class="large-12 text-center col">
				<h2 class="page-title is-large uppercase">
					<span>
						<?php //the_title(); ?>
					</span>
				</h2>
			</div>
		</div>
	</header> -->
<?php } ?>	

<?php if(!is_single() && get_theme_mod('blog_featured', '') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>
<div class="row align-center">
	<div class="large-10 col">
	<?php if(!is_single() && get_theme_mod('blog_featured', '') == 'content'){ get_template_part('template-parts/posts/featured-posts'); } ?>

	<?php
		if(is_single()){
			get_template_part( 'template-parts/posts/single');
			comments_template();
		} elseif(get_theme_mod('blog_style_archive', '') && (is_archive() || is_search())){
			get_template_part( 'template-parts/posts/archive', get_theme_mod('blog_style_archive', '') );
		} else{
			get_template_part( 'template-parts/posts/archive', get_theme_mod('blog_style', 'normal') );
		}
	?>
	</div>

</div>

<?php do_action('flatsome_after_blog');
