<?php
/**
 * Template Name: Single-photos Template
 */

get_header();
?>

<!-- /* Start the Loop */ -->
<div class="main single">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="post">
        <!-- zone de contenu -->

        <?php
        // On récupère les champs ACF nécessaires
        $reference=get_field('reference');
        $type=get_field('type');
        $annee=get_field('annee');
        $categorie_list = get_the_terms($post->ID, 'categorie'); //pour la taxonomie catégorie
        $types ='';
        foreach($categorie_list as $categorie_single) {
            $types .= ucfirst($categorie_single->name).', ';
        }
        $categorie = rtrim($types, ', ');
        $format_list = get_the_terms($post->ID, 'format'); //pour la taxonomie format
        $types ='';
        foreach($format_list as $format_single) {
            $types .= ($format_single->name).', ';
        }
        $format = rtrim($types, ', ');

        ?>

        <div class="post-content for-lightbox-content">
          <div class="info-photo-bloc">
            <!-- Bloc infos -->
            <div id="info-bloc">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <p class="post-info">
                  Référence : <span id="ref"><?php echo $reference; ?> </span> </br>
                  Catégorie : <?php echo $categorie ?> </br>
                  Format : <?php echo $format?> </br>
                  Type : <?php echo $type; ?> </br>
                  Année : <?php echo $annee; ?>             
                </p>
            </div>
            <!-- Bloc photo -->
            <div id="photo-bloc" class="photo-for-lightbox">
              <?php the_post_thumbnail();?>
              <div class="hover">
                <div class="lien-lightbox">
                  <div class="button-lightbox">                      
                          <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-fullscreen.png';?>" alt="icone lien lightbox">
                  </div>
                </div>
                <div class="infos">
                <div class="ref-div ref-for-lightbox"><?php echo $reference; ?>
                </div>
                <div class="cat-div cat-for-lightbox"><?php echo $categorie; ?>
                </div>
            </div>
              </div>
            </div>
          </div> 
          <!-- Bloc cta et nav -->
          <div id="photo-cta-bloc">    
            <div id="cta-div">
              <p>Cette photo vous intéresse?</p>
              <button id="contact-btn-photo" class="btn">Contact</button>
            </div>
            <div id="photo-nav-div">
              <div id="photo-nav-wrap">
                <div id="photo-nav-container-wrap">
                  <div id="photo-nav-container"> <!-- Container où apparaît la mignature du post précédent -->
                  </div>
                  <div id="photo-nav-container-next"> <!-- Container où apparaît la mignature du post suivant -->
                  </div>
                </div>
                <div id="arrow-nav">
                  <div id="arrow-prev">
                  <?php 
                      // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
                      $args1 = array(
                          'post_type' => 'photos',
                          'posts_per_page' => -1,
                          'order' => 'DESC',
                          'orderby' => 'meta_value_num ID', // Rangé selon un champ personnalisé
                          'meta_key' => 'annee', // C'est ici qu'on indique quel est ce champ
                          
                      );
                      $id_photo2 = 0;
                      $current_post_slug = get_post_field( 'post_name', get_post() );
                      // 2. On exécute la WP Query
                      $my_query = new WP_Query( $args1 );
                      
                    if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
                        $post_slug = get_post_field( 'post_name', get_post() );
                        $id_photo2 = $id_photo2 + 1;
                        if ($current_post_slug == $post_slug){
                          $current_photo_id2 = $id_photo2;
                          
                        }
                        if ($id_photo2 == $current_photo_id2 +1 && $id_photo2 != 1){
                          ?>
                          <div id="photo-prev-div" class=""> <?php the_post_thumbnail('thumbnail');?> </div>
                          <a href="http://localhost/nathalie-mota/photos/<?php echo $post_slug;?>">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/big-nav-arrow-left.png';?>" alt="image d'une fleche de navigation"/>
                          </a>
                          <?php
                        }
                      endwhile;
                    endif;
                    // 4. On réinitialise à la requête principale (important)
                    wp_reset_postdata();
                    ?>
                  </div>
                  <div id="arrow-next">
                  <?php 
                      // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
                      $args2 = array(
                          'post_type' => 'photos',
                          'posts_per_page' => -1,
                          'order' => 'ASC',
                          'orderby' => 'meta_value_num ID', // Rangé selon un champ personnalisé
                          'meta_key' => 'annee', // C'est ici qu'on indique quel est ce champ
                          
                      );
                      $id_photo = 0;
                      $current_post_slug = get_post_field( 'post_name', get_post() );
                      // 2. On exécute la WP Query
                      $my_query = new WP_Query( $args2 );
                      
                    if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
                        $post_slug = get_post_field( 'post_name', get_post() );
                        $id_photo = $id_photo + 1;
                        if ($current_post_slug == $post_slug){
                          $current_photo_id = $id_photo;
                        }
                        if ($id_photo == $current_photo_id +1 && $id_photo != 1){
                          ?>
                          <div id="photo-next-div" class=""> <?php the_post_thumbnail('thumbnail');?> </div>
                          <a href="http://localhost/nathalie-mota/photos/<?php echo $post_slug;?>">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/big-nav-arrow-right.png';?>" alt="image d'une fleche de navigation"/>
                          </a>
                          <?php 
                        }
                      endwhile;
                    endif;
                    // 4. On réinitialise à la requête principale (important)
                    wp_reset_postdata();
                    ?>
                    
                  </div>
                </div>
              </div>
             
            </div>
          </div>
          <!-- zone de photos apparentées -->
          <?php 
            // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
            $args3 = array(
                'post_type' => 'photos',
                'post__not_in' => [get_the_ID()],
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'tax_query' => [
                  [
                    'taxonomy' => 'categorie',
                    'field' => 'slug',
                    'terms' => $categorie
                  ]
                ]
            );

            // 2. On exécute la WP Query
            $my_query = new WP_Query( $args3 );
            ?>

          <div id="photos-apparentees">
            <h2>Vous aimerez aussi</h2>
            <div class="photo-bloc-dbl">
            <?php
            // 3. On lance la boucle !
            if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
              get_template_part('template-parts/photo_block');
              endwhile;
            endif;
            
            // 4. On réinitialise à la requête principale (important)
            wp_reset_postdata();
            ?>
            </div>
            <div class="charger-div">
              <button class="btn">Toutes les photos</button>
            </div>
          </div>
        </div>
        
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
<!-- // End of the loop. -->
<?php
get_footer();
?>
