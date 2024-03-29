<?php
/**
 * Header
 * @author LTH
 * @since 2020
 */
?>
<!DOCTYPE html>
    <html lang="en-US">
        <head>
            <meta charset="UTF-8">
            <meta name="description" content="<?php bloginfo('description'); ?>">
            <meta name="keywords" content="Php, HTML, CSS, JavaScript">
            <meta name="author" content="LTH">
            <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" /> -->
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="robots" content="noindex"/>
            <meta name="AdsBot-Google" content="noindex"/>
            <meta name="Googlebot" content="noindex">

            <link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/gif">

            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

            <?php if (is_tax()) { ?>
                <link rel = "canonical" href = "<?php echo get_term_link( $term, $taxonomy ); ?>" />
            <?php } elseif (is_category()) { ?>
                <link rel = "canonical" href = "<?php echo get_category_link(get_the_category()[0]->term_id); ?>" />
            <?php } else { ?>
                <?php if (get_post_type() == 'product' && !is_single()) { 
                    $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
                ?>
                    <link rel = "canonical" href = "<?php echo $shop_page_url; ?>" />
                <?php } else { ?>
                    <link rel = "canonical" href = "<?php the_permalink(); ?>" />
                <?php } ?>
            <?php } ?>

            <?php $other = get_field('other', 'option');
            echo $other['code_header']; ?>
            
            <?php wp_head(); ?> <!-- hook của wordpress gọi đến file inc/head.php -->

            <?php require_once(LIBS_DIR . '/css.php'); ?>
        </head>

        <?php
            $ptp = get_post_type();

            if ($ptp == 'post') {
                $archive_page = get_pages(
                    array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'templates/blogs.php'
                    )
                );
                $archive_id = $archive_page[0]->ID;

                $dat_url = get_permalink( $archive_id );
            }

            if ($ptp == 'service') {
                $archive_page = get_pages(
                    array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'templates/services.php'
                    )
                );
                $archive_id = $archive_page[0]->ID;

                $dat_url = get_permalink( $archive_id );
            }

            if ($ptp == 'project') {
                $archive_page = get_pages(
                    array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'templates/projects.php'
                    )
                );
                $archive_id = $archive_page[0]->ID;

                $dat_url = get_permalink( $archive_id );
            }

            if ($ptp == 'product' && !is_search() || is_tax()) {
                $dat_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
            }
        ?>

        <body <?php body_class(); ?> data_url="<?php echo $dat_url; ?>">
            
            <header class="header">
                <div class="header-stick">
                    <div class="container">
                        <?php $header_option = get_field('header', 'option');
                        if ($header_option) {
                            $args = [
                                'post_type' => 'html-blocks',
                                'p' => $header_option,
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
                    </div>
                </div>
            </header>