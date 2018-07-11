jQuery(document).ready(function($){
    $('.toggle').on('click', function(e){
        var element = $(this);
        var target = $(element.data('target'));
        var method = element.data('toggle');
        switch(method){
            case 'slide':
                target.slideToggle(400, function(){
                    toggleButton(element);
                });
                break;
            default:
                target.fadeToggle(400, function(){
                    toggleButton(element);
                });
                break;
        }
    });

    let toggleButton = function(element){
        let content = element.html();
        let showRegex = /show/ig;
        let hideRegex = /hide/ig;
        if(showRegex.test(content)){
            content = content.replace(showRegex, "Hide");
        }
        else{
            content = content.replace(hideRegex, "Show");
        }
        element.html(content);
        if(element.hasClass('activated')){
            element.removeClass('activated');
        } else {
            element.addClass('activated');
        }
    }
});
