<? require '../modules/_header.php'; ?>
        <section class="content">
            <div class="category_bg_helper">
                <div class="content_helper">
                    <div class="search_header">
                        <span class="search_header_text">Поиск по артикулу</span>
                        <span class="search_header_number">01578</span>
                    </div>
                </div>
            </div>
            <div class="content_helper">
                <div class="goods">
                    <? for ($i=1; $i < 2; $i++) { ?>
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
                                Cirio - Греция <span class="g_good_id">13548</span>
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
                    <div class="search_banner fl_r">
                        <img src="/assets/img/commons/search_banner.jpg" alt="">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="search_separator"></div>
            <div class="content_helper">
                <div class="twin_header">Похожие товары</div>
                <div class="goods">
                    <? for ($i=1; $i < 6; $i++) { ?>
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
                                Cirio - Греция <span class="g_good_id">13548</span>
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
            </div>
        </section>
<? require '../modules/_footer.php'; ?>