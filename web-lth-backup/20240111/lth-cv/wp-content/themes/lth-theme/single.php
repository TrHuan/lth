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
$sidebar = $blog['sidebar'];
$banner = $blog['banner']; ?>

<main class="main main-page main-single">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
    
    <section class="lth-blog-single sidebar-<?php echo $sidebar; ?>">
        <?php if (is_plugin_active( 'easy-table-of-contents/easy-table-of-contents.php' )) { ?> 
            <div class="muc-luc-box-block">
                <aside class="lth-muc-luc-box">
                    <div class="sb-close">
                        <i class="fal fa-times"></i>
                    </div>

                    <div class="sb-menu">
                        <i class="fal fa-bars icon"></i>
                    </div>
                    
                    <article class="sidebar-box muc-luc-box">			
                        <?php echo do_shortcode('[ez-toc]') ?>
                    </article>
                </aside>
            </div>
        <?php } ?>

         <div class="container">
            <div class="row">
                <?php if ($sidebar == 'left') { ?>
                    <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
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
                    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                <?php } ?>
                    <div class="module module_single post-single 
                    <?php if ($sidebar == 'left') { ?>module_single_right<?php } ?>
                    <?php if ($sidebar == 'right') { ?>module_single_left<?php } ?>"> 
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
                    <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
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

    <?php 
    $blog = get_field('blog_single','option');
    $banner = $blog['banner'];
    if ($banner) {
        $args = array(
            'post_type' => 'html-blocks',
            'p' => $banner,
        );
        $loop = new WP_Query($args);
        while ($loop->have_posts()) :
            $loop->the_post();
            global $post;
            the_content();
        endwhile;
        // reset post data
        wp_reset_postdata();
    } ?>

    <section class="lth-blog-comments">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <?php comments_template(); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 
