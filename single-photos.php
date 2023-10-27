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
        

        ?>

        <div class="post-content">
          <!-- Bloc infos -->
          <h1 class="post-title"><?php the_title(); ?></h1>
          <p class="post-info">
            Référence : <?php echo $reference; ?> </br>
            Type : <?php echo $type; ?> </br>
            Année : <?php echo $annee; ?> </br>
            Catégorie : <?php echo $categorie->slug;?>
          </p>
          <!-- Bloc photo -->
          <div class="">
            <?php the_content(); ?>
          </div>
          <!-- Bloc cta et nav -->
          <div class="post-comments">
            <?php comments_template(); ?>
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
