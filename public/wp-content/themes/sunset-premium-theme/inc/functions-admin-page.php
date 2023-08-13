<?php
        /*  ==============================================
                        Menu Page functions
            ================================================

        */
            

function sunset_add_custom_admin_page(){
    add_menu_page( 'Sunset Theme Options', 'Sunset', 'manage_options', 'sunset_permium', 'sunset_custom_menu_page',
    get_template_directory_uri().'/img/sunset-icon.png', 110);
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