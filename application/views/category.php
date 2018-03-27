<?php $this->load->view('common/header',$header);?>
        <section class="content">
        	<style>
			    .c_new_menu_line_item_right {
			        color: #569c1d;
			    }
        	</style>
        	<!-- избранное и мои заказы -->
        	<?php /* ?>
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
        	<?php */ ?>
        	<!--<div class="new_banner_cat">
        		<div class="content_helper">
        			<div class="new_banner_cat_first_line">Вы первый раз у нас?</div>
        			<div class="new_banner_cat_second_line">Узнавайте о нас больше, покупаете качественные продукты по супер-ценам!</div>
        			<div class="new_banner_cat_third_line">
        				При первом заказе <span>подарок</span> - дегустационная коробка (много вкусняшек!)
        			</div>
        		</div>
        	</div> -->
        	<div class="vce_ect">
                <div class="content_helper">
	                <div class="c_new_menu_line_item c_new_menu_line_itemffafawfaw rtyguhnjioklp c_new_menu_line_item_right fl_l">
                        <span class="c_new_menu_more_icon"></span>
                        <span class="c_new_menu_more">все категории</span>
                    </div>
                    <div class="c_new_menu_line_item rtyguhnjioklp inubyvt fl_l">
                        <a href="/catalog" class="c_new_menu_link fullcatlink c_new_menu_l fl_l">Полный каталог</a>
                        <div class="search_new_3_2018_pack search_new_3_2018_pack22222 fl_l">
		                    <form method="get" action="/search">
		                        <input type="text" class="search_new_3_2018_input" value="<?php echo (isset($value) ? $value : ''); ?>" name="value" placeholder="поиск по артикулу, названию, категории, бренду, стране, производителю, типу итд.">
		                        <button type="submit" class="search_new_3_2018_button">поиск</button>
		                    </form>
			            </div>
			            <div class="clear"></div>
					</div>      
                	<div class="clear"></div>  
                </div>         
                <style>
	                .c_new_index_menu_dropdown {
					    top: -27px !important;
					}
				</style>
            </div>
            <div class="category_bg_helper <?php echo ($is_parent_category ? 'category_bg_helper_in_main' : '' ); ?>">
                <div class="content_helper">
                    <?php $this->load->view('common/menu-inner', $menu);?>
	                <?php if($is_parent_category and isset($category_data) and count($category_data['tags'])) { ?>
						<div class="line_for_common_menu_inner">
                            <style>
                                .category_bg_helper_in_main {
                                    height: 142px !important;
                                }
                            </style>
							<a class="line_for_common_menu_inner_link line_for_common_menu_inner_link_blue">Популярное!</a>
							<?php foreach($category_data['tags'] as $tag => $href) { ?>
								<a href="<?php echo $href ?>" class="line_for_common_menu_inner_link"><?php echo $tag ?></a>
							<?php } ?>
						</div>
	                <? } ?>
	            </div>
            </div>
            <?php if(isset($filters_used) and !$filters_used) { ?>
	            <div class="banners_120218 trinity_120218">
	                <div class="content_helper">
	                    <?php $counter = 0; ?>
	                    <?php $style = ''; ?>
	                    <?php $style_used = false; ?>

	                    <?php foreach ($banners as $banner) { ?>
	                        <?php
	                            if(!$style_used) {
	                                if($counter==1 and $banner['type']==1) {
	                                    $style = 'margin:0 18px';
	                                    $style_used = true;
	                                } elseif($counter==1 and $banner['type']==2) {
	                                    $style = 'margin-left:18px';
	                                    $style_used = true;
	                                } elseif($counter==0 and $banner['type']==2) {
	                                    $style = 'margin-right:18px';
	                                    $style_used = true;
	                                }

	                                
	                            } else {
	                                $style = '';
	                            }
	                        ?>
	                        <a href="<?php echo $banner['href'] ?>">
	                        	<div class="banner_120218 fl_l banner_120218_5" style="<?php echo $style ?>">
	                            	<img src="<?php echo $banner['img'] ?>" alt="">
	                        	</div>
	                    	</a>
	                        <?php $counter++; ?>
	                    <?php } ?>
		            	<div class="clear"></div>
		            </div>
	            </div>
            <?php } ?>

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
		                    <a href="/category/<?php echo $category['info']['category_id'] ?>"><div class="new_goods_separator_look_all fl_r">посмотреть все</div></a>
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
<style>
    .banners_120218 {
        margin: 40px 0 -20px 0;
    }
