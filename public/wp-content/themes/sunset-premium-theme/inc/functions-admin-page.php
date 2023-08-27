<?php
       
       require get_template_directory().'/inc/sunset_options_api_func.php';
       
       /*  ==============================================
                custom Menu Page generation functions
            ================================================

        */
function sunset_add_custom_admin_page(){
    // generate custom menu page
    add_menu_page( 'Sunset Theme Options', 'Sunset', 'manage_options', 'sunset_premium', 'sunset_custom_menu_page',
    get_template_directory_uri().'/img/sunset-icon.png', 110);
    // generate custom sbmenu pages
    add_submenu_page('sunset_premium', 'sidebar-options', 'Sidebar Options', 'manage_options', 'sunset_premium', 'sunset_custom_menu_page');
    add_submenu_page('sunset_premium', 'add-theme-support', 'Add Theme Support', 'manage_options', 'sunset_premium_theme_support', 'sunset_custom_theme_support_page');
    add_submenu_page('sunset_premium', 'add-contact-form', 'Contact Form', 'manage_options', 'sunset_premium_contact_form', 'sunset_custom_contact_form_page');
    add_submenu_page('sunset_premium', 'custom-css', 'custom_css', 'manage_options', 'sunset_premium_css', 'sunset_custom_css_page');
    add_action('admin_init', 'sunset_options_api_settings');
}

       

        /*  ==============================================
                        sub functions
            ================================================

        */

function sunset_custom_menu_page(){
    require_once get_template_directory().'/inc/custom-templates/sunset-custom-sidebar-page.php';
}
function sunset_custom_css_page(){
    require_once get_template_directory().'/inc/custom-templates/sunset-custom-css-page.php';
}
function sunset_custom_theme_support_page(){
    require_once get_template_directory().'/inc/custom-templates/sunset-custom-theme-support-page.php';
}

function sunset_custom_contact_form_page(){
    require_once get_template_directory().'/inc/custom-templates/sunset-custom-contact-form-page.php';
}
        /*  ==============================================
                    Wordpess hooks
            ================================================

        */

        add_action('admin_menu', 'sunset_add_custom_admin_page');
        
    
    