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
                <a href="index4.php" class="admin_menu_item active_admin_menu_item">У курьера</a>
                <a href="index5.php" class="admin_menu_item">Доставленные</a>
                <a href="index6.php" class="admin_menu_item">Отмененные</a>
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
                <!-- one_courier -->
                <tr class="table_sep_pre_cour">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="table_sep_cour">
                    <td>
                        <span class="table_sep_cour_span">Иванов Максим</span>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        <span class="table_sep_cour_span table_sep_cour_phone">8 495 532 14 09</span>
                    </td>
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
                <tr class="cour_final">
                    <td></td>
                    <td></td>
                    <td>итого</td>
                    <td>600</td>
                    <td></td>
                    <td></td>
                    <td>18500</td>
                </tr>
                <!-- / one_courier -->
                <!-- one_courier -->
                <tr class="table_sep_pre_cour">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="table_sep_cour">
                    <td>
                        <span class="table_sep_cour_span">Максимов Иван</span>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        <span class="table_sep_cour_span table_sep_cour_phone">8 495 532 14 09</span>
                    </td>
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
                <tr class="cour_final">
                    <td></td>
                    <td></td>
                    <td>итого</td>
                    <td>600</td>
                    <td></td>
                    <td></td>
                    <td>18500</td>
                </tr>
                <!-- / one_courier -->
            </table>
        </section>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script><!-- always -->
        <script src="/assets/admin/js/main.js"></script><!-- always -->
    </body>
</html>