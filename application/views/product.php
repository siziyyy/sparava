<?php $this->load->view('common/header',$header);?>
<style>
    .mobile_version {
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
        }
    }
</style>
        <div class="desktop-version">
            <div class="breadcrumbs">
                <section class="content">
                    <div class="content_helper">
                        <a href="/" class="breadcrumbs_item">Главная</a>
                        <span class="breadcrumbs_sep">/</span>
                        <a href="/category/<?php echo $product['parent_category_id'] ?>" class="breadcrumbs_item"><?php echo $product['parent_category_title'] ?></a>
                        <span class="breadcrumbs_sep">/</span>
                        <a href="/category/<?php echo $product['category_id'] ?>" class="breadcrumbs_item"><?php echo $product['category_title'] ?></a>
                        <span class="breadcrumbs_sep">/</span>                    
                        <span class="breadcrumbs_item"><?php echo $product['title'] ?></span>
                    </div>
                </section>
            </div>
            <div class="good_page single_good_page" data-product-id="<?php echo $product['product_id'] ?>" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>">
                <section class="content">
                    <div class="content_helper">
                        <div class="good_page_left fl_l">
                            <img src="/images/<?php echo $product['image'] ?>" class="good_page_photo">
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
                                            echo 'Фермер';
                                        } elseif($product['eko'] == 1) {
                                            echo 'Эко';
                                        } elseif($product['diet'] == 1) {
                                            echo 'Диетический';
                                        }
                                    ?>
                                </div>
                                <div class="good_modal_header_actions fl_r">
                                    <div class="good_modal_share fl_r sprite"></div>
                                    <div class="good_modal_fav fl_r <?php echo (isset($product['favourite']) ? 'g_good_mobile_fav_orange' : '') ?> sprite send" data-type="favourite"></div>
                                    <div class="good_modal_id fl_r"><?php echo $product['articul'] ?></div>
                                    <div class="clear"></div>
                                    <div class="share_it_faster">
                                        <?php echo $this->baselib->get_share_links('/product/'.$product['product_id'], $product['title'], $product['description'], $product['image']) ?>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="good_modal_right_line">
                                <div class="good_modal_name fl_l"><?php echo $product['title'] ?></div>
                                <div class="clear"></div>
                            </div>
                            <div class="good_modal_right_line">
                                <div class="good_modal_subhead">
                                    <?php echo $product['description'] ?>
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
                                        <span class="good_modal_rl_header">Ценность на 100г: </span>
                                        <?php if($product['kkal']) { ?>Ккал - <?php echo $product['kkal'] ?><?php } ?><?php if($product['belki']) { ?>, Белки - <?php echo $product['belki'] ?><?php } ?><?php if($product['jiri']) { ?>, Углеводы - <?php echo $product['jiri'] ?><?php } ?><?php if($product['uglevodi']) { ?>, Жиры - <?php echo $product['uglevodi'] ?><?php } ?><?php if($product['gi']) { ?>, GI - <?php echo $product['gi'] ?><?php } ?>                                    
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="good_modal_right_line">
                                <?php if($product['country']) { ?>
                                    <div class="good_modal_country fl_l"><?php echo $product['country'] ?></div>
                                <?php } ?>
                                <?php if($product['blog']) { ?>
                                    <a href="<?php echo $product['blog'] ?>" class="good_modal_firm fl_l"><?php echo $product['brand'] ?></a>
                                <?php } else { ?>
                                    <span class="good_modal_firm good_modal_firm_not_link fl_l"><?php echo $product['brand'] ?></span>
                                <?php } ?>
                                <div class="clear"></div>
                            </div>
                            <div class="good_modal_right_line actions_holder">
                                <div class="g_good_count">
                                    <div class="g_good_count_act g_good_count_rem sprite <?php echo ( ($product['type'] == 'шт' or $product['bm'] == 0) ? 'g_good_count_act_disable' : '' ) ?>"></div>
                                    <input type="text" class="g_good_count_input" value="<?php echo ($product['type'] == 'шт' ? 1 : ($product['bm'] == 1 ? 1 : '0.1')) ?> <?php echo $product['type'] ?>">
                                    <div class="g_good_count_act g_good_count_add sprite"></div>
                                </div>
                                <div class="g_good_to_cart">
                                    <span class="g_good_to_cart_text"><span class="g_good_to_cart_value"><?php echo $product['price'] ?></span> р.</span>
                                    <span class="g_good_added_to_cart_text"></span>                                 
                                    <span class="g_good_to_cart_icon sprite"></span>
                                </div>
                            </div>
                            <div class="good_modal_right_line good_modal_video_line">
                                <?php foreach($product['youtube'] as $video) { ?>
                                    <div class="good_modal_video" data-video-id="<?php echo $video ?>" style="background:url('https://i1.ytimg.com/vi/<?php echo $video ?>/default.jpg')">
                                        <div class="good_modal_video_play sprite"></div>
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
                                    <br><span class="g_good_to_cart_value"><?php echo $product['price'] ?></span> балов (<span class="g_good_to_cart_value"><?php echo $product['price'] ?></span> руб.)
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </section>
                <div class="comments_gray"></div>
                <div class="comments">
                    <section class="content">
                        <div class="content_helper" id="desktop_comments">
                            <?php echo $comments['desktop'] ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div class="mobile_version">   
            <?php $show_minus = false; ?>
            <div class="g_good fl_l" data-product-id="<?php echo $product['product_id'] ?>" data-type="<?php echo ($product['type'] == 'шт' ? 0 : ($product['bm'] == 1 ? 1 : 2)) ?>">
                <div class="back_pls_from_good">
                    <span class="sprite back_pls_from_good_img"></span>
                    <span class="back_pls_from_good_text">назад</span>
                </div>
                <div class="g_good_photo_block">
                    <img src="/images/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="g_good_photo">
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
                    <div class="g_admin_info">inf</div>
                    <div class="g_good_name <?php echo ($product['status'] == 0 ? 'inactive_good' : '') ?>"><?php echo $product['title'] ?></div>
                    <a href="/product/<?php echo $product['product_id'] ?>" class="g_good_name <?php echo ($product['status'] == 0 ? 'inactive_good' : '') ?>"><?php echo $product['title'] ?></a>
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
                        <span class="g_good_to_cart_text"><span class="g_good_to_cart_value"><?php echo $product['price'] ?></span> р.</span>
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
                                <span class="more_info_line_header">Ценность на 100г:</span> <?php if($product['kkal']) { ?>Ккал - <?php echo $product['kkal'] ?><?php } ?><?php if($product['belki']) { ?>, Белки - <?php echo $product['belki'] ?><?php } ?><?php if($product['jiri']) { ?>, Углеводы - <?php echo $product['jiri'] ?><?php } ?><?php if($product['uglevodi']) { ?>, Жиры - <?php echo $product['uglevodi'] ?><?php } ?><?php if($product['gi']) { ?>, GI - <?php echo $product['gi'] ?><?php } ?>   
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