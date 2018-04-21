<?php $this->load->view('mobile/common/header',$header); ?>
        <div class="content cart_person">
            <a href="/pages/cart/delivery/" class="cart_auth_back">обратно в доставку</a>
            <div class="cart_person_header">
                <div class="cart_person_header_name">Здравствуйте, Марина </div>
                <div class="cart_person_header_subname">Вами были указаны следующие данные</div>
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
                    <a href="#" class="cart_person_not_me">это не я</a>
                    <button class="cart_person_its_me">далее</button>
                </div>
            </form>
        </div>
<?php $this->load->view('mobile/common/footer'); ?>