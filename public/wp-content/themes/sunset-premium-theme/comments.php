<?php
if(post_password_required()){
return;}?>

<div id="comments" class="post__comments">
    <?php if(have_comments()){?>
    <h2 class="post__comments-title">
        <?php printf(
                _nx('One comment on &ldquo;%2$s&rdquo;','%1$s comment on &ldquo;%2$s&rdquo;',get_comments_number(),'comments title'),
                number_format_i18n(get_comments_number()),
                get_the_title(),
            )?>
    </h2>
    <?php echo sunset_custom_comments_navigation(); ?>
    <ol class="post__comment-list">
        <?php 
                $args = [
                    'style' => 'ol',
                    'avatar' => 32
                ];
                wp_list_comments($args); ?>
    </ol>


    <?php } ?>

    <?php if(!comments_open()&& get_comments_number()){?>
    <p class="post__no-comments">Comments are closed</p>
    <?php }
    $fieds=[
        'author' =>
            '<div class="post__comments--field-cont"><label for="author">' . __( 'Name', 'domain' ). ' </label> <input class="post__comments--field" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" /></div>',
        'email' =>
            '<div class="post__comments--field-cont"><label for="email">' . __( 'Email', 'domain' ). '</label> <input class="post__comments--field" id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" /></div>',
        'url' =>
            '<div class="post__comments--field-cont"><label for="url">' . __( 'Website', 'domain' ) . '</label> <input class="post__comments--field" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>',
        
    ];
    $args = [
        'class_form' => 'post__comments--form',
        'class_submit' => 'btn post__comments--btn',
        'label_submit' => 'Submit Comment',
        'comment_field' => '<div class="post__comments--field-cont"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea class="post__comments--textarea id="comment" name="comment" rows="5" maxlength="65525" required="required"></textarea></div>',
        'fields' => apply_filters('comment_form_default_fields',$fieds)
    ];
    comment_form($args); ?>

</div>