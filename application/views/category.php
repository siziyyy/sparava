<?php $this->load->view('common/header',$header);?>
        <?php $this->load->view('common/product-edit-form.php');?>
        <div class="good_modal">
            <div class="good_modal_line">
                <div class="good_modal_photo fl_l">
                    <img src="/images/yabloko_2.jpg" class="g_good_modal_photo">
                </div>
                <div class="good_modal_right fl_r">
                    <div class="good_modal_right_line">
                        <div class="cgood_modal_price fl_l">
                            <span class="cgood_modal_price_value">100 </span><span class="rouble">c</span>
                        </div>
                        <div class="good_modal_weight fl_l">300 мл</div>
                        <div class="good_modal_header_actions fl_r">
                            <div class="good_modal_share fl_r sprite"></div>
                            <div class="good_modal_fav good_modal_fav_ylw fl_r sprite"></div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="good_modal_right_line">
                        <div class="good_modal_name fl_l">Фанта клубника</div>
                        <div class="good_modal_id fl_r">0115</div>
                        <div class="clear"></div>
                    </div>
                    <div class="good_modal_right_line">
                        <div class="good_modal_desc">
                            Красный китайский чай с типсами. Послевкусие чернослива
                        </div>
                    </div>
                    <div class="good_modal_right_line">
                        <div class="good_modal_country fl_l">Германия</div>
                        <div class="good_modal_firm fl_l">Coca Cola</div>
                        <div class="clear"></div>
                    </div>
                    <div class="good_modal_right_line">
                        <div class="good_modal_kkal">
                            <div class="good_modal_kkal_header">Ккал</div>
                            <div class="good_modal_kkal_body">1150</div>
                        </div>
                        <div class="good_modal_kkal">
                            <div class="good_modal_kkal_header">Белки</div>
                            <div class="good_modal_kkal_body">1150 г</div>
                        </div>
                        <div class="good_modal_kkal">
                            <div class="good_modal_kkal_header">Жиры</div>
                            <div class="good_modal_kkal_body">1150 г</div>
                        </div>
                        <div class="good_modal_kkal">
                            <div class="good_modal_kkal_header">Углеводы</div>
                            <div class="good_modal_kkal_body">1150</div>
                        </div>
                        <div class="good_modal_kkal good_modal_kkal_last">
                            <div class="good_modal_kkal_header">GI</div>
                            <div class="good_modal_kkal_body">1150</div>
                        </div>
                    </div>
                    <div class="good_modal_right_line">
                        <div class="g_good_count">
                            <div class="g_good_count_act g_good_count_rem sprite"></div>
                            <input type="text" class="g_good_count_input" value="1 шт">
                            <div class="g_good_count_act g_good_count_add sprite"></div>
                        </div>
                        <div class="g_good_to_cart">
                            <span class="g_good_to_cart_text"><span class="g_good_to_cart_value">100</span> <span class="rouble">o</span></span>
                            <span class="g_good_added_to_cart_text"></span>                                 
                            <span class="g_good_to_cart_icon sprite"></span>
                        </div>
                    </div>
                    <div class="good_modal_right_line good_modal_video_line">
                        <div class="good_modal_video" style="background:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeJEWMXtTIJSr5yX3IXTGC5fhX6BL7Bq_E_FdyKthT7gDeigfPUA')">
                            <div class="good_modal_video_play sprite"></div>
                        </div>
                        <div class="good_modal_video" style="background:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeJEWMXtTIJSr5yX3IXTGC5fhX6BL7Bq_E_FdyKthT7gDeigfPUA')">
                            <div class="good_modal_video_play sprite"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="good_modal_line2">
                <div class="good_modal_line2_header">следующие</div>
                <div class="good_modal_line2_body">
                    <div class="good_modal_next_good">
                        <img src="/images/yabloko_2.jpg" class="g_good_modal_photo_next">
                    </div>
                    <div class="good_modal_next_good">
                        <img src="/images/yabloko_2.jpg" class="g_good_modal_photo_next">
                    </div>
                    <div class="good_modal_next_good">
                        <img src="/images/yabloko_2.jpg" class="g_good_modal_photo_next">
                    </div>
                    <div class="good_modal_next_good">
                        <img src="/images/yabloko_2.jpg" class="g_good_modal_photo_next">
                    </div>
                    <div class="good_modal_next_good">
                        <img src="/images/yabloko_2.jpg" class="g_good_modal_photo_next">
                    </div>
                </div>
            </div>
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
						<?php $show_minus = false; ?>
                        <div class="g_good fl_l" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>">
                            <div class="g_good_photo_block">
                                <img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo">
                               <!-- <img src="/images/1.jpg" alt="<?php echo $product['title'] ?>" class="g_good_photo">-->
                            </div>
                            <div class="new_good_helper_mobile">
                                <?php if(isset($product['old_price'])) { ?>
    								<div class="g_old_good_price"><?php echo $product['old_price'] ?> <span class="rouble">o</span></div>
    							<?php } ?>
                                <div class="g_good_price"><span class="g_good_price_value"><?php echo $product['price'] ?></span> <span class="rouble">o</span></div>
                                <div class="g_old_good_price_date">
    								<?php echo ($product['type'] == 'шт' ? (!is_null($product['weight']) ? ' - '.$product['weight'] : '') : ($product['bm'] == 1 ? ' за 1 кг' : ' за 100 гр')) ?>
    							</div>
                                <div class="g_good_mobile_fav g_good_mobile_fav_orange sprite"></div>
                                <div class="mobile_cat_fav_modal">
                                    <div class="mobile_cat_fav_modal_close sprite"></div>
                                    Чтобы использовать функцию
                                    <br>избранное надо авторизоваться 
                                </div>
                                <div class="g_admin_info" data-product-id="<?php echo $product['product_id'] ?>">inf</div>
                                <!--<div class="g_good_name"><?php echo $product['title'] ?></div>-->
                                <div class="g_good_description">
                                    <?php echo $product['description'] ?>
                                </div>
                                <div class="g_good_country">
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
    								<span class="g_good_id"><?php echo $product['articul'] ?></span>
    							</div>
                            </div>
                            <div class="g_good_actions">
                                <div class="g_good_count">
                                    <div class="g_good_count_act g_good_count_rem sprite <?php echo ( ($product['type'] == 'шт' or $product['bm'] == 0) ? 'g_good_count_act_disable' : '' ) ?>"></div>
                                    <input type="text" class="g_good_count_input" value="<?php echo ($product['type'] == 'шт' ? 1 : ($product['bm'] == 1 ? 1 : '0.1')) ?> <?php echo $product['type'] ?>">
                                    <div class="g_good_count_act g_good_count_add sprite"></div>
                                </div>
                                <div class="g_good_to_cart" data-product-id="<?php echo $product['product_id'] ?>">
                                    <span class="g_good_to_cart_text"><span class="g_good_to_cart_value"><?php echo $product['price'] ?></span> <span class="rouble">o</span></span>
                                    <span class="g_good_added_to_cart_text"></span>									
                                    <span class="g_good_to_cart_icon sprite"></span>
                                </div>
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
							<?php foreach($pages as $page) { ?>
								<?php if ($page['dots']) { ?>
									<div class="c_page_dots">...</div>
								<?php } else { ?>
									<div class="c_page <?php echo ($page['current_page'] ? 'c_current_page' : '') ?>" data-page="<?php echo $page['page'] ?>"><?php echo $page['page'] ?></div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>