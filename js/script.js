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


// Navigation single-photos
// On récupère les photos dans la bonne div
let imgNav = document.getElementById("photo-prev-div").innerHTML;
let imgContainer = document.getElementById("photo-nav-container");
imgContainer.innerHTML = imgNav;


let imgNavNext = document.getElementById("photo-next-div").innerHTML;
let imgContainerNext = document.getElementById("photo-nav-container-next");
imgContainerNext.innerHTML = imgNavNext;

// On les fait apparaitre au survol des flèches de navigation
let arrowPrev = document.getElementById("arrow-prev");
let arrowNext = document.getElementById("arrow-next");

arrowPrev.onmouseover = function() {
    imgContainer.style.display = "flex";
}
arrowNext.onmouseover = function() {
    imgContainerNext.style.display = "flex";
}
// Et on les fait disparaitre
arrowPrev.onmouseout = function() {
    imgContainer.style.display = "none";
}
arrowNext.onmouseout = function() {
    imgContainerNext.style.display = "none";
}



