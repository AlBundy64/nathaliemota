// script modale

// Get the modal
let modal = document.getElementById('contact-modal');

// Get the button that opens the modal
let btn = document.getElementById("contact-btn");

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "flex";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Modale depuis le bouton de contact de single-photos
// Get the button that opens the modal
let btnPhoto = document.getElementById("contact-btn-photo");
// On récupère le champ référence de la modale"
let inputRef = document.getElementById("ref-photo");
// puis la valeur voulue
let refValue= document.getElementById("ref").innerHTML;
//pour l'afficher dans le champ du formulaire
inputRef.value = refValue;


// When the user clicks on the button, open the modal
btnPhoto.onclick = function() {
    modal.style.display = "flex";
}
