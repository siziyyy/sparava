<?php $this->load->view('common/header',$header);?>
<style>
    .c_new_menu_line {
        padding-top: 8px;
        position: relative;
        padding-bottom: 37px;
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
                <a href="/category/1" class="c_mobile_menu_link">Мясо</a>
                <a href="/category/2" class="c_mobile_menu_link">Птица</a>
                <a href="/category/3" class="c_mobile_menu_link">Рыба</a>
                <a href="/category/4" class="c_mobile_menu_link">Морепродукты</a>
                <a href="/category/5" class="c_mobile_menu_link">Деликатесы</a>
                <a href="/category/6" class="c_mobile_menu_link">Полуфабрикаты</a>
                <a href="/category/7" class="c_mobile_menu_link">Кулинария</a>
                <a href="/category/8" class="c_mobile_menu_link">Заморзка</a>
                <a href="/category/9" class="c_mobile_menu_link">Бакалея</a>
                <a href="/category/10" class="c_mobile_menu_link">Консервация</a>
                <a href="/category/11" class="c_mobile_menu_link">Соления</a>
                <a href="/category/12" class="c_mobile_menu_link">Соусы</a>
                <a href="/category/13" class="c_mobile_menu_link">Молочные продукты</a>
                <a href="/category/14" class="c_mobile_menu_link">Фрукты</a>
                <a href="/category/15" class="c_mobile_menu_link">Овощи, зелень, грибы</a>
                <a href="/category/17" class="c_mobile_menu_link">Приправы</a>
                <a href="/category/18" class="c_mobile_menu_link">Растительные масла</a>
                <a href="/category/19" class="c_mobile_menu_link">Хлеб и лаваш</a>
                <a href="/category/20" class="c_mobile_menu_link">Хлебцы и снеки</a>
                <a href="/category/21" class="c_mobile_menu_link">Сладости</a>
                <a href="/category/22" class="c_mobile_menu_link">Торты и пирожные</a>
                <a href="/category/23" class="c_mobile_menu_link">Мед</a>
                <a href="/category/24" class="c_mobile_menu_link">Чай</a>
                <a href="/category/25" class="c_mobile_menu_link">Кофе</a>
                <a href="/category/26" class="c_mobile_menu_link">Вода и напитки</a>
                <a href="/category/27" class="c_mobile_menu_link">Соки и компоты</a>
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