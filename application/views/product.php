<div class="back_pls_from_good">
    <span class="sprite back_pls_from_good_img"></span>
    <a href="<?php echo $this->baselib->_return_url ?>" class="back_pls_from_good_text">назад</a>
</div>
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
                <?php $this->load->view('common/menu', $menu); ?>
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
                <section class="content single_good_page" style="min-height: auto" data-product-id="<?php echo $product['product_id'] ?>" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>">
                    <div class="content_helper">
                        <div class="good_page_left fl_l">
                            <img src="/images/<?php echo $product['image'] ?>" class="good_page_photo" onError="this.src='/assets/img/nophoto.jpg'">
                        </div>
                        <div class="good_page_right fl_l">
                            <div class="good_modal_right_line">
                                <div class="cgood_modal_price fl_l">                 
                                    <span class="cgood_modal_price_value g_good_price_value"><?php echo $product['price'] ?></span> р.
                                    <?php if(isset($product['old_price'])) { ?>
                                    <div class="g_old_good_price g_old_good_price_mod"><?php echo $product['old_price'] ?> р.</div>
                                    <?php } ?>               
                                </div>                  
                                <div class="good_modal_weight fl_l"><?php echo $product['weight'] ?></div>
                                <div class="good_modal_off fl_l">
                                    <?php 
                                        if($product['farm'] == 1) {
                                            echo 'Фермер.';
                                        } elseif($product['eko'] == 1) {
                                            echo 'Эко';
                                        } elseif($product['diet'] == 1) {
                                            echo 'Диетическое';
                                        }
                                    ?>
                                </div>
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
                            
                            <div class="good_modal_right_line">
                                <div class="good_modal_name fl_l"><?php echo (empty($product['title_full']) ? $product['title'] : $product['title_full']) ?></div>
                                <div class="clear"></div>
                            </div>
                            <div class="good_modal_right_line">
                                <div class="good_modal_subhead">
                                    <?php echo $product['description'] ?>
                                    <div class="desc_prod_page_dots">...</div>
                                </div>
                                <div class="good_modal_right_line_new_modal">
                                    <div class="new_login_message_closeawafwwaf">×</div>
                                    <div class="good_modal_right_line_new_modal_header">Печень кролика</div>
                                    <div class="good_modal_right_line_new_modal_body">                                     
