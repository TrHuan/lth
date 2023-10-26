<?php

  /*

  * Khởi tạo widget item

  */

  add_action( 'widgets_init', 'create_widget_html' );

  function create_widget_html() {

    register_widget('Widget_Html');

  }



  /**

  * Tạo class Widget_Html

  */

  class Widget_Html extends WP_Widget {

    /**

    * Thiết lập widget: đặt tên, base ID

    */

    function __construct() {

      parent::__construct (

        'widget_html', // id của widget

        'HTML', // tên của widget

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

        // 'posts_per_page' => 5,

      );



      //Gộp các giá trị trong mảng $default vào biến $instance để nó trở thành các giá trị mặc định

      $instance = wp_parse_args( (array) $instance, $default);



      //Tạo biến riêng cho giá trị mặc định trong mảng $default

      $title = esc_attr( $instance['title'] );

      // $posts_per_page = esc_attr( $instance['posts_per_page'] );



      //Hiển thị form trong option của widget

      echo'<p>';

      echo "Tiêu Đề:";

      echo '<input class="widefat" type="text" name="'.$this->get_field_name('title').'" value="'.$title.'" />';

      echo'</p>';

      echo'<p>';

      // echo "Số Lượng Hiển Thị:";

      // echo '<input class="widefat" type="text" name="'.$this->get_field_name('posts_per_page').'" value="'.$posts_per_page.'" />';
    
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

      // $instance['posts_per_page'] = strip_tags($new_instance['posts_per_page']);

      return $instance;

    }



    /**

    * Show widget

    */

    function widget( $args, $instance ) { 

      extract( $args );

      $title = apply_filters( 'widget_title', $instance['title'] );

      // $posts_per_page = apply_filters( 'widget_posts_per_page', $instance['posts_per_page'] );



      echo $before_widget;

      // echo '<div class="">';

      //In tiêu đề widget

      if ($title) {
        echo $before_title.$title.$after_title;
      }


      // Nội dung trong widget ?>


      <div class="module__content">
        <?php the_field('content', 'widget_' . $widget_id); ?>
      </div>


      <?php 

      // echo '</div>';

      // Kết thúc nội dung trong widget

      echo $after_widget;

    }

  }

?>