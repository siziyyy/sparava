<?php $this->load->view('common/header');?>
        <section class="content">
            <div class="category_bg_helper">
                <div class="content_helper">
                    <div class="search_header">
                        <span class="search_header_text">Поиск по артикулу</span>
                        <span class="search_header_number"><?php echo $articul ?></span>
                    </div>
                </div>
            </div>
            <style>
                @media all and (max-width: 1200px) {
                    .mobile_search {
                        display: block !important;
                        height: 30px !important;
                    }
                    .m_h_search {
                        opacity: 0;
                    }
                    .mobile_search_header_number {
                        display: block;
                    }
                    .category_bg_helper {
                        display: none;
                    }
                    .homm {
                        display: none;
                    }
                }
            </style>
            <div class="mobile_search_header_number"><?php echo $articul ?></div>
            <div class="content_helper">
                <div class="goods">
					<div class="g_good fl_l">
						<div class="g_good_photo_block">
							<img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo">
						</div>
						<?php if(isset($product['old_price'])) { ?>
							<div class="g_old_good_price"><?php echo $product['old_price'] ?> <span class="rouble">o</span></div>
						<?php } ?>
						<div class="g_good_price"><span class="g_good_price_value"><?php echo $product['price'] ?></span> <span class="rouble">o</span></div>
						<div class="g_old_good_price_date"><?php echo ($product['special_end_date'] ? 'до '.$product['special_end_date'] : '') ?></div>
						<div class="g_good_name"><?php echo $product['title'] ?></div>
						<div class="g_good_description">
							<?php echo $product['description'] ?>
						</div>
						<div class="g_good_country"><?php echo $product['brand'] ?> - <?php echo $product['country'] ?><span class="g_good_id"><?php echo $product['articul'] ?></span></div>
						<div class="g_good_actions">
							<div class="g_good_count">
								<div class="count_cool_select_pack">
									<div class="g_good_counter count_cool_select">
										<span class="product_count">1</span>
										<span class="count_cool_select_arrow sprite"></span>
									</div>
									<div class="count_cool_options">
										<div class="count_cool_option hide_select">1</div>
										<div class="count_cool_option">2</div>
										<div class="count_cool_option">3</div>
										<div class="count_cool_option">4</div>
										<div class="count_cool_option">5</div>
										<div class="count_cool_option">6</div>
									</div>
								</div>
								<span class="g_good_count_legend"><?php echo $product['type'] ?></span>
							</div>
							<div class="g_good_to_cart" data-product-id="<?php echo $product['product_id'] ?>">
								<span class="g_good_to_cart_text"><span class="g_good_to_cart_value"><?php echo $product['price'] ?></span> <span class="rouble">o</span></span>
								<span class="g_good_to_cart_icon sprite"></span>
							</div>
						</div>
					</div>	 
                    <div class="search_banner homm fl_r">
                        <img src="/assets/img/commons/search_banner.jpg" alt="">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="search_separator homm"></div>
            <div class="content_helper homm">
                <div class="twin_header">Похожие товары</div>
                <div class="goods">
                   <?php foreach($products as $product) { ?>						
                        <div class="g_good fl_l">
                            <div class="g_good_photo_block">
                                <img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo">
                            </div>
                            <?php if(isset($product['old_price'])) { ?>
								<div class="g_old_good_price"><?php echo $product['old_price'] ?> <span class="rouble">o</span></div>
							<?php } ?>
                            <div class="g_good_price"><span class="g_good_price_value"><?php echo $product['price'] ?></span> <span class="rouble">o</span></div>
                            <div class="g_old_good_price_date"><?php echo ($product['special_end_date'] ? 'до '.$product['special_end_date'] : '') ?></div>
                            <div class="g_good_name"><?php echo $product['title'] ?></div>
                            <div class="g_good_description">
                                <?php echo $product['description'] ?>
                            </div>
                            <div class="g_good_country"><?php echo $product['brand'] ?> - <?php echo $product['country'] ?><span class="g_good_id"><?php echo $product['articul'] ?></span></div>
                            <div class="g_good_actions">
                                <div class="g_good_count">
                                    <div class="count_cool_select_pack">
                                        <div class="g_good_counter count_cool_select">
                                            <span class="product_count">1</span>
                                            <span class="count_cool_select_arrow sprite"></span>
                                        </div>
                                        <div class="count_cool_options">
											<div class="count_cool_option hide_select">1</div>
                                            <div class="count_cool_option">2</div>
                                            <div class="count_cool_option">3</div>
                                            <div class="count_cool_option">4</div>
                                            <div class="count_cool_option">5</div>
											<div class="count_cool_option">6</div>
                                        </div>
                                    </div>
                                    <span class="g_good_count_legend"><?php echo $product['type'] ?></span>
                                </div>
                                <div class="g_good_to_cart" data-product-id="<?php echo $product['product_id'] ?>">
                                    <span class="g_good_to_cart_text"><span class="g_good_to_cart_value"><?php echo $product['price'] ?></span> <span class="rouble">o</span></span>
                                    <span class="g_good_to_cart_icon sprite"></span>
                                </div>
                            </div>
                        </div>						
                    <?php } ?>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
<?php $this->load->view('common/footer');?>