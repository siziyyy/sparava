<?php include '../../../parts/_header.php'; ?>
        <div class="cabinet_page_header">
            <a href="#" class="cabinet_page_exit">выйти</a>
            <div class="cabinet_page_header_tabs">
                <a href="/pages/cabinet/favorites/" class="cabinet_page_header_tab">Избранное</a>
                <a href="/pages/cabinet/orders/" class="cabinet_page_header_tab active">Мои заказы</a>
                <a href="/pages/cabinet/settings/" class="cabinet_page_header_tab">Настройки</a>
            </div>
        </div>
        <div class="cabinet_page_body content">
            <form class="cabinet_page_orders_form">
                <?php for ($i=0; $i < 3; $i++) { ?>
                    <label class="cabinet_page_orders_label">
                        <input type="checkbox" class="cabinet_page_orders_checkbox">
                        <span class="cabinet_page_orders_checkbox_text">20.01.2018</span>
                    </label>
                <?php } ?>
                <button class="cabinet_orders_button">применить</button>
            </form>
        </div>
<?php include '../../../parts/_footer.php'; ?>