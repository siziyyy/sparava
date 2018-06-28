<?php $show_minus = false; ?>
<div class="g_good fl_l" data-product-id="<?php echo $product['product_id'] ?>" data-type="<?php echo $product['input_type'] ?>">
	<div class="santeronii">
		<div class="santeronii_photo fl_l" style="background-image: url('/assets/img/santeronii.jpg')"></div>
		<div class="santeronii_text fl_l">Сантеронии</div>
		<div class="santeronii_share fl_r">
			<div class="santeronii_share_inner"></div>
			<div class="santeronii_share_inner"></div>
			<div class="santeronii_share_inner"></div>
			<div class="clear"></div>
		</div>
		<div class="share_it_faster_new">
		    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://aydaeda.ru/product/2427" class="share_it_soc">
		        <div class="share_it_soc_img fb_share"></div>
		    </a>
		     <a target="_blank" href="https://twitter.com/share?url=https://aydaeda.ru/product/2427&amp;text=Говядина - грудинка" class="share_it_soc">
		        <div class="share_it_soc_img tw_share"></div>
		    </a>
		    <a target="_blank" href="http://vk.com/share.php?url=https://aydaeda.ru/product/2427&amp;title=Говядина - грудинка&amp;image=https://aydaeda.ru/images/2017-11-1613-33-35_15-50-06.JPG&amp;noparse=true" class="share_it_soc">
		        <div class="share_it_soc_img vk_share"></div>
		    </a>
		    <a target="_blank" href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=1&amp;st._surl=https://aydaeda.ru/product/2427&amp;st.comments=Говядина - грудинка" class="share_it_soc">
		        <div class="share_it_soc_img ok_share"></div>
		    </a>
		    <div class="share_it_faster_close_new">×</div>
	    </div>
		<div class="clear"></div>
	</div>
	<div class="g_good_photo_block">
		<a href="<?php echo $product['href'] ?>?type=<?php echo ((isset($path) and $path) ? $path : '') ?>" class="opfoopesgflmem"><img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo" onError="this.src='/assets/img/nophoto.jpg'"></a>
		<a href="<?php echo $product['href'] ?>?type=<?php echo ((isset($path) and $path) ? $path : '') ?>"><img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo opfoopesgf" onError="this.src='/assets/img/nophoto.jpg'"></a>
		<!--<a href="/product/<?php echo $product['product_id'] ?>"><img src="/images/1.jpg" alt="<?php echo $product['title'] ?>" class="g_good_photo"></a>-->
		<div class="quick_view send" data-type="get_product_info">быстрый просмотр</div>
		
		<div class="recommended_av_w_pack">
			<?php if(!empty($product['recommend'])) { ?>
				<div class="recommended_prod"></div>
			<?php } ?>
			<?php if(!empty($product['sr_ves'])) { ?>
				<div class="average_weight average_weight2">≈ <?php echo $product['sr_ves'] ?></div>
			<?php } ?>
		</div>
		
	</div>
	<div class="new_good_helper_mobile">
		<?php if(isset($product['old_price'])) { ?>
			<div class="g_old_good_price"><?php echo $product['old_price'] ?> р.</div>
		<?php } ?>
		<!--<div class="g_good_price"><span class="g_good_price_value"><?php echo $product['price'] ?></span> р.</div>
		<div class="g_old_good_price_date"> -->
			<!-- <?php echo ($product['type'] == 'шт' ? (!is_null($product['weight']) ? ' - '.$product['weight'] : '') : ($product['bm'] == 1 ? ' за 1 кг' : ' за 100 гр')) ?> <a href="/information/" class="g_old_good_price_date_alm">≈</a> -->
