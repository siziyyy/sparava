<?php $this->load->view('common/header',$header);?>
        <section class="content">
            <div class="setting_gray_bg">
                <div class="content_helper">
                    <div class="settings_header">Настройки</div>
                </div>
            </div>
            <div class="content_helper yvuhbnimoklp">
                <div class="settings_left fl_l">
                    <div class="settings_left_email"><?php echo $account['email'] ?></div>
                    <div class="settings_left_email_text">
                        Aydaeda.ru обязуется не передавать полученную от Клиента 
                        <br>информацию третьим лицам и использовать только для выполнения
                        <br>заказов и улучшении обслуживание
                    </div>
                    <form class="settings_left_form" method="post">
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
                    </form>
                </div>
                <!--
                <div class="settings_right fl_l">
                    <div class="settings_right_header">Помогите нам стать еще удобнее для Вас </div>
                    <div class="settings_right_subheader">
                        Оставьте больше информации о вас и мы настроим сайт под ваши 
                        <br>запросы и предпочтения. 
                    </div>
                    <label class="settings_right_form_label">
                        <div class="settings_left_form_label_text">День рождения</div>
                        <input type="text" class="settings_left_form_input settings_left_form_input_short" placeholder="День">
                        <input type="text" class="settings_left_form_input settings_left_form_input_short" placeholder="Месяц">
                        <input type="text" class="settings_left_form_input settings_left_form_input_short" placeholder="Год">
                    </label>
                    <label class="settings_right_form_label">
                        <div class="settings_right_form_label_text">Пол</div>
                        <div class="settings_right_form_input njibubuhbub1  fl_l">Мужской</div>
                        <div class="settings_right_form_input njibubuhbub1 fl_l">Женский</div>
                        <div class="clear"></div>
                    </label>
                    <label class="settings_right_form_label">
                        <div class="settings_right_form_label_text">Предпочтения в еде</div>
                        <div class="settings_right_form_input njibubuhbub2 settings_right_form_input_selected fl_l">Вегетарианец</div>
                        <div class="settings_right_form_input njibubuhbub2 fl_l">ЭКО / Фермер</div>
                        <div class="clear"></div>
                        <div class="settings_right_form_input njibubuhbub2 fl_l">Гурман</div>
                        <div class="settings_right_form_input njibubuhbub2 fl_l">Диетическое</div>
                        <div class="clear"></div>
                    </label>
                    <label class="settings_right_form_label">
                        <div class="settings_right_form_label_text">Стоимость</div>
                        <div class="settings_right_form_input njibubuhbub1 settings_right_form_input_selected fl_l">Эконом</div>
                        <div class="settings_right_form_input njibubuhbub1 fl_l">Средний</div>
                        <div class="settings_right_form_input njibubuhbub1 fl_l">Премиум</div>
                        <div class="clear"></div>
                    </label>
                    <label class="settings_right_form_label">
                        <div class="settings_right_form_label_text">Семейное положение</div>
                        <div class="settings_right_form_input njibubuhbub1 settings_right_form_input_selected fl_l">Один</div>
                        <div class="settings_right_form_input njibubuhbub1 fl_l">Муж / жена</div>
                        <div class="settings_right_form_input njibubuhbub1 fl_l">Семья +3</div>
                        <div class="clear"></div>
                    </label>
                </div> -->
                <div class="clear"></div>
            </div>
        </section>
<?php $this->load->view('common/footer');?>