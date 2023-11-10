<?php
/**** Ressources JS et CSS *****/
function nathaliemota_register_assets(){
    wp_enqueue_style( 'nathaliemota',  get_stylesheet_uri(), array(), '1.0' );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array(), false, true );


if (is_front_page()){
    wp_enqueue_script('nathaliemotaaccueil', get_template_directory_uri() . '/js/nathaliemotaaccueil.js', array('jquery'), '1.0.0', true);
    wp_localize_script('nathaliemotaaccueil', 'nathaliemotaaccueil_js', array('ajax_url' => admin_url('admin-ajax.php')));
  }
}

add_action( 'wp_enqueue_scripts', 'nathaliemota_register_assets' );
  


  
  
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
                    .'<div id="contact-btn">Nous contacter</div>'
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

/**** fonction charger plus catalogue ****/

add_action( 'wp_ajax_nathaliemota_loadmore_photos', 'nathaliemota_loadmore_photos' );
add_action( 'wp_ajax_nopriv_nathaliemota_loadmore_photos', 'nathaliemota_loadmore_photos' );

function nathaliemota_loadmore_photos(){
            $perPage = 12;
            
            // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
            $args2 = array(
                'post_type' => 'photos',
                'posts_per_page' => $perPage,
                'paged' => $_POST['paged'],                 
            );
            // 2. On exécute la WP Query
            $ajaxPosts = new WP_Query( $args2 );
            $response = '';
            // 3. Boucle   
            if( $ajaxPosts->have_posts() ) {
                    while( $ajaxPosts->have_posts() ) : $ajaxPosts->the_post();
                      $response .= get_template_part('template-parts/photo_block');
                    endwhile;
                }else{
                  $response = '';
                }
                echo $response;
                exit;
}


?>

