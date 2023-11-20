
<div class="lightbox">
    <div class="lightbox__close"></div>
    <div class="lightbox__prev"><div class="arrow"></div>Précédent</div>
    <div class="lightbox__container">
        <?php the_post_thumbnail();?>
    </div>
    <div class="lightbox__next">Suivant<div class="arrow"></div></div>
    <div class="infos">
        <div class="ref-div"><?php echo $reference; ?></div>
        <div class="cat-div"><?php echo $categorie; ?></div>
    </div>
</div>
