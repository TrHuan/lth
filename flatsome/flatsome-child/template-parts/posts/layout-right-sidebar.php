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

<?php if(!is_single() && flatsome_option('blog_featured') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>

<div class="row row-large <?php if(flatsome_option('blog_layout_divider')) echo 'row-divided ';?>">

	<div class="large-9 col">
	<?php if(!is_single() && flatsome_option('blog_featured') == 'content'){ get_template_part('template-parts/posts/featured-posts'); } ?>
	<?php
		if(is_single()){
			get_template_part( 'template-parts/posts/single');
			comments_template();
		} elseif(flatsome_option('blog_style_archive') && (is_archive() || is_search())){
			get_template_part( 'template-parts/posts/archive', flatsome_option('blog_style_archive') );
		} else {
			get_template_part( 'template-parts/posts/archive', flatsome_option('blog_style') );
		}
	?>
	</div>
	<div class="post-sidebar large-3 col">
		<?php flatsome_sticky_column_open( 'blog_sticky_sidebar' ); ?>
		<?php get_sidebar(); ?>
		<?php flatsome_sticky_column_close( 'blog_sticky_sidebar' ); ?>
	</div>
</div>

<?php
	do_action('flatsome_after_blog');
?>
