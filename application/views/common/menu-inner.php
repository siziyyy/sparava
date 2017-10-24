					<div class="c_new_menu">
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
							<div class="cool_select_reset fl_r">сбросить фильтр/ы</div> 
                            <div class="clear"></div>
                        </div>
                        <div class="c_new_menu_dropdown">
							<?php $i = 0; ?>
							<?php foreach($categories_first_line as $category) { ?>
								<?php 
									$i++;
									if($category['current_category']) { 
										$current_class = 'c_current_menu_link';
										
										if(isset($category['childs']) and !isset($childs)) {
											$childs = $category['childs'];
										}
									} else {
										$current_class = '';
									}
								?>
								<a href="/category/<?php echo ( $category['seo_url'] ? $category['seo_url'] : $category['category_id'] ) ?>" class="c_new_menu_dropdown_link <?php echo $category['class'] ?> <?php echo $current_class ?>"><?php echo $category['title'] ?></a>
								<?php if ($i == 4) { break; } ?>
							<?php } ?>							
                            <div class="c_new_menu_dropdown_link_helper">&nbsp;</div>
                            <a href="/farm" class="c_new_menu_dropdown_link green_text">фермерское</a>
                            <a href="/eko" class="c_new_menu_dropdown_link green_text">эко</a>
							<?php $i = 0; ?>
							<?php foreach($categories_first_line as $category) { ?>
								<?php 
									$i++;
									if($category['current_category']) { 
										$current_class = 'c_current_menu_link';
									} else {
										$current_class = '';
									}
									
									if($i > 4) {
								?>
									<a href="/category/<?php echo ( $category['seo_url'] ? $category['seo_url'] : $category['category_id'] ) ?>" class="c_new_menu_dropdown_link <?php echo $category['class'] ?> <?php echo $current_class ?>"><?php echo $category['title'] ?></a>								
								<?php } ?>
							<?php } ?>
                        </div>
                    </div>