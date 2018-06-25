					<div class="section">
                        <div class="c_inners_header contacts_new_h">Доставка и способы оплаты</div>
                        <div class="c_contacts_line">
                            <div class="c_contacts_line_left fl_l">
                                <div class="c_contacts_line_right_header">Доставка</div>
                                <div class="new_deliv_block">
                                    Стоимость нашей услуги составляет 5% от сумы заказа, но не менее чем 1190 руб. 
                                    <br>(для Москвы). При доставке товаров, цена которых ниже чем 50 руб. за килограмм 
                                    <br>или литр, к стоимости доставки добавляется 2 руб. за килограмм.
                                    <br>
                                    <br>Информация о стоимости доставки по городам
                                    <div class="new_deliv_selects">
                                        <select class="new_deliv_select select_rate_group">
                                            <option data-target="shipping_rates_moscow" data-rate="Стоимость нашей услуги составляет 5% от сумы заказа, но не менее чем 1190 руб.">Москва</option>
                                            <option data-target="shipping_rates_mo">Московская область</option>
                                            <option data-target="shipping_rates_russia" data-rate="Стоимость логистики до пункта отправки составляет 5% от суммы заказа, но не менее чем 1190 руб. Стоимость отправки рассчитывается отдельно.">Россия</option>
                                        </select>
                                        <select class="new_deliv_select rate_group" id="shipping_rates_mo">
                                            <option></option>
                                            <?php foreach($shipping_rates as $value) { ?>
                                                <option data-rate="Стоимость нашей услуги составляет 5% от сумы заказа + <?php  echo $value['delivery'] ?> руб., но не менее чем <?php  echo $value['cost'] ?> руб." >
                                                    <?php echo $value['title'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <span class="shipping_rates_value">Стоимость нашей услуги составляет 5% от сумы заказа, но не менее чем 1190 руб.</span>
                                </div>
                            </div>
                            <div class="c_contacts_line_right c_contacts_line_right_about fl_r">
                                <div class="c_contacts_line_right_header">Часы доставки</div>
                                <div class="c_contacts_line_right_subheader">Москва и МО</div>
                                <span class="c_contacts_line_right_time">7:00-11:00</span>
                                <span class="c_contacts_line_right_time">11:00-18:00</span>
                                <span class="c_contacts_line_right_time c_contacts_line_right_time_last">18:00-20:00</span>
                            </div>
                        </div>
                        <div class="clear" id="second_order"></div>
                    </div>