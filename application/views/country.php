<?php $this->load->view('common/header',$header);?>
        <?php $this->load->view('common/product-edit-form.php');?>
		<?php $this->load->view('common/product-info');?>
        <section class="content">
            <div class="category_bg_helper category_bg_helper_country">
                <div class="content_helper">
                    <div class="c_new_menu">
                        <div class="c_new_menu_line c_new_menu_line_country">
                            <div class="c_new_menu_line_item fl_l">
                                <a href="/category/" class="c_new_menu_link c_new_menu_link_country">ай да <?php echo $country ?></a>
                            </div>     
                            <div class="cool_select_pack cool_select_country_pack fl_l">
                                <div class="cool_select cool_select_country">
									<span>категория</span>
									<span class="cool_select_arrow sprite"></span>
								</div>
								<div class="cool_select_options scrollbar-inner">
									<?php foreach($categories as $category) { ?>
										<div class="cool_select_option">
											<label>
												<input type="checkbox" class="cool_select_check" value="<?php echo $category['title'] ?>" data-name="category" <?php echo (in_array($category['title'],explode(';',$menu['filters']['category'])) ? 'checked' : '' ) ?>>
												<?php echo $category['title'] ?>
											</label>
										</div>
									<?php } ?>
									<div class="cool_select_button">применить</div>
								</div>									
                            </div>						
                            <div class="c_new_menu_line_item c_new_menu_line_item_right fl_r">
                                <span class="c_new_menu_more">другие продукты</span>
                                <span class="c_new_menu_more_icon"></span>
                            </div>                          
                            <div class="clear"></div>
                        </div>
                        <?php $this->load->view('common/menu-categories');?>
                    </div>
                </div>
            </div>
            <div class="content_helper">
                <div class="goods">
                    <?php foreach($products as $product) { ?>
						<?php $show_minus = false; ?>
                        <div class="g_good fl_l" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>" data-product-id="<?php echo $product['product_id'] ?>">
                            <div class="g_good_photo_block send" data-type="get_product_info">
                                <img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo">
                            </div>
                            <?php if(isset($product['old_price'])) { ?>
                                <div class="g_old_good_price"><?php echo $product['old_price'] ?> <span class="rouble">o</span></div>
                            <?php } ?>
                            <div class="g_good_price"><span class="g_good_price_value"><?php echo $product['price'] ?></span> <span class="rouble">o</span></div>
                            <div class="g_old_good_price_date"><?php echo ($product['special_end_date'] ? 'до '.$product['special_end_date'] : '') ?></div>
							 <div class="g_admin_info">inf</div>
                            <div class="g_good_name"><?php echo $product['title'] ?></div>
                            <!-- <div class="g_good_description">
                                <?php echo $product['description'] ?>
                            </div> -->
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
									<?php $show_minus = true; ?>
								<?php } ?>
								<?php if($show_minus and $product['weight']) { ?>
									 - 
								<?php } ?>
								<?php if($product['weight']) { ?>
									<?php echo $product['weight'] ?>
								<?php } ?>
								<span class="g_good_id"><?php echo $product['articul'] ?></span>
							</div>
                            <div class="g_good_actions">
                                <div class="g_good_count">
                                    <div class="g_good_count_act g_good_count_rem sprite <?php echo ( ($product['type'] == 'шт' or $product['bm'] == 0) ? 'g_good_count_act_disable' : '' ) ?>"></div>
                                    <input type="text" class="g_good_count_input" value="<?php echo ($product['type'] == 'шт' ? 1 : ($product['bm'] == 1 ? 1 : '0.1')) ?> <?php echo $product['type'] ?>">
                                    <div class="g_good_count_act g_good_count_add sprite"></div>
                                </div>
                                <div class="g_good_to_cart">
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
                            <div class="c_show_more_goods" data-country-id="<?php echo $country_id ?>">показать еще</div>
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