	<div class="c_inners_side_header c_inners_side_th">
		<div class="c_inners_td fl_l c_inners_first_td">товарная позиция</div>
		<div class="c_inners_td fl_l c_inners_second_td">цена</div>
		<div class="c_inners_td fl_l c_inners_third_td">количество</div>
		<div class="c_inners_td fl_l c_inners_fourth_td">итого</div>
		<div class="clear"></div>
	</div>
	<?php foreach($products as $product) { ?>
		<div class="c_inners_side_tr">
			<div class="c_inners_td fl_l c_inners_first_td">
				<div class="c_inners_photo fl_l" style="background: url(/assets/img/goods/1.jpg);"></div>
				<div class="c_inners_photo_legend fl_r">
					<div class="c_inners_photo_legend_name"><?php echo $product['title'] ?></div>
					<div class="c_inners_photo_legend_country"><?php echo $product['country'] ?></div>
					<div class="c_inners_photo_legend_desc">
						<?php echo $product['description'] ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="c_inners_td fl_l c_inners_second_td"><?php echo $product['price'] ?> <span class="rouble">o</span></div>
			<div class="c_inners_td fl_l c_inners_third_td">
				<div class="c_inners_count">
					<input type="text" class="c_inners_count_input" value="<?php echo $product['quantity_in_cart'] ?>" data-product-id="<?php echo $product['product_id'] ?>">
					<div class="c_inners_count_delete">
						<div class="c_inners_count_del sprite"></div>
						<div class="c_inners_count_del_legend">удалить</div>
					</div>
				</div>
			</div>
			<div class="c_inners_td fl_l c_inners_fourth_td"><?php echo $product['quantity_in_cart']*$product['price'] ?> <span class="rouble">o</span></div>
			<div class="clear"></div>
		</div>
	<?php } ?>

