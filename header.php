<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Nathalie Mota</title>
        <?php wp_head(); ?>
    </head>
<body>
    <div class="page">
        <header>
            <div id="nav-bar">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img id="logo-nav" src= "<?php echo get_template_directory_uri() . '/assets/images/logo.png';?>" alt="logo du site Nathalie Mota">
                </a>
                <nav id="navigation">
                    <button class="menu-toggle">
                        <img id="icon-menu" src= "<?php echo get_template_directory_uri() . '/assets/images/icon-menu.png';?>" alt="icone du menu">
                    </button>
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