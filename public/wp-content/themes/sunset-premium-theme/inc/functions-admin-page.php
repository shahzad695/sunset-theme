<?php
        /*  ==============================================
                custom Menu Page generation functions
            ================================================

        */
            

function sunset_add_custom_admin_page(){
    // generate custom menu page
    add_menu_page( 'Sunset Theme Options', 'Sunset', 'manage_options', 'sunset_permium', 'sunset_custom_menu_page',
    get_template_directory_uri().'/img/sunset-icon.png', 110);
    // generate custom sbmenu pages

    add_submenu_page('sunset_permium', 'general-settings', 'General', 'manage_options', 'sunset_permium', 'sunset_custom_menu_page');
    add_submenu_page('sunset_permium', 'custom-css', 'custom_css', 'manage_options', 'sunset_permium_css', 'sunset_custom_css_page');

}

        /*  ==============================================
                    Wordpess hooks
            ================================================

        */

    add_action('admin_menu', 'sunset_add_custom_admin_page');



        /*  ==============================================
                        sub functions
            ================================================

        */

function sunset_custom_menu_page(){
    echo '<h1>Sunset Theme Options</h1>';
}
function sunset_custom_css_page(){
    echo '<h1>Custom Css page</h1>';
}