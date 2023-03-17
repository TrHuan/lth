<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<?php
    $args = new WP_Query(array(
        'post_type'=>'post',
        'post_status'=>'publish',
        'posts_per_page'=> 6,
    ));
?>

<?php if ($settings['style_items'] == 1) { ?>
    <div class="blog-area pt-90">
        <div class="container">
            <div class="main-blog-area">
                <!-- Section Title Start -->
                <div class="section-title text-center">
                    <h2><?php echo $settings['heading_text']; ?></h2>
                    <p><?php echo $settings['description_text']; ?></p>
                </div>
                <!-- Section Title End -->
                <!-- Blog Activation Start -->
                <div class="blog-activation owl-carousel">
                    <?php while ($args->have_posts()) : $args->the_post();
                        get_template_part('template-parts/post/content', '');
                    endwhile ; wp_reset_query() ; ?>
                </div>
                <!-- Blog Activation End -->
            </div>
        </div>
        <!-- Container End -->
    </div>
<?php } elseif ($settings['style_items'] == 2) { ?>
    <div class="sidebar-blog">
        <div class="mini-title">
            <h4><?php echo $settings['heading_text']; ?></h4>
        </div>
        <div class="single-deal-active owl-carousel">
            <!-- Single Blog Start -->
            <?php while ($args->have_posts()) : $args->the_post();
                get_template_part('template-parts/post/content', '');
            endwhile ; wp_reset_query() ; ?>
            <!-- Single Blog End -->
        </div>
    </div>
<?php } ?>