<?php 
function add_link_atts($atts) {
    $atts['class'] = "link link--underline";
    return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_link_atts');