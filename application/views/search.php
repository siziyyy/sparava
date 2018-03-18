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

            <?php if($show_categories) { ?>
                <div class="search_block_new_results">
                    <div class="content_helper">
                        <div class="search_block_new_results_header">Найдено в следующих категориях </div>
                        <div class="search_block_new_results_body">
                            <?php foreach($categories as $col) { ?>
                                <div class="column_in_country_menu">
                                    <?php foreach($col as $c_category) { ?>
                                        <a class="column_in_country_menu_link" href="/category/<?php echo $c_category['category_id'] ?>"><?php echo $c_category['title'] ?></a>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="content_helper">
                <?php if(count($products) == 0) { ?>
                    ничего не найдено
                <?php } ?>
                <div class="goods">
                    <?php foreach($products as $product) { ?>                       
                        <?php $info['product'] = $product; ?>
                        <?php $this->load->view('common/load-product',$info);?>                             
                    <?php } ?>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
<?php $this->load->view('common/footer');?>