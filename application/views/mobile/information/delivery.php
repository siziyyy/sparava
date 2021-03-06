<?php $this->load->view('mobile/common/header',$header);?>
    <div class="info_page content">
        <div class="info_page_inner_back_pack">
            <a href="/information" class="info_page_inner_back sprite"></a>
        </div>
        <div class="info_page_inner_header">Доставка</div>
        <!--<div class="info_page_inner_body">
            <div class="info_page_inner_body_heading info_page_inner_body_heading_deliv">Обычная доставка</div>
            <div class="info_page_inner_body_text">Москва - 199 руб.</div>
            <div class="info_page_inner_body_text"><br>МO (до 25 км от мкада) - 350 руб.</div>
            <div class="info_page_inner_body_text"><br>Доставим завтра в любое удобное Вам время с интервалом на два часа, с 10:00 до 21:00</div>
            <div class="info_page_inner_body_heading info_page_inner_body_heading_deliv">Экспресс доставка</div>
            <div class="info_page_inner_body_text">Москва - 399 руб.</div>
            <div class="info_page_inner_body_text"><br>МO (до 25 км от мкада) - 550 руб.</div>
            <div class="info_page_inner_body_text"><br>Доставим в течении трех часов, с 10:00 до 21:00</div>
            <div class="info_page_inner_body_heading info_page_inner_body_heading_deliv">Минимальный заказ</div>
            <div class="info_page_inner_body_text">Минимальный заказ 1000 руб.</div>
            <div class="info_page_inner_body_heading info_page_inner_body_heading_deliv">Способы оплаты</div>
            <div class="info_page_inner_body_text">
                - наличный расчет курьеру
                <br>- банковской картой курьеру
            </div>
            <img src="/assets/mobile/img/commons/payments.jpg" class="info_page_inner_payments_img" alt="">
        </div>-->
        <div class="info_page_inner_body">
            Стоимость нашей услуги составляет 5% от 
            сумы заказа, но не менее чем 1190 руб. 
            (для Москвы). При доставке товаров, цена 
            которых ниже чем 50 руб. за килограмм 
            или литр, к стоимости доставки добавляется 
            2 руб. за килограмм.
            <br><br>
            Информация о стоимости доставки по 
            городам
            <br><br>
        </div>
        <form method="post">
            <input type="text" class="info_page_inner_body_deliv_inp" placeholder="Город" name="shipping_rate_search">
            <input type="submit" class="filters_button filters_button_search" value="найти" name="search_for_shipping_rate">
        </form>

        <?php if(isset($shipping_rate)) { ?>
            <?php if($shipping_rate) { ?>
                <div class="info_page_inner_body info_page_inner_body_result">
                    <div class="tyvuibnoubyvtrc"><?php echo $shipping_rate['title'] ?></div>
                    Стоимость нашей услуги составляет 5% от суммы заказа + <?php echo $shipping_rate['delivery'] ?> руб., но не менее чем <?php echo $shipping_rate['cost'] ?> руб.
                </div>
            <?php } else { ?>
                <div class="info_page_inner_body info_page_inner_body_result">
                    <div class="tyvuibnoubyvtrc">По Вашему запросу ничего не найдено</div>
                </div>
            <?php } ?>
        <?php } ?>
        <div class="info_page_inner_footer">
            <a href="/information/return" class="info_page_inner_footer_link">Прием заказа, обмен и возврат</a>
            <a href="/information/guarantee" class="info_page_inner_footer_link">Гарантия качества</a>
            <a href="/information/agreement" class="info_page_inner_footer_link">Публичная оферта</a>
        </div>
    </div>
<?php $this->load->view('mobile/common/footer',$footer);?>