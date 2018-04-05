(function($, api){
    'use strict';

    api.bind('ready', function(){
        console.log('loaded');
        for(let i = 1; i <= 3; i++){
            var catSetName = 'sewchic_home_category_'+i;
            var imgSetName = catSetName + '_image';

            api(catSetName, function(setting){
                var linkVisibilityToValue = function(control){
                    
                    var determineVisibility = function(){
                        console.log(parseInt(setting.get()));
                        if( -1 === parseInt( setting.get() ) ){
                            control.deactivate();
                            //control.container.slideUp();
                        } else {
                            control.activate();
                            //control.container.slideDown();
                        }
                    }

                    determineVisibility();
                    setting.bind(determineVisibility);
                }

                api.control(imgSetName, linkVisibilityToValue);
            });
        }
    });

}(jQuery, wp.customize));
