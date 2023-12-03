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
  /*  =====================================
            sunset  retrive links
        ===================================== */
        
        function sunset_retrive_links(){
        
          if(!  preg_match('/<a\s[^>]*?href=[\'"](.+?)[\'"]/i',get_the_content(),$links)){
            return false;
          };
            return esc_url_raw($links[1]);
        }
 /*  =====================================
        Ajax infinite scroll
    ===================================== */
    add_action('wp_ajax_nopriv_sunset_infinite_scroll', 'sunset_infinite_scroll');
    add_action('wp_ajax_sunset_infinite_scroll', 'sunset_infinite_scroll');

    function sunset_infinite_scroll(){
        $page_no = $_POST['page']+1;
        $prev_no = $_POST['prev'];
        $archive = $_POST['archive'];
        
        if ($prev_no != 0 && $_POST['page']!= 1){
            $page_no = $_POST['page'] - 1;
        }
        $args =[
            'post_type' => 'post',
            'post_status' => 'publish',
            'paged'       =>   $page_no,
        ];
        if($category != '0'){
            $cat_var = explode('/',$archive);
            $type = ($cat_var[1] == 'category') ? 'category_name' : $cat_var[1];
            $args[$type]=$cat_var[2];
        }
        if($archive != '0'){
            $arch_name = $cat_var[1];
            $arch_var = $cat_var[2];
            $page_url = "/".$arch_name."/".$arch_var."/";
            
        }else{
            $page_url='/';
        }
        
        $scrol_posts = new WP_Query($args);
        if($scrol_posts->have_posts()){?>
<div class="page-limit" data-pageurl="<?php echo $page_no <= 1 ? $page_url : $page_url,'page/',$page_no?>">
    <?php while ($scrol_posts->have_posts()){
            $scrol_posts->the_post();
            
            get_template_part('template-parts/content', get_post_format());
            
        } ?>
</div>
<?php 
 wp_reset_postdata();
        die();
    }}