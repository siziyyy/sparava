<?php $this->load->view('common/header',$header);?>
        <section class="content">
            <div class="content_helper">
                <?php /* $this->load->view('common/menu-inner', $menu); */?>
            </div>
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