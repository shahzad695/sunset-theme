<article id="post-<?php the_ID()?>" <?php post_class('post');?>>
    <header class="post__header post__header--video">
        <?php echo sunset_post_format_modif(['video', 'iframe']);
        ?>

        <?php the_title('<h1 class="post__title"><a href="'.get_permalink().'" class="link">', '</a></h1>');
        ?>
        <div class="post__meta">
            <?php echo sunset_post_meta(); ?>
        </div>
    </header>
    <div class="post__content">

        <summary class="post__excerpt">
            <?php the_excerpt();?>
        </summary>

        <a href="<?php the_permalink();?>" class="link link--btn btn ">Read More</a>

    </div>
    <footer class="post__footer">
        <?php echo sunset_footer_info();?>

    </footer>
</article>