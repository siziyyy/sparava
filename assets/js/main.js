var block_send_button = false;
var current_page = 1;
var show_admin_info = false;

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
		show_admin_info = true;
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
		$('#product_form .product_cko').val(product.cko);
		$('#product_form .product_kol').val(product.kol);
		$('#product_form .product_mera').val(product.mera);
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
				
		$('#product_form .product_eko').prop('checked', false);
		if(product.eko > 0) {
			$('#product_form .product_eko').prop('checked', true);
		}
		
		$('#product_form .product_farm').prop('checked', false);
		if(product.farm > 0) {
			$('#product_form .product_farm').prop('checked', true);
		}

		$('#product_form .product_diet').prop('checked', false);
		if(product.diet > 0) {
			$('#product_form .product_diet').prop('checked', true);
		}		
		
		calculate_price();
		
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
	
	$(function(){


/*!
 * jQuery Browser Plugin v0.0.6
 * https://github.com/gabceb/jquery-browser-plugin
 *
 * Original jquery-browser code Copyright 2005, 2013 jQuery Foundation, Inc. and other contributors
 * http://jquery.org/license
 
 * Modifications Copyright 2013 Gabriel Cebrian
 * https://github.com/gabceb
 *
 * Released under the MIT license
 *
 * Date: 2013-07-29T17:23:27-07:00
 
 https://github.com/gabceb/jquery-browser-plugin/blob/master/dist/jquery.browser.js
 */

(function( jQuery, window, undefined ) {
  "use strict";

  var matched, browser;

  jQuery.uaMatch = function( ua ) {
    ua = ua.toLowerCase();

    var match = /(opr)[\/]([\w.]+)/.exec( ua ) ||
        /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
        /(version)[ \/]([\w.]+).*(safari)[ \/]([\w.]+)/.exec( ua ) ||
        /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
        /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
        /(msie) ([\w.]+)/.exec( ua ) ||
        ua.indexOf("trident") >= 0 && /(rv)(?::| )([\w.]+)/.exec( ua ) ||
        ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
        [];

    var platform_match = /(ipad)/.exec( ua ) ||
        /(iphone)/.exec( ua ) ||
        /(android)/.exec( ua ) ||
        /(windows phone)/.exec( ua ) ||
        /(win)/.exec( ua ) ||
        /(mac)/.exec( ua ) ||
        /(linux)/.exec( ua ) ||
        /(cros)/i.exec( ua ) ||
        [];

    return {
        browser: match[ 3 ] || match[ 1 ] || "",
        version: match[ 2 ] || "0",
        platform: platform_match[ 0 ] || ""
    };
  };

  matched = jQuery.uaMatch( window.navigator.userAgent );
  browser = {};

  if ( matched.browser ) {
    browser[ matched.browser ] = true;
    browser.version = matched.version;
    browser.versionNumber = parseInt(matched.version);
  }

  if ( matched.platform ) {
    browser[ matched.platform ] = true;
  }

  // These are all considered mobile platforms, meaning they run a mobile browser
  if ( browser.android || browser.ipad || browser.iphone || browser[ "windows phone" ] ) {
    browser.mobile = true;
  }

  // These are all considered desktop platforms, meaning they run a desktop browser
  if ( browser.cros || browser.mac || browser.linux || browser.win ) {
    browser.desktop = true;
  }

  // Chrome, Opera 15+ and Safari are webkit based browsers
  if ( browser.chrome || browser.opr || browser.safari ) {
    browser.webkit = true;
  }

  // IE11 has a new token so we will assign it msie to avoid breaking changes
  if ( browser.rv )
  {
    var ie = "msie";

    matched.browser = ie;
    browser[ie] = true;
  }

  // Opera 15+ are identified as opr
  if ( browser.opr )
  {
    var opera = "opera";

    matched.browser = opera;
    browser[opera] = true;
  }

  // Stock Android browsers are marked as Safari on Android.
  if ( browser.safari && browser.android )
  {
    var android = "android";

    matched.browser = android;
    browser[android] = true;
  }

  // Assign the name and platform variable
  browser.name = matched.browser;
  browser.platform = matched.platform;


  jQuery.browser = browser;
})( jQuery, window );

/*
    Masked Input plugin for jQuery
    Copyright (c) 2007-2011 Josh Bush (digitalbush.com)
    Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license) 
    Version: 1.3
  https://cloud.github.com/downloads/digitalBush/jquery.maskedinput/jquery.maskedinput-1.3.min.js
*/
(function(a){var b=(a.browser.msie?"paste":"input")+".mask",c=window.orientation!=undefined;a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},dataName:"rawMaskFn"},a.fn.extend({caret:function(a,b){if(this.length!=0){if(typeof a=="number"){b=typeof b=="number"?b:a;return this.each(function(){if(this.setSelectionRange)this.setSelectionRange(a,b);else if(this.createTextRange){var c=this.createTextRange();c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select()}})}if(this[0].setSelectionRange)a=this[0].selectionStart,b=this[0].selectionEnd;else if(document.selection&&document.selection.createRange){var c=document.selection.createRange();a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length}return{begin:a,end:b}}},unmask:function(){return this.trigger("unmask")},mask:function(d,e){if(!d&&this.length>0){var f=a(this[0]);return f.data(a.mask.dataName)()}e=a.extend({placeholder:"_",completed:null},e);var g=a.mask.definitions,h=[],i=d.length,j=null,k=d.length;a.each(d.split(""),function(a,b){b=="?"?(k--,i=a):g[b]?(h.push(new RegExp(g[b])),j==null&&(j=h.length-1)):h.push(null)});return this.trigger("unmask").each(function(){function v(a){var b=f.val(),c=-1;for(var d=0,g=0;d<k;d++)if(h[d]){l[d]=e.placeholder;while(g++<b.length){var m=b.charAt(g-1);if(h[d].test(m)){l[d]=m,c=d;break}}if(g>b.length)break}else l[d]==b.charAt(g)&&d!=i&&(g++,c=d);if(!a&&c+1<i)f.val(""),t(0,k);else if(a||c+1>=i)u(),a||f.val(f.val().substring(0,c+1));return i?d:j}function u(){return f.val(l.join("")).val()}function t(a,b){for(var c=a;c<b&&c<k;c++)h[c]&&(l[c]=e.placeholder)}function s(a){var b=a.which,c=f.caret();if(a.ctrlKey||a.altKey||a.metaKey||b<32)return!0;if(b){c.end-c.begin!=0&&(t(c.begin,c.end),p(c.begin,c.end-1));var d=n(c.begin-1);if(d<k){var g=String.fromCharCode(b);if(h[d].test(g)){q(d),l[d]=g,u();var i=n(d);f.caret(i),e.completed&&i>=k&&e.completed.call(f)}}return!1}}function r(a){var b=a.which;if(b==8||b==46||c&&b==127){var d=f.caret(),e=d.begin,g=d.end;g-e==0&&(e=b!=46?o(e):g=n(e-1),g=b==46?n(g):g),t(e,g),p(e,g-1);return!1}if(b==27){f.val(m),f.caret(0,v());return!1}}function q(a){for(var b=a,c=e.placeholder;b<k;b++)if(h[b]){var d=n(b),f=l[b];l[b]=c;if(d<k&&h[d].test(f))c=f;else break}}function p(a,b){if(!(a<0)){for(var c=a,d=n(b);c<k;c++)if(h[c]){if(d<k&&h[c].test(l[d]))l[c]=l[d],l[d]=e.placeholder;else break;d=n(d)}u(),f.caret(Math.max(j,a))}}function o(a){while(--a>=0&&!h[a]);return a}function n(a){while(++a<=k&&!h[a]);return a}var f=a(this),l=a.map(d.split(""),function(a,b){if(a!="?")return g[a]?e.placeholder:a}),m=f.val();f.data(a.mask.dataName,function(){return a.map(l,function(a,b){return h[b]&&a!=e.placeholder?a:null}).join("")}),f.attr("readonly")||f.one("unmask",function(){f.unbind(".mask").removeData(a.mask.dataName)}).bind("focus.mask",function(){m=f.val();var b=v();u();var c=function(){b==d.length?f.caret(0,b):f.caret(b)};(a.browser.msie?c:function(){setTimeout(c,0)})()}).bind("blur.mask",function(){v(),f.val()!=m&&f.change()}).bind("keydown.mask",r).bind("keypress.mask",s).bind(b,function(){setTimeout(function(){f.caret(v(!0))},0)}),v()})}})})(jQuery);

