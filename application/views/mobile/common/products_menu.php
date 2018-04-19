<section class="products_menu goods_active"><!-- .goods_active / .countries_active / .assignment_active --><!-- add / remove .opened_products TO BODY --> 
    <div class="products_menu_header">
        <div class="products_menu_header_icon sprite"></div>
        <div class="products_menu_tabs">
            <a href="#" class="products_menu_tab products_menu_tab_goods active" data-target="tab_products">Товары</a>
            <a href="#" class="products_menu_tab products_menu_tab_countries" data-target="tab_countries">Страны</a>
            <a href="#" class="products_menu_tab products_menu_tab_assignment" data-target="tab_assignments">По назначению</a>
        </div>
    </div>
    <div class="products_menu_body content">
        <div class="products_menu_tab_content active" id="tab_products">
            <?php foreach($categories_struct['categories'] as $parent_category) { ?>
                <div class="products_menu_tab_content_line">
                    <a class="products_menu_tab_content_line_header"><?php echo $parent_category['info']['title'] ?></a>
                    <div class="products_menu_tab_content_line_subheader"><!-- парное и замороженное мясо --></div>
                    <div class="products_menu_tab_content_line_count">
                        <?php echo $this->baselib->get_filter_text('product',$parent_category['count']) ?>
                        <span class="products_menu_tab_content_line_count_img sprite"></span>
                    </div>
                    <a href="#" class="products_menu_tab_content_line_more sprite"></a>
                    <div class="products_menu_tab_content_line_more_links">
                        <?php foreach($parent_category['childs'] as $category) { ?>
                            <a href="/<?php echo $parent_category['info']['seo_url'] ?>/<?php echo $category['seo_url'] ?>" class="products_menu_tab_content_line_more_link"><?php echo $category['title'] ?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="products_menu_tab_content" id="tab_countries">
            <?php foreach($categories_struct['countries'] as $country => $country_data) { ?>
                <div class="products_menu_tab_content_line">
                    <a href="#" class="products_menu_tab_content_line_header"><?php echo $country ?></a>
                    <div class="products_menu_tab_content_line_subheader"><!-- парное и замороженное мясо --></div>
                    <div class="products_menu_tab_content_line_count">
                        <?php echo $this->baselib->get_filter_text('product',$country_data['count']) ?>
                        <span class="products_menu_tab_content_line_count_img sprite"></span>
                    </div>
                    <a href="#" class="products_menu_tab_content_line_more sprite"></a>
                    <div class="products_menu_tab_content_line_more_links">
                        <?php foreach($country_data['categories'] as $category) { ?>
                            <a href="/country/<?php echo $country_data['country_id'] ?>?category=<?php echo $category['title'] ?>" class="products_menu_tab_content_line_more_link"><?php echo $category['title'] ?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="products_menu_tab_content" id="tab_assignments">
            <?php foreach($categories_struct['types'] as $type_title => $type) { ?>
                <div class="products_menu_tab_content_line">
                    <a href="#" class="products_menu_tab_content_line_header"><?php echo $type['title'] ?></a>
                    <div class="products_menu_tab_content_line_subheader"><!-- парное и замороженное мясо --></div>
                    <div class="products_menu_tab_content_line_count">
                        <?php echo $this->baselib->get_filter_text('product',$type['count']) ?>
                        <span class="products_menu_tab_content_line_count_img sprite"></span>
                    </div>
                    <a href="#" class="products_menu_tab_content_line_more sprite"></a>
                    <div class="products_menu_tab_content_line_more_links">
                        <?php foreach($type['categories'] as $category) { ?>
                            <a href="/<?php echo $type_title ?>?category=<?php echo $category['title'] ?>" class="products_menu_tab_content_line_more_link"><?php echo $category['title'] ?></a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>