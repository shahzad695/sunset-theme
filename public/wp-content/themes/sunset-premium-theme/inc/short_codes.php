<?php
add_shortcode('stylify', 'sunset_stylify_shortcode');
function sunset_stylify_shortcode($atts,$content=null) {
    $attributes=shortcode_atts(
        [
            'title' => '',
            'position' => 'top',

        ], $atts, 'stylify');
        $tittle =($attributes['title'] == '') ? $content : $attributes['title'];
        // return '<'. $attributes['style'] .'>' . $content. '</'. $attributes['style'] .'>';
        return '<span  class="tooltip_style" data-toggle="tooltip" data-placement="'. $attributes['position'] .'" title="'.$tittle .'">
        ' . $content. '
      </span>';

}
function sunset_contact_form($atts,$content=null) {

    $attributes=shortcode_atts(
        [], $atts, 'contact_form');
          
    

    ob_start();
    require  get_template_directory() . '/inc/custom-templates/sunset-contact-form.php';
    $output = ob_get_clean();
    return $output;
}
add_shortcode('contact_form', 'sunset_contact_form');