<aside class="c_inners_left_side fl_l">
	<div class="c_inners_side_header">
		<span class="c_inners_amount_text">сумма к оплате, без доставки</span>
		<span class="c_inners_amount_num"><?php echo $summ ?> р.</span>
	</div>
	<div class="c_inners_left_side_content">
		<div class="c_inners_left_side_text_h">
			Доставка
		</div>
		<form method="post" action="" id="shipping_submit">
			<div class="new_shipping">
				<input type="hidden" value="1" name="shipping_method" id="shipping_method">
				<input type="hidden" value="" name="shipping_date" id="shipping_date">
				<input type="hidden" value="" name="shipping_time" id="shipping_time">
				<input type="hidden" value="1" name="shipping_form_submit">

				<?php foreach($shipping_methods as $group) { ?>
					<div class="new_shipping_header"><?php echo $group['title'] ?></div>
					<?php foreach($group['methods'] as $method) { ?>
						<div class="new_shipping_button fl_l" data-value="<?php echo $method['shipping_id'] ?>" data-name="shipping_method" data-group="<?php echo $group['shipping_gropu_id'] ?>"><?php echo $method['title'] ?> - <?php echo $method['price'] ?> р.</div>
					<?php } ?>
					<div class="clear"></div>
					<?php if($group['shipping_gropu_id'] != 2) { ?>
						<div class="new_shipping_button_tommorow">
							<div class="select_shipping_date_wrapper">
								<div class="fl_l select_shipping_date" data-value="<?php echo date('j',time()+86400) ?>" data-name="shipping_date">Завтра</div>
								<label class="select_shipping_date_label">
									<span class="select_shipping_date_text">на другое число</span>
									<input type="text" value="" data-name="shipping_date" class="select_shipping_date_input">
								
								</label>
							</div>
							<div class="clear"></div>					
							<div class="new_shipping_buttons_small_pack select_shipping_time_wrapper">
								<div class="new_shipping_button_small new_shipping_button_small_wide" data-value="1" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">в любое время суток</div>
								<div class="new_shipping_button_small" data-value="1" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">7:00 - 9:00</div>
								<div class="new_shipping_button_small" data-value="2" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">9:00 - 13:00</div>
								<div class="new_shipping_button_small" data-value="3" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">13:00 - 19:00</div>
								<div class="new_shipping_button_small" data-value="4" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">19:00 - 23:00</div>
							</div>
						</div>
					<?php } ?>
				<?php } ?>

				<?php if(isset($shipping_form_submit_error)) { ?>
					<span class="deliv_error">Вы не выбрали способ доставки</span>
				<?php } ?>

				<button type="submit" class="c_inners_left_side_button black_small_button new_hlp send" data-type="create_order" id="shipping_submit_button">далее</button>
			</div>
		</form>
	</div>	
	<?php $this->load->view('cart/left-banners'); ?>
</aside>
