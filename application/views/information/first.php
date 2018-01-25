                    <div class="section">
                        <div class="c_inners_header contacts_new_h">Преимущества первого заказа</div>
                        <div class="c_contacts_line" style="overflow: hidden;">
                            <div class="c_contacts_line_text_info">
                                При первом заказе Вы гарантированно получаете один из особенных продуктов рекомендуемых Aydaeda.
                            </div>
                            <div class="new_first_order">
                                <div class="new_first_order_slider">
                                    <?php foreach ($related_products as $product_id => $product) { ?>
                                        <a href="/product/<?php echo $product['product_id'] ?>" class="new_first_order_slider_item">
                                            <img src="/images/<?php echo $product['image'] ?>" class="new_first_order_slider_item_img" alt="">
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="clear" id="second_order"></div>
                        </div>
                    </div>