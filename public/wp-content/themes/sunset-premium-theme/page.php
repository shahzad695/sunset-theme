<?php 
get_header();

?>

<main class="post__container" id="post_container">


    <?php while (have_posts()){
        the_post();
        get_template_part('template-parts/content', 'page');
        }?>


</main>



<?get_footer();