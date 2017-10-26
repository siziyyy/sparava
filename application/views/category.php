<?php $this->load->view('common/header',$header);?>
        <div class="g_good_admin_info_modal">
            <div class="g_good_admin_info_modal_header">Постоянный клиент</div>
            <aside class="g_good_admin_info_modal_left fl_l">
                <div class="g_good_admin_info_modal_photo">
                    <img src="/assets/img/goods/1.jpg" alt="">
                </div>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Мера</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short">
                </label>
                <label class="fl_r">
                    <span class="g_good_admin_info_modal_inpname">Вес</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_med">
                </label>
                <div class="clear"></div>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Страна</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long">
                </label>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Цена</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short">
                </label>
                <label class="fl_r">
                    <span class="g_good_admin_info_modal_inpname">Упаковка</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_med">
                </label>
                <div class="clear"></div>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Состав</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long">
                </label>
                <div class="g_good_admin_info_modal_save black_small_button">сохранить</div>
            </aside>
            <aside class="g_good_admin_info_modal_right fl_r">
                <label>
                    <span class="g_good_admin_info_modal_inpname nom">Название</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Фото</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Подкатегория</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Бренд</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Название</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long">
                </label>
                <label>
                    <span class="g_good_admin_info_modal_inpname">Описание</span>
                    <textarea type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_long"></textarea>
                </label>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Цена</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short2">
                </label>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Начало</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short2">
                </label>
                <label class="fl_l">
                    <span class="g_good_admin_info_modal_inpname">Конец</span>
                    <input type="text" class="g_good_admin_info_modal_input g_good_admin_info_modal_input_short2 nom2">
                </label>
                <div class="clear"></div>
            </aside>
            <div class="clear"></div>
        </div>
        <section class="content">
            <div class="category_bg_helper">
                <div class="content_helper">
                    <?php $this->load->view('common/menu-inner', $menu);?>
                </div>
            </div>
            <div class="content_helper">
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
                                    <input type="text" class="g_good_counter" value="1">
                                    <!-- <div class="count_cool_select_pack">
                                        <div class="g_good_counter count_cool_select">
                                            1
                                            <span class="count_cool_select_arrow sprite"></span>
                                        </div>
                                        <div class="count_cool_options">
                                            <div class="count_cool_option">2</div>
                                            <div class="count_cool_option">3</div>
                                            <div class="count_cool_option">4</div>
                                            <div class="count_cool_option">5</div>
                                        </div>
                                    </div> -->
                                    <span class="g_good_count_legend"><?php echo $product['type'] ?></span>
                                </div>
                                <div class="g_good_to_cart" data-product-id="<?php echo $product['product_id'] ?>">
                                    <span class="g_good_to_cart_text"><span class="g_good_to_cart_value"><?php echo $product['price'] ?></span> <span class="rouble">o</span></span>
                                    <span class="g_good_to_cart_icon sprite"></span>
                                </div>
                                <div class="g_admin_info">inf</div>
                            </div>
                        </div>						
                    <?php } ?>
					<div id="wrapper_for_product_load"></div>
                    <div class="clear"></div>
                </div>
				<?php if($pages_count > 1) { ?>
					<div class="c_paginator">
						<?php if($current_page == 1) { ?>
							<div class="c_show_more_goods" data-category-id="<?php echo $category ?>">показать еще</div>
						<?php } ?>
						<div class="c_pages">
							<?php for( $i = 1 ; $i <= $pages_count ; $i++ ) { ?>
								<div class="c_page <?php echo ($i == $current_page ? 'c_current_page' : '') ?>" data-page="<?php echo $i ?>"><?php echo $i ?></div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>