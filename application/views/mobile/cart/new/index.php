<?php include '../../../parts/_header.php'; ?>
        <div class="content cart_auth">
            <a href="/pages/cart/delivery/" class="cart_auth_back">обратно в доставку</a>
            <div class="cart_auth_gray_buttons cart_delivery_line">
                <a href="#" class="cart_delivery_line_button fl_l">Я первый раз</a> <!-- add / remove .active -->
                <a href="#" class="cart_delivery_line_button fl_r">Войти</a> <!-- add / remove .active -->
                <div class="clear"></div>
            </div>
            <form class="auth_form">
                <label class="auth_label">
                    <input type="text" class="auth_input" placeholder="логин">
                </label>
                <label class="auth_label">
                    <input type="password" class="auth_input" placeholder="пароль">
                </label>
                <button class="auth_button">войти в аккаунт</button>
                <a href="#" class="auth_remind_pass_link">забыл пароль</a>
            </form>
            <!--<div class="cart_auth_header_for_reg">Зарегистрироваться <span class="cart_auth_header_for_reg_arrow sprite"></span></div>-->
            <form class="reg_form">
                <label class="auth_label">
                    <input type="text" class="auth_input" placeholder="почта">
                </label>
                <label class="auth_label">
                    <input type="text" class="auth_input" placeholder="телефон">
                </label>
                <label class="auth_label">
                    <input type="text" class="auth_input" placeholder="имя">
                </label>
                <button class="auth_button">зарегистрироваться</button>
            </form>
            <div class="auth_socials">
                <div class="auth_socials_header">войти через социальные сети</div>
                <div class="auth_socials_items">
                    <a href="#" class="auth_socials_item auth_socials_item_tw sprite"></a>
                    <a href="#" class="auth_socials_item auth_socials_item_ok sprite"></a>
                    <a href="#" class="auth_socials_item auth_socials_item_mr sprite"></a>
                    <a href="#" class="auth_socials_item auth_socials_item_vk sprite"></a>
                    <a href="#" class="auth_socials_item auth_socials_item_fb sprite"></a>
                </div>
            </div>
        </div>
<?php include '../../../parts/_footer.php'; ?>