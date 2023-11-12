<article id="post-<?php the_ID()?>" <?php post_class('post');?>>
    <header class="post__header">
        <h1 class='post__content--quote'><a href="<?php the_permalink()?>"></a><?php echo strip_tags( get_the_content())?></h1>
        <?php the_title('<h2 class="post__quote-author">~', '~</h2>');
        ?>
        
    </header>

    <footer class="post__footer">
        <?php echo sunset_footer_info();?>

    </footer>
</article>