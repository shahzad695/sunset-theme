<?php 
get_header();
global $wp_query;
?>
<?php $page_num = get_query_var('paged')? get_query_var('paged'):1?>
<div class="header__loadbtn header__loadbtn--prev <?php echo $page_num <= 1 ? "hide":""?>"
    data-adminurl="<?php echo admin_url('admin-ajax.php') ?>" data-prevpage="<?php echo get_query_var('paged')? get_query_var('paged'):1?>">

    <span class="sunset-icon sunset-loading"></span><a href="" class="btn link link-btn btn--loadmore">
        Loading Prev Posts</a>

</div>
<main class="header" id="post_container">

    <div class="page-limit" data-pageurl="<?php echo $page_num <= 1 ? "/":"/page/$page_num"?>"
        data-maxpage="<?php echo $wp_query->max_num_pages;?>">
        <?php while (have_posts()){
        the_post();
        get_template_part('template-parts/content', get_post_format());
     }?>

    </div>
</main>
<div class="header__loadbtn header__loadbtn--next" data-nextpage="<?php echo get_query_var('paged')? get_query_var('paged'):1?>">
    <span class=" sunset-icon sunset-loading"></span>
    <a href="" class="btn link link-btn btn--loadmore">
        Loading Next Posts</a>
</div>


<?get_footer();