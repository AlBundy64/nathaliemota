<?php

get_header();
?>
<div id="accueil-container">
    <div id="hero">
    <?php 
    // Image aléatoire
        // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
        $args = array(
            'post_type' => 'photos',
            'posts_per_page' => 1,
            'orderby' => 'rand'                       
        );
        // 2. On exécute la WP Query
        $my_query = new WP_Query( $args );
        // 3. Boucle   
        if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();
            the_post_thumbnail();
            endwhile;
        endif;
        // 4. On réinitialise à la requête principale (important)
        wp_reset_postdata();
        ?>
        <div id="accueil-title-div">
            <h1>Photographe event</h1>
        </div>
    </div>
    <div id="catalogue-container">
            <div id="selects-div">               
                <div id="tax-selects-div">
                <?php   $categorie_list = get_terms('categorie');
                        $format_list = get_terms('format');
                        $types ='';
                        foreach($format_list as $format_single) {
                            $types .= ($format_single->name).', ';
                        }
                        $formatTypes = rtrim($types, ', ');
                        $types ='';
                        foreach($categorie_list as $categorie_single) {
                            $types .= ($categorie_single->name).', ';
                        }
                        $categorieTypes = rtrim($types, ', ');
                ?>      
                    
                    <div id="categorie-select-wrapp">
                        <div id="categorie-label" class="label-select"><div id="categorie-label-text">Catégories</div><img src="<?php echo get_template_directory_uri() . '/assets/images/chevron.png';?>" alt="image d'un chevron" ></div>
                        <div id="categorie-slct" class="div-hide select">
                             <?php   foreach($categorie_list as $categorie_single) {
                            ?>
                                <div id="<?php echo $categorie_single->name?>"><?php echo $categorie_single->name?></div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div id="format-select-wrapp">
                        <div id="format-label" class="label-select"><div id="format-label-text">Formats</div><img src="<?php echo get_template_directory_uri() . '/assets/images/chevron.png';?>" alt="image d'un chevron" ></div>
                        <div id="format-slct" class="div-hide select">
                             <?php   foreach($format_list as $format_single) {
                            ?>
                                <div id="<?php echo $format_single->name?>"><?php echo $format_single->name?></div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div id="tri-selects-div">
                        <div id="tri-date-label" class="label-select"><div id="tri-date-text">Trier par</div><img src="<?php echo get_template_directory_uri() . '/assets/images/chevron.png';?>" alt="image d'un chevron" ></div>
                        <div id="tri-date-slct" class="div-hide select">
                            <div id="DESC">Date décroissante</div>
                            <div id="ASC">Date croissante</div>
                        </div>
                    
                </div>
            </div>
            <div id="global-catalogue-container">
                <!-- Affichage des photos du catalogue -->
                <?php 
                $perDate= 'DESC'; // Ordre des photos selon leur date de prise de vue
                $nbOfPosts = 12; // Nombre de photos dans le catalogue
                $nbNewPosts = 12; // Nombre de nouvelles photos en cliquant              
                ?>
                <input type="hidden" name="order-date" value="<?php echo $perDate; ?>">
                <input type="hidden" name="nb-posts" value="<?php echo $nbOfPosts; ?>">
                <input type="hidden" name="nb-new-posts" value="<?php echo $nbNewPosts; ?>">
                <input type="hidden" name="categorie" value="<?php echo $categorieTypes; ?>">
                <input type="hidden" name="format" value="<?php echo $formatTypes; ?>">
                <?php 
                
                         
                // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
                $args2 = array(
                    'post_type' => 'photos',
                    'posts_per_page' => $nbOfPosts,
                    'order' => $perDate,
                    'orderby' => 'meta_value_num ID', // Rangé selon un champ personnalisé, puis par ID
                    'meta_key' => 'annee', // C'est ici qu'on indique quel est ce champ                 
                );
                // 2. On exécute la WP Query
                $my_query = new WP_Query( $args2 );
                // 3. Boucle   
                if( $my_query->have_posts() ) : ?>
                    <div class="catalogue-photo-container">
                        <?php
                        while( $my_query->have_posts() ) : $my_query->the_post();
                                get_template_part('template-parts/photo_block');
                            endwhile;
                        ?>
                    </div>
                <?php
                endif;
                // 4. On réinitialise à la requête principale (important)
                wp_reset_postdata();
                ?>
            </div>

            <button id="loadmore" class="btn">Charger plus</button>
    </div>
</div>
<?php
get_footer();
?>