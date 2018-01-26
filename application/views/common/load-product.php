<?php $show_minus = false; ?>
<div class="g_good fl_l" data-product-id="<?php echo $product['product_id'] ?>" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>">
	<div class="santeronii">
		<div class="santeronii_photo fl_l" style="background-image: url('/images/2017-11-1315-52-39_09-34-05.JPG')"></div>
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
		<a href="/product/<?php echo $product['product_id'] ?>" class="opfoopesgflmem"><img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo" onError="this.src='/assets/img/nophoto.jpg'"></a>
		<a href="/product/<?php echo $product['product_id'] ?>"><img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo opfoopesgf" onError="this.src='/assets/img/nophoto.jpg'"></a>
		<!--<a href="/product/<?php echo $product['product_id'] ?>"><img src="/images/1.jpg" alt="<?php echo $product['title'] ?>" class="g_good_photo"></a>-->
		<div class="quick_view send" data-type="get_product_info">быстрый просмотр</div>
		<?php if(!empty($product['recommend'])) { ?>
			<div class="recommended_av_w_pack">
				<div class="recommended_prod"></div>
				<?php if(!empty($product['sr_ves'])) { ?>
					<div class="average_weight">ср. вес <?php echo $product['sr_ves'] ?></div>
				<?php } ?>
			</div>
		<?php } ?>
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