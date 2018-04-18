$(document).ready(function() {
    /** CATEGORY CHANGE VIEW**/
    $('.category_content_header_button_view').click(function() {
        $('.category_content_header_button_view').toggleClass('active');
        $('.category_content').toggleClass('category_content_view_by_double');
    });
    /** CATEGORY OPEN FILTERS **/
    $('.category_content_header_button_filters').click(function() {
        $('body').toggleClass('opened_filters');
    });
    $('.filters_mask').click(function() {
        $('body').removeClass('opened_filters');
    });
    $('.filters_header').click(function() {
        $('body').removeClass('opened_filters');
    });
    /** CATEGORY MORE FILTERS **/
    $('.filters_form_more').click(function() {
        $(this).toggleClass('active');
    });
    /** ADD TO CART **/
    $('.category_content_item_not_double_info_footer_add_to_cart').click(function() {
        $(this).toggleClass('active');
    });
    /** ITEM MORE INFO **/
    $('.item_page_more_info').click(function() {
        $('.item_page_more_info_arrow').toggleClass('active');
         $('.item_page_more_info_text').html($('.item_page_more_info_text').html() == 'еще информация' ? 'закрыть' : 'еще информация');
        $('.item_page_more_info_pack').toggle()
    });
    /** ITEM RECOMENDATIONS AND COMMENTS **/
    $('.item_page_recs_and_comments_link').click(function() {
        $('.item_page_recs_and_comments_link').toggleClass('active');
        $('.item_page_recs_and_comments').toggleClass('item_page_recs_and_comments_show_recs');
    });
    /** CART DELIVERY **/
    $('.cart_delivery_line_button').click(function() {
        $(this).toggleClass('active');
    });
    /** PRODUCTS MENU **/
    $('.header_icon_hamburger').click(function() {
        $('body').addClass('opened_products');
    });
    $('.products_menu_header_icon').click(function() {
        $('body').removeClass('opened_products');
    });
    $('.products_menu_tab').click(function() {
        $('.products_menu_tab').removeClass('active');
        $(this).addClass('active');
    });
    $('.products_menu_tab_content_line_more').click(function() {
        $('.products_menu_tab_content_line_more_links').toggle();
        $(this).toggleClass('active');
    });
    /** CABINET SETTINGS **/
    $('.cabinet_settings_body_line_item').click(function() {
        $(this).toggleClass('active');
    });
    /** MAIN PAGE SLIDER **/
    var sudoSlider = $(".main_page_partial_slider").sudoSlider({
        continuous:true,
        prevNext: false,
        touch: true,
        numeric: false,
        updateBefore: true,
        beforeAnimation: function (t, slider, speed) {
            $(this).fadeTo(speed, 1);
            slider.find(".slide").not($(this)).fadeTo(speed, 1);
        },
        initCallback: function () {
            var currentSlide = this.getSlide(this.getValue("currentSlide"));
            currentSlide.fadeTo(0, 1);
            this.find(".slide").not(currentSlide).fadeTo(0, 1);

            this.css("overflow", "visible");
        }
    });
    /** STICKY **/
    if($('.sticky').length > 0) {
        var $sticky = $('.sticky'),
        $stickyTo = $('.stickyTo'),
        stickyToTop = $stickyTo.offset().top,
        stickyToBottom = stickyToTop + $stickyTo.outerHeight();

        $('.page_scrollbar_helper').on('scroll', function() {
            var scroll = $('.page_scrollbar_helper').scrollTop(),
            stickyTop = $sticky.offset().top,
            stickyBottom = $sticky.offset().top + $sticky.outerHeight();

            if (stickyBottom >= stickyToBottom) {
                if (scroll < stickyTop) {
                    /*$sticky.addClass('shadow').removeClass('abs');*/
                } else {
                    /*$sticky.addClass('abs');*/
                }
            } else if (scroll > stickyToTop) {
                $sticky.addClass('shadow');
            } else if (scroll < stickyToTop) {
                $sticky.removeClass('abs').removeClass('shadow');
            }
        });
    }
    /** STICKY OBSERVER **
    (new IntersectionObserver(function(e,o){
        if(e[0].intersectionRatio>0){
            $('.sticky').removeClass('shadow')
        }else{
            $('.sticky').addClass('shadow')
        };
    })).observe(document.getElementById('indicator')); */
    /** END OF DOCUMENT.READY **/
});

