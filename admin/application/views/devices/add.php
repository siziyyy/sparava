<?php $this->load->view('common/header');?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Тип устройства
				<small><?php echo (isset($device) ? "Редактировать тип" : "Добавить тип" ) ?></small>
			</h1>
		</section>
		<?php 
			if(isset($device)) {
				$url = '/devices/update';
				$id = $device->get_id();
				$device_data = $device->get_data();
			} else {
				$url = '/devices/add';
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
										
										<?php $this->baselib->insert_form_element("text","name","Имя",(isset($device) ? $device : "")); ?>
										<?php $this->baselib->insert_form_element("textarea","description","Описание",(isset($device) ? $device : "")); ?>							
									</div>
									<?php $this->baselib->insert_save_cancel_buttons("/devices"); ?>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
<?php $this->load->view('common/footer'); ?>
	   