<?php 
get_header();
global $wp_query;
$maxpageNo = $wp_query->max_num_pages;
$page_num = get_query_var('paged')? get_query_var('paged'):1
?>
<div class="header__loadbtn header__loadbtn--prev <?php echo $page_num <= 1 ? "hide":""?>">

    <span class="sunset-icon sunset-loading"></span><a href="" class="btn link link-btn btn--loadmore" data-page="<?php echo $page_num;?>"
        data-prev="1">
        Load Prev Posts</a>

</div>
<main class="header" id="post_container">

    <div class="page-limit" data-pageurl="<?php echo $page_num <= 1 ? "/":"/page/$page_num"?>" data-maxpage="<?php echo $maxpageNo;?>"
        data-adminurl="<?php echo admin_url('admin-ajax.php') ?>">
        <?php while (have_posts()){
        the_post();
        get_template_part('template-parts/content', get_post_format());
        }?>

    </div>
</main>
<div class="header__loadbtn header__loadbtn--next <?php echo $page_num >= $maxpageNo ? "hide":""?>">
    <span class=" sunset-icon sunset-loading"></span>
    <a href="" class="btn link link-btn btn--loadmore" data-page="<?php echo $page_num;?>">
        Load Next Posts</a>
</div>


<?get_footer();