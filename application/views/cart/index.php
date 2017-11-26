<? require '../modules/_header.php'; ?>
        <section class="content">
            <div class="content_helper">
                <div class="c_cart">
                    <div class="c_inners_header">Корзина</div>
                    <aside class="c_inners_left_side fl_l">
                        <div class="c_inners_side_header">
                            <span class="c_inners_amount_text">сумма к оплате, без доставки</span>
                            <span class="c_inners_amount_num">4300 р.</span>
                        </div>
                        <div class="c_inners_left_side_content">
                            <div class="c_inners_left_side_text_h">
                                Минимальный заказ
                            </div>
                            <div class="c_inners_left_side_text_b">
                                Минимальная сумма заказа 1500 руб.
                            </div>
                            <a href="/" class="c_inners_left_side_button black_small_button">&lt; добрать</a>
                        </div>
                        <img src="/assets/img/commons/cart.jpg" alt="sparava | корзина" class="c_inners_left_side_img">
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
                                <div class="c_inners_td fl_l c_inners_second_td">4300 р.</div>
                                <div class="c_inners_td fl_l c_inners_third_td">
                                    <div class="c_inners_count">
                                        <input type="text" class="c_inners_count_input" value="1">
                                        <div class="c_inners_count_delete">
                                            <div class="c_inners_count_del sprite"></div>
                                            <div class="c_inners_count_del_legend">удалить</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="c_inners_td fl_l c_inners_fourth_td">4300 р.</div>
                                <div class="clear"></div>
                            </div>
                        <? } ?>
                        <div class="c_inners_right_footer">
                            <div class="c_inners_right_footer_num fl_r">4300 р.</div>
                            <div class="c_inners_right_footer_text fl_r">итого, без суммы доставки</div>
                            <div class="clear"></div>
                        </div>
                    </section>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
<? require '../modules/_footer.php'; ?>