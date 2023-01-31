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
    <meta name="description" content="<?php echo get_option('blogname'); ?> - <?php echo get_option('blogdescription'); ?>">
    <meta name="keywords" content="Php, HTML, CSS, JavaScript">
    <meta name="author" content="LTH">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex" />
    <meta name="AdsBot-Google" content="noindex" />
    <meta name="Googlebot" content="noindex">  

    <!-- hook của wordpress gọi đến file inc/head.php -->
    <?php wp_head(); ?>
</head>

<?php
$ptp = get_post_type();

if ($ptp == 'product' && !is_search() || is_tax()) {
    $dat_url = get_permalink(woocommerce_get_page_id('shop'));
}
?>

<body <?php body_class(); ?> <?php if (isset($dat_url)) { ?>data_url="<?php echo $dat_url; ?>" <?php } ?>>

    <header class="header">
        <div class="header-stick">
            <!-- <div class="container"> -->
            <?php $header_option = get_field('header', 'option');
            if ($header_option) {
                $args = [
                    'post_type' => 'html-blocks',
                    'p' => $header_option,
                ];
                $lth = new WP_Query($args);
                if ($lth->have_posts()) { ?>
            <?php while ($lth->have_posts()) {
                        $lth->the_post();
                        //load file tương ứng với post format
                        the_content();
                    }
                }
                // reset post data
                wp_reset_postdata();
            } ?>
            <!-- </div> -->
        </div>
    </header>