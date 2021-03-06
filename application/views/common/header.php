<!DOCTYPE html>
<html class="no-js" lang="ru">
	<head>

        <?php if(count($this->_seo_data)) { ?>
            <?php if($this->_seo_data['seo_keywords']) { ?>
                <meta name="keywords" content="<?php echo $this->_seo_data['seo_keywords'] ?>"/>
            <?php } ?>

            <?php if($this->_seo_data['seo_description']) { ?>
                <meta name="description" content="<?php echo $this->_seo_data['seo_description'] ?>"/>
            <?php } ?>

            <?php if($this->_seo_data['seo_title']) { ?>
                <title><?php echo $this->_seo_data['seo_title'] ?></title>
            <?php } ?>

            <?php if($this->_seo_data['seo_canonical']) { ?>
                <link rel="canonical" href="<?php echo $this->_seo_data['seo_canonical'] ?>"/>
            <?php } ?>           

            <meta name="robots" content="index,follow" />
        <?php } else { ?>
            <title>ай да еда - Продукты с Фуд Сити</title>
        <?php } ?>

		<meta charset="utf-8">
        <!--<meta name="viewport" content="width=1200">-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="194x194" href="/favicon-194x194.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#fe4517">
        <meta name="msapplication-TileColor" content="#fe4517">
        <meta name="msapplication-TileImage" content="/mstile-144x144.png">
        <meta name="theme-color" content="#fe4517">
		<style>
