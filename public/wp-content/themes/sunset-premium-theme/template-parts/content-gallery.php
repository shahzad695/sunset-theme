<article id="post-<?php the_ID()?>" <?php post_class('post');?>>
    <header class="post__header">
        <?php if(sunset_retrive_pics()){
            $thumbnailurl= sunset_retrive_pics(7);
            }?>
        <div class="carusole">
            <div class="carusole__btn-container">
                <span class="carusole__btn-thumb carusole__btn-thumb--left"></span>
                <button class="sunset-icon sunset-chevron-left carusole__btn carusole__btn--left carusole__btn--hide"></button>
            </div>
            <div class="carusole__container">
                <ul class="carusole__track">
                    <?php 
                        
                        $count = count($thumbnailurl)-1;
                    for ($i=0; $i <= $count; $i++){
                        $prevNum =($i==0) ? $count : $i-1;
                        $prevThumbUrl = $thumbnailurl[$prevNum];
                        $nextNum = ($i == $count) ? 0 : $i+1;
                        $nextThumbUrl = $thumbnailurl[$nextNum];
                        
                        $currentSlide = '';
                        if ($i == 0){$currentSlide = 'carusole__item--current';}
                        ?>
                    <li class="carusole__item <?php echo $currentSlide?>"
                        data-previmage="<?php echo wp_get_attachment_thumb_url($prevThumbUrl->ID);?>"
                        data-nextimage="<?php echo wp_get_attachment_thumb_url($nextThumbUrl->ID);?>"
                        style="background-image:url('<?php echo wp_get_attachment_url($thumbnailurl[$i]->ID); ?>') ">
                    </li>
                    <summary class="post__excerpt post__excerpt--gallery">
                        <?php echo $thumbnailurl[$i]->post_excerpt;?>
                    </summary>
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
            <div class="carusole__btn-container">
                <span class="carusole__btn-thumb carusole__btn-thumb--right"></span>
                <button class="sunset-icon sunset-chevron-right carusole__btn carusole__btn--right"></button>
            </div>
        </div>
        <?php the_title('<h1 class="post__title"><a href="'.get_permalink().'" class="link">', '</a></h1>');
        ?>
        <div class="post__meta">
            <?php echo sunset_post_meta(); ?>
        </div>
    </header>
    <div class="post__content">



        <a href="<?php the_permalink();?>" class="link link--btn btn ">Read More</a>

    </div>
    <footer class="post__footer">
        <?php echo sunset_footer_info();?>

    </footer>
</article>