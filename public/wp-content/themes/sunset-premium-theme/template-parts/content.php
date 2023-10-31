<article id="post-<?php the_ID()?>" <?php post_class('post');?>>
    <header class="post__header">
        <?php the_title('<h1 class="post__title"><a href="'.get_permalink().'" class="link">', '</a></h1>');
        ?>
        <div class="post__meta">
            <?php echo sunset_post_meta(); ?>
        </div>
    </header>
    <div class="post__content">
        <?php if( has_post_thumbnail()){
            $thumbnailurl= get_the_post_thumbnail_url(get_the_ID());
        }?>
        <a href="<?php the_permalink()?>" class="post__thumbnail--link">
            <div class="post__thumbnail" style="background-image: url('<?php echo $thumbnailurl?>');">
            </div>
        </a>
        <summary class="post__excerpt">
            <?php the_excerpt();?>
        </summary>

        <a href="<?php the_permalink();?>" class="link link--btn btn ">Read More</a>

    </div>
    <footer class="post__footer">
        <?php echo sunset_footer_info();?>

    </footer>
</article>