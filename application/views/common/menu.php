               <div class="c_new_menu_line index_c_new_menu">
                    <div class="c_new_index_menu_dropdown">
                        <?php $this->load->view('common/menu-links');?>
                    </div>
                    <div class="c_new_menu_line_item rtyguhnjioklp vyubinmop c_new_menu_line_item_right fl_l">
                        <span class="c_new_menu_more_icon"></span>
                        <span class="c_new_menu_more">все категории</span>
                    </div>
					<div class="c_new_menu_line_item rtyguhnjioklp fl_r">
                        <a href="/catalog" class="c_new_menu_link fullcatlink c_new_menu_l">Полный каталог</a>
                        <a class="search_new_3_2018_icon"></a>
                        <a href="<?php echo $this->baselib->get_seo_url_by_category_id(1) ?>" class="c_new_menu_link c_new_menu_l">Мясо</a>
                        <a href="<?php echo $this->baselib->get_seo_url_by_category_id(2) ?>" class="c_new_menu_link c_new_menu_l">Птица</a>
                        <a href="<?php echo $this->baselib->get_seo_url_by_category_id(3) ?>" class="c_new_menu_link c_new_menu_l">Рыба</a>
                        <a href="<?php echo $this->baselib->get_seo_url_by_category_id(13) ?>" class="c_new_menu_link c_new_menu_l">Молочка</a>
                        <a href="<?php echo $this->baselib->get_seo_url_by_category_id(15) ?>" class="c_new_menu_link c_new_menu_l">Овощи</a>
                        <a href="<?php echo $this->baselib->get_seo_url_by_category_id(14) ?>" class="c_new_menu_link c_new_menu_l">Фрукты</a>
                        <a href="<?php echo $this->baselib->get_seo_url_by_category_id(16) ?>" class="c_new_menu_link c_new_menu_l">Орехи и сухофрукты</a>
                        <a href="<?php echo $this->baselib->get_seo_url_by_category_id(24) ?>" class="c_new_menu_link c_new_menu_l">Чай</a>
                        <a href="<?php echo $this->baselib->get_seo_url_by_category_id(25) ?>" class="c_new_menu_link c_new_menu_l">Кофе</a>
                        <a href="<?php echo $this->baselib->get_seo_url_by_category_id(23) ?>" class="c_new_menu_link c_new_menu_l adwgsage" style="margin:0 !important">Мёд</a>
					</div>
                    <div class="clear"></div>
              </div>
            <div class="search_new_3_2018_pack" style="<?php echo ($this->router->fetch_method() == 'search' ? 'display:block' : '' ); ?>">
                <div class="content_helper">
                    <form method="get" action="/search">
                        <input type="text" class="search_new_3_2018_input" value="<?php echo (isset($value) ? $value : ''); ?>" name="value" placeholder="более 15 000 товаров в 145 категориях">
                        <button type="submit" class="search_new_3_2018_button">поиск</button>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>