<?php 
$options = get_option('sunset_custom_theme_support');
$formats=['aside','gallery','link','image','quote','video','audio','chat'];

$output=[];
foreach ($formats as $format){
    $output[]=(@$options['sunset_post_format'][''.$format.'']==1 ? $format : '');
}
if(!empty($options)){
    add_theme_support('post-formats',$output);
}
$header = get_option('sunset_custom_theme_support');
if(!empty($header['sunset_custom_header'])){
    add_theme_support('custom-header');
}
$background = get_option('sunset_custom_theme_support');
if(!empty($background['sunset_custom_background'])){
    add_theme_support('custom-background');
}

/* 
Add support for thumbnail images
*/
add_theme_support('post-thumbnails');
/* 
Add support for html5
*/
add_theme_support('html5',['comment-list', 'comment-form','search-form', 'gallery','caption']);
/* 
Add support for Nav Menu
*/
function sunset_register_nav_menu(){
    register_nav_menu('primary', 'Header Nav Menu');
}
add_action('after_setup_theme', 'sunset_register_nav_menu');