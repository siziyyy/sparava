<? require '../modules/_header.php'; ?>
        <section class="content">
            <div class="content_helper">
                <div class="c_cart">
                    <div class="c_inners_header">Корзина</div>
                    <aside class="c_inners_left_side fl_l">
                        <div class="c_inners_side_header">
                            <span class="c_inners_amount_text">сумма к оплате</span>
                            <span class="c_inners_amount_num">4300 <span class="rouble">o</span></span>
                        </div>
                        <div class="c_inners_left_side_content">
                            <div class="c_inners_left_side_text_h">
                                Здравствуйте, Марина
                            </div>
                            <div class="c_inners_left_side_text_sh">Вами были указаны следующие данные</div>
                            <div class="c_inners_left_side_text_b2">Марина</div>
                            <div class="c_inners_left_side_text_b2">8 916 578 61 58</div>
                            <div class="c_inners_left_side_text_b2">ул. Пушкина, дом Колотушкина 14/88</div>
                            <a class="c_inners_left_side_button black_small_button">далее</a>
                            <a class="c_inners_left_side_button orange_small_button">изменить</a>
                        </div>
                        <div class="c_inners_left_side_content c_inners_left_side_content_after">
                            <div class="c_inners_left_side_text_h3">
                                История заказов
                            </div>
                            <? for ($i=0; $i < 7; $i++) { ?>
                                <div class="c_inners_left_side_order_line">
                                    <div class="c_inners_left_side_order_line_td_short fl_l">01.08.2017</div>
                                    <div class="c_inners_left_side_order_line_td_short fl_l">3650 руб.</div>
                                    <a href="/" target="_blank" class="c_inners_left_side_order_line_td fl_r">посмотреть</a>
                                    <div class="clear"></div>
                                </div>
                            <? } ?>
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
                            <div class="c_inners_right_footer_num fl_r">4300 <span class="rouble">o</span></div>
                            <div class="c_inners_right_footer_text fl_r">к оплате</div>
                            <div class="clear"></div>
                        </div>
                        <div class="c_inners_right_footer">
                            <div class="c_inners_right_footer_yep fl_r">да</div>
                            <div class="c_inners_right_footer_num fl_r">4300 <span class="rouble">o</span></div>
                            <div class="c_inners_right_footer_text fl_r orange_text">потратить бонусы на</div>
                            <div class="clear"></div>
                        </div>
                        <div class="c_inners_right_footer">
                            <div class="c_inners_right_footer_num fl_r">4300 <span class="rouble">o</span></div>
                            <div class="c_inners_right_footer_text fl_r">к оплате после вычета бонусов</div>
                            <div class="clear"></div>
                        </div>
                    </section>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
<? require '../modules/_footer.php'; ?>