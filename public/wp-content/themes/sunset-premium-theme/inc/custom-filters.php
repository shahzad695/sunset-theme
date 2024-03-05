<?php 
// Adding class to anchor tags returned from nav_menu function
function add_link_atts($atts) {
    $atts['class'] = "link link--underline";
    return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_link_atts');

  // Adding class to anchor tags returned from get_tag_list function
  

function add_tag_class($links) {
return str_replace('<a href="', '<a class="link" href="', $links);
}

add_filter( "term_links-post_tag", 'add_tag_class');

// Adding class to anchor tags returned from next and previous post link

function posts_link_next_class($format){
  $format = str_replace('href=', 'class="link" href=', $format);
  return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
  $format = str_replace('href=', 'class="link" href=', $format);
  return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');