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
        
            <?php 
            $perPage = 12;
            
            // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
            $args2 = array(
                'post_type' => 'photos',
                'posts_per_page' => $perPage,
                'paged' => 1,                 
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

            <button id="loadmore" class="btn">Charger plus</button>
    </div>
</div>
<?php
get_footer();
?>