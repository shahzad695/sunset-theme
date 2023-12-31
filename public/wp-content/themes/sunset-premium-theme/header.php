<html lang="<?php language_attributes(); ?>">

<head>
    <meta name="description" content="<?php bloginfo('description')?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('title');?> || <?php the_title(); ?></title>
    <?php wp_head();?>
</head>

<body <?php body_class()?>>
    <header class="header">
        <div class="header__image" style="background-image:url('<?php header_image()?>')">
        </div>
        <div class="header__content ">

            <h1 class="sunset-icon">
                <span class="sunset-logo"></span>
                <span class="hide"><?php bloginfo('name')?></span>
            </h1>
            <h2 class="header__descrip"><?php bloginfo('description')?></h2>
        </div>

        <nav class="header__nav">
            <?php wp_nav_menu([
                'theme_location' =>'primary',
                'container' =>false,
                'menu_class' =>'header__menu',
                
            ]);?>
        </nav>

    </header>