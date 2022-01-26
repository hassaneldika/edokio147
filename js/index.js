(function($) {
    $(document).on('click', '.fa-toggle-on', function() {
        $(this).removeClass('fa-toggle-on').addClass('fa-toggle-off')
    })
    $(document).on('click', '.fa-toggle-off', function() {
        $('.fa-toggle-on').removeClass('fa-toggle-on').addClass('fa-toggle-off')
        $(this).removeClass('fa-toggle-off').addClass('fa-toggle-on')
    })
    $(document).on('click', '.acc-toggle-off', function(){
        $('.acc-toggle-on').removeClass('acc-toggle-on').addClass('acc-toggle-off')
        $(this).removeClass('acc-toggle-off').addClass('acc-toggle-on')
        $('.fa-toggle-on').removeClass('fa-toggle-on').addClass('fa-toggle-off')
        $(this).parent().siblings().children('i').removeClass('fa-toggle-off').addClass('fa-toggle-on')
    })
    $(document).on('click', '.acc-toggle-on', function(){
        $(this).removeClass('acc-toggle-on').addClass('acc-toggle-off')
        $(this).parent().siblings().children('i').removeClass('fa-toggle-on').addClass('fa-toggle-off')
    })

})(jQuery)