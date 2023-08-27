<?php
global $sideBarOptions;
$sideBarOptions = get_option('sidebar_options');
function sunset_options_api_settings(){
    // custom sidebar options settings
    register_setting('sunset_sidebar_options_group', 'sidebar_options');
    add_settings_section('sunset_sidebar_options_section', 'Sidebar options', 'theme_options_section_callback', 'sunset_premium');
    add_settings_field('profile_picture', 'Profile Picture', 'theme_options_profilepic_callback', 'sunset_premium', 'sunset_sidebar_options_section');
    add_settings_field('first_name', 'First Name', 'theme_options_fname_callback', 'sunset_premium', 'sunset_sidebar_options_section');
    add_settings_field('last_name', 'Last Name', 'theme_options_lname_callback', 'sunset_premium', 'sunset_sidebar_options_section');
    add_settings_field('description', 'Description', 'theme_options_desc_callback', 'sunset_premium', 'sunset_sidebar_options_section');
    add_settings_field('twiter_handle', 'Twiter Handle', 'theme_options_Twiter_callback', 'sunset_premium', 'sunset_sidebar_options_section');
    add_settings_field('facebook_handle', 'Facebook Handle', 'theme_options_Facebook_callback', 'sunset_premium', 'sunset_sidebar_options_section');
    
    // custom add theme support settings
    register_setting('sunset_add_theme_support_group', 'sunset_custom_theme_support', 'sunset_add_theme_support_callback');
    add_settings_section('sunset_theme_support_section', 'Add Theme support', 'sunset_theme_support_callback', 'sunset_premium_theme_support');
    add_settings_field('sunset_post_format', 'Add Required Post format', 'sunset_post_format_callback', 'sunset_premium_theme_support', 'sunset_theme_support_section');
    add_settings_field('sunset_custom_header', 'Custom Header', 'sunset_custom_header_callback', 'sunset_premium_theme_support', 'sunset_theme_support_section');
    add_settings_field('sunset_custom_background', 'Custom background', 'sunset_custom_background_callback', 'sunset_premium_theme_support', 'sunset_theme_support_section');

    //custom contact form settings
    register_setting('sunset_contact_form_group', 'sunset_custom_contact_form');
    add_settings_section('sunset_contact_form_section', 'Sunset Contact Form', 'sunset_contact_support_callback', 'sunset_premium_contact_form');
    add_settings_field('sunset_contact_form_field', 'Contact Form', 'sunset_contact_form_field_callback', 'sunset_premium_contact_form', 'sunset_contact_form_section');

    //custom css settings
    register_setting('sunset_custom_css_group', 'sunset_custom_css');
    add_settings_section('sunset_custom_css_section', 'Sunset Custom CSS', 'sunset_custom_css_section_callback', 'sunset_premium_css');
    add_settings_field('sunset_custom_css_field', 'Custom CSS', 'sunset_custom_css_field_callback', 'sunset_premium_css', 'sunset_custom_css_section');
}
    
    

        /*  ==============================================
                    Callback Functions
            ================================================

        */

                //custom Css callback

                // function sunset_custom_css_group_callback($input){
                //     $output = esc_textarea($input);
                //     echo $output;
                // }

                function sunset_custom_css_section_callback(){
                    echo '<p class="paara">customize sunset theme with you own CSS</p>';
                }
        
                
                function sunset_custom_css_field_callback(){
                    $css = get_option('sunset_custom_css');
                    $css=(empty($css) ? '/*Enter some CSS*/' : $css);

                    echo '<div id="customCss">'.$css.'</div><input type="hidden" name="sunset_custom_css" id="sunset_custom_css" value="'.$css.'">'; 
                }



            //custom contact form settings
            function sunset_contact_support_callback(){
                echo 'Activate or Deactivate the build in Contact Form';
            }
    
            
            function sunset_contact_form_field_callback(){
                $options = get_option('sunset_custom_contact_form');
               
                    $checked=(@$options==1 ? 'checked' : '');
                        $output =  '<label><input type="checkbox" name="sunset_custom_contact_form" value="1" '.$checked.'></label><br/>';    
            
                echo $output;
            }


// custom add theme support callbacks

function sunset_theme_support_callback(){
    echo 'Add theme support';
}

function sunset_custom_background_callback(){
    $options = get_option('sunset_custom_theme_support');
   
        $checked=(@$options['sunset_custom_background']==1 ? 'checked' : '');
            $output =  '<label><input type="checkbox" name="sunset_custom_theme_support[sunset_custom_background]" value="1" '.$checked.'>Custom Background</label><br/>';    

    echo $output;
}

function sunset_custom_header_callback(){
    $options= get_option('sunset_custom_theme_support');
        $checked=(@$options['sunset_custom_header']==1 ? 'checked' : '');
            $output =  '<label><input type="checkbox" name="sunset_custom_theme_support[sunset_custom_header]" value="1" '.$checked.'>Custom Header</label><br/>';    

    echo $output;
}


function sunset_post_format_callback(){
    $options = get_option('sunset_custom_theme_support');
    $formats=['aside','gallery','link','image','quote','video','audio','chat'];
   
    $output='';
    foreach ($formats as $format){
        $checked=(@$options['sunset_post_format'][''.$format.'']==1 ? 'checked' : '');
            $output.=  '<label><input type="checkbox" name="sunset_custom_theme_support[sunset_post_format]['.$format.']" value="1" '.$checked.'>'.$format.'</label><br/>';    
    }
    echo $output;
}

// custom sidebar options callback functions
function theme_options_section_callback(){
   echo 'Customize Sidebar Options';
}
function theme_options_profilepic_callback(){
    global $sideBarOptions;
    $pic = $sideBarOptions['profile_picture'];
    if(empty($pic)){ ?>
<input type=" button" value="Upload Profile Picture" class="button button-primary" id="profile_picture_button">
<input type="hidden" id="profile_picture" name="sidebar_options[profile_picture]" value=" ">
<?php }else{ ?>
<input type=" button" value="Replace Profile Picture" class="button button-secondary" id="profile_picture_button">
<input type=" button" value="Remove" class="button button-secondary" id="profile_picture_remove_button">
<input type="hidden" id="profile_picture" name="sidebar_options[profile_picture]" value=" ">
<?php }
}




function theme_options_fname_callback(){
global $sideBarOptions;?> <input type="text" name="sidebar_options[first_name]"
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