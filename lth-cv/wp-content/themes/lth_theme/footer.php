<?php
/**
 * Footer
 * 
 * @author LTH
 * @since 2020
 */
?>

        <footer>
            <div class="container">
                <?php 
                    $ID = get_field('footer', 'option');

                    if ($ID) {
                        $args = array(
                            'post_type' => 'html-blocks',
                            'p' => $ID, 
                        );
                        $loop = new WP_Query($args);
                        while ( $loop->have_posts() ) :
                            $loop->the_post();
                            global $post;
                            the_content();
                        endwhile;
                    }
                ?>
            </div>
        </footer>

        <?php wp_footer(); ?>

        <!-- button show popup lấy theo id của popup -->
         <?php if( have_rows('popup', 'option') ): ?>
            <?php while( have_rows('popup', 'option') ) : the_row();
                if (get_sub_field('id')) { ?>
                    <div class="popups popup-<?php echo get_sub_field('id'); ?>">
                        <div class="popups-box">                    
                            <div class="popup-box">
                                <div class="content-box">
                                    <div class="module_header title-box">
                                        <h2 class="title">
                                            <?php echo get_sub_field('title'); ?>
                                        </h2>
                                    </div>  

                                    <div class="popup-content">
                                        <?php echo do_shortcode(get_sub_field('content')); ?>
                                    </div>
                                </div>
                            </div>             
                        </div>
                    </div>
                <?php }
            endwhile; ?>   
        <?php endif; ?>

        <?php $other = get_field('other', 'option');
        echo $other['code_footer']; ?>
        
    </body>
</html>
