<?php

  /*

  * Khởi tạo widget item

  */

  add_action( 'widgets_init', 'create_widget_blogs' );

  function create_widget_blogs() {

    register_widget('Widget_Blogs');

  }



  /**

  * Tạo class Widget_Blogs

  */

  class Widget_Blogs extends WP_Widget {

    /**

    * Thiết lập widget: đặt tên, base ID

    */

    function __construct() {

      parent::__construct (

        'widget_blogs', // id của widget

        'Tin Tức', // tên của widget

        array(

          'description' => 'Mô tả của widget' // mô tả

        )

      );

    }



    /**

    * Tạo form option cho widget

    */

    function form( $instance ) {

      //Biến tạo các giá trị mặc định trong form

      $default = array(

        'title' => 'Tiêu Đề',

        'posts_per_page' => 5,

      );



      //Gộp các giá trị trong mảng $default vào biến $instance để nó trở thành các giá trị mặc định

      $instance = wp_parse_args( (array) $instance, $default);



      //Tạo biến riêng cho giá trị mặc định trong mảng $default

      $title = esc_attr( $instance['title'] );

      $posts_per_page = esc_attr( $instance['posts_per_page'] );



      //Hiển thị form trong option của widget

      echo'<p>';

      echo "Tiêu Đề:";

      echo '<input class="widefat" type="text" name="'.$this->get_field_name('title').'" value="'.$title.'" />';

      echo'</p>';

      echo'<p>';

      echo "Số Lượng Hiển Thị:";

      echo '<input class="widefat" type="text" name="'.$this->get_field_name('posts_per_page').'" value="'.$posts_per_page.'" />';
    
      // echo '<input class="widefat" type="text" name="'.$this->get_field_name('posts_per_pages').'" value="5" />';

      echo'</p>';

    }



    /**

    * save widget form

    */

    function update( $new_instance, $old_instance ) {

      parent::update( $new_instance, $old_instance );

      $instance = $old_instance;

      $instance['title'] = strip_tags($new_instance['title']);

      $instance['posts_per_page'] = strip_tags($new_instance['posts_per_page']);

      return $instance;

    }



    /**

    * Show widget

    */

    function widget( $args, $instance ) { 

      extract( $args );

      $title = apply_filters( 'widget_title', $instance['title'] );

      $posts_per_page = apply_filters( 'widget_posts_per_page', $instance['posts_per_page'] );



      echo $before_widget;

      echo '<div class="lth-blogs">';

      //In tiêu đề widget
      if ($title) {
        echo $before_title.$title.$after_title;
      } ?>


    <div class="module module_blogs">
        <div class="module_content content_list">
      <?php // Nội dung trong widget

        $select = get_field('select', 'widget_' . $widget_id);

        if ($select == 'rand') {
          $orderby = 'rand';
        }

        if ( class_exists( 'WPSEO_Primary_Term' ) ) {
            $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
            $term = get_term( $wpseo_primary_term );
            $cat = $term->name;
        }

        if ($select == 'new' || $select == 'rand') {
          $args = [

            'post_type' => 'post',

            'post_status' => 'publish',

            'posts_per_page' => $posts_per_page,

            'post__not_in' => array($id),

            'orderby' => $orderby,

            'category_name' => $cat,

          ];

          $wp_query = new WP_Query($args); ?>


          <?php if ($wp_query->have_posts()) { ?>
            <div class="row">
              <?php while ($wp_query->have_posts()) { 

                $wp_query-> the_post(); ?>

                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                    <?php //load file tương ứng với post format

                    get_template_part('template-parts/post/content', 'sidebar'); ?>

                
                </div>
                

              <?php } ?>
            </div>
          <?php } ?>

        <?php } else {
          $i;
          $featured_posts = get_field('posts', 'widget_' . $widget_id);
          if( $featured_posts ): ?>
              <div class="row">
                <?php foreach( $featured_posts as $post ):
                  $imgsrc = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
                ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                      <div class="item">
                        <div class="content">
                          <div class="content-header">
                            <?php if ($imgsrc) { ?>
                              <div class="content-image">
                                <a href="<?php the_permalink(); ?>" title="" class="image">
                                    <img src="<?php echo $imgsrc; ?>" width="" height="" alt="<?php echo $post->post_title; ?>">
                                </a>
                              </div>
                            <?php } ?>
                            <div class="content-box">
                              <h3 class="content-name">
                                <a href="<?php the_permalink($post); ?>" title="<">
                                    <?php echo $post->post_title; ?>
                                  </a>   
                              </h3>

                              <p class="content-days">
                                  <img src="<?php echo ASSETS_URI ?>/images/icon-calendar-2.svg" alt="Icon">
                                  <?php the_time('d/m/Y'); ?>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                <?php endforeach; wp_reset_postdata(); ?>
              </div>
          <?php endif;
        } ?>

        <div class="module_button">
            <?php if ( class_exists( 'WPSEO_Primary_Term' ) ) {
                $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
                $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
                $term = get_term( $wpseo_primary_term );
                $link = get_term_link( $term->term_id, 'category' );

                if ($wpseo_primary_term) {
                  echo '<a href="'. $link .'" title="" class="btn">';
                    echo __('Xem tất cả');
                  echo '</a>';
                }
            } ?>
        </div>
      </div>
    </div>

      <?php echo '</div>';

      // Kết thúc nội dung trong widget

      echo $after_widget;

    }

  }

?>