<?php $this->load->view('common/header',$header);?>
        <?php $this->load->view('common/product-edit-form.php');?>
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
                            </div>
                            <?php if(isset($product['old_price'])) { ?>
								<div class="g_old_good_price"><?php echo $product['old_price'] ?> <span class="rouble">o</span></div>
							<?php } ?>
                            <div class="g_good_price"><span class="g_good_price_value"><?php echo $product['price'] ?></span> <span class="rouble">o</span></div>
                            <div class="g_old_good_price_date">
								<?php echo ($product['type'] == 'шт' ? ' - '.$product['weight'] : ($product['bm'] == 1 ? ' за 1 кг' : ' за 100 гр')) ?>
							</div>
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
                                    <div class="g_good_count_act g_good_count_rem sprite"></div>
                                    <input type="text" class="g_good_count_input" value="<?php echo ($product['type'] == 'шт' ? 1 : ($product['bm'] == 1 ? 1 : '0.1')) ?> <?php echo $product['type'] ?>" disabled>
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