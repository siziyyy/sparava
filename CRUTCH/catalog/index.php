<? require '../modules/_header.php'; ?>
        <div class="contacts_bg_helper"></div>
        <section class="content contacts_content">
            <div class="content_helper">
                <div class="c_cart">
                    <div class="catalog_header">КАТАЛОГ</div>
                    <div class="catalog_pack">
                        <? for ($i=0; $i < 15; $i++) { ?>
                            <div class="catalog_line">
                                <div class="catalog_line_header">Категория</div>
                                <a href="/category" class="catalog_line_item">Подкатегория</a>
                                <a href="/category" class="catalog_line_item">Подкатегория</a>
                                <a href="/category" class="catalog_line_item">Подкатегория</a>
                                <a href="/category" class="catalog_line_item">Подкатегория</a>
                                <a href="/category" class="catalog_line_item">Подкатегория</a>
                                <a href="/category" class="catalog_line_item">Подкатегория</a>
                                <a href="/category" class="catalog_line_item">Подкатегория</a>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </section>
<? require '../modules/_footer.php'; ?>