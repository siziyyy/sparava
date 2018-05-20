<?php $this->load->view('common/header',$header);?>
<style>
    .c_new_menu_line {
        padding-top: 8px;
        position: relative;
        padding-bottom: 37px;
    }
    @media all and (max-width: 1200px) {
        body {
            -webkit-transform: scale(.83);
            -moz-transform: scale(.83);
            -ms-transform: scale(.83);
            -o-transform: scale(.83);
            transform: scale(.83);
        }
    }
    /*.c_new_menu_line_item_right {
        color: #569c1d;
    }*/
</style>
        <section class="content">
            <div class="content_helper">
                <?php $this->load->view('common/menu');?>
            </div>
            <div class="c_new_mobile_menu noscrlbr">
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(1) ?>" class="c_mobile_menu_link">Мясо</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(2) ?>" class="c_mobile_menu_link">Птица</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(3) ?>" class="c_mobile_menu_link">Рыба</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(4) ?>" class="c_mobile_menu_link">Морепродукты</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(5) ?>" class="c_mobile_menu_link">Деликатесы</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(6) ?>" class="c_mobile_menu_link">Полуфабрикаты</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(7) ?>" class="c_mobile_menu_link">Кулинария</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(8) ?>" class="c_mobile_menu_link">Заморзка</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(9) ?>" class="c_mobile_menu_link">Бакалея</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(10) ?>" class="c_mobile_menu_link">Консервация</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(11) ?>" class="c_mobile_menu_link">Соления</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(12) ?>" class="c_mobile_menu_link">Соусы</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(13) ?>" class="c_mobile_menu_link">Молочные продукты</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(14) ?>" class="c_mobile_menu_link">Фрукты</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(15) ?>" class="c_mobile_menu_link">Овощи, зелень, грибы</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(17) ?>" class="c_mobile_menu_link">Приправы</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(18) ?>" class="c_mobile_menu_link">Растительные масла</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(19) ?>" class="c_mobile_menu_link">Хлеб и лаваш</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(20) ?>" class="c_mobile_menu_link">Хлебцы и снеки</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(21) ?>" class="c_mobile_menu_link">Сладости</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(22) ?>" class="c_mobile_menu_link">Торты и пирожные</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(23) ?>" class="c_mobile_menu_link">Мед</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(24) ?>" class="c_mobile_menu_link">Чай</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(25) ?>" class="c_mobile_menu_link">Кофе</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(26) ?>" class="c_mobile_menu_link">Вода и напитки</a>
                <a href="<?php echo $this->baselib->get_seo_url_by_category_id(27) ?>" class="c_mobile_menu_link">Соки и компоты</a>
            </div>
            <div class="cart_mob_menu_bg"></div>
            <div class="content_helper">
                <div class="c_inners_header no_on_desk">Корзина</div>
                <div class="c_cart">
                    <div class="c_inners_header c_inners_header_cart no_on_mob"><span>Корзина</span></div>
                    <?php $this->load->view('cart/'.$cart_info_tpl, $cart_info);?>
					<section class="c_inners_right_content fl_l">
						<?php $this->load->view('cart/products', $cart_content);?>
						<div class="c_inners_right_footer">
							<?php $this->load->view('cart/totals', $totals); ?>
						</div>
					</section>
                    <div class="clear"></div>
                </div>
            </div>
        </section>
<?php $this->load->view('common/footer');?>