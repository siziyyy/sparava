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
                            <select class="c_new_menu_filter" name="country" onchange="filter_select( this );">
								<option value="0">страна</option>
								<?php foreach($attributes['countries'] as $attribute) { ?>
									<option value="<?php echo $attribute ?>" <?php echo ($filters['country'] === $attribute ? 'selected' : '' ) ?>><?php echo $attribute ?></option>
								<?php } ?>
                            </select>
                            <select class="c_new_menu_filter" name="composition" onchange="filter_select( this );">
                                <option value="0">состав</option>
								<?php foreach($attributes['compositions'] as $attribute) { ?>
									<option value="<?php echo $attribute ?>" <?php echo ($filters['composition'] === $attribute ? 'selected' : '' ) ?>><?php echo $attribute ?></option>
								<?php } ?>								
                            </select>
                            <select class="c_new_menu_filter" name="weight" onchange="filter_select( this );">
                                <option value="0">вес упаковки</option>
								<?php foreach($attributes['weights'] as $attribute) { ?>
									<option value="<?php echo $attribute ?>" <?php echo ($filters['weight'] === $attribute ? 'selected' : '' ) ?>><?php echo $attribute ?></option>
								<?php } ?>									
                            </select>
                            <select class="c_new_menu_filter" name="price" onchange="filter_select( this );">
                                <option value="0">цена</option>
								<option value="asc" <?php echo ($filters['price'] === 'asc' ? 'selected' : '' ) ?>>по возрастанию</option>
								<option value="desc" <?php echo ($filters['price'] === 'desc' ? 'selected' : '' ) ?>>по убыванию</option>
                            </select>
                            <div class="c_new_menu_filters_count fl_r">всего товаров: <?php echo $products_count ?></div>
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