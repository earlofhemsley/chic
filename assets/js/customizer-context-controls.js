(function($, api){
    'use strict';

    api.bind('ready', function(){
        console.log('loaded');
        for(let i = 1; i <= 3; i++){
            var catSetName = 'sewchic_home_category_'+i;
            var imgSetName = catSetName + '_image';
            var checkboxName = 'show_sewchic_home_category_title_'+i;

            api(catSetName, function(setting){
                var linkVisibilityToValue = function(control){
                    
                    var determineVisibility = function(){
                        console.log(parseInt(setting.get()));
                        if( -1 === parseInt( setting.get() ) ){
                            //control.deactivate();
                            control.container.slideUp();
                        } else {
                            //control.activate();
                            control.container.slideDown();
                        }
                    }

                    determineVisibility();
                    setting.bind(determineVisibility);
                }

                api.control(imgSetName, linkVisibilityToValue);
                api.control(checkboxName, linkVisibilityToValue);
            });
        }
    });

}(jQuery, wp.customize));
