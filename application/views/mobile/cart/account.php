<?php $this->load->view('mobile/common/header',$header); ?>
        <div class="content cart_person">
            <a href="/cart/renew_shipping" class="cart_auth_back">обратно в доставку</a>
            <div class="cart_person_header">
                <?php if(!empty($cart_info['account']['name'])) { ?>
                    <div class="cart_person_header_name">Здравствуйте, <?php echo $cart_info['account']['name'] ?></div>
                <?php } ?>
                <div class="cart_person_header_subname">Вами были указаны следующие данные</div>
            </div>
            <form class="cart_person_form" method="post">
                <input type="hidden" name="checkout_order" value="1">
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
                    <a href="/cart/logout" class="cart_person_not_me">это не я</a>
                    <button class="cart_person_its_me">далее</button>
                </div>
            </form>
        </div>
<?php $this->load->view('mobile/common/footer'); ?>