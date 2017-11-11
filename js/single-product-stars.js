var setUpStars = function($){
    $("p.stars a").on('click', function(){
        if(!$(this).hasClass('clicked')) $("p.stars a").addClass('clicked');
    });
}

jQuery(document).ready(function(){
    setUpStars(jQuery);
});
