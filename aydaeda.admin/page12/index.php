<!DOCTYPE html>
<title>АйДаЕда Контент</title>
<link rel="stylesheet" href="/assets/css/main.css">
<meta charset="utf-8">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, maximum-scale=1;">
<style>
    html{line-height:1.15;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;height: 100%; width: 100%;position: absolute;top: 0;}body{background: #fff;font-family: 'Arial', sans-serif;margin:0;height: 100%; width: 100%;position: absolute;top: 0;}article,aside,footer,header,nav,section{display:block}h1{font-size:2em;margin:.67em 0}figcaption,figure,main{display:block}figure{margin:1em 40px}hr{box-sizing:content-box;height:0;overflow:visible}pre{font-family:monospace,monospace;font-size:1em}a{background-color:transparent;-webkit-text-decoration-skip:objects;text-decoration: none;}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:inherit;font-weight:bolder}code,kbd,samp{font-family:monospace,monospace;font-size:1em}dfn{font-style:italic}mark{background-color:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}audio,video{display:inline-block}audio:not([controls]){display:none;height:0}img{border-style:none}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{font-family:sans-serif;font-size:100%;line-height:1.15;margin:0}button,input{overflow:visible}button,select{text-transform:none}button,html [type="button"],[type="reset"],[type="submit"]{-webkit-appearance:button}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner{border-style:none;padding:0}button:-moz-focusring,[type="button"]:-moz-focusring,[type="reset"]:-moz-focusring,[type="submit"]:-moz-focusring{outline:1px dotted ButtonText}fieldset{padding:.35em .75em .625em}legend{box-sizing:border-box;color:inherit;display:table;max-width:100%;padding:0;white-space:normal}progress{display:inline-block;vertical-align:baseline}textarea{overflow:auto}[type="checkbox"],[type="radio"]{box-sizing:border-box;padding:0}[type="number"]::-webkit-inner-spin-button,[type="number"]::-webkit-outer-spin-button{height:auto}[type="search"]{-webkit-appearance:textfield;outline-offset:-2px}[type="search"]::-webkit-search-cancel-button,[type="search"]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}details,menu{display:block}summary{display:list-item}canvas{display:inline-block}template{display:none}[hidden]{display:none}.fl_l{float:left}.fl_r{float:right}.clear:after{content:"";display:table;clear:both}
</style>
<header>
    <a href="/" class="back_to_the_future"><span class="back_to_the_future_image"></span>назад</a>
</header>
<section class="choose_your_category_again_not_flex choose_your_category_again_not_flex2">
    <div class="good_page_block clear">
        <div class="good_page_img fl_l">
            <img src="https://aydaeda.ru/images/2017122116-12-35.JPG" alt="Название товара" class="good_page_img_image" onerror="this.src='/assets/img/nophoto.jpg'">
        </div>
        <div class="good_page_block_info fl_r">
            <div class="good_page_block_info_line">
                <div class="good_page_block_info_line_header">Цена</div>
                <div class="good_page_block_info_line_price_buttons">
                    <? for ($i=0; $i < 10; $i++) { ?>
                        <div class="good_page_block_info_line_price_button"><?= $i ?></div>
                    <? } ?>
                    <div class="good_page_block_info_line_add">
                        <div class="good_page_block_info_line_add_button">добавить</div>
                        <input type="number" class="good_page_block_info_line_add_input">
                    </div>
                </div>
            </div>
            <div class="good_page_block_info_line">
                <div class="good_page_block_info_line_header">Количество</div>
                <div class="good_page_block_info_line_price_buttons">
                    <? for ($i=0; $i < 10; $i++) { ?>
                        <div class="good_page_block_info_line_price_button"><?= $i ?></div>
                    <? } ?>
                    <div class="good_page_block_info_line_add">
                        <div class="good_page_block_info_line_add_button">добавить</div>
                        <input type="number" class="good_page_block_info_line_add_input">
                    </div>
                    <div class="good_page_block_info_line_add_button good_page_block_info_line_add_button_remove">статус 0</div>
                    <div class="good_page_block_info_line_add_button good_page_block_info_line_add_button_remove">удалить</div>
                </div>
            </div>
            <div class="good_page_block_info_footer">
                <div class="good_page_block_info_footer_button">добавить</div>
                <label class="good_page_block_info_footer_label">
                    точка
                    <input type="text" class="good_page_block_info_footer_input">
                </label>
                <label class="good_page_block_info_footer_label">
                    цена
                    <input type="number" class="good_page_block_info_footer_input">
                </label>
                <label class="good_page_block_info_footer_label">
                    кол в упак
                    <input type="number" class="good_page_block_info_footer_input">
                </label>
            </div>
        </div>
    </div>
    <div class="good_page_block_next_prev_good fl_l">
        <a href="/page5" class="aydaadmin_good aydaadmin_good3">
            <img src="https://aydaeda.ru/images/2017122116-12-35.JPG" alt="Название товара" class="aydaadmin_good_img" onerror="this.src='/assets/img/nophoto.jpg'">
            <div class="aydaadmin_good_name">Название товара</div>
            <div class="aydaadmin_good_country">Страна</div>
        </a>
        <a href="/page5" class="aydaadmin_good aydaadmin_good3">
            <img src="https://aydaeda.ru/images/2017122116-12-35.JPG" alt="Название товара" class="aydaadmin_good_img" onerror="this.src='/assets/img/nophoto.jpg'">
            <div class="aydaadmin_good_name">Название товара</div>
            <div class="aydaadmin_good_country">Страна</div>
        </a>
    </div>
    <form class="good_page_block_nfo_window_clone fl_l">
        <div class="good_page_block_nfo_window_clone_left fl_l">
            <label class="good_page_block_nfo_window_clone_label">
                Название
                <input type="text" class="good_page_block_nfo_window_clone_input">
            </label>
            <label class="good_page_block_nfo_window_clone_label">
                Бренд
                <input type="text" class="good_page_block_nfo_window_clone_input">
            </label>
            <label class="good_page_block_nfo_window_clone_label">
                Подкатегория
                <input type="text" class="good_page_block_nfo_window_clone_input">
            </label>
            <label class="good_page_block_nfo_window_clone_label">
                Средний вес
                <input type="text" class="good_page_block_nfo_window_clone_input">
            </label>
        </div>
        <div class="good_page_block_nfo_window_clone_right fl_l">
            <label class="good_page_block_nfo_window_clone_label">
                Описание
                <textarea class="good_page_block_nfo_window_clone_input"></textarea>
            </label>
            <label class="good_page_block_nfo_window_clone_label">
                Средний вес
                <input type="text" class="good_page_block_nfo_window_clone_input">
            </label>
            <label class="good_page_block_nfo_window_clone_label">
                Состав
                <textarea class="good_page_block_nfo_window_clone_input"></textarea>
            </label>
        </div>
    </form>
</section>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/assets/js/main.js"></script>