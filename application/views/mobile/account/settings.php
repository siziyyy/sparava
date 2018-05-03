<?php $this->load->view('mobile/common/header',$header); ?>
        <div class="cabinet_page_header">
            <a href="#" class="cabinet_page_exit">выйти</a>
            <div class="cabinet_page_header_tabs">
                <a href="/pages/cabinet/favorites/" class="cabinet_page_header_tab">Избранное</a>
                <a href="/pages/cabinet/settings/" class="cabinet_page_header_tab active">Настройки</a>
                <a href="/pages/cabinet/orders/" class="cabinet_page_header_tab">Мои заказы</a>
            </div>
        </div>
        <div class="cabinet_page_body content">
            <!-- <div class="cabinet_settings_subheader">
                <a href="/pages/cabinet/settings/" class="cabinet_settings_subheader_link">Мои данные</a>
                <span class="cabinet_settings_subheader_separator"></span>
                <a href="/pages/cabinet/settings/personalize" class="cabinet_settings_subheader_link active">Настройки показа</a>
            </div> -->
            <form class="cabinet_settings_data" method="post">
                <input type="hidden" value="1" name="save_account_info">
                <div class="cabinet_settings_subheader_text">emilia1987@mail.ru</div>
                
                    <label class="cart_person_label">
                        <span class="cart_person_label_text">Имя</span>
                        <input type="text" class="cart_person_input" value="<?php echo $account['name'] ?>" name="name">
                    </label>
                    <label class="cart_person_label">
                        <span class="cart_person_label_text">Телефон</span>
                        <input type="phone" class="cart_person_input" value="<?php echo $account['phone'] ?>" name="phone">
                    </label>
                    <label class="cart_person_label">
                        <span class="cart_person_label_text">Второй телефон</span>
                        <input type="phone" class="cart_person_input" value="<?php echo $account['phone_2'] ?>" name="phone_2">
                    </label>
                    <label class="cart_person_label">
                        <span class="cart_person_label_text">Предпочитаемая станция метро</span>
                        <input type="text" class="cart_person_input" value="<?php echo $account['prefered_shipping_metro'] ?>" name="prefered_shipping_metro">
                    </label>
                    <label class="cart_person_label">
                        <span class="cart_person_label_text">Предпочитаемый адрес доставки</span>
                        <input type="text" class="cart_person_input" value="<?php echo $account['prefered_shipping_address'] ?>" name="prefered_shipping_address">
                    </label>
                    <label class="cart_person_label">
                        <span class="cart_person_label_text">Предпочитаемое время доставки</span>
                        <input type="text" class="cart_person_input" value="<?php echo $account['prefered_shipping_time'] ?>" name="prefered_shipping_time">
                    </label>
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
                        <input type="text" class="cart_person_input cart_person_input_date fl_l" placeholder="День" name="birthday[day]" value="<?php echo $account['personal_data']['birthday']['day'] ?>">
                        <input type="text" class="cart_person_input cart_person_input_date fl_l cart_person_input_date_center" placeholder="Месяц" name="birthday[month]" value="<?php echo $account['personal_data']['birthday']['month'] ?>">
                        <input type="text" class="cart_person_input cart_person_input_date fl_l" placeholder="Год" name="birthday[year]" value="<?php echo $account['personal_data']['birthday']['year'] ?>">
                        <div class="clear"></div>
                    </div>
                    <div class="cabinet_settings_body_line">
                        <input type="hidden" class="settings_left_form_input" value="<?php echo $account['personal_data']['sex'] ?>" name="sex" id="sex">
                        <div class="cabinet_settings_body_line_header">Пол</div>
                        <a href="#" class="cabinet_settings_body_line_item fl_l settings_select" data-name="sex" data-value="m">Мужской</a>
                        <a href="#" class="cabinet_settings_body_line_item cabinet_settings_body_line_item_center fl_l settings_select" data-name="sex" data-value="f">Женский</a>
                        <div class="clear"></div>
                    </div>
                    <div class="cabinet_settings_body_line cabinet_settings_body_line_two_items">
                        <input type="hidden" class="settings_left_form_input" value="<?php echo $account['personal_data']['preferred_food'] ?>" name="preferred_food" id="preferred_food">
                        <div class="cabinet_settings_body_line_header">Предпочтения в еде</div>
                        <a href="#" class="cabinet_settings_body_line_item fl_l settings_select" data-name="preferred_food" data-value="vegan">Вегетарианец</a>
                        <a href="#" class="cabinet_settings_body_line_item fl_l settings_select" data-name="preferred_food" data-value="eko-farm">Эко / фермер</a>
                        <div class="clear"></div>
                        <a href="#" class="cabinet_settings_body_line_item fl_l settings_select" data-name="preferred_food" data-value="gurman">Гурман</a>
                        <a href="#" class="cabinet_settings_body_line_item fl_l settings_select" data-name="preferred_food" data-value="diet">Диетическое</a>
                        <div class="clear"></div>
                    </div>
                    <div class="cabinet_settings_body_line">
                        <input type="hidden" class="settings_left_form_input" value="<?php echo $account['personal_data']['cost'] ?>" name="cost" id="cost">
                        <div class="cabinet_settings_body_line_header">Стоимость</div>
                        <a href="#" class="cabinet_settings_body_line_item fl_l settings_select" data-name="cost" data-value="ekonom">Эконом</a>
                        <a href="#" class="cabinet_settings_body_line_item cabinet_settings_body_line_item_center fl_l settings_select" data-name="cost" data-value="middle">Средний</a>
                        <a href="#" class="cabinet_settings_body_line_item fl_l settings_select" data-name="cost" data-value="premium">Премиум</a>
                        <div class="clear"></div>
                    </div>
                    <div class="cabinet_settings_body_line">
                        <input type="hidden" class="settings_left_form_input" value="<?php echo $account['personal_data']['family'] ?>" name="family" id="family">
                        <div class="cabinet_settings_body_line_header">Семейное положение</div>
                        <a href="#" class="cabinet_settings_body_line_item fl_l settings_select" data-name="family" data-value="single">Один</a>
                        <a href="#" class="cabinet_settings_body_line_item cabinet_settings_body_line_item_center fl_l settings_select" data-name="family" data-value="married">Муж / жена</a>
                        <a href="#" class="cabinet_settings_body_line_item fl_l settings_select" data-name="family" data-value="kids">Семья +3</a>
                        <div class="clear"></div>
                    </div>
                    <div class="cabinet_settings_body_buttons cabinet_settings_body_buttons_my_set">
                        <button class="cabinet_settings_body_button" type="submit">сохранить</button>
                        <a href="/" class="cabinet_settings_body_button_ghost">отменить</a>
                    </div>
                </div>
            </form>
        </div>
<?php $this->load->view('mobile/common/footer'); ?>