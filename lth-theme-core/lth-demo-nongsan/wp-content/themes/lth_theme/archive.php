<?php
/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header();
$blogs = get_field('blogs','option');
$sidebar = $blogs['sidebar']; ?> ?>

<main class="main main-page main-blogs">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>
    
    <section class="lth-blogs">
        <div class="container">
            <div class="row">
                <?php if ($sidebar == 'left') { ?>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebars">
                            <!-- Sidebar -->
                            <aside class="lth-sidebars">
                                <?php $sidebar_2 = $blogs['sidebar_2'];
                                if ($sidebar_2) {
                                    $args = [
                                        'post_type' => 'html-blocks',
                                        'p' => $sidebar_2,
                                    ];
                                    $lth = new WP_Query($args);
                                    if ($lth->have_posts()) { ?>
                                            <?php while ($lth->have_posts()) {
                                                $lth-> the_post();
                                                //load file tương ứng với post format
                                               the_content();
                                            } 
                                    }
                                    // reset post data
                                    wp_reset_postdata();
                                } ?>
                            </aside>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($sidebar == 'no') { ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php } else { ?>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <?php } ?>
                    <div class="module module_posts posts-list">                        
                        <div class="module_title">
                            <h2 class="title">
                                <?php
                                    if (is_category()) {
                                        single_cat_title();  //Category
                                    } elseif (is_author()) {
                                        the_post();
                                        echo ('Archives by author: ' . get_the_author());  //Tác giả
                                        rewind_posts();
                                    } else {
                                        echo _('Archives');
                                    }
                                ?>
                            </h2>
                        </div>

                        <div class="module_content">
                            <?php
                                if (have_posts()) { ?>

                                    <div class="groups-box">

                                        <?php while (have_posts()) {
                                            the_post();
                                            get_template_part('template-parts/post/content', '');
                                        } ?>
                                        
                                    </div>

                                    <?php require_once(LIBS_DIR . '/pagination.php');
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
                            <aside class="lth-sidebars">
                                <?php $sidebar_2 = $blogs['sidebar_2'];
                                if ($sidebar_2) {
                                    $args = [
                                        'post_type' => 'html-blocks',
                                        'p' => $sidebar_2,
                                    ];
                                    $lth = new WP_Query($args);
                                    if ($lth->have_posts()) { ?>
                                            <?php while ($lth->have_posts()) {
                                                $lth-> the_post();
                                                //load file tương ứng với post format
                                               the_content();
                                            } 
                                    }
                                    // reset post data
                                    wp_reset_postdata();
                                } ?>
                            </aside>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
