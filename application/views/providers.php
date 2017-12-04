<?php $this->load->view('common/header',$header);?>
        <?php $this->load->view('common/product-edit-form');?>
        <?php $this->load->view('common/product-info');?>
        <section class="content">
            <div class="category_bg_helper">
                <div class="content_helper">
                    <div class="c_new_menu">
                        <div class="c_new_menu_line">
							<?php if(isset($menu_childs) and count($menu_childs) > 0) { ?>
								<?php $parent_category = true; ?>
								<?php foreach($menu_childs as $category) { ?>									
									<div class="c_new_menu_line_item fl_l">
										<a href="/category/<?php echo ( $category['seo_url'] ? $category['seo_url'] : $category['category_id'] ) ?>" class="c_new_menu_link <?php echo ( $category['current_category'] ? 'orange_text' : '' ) ?> <?php echo ( $parent_category ? 'gray_text parent_cat' : '' ) ?>"><?php echo $category['title'] ?></a>
									</div>
									<?php $parent_category = false; ?>
								<?php } ?>
							<?php } ?>					
							
							<div class="c_new_menu_line_item c_new_menu_line_item_right fl_r">
								<span class="c_new_menu_more">другие продукты</span>
								<span class="c_new_menu_more_icon"></span>
							</div>							
							<div class="clear"></div>
							
                        </div>					
						<div class="c_new_menu_filters filters_holder">
						<?php if(count($categories_for_provider) > 0) { ?>
							<div class="cool_select_pack fl_l" data-type="category">
								<div class="cool_select <?php echo (isset($filters_text['category']) ? 'cool_select_disabled' : '') ?>">
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
							<?php if(count($attributes['countries']) > 0) { ?>
							<div class="cool_select_pack fl_l" data-type="country">
								<div class="cool_select <?php echo (isset($filters_text['country']) ? 'cool_select_disabled' : '') ?>">
									<span><?php echo (isset($filters_text['country']) ? $filters_text['country'] : 'страна') ?></span>
                                    <span class="cool_select_arrow sprite"></span>
                                    <span class="cool_select_arrow2">×</span>
								</div>
								<div class="cool_select_options">
                                    <div class="scrollbar-inner scroll_helper">
    									<?php foreach($attributes['countries'] as $attribute) { ?>
    										<div class="cool_select_option">
    											<label>
    												<input type="checkbox" class="cool_select_check" value="<?php echo $attribute ?>" data-name="country" <?php echo (in_array($attribute,explode(';',$filters['country'])) ? 'checked' : '' ) ?>>
    												<?php echo $attribute ?>
    											</label>
    										</div>
    									<?php } ?>
                                    </div>
									<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
								</div>
							</div>
							<?php } ?>
							<?php if(count($attributes['brands']) > 0) { ?>
							<div class="cool_select_pack fl_l" data-type="brand">
								<div class="cool_select <?php echo (isset($filters_text['brand']) ? 'cool_select_disabled' : '') ?>">
									<span><?php echo (isset($filters_text['brand']) ? $filters_text['brand'] : 'бренд') ?></span>
									<span class="cool_select_arrow sprite"></span>
                                    <span class="cool_select_arrow2">×</span>
								</div>
                                <div class="cool_select_options">
                                    <div class="scrollbar-inner scroll_helper">
									<?php foreach($attributes['brands'] as $attribute) { ?>
										<div class="cool_select_option">
											<label>
												<input type="checkbox" class="cool_select_check" value="<?php echo $attribute ?>" data-name="brand" <?php echo (in_array($attribute,explode(';',$filters['brand'])) ? 'checked' : '' ) ?>>
												<?php echo $attribute ?>
											</label>
										</div>
									<?php } ?>
                                    </div>
									<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
								</div>
							</div>
							<?php } ?>							
							<?php if(count($attributes['compositions']) > 0) { ?>
							<div class="cool_select_pack fl_l" data-type="composition">
								<div class="cool_select <?php echo (isset($filters_text['composition']) ? 'cool_select_disabled' : '') ?>">
									<span><?php echo (isset($filters_text['composition']) ? $filters_text['composition'] : 'состав') ?></span>
                                    <span class="cool_select_arrow sprite"></span>
                                    <span class="cool_select_arrow2">×</span>
								</div>
                                <div class="cool_select_options">
                                    <div class="scrollbar-inner scroll_helper">
									<?php foreach($attributes['compositions'] as $attribute) { ?>
										<div class="cool_select_option">
											<label>
												<input type="checkbox" class="cool_select_check" value="<?php echo $attribute ?>" data-name="composition" <?php echo (in_array($attribute,explode(';',$filters['composition'])) ? 'checked' : '' ) ?>>
												<?php echo $attribute ?>
											</label>
										</div>
									<?php } ?>
                                </div>
									<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
								</div>
							</div>
							<?php } ?>
							<?php if(count($attributes['packs']) > 0) { ?>							
							<div class="cool_select_pack fl_l" data-type="pack">
								<div class="cool_select <?php echo (isset($filters_text['pack']) ? 'cool_select_disabled' : '') ?>">
									<span><?php echo (isset($filters_text['pack']) ? $filters_text['pack'] : 'упаковка') ?></span>
                                    <span class="cool_select_arrow sprite"></span>
                                    <span class="cool_select_arrow2">×</span>
								</div>
                                <div class="cool_select_options">
                                    <div class="scrollbar-inner scroll_helper">
									<?php foreach($attributes['packs'] as $attribute) { ?>
										<div class="cool_select_option">
											<label>
												<input type="checkbox" class="cool_select_check" value="<?php echo $attribute ?>" data-name="pack" <?php echo (in_array($attribute,explode(';',$filters['pack'])) ? 'checked' : '' ) ?>>
												<?php echo $attribute ?>
											</label>
										</div>
									<?php } ?>
                                </div>
									<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
								</div>								
							</div>
							<?php } ?>
							<?php if($attributes['show_weights']) { ?>
							<div class="cool_select_pack fl_l" data-type="weight">
								<div class="cool_select <?php echo (isset($filters_text['weight']) ? 'cool_select_disabled' : '') ?>">
									<span><?php echo (isset($filters_text['weight']) ? $filters_text['weight'] : 'вес') ?></span>
                                    <span class="cool_select_arrow sprite"></span>
                                    <span class="cool_select_arrow2">×</span>
								</div>
                                <div class="cool_select_options">
                                    <div class="scrollbar-inner scroll_helper">
									<div class="cool_select_option">
										<label>
											<input type="radio" class="cool_select_check" value="raz" name="weight" data-name="weight" <?php echo ($filters['weight'] === 'raz' ? 'checked' : '' ) ?>>
											на развес
										</label>
									</div>
									<div class="cool_select_option">
										<label>
											<input type="radio" class="cool_select_check" value="upa"  name="weight" data-name="weight" <?php echo ($filters['weight'] === 'upa' ? 'checked' : '' ) ?>>
											в упаковке
										</label>
									</div>
                                </div>
									<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
								</div>
							</div>
							<?php } ?>
							<div class="cool_select_pack fl_l" data-type="price">
								<div class="cool_select <?php echo (isset($filters_text['price']) ? 'cool_select_disabled' : '') ?>">
									<span><?php echo (isset($filters_text['price']) ? $filters_text['price'] : 'цена') ?></span>
                                    <span class="cool_select_arrow sprite"></span>
                                    <span class="cool_select_arrow2">×</span>
								</div>
                                <div class="cool_select_options">
                                    <div class="scrollbar-inner scroll_helper">
									<div class="cool_select_option">
										<label>
											<input type="radio" class="cool_select_check" value="asc" name="price" data-name="price" <?php echo ($filters['price'] === 'asc' ? 'checked' : '' ) ?>>
											по возрастанию
										</label>
									</div>
									<div class="cool_select_option">
										<label>
											<input type="radio" class="cool_select_check" value="desc" name="price" data-name="price" <?php echo ($filters['price'] === 'desc' ? 'checked' : '' ) ?>>
											по убыванию
										</label>
									</div>
                                </div>
									<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
								</div>
							</div>
							
							<?php if(!$filters_used) { ?>
								<div class="cool_select_goods_count fl_r">всего товаров: <?php echo $products_count ?></div> 
							<?php } else { ?>
								<div class="cool_select_reset fl_r">сбросить фильтр/ы</div>
							<?php } ?>
                            <div class="clear"></div>
                        </div>
                        <?php $this->load->view('common/menu-categories');?>
                    </div>
                </div>
            </div>
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
							<div class="c_show_more_goods" data-provider-full-id="<?php echo $provider ?>">показать еще</div>
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