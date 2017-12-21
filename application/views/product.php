<?php $this->load->view('common/header',$header);?>
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
                                <?php if(isset($product['old_price'])) { ?>
                                    <div class="g_old_good_price"><?php echo $product['old_price'] ?> р.</div>
                                <?php } ?>                                
                                <span class="cgood_modal_price_value g_good_price_value"><?php echo $product['price'] ?></span> р.
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
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://aydaeda.ru/product/<?php echo $product['product_id'] ?>" class="share_it_soc">
                                        <div class="share_it_soc_img fb_share"></div>
                                    </a>
                                     <a target="_blank" href="https://twitter.com/share?url=https://aydaeda.ru/product/<?php echo $product['product_id'] ?>&text=<?php echo $product['title'] ?>" class="share_it_soc">
                                        <div class="share_it_soc_img tw_share"></div>
                                    </a>
                                    <a target="_blank" href="http://vk.com/share.php?url=https://aydaeda.ru/product/<?php echo $product['product_id'] ?>&title=<?php echo $product['title'] ?>&image=/images/<?php echo $product['image'] ?>&noparse=true" class="share_it_soc">
                                        <div class="share_it_soc_img vk_share"></div>
                                    </a>         
                                    
                           
                                    <a target="_blank" href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl=https://aydaeda.ru/product/<?php echo $product['product_id'] ?>&st.comments=<?php echo $product['title'] ?>" class="share_it_soc">
                                        <div class="share_it_soc_img ok_share"></div>
                                    </a>
                                    <div class="share_it_faster_close">&times;</div>
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
                                <span class="good_modal_firm fl_l"><?php echo $product['brand'] ?></span>
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
                    <div class="content_helper">
                        <div class="comments_header">
                            Отзывы и комментарий к данному товару
                            <span class="comments_header_desc">Чтобы добавить отзыв, Вы должны <a href="/" class="comments_header_link">авторизоваться</a> на сайте.</span>
                        </div>
                        <div class="no_comments">К данному товару не добавлено комментарии  </div>
                        <div class="add_comment">
                            <div class="comment_photo fl_l" style="background: #009933;">Н</div>
                            <textarea class="add_new_comm fl_l"></textarea>
                            <button class="add_new_comm_butt fl_l">добавить отзыв</button>
                            <div class="clear"></div>
                        </div>
                        <div class="comment">
                            <div class="comment_photo fl_l" style="background: #F78C76;">Т</div>
                            <div class="comment_desc fl_l">
                                <div class="comment_name">Тимур Анреев</div>
                                <div class="comment_text">
                                    Времён все части каперсника использовали как пряную приправу и лекарство. Отвар цветов каперсника использовался для заживления ран, укрепления сердца
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="comment">
                            <div class="comment_photo fl_l" style="background: #4994D1;">Т</div>
                            <div class="comment_desc fl_l">
                                <div class="comment_name">Тимур Анреев</div>
                                <div class="comment_text">
                                    Времён все части каперсника использовали как пряную приправу и лекарство. Отвар цветов каперсника использовался для заживления ран, укрепления сердца
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
<?php $this->load->view('common/footer',$footer);?>