<?php $this->load->view('common/header');?>
        <section class="content">
            <? /*<style>
                .category_bg_helper {
                    height: 85px !important;
                }
            </style>
            <div class="category_bg_helper">
                <div class="content_helper">
                    <div class="search_header">
                        <span class="search_header_text">Поиск по артикулу</span>
                        <span class="search_header_number"><?php echo $articul ?></span>
                    </div>
                </div>
            </div>
            <style>
                @media all and (max-width: 1200px) {
                    .mobile_search {
                        display: block !important;
                        height: 30px !important;
                    }
                    .m_h_search {
                        opacity: 0;
                    }
                    .mobile_search_header_number {
                        display: block;
                    }
                    .category_bg_helper {
                        display: none;
                    }
                    .homm {
                        display: none;
                    }
                    .goods {
                        margin-top: 138px !important;
                    }
                }
            </style>
            <div class="mobile_search_header_number"><?php echo $articul ?></div>
            <div class="content_helper">
                <div class="goods">
					<?php $info['product'] = $product; ?>
					<?php $this->load->view('common/load-product',$info);?>
                    <div class="search_banner homm fl_r">
                        <img src="/assets/img/commons/search_banner.jpg" alt="">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="search_separator homm"></div>
            <div class="content_helper homm">
                <div class="twin_header">Похожие товары</div>
                <div class="goods">
                   <?php foreach($products as $product) { ?>						
						<?php $info['product'] = $product; ?>
						<?php $this->load->view('common/load-product',$info);?>								
                    <?php } ?>
                    <div class="clear"></div>
                </div>
            </div> */ ?>
            <div class="content_helper">
                <?php $this->load->view('common/menu', $menu);?>
            </div>
            <div class="content_helper">
                <?php if(count($products) == 0) { ?>
                    ничего не найдено
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

                <?php if($pages_count > 1) { ?>
                    <div class="c_paginator">
                        <div class="c_pages">
                            <?php foreach($pages as $page) { ?>
                                <?php if ($page['dots']) { ?>
                                    <div class="c_page_dots">...</div>
                                <?php } else { ?>
									<?php if(isset($page['back_button'])) { ?>
										<div class="c_page" data-page="<?php echo $page['page'] ?>"><</div>
									<?php } else { ?>
										<div class="c_page <?php echo ($page['current_page'] ? 'c_current_page' : '') ?>" data-page="<?php echo $page['page'] ?>"><?php echo $page['page'] ?></div>
									<?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
<?php $this->load->view('common/footer');?>