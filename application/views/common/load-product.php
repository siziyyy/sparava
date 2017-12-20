<?php $show_minus = false; ?>
<div class="g_good fl_l" data-product-id="<?php echo $product['product_id'] ?>" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>" data-product-id="<?php echo $product['product_id'] ?>">
	<!-- Новая страница товара -->
	<div class="back_pls_from_good">
		<span class="sprite back_pls_from_good_img"></span>
		<span class="back_pls_from_good_text">назад</span>
	</div>
	<!-- / Новая страница товара -->
	<div class="g_good_photo_block">
		<!--<img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo">-->
		<img src="/images/1.jpg" alt="<?php echo $product['title'] ?>" class="g_good_photo">
		<div class="quick_view send" data-type="get_product_info">быстрый просмотр</div>
		<!-- <div class="average_weight">ср. вес 400-500гр.</div> -->
	</div>
	<div class="new_good_helper_mobile">
		<?php if(isset($product['old_price'])) { ?>
			<div class="g_old_good_price"><?php echo $product['old_price'] ?> р.</div>
		<?php } ?>
		<div class="g_good_price"><span class="g_good_price_value"><?php echo $product['price'] ?></span> р.</div>
		<div class="g_old_good_price_date">
			<?php echo ($product['type'] == 'шт' ? (!is_null($product['weight']) ? ' - '.$product['weight'] : '') : ($product['bm'] == 1 ? ' за 1 кг' : ' за 100 гр')) ?>
		</div>
		<div class="g_good_mobile_fav <?php echo (isset($product['favourite']) ? 'g_good_mobile_fav_orange' : '') ?> sprite send" data-type="favourite"></div>
		<div class="g_admin_info">inf</div>
		<div class="g_good_name <?php echo ($product['status'] == 0 ? 'inactive_good' : '') ?>"><?php echo $product['title'] ?></div>
		<a href="/" class="g_good_name <?php echo ($product['status'] == 0 ? 'inactive_good' : '') ?>"><?php echo $product['title'] ?></a>
	   <!-- <div class="g_good_description">
			<?php echo $product['description'] ?>
		</div>-->
		<div class="g_good_country">
			<span class="g_good_country_margin">
				<?php if($product['brand']) { ?>
					<?php echo $product['brand'] ?>
					<?php $show_minus = true; ?>
				<?php } ?>
				<?php if($show_minus and $product['country']) { ?>
					 - 
				<?php } ?>
				<?php if($product['country']) { ?>
					<?php echo $product['country'] ?>
				<?php } ?>
			</span>
			<span class="g_good_id"><?php echo $product['articul'] ?></span>
		</div>
	</div>
	<div class="g_good_actions actions_holder">
		<div class="g_good_count">
			<div class="g_good_count_act g_good_count_rem sprite <?php echo ( ($product['type'] == 'шт' or $product['bm'] == 0) ? 'g_good_count_act_disable' : '' ) ?>"></div>
			<input type="text" class="g_good_count_input" value="<?php echo ($product['type'] == 'шт' ? 1 : ($product['bm'] == 1 ? 1 : '0.1')) ?> <?php echo $product['type'] ?>">
			<div class="g_good_count_act g_good_count_add sprite"></div>
		</div>
		<div class="g_good_to_cart">
			<span class="g_good_to_cart_text"><span class="g_good_to_cart_value"><?php echo $product['price'] ?></span> р.</span>
			<span class="g_good_added_to_cart_text"></span>									
			<span class="g_good_to_cart_icon sprite"></span>
		</div>
	</div>
	<!-- Новая страница товара -->
	<div class="more_info_pack">
		<div class="show_more_info">еще информация</div>
		<div class="show_reviews bordered_more_info">отзывы</div>
		<div class="more_info"><!-- display block для информации -->
			<div class="more_info_line">
				<span class="more_info_line_header">Средний вес:</span> 4-5 кг
			</div>
			<div class="more_info_line">
				<span class="more_info_line_header">Состав:</span> пастеризованное молоко с 
				массовой долей жира 9, 0%, 
				сухое обезжиренное молоко, 
				молочные белки, с использованием 
				закваски йогуртовых молочнокислх 
				микроорганизмов итогд.
			</div>
			<div class="more_info_line">
				<span class="more_info_line_header">Срок хранении:</span> 50 дней
			</div>
			<div class="more_info_line">
				<span class="more_info_line_header">Ценность на 100г:</span> Ккал- 170, 
				Белки- 30, Углеводы- 100, Жиры- 30 
			</div>
		</div>
		<div class="reviews"><!-- display block для отзывов -->
			<div class="reviews_line">
				<div class="reviews_line_header">Отзывы к данному товару</div>
				<!--если не авторизован -->
				<!--<div class="reviews_line_subheader">
					Чтобы добавить отзыв, Вы должны 
					<span class="reviews_line_subheader_link">авторизоваться</span> на сайте.
				</div>-->
				<div class="add_review">
					<textarea class="add_review_area"></textarea>
					<button class="add_review_button">добавить отзыв</button>
				</div>
			</div>
			<div class="reviews_line">
				<div class="reviews_line_header">Тимур Анреев</div>
				<div class="reviews_line_body">
					Современная медицина признаёт, 
					что свежие части кустарника имеют 
					вяжущие, антисептические и 
					обезболивающие свойства. 
				</div>
			</div>
			<div class="reviews_line">
				<div class="reviews_line_header">Тимур Анреев</div>
				<div class="reviews_line_body">
					Современная медицина признаёт, 
					что свежие части кустарника имеют 
					вяжущие, антисептические и 
					обезболивающие свойства. 
				</div>
			</div>
		</div>
	</div>
	<!-- / Новая страница товара -->
</div>    