<?php $this->load->view('common/header',$header);?>
        <section class="content">
            <div class="category_bg_helper">
                <div class="content_helper">
                    <?php $this->load->view('common/menu-inner', $menu);?>
                </div>
            </div>
            <div class="content_helper">
                <div class="goods">
                    <?php foreach($products as $product) { ?>						
                        <div class="g_good fl_l">
                            <div class="g_good_photo_block">
                                <img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo">
                            </div>
                            <?php if(isset($product['old_price'])) { ?>
								<div class="g_old_good_price"><?php echo $product['old_price'] ?> <span class="rouble">o</span></div>
							<?php } ?>
                            <div class="g_good_price"><span class="g_good_price_value"><?php echo $product['price'] ?></span> <span class="rouble">o</span></div>
                            <div class="g_old_good_price_date"><?php echo ($product['special_end_date'] ? 'до '.$product['special_end_date'] : '') ?></div>
                            <div class="g_good_name"><?php echo $product['title'] ?></div>
                            <div class="g_good_description">
                                <?php echo $product['description'] ?>
                            </div>
                            <div class="g_good_country"><?php echo $product['brand'] ?> - <?php echo $product['country'] ?></div>
                            <div class="g_good_actions">
                                <div class="g_good_count">
                                    <input type="text" class="g_good_counter" value="1">
                                    <span class="g_good_count_legend"><?php echo $product['type'] ?></span>
                                </div>
                                <div class="g_good_to_cart" data-product-id="<?php echo $product['product_id'] ?>">
                                    <span class="g_good_to_cart_text"><span class="g_good_to_cart_value"><?php echo $product['price'] ?></span> <span class="rouble">o</span></span>
                                    <span class="g_good_to_cart_icon sprite"></span>
                                </div>
                            </div>
                        </div>						
                    <?php } ?>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
<?php $this->load->view('common/footer');?>