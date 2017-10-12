<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>AYDAEDA | Admin</title>
        <meta name="description" content="">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="194x194" href="/favicon-194x194.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5ea424">
        <meta name="msapplication-TileColor" content="#5ea424">
        <meta name="msapplication-TileImage" content="/mstile-144x144.png">
        <meta name="theme-color" content="#5ea424">
        <style>html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;-webkit-user-select:text;-moz-user-select:text;outline:none;cursor:default}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body,html{line-height:1;width:100%;height:100%;font-family:Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;font-weight:500}textarea{font-family:Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif!important;font-weight:500!important}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}.fl_l{float:left}.fl_r{float:right}.clear{clear:both}a{cursor:pointer;text-decoration:none}textarea:disabled{background:#FFF!important}input:focus,textarea:focus,div:focus,select:focus{outline:none}</style>
        <link rel="stylesheet" href="/assets/admin/css/main.css"><!-- always -->
    </head>
    <body>
        <div class="order_mask"></div>
        <div class="order_modal">
            <div class="modal_id">14</div>
            <table class="modal_orders">
                <? for ($i=0; $i < 3; $i++) { ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="chck_in_modal">
                        </td>
                        <td>
                            <div class="modal_photo" style="background: url('/assets/img/goods/1.jpg')"></div>
                        </td>
                        <td>
                            <table class="modal_name">
                                <tr>
                                    <td class="modal_name_name">Dr Pepper - Cherry vanilla</td>
                                </tr>
                                <tr>
                                    <td class="modal_name_desc">Первый отжим из оливок</td>
                                </tr>
                                <tr>
                                    <td class="modal_name_country">Cirio - Греция - 300 гр.</td>
                                </tr>
                            </table>
                        </td>
                        <td class="modal_status modal_status_succ">готов к сборке</td>
                        <td class="modal_price">4300 ₽</td>
                        <td class="modal_count">
                            <input type="text" class="modal_count_inp" value="1">
                        </td>
                        <td class="modal_price">4300 ₽</td>
                        <td class="modal_action"><div class="modal_act modal_act_del"></div></td>
                        <td class="modal_action"><div class="modal_act modal_act_inf"></div></td>
                    </tr>
                <? } ?>
                <tr class="modal_tbl_footer modal_first_tbl_footer">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Итого, без доставки</td>
                    <td></td>
                    <td></td>
                    <td class="modal_price">4300</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="modal_tbl_footer">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Доставка</td>
                    <td></td>
                    <td></td>
                    <td class="modal_price"><input type="text" class="modal_count_inp" value="199"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="modal_tbl_footer">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Скидка</td>
                    <td></td>
                    <td></td>
                    <td class="modal_price"><input type="text" class="modal_count_inp" value="100"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="modal_tbl_footer">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Итого, без доставки</td>
                    <td></td>
                    <td></td>
                    <td class="modal_price">4300</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <div class="modal_tbl_bor"></div>
            <div class="modal_info">
                <table class="modal_info_tbl">
                    <tr>
                        <td>Фамилия</td>
                        <td><input type="text" class="modal_info_inp"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Имя</td>
                        <td><input type="text" class="modal_info_inp"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Отчество</td>
                        <td><input type="text" class="modal_info_inp"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Территория</td>
                        <td>
                            <select type="text" class="modal_info_inp">
                                <option value="">Москва</option>
                            </select>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Почта</td>
                        <td><input type="text" class="modal_info_inp"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Телефон</td>
                        <td><input type="text" class="modal_info_inp"></td>
                        <td><input type="text" class="modal_info_inp"></td>
                    </tr>
                    <tr>
                        <td>Метро</td>
                        <td><input type="text" class="modal_info_inp"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Адрес</td>
                        <td><input type="text" class="modal_info_inp long_modal_info_inp"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Доставка</td>
                        <td><input type="text" class="modal_info_inp"></td>
                        <td class="modal_info_deliv">с 9 до 18</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="" target="_blank" class="modal_print orders_button">печать накладной</a></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Статус</td>
                        <td>
                            <select type="text" class="modal_info_inp">
                                <option value="">Готов к отправке</option>
                            </select>
                        </td>
                        <td>
                            <select type="text" class="modal_info_inp">
                                <option value="">Курьер</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="" target="_blank" class="modal_print orders_button">сохранить</a>
                            <div class="modal_print orders_button">дублировать</div>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <section class="admin">
            <div class="admin_header_menu">
                <a class="admin_header_menu_item current_admin_header_menu_item" href="/admin/orders/">Заказы</a>
                <a class="admin_header_menu_item" href="/admin/purchaser/">Закупка</a>
                <a class="admin_header_menu_item" href="/admin/storehouse/">Склад</a>
            </div>
            <div class="admin_menu">
                <a href="index.php" class="admin_menu_item">Ожидают подтверждения</a>
                <a href="index2.php" class="admin_menu_item">Подтвержденные</a>
                <a href="index3.php" class="admin_menu_item">Готовы к отправке</a>
                <a href="index4.php" class="admin_menu_item">У курьера</a>
                <a href="index5.php" class="admin_menu_item">Доставленные</a>
                <a href="index6.php" class="admin_menu_item active_admin_menu_item">Отмененные</a>
            </div>
            <table class="orders">
                <tr class="table_header">
                    <td>№</td>
                    <td>Заказчик</td>
                    <td>Дата доставки</td>
                    <td>Доставка</td>
                    <td>Метро</td>
                    <td>Позиции</td>
                    <td>Сумма</td>
                </tr>
                <tr class="table_content">
                    <td><a class="open_order">1</a></td>
                    <td class="td_ph">
                        Миронова Ирина
                        <div class="phones">
                            <a href="tel:89888778888">8 888 778 88 88</a>
                            <a href="tel:89888778888">8 888 778 88 88</a>
                        </div>
                    </td>
                    <td>
                        сегодня
                        <br>
                        <span class="dev_t">18:00 - 19:00</span>
                    </td>
                    <td>
                        обычный
                    </td>
                    <td>Перово</td>
                    <td>14</td>
                    <td>9750</td>
                </tr>
                <tr class="table_content">
                    <td><a class="open_order">2</a></td>
                    <td class="td_ph">
                        Миронова Ирина
                        <div class="phones">
                            <a href="tel:89888778888">8 888 778 88 88</a>
                            <a href="tel:89888778888">8 888 778 88 88</a>
                        </div>
                    </td>
                    <td>
                        завтра
                        <br>
                        <span class="dev_t">18:00 - 19:00</span>
                    </td>
                    <td>
                        обычный
                    </td>
                    <td>Перово</td>
                    <td>14</td>
                    <td>9750</td>
                </tr>
            </table>
        </section>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script><!-- always -->
        <script src="/assets/admin/js/main.js"></script><!-- always -->
    </body>
</html>