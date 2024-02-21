<article id="post-<?php the_ID()?>" <?php post_class('post post__single');?>>
    <header class="post__header">
        <?php the_title('<h1 class="post__title"><a href="'.get_permalink().'" class="link">', '</a></h1>');
        ?>
        <div class="post__meta">
            <?php echo sunset_post_meta(); ?>
        </div>
    </header>
    <div class="post__content post__content--single">
        <?php the_content();?>
    </div>
    <footer class="post__footer">
        <?php echo sunset_footer_info();?>

    </footer>
</article>