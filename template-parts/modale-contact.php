<!-- Ajout de la modale de contact -->

<div class="popup-overlay">
	<div class="popup-salon">
		<div class="popup-header">
			<h3><?php echo $titre; ?> </h3>
			<span class="popup-close"><i class="fa fa-times"></i></span>
		</div>
		<?php echo $description; ?>
		<div class="popup-details">
			<div class="popup-address">
				<p><b>Le lieu</b></p>
				<?php echo $lieu; ?>
				<a class="popup-link" href="<?php echo $lien; ?>" target="_blank">Voir sur Google Maps</a>
			</div>
			<div class="popup-address">
				<p><b>La date</b></p>
				<?php echo $date; ?>
			</div>
		</div>
		<p class="popup-informations">Vous souhaitez plus d'informations concernant cet événement ?</p>
		<?php
		// On insère le formulaire de demandes de renseignements
		echo do_shortcode('[contact-form-7 id="910" title="Formulaire salon New York"]');
		?>
	</div>
</div>

<!-- Code pour fermer la popup -->

<script>

jQuery('.popup-close').click(function(){
	jQuery(this).parent().parent().parent().hide();
});

</script>