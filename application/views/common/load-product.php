<?php $show_minus = false; ?><!-- add .inactive_good -->
<div class="g_good fl_l" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>" data-product-id="<?php echo $product['product_id'] ?>">
	<div class="g_good_photo_block send" data-type="get_product_info">
		<!--<img src="/images/1.jpg" alt="" class="g_good_photo">-->
		<img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo">
	</div>
	<div class="new_good_helper_mobile">
		<?php if(isset($product['old_price'])) { ?>
			<div class="g_old_good_price"><?php echo $product['old_price'] ?> р.</div>
		<?php } ?>
		<div class="g_good_price"><span class="g_good_price_value"><?php echo $product['price'] ?></span> р.</div>
		<div class="g_old_good_price_date">
			<?php echo ($product['type'] == 'шт' ? (!is_null($product['weight']) ? ' - '.$product['weight'] : '') : ($product['bm'] == 1 ? ' за 1 кг' : ' за 100 гр')) ?>
		</div>
		<div class="g_good_mobile_fav g_good_mobile_fav_orange sprite"></div>
		<div class="g_admin_info">inf</div>
		<div class="g_good_name"><?php echo $product['title'] ?></div>
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
</div>    