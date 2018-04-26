<?php $this->load->view('mobile/common/header',$header);?>
    <?php $this->load->view('mobile/common/filters_menu'); ?>
    <div class="cabinet_page_header">
        <a href="#" class="cabinet_page_exit">выйти</a>
        <div class="cabinet_page_header_tabs">
            <a href="/orders/" class="cabinet_page_header_tab">Мои заказы</a>
            <a href="/favourites/" class="cabinet_page_header_tab active">Избранное</a>
            <!-- <a href="/pages/cabinet/settings/" class="cabinet_page_header_tab">Настройки</a> -->
        </div>
    </div>
    <div class="sticky stickyTo">
        <div class="content">
            <div class="category_content_header">
                <!-- <div class="category_content_header_text fl_l">Томаты<span class="category_content_header_count">&nbsp;(19)&nbsp;</span></div> -->
                <div class="category_content_header_buttons fl_r">
                    <a href="#" class="category_content_header_button_filters sprite fl_r"></a>
                    <a href="#" class="category_content_header_button_view category_content_header_button_view_double sprite active fl_r"></a> <!-- add / remove .active -->
                    <a href="#" class="category_content_header_button_view category_content_header_button_view_one sprite fl_r"></a> <!-- add / remove .active -->
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <span id='indicator'></span>
    <div class="category_content category_content_view_by_double"> <!-- add / remove .category_content_view_by_double -->
        <?php if(isset($products)) { ?>
            <?php foreach($products as $product) { ?>
                <?php $info['product'] = $product; ?>
                <?php $this->load->view('mobile/common/load-product',$info);?>
            <?php } ?>
            <div id="wrapper_for_product_load"></div>
        <?php } else { ?>
            <h1 class="">В избранных пусто</h1>
        <?php } ?>
    </div>
    <?php if(isset($products)) { ?>
        <?php if($pages_count > 1) { ?>
            <div class="c_paginator">
                <div class="c_pages">
                    <?php foreach($pages as $page) { ?>
                        <?php if ($page['dots']) { ?>
                            <div class="c_page_dots">...</div>
                        <?php } else { ?>
                            <?php if(isset($page['back_button'])) { ?>
                                <div class="c_page" data-page="<?php echo $page['page'] ?>"><</div>
                            <?php } else { ?>
                                <div class="c_page <?php echo ($page['current_page'] ? 'c_current_page' : '') ?>" data-page="<?php echo $page['page'] ?>"><?php echo $page['page'] ?></div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
<?php $this->load->view('mobile/common/footer',$footer);?>