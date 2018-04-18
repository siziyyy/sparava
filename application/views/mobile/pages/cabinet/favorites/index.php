<?php include '../../../parts/_header.php'; ?>
    <?php include '../../../parts/_filters_menu.php'; ?>
    <div class="cabinet_page_header">
        <a href="#" class="cabinet_page_exit">выйти</a>
        <div class="cabinet_page_header_tabs">
            <a href="/pages/cabinet/orders/" class="cabinet_page_header_tab">Мои заказы</a>
            <a href="/pages/cabinet/favorites/" class="cabinet_page_header_tab active">Избранное</a>
            <a href="/pages/cabinet/settings/" class="cabinet_page_header_tab">Настройки</a>
        </div>
    </div>
    <div class="sticky">
        <div class="content">
            <div class="category_content_header">
                <div class="category_content_header_text fl_l">Томаты<span class="category_content_header_count">&nbsp;(19)&nbsp;</span></div>
                <div class="category_content_header_buttons fl_r">
                    <a href="#" class="category_content_header_button_filters sprite fl_r"></a>
                    <a href="#" class="category_content_header_button_view category_content_header_button_view_double sprite fl_r"></a> <!-- add / remove .active -->
                    <a href="#" class="category_content_header_button_view category_content_header_button_view_one sprite active fl_r"></a> <!-- add / remove .active -->
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <span id='indicator'></span>
    <div class="category_content category_content_view_by_double"> <!-- add / remove .category_content_view_by_double -->
        <?php for ($i=0; $i < 5; $i++) { ?>
            <div class="category_content_item">
                <div class="content">
                    <a href="/pages/category/item/">
                        <img src="/assets/img/goods/1.jpg" onerror="this.src='/assets/img/goods/nophoto.jpg'" class="category_content_item_img" alt="">
                        <div class="category_content_item_double_info">
                            <div class="category_content_item_price_line">
                                <div class="category_content_item_price">130 ₽</div>
                                <div class="category_content_item_weight">за 100 г</div>
                            </div>
                        </div>
                        <div class="category_content_item_name">Лечебно столовая вода</div>
                        <div class="category_content_item_not_double_info">
                            <div class="category_content_item_not_double_info_header">
                                <div class="category_content_item_not_double_info_header_left fl_l">
                                    <div class="category_content_item_not_double_info_header_left_id">01185</div>
                                    <div class="category_content_item_not_double_info_header_left_name">Лечебно столовая вода</div>
                                </div>
                                <div class="category_content_item_not_double_info_header_right fl_r">
                                    <div class="category_content_item_not_double_info_header_left_price">₽&nbsp;1150</div>
                                    <div class="category_content_item_not_double_info_header_left_weight">за 100 г</div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="category_content_item_not_double_info_body">
                                Блуза Selected Femme выполнена из тонкой и тогда вискозы. Модель пряного кроя<span class="category_content_item_not_double_info_body_more sprite"></span>
                            </div>
                            <div class="category_content_item_not_double_info_subfooter">
                                Cirio - Греция
                            </div>
                        </div>
                    </a>
                    <div class="category_content_item_not_double_info_footer">
                        <a href="#" class="category_content_item_not_double_info_footer_minus sprite"></a>
                        <input type="text" class="category_content_item_not_double_info_footer_input" value="0,1 г">
                        <a href="#" class="category_content_item_not_double_info_footer_plus sprite"></a>
                        <a href="#" class="category_content_item_not_double_info_footer_add_to_cart fl_l"> <!-- add / remove .active -->
                            <div class="category_content_item_not_double_info_footer_add_to_cart_text fl_l">130 ₽</div>
                            <div class="category_content_item_not_double_info_footer_add_to_cart_icon fl_r sprite"></div>
                            <div class="clear"></div>
                        </a>
                        <a href="#" class="category_content_item_not_double_info_footer_star sprite"></a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <a href="#" class="show_more_products">показать еще</a>
<?php include '../../../parts/_footer.php'; ?>