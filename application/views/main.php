<?php $this->load->view('common/header',$header);?>
		<section class="banner">
            <style>
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
        </section>
		<section class="content">
			<div class="content_helper">
                <?php $this->load->view('common/menu', $menu);?>
                <div class="mobile_mosaic">
                    <a href="/category/1" style="background: url('/assets/img/cats/mob/1.jpg')" class="mob_mos_it mob_mos_it_big">
                        <span class="mob_mos_it_text">мясо</span>
                    </a>
                    <a href="/category/3" style="background: url('/assets/img/cats/mob/2.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text bl_txt_mob">рыба</span>
                    </a>
                    <a href="/category/2" style="background: url('/assets/img/cats/mob/3.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text bl_txt_mob">птица</span>
                    </a>
                    <a href="/category/14" style="background: url('/assets/img/cats/mob/4.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">фрукты</span>
                    </a>
                    <a href="/category/103" style="background: url('/assets/img/cats/mob/5.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">овощи</span>
                    </a>
                    <a href="/category/104" style="background: url('/assets/img/cats/mob/6.jpg')" class="mob_mos_it mob_mos_it_wide">
                        <span class="mob_mos_it_text bl_txt_mob">зелень</span>
                    </a>
                    <a href="/category/95" style="background: url('/assets/img/cats/mob/7.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">сыр</span>
                    </a>
                    <a href="" style="background: url('/assets/img/cats/mob/8.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">яйцо !!!!!!</span>
                    </a>
                    <a href="/category/92" style="background: url('/assets/img/cats/mob/9.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">молочка</span>
                    </a>
                    <a href="/category/96" style="background: url('/assets/img/cats/mob/10.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">масло</span>
                    </a>
                    <a href="/category/69" style="background: url('/assets/img/cats/mob/11.jpg')" class="mob_mos_it mob_mos_it_wide">
                        <span class="mob_mos_it_text">макароны</span>
                    </a>
                    <a href="/category/107" style="background: url('/assets/img/cats/mob/12.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">орехи</span>
                    </a>
                    <a href="/category/17" style="background: url('/assets/img/cats/mob/13.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">специи</span>
                    </a>
                    <a href="/category/24" style="background: url('/assets/img/cats/mob/14.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">чай</span>
                    </a>
                    <a href="/category/25" style="background: url('/assets/img/cats/mob/15.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">кофе</span>
                    </a>
                    <a href="/category/70" style="background: url('/assets/img/cats/mob/16.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text bl_txt_mob">крупы</span>
                    </a>
                    <a href="/category/10" style="background: url('/assets/img/cats/mob/17.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">консервация</span>
                    </a>
                    <a href="/category/5" style="background: url('/assets/img/cats/mob/18.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">деликатесы</span>
                    </a>
                    <a href="/category/26" style="background: url('/assets/img/cats/mob/19.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text bl_txt_mob">напитки</span>
                    </a>
                    <a href="" style="background: url('/assets/img/cats/mob/20.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">эко !!!</span>
                    </a>
                    <a href="" style="background: url('/assets/img/cats/mob/21.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">фермерское !!!!</span>
                    </a>
                    <a href="/category/21" style="background: url('/assets/img/cats/mob/22.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text bl_txt_mob">сладости</span>
                    </a>
                    <a href="/category/23" style="background: url('/assets/img/cats/mob/23.jpg')" class="mob_mos_it">
                        <span class="mob_mos_it_text">мед</span>
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