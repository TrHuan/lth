<?php
/**
 * The blog template file.
 *
 * @package flatsome
 */

get_header();

?>

<div id="content" class="blog-wrapper blog-archive page-wrapper">
	<?php if(!empty($search)) { ?>
		<?php get_template_part( 'template-parts/posts/layout', get_theme_mod('blog_layout','right-sidebar') ); ?>
	<?php } else { ?>
		<div class="row" style="padding: 20px 15px;">
			<?php echo 'Tìm kiếm chưa được nhập!'; ?>
		</div>
	<?php } ?>
</div>


<?php get_footer(); ?>