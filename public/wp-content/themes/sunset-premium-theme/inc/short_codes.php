<?php
add_shortcode('stylify', 'sunset_stylify_shortcode');
function sunset_stylify_shortcode($atts,$content=null) {
    $attributes=shortcode_atts(
        [
            'style' => 'b'

        ], $atts, 'stylify');
        return '<'. $attributes['style'] .'>' . $content. '</'. $attributes['style'] .'>';

}