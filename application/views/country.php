<?php $this->load->view('common/header',$header);?>
        <section class="content">
            
                <div class="category_bg_helper category_bg_helper_country category_bg_helper_country2">
                    <div class="content_helper">
                        <div class="c_new_menu">
                            <div class="c_new_menu_line c_new_menu_line_country filters_holder">
                                <div class="c_new_menu_line_item fl_l">
                                    <a href="/country/2" class="c_new_menu_link c_new_menu_link_country2 <?php echo ($country_id == 2 ? 'c_new_menu_link_country2_act' : '') ?>">Италия</a>
                                    <a href="/country/3" class="c_new_menu_link c_new_menu_link_country2 <?php echo ($country_id == 3 ? 'c_new_menu_link_country2_act' : '') ?>">испания</a>
                                    <a href="/country/4" class="c_new_menu_link c_new_menu_link_country2 <?php echo ($country_id == 4 ? 'c_new_menu_link_country2_act' : '') ?>">греция</a>
                                    <a href="/country/11" class="c_new_menu_link c_new_menu_link_country2 <?php echo ($country_id == 11 ? 'c_new_menu_link_country2_act' : '') ?>">турция</a>
                                    <a href="/country/10" class="c_new_menu_link c_new_menu_link_country2 <?php echo ($country_id == 10 ? 'c_new_menu_link_country2_act' : '') ?>">беларусь</a>
                                    <a href="/country/6" class="c_new_menu_link c_new_menu_link_country2 <?php echo ($country_id == 6 ? 'c_new_menu_link_country2_act' : '') ?>">армения</a>
                                    <a href="/country/8" class="c_new_menu_link c_new_menu_link_country2 <?php echo ($country_id == 8 ? 'c_new_menu_link_country2_act' : '') ?>">азербайджан</a>
                                    <a href="/country/7" class="c_new_menu_link c_new_menu_link_country2 <?php echo ($country_id == 7 ? 'c_new_menu_link_country2_act' : '') ?>">узбекистан</a>
                                </div>
                                <div class="c_new_menu_line_item c_new_menu_line_item_right fl_r">
                                    <span class="c_new_menu_more">другие продукты</span>
                                    <span class="c_new_menu_more_icon oefgpopfegespgo"></span>
                                </div>                          
                                <div class="clear"></div>
                            </div>
                            <style>
                                .banners_120218 {
                                    margin: 35px 0 50px 0 !important;
                                }
                            </style>
                            <div class="columns_in_country_menu">
                                <?php foreach($parent_categories_list as $col) { ?>
                                    <div class="column_in_country_menu">
                                        <?php foreach($col as $c_category) { ?>
                                            <a class="column_in_country_menu_link <?php echo ($c_category['title'] == $current_category ? 'column_in_country_menu_link_act' : '') ?>" href="?category=<?php echo $c_category['title'] ?>"><?php echo $c_category['title'] ?></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php $this->load->view('common/menu-categories');?>
                        </div>
                    </div>
                </div>
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
            

            <?php if(!$is_first_page) { ?>            
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
                                <div class="c_show_more_goods" data-country-id="<?php echo $country_id ?>">показать еще</div>
                            <?php } ?>
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
            <?php } else { ?>            
                <div class="content_helper">
                    <?php foreach($products as $category) { ?>
                        <div class="new_goods_separator">
                            <a href="?category=<?php echo $category['info']['title'] ?>" class="new_goods_separator_link fl_l"><?php echo $category['info']['title'] ?></a>
                            <div class="new_goods_separator_count fl_l">всего товаров: <?php echo $category['products_count'] ?></div>
                            <a href="?category=<?php echo $category['info']['title'] ?>"><div class="new_goods_separator_look_all fl_r">посмотреть все</div></a>
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
                </div>
            <?php } ?>
        </section>
<?php $this->load->view('common/footer',$footer);?>