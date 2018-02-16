(function($) {
    $(document).ready(function() {
        $('form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type     : "POST",
                cache    : false,
                url      : 'shorturl.php',
                data     : $(this).serialize(),
                success  : function(data) {
                    var element = document.getElementById("result");
                    var old_result = element.childNodes;
                   if (typeof old_result[0] !== 'undefined'){
                       old_result[0].parentNode.removeChild(old_result[0]);
                   }
                    var result = document.createElement("span");
                    var node = document.createTextNode(data);
                    result.appendChild(node);
                    element.appendChild(result);
                }
            });
        });
    });
})(jQuery);