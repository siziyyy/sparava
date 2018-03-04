<?php $this->load->view('common/header',$header);?>
        <section class="content">
            <div class="content_helper">
                <div class="callme_header">
                    Введите данные для завершения регистрации
                </div>
                <form action="" class="callme_form" method="post">
                    <input type="hidden" name="return_url" value="<?php echo $return_url ?>">
                    <input type="hidden" name="identity" value="<?php echo $user['identity'] ?>">
                    <input type="hidden" name="network" value="<?php echo $user['network'] ?>">
                    <input type="hidden" name="profile" value="<?php echo $user['profile'] ?>">

                    <label class="callme_label">
                        имя
                        <input type="text" class="callme_input" name="name" value="<?php echo $user['first_name'] ?> <?php echo $user['last_name'] ?>" />
                    </label>
                    <label class="callme_label">
                        телефон
                        <input type="text" class="callme_input" name="phone" value="" />
                    </label>
                    <label class="callme_label">
                        почта
                        <input type="text" class="callme_input" name="email" value="" />
                    </label>
                    <button class="callme_button_send">отправить</button>
                </form>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>