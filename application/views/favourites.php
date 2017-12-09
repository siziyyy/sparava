<?php $this->load->view('common/header',$header);?>
        <?php $this->load->view('common/product-edit-form.php');?>
		<?php $this->load->view('common/product-info');?>
        <section class="content">
            <div class="category_bg_helper category_bg_helper_country">
                <div class="content_helper">
                    <div class="c_new_menu">
                        <div class="c_new_menu_line c_new_menu_line_country filters_holder">
                            <div class="c_new_menu_line_item fl_l">
                                <a href="/category/" class="c_new_menu_link c_new_menu_link_country">избранное</a>
                            </div>
							<?php if(isset($products)) { ?>
								<div class="cool_select_pack cool_select_country_pack fl_l">
									<div class="cool_select cool_select_country">
										<span>категория</span>
										<span class="cool_select_arrow sprite"></span>
									</div>
									<div class="cool_select_options">
										<div class="scrollbar-inner scroll_helper">
											<?php foreach($categories as $category) { ?>
												<div class="cool_select_option">
													<label>
														<input type="checkbox" class="cool_select_check" value="<?php echo $category['title'] ?>" data-name="category" <?php echo (in_array($category['title'],explode(';',$menu['filters']['category'])) ? 'checked' : '' ) ?>>
														<?php echo $category['title'] ?>
													</label>
												</div>
											<?php } ?>
										</div>
										<div class="cool_select_button">применить</div>
									</div>									
								</div>
							<?php } ?>
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
					<?php if(isset($products)) { ?>
						<?php foreach($products as $product) { ?>
							<?php $info['product'] = $product; ?>
							<?php $this->load->view('common/load-product',$info);?>
						<?php } ?>
						
						<?php if($empty_products) { ?>
							<?php for($i=0;$i<$empty_products;$i++) { ?>
								<div class="g_good fl_l hide_on_mobile">&nbsp;</div>
							<?php } ?>
						<?php } ?>
						<div id="wrapper_for_product_load"></div>
					<?php } else { ?>
						<h1>В избранных пусто</h1>
					<?php } ?>
                    <div class="clear"></div>
                </div>
				<?php if(isset($products)) { ?>
					<?php if($pages_count > 1) { ?>
						<div class="c_paginator">
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
				<?php } ?>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>