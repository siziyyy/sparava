<?php $this->load->view('common/header');?>
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Группы
				<small><?php echo (isset($group) ? "Редактировать группу" : "Добавить группу" ) ?></small>
			</h1>
		</section>
			<?php
				$url = '/rules/update';
			?>
			<?php echo $this->baselib->insert_form($url,$group_id); ?>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-primary">
							<div class="row">
								<div class="col-sm-10 col-lg-6">
								<?php
									$url = '/rules/update';
								?>
								<?php echo $this->baselib->insert_form($url,$group_id); ?>								
									<div class="box-body">
										<?php if(!empty($rules)) { ?>
											<table class="table table-hover table-striped">
												<thead>
													<tr>
														<th>Право</th>
														<th>Действие</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($rules as $id => $rule) { ?>
														<tr>
															<td><?php echo $rule["name"] ?></td>
															<td>													
																<div class="form-group">
																	<div class="radio">
																		<label>
																			<input type="radio" name="<?php echo $id ?>" id="optionsRadios1" value="1" <?php echo ($rule["value"]==1 ? "checked" : "")?>>
																			Разрешить&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		</label>
																		<label>
																			<input type="radio" name="<?php echo $id ?>" id="optionsRadios2" value="0" <?php echo ($rule["value"]==0 ? "checked" : "")?>>
																			Запретить
																		</label>
																	</div>
																</div>
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
									<?php $this->baselib->insert_save_cancel_buttons("/rules"); ?>
									</form>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
<?php $this->load->view('common/footer'); ?>
	   