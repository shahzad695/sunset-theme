<article id="post-<?php the_ID()?>" <?php post_class('post');?>>
    <header class="post__header post__header--audio">
        <?php the_title('<h1 class="post__title post__title--audio"><a href="'.get_permalink().'" class="link">', '</a></h1>');
        ?>
        <div class="post__meta">
            <?php echo sunset_post_meta(); ?>
        </div>
    </header>
    <div class="post__content">
        <?php echo sunset_post_format_modif(['audio', 'iframe']);
        ?>

    </div>
    <footer class="post__footer">
        <?php echo sunset_footer_info();?>

    </footer>
</article>