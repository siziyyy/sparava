<aside class="c_inners_left_side fl_l">
	<div class="c_inners_side_header">
		<span class="c_inners_amount_text">сумма к оплате</span>
		<span class="c_inners_amount_num"><?php echo $summ ?> <span class="rouble">o</span></span>
	</div>
	<div class="c_inners_left_side_content">
		<div class="c_inners_left_side_text_h">
			Здравствуйте, <?php echo $account['name'] ?>
		</div>
		
		<div class="c_inners_left_side_form" id="account_details">
			<div class="c_inners_left_side_text_sh">Вами были указаны следующие данные</div>
			<div class="c_inners_left_side_text_b2"><?php echo $account['name'] ?></div>
			<div class="c_inners_left_side_text_b2"><?php echo $account['phone'] ?></div>
			<div class="c_inners_left_side_text_b2"><?php echo $account['shipping_address'] ?></div>
			<a class="c_inners_left_side_button black_small_button send" data-type="create_order">далее</a>
			<a class="c_inners_left_side_button orange_small_button" id="change_account_details">изменить</a>
		</div>
		
		<div class="c_inners_left_side_form" id="account_details_edit">
			<div class="c_inners_input_line">
				<div class="c_inners_input_label">имя</div>
				<input type="text" class="c_inners_input" id="account_details_name" value="<?php echo $account['name'] ?>">
			</div>
			<div class="c_inners_input_line">
				<div class="c_inners_input_label">телефон</div>
				<input type="email" class="c_inners_input" id="account_details_phone" value="<?php echo $account['phone'] ?>">
			</div>
			<div class="c_inners_input_line">
				<div class="c_inners_input_label">адрес доставки</div>
				<textarea class="c_inners_input" id="account_details_address"><?php echo $account['shipping_address'] ?></textarea>
			</div>
			<a class="c_inners_left_side_button black_small_button send" data-type="account_details_change">далее</a>
		</div>
		
	</div>
	<?php if(false) { ?>
		<div class="c_inners_left_side_content c_inners_left_side_content_after">
			<div class="c_inners_left_side_text_h3">
				История заказов
			</div>
			<?php foreach($orders as $order) { ?>
				<div class="c_inners_left_side_order_line">
					<div class="c_inners_left_side_order_line_td_short fl_l"><?php echo date('d.m.Y',$order['create_date']) ?></div>
					<div class="c_inners_left_side_order_line_td_short fl_l"><?php echo $order['order_summ'] ?> руб.</div>
					<a href="/" target="_blank" class="c_inners_left_side_order_line_td fl_r">посмотреть</a>
					<div class="clear"></div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
</aside>