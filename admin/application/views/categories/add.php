<?php $this->load->view('common/header');?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Категория
				<small><?php echo (isset($category) ? "Редактирование категории" : "Добавление категории" ) ?></small>
			</h1>
		</section>
		<?php 
			if(isset($category)) {
				$url = '/categories/update';
				$id = $category->get_id();
				$device_data = $category->get_data();
			} else {
				$url = '/categories/add';
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
										
										<?php $this->baselib->insert_form_element("text","title","Название",(isset($category) ? $category : "")); ?>
										<?php $this->baselib->insert_form_element("textarea","description","Описание",(isset($category) ? $category : "")); ?>
										<?php $this->baselib->insert_form_element("select","parent_id","Родительская категория",(isset($category) ? $category : ""),$this->categorylib->get_opts_list()); ?>
										<?php $this->baselib->insert_form_element("select","status","Статус",(isset($category) ? $category : ""),array("0"=>"Отключен","1"=>"Включен")); ?>
										<?php $this->baselib->insert_form_element("text","sort_order","Порядок сортировки",(isset($category) ? $category : "")); ?>
										<?php $this->baselib->insert_form_element("select","in_main_menu","В главном меню",(isset($category) ? $category : ""),array("0"=>"Нет","1"=>"Да")); ?>
										<?php $this->baselib->insert_form_element("text","class","Особый класс",(isset($category) ? $category : "")); ?>
										<?php $this->baselib->insert_form_element("select","first_line","Первая линия",(isset($category) ? $category : ""),array("0"=>"Нет","1"=>"Да")); ?>
										<?php $this->baselib->insert_form_element("text","seo_url","SEO url",(isset($category) ? $category : "")); ?>
									</div>
									<?php $this->baselib->insert_save_cancel_buttons("/categories"); ?>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
<?php $this->load->view('common/footer'); ?>
	   