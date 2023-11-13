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

                </div>
                <div id="tri-selects-div">
                    
                        <select name="tri-date-select" id="tri-date-slct">
                        <option value="">Trier par</option>
                        <option value="DESC">Des plus récentes aux plus anciennes</option>
                        <option value="ASC">Des plus anciennes aux plus récentes</option>
                        </select> 
                    
                </div>
            </div>
            <div id="global-catalogue-container">
                <!-- Affichage des photos du catalogue -->
                <?php 
                $perDate= 'DESC'; // Ordre des photos selon leur date de prise de vue
                $nbOfPosts = 12; // Nombre de photos dans le catalogue
                $nbNewPosts = 2; // Nombre de nouvelles photos en cliquant
                $perPage = 12; 
                ?>
                <input type="hidden" name="order-date" value="<?php echo $perDate; ?>">
                <input type="hidden" name="nb-posts" value="<?php echo $nbOfPosts; ?>">
                <input type="hidden" name="nb-new-posts" value="<?php echo $nbNewPosts; ?>">
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