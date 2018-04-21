<?php $this->load->view('mobile/common/header',$header); ?>
        <div class="cart_page content">
            <?php foreach($cart_content['products'] as $product) { ?>
                <div class="cart_page_item c_inners_side_tr" data-product-id="<?php echo $product['product_id'] ?>" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>">
                    <div class="cart_page_item_photo fl_l">
                        <img src="/images/<?php echo $product['image'] ?>" alt="" class="cart_page_item_photo_img">
                    </div>
                    <div class="cart_page_item_info fl_l">
                        <div class="cart_page_item_info_name"><?php echo $product['title'] ?>
                            <span class="cart_page_item_info_weight">
                                - <?php if($product['type'] == 'шт') { ?>
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
                            </span>
                        </div>
                        <div class="cart_page_item_info_country"><?php echo $product['brand'] ?><?php echo ((!empty(trim($product['brand'])) and !empty(trim($product['country']))) ? '-' : '' ) ?><?php echo $product['country'] ?></div>
                        <div class="cart_page_item_info_footer">
                            <div class="cart_page_item_info_footer_price"><?php echo $product['price'] ?> ₽</div>
                            <input type="text" class="cart_page_item_info_footer_input c_inners_count_input" value="<?php echo $product['quantity_in_cart'] ?>">
                            <div class="cart_page_item_info_footer_summ"><?php echo $this->baselib->round_price($product['quantity_in_cart'],$product['price']) ?> ₽</div>
                            <div class="cart_page_item_info_footer_delete c_inners_count_delete">&times;</div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php } ?>

            <?php if(count($cart_content['products']) > 0) { ?>
                <div class="cart_page_summ"><?php echo $cart_info['summ'] ?> ₽</div>
                <div class="cart_page_summ_text">итого, без суммы доставки</div>

                <?php if($cart_info['summ'] < 1000) { ?>
                    <div class="cart_page_summ_text">минимальная сумма заказа 1000 руб</div>
                <?php } else { ?>
                    <a href="/pages/cart/delivery/" class="cart_page_next inactive">оформить</a> <!-- add / remove .inactive -->
                <?php } ?>
            <?php } else { ?>
                <div class="">
                    Корзина пуста
                </div>
            <?php } ?>
        </div>
<?php $this->load->view('mobile/common/footer'); ?>