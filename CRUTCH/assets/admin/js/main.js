$(document).ready(function(){
    $('.orders_to_cour').click(function() {
        $('.to_cour_sel').toggle();
        $('.to_cour_sel_mask').toggle();
    });
    $('.to_cour_sel_mask').click(function() {
        $('.to_cour_sel').toggle();
        $('.to_cour_sel_mask').toggle();
    });
    $('.open_order').click(function() {
        $('.order_mask').toggle();
        $('.order_modal').toggle();
    });
    $('.order_mask').click(function() {
        $('.order_mask').toggle();
        $('.order_modal').toggle();
    });
});