@font-face{font-family:Calibri Bold;src:local("Calibri Bold"),url(/assets/fnt/CalibriBold.woff) format("woff"),url(/assets/fnt/CalibriBold.woff2) format("woff2")}
@font-face{font-family:Calibri;src:local(Calibri),url(/assets/fnt/Calibri.woff) format("woff"),url(/assets/fnt/Calibri.woff2) format("woff2")}
body,html,textarea{font-family:Calibri}
    html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;-webkit-user-select:text;-moz-user-select:text;outline:none;cursor:default}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body,html{line-height:1;width:100%;height:100%;font-family:Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;font-weight:500}textarea{font-family:Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif!important;font-weight:500!important}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}.fl_l{float:left}.fl_r{float:right}.clear{clear:both}a{cursor:pointer;text-decoration:none}textarea:disabled{background:#FFF!important}input:focus,textarea:focus,div:focus,select:focus{outline:none}</style>
		<link rel="stylesheet" href="/assets/css/main.css"><!-- always -->
        <link rel="stylesheet" href="/assets/css/index.css"><!-- only index -->
        <link rel="stylesheet" href="/assets/mdl/slick/slick.css"><!-- only index -->
        <link rel="stylesheet" href="/assets/mdl/scroll/jquery.scrollbar.css"><!-- only index -->
        <link rel="stylesheet" href="/assets/css/category.css"><!-- only catalog -->
        <link rel="stylesheet" href="/assets/css/contacts.css"><!-- only contacts -->
        <link rel="stylesheet" href="/assets/css/cart.css"><!-- only cart -->
		<link rel="stylesheet" href="/assets/css/youtube.css">
		<link rel="stylesheet" href="/assets/css/youtube.scroll.min.css">

        <?php if(isset($fb_share)) { ?>
            <?php foreach($fb_share as $property => $value) { ?>
                <meta property="<?php echo $property ?>" content="<?php echo $value ?>">
            <?php } ?>
        <?php } ?>
        <script src="//ulogin.ru/js/ulogin.js"></script>
	</head>
	<body>
		<div class="mobile_check"></div>
				<!-- Facebook Pixel Code -->
				<script>
				!function(f,b,e,v,n,t,s)
				{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};
				if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
				n.queue=[];t=b.createElement(e);t.async=!0;
				t.src=v;s=b.getElementsByTagName(e)[0];
				s.parentNode.insertBefore(t,s)}(window,document,'script',
				'https://connect.facebook.net/en_US/fbevents.js');
				 fbq('init', '298862557184301'); 
				fbq('track', 'PageView');
				</script>
				<noscript>
				 <img height="1" width="1" 
				src="https://www.facebook.com/tr?id=298862557184301&ev=PageView
				&noscript=1"/>
				</noscript>
				<!-- End Facebook Pixel Code -->	
				
                <!-- Yandex.Metrika counter -->
                <script type="text/javascript" >
                    (function (d, w, c) {
                        (w[c] = w[c] || []).push(function() {
                            try {
                                w.yaCounter46865034 = new Ya.Metrika({
                                    id:46865034,
                                    clickmap:true,
                                    trackLinks:true,
                                    accurateTrackBounce:true,
                                    webvisor:true
                                });
                            } catch(e) { }
                        });

                        var n = d.getElementsByTagName("script")[0],
                            s = d.createElement("script"),
                            f = function () { n.parentNode.insertBefore(s, n); };
                        s.type = "text/javascript";
                        s.async = true;
                        s.src = "https://mc.yandex.ru/metrika/watch.js";

                        if (w.opera == "[object Opera]") {
                            d.addEventListener("DOMContentLoaded", f, false);
                        } else { f(); }
                    })(document, window, "yandex_metrika_callbacks");
                </script>
                <noscript><div><img src="https://mc.yandex.ru/watch/46865034" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
                <!-- /Yandex.Metrika counter -->			
				
        <div class="test"></div>
        <style>
            /*.test {
                position: fixed;
                opacity: .5;
                width: 100%;
                height: 100%;
                z-index: 999999999;
                background: url('/images/test.jpg');
                top: 0;
                left: 0;
                display: none;
            }*/
        </style>
        <div class="new_modal_and_mask_05_18">
            <div class="new_mask_05_18"></div>
            <div class="new_modal_05_18">
                <div class="new_modal_05_18_text_flex">
                    <!--<div class="new_modal_05_18_text">
                        При оформлении заказа<br>Вы получите скидку
                    </div>-->
                    <div class="new_modal_05_18_text">
                        Ваш подарок уже добавлен<br>в корзину
                    </div>
                    <!--<div class="new_modal_05_18_text_red">10%</div>
                    <div class="new_modal_05_18_text2">
                        + 200 руб. при следующем заказе
                    </div>-->
                </div>
                <div class="new_modal_05_18_bg"></div>
            </div>
        </div>
        <div class="closer blah_closer"></div>
        <div class="closer g_g_desc_closer"></div>
        <div class="closer new_menu_closer"></div>
        <div class="closer select_closer"></div>
        <div class="closer count_select_closer"></div>
        <div class="closer all_menu_closer"></div>
        <div class="closer admin_window_closer"></div>
        <div class="closer mobile_category_dropdown_closer"></div>
        <div class="closer good_modal_closer"></div>
        <div class="closer login_closer"></div>
        <div class="closer video_closer"></div>
        <div class="closer new_inform_menu_closer"></div>
        <div class="closer share_it_faster_closer"></div>
        <div class="closer morder_closer"></div>
        <? // require '_modal.php'; ?><!-- modal -->
        <div class="mobile_category_dropdown">
            <div class="mobile_category_dropdown_line">по рейтингу</div>
            <div class="mobile_category_dropdown_line">по добавлению товара</div>
            <div class="mobile_category_dropdown_line mobile_category_dropdown_cur">по удаленности</div>
            <div class="mobile_category_dropdown_line fbbmd">по алфавиту</div>
            <div class="mobile_category_dropdown_cancel">отменить сортировку</div>
        </div>

        <?php $this->load->view('common/mobile-info'); ?>
        
        <div class="mag_or_blog">
            <a href="/" class="mag_or_blog_link <?php echo ($this->router->fetch_method() == 'blogs' ? 'mag_or_blog_link_act' : '') ?>">магазин</a>
            <span class="mag_or_blog_separator"></span>
            <a href="/blogs" class="mag_or_blog_link <?php echo ($this->router->fetch_method() != 'blogs' ? 'mag_or_blog_link_act' : '') ?>">блог</a>
        </div>
        <?php if($this->baselib->is_logged()) { ?>
            <a href="/"><div class="mobile_exit_new">выйти</div></a>
        <?php } else { ?>
            <a><div class="mobile_exit_new mobile_exit_login_new">войти</div></a>
        <? } ?>
		<header>
			<div class="content_helper">
                <!-- 
                    Надо починить инпуты в админке (модальное окно)
                    .modal_info_inp {
                        border: 1px solid #999;
                    }
                 -->
                <div class="mobile_header">
                    <div class="m_h_hamb new_sprite fl_l"></div>
                    <a href="tel:+74955448864"><div class="m_h_call new_sprite fl_l"></div></a>
                    <a href="/">
                        <div class="m_h_logo">
                            <img src="/assets/img/new_logo.svg" class="m_h_logo_img" alt="sparava">
                        </div>
                    </a>
                    <a href="/cart">
                        <div class="m_h_cart fl_r">
                            <div class="m_h_cart_icon sprite fl_l"></div>
                            <div class="m_h_cart_text fl_l">0</div>
                            <div class="clear"></div>
                        </div>
                    </a>
                    <!--<div class="m_h_login <?php echo ($this->baselib->is_logged() ? 'black_auth' : '') ?> sprite fl_r"></div>-->
                    <a href="/favourites"><div class="m_h_fav new_sprite fl_r"></div></a>
                    <div class="clear"></div>
                </div>
				<div class="main_header">
					<a href="/">
                        <!-- <div class="h_logo fl_l">-->
                        <div class="h_logo">
							<img src="/assets/img/h_logo.png" class="h_logo_img" alt="sparava">
						</div>
					</a>
                    <div class="new_inform_menu">
                        <div class="new_inform_menu_col new_inform_menu_col_first fl_l">
                            <div class="new_inform_menu_col_header">Доставка</div>
                            <a href="/information/delivery" class="new_inform_menu_col_link">Доставка и способы оплаты</a>
                            <a href="/information/return" class="new_inform_menu_col_link">Прием заказа, обмен и возврат</a>
                            <a href="/information/guarantee" class="new_inform_menu_col_link">Гарантия качества</a>
                            <div class="new_inform_menu_col_link_sepp"></div>
                        </div>
                        <div class="new_inform_menu_col new_inform_menu_col_sec fl_l">
                            <div class="new_inform_menu_col_header">Программы лояльности</div>
                            <a href="/information/claims" class="new_inform_menu_col_link">Претензии и предложения</a>
                            <div class="new_inform_menu_col_link_sepp"></div>
                        </div>
                        <div class="new_inform_menu_col new_inform_menu_col_thr fl_l">
                            <div class="new_inform_menu_col_header">Информация о нас</div>
                            <a href="/information/about" class="new_inform_menu_col_link">О нас</a>
                            <a href="/information/testimonials" class="new_inform_menu_col_link">Отзывы о нас</a>
                            <a href="/information/contacts" class="new_inform_menu_col_link">Контакты</a>
                            <div class="new_inform_menu_col_link_sepp"></div>
                        </div>
                        <div class="new_inform_menu_col new_inform_menu_col_last fl_l">
                            <div class="new_inform_menu_col_header">Сотрудничество и работа</div>
                            <a href="/information/caterer" class="new_inform_menu_col_link">Поставщики</a>
                            <a href="/information/vacancy" class="new_inform_menu_col_link">Работа</a>
                            <a href="/information/bloger" class="new_inform_menu_col_link">Блогерам</a>
                            <div class="new_inform_menu_col_link_sepp"></div>
                        </div>
                    </div>
                    <!-- <div class="h_menu fl_r">-->
                    <?php if($this->router->fetch_method() == 'blogs') { ?>
                        <a href="/" class="h_link green_text dirty_link">магазин</a>
                    <?php } else { ?>
                        <a href="/blogs" class="h_link green_text dirty_link">наш вкусный блог</a>
                    <?php } ?>
                    <a class="h_link show_new_inform_menu">вся информация</a>
                    <div class="morder_pack22">
                        <?php if($this->baselib->is_logged()) { ?>
                            <a href="/orders" class="morder new_header_icons new_header_icons_hamb"></a>
                        <?php } ?>
                        <!-- <div class="morder_dropdown">
                            <div class="morder_dropdown_close">&times;</div>
                            чтобы посмотреть заказы 
                            <br>авторизируйтесь
                        </div> -->
                        <a href="/favourites" class="new_header_icons new_header_icons_fav"></a>
                        <?php if($this->baselib->is_logged()) { ?>
                            <a href="/account/settings" class="new_header_icons new_header_icons_set"></a>
                        <?php } ?>
                        <?php if($this->baselib->is_logged()) { ?>
                            <a href="/logout" class="new_h_link h_link kmoijnuhybuh">выйти</a>
                        <?php } ?>
    					<?php if(!$this->baselib->is_logged()) { ?>
                            <!-- <div class="h_login fl_r">-->
    						<div class="h_login">
    							<a class="h_login_button">войти</a>
    							<div class="new_login_message">
    								<div class="new_login_message_close">&times;</div>
    								<div class="new_login_message_restore">
    									<div class="new_login_message_restore_header">Восстановление пароля</div>
    									<div class="new_login_message_restore_subheader">
    										Для восстановления пароля введите 
    										<br>вашу почту
    									</div>
    									<div class="new_auth_line">
    										<label>
    											<input type="text" class="new_auth_inp remind_email3">
    										</label>
    									</div>
    									<div class="new_login_message_restore_subheader">
    										Если Вы забили пароль опросите и мы 
    										<br>отправим повторно
    									</div>
    									<div class="restore_pass_new new_green_small_button fl_l send" data-type="remind3">восстановить пароль</div>
    								</div>
    								<div class="new_login_message_next text_remind3">
    									<div class="new_login_message_body">
    										На вашу почту было выслано письмо с 
    										<br>дальнейшими инструкциями
    									</div>
    									<div class="new_login_message_back">
    										<span class="new_login_message_back_icon sprite"></span>
    										<span class="new_login_message_back_text">назад</span>
    									</div>
    								</div>
    								<div class="new_login_message_next text_error_login3">
    									<div class="new_login_message_body">
    										Неправильные данные
    										<br>для входа в систему
    									</div>
    									<div class="new_login_message_back">
    										<span class="new_login_message_back_icon sprite"></span>
    										<span class="new_login_message_back_text">назад</span>
    									</div>
    								</div>
    								<div class="new_login_message_next text_register3">
    									<div class="new_login_message_body">
    										На Вашу почту были
    										<br>отправлены данные для входа
    									</div>
    									<div class="new_login_message_login">войти</div>
    								</div>
    								<div class="new_login_message_next text_busy3">
    									<div class="new_login_message_body">
    										Данная электронная почта
    										<br>уже занята
    									</div>
    									<div class="new_login_message_back">
    										<span class="new_login_message_back_icon sprite"></span>
    										<span class="new_login_message_back_text">назад</span>
    									</div>
    								</div>
    							</div>
    							<div class="new_auth login_form3">
    								<div class="new_auth_line">
    									<label>
    										<span class="new_auth_inp_text">логин</span>
    										<input type="text" class="new_auth_inp check_email3">
    									</label>
    								</div>
    								<div class="new_auth_line">
    									<label>
    										<span class="new_auth_inp_text">пароль</span>
    										<input type="password" class="new_auth_inp check_password3">
    									</label>
    								</div>
    								<div class="new_auth_actions">
    									<div class="new_auth_button new_green_small_button fl_l send" data-type="check_login3">войти</div>
    									<div class="new_auth_remind fl_r">забыл пароль</div>
    									<div class="clear"></div>
    								</div>
                                    <div class="soc_login_dropdown">
                                        <div class="socials_login_cart_header">войти через социальные сети</div>
                                        <div class="soc_log_cart_icons" id="uLogin" data-ulogin="display=buttons;fields=first_name,last_name">
                                            <a href="#" class="soc_log_cart_icon soc_log_tw" data-uloginbutton = "twitter"></a>
                                            <a href="#" class="soc_log_cart_icon soc_log_ok" data-uloginbutton = "odnoklassniki"></a>
                                            <a href="#" class="soc_log_cart_icon soc_log_ml" data-uloginbutton = "mailru"></a>
                                            <a href="#" class="soc_log_cart_icon soc_log_vk" data-uloginbutton = "vkontakte"></a>
                                            <a href="#" class="soc_log_cart_icon soc_log_fb" data-uloginbutton = "facebook"></a>
                                        </div>
                                    </div>
    								<div class="new_auth_register">
    									<div class="new_auth_register_header">
    										Зарегистрироваться
    										<span class="new_auth_register_arrow sprite new_auth_register_arrow2"></span>
    										<div class="clear"></div>
    									</div>
    									<div class="new_auth_register_body">
    										<div class="new_auth_line">
    											<label>
    												<span class="new_auth_inp_text">почта</span>
    												<input type="text" class="new_auth_inp register_email3">
    											</label>
    										</div>
    										<div class="new_auth_line">
    											<label>
    												<span class="new_auth_inp_text">имя</span>
    												<input type="text" class="new_auth_inp register_name3">
    											</label>
    										</div>
    										<div class="new_auth_line">
    											<label>
    												<span class="new_auth_inp_text">телефон</span>
    												<input type="text" class="new_auth_inp register_phone3" id="phone">
    											</label>
    										</div>
    										<div class="new_signup new_auth_button new_orange_small_button send" data-type="register3">зарегистрироваться</div>
    									</div>
    								</div>
    							</div>
    						</div>
    					<?php } ?>
                    </div>
                    <!-- <div class="h_phones fl_r">-->
                    <div class="h_phones">
                        <a href="tel:+74955448864" class="h_phone">8 495 544 88 64</a><a href="/callme" class="callme">заказать звонок </a>
                    </div>
                    <a href="/cart">
                        <!-- <div class="h_cart fl_r">-->
                        <div class="h_cart">
                            <div class="h_cart_icon sprite fl_l"></div>
                            <div class="h_cart_text fl_l">
                                <? if ($cart['total'] == 0) { ?>
                                    <span id="h_cart_text_total">корзинка пуста</span>
                                <? } else { ?>
                                    <span id="h_cart_text_total"><?php echo $cart['total'] ?></span> <span id="h_cart_text_word"><?php echo $cart['word'] ?></span> на <span id="h_cart_text_summ"><?php echo $cart['summ'] ?></span> руб.
                                <? } ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </a>
					<div class="clear vgyhunjimko"></div>
				</div>
			</div>
		</header>
        <?php $this->load->view('common/product-edit-form');?>
        <?php $this->load->view('common/product-info');?>