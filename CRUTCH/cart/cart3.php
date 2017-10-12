<? require '../modules/_header.php'; ?>
        <section class="content">
            <div class="content_helper">
                <div class="c_cart">
                    <div class="c_inners_header">Корзина</div>
                    <aside class="c_inners_left_side fl_l">
                        <div class="c_inners_side_header">
                            <span class="c_inners_amount_text">сумма к оплате, без доставки</span>
                            <span class="c_inners_amount_num">4300 <span class="rouble">o</span></span>
                        </div>
                        <div class="c_inners_left_side_content">
                            <div class="c_inners_left_side_text_h">
                                Постоянный клиент
                            </div>
                            <form class="c_inners_left_side_form">
                                <div class="c_inners_input_line">
                                    <div class="c_inners_input_label">электронная почта</div>
                                    <input type="email" class="c_inners_input">
                                </div>
                                <div class="c_inners_input_line">
                                    <div class="c_inners_input_label">пароль</div>
                                    <input type="password" class="c_inners_input">
                                </div>
                            </form>
                            <a class="c_inners_left_side_button black_small_button">войти</a>
                            <a href="/" class="c_inners_left_side_button_pass">Забыли пароль?</a>
                            <div class="c_inners_left_side_text_h c_inners_left_side_text_h2">
                                Гость
                            </div>
                            <form class="c_inners_left_side_form">
                                <div class="c_inners_input_line">
                                    <div class="c_inners_input_label">электронная почта</div>
                                    <input type="email" class="c_inners_input">
                                </div>
                                <div class="c_inners_input_line">
                                    <div class="c_inners_input_label">имя</div>
                                    <input type="text" class="c_inners_input">
                                </div>
                                <div class="c_inners_input_line">
                                    <div class="c_inners_input_label">телефон</div>
                                    <input type="phone" class="c_inners_input">
                                </div>
                                <div class="c_inners_input_line">
                                    <div class="c_inners_input_label">метро</div>
                                    <input type="phone" class="c_inners_input">
                                </div>
                                <div class="c_inners_input_line">
                                    <div class="c_inners_input_label">адрес доставки</div>
                                    <textarea class="c_inners_input"></textarea>
                                </div>
                                <div class="c_inners_input_line">
                                    <div class="c_inners_input_label">комментарий к заказу</div>
                                    <textarea class="c_inners_input"></textarea>
                                </div>
                                <div class="blah">
                                    <div class="blah_chkbx fl_l">
                                        <input class="blah_input" type="checkbox">
                                    </div>
                                    <div class="blah_label fl_l">
                                        <a class="blah_link">принимаю условия</a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="blah_blah">
                                    <div class="blah_blah_header">Условия пользования</div>
                                    <div class="blah_blah_text">
<br>ООО «Москоуфреш», именуемое далее 
<br>«Moscowfresh» публикует настоящее 
<br>Пользовательское соглашение, 
<br>представляющее собой публичную оферту в отношении пользователей 
<br>портала moscowfresh.ru (далее 
<br>«Пользователь»).
<br><br>
<br>Перед началом использования портала 
<br>moscowfresh.ru (далее «Сервис») 
<br>просим Вас внимательно ознакомиться 
<br>с изложенными ниже условиями 
<br>пользования. Используя Сервис, Вы 
<br>понимаете изложенные в настоящем 
<br>Пользовательском соглашении условия 
<br>и обязуетесь соблюдать их. Если Вы не 
<br>согласны с какими-либо пунктами 
<br>Пользовательского соглашения, либо 
<br>они Вам не ясны, то Вы обязаны 
<br>отказаться от использования Сервиса 
<br>moscowfresh.ru. Использование 
<br>Сервиса без согласия с условиями 
<br>настоящего Пользовательского 
<br>соглашения не допускается. 
<br><br>
<br>Акцептом настоящего 
<br>Пользовательского соглашения 
<br>является использование функций 
<br>Сервиса в любой форме. Настоящее 
<br>Пользовательское соглашение в 
<br>отношении конкретного Пользователя 
<br>вступает в силу с момента его акцепта 
<br>Пользователем. Не допускается акцепт 
<br>настоящего Пользовательского 
<br>соглашения под условиями, либо с 
<br>оговорками. 
                                    </div>
                                </div>
                            </form>
                            <a class="c_inners_left_side_button black_small_button">далее</a>
                        </div>
                    </aside>
                    <section class="c_inners_right_content fl_l">
                        <div class="c_inners_side_header c_inners_side_th">
                            <div class="c_inners_td fl_l c_inners_first_td">товарная позиция</div>
                            <div class="c_inners_td fl_l c_inners_second_td">цена</div>
                            <div class="c_inners_td fl_l c_inners_third_td">количество</div>
                            <div class="c_inners_td fl_l c_inners_fourth_td">итого</div>
                            <div class="clear"></div>
                        </div>
                        <? for ($i=0; $i < 3; $i++) { ?>
                            <div class="c_inners_side_tr">
                                <div class="c_inners_td fl_l c_inners_first_td">
                                    <div class="c_inners_photo fl_l" style="background: url(/assets/img/goods/1.jpg);"></div>
                                    <div class="c_inners_photo_legend fl_r">
                                        <div class="c_inners_photo_legend_name">Яблоко</div>
                                        <div class="c_inners_photo_legend_country">Россия</div>
                                        <div class="c_inners_photo_legend_desc">
                                            Спелы и очен сладки, богат вытаминамы  
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="c_inners_td fl_l c_inners_second_td">4300 <span class="rouble">o</span></div>
                                <div class="c_inners_td fl_l c_inners_third_td">
                                    <div class="c_inners_count">
                                        <input type="text" class="c_inners_count_input" value="1">
                                        <div class="c_inners_count_delete">
                                            <div class="c_inners_count_del sprite"></div>
                                            <div class="c_inners_count_del_legend">удалить</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="c_inners_td fl_l c_inners_fourth_td">4300 <span class="rouble">o</span></div>
                                <div class="clear"></div>
                            </div>
                        <? } ?>
                        <div class="c_inners_right_footer">
                            <div class="c_inners_right_footer_num fl_r">4300 <span class="rouble">o</span></div>
                            <div class="c_inners_right_footer_text fl_r">итого</div>
                            <div class="clear"></div>
                        </div>
                        <div class="c_inners_right_footer">
                            <div class="c_inners_right_footer_num fl_r">4300 <span class="rouble">o</span></div>
                            <div class="c_inners_right_footer_text fl_r">доставка</div>
                            <div class="clear"></div>
                        </div>
                        <div class="c_inners_right_footer">
                            <div class="c_inners_right_footer_num fl_r">44300 <span class="rouble">o</span></div>
                            <div class="c_inners_right_footer_text fl_r">с доставкой</div>
                            <div class="clear"></div>
                        </div>
                        <div class="c_inners_right_footer">
                            <div class="c_inners_right_footer_num orange_text fl_r">4300 <span class="rouble">o</span></div>
                            <div class="c_inners_right_footer_text fl_r">ваша скидка</div>
                            <div class="clear"></div>
                        </div>
                        <div class="c_inners_right_footer">
                            <div class="c_inners_right_footer_num fl_r">4300 <span class="rouble">o</span></div>
                            <div class="c_inners_right_footer_text fl_r">к оплате</div>
                            <div class="clear"></div>
                        </div>
                    </section>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
<? require '../modules/_footer.php'; ?>