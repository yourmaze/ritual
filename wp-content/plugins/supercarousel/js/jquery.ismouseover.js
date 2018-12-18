//jQuery ismouseover  method
(function($){ 
    $.mlp = {x:0,y:0}; // Mouse Last Position
    function documentHandler(){
        //var $current = this === document ? $(this) : $(this).contents();
        var $current = $(this);
        $current.mousemove(function(e){jQuery.mlp = {x:e.pageX,y:e.pageY}});
        //$current.find("iframe").load(documentHandler);
    }
    $(documentHandler);
    $.fn.ismouseover = function(overThis) {  
        var result = false;
        this.eq(0).each(function() {  
                //var $current = $(this).is("iframe") ? $(this).contents().find("body") : $(this);
                var $current = $(this);
                var offset = $current.offset();             
                result =    offset.left<=$.mlp.x && offset.left + $current.outerWidth() > $.mlp.x &&
                            offset.top<=$.mlp.y && offset.top + $current.outerHeight() > $.mlp.y;
        });  
        return result;
    };  
})(jQuery);