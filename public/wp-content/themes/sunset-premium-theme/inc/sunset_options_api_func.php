<?php
global $sideBarOptions;
$sideBarOptions = get_option('sidebar_options');
function sunset_options_api_settings(){
    register_setting('sunset_theme_settings_group', 'sidebar_options');
    add_settings_section('sunset_theme_options', 'Sidebar options', 'theme_options_section_callback', 'sunset_premium');
    add_settings_field('first_name', 'First Name', 'theme_options_fname_callback', 'sunset_premium', 'sunset_theme_options');
    add_settings_field('last_name', 'Last Name', 'theme_options_lname_callback', 'sunset_premium', 'sunset_theme_options');
    add_settings_field('description', 'Description', 'theme_options_desc_callback', 'sunset_premium', 'sunset_theme_options');
    add_settings_field('twiter_handle', 'Twiter Handle', 'theme_options_Twiter_callback', 'sunset_premium', 'sunset_theme_options');
    add_settings_field('facebook_handle', 'Facebook Handle', 'theme_options_Facebook_callback', 'sunset_premium', 'sunset_theme_options');

}

        /*  ==============================================
                    Callback Functions
            ================================================

        */


function theme_options_section_callback(){
   echo 'Customize Sidebar Options';
}
function theme_options_fname_callback(){
    global $sideBarOptions;?>

<input type="text" name="sidebar_options[first_name]"
    value="<?Php echo isset($sideBarOptions['first_name']) ? esc_attr($sideBarOptions['first_name']) : '';?>"
    placeholder="First Name">
<?php }
function theme_options_lname_callback(){
    global $sideBarOptions;?>

<input type="text" placeholder="Last Name" id="last_name" name="sidebar_options[last_name]"
    value="<?Php echo isset($sideBarOptions['last_name']) ? esc_attr($sideBarOptions['last_name']) : '';?>">
<?php }


function theme_options_desc_callback(){
    global $sideBarOptions;?>

<input type="text" placeholder="Description" id="description" name="sidebar_options[description]"
    value="<?Php echo isset($sideBarOptions['description']) ? esc_attr($sideBarOptions['description']) : '';?>">
<?php }

function theme_options_twiter_callback(){
    global $sideBarOptions; ?>
<input type="text" placeholder="Twiter Handle" id="twiter_handle" name="sidebar_options[twiter_handle]"
    value="<?Php echo isset($sideBarOptions['twiter_handle']) ? esc_attr($sideBarOptions['twiter_handle']) : '';?>">
<?php }

function theme_options_facebook_callback(){
    global $sideBarOptions; ?>
<input type="text" placeholder="Twiter Handle" id="twiter_handle" name="sidebar_options[twiter_handle]"
    value="<?Php echo isset($sideBarOptions['twiter_handle']) ? esc_attr($sideBarOptions['twiter_handle']) : '';?>">
<?php }