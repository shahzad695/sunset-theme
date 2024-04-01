<?php
/* =====================================
    Custom Url builder for infinite scroll
    ===================================== */

    function sunset_url_builder(){
        $http = (isset($_SERVER["HTTPS"]) ? 'https://' : 'http://');
        $referer = $http.$_SERVER["HTTP_HOST"];
        $archive_url = $referer.$_SERVER["REQUEST_URI"];
        return $archive_url;
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
          if($archive != '0'){
              $arch_var = explode('/',$archive);
              $flipped = array_flip($arch_var);
  
              switch(isset($flipped)){
                  case $flipped["category"];
                      $type="category_name";
                      $key ="category";
                      break;
                  case $flipped["tag"];
                      $type="tag";
                      $key=$type;
                      break;
                  case $flipped["author"];
                      $type="author";
                      $key=$type;
                      break;
  
              }
                  $currKey = array_keys($arch_var,$key);
                  $nextKey = $currKey[0]+1;
                  $value = $arch_var[$nextKey];
                  
              }
              $args[$type]=$value;
              
          if($archive != '0'){
              $arch_name = $key;
              $arch_val= $value;
              $page_url = "/".$arch_name."/".$arch_val."/";
              
          }else{
              $page_url='/';
          }
          
          $scrol_posts = new WP_Query($args);
          if($scrol_posts->have_posts()){?>
<div class="page-limit" data-pageurl="<?php echo $page_no <= 1 ? $page_url : $page_url."page/".$page_no?>">
    <?php while ($scrol_posts->have_posts()){
              $scrol_posts->the_post();
              
              get_template_part('template-parts/content', get_post_format());
              
          } ?>
</div>
<?php 
   wp_reset_postdata();
          die();
      }}

 /*  =====================================
         ajax form submission
      ===================================== */
      add_action('wp_ajax_nopriv_sunset_contact_form_data', 'sunset_contact_form_data');
      add_action('wp_ajax_sunset_contact_form_data', 'sunset_contact_form_data');

      function sunset_contact_form_data(){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $message = $_POST['message'];
          echo $name . ' ' . $email . ' ' . $subject;
          die();

      }