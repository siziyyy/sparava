					<div class="c_new_menu c_new_menu_hide">
                        <div class="c_new_menu_line">
							<?php if(isset($menu_childs) and count($menu_childs) > 0) { ?>
								<?php foreach($menu_childs as $category) { ?>
									<div class="c_new_menu_line_item fl_l">
										<a href="/category/<?php echo ( $category['seo_url'] ? $category['seo_url'] : $category['category_id'] ) ?>" class="c_new_menu_link <?php echo ( $category['current_category'] ? 'orange_text' : '' ) ?>"><?php echo $category['title'] ?></a>
									</div>									
								<?php } ?>
							<?php } ?>
							<div class="c_new_menu_line_item c_new_menu_line_item_right fl_r">
								<span class="c_new_menu_more">другие продукты</span>
								<span class="c_new_menu_more_icon"></span>
							</div>							
							<div class="clear"></div>
							
                        </div>
                        <div class="c_new_menu_filters">
							<div class="cool_select_pack fl_l">
								<div class="cool_select">
									<span>страна</span>
									<span class="cool_select_arrow sprite"></span>
								</div>
								<div class="cool_select_options">
									<?php foreach($attributes['countries'] as $attribute) { ?>
										<div class="cool_select_option">
											<label>
												<input type="checkbox" class="cool_select_check" value="<?php echo $attribute ?>" data-name="country" <?php echo (in_array($attribute,explode(';',$filters['country'])) ? 'checked' : '' ) ?>>
												<?php echo $attribute ?>
											</label>
										</div>
									<?php } ?>
								</div>
							</div>	
							<div class="cool_select_pack fl_l">
								<div class="cool_select">
									<span>состав</span>
									<span class="cool_select_arrow sprite"></span>
								</div>
								<div class="cool_select_options">
									<?php foreach($attributes['compositions'] as $attribute) { ?>
										<div class="cool_select_option">
											<label>
												<input type="checkbox" class="cool_select_check" value="<?php echo $attribute ?>" data-name="composition" <?php echo (in_array($attribute,explode(';',$filters['composition'])) ? 'checked' : '' ) ?>>
												<?php echo $attribute ?>
											</label>
										</div>
									<?php } ?>
								</div>
							</div>							
							<div class="cool_select_pack fl_l">
								<div class="cool_select">
									<span>упаковка</span>
									<span class="cool_select_arrow sprite"></span>
								</div>
								<div class="cool_select_options">
									<?php foreach($attributes['packs'] as $attribute) { ?>
										<div class="cool_select_option">
											<label>
												<input type="checkbox" class="cool_select_check" value="<?php echo $attribute ?>" data-name="pack" <?php echo (in_array($attribute,explode(';',$filters['pack'])) ? 'checked' : '' ) ?>>
												<?php echo $attribute ?>
											</label>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="cool_select_pack fl_l">
								<div class="cool_select">
									<span>вес</span>
									<span class="cool_select_arrow sprite"></span>
								</div>
								<div class="cool_select_options">
									<?php foreach($attributes['weights'] as $attribute) { ?>
										<div class="cool_select_option">
											<label>
												<input type="checkbox" class="cool_select_check" value="<?php echo $attribute ?>" data-name="weight" <?php echo (in_array($attribute,explode(';',$filters['weight'])) ? 'checked' : '' ) ?>>
												<?php echo $attribute ?>
											</label>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="cool_select_pack fl_l">
								<div class="cool_select">
									<span>цена</span>
									<span class="cool_select_arrow sprite"></span>
								</div>
								<div class="cool_select_options">
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
							</div>	
							
							<?php if(!$filters_used) { ?>
								<div class="cool_select_goods_count fl_r">всего товаров: 528</div> 
							<?php } else { ?>
								<div class="cool_select_reset fl_r">сбросить фильтр/ы</div>
							<?php } ?>
                            <div class="clear"></div>
                        </div>
						<?php $this->load->view('common/menu-categories');?>
                    </div>
              <div class="c_new_mobile_menu">
                <a href="/category/myaso" class="c_mobile_menu_link">Мясо</a>
                <a href="/category/" class="c_mobile_menu_link">Птица</a>
                <a href="/category/" class="c_mobile_menu_link">Рыба</a>
                <a href="/category/" class="c_mobile_menu_link">Молочка</a>
                <a href="/category/" class="c_mobile_menu_link">Овощи</a>
                <a href="/category/" class="c_mobile_menu_link">Фрукты</a>
                <a href="/category/" class="c_mobile_menu_link">Орехи и сухофрукты</a>
                <a href="/category/" class="c_mobile_menu_link">Бакалея</a>
                <a href="/category/" class="c_mobile_menu_link">Чай</a>
                <a href="/category/" class="c_mobile_menu_link">Кофе</a>
                <a href="/category/" class="c_mobile_menu_link">Мёд</a>
                <a href="/category/" class="c_mobile_menu_link">Птица</a>
                <a href="/category/" class="c_mobile_menu_link">Рыба</a>
                <a href="/category/" class="c_mobile_menu_link">Молочка</a>
                <a href="/category/" class="c_mobile_menu_link">Овощи</a>
                <a href="/category/" class="c_mobile_menu_link">Фрукты</a>
                <a href="/category/" class="c_mobile_menu_link">Орехи и сухофрукты</a>
                <a href="/category/" class="c_mobile_menu_link">Бакалея</a>
                <a href="/category/" class="c_mobile_menu_link">Чай</a>
                <a href="/category/" class="c_mobile_menu_link">Кофе</a>
                <a href="/category/" class="c_mobile_menu_link">Мёд</a>
                <a href="/category/" class="c_mobile_menu_link">Мёд</a>
                <a href="/category/" class="c_mobile_menu_link">Птица</a>
                <a href="/category/" class="c_mobile_menu_link">Рыба</a>
                <a href="/category/" class="c_mobile_menu_link">Молочка</a>
                <a href="/category/" class="c_mobile_menu_link">Овощи</a>
                <a href="/category/" class="c_mobile_menu_link">Фрукты</a>
                <a href="/category/" class="c_mobile_menu_link">Орехи и сухофрукты</a>
                <a href="/category/" class="c_mobile_menu_link">Бакалея</a>
                <a href="/category/" class="c_mobile_menu_link">Чай</a>
                <a href="/category/" class="c_mobile_menu_link">Кофе</a>
                <a href="/category/" class="c_mobile_menu_link">Мёд</a>
              </div>