<?php $this->load->view('common/header');?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Пользователи
				<small><?php echo (isset($user) ? "Редактировать пользователя" : "Добавить пользователя" ) ?></small>
			</h1>
		</section>
		<?php 
			if(isset($user)) {
				$url = '/users/update';
				$id = $user->get_id();
				$user_data = $user->get_data();
			} else {
				$url = '/users/add';
				$id = 0;
			}
		?>
		<?php $this->baselib->insert_form($url,$id); ?>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-primary">
							<div class="row">
								<div class="col-sm-8 col-lg-6">
									<div class="box-body">
										
										<?php echo (isset($user) ? '<input type="hidden" name="pwdhash" value="'.$user_data["pwdhash"].'" style="display:none;" />' : "" ); ?>
										<?php $this->baselib->insert_form_element("text","name","Имя",(isset($user) ? $user : "")); ?>
										<?php (isset($user) ? $this->baselib->insert_form_element("text","pwd","Новый пароль") : "" ); ?>
										<?php $this->baselib->insert_form_element("select","group_id","Группа",(isset($user) ? $user : ""),$this->grouplib->get_opts_list()); ?>
										<?php $this->baselib->insert_form_element("select","office_id","Офис",(isset($user) ? $user : ""),$this->officelib->get_opts_list()); ?>
										<?php $this->baselib->insert_form_element("text","user_email","E-mail",(isset($user_data) ? $user_data["email"] : "")); ?>
										<?php $this->baselib->insert_form_element("text","telephone","Телефон",(isset($user) ? $user : "")); ?>
										<?php $this->baselib->insert_form_element("select","freeze","Заморозить",(isset($user) ? $user : ""),array("0"=>"Нет","1"=>"Да")); ?>
										<?php $this->baselib->insert_form_element("textarea","comment","Комментарий",(isset($user) ? $user : "")); ?>							
									</div>
									<?php $this->baselib->insert_save_cancel_buttons("/users"); ?>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
<?php $this->load->view('common/footer'); ?>
	   