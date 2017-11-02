<?php $this->load->view('common/header',$header);?>
		<section class="banner">
			<div class="b_slider">
                <div class="b_slide" style="background:url('/assets/img/slider/1.jpg')">
                    <div class="content_helper">
                        <div class="b_text">
                            Доставка отборных продуктов  
                            <br>с <span class="green_text">Фуд Сити</span> по супер ценам!
                        </div>
                        <div class="b_undertext">
                            Экономьте до 40% от рыночной цены, кушайте 
                            <br>наисвежайшие продукты каждый день
                        </div>
                    </div>
                </div>  
                <div class="b_slide" style="background:url('/assets/img/slider/2.jpg')">
                    <div class="content_helper">
                        <div class="second_banner_header">Линия орехов по супер ценам</div>
                        <div class="second_banner_body">
                            <a class="second_banner_body_link">грецкие орехи</a>
                            <a class="second_banner_body_link">фундюк</a>
                            <a class="second_banner_body_link">миндаль</a>
                            <a class="second_banner_body_link">фисташки</a>
                            <a class="second_banner_body_link">пекан</a>
                        </div>
                        <div class="second_banner_footer">
                            <a href="/category/107" class="second_banner_footer_button">перейти</a>
                        </div>
                    </div>
                </div>             
            </div>
		</section>
        <section class="mobile_banner">
            <div class="mobile_banner_text">
                <div class="mobile_banner_text_header">
                    Доставка отборных продуктов  
                    <br>с <span style="color: #397f00;">Фуд Сити</span> по супер ценам!
                </div>
                <div class="mobile_banner_text_subheader">
                    Экономьте до 40% от рыночной цены, 
                    <br>кушайте наисвежайшие продукты 
                    <br>каждый день
                </div>
            </div>
            <div class="mobile_banner_icons">
                <div class="mobile_banner_icons_icon fl_l">
                    <div class="mobile_banner_icons_icon_img sprite"></div>
                    <div class="mobile_banner_icons_icon_text">
                        только
                        <br><span class="m_b_b_i_t_bold">наисвежайшее</span>
                    </div>
                </div>
                <div class="mobile_banner_icons_icon fl_l">
                    <div class="mobile_banner_icons_icon_img sprite"></div>
                    <div class="mobile_banner_icons_icon_text">
                        только
                        <br><span class="m_b_b_i_t_bold">качественное</span>
                    </div>
                </div>
                <div class="mobile_banner_icons_icon fl_l">
                    <div class="mobile_banner_icons_icon_img sprite"></div>
                    <div class="mobile_banner_icons_icon_text">
                        только
                        <br><span class="m_b_b_i_t_bold">по суперценам</span>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <a href="/" class="mobile_banner_banner">
                <img src="/assets/img/slider/mobile.jpg" alt="" class="fl_l">
                <div class="mobile_banner_banner_text fl_l">
                    <div class="mobile_banner_banner_text_header">Семеринка</div>
                    <div class="mobile_banner_banner_text_body">60 <span class="rouble">o</span></div>
                    <div class="mobile_banner_banner_text_footer">на рынке 100 <span class="rouble">o</span></div>
                </div>
                <div class="clear"></div>
            </a>
        </section>
		<section class="content">
			<div class="content_helper">
                <?php $this->load->view('common/menu', $menu);?>
                <div class="c_mosaic">    
                    <div class="c_mosaic_grid_sizer"></div>   
                    <div class="c_mosaic_gutter_sizer"></div>            
                    <a class="c_mosaic_link" href="/category/1">
                        <div class="c_mosaic_item c_mosaic_item_width c_mosaic_item_height" style="background:url('/assets/img/cats/1.jpg')">
                            <span class="c_mosaic_item_text">мясо</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/3">
                        <div class="c_mosaic_item c_mosaic_item_height" style="background:url('/assets/img/cats/2.jpg')">
                            <span class="c_mosaic_item_text">рыба</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/information">
                        <div class="c_mosaic_item c_mosaic_delivery">
                            <div class="c_mosaic_delivery_icon sprite"></div>
                            <div class="c_mosaic_delivery_header">доставка</div>
                            <div class="c_mosaic_delivery_body">
                                <div class="c_mosaic_delivery_body_left">
                                    <div class="c_mosaic_delivery_body_left_top">24 часа</div>
                                    <div class="c_mosaic_delivery_body_left_bottom">149</div>
                                </div>
                                <div class="c_mosaic_delivery_body_center">&nbsp;/&nbsp;</div>
                                <div class="c_mosaic_delivery_body_right">
                                    <div class="c_mosaic_delivery_body_right_top">2 часа</div>
                                    <div class="c_mosaic_delivery_body_right_bottom">399</div>
                                </div>
                            </div>
                            <div class="c_mosaic_delivery_subbody">
                                <div class="c_mosaic_delivery_subbody_circle fl_l"></div>
                                <div class="c_mosaic_delivery_subbody_circle fl_l"></div>
                                <div class="c_mosaic_delivery_subbody_circle fl_l"></div>
                                <div class="clear"></div>
                                <div class="c_mosaic_delivery_subbody_border"></div>
                            </div>
                            <div class="c_mosaic_delivery_footer sprite"></div>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/14">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/3.jpg')">
                            <span class="c_mosaic_item_text">фрукты</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/2">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/4.jpg')">
                            <span class="c_mosaic_item_text">птица</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/103">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/5.jpg')">
                            <span class="c_mosaic_item_text">овощи</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/13">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/6.jpg')">
                            <span class="c_mosaic_item_text">молочка</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/95">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/7.jpg')">
                            <span class="c_mosaic_item_text">сыр</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/101">
                        <div class="c_mosaic_item c_mosaic_item_width_for_mobile_long" style="background:url('/assets/img/cats/8.jpg')">
                            <span class="c_mosaic_item_text">ягоды</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/104">
                        <div class="c_mosaic_item c_mosaic_item_width c_mosaic_item_width_for_mobile" style="background:url('/assets/img/cats/9.jpg')">
                            <span class="c_mosaic_item_text">зелень</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/96">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/10.jpg')">
                            <span class="c_mosaic_item_text">масло</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/10">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/11.jpg')">
                            <span class="c_mosaic_item_text">консервация</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/9">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/12.jpg')">
                            <span class="c_mosaic_item_text">бакалея</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/5">
                        <div class="c_mosaic_item c_mosaic_item_width" style="background:url('/assets/img/cats/13.jpg')">
                            <span class="c_mosaic_item_text">деликатесы</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/14.jpg')">
                            <span class="c_mosaic_item_text">эко!!!!!!!!</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/15.jpg')">
                            <span class="c_mosaic_item_text">фермерские!!!!!</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/51">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/16.jpg')">
                            <span class="c_mosaic_item_text">раки живые</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/12">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/17.jpg')">
                            <span class="c_mosaic_item_text">соусы</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/23">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/18.jpg')">
                            <span class="c_mosaic_item_text">мед</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/107">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/19.jpg')">
                            <span class="c_mosaic_item_text">орехи</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/17">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/20.jpg')">
                            <span class="c_mosaic_item_text">приправы</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/24">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/21.jpg')">
                            <span class="c_mosaic_item_text">чай</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/25">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/22.jpg')">
                            <span class="c_mosaic_item_text">кофе</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/70">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/23.jpg')">
                            <span class="c_mosaic_item_text">крупы</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/26">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/24.jpg')">
                            <span class="c_mosaic_item_text">напитки</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/164">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/25.jpg')">
                            <span class="c_mosaic_item_text">соки</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/122">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/26.jpg')">
                            <span class="c_mosaic_item_text">хлеб</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/21">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/27.jpg')">
                            <span class="c_mosaic_item_text">сладости</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/22">
                        <div class="c_mosaic_item c_mosaic_item_width_for_desktop" style="background:url('/assets/img/cats/28.jpg')">
                            <span class="c_mosaic_item_text">пирожные</span>
                        </div>
                    </a>
                </div>
			</div>
		</section>
<?php $this->load->view('common/footer',$footer);?>