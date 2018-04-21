<?php $this->load->view('mobile/common/header',$header); ?>
        <div class="cart_page content cart_delivery">
            <div class="cart_delivery_header">Выберите доставку</div>
            <div class="cart_delivery_line">
                <?php foreach($cart_info['shipping_methods'] as $group_id => $group) { ?>
                    <a href="#" class="cart_delivery_line_button cart_delivery_tab_select fl_l" data-target="tab-<?php echo $group_id ?>"><?php echo $group['title'] ?></a> <!-- add / remove .active -->
                <?php } ?>
                <div class="clear"></div>
            </div>

            <?php foreach($cart_info['shipping_methods'] as $group_id => $group) { ?>
                <span class="cart_delivery_tab" id="tab-<?php echo $group_id ?>">
                    <?php foreach($group['methods'] as $method) { ?>
                        <a href="#" class="cart_delivery_line_button cart_delivery_shipping_method_select" data-id="<?php echo $method['shipping_id'] ?>" data-price="<?php echo $method['price'] ?>">
                            <div class="cart_delivery_line_button_header"><?php echo $method['title'] ?> - <?php echo $method['price'] ?> руб.</div>
                            <div class="cart_delivery_line_button_body">
                                <?php echo $group['description'] ?>
                            </div>
                        </a> <!-- add / remove .active -->
                    <?php } ?>
                </span>
            <?php } ?>
            <div class="cart_page_summ" data-summ="<?php echo $cart_info['summ'] ?>"><span class="cart_page_summ_value"><?php echo $cart_info['summ'] ?></span> ₽</div>
            <div class="cart_page_summ_text">сумма к оплате</div>
            <!-- <div class="cart_page_summ_text">
                <br>у Вас в заказе есть позиции с 
                <br>приблизительной стоимостью и поэтому 
                <br>сумма заказа может быть чуть 
                <br>чуть изменена  
            </div> -->


            <form method="post" action="">
                <input type="hidden" value="1" name="shipping_form_submit">
                <input type="hidden" value="" name="shipping_method">
                <button type="submit" class="cart_page_next">далее</button> <!-- add / remove .inactive -->
            </form>
        </div>
<?php $this->load->view('mobile/common/footer'); ?>