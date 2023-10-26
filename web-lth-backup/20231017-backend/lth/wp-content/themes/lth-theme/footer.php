<?php

/**
 * Footer
 * 
 * @author LTH
 * @since 2020
 */
?>

<footer>
    <!-- <div class="container"> -->
    <?php
    $ID = get_field('footer', 'option');

    if ($ID) {
        $args = array(
            'post_type' => 'html-blocks',
            'p' => $ID,
        );
        $loop = new WP_Query($args);
        while ($loop->have_posts()) :
            $loop->the_post();
            global $post;
            the_content();
        endwhile;
    }
    ?>
    <!-- </div> -->
</footer>

<?php wp_footer(); ?>

</body>

</html>