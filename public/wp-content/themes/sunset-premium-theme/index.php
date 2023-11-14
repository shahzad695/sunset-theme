<?php 
get_header();?>
<main class="header">

    <?php while (have_posts()){
        the_post();
        get_template_part('template-parts/content', get_post_format());
    }?>


</main>


<?get_footer();