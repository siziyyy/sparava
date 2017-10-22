<?php $this->load->view('common/header');?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Группы
				<small><?php echo (isset($group) ? "Редактировать группу" : "Добавить группу" ) ?></small>
			</h1>
		</section>
		<?php 
			if(isset($group)) {
				$url = '/groups/update';
				$id = $group->get_id();
				$group_data = $group->get_data();
			} else {
				$url = '/groups/add';
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
										
										<?php $this->baselib->insert_form_element("text","name","Имя",(isset($group) ? $group : "")); ?>
										<?php $this->baselib->insert_form_element("textarea","description","Описание",(isset($group) ? $group : "")); ?>							
									</div>
									<?php $this->baselib->insert_save_cancel_buttons("/groups"); ?>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
<?php $this->load->view('common/footer'); ?>
	   