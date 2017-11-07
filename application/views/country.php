<?php $this->load->view('common/header',$header);?>
        <?php $this->load->view('common/product-edit-form.php');?>
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
								<div class="cool_select_options">
									<?php foreach($categories as $category) { ?>
										<div class="cool_select_option">
											<label>
												<input type="checkbox" class="cool_select_check" value="<?php echo $category['title'] ?>" data-name="category" <?php echo (in_array($category['title'],explode(';',$menu['filters']['category'])) ? 'checked' : '' ) ?>>
												<?php echo $category['title'] ?>
											</label>
										</div>
									<?php } ?>
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
                        <div class="g_good fl_l">
                            <div class="g_good_photo_block">
                                <img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo">
                            </div>
                            <?php if(isset($product['old_price'])) { ?>
                                <div class="g_old_good_price"><?php echo $product['old_price'] ?> <span class="rouble">o</span></div>
                            <?php } ?>
                            <div class="g_good_price"><span class="g_good_price_value"><?php echo $product['price'] ?></span> <span class="rouble">o</span></div>
                            <div class="g_old_good_price_date"><?php echo ($product['special_end_date'] ? 'до '.$product['special_end_date'] : '') ?></div>
							 <div class="g_admin_info" data-product-id="<?php echo $product['product_id'] ?>">inf</div>
                            <div class="g_good_name"><?php echo $product['title'] ?></div>
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
                    <div id="wrapper_for_product_load"></div>
                    <div class="clear"></div>
                </div>
                <?php if($pages_count > 1) { ?>
                    <div class="c_paginator">
                        <?php if($current_page == 1) { ?>
                            <div class="c_show_more_goods" data-country-id="<?php echo $country_id ?>">показать еще</div>
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
        <iframe src="http://fruit.local/main/iframe" height="1" width="1" name="admin"></iframe>
<?php $this->load->view('common/footer',$footer);?>