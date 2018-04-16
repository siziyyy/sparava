<?php $this->load->view('common/header',$header);?>
        <section class="content">
			<div class="category_bg_helper category_bg_helper_country">
                <div class="content_helper">
                    <div class="c_new_menu">
                        <div class="c_new_menu_line c_new_menu_line_country filters_holder">
                            <div class="c_new_menu_line_item fl_l">
                               ай да
                            </div>     
							<?php if(count($categories_for_provider) > 0) { ?>
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
									<?php if(isset($page['back_button'])) { ?>
										<div class="c_page" data-page="<?php echo $page['page'] ?>"><</div>
									<?php } else { ?>
										<div class="c_page <?php echo ($page['current_page'] ? 'c_current_page' : '') ?>" data-page="<?php echo $page['page'] ?>"><?php echo $page['page'] ?></div>
									<?php } ?>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>