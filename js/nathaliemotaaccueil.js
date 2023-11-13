
// Ajax pour photos catalogue

(function ($) {
    let perDate = $('input[name=order-date]').val();
    console.log(perDate);
    let nbOfPosts = $('input[name=nb-posts]').val();
    nbOfPosts = parseInt(nbOfPosts);
    console.log(nbOfPosts);
    let nbNewPosts = $('input[name=nb-new-posts]').val();
    nbNewPosts = parseInt(nbNewPosts);
    console.log(nbNewPosts);

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
                },
                success: function(res) {
                    console.log(res);
                    $('.catalogue-photo-container').replaceWith(res);
                }   
            });
        });
    });
})(jQuery);

