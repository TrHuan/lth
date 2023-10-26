<?php

/**
 * @block-slug  :   lth-socials
 * @block-output:   lth_socials_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-socials/frontend_callback', 'lth_socials_output_fe', 10, 2);

if (!function_exists('lth_socials_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_socials_output_fe($output, $attributes) {
        ob_start();
        

?>
<div class="lth-socials"> 
    <div class="module__content socials-box">
        <ul>
            <?php if( have_rows('socials', 'option') ): ?> 
              <?php while( have_rows('socials', 'option') ): the_row(); ?>
                  <?php
                      $title = get_sub_field('title', 'option');
                      $url = get_sub_field('url', 'option');
                      $icon_image = get_sub_field('icon_image', 'option');
                      $icon_class = get_sub_field('icon_class', 'option');
                  ?>

                  <li class="">
                      <a href="<?php if ($url) {echo $url;} else { echo '#';} ?>" title="" target="_blank" rel="noopener">
                          <?php if ($icon_image || $icon_class) { ?>
                              <span class="icon">
                                  <?php if ($icon_image) { ?>
                                      <img src="<?php echo $icon_image; ?>" alt="Social"  width="40" height="40">
                                  <?php } else { ?>
                                      <i class="<?php echo $icon_class; ?>"></i>
                                  <?php } ?>
                              </span>
                          <?php } ?>

                          <?php if ($title) { ?>
                              <span class="icon-title"><?php echo $title; ?></span>
                          <?php } ?>
                      </a>
                  </li>
              <?php endwhile; ?>
          <?php endif; ?>
        </ul>
    </div>
</div>
<?php
        return ob_get_clean();
    }
endif;
?>