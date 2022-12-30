<?php

/**
 * Page Default
 * 
 * @author LTH
 * @since 2020
 */
get_header(); ?>

<main class="main main-page">
    <?php if (!is_home() && !is_front_page()) {
        require_once(LIBS_DIR . '/breadcrumbs.php');
    } ?>

    <!-- <div class="module_header title-box title-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h1 class="title">
                        <?php //the_title(); 
                        ?>
                    </h1>
                </div>
            </div>
        </div>            
    </div> -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>