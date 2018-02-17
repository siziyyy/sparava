<?php $this->load->view('common/header',$header);?>
        <section class="content">
            <div class="content_helper">
                <div class="callme_header">
                    Поговорить со службой 
                    <br>поддержки Айдаеда сейчас.
                </div>
                <div class="callme_subheader">
                    Сообщите свой номер телефона, и представитель службы поддержки 
                    <br>Айдаеда сейчас же свяжется с вами.
                </div>
                <form action="" class="callme_form">
                    <label class="callme_label">
                        имя
                        <input type="text" class="callme_input">
                    </label>
                    <label class="callme_label">
                        телефон
                        <input type="text" class="callme_input">
                    </label>
                    <label class="callme_label">
                        почта <span class="callme_span">не обязательно</span>
                        <input type="text" class="callme_input">
                    </label>
                    <button class="callme_button_send">отправить</button>
                </form>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>