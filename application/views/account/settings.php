<?php $this->load->view('common/header',$header);?>
        <section class="content">
            <div class="setting_gray_bg">
                <div class="content_helper">
                    <div class="settings_header">Настройки</div>
                </div>
            </div>
            <div class="content_helper yvuhbnimoklp">
                <form class="settings_left_form" method="post">
                    <div class="settings_left fl_l">
                        <div class="settings_left_email"><?php echo $account['email'] ?></div>
                        <div class="settings_left_email_text">
                            Aydaeda.ru обязуется не передавать полученную от Клиента 
                            <br>информацию третьим лицам и использовать только для выполнения
                            <br>заказов и улучшении обслуживание
                        </div>                   
                        <input type="hidden" value="1" name="save_account_info">
                        <label class="settings_left_form_label">
                            <div class="settings_left_form_label_text">Имя</div>
                            <input type="text" class="settings_left_form_input" value="<?php echo $account['name'] ?>" name="name">
                        </label>
                        <label class="settings_left_form_label">
                            <div class="settings_left_form_label_text">Телефон</div>
                            <input type="text" class="settings_left_form_input" value="<?php echo $account['phone'] ?>" name="phone">
                        </label>
                        <label class="settings_left_form_label">
                            <div class="settings_left_form_label_text">Второй телефон</div>
                            <input type="text" class="settings_left_form_input" value="<?php echo $account['phone_2'] ?>" name="phone_2">
                        </label>
                        <label class="settings_left_form_label">
                            <div class="settings_left_form_label_text">Предпочитаемая станция метро</div>
                            <input type="text" class="settings_left_form_input" value="<?php echo $account['prefered_shipping_metro'] ?>" name="prefered_shipping_metro">
                        </label>
                        <label class="settings_left_form_label">
                            <div class="settings_left_form_label_text">Предпочитаемый адрес доставки</div>
                            <input type="text" class="settings_left_form_input" value="<?php echo $account['prefered_shipping_address'] ?>" name="prefered_shipping_address">
                        </label>
                        <label class="settings_left_form_label">
                            <div class="settings_left_form_label_text">Предпочитаемое время доставки</div>
                            <input type="text" class="settings_left_form_input" value="<?php echo $account['prefered_shipping_time'] ?>" name="prefered_shipping_time">
                        </label>
                        <button class="settings_left_form_send" type="submit">сохранить</button>
                        <a href="/" class="settings_left_form_cancel">отменить</a>                        
                    </div>
                    <div class="settings_right fl_l">
                        <div class="settings_right_header">Помогите нам стать еще удобнее для Вас </div>
                        <div class="settings_right_subheader">
                            Оставьте больше информации о вас и мы настроим сайт под ваши 
                            <br>запросы и предпочтения. 
                        </div>
                        <label class="settings_right_form_label">
                            <div class="settings_left_form_label_text">День рождения</div>
                            <input type="text" class="settings_left_form_input settings_left_form_input_short" placeholder="День" name="birthday[day]" value="<?php echo $account['personal_data']['birthday']['day'] ?>">
                            <input type="text" class="settings_left_form_input settings_left_form_input_short" placeholder="Месяц" name="birthday[month]" value="<?php echo $account['personal_data']['birthday']['month'] ?>">
                            <input type="text" class="settings_left_form_input settings_left_form_input_short" placeholder="Год" name="birthday[year]" value="<?php echo $account['personal_data']['birthday']['year'] ?>">
                        </label>
                        <label class="settings_right_form_label">
                            <input type="hidden" class="settings_left_form_input" value="<?php echo $account['personal_data']['sex'] ?>" name="sex" id="sex">
                            <div class="settings_right_form_label_text">Пол</div>
                            <div class="settings_right_form_input njibubuhbub1 fl_l settings_select" data-name="sex" data-value="m">Мужской</div>
                            <div class="settings_right_form_input njibubuhbub1 fl_l settings_select" data-name="sex" data-value="f">Женский</div>
                            <div class="clear"></div>
                        </label>
                        <label class="settings_right_form_label">
                            <input type="hidden" class="settings_left_form_input" value="<?php echo $account['personal_data']['preferred_food'] ?>" name="preferred_food" id="preferred_food">
                            <div class="settings_right_form_label_text">Предпочтения в еде</div>
                            <div class="settings_right_form_input njibubuhbub2 fl_l settings_select" data-name="preferred_food" data-value="vegan">Вегетарианец</div>
                            <div class="settings_right_form_input njibubuhbub2 fl_l settings_select" data-name="preferred_food" data-value="eko-farm">ЭКО / Фермер</div>
                            <div class="clear"></div>
                            <div class="settings_right_form_input njibubuhbub2 fl_l settings_select" data-name="preferred_food" data-value="gurman">Гурман</div>
                            <div class="settings_right_form_input njibubuhbub2 fl_l settings_select" data-name="preferred_food" data-value="diet">Диетическое</div>
                            <div class="clear"></div>
                        </label>
                        <label class="settings_right_form_label">
                            <input type="hidden" class="settings_left_form_input" value="<?php echo $account['personal_data']['cost'] ?>" name="cost" id="cost">
                            <div class="settings_right_form_label_text">Стоимость</div>
                            <div class="settings_right_form_input njibubuhbub1 fl_l settings_select" data-name="cost" data-value="ekonom">Эконом</div>
                            <div class="settings_right_form_input njibubuhbub1 fl_l settings_select" data-name="cost" data-value="middle">Средний</div>
                            <div class="settings_right_form_input njibubuhbub1 fl_l settings_select" data-name="cost" data-value="premium">Премиум</div>
                            <div class="clear"></div>
                        </label>
                        <label class="settings_right_form_label">
                            <input type="hidden" class="settings_left_form_input" value="<?php echo $account['personal_data']['family'] ?>" name="family" id="family">
                            <div class="settings_right_form_label_text">Семейное положение</div>
                            <div class="settings_right_form_input njibubuhbub1 fl_l settings_select" data-name="family" data-value="single">Один</div>
                            <div class="settings_right_form_input njibubuhbub1 fl_l settings_select" data-name="family" data-value="married">Муж / жена</div>
                            <div class="settings_right_form_input njibubuhbub1 fl_l settings_select" data-name="family" data-value="kids">Семья +3</div>
                            <div class="clear"></div>
                        </label>
                    </div>
                </form>
                <div class="clear"></div>
            </div>
        </section>
<?php $this->load->view('common/footer');?>