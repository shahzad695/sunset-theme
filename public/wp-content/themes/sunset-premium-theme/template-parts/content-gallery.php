<article id="post-<?php the_ID()?>" <?php post_class('post');?>>
    <header class="post__header">
        <?php if(sunset_retrive_pics()){
            $thumbnailurl= sunset_retrive_pics(7);
            
            }?>
        <div class="carusole">
            <button class="sunset-icon sunset-chevron-left carusole__btn carusole__btn--left carusole__btn--hide"></button>
            <div class="carusole__container">
                <ul class="carusole__track">
                    <?php $i=0; foreach($thumbnailurl as $url){$i++;
                    
                        $currentSlide = '';
                        if ($i == 1){$currentSlide = 'carusole__item--current';}
                        ?>
                    <li class="carusole__item <?php echo $currentSlide?>"
                        style="background-image:url('<?php echo wp_get_attachment_url($url->ID); ?>') ">
                    </li>
                    <?php } ?>
                </ul>
                <div class="carusole__nav">
                    <?php $i=0; foreach($thumbnailurl as $url){$i++;
                        $currentDot = '';
                        if ($i == 1){$currentDot = 'carusole__dot--current';}
                        ?>
                    <button class="carusole__dot <?php echo $currentDot?> "></button>
                    <?php } ?>

                </div>
            </div>
            <button class="sunset-icon sunset-chevron-right carusole__btn carusole__btn--right"></button>

        </div>
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