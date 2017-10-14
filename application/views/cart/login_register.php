<aside class="c_inners_left_side fl_l">
	<div class="c_inners_side_header">
		<span class="c_inners_amount_text">сумма к оплате, без доставки</span>
		<span class="c_inners_amount_num"><?php echo $summ ?> <span class="rouble">o</span></span>
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
		<a class="c_inners_left_side_button black_small_button send" data-type="check_login">войти</a>
		<a href="/" class="c_inners_left_side_button_pass send" data-type="remind">Забыли пароль?</a>
		<div class="c_inners_left_side_text_h c_inners_left_side_text_h2">
			Гость
		</div>
		<div class="c_inners_left_side_form">
			<div class="c_inners_input_line">
				<div class="c_inners_input_label">электронная почта</div>
				<input type="email" class="c_inners_input" id="register_email">
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
		</form>
		<a class="c_inners_left_side_button black_small_button send" data-type="register">далее</a>
		
	</div>
</aside>