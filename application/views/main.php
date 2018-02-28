<?php $this->load->view('common/header',$header);?>
    <style>   
        .c_new_menu_l {
            margin-right: 25px !important;
        }
    </style>
    <div class="content_helper">
        <?php $this->load->view('common/menu', $menu);?>
    </div>
	<div class="content_helper">
        <section class="banner2018 b_slider">
            <div class="b_slide b_slide1" style="background:url('/assets/img/slider/1.jpg')">
                <div class="content_helper content_helper_22">
                    <div class="b_text">
                        Доставка отборных продуктов  
                        <br>из <span class="green_text">Фуд Сити</span> по супер ценам!
                    </div>
                    <div class="b_undertext">
                        Экономьте до 40% от рыночной цены, ешьте 
                        <br>самые свежие продукты каждый день
                    </div>
                </div>
            </div>  
            <a href="/category/104">
                <div class="b_slide cvuyibnjok" style="background:url('/assets/img/slider/2.jpg')">
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
                </div>
            </a>
            <a href="/category/3">
                <div class="b_slide cvuyibnjok" style="background:url('/assets/img/slider/3.jpg')">
                        <div class="content_helper">
                            <!--<div class="banner_3">более 500 видов рыбы</div>-->
                        </div>
                </div>
            </a>
        </section>
        <section class="slogan2018">
            <div class="slogan2018_1">
                Если все пишут, что у них все качественно, дешево и быстро,
                <br>тогда цена этих слов равняется нулю!
            </div>
            <div class="slogan2018_2">
                И только по действиям можно судить о сервисе
            </div>
        </section>
        <section class="myasnoy_ryad">
            <a href="/" class="mew_1_link"><div class="myasnoy_ryad_first new_1_1 fl_l">
                <div class="myasnoy_ryad_first_text">
                    <div class="myasnoy_ryad_first_text_1">МЯСНОЙ РЯД</div>
                    <div class="myasnoy_ryad_first_text_2">парное мясо, супер качество</div>
                </div>
            </div></a>
            <div class="myasnoy_ryad_line fl_l">
                <a href="/" class="mew_1_link"><div class="myasnoy_ryad_line_item new_1_2 fl_l">
                    <div class="myasnoy_ryad_item_text_vert">Говядина</div>
                </div></a>
                <a href="/" class="mew_1_link"><div class="myasnoy_ryad_line_item new_1_3 fl_l">
                    <div class="myasnoy_ryad_item_text_vert">Мраморная говядина</div>
                </div></a>
                <a href="/" class="mew_1_link"><div class="myasnoy_ryad_line_item new_1_4 fl_l">
                    <div class="myasnoy_ryad_item_text_vert">Свинина</div>
                </div></a>
                <a href="/" class="mew_1_link"><div class="myasnoy_ryad_line_item new_1_5 fl_l">
                    <div class="myasnoy_ryad_item_text_vert">Баранина</div>
                </div></a>
                <a href="/" class="mew_1_link"><div class="myasnoy_ryad_line_item new_1_6 fl_l">
                    <div class="myasnoy_ryad_item_text_vert">Мясо кролика</div>
                </div></a>
                <a href="/" class="mew_1_link"><div class="myasnoy_ryad_line_item myasnoy_ryad_line_item_last new_1_7 fl_l">
                    <div class="myasnoy_ryad_item_text_vert">Гусь</div>
                </div></a>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </section>
        <section class="rybny_ryad">
            <a href="/" class="mew_1_link"><div class="rybny_ryad_item new_1_8 fl_l">
                <div class="rybny_ryad_item_text">Сибас <span class="rybny_ryad_item_text_orange">180р. за кг</span></div>
            </div></a>
            <a href="/" class="mew_1_link"><div class="rybny_ryad_item new_1_9 rybny_ryad_item_center fl_l">
                <div class="rybny_ryad_item_text">Много замороженной рыбы</div>
            </div></a>
            <a href="/" class="mew_1_link"><div class="rybny_ryad_item new_1_10 fl_l">
                <div class="rybny_ryad_item_text">Много охлажденной рыбы</div>
            </div></a>
            <div class="clear"></div>
        </section>
        <section class="guglpley">
            <div class="guglpley_text">
                <div class="guglpley_text_1">Мы можем быть у Вас в кармане</div>
                <div class="guglpley_text_2">мобильная версия / приложения</div>
                <a href="/" target="_blank" class="guglpley_text_3">
                    <img src="/assets/img/new_1/gp.jpg" alt="">
                </a>
            </div>
        </section>
        <section class="vtoroy_slaider">
            <? for ($i=1; $i < 13; $i++) { ?>
                <a href="/" class="vtoroy_slaider_item vtoroy_slaider_item_<?= $i; ?>">
                    <div class="vtoroy_slaider_item_text">Фрукты</div>
                </a>
            <? } ?>
        </section>
        <section class="yaica_i_ovcy">
            <a href="/" class="mew_1_link"><div class="yaica_i_ovcy_item new_1_17 fl_l"></div></a>
            <a href="/" class="mew_1_link"><div class="yaica_i_ovcy_item new_1_18 fl_l"></div></a>
            <a href="/" class="mew_1_link"><div class="yaica_i_ovcy_item new_1_19 fl_l"></div></a>
            <a href="/" class="mew_1_link"><div class="yaica_i_ovcy_item new_1_20 yaica_i_ovcy_item_last fl_l"></div></a>
            <div class="clear"></div>
        </section>
        <section class="blog_i_rekomendacii">
            <a href="/" class="mew_1_link"><div class="blog_i_rekomendacii_item new_1_21 fl_l">
                <div class="blog_i_rekomendacii_text">диетические продукты</div>
            </div></a>
            <a href="/" class="mew_1_link"><div class="blog_i_rekomendacii_item new_1_22 fl_l">
                <div class="blog_i_rekomendacii_text">наш вкусный блог</div>
            </div></a>
            <a href="/" class="mew_1_link"><div class="blog_i_rekomendacii_item new_1_23 blog_i_rekomendacii_item_last fl_l">
                <div class="blog_i_rekomendacii_text2">
                    <div class="blog_i_rekomendacii_text2_1">ОСОБО РЕКОМЕНДУЕМ</div>
                    <div class="blog_i_rekomendacii_text2_2">много нового и прекрасного</div>
                </div>
            </div></a>
            <div class="clear"></div>
        </section>
        <section class="tretiy_slaider">
            <? for ($i=1; $i < 9; $i++) { ?>
                <a href="/" class="tretiy_slaider_item">
                    <img class="tretiy_slaider_item_img" src="/assets/img/new_1/tretiy_slaider/<?= $i; ?>.png" alt="Фуагра">
                    <div class="tretiy_slaider_item_text">Фуагра</div>
                    <div class="tretiy_slaider_item_textlarge">Создавая цесарку,природа максимально</div>
                    <div class="tretiy_slaider_item_price">- 150 <span class="rouble">o</span></div>
                </a>
            <? } ?>
        </section>
        <section class="instagram_line">
            <div class="instagram_line_item fl_l">
                <a href="https://www.instagram.com/p/BWQhCapFWqk/?hl=ru&taken-by=president_vladimir_putin" target="_blank"><div class="instagram_line_item_photo" style="background-image:url('https://scontent-lga3-1.cdninstagram.com/vp/d71899bc7057e224bc4f30d6e2b69fc9/5B1ED1FF/t51.2885-15/s640x640/sh0.08/e35/c0.132.1060.1060/26863583_138719166936936_2305361500430139392_n.jpg')"></div></a>
                <div class="instagram_line_item_text">
                    <a href="https://www.instagram.com/president_vladimir_putin/?hl=ru" target="_blank" class="instagram_line_item_text_header">@milablum</a>
                    <div class="instagram_line_item_text_body">
                        #отчаяннаядомохозяйка в деле вдохновляют 
                        готовку фермерские продукты  @aydaeda. Так 
                        вдохновилась, что записала #влог (скоро на 
                        моем канале YouTube) как приготовить.
                    </div>
                </div>
            </div>
            <div class="instagram_line_item fl_l">
                <a href="https://www.instagram.com/p/BWQhCapFWqk/?hl=ru&taken-by=president_vladimir_putin" target="_blank"><div class="instagram_line_item_photo" style="background-image:url('https://scontent-sea1-1.cdninstagram.com/vp/8000e8b3bba6ac25dbf06e59db7c9c5e/5B22DAD8/t51.2885-15/s480x480/e15/11116896_1666296106931974_673494760_n.jpg?ig_cache_key=OTY4MDY4NzU3MzkzODcyMDQw.2')"></div></a>
                <div class="instagram_line_item_text">
                    <a href="https://www.instagram.com/president_vladimir_putin/?hl=ru" target="_blank" class="instagram_line_item_text_header">@milablum</a>
                    <div class="instagram_line_item_text_body">
                        #отчаяннаядомохозяйка в деле вдохновляют 
                        готовку фермерские продукты  @aydaeda. Так 
                        вдохновилась, что записала #влог (скоро на 
                        моем канале YouTube) как приготовить.
                    </div>
                </div>
            </div>
            <div class="instagram_line_item fl_l">
                <a href="https://www.instagram.com/p/BWQhCapFWqk/?hl=ru&taken-by=president_vladimir_putin" target="_blank"><div class="instagram_line_item_photo" style="background-image:url('http://scontent.cdninstagram.com/t51.2885-15/s480x480/e35/14597222_1671779909819228_6333629585254514688_n.jpg?ig_cache_key=MTM3OTU1NjM1OTI3OTgxNDcwNw%3D%3D.2')"></div></a>
                <div class="instagram_line_item_text">
                    <a href="https://www.instagram.com/president_vladimir_putin/?hl=ru" target="_blank" class="instagram_line_item_text_header">@milablum</a>
                    <div class="instagram_line_item_text_body">
                        #отчаяннаядомохозяйка в деле вдохновляют 
                        готовку фермерские продукты  @aydaeda. Так 
                        вдохновилась, что записала #влог (скоро на 
                        моем канале YouTube) как приготовить.
                    </div>
                </div>
            </div>
            <div class="instagram_line_item instagram_line_item_last fl_l">
                <a href="https://www.instagram.com/p/BWQhCapFWqk/?hl=ru&taken-by=president_vladimir_putin" target="_blank"><div class="instagram_line_item_photo" style="background-image:url('https://scontent-sea1-1.cdninstagram.com/t51.2885-15/s480x480/e35/c6.0.1067.1067/16584835_1810820822503602_8433326374852231168_n.jpg?ig_cache_key=MTQ0NjQ5ODA5MjQ5NjA1MTEzMA%3D%3D.2.c')"></div></a>
                <div class="instagram_line_item_text">
                    <a href="https://www.instagram.com/president_vladimir_putin/?hl=ru" target="_blank" class="instagram_line_item_text_header">@milablum</a>
                    <div class="instagram_line_item_text_body">
                        #отчаяннаядомохозяйка в деле вдохновляют 
                        готовку фермерские продукты  @aydaeda. Так 
                        вдохновилась, что записала #влог (скоро на 
                        моем канале YouTube) как приготовить.
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </section>
    </div>
    <style>
        <? for ($i=1; $i < 24; $i++) { ?>
            .new_1_<?= $i; ?> {
                position: relative;
                background-image: url('/assets/img/new_1/<?= $i; ?>.jpg');
                -webkit-background-size: cover;
                 -o-background-size: cover;
                    background-size: cover;
                    cursor: pointer;
                    filter: contrast(1);
                    -webkit-transition: filter .3s ease;
                       -moz-transition: filter .3s ease;
                        -ms-transition: filter .3s ease;
                         -o-transition: filter .3s ease;
                            transition: filter .3s ease;
            }
            .new_1_<?= $i; ?>:hover {
                filter: contrast(1.2);
                -webkit-transition: filter .3s ease;
                   -moz-transition: filter .3s ease;
                    -ms-transition: filter .3s ease;
                     -o-transition: filter .3s ease;
                        transition: filter .3s ease;
            }
        <? } ?>
        <? for ($i=1; $i < 13; $i++) { ?>
            .vtoroy_slaider_item_<?= $i; ?> {
                background-image: url('/assets/img/new_1/vtoroy_slaider/<?= $i; ?>.jpg');
                -webkit-background-size: cover;
                     -o-background-size: cover;
                        background-size: cover;
            }
        <? } ?>
    </style>
<?php $this->load->view('common/footer',$footer);?>