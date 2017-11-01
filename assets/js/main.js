var block_send_button = false;
var current_page = 1;

function send_msg(msg) {
	window.frames['admin'].postMessage(send_data, "http://admin.aydaeda.ru");
}

function listener(event) {
	if (event.origin != 'http://admin.aydaeda.ru') {
		return;
	}
	
	if (event.data == 'iframe_ready') {
		$('.g_admin_info').css('display','inline-block');
	} else if(event.data.type == 'product_details') {
		product = event.data.data;
		
		$('#product_form .product_id').val(product.product_id);
		$('#product_form .product_name_text').text(product.title);
		$('#product_form .product_image').attr('src','/images/'+product.image);
		$('#product_form .product_type').val(product.type);
		$('#product_form .product_weight').val(product.weight);
		$('#product_form .product_country').val(product.country);
		$('#product_form .product_price').val(product.price);
		$('#product_form .product_percent').val(product.percent);
		$('#product_form .product_pack').val(product.pack);
		$('#product_form .product_composition').val(product.composition);
		
		$('#product_form .product_name').val(product.title);
		$('#product_form .product_image_src').val(product.image);
		$('#product_form .product_category').val(product.category);
		$('#product_form .product_brand').val(product.brand);
		$('#product_form .product_status').val(product.status);
		$('#product_form .product_description').text(product.description);
		$('#product_form .product_special').val(product.special);
		$('#product_form .product_special_begin').val(product.special_begin);
		$('#product_form .product_special_end').val(product.special_end);
		
		$('.admin_window_closer').show();
		$('#product_form').show();
	} else if (event.data.type == 'save_product' && event.data.data == 'success') {
		$('.admin_window_closer').hide();
		$('#product_form').hide();		
	}
}

if (window.addEventListener) {
	window.addEventListener("message", listener);
} else {
	window.attachEvent("onmessage", listener);
}

