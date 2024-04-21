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

 /*     =====================================
            custom social media links
        =====================================*/

function sunset_social_media_links($content){

  if(is_single()){
    $content.='<div class="post__social"><h1 class="post__social--heading">Share This</h1></div>';

  $title =get_the_title();
  $permalink= get_the_permalink();
  $twitterHandler= (get_option('twitterhandler') ? '&amp;via='.esc_attr( get_option('twitterhandler')).'' : '');

  $twitter ='https://twitter.com/intent/tweet?text=hey read this'.$title.'&amp;url='.$permalink. $twitterHandler.'';
  $facebook ='https://www.facebook.com/sharer/sharer.php?u='.$permalink.'';
  $google ='https://plus.google.com/share?url='.$permalink.'';
  $content.='<ul class="Post__social--links">';
  $content.='<li><a href='.$twitter.' target="_blank" class="link"><span class="sunset-icon sunset-twitter"></span></a></li>'; 
  $content.='<li><a href='.$facebook.' target="_blank" class="link"><span class="sunset-icon sunset-facebook"></span></a></li>'; 
  $content.='<li><a href='.$google.' target="_blank" class="link"><span class="sunset-icon sunset-googleplus"></span></a></li>'; 
  $content.='</ul>';

  return $content;}else{
    return $content;
  }
}
add_filter('the_content', 'sunset_social_media_links');

 /*     =====================================
            custom classes to widgets
        =====================================*/

function add_classes_to_block_editor_widget($content, $block) {
  // Array of block names to target
  $targeted_blocks = array(
      'core/categories', // Categories widget
      'core/latest-posts', // Latest Posts widget
      'core/latest-comments', // Recent Comments widget
      // Add more block names as needed
  );

  // Check if the block is one of the targeted widgets
  if (in_array($block['blockName'], $targeted_blocks)) {
      // Add custom classes to the block output
      $content = str_replace('<ul', '<ul class="widget__list"', $content);
      $content = str_replace('<li', '<li class="widget__item"', $content);
      $content = str_replace('<a', '<a class="widget__link link"', $content);
  }
  return $content;
}
add_filter('render_block', 'add_classes_to_block_editor_widget', 10, 2);