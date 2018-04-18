<?php $this->load->view('mobile/common/header',$header);?>
    <div class="callpageform_header">
        Сообщите свой номер телефона, 
        <br>и представитель службы поддержки 
        <br>Айдаеда сейчас же 
        <br>свяжется с вами.
    </div>
    <div class="content">
        <form class="callpageform" action="">
            <input type="hidden" class="callme_input feedback_2_subject" value="<?php echo $subject ?>">
            <label class="callpageform_label">
                <span class="callpageform_label_text">Имя</span>
                <input type="text" class="callpageform_input feedback_2_name">
            </label>
            <label class="callpageform_label">
                <span class="callpageform_label_text">Телефон</span>
                <input type="phone" class="callpageform_input feedback_2_phone">
            </label>
            <label class="callpageform_label">
                <span class="callpageform_label_text">Почта</span>
                <input type="text" class="callpageform_input feedback_2_email">
            </label>
            <button class="callpageform_button send" data-type="feedback_2">отправить</button>
            <div class="feedback_2_success callme_label">Сообщение было отправлено</div>
        </form>
    </div>
<?php $this->load->view('mobile/common/footer',$header);?>