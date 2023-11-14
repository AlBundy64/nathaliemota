


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
        $("#tri-date-slct").change(function(){
            perDate=$('#tri-date-slct option:selected').val();
            $('input[name=order-date]').val(perDate);
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
        $("#categorie-slct").change(function(){
            categorie = $('#categorie-slct option:selected').val();
            $('input[name=categorie]').val(categorie);
            categorie = categorie.split(re);
            console.log(categorie);
            console.log(format);
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
        $("#format-slct").change(function(){
            format = $('#format-slct option:selected').val();
            $('input[name=format]').val(format);
            format= format.split(re);
            console.log(format);
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

