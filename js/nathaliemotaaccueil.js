


(function ($) {
    // On récupère les valeurs des différentes variables
    let perDate = $('input[name=order-date]').val();
    console.log(perDate);
    let nbOfPosts = $('input[name=nb-posts]').val();
    nbOfPosts = parseInt(nbOfPosts);
    console.log(nbOfPosts);
    let nbNewPosts = $('input[name=nb-new-posts]').val();
    nbNewPosts = parseInt(nbNewPosts);
    console.log(nbNewPosts);
    let categorie = $('input[name=categorie]').val();
    console.log(categorie);
    let re = /\s*(,|$)\s*/;
    categorie = categorie.split(re);
    console.log(categorie);
    let format = $('input[name=format]').val();
    console.log(format);
    format= format.split(re);
    console.log(format);
    

    // Ajax pour photos catalogue
    $('#loadmore').on('click', function() {
        nbOfPosts = nbOfPosts + nbNewPosts;
        console.log(nbOfPosts);
        $('input[name=nb-posts]').val(nbOfPosts);
        $.ajax({
            type: 'POST',
            url: nathaliemotaaccueil_js.ajax_url,
            dataType: 'html',
            data: {
                action: 'nathaliemota_loadmore_photos',
                nbOfPosts: nbOfPosts,
                perDate : perDate,
                categorie: categorie, 
                format: format,
            },
            success: function (res) {
            $('.catalogue-photo-container').replaceWith(res);
            }
        });
    });


    // Tri des photos par date

    $(document).ready(function() {
        $("#tri-date-slct div").click(function(){
            perDate=(this.id);
            let selectLabel=$(this).html();
            $("#tri-date-text").html(selectLabel);
            $('input[name=order-date]').val(perDate);
            $("#tri-date-slct div").removeClass("div-selected");
            $(this).addClass("div-selected");
            $("#tri-date-label").removeClass("select-selected");
            $("#tri-date-slct").removeClass("slct-open");
            $.ajax({
                type: 'POST',
                url: nathaliemotaaccueil_js.ajax_url,
                dataType: 'html',
                data:  {
                    action: 'tri_par_date',
                    nbOfPosts: nbOfPosts,
                    perDate : perDate,
                    categorie: categorie, 
                    format: format,
                },
                success: function(res) {
                    console.log(res);
                    $('.catalogue-photo-container').replaceWith(res);
                }   
            });
        });
    });

    // Filtre selon catégorie
    $(document).ready(function(){
        $("#categorie-slct div").click(function(){
            categorie = (this.id);
            $("#categorie-label-text").html(categorie);
            $('input[name=categorie]').val(categorie);
            categorie = categorie.split(re);
            $("#categorie-slct div").removeClass("div-selected");
            $(this).addClass("div-selected");
            $("#categorie-label").removeClass("select-selected");
            $("#categorie-slct").removeClass("slct-open");
            $.ajax({
                type: 'POST',
                url: nathaliemotaaccueil_js.ajax_url,
                dataType: 'html',
                data:  {
                    action: 'filtre_categorie',
                    nbOfPosts: nbOfPosts,
                    perDate: perDate,
                    categorie: categorie, 
                    format: format,
                },
                success: function(res) {
                    console.log(res);
                    $('.catalogue-photo-container').replaceWith(res);
                }   
            });
        });
    });

    // Filtre selon format
    $(document).ready(function(){
        $("#format-slct div").click(function(){
            format = (this.id);
            console.log(format);
            $("#format-label-text").html(format);
            $('input[name=format]').val(format);
            format= format.split(re);
            console.log(format);
            $("#format-slct div").removeClass("div-selected");
            $(this).addClass("div-selected");
            $("#format-label").removeClass("select-selected");
            $("#format-slct").removeClass("slct-open");
            $.ajax({
                type: 'POST',
                url: nathaliemotaaccueil_js.ajax_url,
                dataType: 'html',
                data:  {
                    action: 'filtre_format',
                    nbOfPosts: nbOfPosts,
                    perDate: perDate,
                    categorie: categorie,
                    format: format,
                },
                success: function(res) {
                    console.log(res);
                    $('.catalogue-photo-container').replaceWith(res);
                }   
            });
        });
    });
})(jQuery);

// Ouverture des listes déroulantes pour tri par date
let selectDate = document.getElementById("tri-date-label");
let listDate = document.getElementById("tri-date-slct");
let triDateDiv = document.getElementById("tri-selects-div");

selectDate.onmouseover = function() {
    listDate.classList.add("slct-open");
    selectDate.classList.add("select-selected");
}
// Fermeture 
triDateDiv.onmouseleave = function() { 
        listDate.classList.remove("slct-open"); 
        selectDate.classList.remove("select-selected");       
}
// Ouverture des listes déroulantes pour filtre formats
let selectFormat = document.getElementById("format-label");
let listFormat = document.getElementById("format-slct");
let formatDiv = document.getElementById("format-select-wrapp");


formatDiv.onmouseover = function() {
    listFormat.classList.add("slct-open");
    selectFormat.classList.add("select-selected");
}
// Fermeture 
formatDiv.onmouseleave = function() { 
        listFormat.classList.remove("slct-open"); 
        selectFormat.classList.remove("select-selected");       
}
// Ouverture des listes déroulantes pour filtre catégories
let selectCategorie = document.getElementById("categorie-label");
let listCategorie = document.getElementById("categorie-slct");
let categorieDiv = document.getElementById("categorie-select-wrapp");


categorieDiv.onmouseover = function() {
    listCategorie.classList.add("slct-open");
    selectCategorie.classList.add("select-selected");
}
// Fermeture 
categorieDiv.onmouseleave = function() { 
        listCategorie.classList.remove("slct-open"); 
        selectCategorie.classList.remove("select-selected");       
}