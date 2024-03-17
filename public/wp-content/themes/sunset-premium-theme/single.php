<?php 
get_header();

?>

<main class="post__container" id="post_container">


    <?php while (have_posts()){
        the_post();
        get_template_part('template-parts/single', get_post_format());
        echo sunset_custom_post_nav();
        if (comments_open()){
            comments_template();
        }
        }?>


</main>



<?get_footer();