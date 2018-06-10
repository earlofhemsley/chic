(function($, window, document){
    'use strict';
    let file_frame;
    $(document).ready(function(){
        console.log(efi);   
        $(document).on('click', '#enhanced_set_featured_image', function(ev){
            ev.preventDefault();
            file_frame = wp.media.frames.file_frame = wp.media({
                title : 'Pick an image to be the featured image',
                button : {
                    text: 'Set Featured Image',
                },
                multiple : false,
                library : {
                    type : 'image',
                }
            });

            file_frame.on('select', function(){
                let _thumbnail = file_frame.state().get('selection').first().toJSON();
                updateFeaturedImage(_thumbnail.id);
            });

            file_frame.open();
        });

        $(document).on('click', '#remove_enhanced_featured_image', function(ev){
            ev.preventDefault();
            updateFeaturedImage(-1);
        });
    });

}(jQuery, window, document));

let updateFeaturedImage = function(thumbnailId){
    $.ajax({
        method: "POST",
        dataType : "html",
        url : efi.url,
        data : {
            action : efi.action,
            _thumbnail_id : thumbnailId,
            _post_id : efi.post_id
        },
        beforeSend : function(xhr){
            $("#enhanced_postimagediv > div.inside").html('...');
        },
        success: function(data, textStatus, xhr){
            $("#enhanced_postimagediv > div.inside").html(data);
        },
        error : function(xhr, textStatus, errorThrown){
            window.alert('Your update failed. Sorry. ' + textStatus + ': ' + errorThrown);
        }

    });
}
