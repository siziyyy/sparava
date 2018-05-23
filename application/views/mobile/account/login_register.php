<?php $this->load->view('mobile/common/header',$header); ?>
        <div class="content cart_auth">
            <?php if(isset($error)) { ?>
                <div class="cart_auth_header_hello_top"><?php echo $error ?></div>
            <?php } ?>
            <a href="/pages/cart/delivery/" class="cart_auth_back">обратно в доставку</a>
            <div class="cart_auth_gray_buttons cart_delivery_line">
                <a href="#" class="cart_delivery_line_button account_tab_select fl_l" data-target="register_form">Я первый раз</a> <!-- add / remove .active -->
                <a href="#" class="cart_delivery_line_button account_tab_select fl_r" data-target="login_form">Войти</a> <!-- add / remove .active -->
                <div class="clear"></div>
            </div>
            <form class="account_form auth_form" id="login_form" method="post">
                <input type="hidden" name="login_form" value="1">
                <label class="auth_label">
                    <input type="text" class="auth_input" placeholder="логин" name="email">
                </label>
                <label class="auth_label">
                    <input type="password" class="auth_input" placeholder="пароль" name="password">
                </label>
                <button class="auth_button" type="submit">войти в аккаунт</button>
                <a href="/account/restore" class="auth_remind_pass_link">забыл пароль</a>
            </form>
            <!--<div class="cart_auth_header_for_reg">Зарегистрироваться <span class="cart_auth_header_for_reg_arrow sprite"></span></div>-->
            <form class="account_form reg_form" id="register_form" method="post">
                <input type="hidden" name="register_form" value="1">
                <label class="auth_label">
                    <input type="text" class="auth_input" placeholder="почта" name="email">
                </label>
                <label class="auth_label">
                    <input type="text" class="auth_input" placeholder="телефон" name="phone">
                </label>
                <label class="auth_label">
                    <input type="text" class="auth_input" placeholder="имя" name="name">
                </label>
                <button class="auth_button" type="submit">Далее</button>
            </form>
            <div class="auth_socials">
                <div class="auth_socials_header">войти через социальные сети</div>
                <div class="auth_socials_items" id="uLogin" data-ulogin="display=buttons;fields=first_name,last_name">
                    <a href="#" class="auth_socials_item auth_socials_item_tw sprite"></a>
                    <a href="#" class="auth_socials_item auth_socials_item_ok sprite"></a>
                    <a href="#" class="auth_socials_item auth_socials_item_mr sprite"></a>
                    <a href="#" class="auth_socials_item auth_socials_item_vk sprite"></a>
                    <a href="#" class="auth_socials_item auth_socials_item_fb sprite"></a>
                </div>
            </div>
        </div>
<?php $this->load->view('mobile/common/footer'); ?>