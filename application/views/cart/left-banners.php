	
	<?php if(count($left_banners)) { ?>
		<div class="c_inners_left_side_content c_inners_left_side_content_rec">
			<div class="c_inners_left_side_text_h">
				Aydaeda <span class="no_fw">рекомендует!</span>
			</div>
			<div class="c_c_inners_left_side_text_sh">
				Открывайте для себя новые вкусы, попробуйте супер товары из разных стран мира!
			</div>
			<? /* <div class="c_c_inners_left_side_text_sh_bb">
				<?php foreach($related_products as $product) { ?>
					<a href="/product/<?php echo $product['product_id'] ?>"><div class="c_c_inners_left_side_good fl_l">
						<img src="/images/<?php echo $product['image'] ?>" alt="" onerror="this.src='/assets/img/nophoto.jpg'">
					</div></a>
				<?php } ?>
				<div class="clear"></div>
			</div> */ ?>
			<div class="c_c_inners_left_side_text_sh_bb_new">
				<?php foreach ($left_banners as $banner) { ?>
					<a href="<?php echo $banner['href'] ?>"><img src="<?php echo $banner['img'] ?>" alt="" class="c_c_inners_left_side_text_sh_bb_new_img"></a>
				<?php } ?>
			</div>
		</div>
	<?php } ?>