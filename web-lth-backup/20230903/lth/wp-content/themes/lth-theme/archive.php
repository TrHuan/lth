<?php

/**
 * The template for displaying archive pages
 * 
 * @author LTH
 * @since 2020
 */
get_header();
$blogs = get_field('blogs', 'option');
$sidebar = $blogs['sidebar'];
$banner = $blogs['banner'];
$cat_id = get_queried_object_id(); // ID của chuyên mục ?>

<main class="main main-page main-blogs">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <?php $category_description = category_description($cat_id);
    // Kiểm tra và hiển thị mô tả ngắn
    if (!empty($category_description)) { ?>
        <section class="lth-cat-description">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="module module_cat_description">
                            <?php echo $category_description; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php // Lấy danh sách các chuyên mục con của chuyên mục cha
    $child_categories = get_categories(array(
        'parent' => $cat_id,
    ));
    if ($child_categories) { ?>
    <section class="lth-blogs-cats">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="module module_cats_list">
                        <ul>
                            <?php // Hiển thị tên và liên kết của các chuyên mục con
                            foreach ($child_categories as $category) {
                                echo '<li>';
                                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . $category->name . '</a>';
                                echo '</li>';
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>


    <section class="lth-blogs">
        <div class="container">
            <div class="row">
                <?php if ($sidebar == 'left') { ?>
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebars">
                            <!-- Sidebar -->
                            <?php if (is_active_sidebar('sidebar_blogs')) { ?>
                                <aside class="lth-sidebars">
                                    <?php dynamic_sidebar('sidebar_blogs'); ?>
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
                        <div class="module module_posts posts-list module_blogs">
                            <!-- <div class="module_title">
                                <h2 class="title">
                                    <?php
                                    // if (is_category()) {
                                    //     single_cat_title();  //Category
                                    // } elseif (is_author()) {
                                    //     the_post();
                                    //     echo ('Archives by author: ' . get_the_author());  //Tác giả
                                    //     rewind_posts();
                                    // } else {
                                    //     echo _('Archives');
                                    // }
                                    ?>
                                </h2>
                            </div> -->

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
                                    <?php if (is_active_sidebar('sidebar_blogs')) { ?>
                                        <aside class="lth-sidebars">
                                            <?php dynamic_sidebar('sidebar_blogs'); ?>
                                        </aside>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
            </div>
    </section>

    <?php if ($banner) {
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
</main>

<?php get_footer(); ?>