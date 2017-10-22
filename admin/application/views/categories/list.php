<?php $this->load->view('common/header');?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Категории
        <small>Список категорий</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="row buttons_container">
		<div class="col-xs-12">
			<a class="btn btn-primary" href="<?php echo base_url('/categories/add'); ?>"><i class="fa fa-plus"></i> Новая категория</a>
		</div>
	</div>	
	
      <!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<?php if(!empty($categories)) { ?>
					<table id="result_list" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Имя</th>
								<th>Описание</th>
								<th>Действия</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($categories as $category) { ?>
								<tr>
									<td><?php echo $category["category_id"] ?></td>
									<td><?php echo $category["title"] ?>
										<table class="table table-bordered table-hover col-md-12">
											<?php foreach($category['sub_categories'] as $sub_category) { ?>
												<tr>
													<td><?php echo $sub_category["category_id"] ?></td>
													<td><?php echo $sub_category["title"] ?></td>
													<td>
															<a href="/categories/edit/<?php echo $sub_category["category_id"] ?>" class="btn btn-primary" title="Редактировать"><i class="fa fa-edit"></i></a>
															<a href="javascript:if(confirm('Вы действительно хотите удалить?'))location.href='<?php echo base_url('/categories/delete/').'/'.$sub_category['category_id']; ?>';" class="btn btn-primary" title="Удалить"><i class="fa fa-remove"></i></a>										
													</td>											
												</tr>
											<?php } ?>
										</table>
									</td>
									<td><?php echo $category["description"] ?></td>
									<td>
											<a href="/categories/edit/<?php echo $category["category_id"] ?>" class="btn btn-primary" title="Редактировать"><i class="fa fa-edit"></i></a>
											<a href="javascript:if(confirm('Вы действительно хотите удалить?'))location.href='<?php echo base_url('/categories/delete/').'/'.$category['category_id']; ?>';" class="btn btn-primary" title="Удалить"><i class="fa fa-remove"></i></a>										
									</td>
								</tr>
							<?php } ?>
						</tbody>
						
					</table>				
				<?php } else { ?>
					<div class="callout callout-info">
						<h4>Таблица пуста</h4>
						<p>Записей в этой таблице не найдено .</p>
					</div>			
				<?php } ?>
			</div>
		<!-- /.box-body -->
		</div>    
		</div>
	</div>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('common/footer');?>