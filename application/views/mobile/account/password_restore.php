<?php $this->load->view('mobile/common/header',$header); ?>
        <?php if(isset($error)) { ?>
            <div class=""><?php echo $error ?></div>
        <?php } ?>
        <div class="content cart_auth cabinet_auth">
            <div class="restore_pass_header">
                <a href="/account" class="info_page_inner_back sprite"></a>
                <div class="restore_pass_header_text">
                    Для восстановления пароля<br>введите вашу почту
                </div>
            </div>
            <form class="restore_pass" method="post">
                <input type="hidden" name="password_restore_form" value="1">

                <label class="auth_label">
                    <input type="text" class="auth_input" placeholder="почта" name="email">
                </label>
                <button type="submit" class="auth_button">восстановить пароль</button>
            </form>
        </div>
<?php $this->load->view('mobile/common/footer'); ?>