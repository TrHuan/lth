<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<?php if ($settings['style_items'] == 1) { ?>
<div class="our-product popular-products ptb-90">
   <div class="container">
      <!-- Section Title Start -->
      <div class="section-title text-center">
         <h2><?php echo $settings['heading_text']; ?></h2>
         <p><?php echo $settings['description_text']; ?></p>
      </div>
      <!-- Section Title End -->

      <div class="main-product-tab-area">
         <!-- Nav tabs -->
         <ul class="nav tabs-area pro-tabs-area" role="tablist">
            <?php
               if ( $settings['list'] ) { $i;
                  foreach (  $settings['list'] as $item ) { $i++; ?> 
                  <li class="nav-item">
                     <a class="<?php if ($i == 1) {echo 'active';} ?>" data-toggle="tab" href="#tab-<?php echo $i; ?>">
                        <?php echo $item['list_title']; ?>                           
                     </a>
                  </li>
                  <?php }
               }
            ?>
         </ul>

         <!-- Tab Contetn Start -->
         <div class="tab-content">                  
            <?php
               if ( $settings['list'] ) { $j;
                  foreach (  $settings['list'] as $item ) { $j++; ?> 
                     <div id="tab-<?php echo $j; ?>" class="tab-pane fade <?php if ($j == 1) {echo 'show active';} ?>">
                        <?php
                           if ($item['list_products'] == 2) {
                              $tax_query[] = array(
                                 'taxonomy' => 'product_visibility',
                                 'field'    => 'name',
                                 'terms'    => 'featured',
                                 'operator' => 'IN',
                              );
                              
                              if ($item['list_categories']) {
                                 $args = [
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'tax_query' => array(
                                       array(
                                          'taxonomy' => 'product_cat',
                                          'field'    => 'name',
                                          'terms'    => $item['list_categories'],
                                       ),
                                     ),
                                    'posts_per_page' => 8,
                                    'orderby' => 'DESC',
                                    'order' => 'ID',
                                    'tax_query' => $tax_query,
                                 ];
                              } else {
                                 $args = [
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 8,
                                    'orderby' => 'DESC',
                                    'order' => 'ID',
                                    'tax_query' => $tax_query,
                                 ];
                              }
                           } elseif ($item['list_products'] == 3) {                              
                              if ($item['list_categories']) {
                                 $args = [
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'tax_query' => array(
                                       array(
                                          'taxonomy' => 'product_cat',
                                          'field'    => 'name',
                                          'terms'    => $item['list_categories'],
                                       ),
                                     ),
                                    'posts_per_page' => 8,
                                    'order' => 'ID',
                                    'meta_key' => 'total_sales',
                                    'orderby' => 'meta_value_num',
                                 ];
                              } else {
                                 $args = [
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 8,
                                    'order' => 'ID',
                                    'meta_key' => 'total_sales',
                                    'orderby' => 'meta_value_num',
                                 ];
                              }
                           } else {
                              if ($item['list_categories']) {
                                 $args = [
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'tax_query' => array(
                                       array(
                                          'taxonomy' => 'product_cat',
                                          'field'    => 'name',
                                          'terms'    => $item['list_categories'],
                                       ),
                                     ),
                                    'posts_per_page' => 8,
                                    'orderby' => 'DESC',
                                    'order' => 'ID',
                                 ];
                              } else {
                                 $args = [
                                    'post_type' => 'product',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 8,
                                    'orderby' => 'DESC',
                                    'order' => 'ID',
                                 ];
                              }
                           }

                           $wp_query = new WP_Query($args);
                           if ($wp_query->have_posts()) { ?>
                              <!-- Furniture Product Activation Start Here -->
                              <div class="our-pro-active owl-carousel">
                                 <?php while ($wp_query->have_posts()) {
                                    $wp_query-> the_post(); ?>

                                    <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
                                 <?php } ?>
                              </div>
                              <!-- Furniture Product Activation End Here -->
                           <?php } wp_reset_postdata(); 
                        ?>                             
                     </div>
                  <?php }
               }
            ?>
         </div>
         <!-- Tab Content End -->
      </div>
      <!-- main-product-tab-area-->
   </div>
</div>
<?php } if ($settings['style_items'] == 2) { ?>
   <div class="out-products pb-60">
      <div class="horizontal-content">
         <div class="semi-title">
            <h3><?php echo $settings['heading_text']; ?></h3>
         </div>

         <!-- Best Selling Product List Item Start -->
         <ul class="nav tabs-area categorie-tabs-list" role="tablist">
            <?php
               if ( $settings['list'] ) { $i;
                  foreach (  $settings['list'] as $item ) { $i++; ?>                    
                     <li class="nav-item">
                        <a class="<?php if ($i == 1) {echo 'active';} ?>" data-toggle="tab" href="#tab-<?php echo $i; ?>">
                           <?php echo $item['list_title']; ?>
                        </a>
                     </li>
                  <?php }
               }
            ?>
         </ul>
         <!-- Best Selling Product List Item End -->
      </div>
     <!-- Tab Contetn Start -->
     <div class="tab-content">
         <?php
            if ( $settings['list'] ) { $j;
               foreach (  $settings['list'] as $item ) { $j++; ?>                    
                  <div id="tab-<?php echo $j; ?>" class="tab-pane fade <?php if ($j == 1) {echo 'show active';} ?>">
                     <?php
                        if ($item['products'] == 2) {
                           $tax_query[] = array(
                              'taxonomy' => 'product_visibility',
                              'field'    => 'name',
                              'terms'    => 'featured',
                              'operator' => 'IN',
                           );
                           
                           if ($item['list_categories']) {
                              $args = [
                                 'post_type' => 'product',
                                 'post_status' => 'publish',
                                 'tax_query' => array(
                                    array(
                                       'taxonomy' => 'product_cat',
                                       'field'    => 'name',
                                       'terms'    => $item['list_categories'],
                                    ),
                                  ),
                                 'posts_per_page' => 8,
                                 'orderby' => 'DESC',
                                 'order' => 'ID',
                                 'tax_query' => $tax_query,
                              ];
                           } else {
                              $args = [
                                 'post_type' => 'product',
                                 'post_status' => 'publish',
                                 'posts_per_page' => 8,
                                 'orderby' => 'DESC',
                                 'order' => 'ID',
                                 'tax_query' => $tax_query,
                              ];
                           }
                        } elseif ($item['products'] == 3) {                              
                           if ($item['list_categories']) {
                              $args = [
                                 'post_type' => 'product',
                                 'post_status' => 'publish',
                                 'tax_query' => array(
                                    array(
                                       'taxonomy' => 'product_cat',
                                       'field'    => 'name',
                                       'terms'    => $item['list_categories'],
                                    ),
                                  ),
                                 'posts_per_page' => 8,
                                 'order' => 'ID',
                                 'meta_key' => 'total_sales',
                                 'orderby' => 'meta_value_num',
                              ];
                           } else {
                              $args = [
                                 'post_type' => 'product',
                                 'post_status' => 'publish',
                                 'posts_per_page' => 8,
                                 'order' => 'ID',
                                 'meta_key' => 'total_sales',
                                 'orderby' => 'meta_value_num',
                              ];
                           }
                        } else {
                           if ($item['list_categories']) {
                              $args = [
                                 'post_type' => 'product',
                                 'post_status' => 'publish',
                                 'tax_query' => array(
                                    array(
                                       'taxonomy' => 'product_cat',
                                       'field'    => 'name',
                                       'terms'    => $item['list_categories'],
                                    ),
                                  ),
                                 'posts_per_page' => 8,
                                 'orderby' => 'DESC',
                                 'order' => 'ID',
                              ];
                           } else {
                              $args = [
                                 'post_type' => 'product',
                                 'post_status' => 'publish',
                                 'posts_per_page' => 8,
                                 'orderby' => 'DESC',
                                 'order' => 'ID',
                              ];
                           }
                        }

                        $pr = new WP_Query($args);
                        if ($pr->have_posts()) { ?>
                           <div class="tripple-pro-active owl-carousel">
                              <?php while ($pr->have_posts()) {
                                 $pr-> the_post(); ?>

                                 <?php get_template_part('woocommerce/product-box/product-box', ''); ?>
                              <?php } ?>
                           </div>
                        <?php } wp_reset_postdata(); 
                     ?>
                  </div> 
               <?php }
            }
         ?>      
      </div>
   </div>
<?php } ?>