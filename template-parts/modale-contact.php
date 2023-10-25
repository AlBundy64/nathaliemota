<!-- Ajout de la modale de contact -->
<!-- The Modal -->
<div id="contact-modal">

    <!-- Modal content -->
    <div class="modal-content">
        <h2 class="modal-title">
            <img id="contact-logo" src="<?php echo get_template_directory_uri() . '/assets/images/contact-logo.png';?>" alt="logo formulaire de contact Nathalie Mota, photographe"/>
        </h2>
        <?php
		// On insère le formulaire de demandes de renseignements
		echo do_shortcode('[contact-form-7 id="b3188e8" title="Formulaire de contact 1"]');
		?>
	</div>
</div>

		

