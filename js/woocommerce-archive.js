(function($){
    $(document).ready(function(){
        $(".wcsc-toggleable").click(function(){
            var selector = $(this).data('target');
            $(selector).slideToggle();
            var newContent = ($(this).html() == 'Hide filters') ? 'Show filters' : 'Hide filters';
            $(this).html(newContent);
        });
    });
})(jQuery);
