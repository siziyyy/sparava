<?php $this->load->view('common/header');?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Офисы
				<small><?php echo (isset($office) ? "Редактировать офис" : "Добавить офис" ) ?></small>
			</h1>
		</section>
		<?php 
			if(isset($office)) {
				$url = '/offices/update';
				$id = $office->get_id();
				$office_data = $office->get_data();
			} else {
				$url = '/offices/add';
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
										
										<?php $this->baselib->insert_form_element("text","name","Имя",(isset($office) ? $office : "")); ?>
										<?php $this->baselib->insert_form_element("textarea","description","Описание",(isset($office) ? $office : "")); ?>							
									</div>
									<?php $this->baselib->insert_save_cancel_buttons("/offices"); ?>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
<?php $this->load->view('common/footer'); ?>
	   