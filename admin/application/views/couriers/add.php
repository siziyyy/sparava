<?php $this->load->view('common/header');?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Курьер
				<small><?php echo (isset($courier) ? "Редактирование курьера" : "Добавление курьера" ) ?></small>
			</h1>
		</section>
		<?php 
			if(isset($courier)) {
				$url = '/couriers/update';
				$id = $courier->get_id();
				$device_data = $courier->get_data();
			} else {
				$url = '/couriers/add';
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
										
										<?php $this->baselib->insert_form_element("text","name","Имя",(isset($courier) ? $courier : "")); ?>
										<?php $this->baselib->insert_form_element("text","phone","Телефон",(isset($courier) ? $courier : "")); ?>
										<?php $this->baselib->insert_form_element("textarea","comments","Комментарий",(isset($courier) ? $courier : "")); ?>							
									</div>
									<?php $this->baselib->insert_save_cancel_buttons("/couriers"); ?>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
<?php $this->load->view('common/footer'); ?>
	   