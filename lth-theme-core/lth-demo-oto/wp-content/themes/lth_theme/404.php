<?php
/**
 * The template for displaying search results pages
 * 
 * @author LTH
 * @since 2020
 */?>

<!DOCTYPE html>
<html lang="VI">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="Php, HTML, CSS, JavaScript">
        <meta name="author" content="LTH">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/gif">

        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

        <?php wp_head(); ?> <!-- hook của wordpress gọi đến file inc/head.php -->

        <?php require_once(LIBS_DIR . '/css.php'); ?>

        <style type="text/css">
            html, html * {
                height: 100%;
            }

            .lth-404 .content-box * {
                height: auto;
            }
        </style>
    </head>
    
    <body <?php body_class(); ?> style="background-color: #fff;">
        <main class="main-site main-page main-404">
            <div class="main-container">
                <div class="main-content">
                    <article class="lth-404">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="404-box">
                                        <div class="content-box" style="align-items: center; display: flex; justify-content: center; height: 100%; color: #000;">
                                            <div class="code" style="border-right: 2px solid; font-size: 26px; padding: 0 15px; text-align: center;">404</div>
                                            <div class="message" style="padding: 10px 20px; font-size: 18px; text-align: left;">Không tìm thấy trang này.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </main>
    </body>
</html>