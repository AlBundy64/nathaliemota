
// Ajax pour photos catalogue

(function ($) {
    let currentPage = 1;
    $('#loadmore').on('click', function() {
        currentPage++; // Do currentPage + 1, because we want to load the next page
        $.ajax({
            type: 'POST',
            url: nathaliemotaaccueil_js.ajax_url,
            dataType: 'html',
            data: {
                action: 'nathaliemota_loadmore_photos',
                paged: currentPage,
            },
            success: function (res) {
                console.log(res)
            $('.catalogue-photo-container').append(res);
            }
        });
    });
})(jQuery);