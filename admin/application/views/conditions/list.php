<?php $this->load->view('common/header');?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Состояния товаров
        <small>Список состояний</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="row buttons_container">
		<div class="col-xs-12">
			<a class="btn btn-primary" href="<?php echo base_url('/conditions/add'); ?>"><i class="fa fa-plus"></i> Новое состояние</a>
		</div>
	</div>	
	
      <!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<?php if(!empty($conditions)) { ?>
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
							<?php foreach($conditions as $condition) { ?>
								<tr>
									<td><?php echo $condition["condition_id"] ?></td>
									<td><?php echo $condition["title"] ?></td>
									<td><?php echo $condition["description"] ?></td>
									<td>
											<a href="/conditions/edit/<?php echo $condition["condition_id"] ?>" class="btn btn-primary" title="Редактировать"><i class="fa fa-edit"></i></a>
											<a href="javascript:if(confirm('Вы действительно хотите удалить?'))location.href='<?php echo base_url('/conditions/delete/').'/'.$condition['condition_id']; ?>';" class="btn btn-primary" title="Удалить"><i class="fa fa-remove"></i></a>										
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