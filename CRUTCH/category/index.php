<? require '../modules/_header.php'; ?>
        <section class="content">
            <div class="category_bg_helper">
                <div class="content_helper">
                    <? require '../modules/_menu.php'; ?>
                    <div class="c_subcat_menu">
                        <a href="/category" class="c_subcat_menu_link">Хиты продаж</a>
                        <a href="/category" class="c_subcat_menu_link">Говядина</a>
                        <a href="/category" class="c_subcat_menu_link">Свинина</a>
                        <a href="/category" class="c_subcat_menu_link">Баранина</a>
                        <a href="/category" class="c_subcat_menu_link c_current_subcat_link">Оленина</a>
                        <a href="/category" class="c_subcat_menu_link">Мясо кабана</a>
                    </div>
                </div>
            </div>
            <div class="content_helper">
                <div class="goods">
                    <? for ($i=0; $i < 12; $i++) { ?>
                        <div class="g_good fl_l">
                            <div class="g_good_photo_block">
                                <img src="/assets/img/goods/1.jpg" alt="Киви" class="g_good_photo">
                            </div>
                            <div class="g_old_good_price">130 <span class="rouble">o</span></div>
                            <div class="g_good_price">130 <span class="rouble">o</span></div>
                            <div class="g_old_good_price_date">до 31.08</div>
                            <div class="g_good_name">Dr.Pepper - Cherry Vanilla</div>
                            <div class="g_good_description">
                                Первый отжим из оливок
                            </div>
                            <div class="g_good_country">Cirio - Греция</div>
                            <div class="g_good_actions">
                                <div class="g_good_count">
                                    <input type="text" class="g_good_counter" value="1">
                                    <span class="g_good_count_legend">кг</span>
                                </div>
                                <div class="g_good_to_cart">
                                    <span class="g_good_to_cart_text">130 <span class="rouble">o</span></span>
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