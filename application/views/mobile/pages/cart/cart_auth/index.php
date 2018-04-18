<?php include '../../../parts/_header.php'; ?>
        <div class="content cart_auth">
            <a href="/pages/cart/delivery/" class="cart_auth_back">обратно в доставку</a>
            <div class="cart_auth_header">Представьтесь</div>
            <form class="auth_form">
                <label class="auth_label">
                    <input type="text" class="auth_input" placeholder="логин">
                </label>
                <label class="auth_label">
                    <input type="password" class="auth_input" placeholder="пароль">
                </label>
                <button class="auth_button">войти в аккаунт</button>
            </form>
            <a href="#" class="auth_remind_pass_link">забыл пароль</a>
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
            <div class="cart_auth_header_for_reg">Зарегистрироваться <span class="cart_auth_header_for_reg_arrow sprite"></span></div>
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
        </div>
<?php include '../../../parts/_footer.php'; ?>