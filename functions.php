<?php
/**** Ressources JS et CSS *****/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'nathaliemota',  get_stylesheet_uri(), array(), '1.0' );
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts(){
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/script.js', array(), false, true );
}

/**** Fonts ****/

function google_fonts() {
  wp_enqueue_style( 'nathaliemota-font', get_stylesheet_uri(), false );
}
add_action( 'wp_enqueue_scripts', 'google_fonts' );

 /****fonction création menu principal */

function register_my_menu(){
  register_nav_menu( 'main-menu', 'Menu principal' );
}
add_action( 'after_setup_theme', 'register_my_menu' );

?>