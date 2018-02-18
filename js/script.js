(function ($) {
    $(document).ready(function () {
        $('form').submit(function (e) {
            e.preventDefault();
            var a = $(this).serialize();
            $.ajax({
                type: "POST",
                cache: false,
                url: 'shorturl.php',
                data: a,
                success:
                    function (data) {
                        var old_result = $('#result').children();
                        if (old_result[0]) {
                            old_result.remove();
                        }
                        $('#result').append("<span>" + data + "</span>");
                    }
            })
            ;
        });
    });
})(jQuery);