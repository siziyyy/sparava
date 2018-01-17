<?php $show_minus = false; ?>
<div class="g_good fl_l" data-product-id="<?php echo $product['product_id'] ?>" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>">
	<div class="g_good_photo_block">
		<a href="/product/<?php echo $product['product_id'] ?>"><img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo"></a>
		<div class="quick_view send" data-type="get_product_info">быстрый просмотр</div>
		<div class="recommended_av_w_pack">
			<div class="recommended_prod"></div>
			<?php if(!empty($product['sr_ves'])) { ?>
				<div class="average_weight">ср. вес <?php echo $product['sr_ves'] ?></div>
			<?php } ?>
		</div>
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
		<a href="/product/<?php echo $product['product_id'] ?>" class="g_good_name <?php echo ($product['status'] == 0 ? 'inactive_good' : '') ?>"><?php echo $product['title'] ?></a>
		<div class="g_good_country">
			<span class="g_good_country_margin">
				<?php if($product['brand']) { ?>
					<a href="#" class="product_filter_link" data-value="<?php echo $product['brand'] ?>" data-name="brand"><?php echo $product['brand'] ?></a>
					<?php $show_minus = true; ?>
				<?php } ?>
				<?php if($show_minus and $product['country']) { ?>
					 - 
				<?php } ?>
				<?php if($product['country']) { ?>
					<a href="#" class="product_filter_link" data-value="<?php echo $product['country'] ?>" data-name="country"><?php echo $product['country'] ?></a>
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
</div>    