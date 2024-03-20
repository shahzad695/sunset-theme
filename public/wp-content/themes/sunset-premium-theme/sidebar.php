<?php if ( !is_active_sidebar( 'sunset_main_sidebar' ) ) {
    return;
} ?>

<aside id="secondary" class="sidebar__widget-area" role="complementary">
    <?php dynamic_sidebar( 'sunset_main_sidebar' ); ?>
</aside>