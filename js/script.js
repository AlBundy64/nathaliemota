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
let footer = document.getElementById('footer')
footer.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


// Modale depuis le bouton de contact de single-photos
// Get the button that opens the modal
if (document.getElementById("contact-btn-photo")){
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
}





// Navigation single-photos
// On récupère les photos dans la bonne div
if (document.getElementById("photo-prev-div")){
    let imgNav = document.getElementById("photo-prev-div").innerHTML;
    let imgContainer = document.getElementById("photo-nav-container");
    imgContainer.innerHTML = imgNav;
    // On les fait apparaitre au survol des flèches de navigation
    let arrowPrev = document.getElementById("arrow-prev");
    arrowPrev.onmouseover = function() {
        imgContainer.style.display = "flex";
    }
    // Et on les fait disparaitre
    arrowPrev.onmouseout = function() {
        imgContainer.style.display = "none";
    }
}

if (document.getElementById("photo-next-div")){
    let imgNavNext = document.getElementById("photo-next-div").innerHTML;
    let imgContainerNext = document.getElementById("photo-nav-container-next");
    imgContainerNext.innerHTML = imgNavNext;
    // On les fait apparaitre au survol des flèches de navigation
    let arrowNext = document.getElementById("arrow-next");
    arrowNext.onmouseover = function() {
        imgContainerNext.style.display = "flex";
    }
    // Et on les fait disparaitre
    arrowNext.onmouseout = function() {
        imgContainerNext.style.display = "none";
    }
}

// script menu max 768px

const menuToggle = document.querySelector('.menu-toggle');
const divLiensMenu = document.querySelector('.menu-menu-header-container');
const contactBtn = document.getElementById('contact-btn');


menuToggle.addEventListener('click',function(){
    menuToggle.classList.toggle("menu-toggle-open");
    divLiensMenu.classList.toggle('menu-open');
    
});

contactBtn.addEventListener('click', function(){
    menuToggle.classList.remove("menu-toggle-open");
    divLiensMenu.classList.remove('menu-open');
});

// lightbox

(function($){
    $(".for-lightbox-content").on("click", ".button-lightbox ", function(e){
        document.querySelector('.lightbox').classList.remove("lightbox-hidden");
        const lightboxLinks = Array.from(document.querySelectorAll('.button-lightbox > img'));        
        const lightboxPhotos = Array.from(document.querySelectorAll('.photo-for-lightbox > img'));
        const lightboxReferences = Array.from(document.querySelectorAll('.photo-for-lightbox .ref-for-lightbox'));
        const lightboxCategories = Array.from(document.querySelectorAll('.photo-for-lightbox .cat-div'));
        let indexArrays = lightboxLinks.indexOf(e.target);   

        function afficherLightbox (){
            let lightboxPhoto = lightboxPhotos[indexArrays];
            
            let photo = document.createElement('img');
            document.querySelector('.lightbox__container').innerHTML='';
            document.querySelector('.lightbox__container').appendChild(photo);
            photo.src=lightboxPhoto.src;

            let lightboxRef = lightboxReferences[indexArrays];
            document.querySelector('.lightbox-ref-div').innerHTML='';
            document.querySelector('.lightbox-ref-div').innerHTML = lightboxRef.innerHTML;

            let lightboxCat = lightboxCategories[indexArrays];
            document.querySelector('.lightbox-cat-div').innerHTML='';
            document.querySelector('.lightbox-cat-div').innerHTML = lightboxCat.innerHTML;
        }
        afficherLightbox();

        const lightboxNext = document.querySelector('.lightbox__next');
        lightboxNext.addEventListener('click', function(){
            if (indexArrays === lightboxLinks.length -1){
                indexArrays = -1;
            }
            indexArrays = indexArrays + 1;
            afficherLightbox();
        })

        const lightboxPrev = document.querySelector('.lightbox__prev');
        lightboxPrev.addEventListener('click', function(){
            if (indexArrays === 0){
                indexArrays = lightboxLinks.length
            }
            indexArrays = indexArrays - 1;
            afficherLightbox();
        })
    
    })
    
    document.querySelector('.lightbox__close').onclick = function (){
        document.querySelector('.lightbox').classList.add("lightbox-hidden");
    }
    
}
)(jQuery);



