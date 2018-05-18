	<?php if(count($related_products)) { ?>
		<div class="c_inners_left_side_content c_inners_left_side_content_rec">
			<div class="c_inners_left_side_text_h">
				Aydaeda <span class="no_fw">рекомендует!</span>
			</div>
			<div class="c_c_inners_left_side_text_sh">
				Открываете для себя новые вкусы, попробуйте супер товары из разных стран мира!
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
				<a href=""><img src="/assets/img/banners/3db7d87da61d3367.jpg" alt="" class="c_c_inners_left_side_text_sh_bb_new_img"></a>
				<a href=""><img src="/assets/img/banners/a3261e4115da4ad5.jpg" alt="" class="c_c_inners_left_side_text_sh_bb_new_img"></a>
				<a href=""><img src="/assets/img/banners/acbe67e01955a1c7.jpg" alt="" class="c_c_inners_left_side_text_sh_bb_new_img"></a>
			</div>
		</div>
	<?php } ?>