<!--
			<?php if($product['type'] == 'шт') { ?>
				<?php if(!is_null($product['weight']) and !empty($product['weight'])) { ?>
					 - <?php echo $product['weight']; ?>
				<?php } ?>
			<?php } else { ?>
				<?php if($product['bm'] == 1) { ?>
					 за 1 кг <a href="/information/bbox" class="g_old_good_price_date_alm">≈</a>
				<?php } else { ?>
					 за 100 гр
				<?php } ?>
			<?php } ?>
		</div> -->

        <?php if($product['type'] == 'шт') { ?>
            <?php $box_type = '1 шт' ?>
            <?php $box_clean_type = 'шт' ?>
        <?php } elseif($product['bm'] == 1) { ?>
            <?php $box_type = '1 кг' ?>
            <?php $box_clean_type = 'кг' ?>
        <?php } else { ?>
            <?php $box_type = '100 гр' ?>
            <?php $box_clean_type = false; ?>
        <?php } ?>

		<div class="new_price_2018">
			<form>
				<label class="g_good_price new_price_2018_label g_good_price_value_wrapper" data-type="cmo">
					<?php if($product['price'] > 0) { ?>
						<input type="radio" class="new_price_2018_radio" name="select_price" value="cmo" checked="checked">
						<span class="new_price_2018_price"><span class="g_good_price_value"><?php echo $product['price'] ?></span> р.</span>
					<?php } else { ?>
						<span class="new_price_2018_label_empty">
							Только в большой упаковке
						</span>
					<?php } ?>
				</label>
				<?php if(isset($product['box_kol'])) { ?>
					<label class="g_good_price new_price_2018_label new_price_2018_optovaya g_good_price_value_wrapper" data-type="cko">
						<?php if($product['price'] > 0) { ?>
							<input type="radio" class="new_price_2018_radio" name="select_price" value="cko">
						<?php } ?>
						<span class="new_price_2018_price"><span class="g_good_price_value"><?php echo $product['box_price'] ?></span> р.</span>
						<span class="new_price_2018_desc">х <?php echo $product['box_kol'] ?> <?php echo ($box_clean_type ? $box_clean_type : '') ?> = <?php echo (int)($product['box_price']*$product['box_kol']) ?> руб.</span>
					</label>
				<?php } ?>
			</form>
		</div>
		<div class="g_good_mobile_fav <?php echo (isset($product['favourite']) ? 'g_good_mobile_fav_orange' : '') ?> sprite send" data-type="favourite"></div>
		<div class="g_admin_info">inf</div>
		<a href="<?php echo $product['href'] ?>?type=<?php echo ((isset($path) and $path) ? $path : '') ?>" class="g_good_name <?php echo ($product['status'] == 0 ? 'inactive_good' : '') ?>"><?php echo $product['title'] ?></a>
		<div class="g_good_country">
			<span class="g_good_country_margin">
				<?php if($product['brand']) { ?>
					<?php if(isset($is_parent_category) and !$is_parent_category) { ?>
						<a href="#" class="product_filter_link" data-value="<?php echo $product['brand'] ?>" data-name="brand">
					<?php } ?>
							<?php echo $product['brand'] ?>
					<?php if(isset($is_parent_category) and !$is_parent_category) { ?>
						</a>
					<?php } ?>
					<?php $show_minus = true; ?>
				<?php } ?>
				<?php if($show_minus and $product['country']) { ?>
					 - 
				<?php } ?>
				<?php if($product['country']) { ?>
					<?php if(isset($is_parent_category) and !$is_parent_category) { ?>
						<a href="#" class="product_filter_link" data-value="<?php echo $product['country'] ?>" data-name="country">
					<?php } ?>
							<?php echo $product['country'] ?>
					<?php if(isset($is_parent_category) and !$is_parent_category) { ?>
						</a>
					<?php } ?>
				<?php } ?>
			</span>
			<span class="g_good_id"><?php echo $product['articul'] ?></span>

			<?php if(empty(trim($product['description'])) or is_null($product['description'])) { ?>
				-x-
			<?php } ?>
		</div>
		<div class="new_desc_2018">
			<?php if(!empty($product['weight'])) { ?>
				Вес - <?php echo $product['weight']; ?>
				<?php if(isset($product['box_kol'])) { ?>
					, упаковка <?php echo ($product['box_kol']*$product['weight']) ?> кг
				<?php } ?>
			<?php } elseif(isset($product['box_kol'])) { ?>
				<?php if($product['bm'] == 1) { ?>
		            Упаковка <?php echo $product['box_kol'] ?> кг
		        <?php } else { ?>
		            Упаковка <?php echo $product['box_kol']*0.1 ?> кг
		        <?php } ?>
			<?php } ?>
		</div>
	</div>
	<?php if(isset($product['box_kol']) or $product['price'] > 0) { ?>
		<div class="g_good_actions actions_holder">
			<div class="g_good_count">
				<div class="g_good_count_act g_good_count_rem sprite <?php echo ( ($product['type'] == 'шт' or $product['bm'] == 0) ? 'g_good_count_act_disable' : '' ) ?>"></div>
				<input type="text" class="g_good_count_input" value="<?php echo $product['default_value'] ?>" data-default-value="<?php echo $product['default_value'] ?>" data-default-price="<?php echo $product['default_price'] ?>">
				<div class="g_good_count_act g_good_count_add sprite"></div>
			</div>
			<div class="g_good_to_cart" data-pack-quantity="<?php echo (isset($product['box_kol']) ? $product['box_kol'] : '') ?>">
				<span class="g_good_to_cart_text"><span class="g_good_to_cart_value"><?php echo ($product['price'] <= 0 ? $product['box_kol']*$product['default_price'] : $product['default_price']) ?></span> р.</span>
				<span class="g_good_added_to_cart_text"></span>									
				<span class="g_good_to_cart_icon sprite"></span>
			</div>
		</div>
	<?php } ?>
</div>    