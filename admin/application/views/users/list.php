<?php $this->load->view('common/header');?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Пользователи
        <small>Список пользователей</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	
	<div class="row buttons_container">
		<div class="col-xs-12">
			<a class="btn btn-primary" href="<?php echo base_url('/users/add'); ?>"><i class="fa fa-plus"></i> Новый пользователь</a>
		</div>
	</div>	
	
      <!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<?php if(!empty($users)) { ?>
					<table id="result_list" class="table table-bordered table-hover table-responsive">
						<thead>
							<tr>
								<th>ID</th>
								<th>Имя</th>
								<th>Телефон</th>
								<th>E-mail</th>
								<th>Группа</th>
								<th>Офис</th>
								<th>Действия</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($users as $user) { ?>
								<tr>
									<td><?php echo $user["id"] ?></td>
									<td><?php echo $user["name"] ?></td>
									<td><?php echo $user["telephone"] ?></td>
									<td><?php echo $user["email"] ?></td>
									<td><?php echo $this->grouplib->get_name_by_id($user["group_id"]) ?></td>
									<td><?php echo $this->officelib->get_name_by_id($user["office_id"]) ?></td>
									<td>
											<a href="/users/edit/<?php echo $user["id"] ?>" class="btn btn-primary" title="Редактировать"><i class="fa fa-edit"></i></a>
											<a href="javascript:if(confirm('Вы действительно хотите удалить?'))location.href='<?php echo base_url('/users/delete/').'/'.$user['id']; ?>';" class="btn btn-primary" title="Удалить"><i class="fa fa-remove"></i></a>										
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