					<div class="c_new_menu c_new_menu_hide">
                        <div class="c_new_menu_line">
							<?php if(isset($menu_childs) and count($menu_childs) > 0) { ?>
								<?php $parent_category = true; ?>
								<?php foreach($menu_childs as $category) { ?>									
									<div class="c_new_menu_line_item fl_l">
										<a href="/category/<?php echo ( $category['seo_url'] ? $category['seo_url'] : $category['category_id'] ) ?>" class="c_new_menu_link <?php echo ( $category['current_category'] ? 'orange_text' : '' ) ?> <?php echo ( $parent_category ? 'gray_text parent_cat' : '' ) ?>"><?php echo $category['title'] ?></a>
									</div>
									<?php $parent_category = false; ?>
								<?php } ?>
							<?php } ?>					
							
							<div class="c_new_menu_line_item c_new_menu_line_item_right fl_r">
								<span class="c_new_menu_more">другие продукты</span>
								<span class="c_new_menu_more_icon oefgpopfegespgo"></span>
							</div>							
							<div class="clear"></div>
							
                        </div>
                        <?php if(!$is_parent_category) { ?>
	                        <div class="c_new_menu_filters filters_holder">						
								<?php if(count($attributes['countries']) > 0) { ?>
								<div class="cool_select_pack fl_l" data-type="country">
									<div class="cool_select <?php echo (isset($filters_text['country']) ? 'cool_select_disabled' : '') ?>">
										<span><?php echo (isset($filters_text['country']) ? $filters_text['country'] : 'страна') ?></span>
	                                    <span class="cool_select_arrow sprite"></span>
	                                    <span class="cool_select_arrow2">×</span>
									</div>
									<div class="cool_select_options">
	                                    <div class="scrollbar-inner scroll_helper">
	    									<?php foreach($attributes['countries'] as $attribute) { ?>
	    										<div class="cool_select_option">
	    											<label>
	    												<input type="checkbox" class="cool_select_check" value="<?php echo $attribute ?>" data-name="country" <?php echo (in_array($attribute,explode(';',$filters['country'])) ? 'checked' : '' ) ?>>
	    												<?php echo $attribute ?>
	    											</label>
	    										</div>
	    									<?php } ?>
	                                    </div>
										<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
									</div>
								</div>
								<?php } ?>
								<?php if(count($attributes['brands']) > 0) { ?>
								<div class="cool_select_pack fl_l" data-type="brand">
									<div class="cool_select <?php echo (isset($filters_text['brand']) ? 'cool_select_disabled' : '') ?>">
										<span><?php echo (isset($filters_text['brand']) ? $filters_text['brand'] : 'бренд') ?></span>
										<span class="cool_select_arrow sprite"></span>
	                                    <span class="cool_select_arrow2">×</span>
									</div>
	                                <div class="cool_select_options">
	                                    <div class="scrollbar-inner scroll_helper">
										<?php foreach($attributes['brands'] as $attribute) { ?>
											<div class="cool_select_option">
												<label>
													<input type="checkbox" class="cool_select_check" value="<?php echo $attribute ?>" data-name="brand" <?php echo (in_array($attribute,explode(';',$filters['brand'])) ? 'checked' : '' ) ?>>
													<?php echo $attribute ?>
												</label>
											</div>
										<?php } ?>
	                                    </div>
										<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
									</div>
								</div>
								<?php } ?>							
								<?php if(count($attributes['compositions']) > 0) { ?>
								<div class="cool_select_pack fl_l" data-type="composition">
									<div class="cool_select <?php echo (isset($filters_text['composition']) ? 'cool_select_disabled' : '') ?>">
										<span><?php echo (isset($filters_text['composition']) ? $filters_text['composition'] : 'состав') ?></span>
	                                    <span class="cool_select_arrow sprite"></span>
	                                    <span class="cool_select_arrow2">×</span>
									</div>
	                                <div class="cool_select_options">
	                                    <div class="scrollbar-inner scroll_helper">
										<?php foreach($attributes['compositions'] as $attribute) { ?>
											<div class="cool_select_option">
												<label>
													<input type="checkbox" class="cool_select_check" value="<?php echo $attribute ?>" data-name="composition" <?php echo (in_array($attribute,explode(';',$filters['composition'])) ? 'checked' : '' ) ?>>
													<?php echo $attribute ?>
												</label>
											</div>
										<?php } ?>
	                                </div>
										<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
									</div>
								</div>
								<?php } ?>
								<?php if(count($attributes['packs']) > 0) { ?>							
								<div class="cool_select_pack fl_l" data-type="pack">
									<div class="cool_select <?php echo (isset($filters_text['pack']) ? 'cool_select_disabled' : '') ?>">
										<span><?php echo (isset($filters_text['pack']) ? $filters_text['pack'] : 'упаковка') ?></span>
	                                    <span class="cool_select_arrow sprite"></span>
	                                    <span class="cool_select_arrow2">×</span>
									</div>
	                                <div class="cool_select_options">
	                                    <div class="scrollbar-inner scroll_helper">
										<?php foreach($attributes['packs'] as $attribute) { ?>
											<div class="cool_select_option">
												<label>
													<input type="checkbox" class="cool_select_check" value="<?php echo $attribute ?>" data-name="pack" <?php echo (in_array($attribute,explode(';',$filters['pack'])) ? 'checked' : '' ) ?>>
													<?php echo $attribute ?>
												</label>
											</div>
										<?php } ?>
	                                </div>
										<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
									</div>								
								</div>
								<?php } ?>
								<?php if($attributes['show_weights']) { ?>
								<div class="cool_select_pack fl_l" data-type="weight">
									<div class="cool_select <?php echo (isset($filters_text['weight']) ? 'cool_select_disabled' : '') ?>">
										<span><?php echo (isset($filters_text['weight']) ? $filters_text['weight'] : 'вес') ?></span>
	                                    <span class="cool_select_arrow sprite"></span>
	                                    <span class="cool_select_arrow2">×</span>
									</div>
	                                <div class="cool_select_options">
	                                    <div class="scrollbar-inner scroll_helper">
										<div class="cool_select_option">
											<label>
												<input type="radio" class="cool_select_check" value="raz" name="weight" data-name="weight" <?php echo ($filters['weight'] === 'raz' ? 'checked' : '' ) ?>>
												на развес
											</label>
										</div>
										<div class="cool_select_option">
											<label>
												<input type="radio" class="cool_select_check" value="upa"  name="weight" data-name="weight" <?php echo ($filters['weight'] === 'upa' ? 'checked' : '' ) ?>>
												в упаковке
											</label>
										</div>
	                                </div>
										<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
									</div>
								</div>
								<?php } ?>
								<div class="cool_select_pack fl_l" data-type="price">
									<div class="cool_select <?php echo (isset($filters_text['price']) ? 'cool_select_disabled' : '') ?>">
										<span><?php echo (isset($filters_text['price']) ? $filters_text['price'] : 'цена') ?></span>
	                                    <span class="cool_select_arrow sprite"></span>
	                                    <span class="cool_select_arrow2">×</span>
									</div>
	                                <div class="cool_select_options">
	                                    <div class="scrollbar-inner scroll_helper">
										<div class="cool_select_option">
											<label>
												<input type="radio" class="cool_select_check" value="asc" name="price" data-name="price" <?php echo ($filters['price'] === 'asc' ? 'checked' : '' ) ?>>
												по возрастанию
											</label>
										</div>
										<div class="cool_select_option">
											<label>
												<input type="radio" class="cool_select_check" value="desc" name="price" data-name="price" <?php echo ($filters['price'] === 'desc' ? 'checked' : '' ) ?>>
												по убыванию
											</label>
										</div>
	                                </div>
										<div class="cool_select_button <?php echo (!$filters_used ? '' : 'cool_select_button_ready') ?>">применить</div>
									</div>
								</div>
								
								<div class="cool_select_goods_count fl_r">всего товаров: <?php echo $products_count ?>
									<div class="admmminnns">
                                        <a href="#" class="downlaod_excel">XLS</a>
                            			<a href="https://admin.aydaeda.ru/importexport" target="_blank">admin</a>
    								   	<form id="xls_download_form" method="POST">
                            				<input type="hidden" value="" name="token" id="xls_download_token" />
                            			</form> 
                                    </div>
                        		</div> 
	                            <div class="clear"></div>
	                        </div>
	                    <?php } ?>
						<?php $this->load->view('common/menu-categories');?>
                    </div>
              <div class="c_new_mobile_menu noscrlbr">
				<?php foreach($categories_first_line as $category) { ?>
					<?php if($category['current_category']) { ?>
						<a href="/category/<?php echo $category['category_id'] ?>" class="c_mobile_menu_link c_current_menu_mobile_link"><?php echo $category['title'] ?></a>
					<?php } ?>
				<?php } ?>
				<?php foreach($categories_first_line as $category) { ?>
					<?php if(!$category['current_category']) { ?>
						<a href="/category/<?php echo $category['category_id'] ?>" class="c_mobile_menu_link"><?php echo $category['title'] ?></a>
					<?php } ?>
				<?php } ?>
              </div>
            <div class="new_mob_submenu">
                <div class="new_mob_submenu_name fl_l">Хиты</div>
                <!--<div class="new_mob_submenu_name fl_l">
                    Пирожные и рулеты
                    <div class="new_mob_submenu_arrow sprite"></div>
                </div>-->
              	<div class="new_mob_submenu_filter fl_r" data-target="filter-menu">фильтры <?php echo ((isset($filters_count) and $filters_count>0) ? $filters_count : '') ?><div class="new_mob_submenu_arrow sprite"></div></div>
              	<div class="new_mob_submenu_filter fl_r" data-target="category-menu">категории <div class="new_mob_submenu_arrow sprite"></div></div>
              	<div class="clear"></div>
            </div>
            <div class="new_mob_submenu_dropdown" id="category-menu">
              	<div class="new_mob_submenu_dropdown_header">
              		<div class="new_mob_submenu_filter fl_r" data-target="category-menu">категории <div class="new_mob_submenu_arrow sprite"></div></div>
              		<div class="clear"></div>
              	</div>
              	<div class="new_mob_submenu_filter_items">
                    <div class="new_mob_submenu_filter_items_pack new_mob_submenu_filter_items_turn_scroll">
						<?php if(isset($menu_childs) and count($menu_childs) > 0) { ?>
							<?php foreach($menu_childs as $category) { ?>
								<div class="new_mob_submenu_filter_item open_inner_filter">
									<a href="/category/<?php echo ( $category['seo_url'] ? $category['seo_url'] : $category['category_id'] ) ?>">
										<div class="new_mob_submenu_filter_item_name fl_l"><?php echo $category['title'] ?></div>
										<div class="sprite new_mob_submenu_filter_item_arrow fl_r"></div>
									</a>
									<div class="clear"></div>
								</div>									
							<?php } ?>
						<?php } ?>
                    </div>
				</div>
			</div>
            <div class="new_mob_submenu_dropdown filters_holder" id="filter-menu">
              	<div class="new_mob_submenu_dropdown_header">
              		<div class="new_mob_submenu_filter fl_r" data-target="filter-menu">фильтры <?php echo ((isset($filters_count) and $filters_count>0) ? $filters_count : '') ?><div class="new_mob_submenu_arrow sprite"></div></div>
              		<div class="clear"></div>
              	</div>
              	<div class="new_mob_submenu_filter_items">		
					<div class="new_mob_submenu_filter_items_pack">
						<?php if(count($attributes['countries']) > 0) { ?>
                  		<div class="new_mob_submenu_filter_item open_inner_filter" data-target="filter-country">
                  			<div class="new_mob_submenu_filter_item_name fl_l">Страна</div>
							<?php if(!empty($menu['filters']['country'])) { ?>
								<?php foreach(explode(';',$menu['filters']['country']) as $filter) { ?>
									<?php if(!empty($filter)) { ?>
										<span class="new_mob_submenu_filter_item_name_selected"><span class="delete_selected_filter" data-value="<?php echo $filter ?>" data-type="country"><?php echo $filter ?> × </span></span>
									<?php } ?>
								<?php } ?>
							<?php } ?>
                  			<div class="sprite new_mob_submenu_filter_item_arrow fl_r"></div>
                  			<div class="clear"></div>
                  		</div>
						<?php } ?>
						<?php if(count($attributes['brands']) > 0) { ?>
                  		<div class="new_mob_submenu_filter_item open_inner_filter" data-target="filter-brand">
                  			<div class="new_mob_submenu_filter_item_name fl_l">Бренд</div>
							<?php if(!empty($menu['filters']['brand'])) { ?>
								<?php foreach(explode(';',$menu['filters']['brand']) as $filter) { ?>
									<?php if(!empty($filter)) { ?>
										<span class="new_mob_submenu_filter_item_name_selected"><span class="delete_selected_filter" data-value="<?php echo $filter ?>" data-type="brand"><?php echo $filter ?> × </span></span>
									<?php } ?>
								<?php } ?>
							<?php } ?>
                  			<div class="sprite new_mob_submenu_filter_item_arrow fl_r"></div>
                  			<div class="clear"></div>
                  		</div>
						<?php } ?>
						<?php if(count($attributes['compositions']) > 0) { ?>
                  		<div class="new_mob_submenu_filter_item open_inner_filter" data-target="filter-composition">
                  			<div class="new_mob_submenu_filter_item_name fl_l">Состав</div>
							<?php if(!empty($menu['filters']['composition'])) { ?>
								<?php foreach(explode(';',$menu['filters']['composition']) as $filter) { ?>
									<?php if(!empty($filter)) { ?>
										<span class="new_mob_submenu_filter_item_name_selected"><span class="delete_selected_filter" data-value="<?php echo $filter ?>" data-type="composition"><?php echo $filter ?> × </span></span>
									<?php } ?>
								<?php } ?>
							<?php } ?>							
                  			<div class="sprite new_mob_submenu_filter_item_arrow fl_r"></div>
                  			<div class="clear"></div>
                  		</div>
						<?php } ?>
						<?php if(count($attributes['packs']) > 0) { ?>
                  		<div class="new_mob_submenu_filter_item open_inner_filter" data-target="filter-pack">
                  			<div class="new_mob_submenu_filter_item_name fl_l">Упаковка</div>
                  			<div class="sprite new_mob_submenu_filter_item_arrow fl_r"></div>
                  			<div class="clear"></div>
                  		</div>
						<?php } ?>
						<?php if(count($attributes['show_weights']) > 0) { ?>
                  		<div class="new_mob_submenu_filter_item open_inner_filter" data-target="filter-weight">
                  			<div class="new_mob_submenu_filter_item_name fl_l">Вес</div>
							<?php if($filters['weight']) { ?>
								<span class="new_mob_submenu_filter_item_name_selected"><span class="delete_selected_filter" data-value="<?php echo $filter ?>" data-type="weight"><?php echo ($filters['weight'] === 'raz' ? 'на развес' : ($filters['weight'] === 'upa' ? 'в упаковке' : '' )) ?> × </span></span>
							<?php } ?>
                  			<div class="sprite new_mob_submenu_filter_item_arrow fl_r"></div>
                  			<div class="clear"></div>
                  		</div>
						<?php } ?>
                  		<div class="new_mob_submenu_filter_item open_inner_filter" data-target="filter-price">
                  			<div class="new_mob_submenu_filter_item_name fl_l">Цена</div>
							<?php if($filters['price']) { ?>
								<span class="new_mob_submenu_filter_item_name_selected"><span class="delete_selected_filter" data-value="<?php echo $filter ?>" data-type="price"><?php echo ($filters['price'] === 'desc' ? 'по убыванию' : ($filters['price'] === 'asc' ? 'по возрастанию' : '' )) ?> × </span></span>
							<?php } ?>
                  			<div class="sprite new_mob_submenu_filter_item_arrow fl_r"></div>
                  			<div class="clear"></div>
                  		</div>
                    </div>
					<?php if(count($attributes['countries']) > 0) { ?>
                    <div class="new_mob_submenu_filter_items_pack_inners" id="filter-country">
                        <div class="new_mob_submenu_filter_items_turn sprite"></div>
                        <div class="new_mob_submenu_filter_items_turn_scroll">
						<?php foreach($attributes['countries'] as $attribute) { ?>
							<div class="new_mob_submenu_filter_item">
								<label>
									<input type="checkbox" class="new_mob_submenu_filter_item_checkbox cool_select_check fl_l" value="<?php echo $attribute ?>" data-name="country" <?php echo (in_array($attribute,explode(';',$filters['country'])) ? 'checked' : '' ) ?>>
									<div class="new_mob_submenu_filter_item_name fl_l"><?php echo $attribute ?></div>
									<div class="clear"></div>
								</label>
							</div>
						<?php } ?>
                        </div>
                        <div class="new_mob_submenu_filter_button new_orange_small_button">применить</div>
                    </div>
					<?php } ?>					
					<?php if(count($attributes['brands']) > 0) { ?>
                    <div class="new_mob_submenu_filter_items_pack_inners" id="filter-brand">
                        <div class="new_mob_submenu_filter_items_turn sprite"></div>
                        <div class="new_mob_submenu_filter_items_turn_scroll">
						<?php foreach($attributes['brands'] as $attribute) { ?>
							<div class="new_mob_submenu_filter_item">
								<label>
									<input type="checkbox" class="new_mob_submenu_filter_item_checkbox cool_select_check fl_l" value="<?php echo $attribute ?>" data-name="brand" <?php echo (in_array($attribute,explode(';',$filters['brand'])) ? 'checked' : '' ) ?>>
									<div class="new_mob_submenu_filter_item_name fl_l"><?php echo $attribute ?></div>
									<div class="clear"></div>
								</label>
							</div>
						<?php } ?>
                        </div>
                        <div class="new_mob_submenu_filter_button new_orange_small_button">применить</div>
                    </div>
					<?php } ?>
					<?php if(count($attributes['compositions']) > 0) { ?>
                    <div class="new_mob_submenu_filter_items_pack_inners" id="filter-composition">
                        <div class="new_mob_submenu_filter_items_turn sprite"></div>
                        <div class="new_mob_submenu_filter_items_turn_scroll">
						<?php foreach($attributes['compositions'] as $attribute) { ?>
							<div class="new_mob_submenu_filter_item">
								<label>
									<input type="checkbox" class="new_mob_submenu_filter_item_checkbox cool_select_check fl_l" value="<?php echo $attribute ?>" data-name="composition" <?php echo (in_array($attribute,explode(';',$filters['composition'])) ? 'checked' : '' ) ?>>
									<div class="new_mob_submenu_filter_item_name fl_l"><?php echo $attribute ?></div>
									<div class="clear"></div>
								</label>
							</div>
						<?php } ?>
                    </div>
                        <div class="new_mob_submenu_filter_button new_orange_small_button">применить</div>
                    </div>
					<?php } ?>
					<?php if(count($attributes['packs']) > 0) { ?>
                    <div class="new_mob_submenu_filter_items_pack_inners" id="filter-pack">
                        <div class="new_mob_submenu_filter_items_turn sprite"></div>
                        <div class="new_mob_submenu_filter_items_turn_scroll">
						<?php foreach($attributes['packs'] as $attribute) { ?>
							<div class="new_mob_submenu_filter_item">
								<label>
									<input type="checkbox" class="new_mob_submenu_filter_item_checkbox cool_select_check fl_l" value="<?php echo $attribute ?>" data-name="pack" <?php echo (in_array($attribute,explode(';',$filters['pack'])) ? 'checked' : '' ) ?>>
									<div class="new_mob_submenu_filter_item_name fl_l"><?php echo $attribute ?></div>
									<div class="clear"></div>
								</label>
							</div>
						<?php } ?>
                    </div>
                        <div class="new_mob_submenu_filter_button new_orange_small_button">применить</div>
                    </div>
					<?php } ?>
					<?php if($attributes['show_weights']) { ?>
                    <div class="new_mob_submenu_filter_items_pack_inners" id="filter-weight">
                        <div class="new_mob_submenu_filter_items_turn sprite"></div>
						<div class="new_mob_submenu_filter_item">
							<label>
								<input type="radio" class="new_mob_submenu_filter_item_checkbox cool_select_check fl_l" value="raz" name="weight_mob" data-name="weight" <?php echo ($filters['weight'] === 'raz' ? 'checked' : '' ) ?>>
								<div class="new_mob_submenu_filter_item_name fl_l">на развес</div>
								<div class="clear"></div>
							</label>
						</div>
						<div class="new_mob_submenu_filter_item">
							<label>
								<input type="radio" class="new_mob_submenu_filter_item_checkbox cool_select_check fl_l" value="upa"  name="weight_mob" data-name="weight" <?php echo ($filters['weight'] === 'upa' ? 'checked' : '' ) ?>>
								<div class="new_mob_submenu_filter_item_name fl_l">в упаковке</div>
								<div class="clear"></div>
							</label>
						</div>
                        <div class="new_mob_submenu_filter_button new_orange_small_button">применить</div>
                    </div>
					<?php } ?>
                    <div class="new_mob_submenu_filter_items_pack_inners" id="filter-price">
                        <div class="new_mob_submenu_filter_items_turn sprite"></div>
						<div class="new_mob_submenu_filter_item">
							<label>
								<input type="radio" class="new_mob_submenu_filter_item_checkbox cool_select_check fl_l" value="asc" name="price_mob" data-name="price" <?php echo ($filters['price'] === 'asc' ? 'checked' : '' ) ?>>
								<div class="new_mob_submenu_filter_item_name fl_l">по возрастанию</div>
								<div class="clear"></div>
							</label>
						</div>
						<div class="new_mob_submenu_filter_item">
							<label>
								<input type="radio" class="new_mob_submenu_filter_item_checkbox cool_select_check fl_l" value="desc" name="price_mob" data-name="price" <?php echo ($filters['price'] === 'desc' ? 'checked' : '' ) ?>>
								<div class="new_mob_submenu_filter_item_name fl_l">по убыванию</div>
								<div class="clear"></div>
							</label>
						</div>
                        <div class="new_mob_submenu_filter_button new_orange_small_button">применить</div>
					</div>
              </div>
            </div>