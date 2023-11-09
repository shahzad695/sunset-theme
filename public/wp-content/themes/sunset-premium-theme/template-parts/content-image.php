<article id="post-<?php the_ID()?>" <?php post_class('post');?>>

    <?php $thumbnailurl= sunset_retrive_pics();?>

    <header class="post__header post__header--image" style="background-image: url('<?php echo $thumbnailurl?>')">
        <?php the_title('<h1 class="post__title"><a href="'.get_permalink().'" class="link">', '</a></h1>');
        ?>
        <div class=" post__meta">
            <?php echo sunset_post_meta(); ?>
        </div>
    </header>

    <summary class="post__excerpt post__excerpt--image">
        <?php the_excerpt();?>
    </summary>


    <footer class="post__footer">
        <?php echo sunset_footer_info();?>

    </footer>
</article>