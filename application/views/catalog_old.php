<?php $this->load->view('common/header',$header);?>
    <style>
        .contacts_bg_helper {
            position: static !important;
            margin: 0px 0 -105px 0;
        }
        .contacts_content {
            margin-top: 0 !important;
            padding-top: 20px;
        }
    </style>
        <div class="contacts_bg_helper"></div>
        <section class="content contacts_content">
            <div class="content_helper">
                <div class="c_cart">
                    <div class="catalog_header">КАТАЛОГ</div>
                    <div class="catalog_pack">
                        <?php foreach($menu['categories_first_line'] as $category) { ?>
                            <div class="catalog_line">
                                <a class="catalog_line_header" href="/category/<?php echo ( $category['seo_url'] ? $category['seo_url'] : $category['category_id'] ) ?>"><?php echo $category['title'] ?></a>
                                <?php if(isset($category['childs'])) { ?>
                                    <?php foreach($category['childs'] as $child) { ?>
                                        <a href="/category/<?php echo ( $child['seo_url'] ? $child['seo_url'] : $child['category_id'] ) ?>" class="catalog_line_item"><?php echo $child['title'] ?></a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
<?php $this->load->view('common/footer',$footer);?>