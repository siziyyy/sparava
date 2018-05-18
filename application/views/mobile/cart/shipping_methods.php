<?php $this->load->view('mobile/common/header',$header); ?>
        <div class="cart_page content cart_delivery">
            <div class="cart_delivery_header">Выберите доставку</div>
            <div class="cart_delivery_line">
                <?php $counter = 0; ?>
                <?php foreach($cart_info['shipping_methods'] as $group_id => $group) { ?>
                    <a href="#" class="cart_delivery_line_button cart_delivery_tab_select <?php echo ($counter == 0 ? 'fl_l' : 'fl_r') ?>" data-target="tab-<?php echo $group_id ?>"><?php echo $group['title'] ?></a>
                    <?php $counter++; ?>
                <?php } ?>
                <div class="clear"></div>
            </div>

            <?php foreach($cart_info['shipping_methods'] as $group_id => $group) { ?>
                <span class="cart_delivery_tab" id="tab-<?php echo $group_id ?>">
                    <?php foreach($group['methods'] as $method) { ?>
                        <a href="#" class="cart_delivery_line_button cart_delivery_shipping_method_select" data-id="<?php echo $method['shipping_id'] ?>" data-price="<?php echo $method['price'] ?>" <?php echo ($group_id == 1 ? 'data-target="block_select_date"' : '') ?>>
                            <div class="cart_delivery_line_button_header"><?php echo $method['title'] ?> - <?php echo $method['price'] ?> руб.</div>
                            <div class="cart_delivery_line_button_body">
                                <?php echo $group['description'] ?>
                            </div>
                        </a> <!-- add / remove .active -->
                    <?php } ?>
                    <?php if($group_id == 1) { ?>
                        <div class="cart_date_time cart_delivery_line block_select_date" id="block_select_date">
                            <a href="#" class="cart_delivery_line_button_date fl_l select_shipping_date select_tomorrow" data-value="<?php echo date('j',time()+86400) ?>" data-name="shipping_date">Завтра</a>
                            <a href="#" class="cart_delivery_line_button_date fl_r select_shipping_date_another">Другое число</a>
                            <div class="clear"></div>
                        </div>
                        <div class="cart_date_time cart_delivery_line cart_delivery_line_for_oth_date block_another_date" id="block_another_date">
                            <a href="#" class="cart_delivery_line_button_date cart_delivery_line_button_date_oth fl_l select_shipping_date" data-value="<?php echo date('j',time()+2*86400) ?>" data-name="shipping_date"><?php echo date('j',time()+2*86400) ?></a>
                            <a href="#" class="cart_delivery_line_button_date cart_delivery_line_button_date_oth fl_l select_shipping_date" data-value="<?php echo date('j',time()+3*86400) ?>" data-name="shipping_date"><?php echo date('j',time()+3*86400) ?></a>
                            <a href="#" class="cart_delivery_line_button_date cart_delivery_line_button_date_oth fl_l select_shipping_date" data-value="<?php echo date('j',time()+4*86400) ?>" data-name="shipping_date"><?php echo date('j',time()+4*86400) ?></a>
                            <a href="#" class="cart_delivery_line_button_date cart_delivery_line_button_date_oth cart_delivery_line_button_date_oth_last fl_l select_shipping_date" data-value="<?php echo date('j',time()+5*86400) ?>" data-name="shipping_date"><?php echo date('j',time()+5*86400) ?></a>
                            <div class="clear"></div>
                            <a href="#" class="cart_delivery_line_button_date cart_delivery_line_button_date_oth fl_l select_shipping_date" data-value="<?php echo date('j',time()+6*86400) ?>" data-name="shipping_date"><?php echo date('j',time()+6*86400) ?></a>
                            <a href="#" class="cart_delivery_line_button_date cart_delivery_line_button_date_oth fl_l select_shipping_date" data-value="<?php echo date('j',time()+7*86400) ?>" data-name="shipping_date"><?php echo date('j',time()+7*86400) ?></a>
                            <a href="#" class="cart_delivery_line_button_date cart_delivery_line_button_date_oth fl_l select_shipping_date" data-value="<?php echo date('j',time()+8*86400) ?>" data-name="shipping_date"><?php echo date('j',time()+8*86400) ?></a>
                            <a href="#" class="cart_delivery_line_button_date cart_delivery_line_button_date_oth cart_delivery_line_button_date_oth_last fl_l select_shipping_date" data-value="<?php echo date('j',time()+9*86400) ?>" data-name="shipping_date"><?php echo date('j',time()+9*86400) ?></a>
                            <div class="clear"></div>
                        </div>
                        <div class="cart_date_time cart_delivery_line cart_delivery_line_for_time block_select_time" id="block_select_time">
                            <a href="#" class="cart_delivery_line_button_date fl_l new_shipping_button_small" data-value="1" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">7:00 - 9:00</a>
                            <a href="#" class="cart_delivery_line_button_date fl_r new_shipping_button_small" data-value="3" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">13:00 - 19:00</a>
                            <div class="clear"></div>
                            <a href="#" class="cart_delivery_line_button_date fl_l new_shipping_button_small" data-value="2" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">9:00 - 13:00</a>
                            <a href="#" class="cart_delivery_line_button_date fl_r new_shipping_button_small" data-value="4" data-name="shipping_time" data-method="<?php echo current($group['methods'])['shipping_id'] ?>">19:00 - 23:00</a>
                            <div class="clear"></div>
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


            <form method="post" action="" id="shipping_submit">
                <input type="hidden" value="" name="shipping_method" id="shipping_method">
                <input type="hidden" value="" name="shipping_date" id="shipping_date">
                <input type="hidden" value="" name="shipping_time" id="shipping_time">
                <input type="hidden" value="1" name="checkout_order">
                <button type="submit" class="cart_page_next inactive" id="shipping_submit_button">далее</button>
            </form>
        </div>
<?php $this->load->view('mobile/common/footer'); ?>