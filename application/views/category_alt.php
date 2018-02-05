<?php $this->load->view('common/header',$header);?>
        <?php $this->load->view('common/product-edit-form');?>
        <?php $this->load->view('common/product-info');?>
        <section class="content">
			<div class="category_bg_helper category_bg_helper_country">
                <div class="content_helper">
                    <div class="c_new_menu">
                        <div class="c_new_menu_line c_new_menu_line_country filters_holder">
                            <div class="c_new_menu_line_item fl_l">
                                <?php if($category == 'eko') { ?>
                                    эко продукты
                                <?php } elseif($category == 'farm') { ?>
                                    фермерские продукты
                                <?php } elseif($category == 'diet') { ?>
                                    диетические продукты
                                <?php } elseif($category == 'child') { ?>
                                    для детей
                                <?php } ?>
                            </div>     
							<?php if(!$is_first_page and count($categories_for_provider) > 0) { ?>
							<div class="cool_select_pack cool_select_country_pack fl_l" data-type="category">
								<div class="cool_select cool_select_country <?php echo (isset($filters_text['category']) ? 'cool_select_disabled' : '') ?>">
									<span><?php echo (isset($filters_text['category']) ? $filters_text['category'] : 'категория') ?></span>
                                    <span class="cool_select_arrow sprite"></span>
                                    <span class="cool_select_arrow2">×</span>
								</div>
								<div class="cool_select_options">
                                    <div class="scrollbar-inner scroll_helper">
    									<?php foreach($categories_for_provider as $attribute) { ?>
    										<div class="cool_select_option">
    											<label>
    												<input type="checkbox" class="cool_select_check" value="<?php echo $attribute['title'] ?>" data-name="category" <?php echo (in_array($attribute['title'],explode(';',$filters['category'])) ? 'checked' : '' ) ?>>
    												<?php echo $attribute['title'] ?>
    											</label>
    										</div>
    									<?php } ?>
                                    </div>
									<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
								</div>
							</div>
							<?php } ?>							
                            <div class="c_new_menu_line_item c_new_menu_line_item_right fl_r">
                                <span class="c_new_menu_more">другие продукты</span>
                                <span class="c_new_menu_more_icon oefgpopfegespgo"></span>
                            </div>                          
                            <div class="clear"></div>
                        </div>
                        <?php $this->load->view('common/menu-categories');?>
                    </div>
                </div>
            </div>		
			
            <?php if(!$is_first_page) { ?>
                <div class="content_helper">
                    <div class="goods">
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
            <?php } else { ?>
                <div class="content_helper">
                    <?php foreach($products as $category) { ?>
                        <div class="new_goods_separator">
                            <a href="?category=<?php echo $category['info']['title'] ?>" class="new_goods_separator_link fl_l"><?php echo $category['info']['title'] ?></a>
                            <div class="new_goods_separator_count fl_l">всего товаров: <?php echo $category['products_count'] ?></div>
                            <a href="?category=<?php echo $category['info']['title'] ?>"><div class="new_goods_separator_look_all fl_r">посмотреть все</div></a>
                            <div class="clear"></div>
                        </div>
                        <div class="goods">
                            <?php foreach($category['products'] as $product) { ?>
                                <?php $info['product'] = $product; ?>
                                <?php $this->load->view('common/load-product',$info);?>                 
                            <?php } ?>
                            
                            <?php if($category['empty_products']) { ?>
                                <?php for($i=0;$i<$category['empty_products'];$i++) { ?>
                                    <div class="g_good fl_l hide_on_mobile">&nbsp;</div>
                                <?php } ?>
                            <?php } ?>
                            <div id="wrapper_for_product_load"></div>
                            <div class="clear"></div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </section>
<?php $this->load->view('common/footer',$footer);?>