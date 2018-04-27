var block_send_button = false;
var current_page = 1;
var time_counter = 0;

$(document).ready(function() {

    $(document).on('touchstart',function(e) {
        time_counter = (new Date).getTime();
    });
    
    /** CATEGORY CHANGE VIEW**/
    $(document).on('touchend','.category_content_header_button_view',function(e) {
        if(is_not_click()) {
            return true;
        }

        $('.category_content_header_button_view').toggleClass('active');
        $('.category_content').toggleClass('category_content_view_by_double');
    });
    /** CATEGORY OPEN FILTERS **/
    $(document).on('touchend','.category_content_header_button_filters',function(e) {
        if(is_not_click()) {
            return true;
        }

        $('body').toggleClass('opened_filters');
    });
    $(document).on('touchend','.filters_mask',function(e) {
        if(is_not_click()) {
            return true;
        }

        $('body').removeClass('opened_filters');
    });
    $(document).on('touchend','.filters_header',function(e) {
        if(is_not_click()) {
            return true;
        }

        $('body').removeClass('opened_filters');
    });
    /** CATEGORY MORE FILTERS **/
    $(document).on('touchend','.filters_form_more',function(e) {
        if(is_not_click()) {
            return true;
        }
        if($(this).parents('.filters_form_part').find('.filters_form_wrapper').hasClass('filters_form_wrapper_hide')) {
            $(this).parents('.filters_form_part').find('.filters_form_wrapper').removeClass('filters_form_wrapper_hide');
            $(this).removeClass('active');
        } else {
            $(this).parents('.filters_form_part').find('.filters_form_wrapper').addClass('filters_form_wrapper_hide');
            $(this).addClass('active');   
        }
    });
    /** ITEM MORE INFO **/
    $(document).on('touchend','.item_page_more_info',function(e) {
        if(is_not_click()) {
            return true;
        }

        $('.item_page_more_info_arrow').toggleClass('active');
         $('.item_page_more_info_text').html($('.item_page_more_info_text').html() == 'еще информация' ? 'закрыть' : 'еще информация');
        $('.item_page_more_info_pack').toggle()
    });
    /** ITEM RECOMENDATIONS AND COMMENTS **/
    $(document).on('touchend','.item_page_recs_and_comments_link',function(e) {
        if(is_not_click()) {
            return true;
        }

        $('.item_page_recs_and_comments_link').toggleClass('active');
        $('.item_page_recs_and_comments').toggleClass('item_page_recs_and_comments_show_recs');
    });

    /** PRODUCTS MENU **/
    $(document).on('touchend','.header_icon_hamburger',function(e) {
        if(is_not_click()) {
            return true;
        }

        $('body').addClass('opened_products');
    });

    $(document).on('touchend','.products_menu_header_icon',function(e) {
        if(is_not_click()) {
            return true;
        }

        $('body').removeClass('opened_products');
    });

    $(document).on('touchend','.products_menu_tab',function(e) {
        if(is_not_click()) {
            return true;
        }

        $('.products_menu_tab').removeClass('active');
        $('.products_menu_tab_content').removeClass('active');

        target = $(this).attr('data-target');
        $(this).addClass('active');
        $('#'+target).addClass('active');
    });
    $(document).on('touchend','.products_menu_tab_content_line_more_links_show',function(e) {
        if(is_not_click()) {
            return true;
        }

        e.preventDefault();

        $('.products_menu_tab_content_line_more_links').hide();

        if($(this).parents('.products_menu_tab_content_line').find('.products_menu_tab_content_line_more').hasClass('active')) {
            $(this).parents('.products_menu_tab_content_line').find('.products_menu_tab_content_line_more').removeClass('active');
        } else {
            $(this).parents('.products_menu_tab_content_line').find('.products_menu_tab_content_line_more').addClass('active');
            $(this).parents('.products_menu_tab_content_line').find('.products_menu_tab_content_line_more_links').show();
        }
    });
    /** CABINET SETTINGS **/
    $(document).on('touchend','.cabinet_settings_body_line_item',function(e) {
        if(is_not_click()) {
            return true;
        }

        $(this).toggleClass('active');
    });
    /** MAIN PAGE SLIDER **/
    if($('.main_page_partial_slider').length > 0) {
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
    }
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

    if($('#uLogin').length) {
        uLogin.customInit('uLogin');
    } 

    $(document).on('touchend','.c_inners_count_delete',function(e) {
        if(is_not_click()) {
            return true;
        }

        product_id = $(this).parents('.c_inners_side_tr').attr('data-product-id');
        cart.remove(product_id);
    });

    $(document).on('touchend','.cart_delivery_tab_select',function(e) {
        if(is_not_click()) {
            return true;
        }

        $('.cart_delivery_tab').hide();

        $(".cart_delivery_tab_select").removeClass('active');
        $(this).addClass('active');
        target = $(this).attr('data-target');
        $('#'+target).show();        
    });

    $(document).on('touchend','.cart_delivery_shipping_method_select',function(e) {
        if(is_not_click()) {
            return true;
        }

        $(".cart_delivery_shipping_method_select").removeClass('active');
        id = $(this).attr('data-id');
        price = $(this).attr('data-price');
        summ = $('.cart_page_summ').attr('data-summ');

        summ = parseFloat(summ) + parseFloat(price);

        $('.cart_page_summ_value').text(summ);
        $(this).addClass('active');
        $("input[name=shipping_method]").val(id);
    });

    $( ".c_inners_count_input" ).change(function() {
        quantity = $(this).val();
        
        if(quantity <= 0) {
            quantity = 1;
        }
        
        product_id = $(this).parents('.c_inners_side_tr').attr('data-product-id');
        cart.update(product_id, quantity);
    });

    $(document).on('change','.g_good_count_input',function(e) {
        
        if($(this).parents('.g_good').length > 0) {
            parent_class = '.g_good';
        } else if($(this).parents('.single_good_page').length > 0) {
            parent_class = '.single_good_page';
        } else if($(this).parents('.g_good').length == 0) {
            parent_class = '.good_modal';
        }
        
        quantity = parseFloat($(this).val());
        type_num = $(this).parents(parent_class).attr('data-type');     
        
        if(type_num == 0) {
            type = 'шт';
        } else if(type_num == 1) {
            type = 'кг';
        } else if(type_num == 2) {
            type = 'кг';
        }
        
        price = $(this).parents(parent_class).find(".g_good_price_value").text();

        summ = parseInt(parseFloat(quantity)*price);

        if((parseFloat(quantity)*price) > summ) {
            summ++;
        }

        bonus = parseInt(summ*0.05);

        $(this).parents(parent_class).find(".g_good_to_cart_value").text(summ);
        $('.g_good_bonus_value').text(bonus);
        
        $(this).val(quantity+' '+type);
    }); 

    $(document).on('touchend','.g_good_count_add',function(e) {
        if(is_not_click()) {
            return true;
        }
        
        if($(this).parents('.g_good').length > 0) {
            parent_class = '.g_good';
        } else if($(this).parents('.single_good_page').length > 0) {
            parent_class = '.single_good_page';
        } else if($(this).parents('.g_good').length == 0) {
            parent_class = '.good_modal';
        }

        $(this).parents(parent_class).find(".category_content_item_not_double_info_footer_add_to_cart").removeClass('active');
        $(this).parents(parent_class).find(".g_good_added_to_cart").removeClass('g_good_added_to_cart');
        
        quantity = parseFloat($(this).parents(parent_class).find('.g_good_count_input').val());
        type_num = $(this).parents(parent_class).attr('data-type');

        quantity = get_quantity_by_type(quantity,type_num,false,parent_class,$(this));
        price = $(this).parents(parent_class).find(".g_good_price_value").text();

        summ = parseInt(parseFloat(quantity)*price);

        if((parseFloat(quantity)*price) > summ) {
            summ++;
        }

        bonus = parseInt(summ*0.05);

        $(this).parents(parent_class).find(".g_good_to_cart_value").text(summ);
        $('.g_good_bonus_value').text(bonus);

        $(this).parents(parent_class).find('.g_good_count_input').val(quantity);
    });
    
    $(document).on('touchend','.g_good_count_rem',function(e) {
        if(is_not_click()) {
            return true;
        }
        
        if($(this).parents('.g_good').length > 0) {
            parent_class = '.g_good';
        } else if($(this).parents('.single_good_page').length > 0) {
            parent_class = '.single_good_page';
        } else if($(this).parents('.g_good').length == 0) {
            parent_class = '.good_modal';
        }
        
        $(this).parents(parent_class).find(".category_content_item_not_double_info_footer_add_to_cart").removeClass('active');
        $(this).parents(parent_class).find(".g_good_added_to_cart").removeClass('g_good_added_to_cart');
        
        quantity = parseFloat($(this).parents(parent_class).find('.g_good_count_input').val());
        type_num = $(this).parents(parent_class).attr('data-type');
        
        quantity = get_quantity_by_type(quantity,type_num,true,parent_class,$(this));
        price = $(this).parents(parent_class).find(".g_good_price_value").text();

        summ = parseInt(parseFloat(quantity)*price);

        if((parseFloat(quantity)*price) > summ) {
            summ++;
        }

        bonus = parseInt(summ*0.05);

        $(this).parents(parent_class).find(".g_good_to_cart_value").text(summ);
        $('.g_good_bonus_value').text(bonus);
        
        $(this).parents(parent_class).find('.g_good_count_input').val(quantity);
    });

    function get_quantity_by_type(quantity,type_num,minus,parent_class,obj) {
        if(minus) {
            if(type_num == 0) {
                obj.parents(parent_class).find('.g_good_count_rem').removeClass('g_good_count_act_disable');
                type = 'шт';
                quantity--;
                
                
                if(quantity <= 1) {
                    quantity = 1;
                    obj.parents(parent_class).find('.g_good_count_rem').addClass('g_good_count_act_disable');
                }
                
                return quantity+' '+type;
            } else if(type_num == 1) {
                obj.parents(parent_class).find('.g_good_count_rem').removeClass('g_good_count_act_disable');
                type = 'кг';
                
                if(quantity > 1) {
                    quantity = quantity - 0.5;
                    return quantity+' '+type;
                }           
                
                quantity = quantity - 0.01;
                
                if(quantity > 0.8) {
                    quantity = 0.8;
                } else if(quantity > 0.5) {
                    quantity = 0.5;
                } else if(quantity > 0.3) {
                    quantity = 0.3;
                    obj.parents(parent_class).find('.g_good_count_rem').addClass('g_good_count_act_disable');
                } else if(quantity < 0.3) {
                    quantity = 0.3;
                    obj.parents(parent_class).find('.g_good_count_rem').addClass('g_good_count_act_disable');
                }
                
                return quantity+' '+type;
            } else if(type_num == 2) {
                type = 'кг';
                obj.parents(parent_class).find('.g_good_count_rem').removeClass('g_good_count_act_disable');
                
                if(quantity > 1) {
                    quantity = quantity - 0.5;
                    return quantity+' '+type;
                }           
                
                quantity = quantity - 0.01;
                
                if(quantity > 0.8) {
                    quantity = 0.8;
                } else if(quantity > 0.5) {
                    quantity = 0.5;
                } else if(quantity > 0.3) {
                    quantity = 0.3;
                } else if(quantity > 0.1) {
                    quantity = 0.1;
                    obj.parents(parent_class).find('.g_good_count_rem').addClass('g_good_count_act_disable');
                } else if(quantity < 0.1) {
                    quantity = 0.1;
                    obj.parents(parent_class).find('.g_good_count_rem').addClass('g_good_count_act_disable');
                }
                    
                return quantity+' '+type;
            }           
        } else {
            if(type_num == 0) {
                obj.parents(parent_class).find('.g_good_count_rem').removeClass('g_good_count_act_disable');
                type = 'шт';
                quantity++;
                
                if(quantity <= 1) {
                    quantity = 1;
                    obj.parents(parent_class).find('.g_good_count_rem').addClass('g_good_count_act_disable');
                }               
                
                return quantity+' '+type;
            } else if(type_num == 1) {
                type = 'кг';
                obj.parents(parent_class).find('.g_good_count_rem').removeClass('g_good_count_act_disable');
                
                if(quantity >= 1) {
                    quantity = quantity + 0.5;
                    return quantity+' '+type;
                }           
                
                quantity = quantity + 0.01;
                
                if(quantity < 0.3) {
                    quantity = 0.3;
                    obj.parents(parent_class).find('.g_good_count_rem').addClass('g_good_count_act_disable');
                } else if(quantity < 0.5) {
                    quantity = 0.5;
                } else if(quantity < 0.8) {
                    quantity = 0.8;
                } else if(quantity < 1) {
                    quantity = 1;
                }
                    
                return quantity+' '+type;
            } else if(type_num == 2) {
                type = 'кг';
                obj.parents(parent_class).find('.g_good_count_rem').removeClass('g_good_count_act_disable');
                
                if(quantity >= 1) {
                    quantity = quantity + 0.5;
                    return quantity+' '+type;
                }           
                
                quantity = quantity + 0.01;
                
                if(quantity < 0.1) {
                    quantity = 0.1;
                    obj.parents(parent_class).find('.g_good_count_rem').addClass('g_good_count_act_disable');
                } else if(quantity < 0.3) {
                    quantity = 0.3;
                } else if(quantity < 0.5) {
                    quantity = 0.5;
                } else if(quantity < 0.8) {
                    quantity = 0.8;
                } else if(quantity < 1) {
                    quantity = 1;
                }
                    
                return quantity+' '+type;
            }
        }
    }

    $(document).on('touchend','.g_good_to_cart',function(e) {
        if(is_not_click()) {
            return true;
        }
        
        if($(this).parents('.g_good').length > 0) {
            parent_class = '.g_good';
        } else if($(this).parents('.single_good_page').length > 0) {
            parent_class = '.single_good_page';
        } else if($(this).parents('.g_good').length == 0) {
            parent_class = '.good_modal';
        }
        
        quantity = $(this).parents(parent_class).find('.g_good_count_input').val();
        product_id = $(this).parents(parent_class).attr('data-product-id');
        cart.add(product_id, parseFloat(quantity),parent_class,$(this));
    });

    $(document).on('touchend','.show_more_products',function(e) {
        if(is_not_click()) {
            return true;
        }

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

    $(document).on('touchend','.link_to_product',function(e) {
        if(is_not_click()) {
            return true;
        }

        e.preventDefault();
        
        url = $(this).attr('data-url');
        window.open(url, "product_iframe");
        
        $('.fullscreen').show();
    });

    $(document).on('touchend','.item_page_back',function(e) {
        if(is_not_click()) {
            return true;
        }

        e.preventDefault();  

        var iFrameDetection = (window === window.parent) ? false : true;

        if(iFrameDetection) {
            parent.closeIFrame();
        } else {
            window.location = '/';
        }
    });

    $(document).on('touchend','.g_good_added_to_cart',function(e) {
        window.location = '/cart';
    }); 

    $(document).on('touchend','.filters_button',function(e) {
        if(is_not_click()) {
            return true;
        }

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

    $(document).on('touchend','.filters_reset',function(e) {
        if(is_not_click()) {
            return true;
        }

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


    $(document).on('touchend','.send',function(e) {
        if(is_not_click()) {
            return true;
        }

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

            case 'favourite':
                if($(this).parents('.g_good').length > 0) {
                    parent_object = $(this).parents('.g_good');
                } else if($(this).parents('.single_good_page').length > 0) {
                    parent_object = $(this).parents('.single_good_page');
                } else if($(this).parents('.good_modal').length > 0) {
                    parent_object = $(this).parents('.good_modal');
                }
                
                send_data = {
                    type : type,
                    product_id : parent_object.attr('data-product-id')
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
                        } else if(send_data.type == 'favourite') {
                            parent_object.find('.category_content_item_not_double_info_footer_star').addClass('g_good_mobile_fav_orange');
                        }
                    } else if(json['remove']) {
                        if(send_data.type == 'favourite') {
                            parent_object.find('.category_content_item_not_double_info_footer_star').removeClass('g_good_mobile_fav_orange');
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

function closeIFrame() {
    $('.fullscreen').remove(); 

    $('<iframe>', {
       class:  'fullscreen product_iframe',
       name: 'product_iframe'
       }).appendTo('.product_iframe_wrapper'); 
}

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

function is_not_click() {
    if((new Date).getTime() - time_counter < 175) {
        return false;
    } else {
        return true;
    }
}

var cart = {
    'add': function(product_id, quantity, parent_class, obj = false) {
        $.ajax({
            url: '/cart_ajax',
            type: 'post',
            data: 'action=update&product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
            dataType: 'json',
            success: function(json) {
                if(json['success']) {
                    yaCounter46865034.reachGoal('cart-add');

                    if(obj) {
                        obj.addClass('g_good_added_to_cart');
                        obj.addClass('active');
                    }
                }
            }
        });
    },
    'update': function(product_id, quantity) {
        $.ajax({
            url: '/cart_ajax',
            type: 'post',
            data: 'action=update&product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
            dataType: 'json',
            success: function(json) {
                if(json['success']) {
                    location.reload();
                }
            }
        });
    },
    'remove': function(product_id) {
        $.ajax({
            url: '/cart_ajax',
            type: 'post',
            data: 'action=remove&product_id=' + product_id,
            dataType: 'json',
            success: function(json) {
                location.reload();
            }
        });
    }
}