            <div class="category_content_item g_good" data-product-id="<?php echo $product['product_id'] ?>" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>">
                <div class="content">
                    <a href="#" data-url="<?php echo $product['href'] ?>?type=<?php echo ((isset($path) and $path) ? $path : '') ?>" class="link_to_product">
                        <img src="/images/<?php echo $product['image'] ?>" onerror="this.src='/assets/mobile/img/goods/nophoto.jpg'" class="category_content_item_img" alt="<?php echo $product['title'] ?>">
                        <div class="category_content_item_double_info">
                            <div class="category_content_item_price_line">
                                <div class="category_content_item_price"><?php echo $product['price'] ?> ₽</div>
                                <div class="category_content_item_weight">
                                    <?php if($product['type'] == 'шт') { ?>
                                        <?php if(!is_null($product['weight']) and !empty($product['weight'])) { ?>
                                            <?php echo $product['weight']; ?>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php if($product['bm'] == 1) { ?>
                                            за 1 кг <a href="/information/bbox" class="g_old_good_price_date_alm">≈</a>
                                        <?php } else { ?>
                                            за 100 гр
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="category_content_item_name"><?php echo $product['title'] ?></div>
                        <div class="category_content_item_not_double_info">
                            <div class="category_content_item_not_double_info_header">
                                <div class="category_content_item_not_double_info_header_left fl_l">
                                    <div class="category_content_item_not_double_info_header_left_id"><?php echo $product['articul'] ?></div>
                                    <div class="category_content_item_not_double_info_header_left_name"><?php echo $product['title'] ?></div>
                                </div>
                                <div class="category_content_item_not_double_info_header_right fl_r">
                                    <div class="category_content_item_not_double_info_header_left_price">₽&nbsp;<span class="g_good_price_value"><?php echo $product['price'] ?></span></div>
                                    <div class="category_content_item_not_double_info_header_left_weight">
                                        <?php if($product['type'] == 'шт') { ?>
                                            <?php if(!is_null($product['weight']) and !empty($product['weight'])) { ?>
                                                <?php echo $product['weight']; ?>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <?php if($product['bm'] == 1) { ?>
                                                за 1 кг <a href="/information/bbox" class="g_old_good_price_date_alm">≈</a>
                                            <?php } else { ?>
                                                за 100 гр
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="category_content_item_not_double_info_body">
                                <?php echo $this->baselib->text_limiter($product['description'],80) ?><span class="category_content_item_not_double_info_body_more sprite">...</span>
                            </div>
                            <div class="category_content_item_not_double_info_subfooter">
                                <?php echo $product['brand'] ?><?php echo ((!empty(trim($product['brand'])) and !empty(trim($product['country']))) ? '-' : '' ) ?><?php echo $product['country'] ?>
                            </div>
                        </div>
                    </a>
                    <div class="category_content_item_not_double_info_footer">
                        <a href="#" class="category_content_item_not_double_info_footer_minus g_good_count_rem sprite <?php echo ( ($product['type'] == 'шт' or $product['bm'] == 0) ? 'g_good_count_act_disable' : '' ) ?>"></a>
                        <input type="text" class="category_content_item_not_double_info_footer_input g_good_count_input" value="<?php echo $product['default_value'] ?>">
                        <a href="#" class="category_content_item_not_double_info_footer_plus g_good_count_add sprite"></a>
                        <a href="#" class="category_content_item_not_double_info_footer_add_to_cart fl_l g_good_to_cart"> <!-- add / remove .active -->
                            <div class="category_content_item_not_double_info_footer_add_to_cart_text fl_l"><span class="g_good_to_cart_value"><?php echo $product['default_price'] ?></span> ₽</div>
                            <div class="category_content_item_not_double_info_footer_add_to_cart_icon fl_r sprite"></div>
                            <div class="clear"></div>
                        </a>
                        <a href="#" class="category_content_item_not_double_info_footer_star sprite"></a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>