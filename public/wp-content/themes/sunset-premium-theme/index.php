<?php 
get_header();
global $wp_query;
?>
<main class="header" id="post_container">
    <div class="page-limit" data-pageurl="/" data-maxpage="<?php echo $wp_query->max_num_pages;?>">
        <?php while (have_posts()){
        the_post();
        get_template_part('template-parts/content', get_post_format());
     }?>

    </div>
</main>
<div class="header__load-more-btn" data-adminurl="<?php echo admin_url('admin-ajax.php') ?>">
    <span class="sunset-icon sunset-loading"></span>
    <a href="" class="btn link link-btn btn--loadmore" data-adminurl="<?php echo admin_url('admin-ajax.php') ?>" data-page="1">
        Load
        More</a>
</div>


<?get_footer();