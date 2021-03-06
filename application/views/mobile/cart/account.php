<?php $this->load->view('mobile/common/header',$header); ?>
        <div class="content cart_auth">
            <a href="/cart/renew_shipping" class="cart_auth_back">обратно в доставку</a>
            <div class="cart_auth_header_hello">
                <div class="cart_auth_header_hello_top">Здравствуйте <?php echo $cart_info['account']['name'] ?></div>
                <div class="cart_auth_header_hello_bot">Мы правильно угадали?</div>
            </div>
            <div class="cart_auth_gray_buttons cart_delivery_line cart_auth_gray_buttons_hello">
                <!--<a href="#" class="cart_delivery_line_button fl_l">Да, это я</a> --> <!-- add / remove .active -->
                <a href="/cart/logout" class="cart_delivery_line_button fl_r">Нет</a> <!-- add / remove .active -->
                <div class="clear"></div>
            </div>
            <div class="cart_person_header">
                <div class="cart_person_header_subname">
                    Вами былы указаны следующие данные<br>(если что-то изменилось,<br>можете исправить) 
                </div>
            </div>
            <form class="cart_person_form" method="post">
                <input type="hidden" name="confirm_account_data" value="1">
                <label class="cart_person_label">
                    <span class="cart_person_label_text">Имя</span>
                    <input type="text" class="cart_person_input" name="account_details_name" value="<?php echo $cart_info['account']['name'] ?>">
                </label>
                <label class="cart_person_label">
                    <span class="cart_person_label_text">Телефон</span>
                    <input type="phone" class="cart_person_input" name="account_details_phone" value="<?php echo $cart_info['account']['phone'] ?>">
                </label>
                <label class="cart_person_label">
                    <span class="cart_person_label_text">Метро</span>
                    <input type="text" class="cart_person_input" name="shipping_metro" value="<?php echo $cart_info['account']['shipping_metro'] ?>">
                </label>
                <label class="cart_person_label">
                    <span class="cart_person_label_text">Адрес доставки</span>
                    <input type="text" class="cart_person_input" name="shipping_address" value="<?php echo $cart_info['account']['shipping_address'] ?>">
                </label>
                <div class="cart_person_buttons">
                    <button class="cart_person_its_me">далее</button>
                </div>
            </form>
        </div>
<?php $this->load->view('mobile/common/footer'); ?>