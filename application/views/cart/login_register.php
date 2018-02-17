<aside class="c_inners_left_side fl_l">
	<div class="c_inners_side_header">
		<span class="c_inners_amount_text">сумма к оплате, без доставки</span>
		<span class="c_inners_amount_num"><?php echo $summ ?> р.</span>
	</div>
	<div class="c_inners_left_side_content">
		<div class="c_inners_left_side_text_h">
			Постоянный клиент
		</div>
		<form class="c_inners_left_side_form" id="login">
			<div class="c_inners_input_line">
				<div class="c_inners_input_label">электронная почта</div>
				<input type="email" class="c_inners_input" id="login_email">
			</div>
			<div class="c_inners_input_line">
				<div class="c_inners_input_label">пароль</div>
				<input type="password" class="c_inners_input" id="login_password">
			</div>
		</form>
		<div class="blaah">
			<div class="restorepass">
				<div class="blah_blah_mobile_close2 sprite"></div>
				<div class="close_me_on_send2">
					<div class="blah_blah_header">Восстановление пароля</div>
					<div class="blah_blah_body">
						Для восстановления пароля введите вашу почту
					</div>
					<input type="text" class="email_error_input" id="remind_email">
					<div class="blah_blah_body">
						Если Вы забыли пароль, запросите повторную отправку
					</div>
					<a href="" class="black_small_button email_error_gimme_again2 send" data-type="remind">восстановить пароль</a>
				</div>
				<div class="email_error2text remind_error">
					Ошибка при восстановлении пароля
				</div>
				<div class="email_error2text remind_success">
					На вашу почту было выслано письмо с дальнейшими инструкциями
				</div>
				<div class="email_error2text remind_error3">
					Логин и пароль введены неверно
				</div>				
			</div>
		</div>
		<a class="c_inners_left_side_button black_small_button send" data-type="check_login">войти</a>
		<a href="/" class="c_inners_left_side_button_pass remind_password">Забыли пароль?</a>
		<div class="socials_login_cart">
			<div class="socials_login_cart_header">войти через социальные сети</div>
			<div class="soc_log_cart_icons">
				<a href="/" class="soc_log_cart_icon soc_log_tw"></a>
				<a href="/" class="soc_log_cart_icon soc_log_ok"></a>
				<a href="/" class="soc_log_cart_icon soc_log_ml"></a>
				<a href="/" class="soc_log_cart_icon soc_log_vk"></a>
				<a href="/" class="soc_log_cart_icon soc_log_fb"></a>
			</div>
		</div>
		<div class="c_inners_left_side_text_h c_inners_left_side_text_h2">
			Гость
		</div>
		<div class="c_inners_left_side_form">
			<div class="c_inners_input_line">
				<div class="c_inners_input_label">электронная почта</div>
				<input type="email" class="c_inners_input remind_email2" id="register_email">
			</div>
			<div class="c_inners_input_line">
				<div class="c_inners_input_label">имя</div>
				<input type="text" class="c_inners_input" id="register_name">
			</div>
			<div class="c_inners_input_line">
				<div class="c_inners_input_label">телефон</div>
				<input type="phone" class="c_inners_input" id="register_phone">
			</div>		
		</div>
		<form class="c_inners_left_side_form" action="" method="post" id="shipping_form">
			<div class="c_inners_input_line">
				<div class="c_inners_input_label">метро</div>
				<input type="text" class="c_inners_input" name="shipping_metro">
			</div>			
			<div class="c_inners_input_line">
				<div class="c_inners_input_label">адрес доставки</div>
				<textarea class="c_inners_input" name="shipping_address"></textarea>
			</div>
			<div class="c_inners_input_line">
				<div class="c_inners_input_label">комментарий к заказу</div>
				<textarea class="c_inners_input" name="shipping_comment"></textarea>
			</div>
			<div class="blah">
				<div class="blah_chkbx fl_l">
					<input class="blah_input" type="checkbox" id="license_agreement">
				</div>
				<div class="blah_label fl_l">
					<a class="blah_link">принимаю условия</a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="email_error">
				<div class="close_me_on_send">
					<div class="blah_blah_header">Данная почта уже занята</div>
					<div class="blah_blah_body">
						Если данная почта является Вашей, введите
						пароль, который был отправлен на почту
					</div>
					<input type="password" class="email_error_input" id="remind_password2">
					<div class="blah_blah_body">
						Если Вы забыли пароль, запросите восстановление пароля
					</div>
					<a class="c_inners_left_side_button black_small_button send" data-type="check_login2">войти</a>
					<a href="" class="email_error_gimme_again send" data-type="remind2">отправить пароль</a>
				</div>
				<div class="email_error2text remind_error2">
					Логин и пароль введены неверно
				</div>
				<div class="email_error2text remind_success2">
					На вашу почту было выслано письмо с дальнейшими инструкциями
				</div>				
			</div>
			<div class="blah_blah_accept_agreement">
				<div class="blah_blah_accept_agreement_text">
					Для продолжения оформления
					заказа необходимо принять условия  
				</div>
			</div>
			<div class="blah_blah">
				<div class="blah_blah_mobile_close sprite"></div>
				<div class="blah_blah_header">Условия пользования</div>
				<div class="blah_blah_text">
<br>ООО «Москоуфреш», именуемое далее 
<br>«Moscowfresh» публикует настоящее 
<br>Пользовательское соглашение, 
<br>представляющее собой публичную оферту в отношении пользователей 
<br>портала moscowfresh.ru (далее 
<br>«Пользователь»).
<br><br>
<br>Перед началом использования портала 
<br>moscowfresh.ru (далее «Сервис») 
<br>просим Вас внимательно ознакомиться 
<br>с изложенными ниже условиями 
<br>пользования. Используя Сервис, Вы 
<br>понимаете изложенные в настоящем 
<br>Пользовательском соглашении условия 
<br>и обязуетесь соблюдать их. Если Вы не 
<br>согласны с какими-либо пунктами 
<br>Пользовательского соглашения, либо 
<br>они Вам не ясны, то Вы обязаны 
<br>отказаться от использования Сервиса 
<br>moscowfresh.ru. Использование 
<br>Сервиса без согласия с условиями 
<br>настоящего Пользовательского 
<br>соглашения не допускается. 
<br><br>
<br>Акцептом настоящего 
<br>Пользовательского соглашения 
<br>является использование функций 
<br>Сервиса в любой форме. Настоящее 
<br>Пользовательское соглашение в 
<br>отношении конкретного Пользователя 
<br>вступает в силу с момента его акцепта 
<br>Пользователем. Не допускается акцепт 
<br>настоящего Пользовательского 
<br>соглашения под условиями, либо с 
<br>оговорками. 
				</div>
			</div>			
		</form>
		<a class="c_inners_left_side_button black_small_button send" data-type="register">далее</a>
		
	</div>
</aside>