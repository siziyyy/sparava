$(document).ready(function(){
    $('.c_menu_more').click(function() {
        $('.c_menu_more_span').toggleClass('c_menu_more_span_opened');
        $('.c_menu_secondary').toggleClass('c_menu_hidden');
    });
});