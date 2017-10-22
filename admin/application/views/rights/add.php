<?php $this->load->view('common/header');?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Права
				<small><?php echo (isset($right) ? "Редактировать право" : "Добавить право" ) ?></small>
			</h1>
		</section>
		<?php 
			if(isset($right)) {
				$url = '/rights/update';
				$id = $right->get_id();
				$right_data = $right->get_data();
			} else {
				$url = '/rights/add';
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
										
										<?php $this->baselib->insert_form_element("text","name","Имя",(isset($right) ? $right : "")); ?>
										<?php $this->baselib->insert_form_element("textarea","description","Описание",(isset($right) ? $right : "")); ?>							
									</div>
									<?php $this->baselib->insert_save_cancel_buttons("/rights"); ?>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
<?php $this->load->view('common/footer'); ?>
	   