<?php $this->load->view('common/header',$header);?>
<style>
    .mobile_version {
         display: none;
    }
    .back_pls_from_good {
        display: none;
    }
    @media all and (max-width: 800px) {
        footer, .desktop-version {
            display: none;
        }
        .content {
            margin-top: 50px;
        }
        .mobile_version {
            display: block;
            padding: 0 15px;
        }
        .mag_or_blog {
            display: none;
        }
        .mobile_header {
            display: none;
        }
        .back_pls_from_good {
            display: block;
        }
    }
    @media all and (max-width: 1200px) {
        .breadcrumbs::before {
            right: -185px;
        }
        body {
            -webkit-transform: scale(.83);
            -moz-transform: scale(.83);
            -ms-transform: scale(.83);
            -o-transform: scale(.83);
            transform: scale(.83);
        }
    }
    .c_new_menu_line {
        padding-top: 8px;
        position: relative;
        padding-bottom: 37px;
    }
    /*.c_new_menu_line_item_right {
        color: #569c1d;
    }*/
</style>
        <div class="desktop-version">
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
                    .vce_ect {
                        margin: 9px 0 3px 0;
                    }
                    .c_new_menu_line_item  {
                        display: none;
                    } 
                    .vce_ect .c_new_menu_line_item  {
                        display: block;
                    } 
                    .index_c_new_menu {
                        padding: 0;
                    }
                </style>
            </div>
            <div class="content_helper">
                <?php $this->load->view('common/menu'); ?>
            </div>
            <div class="breadcrumbs">
                <section class="content" style="min-height: auto;">
                    <div class="content_helper">
                        <?php foreach($breadcrumbs as $url => $breadcrumb) { ?>
                            <?php if($url != 'self') { ?>
                                <a href="<?php echo $url ?>" class="breadcrumbs_item"><?php echo $breadcrumb ?></a>
                                <span class="breadcrumbs_sep">/</span>
                            <?php } else { ?>
                                <span class="breadcrumbs_item last_breadcrumb"><?php echo $breadcrumb ?></span>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </section>
            </div>
            <div class="good_page" >
                <section class="content single_good_page" style="min-height: auto" data-product-id="<?php echo $product['product_id'] ?>" data-type="<?php echo $product['input_type'] ?>">
                    <div class="content_helper">
                        <div class="good_page_left fl_l">
                            <img src="/images/<?php echo $product['image'] ?>" class="good_page_photo" onError="this.src='/assets/img/nophoto.jpg'">
                            <div class="recommended_av_w_pack">
                                <?php if(!empty($product['recommend'])) { ?>
                                    <div class="recommended_prod"></div>
                                <?php } ?>
                                <?php if(!empty($product['sr_ves'])) { ?>
                                    <div class="average_weight average_weight2">≈ <?php echo $product['sr_ves'] ?></div>
                                <?php } ?>
                            </div>
                            <div class="more_photos">
                                <?php foreach($product['add_images'] as $add_image) { ?>
                                    <a class="more_photo fl_l">
                                        <img src="/images/<?php echo $add_image ?>" class="more_good_page_photo select_add_image" onError="this.src='/assets/img/nophoto.jpg'">
                                    </a>
                                <?php } ?>
                                <div class="clear"></div>
                            </div>
                        </div>

                        <?php if($product['type'] == 'шт') { ?>
                            <?php $box_type = '1 шт' ?>
                            <?php $box_clean_type = 'шт' ?>
                        <?php } elseif($product['bm'] == 1) { ?>
                            <?php $box_type = '1 кг' ?>
                            <?php $box_clean_type = 'кг' ?>
                        <?php } else { ?>
                            <?php $box_type = '100 гр' ?>
                            <?php $box_clean_type = false; ?>
                        <?php } ?>

                        <div class="good_page_right fl_l">
                            <div class="good_modal_right_line">
                                <div class="cgood_modal_price fl_l"> <!-- добавь класс optovaya для оптовой цены -->
                                    <?php if($product['price'] > 0) { ?>
                                        <label>            
                                            <span class="cgood_modal_price_value g_good_price_value_wrapper" data-type="cmo">
                                                <?php if(isset($product['box_kol'])) { ?>
                                                    <input type="radio" class="g_good_price_radio" name="select_price" value="cmo" checked="checked">
                                                <?php } ?>
                                                <span class="g_good_price_value">
                                                    <?php echo $product['price'] ?>
                                                </span>
                                            </span> р. <span class="good_modal_new_price_block_com">х <?php echo $box_type ?></span>                                        
                                        </label>
                                    <?php } ?>
                                    <?php if(isset($product['old_price'])) { ?>
                                        <div class="g_old_good_price g_old_good_price_mod"><?php echo $product['old_price'] ?> р.</div>
                                    <?php } ?>               
                                </div>                  
                                <div class="good_modal_weight fl_l"><?php echo $product['weight'] ?></div>
                                <div class="good_modal_header_actions fl_r">
                                    <div class="good_modal_share fl_r sprite"></div>
                                    <div class="good_modal_fav fl_r <?php echo (isset($product['favourite']) ? 'g_good_mobile_fav_orange' : '') ?> sprite send" data-type="favourite"></div>
                                    <div class="good_modal_id fl_r"><?php echo $product['articul'] ?></div>
                                    <div class="g_admin_info fl_r" style="margin: 9px 20px 0 0">inf</div>
                                    <div class="clear"></div>
                                    <div class="share_it_faster">
                                        <?php echo $this->baselib->get_share_links('/product/'.$product['product_id'], (empty($product['title_full']) ? $product['title'] : $product['title_full']), $product['description'], $product['image']) ?>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if(isset($product['box_kol'])) { ?>


                                <div class="good_modal_right_line">
                                    <?php if($product['price'] > 0) { ?>
                                        <div class="cgood_modal_price_header">Еще дешевле в большой упаковке!</div>
                                    <?php } ?>
                                    <div class="optovaya good_modal_new_price_block cgood_modal_price fl_l">
                                        <label>
                                            <span class="cgood_modal_price_value g_good_price_value_wrapper"  data-type="cko">
                                                <?php if($product['price'] > 0) { ?>
                                                    <input type="radio" class="g_good_price_radio" name="select_price" value="cko">
                                                <?php } ?>
                                                <span class="g_good_price_value">
                                                    <?php echo $product['box_price'] ?>
                                                </span>
                                            </span> р. 
                                            <span class="good_modal_new_price_block_com">х <?php echo $product['box_kol'] ?> <?php echo ($box_clean_type ? $box_clean_type : '') ?> = <?php echo (int)($product['box_price']*$product['box_kol']) ?> руб.</span>
                                        </label>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            <?php } ?>
                            <div class="good_modal_right_line">
                                <div class="good_modal_name fl_l"><?php echo (empty($product['title_full']) ? $product['title'] : $product['title_full']) ?></div>
                                <div class="clear"></div>
                            </div>
                            <div class="good_modal_right_line">
                                <div class="good_modal_subhead">
                                    <?php echo $this->baselib->text_limiter($product['description'],240) ?>
                                    <?php if(mb_strlen($product['description']) > 240) { ?>
                                        <div class="desc_prod_page_dots">...</div>
                                    <?php } ?>
                                </div>
                                <?php if(mb_strlen($product['description']) > 240) { ?>
                                    <div class="good_modal_right_line_new_modal">
                                        <div class="new_login_message_closeawafwwaf">×</div>
                                        <div class="good_modal_right_line_new_modal_header"><?php echo (empty($product['title_full']) ? $product['title'] : $product['title_full']) ?></div>
                                        <div class="good_modal_right_line_new_modal_body"><?php echo $product['description'] ?></div>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php if($product['sr_ves']) { ?>
                                <div class="good_modal_right_line">
                                    <div class="good_modal_av_w">
                                        <span class="good_modal_rl_header">Средний вес: </span><?php echo $product['sr_ves'] ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($product['consist']) { ?>
                                <div class="good_modal_right_line">
                                    <div class="good_modal_wht_ins">
                                        <span class="good_modal_rl_header">Состав: </span><?php echo $product['consist'] ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($product['bbefore']) { ?>
                                <div class="good_modal_right_line">
                                    <div class="good_modal_tme">
                                        <span class="good_modal_rl_header">Срок хранения: </span><?php echo $product['bbefore'] ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($product['kkal'] or $product['belki'] or $product['jiri'] or $product['uglevodi'] or $product['gi']) { ?>
                                <div class="good_modal_right_line">
                                    <div class="good_modal_kkk">
                                        <span class="good_modal_rl_header">Ценность на 100 г: </span>
                                        <?php if($product['kkal']) { ?>Ккал - <?php echo $product['kkal'] ?><?php } ?><?php if($product['belki']) { ?>, Белки - <?php echo $product['belki'] ?><?php } ?><?php if($product['jiri']) { ?>, Жиры - <?php echo $product['jiri'] ?><?php } ?><?php if($product['uglevodi']) { ?>, Углеводы - <?php echo $product['uglevodi'] ?><?php } ?><?php if($product['gi']) { ?>, GI - <?php echo $product['gi'] ?><?php } ?>                                    
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if(!empty($product['manufacturer'])) { ?>
                                <div class="good_modal_right_line">
                                    <div class="good_modal_tme">
                                        <span class="good_modal_rl_header">Производитель: 
                                        <?php if($product['blog']) { ?>
                                            <a href="<?php echo $product['blog'] ?>"><?php echo $product['manufacturer'] ?></a>
                                        <?php } else { ?>
                                            <?php echo $product['manufacturer'] ?>
                                        <?php } ?>
                                        </span>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="good_modal_right_line">
                                <?php if(!empty($product['country'])) { ?>
                                    <div class="good_modal_country fl_l"><?php echo $product['country'] ?></div>
                                <?php } ?>
                                <span class="good_modal_firm good_modal_firm_not_link fl_l"><a href="https://aydaeda.ru/brands?brand=<?php echo urlencode($product['brand']) ?>"><?php echo $product['brand'] ?></a></span>
                                <?php if(!is_null($product['blog_id'])) { ?>
                                    <a href="/blogs/<?php echo $product['blog_id'] ?>" class="good_modal_ink_link">об этом товаре в блоге</a>
                                <?php } ?>
                                <div class="clear"></div>
                            </div>

                            <?php if($product['price']>0 or isset($product['box_kol'])) { ?>
                                <div class="good_modal_right_line actions_holder">
                                    <div class="g_good_count">
                                        <div class="g_good_count_act g_good_count_rem sprite <?php echo ( ($product['type'] == 'шт' or $product['bm'] == 0) ? 'g_good_count_act_disable' : '' ) ?>"></div>
                                        <input type="text" class="g_good_count_input" value="<?php echo $product['default_value'] ?>" data-default-value="<?php echo $product['default_value'] ?>" data-default-price="<?php echo $product['default_price'] ?>">
                                        <div class="g_good_count_act g_good_count_add sprite"></div>
                                    </div>
                                    <div class="g_good_to_cart" data-pack-quantity="<?php echo (isset($product['box_kol']) ? $product['box_kol'] : '') ?>">
                                        <span class="g_good_to_cart_text"><span class="g_good_to_cart_value"><?php echo ($product['price'] <= 0 ? $product['box_kol']*$product['default_price'] : $product['default_price']) ?></span> р.
                                            <span class="g_good_added_to_cart_text2">добавить в корзину</span>  
                                        </span>
                                        <span class="g_good_added_to_cart_text"></span>                                  
                                        <span class="g_good_to_cart_icon sprite"></span>
                                    </div>
                                </div>
                            <?php } ?>
 
                            <?php if(false) { ?>
                                <div class="good_modal_right_line good_modal_video_line">
                                    <?php foreach($product['youtube'] as $video) { ?>
                                        <div class="good_modal_video" data-video-id="<?php echo $video ?>" style="background:url('https://i1.ytimg.com/vi/<?php echo $video ?>/default.jpg')">
                                            <div class="good_modal_video_play">
                                                <img src="/assets/img/yt_play.png" alt="" style="width:100%;">
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="good_page_side fl_r">
                            <div class="good_page_side_first">
                                Гарантия качества и 
                                <br>доставки в срок
                            </div>
                            <div class="good_page_side_sep"></div>
                            <div class="good_page_side_second">
                                <div class="good_page_side_second_helper">Данный товар мы можем
                                <br>доставить</div> 
                                <a href="/information/delivery" class="good_page_side_link">уже завтра</a>
                            </div>
                            <div class="good_page_side_sep"></div>
                            <div class="good_page_side_second">
                                <div class="good_page_side_second_helper">Стоимость логистики</div> 
                                <div class="good_page_side_second_subheader">
                                Все товары представленные на 
                                сайте продаются по ценам крупных 
                                поставщиков и производителей,
                                без наценки.
                                Наша прибыль формируется только 
                                от услуг логистики!</div>
                                <span class="obuvefoieswvgo">Логистический расход 5%</span>
                            </div>
                            <!--<div class="good_page_side_sep"></div>
                            <div class="good_page_side_second">
                                <div class="good_page_side_second_helper">Минимальная сумма заказа</div> 
                                <div class="good_page_side_second_body">1000 р.</div>
                            </div>
                            <div class="good_page_side_sep"></div>
                            <div class="good_page_side_second">
                                <div class="good_page_side_second_helper">Бонус</div> 
                                <div class="good_page_side_second_body">
                                    Эта покупка Вам принесет
                                    <br><span class="g_good_bonus_value"><?php echo $product['bonus'] ?></span> балов (<span class="g_good_bonus_value"><?php echo $product['bonus'] ?></span> руб.)
                                </div>
                            </div>-->
                        </div>
                        <div class="good_page_side_new fl_r">
                            <div class="uifbabuiefbuiwfa">
                                Айдаеда для совместных
                                <br>и корпоративных покупок
                            </div>
                            <div class="uifbabuiefbuiwfaawfwfa">
                                При сумме заказа от 5000 руб., даже
                                при стоимости доставки 1190 руб.,
                                Вы будете экономить в среднем 
                                20% (от суммы покупки в розничном
                                ресурсе). 
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </section>
                <!--<div class="comments_gray"></div>-->


                <div class="comments">
                    <?/*<section class="content" style="min-height: auto;">
                        <div class="content_helper">
                            <div class="comments_header">
                                <a class="comments_header_sec comments_header_active tab_select" data-target="related_products">Рекомендация от Aydaeda</a>
                                <span class="comments_header_sep">|</span>
                                <a class="comments_header_sec tab_select" data-target="desktop_comments">Отзывы к данному товару</a>
                                <?php if(!$account) { ?>
                                    <span class="comments_header_desc">Чтобы добавить отзыв, Вы должны <a href="/" class="comments_header_link login_from_comment">авторизоваться</a> на сайте.</span>
                                <?php } ?>
                            </div>                            
                            <div id="desktop_comments" class="tab_body">
                                <?php echo $comments['desktop'] ?>
                            </div>
                            <div class="recomendations_in_commets tab_body" id="related_products">
                                <div class="goods">
                                    <?php $counter = 0; ?>
                                    <?php if(count($related_products)) { ?>
                                        <?php foreach($related_products as $r_product) { ?>
                                            <?php $info['product'] = $r_product; ?>
                                            <?php $this->load->view('common/load-product',$info);?>
                                            <?php $counter++; ?>
                                        <?php } ?>
                                        <?php if($counter < 5) { ?>
                                            <?php for($i=0;$i<(5-$counter);$i++) { ?>
                                                <div class="g_good fl_l hide_on_mobile">&nbsp;</div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                    <div class="clear"></div>
                                </div>
                            </div>                            
                        </div>
                    </section>*/?>
                </div>
                <?php if(count($related_by_brands_products)) { ?>
                    <?php $counter = 0; ?>
                    <div class="new_good_page_line_2018">
                        <div class="content_helper">
                            <div class="new_good_page_line_2018_header">Другие предложения <?php echo ($related_by_brands_products_type == 'category' ? 'из этой категории' : '') ?><?php echo ($related_by_brands_products_type == 'brand' ? 'от '.$product['brand'] : '') ?></div>
                            <div class="new_good_page_line_2018_body">
                                <div class="recomendations_in_commets">
                                    <div class="new_good_page_line_2018_banner">
                                        <?php if(isset($banner['img'])) { ?>
                                            <a href="<?php echo $banner['href'] ?>">
                                                <img src="<?php echo $banner['img'] ?>">
                                            </a>
                                        <?php } ?> 
                                    </div>

                                    <div class="more_from_brand_slider">
                                        <?php foreach($related_by_brands_products as $r_product) { ?>
                                            <?php if(empty($r_product)) { ?>
                                                <?php continue; ?>
                                            <?php } ?>
                                            <div class="buubbubu">
                                                <a href="<?php echo $r_product['href'] ?>?type=<?php echo ((isset($path) and $path) ? $path : '') ?>" class="opfoopesgflmem"><img src="/images/<?php echo $r_product['image'] ?>" alt="<?php echo $r_product['title'] ?>" class="g_good_photo" onError="this.src='/assets/img/nophoto.jpg'"></a>

                                                <?php if(isset($r_product['old_price'])) { ?>
                                                    <div class="g_old_good_price"><?php echo $r_product['old_price'] ?> р.</div>
                                                <?php } ?>
                                                <div class="g_good_price"><?php echo $r_product['price'] ?> р.</div>
                                                <a href="<?php echo $r_product['href'] ?>?type=<?php echo ((isset($path) and $path) ? $path : '') ?>" class="g_good_name" tabindex="0"><?php echo $r_product['title'] ?></a>
                                            </div>
                                            <?php $counter++; ?>
                                        <?php } ?>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if(count($related_products)) { ?>
                    <?php $counter = 0; ?>
                    <div class="new_good_page_line_20182">
                        <div class="content_helper">
                            <div class="new_good_page_line_2018_header">Рекомендации от Aydaeda</div>
                            <div class="new_good_page_line_2018_body">
                                <div class="recomendations_in_commets tab_body" id="related_products">
                                    <div class="bububuuubub_cover">
                                        <?php foreach($related_products as $r_product) { ?>
                                            <div class="buubbubu">
                                                <a href="<?php echo $r_product['href'] ?>?type=<?php echo ((isset($path) and $path) ? $path : '') ?>" class="opfoopesgflmem"><img src="/images/<?php echo $r_product['image'] ?>" alt="<?php echo $r_product['title'] ?>" class="g_good_photo" onError="this.src='/assets/img/nophoto.jpg'"></a>

                                                <div class="recommended_av_w_pack">
                                                    <?php if(!empty($r_product['recommend'])) { ?>
                                                        <div class="recommended_prod"></div>
                                                    <?php } ?>
                                                </div>

                                                <?php if(isset($r_product['old_price'])) { ?>
                                                    <div class="g_old_good_price"><?php echo $r_product['old_price'] ?> р.</div>
                                                <?php } ?>
                                                <div class="g_good_price"><?php echo $r_product['price'] ?> р.</div>
                                                <a href="<?php echo $r_product['href'] ?>?type=<?php echo ((isset($path) and $path) ? $path : '') ?>" class="g_good_name" tabindex="0"><?php echo $r_product['title'] ?></a>
                                            </div>
                                            <?php $counter++; ?>
                                        <?php } ?>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="new_good_page_line_20183">
                    <div class="content_helper">
                        <div class="new_good_page_line_2018_header">
                            Отзывы к данному товару
                            <?php if(!$account) { ?>
                                <span class="comments_header_desc">Чтобы добавить отзыв, Вы должны <a href="/" class="comments_header_link login_from_comment">авторизоваться</a> на сайте.</span>
                            <?php } ?>
                        </div>
                        <div class="new_good_page_line_2018_body">
                            <div id="desktop_comments">
                                <?php echo $comments['desktop'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('common/footer',$footer);?>