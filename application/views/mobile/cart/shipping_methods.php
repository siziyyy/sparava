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
                    <?php if($group['shipping_gropu_id'] != 2) { ?>
                            <div class="cart_date_time">
                            Дата доставки:<br>
                            <div class="new_shipping_button_small_date select_shipping_date" data-value="<?php echo date('j',time()+86400) ?>" data-name="shipping_date">Завтра</div>&nbsp;
                            <input type="text" value="" data-name="shipping_date" class="select_shipping_date_input">
                            <div class="clear"></div>
                            Время доставки:<br>
                        
                            <div class="new_shipping_buttons_small_pack">
                                <div class="new_shipping_button_small" data-value="1" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">13:00 - 19:00</div>
                                <div class="new_shipping_button_small" data-value="2" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">13:00 - 19:00</div>
                                <div class="new_shipping_button_small" data-value="3" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">13:00 - 19:00</div>
                                <div class="new_shipping_button_small" data-value="4" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">13:00 - 19:00</div>
                            </div>
                        </div>
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
                <input type="hidden" value="" name="shipping_method" id="shipping_method">
                <input type="hidden" value="" name="shipping_date" id="shipping_date">
                <input type="hidden" value="" name="shipping_time" id="shipping_time">
                <input type="hidden" value="1" name="shipping_form_submit">
                <button type="submit" class="cart_page_next">далее</button> <!-- add / remove .inactive -->
            </form>
        </div>
<?php $this->load->view('mobile/common/footer'); ?>