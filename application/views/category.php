<?php $this->load->view('common/header',$header);?>
        <?php $this->load->view('common/product-edit-form');?>
        <?php $this->load->view('common/product-info');?>
        <section class="content">
            <div class="category_bg_helper">
                <div class="content_helper">
                    <?php $this->load->view('common/menu-inner', $menu);?>
                </div>
            </div>
            <div class="content_helper">
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
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>