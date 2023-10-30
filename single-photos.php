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
            $types .= ucfirst($format_single->name).', ';
        }
        $format = rtrim($types, ', ');

        ?>

        <div class="post-content">
          <div class="info-photo-bloc">
            <!-- Bloc infos -->
            <div id="info-bloc">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <p class="post-info">
                  Référence : <?php echo $reference; ?> </br>
                  Catégorie : <?php echo $categorie ?> </br>
                  Format : <?php echo $format?> </br>
                  Type : <?php echo $type; ?> </br>
                  Année : <?php echo $annee; ?>             
                </p>
            </div>
            <!-- Bloc photo -->
            <div id="photo-bloc">
              <?php the_post_thumbnail(); ?>
            </div>
          </div> 
          <!-- Bloc cta et nav -->
          <div id="photo-cta-bloc">
            <div id="cta-div">
              <p>Cette photo vous intéresse?</p>
              <button>Contact</button>
            </div>
            <div id="photo-nav-div">
              <div id="photo-nav-wrap">
                <div id="img-nav">
                  <?php the_post_thumbnail('thumbnail'); ?>
                </div>
                <div id="arrow-nav">
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/nav-arrow-left.png';?>" alt="image d'une fleche de navigation"/>
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/nav-arrow-right.png';?>" alt="image d'une fleche de navigation"/>
                </div>
              </div>
            </div>
          </div>
         </div>
        <!-- zone de photos apparentées -->
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
<!-- // End of the loop. -->
<?php
get_footer();
?>
