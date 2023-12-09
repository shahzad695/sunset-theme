<article id="post-<?php the_ID()?>" <?php post_class('post');?>>
    <header class="post__header">
        
        <?php 
        $link = sunset_retrive_links();
        the_title('<h1 class="post__title post__title--link"><a href =" '.$link.'" class="link">', '<div class="post__link"><span class="sunset-icon sunset-link"></span></div></a></h1>');
        ?>
    </header>
  
</article>