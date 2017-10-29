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
                            <div class="cool_select_goods_count fl_r">всего товаров: 528</div> 
                            <!--<div class="cool_select_reset fl_r">сбросить фильтр/ы</div> -->
                            <div class="clear"></div>
                        </div>
                        <div class="c_new_index_menu_dropdown c_new_index_menu_dropdown_incat">
                        <div class="c_new_index_menu_dropdown_ls fl_l c_new_index_menu_dropdown_firstls">
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Мясо</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Птица</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Рыба</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Морепродукты</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link c_new_index_menu_dropdown_l_mar">Деликатесы</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Полуфабрикаты</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Кулинария</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link c_new_index_menu_dropdown_l_mar2">Соления</a>
                            <a href="/catalog" class="c_new_index_menu_to_cat">Полный каталог</a>
                        </div>
                        <div class="c_new_index_menu_dropdown_ls fl_l c_new_index_menu_dropdown_secls">
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Фрукты, ягоды</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Овощи, зелень, грибы</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Орехи и сухофрукты</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Специи и приправы</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link c_new_index_menu_dropdown_l_mar">Замороженные продукты</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Молочные продукты</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Бакалея</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Растительное масло</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Консервация</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Соусы</a>
                        </div>
                        <div class="c_new_index_menu_dropdown_ls fl_l c_new_index_menu_dropdown_thrdls">
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Хлеб, лаваш</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Хлебцы и снеки</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Сладости</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link c_new_index_menu_dropdown_l_mar">Торты и пирожные</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Чай</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link c_new_index_menu_dropdown_l_mar">Кофе</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link c_new_index_menu_dropdown_l_mar">Мед</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Соки и компоты</a>
                            <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Вода и напитки</a>
                        </div>
                        <div class="c_new_index_menu_dropdown_ls c_new_index_menu_dropdown_frthls fl_l">
                            <div class="c_new_index_menu_dropdown_head">Продукты из стран мира</div>
                             <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Россия</a>
                             <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Италия</a>
                             <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Испания</a>
                             <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Греция</a>
                             <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Швейцария</a>
                             <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Армения</a>
                             <div class="c_new_index_menu_dropdown_footer">
                                 <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Фермерские продукты</a>
                                 <a href="/category/myaso" class="c_new_index_menu_dropdown_link">Эко и органик продукты</a>
                             </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    </div>