<?php

 
  
      /*  =====================================
            sunset  retrive pics
        ===================================== */

        function sunset_retrive_pics($num=1) {
            $output='';
            if(has_post_thumbnail() && $num==1) {
                $output = get_the_post_thumbnail_url(get_the_ID());
            }
            else
            {
                $attachments = get_posts([
                    'post_type' => 'attachment',
                    'numberposts' =>$num,
                    'post_parent' => get_the_ID()
                    
                ]);
               
                if ($attachments&& $num==1){
                    foreach ($attachments as $attachment) {
                        $output = wp_get_attachment_url($attachment->ID);
                    }
                }else{
                    $output =$attachments;
                    }
            }
            
           return $output;
        }
 


 /*  =========================================================================
            post custom functions
     ========================================================================== */

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
    return ''.get_the_tag_list('<div class="post__footer--tags link"><span class="sunset-icon sunset-tag"></span>', ' ', '</div>').' <div class="post__footer_comments">'.$comments.'<span class="sunset-icon sunset-comment"></span></div>';
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



    /*  =====================================
            custom post navigation
        =====================================*/

        
    function sunset_custom_post_nav() {
    $nav ='<div class="post__navlinks_cont">';
    $prev = get_previous_post_link('<span class= "sunset-icon sunset-chevron-left"></span> %link ','%title');
    $nav.= '<div class= "post__navlink">'.$prev.'</div>';
    $next = get_next_post_link(' %link <span class= "sunset-icon sunset-chevron-right"> </span>','%title');
    $nav.='<div class= "post__navlink">'.$next.'</div>';
    $nav.='</div>';
    return $nav;
    }

        /*  =====================================
            post custom comments navigation
        =====================================*/
    function sunset_custom_comments_navigation() {
        // if(get_comment_pages_count()>1 && get_option('page_comments')){
            require(get_template_directory().'/inc/custom-templates/comments-nav-template.php');
        // }
    
    }

     /*  =====================================
            custom popular posts widget
        =====================================*/

        function sunset_custom_popular_posts_widget($postId) {
            $metakey = 'sunset_popular_posts';
            $views = get_post_meta($postId, $metakey, true);
            $count= (empty($views)) ? 0 : $views;
            $count++;
            
            update_post_meta($postId, $metakey, $count);
           
           return $count;
        }

        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);