</style>
	            	<?php if(($sort_attr['razves'] and $sort_attr['pack']) or $sort_attr['bbox'] or $sort_attr['farm'] or $sort_attr['eko'] or $sort_attr['diet'] or $sort_attr['recommend']) { ?>
                        <div class="new_chto-to-tam">Фрукты | Яблоко | Армения</div>
		            	<div class="new_cool_line_of_filters_aaarrrghh" data-category="<?php echo $category ?>">
		            		<div class="new_cool_line_of_filters_aaarrrghh_item new_cool_line_of_filters_aaarrrghh_item_first send <?php echo (!$sort_order ? 'new_cool_line_of_filters_aaarrrghh_item_current' : '') ?>" data-type="sort" data-sort="clear">все</div>
		            		
		            		<?php if(($sort_attr['razves'] and $sort_attr['pack']) or $sort_attr['bbox']) { ?>
		            			<div class="new_cool_line_of_filters_aaarrrghh_separator"></div>
			            		<?php if($sort_attr['razves'] and $sort_attr['pack']) { ?>
			            			<div class="new_cool_line_of_filters_aaarrrghh_item send <?php echo (isset($sort_order['razves']) ? 'new_cool_line_of_filters_aaarrrghh_item_current' : '') ?>" data-type="sort" data-sort="razves">на развес</div>
			            		<?php } ?>
			            		<?php if($sort_attr['pack'] and $sort_attr['razves']) { ?>
			            			<div class="new_cool_line_of_filters_aaarrrghh_item send <?php echo (isset($sort_order['pack']) ? 'new_cool_line_of_filters_aaarrrghh_item_current' : '') ?>" data-type="sort" data-sort="pack">упаковка</div>
			            		<?php } ?>
			            		<?php if($sort_attr['bbox']) { ?>
			            			<div class="new_cool_line_of_filters_aaarrrghh_item send <?php echo (isset($sort_order['bbox']) ? 'new_cool_line_of_filters_aaarrrghh_item_current' : '') ?>" data-type="sort" data-sort="bbox"><span class="harder_better_faster_stronger">еще дешевле! - </span>большая упаковка</div>
			            		<?php } ?>
		            		<?php } ?>

		            		<?php if($sort_attr['farm'] or $sort_attr['eko'] or $sort_attr['diet'] or $sort_attr['recommend']) { ?>
			            		<div class="new_cool_line_of_filters_aaarrrghh_separator"></div>
			            		<?php if($sort_attr['farm']) { ?>
			            			<div class="new_cool_line_of_filters_aaarrrghh_item send <?php echo (isset($sort_order['farm']) ? 'new_cool_line_of_filters_aaarrrghh_item_current' : '') ?>" data-type="sort" data-sort="farm">фермерское</div>
			            		<?php } ?>
			            		<?php if($sort_attr['eko']) { ?>
			            			<div class="new_cool_line_of_filters_aaarrrghh_item send <?php echo (isset($sort_order['eko']) ? 'new_cool_line_of_filters_aaarrrghh_item_current' : '') ?>" data-type="sort" data-sort="eko">эко / органик</div>
			            		<?php } ?>
			            		<?php if($sort_attr['diet']) { ?>
			            			<div class="new_cool_line_of_filters_aaarrrghh_item send <?php echo (isset($sort_order['diet']) ? 'new_cool_line_of_filters_aaarrrghh_item_current' : '') ?>" data-type="sort" data-sort="diet">диетическое</div>
			            		<?php } ?>
			            		<?php if($sort_attr['recommend']) { ?>
			            			<div class="new_cool_line_of_filters_aaarrrghh_item send <?php echo (isset($sort_order['recommend']) ? 'new_cool_line_of_filters_aaarrrghh_item_current' : '') ?>" data-type="sort" data-sort="recommend">особо рекомендуем</div>
			            		<?php } ?>
		            		<?php } ?>
		            		<div class="vgyhunjimko"></div>
		            	</div>
		            <?php } ?>
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