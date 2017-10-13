$(document).ready(function(){
    $('.c_menu_more').click(function() {
        $('.c_menu_more_span').toggleClass('c_menu_more_span_opened');
        $('.c_menu_secondary').toggleClass('c_menu_hidden');
    });
    $('.blah_link').click(function() {
        $('.blah_blah').toggle();
        $('.blah_closer').toggle();
    });
    $('.blah_closer').click(function() {
        $('.blah_blah').toggle();
        $('.blah_closer').toggle();
    });
    $('.g_good_show_full_desc').click(function() {
        $('.g_good_big_description').toggle();
        $('.g_g_desc_closer').toggle();
    });
    $('.g_g_desc_closer').click(function() {
        $('.g_good_big_description').toggle();
        $('.g_g_desc_closer').toggle();
    });
    $('.c_new_menu_line_item_right').click(function() {
        $('.c_new_menu_dropdown').toggle();
        $('.new_menu_closer').toggle();
    });
    $('.new_menu_closer').click(function() {
        $('.c_new_menu_dropdown').toggle();
        $('.new_menu_closer').toggle();
    });
});