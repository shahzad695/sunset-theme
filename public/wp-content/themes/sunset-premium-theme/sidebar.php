<?php if ( !is_active_sidebar( 'sunset_main_sidebar' ) ) {
    return;
} ?>

<div id="secondary" class="sidebar__widget-area" role="complementary">
    <?php dynamic_sidebar( 'sunset_main_sidebar' ); ?>
</div>