<?php $this->load->view('common/header',$header);?>
    <style>   
        /*.c_new_menu_l {
            margin-right: 23px !important;
        }*/
        header {
            height: 105px;
        }
    </style>
    <div class="content_helper">
        <?php $this->load->view('common/menu');?>
    </div>
	<div class="content_helper">
        <section class="banner2018 b_slider">
            <?php foreach($banners['slider'] as $banner) { ?>
                <a href="<?php echo $banner['url'] ?>">
                    <div class="b_slide" style="background-image:url('<?php echo $banner['image'] ?>')">
                            <div class="content_helper">
                            </div>
                    </div>
                </a>
            <?php } ?>
        </section>
        <!--<section class="slogan2018">
            <div class="slogan2018_1">
                Если все пишут, что у них все качественно, дешево и быстро,
                <br>тогда цена этих слов равняется нулю!
            </div>
            <div class="slogan2018_2">
                И только по действиям можно судить о сервисе
            </div>
        </section>-->
        <section class="myasnoy_ryad">
            <?php foreach($banners['banner_5'] as $banner) { ?>
                <a href="<?php echo $banner['url'] ?>" class="mew_1_link">
                    <div class="myasnoy_ryad_first new_1_1 fl_l" style="background-image:url('<?php echo $banner['image'] ?>');">
                    </div>
                </a>
            <?php } ?>

            <div class="myasnoy_ryad_line fl_l">
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(29) ?>" class="mew_1_link"><div class="myasnoy_ryad_line_item new_1_2 fl_l">
                    <div class="myasnoy_ryad_item_text_vert">Говядина</div>
                </div></a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(30) ?>" class="mew_1_link"><div class="myasnoy_ryad_line_item new_1_3 fl_l">
                    <div class="myasnoy_ryad_item_text_vert">Мраморная говядина</div>
                </div></a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(33) ?>" class="mew_1_link"><div class="myasnoy_ryad_line_item new_1_4 fl_l">
                    <div class="myasnoy_ryad_item_text_vert">Свинина</div>
                </div></a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(32) ?>" class="mew_1_link"><div class="myasnoy_ryad_line_item new_1_5 fl_l">
                    <div class="myasnoy_ryad_item_text_vert">Баранина</div>
                </div></a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(171) ?>" class="mew_1_link"><div class="myasnoy_ryad_line_item new_1_6 fl_l">
                    <div class="myasnoy_ryad_item_text_vert">Мясо кролика</div>
                </div></a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(38) ?>" class="mew_1_link"><div class="myasnoy_ryad_line_item myasnoy_ryad_line_item_last new_1_7 fl_l">
                    <div class="myasnoy_ryad_item_text_vert">Гусь</div>
                </div></a>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </section>
        <section class="rybny_ryad">
            <?php $counter = 0; ?>
            <?php foreach($banners['banner_1'] as $banner) { ?>
                <a href="<?php echo $banner['url'] ?>" class="mew_1_link"><div class="rybny_ryad_item <?php echo ($counter == 1 ? 'rybny_ryad_item_center' : '') ?> new_1_8 fl_l" style="background-image:url('<?php echo $banner['image'] ?>')"></div></a>
                <?php $counter++; ?>
            <?php } ?>
            <div class="clear"></div>
        </section>
        <a class="guglpley" href="/" target="_blank">
            <?php foreach($banners['banner_2'] as $banner) { ?>
                <img src="<?php echo $banner['image'] ?>" alt="">
            <?php } ?>
        </a>
        <section class="vtoroy_slaider">
            <?php foreach($banners['category'] as $banner) { ?>
                <a href="<?php echo $banner['url'] ?>" target="_blank" class="vtoroy_slaider_item">
                    <img src="<?php echo $banner['image'] ?>" alt="">
                </a>
            <?php } ?>
        </section>
        <section class="yaica_i_ovcy">
            <?php $counter = 0; ?>
            <?php foreach($banners['banner_3'] as $banner) { ?>
                <a href="<?php echo $banner['url'] ?>" class="mew_1_link"><div class="yaica_i_ovcy_item new_1_17 fl_l" style="background-image:url('<?php echo $banner['image'] ?>');<?php echo ($counter == 3 ? 'margin: 0' : '') ?>"></div></a>
                <?php $counter++; ?>
            <?php } ?>
            <div class="clear"></div>
        </section>
        <section class="blog_i_rekomendacii">
            <?php foreach($banners['banner_4'][1] as $banner) { ?>
                <a href="<?php echo $banner['url'] ?>" class="mew_1_link"><div class="blog_i_rekomendacii_item new_1_21 fl_l" style="background-image:url('<?php echo $banner['image'] ?>');"></div></a>
            <?php } ?>
            <?php foreach($banners['banner_4'][2] as $banner) { ?>
                <a href="<?php echo $banner['url'] ?>" class="mew_1_link"><div class="blog_i_rekomendacii_item new_1_21 fl_l blog_i_rekomendacii_item_last" style="background-image:url('<?php echo $banner['image'] ?>');"></div></a>
            <?php } ?>
            <div class="clear"></div>
        </section>
        <section class="tretiy_slaider">
            <?php foreach($banners['products'] as $banner) { ?>
                <a href="/product/<?php echo $banner['id'] ?>" class="tretiy_slaider_item">
                    <img class="tretiy_slaider_item_img" src="<?php echo $banner['image'] ?>" alt="<?php echo $banner['title'] ?>">
                    <div class="tretiy_slaider_item_text"><?php echo $banner['title'] ?></div>
                    <div class="tretiy_slaider_item_textlarge"><?php echo $banner['description'] ?></div>
                    <div class="tretiy_slaider_item_price">- <?php echo $banner['price'] ?> <span class="rouble">o</span></div>
                </a>
            <?php } ?>
        </section>
        <section class="instagram_line">
            <?php $counter = 0; ?>
            <?php foreach($banners['instagram'] as $banner) { ?>
                <div class="instagram_line_item fl_l <?php echo ($counter == 3 ? 'instagram_line_item_last' : '') ?>">
                    <a href="<?php echo $banner['url'] ?>" target="_blank"><div class="instagram_line_item_photo" style="background-image:url('<?php echo $banner['image'] ?>')"></div></a>
                    <div class="instagram_line_item_text">
                        <a href="<?php echo $banner['url'] ?>" target="_blank" class="instagram_line_item_text_header"><?php echo $banner['title'] ?></a>
                        <div class="instagram_line_item_text_body">
                            <?php echo $banner['text'] ?>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
            <?php } ?>
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
                    overflow: hidden;
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