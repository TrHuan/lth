<?php
/**
 * The template for displaying author page
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main-site main-page main-author">
    <div class="main-container">
        <div class="main-content">

            <section class="lth-posts lth-author">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <?php
                                $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                                ?>
                            <div class="author-box">
                                <?php if (get_field( 'image', 'user_' . $curauth->ID )) { ?>
                                    <div class="author-image">
                                        <div class="image image-author">
                                            <img src="<?php echo get_field( 'image', 'user_' . $curauth->ID ); ?>" alt="<?php echo $curauth->nickname; ?>" />
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="author-content">
                                    <h2 class="name-author">Tác giả: <?php echo $curauth->nickname; ?></h2>
                                    <div class="desc-author">
                                        <?php echo $curauth->user_description; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="module_posts posts-list module_blogs posts_author">                                
                                <?php
                                if (have_posts()) { ?>
                                    <div class="groups-box">
                                        <?php while (have_posts()) {
                                            the_post(); ?>
                                                <?php
                                                    //load file tương ứng với post format
                                                    get_template_part('template-parts/post/content', '');
                                                ?>
                                        <?php } ?>
                                    </div>

                                    <?php require_once(LIBS_DIR . '/pagination.php');                                    
                                } else {
                                    get_template_part('template-parts/content', 'none');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</main>

<?php get_footer(); ?>
