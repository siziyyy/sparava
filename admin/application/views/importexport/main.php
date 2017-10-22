<?php $this->load->view('common/header');?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Продукты</h1>
		</section>
		
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="row">
							<div class="col-sm-8 col-lg-6">
								<div class="box-body">
									<h3>Импорт через Excel</h3>
									<?php echo form_open_multipart('/importexport/upload');?>
									
										<?php $this->baselib->insert_form_element("upload","import_file","Выберите файл",""); ?>
									
										<button class="btn btn-primary" type="submit"><i class="fa fa-cloud-upload"></i> Загрузить</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div class="row">
							<div class="col-sm-8 col-lg-6">
								<div class="box-body">
									<h3>Экспорт через Excel</h3>
									<?php echo form_open_multipart('/importexport/download');?>
										<?php $this->baselib->insert_form_element("select","category_id","Категории","",$this->categorylib->get_opts_list()); ?>
										<button class="btn btn-primary" type="submit"><i class="fa fa-cloud-download"></i> Скачать</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>		
	</div>
<?php $this->load->view('common/footer'); ?>
	   