/*     My Javascript      */


  
  $("#phone").mask("+7 (999) 999-9999");


  $("#phone").on("blur", function() {
      var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

      if( last.length == 5 ) {
          var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );

          var lastfour = last.substr(1,4);

          var first = $(this).val().substr( 0, 9 );

          $(this).val( first + move + '-' + lastfour );
      }
  });
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
	
	$(document).on('click','.new_auth_remind',function(e) {
		e.preventDefault();
		$('.new_auth').hide();
		$('.new_login_message').show();
		$('.new_login_message_restore').show();		
		$('.new_login_message_next').hide();
	});
	
	$(document).on('click','.cool_select_arrow2',function(e) {
		e.preventDefault();
		type = $(this).parents('.cool_select_pack').attr('data-type');
		
		tail = window.location.search;	
		params = URLToArray(tail);
		
		delete params[type];
		
		window.location = window.location.origin+window.location.pathname+'?'+ArrayToURL(params);
	});	
	
	$(document).on('click','.new_login_message_back',function(e) {
		e.preventDefault();
		$('.new_auth').show();
		$('.new_login_message').hide();
		$('.new_login_message_next').hide();
	});
	
	$(document).on('click','.delete_selected_filter',function(e) {
		e.preventDefault();
		filter = $(this).attr('data-value');
		type = $(this).attr('data-type');

		tail = window.location.search;	
		params = URLToArray(tail);
		
		if(type == 'price' || type == 'weight') {
			delete params[type];
		} else {
			values = params[type];
			
			if(values) {
				values = values.split(';');
			}
			
			index = values.indexOf(filter);
			
			delete values[index];
			
			params[type] = values.join(';');
		}

		window.location = window.location.origin+window.location.pathname+'?'+ArrayToURL(params); 		
	});
	
	$(document).on('click','.new_login_message_login',function(e) {
		e.preventDefault();
		location.reload();
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
		$('.remind_error3').hide();	
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
		
		eko = 0;
		farm = 0;
		diet = 0;
		
		if($('#product_form .product_eko').is(':checked')) {
			eko = 1;
		}
		
		if($('#product_form .product_farm').is(':checked')) {
			farm = 1;
		}
		
		if($('#product_form .product_diet').is(':checked')) {
			diet = 1;
		}		
		
		product = {
			product_id: $('#product_form .product_id').val(),
			provider: $('#product_form .product_provider').val(),
			type: $('#product_form .product_type').val(),
			weight: $('#product_form .product_weight').val(),
			country: $('#product_form .product_country').val(),
			cost: $('#product_form .product_cost').val(),
			price: $('#product_form .product_price').val(),
			percent: $('#product_form .product_percent').val(),
			cko: $('#product_form .product_cko').val(),
			kol: $('#product_form .product_kol').val(),
			mera: $('#product_form .product_mera').val(),
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
			video_2: $('#product_form .product_video_2').val(),
			eko: eko,
			farm: farm,
			diet: diet
		}	
		
		send_data = {
			type : 'save_product',
			data : product
		}
		
		send_msg(send_data);
	});	
	
	$(document).on('change','#product_form .product_cost,#product_form .product_percent',function(e) {
		calculate_price();
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
    $('.mobile_modal_close_fav').click(function() {
		$('.mobile_modal').show();
        $('.mobile_fav').hide();
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
    $('.login_closer,.new_login_message_close').click(function() {
        $('.new_auth').hide();
        $('.login_closer').hide();
		$('.new_login_message').hide();
		$('.new_login_message_restore').hide();
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
	
	$(document).on('change','.g_good_count_input',function(e) {
		
		if($(this).parents('.g_good').length == 0) {
			parent_class = '.good_modal';
		} else if($(this).parents('.g_good').length > 0) {
			parent_class = '.g_good';
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
		$(this).parents(parent_class).find(".g_good_to_cart_value").text(quantity*price);
		
		$(this).val(quantity+' '+type);
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
		
		product_id = $(this).parents('.c_inners_side_tr').attr('data-product-id');
		cart.update(product_id, quantity);
	});
	
	$( ".c_inners_count_delete" ).click(function() {
		product_id = $(this).parents('.c_inners_side_tr').attr('data-product-id');
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
		} else if($( this ).attr('data-provider-id')) {
			send_data.provider_id = $( this ).attr('data-provider-id');
		} else if($( this ).attr('data-provider-full-id')) {
			send_data.provider_full_id = $( this ).attr('data-provider-full-id');
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
					
					if(json['load_status'] == 'hide') {
						$( ".c_show_more_goods" ).hide();
					}

					if(json['empty_products']) {
						for(i=0;i<json['empty_products'];i++) {
							$( '<div class="g_good fl_l hide_on_mobile">&nbsp;</div>' ).insertAfter( ".g_good:last-child" );
						}
					}
					
					if(show_admin_info) {
						$('.g_admin_info').css('display','inline-block');
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
			case 'favourite':
			
				if($(this).parents('.g_good').length > 0) {
					parent_object = $(this).parents('.g_good');
				} else if($(this).parents('.good_modal').length > 0) {
					parent_object = $(this).parents('.good_modal');
				}
				
				send_data = {
					type : type,
					product_id : parent_object.attr('data-product-id')
				}
				
				break;			
			
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
					account_details_address : ($('#account_details_address').val() || -1 ),
					account_details_shipping_method : ($('input[name="account_details_shipping_method"]:checked').val() || -1 )
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
				
			case 'remind3':
				send_data = {
					type : type,
					remind_email : ($('.remind_email3').val() || -1 )
				}
				
				break;

			case 'remind4':
				send_data = {
					type : type,
					remind_email : ($('.remind_email4').val() || -1 )
				}
				
				break;					
				
			case 'check_login2':
				
				send_data = {
					type : 'check_login',
					login_email : ($('.remind_email2').val() || 0 ),
					login_password : ($('#remind_password2').val() || 0 )
				}

				break;

			case 'check_login3':
				
				send_data = {
					type : 'check_login',
					login_email : ($(this).parents('.login_form3').find('.check_email3').val() || 0 ),
					login_password : ($(this).parents('.login_form3').find('.check_password3').val() || 0 )
				}

				break;

			case 'register3':
				
				send_data = {
					type : 'register',
					register_email : ($(this).parents('.login_form3').find('.register_email3').val() || 0 ),
					register_phone : ($(this).parents('.login_form3').find('.register_phone3').val() || 0 ),
					register_name : ($(this).parents('.login_form3').find('.register_name3').val() || 0 )
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
						} else if(type == 'register3') {
							$('.new_auth').hide();
							$('.new_login_message').show();
							$('.text_register3').show();
							$('.mobile_modal').hide();
							$('.register_succes_4').show();
						} else if(send_data.type == 'register') {
							if($('#shipping_form').length > 0) {
								$('#shipping_form').submit();
							} else {
								location.reload();
							}
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
						} else if(send_data.type == 'remind3') {
							$('.new_login_message_restore').hide();
							$('.new_login_message').show();
							$('.text_remind3').show();
						} else if(send_data.type == 'remind4') {
							$('.mobile_modal').hide();
							$('.mobile_restore_success').show();
						} else if(send_data.type == 'favourite') {
							parent_object.find('.good_modal_fav').addClass('good_modal_fav_ylw');
							parent_object.find('.g_good_mobile_fav').addClass('g_good_mobile_fav_orange');
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
							
							$('#product_info .good_modal_fav').removeClass('good_modal_fav_ylw');
							
							if(product['favourite']) {
								$('#product_info .good_modal_fav').addClass('good_modal_fav_ylw');
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
							if(type == 'register3') {
								$('.new_auth').hide();
								$('.new_login_message').show();
								$('.text_busy3').show();
								$('.mobile_modal').hide();
								$('.register_error_busy4').show();
							} else {
								$('.email_error').show();
								$('.blah_closer').show();								
							}
						} else if(type == 'check_login2') {
							$('.close_me_on_send').hide();
							$('.remind_error2').show();
						} else if(type == 'check_login') {
							$('.blaah').show();
							$('.blah_closer').show();
							$('.close_me_on_send2').hide();
							$('.remind_error3').show();
						} else if(type == 'check_login3') {
							$('.new_auth').hide();
							$('.new_login_message').show();
							$('.text_error_login3').show();
							$('.mobile_modal').hide();
							$('.login_error_4').show();							
						} else if(type == 'remind4') {
							$('.mobile_modal').hide();
							$('.remind_error4').show();
						}						
					} else if(json['remove']) {
						if(send_data.type == 'favourite') {
							parent_object.find('.good_modal_fav').removeClass('good_modal_fav_ylw');
							parent_object.find('.g_good_mobile_fav').removeClass('g_good_mobile_fav_orange');
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
					yaCounter46865034.reachGoal('cart-add');
					
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
	
	delete params['page'];
	
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
	
function calculate_price() {
	percent = $('#product_form .product_percent').val();
	cost = $('#product_form .product_cost').val();
	
	final_price = cost*((percent/100)+1);
	
	if(final_price % parseInt(final_price) > 0) {
		final_price = parseInt(final_price)+1;
	}
	
	$('#product_form .final_price').text(final_price);
}