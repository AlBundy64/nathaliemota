
    <div class="photo-container photo-for-lightbox">
        <?php the_post_thumbnail();?>
        <div class="hover">
            <?php   
                    $reference=get_field('reference');
                    $categorie_list = get_the_terms($post->ID, 'categorie'); //pour la taxonomie catégorie
                    $types ='';
                    foreach($categorie_list as $categorie_single) {
                        $types .= ucfirst($categorie_single->name).', ';
                    }
                    $categorie = rtrim($types, ', ');
                    $post_slug = get_post_field( 'post_name', get_post() );
            ?>
            <div class="lien-lightbox">
                <div class="button-lightbox">                    
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-fullscreen.png';?>" alt="icone lien lightbox">
                </div>
            </div>
            <div class="lien-photo">
                <div>
                    <a href="http://localhost/nathalie-mota/photos/<?php echo $post_slug;?>">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-eye.png';?>" alt="icone lien page photo">
                    </a>
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