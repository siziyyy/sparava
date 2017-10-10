$(document).ready(function(){
    $('.orders_to_cour').click(function() {
        $('.to_cour_sel').toggle();
        $('.to_cour_sel_mask').toggle();
    });
    $('.to_cour_sel_mask').click(function() {
        $('.to_cour_sel').toggle();
        $('.to_cour_sel_mask').toggle();
    });
});