Эта мышца из шеи мясного бычка придется вам по душе.
Обладает ярким и насыщенным вкусом классической 
мраморной говядины. Отлично подходит для жарки на мангале. 
Рекомендуется средняя прожарка.
<br><br>
Это стейк из тонкого края. Отруб располагается в поясничной части 
туши бычка. Отличается он своей продолговатой формой, более 
плотными волокнами, чем у рибая и аппетитной жировой 
прослойкой с одного края.
                                    </div>
                                </div>
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
                                <span class="good_modal_firm good_modal_firm_not_link fl_l"><?php echo $product['brand'] ?></span>
                                <?php if(!is_null($product['blog_id'])) { ?>
                                    <a href="/blogs/<?php echo $product['blog_id'] ?>" class="good_modal_ink_link">об этом товаре в блоге</a>
                                <?php } ?>
                                <div class="clear"></div>
                            </div>
                            <div class="good_modal_right_line actions_holder">
                                <div class="g_good_count">
                                    <div class="g_good_count_act g_good_count_rem sprite <?php echo ( ($product['type'] == 'шт' or $product['bm'] == 0) ? 'g_good_count_act_disable' : '' ) ?>"></div>
                                    <input type="text" class="g_good_count_input" value="<?php echo $product['default_value'] ?>">
                                    <div class="g_good_count_act g_good_count_add sprite"></div>
                                </div>
                                <div class="g_good_to_cart">
                                    <span class="g_good_to_cart_text"><span class="g_good_to_cart_value"><?php echo $product['default_price'] ?></span> р.
                                        <span class="g_good_added_to_cart_text2">добавить в корзину</span>  
                                    </span>
                                    <span class="g_good_added_to_cart_text"></span>                                  
                                    <span class="g_good_to_cart_icon sprite"></span>
                                </div>
                            </div>
                            <div class="good_modal_right_line good_modal_video_line">
                                <?php foreach($product['youtube'] as $video) { ?>
                                    <div class="good_modal_video" data-video-id="<?php echo $video ?>" style="background:url('https://i1.ytimg.com/vi/<?php echo $video ?>/default.jpg')">
                                        <div class="good_modal_video_play">
                                            <img src="/assets/img/yt_play.png" alt="" style="width:100%;">
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="good_page_side fl_r">
                            <div class="good_page_side_first">
                                Гарантия качества и 
                                <br>стерильной доставки
                            </div>
                            <div class="good_page_side_sep"></div>
                            <div class="good_page_side_second">
                                <div class="good_page_side_second_helper">Гарантия до 15 дней</div> 
                                <a href="/information/return" class="good_page_side_link">на обмен и возврат</a>
                            </div>
                            <div class="good_page_side_sep"></div>
                            <div class="good_page_side_second">
                                <div class="good_page_side_second_helper">Стоимость доставки</div> 
                                <div class="good_page_side_second_subheader">Москва</div>
                                <div class="good_page_side_second_body">Завтра - 199 р, сегодня - 399 р.</div>
                                <div class="good_page_side_second_subheader">Московская область</div>
                                <div class="good_page_side_second_body">Завтра - 350 р, сегодня - 399 р.</div>
                            </div>
                            <div class="good_page_side_sep"></div>
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
                            <div class="new_good_page_line_2018_header">Другие предложения <?php echo ($related_by_brands_products_type == 'category' ? 'из этой категории' : 'от '.$product['brand']) ?></div>
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
                                            <div class="buubbubu">
                                                <a href="<?php echo $r_product['href'] ?>?type=<?php echo ((isset($path) and $path) ? $path : '') ?>" class="opfoopesgflmem"><img src="/images/<?php echo $r_product['image'] ?>" alt="<?php echo $r_product['title'] ?>" class="g_good_photo" onError="this.src='/assets/img/nophoto.jpg'"></a>

                                                <?php if(isset($r_product['old_price'])) { ?>
                                                    <div class="g_old_good_price"><?php echo $r_product['old_price'] ?> р.</div>
                                                <?php } ?>
                                                <div class="g_good_price"><span class="g_good_price_value"><?php echo $r_product['price'] ?></span> р.</div>
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
                                                <div class="g_good_price"><span class="g_good_price_value"><?php echo $r_product['price'] ?></span> р.</div>
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

        <div class="mobile_version">   
            <?php $show_minus = false; ?>
            <div class="g_good fl_l" data-product-id="<?php echo $product['product_id'] ?>" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>">
                <div class="g_good_photo_block">
                    <img src="/images/<?php echo $product['image'] ?>" alt="<?php echo (empty($product['title_full']) ? $product['title'] : $product['title_full']) ?>" class="g_good_photo">
                </div>
                <div class="new_good_helper_mobile">
                    <?php if(isset($product['old_price'])) { ?>
                        <div class="g_old_good_price"><?php echo $product['old_price'] ?> р.</div>
                    <?php } ?>
                    <div class="g_good_price"><span class="g_good_price_value"><?php echo $product['price'] ?></span> р.</div>
                    <div class="g_old_good_price_date">
                        <?php echo ($product['type'] == 'шт' ? (!is_null($product['weight']) ? ' - '.$product['weight'] : '') : ($product['bm'] == 1 ? ' за 1 кг' : ' за 100 гр')) ?>
                    </div>
                    <div class="g_good_mobile_fav <?php echo (isset($product['favourite']) ? 'g_good_mobile_fav_orange' : '') ?> sprite send" data-type="favourite"></div>
                    <div class="g_good_name <?php echo ($product['status'] == 0 ? 'inactive_good' : '') ?>"><?php echo (empty($product['title_full']) ? $product['title'] : $product['title_full']) ?></div>
                    <a href="/product/<?php echo $product['product_id'] ?>" class="g_good_name <?php echo ($product['status'] == 0 ? 'inactive_good' : '') ?>"><?php echo (empty($product['title_full']) ? $product['title'] : $product['title_full']) ?></a>
                    <div class="g_good_description">
                        <?php echo $product['description'] ?>
                    </div>
                    <div class="g_good_country">
                        <span class="g_good_country_margin">
                            <?php if($product['brand']) { ?>
                                <?php echo $product['brand'] ?>
                                <?php $show_minus = true; ?>
                            <?php } ?>
                            <?php if($show_minus and $product['country']) { ?>
                                 - 
                            <?php } ?>
                            <?php if($product['country']) { ?>
                                <?php echo $product['country'] ?>
                            <?php } ?>
                        </span>
                        <span class="g_good_id"><?php echo $product['articul'] ?></span>
                    </div>
                </div>
                <div class="g_good_actions actions_holder">
                    <div class="g_good_count">
                        <div class="g_good_count_act g_good_count_rem sprite <?php echo ( ($product['type'] == 'шт' or $product['bm'] == 0) ? 'g_good_count_act_disable' : '' ) ?>"></div>
                        <input type="text" class="g_good_count_input" value="<?php echo ($product['type'] == 'шт' ? 1 : ($product['bm'] == 1 ? 1 : '0.1')) ?> <?php echo $product['type'] ?>">
                        <div class="g_good_count_act g_good_count_add sprite"></div>
                    </div>
                    <div class="g_good_to_cart">
                        <span class="g_good_to_cart_text"><span class="g_good_to_cart_value"><?php echo $product['default_price'] ?></span> р.</span>
                        <span class="g_good_added_to_cart_text"></span>                                 
                        <span class="g_good_to_cart_icon sprite"></span>
                    </div>
                </div>
                <div class="more_info_pack">
                    <div class="show_more_info tab_select" data-target="more_info">еще информация</div>
                    <div class="show_reviews bordered_more_info tab_select" data-target="mobile_comments">отзывы</div>
                    <div class="more_info tab_body" id="more_info">
                        <?php if($product['sr_ves']) { ?>                    
                        <div class="more_info_line">
                            <span class="more_info_line_header">Средний вес:</span> <?php echo $product['sr_ves'] ?>
                        </div>
                        <?php } ?>
                        <?php if($product['consist']) { ?>
                            <div class="more_info_line">
                                <span class="more_info_line_header">Состав:</span> <?php echo $product['consist'] ?>
                            </div>
                        <?php } ?>
                        <?php if($product['bbefore']) { ?>
                            <div class="more_info_line">
                                <span class="more_info_line_header">Срок хранении:</span> <?php echo $product['bbefore'] ?>
                            </div>
                        <?php } ?>

                        <?php if($product['kkal'] or $product['belki'] or $product['jiri'] or $product['uglevodi'] or $product['gi']) { ?>
                            <div class="more_info_line">
                                <span class="more_info_line_header">Ценность на 100 г:</span> <?php if($product['kkal']) { ?>Ккал - <?php echo $product['kkal'] ?><?php } ?><?php if($product['belki']) { ?>, Белки - <?php echo $product['belki'] ?><?php } ?><?php if($product['jiri']) { ?>, Углеводы - <?php echo $product['jiri'] ?><?php } ?><?php if($product['uglevodi']) { ?>, Жиры - <?php echo $product['uglevodi'] ?><?php } ?><?php if($product['gi']) { ?>, GI - <?php echo $product['gi'] ?><?php } ?>   
                            </div>
                        <?php } ?>
                    </div>
                    <div class="reviews tab_body" id="mobile_comments">
                        <?php echo $comments['mobile'] ?>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('common/footer',$footer);?>