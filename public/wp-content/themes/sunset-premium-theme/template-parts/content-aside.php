<article id="post-<?php the_ID()?>" <?php post_class('post');?>>
    <div class="post__aside-container">
        <header class="post__header post__header--aside">
            <div class="post__meta">
                <?php echo sunset_post_meta(); ?>
            </div>
        </header>
        <div class="post__content post__content--aside">
            <?php $thumbnailurl= sunset_retrive_pics();?>
            <div class="post__thumbnail--aside" style="background-image: url('<?php echo $thumbnailurl?>');">
            </div>
            <summary class="post__excerpt post__excerpt--aside">
                <?php the_excerpt();?>
            </summary>
        </div>
        <footer class="post__footer post__footer--aside">
            <?php echo sunset_footer_info();?>

        </footer>
    </div>
</article>