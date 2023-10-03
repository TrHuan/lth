<?php

// This will remove the default image sizes thumbnail, medium and large. 
add_filter( 'intermediate_image_sizes_advanced', 'lth_remove_default_images' );
function lth_remove_default_images( $sizes ) {
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['large']);
    return $sizes;
}
function remove_extra_image_sizes() {
    foreach ( get_intermediate_image_sizes() as $size ) {
        if ( !in_array( $size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
            remove_image_size( $size );
        }
    }
}
add_action('init', 'remove_extra_image_sizes');

// Tạo custom logo bằng bfi_thumb
function lth_custom_logo( $thumb_size, $image_width, $image_height ) {
    global $post;
    $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );
    $imgsrc = get_field('logo', 'option');
    $custom_img_src = bfi_thumb( $imgsrc, $params );
    return $custom_img_src;
}

function lth_custom_img( $thumb_size, $image_width, $image_height ) { 
    global $post; 
    $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );   
    $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID, '' ), $thumb_size );
    $custom_img_src = bfi_thumb( $imgsrc[0], $params );   
    return $custom_img_src;   

	///// gọi hình ảnh (đặt code ở vị trí muốn hiển thị ảnh)
	/* <img src="<?php echo lth_custom_img('full', 300, 300);?>"> */
}
    
// Tạo custom imgs single product bằng bfi_thumb
function lth_custom_imgs_single_product( $thumb_size, $image_width, $image_height ) {
    global $product;
    $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );
    $attachment_ids = $product->get_gallery_image_ids();
    $product_name = get_the_title();

    if ( $attachment_ids && $product->get_image_id() ) {
        echo '<div class="ul">';            
            foreach ( $attachment_ids as $attachment_id ) {
                $image_link =wp_get_attachment_url( $attachment_id );
                $custom_img_src = bfi_thumb( $image_link, $params );
                //Get image show by tag <img> 
                echo '<div class="item">';
                    echo '<img src="' . $custom_img_src . '" alt="' . $product_name . '">';
                echo '</div>';
            } 
        echo '</div>';
    } else {
        $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID, '' ), $thumb_size );
        $custom_img_src = bfi_thumb( $imgsrc[0], $params );
        echo '<img src="' . $custom_img_src . '" alt="' . $product_name . '">';
    }
}

// Tạo custom cat img bằng bfi_thumb
function lth_custom_cat_img( $thumb_size, $image_width, $image_height, $term ) {
    global $post;
    $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );
    $imgsrc = get_field('image', 'category_' . $term);
    $custom_img_src = bfi_thumb( $imgsrc, $params );
    return $custom_img_src;
}

// Tạo custom imgs breadcrumb bằng bfi_thumb
function lth_custom_breadcrumb( $thumb_size, $image_width, $image_height ) {
    global $post;

    $pageID = get_the_ID();
    $page = get_post($pageID);
    $title =  $page->post_title;

    $breadcrumb_all = get_field('breadcrumb', 'option');

    if (get_post_type() == 'page') {
        $breadcrumb_page = get_field('breadcrumb');

        if ($breadcrumb_page) {
            $img_url = $breadcrumb_page;
        } else {
            $img_url = $breadcrumb_all;
        }
    }

    if (get_post_type() == 'post') {
        // $archive_page = get_pages(
        // 	array(
        // 		'meta_key' => '_wp_page_template',
        // 		'meta_value' => 'templates/blogs.php'
        // 	)
        // );
        // $archive_id = $archive_page[0]->ID;
        // $breadcrumb_page = get_field('breadcrumb', $archive_id);

        if (is_category()) {
            $term = get_queried_object();
            $breadcrumb_cat_blog = get_field('breadcrumb', $term);
        }

        if (is_single()) {
            $breadcrumb_single = get_field('breadcrumb');
            $cat = false;
            $primary_cat_id = get_post_meta( get_the_ID(), 'rank_math_primary_category', true );
            if ( $primary_cat_id ) {
                $cat = get_term( $primary_cat_id, 'category' );
                // $cat_link = get_term_link( $cat, 'category' );
                $breadcrumb_cat_blog = get_field('breadcrumb', $cat);
            } elseif ( class_exists( 'WPSEO_Primary_Term' ) ) {
                $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
                $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
                $term = get_term( $wpseo_primary_term );
                $breadcrumb_cat_blog = get_field('breadcrumb', $term);
            } else {
                $term = get_queried_object();
                $breadcrumb_cat_blog = get_field('breadcrumb', $term);
            }
        }

        if (is_category() && $breadcrumb_cat_blog) {
            $img_url = $breadcrumb_cat_blog;
        } elseif (is_single() && $breadcrumb_single) {
            $img_url = $breadcrumb_single;
        } elseif (is_single() && !$breadcrumb_single && $breadcrumb_cat_blog) {
            $img_url = $breadcrumb_cat_blog;
        } else {
            $img_url = $breadcrumb_all;
        }
    }

    if (get_post_type() == 'product') {
        $breadcrumb_products = get_field('breadcrumb', woocommerce_get_page_id('shop'));

        if (is_tax()) {
            $term = get_queried_object();
            $breadcrumb_cat_products = get_field('breadcrumb', $term);
        }

        if (is_single()) {
            $breadcrumb_single = get_field('breadcrumb');
        }

        if (!is_single() && $breadcrumb_products || is_tax() && $breadcrumb_cat_products) {
            if ($breadcrumb_cat_products) {
                $img_url = $breadcrumb_cat_products;
            } else {
                $img_url = $breadcrumb_products;
            }
        } elseif (is_single() && $breadcrumb_single) {
            $img_url = $breadcrumb_single;
        } elseif (is_single() && $breadcrumb_products) {
            $img_url = $breadcrumb_products;
        } else {
            $img_url = $breadcrumb_all;
        }
    }

    if ($img_url) {
        $params = array( 'width' => $image_width, 'height' => $image_height, 'crop' => true );
        $imgsrc = $img_url;
        $custom_img_src = bfi_thumb( $imgsrc, $params );

        echo '<img src="' . $custom_img_src . '" alt="Breadcrumb" style="width: 100%">';
    }
}	
?>

<?php //the_post_thumbnail("full",array( "alt" => get_the_title() )); ?>