<?php 
get_header();?>
<main class="header" id="post_container">

    <?php while (have_posts()){
        the_post();
        get_template_part('template-parts/content', get_post_format());
    }?>


</main>
<div class="header__load-more-btn" data-adminurl="<?php echo admin_url('admin-ajax.php') ?>">
    <a href="" class="btn link link-btn btn--loadmore" data-adminurl="<?php echo admin_url('admin-ajax.php') ?>"
        data-page="1"><span class="sunset-icon sunset-loading"></span>
        Load
        More</a>
</div>


<?get_footer();