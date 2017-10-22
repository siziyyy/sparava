<?php $this->load->view('common/header');?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Статус
				<small><?php echo (isset($status) ? "Редактирование статуса" : "Добавление статуса" ) ?></small>
			</h1>
		</section>
		<?php 
			if(isset($status)) {
				$url = '/statuses/update';
				$id = $status->get_id();
				$device_data = $status->get_data();
			} else {
				$url = '/statuses/add';
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
										
										<?php $this->baselib->insert_form_element("text","title","Название",(isset($status) ? $status : "")); ?>
										<?php $this->baselib->insert_form_element("textarea","description","Описание",(isset($status) ? $status : "")); ?>							
									</div>
									<?php $this->baselib->insert_save_cancel_buttons("/statuses"); ?>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
<?php $this->load->view('common/footer'); ?>
	   