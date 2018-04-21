<?php $this->load->view('mobile/common/header',$header); ?>
        <?php if(isset($error)) { ?>
            <div class=""><?php echo $error ?></div>
        <?php } ?>
        <div class="content cart_auth cabinet_auth">
            <form class="auth_form" method="post">
                <input type="hidden" name="login_form" value="1">
                <label class="auth_label">
                    <input type="text" class="auth_input" placeholder="логин" name="email">
                </label>
                <label class="auth_label">
                    <input type="password" class="auth_input" placeholder="пароль" name="password">
                </label>
                <button class="auth_button" type="submit">войти в аккаунт</button>
            </form>
            <a href="/account/restore" class="auth_remind_pass_link">забыл пароль</a>
            <div class="auth_socials">
                <div class="auth_socials_header">войти через социальные сети</div>
                <div class="auth_socials_items" id="uLogin" data-ulogin="display=buttons;fields=first_name,last_name">
                    <a href="#" class="auth_socials_item auth_socials_item_tw sprite" data-uloginbutton = "twitter"></a>
                    <a href="#" class="auth_socials_item auth_socials_item_ok sprite" data-uloginbutton = "odnoklassniki"></a>
                    <a href="#" class="auth_socials_item auth_socials_item_mr sprite" data-uloginbutton = "mailru"></a>
                    <a href="#" class="auth_socials_item auth_socials_item_vk sprite" data-uloginbutton = "vkontakte"></a>
                    <a href="#" class="auth_socials_item auth_socials_item_fb sprite" data-uloginbutton = "facebook"></a>
                </div>
            </div>
            <div class="cart_auth_header_for_reg">Зарегистрироваться <span class="cart_auth_header_for_reg_arrow sprite"></span></div>
            <form class="reg_form" method="post">
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
                <button class="auth_button" type="submit">зарегистрироваться</button>
            </form>
        </div>
<?php $this->load->view('mobile/common/footer'); ?>