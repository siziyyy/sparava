<?php $this->load->view('common/header',$header);?>
        <div class="content_helper">
            <?php $this->load->view('common/menu', $menu);?>
        </div>
		<section class="banner">
            <style>
            .c_new_menu_line {
                padding-top: 8px;
            }
            @media all and (max-width: 425px) {
                .content {
                    background: #ffffff; /* Old browsers */
                    background: -moz-linear-gradient(top, #ffffff 0%, #f0f0f0 100%); /* FF3.6-15 */
                    background: -webkit-linear-gradient(top, #ffffff 0%,#f0f0f0 100%); /* Chrome10-25,Safari5.1-6 */
                    background: linear-gradient(to bottom, #ffffff 0%,#f0f0f0 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f0f0f0',GradientType=0 ); /* IE6-9 */
                }
            }
            </style>
			<div class="b_slider">
                <div class="b_slide" style="background:url('/assets/img/slider/1.jpg')">
                        <div class="content_helper">
                            <div class="b_text">
                                Доставка отборных продуктов  
                                <br>из <span class="green_text">Фуд Сити</span> по супер ценам!
                            </div>
                            <div class="b_undertext">
                                Экономьте до 40% от рыночной цены, кушайте 
                                <br>самые свежие продукты каждый день
                            </div>
                        </div>
                </div>  
                <div class="b_slide" style="background:url('/assets/img/slider/2.jpg')">
                        <a href="/category/104">
                    <div class="content_helper">
                            <div class="slider_2 fl_r">
                                <div class="slider_2_header">
                                    Впустите свежесть
                                    <br>в Ваш дом!
                                </div>
                                <div class="slider_2_body">
                                    Помните, как пахнет свежая мята?
                                    <br>Доставим в течении 2 часов
                                    <div class="slider_2_accent slider_sprite"></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                    </div>
                        </a>
                </div>
                <div class="b_slide" style="background:url('/assets/img/slider/3.jpg')">
                        <a href="/category/3">
                    <div class="content_helper">
                            <div class="banner_3">более 500 видов рыбы</div>
                    </div>
                        </a>
                </div>   
                <div class="b_slide" style="background:url('/assets/img/slider/4.jpg')">
                        <a href="/category/1">
                    <div class="content_helper">
                            <div class="banner_4 fl_r">
                                <div class="banner_4_header">
                                    Огромный выбор
                                    <br>парного мяса
                                    <div class="banner_4_accent slider_sprite"></div>
                                </div>
                                <div class="banner_4_body">
                                    Говядина, телятина, свинина, 
                                    <br>баранина (Дагестан) 
                                </div>
                            </div>
                            <div class="clear"></div>
                    </div>
                        </a>
                </div>   
                <div class="b_slide" style="background:url('/assets/img/slider/5.jpg')">
                        <a href="/category/25">
                    <div class="content_helper">
                            <div class="banner_5 fl_l">
                                <div class="banner_5_header">
                                    Более 150 видов кофе из 
                                    <br>Бразилии, Италии и Африки
                                </div>
                                <div class="banner_5_body">
                                    пейте качественный кофе, окунитесь 
                                    <br>в мир <span class="banner_5_body_acc">тонких ароматов</span> 
                                    <div class="banner_5_accent slider_sprite"></div>
                                    <div class="banner_5_accent_2">arabica &amp; robusta</div>
                                </div>
                            </div>
                            <div class="clear"></div>
                    </div>
                        </a>
                </div>   
                <div class="b_slide" style="background:url('/assets/img/slider/6.jpg')">
                        <a href="/country/2">
                    <div class="content_helper">
                            <div class="slider_6 fl_r">
                                <div class="slider_6_header">
                                    Много эксклюзивных продуктов
                                    <br>из разных стран мира
                                </div>
                                <div class="slider_6_body">
                                    Италия, Испания, Греция и еще более 30 стран
                                    <div class="slider_6_accent slider_sprite"></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                    </div>
                        </a>
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
        </section>
		<section class="content">
			<div class="content_helper">
                <div class="mobile_mosaic">
                    <a href="/category/1" style="background: url('/assets/img/cats/mob2/1.jpg')" class="mob_mos_it mob_mos_it_big">
                        <span class="mob_mos_it_text">мясо</span>
                    </a>
                    <a href="/category/3" style="padding-bottom: calc(87% + 2px); background: url('/assets/img/cats/mob2/2.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text bl_txt_mob">рыба</span>
                    </a>
                    <a class="mob_mos_it mob_mos_deliv">
                        <div class="mob_deliv_spr sprite"></div>
                        <div class="mob_deliv_head">доставка</div>
                        <div class="mob_deliv_body">
                            <div class="mob_deliv_body1 fl_l">
                                <div class="mob_deliv_body_header">24 часа</div>
                                <div class="mob_deliv_body_b">149</div>
                            </div>
                            <div class="mob_deliv_body3 fl_l">
                                <div class="mob_deliv_body_header">&nbsp;</div>
                                <div class="mob_deliv_body_b">/</div>
                            </div>
                            <div class="mob_deliv_body2 fl_l">
                                <div class="mob_deliv_body_header">2 часа</div>
                                <div class="mob_deliv_body_b">399</div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="mob_deliv_spr2 sprite"></div>
                    </a>
                    <a href="/category/2" style="background: url('/assets/img/cats/mob2/3.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text bl_txt_mob">птица</span>
                    </a>
                    <a href="/category/100" style="background: url('/assets/img/cats/mob2/4.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">фрукты</span>
                    </a>
                    <a href="/category/103" style="background: url('/assets/img/cats/mob2/5.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">овощи</span>
                    </a>
                    <a href="/category/101" style="background: url('/assets/img/cats/mob2/6.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text bl_txt_mob">ягоды</span>
                    </a>
                    <a href="/category/104" style="background: url('/assets/img/cats/mob2/7.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text bl_txt_mob">зелень</span>
                    </a>
                    <a href="/category/92" style="background: url('/assets/img/cats/mob2/8.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">молочка</span>
                    </a>
                    <a href="/category/226" style="background: url('/assets/img/cats/mob2/9.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">сыры</span>
                    </a>
                    <a href="/category/10" style="background: url('/assets/img/cats/mob2/10.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">консервация</span>
                    </a>
                    <a href="/category/5" style="background: url('/assets/img/cats/mob2/11.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">деликатесы</span>
                    </a>
                    <a href="/category/9" style="background: url('/assets/img/cats/mob2/12.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">бакалея</span>
                    </a>
                    <a href="/category/18" style="background: url('/assets/img/cats/mob2/13.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">масло</span>
                    </a>
                    <a href="/category/46" style="background: url('/assets/img/cats/mob2/14.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">соленая рыба</span>
                    </a>
                    <a href="/category/18" style="background: url('/assets/img/cats/mob2/15.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">фермерское</span>
                    </a>
                    <a href="/category/51" style="background: url('/assets/img/cats/mob2/16.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">раки живые</span>
                    </a>
                    <a href="/category/12" style="background: url('/assets/img/cats/mob2/17.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">соусы</span>
                    </a>
                    <a href="/category/70" style="background: url('/assets/img/cats/mob2/18.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">крупы</span>
                    </a>
                    <a href="/category/8" style="background: url('/assets/img/cats/mob2/19.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">заморозка</span>
                    </a>
                    <a href="/category/11" style="background: url('/assets/img/cats/mob2/20.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">соления</span>
                    </a>
                    <a href="/category/56" style="background: url('/assets/img/cats/mob2/21.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">икра</span>
                    </a>
                    <a href="/category/23" style="background: url('/assets/img/cats/mob2/22.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">мед</span>
                    </a>
                    <a href="/category/20" style="background: url('/assets/img/cats/mob2/23.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">хлебцы</span>
                    </a>
                    <a href="/category/107" style="background: url('/assets/img/cats/mob2/24.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">орехи</span>
                    </a>
                    <a href="/category/108" style="background: url('/assets/img/cats/mob2/25.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">сухофрукты</span>
                    </a>
                    <a href="/category/24" style="background: url('/assets/img/cats/mob2/26.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">чай</span>
                    </a>
                    <a href="/category/25" style="background: url('/assets/img/cats/mob2/27.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">кофе</span>
                    </a>
                    <a href="/category/26" style="background: url('/assets/img/cats/mob2/28.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">напитки</span>
                    </a>
                    <a href="/category/27" style="background: url('/assets/img/cats/mob2/29.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">соки</span>
                    </a>
                    <a href="/category/21" style="background: url('/assets/img/cats/mob2/30.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">сладости</span>
                    </a>
                    <a href="/category/22" style="background: url('/assets/img/cats/mob2/31.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">пирожные</span>
                    </a>
                    <a href="/category/18" style="background: url('/assets/img/cats/mob2/32.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">эко</span>
                    </a>
                    <a href="/category/18" style="background: url('/assets/img/cats/mob2/33.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">фермерское</span>
                    </a>
                    <a href="/country/2" style="background: url('/assets/img/cats/mob2/34.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">из Италии</span>
                    </a>
                    <a href="/country/4" style="background: url('/assets/img/cats/mob2/35.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">из Греции</span>
                    </a>
                    <a href="/country/6" style="background: url('/assets/img/cats/mob2/36.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">из Армении</span>
                    </a>
                    <a href="/category/19" style="background: url('/assets/img/cats/mob2/37.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">хлеб</span>
                    </a>
                    <div class="clear"></div>
                </div>
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
                    <a class="c_mosaic_link" href="/category/18">
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
                    <a class="c_mosaic_link" href="/category/46">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/14.jpg')">
                            <span class="c_mosaic_item_text">соленая рыба</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/59">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/15.jpg')">
                            <span class="c_mosaic_item_text">колбасы</span>
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
                    <a class="c_mosaic_link" href="/category/70">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/19.jpg')">
                            <span class="c_mosaic_item_text">крупы</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/8">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/20.jpg')">
                            <span class="c_mosaic_item_text">заморозка</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/11">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/21.jpg')">
                            <span class="c_mosaic_item_text">соления</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/56">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/22.jpg')">
                            <span class="c_mosaic_item_text">икра</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/128">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/23.jpg')">
                            <span class="c_mosaic_item_text">хлебцы</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/107">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/24.jpg')">
                            <span class="c_mosaic_item_text">орехи</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/108">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/25.jpg')">
                            <span class="c_mosaic_item_text">сухофрукты</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/17">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/26.jpg')">
                            <span class="c_mosaic_item_text">приправы</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/24">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/27.jpg')">
                            <span class="c_mosaic_item_text">чай</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/25">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/28.jpg')">
                            <span class="c_mosaic_item_text">кофе</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/26">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/29.jpg')">
                            <span class="c_mosaic_item_text">напитки</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/27">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/30.jpg')">
                            <span class="c_mosaic_item_text">соки</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/122">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/31.jpg')">
                            <span class="c_mosaic_item_text">хлеб</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/21">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/32.jpg')">
                            <span class="c_mosaic_item_text">сладости</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/22">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/33.jpg')">
                            <span class="c_mosaic_item_text">пирожные</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/country/2">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/34.jpg')">
                            <span class="c_mosaic_item_text">из Италии</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/country/4">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/35.jpg')">
                            <span class="c_mosaic_item_text">из Греции</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/country/6">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/36.jpg')">
                            <span class="c_mosaic_item_text">из Армении</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/22">
                        <div class="c_mosaic_item" style="background:url('/assets/img/cats/37.jpg')">
                            <span class="c_mosaic_item_text">эко</span>
                        </div>
                    </a>
                    <a class="c_mosaic_link" href="/category/22">
                        <div class="c_mosaic_item c_mosaic_item_width_for_desktop" style="background:url('/assets/img/cats/38.jpg')">
                            <span class="c_mosaic_item_text">фермерское</span>
                        </div>
                    </a>
                </div>
			</div>
		</section>
<?php $this->load->view('common/footer',$footer);?>