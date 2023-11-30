<?php

/**
 * @block-slug  :   lth-tab
 * @block-output:   lth_tab_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-tab/frontend_callback', 'lth_tab_output_fe', 10, 2);

if (!function_exists('lth_tab_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_tab_output_fe($output, $attributes) {
        ob_start();
?>

<article class="lth-tabs">
    <div class="row">
        <div class="col-lg-3">
                <?php if (isset($attributes['title'])) : ?>
                <h2 class="title"><?php echo esc_html($attributes['title']); ?></h2>
            <?php endif; ?>
            
                
            <ul class="prds-effects__nav nav" id="myTab" role="tablist">
                <?php $i; foreach( $attributes['tab'] as $inner ): $i++; ?>
                <li>
                    <a class=" <?php if ($i == 1) { ?>active<?php } ?>" title="" id="we-haves-<?php echo $i; ?>-tab" data-toggle="tab" href="#we-haves-<?php echo $i; ?>" role="tab" aria-controls="#we-haves-<?php echo $i; ?>" aria-selected="true">
                        <?php echo $inner['tab_title']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-lg-9">
            <div class="tab-content">
                <?php $j; foreach( $attributes['tab'] as $inner ): $j++; ?>
                <div class="tab-pane fade <?php if ($j == 1) { ?>show active<?php } ?>" id="we-haves-<?php echo $j; ?>" role="tabpanel" aria-labelledby="we-haves-<?php echo $j; ?>-tab">
                    <div class="img-effects__tag">
                        <a href="<?php echo esc_url( $inner['tab_image']['url'] ); ?>" data-fancybox="images-shows" data-caption="My caption"><img src="<?php echo esc_url( $inner['tab_image']['url'] ); ?>" alt="Image"></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</article>

<?php
        return ob_get_clean();
    }
endif;
?>