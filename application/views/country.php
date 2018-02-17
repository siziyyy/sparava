<?php $this->load->view('common/header',$header);?>
        <section class="content">
            
                <div class="category_bg_helper category_bg_helper_country category_bg_helper_country2">
                    <div class="content_helper">
                        <div class="c_new_menu">
                            <div class="c_new_menu_line c_new_menu_line_country filters_holder">
                                <div class="c_new_menu_line_item fl_l">
                                    <!--
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2">продукты по акции</a>
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2 c_new_menu_link_country2_act">большая упаковка</a>
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2">особо рекомендуем</a>
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2">фермерские</a>
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2">диетические</a>
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2">эко</a>
                                    -->
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2 c_new_menu_link_country2_act"><?php echo $country ?></a>
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2">испания</a>
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2">греция</a>
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2">турция</a>
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2">беларусь</a>
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2">армения</a>
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2">азербайджан</a>
                                    <a href="/category/" class="c_new_menu_link c_new_menu_link_country2">узбекистан</a>
                                </div>
                                <?php if(!$is_first_page) { ?>  
                                    <div class="cool_select_pack cool_select_country_pack fl_l">
                                        <div class="cool_select cool_select_country <?php echo (isset($filters_text['category']) ? 'cool_select_disabled' : '') ?>">
        									<span><?php echo (isset($filters_text['category']) ? $filters_text['category'] : 'категория') ?></span>
        									<span class="cool_select_arrow sprite"></span>
        								</div>
        								<div class="cool_select_options">
        									<div class="scrollbar-inner scroll_helper">
        										<?php foreach($categories as $category) { ?>
        											<div class="cool_select_option">
        												<label>
        													<input type="checkbox" class="cool_select_check" value="<?php echo $category['title'] ?>" data-name="category" <?php echo (in_array($category['title'],explode(';',$menu['filters']['category'])) ? 'checked' : '' ) ?>>
        													<?php echo $category['title'] ?>
        												</label>
        											</div>
        										<?php } ?>
        									</div>
        									<div class="cool_select_button">применить</div>
        								</div>
                                    </div>
                                <?php } ?>
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
                            <?php if($is_first_page) { ?>
                                <div class="columns_in_country_menu">
                                    <div class="column_in_country_menu">
                                        <a class="column_in_country_menu_link" href="/">Деликатесы</a>
                                        <a class="column_in_country_menu_link column_in_country_menu_link_act" href="/">Бакалея</a>
                                        <a class="column_in_country_menu_link" href="/">Консервация</a>
                                    </div>
                                    <div class="column_in_country_menu">
                                        <a class="column_in_country_menu_link" href="/">Соусы</a>
                                        <a class="column_in_country_menu_link" href="/">Молочные продукты</a>
                                        <a class="column_in_country_menu_link" href="/">Растительные масла</a>
                                    </div>
                                    <div class="column_in_country_menu">
                                        <a class="column_in_country_menu_link" href="/">Молочные продукты</a>
                                        <a class="column_in_country_menu_link" href="/">Растительные масла</a>
                                        <a class="column_in_country_menu_link" href="/">Кофе, какао, горячий шоколад</a>
                                    </div>
                                    <div class="column_in_country_menu">
                                        <a class="column_in_country_menu_link" href="/">Вода и напитки</a>
                                        <a class="column_in_country_menu_link" href="/">Конфеты и шоколад</a>
                                        <a class="column_in_country_menu_link" href="/">Колбасы, сосиски, сардельки</a>
                                    </div>
                                    <div class="column_in_country_menu">
                                        <a class="column_in_country_menu_link" href="/">Оливки и маслины</a>
                                        <a class="column_in_country_menu_link" href="/">Варенье и джемы</a>
                                        <a class="column_in_country_menu_link" href="/">Печенье, вафли, пряники</a>
                                    </div>
                                </div>
                            <? } ?>
                            <?php $this->load->view('common/menu-categories');?>
                        </div>
                    </div>
                </div>
                <div class="banners_120218 trinity_120218">
                    <div class="content_helper">
                        <a href="/"><div class="banner_120218 banner_wide_120218 fl_l banner_120218_5">
                            <div class="banner_text_120218">
                                <div class="banner_text_120218_5_1">Швейцария</div>
                                <div class="banner_text_120218_5_2">PARMEZAN</div>
                                <div class="banner_text_120218_5_3">только у нас по этой цене!</div>
                                <div class="banner_text_120218_5_4">59 <span class="rouble">o</span></div>
                            </div>
                            <img src="/assets/img/banners_cat/5.jpg" alt="">
                        </div></a>
                        <a href="/"><div class="banner_120218 banner_small_120218 fl_l center_banner_120218 banner_120218_6">
                            <div class="banner_text_120218">
                                <div class="banner_text_120218_6_1">237ml</div>
                                <div class="banner_text_120218_6_2">COZI SIR</div>
                                <div class="banner_text_120218_6_3">только у нас по этой цене!</div>
                                <div class="banner_text_120218_6_4">17 видов</div>
                            </div>
                            <img src="/assets/img/banners_cat/6.jpg" alt="">
                        </div></a>
                        <a href="/"><div class="banner_120218 banner_small_120218 fl_l">
                            <div class="banner_text_120218 banner_120218_7">
                                <div class="banner_text_120218_7_1">Кто сказал,<br>что плесень плохо?</div>
                                <div class="banner_text_120218_7_2">Более 45 видов<br>Кушайте на здоровье!</div>
                            </div>
                            <img src="/assets/img/banners_cat/7.jpg" alt="">
                        </div></a>
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
    									<div class="c_page <?php echo ($page['current_page'] ? 'c_current_page' : '') ?>" data-page="<?php echo $page['page'] ?>"><?php echo $page['page'] ?></div>
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