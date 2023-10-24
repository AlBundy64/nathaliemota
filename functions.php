<?php
/**** Ressources JS et CSS *****/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'nathaliemota',  get_stylesheet_uri(), array(), '1.0' );
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts(){
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array(), false, true );
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

/**** création bouton de contact dans menu principal */
function contact_btn( $items, $args ) {
  if( $args->theme_location == 'main-menu' ){
    $items .= '	<li id="contact-btn-li">'
                    .'<div class="contact-btn">Nous contacter</div>'
                .'</li>';
  }
  return $items;
}

add_filter( 'wp_nav_menu_items', 'contact_btn', 10, 2 );

 /****fonction création menu footer */

 function register_my_footer_menu(){
  register_nav_menu( 'footer-menu', 'Menu pied de page' );
}
add_action( 'after_setup_theme', 'register_my_footer_menu' );
?>