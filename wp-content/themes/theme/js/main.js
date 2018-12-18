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

});


