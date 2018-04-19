var block_send_button = false;
var current_page = 1;

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
        $('.products_menu_tab_content').removeClass('active');

        target = $(this).attr('data-target');
        $(this).addClass('active');
        $('#'+target).addClass('active');
    });
    $('.products_menu_tab_content_line').click(function(e) {
        if($(this).hasClass('products_menu_tab_content_line_header')) {
            e.preventDefault();
        } else if($(this).hasClass('products_menu_tab_content_line_more_link')) {
            return true;
        }

        $('.products_menu_tab_content_line_more_links').hide();

        if($(this).find('.products_menu_tab_content_line_more').hasClass('active')) {
            $(this).find('.products_menu_tab_content_line_more').removeClass('active');
        } else {
            $(this).find('.products_menu_tab_content_line_more').addClass('active');
            $(this).find('.products_menu_tab_content_line_more_links').show();
        }
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

    $(document).on('click','.show_more_products',function(e) {
        e.preventDefault();
        
        current_page++;
        tail = window.location.search;  
        params = URLToArray(tail);
        
        send_data = {
            type : 'load_products',
            page : current_page,
            filters : JSON.stringify(params),
            dev_type : 'mobile'
        }
        
        if($( this ).attr('data-category-id')) {
            send_data.category_id = $( this ).attr('data-category-id');
        } else if($( this ).attr('data-country-id')) {
            send_data.country_id = $( this ).attr('data-country-id');
        } else if($( this ).attr('data-provider-id')) {
            send_data.provider_id = $( this ).attr('data-provider-id');
        } else if($( this ).attr('data-provider-full-id')) {
            send_data.provider_full_id = $( this ).attr('data-provider-full-id');
        } else if($( this ).attr('data-brands-id')) {
            send_data.brands_id = $( this ).attr('data-brands-id');
        }

        $.ajax({
            url: '/ajax_handler',
            type: 'post',
            data: send_data,
            dataType: 'json',
            success: function(json) {
                if(json['success']) {
                    $( "#wrapper_for_product_load" ).append(json['success']);
                    
                    if(json['load_status'] == 'hide') {
                        $( ".show_more_products" ).hide();
                    }
                }   
            }
        });
    });

    $('.filters_button').click(function() {
        tail = window.location.search;  
        params = URLToArray(tail);
        
        $(this).parents('.filters_form').find('.filters_form_label_checkbox').each(function() {
            name = $(this).attr('data-name');
            value = $(this).val();
            values = params[name];

            if(values) {
                values = values.split(';');
            } else {
                values = [];
            }
         
            index = values.indexOf(value);
            
            if ( $(this).prop("checked") && index < 0 ) {
                values.push(value);
            } else if( !$(this).prop("checked") && index >= 0 ) {
                values.splice(index, 1);
            }
 
            params[name] = values.join(';');

            if(values.length == 0) {
                delete params[name];
            }
        });
        
        delete params['page'];
        
        window.location.href = window.location.origin+window.location.pathname+'?'+ArrayToURL(params);
    });

    $('.filters_reset').click(function(e) {
        e.preventDefault();
        tail = window.location.search; 
        params = URLToArray(tail);

        send_data = {
            type : $(this).attr('data-type'),
            sort : $(this).attr('data-sort'),
            category : $(this).parents('.filters_body').attr('data-category')
        }

        $.ajax({
            type: "POST", 
            url: '/ajax_handler',
            dataType: 'json',
            data: send_data
        });

        for(var i in params) {
            delete params[i];
        }
        
        window.location.href = window.location.origin+window.location.pathname+'?'+ArrayToURL(params);
    });


    $(document).on('click','.send',function(e) {
        e.preventDefault();
    
        if(block_send_button) {
            return;
        } else {
            block_send_button = true;
        }
        
        send_data = new Object();
        type = $(this).attr('data-type');
        error = false;
        obj = $(this);
        
        switch(type) {
            case 'sort':
                send_data = {
                    type : type,
                    sort : obj.attr('data-sort'),
                    category : $(this).parents('.filters_body').attr('data-category')
                }
                
                break;           
                
            default:
                alert('Put that cookie down!');
                break;
        }

        if(error) {
            block_send_button = false;
            return;
        }
        
        $.ajax({
            type: "POST", 
            url: '/ajax_handler',
            dataType: 'json',
            data: send_data,
            success: function(json) {
                if(json) {
                    if(json['success']) {
                        if(send_data.type == 'sort') {
                            location.reload();
                        }
                    }
                }
            },
            complete: function() {
                block_send_button = false;
            }
        });
    });
});

function URLToArray(url) {
    var request = {};
    var pairs = url.substring(url.indexOf('?') + 1).split('&');
    for (var i = 0; i < pairs.length; i++) {
        if(!pairs[i])
            continue;
        var pair = pairs[i].split('=');
        request[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
     }
     return request;
}

function ArrayToURL(array) {
  var pairs = [];
  for (var key in array)
    if (array.hasOwnProperty(key))

      pairs.push(encodeURIComponent(key) + '=' + encodeURIComponent(array[key]));
  return pairs.join('&');
}