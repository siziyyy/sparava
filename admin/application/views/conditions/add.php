<?php $this->load->view('common/header');?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Состояние товара
				<small><?php echo (isset($condition) ? "Редактирование состояния" : "Добавление состояния" ) ?></small>
			</h1>
		</section>
		<?php 
			if(isset($condition)) {
				$url = '/conditions/update';
				$id = $condition->get_id();
				$device_data = $condition->get_data();
			} else {
				$url = '/conditions/add';
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
										
										<?php $this->baselib->insert_form_element("text","title","Название",(isset($condition) ? $condition : "")); ?>
										<?php $this->baselib->insert_form_element("textarea","description","Описание",(isset($condition) ? $condition : "")); ?>							
									</div>
									<?php $this->baselib->insert_save_cancel_buttons("/сonditions"); ?>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
<?php $this->load->view('common/footer'); ?>
	   