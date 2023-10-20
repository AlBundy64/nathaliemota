<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Nathalie Mota</title>
        <?php wp_head(); ?>
    </head>
<body>
    <header>
        <div id="nav-bar">
            <img id="logo-nav" src= "<?php echo get_template_directory_uri() . '/assets/images/logo.png';?>" alt="logo du site Nathalie Mota">
            <nav id="navigation">
                <?php
                wp_nav_menu(
                array(
                    'theme_location' => 'main-menu',
                    'menu_id' => 'primary-menu',
                )
                );
                ?>
            </nav>
        </div>
    </header>