var url = 'http://proyecto-laravel.com.devel';
window.addEventListener("load", function () {

    $('.btn-dislike').css('cursor', 'pointer');
    $('.btn-like').css('cursor', 'pointer');
    // Boton de like
    function dislike() {
        $('.btn-like').unbind('click').click(function () {
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).addClass('heart-black').removeClass('heart-red');
            $.ajax({
                url: url + '/dislike/' + $(this).data('id'),
                type: 'GET',
                success: function (response) {
                    if (response.like) {
                        console.log('has dado dislike');
                    } else {
                        console.log('error dislike');
                    }
                }
            });
            like();
        });
    }
    function like() {
        $('.btn-dislike').unbind('click').click(function () {
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).addClass('heart-red').removeClass('heart-black');
            $.ajax({
                url: url + '/like/' + $(this).data('id'),
                type: 'GET',
                success: function (response) {
                    if (response.like) {
                        console.log('has dado like');
                    } else {
                        console.log('error like');
                    }
                }
            });
            dislike();
        });

    }
    like();
    dislike();
    //Buscador

    $('#buscador').submit(function (e) {
        subcadena = $('#buscador #search').val();
        $(this).attr('action', url + '/gente/' + subcadena);
    })
});

