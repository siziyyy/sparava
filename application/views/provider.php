<?php $this->load->view('common/header',$header);?>
        <section class="content">
            <div class="category_bg_helper category_bg_helper_country">
                <div class="content_helper">
                    <div class="c_new_menu">
                        <div class="c_new_menu_line c_new_menu_line_country filters_holder">
                        	<a href="#" class="downlaod_excel">XLS</a>
                        	<a href="https://admin.aydaeda.ru/importexport" target="_blank">admin</a>
                        	<form id="xls_download_form" method="POST">
                        		<input type="hidden" value="" name="token" id="xls_download_token" />
                        	</form>
                            <div class="cool_select_pack cool_select_country_pack fl_l">
                                <div class="cool_select cool_select_country <?php echo (isset($filters_text['provider']) ? 'cool_select_disabled' : '') ?>">
									<span><?php echo (isset($filters_text['provider']) ? $filters_text['provider'] : 'поставщик') ?></span>
									<span class="cool_select_arrow sprite"></span>
								</div>
								<div class="cool_select_options">
									<div class="scrollbar-inner scroll_helper">
										<?php foreach($providers as $provider) { ?>
											<div class="cool_select_option">
												<label>
													<input type="checkbox" class="cool_select_check" value="<?php echo $provider ?>" data-name="provider" <?php echo (in_array($provider,explode(';',$menu['filters']['provider'])) ? 'checked' : '' ) ?>>
													<?php echo $provider ?>
												</label>
											</div>
										<?php } ?>
									</div>
									<div class="cool_select_button">применить</div>
								</div>									
                            </div>	
							
							<div class="cool_select_pack fl_l" data-type="country">
								<?php if(!empty($menu['filters']['provider'])) { ?>
									<?php foreach(explode(';',$menu['filters']['provider']) as $s_provider) { ?>
										<?php if(!empty($s_provider)) { ?>
											<?php echo $s_provider ?> <span class="dlt_provide delete_selected_filter" data-value="<?php echo $s_provider ?>" data-type="provider"> × </span>
										<?php } ?>
									<?php } ?>
								<?php } ?>
							</div>
							
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
							<div class="c_show_more_goods" data-provider-id="1">показать еще</div>
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