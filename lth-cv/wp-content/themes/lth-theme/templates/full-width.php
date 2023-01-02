<?php

/**
 * Template Name: Full Width
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main main-full-width">
    <?php if (!is_home() && !is_front_page()) {
        require_once(LIBS_DIR . '/breadcrumbs.php');
    } ?>

    <div class="page-content">
        <?php the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>