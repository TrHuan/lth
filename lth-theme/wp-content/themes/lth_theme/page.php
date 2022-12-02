<?php

/**
 * Page Default
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page">
    <?php require_once(LIBS_DIR . '/breadcrumbs.php'); ?>

    <!-- <div class="module_header title-box title-page">
        <div class="container">
            <h1 class="title">
                <?php //the_title(); 
                ?>
            </h1>
        </div>            
    </div> -->

    <?php the_content(); ?>
</main>

<?php get_footer(); ?>