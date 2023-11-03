<?php
/*  =====================================
            Post meta information
    ===================================== */
function sunset_post_meta(){
    $post_time = human_time_diff (get_the_time('U'), current_time('timestamp'));
    $categories = get_the_category();
    $separator = ' || ';
    $output = '';
    $i = 1;
   
    if (!empty($categories)){
    foreach($categories as $category){
        if($i>1){
            $output .= $separator;
        }
       $output .= '<a class="link" href="'.esc_url(get_category_link($category->term_id)).'">'.$category->name.'</a>';
      $i++; 
    }}
    
    return '<span class="post_time"> posted  <a class="link" href="'.esc_url(get_permalink()).'">'  .$post_time . ' </a> ago in </span> <span class="post_category">' .$output. '</span>';
}

/*  =====================================
            Post footer info
    ===================================== */
function sunset_footer_info(){
    
    $comments_num= get_comments_number();
   
    if(comments_open()){
        if(!$comments_num == 0){
            $comments = __('No Comments');
        }elseif($comments_num>1 ){
            $comments = $comments_num . __(' Comments'); 
        }else{
            $comments = __('1 Comment');
        }
        // $comments = '<a href="'.get_comment_link().'">'.$comments.'<span class="sunset-icon sunset-comment"></span></a>';
    }else{
        $comments = __('Comments closed');
    }
    return ''.get_the_tag_list('<div class="post__tags link"><span class="sunset-icon sunset-tag"></span>', ' ', '</div>').' <div class="post__comments">'.$comments.'<span class="sunset-icon sunset-comment"></span></div>';
}

/*  =====================================
        Audio-video post type modification
    ===================================== */

    function sunset_post_format_modif($type=[]){
        $content = do_shortcode(apply_filters('the_content', get_the_content()));
        $embeded = get_media_embedded_in_content($content, $type);

        if (in_array('audio', $type)){
            $output = str_replace('?visual=true', '?visual=false', $embeded[0]);
        }else{
            $output=$embeded[0];
        }
        return $output;
    }