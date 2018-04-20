<?php $this->load->view('mobile/common/header',$header); ?>
    <?php $this->load->view('mobile/common/filters_menu'); ?>
    <div class="category_menu">
        <div class="content">
            <!--<div class="category_banner">
                <img src="/assets/img/banners/category.jpg" alt="" class="category_banner_img">
            </div>-->
            <div class="category_menu_links">
                <?php if(isset($menu_childs) and count($menu_childs) > 0) { ?>

                    <?php for($i=1;$i<count($menu_childs);$i++) { ?>
                        <?php if($menu_childs[$i]['current_category']) { ?>
                            <?php $c_category = $menu_childs[$i] ?>
                            <a href="/<?php echo $parent_category_seo_url ?>/<?php echo $c_category['seo_url'] ?>" class="category_menu_link <?php echo ( $c_category['current_category'] ? 'active' : '' ) ?>"><?php echo $c_category['title'] ?></a>
                            <?php $current_category_title = $menu_childs[$i]['title']; ?>
                            <?php unset($menu_childs[$i]); ?>
                        <?php } ?>
                    <?php } ?>

                    <?php for($i=1;$i<count($menu_childs);$i++) { ?>
                        <?php if(isset($menu_childs[$i])) { ?>
                            <?php $c_category = $menu_childs[$i] ?>
                            <a href="/<?php echo $parent_category_seo_url ?>/<?php echo $c_category['seo_url'] ?>" class="category_menu_link <?php echo ( $c_category['current_category'] ? 'active' : '' ) ?>"><?php echo $c_category['title'] ?></a>
                        <?php } ?>
                    <?php } ?>

                <?php } ?>

                <?php if(isset($parent_categories_list) and count($parent_categories_list) > 0) { ?>
                    <?php foreach($parent_categories_list as $col_id => $col) { ?>
                        <?php foreach($col as $c_id => $c_category) { ?>
                            <?php if($c_category['title'] == $current_category) { ?>
                                <a class="category_menu_link <?php echo ($c_category['title'] == $current_category ? 'active' : '') ?>" href="?category=<?php echo $c_category['title'] ?>"><?php echo $c_category['title'] ?></a>
                                <?php $current_category_title = $parent_categories_list[$col_id][$c_id]['title']; ?>
                                <?php unset($parent_categories_list[$col_id][$c_id]); ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>

                    <?php foreach($parent_categories_list as $col_id => $col) { ?>
                        <?php foreach($col as $c_id => $c_category) { ?>
                            <a class="category_menu_link <?php echo ($c_category['title'] == $current_category ? 'active' : '') ?>" href="?category=<?php echo $c_category['title'] ?>"><?php echo $c_category['title'] ?></a>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="sticky stickyTo">
        <div class="content">
            <div class="category_content_header">
                <div class="category_content_header_text fl_l">
                    <?php 
                        echo $current_category_title;
                    ?>
                    <span class="category_content_header_count">&nbsp;(<?php echo $products_count ?>)&nbsp;</span>
                </div>
                <div class="category_content_header_buttons fl_r">
                    <?php if(isset($attributes)) { ?>
                        <a href="#" class="category_content_header_button_filters sprite fl_r"></a>
                    <?php } ?>
                    <a href="#" class="category_content_header_button_view category_content_header_button_view_double sprite fl_r"></a> <!-- add / remove .active -->
                    <a href="#" class="category_content_header_button_view category_content_header_button_view_one sprite active fl_r"></a> <!-- add / remove .active -->
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <span id="indicator"></span>
    <div class="category_content category_content_padding"> <!-- add / remove .category_content_view_by_double -->
        <?php foreach($products as $product) { ?>
            <?php $info['product'] = $product; ?>
            <?php $this->load->view('mobile/common/load-product',$info);?>                 
        <?php } ?>
        <span id="wrapper_for_product_load"></span>
    </div>
    <?php if($pages_count > 1) { ?>
        <?php if(isset($country_id)) { ?>
            <a href="#" class="show_more_products" data-country-id="<?php echo $country_id ?>">показать еще</a>
        <?php } else { ?>
            <a href="#" class="show_more_products" data-category-id="<?php echo $category ?>">показать еще</a>
        <?php } ?>
    <?php } ?>
<?php $this->load->view('mobile/common/footer',$header); ?>