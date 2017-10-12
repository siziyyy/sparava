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
                <a class="admin_header_menu_item" href="/admin/orders/">Заказы</a>
                <a class="admin_header_menu_item" href="/admin/purchaser/">Закупка</a>
                <a class="admin_header_menu_item current_admin_header_menu_item" href="/admin/storehouse/">Склад</a>
            </div>
            <div class="cour_selc">
                <select class="modal_info_inp" name="" id="">
                    <option value="">Овощи</option>
                </select>
            </div>
            <table class="purch">
                <? for ($i=0; $i < 3; $i++) { ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="chck_in_modal">
                        </td>
                        <td>
                            <div class="modal_photo no_modal_photo" style="background: url('/assets/img/goods/1.jpg')"></div>
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
                        <td class="modal_price">4300 ₽</td>
                        <td class="modal_count">
                            15
                        </td>
                        <td class="modal_price">4300 ₽</td>
                        <td class="modal_action"><div class="modal_act modal_act_new">списать</div></td>
                    </tr>
                <? } ?>
                <tr class="purch_foot">
                    <td></td>
                    <td><div class="orders_button no_modal_button">списать</div></td>
                    <td></td>
                    <td>итого в складе</td>                    
                    <td></td>
                    <td class="modal_price">4300 ₽</td>
                    <td></td>
                </tr>
            </table>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script><!-- always -->
        <script src="/assets/admin/js/main.js"></script><!-- always -->
    </body>
</html>