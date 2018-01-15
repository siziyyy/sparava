<?php $this->load->view('common/header',$header);?>
        <section class="content">
            <div class="category_bg_helper <?php echo $is_parent_category == 1 ? "category_bg_helper_in_main":''; ?>">
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
		                    <div class="new_goods_separator_count fl_r">всего товаров: <?php echo $category['products_count'] ?></div>
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