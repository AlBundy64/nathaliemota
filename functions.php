<?php
/**** Ressources JS et CSS *****/
function nathaliemota_register_assets(){
    wp_enqueue_style( 'nathaliemota',  get_stylesheet_uri(), array(), '1.0' );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array('jquery'), false, true );

if (is_front_page()){
    wp_enqueue_script('nathaliemotaaccueil', get_template_directory_uri() . '/js/nathaliemotaaccueil.js', array('jquery'), '1.0.0', true);
    wp_localize_script('nathaliemotaaccueil', 'nathaliemotaaccueil_js', array('ajax_url' => admin_url('admin-ajax.php')));
  }
}

add_action( 'wp_enqueue_scripts', 'nathaliemota_register_assets' );

  
/**** Fonts ****/

// function google_fonts() {
//   wp_enqueue_style( 'nathaliemota-font', get_stylesheet_uri(), false );
// }
// add_action( 'wp_enqueue_scripts', 'google_fonts' );

 /****fonction création menu principal */

function register_my_menu(){
  register_nav_menu( 'main-menu', 'Menu principal' );
}
add_action( 'after_setup_theme', 'register_my_menu' );

/**** création bouton de contact dans menu principal */
function contact_btn( $items, $args ) {
  if( $args->theme_location == 'main-menu' ){
    $items .= '	<li id="contact-btn-li">'
                    .'<div id="contact-btn">Contact</div>'
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
            
            
            // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
            $args2 = array(
                'post_type' => 'photos',
                'posts_per_page' => $_POST['nbOfPosts'],
                'order' => $_POST['perDate'],
                'orderby' => 'meta_value_num ID', // Rangé selon un champ personnalisé, puis par ID
                'meta_key' => 'annee', // C'est ici qu'on indique quel est ce champ 
                'tax_query' => [
                  [
                    'taxonomy' => 'categorie',
                    'field' => 'slug',
                    'terms' => $_POST['categorie'],
                  ],
                  [
                    'taxonomy' => 'format',
                    'field' => 'slug',
                    'terms' => $_POST['format'],
                  ]
                ]                                  
            );
            // 2. On exécute la WP Query
            $ajaxPosts = new WP_Query( $args2 );
            $response = '';
            // 3. Boucle   
            if( $ajaxPosts->have_posts() ) {?>
              <div class="catalogue-photo-container">
                  <?php 
                    while( $ajaxPosts->have_posts() ) : $ajaxPosts->the_post();
                      $response .= get_template_part('template-parts/photo_block');
                    endwhile;
                    ?>
              </div>
            <?php
            }else{
              $response = '<div class="catalogue-photo-container"></div>';
            }
            echo $response;
            exit;
            wp_reset_postdata();
}

/**** Fonction tri par date ****/

add_action( 'wp_ajax_tri_par_date', 'tri_par_date' );
add_action( 'wp_ajax_nopriv_tri_par_date', 'tri_par_date' );

function tri_par_date(){
            
              // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
              $args2 = array(
                  'post_type' => 'photos',
                  'posts_per_page' => $_POST['nbOfPosts'],                  
                  'order' => $_POST['perDate'],
                  'orderby' => 'meta_value_num ID', // Rangé selon un champ personnalisé, puis par ID
                  'meta_key' => 'annee', // C'est ici qu'on indique quel est ce champ
                  'tax_query' => [
                    [
                      'taxonomy' => 'categorie',
                      'field' => 'slug',
                      'terms' => $_POST['categorie'],
                    ],
                    [
                      'taxonomy' => 'format',
                      'field' => 'slug',
                      'terms' => $_POST['format'],
                    ]
                  ]                             
              );
              // 2. On exécute la WP Query
              $ajaxPosts = new WP_Query( $args2 );
              $response = '';
              // 3. Boucle   
              if( $ajaxPosts->have_posts() ) {?>
                <div class="catalogue-photo-container">
                    <?php 
                      while( $ajaxPosts->have_posts() ) : $ajaxPosts->the_post();
                        $response .= get_template_part('template-parts/photo_block');
                      endwhile;
                      ?>
                </div>
              <?php
              }else{
                    $response = '<div class="catalogue-photo-container"></div>';
                  }
                  echo $response;
                  exit;
                  wp_reset_postdata();
}

/**** Fonction filtre par catégorie ****/

add_action( 'wp_ajax_filtre_categorie', 'filtre_categorie' );
add_action( 'wp_ajax_nopriv_filtre_categorie', 'filtre_categorie' );

function filtre_categorie(){
            
              // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
              $args2 = array(
                  'post_type' => 'photos',
                  'posts_per_page' => $_POST['nbOfPosts'],                  
                  'order' => $_POST['perDate'],
                  'orderby' => 'meta_value_num ID', // Rangé selon un champ personnalisé, puis par ID
                  'meta_key' => 'annee', // C'est ici qu'on indique quel est ce champ     
                  'tax_query' => [
                    [
                      'taxonomy' => 'categorie',
                      'field' => 'slug',
                      'terms' => $_POST['categorie'],
                    ],
                    [
                      'taxonomy' => 'format',
                      'field' => 'slug',
                      'terms' => $_POST['format'],
                    ]
                  ]                
              );
              // 2. On exécute la WP Query
              $ajaxPosts = new WP_Query( $args2 );
              $response = '';
              // 3. Boucle   
              if( $ajaxPosts->have_posts() ) {?>
                <div class="catalogue-photo-container">
                    <?php 
                      while( $ajaxPosts->have_posts() ) : $ajaxPosts->the_post();
                        $response .= get_template_part('template-parts/photo_block');
                      endwhile;
                      ?>
                </div>
              <?php
              }else{
                    $response = '<div class="catalogue-photo-container"></div>';
                  }
                  echo $response;
                  exit;
                  wp_reset_postdata();
}

/**** Fonction filtre par format ****/

add_action( 'wp_ajax_filtre_format', 'filtre_format' );
add_action( 'wp_ajax_nopriv_filtre_format', 'filtre_format' );

function filtre_format(){
            
              // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
              $args2 = array(
                  'post_type' => 'photos',
                  'posts_per_page' => $_POST['nbOfPosts'],                  
                  'order' => $_POST['perDate'],
                  'orderby' => 'meta_value_num ID', // Rangé selon un champ personnalisé, puis par ID
                  'meta_key' => 'annee', // C'est ici qu'on indique quel est ce champ     
                  'tax_query' => [
                    [
                      'taxonomy' => 'categorie',
                      'field' => 'slug',
                      'terms' => $_POST['categorie'],
                    ],
                    [
                      'taxonomy' => 'format',
                      'field' => 'slug',
                      'terms' => $_POST['format'],
                    ]
                  ]                
              );
              // 2. On exécute la WP Query
              $ajaxPosts = new WP_Query( $args2 );
              $response = '';
              // 3. Boucle   
              if( $ajaxPosts->have_posts() ) {?>
                <div class="catalogue-photo-container">
                    <?php 
                      while( $ajaxPosts->have_posts() ) : $ajaxPosts->the_post();
                        $response .= get_template_part('template-parts/photo_block');
                      endwhile;
                      ?>
                </div>
              <?php
              }else{
                $response = '<div class="catalogue-photo-container"></div>';
              }
                  echo $response;
                  exit;
                  wp_reset_postdata();
}
?>

