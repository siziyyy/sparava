<?php include '../../../parts/_header.php'; ?>
        <div class="content cart_auth">
            <a href="/pages/cart/delivery/" class="cart_auth_back">обратно в доставку</a>
            <div class="cart_auth_header_hello">
                <div class="cart_auth_header_hello_top">Здравствуйте Марина</div>
                <div class="cart_auth_header_hello_bot">Мы правильно угадали?</div>
            </div>
            <div class="cart_auth_gray_buttons cart_delivery_line cart_auth_gray_buttons_hello">
                <a href="#" class="cart_delivery_line_button fl_l">Да, это я</a> <!-- add / remove .active -->
                <a href="#" class="cart_delivery_line_button fl_r">Нет</a> <!-- add / remove .active -->
                <div class="clear"></div>
            </div>
            <div class="cart_person_header">
                <div class="cart_person_header_subname">
                    Вами было указанно следующие данные<br>(если что-то изменилось,<br>можете поправить) 
                </div>
            </div>
            <form class="cart_person_form">
                <label class="cart_person_label">
                    <span class="cart_person_label_text">Имя</span>
                    <input type="text" class="cart_person_input" value="Эмилия Миронова">
                </label>
                <label class="cart_person_label">
                    <span class="cart_person_label_text">Телефон</span>
                    <input type="phone" class="cart_person_input" value="8 910 495 60 20">
                </label>
                <label class="cart_person_label">
                    <span class="cart_person_label_text">Метро</span>
                    <input type="text" class="cart_person_input" value="Перово">
                </label>
                <label class="cart_person_label">
                    <span class="cart_person_label_text">Адрес доставки</span>
                    <input type="text" class="cart_person_input" value="Советская 15 кв 158">
                </label>
                <div class="cart_person_buttons">
                    <button class="cart_person_its_me">далее</button>
                </div>
            </form>
        </div>
<?php include '../../../parts/_footer.php'; ?>