$(document).ready(function(){
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////


	$('.m_h_hamb').click(function() {
		$('.aside_mobile_menu').toggle();
	});
	$('.aside_mobile_menu_back').click(function() {
		$('.aside_mobile_menu').toggle();
	});
	$('.m_h_search').click(function() {
		$('.mobile_search').toggle();
	});



	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	//////////////////////////////////////////////
	$(document).on('click','.remind_password',function(e) {
		e.preventDefault();
		$('.blaah').show();
		$('.blah_closer').show();
	});
	
	$(document).on('click','.blah_closer',function(e) {
		$('.blaah').hide();
		$('.blah_closer').hide();
		$('.close_me_on_send2').show();
		$('.remind_error').hide();
		$('.remind_success').hide();
		$('.email_error').hide();
		$('.blah_blah').hide();
		$('.close_me_on_send').show();
		$('.remind_error2').hide();	
		$('.remind_success2').hide();			
	});	

    $('.blah_link').click(function() {
        $('.blah_blah').show();
        $('.blah_closer').show();
    });
	
	$(document).on('click','.save_product_details',function(e) {
		
		product = {
			product_id: $('#product_form .product_id').val(),
			type: $('#product_form .product_type').val(),
			weight: $('#product_form .product_weight').val(),
			country: $('#product_form .product_country').val(),
			price: $('#product_form .product_price').val(),
			percent: $('#product_form .product_percent').val(),
			pack: $('#product_form .product_pack').val(),
			composition: $('#product_form .product_composition').val(),
			title: $('#product_form .product_name').val(),
			image: $('#product_form .product_image_src').val(),
			category: $('#product_form .product_category').val(),
			brand: $('#product_form .product_brand').val(),
			status: $('#product_form .product_status').val(),
			description: $('#product_form .product_description').val(),
			special: $('#product_form .product_special').val(),
			special_begin: $('#product_form .product_special_begin').val(),
			special_end: $('#product_form .product_special_end').val()
		}
		
		send_data = {
			type : 'save_product',
			data : product
		}
		
		send_msg(send_data);
	});	
	
	$(document).on('click','.admin_window_closer',function(e) {
		$('#product_form').hide();
		$('.admin_window_closer').hide();		
	});
	
	$(document).on('click','.g_admin_info',function(e) {
		send_data = {
			type : 'product_details',
			product_id : $(this).attr('data-product-id'),
		}
		
		send_msg(send_data);
	});

    /* slider */
    $('.b_slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 5000,
        cssEase: 'ease-in-out'
    });
    /* mosaic */
    $('.c_mosaic').masonry({
        itemSelector: '.c_mosaic_item',
        columnWidth: '.c_mosaic_grid_sizer',
        gutter: '.c_mosaic_gutter_sizer',
        percentPosition: true
    });


 	$('.count_cool_select').click(function() {
 		$(this).parent().toggleClass('count_cool_select_opened');
        $('.count_select_closer').toggle();
 	});
 	$('.count_select_closer').click(function() {
 		$('.count_cool_select_opened').toggleClass('count_cool_select_opened');
        $('.count_select_closer').toggle();
 	});

	if($('.c_menu_secondary').find('.c_current_menu_link').length > 0 ) {
        $('.c_menu_more_span').toggleClass('c_menu_more_span_opened');
        $('.c_menu_secondary').toggleClass('c_menu_hidden');	
	}
	
    $('.c_menu_more').click(function() {
        $('.c_menu_more_span').toggleClass('c_menu_more_span_opened');
        $('.c_menu_secondary').toggleClass('c_menu_hidden');
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
        $('.c_new_index_menu_dropdown').toggle();
        $('.new_menu_closer').toggle();
    });
    $('.new_menu_closer').click(function() {
        $('.c_new_index_menu_dropdown').toggle();
        $('.new_menu_closer').toggle();
    });	
	
	$(document).on('click','.count_cool_option',function(e) {
		quantity = $(this).text();
		price = $(this).parents('.g_good').find('.g_good_price_value').text();
		
		$('.count_cool_select_opened').removeClass('count_cool_select_opened');
        $('.count_select_closer').hide();
		
		if(quantity == 1) {
			$('.hide_select').hide();
		} else {
			$('.hide_select').show();
		}
		
		$(this).parents('.g_good').find('.product_count').text(quantity);
		$(this).parents('.g_good_actions').find('.g_good_to_cart_value').text(quantity*price);
	});	
	
	$(document).on('keyup','.g_good_counter',function(e) {
		quantity = $(this).val();
		price = $(this).parents('.g_good').find('.g_good_price_value').text();
		
		if(quantity <= 0) {
			quantity = 1;
		}
		
		$(this).parents('.g_good_actions').find('.g_good_to_cart_value').text(quantity*price);
	});
	
	$(document).on('click','.g_good_to_cart',function(e) {
		quantity = $(this).parents('.g_good').find('.product_count').text();
		product_id = $(this).attr('data-product-id');
		cart.add(product_id, quantity);
	});
	
	$( ".c_inners_count_input" ).change(function() {
		quantity = $(this).val();
		product_id = $(this).attr('data-product-id');
		cart.update(product_id, quantity);
	});
	
	$( ".c_inners_count_delete" ).click(function() {
		product_id = $(this).parents('.c_inners_count').find('.c_inners_count_input').attr('data-product-id');
		cart.remove(product_id);
	});
	
	$( "#change_account_details" ).click(function() {
		$( "#account_details, .c_inners_right_footer_yep" ).hide();
		$( "#account_details_edit" ).show();
	});	
	
	$(document).on('click','.c_show_more_goods',function(e) {
		e.preventDefault();
		
		current_page++;
		tail = window.location.search;	
		params = URLToArray(tail);
		
		send_data = {
			type : 'load_products',
			page : current_page,
			filters : JSON.stringify(params)
		}
		
		if($( this ).attr('data-category-id')) {
			send_data.category_id = $( this ).attr('data-category-id');
		} else if($( this ).attr('data-country-id')) {
			send_data.country_id = $( this ).attr('data-country-id');
		}

		$.ajax({
			url: '/ajax_handler',
			type: 'post',
			data: send_data,
			dataType: 'json',
			success: function(json) {
				if(json['success']) {
					$( "#wrapper_for_product_load" ).append(json['success']);
					$( ".c_pages" ).hide();
				}
			}
		});
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
		
		switch(type) {
			case 'check_login':
				
				send_data = {
					type : type,
					login_email : ($('#login_email').val() || 0 ),
					login_password : ($('#login_password').val() || 0 )
				}
				
				for(var key in send_data) {
					if(send_data[key] == 0) {
						$('#'+key).addClass('input_error');
						error = true;
					}
				}

				break;
				
			case 'register':
			
				if(!$('#license_agreement').prop('checked')) {
					alert('Необходимо согласиться с условиями');
					block_send_button = false;
					return;
				}
				
				send_data = {
					type : type,
					register_email : ($('#register_email').val() || 0 ),
					register_name : ($('#register_name').val() || 0 ),
					register_phone : ($('#register_phone').val() || 0 )
				}
				
				for(var key in send_data) {
					if(send_data[key] == 0) {
						$('#'+key).addClass('input_error');
						error = true;
					}
				}

				break;

			case 'account_details_change':
				
				send_data = {
					type : type,
					account_details_name : ($('#account_details_name').val() || 0 ),
					account_details_phone : ($('#account_details_phone').val() || 0 ),
					account_details_metro : ($('#account_details_metro').val() || -1 ),
					account_details_address : ($('#account_details_address').val() || -1 )
				}
				
				for(var key in send_data) {
					if(send_data[key] == 0) {
						$('#'+key).addClass('input_error');
						error = true;
					}
				}

				break;

			case 'use_bonus':
				
				send_data = {
					type : type,
					use_bonus : 1
				}
				
				break;
				
			case 'create_order':
				
				send_data = {
					type : type,
					create_order : 1
				}
				
				break;	

			case 'confirm_account_in_modal':
				
				send_data = {
					type : type,
					confirm : ($(this).attr('data-action') || -1 )
				}
				
				break;	

			case 'remind':
				send_data = {
					type : type,
					remind_email : ($('#remind_email').val() || -1 )
				}
				
				for(var key in send_data) {
					if(send_data[key] == -1) {
						$('#'+key).addClass('input_error');
						error = true;
					}
				}				
				
				break;	

			case 'remind2':
				send_data = {
					type : type,
					remind_email : ($('.remind_email2').val() || -1 )
				}
				
				break;
				
			case 'check_login2':
				
				send_data = {
					type : 'check_login',
					login_email : ($('.remind_email2').val() || 0 ),
					login_password : ($('#remind_password2').val() || 0 )
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
			beforeSend: function() {
				
			},
			success: function(json) {
				if(json) {
					if(json['success']) {
						if(send_data.type == 'check_login') {
							location.reload();
						} else if(send_data.type == 'register') {
							$('#shipping_form').submit();
						} else if(send_data.type == 'use_bonus') {
							location.reload();
						} else if(send_data.type == 'confirm_account_in_modal') {
							$('.mm_modal_and_mask').hide();
						} else if(send_data.type == 'remind') {
							$('.close_me_on_send2').hide();
							$('.remind_success').show();
						} else if(send_data.type == 'remind2') {
							$('.remind_success2').show();
						}
					} else if (json['redirect']) {
						location.href = json['redirect'];
					} else if(json['error']) {
						if(send_data.type == 'remind') {
							$('.close_me_on_send2').hide();
							$('.remind_error').show();
						} else if(json['error'] == 'busy_email') {
							$('.email_error').show();
							$('.blah_closer').show();
						} else if(send_data.type == 'check_login') {
							$('.close_me_on_send').hide();
							$('.remind_error2').show();
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

var cart = {
	'add': function(product_id, quantity) {
		$.ajax({
			url: '/cart_ajax',
			type: 'post',
			data: 'action=add&product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			success: function(json) {
				if(json['success']) {
					$('#h_cart_text_summ').text(json['success']['summ']);
					$('#h_cart_text_word').text(json['success']['word']);
					$('#h_cart_text_total').text(json['success']['total']);
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


$(document).on('click','.c_page',function(e) {
	tail = window.location.search;	
	params = URLToArray(tail);
	
	params['page'] = $(this).attr('data-page');
	
	window.location = window.location.origin + window.location.pathname + '?' + ArrayToURL(params); 
});

$('.cool_select').click(function() {
	$(this).parent().toggleClass('opened_cool_select');
	$('.select_closer').toggle();
});

$('.select_closer').click(function() {
	
	tail = window.location.search;	
	params = URLToArray(tail);
	
	$('.cool_select_check').each(function() {
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
	});
	
	window.location = window.location.origin+window.location.pathname+'?'+ArrayToURL(params); 

});

$(document).on('click','.cool_select_reset',function(e) {
	window.location = window.location.origin+window.location.pathname;
});

function filter_select(obj) {
	tail = window.location.search;	
	params = URLToArray(tail);
	
	name = $(obj).attr('name');
	value = $(obj).val();
	
	params[name] = value;
	
	window.location = window.location.origin+window.location.pathname+'?'+ArrayToURL(params); 
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