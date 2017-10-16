var resizeTagline = function($){
    var width = 0;
    $(".custom-logo").each(function(){
        width = $(this).width();
    });
    if(width > 0)$("#sewchic-tagline").css('max-width', width);
}

jQuery(document).ready(function(){
    //resizeTagline(jQuery);
});



