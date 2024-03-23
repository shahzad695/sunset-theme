<?php
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


// Register the custom widget
function register_custom_widget() {
register_widget( 'sunset_profile_widget' );
}
add_action( 'widgets_init', 'register_custom_widget' );