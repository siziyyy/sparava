<aside class="c_inners_left_side fl_l">
	<div class="c_inners_side_header">
		<span class="c_inners_amount_text">сумма к оплате, без доставки</span>
		<span class="c_inners_amount_num"><?php echo $summ ?> р.</span>
	</div>
	<div class="c_inners_left_side_content">
		<div class="c_inners_left_side_text_h">
			Доставка
		</div>
		<form method="post" action="">
			<?php foreach($shipping_methods as $group) { ?>
				<div class="c_inners_left_side_text_deliv">
					<div class="c_inners_left_side_deliv_right">
						<div class="c_inners_left_side_deliv_right_header"><?php echo $group['title'] ?></div>
						<?php foreach($group['methods'] as $method) { ?>
							<div class="c_inners_left_side_deliv_right_meth">
								<div class="c_inners_left_side_deliv_left fl_l">
									<input type="radio" class="c_inners_left_side_deliv_chck" value="<?php echo $method['shipping_id'] ?>" name="shipping_method">
								</div> 
								<div class="c_inners_left_side_del_meth_hdr fl_l"><?php echo $method['title'] ?> - <?php echo $method['price'] ?> руб.</div>
								<div class="clear"></div>
							</div>
						<?php } ?>
						<div class="c_inners_left_side_deliv_right_body">
							<?php echo $group['description'] ?>
						</div>
						
					</div> 
				</div>
			<?php } ?>			
			<div class="c_inners_left_side_text_b">
				Минимальная сумма заказа 1000 руб.
			</div>
			<button type="submit" class="c_inners_left_side_button black_small_button">далее</button>
		</form>
	</div>	
</aside>