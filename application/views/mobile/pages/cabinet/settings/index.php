<?php include '../../../parts/_header.php'; ?>
        <div class="cabinet_page_header">
            <a href="#" class="cabinet_page_exit">выйти</a>
            <div class="cabinet_page_header_tabs">
                <a href="/pages/cabinet/favorites/" class="cabinet_page_header_tab">Избранное</a>
                <a href="/pages/cabinet/settings/" class="cabinet_page_header_tab active">Настройки</a>
                <a href="/pages/cabinet/orders/" class="cabinet_page_header_tab">Мои заказы</a>
            </div>
        </div>
        <div class="cabinet_page_body content">
            <div class="cabinet_settings_subheader">
                <a href="/pages/cabinet/settings/" class="cabinet_settings_subheader_link">Мои данные</a>
                <span class="cabinet_settings_subheader_separator"></span>
                <a href="/pages/cabinet/settings/personalize" class="cabinet_settings_subheader_link active">Настройки показа</a>
            </div>
            <div class="cabinet_settings_subheader_text">emilia1987@mail.ru</div>
            <form class="cabinet_settings_data">
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
            </form>
            <div class="cabinet_settings_subblock">
                <div class="cabinet_settings_subblock_header">Помогите нам<br>стать еще удобнее для Вас</div>
                <div class="cabinet_settings_subblock_text">
                    Оставите больше информации 
                    <br>о и мы настроим сайт под Ваши 
                    <br>запроси и предпочтении 
                </div>
            </div>
            <div class="cabinet_settings_body">
                <div class="cabinet_settings_body_line">
                    <div class="cabinet_settings_body_line_header">День рождения</div>
                    <input type="text" class="cart_person_input cart_person_input_date fl_l" placeholder="День">
                    <input type="text" class="cart_person_input cart_person_input_date fl_l cart_person_input_date_center" placeholder="Месяц">
                    <input type="text" class="cart_person_input cart_person_input_date fl_l" placeholder="Год">
                    <div class="clear"></div>
                </div>
                <div class="cabinet_settings_body_line">
                    <div class="cabinet_settings_body_line_header">Пол</div>
                    <a href="#" class="cabinet_settings_body_line_item fl_l">Мужской</a>
                    <a href="#" class="cabinet_settings_body_line_item cabinet_settings_body_line_item_center fl_l">Женский</a>
                    <div class="clear"></div>
                </div>
                <div class="cabinet_settings_body_line cabinet_settings_body_line_two_items">
                    <div class="cabinet_settings_body_line_header">Предпочтения в еде</div>
                    <a href="#" class="cabinet_settings_body_line_item fl_l">Вегетарианец</a>
                    <a href="#" class="cabinet_settings_body_line_item fl_l">Эко / фермер</a>
                    <div class="clear"></div>
                    <a href="#" class="cabinet_settings_body_line_item active fl_l">Гурман</a>
                    <a href="#" class="cabinet_settings_body_line_item fl_l">Диетическое</a>
                    <div class="clear"></div>
                </div>
                <div class="cabinet_settings_body_line">
                    <div class="cabinet_settings_body_line_header">Стоимость</div>
                    <a href="#" class="cabinet_settings_body_line_item fl_l">Эконом</a>
                    <a href="#" class="cabinet_settings_body_line_item cabinet_settings_body_line_item_center fl_l">Средний</a>
                    <a href="#" class="cabinet_settings_body_line_item fl_l">Премиум</a>
                    <div class="clear"></div>
                </div>
                <div class="cabinet_settings_body_line">
                    <div class="cabinet_settings_body_line_header">Семейное положение</div>
                    <a href="#" class="cabinet_settings_body_line_item fl_l">Один</a>
                    <a href="#" class="cabinet_settings_body_line_item cabinet_settings_body_line_item_center fl_l">Муж / жена</a>
                    <a href="#" class="cabinet_settings_body_line_item fl_l">Семья +3</a>
                    <div class="clear"></div>
                </div>
                <div class="cabinet_settings_body_buttons cabinet_settings_body_buttons_my_set">
                    <a href="#" class="cabinet_settings_body_button">сохранить</a>
                    <a href="#" class="cabinet_settings_body_button_ghost">отменить</a>
                </div>
            </div>
        </div>
<?php include '../../../parts/_footer.php'; ?>