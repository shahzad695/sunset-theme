<?php 
$options = get_option('sunset_custom_theme_support');
$formats=['aside','gallery','link','image','quote','video','audio','chat'];

$output=[];
foreach ($formats as $format){
    $output[]=(@$options[''.$format.'']==1 ? $format : '');
}
if(!empty($options)){
    add_theme_support('post-formats',$output);
}