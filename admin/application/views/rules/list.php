<?php $this->load->view('common/header');?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Правила
        <small>Список групп</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	
      <!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<?php if(!empty($groups)) { ?>
					<table id="result_list" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Имя</th>
								<th>Описание</th>
								<th>Действия</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($groups as $group) { ?>
								<tr>
									<td><?php echo $group["id"] ?></td>
									<td><?php echo $group["name"] ?></td>
									<td>
											<a href="/rules/edit/<?php echo $group["id"] ?>" class="btn btn-primary" title="Редактировать"><i class="fa fa-edit"></i></a>
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