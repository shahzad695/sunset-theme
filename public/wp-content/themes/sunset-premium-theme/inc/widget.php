<?php
  /*  =====================================
        sunset porofile custom  widget
        =====================================*/
class sunset_profile_widget extends WP_Widget {
     public function __construct() {
        $widget_options = [
            'classname' => 'sunset_profile_widget',
            'description' => 'Sunset Profile Widget'
        ];

        parent::__construct('sunset_profile_widget', 'Sunset Profile Widget', $widget_options);
    }
    public function form( $instance ) {?>
<p>No options for this widget</p>

<?php }
    public function widget( $args, $instance ) {
        global $sideBarOptions;
        echo $args['before_widget'];

        ?>
<div class="siderbar-overview">
    <div class="image-container">
        <div id="profile_picture_preview" class="image-background"
            style="background-image: url(<?php echo $sideBarOptions['profile_picture'] ?>);">
        </div>
    </div>
    <div class="sidebar-main">
        <h1 class="sunset-username"><?php echo $sideBarOptions['first_name'] .' '. $sideBarOptions['last_name']  ?></h1>
        <h2 class="sunset-description"><?php echo $sideBarOptions['description'] ?></h2>
        <div class="icon-wraper"></div>
    </div>
</div>
<?php

// Output content after the widget
echo $args['after_widget'];

}
}


 /*  =====================================
        sunset popular posts custom  widget
        =====================================*/

        class sunset_popular_posts_widget extends WP_Widget {
             public function __construct() {
                $widget_options = [
                    'classname' => 'sunset_popular_posts_widget',
                    'description' => 'Sunset Popular Posts Widget'
                ];

                parent::__construct('sunset_popular_posts_widget', 'Sunset Popular Posts Widget', $widget_options);

            }
            public function form( $instance ) {
                // custom-widget-form.php

                $title = isset($instance['title']) ? $instance['title'] : 'Popular Posts';
                $number_posts = isset($instance['number_posts']) ?absint( $instance['number_posts']) : 5;
                
                $output = '<label for="'. $this->get_field_id('title').'">Title</label>';
                $output .= '<input type="text" id="'.  $this->get_field_id('title') .'" name="'. $this->get_field_name('title').'" value="'. $title .'" class="widefat" />';
                $output .= '<label for="'. $this->get_field_id('number_posts').'">Number of Posts</label>';
                $output .= '<input type="number" id="'.  $this->get_field_id('number_posts') .'" name="'. $this->get_field_name('number_posts').'" value="'. $number_posts .'" class="widefat" />';
                echo $output;
                }
            public function update( $new_instance, $old_instance ) {
                    // custom-widget-form.php
                    
                        $instance = array();
                        $instance['title'] = sanitize_text_field($new_instance['title']);
                        $instance['number_posts'] = intval($new_instance['number']);
                        return $instance;
                    }
                public function widget( $args,$instance ) {
                    $total = absint( $instance['number_posts'] );
                    $args_popular_posts=[
                        'posts_per_page' => $total,
                        'meta_key' => 'sunset_popular_posts',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC'
                    ];

                    $popular_posts_query = new WP_Query($args_popular_posts);

                echo $args['before_widget'];
                echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
                if($popular_posts_query->have_posts()) {
                    echo '<ul class="widget__list">';
                    while ($popular_posts_query->have_posts()) {
                        $popular_posts_query->the_post();
                        echo '<li class="widget__item widget__item--popular "><img class="widget__image" src="' . get_template_directory_uri() . '/img/post-'.(get_post_format()?get_post_format():'standard').'.png" alt=""><a class="widget__link link" href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
                    
                    }


                    echo '</ul>';}
                // Output content after the widget
                echo $args['after_widget'];
                }}

                // Register the custom widgets
                function register_custom_widget() {
                register_widget( 'sunset_popular_posts_widget' );

                register_widget( 'sunset_profile_widget' );

                }
                add_action( 'widgets_init', 'register_custom_widget' );