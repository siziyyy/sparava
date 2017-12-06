<?php $this->load->view('common/header',$header);?>
        <!--<section class="content">
            <div class="content_helper">
                <div class="blog_header">
                    <div class="blog_header_left fl_l">Вкусный блог</div>
                    <div class="blog_header_right fl_r">125 публикаций</div>
                    <div class="clear"></div>
                </div>
                <div class="blog_date_sep">Ноябрь 2017</div>
                <div class="blog_content">
                    <? for ($i=1; $i < 9; $i++) { ?>
                        <div class="blog_item <? echo $i == 1 ? "blog_wide":""; ?>">
                            <a href="/blog/article">
                                <div class="blog_img" style="background: url('/assets/img/blog/posts/1.jpg');"></div>
                            </a>
                            <div class="clog_date">21.07</div>
                            <a href="/blog/article" class="blog_name_link">
                                <div class="blog_name">
                                    Как правильно употреблять артишоки  на сегодня можно и тогда вота
                                </div>
                            </a>
                            <div class="blog_text">
                                Сейчас каперсы потеряли свой ореол загадочности, ведь их легко можно 
                                купить в магазинах. Однако до сих пор в России к засоленным зелёным 
                                шарикам в баночках относятся настороженно – непонятно, что это за 
                                фрукт, и с чем его едят  
                            </div>
                            <a href="/blog/article" class="blog_next_link">
                                <div class="blog_next">дальше</div>
                            </a>
                        </div>
                    <? } ?>
                    <div class="clear"></div>
                </div>
                <div class="blog_date_sep">Октябрь 2017</div>
                <div class="blog_content">
                    <? for ($i=1; $i < 9; $i++) { ?>
                        <div class="blog_item <? echo $i == 1 ? "blog_wide":""; ?>">
                            <a href="/blog/article">
                                <div class="blog_img" style="background: url('/assets/img/blog/posts/1.jpg');"></div>
                            </a>
                            <div class="clog_date">21.07</div>
                            <a href="/blog/article" class="blog_name_link">
                                <div class="blog_name">
                                    Как правильно употреблять артишоки  на сегодня можно и тогда вота
                                </div>
                            </a>
                            <div class="blog_text">
                                Сейчас каперсы потеряли свой ореол загадочности, ведь их легко можно 
                                купить в магазинах. Однако до сих пор в России к засоленным зелёным 
                                шарикам в баночках относятся настороженно – непонятно, что это за 
                                фрукт, и с чем его едят  
                            </div>
                            <a href="/blog/article" class="blog_next_link">
                                <div class="blog_next">дальше</div>
                            </a>
                        </div>
                    <? } ?>
                    <div class="clear"></div>
                </div>
            </div>
        </section>-->
        <section class="content">
            <div class="content_helper">
                <div class="blog_header">
                    <div class="blog_header_left fl_l">Вкусный блог</div>
                    <div class="blog_header_right fl_r">125 публикаций</div>
                    <div class="clear"></div>
                </div>
                <a href="/blog/" class="blog_date_sep fl_l"><span class="blog_date_sep_arrow">←</span>назад ко всем постам</a>
                <div class="blog_date_sep_inner fl_r">21.07</div>
                <div class="clear"></div>
                <div class="blog_post">
                    <div class="blog_post_left fl_l">
                        <div class="post_img" style="background: url('/assets/img/blog/posts/1.jpg');"></div>
                    </div>
                    <div class="blog_post_right fl_l">
                        <div class="post_right_header">
                            <div class="post_header_name fl_l">Как правильно употреблять артишоки</div>
                            <a class="post_header_share fl_r">поделиться<span class="post_share_img"></span></a>
                            <div class="clear"></div>
                        </div>
                        <div class="post_text">
                            <p>
                                Первое письменное упоминание о каперсах относится приблизительно к 2700 г. до н.э. Плоды 
                                каперсника были упомянуты в древнейшем памятнике литерат«Эпосе о Гильгамеше». С давних 
                                времён все части каперсника использовали как пряную приправу и лекарство. Отвар цветов 
                                каперсника использовался для заживления ран, укрепления сердца; отвар корней употребляли 
                                как обезболивающее; плоды (ягоды) каперсов помогали при зубной боли и заболеваниях 
                                щитовидной железы; отвар коры применяли при неврозах; масло семян каперсов использовали 
                                для массажа.
                            </p>
                            <p>
                                Современная медицина признаёт, что свежие части кустарника имеют вяжущие, 
                                антисептические и обезболивающие свойства. 
                            </p>
                            <p>
                                Времён все части каперсника использовали как пряную приправу и лекарство. Отвар цветов 
                                каперсника использовался для заживления ран, укрепления сердца
                            </p>
                        </div>
                        <button class="buy_this_stuff">Купить этот товар у нас за 2080 руб.</button>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>