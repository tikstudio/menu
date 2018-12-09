jQuery(document).ready(function () {
    $_GET = {};
    var search = window.location.search.slice(1).split('&')
    for (var i in search) {
        var t = search[i].split('=');
        $_GET[t[0]] = decodeURIComponent(t[1]);
    }

    if ($_GET.alert) {
        var type = $_GET.type ? $_GET.type : 'info'
        window.history.pushState(null, null, window.location.origin + window.location.pathname)
        $.notify({
            icon: "add_alert",
            message: $_GET.alert
        }, {
            type: type,
            timer: 4000,
        });
    }

    $('[name="new_title"]').on('blur', function () {
        var text = $(this).val().toLowerCase();
        text = text.replace(/\W+/g, '_');
        if (!$('[name="new_slug"]').val()) {
            $('[name="new_slug"]').val(text).change();
        }
    });
    $('.check_box').click(function () {
        var text = '';
        $('.check_box:checked').each(function () {
            text += $(this).val() + " ";
        });

        text = text.substring(0, text.length - 1);
        $('#checkText').val(text);
        var count = $("[type='checkbox']:checked").length;
    })

    var ajax;
    var array_search = ['id', 'title', 'image', 'slug', 'status', 'sort', 'description', 'date', 'category'];
    array_search.forEach(function (elem) {

        $('#'+elem).keyup(function (ev) {
            ev.preventDefault();
            var txt = $(this).val();
            if (ajax) {
                ajax.abort()
            }
               ajax = $.ajax({
                url: '/post/search',
                method: "post",
                data: {
                    search: txt
                },
                dataType: "text",
            }).done(function (data) {
                $('.card-body').html(data);
            });

        })
    });


});