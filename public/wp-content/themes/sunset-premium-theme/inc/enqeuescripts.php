<?php
        /*==========================
            Admin Scripts
          ========================== */
function sunset_admin_load_scripts($hook){
    if('toplevel_page_sunset_premium'== $hook){
        wp_register_style('custom_admin_style', get_template_directory_uri().'/css/custom-admin.css', [], '1.0.0');
        wp_enqueue_style('custom_admin_style');

        wp_enqueue_media();

        wp_register_script('custom_admin_javascript', get_template_directory_uri().'/js/custom-admin.js', [], '1.0.0',true);
        wp_enqueue_script('custom_admin_javascript');

    } else if ('sunset_page_sunset_premium_css'==$hook){
        wp_register_style('custom_css_style', get_template_directory_uri().'/css/custom-css.css', [], '1.0.0');
        wp_enqueue_style('custom_css_style');

        wp_register_script('sunset_ace', get_template_directory_uri().'/js/ace/ace.js', ['jquery'], '1.2.1',true);
        wp_enqueue_script('sunset_ace');

        wp_register_script('sunset_custom_css', get_template_directory_uri().'/js/custom-css.js', ['jquery'], '1.0.0',true);
        wp_enqueue_script('sunset_custom_css');

        

            }else{return;}
}
add_action('admin_enqueue_scripts', 'sunset_admin_load_scripts');

        /* ==========================
                 Front End Scripts
           ========================== */
function sunset_frontend_scripts() {
    //styles
    wp_enqueue_style('ralewayfont', 'https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500;600&display=swap');
    // wp_enqueue_style('bootstrapcss', get_template_directory_uri().'/css/bootstrap.min.css', [], '5.3.1', 'all');
    wp_enqueue_style('sunset_frontend_css', get_template_directory_uri().'/final-assets/sunset-frontend-compiled.css', [], '1.0.0', 'all');
    //scripts
    // wp_enqueue_script('bootstrapjs', get_template_directory().'/js/bootstrap.min.js', ['jquery'], '5.3.1', true);
    wp_enqueue_script('sunset_frontend_js', get_template_directory().'/js/sunset-frontend.js', [], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'sunset_frontend_scripts');