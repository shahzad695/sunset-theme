<?php
function sunset_options_api_settings(){
    register_setting('sunset_theme_settings_group', 'first_name');
    add_settings_section('sunset_theme_options', 'Sidebar options', 'theme_options_section_callback', 'sunset_premium');
    add_settings_field('first-name', 'First Name', 'theme_options_field_callback', 'sunset_premium', 'sunset_theme_options');
}
function theme_options_section_callback(){
   echo 'Customize Sidebar Options';
}
function theme_options_field_callback(){
   $firstName=get_option('first_name');
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" >';


   }