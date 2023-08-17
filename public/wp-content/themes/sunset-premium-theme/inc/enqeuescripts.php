<?php
function sunset_admin_load_scripts($hook){
    if('toplevel_page_sunset_premium'!= $hook){
        return;
    }
    wp_register_style('custom_admin_style', get_template_directory_uri().'/css/custom-admin.css', [], '1.0.0');
    wp_enqueue_style('custom_admin_style');

    wp_enqueue_media();

    wp_register_script('custom_admin_javascript', get_template_directory_uri().'/js/custom-admin.js', [], '1.0.0',true);
    wp_enqueue_script('custom_admin_javascript');

}

add_action('admin_enqueue_scripts', 'sunset_admin_load_scripts');