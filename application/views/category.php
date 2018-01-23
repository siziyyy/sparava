<?php $this->load->view('common/header',$header);?>
        <section class="content">
        	<!-- избранное и мои заказы -->
        	<? /* ?>
        	<div class="mag_or_blog_alt_pack">
	            <div class="mag_or_blog_alt">
		            <a href="/" class="mag_or_blog_link <?php echo ($this->router->fetch_method() != 'blogs' ? 'mag_or_blog_link_act' : '') ?>">избранное</a>
		            <span class="mag_or_blog_separator"></span>
		            <a href="/blogs" class="mag_or_blog_link <?php echo ($this->router->fetch_method() == 'blogs' ? 'mag_or_blog_link_act' : '') ?>">мои заказы</a>
		        </div>
		        <!--<div class="mag_or_blog_alt_message">
		        	у Вас еще нету заказов
		        </div>-->
		        <!--<div class="mag_or_blog_alt_message">
		        	чтобы посмотреть заказы 
					<br>авторизируйтесь
		        </div>-->
				<div class="mag_or_blog_alt_filters_line">
					<div class="mag_or_blog_alt_filters_line_left fl_l">Мои заказы</div>
					<div class="mag_or_blog_alt_filters_line_right fl_r">категории  <div class="new_mob_submenu_arrow sprite"></div></div>
					<div class="clear"></div>
				</div>
				<div class="mag_or_blog_alt_filters_line_dropdown">
					<? for ($i=0; $i < 50; $i++) { ?>
						<div class="mag_or_blog_alt_filters_line_dropdown_line">
							<label>
								<input type="checkbox" class="mag_or_blog_alt_filters_line_dropdown_line_chckbx">
								<span class="mag_or_blog_alt_filters_line_dropdown_line_chckbx_label">20.01.2018</span>
							</label>
						</div>
					<? } ?>
				</div>
	        </div>
        	<? */ ?>
            <div class="category_bg_helper <?php echo ($is_parent_category ? 'category_bg_helper_in_main' : '' ); ?>">
                <div class="content_helper">
                    <?php $this->load->view('common/menu-inner', $menu);?>
                </div>
            </div>
            <div class="content_helper content_helper_gds">
            	<?php if($is_parent_category) { ?>
            		<?php $is_first_category = true; ?>
	            	<?php foreach($products as $category) { ?>
	            		<?php
	            			$class = '';
	            			if($is_first_category) {
	            				$class = 'new_goods_separator_first';
	            				$is_first_category = false;
	            			}
	            		?>
		                <div class="new_goods_separator <?php echo $class ?>">
		                    <a href="/category/<?php echo $category['info']['category_id'] ?>" class="new_goods_separator_link fl_l"><?php echo $category['info']['title'] ?></a>
		                    <div class="new_goods_separator_count fl_l">всего товаров: <?php echo $category['products_count'] ?></div>
		                    <a href="/"><div class="new_goods_separator_look_all fl_r">посмотреть все</div></a>
		                    <div class="clear"></div>
		                </div>
		                <div class="goods">
		                    <?php foreach($category['products'] as $product) { ?>
								<?php $info['product'] = $product; ?>
								<?php $this->load->view('common/load-product',$info);?>					
		                    <?php } ?>
							
							<?php if($category['empty_products']) { ?>
								<?php for($i=0;$i<$category['empty_products'];$i++) { ?>
									<div class="g_good fl_l hide_on_mobile">&nbsp;</div>
								<?php } ?>
							<?php } ?>
							<div id="wrapper_for_product_load"></div>
		                    <div class="clear"></div>
		                </div>
	                <?php } ?>
	            <?php } else { ?>
	            	<div class="new_cool_line_of_filters_aaarrrghh">
	            		<div class="new_cool_line_of_filters_aaarrrghh_item new_cool_line_of_filters_aaarrrghh_item_current new_cool_line_of_filters_aaarrrghh_item_first">все</div>
	            		<div class="new_cool_line_of_filters_aaarrrghh_separator"></div>
	            		<div class="new_cool_line_of_filters_aaarrrghh_item">на развес</div>
	            		<div class="new_cool_line_of_filters_aaarrrghh_item">упаковка</div>
	            		<div class="new_cool_line_of_filters_aaarrrghh_item">коробка</div>
	            		<div class="new_cool_line_of_filters_aaarrrghh_separator"></div>
	            		<div class="new_cool_line_of_filters_aaarrrghh_item new_cool_line_of_filters_aaarrrghh_item_current">фермерское</div>
	            		<div class="new_cool_line_of_filters_aaarrrghh_item">эко / органик</div>
	            		<div class="new_cool_line_of_filters_aaarrrghh_item">диетическое</div>
	            		<div class="new_cool_line_of_filters_aaarrrghh_item">особо рекомендуем</div>
	            		<div class="new_cool_line_of_filters_aaarrrghh_separator"></div>
	            		<div class="new_cool_line_of_filters_aaarrrghh_item new_cool_line_of_filters_aaarrrghh_item_link">
		            		сохранить
	            			<div class="new_cool_line_of_filters_aaarrrghh_dropdown">	            				
								При сохранение данной комбинации в следующие 
								разы мы будем выстраивать выдачу по принципу
								в первую очередь показать - 
								упакованные товары / диетические
								<div class="new_cool_line_of_filters_aaarrrghh_dropdown_button">
									сохранить
								</div>
	            			</div>
		            	</div>
	            		<div class="vgyhunjimko"></div>
	            	</div>
	                <div class="goods">
	                    <?php foreach($products as $product) { ?>
							<?php $info['product'] = $product; ?>
							<?php $this->load->view('common/load-product',$info);?>					
	                    <?php } ?>
						
						<?php if($empty_products) { ?>
							<?php for($i=0;$i<$empty_products;$i++) { ?>
								<div class="g_good fl_l hide_on_mobile">&nbsp;</div>
							<?php } ?>
						<?php } ?>
						<div id="wrapper_for_product_load"></div>
	                    <div class="clear"></div>
	                </div>
	            <?php } ?>

                <?php if(!$is_parent_category) { ?>
					<?php if($pages_count > 1) { ?>
						<div class="c_paginator">
							<?php if($current_page == 1) { ?>
								<div class="c_show_more_goods" data-category-id="<?php echo $category ?>">показать еще</div>
							<?php } ?>
							<div class="c_pages">
								<?php foreach($pages as $page) { ?>
									<?php if ($page['dots']) { ?>
										<div class="c_page_dots">...</div>
									<?php } else { ?>
										<div class="c_page <?php echo ($page['current_page'] ? 'c_current_page' : '') ?>" data-page="<?php echo $page['page'] ?>"><?php echo $page['page'] ?></div>
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>