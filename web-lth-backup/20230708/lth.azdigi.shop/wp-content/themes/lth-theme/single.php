<?php
/**
 * The template for displaying all single posts
 * 
 * @author LTH (trhuan177@gmail.com)
 * @since 2020
 */
get_header();

setPostViews(get_the_ID());

$blog = get_field('blog_single','option');
$sidebar = $blog['sidebar']; ?>

<main class="main main-page main-single">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
    
    <section class="lth-blog-single">
         <div class="container">
            <div class="row">
                <?php if ($sidebar == 'left') { ?>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebars">
                            <!-- Sidebar -->
							<?php if (is_active_sidebar('sidebar_single_blog')) { ?>
                                <aside class="lth-sidebars">
                                    <?php dynamic_sidebar('sidebar_single_blog'); ?>
                                </aside>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($sidebar == 'no') { ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php } else { ?>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <?php } ?>
                    <div class="module module_single post-single"> 
                        <div class="module_content">
                            <?php
                                if (have_posts()) {
                                    while (have_posts()) {
                                        the_post();
                                        get_template_part('template-parts/post/content', 'single');
                                    }
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <?php if ($sidebar == 'right') { ?>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebars">
                            <!-- Sidebar -->
                            <?php if (is_active_sidebar('sidebar_single_blog')) { ?>
                                <aside class="lth-sidebars">
                                    <?php dynamic_sidebar('sidebar_single_blog'); ?>
                                </aside>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 
