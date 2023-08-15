<?php
function sunset_admin_load_scripts($hook){
    if('toplevel_page_sunset_premium'!= $hook){
        return;
    }
    wp_register_style('custom_admin_style', get_template_directory_uri().'/css/custom-admin.css', [], 1.0);
    wp_enqueue_style('custom_admin_style');
}

add_action('admin_enqueue_scripts', 'sunset_admin_load_scripts');