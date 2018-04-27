<?php $this->load->view('mobile/common/header',$header);?>
	<div class="main_page_arrow">
		<div class="main_page_arrow_img"></div>
		<div class="main_page_arrow_text">все товары здесь</div>
	</div>
	<div style="width: 100%;overflow: hidden; margin-top: 17px"">
	   <div style="position:relative;width: calc(100% - 34px); margin: 0 auto;">
		  <div class="main_page_partial_slider" style="width: 100%;overflow: visible !important;">
            <?php foreach($banners['slider'] as $banner) { ?>
                <a href="<?php echo $banner['url'] ?>">
                    <img src="<?php echo $banner['image'] ?>" alt="image description" style="width: 100%;"/>
                </a>
            <?php } ?>
		  </div>
	   </div>
	</div>
	<div class="main_page_slider_hand sprite"></div>
	<div class="main_page_slider_quote">
		Если все пишут что у них все качественно, девшего<br>и быстро тогда цена этих слов ровняется к нулю!
	</div>
	<div class="main_page_slider_subquote">
		И только по действиям можно судить о сервисе
	</div>
	<div class="main_page_slider_subquote_red">много хорошего</div>
	<div class="content">
		<div class="main_page_mosaic">
			<div class="main_page_mosaic_line">
				<a href="/pages/category/"><div class="main_page_mosaic_line_vert main_page_mosaic_line_vert_wide fl_l">
					<img src="/assets/mobile/img/main/mosaic/1.jpg" class="main_page_mosaic_img" alt="">
				</div></a>
				<div class="main_page_mosaic_line_vert main_page_mosaic_line_vert_center fl_l">
					<a href="/pages/category/"><div class="main_page_mosaic_line_vert_item main_page_mosaic_line_vert_item_short">
						<img src="/assets/mobile/img/main/mosaic/2.jpg" class="main_page_mosaic_img" alt="">
					</div></a>
					<a href="/pages/category/"><div class="main_page_mosaic_line_vert_item">
						<img src="/assets/mobile/img/main/mosaic/4.jpg" class="main_page_mosaic_img" alt="">
					</div></a>
				</div>
				<div class="main_page_mosaic_line_vert fl_l">
					<a href="/pages/category/"><div class="main_page_mosaic_line_vert_item">
						<img src="/assets/mobile/img/main/mosaic/3.jpg" class="main_page_mosaic_img" alt="">
					</div></a>
					<a href="/pages/category/"><div class="main_page_mosaic_line_vert_item main_page_mosaic_line_vert_item_short">
						<img src="/assets/mobile/img/main/mosaic/5.jpg" class="main_page_mosaic_img" alt="">
					</div></a>
				</div>
				<div class="clear"></div>
			</div>
			<div class="main_page_mosaic_line">
				<div class="main_page_mosaic_line_vert fl_l">
					<a href="/pages/category/"><div class="main_page_mosaic_line_vert_item">
						<img src="/assets/mobile/img/main/mosaic/6.jpg" class="main_page_mosaic_img" alt="">
					</div></a>
					<a href="/pages/category/"><div class="main_page_mosaic_line_vert_item main_page_mosaic_line_vert_item_short">
						<img src="/assets/mobile/img/main/mosaic/9.jpg" class="main_page_mosaic_img" alt="">
					</div></a>
				</div>
				<div class="main_page_mosaic_line_vert main_page_mosaic_line_vert_center fl_l">
					<a href="/pages/category/"><div class="main_page_mosaic_line_vert_item main_page_mosaic_line_vert_item_short">
						<img src="/assets/mobile/img/main/mosaic/7.jpg" class="main_page_mosaic_img" alt="">
					</div></a>
					<a href="/pages/category/"><div class="main_page_mosaic_line_vert_item">
						<img src="/assets/mobile/img/main/mosaic/10.jpg" class="main_page_mosaic_img" alt="">
					</div></a>
				</div>
				<a href="/pages/category/"><div class="main_page_mosaic_line_vert main_page_mosaic_line_vert_wide fl_l">
					<img src="/assets/mobile/img/main/mosaic/8.jpg" class="main_page_mosaic_img" alt="">
				</div></a>
				<div class="clear"></div>
			</div>
		</div>
		<div class="main_page_banner_one">
			<a href="<?php echo $banners['banner_3'][0]['url'] ?>"><img src="<?php echo $banners['banner_3'][0]['image'] ?>" class="main_page_banner_one_image" /></a>
		</div>
		<div class="main_page_banner_one">
			<a href="<?php echo $banners['banner_4'][1][0]['url'] ?>"><img src="<?php echo $banners['banner_4'][1][0]['image'] ?>" class="main_page_banner_one_image" /></a>
		</div>
		<div class="main_page_banner_instagram">
			<a href="<?php echo $banners['instagram'][0]['url'] ?>" target="_blank"><img src="<?php echo $banners['instagram'][0]['image'] ?>" class="main_page_banner_instagram_img" alt=""></a>
			<a href="<?php echo $banners['instagram'][0]['url'] ?>" target="_blank" class="main_page_banner_instagram_header"><?php echo $banners['instagram'][0]['title'] ?></a>
			<div class="main_page_banner_instagram_text">
				<?php echo $banners['instagram'][0]['text'] ?>
			</div>
		</div>
	</div>
	<? /* <div class="search_page content">
        <div class="search_pack">
            <div class="search_input_pack">
                <input type="text" class="search_input">
                <a href="#" class="search_button">поиск</a>
            </div>
            <div class="search_result">
            	<!-- сюда товар -->
            	<div class="search_result_error">по запросу ничего<br>не найдено</div>
            </div>
        </div>
    </div>
    */?>
<?php $this->load->view('mobile/common/footer',$footer);?>