<?php $this->load->view('mobile/common/header',$header); ?>
        <div class="content cart_auth cabinet_auth">
            <div class="restore_pass_message">
                Ваш заказ формируется для отправки. 
                <br>В ближайшее время с вами свяжутся для 
                <br>подтверждения заказа 
                <div class="restore_pass_message_bott">
                    номер Вашего заказа 
                </div>
                <div class="restore_pass_message_bott_num"><?php echo $order_id ?></div>
            </div>
        </div>
<?php $this->load->view('mobile/common/footer'); ?>