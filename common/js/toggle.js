jQuery(document).ready(
    (function($){
        $('.toggle').on('click', function(e){
            var element = $(this);
            var target = $(element.data('target'));
            var method = element.data('toggle');
            switch(method){
                case 'slide':
                    target.slideToggle(400, function(){
                        if(element.hasClass('activated')){
                            element.removeClass('activated');
                        } else {
                            element.addClass('activated');
                        }
                    });
                    break;
                default:
                    target.fadeToggle(400, function(){
                        if(element.hasClass('activated')){
                            element.removeClass('activated');
                        } else {
                            element.addClass('activated');
                        }
                    });
                    break;
            }
        });
    })(jQuery)
);
