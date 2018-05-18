<?php $this->load->view('mobile/common/header',$header);?>
    <div class="good_page">
        <div class="category_content item_page single_good_page" style="min-height: auto" data-product-id="<?php echo $product['product_id'] ?>" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>">
            <a href="#" class="item_page_back sprite close_product_iframe"></a>
            <div class="category_content_item no_margin_for_content">
                <div class="content">
                    <img src="/images/<?php echo $product['image'] ?>" class="good_page_photo" onerror="this.src='/assets/mobile/img/goods/nophoto.jpg'" class="category_content_item_img" alt="">
                    <div class="category_content_item_not_double_info">
                        <div class="category_content_item_not_double_info_header">
                            <div class="category_content_item_not_double_info_header_left fl_l">
                                <div class="category_content_item_not_double_info_header_left_id"><?php echo $product['articul'] ?></div>
                                <div class="category_content_item_not_double_info_header_left_name"><?php echo (empty($product['title_full']) ? $product['title'] : $product['title_full']) ?></div>
                            </div>
                            <div class="category_content_item_not_double_info_header_right fl_r">
                                <?php if(isset($product['old_price'])) { ?>
                                    <div class="category_content_item_not_double_info_header_left_price_old">
                                        ₽&nbsp;<?php echo $product['old_price'] ?>
                                    </div>
                                <?php } ?>
                                <div class="category_content_item_not_double_info_header_left_price">₽&nbsp;<span class="g_good_price_value"><?php echo $product['price'] ?></span></div>
                                <div class="category_content_item_not_double_info_header_left_weight">
                                    <?php if($product['type'] == 'шт') { ?>
                                        <?php if(!is_null($product['weight']) and !empty($product['weight'])) { ?>
                                            <?php echo $product['weight']; ?>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <?php if($product['bm'] == 1) { ?>
                                            за 1 кг
                                        <?php } else { ?>
                                            за 100 гр
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="category_content_item_not_double_info_body">
                            <?php echo $product['description'] ?>
                            <div class="item_page_more_info_pack">
                                <?php if($product['sr_ves']) { ?>
                                    <div class="item_page_more_info_pack_line">
                                        <span class="item_page_more_info_pack_line_header">Средний вес:</span><?php echo $product['sr_ves'] ?>
                                    </div>
                                <?php } ?>
                                <?php if($product['consist']) { ?>
                                    <div class="item_page_more_info_pack_line">
                                        <span class="item_page_more_info_pack_line_header">Состав:</span> <?php echo $product['consist'] ?>
                                    </div>
                                <?php } ?>
                                <?php if($product['bbefore']) { ?>
                                    <div class="item_page_more_info_pack_line">
                                        <span class="item_page_more_info_pack_line_header">Срок хранения:</span> <?php echo $product['bbefore'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <a href="#" class="item_page_more_info">
                                <span class="item_page_more_info_text">еще информация</span>
                                <span class="item_page_more_info_arrow sprite"></span>
                            </a>
                        </div>
                        <div class="category_content_item_not_double_info_subfooter">
                            <?php echo $product['brand'] ?><?php echo ((!empty(trim($product['brand'])) and !empty(trim($product['country']))) ? '-' : '' ) ?><?php echo $product['country'] ?>
                        </div>
                    </div>
                    <div class="category_content_item_not_double_info_footer">
                        <a href="#" class="category_content_item_not_double_info_footer_minus g_good_count_rem sprite <?php echo ( ($product['type'] == 'шт' or $product['bm'] == 0) ? 'g_good_count_act_disable' : '' ) ?>"></a>
                        <input type="text" class="category_content_item_not_double_info_footer_input g_good_count_input" value="<?php echo $product['default_value'] ?>">
                        <a href="#" class="category_content_item_not_double_info_footer_plus g_good_count_add sprite"></a>
                        <a href="#" class="category_content_item_not_double_info_footer_add_to_cart fl_l g_good_to_cart"> <!-- add / remove .active -->
                            <div class="category_content_item_not_double_info_footer_add_to_cart_text fl_l"><span class="g_good_to_cart_value"><?php echo $product['default_price'] ?></span> ₽</div>
                            <div class="category_content_item_not_double_info_footer_add_to_cart_icon fl_r sprite"></div>
                            <div class="clear"></div>
                        </a>
                        <a href="#" class="category_content_item_not_double_info_footer_star sprite <?php echo (isset($product['favourite']) ? 'g_good_mobile_fav_orange' : '') ?> send" data-type="favourite"></a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item_page_big_pack">
            <div class="content">
                <div class="category_content_item_not_double_info_header_left_name">Еще дешевле в большой упаковке!</div>
                <div class="category_content_item_not_double_info_body">
                    Купите данный товар в большой упаковке по<br>более низкой цене
                </div>
                <div class="item_page_big_pack_text">
                    <div class="item_page_big_pack_text_one">- 130&nbsp;₽</div>
                    <div class="item_page_big_pack_text_two">за кг</div>
                    <div class="item_page_big_pack_text_three">10 кг х 130 руб. = 1300 руб.</div>
                </div>
                <a href="/" class="item_page_big_pack_link">перейти</a>
            </div>
        </div>
        <div class="item_page_recs_and_comments item_page_recs_and_comments_show_recs">
            <div class="content">
                <a href="#" class="item_page_recs_and_comments_link item_page_recs_link active">Рекомендации от Aydaeda</a>
                <span class="item_page_recs_and_comments_separator"></span>
                <a href="#" class="item_page_recs_and_comments_link item_page_coms_link">Отзывы</a>
            </div>
            <div class="item_page_recs">
                <?php if(count($related_products)) { ?>
                    <?php foreach($related_products as $r_product) { ?>
                        <a href="<?php echo $r_product['href'] ?>?type=<?php echo ((isset($path) and $path) ? $path : '') ?>" class="item_page_recs_item">
                            <img src="/images/<?php echo $r_product['image'] ?>" onerror="this.src='/assets/mobile/img/goods/nophoto.jpg'" class="item_page_recs_item_img" alt="<?php echo $r_product['title'] ?>">
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="item_page_comms"  id="mobile_comments">
                <?php echo $comments['mobile'] ?>
            </div>
        </div>
    </div>
<?php $this->load->view('mobile/common/footer',$footer);?>