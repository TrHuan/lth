<?php
/**
 * Template Name: Trang Chủ
 * 
 * @author LTH
 * @since 2020
 */
?>
<?php get_header(); ?>

<main class="main main-home">
    <h1 class="title d-none"><?php the_title(); ?></h1>

    <?php the_content(); ?>
</main>

<?php get_footer(); ?>
