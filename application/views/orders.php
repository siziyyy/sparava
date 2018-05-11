<?php $this->load->view('common/header',$header);?>
        <section class="content">
            <div class="category_bg_helper category_bg_helper_country category_bg_helper_country2">
                <div class="content_helper">
                    <div class="c_new_menu">
                        <div class="c_new_menu_line c_new_menu_line_country filters_holder">
                            <div class="c_new_menu_line_item fl_l">
                                <a href="/orders" class="c_new_menu_link c_new_menu_link_country">заказы</a>
                            </div>
							<?php if(isset($orders)) { ?>
								<div class="cool_select_pack cool_select_country_pack fl_l">
									<div class="cool_select cool_select_country">
										<span><?php echo '№'.$order_id.' - от '.$orders[$order_id] ?></span>
										<span class="cool_select_arrow sprite"></span>
									</div>
									<div class="cool_select_options">
										<div class="scrollbar-inner scroll_helper">
											<?php foreach($orders as $c_order_id => $create_date) { ?>
												<div class="cool_select_option">
													<label>
														<input type="radio" class="cool_select_check" name="order_id" value="<?php echo $c_order_id ?>" data-name="order_id" <?php echo ($c_order_id == $order_id ? 'checked' : '' ) ?>>
														<?php echo '№'.$c_order_id.' - от '.$create_date ?>
													</label>
												</div>
											<?php } ?>
										</div>
										<div class="cool_select_button">применить</div>
									</div>									
								</div>
							<?php } ?>

							<?php if($order_id) { ?>
								<a href="/duplicate_order/<?php echo $order_id ?>" class="do_it_black">повторить заказ</a>
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
						<h1>У Вас нет оформленных заказов</h1>
					<?php } ?>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>