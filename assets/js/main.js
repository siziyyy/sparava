var block_send_button = false;
$(document).ready(function(){
	
	if($('.c_menu_secondary').find('.c_current_menu_link').length > 0 ) {
        $('.c_menu_more_span').toggleClass('c_menu_more_span_opened');
        $('.c_menu_secondary').toggleClass('c_menu_hidden');	
	}
	
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
	
	$( ".g_good_counter" ).keyup(function() {
		quantity = $(this).val();
		price = $(this).parents('.g_good').find('.g_good_price_value').text();
		
		if(quantity <= 0) {
			quantity = 1;
		}
		
		$(this).parents('.g_good_actions').find('.g_good_to_cart_value').text(quantity*price);
	});
	
	$( ".g_good_to_cart" ).click(function() {
		quantity = $(this).parents('.g_good').find('.g_good_counter').val();
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
					email : ($('#login_email').val() || -1 )
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
							alert('Пароль был отправлен');
						}
					} else if (json['redirect']) {
						location.href = json['redirect'];
					} else if(json['error']) {
						alert(json['error']);
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