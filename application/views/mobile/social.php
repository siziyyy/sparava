<?php $this->load->view('mobile/common/header',$header); ?>
        <div class="content cart_auth">

            <form class="account_form" id="register_form" method="post">
                <div class="cart_auth_header_for_reg">Введите данные для продолжения регистрации</div>
                <?php if(isset($error)) { ?>
                    <div class="cart_auth_header_hello_top"><?php echo $error ?></div>
                <?php } ?>
                <input type="hidden" name="return_url" value="<?php echo $return_url ?>">
                <input type="hidden" name="identity" value="<?php echo $user['identity'] ?>">
                <input type="hidden" name="network" value="<?php echo $user['network'] ?>">
                <input type="hidden" name="profile" value="<?php echo $user['profile'] ?>">
                <input type="hidden" name="token" value="<?php echo $token ?>">

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