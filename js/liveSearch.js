//<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
//<script type="text/javascript">
$(function () {
    $(".search").keyup(function () {
        var searchid = $(this).val();
        if (searchid != '') {

            var dataString = 'search=' + searchid;
            if (true || searchid != '') {
                $.ajax({
                    type: "POST",
                    url: "/php/liveSearchResult.php",
                    data: dataString,
                    cache: false,
                    success: function (html) {
                        $("#result").html(html).show();
                    }
                });
            }
        }
        return false;
    });

    jQuery("#result").live("click", function (e) {
        var $clicked = $(e.target);
        var $name = $clicked.find('.name').html();
        var decoded = $("<div>").html($name).text();
        $('#searchid').val(decoded);
    });
    jQuery(document).live("click", function (e) {
        var $clicked = $(e.target);
        if (!$clicked.hasClass("search")) {
            jQuery("#result").fadeOut();
        }
    });
    $('#searchid').click(function () {
        jQuery("#result").fadeIn();
    });
})
;
//</script>