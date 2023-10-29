<article>
    <header class="post__header">
        <?php the_title('<h1 class="post_title">', '</h1>');
        ?>
    </header>
    <div class="post__meta">
        <?php echo sunset_post_meta(); ?>
    </div>
    <div class="post__thumbnail">
        <?php if( has_post_thumbnail()){
            the_post_thumbnail();}?>

    </div>
    <summary class="post__excerpt">
        <?php the_excerpt();?>
    </summary>
    <button class="btn">
        <a href="<?php the_permalink();?>" class="btn__link">Read More</a>
    </button>
    <footer class="post__footer">
        <?php echo sunset_footer_info();?>

    </footer>
</article>