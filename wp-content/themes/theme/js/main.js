// check and define $ as jQuery
if (typeof jQuery != "undefined") jQuery(function ($) {

    jQuery(document).ready(function( $ ) {
            $("#phone-menu").mmenu({
               "slidingSubmenus": false,
               "extensions": [
                  "pagedim-black",
                  "theme-dark"
               ]
            });
         });

    
    $( document ).ajaxComplete(function() {
        $('.wpcf7-response-output').append('<span class="response-close"><i class="fa fa-times" aria-hidden="true"></i></span>');
    });

    $('.wpcf7-response-output').on( "click", function(){
        $('.wpcf7-response-output').hide("slow");
    });

    //Function for add thousand delimeter
    function addCommas(nStr) {
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }

    function changePrice(){
        if($('input[name="stoimost_posobie"]').is(":checked")) {
            $('.price_value').each(function () {
                var dataPrice = $(this).data('price');
                var value = $(this).text();
                value = addCommas(dataPrice - posobie);

                $(this).text(value);
            });
        } else {
            $('.price_value').each(function () {
                $(this).text(addCommas($(this).data('price')));
            });
        }
    }

    /*Change price posobie*/
    var posobie = 5000; //Posobie value
    $('input[name="stoimost_posobie"]').change(function() {
        changePrice();
    });

    jQuery(document).ready(function( $ ) {
        changePrice();
    });

});


