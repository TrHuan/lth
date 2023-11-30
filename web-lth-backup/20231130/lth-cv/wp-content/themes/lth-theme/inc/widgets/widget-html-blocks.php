<?php

  /*

  * Khởi tạo widget item

  */

  add_action( 'widgets_init', 'create_widget_html_blocks' );

  function create_widget_html_blocks() {

    register_widget('Widget_Html_Blocks');

  }



  /**

  * Tạo class Widget_Products

  */

  class Widget_Html_Blocks extends WP_Widget {

    /**

    * Thiết lập widget: đặt tên, base ID

    */

    function __construct() {

      parent::__construct (

        'widget_html_blocks', // id của widget

        'HTML Blocks', // tên của widget

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

    }



    /**

    * save widget form

    */

    function update( $new_instance, $old_instance ) {

      parent::update( $new_instance, $old_instance );

      $instance = $old_instance;

      $instance['title'] = strip_tags($new_instance['title']);

      return $instance;

    }



    /**

    * Show widget

    */

    function widget( $args, $instance ) { 

      extract( $args );

      if ($title) {
        $title = apply_filters( 'widget_title', $instance['title'] );
      }


      echo $before_widget;

      echo '<div class="html-blocks">';

      //In tiêu đề widget

      echo $before_title.$title.$after_title;



      // Nội dung trong widget ?>


      <div class="content-box">
          <?php
          $htmlblocks = get_field('content', 'widget_' . $widget_id);
          ?>
          <?php
            $fullsidebar = $settings['url_sidebar']['url'];
            $explode_fullsidebar = explode('/', $fullsidebar);
            $last_sidebar = $explode_fullsidebar[count($explode_fullsidebar) - 2];
            $args = new WP_Query(array(
                'post_type'      => 'html-blocks',
                'posts_per_page' => 1,
                'p'  => $htmlblocks->ID,
            ));
        ?>

        <?php while ($args->have_posts()) : $args->the_post();
            the_content($htmlblocks);
        endwhile; wp_reset_query(); ?>
      </div>


      <?php 

      echo '</div>';
      
      // Kết thúc nội dung trong widget

      echo $after_widget;

    }

  }

?>