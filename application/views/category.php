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
		                        <input type="text" class="search_new_3_2018_input" value="<?php echo (isset($value) ? $value : ''); ?>" name="value" placeholder="более 15 000 товаров в 145 категориях">
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
                    .orange_text {
                        color: #808080 !important;
                    }
				</style>
            </div>
            <div class="category_bg_helper <?php echo ($is_parent_category ? 'category_bg_helper_in_main' : '' ); ?>">
                <div class="content_helper">
                    <?php $this->load->view('common/menu-inner');?>
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
		                    <a href="<?php echo '/'.$parent_category_seo_url.'/'.$category['info']['seo_url'] ?>" class="new_goods_separator_link fl_l"><?php echo $category['info']['title'] ?></a>
		                    <div class="new_goods_separator_count fl_l">всего товаров: <?php echo $category['products_count'] ?></div>
		                    <a href="<?php echo '/'.$parent_category_seo_url.'/'.$category['info']['seo_url'] ?>"><div class="new_goods_separator_look_all fl_r">посмотреть все</div></a>
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
					<?php foreach($products as $view_type => $products_group) { ?>
		                <div class="new_goods_separator_brand">
		                	<div class="new_goods_separator_brand_text fl_l">
		                		<?php echo $view_type ?> 
		                		<span class="new_goods_separator_brand_text_small">
		                			<?php 
		                				if($category_view_type == '1' and $view_type != 'Остальные товары') {
		                					echo current($products_group)['country'];
		                				} else {
		                					echo '&nbsp;';
		                				}
		                			?>
		                		</span>
		                	</div>
		                	<?php if($category_view_type == '1' and $view_type != 'Остальные товары') { ?>
		                		<a href="https://aydaeda.ru/brands?brand=<?php echo urlencode($view_type) ?>" class="new_goods_separator_brand_link fl_r">все предложения от данного бренда</a>
		                	<?php } ?>
		                	<div class="clear"></div>
		                </div>
		                <div class="goods">
		                	<?php
			                	foreach($products_group as $product) {
		                    		if(!empty($product)) {
		                    			$info['product'] = $product;
										$this->load->view('common/load-product',$info);
		                    		} else {
		                    			echo '<div class="g_good fl_l hide_on_mobile">&nbsp;</div>';
		                    		}
		                    	}
			                ?>
							<div id="wrapper_for_product_load"></div>
		                    <div class="clear"></div>
		                </div>
		            <?php } ?>
	            <?php } ?>

				<?php if(!$is_parent_category) { ?>
					<?php if($this->_seo_data['seo_article']) { ?>
	                	<div class="textbanner052018">
                			<?php echo $this->_seo_data['seo_article'] ?>
                		</div>
                	<?php } ?>
           		<?php } ?>
                <style>
                    .textbanner052018 {
                        background-color: #F7F7F7;
                        font-size: 14px;
                        width: 100%;
                        -webkit-box-sizing: border-box;
                           -moz-box-sizing: border-box;
                                box-sizing: border-box;
                        padding: 32px 45px;
                        line-height: 1.2;
                    }
                </style>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>