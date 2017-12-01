	<div class="c_inners_side_header c_inners_side_th">
		<div class="c_inners_td fl_l c_inners_first_td c_inners_first_td_pad">товарная позиция</div>
		<div class="c_inners_td fl_l c_inners_second_td">цена</div>
		<div class="c_inners_td fl_l c_inners_third_td">количество</div>
		<div class="c_inners_td fl_l c_inners_fourth_td">итого</div>
		<div class="c_inners_td fl_l c_inners_fifth_td">&nbsp;</div>
		<div class="clear"></div>
	</div>
	<?php foreach($products as $product) { ?>
		<?php $show_minus = false; ?>
		<div class="c_inners_side_tr">
			<div class="c_inners_td fl_l c_inners_first_td no_on_mob">
				<div class="c_inners_photo fl_l" style="background: url(images/<?php echo $product['image'] ?>);"></div>
				<div class="c_inners_photo_legend fl_r">
					<div class="g_good_name"><?php echo $product['title'] ?></div>
					<div class="g_good_description">
						<?php echo $product['description'] ?>
					</div>
					<div class="g_good_country">
						<?php if($product['brand']) { ?>
							<?php echo $product['brand'] ?>
							<?php $show_minus = true; ?>
						<?php } ?>
						<?php if($show_minus and $product['country']) { ?>
							 - 
						<?php } ?>
						<?php if($product['country']) { ?>
							<?php echo $product['country'] ?>
							<?php $show_minus = true; ?>
						<?php } ?>
						<?php if($show_minus and $product['weight']) { ?>
							 - 
						<?php } ?>
						<?php if($product['weight']) { ?>
							<?php echo $product['weight'] ?>
						<?php } ?>
						<div class="g_good_id"><?php echo $product['articul'] ?></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="c_inners_td fl_l c_inners_second_td no_on_mob"><?php echo $product['price'] ?> р.<span class="for_price_cart">за 100 г</span></div>
			<div class="c_inners_td fl_l c_inners_third_td no_on_mob">
				<div class="c_inners_count">
					<input type="text" class="c_inners_count_input" value="<?php echo $product['quantity_in_cart'] ?>" data-product-id="<?php echo $product['product_id'] ?>">
				</div>
			</div>
			<div class="c_inners_td fl_l c_inners_fourth_td no_on_mob"><?php echo $product['quantity_in_cart']*$product['price'] ?> р.</div>
			<div class="c_inners_td fl_l c_inners_fifth_td no_on_mob">
				<div class="c_inners_count_delete">
					<div class="c_inners_count_del"></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="c_inners_mobile_cart_line">
				<div class="mobile_cart_good_photo fl_l" style="background: url(images/<?php echo $product['image'] ?>);"></div>
				<div class="mobile_cart_good_text fl_l">
					<div class="mobile_cart_good_text_header"><?php echo $product['title'] ?></div>
					<div class="mobile_cart_good_text_subheader"><?php echo $product['country'] ?></div>
					<div class="mobile_cart_good_text_subsubheader"><?php echo $product['description'] ?></div>
					<div class="mobile_cart_good_text_body">
						<div class="mobile_cart_good_text_price fl_l"><?php echo $product['price'] ?> р.</div>
						<div class="mobile_cart_good_text_count fl_l">
							<input type="text" class="mobile_cart_good_text_count_input" value="<?php echo $product['quantity_in_cart'] ?>" data-product-id="<?php echo $product['product_id'] ?>">
						</div>
						<div class="mobile_cart_good_text_total fl_l">
							<?php echo $product['quantity_in_cart']*$product['price'] ?> р.
						</div>
						<div class="clear"></div>
					</div>
					<div class="c_inners_count_delete">
						<div class="c_inners_count_del">&times;</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	<?php } ?>