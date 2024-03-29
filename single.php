<?php
/**
 * Template Name: Single Template
 */

get_header();
?>

<!-- /* Start the Loop */ -->
<div class="main single">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="post">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <p class="post-info">
          Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
        </p>
        <div class="">
          <?php the_content(); ?>
        </div>
        <div class="post-comments">
          <?php comments_template(); ?>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
<!-- // End of the loop. -->
<?php
get_footer();
?>
