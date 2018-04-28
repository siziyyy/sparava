<?php $this->load->view('mobile/common/header',$header);?>
    <div class="info_page content">
        <div class="info_page_inner_back_pack">
            <a href="/information" class="info_page_inner_back sprite"></a>
        </div>
        <div class="info_page_inner_header">Претензия</div>
        <div class="info_page_inner_body">
            <form class="info_page_form">
                <label class="info_page_form_label">
                    <span class="info_page_form_label_text">Имя</span>
                    <input type="text" class="info_page_form_input">
                </label>
                <label class="info_page_form_label">
                    <span class="info_page_form_label_text">Телефон или почта</span>
                    <input type="email" class="info_page_form_input">
                </label>
                <label class="info_page_form_label">
                    <span class="info_page_form_label_text">Комментарии</span>
                    <textarea type="email" class="info_page_form_textarea"></textarea>
                </label>
                <button class="info_page_form_button">отправить</button>
            </form>
        </div>
        <div class="info_page_inner_footer">
            <a href="/information/" class="info_page_inner_footer_link">Преимущество первого заказа</a>
            <a href="/information/bonus" class="info_page_inner_footer_link">Бонусная система</a>
        </div>
    </div>
<?php $this->load->view('mobile/common/footer',$footer);?>