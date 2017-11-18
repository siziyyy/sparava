var block_send_button = false;
var current_page = 1;

function send_msg(msg) {
	window.frames['admin'].postMessage(send_data, "https://admin.aydaeda.ru");
}

function listener(event) {
	if (event.origin != 'https://admin.aydaeda.ru') {
		return;
	}
	
	if (event.data == 'iframe_ready') {
		$('.g_admin_info').css('display','inline-block');
		$('.provider_link').show();
	} else if(event.data.type == 'product_details') {
		product = event.data.data;
		
		$('#product_form .product_name_text').text(product.title);
		$('#product_form .product_description').val(product.description);
		
		$('#product_form .product_id').val(product.product_id);
		$('#product_form .product_image').attr('src','/images/'+product.image);
		$('#product_form .product_provider').val(product.provider);
		$('#product_form .product_type').val(product.type);
		$('#product_form .product_weight').val(product.weight);
		$('#product_form .product_country').val(product.country);
		$('#product_form .product_cost').val(product.cost);
		$('#product_form .product_price').val(product.price);
		$('#product_form .product_percent').val(product.percent);
		$('#product_form .product_pack').val(product.pack);
		$('#product_form .product_composition').val(product.composition);
		
		$('#product_form .product_name').val(product.title);
		$('#product_form .product_image_src').val(product.image);
		$('#product_form .product_category').val(product.category);
		$('#product_form .product_brand').val(product.brand);
		$('#product_form .product_status').val(product.status);
		$('#product_form .product_special').val(product.special);
		$('#product_form .product_special_begin').val(product.special_begin);
		$('#product_form .product_special_end').val(product.special_end);
		
		$('#product_form .product_kkal').val(product.kkal);
		$('#product_form .product_belki').val(product.belki);
		$('#product_form .product_jiri').val(product.jiri);
		$('#product_form .product_uglevodi').val(product.uglevodi);
		$('#product_form .product_gi').val(product.gi);
		$('#product_form .product_video_1').val(product.youtube[0]);
		$('#product_form .product_video_2').val(product.youtube[1]);
		
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
	$('.c_new_mobile_submenu_hamb_pack ').click(function() {
		$('.mobile_category_dropdown').toggle();
		$('.mobile_category_dropdown_closer').toggle();
	});
	$('.mobile_category_dropdown_closer ').click(function() {
		$('.mobile_category_dropdown').toggle();
		$('.mobile_category_dropdown_closer').toggle();
	});
	$('.c_new_mobile_submenu_more ').click(function() {
		$('.c_new_mobile_submenu_link_closed').toggle();
		$('.c_new_mobile_submenu_more').toggle();
	});

	$('.new_mob_submenu_filter').click(function() {
		target = $(this).attr('data-target');
		
  		$('#'+target).toggle();
  		$('.new_mob_submenu').toggle();
		$('.new_mob_submenu_filter_items_pack_inners').hide();		
  		$('body').toggleClass('fmfilter');
  	});
	
	$('.open_inner_filter').click(function() {
		target = $(this).attr('data-target');
  		$('#'+target).show();
  	});	
	
	$('.new_mob_submenu_filter_items_turn').click(function() {
		$(this).parents('.new_mob_submenu_filter_items_pack_inners').hide();
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
		$('.blah_blah_accept_agreement').hide();	
	});	

    $('.blah_link').click(function() {
        $('.blah_blah').show();
        $('.blah_closer').show();
    });
	
	$(document).on('click','.open_similar_product',function(e) {
		product_id = $(this).attr('data-product-id');
		$( ".g_good[data-product-id='"+product_id+"']" ).find('.send').click();
	});
	
	$(document).on('click','.save_product_details',function(e) {
		
		product = {
			product_id: $('#product_form .product_id').val(),
			provider: $('#product_form .product_provider').val(),
			type: $('#product_form .product_type').val(),
			weight: $('#product_form .product_weight').val(),
			country: $('#product_form .product_country').val(),
			cost: $('#product_form .product_cost').val(),
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
			special_end: $('#product_form .product_special_end').val(),
			kkal: $('#product_form .product_kkal').val(),
			belki: $('#product_form .product_belki').val(),
			jiri: $('#product_form .product_jiri').val(),
			uglevodi: $('#product_form .product_uglevodi').val(),
			gi: $('#product_form .product_gi').val(),
			video_1: $('#product_form .product_video_1').val(),
			video_2: $('#product_form .product_video_2').val()	
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
			product_id : $(this).parents('.g_good').attr('data-product-id'),
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
        autoplaySpeed: 3000,
		pauseOnHover: false,
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
    $('.m_h_login').click(function() {
        $('.mobile_modal').toggle();
        $('.mobile_auth').toggle();
    });	
    $('.respasmob').click(function() {
        $('.mobile_auth').toggle();
        $('.mobile_restore').toggle();
    });	
    $('.mobile_modal_close').click(function() {
        $('.mobile_restore').hide();
        $('.mobile_modal').hide();
        $('.mobile_restore_success').hide();
        $('.mobile_auth').hide();
    });	
    $('.mobgb2').click(function() {
        $('.mobile_restore_success').show();
    });	
    $('.mobile_modal_close_fav').click(function() {
        $('.mobile_fav').hide();
    });	
    $('.m_h_fav').click(function() {
        $('.mobile_fav').show();
    });	
    $('.g_good_mobile_fav').click(function() {
        $('.mobile_cat_fav_modal').show();
    });	
    $('.mobile_cat_fav_modal_close').click(function() {
        $('.mobile_cat_fav_modal').hide();
    });
    $('.blah_blah_mobile_close').click(function() {
        $('.blah_blah').hide();
        $('.blah_closer').hide();
    });	
    $('.blah_blah_mobile_close2').click(function() {
        $('.blaah').toggle();
    });	
    $('.regmob_link').click(function() {
        $('.regmob').toggle();
    });
    $('.good_modal_closer').click(function() {
        $('.good_modal').hide();
        $('.good_modal_closer').hide();
		change_cart_button();
    });	

    jQuery('.scrollbar-inner').scrollbar();

    $('.h_login_button').click(function() {
        $('.new_auth').show();
        $('.login_closer').show();
    });	
    $('.login_closer').click(function() {
        $('.new_auth').hide();
        $('.login_closer').hide();
        $('.new_auth_register_body').hide();
    });	
    $('.new_auth_register_header').click(function() {
        $('.new_auth_register_body').toggle();
    });
	
	$(document).on('click','.good_modal_arrow_right, .good_modal_arrow_left',function(e) {
		product_id = $(this).attr('data-product-id');
		$('.g_good[data-product-id="'+product_id+'"]').find('.g_good_photo_block').click();
	});
	
	$(document).on('click','.g_good_to_cart',function(e) {
		
		if($(this).parents('.g_good').length == 0) {
			parent_class = '.good_modal';
		} else if($(this).parents('.g_good').length > 0) {
			parent_class = '.g_good';
		}		
		
		quantity = $(this).parents(parent_class).find('.g_good_count_input').val();
		product_id = $(this).parents(parent_class).attr('data-product-id');
		cart.add(product_id, parseFloat(quantity),parent_class,$(this));

		$(this).parents(parent_class).find('.g_good_added_to_cart_text').text(quantity+' в ');
	});
	
	$(document).on('click','.g_good_added_to_cart',function(e) {
		window.location = '/cart';
	});
	
	$(document).on('click','.g_good_count_add',function(e) {
		
		if($(this).parents('.g_good').length == 0) {
			parent_class = '.good_modal';
		} else if($(this).parents('.g_good').length > 0) {
			parent_class = '.g_good';
		}
		
		$(this).parents(parent_class).find(".g_good_added_to_cart_text").hide();
		$(this).parents(parent_class).find(".g_good_to_cart_text").show();
		$(this).parents(parent_class).find(".g_good_added_to_cart").removeClass('g_good_added_to_cart');
		
		quantity = parseFloat($(this).parents(parent_class).find('.g_good_count_input').val());
		type_num = $(this).parents(parent_class).attr('data-type');
	
		quantity = get_quantity_by_type(quantity,type_num,false,parent_class,$(this));
		price = $(this).parents(parent_class).find(".g_good_price_value").text();

		$(this).parents(parent_class).find(".g_good_to_cart_value").text(parseFloat(quantity)*price);			
		$(this).parents(parent_class).find('.g_good_count_input').val(quantity);
	});
	
	$(document).on('click','.g_good_count_rem',function(e) {
		
		if($(this).parents('.g_good').length == 0) {
			parent_class = '.good_modal';
		} else if($(this).parents('.g_good').length > 0) {
			parent_class = '.g_good';
		}		
		
		$(this).parents(parent_class).find(".g_good_added_to_cart_text").hide();
		$(this).parents(parent_class).find(".g_good_to_cart_text").show();
		$(this).parents(parent_class).find(".g_good_added_to_cart").removeClass('g_good_added_to_cart');
		
		quantity = parseFloat($(this).parents(parent_class).find('.g_good_count_input').val());
		type_num = $(this).parents(parent_class).attr('data-type');
		
		quantity = get_quantity_by_type(quantity,type_num,true,parent_class,$(this));
		price = $(this).parents(parent_class).find(".g_good_price_value").text();

		$(this).parents(parent_class).find(".g_good_to_cart_value").text(parseFloat(quantity)*price);		
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
				
				if(quantity >= 1) {
					quantity = quantity - 0.5;
					return quantity+' '+type;
				}			
				
				quantity = quantity - 0.01;
				
				if(quantity > 0.5) {
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
				
				if(quantity >= 1) {
					quantity = quantity - 0.5;
					return quantity+' '+type;
				}			
				
				quantity = quantity - 0.01;
				
				if(quantity > 0.5) {
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
				} else if(quantity < 1) {
					quantity = 1;
				}
					
				return quantity+' '+type;
			}
		}
	}
	
	$( ".c_inners_count_input" ).change(function() {
		quantity = $(this).val();
		
		if(quantity <= 0) {
			quantity = 1;
		}
		
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
				
				if(json['success']) {
					if(json['load_status'] == 'hide') {
						$( ".c_show_more_goods" ).hide();
					}
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
		obj = $(this);
		
		switch(type) {
			case 'get_product_info':
				
				send_data = {
					type : 'get_product_info',
					product_id : $(this).parents('.g_good').attr('data-product-id'),
					good_type : $(this).parents('.g_good').attr('data-type')
				}
				
				break;			
			
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
					$('.blah_blah_accept_agreement').show();
					$('.blah_closer').show();
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
							$('.close_me_on_send').hide();
							$('.remind_success2').show();
						} else if(send_data.type == 'get_product_info') {
							
							product = json['success']['product'];
							$('#product_info').attr('data-product-id',product['product_id']);
							$('#product_info .g_good_modal_photo').attr('src','/images/'+product['image']);
							$('#product_info .cgood_modal_price_value').text(product['price']);
							
							if(product['old_price']) {
								$('#product_info .cgood_modal_old_price_value').text(product['old_price']);
								$('#product_info .cgood_modal_old_price').show();
							}
							
							if(product['title']) {
								$('#product_info .good_modal_name').text(product['title']);
							}
							
							$('#product_info .good_modal_id').text(product['articul']);
							
							if(product['description']) {
								$('#product_info .good_modal_desc').text(product['description']);
							}
							
							if(product['country']) {
								$('#product_info .good_modal_country').text(product['country']);
							}
							
							if(product['brand']) {
								$('#product_info .good_modal_firm').text(product['brand']);
							}
							
							if(product['weight']) {
								$('#product_info .good_modal_weight').text(product['weight']);
							}

							$('#product_info').attr('data-type',send_data.good_type);
							
							
							$('#product_info .composition').hide();
							$('#product_info .good_modal_video_line').hide();
							$('#product_info .good_modal_video_line').empty();							
							
							if(product['kkal']) {
								$('#product_info .kkal').text(product['kkal']);
								$('#product_info .composition').show();
							}

							if(product['belki']) {
								$('#product_info .belki').text(product['belki']);
								$('#product_info .composition').show();
							}

							if(product['jiri']) {
								$('#product_info .jiri').text(product['jiri']);
								$('#product_info .composition').show();
							}

							if(product['uglevodi']) {
								$('#product_info .uglevodi').text(product['uglevodi']);
								$('#product_info .composition').show();
							}

							if(product['gi']) {
								$('#product_info .gi').text(product['gi']);
								$('#product_info .composition').show();
							}

							if(product['youtube'][0].length > 0) {
								for (k in product['youtube']) {
									html = '<div class="good_modal_video" style="background:url(\'https://i1.ytimg.com/vi/'+product['youtube'][k]+'/default.jpg\')"><div class="good_modal_video_play sprite"></div></div>';
									$('#product_info .good_modal_video_line').append(html);
								}
								$('#product_info .good_modal_video_line').show();
							}
							
							$('#product_info .actions_holder').empty();
							
							$('#product_info .actions_holder').html(obj.parents('.g_good').find('.actions_holder').html());
							$('#product_info .g_good_count_input').val(obj.parents('.g_good').find('.g_good_count_input').val());
							
							$('#product_info .similar_products').empty();
							
							product = obj.parents('.g_good').next();
							
							prev_product_id = obj.parents('.g_good').prev().attr('data-product-id');
							next_product_id = obj.parents('.g_good').next().attr('data-product-id');
						
							if(!prev_product_id) {
								prev_product_id = $('.g_good').last().attr('data-product-id');
							}
							
							if(!next_product_id) {
								next_product_id = $('.g_good').first().attr('data-product-id');
							}
							
							$('.good_modal_arrow_left').attr('data-product-id',prev_product_id);
							$('.good_modal_arrow_right').attr('data-product-id',next_product_id);
							
							for(i=0;i<5;i++) {
								if(!product.attr('data-product-id')) {
									product = $('.g_good').first();
								}
								
								product_id = product.attr('data-product-id');
								image_url = product.find('.g_good_photo').attr('src');
								
								html = '<div class="good_modal_next_good open_similar_product" data-product-id="'+product_id+'"><img src="'+image_url+'" class="g_good_modal_photo_next"></div>';
								$('#product_info .similar_products').append(html);								
								
								product = product.next();
							}
							
							
							
							
							$('.good_modal').show();
							$('.good_modal_closer').show();
						}
					} else if (json['redirect']) {
						location.href = json['redirect'];
					} else if(json['error']) {
						if(send_data.type == 'remind') {
							$('.close_me_on_send2').hide();
							$('.remind_error').text(json['error']);
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
	'add': function(product_id, quantity, parent_class, obj = false) {
		$.ajax({
			url: '/cart_ajax',
			type: 'post',
			data: 'action=update&product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			success: function(json) {
				if(json['success']) {
					$('#h_cart_text_summ').text(json['success']['summ']);
					$('#h_cart_text_word').text(json['success']['word']);
					$('#h_cart_text_total').text(json['success']['total']);
					
					if(obj) {
						obj.addClass('g_good_added_to_cart');
						obj.parents(parent_class).find(".g_good_added_to_cart_text").show();
						obj.parents(parent_class).find(".g_good_to_cart_text").hide();
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

function change_cart_button() {
	html = $('#product_info .actions_holder').html();
	product_id = $('#product_info').attr('data-product-id');
	$('.g_good[data-product-id="'+product_id+'"]').find('.actions_holder').html(html);
	$('.g_good[data-product-id="'+product_id+'"]').find('.g_good_count_input').val($('#product_info .g_good_count_input').val());
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
	$('.opened_cool_select').removeClass('opened_cool_select');
	$('.select_closer').hide();
});

$('.cool_select_check').click(function() {
	$('.cool_select_button').addClass('cool_select_button_ready');
});

$('.cool_select_button,.new_mob_submenu_filter_button').click(function() {
	tail = window.location.search;	
	params = URLToArray(tail);
	
	$(this).parents('.filters_holder').find('.cool_select_check').each(function() {
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