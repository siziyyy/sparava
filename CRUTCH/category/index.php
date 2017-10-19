<? require '../modules/_header.php'; ?>
        <section class="content">
            <div class="category_bg_helper">
                <div class="content_helper">
                    <div class="c_new_menu">
                        <div class="c_new_menu_line">
                            <div class="c_new_menu_line_item fl_l">
                                <a href="/" class="c_new_menu_link orange_text">хит фрукты</a>
                            </div>
                            <div class="c_new_menu_line_item fl_l">
                                <a href="/" class="c_new_menu_link">фрукты</a>
                            </div>
                            <div class="c_new_menu_line_item fl_l">
                                <a href="/" class="c_new_menu_link">ягоды</a>
                            </div>
                            <div class="c_new_menu_line_item fl_l">
                                <a href="/" class="c_new_menu_link">экзотические</a>
                            </div>
                            <div class="c_new_menu_line_item fl_l">
                                <a href="/" class="c_new_menu_link">наборы</a>
                            </div>
                            <div class="c_new_menu_line_item fl_l">
                                <a href="/" class="c_new_menu_link">заморозка</a>
                            </div>
                            <div class="c_new_menu_line_item c_new_menu_line_item_right fl_r">
                                <span class="c_new_menu_more">другие продукты</span>
                                <span class="c_new_menu_more_icon"></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="c_new_menu_filters">
                            <select class="c_new_menu_filter">
                                <option>страна</option>
                            </select>
                            <select class="c_new_menu_filter">
                                <option>состав</option>
                            </select>
                            <select class="c_new_menu_filter">
                                <option>вес упаковки</option>
                            </select>
                            <select class="c_new_menu_filter">
                                <option>цена</option>
                            </select>
                            <div class="c_new_menu_filters_count fl_r">всего товаров: 528</div>
                            <div class="clear"></div>
                        </div>
                        <div class="c_new_menu_dropdown">
                            <a href="/" class="c_new_menu_dropdown_link">мясо</a>
                            <a href="/" class="c_new_menu_dropdown_link">птица</a>
                            <a href="/" class="c_new_menu_dropdown_link">рыба</a>
                            <a href="/" class="c_new_menu_dropdown_link">деликатесы</a>
                            <div class="c_new_menu_dropdown_link_helper">&nbsp;</div>
                            <a href="/" class="c_new_menu_dropdown_link green_text">фермерское</a>
                            <a href="/" class="c_new_menu_dropdown_link green_text">эко</a>
                            <a href="/" class="c_new_menu_dropdown_link">молочка</a>
                            <a href="/" class="c_new_menu_dropdown_link">сыр</a>
                            <a href="/" class="c_new_menu_dropdown_link">яйцо</a>
                            <a href="/" class="c_new_menu_dropdown_link">макароны</a>
                            <a href="/" class="c_new_menu_dropdown_link">масло</a>
                            <a href="/" class="c_new_menu_dropdown_link">крупы</a>
                            <a href="/" class="c_new_menu_dropdown_link">консервация</a>
                            <a href="/" class="c_new_menu_dropdown_link">фрукты</a>
                            <a href="/" class="c_new_menu_dropdown_link">овощи</a>
                            <a href="/" class="c_new_menu_dropdown_link">зелень</a>
                            <a href="/" class="c_new_menu_dropdown_link">орехи</a>
                            <a href="/" class="c_new_menu_dropdown_link">сухофрукты</a>
                            <a href="/" class="c_new_menu_dropdown_link">специи</a>
                            <a href="/" class="c_new_menu_dropdown_link">чай</a>
                            <a href="/" class="c_new_menu_dropdown_link">кофе</a>
                            <a href="/" class="c_new_menu_dropdown_link">мед</a>
                            <a href="/" class="c_new_menu_dropdown_link">сладости</a>
                            <a href="/" class="c_new_menu_dropdown_link">соки и напитки</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_helper">
                <div class="goods">
                    <? for ($i=1; $i < 11; $i++) { ?>
                        <div class="g_good fl_l">
                            <div class="g_good_photo_block">
                                <img src="/assets/img/goods/<?= $i ?>.jpg" alt="Киви" class="g_good_photo">
                                <div class="g_good_photo_is_sale">акция</div>
                            </div>
                            <div class="g_old_good_price">1130 <span class="rouble">o</span></div>
                            <div class="g_good_price">1130 <span class="rouble">o</span></div>
                            <div class="g_old_good_price_date">до 31.08</div>
                            <div class="g_good_name">Dr.Pepper - Cherry Vanilla</div>
                            <!-- Если есть длинное описание, добавляем .g_good_long_desc -->
                            <div class="g_good_description g_good_long_desc">
                                Первый отжим из оливок
                                <span class="g_good_show_full_desc">...</span>
                                <div class="g_good_big_description">
Альтернативой привычному 
<br>белому сахару-рафинаду из 
<br>свеклы все чаще предлагаются 
<br>другие варианты: карамельный
<br><br>
<br>Поэтому сахар тростниковый 
<br>нерафинированный является 
<br>важным продуктом на столе для 
<br>тех людей, которые хотят быть 
<br>здоровыми.
                                </div>
                            </div>
                            <div class="g_good_country">
                                Cirio - Греция <span class="g_good_weight">- 0,250 мл</span><span class="g_good_id">13548</span>
                            </div>
                            <div class="g_good_actions">
                                <div class="g_good_count">
                                    <input type="text" class="g_good_counter" value="1">
                                    <span class="g_good_count_legend">кг</span>
                                </div>
                                <div class="g_good_to_cart">
                                    <span class="g_good_to_cart_text">1130 <span class="rouble">o</span></span>
                                    <span class="g_good_to_cart_icon sprite"></span>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                    <div class="clear"></div>
                </div>
                <div class="c_paginator">
                    <div class="c_show_more_goods">показать еще</div>
                    <div class="c_pages">
                        <div class="c_page c_current_page">1</div>
                        <div class="c_page">2</div>
                        <div class="c_page">3</div>
                        <div class="c_page">4</div>
                        <div class="c_page">5</div>
                        <div class="c_page">6</div>
                    </div>
                </div>
            </div>
        </section>
<? require '../modules/_footer.php'; ?>